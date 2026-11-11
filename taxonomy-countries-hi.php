<?php
/* Template Name: हिन्दी — Gold Country Prices */

/** HI output localization: translate rendered text and accessible labels only. */
if (!function_exists('altaqrer_gold_hi_output_translate')) {
function altaqrer_gold_hi_output_translate($html) {
    $map = array(
        "Live foreign exchange rates for major international and regional currencies" => "प्रमुख अंतरराष्ट्रीय और क्षेत्रीय मुद्राओं की लाइव विनिमय दरें",
        "International spot benchmark for one troy ounce of 24K gold, quoted in USD" => "24 कैरेट सोने के एक ट्रॉय औंस का अंतरराष्ट्रीय स्पॉट मानक, USD में",
        "What weight is used for the gold coin calculation?" => "सोने के सिक्के की गणना के लिए कौन सा वज़न उपयोग किया जाता है?",
        "Does the displayed value include a dealer premium?" => "क्या दिखाई गई कीमत में विक्रेता का प्रीमियम शामिल है?",
        "Sorry, the market data is currently unavailable." => "क्षमा करें, बाज़ार का डेटा अभी उपलब्ध नहीं है।",
        "live market price, excluding making charges" => "मेकिंग चार्ज के बिना लाइव बाज़ार कीमत",
        "How to read the local and USD prices" => "स्थानीय और USD कीमतों को कैसे समझें",
        "Frequently asked questions" => "अक्सर पूछे जाने वाले प्रश्न",
        "Gold Bullion Bar Prices in" => "में सोने की छड़ों की कीमतें",
        "Gold Price per Gram Today" => "आज प्रति ग्राम सोने की कीमत",
        "Join Our Telegram Channel" => "हमारे टेलीग्राम चैनल से जुड़ें",
        "Excluding Making Charges" => "मेकिंग चार्ज के बिना",
        "Gold Bullion Bar Prices" => "सोने की छड़ों की कीमतें",
        "Gold Bars and Coins in" => "में सोने की छड़ें और सिक्के",
        "USD and Currency Rates" => "USD और मुद्रा दरें",
        "Regional Gold Prices" => "क्षेत्रीय सोने की कीमतें",
        "Gold Bars and Coins" => "सोने की छड़ें और सिक्के",
        "Gold Price Sections" => "सोने की कीमत के अनुभाग",
        "Gold Price Chart in" => "में सोने की कीमत का चार्ट",
        "About AlTaqrer Gold" => "AlTaqrer Gold के बारे में",
        "All rights reserved" => "सर्वाधिकार सुरक्षित",
        "Related gold prices" => "संबंधित सोने की कीमतें",
        "Gold Coin Prices in" => "में सोने के सिक्कों की कीमतें",
        "Gold Price Today in" => "में आज सोने की कीमत",
        "Global Gold Ounce" => "वैश्विक सोने का औंस",
        "Gold Coin Prices" => "सोने के सिक्कों की कीमतें",
        "Gold Price Chart" => "सोने की कीमत का चार्ट",
        "Gold Price Today" => "आज सोने की कीमत",
        "Important Links" => "महत्वपूर्ण लिंक",
        "Reference date:" => "संदर्भ तिथि:",
        "Live Gold Index" => "लाइव सोना सूचकांक",
        "Local Currency" => "स्थानीय मुद्रा",
        "Privacy Policy" => "गोपनीयता नीति",
        "Gold Prices in" => "में सोने की कीमतें",
        "All Countries" => "सभी देश",
        "Weight / Type" => "वज़न / प्रकार",
        "Terms of Use" => "उपयोग की शर्तें",
        "Gold Prices" => "सोने की कीमतें",
        "Live Prices" => "लाइव कीमतें",
        "Coin Purity" => "सिक्के की शुद्धता",
        "Gold Price" => "सोने की कीमत",
        "Gold Index" => "सोना सूचकांक",
        "Important:" => "महत्वपूर्ण:",
        "Contact Us" => "संपर्क करें",
        "Gold Bars" => "सोने की छड़ें",
        "Gold Coin" => "सोने का सिक्का",
        "Countries" => "देश",
        "USD Rates" => "USD विनिमय दरें",
        "Follow Us" => "हमें फ़ॉलो करें",
        "What does" => "का क्या अर्थ है",
        "Today in" => "आज",
        "per Gram" => "प्रति ग्राम",
        "Price" => "कीमत",
        "Home" => "होम",
        "Yes." => "हाँ।",
        "Important Notice:" => "महत्वपूर्ण सूचना:",
        "Live Price" => "लाइव कीमत",
        "Highest Price" => "सबसे अधिक कीमत",
        "Lowest Price" => "सबसे कम कीमत",
        "Change" => "बदलाव",
        "Live Update" => "लाइव अपडेट",
        "Price in USD" => "USD में कीमत",
        "Gold Ounce in Local Currency" => "स्थानीय मुद्रा में सोने का औंस",
        "Gold Coin Price" => "सोने के सिक्के की कीमत",
        "US Dollar Rate" => "अमेरिकी डॉलर की दर",
        "US Dollar Rate Today" => "आज अमेरिकी डॉलर की दर",
        "Gold Price in USD" => "USD में सोने की कीमत",
        "Egyptian Pound" => "मिस्री पाउंड",
        "US Dollar" => "अमेरिकी डॉलर",
        "Most Traded" => "सबसे अधिक कारोबार",
        "Gold Price" => "सोने की कीमत",
        "home" => "होम",
        "Gold Bar — 1 Gram" => "सोने की छड़ — 1 ग्राम",
        "Gold Bar — 2.5 Grams" => "सोने की छड़ — 2.5 ग्राम",
        "Gold Bar — 5 Grams" => "सोने की छड़ — 5 ग्राम",
        "Gold Bar — 10 Grams" => "सोने की छड़ — 10 ग्राम",
        "Gold Bar — 20 Grams" => "सोने की छड़ — 20 ग्राम",
        "Gold Bar — 50 Grams" => "सोने की छड़ — 50 ग्राम",
        "Gold Bar — 100 Grams" => "सोने की छड़ — 100 ग्राम",
        "Troy Ounce (31.1 g)" => "ट्रॉय औंस (31.1 ग्राम)",
        "24K Gold" => "24 कैरेट सोना",
        "22K Gold" => "22 कैरेट सोना",
        "21K Gold" => "21 कैरेट सोना",
        "18K Gold" => "18 कैरेट सोना",
        "14K Gold" => "14 कैरेट सोना",
        "12K Gold" => "12 कैरेट सोना",
        "Gold Gram" => "सोने का ग्राम",
        "Gold Ounce" => "सोने का औंस",
        "Prices" => "कीमतें",
        "Changes" => "बदलाव",
        "No." => "नहीं।"
    );

    // Match complete English terms/phrases only; never replace a fragment inside a larger word.
    // Longer phrases are tested first so specific labels take precedence over shorter entries.
    $translation_keys = array_keys($map);
    usort($translation_keys, function($a, $b) {
        return strlen($b) - strlen($a);
    });
    $translation_patterns = array();
    foreach ($translation_keys as $translation_key) {
        $translation_pattern = preg_quote($translation_key, '~');
        if (preg_match('/^[\\p{L}\\p{N}_]/u', $translation_key)) {
            $translation_pattern = '(?<![\\p{L}\\p{N}_])' . $translation_pattern;
        }
        if (preg_match('/[\\p{L}\\p{N}_]$/u', $translation_key)) {
            $translation_pattern .= '(?![\\p{L}\\p{N}_])';
        }
        $translation_patterns[] = $translation_pattern;
    }
    $translation_regex = '~' . implode('|', $translation_patterns) . '~u';
    $translate_text = function($text) use ($map, $translation_regex) {
        return preg_replace_callback($translation_regex, function($matches) use ($map) {
            return $map[$matches[0]];
        }, $text);
    };

    $protected = array();
    $html = preg_replace_callback('~<!--.*?-->|<(script|style)\\b[^>]*>.*?</\\1\\s*>~is', function($m) use (&$protected) {
        $token = 'ALTQRGOLDHIBLOCK' . count($protected) . 'TOKEN';
        $protected[$token] = $m[0];
        return $token;
    }, $html);
    $html = preg_replace_callback('~>([^<>]+)<~u', function($m) use ($translate_text) {
        return '>' . $translate_text($m[1]) . '<';
    }, $html);
    $html = preg_replace_callback("~\\b(alt|title|aria-label|placeholder)\\s*=\\s*([\\\"'])(.*?)\\2~isu", function($m) use ($translate_text) {
        return $m[1] . '=' . $m[2] . $translate_text($m[3]) . $m[2];
    }, $html);
    return !empty($protected) ? strtr($html, $protected) : $html;
}}
ob_start('altaqrer_gold_hi_output_translate');

/**
 * Standalone English header for the country gold-price template.
 * The Arabic theme header and navigation are not loaded here.
 */
$hi_header_term = get_queried_object();
$hi_header_country_slug = (is_object($hi_header_term) && !empty($hi_header_term->slug))
    ? sanitize_title($hi_header_term->slug)
    : '';
if ($hi_header_country_slug === '' && is_object($hi_header_term) && !empty($hi_header_term->term_id)) {
    $hi_header_country_slug = strtolower((string) get_term_meta((int) $hi_header_term->term_id, 'country_code', true));
}
if ($hi_header_country_slug === '') {
    $hi_header_country_slug = 'eg';
}
$hi_header_country_url = home_url('/hi/country/' . rawurlencode($hi_header_country_slug) . '/');
$hi_header_home_url = home_url('/hi/');
$hi_header_accent = get_theme_mod('infi_default_color', '#ffb301');
$hi_header_logo_id = (int) get_theme_mod('custom_logo');
$hi_header_is_app = (isset($_GET['view']) && sanitize_text_field(wp_unslash($_GET['view'])) === 'app');
?>
<!DOCTYPE html>
<html lang="hi" dir="ltr">
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#ffffff">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link rel="manifest" href="<?php echo esc_url(site_url('/manifest.json')); ?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(get_site_icon_url(32)); ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url(get_site_icon_url(16)); ?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(get_site_icon_url(180)); ?>">
<link rel="shortcut icon" href="<?php echo esc_url(get_site_icon_url()); ?>" type="image/x-icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet';">
<noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"></noscript>
<?php
// Preserve the original working AdSense header output and app-view condition.
$ad_options = get_option('adsense_header_settings');
$ad_code    = isset($ad_options['adsense_code']) ? $ad_options['adsense_code'] : '';
$is_enabled = isset($ad_options['enable_adsense']) ? $ad_options['enable_adsense'] : 0;

