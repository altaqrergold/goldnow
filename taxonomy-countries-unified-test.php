<?php
/**
 * Template Name: Unified Countries - Multilingual Test
 * Unified test template based on the working English layout.
 * Original Arabic, English and French templates remain untouched.
 */
$en_header_term = get_queried_object();
$en_header_country_slug = (is_object($en_header_term) && !empty($en_header_term->slug))
    ? sanitize_title($en_header_term->slug)
    : '';
if ($en_header_country_slug === '' && is_object($en_header_term) && !empty($en_header_term->term_id)) {
    $en_header_country_slug = strtolower((string) get_term_meta((int) $en_header_term->term_id, 'country_code', true));
}
if ($en_header_country_slug === '') {
    $en_header_country_slug = 'eg';
}
$en_header_language = function_exists('goldnow_mt_current_language') ? goldnow_mt_current_language() : 'en';
$en_header_country_url = function_exists('goldnow_mt_language_url')
    ? goldnow_mt_language_url($en_header_language, home_url('/country/' . rawurlencode($en_header_country_slug) . '/'))
    : home_url('/en/country/' . rawurlencode($en_header_country_slug) . '/');
$en_header_home_url = function_exists('goldnow_mt_language_url')
    ? goldnow_mt_language_url($en_header_language, home_url('/'))
    : home_url('/en/');
$en_header_accent = get_theme_mod('infi_default_color', '#ffb301');
$en_header_logo_id = (int) get_theme_mod('custom_logo');
$en_header_is_app = (isset($_GET['view']) && sanitize_text_field(wp_unslash($_GET['view'])) === 'app');
$en_country_label_eg = (class_exists('Locale') && $en_header_language !== 'en') ? Locale::getDisplayRegion('en_EG', $en_header_language) : 'Egypt';
$en_country_label_sa = (class_exists('Locale') && $en_header_language !== 'en') ? Locale::getDisplayRegion('en_SA', $en_header_language) : 'Saudi Arabia';
$en_country_label_ae = (class_exists('Locale') && $en_header_language !== 'en') ? Locale::getDisplayRegion('en_AE', $en_header_language) : 'United Arab Emirates';
$en_country_label_kw = (class_exists('Locale') && $en_header_language !== 'en') ? Locale::getDisplayRegion('en_KW', $en_header_language) : 'Kuwait';

/**
 * Exact dictionary lookup on visible text nodes only. HTML tags, URLs,
 * JavaScript, CSS, price values and markup structure are preserved.
 */
