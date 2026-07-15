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

/* ---------------------------------------------------------------------------
 * Contact details (contact.php)
 * ------------------------------------------------------------------------ */
$CONTACT = [
    'email'    => 'hello@sproutandspade.example',
    'phone'    => '+44 20 7946 0321',
    'hours'    => 'Mon–Fri, 9am–5pm (GMT)',
    'address'  => "Sprout & Spade Ltd\n4 Potting Shed Yard\nRootstown GR0 1WN\nUnited Kingdom",
    'subjects' => [
        'Order enquiry',
        'Plant & growing advice',
        'Returns and refunds',
        'Wholesale & trade',
        'Something else',
    ],
];

/* ---------------------------------------------------------------------------
 * Newsletter block (footer + inline placements)
 * ------------------------------------------------------------------------ */
$NEWSLETTER = [
    'heading' => 'Seasonal growing tips, once a month',
    'blurb'   => 'Sowing calendars, honest tool reviews and the occasional confession about a plant we killed. No spam, unsubscribe whenever.',
];

/* ---------------------------------------------------------------------------
 * Blog
 * ------------------------------------------------------------------------ */
$BLOG_META = [
    'title' => 'The Potting Bench',
    'intro' => 'Notes from our (imaginary) garden — what we sowed, what thrived, and what quietly gave up in the back of the greenhouse.',
];

