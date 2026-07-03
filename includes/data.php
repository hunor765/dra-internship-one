<?php
/**
 * Dummy data store for the "Sprout & Spade" gardening shop.
 *
 * Everything here is fictional. No database is used — this file is the
 * single source of truth for categories, products and product variants.
 *
 * Product shape follows the GA4 ecommerce "item" convention so it maps
 * cleanly onto the dataLayer (item_id, item_name, item_brand, price, etc.).
 */

$STORE = [
    'name'     => 'Sprout & Spade',
    'currency' => 'USD',
];

/* ---------------------------------------------------------------------------
 * Categories
 * ------------------------------------------------------------------------ */
$CATEGORIES = [
    'seeds-bulbs' => [
        'id'    => 'seeds-bulbs',
        'name'  => 'Seeds & Bulbs',
        'blurb' => 'Heirloom seeds and premium bulbs to start your garden from scratch.',
        'color' => '#e07a5f',
        'icon'  => '🌱',
    ],
    'tools-equipment' => [
        'id'    => 'tools-equipment',
        'name'  => 'Tools & Equipment',
        'blurb' => 'Durable, ergonomic tools built for a lifetime of gardening.',
        'color' => '#3d5a40',
        'icon'  => '🛠️',
    ],
    'planters-pots' => [
        'id'    => 'planters-pots',
        'name'  => 'Planters & Pots',
        'blurb' => 'Terracotta, ceramic and self-watering planters for every space.',
        'color' => '#c9814b',
        'icon'  => '🪴',
    ],
    'soil-fertilizer' => [
        'id'    => 'soil-fertilizer',
        'name'  => 'Soil & Fertilizer',
        'blurb' => 'Organic compost, potting mixes and plant food that actually work.',
        'color' => '#6b4f3a',
        'icon'  => '🌾',
    ],
];

/* ---------------------------------------------------------------------------
 * Products
 *
 * "variants" is an optional list of selectable options. When present the
 * product page renders a variant selector and the chosen variant name is
 * sent to GA4 as item_variant.
 * ------------------------------------------------------------------------ */