if (!function_exists('altaqrer_gold_mt_translate_page_html')) {
    function altaqrer_gold_mt_translate_page_html($html, $language) {
        if (!is_string($html) || $html === '' || !function_exists('goldnow_mt_translate_text')) {
            return $html;
        }
        $protected = array();
        $html = preg_replace_callback('~<!--.*?-->|<(script|style)\\b[^>]*>.*?</\\1\\s*>~is', function ($match) use (&$protected) {
            $token = 'GOLDNOWMTBLOCK' . count($protected) . 'TOKEN';
            $protected[$token] = $match[0];
            return $token;
        }, $html);
        $html = preg_replace_callback('~>([^<>]+)<~u', function ($match) use ($language) {
            $raw = $match[1];
            $decoded = html_entity_decode(trim($raw), ENT_QUOTES | ENT_HTML5, 'UTF-8');
            if ($decoded === '') {
                return $match[0];
            }
            $translated = goldnow_mt_translate_text($decoded, $language);
            if ($translated === $decoded) {
                return $match[0];
            }
            $leading = substr($raw, 0, strlen($raw) - strlen(ltrim($raw)));
            $trailing = substr($raw, strlen(rtrim($raw)));
            return '>' . $leading . esc_html($translated) . $trailing . '<';
        }, $html);
        $html = preg_replace_callback("~\\b(alt|title|aria-label|placeholder)\\s*=\\s*([\"'])(.*?)\\2~isu", function ($match) use ($language) {
            $decoded = html_entity_decode($match[3], ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $translated = goldnow_mt_translate_text($decoded, $language);
            return $match[1] . '=' . $match[2] . esc_attr($translated) . $match[2];
        }, $html);
        if (!empty($protected)) {
            $html = strtr($html, $protected);
        }
        return $html;
    }
}
$en_mt_buffer_level = ob_get_level();
ob_start();

?>
<!DOCTYPE html>
<html lang="<?php echo esc_attr($en_header_language); ?>" dir="<?php echo esc_attr(function_exists('goldnow_mt_is_rtl') && goldnow_mt_is_rtl($en_header_language) ? 'rtl' : 'ltr'); ?>">
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
    'url' => $en_header_home_url,
    'sameAs' => array('https://www.instagram.com/altaqrergold', 'https://www.facebook.com/altaqrergold')
), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>
<style>
html, body { direction:<?php echo function_exists('goldnow_mt_is_rtl') && goldnow_mt_is_rtl($en_header_language) ? 'rtl' : 'ltr'; ?>; text-align:<?php echo function_exists('goldnow_mt_is_rtl') && goldnow_mt_is_rtl($en_header_language) ? 'right' : 'left'; ?>; }
html[dir="rtl"] .en-main-nav, html[dir="rtl"] .en-site-header-inner { direction:rtl; }
html[dir="rtl"] .en-main-nav { justify-content:flex-start; }
html[dir="rtl"] .en-country-menu { left:auto; right:0; }
html[dir="rtl"] .en-country-menu a { text-align:right; }
html[dir="rtl"] body, html[dir="rtl"] .en-gold-template, html[dir="rtl"] .container.home { direction:rtl !important; text-align:right !important; }
html[dir="rtl"] .en-gold-template [style*="direction:ltr"], html[dir="rtl"] .en-gold-template [style*="text-align:left"] { direction:rtl !important; text-align:right !important; }
html[dir="rtl"] .en-gold-template .en-site-footer-inner { direction:rtl; text-align:right; }
body { background:#f5d771 !important; max-width:100vw; overflow-x:hidden; position:relative; font-family:Inter,Arial,sans-serif; }
.en-site-header { position:relative; z-index:1000; background:#1a1a1a; border-bottom:4px solid <?php echo esc_attr($en_header_accent); ?>; color:#fff; }
.en-site-header-inner { max-width:1200px; width:95%; margin:0 auto; min-height:74px; display:flex; align-items:center; justify-content:space-between; gap:18px; padding:10px 0; }
.en-brand { display:flex; align-items:center; gap:10px; color:#fff; text-decoration:none; font-weight:800; font-size:20px; white-space:nowrap; }
.en-brand img { max-width:54px; max-height:54px; width:auto; height:auto; object-fit:contain; }
.en-main-nav { display:flex; align-items:center; justify-content:flex-end; gap:8px; flex-wrap:wrap; }
.en-main-nav a, .en-country-toggle { color:#fff; text-decoration:none; border:1px solid rgba(255,255,255,.15); background:transparent; border-radius:6px; padding:9px 12px; font:600 13px Inter,Arial,sans-serif; cursor:pointer; }
.en-main-nav a:hover, .en-country-toggle:hover { color:#1a1a1a; background:<?php echo esc_attr($en_header_accent); ?>; }
.en-country-wrap { position:relative; }
.en-country-menu { display:none; position:absolute; top:calc(100% + 6px); left:0; min-width:210px; background:#202329; border:1px solid #444; border-radius:7px; padding:7px; box-shadow:0 8px 24px rgba(0,0,0,.25); z-index:10000; }
.en-country-menu a { display:block; border:0; border-radius:4px; text-align:left; }
.en-country-menu.is-open { display:block; }
@media(max-width:760px) { .en-site-header-inner { align-items:flex-start; flex-direction:column; } .en-main-nav { justify-content:flex-start; width:100%; } .en-main-nav a,.en-country-toggle { padding:8px 10px; } }
@media(max-width:480px) { .en-main-nav { gap:6px; } .en-main-nav a,.en-country-toggle { font-size:12px; } }
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
.en-seo-article, .goldnow-seo-article { max-width:900px; width:95%; box-sizing:border-box; margin:28px auto; padding:24px; color:#e5e7eb; background:#1f2126; border:1px solid #343944; border-left:5px solid <?php echo esc_attr($en_header_accent); ?>; border-radius:9px; line-height:1.85; font-size:15px; }
.en-seo-article h2,.en-seo-article h3,.goldnow-seo-article h2,.goldnow-seo-article h3 { color:#fff; line-height:1.35; }
.en-seo-article h2,.goldnow-seo-article h2 { font-size:23px; margin:0 0 14px; }
.en-seo-article h3,.goldnow-seo-article h3 { font-size:18px; margin:22px 0 8px; }
.en-seo-article p,.goldnow-seo-article p { margin:0 0 13px; }
.en-seo-article a,.goldnow-seo-article a { color:<?php echo esc_attr($en_header_accent); ?>; text-decoration:none; font-weight:700; }
.en-seo-article a:hover,.goldnow-seo-article a:hover { text-decoration:underline; }
.en-seo-article details,.goldnow-seo-article details { border-top:1px solid #3a3f4d; padding:11px 0; }
.en-seo-article summary,.goldnow-seo-article summary { cursor:pointer; color:#fff; font-weight:700; }
.en-seo-article details p,.goldnow-seo-article details p { margin:8px 0 0; color:#cbd5e1; }
.goldnow-seo-related { max-width:900px; width:95%; margin:-14px auto 24px; color:#cbd5e1; font-size:13px; line-height:1.8; }
.goldnow-seo-related a { color:<?php echo esc_attr($en_header_accent); ?>; margin:0 4px; }
.goldnow-seo-disclaimer { color:#9ca3af; font-size:12px; border-top:1px solid #3a3f4d; padding-top:12px; }

.en-site-footer { margin-top:32px; background:#1a1a1a; color:#eee; border-top:4px solid <?php echo esc_attr($en_header_accent); ?>; }
.en-site-footer-inner { max-width:1200px; width:95%; margin:0 auto; padding:28px 0 18px; display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:24px; }
.en-site-footer h3 { color:#e0b94f; font-size:16px; margin:0 0 12px; }
.en-site-footer p,.en-site-footer li { color:#c8c8c8; font-size:13px; line-height:1.8; }
.en-site-footer ul { list-style:none; padding:0; margin:0; }
.en-site-footer a { color:#e0b94f; text-decoration:none; }
.en-site-footer a:hover { text-decoration:underline; }
.en-footer-bottom { text-align:center; border-top:1px solid #393939; padding:15px 10px; font-size:13px; color:#c8c8c8; }
@media(max-width:768px) { .en-site-footer-inner { grid-template-columns:1fr; gap:18px; text-align:center; } }
</style>
</head>
<body <?php body_class('en-gold-template'); ?>>
<?php if (function_exists('wp_body_open')) { wp_body_open(); } ?>

<?php if (!$en_header_is_app) : ?>
<header class="en-site-header">
  <div class="en-site-header-inner">
    <a class="en-brand" href="<?php echo esc_url($en_header_home_url); ?>" aria-label="AlTaqrer Gold home">
      <?php if ($en_header_logo_id) : ?>
        <?php echo wp_get_attachment_image($en_header_logo_id, 'full', false, array('alt' => 'AlTaqrer Gold')); ?>
      <?php else : ?>
        <span>AlTaqrer Gold</span>
      <?php endif; ?>
    </a>
    <nav class="en-main-nav" aria-label="Main navigation">
      <a href="<?php echo esc_url($en_header_home_url); ?>">Home</a>
      <a href="<?php echo esc_url($en_header_country_url); ?>">Gold Prices</a>
      <a href="<?php echo esc_url($en_header_country_url . 'gold-bars/'); ?>">Gold Bars</a>
      <a href="<?php echo esc_url($en_header_country_url . 'gold-index/'); ?>">Gold Index</a>
      <a href="<?php echo esc_url($en_header_country_url . 'usd/'); ?>">USD Exchange Rates</a>
      <div class="en-country-wrap">
        <button class="en-country-toggle" type="button" aria-expanded="false" aria-controls="en-country-menu"><?php echo esc_html(goldnow_mt_translate_text('Countries', $en_header_language)); ?> ▾</button>
        <div class="en-country-menu" id="en-country-menu">
          <a href="<?php echo esc_url(function_exists('goldnow_mt_language_url') ? goldnow_mt_language_url($en_header_language, home_url('/country/eg/')) : home_url('/en/country/eg/')); ?>"><?php echo esc_html($en_country_label_eg); ?></a>
          <a href="<?php echo esc_url(function_exists('goldnow_mt_language_url') ? goldnow_mt_language_url($en_header_language, home_url('/country/sa/')) : home_url('/en/country/sa/')); ?>"<?php echo esc_html($en_country_label_sa); ?></a>
          <a href="<?php echo esc_url(function_exists('goldnow_mt_language_url') ? goldnow_mt_language_url($en_header_language, home_url('/country/ae/')) : home_url('/en/country/ae/')); ?>"<?php echo esc_html($en_country_label_ae); ?></a>
          <a href="<?php echo esc_url(function_exists('goldnow_mt_language_url') ? goldnow_mt_language_url($en_header_language, home_url('/country/kw/')) : home_url('/en/country/kw/')); ?>"<?php echo esc_html($en_country_label_kw); ?></a>
          <a href="<?php echo esc_url($en_header_home_url); ?>">All Countries</a>
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
if (!$en_header_is_app && function_exists('goldnow_display_ad')) :
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
if (!function_exists('altaqrer_gold_en_translate_shortcode_html')) {
    function altaqrer_gold_en_translate_shortcode_html($html, $translations = array()) {
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
    $display_country_name = $english_name !== '' ? $english_name : ($country_fallback !== '' ? $country_fallback : 'Country');
    if ($en_header_language !== 'en' && $country_code !== '' && class_exists('Locale')) {
        $locale_country = Locale::getDisplayRegion('en_' . strtoupper($country_code), $en_header_language);
        if (is_string($locale_country) && $locale_country !== '' && $locale_country !== strtoupper($country_code)) {
            $display_country_name = $locale_country;
        }
    }
    $country_name = $display_country_name; // Keep AJAX/legacy country data in the active page language.

    // Complete English currency labels for the currencies used by the site's country map.
    $currency_labels_en = array(
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
    $currency_label = isset($currency_labels_en[$country_currency]) ? $currency_labels_en[$country_currency] : ($country_currency !== '' ? $country_currency : 'Local Currency');
    if ($en_header_language !== 'en' && $country_currency !== '' && function_exists('goldnow_mt_translate_block')) {
        $currency_block_keys = array(
            'USD'=>'currency_usd','GBP'=>'currency_gbp','SAR'=>'currency_sar','BHD'=>'currency_bhd',
            'OMR'=>'currency_omr','EUR'=>'currency_eur','AED'=>'currency_aed','KWD'=>'currency_kwd',
            'QAR'=>'currency_qar','JPY'=>'currency_jpy','EGP'=>'currency_egp','CHF'=>'currency_chf',
            'CAD'=>'currency_cad','AUD'=>'currency_aud','INR'=>'currency_inr','RUB'=>'currency_rub',
            'CNY'=>'currency_cny','TRY'=>'currency_try','JOD'=>'currency_jod','ILS'=>'currency_ils'
        );
        $currency_label = isset($currency_block_keys[$country_currency])
            ? goldnow_mt_translate_block($currency_block_keys[$country_currency], $en_header_language)
            : $country_currency;
    }
    $today = function_exists('wp_date') ? wp_date('d/m/Y') : date('d/m/Y');

    // Build a text-only translation dictionary for legacy shortcodes that still use Arabic labels.
    $shortcode_translation_map = array(
        'ذهب عيار 24' => '24K Gold', 'ذهب عيار 22' => '22K Gold', 'ذهب عيار 21' => '21K Gold',
        'ذهب عيار 18' => '18K Gold', 'ذهب عيار 14' => '14K Gold', 'ذهب عيار 12' => '12K Gold',
        'عيار 24' => '24K', 'عيار 22' => '22K', 'عيار 21' => '21K', 'عيار 18' => '18K', 'عيار 14' => '14K', 'عيار 12' => '12K',
        'جرام عيار 24' => '24K Gold Gram', 'جرام عيار 22' => '22K Gold Gram', 'جرام عيار 21' => '21K Gold Gram',
        'جرام عيار 18' => '18K Gold Gram', 'جرام عيار 14' => '14K Gold Gram',
        'الأونصة العالمية' => 'Global Gold Ounce', 'أونصة الذهب العالمية' => 'Global Gold Ounce',
        'الأونصة بالعملة المحلية' => 'Gold Ounce in Local Currency', 'أونصة الذهب بالعملة المحلية' => 'Gold Ounce in Local Currency',
        'جنيه الذهب' => 'Gold Coin', 'الجنيه الذهب' => 'Gold Coin', 'سعر الجنيه الذهب' => 'Gold Coin Price',
        'السعر بالدولار' => 'Price in USD', 'سعر الدولار' => 'US Dollar Rate', 'سعر الدولار اليوم' => 'US Dollar Rate Today',
        'السعر بالعملة المحلية' => 'Price in Local Currency', 'سعر الذهب بالدولار' => 'Gold Price in USD',
        'جنيه مصري' => 'Egyptian Pound', 'الدولار الأمريكي' => 'US Dollar', 'دولار أمريكي' => 'US Dollar',
        'الأكثر تداولاً' => 'Most Traded',
        'الأكثر تداولا' => 'Most Traded',
        'انضم إلى قناتنا على تيليجرام' => 'Join Our Telegram Channel', 'انضم إلى قناتنا على تليجرام' => 'Join Our Telegram Channel', 'انضم لقناتنا على تيليجرام' => 'Join Our Telegram Channel', 'انضم لقناتنا على تليجرام' => 'Join Our Telegram Channel',
        'تنويه هام:' => 'Important Notice:', 'الوزن / النوع' => 'Weight / Type', 'السعر' => 'Price',
        'السعر الآن' => 'Live Price', 'أعلى سعر' => 'Highest Price', 'أقل سعر' => 'Lowest Price',
        'التغير' => 'Change', 'التحديث اللحظي' => 'Live Update', 'بدون مصنعية' => 'Excluding Making Charges',
        'سعر الذهب' => 'Gold Price', 'أسعار الذهب' => 'Gold Prices', 'العملة المحلية' => 'Local Currency'
    );

    // Reuse the existing functions.php dictionaries where possible without modifying Arabic globals.
    global $currency_names, $carat_labels;
    if (is_array($currency_names)) {
        foreach ($currency_names as $code => $arabic_label) {
            if (isset($currency_labels_en[$code]) && is_string($arabic_label) && $arabic_label !== '') {
                $shortcode_translation_map[$arabic_label] = $currency_labels_en[$code];
            }
        }
    }
    if (is_array($carat_labels)) {
        $carat_english = array('24k'=>'24K Gold','22k'=>'22K Gold','21k'=>'21K Gold','18k'=>'18K Gold','14k'=>'14K Gold','12k'=>'12K Gold','24k_oz'=>'Gold Ounce','gold_pound'=>'Gold Coin');
        foreach ($carat_labels as $key => $arabic_label) {
            if (isset($carat_english[$key]) && is_string($arabic_label) && $arabic_label !== '') {
                $shortcode_translation_map[$arabic_label] = $carat_english[$key];
            }
        }
    }
    if ($arabic_country_name !== '' && $arabic_country_name !== $display_country_name) {
        $shortcode_translation_map[$arabic_country_name] = $display_country_name;
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
      <button class="gold-tab-btn active" type="button" data-tab="now"><?php echo esc_html(goldnow_mt_translate_text('Live Prices', $en_header_language)); ?></button>
      <button class="gold-tab-btn" type="button" data-tab="buy-sell"><?php echo esc_html(goldnow_mt_translate_text('Gold Bars', $en_header_language)); ?></button>
      <button class="gold-tab-btn" type="button" data-tab="indicator"><?php echo esc_html(goldnow_mt_translate_text('Gold Price Chart', $en_header_language)); ?></button>
    </div>

    <!-- ✅ Tab Content Container -->
    <div class="gold-tabs-content">
      
      <!-- 1. Live Prices Pane -->
      <div id="tab-now" class="gold-tab-pane" style="display:block;">
        <!-- 📊 SEO Heading: Fully programmatically structured in English layout -->
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align: left; direction: ltr;">
          <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
          <img alt="<?php echo esc_attr(goldnow_mt_translate_block('flag_of_country', $en_header_language, 'Flag of {country}', array('country' => $display_country_name))); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align: middle; margin-right: 5px;">
        <?php
        $en_heading_section = in_array($gold_view, array('24k','22k','21k','18k','14k','ounce','coin','gold-bars','gold-index','usd'), true) ? $gold_view : 'overview';
        $en_heading_data = function_exists('goldnow_seo_article_data') ? goldnow_seo_article_data($en_header_language, $en_heading_section) : array();
        $en_heading_title = isset($en_heading_data[0]) ? (string) $en_heading_data[0] : 'Gold Prices Today';
        if ($en_heading_section !== 'ounce') {
            $en_heading_title .= ' — ' . $display_country_name;
        }
        echo esc_html($en_heading_title);
        ?>
        </h2>
        
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align: left; direction: ltr;">
          <?php
          $en_subtitle = isset($en_heading_data[1]) ? (string) $en_heading_data[1] : '';
          echo esc_html($en_subtitle);
          ?>
        </h3>

        <!-- Gold Price Cards Shortcode Section -->
        <section id="gold-cards" class="mb-4">
            <?php echo altaqrer_gold_en_translate_shortcode_html(do_shortcode('[infi_gold_cards currency="' . esc_attr($country_currency) . '" currency_label="' . esc_attr($currency_label) . '"]'), $shortcode_translation_map); ?>
        </section>

        <!-- Gold Information Panels Shortcode Section -->
        <section id="gold-info-boxes" class="mb-4">
            <?php echo altaqrer_gold_en_translate_shortcode_html(do_shortcode('[infi_gold_info_boxes currency="' . esc_attr($country_currency) . '"]'), $shortcode_translation_map); ?>
        </section>
	  </div>
		
      <!-- 2. Gold Bullion Bars and Coins Table Pane -->
      <div id="tab-buy-sell" class="gold-tab-pane" style="display:none; text-align: left; direction: ltr;">
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align:left !important; direction:ltr !important;">
            <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
            <img alt="<?php echo esc_html(goldnow_mt_translate_block('gold_bars_and_coins', $en_header_language)); ?> — <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; margin-right: 5px;">
            Gold Bars and Coins in <?php echo esc_html($display_country_name); ?>
        </h2>
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align:left !important; direction:ltr !important;">
          Latest gold bar and coin prices (excluding making charges)
        </h3>

        <?php if (function_exists('infi_get_latest_gold_prices')) { ?>
            <!-- A) Gold Bars Price Table -->
            <section id="sabika-price" class="gold-section mt-4">
                <div class="section-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <h4><?php echo esc_html(goldnow_mt_translate_block('gold_bullion_heading', $en_header_language, null, array('country' => $display_country_name))); ?></h4>
                    <span class="date-badge" style="background: #262930; padding: 4px 10px; border-radius: 4px; font-size: 13px;"><?php echo esc_html($today); ?></span>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>Weight / Type</th>
                                <th><?php echo esc_html(goldnow_mt_translate_text('Price', $en_header_language)); ?> (<?php echo esc_html($currency_label); ?>)</th>
                                <th>Price (USD)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $weights = [
                                ['weight' => 1, 'name' => function_exists('goldnow_mt_translate_block') ? goldnow_mt_translate_block('gold_bar_weight', $en_header_language, null, array('weight' => '1')) : 'Gold Bar — 1 Gram'],
                                ['weight' => 2.5, 'name' => function_exists('goldnow_mt_translate_block') ? goldnow_mt_translate_block('gold_bar_weight', $en_header_language, null, array('weight' => '2.5')) : 'Gold Bar — 2.5 Grams'],
                                ['weight' => 5, 'name' => function_exists('goldnow_mt_translate_block') ? goldnow_mt_translate_block('gold_bar_weight', $en_header_language, null, array('weight' => '5')) : 'Gold Bar — 5 Grams'],
                                ['weight' => 10, 'name' => function_exists('goldnow_mt_translate_block') ? goldnow_mt_translate_block('gold_bar_weight', $en_header_language, null, array('weight' => '10')) : 'Gold Bar — 10 Grams'],
                                ['weight' => 20, 'name' => function_exists('goldnow_mt_translate_block') ? goldnow_mt_translate_block('gold_bar_weight', $en_header_language, null, array('weight' => '20')) : 'Gold Bar — 20 Grams'],
                                ['weight' => 31.1, 'name' => function_exists('goldnow_mt_translate') ? goldnow_mt_translate('global_gold_ounce', $en_header_language) . ' (31.1 g)' : 'Troy Ounce (31.1 g)'],
                                ['weight' => 50, 'name' => function_exists('goldnow_mt_translate_block') ? goldnow_mt_translate_block('gold_bar_weight', $en_header_language, null, array('weight' => '50')) : 'Gold Bar — 50 Grams'],
                                ['weight' => 100, 'name' => function_exists('goldnow_mt_translate_block') ? goldnow_mt_translate_block('gold_bar_weight', $en_header_language, null, array('weight' => '100')) : 'Gold Bar — 100 Grams'],
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
                    <h4><?php echo esc_html(goldnow_mt_translate_block('gold_coin_heading', $en_header_language, null, array('country' => $display_country_name))); ?></h4>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th><?php echo esc_html(goldnow_mt_translate_text('Coin Purity', $en_header_language)); ?></th>
                                <th><?php echo esc_html(goldnow_mt_translate_text('Price', $en_header_language)); ?> (<?php echo esc_html($currency_label); ?>)</th>
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
                                    <td class="font-bold"><?php echo esc_html(goldnow_mt_translate_block('gold_coin_karat', $en_header_language, null, array('karat' => $carat_num))); ?></td>
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
                <strong><?php echo esc_html(goldnow_mt_translate_text('Important:', $en_header_language)); ?></strong> <?php echo esc_html(goldnow_mt_translate_block('bar_coin_disclaimer', $en_header_language)); ?>
            </div>

        <?php } else { ?>
            <p style="text-align:center; padding:20px;"><?php echo esc_html(goldnow_mt_translate_block('market_unavailable', $en_header_language)); ?></p>
        <?php } ?>
      </div>

      <!-- 3. Gold Price Chart: restored to match the Arabic template structure. -->
      <div id="tab-indicator" class="gold-tab-pane" style="display:none; direction:ltr; text-align:left;">
        <h2 class="col-12 p-0 font-3 mb-3" style="text-align:left; direction:ltr;">
          <span class="start-head cls120" style="background: <?php echo esc_attr(get_theme_mod('infi_default_color', '#ffb301')); ?>;"></span>
          <?php echo esc_html(goldnow_mt_translate_block('chart_title', $en_header_language)); ?> — <?php echo esc_html($display_country_name); ?>
        </h2>
        <div class="gold-frame-box mb-4" style="direction:ltr; text-align:left;">
          <?php
          $en_chart_shortcode = '[infi_gold_chart carat="21k" currency="' . esc_attr($country_currency) . '" title="' . esc_attr(goldnow_mt_translate_block('chart_title', $en_header_language)) . '"]';
          echo altaqrer_gold_en_translate_shortcode_html(do_shortcode($en_chart_shortcode), $shortcode_translation_map);
          ?>
        </div>
        <div id="ajax-indicator-frames" class="gold-frame-box" style="direction:ltr; text-align:left;"></div>
        <p style="color:#94a3b8; text-align:left; font-size:13px; margin:10px 4px 18px;"><?php echo esc_html(goldnow_mt_translate_block('chart_note', $en_header_language)); ?></p>
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
        'جنيه الذهب': 'Gold Coin', 'سعر الدولار': 'US Dollar Exchange Rate',
        'جنيه مصري': 'Egyptian Pound', 'دولار أمريكي': 'US Dollar',
        'انضم إلى قناتنا على تيليجرام': 'Join Our Telegram Channel',
        'انضم إلى قناتنا على تليجرام': 'Join Our Telegram Channel'
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
                framesContainer.innerHTML = '<p style="text-align:center;padding:18px;color:#cbd5e1;">' + <?php echo wp_json_encode(goldnow_mt_translate_block('chart_loading', $en_header_language)); ?> + '</p>';
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
                    framesContainer.innerHTML = '<p style="text-align:center;padding:18px;color:#fca5a5;">' + <?php echo wp_json_encode(goldnow_mt_translate_block('chart_error', $en_header_language)); ?> + '</p>';
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
    <p style="margin-top: 0; margin-bottom: 15px;">📊 <?php echo esc_html(goldnow_mt_translate_block('live_intro', $en_header_language, null, array('country' => $display_country_name))); ?> <img alt="<?php echo esc_attr(goldnow_mt_translate_block('flag_of_country', $en_header_language, 'Flag of {country}', array('country' => $display_country_name))); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align:middle; margin: 0 4px;"> <strong><?php echo esc_html($today); ?></strong>.</p>
    <p style="margin-bottom: 15px;">💡 <?php echo esc_html(goldnow_mt_translate_block('live_categories', $en_header_language)); ?></p>
    <p style="margin-bottom: 15px;">✨ <?php echo esc_html(goldnow_mt_translate_block('live_24k', $en_header_language, null, array('price' => number_format($gram_24k_price_currency, 2), 'currency' => $currency_label, 'usd' => number_format($gram_24k_price_usd_converted, 2)))); ?></p>
    <p style="margin-bottom: 15px;">📈 <?php echo esc_html(goldnow_mt_translate_block('live_ounce', $en_header_language, null, array('price' => number_format($ounce_price_usd, 2)))); ?></p>
    <p style="margin-bottom: 15px;">🪙 <?php echo esc_html(goldnow_mt_translate_block('live_coin', $en_header_language, null, array('price' => number_format($gold_pound_currency, 2), 'currency' => $currency_label))); ?></p>
    <p style="margin-bottom: 20px;">🛠️ <?php echo esc_html(goldnow_mt_translate_block('live_index', $en_header_language)); ?></p>
    <div style="background: #17191d; padding: 12px; border-radius: 6px; border: 1px dashed #3a3f4d; color: #d1d5db; font-size: 14px; margin-top: 15px;">💵 <?php echo esc_html(goldnow_mt_translate_block('live_exchange', $en_header_language, null, array('country' => $display_country_name, 'rate' => number_format($local_currency_per_usd, 2), 'currency' => $currency_label))); ?></div>
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
                    <div><img alt="Flag of United States" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html(goldnow_mt_translate_block('currency_usd', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                    <div><img alt="Flag of United Kingdom" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html(goldnow_mt_translate_block('currency_gbp', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                    <div><img alt="Flag of Saudi Arabia" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html(goldnow_mt_translate_block('currency_sar', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>

                <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                    <div><img alt="Flag of Bahrain" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html(goldnow_mt_translate_block('currency_bhd', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                    <div><img alt="Flag of Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html(goldnow_mt_translate_block('currency_omr', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                    <div><img alt="Flag of European Union" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html(goldnow_mt_translate_block('currency_eur', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                    <div><img alt="Flag of United Arab Emirates" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html(goldnow_mt_translate_block('currency_aed', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                    <div><img alt="Flag of Kuwait" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html(goldnow_mt_translate_block('currency_kwd', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                    <div><img alt="Flag of Qatar" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html(goldnow_mt_translate_block('currency_qar', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                    <div><img alt="Flag of Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html(goldnow_mt_translate_block('currency_jpy', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
        </div>
        <p style="margin: 15px 0 0 0; font-size: 12px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 8px; text-align: left; direction: ltr;"><?php echo esc_html(goldnow_mt_translate_block('market_update_note', $en_header_language)); ?></p>
    </div>
<?php endif; ?>

<div class="altaqrer-silo-links" style="margin: 25px auto; padding: 15px; background: #17191d; border: 1px solid #3a3f4d; border-radius: 6px; text-align: center; max-width: 800px; width: 95%; box-sizing: border-box; clear: both; direction: ltr;">
    <?php
    // Reuse the already-resolved English country URL for every tab link.
    $base_country_url = $en_header_country_url;

    $active_bg = get_theme_mod('infi_default_color', '#ffb301');
    $active_color = '#000000';
    $default_bg = '#262930';
    $default_color = '#ffffff';

    $tabs = [
        ['key' => '',          'en' => 'Gold Price'],
        ['key' => '24k',       'en' => '24K'],
        ['key' => '22k',       'en' => '22K'],
        ['key' => '21k',       'en' => '21K'],
        ['key' => '18k',       'en' => '18K'],
        ['key' => '14k',       'en' => '14K'],
        ['key' => 'ounce',     'en' => 'Gold Ounce'],
        ['key' => 'coin',      'en' => 'Gold Coin'],
        ['key' => 'gold-bars', 'en' => 'Gold Bars'],
        ['key' => 'gold-index','en' => 'Gold Index'],
        ['key' => 'usd',       'en' => 'USD and Currency Rates'],
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
            $label = $tab['en'];
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
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;"><?php echo esc_html(goldnow_mt_translate_block('gold_index_heading', $en_header_language, null, array('country' => $display_country_name))); ?> <img alt="Flag of <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong><?php echo esc_html(goldnow_mt_translate_block('gold_label_24k', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;"><?php echo esc_html(goldnow_mt_translate_block('value_label', $en_header_language)); ?>: <?php echo number_format($price_24k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong><?php echo esc_html(goldnow_mt_translate_block('gold_label_22k', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;"><?php echo esc_html(goldnow_mt_translate_block('value_label', $en_header_language)); ?>: <?php echo number_format($price_22k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><?php echo esc_html(goldnow_mt_translate_block('gold_label_21k', $en_header_language)); ?>:</strong> <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;"><?php echo esc_html(goldnow_mt_translate_block('value_label', $en_header_language)); ?>: <?php echo number_format($price_21k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong><?php echo esc_html(goldnow_mt_translate_block('gold_label_18k', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;"><?php echo esc_html(goldnow_mt_translate_block('value_label', $en_header_language)); ?>: <?php echo number_format($price_18k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong><?php echo esc_html(goldnow_mt_translate_block('gold_label_14k', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;"><?php echo esc_html(goldnow_mt_translate_block('value_label', $en_header_language)); ?>: <?php echo number_format($price_14k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong><?php echo esc_html(goldnow_mt_translate('global_gold_ounce', $en_header_language)); ?> (31.1g):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong></span><br><small style="color:#94a3b8;">International spot price, quoted in USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong><?php echo esc_html(goldnow_mt_translate('local_gold_ounce', $en_header_language)); ?> (31.1g):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">The same global ounce benchmark converted to the local currency</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    <?php $en_localized_topic = function_exists('goldnow_seo_article_data') ? goldnow_seo_article_data($en_header_language, 'gold-index') : array(); echo esc_html(isset($en_localized_topic[2]) ? $en_localized_topic[2] : ''); ?>
                </p>


            <?php elseif ($gold_view == 'gold-bars') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;"><?php echo esc_html(goldnow_mt_translate_block('gold_bullion_heading', $en_header_language, null, array('country' => $display_country_name))); ?></strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong><?php echo esc_html(goldnow_mt_translate_block('gold_bar_weight', $en_header_language, null, array('weight' => '1'))); ?>:</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_24k_local * 1, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;"><?php echo esc_html(goldnow_mt_translate_block('value_label', $en_header_language)); ?>: <?php echo number_format($price_24k_usd * 1, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong><?php echo esc_html(goldnow_mt_translate_block('gold_bar_weight', $en_header_language, null, array('weight' => '2.5'))); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 2.5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;"><?php echo esc_html(goldnow_mt_translate_block('value_label', $en_header_language)); ?>: <?php echo number_format($price_24k_usd * 2.5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong><?php echo esc_html(goldnow_mt_translate_block('gold_bar_weight', $en_header_language, null, array('weight' => '5'))); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;"><?php echo esc_html(goldnow_mt_translate_block('value_label', $en_header_language)); ?>: <?php echo number_format($price_24k_usd * 5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong><?php echo esc_html(goldnow_mt_translate_block('gold_bar_weight', $en_header_language, null, array('weight' => '10'))); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 10, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;"><?php echo esc_html(goldnow_mt_translate_block('value_label', $en_header_language)); ?>: <?php echo number_format($price_24k_usd * 10, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong><?php echo esc_html(goldnow_mt_translate_block('gold_bar_weight', $en_header_language, null, array('weight' => '20'))); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 20, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;"><?php echo esc_html(goldnow_mt_translate_block('value_label', $en_header_language)); ?>: <?php echo number_format($price_24k_usd * 20, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong><?php echo esc_html(goldnow_mt_translate('global_gold_ounce', $en_header_language)); ?> (31.1 g):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;"><?php echo esc_html(goldnow_mt_translate_block('value_label', $en_header_language)); ?>: <?php echo number_format($ounce_price_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong><?php echo esc_html(goldnow_mt_translate_block('gold_bar_weight', $en_header_language, null, array('weight' => '50'))); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 50, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;"><?php echo esc_html(goldnow_mt_translate_block('value_label', $en_header_language)); ?>: <?php echo number_format($price_24k_usd * 50, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong><?php echo esc_html(goldnow_mt_translate_block('gold_bar_weight', $en_header_language, null, array('weight' => '100'))); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 100, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;"><?php echo esc_html(goldnow_mt_translate_block('value_label', $en_header_language)); ?>: <?php echo number_format($price_24k_usd * 100, 2); ?> USD</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    <?php $en_localized_topic = function_exists('goldnow_seo_article_data') ? goldnow_seo_article_data($en_header_language, 'gold-bars') : array(); echo esc_html(isset($en_localized_topic[2]) ? $en_localized_topic[2] : ''); ?>
                </p>

            <?php elseif ($gold_view == 'coin') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;"><?php echo esc_html(goldnow_mt_translate_block('gold_coin_heading', $en_header_language, null, array('country' => $display_country_name))); ?></strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong><?php echo esc_html(goldnow_mt_translate_block('gold_coin_karat', $en_header_language, null, array('karat' => '21'))); ?>:</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_21k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;"><?php echo esc_html(goldnow_mt_translate_block('value_label', $en_header_language)); ?>: <?php echo number_format($price_21k_usd * 8, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong><?php echo esc_html(goldnow_mt_translate_block('gold_coin_karat', $en_header_language, null, array('karat' => '22'))); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;"><?php echo esc_html(goldnow_mt_translate_block('value_label', $en_header_language)); ?>: <?php echo number_format($price_22k_usd * 8, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong><?php echo esc_html(goldnow_mt_translate_block('gold_coin_karat', $en_header_language, null, array('karat' => '24'))); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;"><?php echo esc_html(goldnow_mt_translate_block('value_label', $en_header_language)); ?>: <?php echo number_format($price_24k_usd * 8, 2); ?> USD</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    <?php $en_localized_topic = function_exists('goldnow_seo_article_data') ? goldnow_seo_article_data($en_header_language, 'coin') : array(); echo esc_html(isset($en_localized_topic[2]) ? $en_localized_topic[2] : ''); ?>
                </p>

            <?php elseif ($gold_view == 'usd') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;"><?php echo esc_html(goldnow_mt_translate_block('exchange_rates_heading', $en_header_language, null, array('currency' => $currency_label, 'country' => $display_country_name))); ?></strong>
                
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; text-align: left; direction: ltr; margin-bottom: 20px;">
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'USD') : ?>
                            <div><img alt="Flag of US" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html(goldnow_mt_translate_block('currency_usd', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                            <div><img alt="Flag of UK" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html(goldnow_mt_translate_block('currency_gbp', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                            <div><img alt="Flag of SA" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html(goldnow_mt_translate_block('currency_sar', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                            <div><img alt="Flag of BH" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html(goldnow_mt_translate_block('currency_bhd', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                            <div><img alt="Flag of Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html(goldnow_mt_translate_block('currency_omr', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                            <div><img alt="Flag of EU" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html(goldnow_mt_translate_block('currency_eur', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                            <div><img alt="Flag of AE" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html(goldnow_mt_translate_block('currency_aed', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                            <div><img alt="Flag of KW" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html(goldnow_mt_translate_block('currency_kwd', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                            <div><img alt="Flag of QA" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html(goldnow_mt_translate_block('currency_qar', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                            <div><img alt="Flag of Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html(goldnow_mt_translate_block('currency_jpy', $en_header_language)); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    This dynamic index monitors banking cross rates. Local gold price benchmarks scale directly with exchange fluctuations against global reserves.
                </p>

            <?php elseif ($gold_view == '24k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;"><?php echo esc_html(goldnow_mt_translate_block('live_report_heading', $en_header_language, null, array('karat' => '24K', 'country' => $display_country_name))); ?></strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong><?php echo esc_html(goldnow_mt_translate_block('price_local_label', $en_header_language)); ?>:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong><?php echo esc_html(goldnow_mt_translate_block('price_usd_label', $en_header_language)); ?>:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_24k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    <?php $en_localized_topic = function_exists('goldnow_seo_article_data') ? goldnow_seo_article_data($en_header_language, '24k') : array(); echo esc_html(isset($en_localized_topic[2]) ? $en_localized_topic[2] : ''); ?>
                </p>

            <?php elseif ($gold_view == '22k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;"><?php echo esc_html(goldnow_mt_translate_block('live_report_heading', $en_header_language, null, array('karat' => '22K', 'country' => $display_country_name))); ?></strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong><?php echo esc_html(goldnow_mt_translate_block('price_local_label', $en_header_language)); ?>:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong><?php echo esc_html(goldnow_mt_translate_block('price_usd_label', $en_header_language)); ?>:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_22k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    <?php $en_localized_topic = function_exists('goldnow_seo_article_data') ? goldnow_seo_article_data($en_header_language, '22k') : array(); echo esc_html(isset($en_localized_topic[2]) ? $en_localized_topic[2] : ''); ?>
                </p>

            <?php elseif ($gold_view == '21k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;"><?php echo esc_html(goldnow_mt_translate_block('live_report_heading', $en_header_language, null, array('karat' => '21K', 'country' => $display_country_name))); ?></strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong><?php echo esc_html(goldnow_mt_translate_block('price_local_label', $en_header_language)); ?>:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong><?php echo esc_html(goldnow_mt_translate_block('price_usd_label', $en_header_language)); ?>:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_21k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    <?php $en_localized_topic = function_exists('goldnow_seo_article_data') ? goldnow_seo_article_data($en_header_language, '21k') : array(); echo esc_html(isset($en_localized_topic[2]) ? $en_localized_topic[2] : ''); ?>
                </p>

            <?php elseif ($gold_view == '18k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;"><?php echo esc_html(goldnow_mt_translate_block('live_report_heading', $en_header_language, null, array('karat' => '18K', 'country' => $display_country_name))); ?></strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong><?php echo esc_html(goldnow_mt_translate_block('price_local_label', $en_header_language)); ?>:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong><?php echo esc_html(goldnow_mt_translate_block('price_usd_label', $en_header_language)); ?>:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_18k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    <?php $en_localized_topic = function_exists('goldnow_seo_article_data') ? goldnow_seo_article_data($en_header_language, '18k') : array(); echo esc_html(isset($en_localized_topic[2]) ? $en_localized_topic[2] : ''); ?>
                </p>

            <?php elseif ($gold_view == '14k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;"><?php echo esc_html(goldnow_mt_translate_block('live_report_heading', $en_header_language, null, array('karat' => '14K', 'country' => $display_country_name))); ?></strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong><?php echo esc_html(goldnow_mt_translate_block('price_local_label', $en_header_language)); ?>:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong><?php echo esc_html(goldnow_mt_translate_block('price_usd_label', $en_header_language)); ?>:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_14k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    <?php $en_localized_topic = function_exists('goldnow_seo_article_data') ? goldnow_seo_article_data($en_header_language, '14k') : array(); echo esc_html(isset($en_localized_topic[2]) ? $en_localized_topic[2] : ''); ?>
                </p>

            <?php elseif ($gold_view == 'ounce') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Global Gold Ounce Price Today (31.1g):</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong><?php echo esc_html(goldnow_mt_translate_block('international_spot', $en_header_language)); ?>:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($ounce_price_usd, 2); ?></strong></span> USD</li>
                    <li>🔹 <strong><?php echo esc_html(goldnow_mt_translate_block('quote_currency', $en_header_language)); ?>:</strong> US Dollar (USD)</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    <?php $en_localized_topic = function_exists('goldnow_seo_article_data') ? goldnow_seo_article_data($en_header_language, 'ounce') : array(); echo esc_html(isset($en_localized_topic[2]) ? $en_localized_topic[2] : ''); ?>
                </p>
            <?php endif; ?>

        </div>
    </div>
    <?php
}
?>

<?php
if (!empty($gold_view) && function_exists('goldnow_render_seo_article')) :
    $en_seo_prices = array(
        '24k' => $price_24k_local,
        '22k' => $price_22k_local,
        '21k' => $price_21k_local,
        '18k' => $price_18k_local,
        '14k' => $price_14k_local,
        'ounce_usd' => $ounce_price_usd,
        'coin' => $gold_pound_currency,
        'usd_rate' => $local_currency_per_usd,
        'usd' => $local_currency_per_usd
    );
    echo goldnow_render_seo_article($en_header_language, $gold_view, array(
        'country' => $display_country_name,
        'currency' => $currency_label,
        'date' => $today,
        'country_slug' => $en_header_country_slug,
        'base_url' => $en_header_country_url,
        'prices' => $en_seo_prices
    ));
endif;
?>

<?php if (!$en_header_is_app) : ?>
<footer class="en-site-footer">
  <div class="en-site-footer-inner">
    <section>
      <h3><?php echo esc_html(goldnow_mt_translate_block('about_altaqrer', $en_header_language)); ?></h3>
      <p><strong>AlTaqrer Gold</strong> helps readers follow gold prices across regional and international markets. Explore live reference prices for 24K, 22K, 21K, 18K and 14K gold, compare bullion bar and 8-gram coin values, and track the global gold ounce in USD. Prices are provided for information and comparison; final retail prices may include workmanship, premiums, and taxes.</p>
    </section>
    <section>
      <h3><?php echo esc_html(goldnow_mt_translate('gold_price_sections', $en_header_language)); ?></h3>
      <ul>
        <li><a href="<?php echo esc_url($en_header_country_url); ?>"><?php echo esc_html(goldnow_mt_translate_block('gold_prices_in_country', $en_header_language, null, array('country' => (isset($display_country_name) ? $display_country_name : '')))); ?></a></li>
        <li><a href="<?php echo esc_url($en_header_country_url . 'gold-bars/'); ?>"<?php echo esc_html(goldnow_mt_translate_block('gold_bars_and_coins', $en_header_language)); ?></a></li>
        <li><a href="<?php echo esc_url($en_header_country_url . 'gold-index/'); ?>"<?php echo esc_html(goldnow_mt_translate_block('live_gold_index', $en_header_language)); ?></a></li>
        <li><a href="<?php echo esc_url($en_header_country_url . 'usd/'); ?>"<?php echo esc_html(goldnow_mt_translate_block('usd_and_currency_rates', $en_header_language)); ?></a></li>
      </ul>
    </section>
    <section>
      <h3><?php echo esc_html(goldnow_mt_translate('regional_gold_prices', $en_header_language)); ?></h3>
      <ul>
        <li><a href="<?php echo esc_url((function_exists('goldnow_mt_language_url') ? goldnow_mt_language_url($en_header_language, home_url('/country/eg/')) : home_url('/en/country/eg/'))); ?>"<?php echo esc_html(goldnow_mt_translate_block('gold_prices_in_country', $en_header_language, null, array('country' => $en_country_label_eg))); ?></a></li>
        <li><a href="<?php echo esc_url((function_exists('goldnow_mt_language_url') ? goldnow_mt_language_url($en_header_language, home_url('/country/sa/')) : home_url('/en/country/sa/'))); ?>"<?php echo esc_html(goldnow_mt_translate_block('gold_prices_in_country', $en_header_language, null, array('country' => $en_country_label_sa))); ?></a></li>
        <li><a href="<?php echo esc_url((function_exists('goldnow_mt_language_url') ? goldnow_mt_language_url($en_header_language, home_url('/country/ae/')) : home_url('/en/country/ae/'))); ?>"<?php echo esc_html(goldnow_mt_translate_block('gold_prices_in_country', $en_header_language, null, array('country' => $en_country_label_ae))); ?></a></li>
        <li><a href="<?php echo esc_url((function_exists('goldnow_mt_language_url') ? goldnow_mt_language_url($en_header_language, home_url('/country/kw/')) : home_url('/en/country/kw/'))); ?>"<?php echo esc_html(goldnow_mt_translate_block('gold_prices_in_country', $en_header_language, null, array('country' => $en_country_label_kw))); ?></a></li>
      </ul>
      <h3 style="margin-top:16px;">Follow Us</h3>
      <ul>
        <li><a href="https://t.me/goldaltaqrer" target="_blank" rel="noopener noreferrer">Join Our Telegram Channel</a></li>
      </ul>
    </section>
    <?php
    // Show only real published English pages; never leave dead /en/# placeholder links.
    $en_footer_pages = array();
    foreach (array(
        'privacy-policy' => 'Privacy Policy',
        'terms-of-use'   => 'Terms of Use',
        'contact-us'     => 'Contact Us'
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
      <h3>Important Links</h3>
      <ul>
        <?php foreach ($en_footer_pages as $footer_page) : ?>
          <li><a href="<?php echo esc_url($footer_page['url']); ?>"><?php echo esc_html($footer_page['label']); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </section>
    <?php endif; ?>
  </div>
  <div class="en-footer-bottom">All rights reserved &copy; <?php echo esc_html(function_exists('wp_date') ? wp_date('Y') : date('Y')); ?> to <a href="<?php echo esc_url($en_header_home_url); ?>">AlTaqrer Gold</a>.</div>
</footer>
<?php endif; ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
  var toggle = document.querySelector('.en-country-toggle');
  var menu = document.getElementById('en-country-menu');
  if (!toggle || !menu) return;
  toggle.addEventListener('click', function (event) {
    event.preventDefault();
    var opened = menu.classList.toggle('is-open');
    toggle.setAttribute('aria-expanded', opened ? 'true' : 'false');
  });
  document.addEventListener('click', function (event) {
    if (!event.target.closest('.en-country-wrap')) {
      menu.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
    }
  });
});
</script>
<?php wp_footer(); ?>
<?php
$en_mt_output = ob_get_clean();
echo altaqrer_gold_mt_translate_page_html($en_mt_output, $en_header_language);
?>
</body>
</html>