$BLOG_POSTS = [
    'sowing-calendar-spring' => [
        'slug'      => 'sowing-calendar-spring',
        'title'     => 'A no-nonsense spring sowing calendar',
        'excerpt'   => 'Forget the 40-page planting charts. Here are the six weeks that actually matter, and what to put in the ground during each of them.',
        'author'    => 'Fern Ashby',
        'date'      => '12 March 2026',
        'category'  => 'Growing',
        'read_time' => 6,
        'icon'      => '🌱',
        'color'     => '#e07a5f',
        'body'      => [
            ['type' => 'p',  'text' => 'Every spring the same thing happens: we buy too many seeds, sow them all in one enthusiastic weekend, and then spend April apologising to a windowsill full of leggy seedlings. This year we are being disciplined, and we are dragging you with us.'],
            ['type' => 'h2', 'text' => 'Six weeks before your last frost'],
            ['type' => 'p',  'text' => 'This is tomato and chilli territory. They need a long run-up and a warm start, so get them going indoors on a heat mat or the top of the fridge. Sow two seeds per cell and pinch out the weaker one — it feels cruel, it is not.'],
            ['type' => 'p',  'text' => 'Resist the urge to start courgettes now. They will be enormous and unhappy by the time it is safe to plant them out, and an unhappy courgette is a remarkably sulky thing.'],
            ['type' => 'h2', 'text' => 'Four weeks before'],
            ['type' => 'p',  'text' => 'Brassicas, lettuce and the first round of hardy annuals. Lettuce germinates in cool soil and bolts in warm soil, so early is genuinely better here rather than merely convenient.'],
            ['type' => 'quote', 'text' => 'The best time to sow was two weeks ago. The second best time is this weekend, and that is the one you can actually do something about.'],
            ['type' => 'h2', 'text' => 'Two weeks before'],
            ['type' => 'p',  'text' => 'Start hardening off anything that has been living in the warmth. An hour outside on day one, a little longer each day. Skip this step and you will watch a month of careful work collapse in a single windy afternoon.'],
            ['type' => 'h2', 'text' => 'The week after your last frost'],
            ['type' => 'p',  'text' => 'Direct sow beans, squash and sunflowers straight into warm soil. They resent being transplanted and will overtake anything you started indoors within a fortnight, which is either encouraging or insulting depending on your mood.'],
            ['type' => 'p',  'text' => 'Write the dates on the packet as you go. Next February you will not remember, and the packet will.'],
        ],
    ],
    'peat-free-soil' => [
        'slug'      => 'peat-free-soil',
        'title'     => 'Going peat-free without ruining your seedlings',
        'excerpt'   => 'Peat-free compost behaves differently — it dries faster and feeds less. Here is how to adjust so the switch does not cost you a season.',
        'author'    => 'Rowan Bexley',
        'date'      => '2 February 2026',
        'category'  => 'Soil',
        'read_time' => 5,
        'icon'      => '🌾',
        'color'     => '#6b4f3a',
        'body'      => [
            ['type' => 'p',  'text' => 'The first year we went fully peat-free, half our seedlings sulked and we very nearly went back. The compost was not the problem. Our watering habits were.'],
            ['type' => 'h2', 'text' => 'It dries from the top down'],
            ['type' => 'p',  'text' => 'Peat holds water like a sponge and releases it slowly. Coir and bark-based mixes do not. The surface can look bone dry while the bottom of the pot is still perfectly damp, which tricks you into overwatering — the single fastest way to lose a tray of seedlings.'],
            ['type' => 'p',  'text' => 'Judge by weight, not by looks. Lift the tray. If it still feels heavy, walk away.'],
            ['type' => 'h2', 'text' => 'It runs out of food sooner'],
            ['type' => 'p',  'text' => 'Most peat-free mixes carry about six weeks of nutrition. After that your plants are living on whatever you give them. Start a weak liquid feed at week five and you will never notice the handover.'],
            ['type' => 'quote', 'text' => 'Peat-free is not harder. It is just differently timed, and the timing is the whole job.'],
            ['type' => 'h2', 'text' => 'Was it worth it?'],
            ['type' => 'p',  'text' => 'Peat bogs take millennia to form and are extraordinary carbon stores. Our tomatoes are not worth a bog. Three seasons in, our yields are identical and we no longer think about it at all.'],
        ],
    ],
    'tools-that-last' => [
        'slug'      => 'tools-that-last',
        'title'     => 'Buy once: how to spot a tool that will outlive you',
        'excerpt'   => 'Forged steel, a full tang, and a handle you can replace. Three tests that separate a lifetime trowel from landfill.',
        'author'    => 'Fern Ashby',
        'date'      => '18 January 2026',
        'category'  => 'Tools',
        'read_time' => 4,
        'icon'      => '🛠️',
        'color'     => '#3d5a40',
        'body'      => [
            ['type' => 'p',  'text' => 'A cheap trowel costs four pounds and lasts one season. A good one costs seventeen and gets handed to your grandchildren. The maths is not subtle, and yet here we all are in the bargain aisle.'],
            ['type' => 'h2', 'text' => 'Test one: is it forged or pressed?'],
            ['type' => 'p',  'text' => 'Pressed steel is stamped out of a flat sheet and bends the first time you lever a stubborn root. Forged steel is hammered into shape and has a visible thickness variation along the blade. Look at the spine — if it tapers, it was forged.'],
            ['type' => 'h2', 'text' => 'Test two: where does the metal stop?'],
            ['type' => 'p',  'text' => 'On a good tool the metal runs the full length of the handle. On a bad one it stops an inch in and is held by a crimp and some optimism. That crimp is where it will snap, usually while you are already annoyed about something else.'],
            ['type' => 'h2', 'text' => 'Test three: can you fix it?'],
            ['type' => 'p',  'text' => 'Riveted ash handles can be replaced with a drill and twenty minutes. Moulded plastic grips cannot be replaced with anything except a new tool. Ask yourself which of those two you would rather be holding in fifteen years.'],
            ['type' => 'quote', 'text' => 'The greenest tool in the shed is the one you already own and never had to replace.'],
        ],
    ],
    'balcony-gardening' => [
        'slug'      => 'balcony-gardening',
        'title'     => 'Everything you can genuinely grow on a balcony',
        'excerpt'   => 'No garden, four square metres, and a landlord. It is more than enough — here is the realistic list.',
        'author'    => 'Juniper Vale',
        'date'      => '4 January 2026',
        'category'  => 'Small spaces',
        'read_time' => 5,
        'icon'      => '🪴',
        'color'     => '#c9814b',
        'body'      => [
            ['type' => 'p',  'text' => 'People with balconies are told, repeatedly, that they can grow "herbs". This is true and deeply unambitious. You can grow a great deal more than a sad pot of basil.'],
            ['type' => 'h2', 'text' => 'Work out your light first'],
            ['type' => 'p',  'text' => 'Sit outside on a Saturday and note when the sun arrives and when it leaves. Six or more hours means tomatoes, chillies and strawberries are on the table. Three to four hours means salad, chard and mint — which is genuinely most of what you actually eat anyway.'],
            ['type' => 'h2', 'text' => 'Go deep, not wide'],
            ['type' => 'p',  'text' => 'Balcony growing fails on root depth far more often than on floor space. A 30cm-deep container will carry a tomato plant all summer. A shallow trough will not, no matter how wide it is or how often you water it.'],
            ['type' => 'h2', 'text' => 'Self-watering is not cheating'],
            ['type' => 'p',  'text' => 'Containers in wind and full sun can dry out in a single hot day. A reservoir planter buys you a fortnight of margin, which is the difference between a hobby and a daily obligation you quietly grow to resent.'],
            ['type' => 'quote', 'text' => 'Grow what you will actually walk outside and pick. Everything else is decoration.'],
        ],
    ],
];

