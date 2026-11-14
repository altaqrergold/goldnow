<?php
/* Template Name: Deutsch — Gold Country Prices (SEO Test) */

/** DE output localization: translate rendered text and accessible labels only. */
if (!function_exists('altaqrer_gold_de_output_translate')) {
function altaqrer_gold_de_output_translate($html) {
    $map = array(
        "Live foreign exchange rates for major international and regional currencies" => "Aktuelle Wechselkurse für wichtige internationale und regionale Währungen",
        "International spot benchmark for one troy ounce of 24K gold, quoted in USD" => "Internationaler Spot-Referenzpreis für eine Feinunze 24-karätiges Gold in USD",
        "What weight is used for the gold coin calculation?" => "Welches Gewicht wird für die Berechnung der Goldmünze verwendet?",
        "Does the displayed value include a dealer premium?" => "Enthält der angezeigte Wert einen Händleraufschlag?",
        "Sorry, the market data is currently unavailable." => "Entschuldigung, die Marktdaten sind derzeit nicht verfügbar.",
        "live market price, excluding making charges" => "aktueller Marktpreis ohne Verarbeitungskosten",
        "How to read the local and USD prices" => "Lokale Preise und USD-Preise verstehen",
        "Frequently asked questions" => "Häufig gestellte Fragen",
        "Gold Bullion Bar Prices in" => "Goldbarrenpreise in",
        "Gold Price per Gram Today" => "Goldpreis pro Gramm heute",
        "Join Our Telegram Channel" => "Unserem Telegram-Kanal beitreten",
        "Excluding Making Charges" => "Ohne Verarbeitungskosten",
        "Gold Bullion Bar Prices" => "Goldbarrenpreise",
        "Gold Bars and Coins in" => "Goldbarren und Münzen in",
        "USD and Currency Rates" => "USD- und Wechselkurse",
        "Regional Gold Prices" => "Regionale Goldpreise",
        "Gold Bars and Coins" => "Goldbarren und Münzen",
        "Gold Price Sections" => "Goldpreisbereiche",
        "Gold Price Chart in" => "Goldpreisdiagramm in",
        "About AlTaqrer Gold" => "Über AlTaqrer Gold",
        "All rights reserved" => "Alle Rechte vorbehalten",
        "Related gold prices" => "Verwandte Goldpreise",
        "Gold Coin Prices in" => "Goldmünzenpreise in",
        "Gold Price Today in" => "Goldpreis heute in",
        "Global Gold Ounce" => "Weltweite Goldunze",
        "Gold Coin Prices" => "Goldmünzenpreise",
        "Gold Price Chart" => "Goldpreisdiagramm",
        "Gold Price Today" => "Goldpreis heute",
        "Important Links" => "Wichtige Links",
        "Reference date:" => "Referenzdatum:",
        "Live Gold Index" => "Live-Goldindex",
        "Local Currency" => "Landeswährung",
        "Privacy Policy" => "Datenschutzerklärung",
        "Gold Prices in" => "Goldpreise in",
        "All Countries" => "Alle Länder",
        "Weight / Type" => "Gewicht / Typ",
        "Terms of Use" => "Nutzungsbedingungen",
        "Gold Prices" => "Goldpreise",
        "Live Prices" => "Live-Preise",
        "Coin Purity" => "Münzfeinheit",
        "Gold Price" => "Goldpreis",
        "Gold Index" => "Goldindex",
        "Important:" => "Wichtig:",
        "Contact Us" => "Kontakt",
        "Gold Bars" => "Goldbarren",
        "Gold Coin" => "Goldmünze",
        "Countries" => "Länder",
        "USD Rates" => "USD-Kurse",
        "Follow Us" => "Folgen Sie uns",
        "What does" => "Was bedeutet",
        "Today in" => "heute in",
        "per Gram" => "pro Gramm",
        "Price" => "Preis",
        "Home" => "Startseite",
        "Yes." => "Ja.",
        "Important Notice:" => "Wichtiger Hinweis:",
        "Live Price" => "Live-Preis",
        "Highest Price" => "Höchstpreis",
        "Lowest Price" => "Tiefstpreis",
        "Change" => "Änderung",
        "Live Update" => "Live-Aktualisierung",
        "Price in USD" => "Preis in USD",
        "Gold Ounce in Local Currency" => "Goldunze in Landeswährung",
        "Gold Coin Price" => "Goldmünzenpreis",
        "US Dollar Rate" => "US-Dollar-Kurs",
        "US Dollar Rate Today" => "US-Dollar-Kurs heute",
        "Gold Price in USD" => "Goldpreis in USD",
        "Egyptian Pound" => "Ägyptisches Pfund",
        "US Dollar" => "US-Dollar",
        "Most Traded" => "Am häufigsten gehandelt",
        "Gold Price" => "Goldpreis",
        "Gold Prices" => "Goldpreise",
        "home" => "Startseite",
        "Goldbarren — 1 g" => "Goldbarren — 1 Gramm",
        "Goldbarren — 2,5 g" => "Goldbarren — 2,5 Gramm",
        "Goldbarren — 5 g" => "Goldbarren — 5 Gramm",
        "Goldbarren — 10 g" => "Goldbarren — 10 Gramm",
        "Goldbarren — 20 g" => "Goldbarren — 20 Gramm",
        "Goldbarren — 50 g" => "Goldbarren — 50 Gramm",
        "Goldbarren — 100 g" => "Goldbarren — 100 Gramm",
        "Feinunze (31,1 g)" => "Feinunze (31,1 g)",
        "24K Gold" => "24-karätiges Gold",
        "22K Gold" => "22-karätiges Gold",
        "21K Gold" => "21-karätiges Gold",
        "21K Gold Price Movement" => "Kursentwicklung des Goldpreises für 21 Karat",
        "18K Gold" => "18-karätiges Gold",
        "14K Gold" => "14-karätiges Gold",
        "12K Gold" => "12-karätiges Gold",
        "Gold Gram" => "Goldgramm",
        "Gold Ounce" => "Goldunze",
        "Prices" => "Preise",
        "Changes" => "Änderungen",
        "No." => "Nein.",
        "Why the global gold ounce matters" => "Warum der weltweite Goldpreis je Unze wichtig ist",
        "From the global ounce to a local gram price" => "Vom weltweiten Unzenpreis zum lokalen Grammpreis",
        "Gold Price Charts" => "Goldpreisdiagramme",
        "Track the international gold spot price in US dollars (USD) using the global XAU/USD market chart. This is a worldwide benchmark, not a country-specific retail price." => "Verfolgen Sie den internationalen Gold-Spotpreis in US-Dollar (USD) anhand des weltweiten XAU/USD-Marktdiagramms. Dies ist ein globaler Referenzwert und kein landesspezifischer Einzelhandelspreis.",
        "How many grams are in a gold troy ounce?" => "Wie viele Gramm enthält eine Feinunze Gold?",
        "Is this ounce price converted to local currency?" => "Wird dieser Unzenpreis in die Landeswährung umgerechnet?",
        "How to compare gold bullion bar weights" => "So vergleichen Sie die Gewichte von Goldbarren",
        "What the gold index helps you compare" => "Was Sie mit dem Goldindex vergleichen können",
        "How currency movements affect local gold prices" => "Wie Währungsbewegungen lokale Goldpreise beeinflussen",
        "Live Gold Market Index and Karat Prices in " => "Live-Goldmarktindex und Karatpreise in ",
        "Global Gold Ounce Price Today in USD" => "Weltweiter Goldpreis je Unze heute in USD",
        "8-Gram Gold Coin Price Today in " => "Preis einer 8-Gramm-Goldmünze heute in ",
        "Gold Bar Prices Today in " => "Goldbarrenpreise heute in ",
        "USD Exchange Rate and Currency Conversion in " => "USD-Wechselkurs und Währungsumrechnung in ",
        "Gold Prices in Egypt" => "Goldpreise in Ägypten",
        "Gold Prices in Saudi Arabia" => "Goldpreise in Saudi-Arabien",
        "Gold Prices in the UAE" => "Goldpreise in den Vereinigten Arabischen Emiraten",
        "Gold Prices in Kuwait" => "Goldpreise in Kuwait",
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
        $token = 'ALTQRGOLDDEBLOCK' . count($protected) . 'TOKEN';
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
ob_start('altaqrer_gold_de_output_translate');

/**
 * Standalone English header for the country gold-price template.
 * The Arabic theme header and navigation are not loaded here.
 */
$de_header_term = get_queried_object();
$de_header_country_slug = (is_object($de_header_term) && !empty($de_header_term->slug))
    ? sanitize_title($de_header_term->slug)
    : '';
if ($de_header_country_slug === '' && is_object($de_header_term) && !empty($de_header_term->term_id)) {
    $de_header_country_slug = strtolower((string) get_term_meta((int) $de_header_term->term_id, 'country_code', true));
}
if ($de_header_country_slug === '') {
    $de_header_country_slug = 'eg';
}
$de_header_country_url = home_url('/de/country/' . rawurlencode($de_header_country_slug) . '/');
$de_header_home_url = home_url('/de/');
$de_header_accent = get_theme_mod('infi_default_color', '#ffb301');
$de_header_logo_id = (int) get_theme_mod('custom_logo');
$de_header_is_app = (isset($_GET['view']) && sanitize_text_field(wp_unslash($_GET['view'])) === 'app');
?>
<!DOCTYPE html>
<html lang="de" dir="ltr">
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
<?php
// German SEO metadata: unique Rank Math title and description for each country and section.
$de_meta_term = get_queried_object();
$de_meta_country = '';
if (is_object($de_meta_term) && function_exists('altaqrer_ml_country_name')) {
    $de_meta_country = (string) altaqrer_ml_country_name($de_meta_term, 'de');
}
if ($de_meta_country === '' && is_object($de_meta_term) && !empty($de_meta_term->term_id)) {
    $de_meta_country = (string) get_term_meta((int) $de_meta_term->term_id, 'country_english_name', true);
}
if ($de_meta_country === '' && is_object($de_meta_term) && !empty($de_meta_term->slug)) {
    $de_meta_country = ucwords(str_replace(array('-', '_'), ' ', (string) $de_meta_term->slug));
}
if ($de_meta_country === '') {
    $de_meta_country = 'diesem Land';
}
$de_meta_view = sanitize_key((string) get_query_var('gold_view'));
$de_meta_titles = array(
    '24k' => '24-Karat-Goldpreis heute in ' . $de_meta_country,
    '22k' => '22-Karat-Goldpreis heute in ' . $de_meta_country,
    '21k' => '21-Karat-Goldpreis heute in ' . $de_meta_country',
    '18k' => '18-Karat-Goldpreis heute in ' . $de_meta_country,
    '14k' => '14-Karat-Goldpreis heute in ' . $de_meta_country,
    'ounce' => 'Weltweiter Goldpreis je Feinunze heute in USD',
    'coin' => 'Preis einer 8-Gramm-Goldmünze in ' . $de_meta_country,
    'gold-bars' => 'Goldbarrenpreise heute in ' . $de_meta_country,
    'gold-index' => 'Goldpreisindex und Karatpreise in ' . $de_meta_country,
    'usd' => 'US-Dollar-Wechselkurs in ' . $de_meta_country,
);
$de_meta_descriptions = array(
    '24k' => 'Aktuellen 24-Karat-Goldpreis pro Gramm in ' . $de_meta_country . ' ansehen. Lokale Richtpreise, USD-Vergleich und Informationen zu Reinheit und Berechnung.',
    '22k' => 'Heutigen 22-Karat-Goldpreis pro Gramm in ' . $de_meta_country ' . ' vergleichen. Erfahren Sie mehr über Goldanteil, lokale Währung und den Unterschied zu 24K.',
    '21k' => 'Aktuellen 21-Karat-Goldpreis pro Gramm in ' . $de_meta_country . ' mit USD-Vergleich ansehen. Dazu Informationen zur 8-Gramm-Goldmünze und Preisberechnung.',
    '18k' => '18-Karat-Goldpreis pro Gramm in ' . $de_meta_country . ' ansehen. Erfahren Sie mehr über Goldreinheit, lokale Richtpreise und mögliche Zusatzkosten.',
    '14k' => 'Heutigen 14-Karat-Goldpreis in ' . $de_meta_country . ' ansehen und mit 18K, 21K, 22K und 24K vergleichen. Lokale und internationale Richtwerte.',
    'ounce' => 'Weltweiten Gold-Spotpreis je Feinunze in USD ansehen. Erfahren Sie, wie viel Gramm eine Feinunze enthält und wie sich der globale Preis vom lokalen Grammpreis unterscheidet.',
    'coin' => 'Richtwert einer 8-Gramm-Goldmünze in ' . $de_meta_country . ' ansehen. Vergleichen Sie 21K, 22K und 24K und erfahren Sie mehr über mögliche Zusatzkosten.',
    'gold-bars' => 'Goldbarrenpreise in ' . $de_meta_country . ' für verschiedene Gewichte vergleichen. Berechnung auf Basis des 24-Karat-Referenzpreises pro Gramm.',
    'gold-index' => 'Goldpreise verschiedener Karatstufen in ' . $de_meta_country . ' vergleichen. Mit lokalen Richtwerten und globalem Goldpreis je Feinunze in USD.',
    'usd' => 'Aktuellen USD-Referenzwechselkurs in ' . $de_meta_country . ' ansehen und erfahren, wie Währungsschwankungen lokale Goldpreise beeinflussen.',
);
$de_meta_title = isset($de_meta_titles[$de_meta_view])
    ? $de_meta_titles[$de_meta_view]
    : 'Goldpreis heute in ' . $de_meta_country . ' — aktuelle Goldpreise';
$de_meta_description = isset($de_meta_descriptions[$de_meta_view])
    ? $de_meta_descriptions[$de_meta_view]
    : 'Aktuelle Referenzpreise für 24K, 22K, 21K, 18K und 14K Gold in ' . $de_meta_country . ' ansehen. Goldpreise pro Gramm, lokale Währung und globaler USD-Goldpreis.';
add_filter('rank_math/frontend/title', function ($title) use ($de_meta_title) {
    return $de_meta_title . ' | AlTaqrer Gold';
}, 99);
add_filter('rank_math/frontend/description', function ($description) use ($de_meta_description) {
    return $de_meta_description;
}, 99);
?>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() . '/style.css?v=1sz'); ?>" data-navigate-track="reload">
<script type="application/ld+json">
<?php echo wp_json_encode(array(
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'AlTaqrer Gold',
    'url' => $de_header_home_url,
    'sameAs' => array('https://www.instagram.com/altaqrergold', 'https://www.facebook.com/altaqrergold')
), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>
<style>
html, body { direction:ltr; text-align:left; }
body { background:#f5d771 !important; max-width:100vw; overflow-x:hidden; position:relative; font-family:Inter,Arial,sans-serif; }
.de-site-header { position:relative; z-index:1000; background:#1a1a1a; border-bottom:4px solid <?php echo esc_attr($de_header_accent); ?>; color:#fff; }
.de-site-header-inner { max-width:1200px; width:95%; margin:0 auto; min-height:74px; display:flex; align-items:center; justify-content:space-between; gap:18px; padding:10px 0; }
.en-brand { display:flex; align-items:center; gap:10px; color:#fff; text-decoration:none; font-weight:800; font-size:20px; white-space:nowrap; }
.en-brand img { max-width:54px; max-height:54px; width:auto; height:auto; object-fit:contain; }
.de-main-nav { display:flex; align-items:center; justify-content:flex-end; gap:8px; flex-wrap:wrap; }
.de-main-nav a, .de-country-toggle { color:#fff; text-decoration:none; border:1px solid rgba(255,255,255,.15); background:transparent; border-radius:6px; padding:9px 12px; font:600 13px Inter,Arial,sans-serif; cursor:pointer; }
.de-main-nav a:hover, .de-country-toggle:hover { color:#1a1a1a; background:<?php echo esc_attr($de_header_accent); ?>; }
.de-country-wrap { position:relative; }
.de-country-menu { display:none; position:absolute; top:calc(100% + 6px); left:0; min-width:210px; background:#202329; border:1px solid #444; border-radius:7px; padding:7px; box-shadow:0 8px 24px rgba(0,0,0,.25); z-index:10000; }
.de-country-menu a { display:block; border:0; border-radius:4px; text-align:left; }
.de-country-menu.is-open { display:block; }
@media(max-width:760px) { .de-site-header-inner { align-items:flex-start; flex-direction:column; } .de-main-nav { justify-content:flex-start; width:100%; } .de-main-nav a,.de-country-toggle { padding:8px 10px; } }
@media(max-width:480px) { .de-main-nav { gap:6px; } .de-main-nav a,.de-country-toggle { font-size:12px; } }
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
.de-seo-article { max-width:900px; width:95%; box-sizing:border-box; margin:28px auto; padding:24px; color:#e5e7eb; background:#1f2126; border:1px solid #343944; border-left:5px solid <?php echo esc_attr($de_header_accent); ?>; border-radius:9px; line-height:1.85; font-size:15px; }
.de-seo-article h2,.de-seo-article h3 { color:#fff; line-height:1.35; }
.de-seo-article h2 { font-size:23px; margin:0 0 14px; }
.de-seo-article h3 { font-size:18px; margin:22px 0 8px; }
.de-seo-article p { margin:0 0 13px; }
.de-seo-article a { color:<?php echo esc_attr($de_header_accent); ?>; text-decoration:none; font-weight:700; }
.de-seo-article a:hover { text-decoration:underline; }
.de-seo-article details { border-top:1px solid #3a3f4d; padding:11px 0; }
.de-seo-article summary { cursor:pointer; color:#fff; font-weight:700; }
.de-seo-article details p { margin:8px 0 0; color:#cbd5e1; }
.de-site-footer { margin-top:32px; background:#1a1a1a; color:#eee; border-top:4px solid <?php echo esc_attr($de_header_accent); ?>; }
.de-site-footer-inner { max-width:1200px; width:95%; margin:0 auto; padding:28px 0 18px; display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:24px; }
.de-site-footer h3 { color:#e0b94f; font-size:16px; margin:0 0 12px; }
.de-site-footer p,.de-site-footer li { color:#c8c8c8; font-size:13px; line-height:1.8; }
.de-site-footer ul { list-style:none; padding:0; margin:0; }
.de-site-footer a { color:#e0b94f; text-decoration:none; }
.de-site-footer a:hover { text-decoration:underline; }
.de-footer-bottom { text-align:center; border-top:1px solid #393939; padding:15px 10px; font-size:13px; color:#c8c8c8; }
@media(max-width:768px) { .de-site-footer-inner { grid-template-columns:1fr; gap:18px; text-align:center; } }
</style>
</head>
<body <?php body_class('de-gold-template'); ?>>
<?php if (function_exists('wp_body_open')) { wp_body_open(); } ?>

<?php if (!$de_header_is_app) : ?>
<header class="de-site-header">
  <div class="de-site-header-inner">
    <a class="en-brand" href="<?php echo esc_url($de_header_home_url); ?>" aria-label="AlTaqrer Gold home">
      <?php if ($de_header_logo_id) : ?>
        <?php echo wp_get_attachment_image($de_header_logo_id, 'full', false, array('alt' => 'AlTaqrer Gold')); ?>
      <?php else : ?>
        <span>AlTaqrer Gold</span>
      <?php endif; ?>
    </a>
    <nav class="de-main-nav" aria-label="Main navigation">
      <a href="<?php echo esc_url($de_header_home_url); ?>">Startseite</a>
      <a href="<?php echo esc_url($de_header_country_url); ?>">Goldpreise</a>
      <a href="<?php echo esc_url($de_header_country_url . 'gold-bars/'); ?>">Goldbarren</a>
      <a href="<?php echo esc_url($de_header_country_url . 'gold-index/'); ?>">Goldindex</a>
      <a href="<?php echo esc_url($de_header_country_url . 'usd/'); ?>">USD-Kurse</a>
      <div class="de-country-wrap">
        <button class="de-country-toggle" type="button" aria-expanded="false" aria-controls="de-country-menu">Countries ▾</button>
        <div class="de-country-menu" id="de-country-menu">
          <a href="<?php echo esc_url(home_url('/de/country/eg/')); ?>">Ägypten</a>
          <a href="<?php echo esc_url(home_url('/de/country/sa/')); ?>">Saudi-Arabien</a>
          <a href="<?php echo esc_url(home_url('/de/country/ae/')); ?>">Vereinigte Arabische Emirate</a>
          <a href="<?php echo esc_url(home_url('/de/country/kw/')); ?>">Kuwait</a>
          <a href="<?php echo esc_url($de_header_home_url); ?>">Alle Länder</a>
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
if (!$de_header_is_app && function_exists('goldnow_display_ad')) :
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
if (!function_exists('altaqrer_gold_de_translate_shortcode_html')) {
    function altaqrer_gold_de_translate_shortcode_html($html, $translations = array()) {
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
        ? (string) altaqrer_ml_country_name($current_term, 'de')
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
    $currency_labels_de = array(
        'USD'=>'US-Dollar','EUR'=>'Euro','GBP'=>'Britisches Pfund','EGP'=>'Ägyptisches Pfund','SAR'=>'Saudi-Riyal','AED'=>'VAE-Dirham',
        'KWD'=>'Kuwaitischer Dinar','QAR'=>'Katarischer Riyal','BHD'=>'Bahrainischer Dinar','OMR'=>'Omanischer Rial','JOD'=>'Jordanian Dinar',
        'IQD'=>'Iraqi Dinar','MAD'=>'Moroccan Dirham','TND'=>'Tunisian Dinar','DZD'=>'Algerian Dinar','TRY'=>'Turkish Lira',
        'JPY'=>'Japanischer Yen','CHF'=>'Swiss Franc','CAD'=>'Canadian Dollar','AUD'=>'Australian Dollar','NZD'=>'New Zealand Dollar',
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
    $currency_label = isset($currency_labels_de[$country_currency]) ? $currency_labels_de[$country_currency] : ($country_currency !== '' ? $country_currency : 'Landeswährung');
    $today = function_exists('wp_date') ? wp_date('d/m/Y') : date('d/m/Y');

    // Build a text-only translation dictionary for legacy shortcodes that still use Arabic labels.
    $shortcode_translation_map_de = array(
        'ذهب عيار 24' => '24 Karat Gold', 'ذهب عيار 22' => '22 Karat Gold', 'ذهب عيار 21' => '21 Karat Gold',
        'ذهب عيار 18' => '18 Karat Gold', 'ذهب عيار 14' => '14 Karat Gold', 'ذهب عيار 12' => '12 Karat Gold',
        'عيار 24' => '24 Karat Gold', 'عيار 22' => '22 Karat Gold', 'عيار 21' => '21 Karat Gold', 'عيار 18' => '18 Karat Gold', 'عيار 14' => '14 Karat Gold', 'عيار 12' => '12 Karat Gold',
        'جرام عيار 24' => '24-karätiges Gold pro Gramm', 'جرام عيار 22' => '22-karätiges Gold pro Gramm', 'جرام عيار 21' => '21-karätiges Gold pro Gramm',
        'جرام عيار 18' => '18-karätiges Gold pro Gramm', 'جرام عيار 14' => '14-karätiges Gold pro Gramm',
        'جرام عيار 12' => '12-karätiges Gold pro Gramm',
        'الأونصة العالمية' => 'Weltweite Goldunze', 'أونصة الذهب العالمية' => 'Weltweite Goldunze',
        'الأونصة بالعملة المحلية' => 'Gold Ounce in Local Currency', 'أونصة الذهب بالعملة المحلية' => 'Gold Ounce in Local Currency',
        'جنيه الذهب' => 'Goldmünze', 'الجنيه الذهب' => 'Goldmünze', 'سعر الجنيه الذهب' => 'Gold Coin Price',
        'السعر بالدولار' => 'Price in USD', 'سعر الدولار' => 'US Dollar Rate', 'سعر الدولار اليوم' => 'US Dollar Rate Today',
        'السعر بالعملة المحلية' => 'Price in Local Currency', 'سعر الذهب بالدولار' => 'Gold Price in USD',
        'جنيه مصري' => 'Egyptian Pound', 'الدولار الأمريكي' => 'US Dollar', 'دولار أمريكي' => 'US Dollar',
        'الأكثر تداولاً' => 'Am häufigsten gehandelt',
        'الأكثر تداولا' => 'Am häufigsten gehandelt',
        'انضم إلى قناتنا على تيليجرام' => 'Unserem Telegram-Kanal beitreten', 'انضم إلى قناتنا على تليجرام' => 'Unserem Telegram-Kanal beitreten', 'انضم لقناتنا على تيليجرام' => 'Unserem Telegram-Kanal beitreten', 'انضم لقناتنا على تليجرام' => 'Unserem Telegram-Kanal beitreten',
        'تنويه هام:' => 'Important Notice:', 'الوزن / النوع' => 'Gewicht / Typ', 'السعر' => 'Preis',
        'السعر الآن' => 'Live Price', 'أعلى سعر' => 'Highest Price', 'أقل سعر' => 'Lowest Price',
        'التغير' => 'Change', 'التحديث اللحظي' => 'Live Update', 'بدون مصنعية' => 'Ohne Verarbeitungskosten',
        'سعر الذهب' => 'Gold Price', 'أسعار الذهب' => 'Goldpreise', 'العملة المحلية' => 'Landeswährung'
    );

    // Reuse the existing functions.php dictionaries where possible without modifying Arabic globals.
    global $currency_names, $carat_labels;
    if (is_array($currency_names)) {
        foreach ($currency_names as $code => $arabic_label) {
            if (isset($currency_labels_de[$code]) && is_string($arabic_label) && $arabic_label !== '') {
                $shortcode_translation_map_de[$arabic_label] = $currency_labels_de[$code];
            }
        }
    }
    if (is_array($carat_labels)) {
        $carat_english = array('24k'=>'24 Karat Gold','22k'=>'22 Karat Gold','21k'=>'21 Karat Gold','18k'=>'18 Karat Gold','14k'=>'14 Karat Gold','12k'=>'12 Karat Gold','24k_oz'=>'Gold Ounce','gold_pound'=>'Goldmünze');
        foreach ($carat_labels as $key => $arabic_label) {
            if (isset($carat_english[$key]) && is_string($arabic_label) && $arabic_label !== '') {
                $shortcode_translation_map_de[$arabic_label] = $carat_english[$key];
            }
        }
    }
    if ($arabic_country_name !== '' && $arabic_country_name !== $display_country_name) {
        $shortcode_translation_map_de[$arabic_country_name] = $display_country_name;
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
	  
<?php
$de_seo_titles = array(
    '24k' => '24-Karat-Goldpreis heute in ' . $display_country_name,
    '22k' => '22-Karat-Goldpreis heute in ' . $display_country_name,
    '21k' => '21-Karat-Goldpreis pro Gramm heute in ' . $display_country_name,
    '18k' => '18-Karat-Goldpreis heute in ' . $display_country_name,
    '14k' => '14-Karat-Goldpreis heute in ' . $display_country_name,
    'ounce' => 'Weltweiter Goldpreis je Feinunze heute (USD)',
    'coin' => 'Preis einer 8-Gramm-Goldmünze heute in ' . $display_country_name,
    'gold-bars' => 'Goldbarrenpreise heute in ' . $display_country_name,
    'gold-index' => 'Goldpreisindex und Karatpreise in ' . $display_country_name,
    'usd' => 'US-Dollar-Wechselkurs heute in ' . $display_country_name,
);
$de_seo_intros = array(
    '24k' => 'Sehen Sie den heutigen 24-Karat-Goldpreis pro Gramm in ' . $display_country_name . '. Die Seite zeigt den lokalen Referenzwert und den entsprechenden USD-Vergleich. 24K-Gold dient als Reinheitsmaßstab für Anlagegold und Goldbarren.',
    '22k' => 'Verfolgen Sie den heutigen 22-Karat-Goldpreis pro Gramm in ' . $display_country_name . '. 22K-Gold enthält 22 von 24 Teilen reines Gold; der übrige Anteil besteht aus anderen Metallen und beeinflusst Eigenschaften und Referenzwert.',
    '21k' => 'Sehen Sie den aktuellen 21-Karat-Goldpreis pro Gramm in ' . $display_country_name und vergleichen Sie ihn mit dem USD-Wert. 21K-Gold enthält 21 von 24 Teilen reines Gold. Bei Schmuck können zusätzlich Verarbeitung, Händleraufschläge und Steuern anfallen.',
    '18k' => 'Prüfen Sie den heutigen 18-Karat-Goldpreis pro Gramm in ' . $display_country_name . '. 18K-Gold besteht zu 18 von 24 Teilen aus Gold. Der angezeigte Wert ist ein Metall-Referenzpreis und nicht automatisch der endgültige Ladenpreis.',
    '14k' => 'Sehen Sie den heutigen 14-Karat-Goldpreis pro Gramm und vergleichen Sie ihn mit 18K, 21K, 22K und 24K. 14K-Gold enthält 14 von 24 Teilen reines Gold; der Referenzwert hängt daher vom Goldanteil ab.',
    'ounce' => 'Diese Seite zeigt den internationalen Spot-Referenzpreis einer Feinunze Gold in USD. Eine Feinunze entspricht etwa 31,1035 Gramm. Der globale Unzenpreis in USD ist von lokalen Grammpreisen und deren Währungsumrechnung zu unterscheiden.',
    'coin' => 'Der Goldmünzen-Richtwert basiert auf dem auf dieser Website verwendeten Gewicht von 8 Gramm. Die Seite vergleicht 21K-, 22K- und 24K-Goldwerte. Prägung, Zertifizierung, Händleraufschläge und Steuern können den tatsächlichen Verkaufspreis verändern.',
    'gold-bars' => 'Vergleichen Sie Goldbarren verschiedener Gewichte anhand des 24-Karat-Referenzpreises pro Gramm. Der angezeigte Metallwert berücksichtigt nicht automatisch Zertifizierung, Herstellung, Lieferung, Händlermargen oder Steuern.',
    'gold-index' => 'Der Goldpreisindex bietet einen Überblick über verschiedene Reinheitsstufen und Währungen in ' . $display_country_name . '. Lokale Referenzwerte werden neben dem globalen Feinunzenpreis in USD dargestellt, damit Preisunterschiede besser eingeordnet werden können.',
    'usd' => 'Internationale Goldpreise werden üblicherweise in US-Dollar notiert. Diese Seite zeigt den verfügbaren USD-Referenzwechselkurs für ' . $display_country_name . ' und erklärt, wie Wechselkursänderungen den lokalen Goldwert beeinflussen können.',
);
$de_seo_h1 = isset($de_seo_titles[$gold_view]) ? $de_seo_titles[$gold_view] : 'Goldpreis heute — aktuelle Goldpreise in ' . $display_country_name;
$de_seo_intro = isset($de_seo_intros[$gold_view]) ? $de_seo_intros[$gold_view] : 'Verfolgen Sie die aktuellen Referenzpreise für 24K-, 22K-, 21K-, 18K- und 14K-Gold in ' . $display_country_name . ', einschließlich Grammpreisen, Goldbarren, 8-Gramm-Goldmünzen und des globalen Goldpreises je Feinunze in USD. Die Werte dienen dem Vergleich; tatsächliche Kauf- und Verkaufspreise können lokale Aufschläge, Verarbeitungskosten und Steuern enthalten.';
?>
<section class="de-seo-intro" aria-labelledby="de-seo-h1" style="max-width:1000px;width:95%;box-sizing:border-box;margin:18px auto 22px;padding:20px 22px;background:#1f2126;border:1px solid #343944;border-left:5px solid <?php echo esc_attr($de_header_accent); ?>;border-radius:9px;color:#e5e7eb;line-height:1.85;text-align:left;direction:ltr;">
    <h1 id="de-seo-h1" style="margin:0 0 10px;color:#fff;font-size:clamp(22px,3vw,30px);line-height:1.35;font-weight:800;"><?php echo esc_html($de_seo_h1); ?></h1>
    <p style="margin:0;"><?php echo esc_html($de_seo_intro); ?></p>
    <p style="margin:10px 0 0;color:#aeb7c4;font-size:13px;">Letzte Aktualisierung: <?php echo esc_html($today); ?> · Alle Preise sind Richtwerte und können sich mit dem Markt ändern.</p>
</section>

    <!-- ✅ Tab Navigation Buttons -->
    <div class="gold-tabs-nav text-center py-4">
      <button class="gold-tab-btn active" type="button" data-tab="now">Live-Preise</button>
      <button class="gold-tab-btn" type="button" data-tab="buy-sell">Goldbarren</button>
      <button class="gold-tab-btn" type="button" data-tab="indicator">Goldpreisdiagramm</button>
    </div>

    <!-- ✅ Tab Content Container -->
    <div class="gold-tabs-content">
      
      <!-- 1. Live Prices Pane -->
      <div id="tab-now" class="gold-tab-pane" style="display:block;">
        <!-- 📊 SEO Heading: Fully programmatically structured in English layout -->
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align: left; direction: ltr;">
          <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
          <img alt="Aktuelle Goldpreise in <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align: middle; margin-right: 5px;">
        <?php
        if ( $gold_view == '24k' ) { echo 'Goldpreis für 24 Karat heute in ' . esc_html($display_country_name); }
        elseif ( $gold_view == '22k' ) { echo 'Goldpreis für 22 Karat heute in ' . esc_html($display_country_name); }
        elseif ( $gold_view == '21k' ) { echo 'Goldpreis für 21 Karat pro Gramm heute in ' . esc_html($display_country_name); }
        elseif ( $gold_view == '18k' ) { echo 'Goldpreis für 18 Karat heute in ' . esc_html($display_country_name); }
        elseif ( $gold_view == '14k' ) { echo 'Goldpreis für 14 Karat heute in ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'ounce' ) { echo 'Weltweiter Goldunzenpreis heute (USD)'; }
        elseif ( $gold_view == 'coin' ) { echo 'Preis der Goldmünze heute in ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'gold-bars' ) { echo 'Goldbarrenpreise heute in ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'gold-index' ) { echo 'Goldmarktindex in Echtzeit heute in ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'usd' ) { echo 'US-Dollar-Wechselkurse und Währungsumrechnung heute in ' . esc_html($display_country_name); }
        else { echo 'Goldpreise in ' . esc_html($display_country_name) . ' heute'; }?>
        </h2>
        
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align: left; direction: ltr;">
          <?php 
          if ($gold_view == 'usd') { echo 'Aktuelle Wechselkurse für wichtige internationale und regionale Währungen'; }
          elseif ($gold_view == 'ounce') { echo 'Internationaler Spot-Referenzpreis für eine Feinunze 24-karätiges Gold in USD'; }
          else { echo 'Goldpreis in ' . esc_html($display_country_name) . ' —  ohne Herstellungskosten'; }
          ?>
        </h3>

        <!-- Gold Price Cards Shortcode Section -->
        <section id="gold-cards" class="mb-4">
            <?php echo altaqrer_gold_de_translate_shortcode_html(do_shortcode('[infi_gold_cards currency="' . esc_attr($country_currency) . '" currency_label="' . esc_attr($currency_label) . '"]'), $shortcode_translation_map_de); ?>
        </section>

        <!-- Gold Information Panels Shortcode Section -->
        <section id="gold-info-boxes" class="mb-4">
            <?php echo altaqrer_gold_de_translate_shortcode_html(do_shortcode('[infi_gold_info_boxes currency="' . esc_attr($country_currency) . '"]'), $shortcode_translation_map_de); ?>
        </section>
	  </div>
		
      <!-- 2. Gold Bullion Bars and Coins Table Pane -->
      <div id="tab-buy-sell" class="gold-tab-pane" style="display:none; text-align: left; direction: ltr;">
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align:left !important; direction:ltr !important;">
            <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
            <img alt="Goldbarren und Goldmünzen in <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; margin-right: 5px;">
            Goldbarren und Goldmünzen in <?php echo esc_html($display_country_name); ?>
        </h2>
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align:left !important; direction:ltr !important;">
          Aktuelle Preise für Goldbarren und Goldmünzen (ohne Herstellungskosten)
        </h3>

        <?php if (function_exists('infi_get_latest_gold_prices')) { ?>
            <!-- A) Gold Bars Price Table -->
            <section id="sabika-price" class="gold-section mt-4">
                <div class="section-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <h4>Preise für Goldbarren in <?php echo esc_html($display_country_name); ?></h4>
                    <span class="date-badge" style="background: #262930; padding: 4px 10px; border-radius: 4px; font-size: 13px;"><?php echo esc_html($today); ?></span>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>Gewicht / Typ</th>
                                <th>Preis (<?php echo $currency_label; ?>)</th>
                                <th>Preis (USD)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $weights = [
                                ['weight' => 1, 'name' => 'Goldbarren — 1 g'],
                                ['weight' => 2.5, 'name' => 'Goldbarren — 2,5 g'],
                                ['weight' => 5, 'name' => 'Goldbarren — 5 g'],
                                ['weight' => 10, 'name' => 'Goldbarren — 10 g'],
                                ['weight' => 20, 'name' => 'Goldbarren — 20 g'],
                                ['weight' => 31.1, 'name' => 'Feinunze (31,1 g)'],
                                ['weight' => 50, 'name' => 'Goldbarren — 50 g'],
                                ['weight' => 100, 'name' => 'Goldbarren — 100 g'],
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
                    <h4>Preise für Goldmünzen in <?php echo esc_html($display_country_name); ?></h4>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>Münzfeinheit</th>
                                <th>Preis (<?php echo $currency_label; ?>)</th>
                                <th>Preis (USD)</th>
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
                                    <td class="font-bold">8-g-Goldmünze (<?php echo $carat_num; ?> Karat)</td>
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
                <strong>Wichtig:</strong> The prices shown above for bars and coins represent Die oben angezeigten Preise für Barren und Münzen entsprechen ausschließlich dem Goldwert; Herstellungskosten, Gebühren für die Punzierung und Steuern sind nicht enthalten.
            </div>

        <?php } else { ?>
            <p style="text-align:center; padding:20px;">Entschuldigung, die Marktdaten sind derzeit nicht verfügbar.</p>
        <?php } ?>
      </div>

      <!-- 3. Gold Price Chart: restored to match the Arabic template structure. -->
      <div id="tab-indicator" class="gold-tab-pane" style="display:none; direction:ltr; text-align:left;">
        <h2 class="col-12 p-0 font-3 mb-3" style="text-align:left; direction:ltr;">
          <span class="start-head cls120" style="background: <?php echo esc_attr(get_theme_mod('infi_default_color', '#ffb301')); ?>;"></span>
          Goldpreisdiagramm in <?php echo esc_html($display_country_name); ?>
        </h2>
        <div class="gold-frame-box mb-4" style="direction:ltr; text-align:left;">
          <?php
          $en_chart_shortcode = '[infi_gold_chart carat="21k" currency="' . esc_attr($country_currency) . '" title="21K Gold Price Movement"]';
          echo altaqrer_gold_de_translate_shortcode_html(do_shortcode($en_chart_shortcode), $shortcode_translation_map_de);
          ?>
        </div>
        <div id="ajax-indicator-frames" class="gold-frame-box" style="direction:ltr; text-align:left;"></div>
        <p style="color:#94a3b8; text-align:left; font-size:13px; margin:10px 4px 18px;">Die Diagramme zeigen die ungefähre Entwicklung des Marktes. Lokale Preise können aufgrund von Wechselkursen, Aufschlägen und Marktbedingungen abweichen.</p>
      </div>

    </div>
  </div>
</main>

<script>
// Translate legacy Arabic labels returned by the existing indicator AJAX action.
function altaqrerTranslateEnglishIndicator(root) {
    if (!root) return;
    const translations = {
        'عيار 24': '24 Karat Gold', 'عيار 22': '22 Karat Gold', 'عيار 21': '21 Karat Gold',
        'عيار 18': '18 Karat Gold', 'عيار 14': '14 Karat Gold', 'عيار 12': '12 Karat Gold',
        'الأونصة العالمية': 'Global Gold Ounce (USD)',
        'الأونصة بالعملة المحلية': 'Gold Ounce in Local Currency',
        'جنيه الذهب': 'Goldmünze', 'سعر الدولار': 'US Dollar Exchange Rate',
        'جنيه مصري': 'Egyptian Pound', 'دولار أمريكي': 'US Dollar',
        'انضم إلى قناتنا على تيليجرام': 'Unserem Telegram-Kanal beitreten',
        'انضم إلى قناتنا على تليجرام': 'Unserem Telegram-Kanal beitreten'
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
                framesContainer.innerHTML = '<p style="text-align:center;padding:18px;color:#cbd5e1;">Goldpreisdiagramme werden geladen …</p>';
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
                    framesContainer.innerHTML = '<p style="text-align:center;padding:18px;color:#fca5a5;">Die Diagrammdaten konnten nicht geladen werden. Bitte versuchen Sie es erneut.</p>';
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
        📊 Der Goldpreis-Tracker zeigt die aktuellen Entwicklungen der Goldpreise in <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo esc_html($display_country_name); ?> in Echtzeit</strong></span>. <img alt="Flagge von <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align:middle; margin: 0 4px;"> Stand: <strong><?php echo esc_html($today); ?></strong>. Grundlage sind regionale Marktdaten und der internationale Goldbörsenkurs für <?php echo esc_html($display_country_name); ?>.
    </p>

    <p style="margin-bottom: 15px;">
        💡 Dieser Bericht bietet aktuelle Goldpreise aller wichtigen Kategorien: darunter <strong>21-karätiges Gold</strong> – die am häufigsten gehandelte Feinheit – sowie <strong>22-, 18- und 14-karätiges Gold</strong>. Außerdem werden andere Edelmetalle, der Schmuckmarkt und die täglichen Marktbewegungen berücksichtigt.
    </p>

    <p style="margin-bottom: 15px;">
        ✨ Laut aktuellen Marktdaten beträgt der Preis für ein Gramm <strong>24-karätiges Gold</strong> ohne Verarbeitungskosten etwa <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($gram_24k_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> (entspricht <strong><?php echo number_format($gram_24k_price_usd_converted, 2); ?> US-Dollar</strong>). Aufgrund seiner hohen Reinheit ist es der maßgebliche Standard für <strong>Goldbarren</strong>.
    </p>

    <p style="margin-bottom: 15px;">
        📈 Der <strong>weltweite Goldpreis pro Unze</strong> (31,1 Gramm 24-karätiges Gold) beträgt heute <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong>. Dies ist der internationale Spot-Referenzpreis; lokale Goldpreise werden separat zum neuesten verfügbaren Wechselkurs umgerechnet.
    </p>

    <p style="margin-bottom: 15px;">
        🪙 Für Sparer und Anleger liegt der heutige Richtwert einer <strong>Goldmünze</strong> (8 Gramm mit der verbreiteten Feinheit von 21 Karat) bei etwa <strong><?php echo number_format($gold_pound_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong>.
    </p>

    <p style="margin-bottom: 20px;">
        🛠️ Um den Wert Ihrer Ersparnisse im Blick zu behalten, können Sie den <strong>Goldmarktindex in Echtzeit</strong> und die <strong>Preise für Goldbarren</strong> von 1 Gramm bis 1 Kilogramm verfolgen und so die Marktentwicklung vor einem Kauf oder Verkauf besser einschätzen.
    </p>

    <div style="background: #17191d; padding: 12px; border-radius: 6px; border: 1px dashed #3a3f4d; color: #d1d5db; font-size: 14px; margin-top: 15px;">
        💵 <strong>Wechselkursanzeige:</strong> Lokale Goldpreise hängen auch von Wechselkursen ab. Der heutige Kurs des <strong>US-Dollars in <?php echo esc_html($display_country_name); ?></strong> beträgt laut den neuesten verfügbaren Marktdaten <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> je US-Dollar. Laden Sie die <strong>Goldpreis-App</strong> herunter, um aktuelle Preisbenachrichtigungen zu erhalten.
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
            💵 Live-Wechselkurse gegenüber <?php echo esc_html($currency_label); ?> in <?php echo esc_html($display_country_name); ?> <img alt="Flagge von <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:
        </strong>
        
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; text-align: left; direction: ltr;">
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'USD') : ?>
                    <div><img alt="Flagge von United States" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_de['USD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                    <div><img alt="Flagge von United Kingdom" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_de['GBP']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                    <div><img alt="Flagge von Saudi Arabia" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_de['SAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>

                <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                    <div><img alt="Flagge von Bahrain" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_de['BHD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                    <div><img alt="Flagge von Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_de['OMR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                    <div><img alt="Flagge von European Union" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_de['EUR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                    <div><img alt="Flagge von United Arab Emirates" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_de['AED']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                    <div><img alt="Flagge von Kuwait" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_de['KWD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                    <div><img alt="Flagge von Qatar" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_de['QAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                    <div><img alt="Flagge von Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_de['JPY']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
        </div>
        <p style="margin: 15px 0 0 0; font-size: 12px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 8px; text-align: left; direction: ltr;">* Die Aktualisierung erfolgt automatisch anhand offizieller Live-Marktindizes. Wir empfehlen die Installation der offiziellen <strong>Goldpreis-App</strong>.</p>
    </div>
<?php endif; ?>

<div class="altaqrer-silo-links" style="margin: 25px auto; padding: 15px; background: #17191d; border: 1px solid #3a3f4d; border-radius: 6px; text-align: center; max-width: 800px; width: 95%; box-sizing: border-box; clear: both; direction: ltr;">
    <?php
    // Reuse the already-resolved English country URL for every tab link.
    $base_country_url = $de_header_country_url;

    $active_bg = get_theme_mod('infi_default_color', '#ffb301');
    $active_color = '#000000';
    $default_bg = '#262930';
    $default_color = '#ffffff';

    $tabs = [
        ['key' => '',          'de' => 'Goldpreis'],
        ['key' => '24k',       'de' => '24 Karat'],
        ['key' => '22k',       'de' => '22 Karat'],
        ['key' => '21k',       'de' => '21 Karat'],
        ['key' => '18k',       'de' => '18 Karat'],
        ['key' => '14k',       'de' => '14 Karat'],
        ['key' => 'ounce',     'de' => 'Goldunze'],
        ['key' => 'coin',      'de' => 'Goldmünze'],
        ['key' => 'gold-bars', 'de' => 'Goldbarren'],
        ['key' => 'gold-index','de' => 'Goldindex'],
        ['key' => 'usd',       'de' => 'USD- und Wechselkurse'],
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
            $label = $tab['de'];
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
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">📈 Live-Goldmarktindex in <?php echo esc_html($display_country_name); ?> <img alt="Flagge von <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Reines 24K-Gold:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Wert: <?php echo number_format($price_24k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Hochwertiges 22K-Gold:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Wert: <?php echo number_format($price_22k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;">Beliebtes 21K-Gold:</strong> <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Wert: <?php echo number_format($price_21k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Standardmäßiges 18K-Gold:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Wert: <?php echo number_format($price_18k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>14K-Gold:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Wert: <?php echo number_format($price_14k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Weltweite Goldunze (31,1 g):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong></span><br><small style="color:#94a3b8;">Internationaler Spotpreis in USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Goldunze in lokaler Währung (31,1 g):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Derselbe globale Unzen-Referenzpreis, umgerechnet in die lokale Währung</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Dieser Index vergleicht die wichtigsten Goldfeinheiten in <?php echo esc_html($display_country_name); ?>mit dem internationalen Spotpreis. Die globale Unze wird in USD angegeben; der Unzenpreis in lokaler Währung entspricht demselben Referenzwert, umgerechnet zum Wechselkurs des Landes. Händleraufschläge und Verarbeitungskosten sind nicht enthalten.
                </p>


            <?php elseif ($gold_view == 'gold-bars') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 Goldbarrenpreise heute in <?php echo esc_html($display_country_name); ?> (reines 24K-Gold):</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Goldbarren — 1 g:</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_24k_local * 1, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Wert: <?php echo number_format($price_24k_usd * 1, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Goldbarren — 2,5 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 2.5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Wert: <?php echo number_format($price_24k_usd * 2.5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Goldbarren — 5 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Wert: <?php echo number_format($price_24k_usd * 5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Goldbarren — 10 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 10, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Wert: <?php echo number_format($price_24k_usd * 10, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Goldbarren — 20 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 20, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Wert: <?php echo number_format($price_24k_usd * 20, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Feinunze (31,1 Gramm):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Wert: <?php echo number_format($ounce_price_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Goldbarren — 50 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 50, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Wert: <?php echo number_format($price_24k_usd * 50, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Goldbarren — 100 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 100, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Wert: <?php echo number_format($price_24k_usd * 100, 2); ?> USD</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Dieser Tracker verfolgt <strong>die heutigen Goldbarrenpreise</strong> aus 999,9 reinem 24K-Gold. Goldbarren bleiben ein wichtiges Mittel zum Vermögenserhalt und zum langfristigen Schutz der Liquidität in <strong><?php echo esc_html($display_country_name); ?></strong> gegenüber makroökonomischer Inflation.
                </p>

            <?php elseif ($gold_view == 'coin') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 Goldmünzenpreis heute in <?php echo esc_html($display_country_name); ?> (Standardgewicht: 8 Gramm):</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>21K-Goldmünze (8 g):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_21k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Wert: <?php echo number_format($price_21k_usd * 8, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>22K-Goldmünze (8 g):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Wert: <?php echo number_format($price_22k_usd * 8, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>24K-Goldmünze (8 g):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Wert: <?php echo number_format($price_24k_usd * 8, 2); ?> USD</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Aktuelle Informationen zum <strong>Goldmünzenpreis heute</strong> auf den Anlagemärkten von <strong><?php echo esc_html($display_country_name); ?></strong>. Goldmünzen mit genau 8 Gramm Gewicht gelten als physische sichere Anlagewerte.
                </p>

            <?php elseif ($gold_view == 'usd') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">💵 Live-Wechselkurse gegenüber <?php echo esc_html($currency_label); ?> in <?php echo esc_html($display_country_name); ?>:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; text-align: left; direction: ltr; margin-bottom: 20px;">
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'USD') : ?>
                            <div><img alt="Flagge von US" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_de['USD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                            <div><img alt="Flagge von UK" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_de['GBP']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                            <div><img alt="Flagge von SA" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_de['SAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                            <div><img alt="Flagge von BH" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_de['BHD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                            <div><img alt="Flagge von Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_de['OMR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                            <div><img alt="Flagge von EU" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_de['EUR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                            <div><img alt="Flagge von AE" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_de['AED']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                            <div><img alt="Flagge von KW" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_de['KWD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                            <div><img alt="Flagge von QA" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_de['QAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                            <div><img alt="Flagge von Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_de['JPY']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Dieser dynamische Index überwacht Bankwechselkurse. Lokale Goldpreis-Referenzwerte verändern sich direkt mit Wechselkursschwankungen gegenüber globalen Reserven.
                </p>

            <?php elseif ($gold_view == '24k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Live-Bericht für 24K Goldpreis pro Gramm heute in <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Preis in lokaler Währung:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Gegenwert in US-Dollar:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_24k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Der aktuelle <strong>24K-Goldpreis pro Gramm heute</strong> beträgt <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Mit 99,9 % Reinheit ist diese Legierung der industrielle Referenzwert für die Herstellung von Goldbarren.
                </p>

            <?php elseif ($gold_view == '22k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Live-Bericht für 22K Goldpreis pro Gramm heute in <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Preis in lokaler Währung:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Gegenwert in US-Dollar:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_22k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Der hochwertige <strong>22K-Goldpreis pro Gramm heute</strong> liegt bei <strong><?php echo number_format($price_22k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Er verbindet einen hohen Edelmetallanteil mit struktureller Festigkeit.
                </p>

            <?php elseif ($gold_view == '21k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Live-Bericht für 21K Goldpreis pro Gramm heute in <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Preis in lokaler Währung:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Gegenwert in US-Dollar:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_21k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Der stark nachgefragte <strong>21K-Goldpreis pro Gramm heute</strong> wird gehandelt bei <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Diese Legierung macht den größten Teil des lokalen Schmuckhandels aus.
                </p>

            <?php elseif ($gold_view == '18k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Live-Bericht für 18K Goldpreis pro Gramm heute in <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Preis in lokaler Währung:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Gegenwert in US-Dollar:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_18k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Laut aktuellen Marktdaten liegt der übliche <strong>18K-Goldpreis pro Gramm heute</strong> mit <strong><?php echo number_format($price_18k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>, und bietet eine preisgünstigere Option für hochwertigen Schmuck.
                </p>

            <?php elseif ($gold_view == '14k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Live-Bericht für 14K Goldpreis pro Gramm heute in <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Preis in lokaler Währung:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Gegenwert in US-Dollar:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_14k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Der berechnete Index weist den <strong>14K-Goldpreis pro Gramm heute</strong> mit <strong><?php echo number_format($price_14k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> aus – eine robuste Legierung für den täglichen Schmuckgebrauch.
                </p>

            <?php elseif ($gold_view == 'ounce') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Weltweiter Goldunzenpreis heute (31,1 g):</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Internationaler Spotpreis:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($ounce_price_usd, 2); ?></strong></span> USD</li>
                    <li>🔹 <strong>Notierungswährung:</strong> US-Dollar (USD)</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Der weltweite Goldunzenpreis wird international in US-Dollar angegeben und entspricht 31,1 Gramm 24K-Gold. Umrechnungen in lokale Währungen sind bei diesem globalen Referenzwert bewusst ausgeschlossen; lokale Goldpreise werden separat anhand des geltenden Wechselkurses berechnet.
                </p>
            <?php endif; ?>

        </div>
    </div>
    <?php
}
?>

<?php if (!empty($gold_view)) :
    $de_seo_base = home_url('/de/country/' . rawurlencode($de_header_country_slug) . '/');
    $de_related = array(
        '24k'=>array('22k'=>'22-Karat-Goldpreis','21k'=>'21-Karat-Goldpreis','gold-bars'=>'Goldbarrenpreise'),
        '22k'=>array('24k'=>'24-Karat-Goldpreis','21k'=>'21-Karat-Goldpreis','18k'=>'18-Karat-Goldpreis'),
        '21k'=>array('22k'=>'22-Karat-Goldpreis','18k'=>'18-Karat-Goldpreis','coin'=>'8-Gramm-Goldmünze'),
        '18k'=>array('14k'=>'14-Karat-Goldpreis','21k'=>'21-Karat-Goldpreis','24k'=>'24-Karat-Goldpreis'),
        '14k'=>array('18k'=>'18-Karat-Goldpreis','21k'=>'21-Karat-Goldpreis','24k'=>'24-Karat-Goldpreis'),
        'ounce'=>array('24k'=>'24-Karat-Goldpreis','gold-index'=>'Goldpreisindex','usd'=>'USD-Wechselkurs'),
        'coin'=>array('21k'=>'21-Karat-Goldpreis','22k'=>'22-Karat-Goldpreis','24k'=>'24-Karat-Goldpreis'),
        'gold-bars'=>array('24k'=>'24-Karat-Goldpreis','ounce'=>'globale Goldunze','gold-index'=>'Goldpreisindex'),
        'gold-index'=>array('24k'=>'24-Karat-Goldpreis','21k'=>'21-Karat-Goldpreis','ounce'=>'globale Goldunze'),
        'usd'=>array('ounce'=>'globaler Goldpreis in USD','24k'=>'24-Karat-Goldpreis','gold-index'=>'Goldpreisindex'),
    );
?>
<article class="de-seo-article" aria-labelledby="de-seo-article-title">
    <h2 id="de-seo-article-title"><?php echo esc_html($de_seo_h1); ?></h2>
<?php if (in_array($gold_view, array('24k','22k','21k','18k','14k'), true)) :
    $de_values = array(
        '24k'=>array('24 Karat',$price_24k_local,$price_24k_usd,24),
        '22k'=>array('22 Karat',$price_22k_local,$price_22k_usd,22),
        '21k'=>array('21 Karat',$price_21k_local,$price_21k_usd,21),
        '18k'=>array('18 Karat',$price_18k_local,$price_18k_usd,18),
        '14k'=>array('14 Karat',$price_14k_local,$price_14k_usd,14),
    );
    $de_active = $de_values[$gold_view];
?>
    <p>Der aktuelle Referenzpreis für <strong><?php echo esc_html($de_active[0]); ?> Gold in <?php echo esc_html($display_country_name); ?></strong> beträgt <strong><?php echo number_format($de_active[1],2); ?> <?php echo esc_html($currency_label); ?></strong> pro Gramm beziehungsweise etwa <strong><?php echo number_format($de_active[2],2); ?> USD</strong>. Die Werte basieren auf dem verfügbaren 24K-Referenzpreis, dem jeweiligen Reinheitsanteil und den verfügbaren Wechselkursdaten.</p>
    <h3>Wie hoch ist der reine Goldanteil?</h3>
    <p>Die Karatzahl beschreibt den Anteil reinen Goldes in einer Legierung: 24 Karat entsprechen 24 von 24 Teilen, 22 Karat 22/24, 21 Karat 21/24, 18 Karat 18/24 und 14 Karat 14/24. Bei gleichem Gewicht enthält eine niedrigere Karatzahl entsprechend weniger reines Gold als 24-karätiges Gold.</p>
    <h3>Wie wird der Goldpreis pro Gramm berechnet?</h3>
    <p>Der angezeigte Reinheits-Richtwert ergibt sich aus dem 24K-Referenzpreis pro Gramm multipliziert mit dem jeweiligen Reinheitsfaktor. Der Gegenwert in Landeswährung wird anhand der verfügbaren USD-Wechselkursdaten ermittelt. Diese Berechnung beschreibt den rechnerischen Metallwert und nicht automatisch den Ladenpreis.</p>
    <h3>Warum kann der Kaufpreis höher sein?</h3>
    <p>Bei Schmuck oder Anlageprodukten können Verarbeitung, Design, Prüfung, Zertifizierung, Händlermarge, Lieferung und Steuern hinzukommen. Beim Wiederverkauf wirken sich außerdem Zustand, Nachweis der Reinheit und die Ankaufbedingungen des Händlers aus. Lassen Sie sich vor einer Transaktion den endgültigen Preis bestätigen.</p>
<?php elseif ($gold_view === 'ounce') : ?>
    <p>Der weltweite Gold-Spot-Referenzpreis beträgt derzeit <strong><?php echo number_format($ounce_price_usd,2); ?> USD</strong> je Feinunze. Eine Feinunze entspricht ungefähr <strong>31,1035 Gramm</strong>. Der globale Unzenwert wird hier bewusst in USD angegeben und nicht als lokaler Unzenpreis des ausgewählten Landes dargestellt.</p>
    <h3>Feinunze und gewöhnliche Unze: der Unterschied</h3>
    <p>Im Edelmetallhandel wird die Feinunze (Troy Ounce) verwendet. Sie wiegt etwa 31,1035 Gramm und ist damit schwerer als die gewöhnliche Unze. Für einen korrekten Vergleich mit Grammpreisen muss dieselbe Gewichtseinheit zugrunde gelegt werden.</p>
    <h3>Vom globalen Unzenpreis zum lokalen Grammpreis</h3>
    <p>Für einen lokalen Richtwert werden der internationale USD-Preis, das Gewicht der Feinunze und der Wechselkurs der Landeswährung berücksichtigt. Lokale Aufschläge, Steuern und Marktbedingungen können den tatsächlichen Einzelhandelspreis zusätzlich verändern.</p>
<?php elseif ($gold_view === 'coin') : ?>
    <p>Die auf dieser Website verwendete Berechnung für die Goldmünze basiert auf einem Gewicht von <strong>8 Gramm</strong>. Für den 21K-Richtwert wird der aktuelle 21K-Preis pro Gramm mit acht multipliziert. Die Vergleichswerte für 22K und 24K verwenden ebenfalls ihre jeweiligen Grammpreise bei demselben Gewicht.</p>
    <h3>Wie wird der Richtwert einer 8-Gramm-Münze berechnet?</h3>
    <p>Die Berechnungsgrundlage lautet: Goldpreis pro Gramm der jeweiligen Karatzahl × 8 Gramm. Das Ergebnis ist ein Richtwert für den enthaltenen Goldwert. Prägung, Hersteller, Design, Zustand, Seltenheit, Zertifizierung, Händleraufschläge und Steuern können den tatsächlichen Münzpreis verändern.</p>
    <h3>Was sollte vor dem Kauf geprüft werden?</h3>
    <p>Prüfen Sie das angegebene Gewicht, die Feinheit, ein mögliches Zertifikat, den Hersteller und die Rücknahmebedingungen des Verkäufers. Der reine Metallwert ist nicht mit einem garantierten Verkaufs- oder Rückkaufpreis gleichzusetzen.</p>
<?php elseif ($gold_view === 'gold-bars') : ?>
    <p>Der Referenzwert von Goldbarren wird üblicherweise anhand des 24K-Goldpreises pro Gramm berechnet. Multiplizieren Sie den 24K-Referenzpreis mit dem tatsächlichen Nettogewicht des Barrens, um den rechnerischen Goldwert zu erhalten.</p>
    <h3>Goldbarren verschiedener Gewichte vergleichen</h3>
    <p>Vergleichen Sie beispielsweise Barren mit 1, 5, 10, 20, 50 oder 100 Gramm auf derselben Grundlage aus Gewicht und Reinheit. Für internationale Edelmetallnotierungen ist außerdem die Feinunze mit rund 31,1 Gramm eine wichtige Vergleichseinheit.</p>
    <h3>Welche Kosten können hinzukommen?</h3>
    <p>Herstellung und Verpackung, Reinheitsprüfung, Zertifizierung, Marke, Händlermarge, Versicherung, Lieferung und Steuern können den endgültigen Verkaufspreis beeinflussen. Prüfen Sie vor dem Kauf Seriennummer, Zertifikat und Rückgabebedingungen.</p>
<?php elseif ($gold_view === 'gold-index') : ?>
    <p>Der Goldpreisindex fasst Referenzwerte verschiedener Reinheitsstufen und Währungen zusammen. 24K dient als Maßstab für hochreines Gold; 22K, 21K, 18K und 14K lassen sich anhand ihres jeweiligen Goldanteils vergleichen. Lokale Werte und der globale Feinunzenpreis in USD erfüllen dabei unterschiedliche Vergleichszwecke.</p>
    <h3>So lesen Sie den Goldpreisindex</h3>
    <p>Die Werte in Landeswährung zeigen den rechnerischen Goldwert im ausgewählten Markt. USD-Werte erleichtern den Vergleich mit internationalen Notierungen. Achten Sie beim Vergleich verschiedener Karatzahlen auf einheitliche Gewichte, Reinheitsstufen und Währungen.</p>
    <h3>Welche Faktoren können den Markt bewegen?</h3>
    <p>Internationale Nachfrage, der US-Dollar, Zinserwartungen, Inflation, Käufe von Zentralbanken und das Verhalten von Anlegern können Goldpreise beeinflussen. Dies sind allgemeine Marktfaktoren; aus einer einzelnen Preisbewegung lässt sich ohne weitere Daten keine eindeutige Ursache ableiten.</p>
<?php elseif ($gold_view === 'usd') : ?>
    <p>Der auf dieser Seite verfügbare Referenzkurs beträgt <strong>1 USD = <?php echo number_format($local_currency_per_usd,2); ?> <?php echo esc_html($currency_label); ?></strong>. Da Gold international üblicherweise in US-Dollar notiert wird, kann eine Veränderung des Wechselkurses den lokalen Goldwert beeinflussen, auch wenn der internationale USD-Goldpreis unverändert bleibt.</p>
    <h3>Wie beeinflusst der Dollarkurs lokale Goldpreise?</h3>
    <p>Ein lokaler Goldpreis-Richtwert verbindet den internationalen Goldpreis in USD mit dem Wechselkurs der Landeswährung. Banken, Bargeldwechselstellen und Zahlungsanbieter können unterschiedliche An- und Verkaufskurse oder Gebühren verwenden. Der angezeigte Kurs ist daher kein garantiertes persönliches Umtauschangebot.</p>
    <h3>Welche Werte sollten verglichen werden?</h3>
    <p>Für eine sinnvolle Einordnung sollten Sie den Gold-Spotpreis in USD und den Wechselkurs für denselben Zeitraum betrachten. Lokale Steuern, Importkosten, Händleraufschläge und die Verfügbarkeit beeinflussen zusätzlich den endgültigen Einzelhandelspreis.</p>
<?php endif; ?>
    <h3>Verwandte Goldpreise</h3>
    <p>
<?php
    $de_link_parts = array();
    foreach ((isset($de_related[$gold_view]) ? $de_related[$gold_view] : array()) as $de_slug => $de_label) {
        $de_link_parts[] = '<a href="' . esc_url($de_seo_base . rawurlencode($de_slug) . '/') . '">' . esc_html($de_label) . '</a>';
    }
    echo implode(' · ', $de_link_parts);
?>
    </p>
    <h3>Häufig gestellte Fragen</h3>
<?php if (in_array($gold_view, array('24k','22k','21k','18k','14k'), true)) : ?>
    <details><summary>Ist der angezeigte Grammpreis der endgültige Ladenpreis?</summary><p>Nein. Er ist ein Richtwert für den Goldanteil. Verarbeitung, Händleraufschläge, Zertifizierung und Steuern können zusätzlich berechnet werden.</p></details>
    <details><summary>Warum ist Gold mit niedrigerer Karatzahl günstiger?</summary><p>Weil es einen geringeren Anteil reinen Goldes enthält. Der endgültige Preis hängt außerdem von weiteren Kosten und den örtlichen Marktbedingungen ab.</p></details>
<?php elseif ($gold_view === 'coin') : ?>
    <details><summary>Welches Gewicht wird für die Münzberechnung verwendet?</summary><p>Die auf dieser Website verwendete Vergleichsberechnung basiert auf 8 Gramm.</p></details>
    <details><summary>Ist ein Händleraufschlag im angezeigten Wert enthalten?</summary><p>Nein. Prägekosten, Händleraufschläge, Verarbeitung und Steuern können beim tatsächlichen Kauf hinzukommen.</p></details>
<?php elseif ($gold_view === 'gold-bars') : ?>
    <details><summary>Sind Zertifizierung und Lieferung im Barrenpreis enthalten?</summary><p>Nicht unbedingt. Die Tabelle zeigt einen rechnerischen Goldwert; zusätzliche Anbietergebühren können hinzukommen.</p></details>
    <details><summary>Warum können zwei gleich schwere Barren unterschiedlich viel kosten?</summary><p>Marke, Zertifizierung, Aufschläge, Verfügbarkeit und Steuern können den Endpreis beeinflussen.</p></details>
<?php elseif ($gold_view === 'ounce') : ?>
    <details><summary>Wie viele Gramm wiegt eine Feinunze Gold?</summary><p>Eine Feinunze entspricht ungefähr 31,1035 Gramm.</p></details>
    <details><summary>Wird der globale Unzenpreis in Landeswährung angezeigt?</summary><p>Nein. Der globale Spot-Referenzwert wird hier in USD ausgewiesen. Lokale Goldpreise werden separat umgerechnet.</p></details>
<?php elseif ($gold_view === 'usd') : ?>
    <details><summary>Bietet jede Bank denselben USD-Wechselkurs an?</summary><p>Nein. Banken und Wechselanbieter können unterschiedliche An- und Verkaufskurse sowie Gebühren anwenden.</p></details>
    <details><summary>Warum ist der USD-Kurs für den lokalen Goldpreis wichtig?</summary><p>Weil der internationale Goldpreis üblicherweise in USD notiert wird und für lokale Vergleiche in die Landeswährung umgerechnet werden muss.</p></details>
<?php else : ?>
    <details><summary>Zeigt der Index einen garantierten Kaufpreis?</summary><p>Nein. Er ist ein informativer Richtwert auf Grundlage verfügbarer Marktdaten; tatsächliche Transaktionen können zusätzliche lokale Kosten enthalten.</p></details>
    <details><summary>Bleiben Goldpreise den ganzen Tag gleich?</summary><p>Nein. Marktpreise und Wechselkurse können sich ändern und damit auch die angezeigten Richtwerte beeinflussen.</p></details>
<?php endif; ?>
    <p class="de-seo-update-note" style="margin:20px 0 0;padding-top:12px;border-top:1px solid #3a3f4d;color:#9ca3af;font-size:12px;">Referenzdatum: <?php echo esc_html($today); ?>. Die Preise sind Richtwerte auf Grundlage der neuesten verfügbaren Daten; tatsächliche Transaktionspreise können abweichen.</p>
</article>
<?php endif; ?>

<?php if (!$de_header_is_app) : ?>
<footer class="de-site-footer">
  <div class="de-site-footer-inner">
    <section>
      <h3>Über AlTaqrer Gold</h3>
      <p><strong>AlTaqrer Gold</strong> hilft Leserinnen und Lesern, die Goldpreise auf regionalen und internationalen Märkten zu verfolgen. Entdecken Sie aktuelle Referenzpreise für Gold in 24, 22, 21, 18 und 14 Karat, vergleichen Sie die Werte von Goldbarren und 8-Gramm-Goldmünzen und verfolgen Sie den weltweiten Goldunzenpreis in USD. Die Preise dienen ausschließlich der Information und dem Vergleich; endgültige Verkaufspreise können Verarbeitungskosten, Aufschläge und Steuern enthalten.</p>
    </section>
    <section>
      <h3>Goldpreisbereiche</h3>
      <ul>
        <li><a href="<?php echo esc_url($de_header_country_url); ?>">Goldpreise in <?php echo esc_html(isset($display_country_name) ? $display_country_name : ''); ?></a></li>
        <li><a href="<?php echo esc_url($de_header_country_url . 'gold-bars/'); ?>">Goldbarren und Münzen</a></li>
        <li><a href="<?php echo esc_url($de_header_country_url . 'gold-index/'); ?>">Live-Goldindex</a></li>
        <li><a href="<?php echo esc_url($de_header_country_url . 'usd/'); ?>">USD- und Wechselkurse</a></li>
      </ul>
    </section>
    <section>
      <h3>Regionale Goldpreise</h3>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/de/country/eg/')); ?>">Gold Prices in Egypt</a></li>
        <li><a href="<?php echo esc_url(home_url('/de/country/sa/')); ?>">Gold Prices in Saudi Arabia</a></li>
        <li><a href="<?php echo esc_url(home_url('/de/country/ae/')); ?>">Gold Prices in the UAE</a></li>
        <li><a href="<?php echo esc_url(home_url('/de/country/kw/')); ?>">Gold Prices in Kuwait</a></li>
      </ul>
      <h3 style="margin-top:16px;">Folgen Sie uns</h3>
      <ul>
        <li><a href="https://t.me/goldaltaqrer" target="_blank" rel="noopener noreferrer">Unserem Telegram-Kanal beitreten</a></li>
      </ul>
    </section>
    <?php
    // Show only real published German pages; fall back to the shared page only when needed.
    $en_footer_pages = array();
    foreach (array(
        'privacy-policy' => 'Datenschutzerklärung',
        'terms-of-use'   => 'Nutzungsbedingungen',
        'contact-us'     => 'Kontakt'
    ) as $page_slug => $page_label) {
        $page_object = get_page_by_path('de/' . $page_slug);
        if (!$page_object) {
            $page_object = get_page_by_path($page_slug);
        }
        if ($page_object && $page_object->post_status === 'publish') {
            $en_footer_pages[] = array('url' => get_permalink($page_object), 'label' => $page_label);
        }
    }
    if (!empty($en_footer_pages)) : ?>
    <section>
      <h3>Wichtige Links</h3>
      <ul>
        <?php foreach ($en_footer_pages as $footer_page) : ?>
          <li><a href="<?php echo esc_url($footer_page['url']); ?>"><?php echo esc_html($footer_page['label']); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </section>
    <?php endif; ?>
  </div>
  <div class="de-footer-bottom">Alle Rechte vorbehalten &copy; <?php echo esc_html(function_exists('wp_date') ? wp_date('Y') : date('Y')); ?> bei <a href="<?php echo esc_url($de_header_home_url); ?>">AlTaqrer Gold</a>.</div>
</footer>
<?php endif; ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
  var toggle = document.querySelector('.de-country-toggle');
  var menu = document.getElementById('de-country-menu');
  if (!toggle || !menu) return;
  toggle.addEventListener('click', function (event) {
    event.preventDefault();
    var opened = menu.classList.toggle('is-open');
    toggle.setAttribute('aria-expanded', opened ? 'true' : 'false');
  });
  document.addEventListener('click', function (event) {
    if (!event.target.closest('.de-country-wrap')) {
      menu.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
    }
  });
});
</script>
<?php wp_footer(); ?>
</body>
</html>
