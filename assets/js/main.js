/* ==========================================================================
 * Sprout & Spade — client-side cart, wishlist and GA4 dataLayer plumbing.
 *
 * There is NO backend and NO database. Cart + wishlist live in localStorage
 * so they survive the full-page navigations of this (deliberately non-SPA)
 * site. Every meaningful interaction pushes a standard GA4 ecommerce event
 * to window.dataLayer for GTM to pick up.
 * ======================================================================== */

(function () {
  'use strict';

  window.dataLayer = window.dataLayer || [];
  var CURRENCY = window.STORE_CURRENCY || 'USD';

  var CART_KEY = 'sns_cart';
  var WISH_KEY = 'sns_wishlist';

  /* ----------------------------------------------------------------------
   * Storage helpers
   * -------------------------------------------------------------------- */
  function read(key) {
    try { return JSON.parse(localStorage.getItem(key)) || []; }
    catch (e) { return []; }
  }
  function write(key, value) {
    localStorage.setItem(key, JSON.stringify(value));
  }

  function getCart()      { return read(CART_KEY); }
  function saveCart(c)    { write(CART_KEY, c); refreshBadges(); }
  function getWishlist()  { return read(WISH_KEY); }
  function saveWishlist(w){ write(WISH_KEY, w); refreshBadges(); }

  /* A stable line key: same product + same variant collapse into one line. */
  function lineKey(item) {
    return item.item_id + '::' + (item.item_variant || '');
  }

  /* ----------------------------------------------------------------------
   * GA4 dataLayer helper
   *
   * Always clears the previous ecommerce object before pushing a new one,
   * which is the documented GA4 best practice to avoid stale merged data.
   * -------------------------------------------------------------------- */
  function pushEcommerce(eventName, ecommerce) {
    window.dataLayer.push({ ecommerce: null });
    window.dataLayer.push({
      event: eventName,
      ecommerce: ecommerce
    });
  }

  function cartValue(cart) {
    return round2(cart.reduce(function (sum, i) {
      return sum + (i.price * i.quantity);
    }, 0));
  }
  function round2(n) { return Math.round(n * 100) / 100; }

  /* ----------------------------------------------------------------------
   * Badge counts in the header
   * -------------------------------------------------------------------- */
  function refreshBadges() {
    var cartQty = getCart().reduce(function (n, i) { return n + i.quantity; }, 0);
    var wishQty = getWishlist().length;
    document.querySelectorAll('[data-cart-count]').forEach(function (el) {
      el.textContent = cartQty;
    });
    document.querySelectorAll('[data-wishlist-count]').forEach(function (el) {
      el.textContent = wishQty;
    });
  }

  /* ----------------------------------------------------------------------
   * Reading item data off a button's data-item attribute
   * -------------------------------------------------------------------- */
  function itemFromEl(el) {
    try { return JSON.parse(el.getAttribute('data-item')); }
    catch (e) { return null; }
  }

  /* ======================================================================
   * ADD TO CART
   * ==================================================================== */
  function addToCart(item) {
    var cart = getCart();
    var key  = lineKey(item);
    var existing = cart.find(function (i) { return lineKey(i) === key; });

    if (existing) {
      existing.quantity += item.quantity;
    } else {
      cart.push(item);
    }
    saveCart(cart);

    pushEcommerce('add_to_cart', {
      currency: CURRENCY,
      value: round2(item.price * item.quantity),
      items: [item]
    });
  }

  /* ======================================================================
   * REMOVE FROM CART
   * ==================================================================== */
  function removeFromCart(key) {
    var cart = getCart();
    var item = cart.find(function (i) { return lineKey(i) === key; });
    if (!item) return;

    cart = cart.filter(function (i) { return lineKey(i) !== key; });
    saveCart(cart);

    pushEcommerce('remove_from_cart', {
      currency: CURRENCY,
      value: round2(item.price * item.quantity),
      items: [item]
    });
    // Re-render the cart page if we're on it.
    if (typeof window.renderCart === 'function') window.renderCart();
  }

  /* ======================================================================
   * CHANGE QUANTITY (fires add_to_cart or remove_from_cart on the delta)
   * ==================================================================== */
  function changeQty(key, newQty) {
    var cart = getCart();
    var item = cart.find(function (i) { return lineKey(i) === key; });
    if (!item) return;
    newQty = Math.max(1, parseInt(newQty, 10) || 1);

    var delta = newQty - item.quantity;
    if (delta === 0) return;

    var deltaItem = Object.assign({}, item, { quantity: Math.abs(delta) });
    item.quantity = newQty;
    saveCart(cart);

    pushEcommerce(delta > 0 ? 'add_to_cart' : 'remove_from_cart', {
      currency: CURRENCY,
      value: round2(deltaItem.price * deltaItem.quantity),
      items: [deltaItem]
    });
    if (typeof window.renderCart === 'function') window.renderCart();
  }

  /* ======================================================================
   * WISHLIST
   * ==================================================================== */
  function toggleWishlist(item) {
    var wl = getWishlist();
    var key = lineKey(item);
    var exists = wl.some(function (i) { return lineKey(i) === key; });

    if (exists) {
      wl = wl.filter(function (i) { return lineKey(i) !== key; });
      saveWishlist(wl);
      return false; // removed
    }
    wl.push(item);
    saveWishlist(wl);

    pushEcommerce('add_to_wishlist', {
      currency: CURRENCY,
      value: round2(item.price * item.quantity),
      items: [item]
    });
    return true; // added
  }

  /* ======================================================================
   * SELECT ITEM — fired when a product card is clicked in a list.
   * We push, then let the navigation proceed.
   * ==================================================================== */
  function selectItem(item, listId, listName) {
    var payload = Object.assign({}, item);
    if (listId)   payload.item_list_id   = listId;
    if (listName) payload.item_list_name = listName;
    pushEcommerce('select_item', {
      item_list_id: listId,
      item_list_name: listName,
      items: [payload]
    });
  }

  /* ======================================================================
   * Wire up the DOM once loaded
   * ==================================================================== */
  document.addEventListener('DOMContentLoaded', function () {
    refreshBadges();

    /* --- Add to cart buttons ---------------------------------------- */
    document.querySelectorAll('[data-add-to-cart]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var item = itemFromEl(btn);
        if (!item) return;

        // Product page may carry a variant selector + quantity input.
        var scope = btn.closest('[data-product-scope]') || document;
        var variantSel = scope.querySelector('[data-variant-select]');
        var qtyInput   = scope.querySelector('[data-qty-input]');

        if (variantSel && variantSel.value) {
          item.item_variant = variantSel.options[variantSel.selectedIndex].text;
        }
        if (qtyInput) {
          item.quantity = Math.max(1, parseInt(qtyInput.value, 10) || 1);
        }
        addToCart(item);
        flash(btn, 'Added ✓');
      });
    });

    /* --- Add / remove wishlist buttons ------------------------------ */
    document.querySelectorAll('[data-toggle-wishlist]').forEach(function (btn) {
      // Reflect current state on load.
      var item = itemFromEl(btn);
      if (item && getWishlist().some(function (i) { return lineKey(i) === lineKey(item); })) {
        btn.classList.add('is-active');
      }
      btn.addEventListener('click', function () {
        var it = itemFromEl(btn);
        if (!it) return;
        var scope = btn.closest('[data-product-scope]');
        var variantSel = scope && scope.querySelector('[data-variant-select]');
        if (variantSel && variantSel.value) {
          it.item_variant = variantSel.options[variantSel.selectedIndex].text;
        }
        var added = toggleWishlist(it);
        btn.classList.toggle('is-active', added);
        flash(btn, added ? 'Saved ♥' : 'Removed');
      });
    });

    /* --- Product card clicks (select_item) -------------------------- */
    document.querySelectorAll('[data-select-item]').forEach(function (link) {
      link.addEventListener('click', function () {
        var item = itemFromEl(link);
        if (!item) return;
        selectItem(item, link.getAttribute('data-list-id'), link.getAttribute('data-list-name'));
      });
    });

    /* --- Promotion clicks (select_promotion) ------------------------ */
    document.querySelectorAll('[data-select-promotion]').forEach(function (link) {
      link.addEventListener('click', function () {
        var promo;
        try { promo = JSON.parse(link.getAttribute('data-promotion')); }
        catch (e) { return; }
        pushEcommerce('select_promotion', { items: [promo] });
      });
    });

    /* --- Begin checkout button -------------------------------------- */
    document.querySelectorAll('[data-begin-checkout]').forEach(function (btn) {
      btn.addEventListener('click', function (e) {
        var cart = getCart();
        if (!cart.length) return;
        pushEcommerce('begin_checkout', {
          currency: CURRENCY,
          value: cartValue(cart),
          items: cart
        });
      });
    });
  });

  /* Small visual confirmation on a button press. */
  function flash(btn, text) {
    var original = btn.getAttribute('data-label') || btn.textContent;
    if (!btn.getAttribute('data-label')) btn.setAttribute('data-label', original.trim());
    btn.textContent = text;
    setTimeout(function () { btn.textContent = btn.getAttribute('data-label'); }, 1200);
  }

  /* ----------------------------------------------------------------------
   * Public API used by individual page scripts (cart / checkout / thank-you)
   * -------------------------------------------------------------------- */
  window.SNS = {
    getCart: getCart,
    saveCart: saveCart,
    clearCart: function () { write(CART_KEY, []); refreshBadges(); },
    getWishlist: getWishlist,
    saveWishlist: saveWishlist,
    removeFromCart: removeFromCart,
    changeQty: changeQty,
    toggleWishlist: toggleWishlist,
    lineKey: lineKey,
    cartValue: cartValue,
    round2: round2,
    pushEcommerce: pushEcommerce,
    currency: CURRENCY,
    refreshBadges: refreshBadges
  };
})();
