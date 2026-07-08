class CookieBannerModal {
  constructor() {
    this.cookies = {
      essential: true,
      analytics: false,
      marketing: false,
      functional: false
    };
    this.init();
  }

  init() {
    this.loadConsent();
    if (!this.hasConsent()) {
      this.showModal();
    }
  }

  loadConsent() {
    const stored = localStorage.getItem('cookie_consent_modal');
    if (stored) {
      this.cookies = JSON.parse(stored);
    }
  }

  hasConsent() {
    return localStorage.getItem('cookie_consent_modal') !== null;
  }

  showModal() {
    const modal = document.createElement('div');
    modal.id = 'cookie-modal-banner';
    modal.innerHTML = `
      <div class="cookie-modal-overlay">
        <div class="cookie-modal-card">
          <h2>Your Privacy Matters</h2>
          <p>We use cookies to enhance your experience. Choose your preferences below.</p>

          <div class="cookie-toggles">
            <div class="cookie-toggle-item">
              <div class="toggle-header">
                <label>Essential Cookies</label>
                <input type="checkbox" class="cookie-toggle" data-type="essential" checked disabled>
              </div>
              <p class="toggle-desc">Required for site functionality</p>
            </div>

            <div class="cookie-toggle-item">
              <div class="toggle-header">
                <label>Analytics</label>
                <input type="checkbox" class="cookie-toggle" data-type="analytics">
              </div>
              <p class="toggle-desc">Helps us understand how you use our site</p>
            </div>

            <div class="cookie-toggle-item">
              <div class="toggle-header">
                <label>Marketing</label>
                <input type="checkbox" class="cookie-toggle" data-type="marketing">
              </div>
              <p class="toggle-desc">Personalized ads and content</p>
            </div>

            <div class="cookie-toggle-item">
              <div class="toggle-header">
                <label>Functional</label>
                <input type="checkbox" class="cookie-toggle" data-type="functional">
              </div>
              <p class="toggle-desc">Remember your preferences</p>
            </div>
          </div>

          <div class="cookie-modal-actions">
            <button class="btn-reject" id="cookie-reject-all">Reject All</button>
            <button class="btn-accept" id="cookie-accept-custom">Accept Selected</button>
          </div>
        </div>
      </div>
    `;

    document.body.appendChild(modal);
    this.attachEventListeners();
  }

  attachEventListeners() {
    document.querySelectorAll('.cookie-toggle:not([disabled])').forEach(checkbox => {
      checkbox.addEventListener('change', (e) => {
        this.cookies[e.target.dataset.type] = e.target.checked;
      });
    });

    document.getElementById('cookie-reject-all').addEventListener('click', () => {
      this.cookies = { essential: true, analytics: false, marketing: false, functional: false };
      this.saveAndClose();
    });

    document.getElementById('cookie-accept-custom').addEventListener('click', () => {
      this.saveAndClose();
    });
  }

  saveAndClose() {
    localStorage.setItem('cookie_consent_modal', JSON.stringify(this.cookies));
    document.getElementById('cookie-modal-banner').remove();
    this.setServerCookies();
    this.pushConsentEvent();
  }

  pushConsentEvent() {
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({
      event: 'cookie_consent_update',
      cookie_consent: {
        essential: this.cookies.essential,
        analytics: this.cookies.analytics,
        marketing: this.cookies.marketing,
        functional: this.cookies.functional
      },
      consent_timestamp: new Date().toISOString(),
      consent_method: 'explicit'
    });
  }

  setServerCookies() {
    Object.entries(this.cookies).forEach(([key, value]) => {
      document.cookie = `consent_${key}=${value}; path=/; max-age=${365 * 24 * 60 * 60}`;
    });
  }

  getConsent(type) {
    return this.cookies[type] || false;
  }

  readCookies() {
    return this.cookies;
  }
}

// Initialize on DOM ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => {
    window.cookieBanner = new CookieBannerModal();
  });
} else {
  window.cookieBanner = new CookieBannerModal();
}
