<?php

return [
    // 1 USD = this many points
    'points_per_usd' => (int) env('POINTS_PER_USD', 1000),
    // Minimum withdrawal in USD
    'min_withdraw' => (float) env('MIN_WITHDRAW', 5),
    'methods' => ['PayPal', 'Bitcoin (BTC)', 'USDT (TRC20)', 'Bank Transfer', 'Payoneer'],
    // Points the referrer receives when someone signs up with their link
    'signup_bonus' => (int) env('REFERRAL_SIGNUP_BONUS', 100),
    // % of every offer/task point the referred user earns that also goes to the referrer
    'referral_percent' => (int) env('REFERRAL_PERCENT', 10),
    // Built-in sample offers so Start Earning works before real offerwall URLs are added.
    // Turn OFF in production (DEMO_OFFERS=false): users could otherwise credit themselves.
    'demo_offers' => (bool) env('DEMO_OFFERS', env('APP_ENV') === 'local'),
    // Shared secret that offerwall postbacks must send as ?secret=
    'postback_secret' => env('OFFERWALL_POSTBACK_SECRET', ''),
];