$PRODUCTS = [
    /* ---- Seeds & Bulbs ------------------------------------------------ */
    'SKU-TOM-001' => [
        'id'       => 'SKU-TOM-001',
        'name'     => 'Heirloom Tomato Seeds',
        'brand'    => 'Sprout & Spade',
        'category' => 'seeds-bulbs',
        'price'    => 4.95,
        'rating'   => 4.8,
        'desc'     => 'A collector\'s pack of open-pollinated heirloom tomato seeds. Non-GMO, untreated, and saved from three generations of imaginary family gardens.',
        'variants' => [
            ['id' => 'beefsteak', 'name' => 'Beefsteak'],
            ['id' => 'cherry',    'name' => 'Cherry'],
            ['id' => 'roma',      'name' => 'Roma'],
        ],
    ],
    'SKU-SUN-002' => [
        'id'       => 'SKU-SUN-002',
        'name'     => 'Giant Sunflower Seed Mix',
        'brand'    => 'Sprout & Spade',
        'category' => 'seeds-bulbs',
        'price'    => 3.50,
        'rating'   => 4.6,
        'desc'     => 'A cheerful blend of towering sunflower varieties reaching up to 12 ft. Pollinator-friendly and impossible to get wrong.',
        'variants' => [],
    ],
    'SKU-TUL-003' => [
        'id'       => 'SKU-TUL-003',
        'name'     => 'Tulip Bulb Collection',
        'brand'    => 'Sprout & Spade',
        'category' => 'seeds-bulbs',
        'price'    => 12.00,
        'rating'   => 4.9,
        'desc'     => 'Twenty premium tulip bulbs for a riot of spring colour. Pre-chilled and ready to plant.',
        'variants' => [
            ['id' => 'red',    'name' => 'Scarlet Red'],
            ['id' => 'yellow', 'name' => 'Golden Yellow'],
            ['id' => 'mixed',  'name' => 'Rainbow Mixed'],
        ],
    ],

    /* ---- Tools & Equipment -------------------------------------------- */
    'SKU-TRO-004' => [
        'id'       => 'SKU-TRO-004',
        'name'     => 'Stainless Steel Hand Trowel',
        'brand'    => 'IronLeaf',
        'category' => 'tools-equipment',
        'price'    => 16.90,
        'rating'   => 4.7,
        'desc'     => 'A forged stainless steel trowel with an ergonomic ash-wood handle. Depth markings etched into the blade for precise planting.',
        'variants' => [],
    ],
    'SKU-PRU-005' => [
        'id'       => 'SKU-PRU-005',
        'name'     => 'Ergonomic Bypass Pruning Shears',
        'brand'    => 'IronLeaf',
        'category' => 'tools-equipment',
        'price'    => 24.99,
        'rating'   => 4.8,
        'desc'     => 'Precision bypass shears with a sap groove and shock-absorbing spring. Cuts branches up to ¾ inch clean every time.',
        'variants' => [
            ['id' => 'standard', 'name' => 'Standard Grip'],
            ['id' => 'compact',  'name' => 'Compact Grip'],
        ],
    ],
    'SKU-RAK-006' => [
        'id'       => 'SKU-RAK-006',
        'name'     => 'Bamboo Leaf Rake',
        'brand'    => 'IronLeaf',
        'category' => 'tools-equipment',
        'price'    => 21.00,
        'rating'   => 4.4,
        'desc'     => 'A lightweight, springy bamboo rake that gathers leaves without shredding your lawn. Fully compostable at end of life.',
        'variants' => [],
    ],

    /* ---- Planters & Pots ---------------------------------------------- */
    'SKU-TER-007' => [
        'id'       => 'SKU-TER-007',
        'name'     => 'Terracotta Pot Set',
        'brand'    => 'ClayWorks',
        'category' => 'planters-pots',
        'price'    => 28.50,
        'rating'   => 4.5,
        'desc'     => 'A nesting set of hand-thrown terracotta pots with drainage holes and matching saucers. Ages beautifully with a natural patina.',
        'variants' => [
            ['id' => 'small',  'name' => 'Small (3-pack)'],
            ['id' => 'medium', 'name' => 'Medium (2-pack)'],
            ['id' => 'large',  'name' => 'Large (single)'],
        ],
    ],
    'SKU-SLF-008' => [
        'id'       => 'SKU-SLF-008',
        'name'     => 'Self-Watering Planter',
        'brand'    => 'ClayWorks',
        'category' => 'planters-pots',
        'price'    => 34.00,
        'rating'   => 4.7,
        'desc'     => 'A modern planter with a hidden reservoir that waters your plants for up to two weeks. Perfect for forgetful plant parents.',
        'variants' => [
            ['id' => 'white',    'name' => 'Matte White'],
            ['id' => 'charcoal', 'name' => 'Charcoal'],
        ],
    ],
    'SKU-HNG-009' => [
        'id'       => 'SKU-HNG-009',
        'name'     => 'Woven Hanging Basket',
        'brand'    => 'ClayWorks',
        'category' => 'planters-pots',
        'price'    => 18.75,
        'rating'   => 4.3,
        'desc'     => 'A coco-lined wire hanging basket with an adjustable chain. Ideal for trailing flowers and strawberries on a balcony.',
        'variants' => [],
    ],

    /* ---- Soil & Fertilizer -------------------------------------------- */
    'SKU-CMP-010' => [
        'id'       => 'SKU-CMP-010',
        'name'     => 'Organic Compost Mix',
        'brand'    => 'EarthGood',
        'category' => 'soil-fertilizer',
        'price'    => 9.95,
        'rating'   => 4.6,
        'desc'     => 'A rich, screened compost teeming with (imaginary) beneficial microbes. Peat-free and sustainably produced.',
        'variants' => [],
    ],
    'SKU-POT-011' => [
        'id'       => 'SKU-POT-011',
        'name'     => 'All-Purpose Potting Soil',
        'brand'    => 'EarthGood',
        'category' => 'soil-fertilizer',
        'price'    => 11.50,
        'rating'   => 4.5,
        'desc'     => 'A fluffy, well-draining potting mix with added coir and perlite. Works for everything from seedlings to houseplants.',
        'variants' => [
            ['id' => '10l', 'name' => '10 Litre Bag'],
            ['id' => '25l', 'name' => '25 Litre Bag'],
        ],
    ],
    'SKU-FRT-012' => [
        'id'       => 'SKU-FRT-012',
        'name'     => 'Liquid Plant Food',
        'brand'    => 'EarthGood',
        'category' => 'soil-fertilizer',
        'price'    => 7.25,
        'rating'   => 4.4,
        'desc'     => 'A balanced, seaweed-based liquid feed that greens things up fast. One capful per watering can.',
        'variants' => [],
    ],
];

/* ---------------------------------------------------------------------------
 * Promotions (used for view_promotion / select_promotion events)
 * ------------------------------------------------------------------------ */
$PROMOTIONS = [
    [
        'promotion_id'   => 'PROMO_SPRING25',
        'promotion_name' => 'Spring Planting Sale',
        'creative_name'  => 'hero_banner',
        'creative_slot'  => 'homepage_hero',
    ],
];