if ($is_enabled && !empty($ad_code) && !(isset($_GET['view']) && sanitize_text_field(wp_unslash($_GET['view'])) === 'app')) {
    echo "\n<!-- بداية كود أدسنس (Header) -->\n";
    echo $ad_code;
    echo "\n<!-- نهاية كود أدسنس -->\n";
}
?>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() . '/style.css?v=1sz'); ?>" data-navigate-track="reload">
<script type="application/ld+json">
<?php echo wp_json_encode(array(
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'AlTaqrer Gold',
    'url' => $hi_header_home_url,
    'sameAs' => array('https://www.instagram.com/altaqrergold', 'https://www.facebook.com/altaqrergold')
), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>
<style>
html, body { direction:ltr; text-align:left; }
body { background:#f5d771 !important; max-width:100vw; overflow-x:hidden; position:relative; font-family:Inter,Arial,sans-serif; }
.hi-site-header { position:relative; z-index:1000; background:#1a1a1a; border-bottom:4px solid <?php echo esc_attr($hi_header_accent); ?>; color:#fff; }
.hi-site-header-inner { max-width:1200px; width:95%; margin:0 auto; min-height:74px; display:flex; align-items:center; justify-content:space-between; gap:18px; padding:10px 0; }
.en-brand { display:flex; align-items:center; gap:10px; color:#fff; text-decoration:none; font-weight:800; font-size:20px; white-space:nowrap; }
.en-brand img { max-width:54px; max-height:54px; width:auto; height:auto; object-fit:contain; }
.hi-main-nav { display:flex; align-items:center; justify-content:flex-end; gap:8px; flex-wrap:wrap; }
.hi-main-nav a, .hi-country-toggle { color:#fff; text-decoration:none; border:1px solid rgba(255,255,255,.15); background:transparent; border-radius:6px; padding:9px 12px; font:600 13px Inter,Arial,sans-serif; cursor:pointer; }
.hi-main-nav a:hover, .hi-country-toggle:hover { color:#1a1a1a; background:<?php echo esc_attr($hi_header_accent); ?>; }
.hi-country-wrap { position:relative; }
.hi-country-menu { display:none; position:absolute; top:calc(100% + 6px); left:0; min-width:210px; background:#202329; border:1px solid #444; border-radius:7px; padding:7px; box-shadow:0 8px 24px rgba(0,0,0,.25); z-index:10000; }
.hi-country-menu a { display:block; border:0; border-radius:4px; text-align:left; }
.hi-country-menu.is-open { display:block; }
@media(max-width:760px) { .hi-site-header-inner { align-items:flex-start; flex-direction:column; } .hi-main-nav { justify-content:flex-start; width:100%; } .hi-main-nav a,.hi-country-toggle { padding:8px 10px; } }
@media(max-width:480px) { .hi-main-nav { gap:6px; } .hi-main-nav a,.hi-country-toggle { font-size:12px; } }
.gold-tabs-nav { display:flex; justify-content:center; flex-wrap:wrap; gap:5px; }
.gold-tab-btn { flex:1 1 auto; text-align:center; background:#fff8e1; border:1px solid #dfb551; padding:10px 0; cursor:pointer; font-weight:bold; border-radius:6px; transition:.3s; color:#3a2e0a; }
.gold-tab-btn.active { background:#b8860b; color:#fff; border-color:#b8860b; }
.gold-section { margin-bottom:25px; }
#tab-buy-sell > h2, #tab-buy-sell > h3 { text-align:left !important; direction:ltr !important; }
.section-header { display:flex; justify-content:space-between; align-items:center; background:#b8860b; padding:12px 15px; border-radius:8px 8px 0 0; border:1px solid #b8860b; color:#fff; }
.section-header h4 { margin:0; font-size:18px; font-weight:bold; color:#fff; }
.date-badge { background:#fff8e1; padding:2px 8px; border-radius:4px; font-size:12px; color:#b8860b; font-weight:bold; }
.table-responsive { overflow-x:auto; }
.gold-table { width:100%; background:#fff8e1; border-collapse:collapse; border:1px solid #dfb551; border-radius:0 0 8px 8px; }
.gold-table thead { background:#dfb551; }
.gold-table th { padding:12px; color:#2c2107; border-bottom:2px solid #b8860b; font-size:15px; text-align:center; }
.gold-table td { padding:12px; border-bottom:1px solid #dfb551; color:#3a2e0a; text-align:center; vertical-align:middle; }
.gold-table tr:last-child td { border-bottom:none; }
.gold-table tr:hover { background:#ffe8b3; }
.font-bold { font-weight:bold; text-align:left !important; }
.price-cell { font-weight:bold; color:#b8860b; font-size:16px; }
.usd-cell { font-weight:bold; color:#2c2107; font-size:16px; direction:ltr; }
.raw-gold-alert { background:#fff8e1; border:1px solid #dfb551; border-left:5px solid #b8860b; color:#5a4a1b; padding:15px; border-radius:4px; font-size:14px; line-height:1.6; box-shadow:0 2px 5px rgba(0,0,0,.05); }
.alert-icon { font-size:18px; margin-right:5px; }
.hi-seo-article { max-width:900px; width:95%; box-sizing:border-box; margin:28px auto; padding:24px; color:#e5e7eb; background:#1f2126; border:1px solid #343944; border-left:5px solid <?php echo esc_attr($hi_header_accent); ?>; border-radius:9px; line-height:1.85; font-size:15px; }
.hi-seo-article h2,.hi-seo-article h3 { color:#fff; line-height:1.35; }
.hi-seo-article h2 { font-size:23px; margin:0 0 14px; }
.hi-seo-article h3 { font-size:18px; margin:22px 0 8px; }
.hi-seo-article p { margin:0 0 13px; }
.hi-seo-article a { color:<?php echo esc_attr($hi_header_accent); ?>; text-decoration:none; font-weight:700; }
.hi-seo-article a:hover { text-decoration:underline; }
.hi-seo-article details { border-top:1px solid #3a3f4d; padding:11px 0; }
.hi-seo-article summary { cursor:pointer; color:#fff; font-weight:700; }
.hi-seo-article details p { margin:8px 0 0; color:#cbd5e1; }
.hi-site-footer { margin-top:32px; background:#1a1a1a; color:#eee; border-top:4px solid <?php echo esc_attr($hi_header_accent); ?>; }
.hi-site-footer-inner { max-width:1200px; width:95%; margin:0 auto; padding:28px 0 18px; display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:24px; }
.hi-site-footer h3 { color:#e0b94f; font-size:16px; margin:0 0 12px; }
.hi-site-footer p,.hi-site-footer li { color:#c8c8c8; font-size:13px; line-height:1.8; }
.hi-site-footer ul { list-style:none; padding:0; margin:0; }
.hi-site-footer a { color:#e0b94f; text-decoration:none; }
.hi-site-footer a:hover { text-decoration:underline; }
.hi-footer-bottom { text-align:center; border-top:1px solid #393939; padding:15px 10px; font-size:13px; color:#c8c8c8; }
@media(max-width:768px) { .hi-site-footer-inner { grid-template-columns:1fr; gap:18px; text-align:center; } }
</style>
</head>
<body <?php body_class('hi-gold-template'); ?>>
<?php if (function_exists('wp_body_open')) { wp_body_open(); } ?>

<?php if (!$hi_header_is_app) : ?>
<header class="hi-site-header">
  <div class="hi-site-header-inner">
    <a class="en-brand" href="<?php echo esc_url($hi_header_home_url); ?>" aria-label="AlTaqrer Gold home">
      <?php if ($hi_header_logo_id) : ?>
        <?php echo wp_get_attachment_image($hi_header_logo_id, 'full', false, array('alt' => 'AlTaqrer Gold')); ?>
      <?php else : ?>
        <span>AlTaqrer Gold</span>
      <?php endif; ?>
    </a>
    <nav class="hi-main-nav" aria-label="Main navigation">
      <a href="<?php echo esc_url($hi_header_home_url); ?>">होम</a>
      <a href="<?php echo esc_url($hi_header_country_url); ?>">सोने की कीमतें</a>
      <a href="<?php echo esc_url($hi_header_country_url . 'gold-bars/'); ?>">सोने की छड़ें</a>
      <a href="<?php echo esc_url($hi_header_country_url . 'gold-index/'); ?>">सोना सूचकांक</a>
      <a href="<?php echo esc_url($hi_header_country_url . 'usd/'); ?>">USD विनिमय दरें</a>
      <div class="hi-country-wrap">
        <button class="hi-country-toggle" type="button" aria-expanded="false" aria-controls="hi-country-menu">Countries ▾</button>
        <div class="hi-country-menu" id="hi-country-menu">
          <a href="<?php echo esc_url(home_url('/hi/country/eg/')); ?>">मिस्र</a>
          <a href="<?php echo esc_url(home_url('/hi/country/sa/')); ?>">सऊदी अरब</a>
          <a href="<?php echo esc_url(home_url('/hi/country/ae/')); ?>">संयुक्त अरब अमीरात</a>
          <a href="<?php echo esc_url(home_url('/hi/country/kw/')); ?>">कुवैत</a>
          <a href="<?php echo esc_url($hi_header_home_url); ?>">सभी देश</a>
        </div>
      </div>
    </nav>
  </div>
</header>
<?php endif; ?>

<?php
/**
 * Place the existing Customizer advertisement immediately below the English
 * title/logo and navigation. Do not duplicate the AdSenseHeaderManager output.
 */
if (!$hi_header_is_app && function_exists('goldnow_display_ad')) :
?>
<div class="en-top-header-ad" style="width:100%;max-width:1200px;margin:0 auto;padding:10px 8px;box-sizing:border-box;text-align:center;direction:ltr;clear:both;">
    <?php goldnow_display_ad('below_navbar'); ?>
</div>
<?php endif; ?>

<?php
/**
 * English-only text adapter for shortcode HTML.
 * It translates visible text and accessibility labels only; URLs, HTML structure,
 * CSS and JavaScript are deliberately left untouched.
 */
if (!function_exists('altaqrer_gold_hi_translate_shortcode_html')) {
    function altaqrer_gold_hi_translate_shortcode_html($html, $translations = array()) {
        if (!is_string($html) || $html === '' || empty($translations) || !is_array($translations)) {
            return $html;
        }

        $protected = array();
        $html = preg_replace_callback('~<!--.*?-->|<(script|style)\\b[^>]*>.*?</\\1\\s*>~is', function ($m) use (&$protected) {
            $token = 'ALTQRGOLDENBLOCK' . count($protected) . 'TOKEN';
            $protected[$token] = $m[0];
            return $token;
        }, $html);

        // Translate text nodes only, never href/src or other structural attributes.
        $html = preg_replace_callback('~>([^<>]+)<~u', function ($m) use ($translations) {
            return '>' . strtr($m[1], $translations) . '<';
        }, $html);

        // Translate visible/accessibility attributes only.
        $html = preg_replace_callback("~\\b(alt|title|aria-label|placeholder)\\s*=\\s*([\"'])(.*?)\\2~isu", function ($m) use ($translations) {
            return $m[1] . '=' . $m[2] . strtr($m[3], $translations) . $m[2];
        }, $html);

        if (!empty($protected)) {
            $html = strtr($html, $protected);
        }
        return $html;
    }
}
?>

<main class="p-0 font-2">
  <div class="container home px-2">
    <?php
    // 1) Resolve the current country safely and use its English taxonomy metadata.
    $current_term = get_queried_object();
    $arabic_country_name = (is_object($current_term) && isset($current_term->name)) ? (string) $current_term->name : '';
    $term_id = (is_object($current_term) && isset($current_term->term_id)) ? (int) $current_term->term_id : 0;

    $english_name = $term_id ? (string) get_term_meta($term_id, 'country_english_name', true) : '';
    $localized_country_name = (is_object($current_term) && function_exists('altaqrer_ml_country_name'))
        ? (string) altaqrer_ml_country_name($current_term, 'hi')
        : '';
    $country_code = $term_id ? (string) get_term_meta($term_id, 'country_code', true) : '';
    $country_flag = $term_id ? (string) get_term_meta($term_id, 'country_flag', true) : '';
    $country_currency = $term_id ? strtoupper((string) get_term_meta($term_id, 'country_currency', true)) : '';

    // Never fall back to an Arabic taxonomy name on an English URL.
    $country_fallback = '';
    if (is_object($current_term) && !empty($current_term->slug)) {
        $country_fallback = ucwords(str_replace(array('-', '_'), ' ', (string) $current_term->slug));
        if (preg_match('/[\\x{0600}-\\x{06FF}]/u', $country_fallback)) {
            $country_fallback = '';
        }
    }
    $display_country_name = $localized_country_name !== '' ? $localized_country_name : ($english_name !== '' ? $english_name : ($country_fallback !== '' ? $country_fallback : 'Country'));
    $country_name = $display_country_name; // AJAX/legacy variables must also receive English.

    // Complete English currency labels for the currencies used by the site's country map.
    $currency_labels_hi = array(
        'USD'=>'US Dollar','EUR'=>'Euro','GBP'=>'British Pound','EGP'=>'Egyptian Pound','SAR'=>'Saudi Riyal','AED'=>'UAE Dirham',
        'KWD'=>'Kuwaiti Dinar','QAR'=>'Qatari Riyal','BHD'=>'Bahraini Dinar','OMR'=>'Omani Rial','JOD'=>'Jordanian Dinar',
        'IQD'=>'Iraqi Dinar','MAD'=>'Moroccan Dirham','TND'=>'Tunisian Dinar','DZD'=>'Algerian Dinar','TRY'=>'Turkish Lira',
        'JPY'=>'Japanese Yen','CHF'=>'Swiss Franc','CAD'=>'Canadian Dollar','AUD'=>'Australian Dollar','NZD'=>'New Zealand Dollar',
        'CNY'=>'Chinese Yuan','INR'=>'Indian Rupee','PKR'=>'Pakistani Rupee','RUB'=>'Russian Ruble','ZAR'=>'South African Rand',
        'BRL'=>'Brazilian Real','MXN'=>'Mexican Peso','SGD'=>'Singapore Dollar','HKD'=>'Hong Kong Dollar','SEK'=>'Swedish Krona',
        'NOK'=>'Norwegian Krone','DKK'=>'Danish Krone','PLN'=>'Polish Zloty','CZK'=>'Czech Koruna','HUF'=>'Hungarian Forint',
        'KRW'=>'South Korean Won','THB'=>'Thai Baht','MYR'=>'Malaysian Ringgit','IDR'=>'Indonesian Rupiah','PHP'=>'Philippine Peso',
        'ILS'=>'Israeli New Shekel','LKR'=>'Sri Lankan Rupee','NGN'=>'Nigerian Naira','KES'=>'Kenyan Shilling','GHS'=>'Ghanaian Cedi',
        'LYD'=>'Libyan Dinar','SDG'=>'Sudanese Pound','LBP'=>'Lebanese Pound','SYP'=>'Syrian Pound','YER'=>'Yemeni Rial',
        'TWD'=>'New Taiwan Dollar','SOS'=>'Somali Shilling','DJF'=>'Djiboutian Franc','MRU'=>'Mauritanian Ouguiya',
        'KMF'=>'Comorian Franc','XOF'=>'West African CFA Franc','XAF'=>'Central African CFA Franc','TZS'=>'Tanzanian Shilling',
        'UGX'=>'Ugandan Shilling','CDF'=>'Congolese Franc','AOA'=>'Angolan Kwanza','MZN'=>'Mozambican Metical',
        'ZWL'=>'Zimbabwean Dollar','MGA'=>'Malagasy Ariary','MUR'=>'Mauritian Rupee','ZMW'=>'Zambian Kwacha',
        'BWP'=>'Botswana Pula','NAD'=>'Namibian Dollar','RWF'=>'Rwandan Franc','BIF'=>'Burundian Franc','SSP'=>'South Sudanese Pound',
        'ERN'=>'Eritrean Nakfa','SZL'=>'Swazi Lilangeni','LSL'=>'Lesotho Loti','GMD'=>'Gambian Dalasi','GNF'=>'Guinean Franc',
        'LRD'=>'Liberian Dollar','CVE'=>'Cape Verdean Escudo','SCR'=>'Seychellois Rupee','SLE'=>'Sierra Leonean Leone',
        'STN'=>'São Tomé and Príncipe Dobra','ARS'=>'Argentine Peso','BOB'=>'Bolivian Boliviano','CLP'=>'Chilean Peso',
        'COP'=>'Colombian Peso','GYD'=>'Guyanese Dollar','PYG'=>'Paraguayan Guarani','PEN'=>'Peruvian Sol',
        'SRD'=>'Surinamese Dollar','UYU'=>'Uruguayan Peso','VES'=>'Venezuelan Bolívar','FKP'=>'Falkland Islands Pound',
        'BMD'=>'Bermudian Dollar','KYD'=>'Cayman Islands Dollar','CRC'=>'Costa Rican Colón','CUP'=>'Cuban Peso',
        'DOP'=>'Dominican Peso','GTQ'=>'Guatemalan Quetzal','HNL'=>'Honduran Lempira','NIO'=>'Nicaraguan Córdoba',
        'PAB'=>'Panamanian Balboa','BSD'=>'Bahamian Dollar','BBD'=>'Barbadian Dollar','BZD'=>'Belize Dollar',
        'JMD'=>'Jamaican Dollar','TTD'=>'Trinidad and Tobago Dollar','XCD'=>'East Caribbean Dollar','HTG'=>'Haitian Gourde',
        'RON'=>'Romanian Leu','BGN'=>'Bulgarian Lev','RSD'=>'Serbian Dinar','UAH'=>'Ukrainian Hryvnia','BYN'=>'Belarusian Ruble',
        'MDL'=>'Moldovan Leu','ALL'=>'Albanian Lek','BAM'=>'Bosnia-Herzegovina Convertible Mark','MKD'=>'Macedonian Denar',
        'GEL'=>'Georgian Lari','ISK'=>'Icelandic Krona','GIP'=>'Gibraltar Pound','HRK'=>'Croatian Kuna',
        'KPW'=>'North Korean Won','VND'=>'Vietnamese Dong','BDT'=>'Bangladeshi Taka','NPR'=>'Nepalese Rupee',
        'MMK'=>'Myanmar Kyat','KZT'=>'Kazakhstani Tenge','UZS'=>'Uzbekistani Som','KGS'=>'Kyrgyzstani Som',
        'TJS'=>'Tajikistani Somoni','TMT'=>'Turkmenistani Manat','MNT'=>'Mongolian Tugrik','LAK'=>'Lao Kip',
        'KHR'=>'Cambodian Riel','BTN'=>'Bhutanese Ngultrum','MVR'=>'Maldivian Rufiyaa','BND'=>'Brunei Dollar',
        'IRR'=>'Iranian Rial','AFN'=>'Afghan Afghani','AMD'=>'Armenian Dram','AZN'=>'Azerbaijani Manat','MOP'=>'Macanese Pataca',
        'ETB'=>'Ethiopian Birr','FJD'=>'Fijian Dollar','PGK'=>'Papua New Guinean Kina','SBD'=>'Solomon Islands Dollar',
        'VUV'=>'Vanuatu Vatu','WST'=>'Samoan Tala','TOP'=>'Tongan Paʻanga','XPF'=>'CFP Franc','SHP'=>'Saint Helena Pound'
    );
    $currency_label = isset($currency_labels_hi[$country_currency]) ? $currency_labels_hi[$country_currency] : ($country_currency !== '' ? $country_currency : 'स्थानीय मुद्रा');
    $today = function_exists('wp_date') ? wp_date('d/m/Y') : date('d/m/Y');

    // Build a text-only translation dictionary for legacy shortcodes that still use Arabic labels.
    $shortcode_translation_map_hi = array(
        'ذهب عيار 24' => '24K Gold', 'ذهب عيار 22' => '22K Gold', 'ذهب عيار 21' => '21K Gold',
        'ذهب عيار 18' => '18K Gold', 'ذهب عيار 14' => '14K Gold', 'ذهب عيار 12' => '12K Gold',
        'عيار 24' => '24K', 'عيار 22' => '22K', 'عيار 21' => '21K', 'عيار 18' => '18K', 'عيار 14' => '14K', 'عيار 12' => '12K',
        'جرام عيار 24' => '24K Gold Gram', 'جرام عيار 22' => '22K Gold Gram', 'جرام عيار 21' => '21K Gold Gram',
        'جرام عيار 18' => '18K Gold Gram', 'جرام عيار 14' => '14K Gold Gram',
        'الأونصة العالمية' => 'वैश्विक सोने का औंस', 'أونصة الذهب العالمية' => 'वैश्विक सोने का औंस',
        'الأونصة بالعملة المحلية' => 'Gold Ounce in Local Currency', 'أونصة الذهب بالعملة المحلية' => 'Gold Ounce in Local Currency',
        'جنيه الذهب' => 'सोने का सिक्का', 'الجنيه الذهب' => 'सोने का सिक्का', 'سعر الجنيه الذهب' => 'Gold Coin Price',
        'السعر بالدولار' => 'Price in USD', 'سعر الدولار' => 'US Dollar Rate', 'سعر الدولار اليوم' => 'US Dollar Rate Today',
        'السعر بالعملة المحلية' => 'Price in Local Currency', 'سعر الذهب بالدولار' => 'Gold Price in USD',
        'جنيه مصري' => 'Egyptian Pound', 'الدولار الأمريكي' => 'US Dollar', 'دولار أمريكي' => 'US Dollar',
        'الأكثر تداولاً' => 'सबसे अधिक कारोबार',
        'الأكثر تداولا' => 'सबसे अधिक कारोबार',
        'انضم إلى قناتنا على تيليجرام' => 'हमारे टेलीग्राम चैनल से जुड़ें', 'انضم إلى قناتنا على تليجرام' => 'हमारे टेलीग्राम चैनल से जुड़ें', 'انضم لقناتنا على تيليجرام' => 'हमारे टेलीग्राम चैनल से जुड़ें', 'انضم لقناتنا على تليجرام' => 'हमारे टेलीग्राम चैनल से जुड़ें',
        'تنويه هام:' => 'Important Notice:', 'الوزن / النوع' => 'वज़न / प्रकार', 'السعر' => 'कीमत',
        'السعر الآن' => 'Live Price', 'أعلى سعر' => 'Highest Price', 'أقل سعر' => 'Lowest Price',
        'التغير' => 'Change', 'التحديث اللحظي' => 'Live Update', 'بدون مصنعية' => 'मेकिंग चार्ज के बिना',
        'سعر الذهب' => 'Gold Price', 'أسعار الذهب' => 'सोने की कीमतें', 'العملة المحلية' => 'स्थानीय मुद्रा'
    );

    // Reuse the existing functions.php dictionaries where possible without modifying Arabic globals.
    global $currency_names, $carat_labels;
    if (is_array($currency_names)) {
        foreach ($currency_names as $code => $arabic_label) {
            if (isset($currency_labels_hi[$code]) && is_string($arabic_label) && $arabic_label !== '') {
                $shortcode_translation_map_hi[$arabic_label] = $currency_labels_hi[$code];
            }
        }
    }
    if (is_array($carat_labels)) {
        $carat_english = array('24k'=>'24K Gold','22k'=>'22K Gold','21k'=>'21K Gold','18k'=>'18K Gold','14k'=>'14K Gold','12k'=>'12K Gold','24k_oz'=>'Gold Ounce','gold_pound'=>'सोने का सिक्का');
        foreach ($carat_labels as $key => $arabic_label) {
            if (isset($carat_english[$key]) && is_string($arabic_label) && $arabic_label !== '') {
                $shortcode_translation_map_hi[$arabic_label] = $carat_english[$key];
            }
        }
    }
    if ($arabic_country_name !== '' && $arabic_country_name !== $display_country_name) {
        $shortcode_translation_map_hi[$arabic_country_name] = $display_country_name;
    }

    // 2) Currency conversion. The gold source is USD; multiply by local currency per USD.
    $local_currency_per_usd = 1.0;
    if ($country_currency !== '' && $country_currency !== 'USD' && function_exists('infi_get_latest_currency_rates')) {
        $currency_data_for_conversion = infi_get_latest_currency_rates($country_currency);
        if (!empty($currency_data_for_conversion['rate_to_usd']) && floatval($currency_data_for_conversion['rate_to_usd']) > 0) {
            $local_currency_per_usd = floatval($currency_data_for_conversion['rate_to_usd']);
        }
    }

    $gold_view = sanitize_key((string) get_query_var('gold_view'));

    // Read the 24K gram benchmark once. All karat and weight calculations below
    // continue to use this same USD source and the existing local-currency rate.
    $gram_24k_price_usd_raw = 0;
    $gram_24k_price_currency = 0;
    $gram_24k_price_usd_converted = 0;
    $latest_24k = function_exists('infi_get_latest_gold_prices')
        ? infi_get_latest_gold_prices('24k')
        : array();

    if (!empty($latest_24k) && isset($latest_24k[0]['price_usd'])) {
        $gram_24k_price_usd_raw = (float) $latest_24k[0]['price_usd'];
        $gram_24k_price_currency = $gram_24k_price_usd_raw * $local_currency_per_usd;
        $gram_24k_price_usd_converted = $gram_24k_price_usd_raw;
    }

    // Use the provider's dedicated global-ounce quote when available; otherwise
    // fall back to the established 31.1g calculation. Local and global values
    // are two conversions of the same international ounce benchmark.
    $latest_global_ounce = function_exists('infi_get_latest_gold_prices')
        ? infi_get_latest_gold_prices('24k_oz')
        : array();
    $ounce_price_usd = (!empty($latest_global_ounce) && isset($latest_global_ounce[0]['price_usd']))
        ? (float) $latest_global_ounce[0]['price_usd']
        : ($gram_24k_price_usd_converted * 31.1);
    $ounce_price_currency = $ounce_price_usd * $local_currency_per_usd;

    // Preserve the site's established 8g, 21K gold-coin calculation.
    $gold_pound_currency = $gram_24k_price_currency * 8 * 0.875;
?>

<div class="en-middle-ad-slot" style="width:100%;max-width:1200px;margin:12px auto 18px;padding:10px 8px;box-sizing:border-box;text-align:center;direction:ltr;clear:both;">
    <?php goldnow_display_ad('below_cards'); ?>
</div>
	  
    <!-- ✅ Tab Navigation Buttons -->
    <div class="gold-tabs-nav text-center py-4">
      <button class="gold-tab-btn active" type="button" data-tab="now">लाइव कीमतें</button>
      <button class="gold-tab-btn" type="button" data-tab="buy-sell">सोने की छड़ें</button>
      <button class="gold-tab-btn" type="button" data-tab="indicator">सोने की कीमत का चार्ट</button>
    </div>

    <!-- ✅ Tab Content Container -->
    <div class="gold-tabs-content">
      
      <!-- 1. Live Prices Pane -->
      <div id="tab-now" class="gold-tab-pane" style="display:block;">
        <!-- 📊 SEO Heading: Fully programmatically structured in English layout -->
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align: left; direction: ltr;">
          <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
          <img alt="Prices of gold live in <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align: middle; margin-right: 5px;">
        <?php
        if ( $gold_view == '24k' ) { echo esc_html($display_country_name) . ' में आज 24 कैरेट सोने की कीमत'; }
        elseif ( $gold_view == '22k' ) { echo esc_html($display_country_name) . ' में आज 22 कैरेट सोने की कीमत'; }
        elseif ( $gold_view == '21k' ) { echo esc_html($display_country_name) . ' में आज 21 कैरेट सोने की प्रति ग्राम कीमत'; }
        elseif ( $gold_view == '18k' ) { echo esc_html($display_country_name) . ' में आज 18 कैरेट सोने की कीमत'; }
        elseif ( $gold_view == '14k' ) { echo esc_html($display_country_name) . ' में आज 14 कैरेट सोने की कीमत'; }
        elseif ( $gold_view == 'ounce' ) { echo 'आज वैश्विक सोने के औंस की कीमत (USD)'; }
        elseif ( $gold_view == 'coin' ) { echo esc_html($display_country_name) . ' में आज सोने के सिक्के की कीमत'; }
        elseif ( $gold_view == 'gold-bars' ) { echo esc_html($display_country_name) . ' में आज सोने की छड़ों की कीमतें'; }
        elseif ( $gold_view == 'gold-index' ) { echo esc_html($display_country_name) . ' में आज सोने का लाइव बाजार सूचकांक'; }
        elseif ( $gold_view == 'usd' ) { echo esc_html($display_country_name) . ' में आज अमेरिकी डॉलर और मुद्रा विनिमय दरें'; }
        else { echo esc_html($display_country_name) . ' में आज सोने की कीमतें'; }?>
        </h2>
        
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align: left; direction: ltr;">
          <?php 
          if ($gold_view == 'usd') { echo 'प्रमुख अंतरराष्ट्रीय और क्षेत्रीय मुद्राओं की लाइव विनिमय दरें'; }
          elseif ($gold_view == 'ounce') { echo '24 कैरेट सोने के एक ट्रॉय औंस का अंतरराष्ट्रीय स्पॉट मानक, USD में'; }
          else { echo 'Gold Price in ' . esc_html($display_country_name) . ' — live market price, excluding making charges'; }
          ?>
        </h3>

        <!-- Gold Price Cards Shortcode Section -->
        <section id="gold-cards" class="mb-4">
            <?php echo altaqrer_gold_hi_translate_shortcode_html(do_shortcode('[infi_gold_cards currency="' . esc_attr($country_currency) . '" currency_label="' . esc_attr($currency_label) . '"]'), $shortcode_translation_map_hi); ?>
        </section>

        <!-- Gold Information Panels Shortcode Section -->
        <section id="gold-info-boxes" class="mb-4">
            <?php echo altaqrer_gold_hi_translate_shortcode_html(do_shortcode('[infi_gold_info_boxes currency="' . esc_attr($country_currency) . '"]'), $shortcode_translation_map_hi); ?>
        </section>
	  </div>
		
      <!-- 2. Gold Bullion Bars and Coins Table Pane -->
      <div id="tab-buy-sell" class="gold-tab-pane" style="display:none; text-align: left; direction: ltr;">
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align:left !important; direction:ltr !important;">
            <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
            <img alt="Gold Bars and Coins in <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; margin-right: 5px;">
            Gold Bars and Coins in <?php echo esc_html($display_country_name); ?>
        </h2>
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align:left !important; direction:ltr !important;">
          Latest gold bar and coin prices (excluding making charges)
        </h3>

        <?php if (function_exists('infi_get_latest_gold_prices')) { ?>
            <!-- A) Gold Bars Price Table -->
            <section id="sabika-price" class="gold-section mt-4">
                <div class="section-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <h4>Gold Bullion Bar Prices in <?php echo esc_html($display_country_name); ?></h4>
                    <span class="date-badge" style="background: #262930; padding: 4px 10px; border-radius: 4px; font-size: 13px;"><?php echo esc_html($today); ?></span>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>वज़न / प्रकार</th>
                                <th>कीमत (<?php echo $currency_label; ?>)</th>
                                <th>Price (USD)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $weights = [
                                ['weight' => 1, 'name' => 'Gold Bar — 1 Gram'],
                                ['weight' => 2.5, 'name' => 'Gold Bar — 2.5 Grams'],
                                ['weight' => 5, 'name' => 'Gold Bar — 5 Grams'],
                                ['weight' => 10, 'name' => 'Gold Bar — 10 Grams'],
                                ['weight' => 20, 'name' => 'Gold Bar — 20 Grams'],
                                ['weight' => 31.1, 'name' => 'Troy Ounce (31.1 g)'],
                                ['weight' => 50, 'name' => 'Gold Bar — 50 Grams'],
                                ['weight' => 100, 'name' => 'Gold Bar — 100 Grams'],
                            ];
                            
                            foreach ($weights as $bar) {
                                if ((float) $bar['weight'] === 31.1) {
                                    $bar_price_usd = $ounce_price_usd;
                                    $bar_price_currency = $ounce_price_currency;
                                } else {
                                    $bar_price_currency = $gram_24k_price_currency * $bar['weight'];
                                    $bar_price_usd = $gram_24k_price_usd_converted * $bar['weight'];
                                }
                                ?>
                                <tr>
                                    <td class="font-bold"><?php echo $bar['name']; ?></td>
                                    <td class="price-cell"><?php echo number_format($bar_price_currency, 2); ?></td>
                                    <td class="usd-cell"><?php echo number_format($bar_price_usd, 2); ?> $</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <section id="gold-pounds-price" class="gold-section mt-4">
                <div class="section-header">
                    <h4>Gold Coin Prices in <?php echo esc_html($display_country_name); ?></h4>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>सिक्के की शुद्धता</th>
                                <th>कीमत (<?php echo $currency_label; ?>)</th>
                                <th>Price (USD)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $gold_pounds_carats = ['21k', '22k', '24k']; 
                            foreach ($gold_pounds_carats as $carat) {
                                $pound_gram_data = infi_get_latest_gold_prices($carat);
                                if (!empty($pound_gram_data) && isset($pound_gram_data[0]['price_usd'])) {
                                    $price_usd_per_gram = (float) $pound_gram_data[0]['price_usd'];
                                    if ($price_usd_per_gram <= 0) { continue; }
                                    $pound_weight = 8;
                                    
                                    $pound_price_currency = $price_usd_per_gram * $pound_weight * $local_currency_per_usd;
                                    $pound_price_usd = $price_usd_per_gram * $pound_weight;
                                    $carat_num = str_replace('k', '', $carat);
                                ?>
                                <tr>
                                    <td class="font-bold">8g Gold Coin (<?php echo $carat_num; ?>K)</td>
                                    <td class="price-cell"><?php echo number_format($pound_price_currency, 2); ?></td>
                                    <td class="usd-cell"><?php echo number_format($pound_price_usd, 2); ?> $</td>
                                </tr>
                                <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <div class="raw-gold-alert mt-4" style="background: #1f2126; padding: 15px; border-radius: 6px; border-left: 4px solid #ffb301;">
                <span class="alert-icon">⚠️</span>
                <strong>महत्वपूर्ण:</strong> The prices shown above for bars and coins represent <u>gold value only</u>; they exclude making charges, hallmarking fees, and taxes.
            </div>

        <?php } else { ?>
            <p style="text-align:center; padding:20px;">क्षमा करें, बाज़ार का डेटा अभी उपलब्ध नहीं है।</p>
        <?php } ?>
      </div>

      <!-- 3. Gold Price Chart: restored to match the Arabic template structure. -->
      <div id="tab-indicator" class="gold-tab-pane" style="display:none; direction:ltr; text-align:left;">
        <h2 class="col-12 p-0 font-3 mb-3" style="text-align:left; direction:ltr;">
          <span class="start-head cls120" style="background: <?php echo esc_attr(get_theme_mod('infi_default_color', '#ffb301')); ?>;"></span>
          Gold Price Chart in <?php echo esc_html($display_country_name); ?>
        </h2>
        <div class="gold-frame-box mb-4" style="direction:ltr; text-align:left;">
          <?php
          $en_chart_shortcode = '[infi_gold_chart carat="21k" currency="' . esc_attr($country_currency) . '" title="21K Gold Price Movement"]';
          echo altaqrer_gold_hi_translate_shortcode_html(do_shortcode($en_chart_shortcode), $shortcode_translation_map_hi);
          ?>
        </div>
        <div id="ajax-indicator-frames" class="gold-frame-box" style="direction:ltr; text-align:left;"></div>
        <p style="color:#94a3b8; text-align:left; font-size:13px; margin:10px 4px 18px;">Charts show indicative market movements. Local prices may differ due to exchange rates, premiums and market conditions.</p>
      </div>

    </div>
  </div>
</main>

<script>
// Translate legacy Arabic labels returned by the existing indicator AJAX action.
function altaqrerTranslateEnglishIndicator(root) {
    if (!root) return;
    const translations = {
        'عيار 24': '24K Gold', 'عيار 22': '22K Gold', 'عيار 21': '21K Gold',
        'عيار 18': '18K Gold', 'عيار 14': '14K Gold', 'عيار 12': '12K Gold',
        'الأونصة العالمية': 'Global Gold Ounce (USD)',
        'الأونصة بالعملة المحلية': 'Gold Ounce in Local Currency',
        'جنيه الذهب': 'सोने का सिक्का', 'سعر الدولار': 'US Dollar Exchange Rate',
        'جنيه مصري': 'Egyptian Pound', 'دولار أمريكي': 'US Dollar',
        'انضم إلى قناتنا على تيليجرام': 'हमारे टेलीग्राम चैनल से जुड़ें',
        'انضم إلى قناتنا على تليجرام': 'हमारे टेलीग्राम चैनल से जुड़ें'
    };
    const walker = document.createTreeWalker(root, NodeFilter.SHOW_TEXT);
    const nodes = [];
    while (walker.nextNode()) nodes.push(walker.currentNode);
    nodes.forEach(function (node) {
        let value = node.nodeValue;
        Object.keys(translations).forEach(function (arabic) {
            value = value.split(arabic).join(translations[arabic]);
        });
        node.nodeValue = value;
    });
    root.querySelectorAll('[aria-label],[title],[alt]').forEach(function (element) {
        ['aria-label','title','alt'].forEach(function (attribute) {
            if (!element.hasAttribute(attribute)) return;
            let value = element.getAttribute(attribute);
            Object.keys(translations).forEach(function (arabic) {
                value = value.split(arabic).join(translations[arabic]);
            });
            element.setAttribute(attribute, value);
        });
    });
}

document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".gold-tab-btn");
    const panes = document.querySelectorAll(".gold-tab-pane");

    buttons.forEach(function (button) {
        button.addEventListener("click", async function () {
            const tab = button.getAttribute("data-tab");
            const targetPane = document.getElementById("tab-" + tab);
            if (!targetPane) return;

            panes.forEach(function (pane) { pane.style.display = "none"; });
            buttons.forEach(function (item) { item.classList.remove("active"); });
            targetPane.style.display = "block";
            button.classList.add("active");

            // Load the same indicator frames used by the Arabic template once only.
            if (tab === 'indicator' && !targetPane.dataset.framesLoaded) {
                const framesContainer = document.getElementById('ajax-indicator-frames');
                framesContainer.innerHTML = '<p style="text-align:center;padding:18px;color:#cbd5e1;">Loading gold charts...</p>';
                const formData = new FormData();
                formData.append('action', 'load_indicator_frames');
                formData.append('country_currency', <?php echo wp_json_encode($country_currency); ?>);
                formData.append('country_name', <?php echo wp_json_encode($country_name); ?>);
                try {
                    const response = await fetch(<?php echo wp_json_encode(admin_url('admin-ajax.php')); ?>, {
                        method: 'POST',
                        credentials: 'same-origin',
                        body: formData
                    });
                    if (!response.ok) throw new Error('HTTP ' + response.status);
                    framesContainer.innerHTML = await response.text();
                    altaqrerTranslateEnglishIndicator(framesContainer);
                    targetPane.dataset.framesLoaded = 'true';
                } catch (error) {
                    framesContainer.innerHTML = '<p style="text-align:center;padding:18px;color:#fca5a5;">The chart data could not be loaded. Please try again.</p>';
                    delete targetPane.dataset.framesLoaded;
                }
            }
        });
    });
});
</script>

<div class="en-below-tabs-ad-slot" style="width:100%;max-width:1200px;margin:18px auto 22px;padding:10px 8px;box-sizing:border-box;text-align:center;direction:ltr;clear:both;">
    <?php goldnow_display_ad('below_countries'); ?>
</div>

<?php if (empty($gold_view)) : ?>
<div class="altaqrer-dynamic-article-box" style="background: #1f2126; padding: 20px; border: 1px solid #323742; border-left: 5px solid <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; color: #f0f1f5; font-size: 14.5px; line-height: 1.9; direction: ltr; text-align: left; border-radius: 8px; margin: 25px auto; max-width: 800px; width: 95%; box-sizing: border-box; box-shadow: 0 4px 15px rgba(0,0,0,0.25); font-family: sans-serif; clear: both;">
    <p style="margin-top: 0; margin-bottom: 15px;">
        📊 The gold tracker monitors the latest movements in <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong>Gold prices in <?php echo esc_html($display_country_name); ?> in real time</strong></span> today <img alt="Flag of <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align:middle; margin: 0 4px;"> on <strong><?php echo esc_html($today); ?></strong> using regional market data and the international gold stock exchange rate for (<?php echo esc_html($display_country_name); ?>).
    </p>

    <p style="margin-bottom: 15px;">
        💡 This report lets you track live gold prices across all categories, including <strong>21K gold price today</strong> — the most widely traded purity — as well as <strong>22K gold</strong>, <strong>18K gold</strong> value options, and <strong>14K gold</strong>. The tracker also covers precious-metal prices, jewellery markets, and daily market movements.
    </p>

    <p style="margin-bottom: 15px;">
        ✨ Live market data, excluding making charges, puts the <strong>24K gold price per gram</strong> at approximately <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($gram_24k_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> (equivalent to <strong><?php echo number_format($gram_24k_price_usd_converted, 2); ?> US dollars</strong>). This purity is the primary standard for <strong>gold bars</strong> because of its high refinement status.
    </p>

    <p style="margin-bottom: 15px;">
        📈 The <strong>global gold ounce price today</strong> (31.1 grams of 24K gold) is <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong>. This is the international spot benchmark; local gold prices are converted separately using the latest available exchange rate.
    </p>

    <p style="margin-bottom: 15px;">
        🪙 For savers and investors, the <strong>gold coin price today</strong> (an 8-gram coin in the widely traded 21K purity) is approximately <strong><?php echo number_format($gold_pound_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong>.
    </p>

    <p style="margin-bottom: 20px;">
        🛠️ To help preserve the value of your savings, tracking the <strong>live gold market index</strong> and <strong>Prices of gold bars</strong> across weights from 1 gram to 1 kilogram can help you follow market movements when considering a purchase or sale.
    </p>

    <div style="background: #17191d; padding: 12px; border-radius: 6px; border: 1px dashed #3a3f4d; color: #d1d5db; font-size: 14px; margin-top: 15px;">
        💵 <strong>Exchange Rate Indicator:</strong> Local gold prices move with exchange rates. The <strong>US dollar exchange rate today in <?php echo esc_html($display_country_name); ?></strong> is <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> per US dollar, based on the latest available market data. Download the <strong>gold prices app</strong> for timely price alerts.
    </div>
</div>
<?php endif; ?>

<?php
if (!function_exists('altaqrer_get_currency_live_rate')) {
    function altaqrer_get_currency_live_rate($target_currency, $local_currency_per_usd) {
        static $rate_cache = array();
        $target_currency = strtoupper(sanitize_text_field((string) $target_currency));

        if ($target_currency === '' || !function_exists('infi_get_latest_currency_rates')) {
            return 0;
        }

        if (!array_key_exists($target_currency, $rate_cache)) {
            $currency_data = infi_get_latest_currency_rates($target_currency);
            $rate_cache[$target_currency] = (!empty($currency_data) && isset($currency_data['rate_to_usd']) && (float) $currency_data['rate_to_usd'] > 0)
                ? (float) $currency_data['rate_to_usd']
                : 0;
        }

        // Same rate direction and conversion formula used by the Arabic template.
        return $rate_cache[$target_currency] > 0
            ? (float) $local_currency_per_usd / $rate_cache[$target_currency]
            : 0;
    }
}

$local_currency_per_euro = altaqrer_get_currency_live_rate('EUR', $local_currency_per_usd);
$local_currency_per_gbp  = altaqrer_get_currency_live_rate('GBP', $local_currency_per_usd);
$local_currency_per_sar  = altaqrer_get_currency_live_rate('SAR', $local_currency_per_usd);
$local_currency_per_aed  = altaqrer_get_currency_live_rate('AED', $local_currency_per_usd);
$local_currency_per_kwd  = altaqrer_get_currency_live_rate('KWD', $local_currency_per_usd);
$local_currency_per_qar  = altaqrer_get_currency_live_rate('QAR', $local_currency_per_usd);
$local_currency_per_bhd  = altaqrer_get_currency_live_rate('BHD', $local_currency_per_usd);
$local_currency_per_omr  = altaqrer_get_currency_live_rate('OMR', $local_currency_per_usd);
$local_currency_per_jpy  = altaqrer_get_currency_live_rate('JPY', $local_currency_per_usd);
?>

<?php if (empty($gold_view)) : ?>
    <div style="background: #17191d; padding: 15px; border-radius: 6px; border: 1px solid #3a3f4d; color: #d1d5db; font-size: 14px; margin: 20px auto; max-width: 800px; width: 95%; box-sizing: border-box; clear: both;">
        <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 15px; text-align: left; direction: ltr;">
            💵 Live exchange rates against <?php echo esc_html($currency_label); ?> in <?php echo esc_html($display_country_name); ?> <img alt="Flag of <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:
        </strong>
        
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; text-align: left; direction: ltr;">
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'USD') : ?>
                    <div><img alt="Flag of United States" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong>US Dollar:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                    <div><img alt="Flag of United Kingdom" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong>British Pound:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                    <div><img alt="Flag of Saudi Arabia" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Saudi Riyal:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>

                <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                    <div><img alt="Flag of Bahrain" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Bahraini Dinar:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                    <div><img alt="Flag of Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Omani Rial:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                    <div><img alt="Flag of European Union" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Euro:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                    <div><img alt="Flag of United Arab Emirates" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong>UAE Dirham:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                    <div><img alt="Flag of Kuwait" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Kuwaiti Dinar:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                    <div><img alt="Flag of Qatar" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Qatari Riyal:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                    <div><img alt="Flag of Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Japanese Yen:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
        </div>
        <p style="margin: 15px 0 0 0; font-size: 12px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 8px; text-align: left; direction: ltr;">* Updates are performed programmatically via official live market indices. We advise installing the official <strong>gold prices app</strong>.</p>
    </div>
<?php endif; ?>

<div class="altaqrer-silo-links" style="margin: 25px auto; padding: 15px; background: #17191d; border: 1px solid #3a3f4d; border-radius: 6px; text-align: center; max-width: 800px; width: 95%; box-sizing: border-box; clear: both; direction: ltr;">
    <?php
    // Reuse the already-resolved English country URL for every tab link.
    $base_country_url = $hi_header_country_url;

    $active_bg = get_theme_mod('infi_default_color', '#ffb301');
    $active_color = '#000000';
    $default_bg = '#262930';
    $default_color = '#ffffff';

    $tabs = [
        ['key' => '',          'hi' => 'Gold Price'],
        ['key' => '24k',       'hi' => '24K'],
        ['key' => '22k',       'hi' => '22K'],
        ['key' => '21k',       'hi' => '21K'],
        ['key' => '18k',       'hi' => '18K'],
        ['key' => '14k',       'hi' => '14K'],
        ['key' => 'ounce',     'hi' => 'Gold Ounce'],
        ['key' => 'coin',      'hi' => 'सोने का सिक्का'],
        ['key' => 'gold-bars', 'hi' => 'सोने की छड़ें'],
        ['key' => 'gold-index','hi' => 'सोना सूचकांक'],
        ['key' => 'usd',       'hi' => 'USD और मुद्रा दरें'],
    ];
    ?>

    <div style="display: flex; justify-content: center; gap: 8px; flex-wrap: wrap; row-gap: 10px; direction: ltr;">
        <?php foreach ($tabs as $tab) :
            $key = $tab['key'];
            $is_active = ($key === '') ? empty($gold_view) : ($gold_view === $key);
            $tab_url = ($key === '') ? $base_country_url : $base_country_url . rawurlencode($key) . '/';
            $tab_style = 'text-decoration: none; padding: 8px 14px; border-radius: 4px; font-size: 13px; border: 1px solid #3a3f4d; ';

            if ($is_active) {
                $tab_style .= "color: {$active_color}; background: {$active_bg}; font-weight: bold;";
            } else {
                $tab_style .= "color: {$default_color}; background: {$default_bg}; font-weight: 500;";
            }
            $label = $tab['hi'];
        ?>
            <a href="<?php echo esc_url($tab_url); ?>" style="<?php echo esc_attr($tab_style); ?>" <?php echo $is_active ? 'aria-current="page"' : ''; ?>>
                <?php echo esc_html($label); ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<?php
if (!empty($gold_view)) {
    $price_24k_local = $gram_24k_price_currency;
    $price_22k_local = $gram_24k_price_currency * 0.9166;
    $price_21k_local = $gram_24k_price_currency * 0.875;
    $price_18k_local = $gram_24k_price_currency * 0.75;
    $price_14k_local = $gram_24k_price_currency * 0.5833;

    $price_24k_usd   = $gram_24k_price_usd_converted;
    $price_22k_usd   = $gram_24k_price_usd_converted * 0.9166;
    $price_21k_usd   = $gram_24k_price_usd_converted * 0.875;
    $price_18k_usd   = $gram_24k_price_usd_converted * 0.75;
    $price_14k_usd   = $gram_24k_price_usd_converted * 0.5833;
    ?>
    <div class="altaqrer-unified-hero-box" style="background: #17191d; padding: 25px; border-radius: 8px; border: 1px solid #3a3f4d; color: #d1d5db; font-size: 15px; margin: 15px auto 20px auto; max-width: 800px; width: 95%; box-sizing: border-box; clear: both; box-shadow: 0 4px 15px rgba(0,0,0,0.3); direction: ltr; text-align: left; line-height: 1.8;">
        <div class="altaqrer-dynamic-inner-content">
            
            <?php if ($gold_view == 'gold-index') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">📈 Live Gold Market Index in <?php echo esc_html($display_country_name); ?> <img alt="Flag of <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Pure 24K Gold:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Premium 22K Gold:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_22k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;">Popular 21K Gold:</strong> <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_21k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Standard 18K Gold:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_18k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Light 14K Gold:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_14k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Global Gold Ounce (31.1g):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong></span><br><small style="color:#94a3b8;">International spot price, quoted in USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Ounce in Local Currency (31.1g):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">The same global ounce benchmark converted to the local currency</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    This index compares the main gold purities in <?php echo esc_html($display_country_name); ?> with the international spot benchmark. The global ounce is quoted in USD, while the local-currency ounce is the same benchmark converted using the country exchange rate. Retail making charges and dealer premiums are not included.
                </p>


            <?php elseif ($gold_view == 'gold-bars') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 Gold Bullion Bar Prices Today in <?php echo esc_html($display_country_name); ?> (Pure 24K Gold):</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 1 Gram:</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_24k_local * 1, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 1, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 2.5 Grams:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 2.5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 2.5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 5 Grams:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 10 Grams:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 10, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 10, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 20 Grams:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 20, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 20, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Troy Ounce (31.1 Grams):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($ounce_price_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 50 Grams:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 50, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 50, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 100 Grams:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 100, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 100, 2); ?> USD</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    This tracker provides structural tracking of <strong>Gold bar prices today</strong> composed exclusively of 999.9 pure 24K gold. Gold bullion bar accumulation remains a primary hedge for wealth conservation and long-term liquidity protection inside <strong><?php echo esc_html($display_country_name); ?></strong> against macroeconomic inflation.
                </p>

            <?php elseif ($gold_view == 'coin') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 Gold Coin Price Today in <?php echo esc_html($display_country_name); ?> (Standard 8 Gram Weight):</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>21K Gold Coin (8g):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_21k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Value: <?php echo number_format($price_21k_usd * 8, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>22K Gold Coin (8g):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Value: <?php echo number_format($price_22k_usd * 8, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>24K Gold Coin (8g):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 8, 2); ?> USD</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Get live updates on the current <strong>Gold coin price today</strong> within the investment markets of <strong><?php echo esc_html($display_country_name); ?></strong>. Sovereign gold coins weighing exactly 8 grams are widely monitored as safe haven physical assets.
                </p>

            <?php elseif ($gold_view == 'usd') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">💵 Live Exchange Rates against <?php echo esc_html($currency_label); ?> in <?php echo esc_html($display_country_name); ?>:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; text-align: left; direction: ltr; margin-bottom: 20px;">
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'USD') : ?>
                            <div><img alt="Flag of US" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong>US Dollar:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                            <div><img alt="Flag of UK" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong>British Pound:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                            <div><img alt="Flag of SA" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Saudi Riyal:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                            <div><img alt="Flag of BH" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Bahraini Dinar:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                            <div><img alt="Flag of Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Omani Rial:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                            <div><img alt="Flag of EU" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Euro:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                            <div><img alt="Flag of AE" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong>UAE Dirham:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                            <div><img alt="Flag of KW" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Kuwaiti Dinar:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                            <div><img alt="Flag of QA" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Qatari Riyal:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                            <div><img alt="Flag of Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Japanese Yen:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    This dynamic index monitors banking cross rates. Local gold price benchmarks scale directly with exchange fluctuations against global reserves.
                </p>

            <?php elseif ($gold_view == '24k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Live Report for 24K Gold Price per Gram Today in <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Price in Local Currency:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Equivalent in US Dollars:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_24k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    The live <strong>24K gold price per gram today</strong> stands at <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Characterized by 99.9% purity, this karat is the industrial asset benchmark for bullion production.
                </p>

            <?php elseif ($gold_view == '22k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Live Report for 22K Gold Price per Gram Today in <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Price in Local Currency:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Equivalent in US Dollars:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_22k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    The premium <strong>22K gold price per gram today</strong> registers at <strong><?php echo number_format($price_22k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. It balances high intrinsic precious metal content with raw structural durability.
                </p>

            <?php elseif ($gold_view == '21k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Live Report for 21K Gold Price per Gram Today in <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Price in Local Currency:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Equivalent in US Dollars:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_21k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    The widely requested <strong>21K gold price per gram today</strong> trades at <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. This karat accounts for the vast majority of local consumer jewelry trading.
                </p>

            <?php elseif ($gold_view == '18k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Live Report for 18K Gold Price per Gram Today in <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Price in Local Currency:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Equivalent in US Dollars:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_18k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Market updates place the standard <strong>18K gold price per gram today</strong> at <strong><?php echo number_format($price_18k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>, offering an economical choice for luxury jewelry work.
                </p>

            <?php elseif ($gold_view == '14k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Live Report for 14K Gold Price per Gram Today in <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Price in Local Currency:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Equivalent in US Dollars:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_14k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    The programmatic index values <strong>14K gold price per gram today</strong> at <strong><?php echo number_format($price_14k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>, presenting a durable alloy framework for constant retail utility.
                </p>

            <?php elseif ($gold_view == 'ounce') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Global Gold Ounce Price Today (31.1g):</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>International Spot Price:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($ounce_price_usd, 2); ?></strong></span> USD</li>
                    <li>🔹 <strong>Quote Currency:</strong> US Dollar (USD)</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    The global gold ounce is priced internationally in US dollars and represents 31.1 grams of 24K gold. Local-currency conversions are intentionally excluded from this global benchmark; local gold prices are calculated separately using the applicable exchange rate.
                </p>
            <?php endif; ?>

        </div>
    </div>
    <?php
}
?>

<?php if (!empty($gold_view)) :
    // The live values below use the same price snapshot and conversions as the tables above.
    $hi_seo_base = home_url('/hi/country/' . rawurlencode($hi_header_country_slug) . '/');
    $hi_seo_price_map = array(
        '24k' => array($price_24k_local, $price_24k_usd),
        '22k' => array($price_22k_local, $price_22k_usd),
        '21k' => array($price_21k_local, $price_21k_usd),
        '18k' => array($price_18k_local, $price_18k_usd),
        '14k' => array($price_14k_local, $price_14k_usd)
    );
?>
<article class="hi-seo-article" aria-labelledby="en-seo-title">
<?php if (isset($hi_seo_price_map[$gold_view])) :
    $en_active_price_local = $hi_seo_price_map[$gold_view][0];
    $en_active_price_usd = $hi_seo_price_map[$gold_view][1];
    $hi_karat = strtoupper($gold_view);
?>
    <h2 id="en-seo-title"><?php echo esc_html($hi_karat); ?> Gold Price Today in <?php echo esc_html($display_country_name); ?> per Gram</h2>
    <p>Follow the latest <strong><?php echo esc_html($hi_karat); ?> gold price today in <?php echo esc_html($display_country_name); ?></strong> with the live reference shown above. The current indicative value is <strong><?php echo number_format($en_active_price_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> per gram, equivalent to approximately <strong><?php echo number_format($en_active_price_usd, 2); ?> USD</strong>. These figures are calculated from the latest available 24K reference price, the purity factor for <?php echo esc_html($hi_karat); ?> gold, and the latest available currency conversion used by the site.</p>
    <h3>What does <?php echo esc_html($hi_karat); ?> gold mean?</h3>
    <p>Karat indicates the proportion of pure gold in an alloy. 24K is treated as the pure-gold reference, while lower karats contain a greater share of other metals. The <?php echo esc_html($hi_karat); ?> rate therefore reflects its gold content rather than the finished retail price of a jewellery item. The final shop price may also include workmanship, retailer premiums, taxes, and other local charges that are not included in the raw market value displayed here.</p>
    <h3>स्थानीय और USD कीमतों को कैसे समझें</h3>
    <p>The local-currency figure helps compare the reference value in <?php echo esc_html($display_country_name); ?>, while the USD equivalent makes it easier to compare the same gold content with international quotations. Local prices can move when the global gold benchmark changes, when exchange rates change, or when local market conditions affect premiums. The figures on this page are indicative reference values, not a guaranteed buy-back or retail offer.</p>
    <h3>संबंधित सोने की कीमतें</h3>
    <p>Compare this rate with <a href="<?php echo esc_url($hi_seo_base . '24k/'); ?>">24K gold</a>, <a href="<?php echo esc_url($hi_seo_base . '21k/'); ?>">21K gold</a>, <a href="<?php echo esc_url($hi_seo_base . 'gold-bars/'); ?>">gold bar prices</a>, and the <a href="<?php echo esc_url($hi_seo_base . 'gold-index/'); ?>">live gold market index</a> for a broader view of the market.</p>
    <h3>अक्सर पूछे जाने वाले प्रश्न</h3>
    <details><summary>Is the displayed <?php echo esc_html($hi_karat); ?> price the final jewellery shop price?</summary><p>No. It is an indicative raw-gold reference and excludes workmanship, retailer premiums, taxes, and any other charges that may apply to a finished item.</p></details>
    <details><summary>Why is the USD equivalent different from the local price?</summary><p>The two values use different currencies. The local figure is converted using the latest available exchange-rate data used by the site; the USD figure represents the corresponding gold value in US dollars.</p></details>
<?php elseif ($gold_view === 'ounce') : ?>
    <h2 id="en-seo-title">Global Gold Ounce Price Today in USD</h2>
    <p>The international gold ounce reference on this page is <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong> for one troy ounce of approximately 31.1 grams of 24K gold. This is the <strong>global gold spot benchmark</strong>, quoted in US dollars. It is deliberately not presented as a country-specific local-currency ounce price; local gram prices are converted separately for the selected country.</p>
    <h3>Why the global gold ounce matters</h3>
    <p>Gold is commonly quoted in international markets by the troy ounce. Traders, refiners, financial services, and bullion dealers use this benchmark to compare the value of gold across markets. Changes in the US dollar, interest-rate expectations, inflation outlook, central-bank activity, and investor demand can all influence the international gold price. These are general market drivers, not a claim that any one factor caused today's movement.</p>
    <h3>From the global ounce to a local gram price</h3>
    <p>For a simple reference comparison, a troy ounce contains about 31.1 grams. The local price per gram also depends on the selected currency conversion and local market conditions. The global ounce figure above remains in USD so that it can be compared consistently with international quotations.</p>
    <p>Continue to the <a href="<?php echo esc_url($hi_seo_base); ?>">gold price in <?php echo esc_html($display_country_name); ?></a>, review <a href="<?php echo esc_url($hi_seo_base . '24k/'); ?>">24K gold per gram</a>, or open the <a href="<?php echo esc_url($hi_seo_base . 'gold-index/'); ?>">gold market index</a>.</p>
    <h3>अक्सर पूछे जाने वाले प्रश्न</h3>
    <details><summary>How many grams are in a gold troy ounce?</summary><p>One troy ounce is approximately 31.1035 grams. The page uses 31.1 grams for its displayed reference calculation.</p></details>
    <details><summary>Is this ounce price converted to local currency?</summary><p>No. This page shows the international gold ounce benchmark in USD only. Local-currency values are shown separately in the country gold-price tables where applicable.</p></details>
<?php elseif ($gold_view === 'coin') : ?>
    <h2 id="en-seo-title">8-Gram Gold Coin Price Today in <?php echo esc_html($display_country_name); ?></h2>
    <p>Track the reference value of an <strong>8-gram gold coin</strong> in <?php echo esc_html($display_country_name); ?>. Using the current gram prices, the indicative 21K coin value is <strong><?php echo number_format($price_21k_local * 8, 2); ?> <?php echo esc_html($currency_label); ?></strong> (about <strong><?php echo number_format($price_21k_usd * 8, 2); ?> USD</strong>). The page also compares 22K and 24K values for the same 8-gram weight so that the effect of purity is clear.</p>
    <h3>How the 8-gram coin value is calculated</h3>
    <p>The calculation multiplies the relevant per-gram gold value by 8 grams. For the common 21K reference, the displayed estimate uses the 21K gram price multiplied by eight. The 22K and 24K comparison values use their respective gram prices at the same weight. This preserves the site's established 8-gram coin calculation.</p>
    <p>Actual coin prices may differ because of minting, condition, design, scarcity, dealer premiums, and local taxes. The values here represent the gold-content reference and should not be treated as a guaranteed transaction quote. Compare the <a href="<?php echo esc_url($hi_seo_base . '21k/'); ?>">21K gold gram price</a>, <a href="<?php echo esc_url($hi_seo_base . '22k/'); ?>">22K gold price</a>, and <a href="<?php echo esc_url($hi_seo_base . 'gold-bars/'); ?>">gold bar prices</a>.</p>
    <h3>अक्सर पूछे जाने वाले प्रश्न</h3>
    <details><summary>What weight is used for the gold coin calculation?</summary><p>This page retains the site's standard 8-gram calculation for the gold coin comparison.</p></details>
    <details><summary>Does the displayed value include a dealer premium?</summary><p>No. It estimates the gold content only and does not include minting costs, dealer premiums, workmanship, or taxes.</p></details>
<?php elseif ($gold_view === 'gold-bars') : ?>
    <h2 id="en-seo-title">Gold Bar Prices Today in <?php echo esc_html($display_country_name); ?></h2>
    <p>Gold bars are commonly valued using the 24K gold benchmark. Based on the current 24K reference of <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?> per gram</strong> (approximately <strong><?php echo number_format($price_24k_usd, 2); ?> USD</strong>), a 10-gram bar has an indicative gold-content value of <strong><?php echo number_format($price_24k_local * 10, 2); ?> <?php echo esc_html($currency_label); ?></strong>, while a 100-gram bar is approximately <strong><?php echo number_format($price_24k_local * 100, 2); ?> <?php echo esc_html($currency_label); ?></strong>. The table above lists additional weights for quick comparison.</p>
    <h3>How to compare gold bullion bar weights</h3>
    <p>For a straightforward estimate, multiply the 24K gram benchmark by the bar's weight. The resulting figure represents the reference value of the gold content before any fabrication premium, assay or hallmarking fee, dealer margin, delivery cost, or tax. A bar's final selling price can therefore be higher than the raw calculation shown on this page.</p>
    <p>Check the bar's stated purity, exact weight, certification, manufacturer, and seller reputation before a transaction. The <a href="<?php echo esc_url($hi_seo_base . '24k/'); ?>">24K gold price</a> is the key per-gram reference, while the <a href="<?php echo esc_url($hi_seo_base . 'ounce/'); ?>">global gold ounce</a> provides an international comparison in USD.</p>
    <h3>अक्सर पूछे जाने वाले प्रश्न</h3>
    <details><summary>Are the gold bar prices inclusive of making charges?</summary><p>No. The table estimates the gold value only and excludes fabrication, certification, dealer premiums, and taxes.</p></details>
    <details><summary>Why can two bars of the same weight have different prices?</summary><p>Brand, certification, manufacturing costs, dealer premiums, availability, and local taxes can affect the final selling price.</p></details>
<?php elseif ($gold_view === 'gold-index') : ?>
    <!-- Global XAU/USD chart added specifically to the Gold Index SEO section. -->
    <section class="hi-gold-index-chart" aria-labelledby="hi-gold-index-chart-title" style="background:#17191d;border:1px solid #323742;border-radius:8px;padding:12px;margin:0 0 22px;direction:ltr;text-align:left;">
        <h3 id="hi-gold-index-chart-title" style="color:#f0f1f5;text-align:left;margin:5px 5px 12px;font-size:20px;">Gold Price Charts</h3>
        <div style="position:relative;width:100%;height:520px;overflow:hidden;border-radius:6px;">
            <iframe
                id="tradingview_gold_index"
                title="Global Gold Price Charts — XAU/USD"
                src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_gold_index&symbol=OANDA%3AXAUUSD&interval=D&hidesidetoolbar=0&symboledit=0&saveimage=0&toolbarbg=%2317191d&studies=%5B%5D&theme=dark&style=1&timezone=Etc%2FUTC&withdateranges=1&hideideas=1&locale=hi"
                style="width:100%;height:100%;border:0;"
                allowtransparency="true"
                scrolling="no"
                loading="lazy"
                allowfullscreen>
            </iframe>
        </div>
        <p style="color:#94a3b8;text-align:left;font-size:13px;margin:10px 4px 2px;">Track the international gold spot price in US dollars (USD) using the global XAU/USD market chart. This is a worldwide benchmark, not a country-specific retail price.</p>
    </section>
    <h2 id="en-seo-title">Live Gold Market Index and Karat Prices in <?php echo esc_html($display_country_name); ?></h2>
    <p>This gold market overview brings together the latest available reference values for several purities. The current 24K benchmark is <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> per gram, while 22K is approximately <strong><?php echo number_format($price_22k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> and 21K is approximately <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. The global troy ounce is <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong>, and its local-currency equivalent is <strong><?php echo number_format($ounce_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong>.</p>
    <h3>What the gold index helps you compare</h3>
    <p>The index is a convenient snapshot of gold values across common purities and currencies. It helps readers compare the 24K bullion benchmark with the lower-karat values commonly used for jewellery. Local values are derived from the reference gold price and the available exchange-rate data; the USD figures allow comparison with the international market.</p>
    <p>Gold prices can respond to global spot-market activity, currency movements, interest-rate expectations, inflation concerns, and changes in investment demand. A single snapshot does not establish a trend, so readers should compare updates over time before drawing conclusions. Visit the <a href="<?php echo esc_url($hi_seo_base . '21k/'); ?>">21K price page</a>, <a href="<?php echo esc_url($hi_seo_base . '24k/'); ?>">24K price page</a>, and <a href="<?php echo esc_url($hi_seo_base . 'ounce/'); ?>">global ounce page</a>.</p>
    <h3>अक्सर पूछे जाने वाले प्रश्न</h3>
    <details><summary>Does the index show a guaranteed market trading price?</summary><p>No. It is an informational reference based on the latest available data used by the site. Actual transaction prices may include local premiums and fees.</p></details>
    <details><summary>Why are different karats priced differently?</summary><p>Each karat contains a different proportion of pure gold. Lower-purity alloys have a lower raw-gold value per gram than 24K gold, before other costs are considered.</p></details>
<?php elseif ($gold_view === 'usd') : ?>
    <h2 id="en-seo-title">USD Exchange Rate and Currency Conversion in <?php echo esc_html($display_country_name); ?></h2>
    <p>The latest available reference used by this page values one US dollar at approximately <strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Exchange rates matter to gold buyers because international bullion prices are commonly quoted in USD. When the local currency changes against the dollar, the converted local value of gold can change even if the international USD gold price remains steady.</p>
    <h3>How currency movements affect local gold prices</h3>
    <p>A local gold-price estimate combines an international gold benchmark with a currency conversion and, in real retail markets, any applicable local premiums, taxes, or costs. This page lists selected currency comparisons to help readers understand the conversion context. Rates are informational and may differ from bank, cash-market, card, or remittance rates available to an individual customer.</p>
    <p>For the gold side of the comparison, review the <a href="<?php echo esc_url($hi_seo_base . '24k/'); ?>">24K gram price</a>, the <a href="<?php echo esc_url($hi_seo_base . '21k/'); ?>">21K gram price</a>, and the <a href="<?php echo esc_url($hi_seo_base . 'ounce/'); ?>">international gold ounce in USD</a>.</p>
    <h3>अक्सर पूछे जाने वाले प्रश्न</h3>
    <details><summary>Is this exchange rate the rate offered by every bank?</summary><p>No. It is the latest available reference used by the site. Banks and exchange providers may apply different buy and sell rates, spreads, or fees.</p></details>
    <details><summary>Why does the dollar rate matter for gold?</summary><p>Because international gold is commonly quoted in US dollars, converting that benchmark into local currency is one of the factors used to estimate local gold values.</p></details>
<?php endif; ?>
    <p class="en-seo-update-note" style="margin:20px 0 0;padding-top:12px;border-top:1px solid #3a3f4d;color:#9ca3af;font-size:12px;">Reference date: <?php echo esc_html($today); ?>. Prices are indicative and reflect the latest available data returned to this page; they may change as market and exchange-rate data are updated.</p>
</article>
<?php endif; ?>

<?php if (!$hi_header_is_app) : ?>
<footer class="hi-site-footer">
  <div class="hi-site-footer-inner">
    <section>
      <h3>AlTaqrer Gold के बारे में</h3>
      <p><strong>AlTaqrer Gold</strong> helps readers follow gold prices across regional and international markets. Explore live reference prices for 24K, 22K, 21K, 18K and 14K gold, compare bullion bar and 8-gram coin values, and track the global gold ounce in USD. Prices are provided for information and comparison; final retail prices may include workmanship, premiums, and taxes.</p>
    </section>
    <section>
      <h3>सोने की कीमत के अनुभाग</h3>
      <ul>
        <li><a href="<?php echo esc_url($hi_header_country_url); ?>">Gold Prices in <?php echo esc_html(isset($display_country_name) ? $display_country_name : ''); ?></a></li>
        <li><a href="<?php echo esc_url($hi_header_country_url . 'gold-bars/'); ?>">सोने की छड़ें और सिक्के</a></li>
        <li><a href="<?php echo esc_url($hi_header_country_url . 'gold-index/'); ?>">लाइव सोना सूचकांक</a></li>
        <li><a href="<?php echo esc_url($hi_header_country_url . 'usd/'); ?>">USD और मुद्रा दरें</a></li>
      </ul>
    </section>
    <section>
      <h3>क्षेत्रीय सोने की कीमतें</h3>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/hi/country/eg/')); ?>">Gold Prices in Egypt</a></li>
        <li><a href="<?php echo esc_url(home_url('/hi/country/sa/')); ?>">Gold Prices in Saudi Arabia</a></li>
        <li><a href="<?php echo esc_url(home_url('/hi/country/ae/')); ?>">Gold Prices in the UAE</a></li>
        <li><a href="<?php echo esc_url(home_url('/hi/country/kw/')); ?>">Gold Prices in Kuwait</a></li>
      </ul>
      <h3 style="margin-top:16px;">हमें फ़ॉलो करें</h3>
      <ul>
        <li><a href="https://t.me/goldaltaqrer" target="_blank" rel="noopener noreferrer">हमारे टेलीग्राम चैनल से जुड़ें</a></li>
      </ul>
    </section>
    <?php
    // Show only real published English pages; never leave dead /hi/# placeholder links.
    $en_footer_pages = array();
    foreach (array(
        'privacy-policy' => 'गोपनीयता नीति',
        'terms-of-use'   => 'उपयोग की शर्तें',
        'contact-us'     => 'संपर्क करें'
    ) as $page_slug => $page_label) {
        $page_object = get_page_by_path('en/' . $page_slug);
        if (!$page_object) {
            $page_object = get_page_by_path($page_slug);
        }
        if ($page_object && $page_object->post_status === 'publish') {
            $en_footer_pages[] = array('url' => get_permalink($page_object), 'label' => $page_label);
        }
    }
    if (!empty($en_footer_pages)) : ?>
    <section>
      <h3>महत्वपूर्ण लिंक</h3>
      <ul>
        <?php foreach ($en_footer_pages as $footer_page) : ?>
          <li><a href="<?php echo esc_url($footer_page['url']); ?>"><?php echo esc_html($footer_page['label']); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </section>
    <?php endif; ?>
  </div>
  <div class="hi-footer-bottom">All rights reserved &copy; <?php echo esc_html(function_exists('wp_date') ? wp_date('Y') : date('Y')); ?> to <a href="<?php echo esc_url($hi_header_home_url); ?>">AlTaqrer Gold</a>.</div>
</footer>
<?php endif; ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
  var toggle = document.querySelector('.hi-country-toggle');
  var menu = document.getElementById('hi-country-menu');
  if (!toggle || !menu) return;
  toggle.addEventListener('click', function (event) {
    event.preventDefault();
    var opened = menu.classList.toggle('is-open');
    toggle.setAttribute('aria-expanded', opened ? 'true' : 'false');
  });
  document.addEventListener('click', function (event) {
    if (!event.target.closest('.hi-country-wrap')) {
      menu.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
    }
  });
});
</script>
<?php wp_footer(); ?>
</body>
</html>