/* ---------------------------------------------------------------------------
 * Store locations
 * ------------------------------------------------------------------------ */
$LOCATIONS = [
    'rootstown-flagship' => [
        'id'          => 'rootstown-flagship',
        'name'        => 'Rootstown Garden Centre',
        'city'        => 'Rootstown',
        'country'     => 'United Kingdom',
        'address'     => '4 Potting Shed Yard',
        'phone'       => '+44 20 7946 0321',
        'hours_short' => 'Open daily · 9am–6pm',
        'flagship'    => true,
        'icon'        => '🌿',
        'color'       => '#3d5a40',
        'blurb'       => 'Our original shop and still the biggest: a glasshouse, two acres of open beds, and a potting bench where you can try every tool we sell before you buy it.',
        'services'    => [
            'Full glasshouse and outdoor nursery',
            'Free soil pH testing while you wait',
            'Tool sharpening every Saturday morning',
            'Weekend sowing workshops',
            'Click & collect within two hours',
        ],
        'hours'       => [
            'Monday'    => '9:00 – 18:00',
            'Tuesday'   => '9:00 – 18:00',
            'Wednesday' => '9:00 – 18:00',
            'Thursday'  => '9:00 – 20:00',
            'Friday'    => '9:00 – 18:00',
            'Saturday'  => '8:30 – 18:00',
            'Sunday'    => '10:00 – 16:00',
        ],
    ],
    'mossgate-city' => [
        'id'          => 'mossgate-city',
        'name'        => 'Mossgate City Store',
        'city'        => 'Mossgate',
        'country'     => 'United Kingdom',
        'address'     => '88 Kiln Street',
        'phone'       => '+44 161 496 0117',
        'hours_short' => 'Mon–Sat · 8am–7pm',
        'flagship'    => false,
        'icon'        => '🪴',
        'color'       => '#c9814b',
        'blurb'       => 'A compact city shop built for balcony growers and windowsill optimists. Heavy on planters, compact tools and anything that thrives in four square metres.',
        'services'    => [
            'Balcony and container specialists',
            'Houseplant clinic on Thursdays',
            'Same-day delivery within the city',
            'Compost refill station — bring your own tub',
        ],
        'hours'       => [
            'Monday'    => '8:00 – 19:00',
            'Tuesday'   => '8:00 – 19:00',
            'Wednesday' => '8:00 – 19:00',
            'Thursday'  => '8:00 – 19:00',
            'Friday'    => '8:00 – 19:00',
            'Saturday'  => '9:00 – 18:00',
            'Sunday'    => 'Closed',
        ],
    ],
    'thornfield-nursery' => [
        'id'          => 'thornfield-nursery',
        'name'        => 'Thornfield Nursery',
        'city'        => 'Thornfield',
        'country'     => 'United Kingdom',
        'address'     => 'Long Meadow Lane',
        'phone'       => '+44 1263 555 084',
        'hours_short' => 'Wed–Sun · 9am–5pm',
        'flagship'    => false,
        'icon'        => '🌻',
        'color'       => '#e07a5f',
        'blurb'       => 'Our growing site, open to the public five days a week. This is where the seed stock is trialled, so expect to find varieties that have not reached the other shops yet.',
        'services'    => [
            'Trial beds open to visitors',
            'Bulk soil and compost by the bag or barrow',
            'Bare-root and seasonal plant sales',
            'Seed-saving talks in late summer',
        ],
        'hours'       => [
            'Monday'    => 'Closed',
            'Tuesday'   => 'Closed',
            'Wednesday' => '9:00 – 17:00',
            'Thursday'  => '9:00 – 17:00',
            'Friday'    => '9:00 – 17:00',
            'Saturday'  => '9:00 – 17:00',
            'Sunday'    => '10:00 – 16:00',
        ],
    ],
];
