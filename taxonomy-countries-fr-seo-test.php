<?php
/* Template Name: Français — Prix de l’or par pays */
/**
 * En-tête français autonome du modèle de prix de l’or par pays.
 * L’en-tête et la navigation du thème arabe ne sont pas chargés ici.
 */
$fr_header_term = get_queried_object();
$fr_header_country_slug = (is_object($fr_header_term) && !empty($fr_header_term->slug))
    ? sanitize_title($fr_header_term->slug)
    : '';
if ($fr_header_country_slug === '' && is_object($fr_header_term) && !empty($fr_header_term->term_id)) {
    $fr_header_country_slug = strtolower((string) get_term_meta((int) $fr_header_term->term_id, 'country_code', true));
}
if ($fr_header_country_slug === '') {
    $fr_header_country_slug = 'eg';
}
$fr_header_country_url = home_url('/fr/country/' . rawurlencode($fr_header_country_slug) . '/');
$fr_header_home_url = home_url('/fr/');
$fr_header_accent = get_theme_mod('infi_default_color', '#ffb301');
$fr_header_logo_id = (int) get_theme_mod('custom_logo');
$fr_header_is_app = (isset($_GET['view']) && sanitize_text_field(wp_unslash($_GET['view'])) === 'app');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
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
// FR SEO metadata: unique Rank Math title and description for every gold section.
$fr_meta_term = get_queried_object();
$fr_meta_term_id = (is_object($fr_meta_term) && isset($fr_meta_term->term_id)) ? (int) $fr_meta_term->term_id : 0;
$fr_meta_country = '';
$fr_meta_country = $fr_meta_term_id ? (string) get_term_meta($fr_meta_term_id, 'country_french_name', true) : '';
if (function_exists('altaqrer_ml_country_name') && is_object($fr_meta_term)) { $fr_meta_country = (string) altaqrer_ml_country_name($fr_meta_term, 'fr'); }
if ($fr_meta_country === '') {
    $fr_meta_country = 'votre pays';
}
$fr_meta_view = sanitize_key((string) get_query_var('gold_view'));
$fr_meta_titles = array(
    '24k' => 'Prix de l’or 24 carats aujourd’hui ' . $fr_meta_country',
    '22k' => 'Prix de l’or 22 carats aujourd’hui ' . $fr_meta_country',
    '21k' => 'Prix de l’or 21 carats aujourd’hui ' . $fr_meta_country',
    '18k' => 'Prix de l’or 18 carats aujourd’hui ' . $fr_meta_country',
    '14k' => 'Prix de l’or 14 carats aujourd’hui ' . $fr_meta_country',
    'ounce' => 'Cours mondial de l’once d’or en USD ' . $fr_meta_country',
    'coin' => 'Prix d’une pièce d’or de 8 grammes ' . $fr_meta_country',
    'gold-bars' => 'Prix des lingots d’or aujourd’hui ' . $fr_meta_country',
    'gold-index' => 'Indice du cours de l’or en direct ' . $fr_meta_country',
    'usd' => 'Taux de change du dollar américain ' . $fr_meta_country',
);
$fr_meta_descriptions = array(
    '24k' => 'Consultez le cours de l’or 24 carats au gramme aujourd’hui. Comparez les valeurs indicatives en monnaie locale et en USD et comprenez la pureté.',
    '22k' => 'Consultez le prix du gramme d’or 22 carats et comparez-le au 24 carats, avec des repères en monnaie locale et en USD.',
    '21k' => 'Suivez le cours du gramme d’or 21 carats, comparez les valeurs en monnaie locale et en USD et découvrez le calcul de la pièce de 8 grammes.',
    '18k' => 'Consultez le prix de l’or 18 carats au gramme, sa teneur en or pur et la différence entre valeur du métal et prix d’un bijou.',
    '14k' => 'Consultez le prix de l’or 14 carats au gramme et comparez sa pureté avec les autres titres d’or, du 18 au 24 carats.',
    'ounce' => 'Consultez le cours mondial de l’or au comptant par once troy en USD et comprenez la différence avec les prix locaux au gramme.',
    'coin' => 'Consultez la valeur indicative d’une pièce d’or de 8 grammes et comparez les références 21, 22 et 24 carats, hors frais supplémentaires.',
    'gold-bars' => 'Comparez les valeurs indicatives des lingots selon leur poids sur la base du cours de l’or 24 carats au gramme.',
    'gold-index' => 'Comparez les cours de l’or selon le titre et la devise, avec les valeurs locales et le cours mondial de l’once en USD.',
    'usd' => 'Consultez le dernier taux de référence USD disponible et comprenez son influence possible sur le prix local de l’or.',
);
$fr_meta_title = isset($fr_meta_titles[$fr_meta_view]) ? $fr_meta_titles[$fr_meta_view] : 'Prix de l’or 24 carats aujourd’hui ' . $fr_meta_country;
$fr_meta_description = isset($fr_meta_descriptions[$fr_meta_view]) ? $fr_meta_descriptions[$fr_meta_view] : 'Consultez le cours de l’or 24 carats au gramme aujourd’hui. Comparez les valeurs indicatives en monnaie locale et en USD et comprenez la pureté.';
add_filter('rank_math/frontend/title', function ($title) use ($fr_meta_title) {
    return $fr_meta_title . ' | AlTaqrer Gold';
}, 99);
add_filter('rank_math/frontend/description', function ($description) use ($fr_meta_description) {
    return $fr_meta_description;
}, 99);
?>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() . '/style.css?v=1sz'); ?>" data-navigate-track="reload">
<script type="application/ld+json">
<?php echo wp_json_encode(array(
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'AlTaqrer Gold',
    'url' => $fr_header_home_url,
    'sameAs' => array('https://www.instagram.com/altaqrergold', 'https://www.facebook.com/altaqrergold')
), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>
<style>
html, body { direction:ltr; text-align:left; }
body { background:#f5d771 !important; max-width:100vw; overflow-x:hidden; position:relative; font-family:Inter,Arial,sans-serif; }
.en-site-header { position:relative; z-index:1000; background:#1a1a1a; border-bottom:4px solid <?php echo esc_attr($fr_header_accent); ?>; color:#fff; }
.en-site-header-inner { max-width:1200px; width:95%; margin:0 auto; min-height:74px; display:flex; align-items:center; justify-content:space-between; gap:18px; padding:10px 0; }
.en-brand { display:flex; align-items:center; gap:10px; color:#fff; text-decoration:none; font-weight:800; font-size:20px; white-space:nowrap; }
.en-brand img { max-width:54px; max-height:54px; width:auto; height:auto; object-fit:contain; }
.en-main-nav { display:flex; align-items:center; justify-content:flex-end; gap:8px; flex-wrap:wrap; }
.en-main-nav a, .en-country-toggle { color:#fff; text-decoration:none; border:1px solid rgba(255,255,255,.15); background:transparent; border-radius:6px; padding:9px 12px; font:600 13px Inter,Arial,sans-serif; cursor:pointer; }
.en-main-nav a:hover, .en-country-toggle:hover { color:#1a1a1a; background:<?php echo esc_attr($fr_header_accent); ?>; }
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
.en-seo-article { max-width:900px; width:95%; box-sizing:border-box; margin:28px auto; padding:24px; color:#e5e7eb; background:#1f2126; border:1px solid #343944; border-left:5px solid <?php echo esc_attr($fr_header_accent); ?>; border-radius:9px; line-height:1.85; font-size:15px; }
.en-seo-article h2,.en-seo-article h3 { color:#fff; line-height:1.35; }
.en-seo-article h2 { font-size:23px; margin:0 0 14px; }
.en-seo-article h3 { font-size:18px; margin:22px 0 8px; }
.en-seo-article p { margin:0 0 13px; }
.en-seo-article a { color:<?php echo esc_attr($fr_header_accent); ?>; text-decoration:none; font-weight:700; }
.en-seo-article a:hover { text-decoration:underline; }
.en-seo-article details { border-top:1px solid #3a3f4d; padding:11px 0; }
.en-seo-article summary { cursor:pointer; color:#fff; font-weight:700; }
.en-seo-article details p { margin:8px 0 0; color:#cbd5e1; }
.en-site-footer { margin-top:32px; background:#1a1a1a; color:#eee; border-top:4px solid <?php echo esc_attr($fr_header_accent); ?>; }
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

<?php if (!$fr_header_is_app) : ?>
<header class="en-site-header">
  <div class="en-site-header-inner">
    <a class="en-brand" href="<?php echo esc_url($fr_header_home_url); ?>" aria-label="Accueil AlTaqrer Gold">
      <?php if ($fr_header_logo_id) : ?>
        <?php echo wp_get_attachment_image($fr_header_logo_id, 'full', false, array('alt' => 'AlTaqrer Gold')); ?>
      <?php else : ?>
        <span>AlTaqrer Gold</span>
      <?php endif; ?>
    </a>
    <nav class="en-main-nav" aria-label="Navigation principale">
      <a href="<?php echo esc_url($fr_header_home_url); ?>">Accueil</a>
      <a href="<?php echo esc_url($fr_header_country_url); ?>">Prix de l’or</a>
      <a href="<?php echo esc_url($fr_header_country_url . 'gold-bars/'); ?>">Lingots d’or</a>
      <a href="<?php echo esc_url($fr_header_country_url . 'gold-index/'); ?>">Indice de l’or</a>
      <a href="<?php echo esc_url($fr_header_country_url . 'usd/'); ?>">Taux USD</a>
      <div class="en-country-wrap">
        <button class="en-country-toggle" type="button" aria-expanded="false" aria-controls="en-country-menu">Pays ▾</button>
        <div class="en-country-menu" id="en-country-menu">
          <a href="<?php echo esc_url(home_url('/fr/country/eg/')); ?>">Égypte</a>
          <a href="<?php echo esc_url(home_url('/fr/country/sa/')); ?>">Arabie saoudite</a>
          <a href="<?php echo esc_url(home_url('/fr/country/ae/')); ?>">Émirats arabes unis</a>
          <a href="<?php echo esc_url(home_url('/fr/country/kw/')); ?>">Koweït</a>
          <a href="<?php echo esc_url($fr_header_home_url); ?>">Tous les pays</a>
        </div>
      </div>
    </nav>
  </div>
</header>
<?php endif; ?>

<?php
/**
 * Place the existing Customizer advertisement immédiatement sous
 * title/logo and navigation. Do not duplicate the AdSenseHeaderManager output.
 */
if (!$fr_header_is_app && function_exists('goldnow_display_ad')) :
?>
<div class="en-top-header-ad" style="width:100%;max-width:1200px;margin:0 auto;padding:10px 8px;box-sizing:border-box;text-align:center;direction:ltr;clear:both;">
    <?php goldnow_display_ad('below_navbar'); ?>
</div>
<?php endif; ?>

<?php
/**
 * Adaptateur de traduction française pour le HTML des codes courts.
 * It translates visible text and accessibility labels only; URLs, HTML structure,
 * CSS and JavaScript are deliberately left untouched.
 */
if (!function_exists('altaqrer_gold_fr_translate_shortcode_html')) {
    function altaqrer_gold_fr_translate_shortcode_html($html, $translations = array()) {
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
    // 1) Resolve the current country safely and use its métadonnées de taxonomie françaises.
    $current_term = get_queried_object();
    $arabic_country_name = (is_object($current_term) && isset($current_term->name)) ? (string) $current_term->name : '';
    $term_id = (is_object($current_term) && isset($current_term->term_id)) ? (int) $current_term->term_id : 0;

    $french_name = $term_id ? (string) get_term_meta($term_id, 'country_french_name', true) : '';
    $country_french_name = $french_name;
    $country_code = $term_id ? (string) get_term_meta($term_id, 'country_code', true) : '';
    $country_flag = $term_id ? (string) get_term_meta($term_id, 'country_flag', true) : '';
    $country_currency = $term_id ? strtoupper((string) get_term_meta($term_id, 'country_currency', true)) : '';

    // Ne jamais utiliser un nom de taxonomie arabe sur une URL française.
    $country_fallback = '';
    if (is_object($current_term) && !empty($current_term->slug)) {
        $country_fallback = ucwords(str_replace(array('-', '_'), ' ', (string) $current_term->slug));
        if (preg_match('/[\\x{0600}-\\x{06FF}]/u', $country_fallback)) {
            $country_fallback = '';
        }
    }
    // Noms français complets pour les codes pays et territoires utilisés par le site.
    $french_country_names = array(
        'eg' => 'Égypte',
        'sa' => 'Arabie saoudite',
        'ae' => 'Émirats arabes unis',
        'kw' => 'Koweït',
        'qa' => 'Qatar',
        'bh' => 'Bahreïn',
        'om' => 'Oman',
        'ma' => 'Maroc',
        'dz' => 'Algérie',
        'tn' => 'Tunisie',
        'ly' => 'Libye',
        'sd' => 'Soudan',
        'so' => 'Somalie',
        'dj' => 'Djibouti',
        'mr' => 'Mauritanie',
        'jo' => 'Jordanie',
        'lb' => 'Liban',
        'sy' => 'Syrie',
        'iq' => 'Irak',
        'ps' => 'Palestine',
        'ye' => 'Yémen',
        'km' => 'Comores',
        'us' => 'États-Unis',
        'ca' => 'Canada',
        'mx' => 'Mexique',
        'bm' => 'Bermudes',
        'ky' => 'Îles Caïmans',
        'cr' => 'Costa Rica',
        'cu' => 'Cuba',
        'do' => 'République dominicaine',
        'gt' => 'Guatemala',
        'hn' => 'Honduras',
        'ni' => 'Nicaragua',
        'pa' => 'Panama',
        'sv' => 'Salvador',
        'bs' => 'Bahamas',
        'bb' => 'Barbade',
        'bz' => 'Belize',
        'jm' => 'Jamaïque',
        'tt' => 'Trinité-et-Tobago',
        'ag' => 'Antigua-et-Barbuda',
        'dm' => 'Dominique',
        'gd' => 'Grenade',
        'kn' => 'Saint-Christophe-et-Niévès',
        'lc' => 'Sainte-Lucie',
        'vc' => 'Saint-Vincent-et-les-Grenadines',
        'ht' => 'Haïti',
        'pr' => 'Porto Rico',
        'vi' => 'Îles Vierges américaines',
        'vg' => 'Îles Vierges britanniques',
        'ai' => 'Anguilla',
        'ms' => 'Montserrat',
        'tc' => 'Îles Turques-et-Caïques',
        'gl' => 'Groenland',
        'ar' => 'Argentine',
        'bo' => 'Bolivie',
        'br' => 'Brésil',
        'cl' => 'Chili',
        'co' => 'Colombie',
        'ec' => 'Équateur',
        'gy' => 'Guyana',
        'py' => 'Paraguay',
        'pe' => 'Pérou',
        'sr' => 'Suriname',
        'uy' => 'Uruguay',
        've' => 'Venezuela',
        'fk' => 'Îles Malouines',
        'gf' => 'Guyane française',
        'gb' => 'Royaume-Uni',
        'de' => 'Allemagne',
        'fr' => 'France',
        'it' => 'Italie',
        'es' => 'Espagne',
        'nl' => 'Pays-Bas',
        'be' => 'Belgique',
        'pt' => 'Portugal',
        'at' => 'Autriche',
        'ch' => 'Suisse',
        'se' => 'Suède',
        'no' => 'Norvège',
        'dk' => 'Danemark',
        'fi' => 'Finlande',
        'ie' => 'Irlande',
        'pl' => 'Pologne',
        'cz' => 'Tchéquie',
        'hu' => 'Hongrie',
        'ro' => 'Roumanie',
        'bg' => 'Bulgarie',
        'hr' => 'Croatie',
        'rs' => 'Serbie',
        'ua' => 'Ukraine',
        'by' => 'Biélorussie',
        'md' => 'Moldavie',
        'al' => 'Albanie',
        'ba' => 'Bosnie-Herzégovine',
        'mk' => 'Macédoine du Nord',
        'me' => 'Monténégro',
        'kos' => 'Kosovo',
        'is' => 'Islande',
        'ee' => 'Estonie',
        'lv' => 'Lettonie',
        'lt' => 'Lituanie',
        'sk' => 'Slovaquie',
        'si' => 'Slovénie',
        'cy' => 'Chypre',
        'mt' => 'Malte',
        'lu' => 'Luxembourg',
        'gr' => 'Grèce',
        'ad' => 'Andorre',
        'sm' => 'Saint-Marin',
        'va' => 'Vatican',
        'mc' => 'Monaco',
        'li' => 'Liechtenstein',
        'fo' => 'Îles Féroé',
        'gi' => 'Gibraltar',
        'je' => 'Jersey',
        'im' => 'Île de Man',
        'gg' => 'Guernesey',
        'cn' => 'Chine',
        'jp' => 'Japon',
        'in' => 'Inde',
        'kr' => 'Corée du Sud',
        'kp' => 'Corée du Nord',
        'sg' => 'Singapour',
        'my' => 'Malaisie',
        'th' => 'Thaïlande',
        'id' => 'Indonésie',
        'ph' => 'Philippines',
        'vn' => 'Vietnam',
        'pk' => 'Pakistan',
        'bd' => 'Bangladesh',
        'lk' => 'Sri Lanka',
        'np' => 'Népal',
        'mm' => 'Myanmar',
        'kz' => 'Kazakhstan',
        'uz' => 'Ouzbékistan',
        'kg' => 'Kirghizistan',
        'tj' => 'Tadjikistan',
        'tm' => 'Turkménistan',
        'mn' => 'Mongolie',
        'la' => 'Laos',
        'kh' => 'Cambodge',
        'bt' => 'Bhoutan',
        'mv' => 'Maldives',
        'bn' => 'Brunei',
        'tl' => 'Timor oriental',
        'tr' => 'Turquie',
        'il' => 'Israël',
        'ir' => 'Iran',
        'af' => 'Afghanistan',
        'ge' => 'Géorgie',
        'am' => 'Arménie',
        'az' => 'Azerbaïdjan',
        'hk' => 'Hong Kong',
        'mo' => 'Macao',
        'tw' => 'Taïwan',
        'za' => 'Afrique du Sud',
        'ng' => 'Nigeria',
        'ke' => 'Kenya',
        'et' => 'Éthiopie',
        'gh' => 'Ghana',
        'ci' => 'Côte d’Ivoire',
        'sn' => 'Sénégal',
        'tz' => 'Tanzanie',
        'ug' => 'Ouganda',
        'cm' => 'Cameroun',
        'cd' => 'République démocratique du Congo',
        'ao' => 'Angola',
        'mz' => 'Mozambique',
        'zw' => 'Zimbabwe',
        'mg' => 'Madagascar',
        'mu' => 'Maurice',
        'zm' => 'Zambie',
        'bw' => 'Botswana',
        'na' => 'Namibie',
        'rw' => 'Rwanda',
        'bi' => 'Burundi',
        'ss' => 'Soudan du Sud',
        'er' => 'Érythrée',
        'sz' => 'Eswatini',
        'ls' => 'Lesotho',
        'gm' => 'Gambie',
        'gn' => 'Guinée',
        'gw' => 'Guinée-Bissau',
        'lr' => 'Liberia',
        'ml' => 'Mali',
        'ne' => 'Niger',
        'bf' => 'Burkina Faso',
        'tg' => 'Togo',
        'bj' => 'Bénin',
        'ga' => 'Gabon',
        'cg' => 'République du Congo',
        'td' => 'Tchad',
        'cf' => 'République centrafricaine',
        'gq' => 'Guinée équatoriale',
        'st' => 'Sao Tomé-et-Principe',
        'cv' => 'Cap-Vert',
        'sc' => 'Seychelles',
        'sl' => 'Sierra Leone',
        'au' => 'Australie',
        'nz' => 'Nouvelle-Zélande',
        'pg' => 'Papouasie-Nouvelle-Guinée',
        'fj' => 'Fidji',
        'sb' => 'Îles Salomon',
        'vu' => 'Vanuatu',
        'ws' => 'Samoa',
        'to' => 'Tonga',
        'ki' => 'Kiribati',
        'nr' => 'Nauru',
        'tv' => 'Tuvalu',
        'pw' => 'Palaos',
        'fm' => 'Micronésie',
        'mh' => 'Îles Marshall',
        'pf' => 'Polynésie française',
        'nc' => 'Nouvelle-Calédonie',
        'wf' => 'Wallis-et-Futuna',
        'ck' => 'Îles Cook',
        'nu' => 'Niue',
        'tk' => 'Tokelau',
        'as' => 'Samoa américaines',
        'gu' => 'Guam',
        'mp' => 'Îles Mariannes du Nord',
        'ax' => 'Îles Åland',
        'bl' => 'Saint-Barthélemy',
        'bq' => 'Pays-Bas caribéens',
        'bv' => 'Île Bouvet',
        'cc' => 'Îles Cocos',
        'cx' => 'Île Christmas',
        'hm' => 'Îles Heard-et-MacDonald',
        'nf' => 'Île Norfolk',
        'pn' => 'Îles Pitcairn',
        're' => 'La Réunion',
        'sh' => 'Sainte-Hélène',
        'sj' => 'Svalbard et Jan Mayen',
        'tf' => 'Terres australes et antarctiques françaises',
        'um' => 'Îles mineures éloignées des États-Unis',
        'yt' => 'Mayotte'
    );
    $display_country_name = $french_name !== '' ? $french_name : (isset($french_country_names[$country_code]) ? $french_country_names[$country_code] : ($country_fallback !== '' ? $country_fallback : 'Pays'));
    $country_name = $display_country_name; // Les variables AJAX et héritées doivent également recevoir le nom français.

    // Libellés français des devises utilisées dans la liste des pays du site.
    $currency_labels_fr = array(
        'USD'=>'Dollar américain','EUR'=>'Euro','GBP'=>'Livre sterling','EGP'=>'Livre égyptienne','SAR'=>'Riyal saoudien','AED'=>'Dirham des Émirats arabes unis',
        'KWD'=>'Dinar koweïtien','QAR'=>'Riyal qatari','BHD'=>'Dinar bahreïni','OMR'=>'Rial omanais','JOD'=>'Dinar jordanien',
        'IQD'=>'Dinar irakien','MAD'=>'Dirham marocain','TND'=>'Dinar tunisien','DZD'=>'Dinar algérien','TRY'=>'Livre turque',
        'JPY'=>'Yen japonais','CHF'=>'Franc suisse','CAD'=>'Dollar canadien','AUD'=>'Dollar australien','NZD'=>'Dollar néo-zélandais',
        'CNY'=>'Yuan chinois','INR'=>'Roupie indienne','PKR'=>'Roupie pakistanaise','RUB'=>'Rouble russe','ZAR'=>'Rand sud-africain',
        'BRL'=>'Réal brésilien','MXN'=>'Peso mexicain','SGD'=>'Dollar de Singapour','HKD'=>'Dollar de Hong Kong','SEK'=>'Couronne suédoise',
        'NOK'=>'Couronne norvégienne','DKK'=>'Couronne danoise','PLN'=>'Zloty polonais','CZK'=>'Couronne tchèque','HUF'=>'Forint hongrois',
        'KRW'=>'Won sud-coréen','THB'=>'Baht thaïlandais','MYR'=>'Ringgit malaisien','IDR'=>'Roupie indonésienne','PHP'=>'Peso philippin',
        'ILS'=>'Nouveau shekel israélien','LKR'=>'Roupie sri-lankaise','NGN'=>'Naira nigérian','KES'=>'Shilling kényan','GHS'=>'Cedi ghanéen',
        'LYD'=>'Dinar libyen','SDG'=>'Livre soudanaise','LBP'=>'Livre libanaise','SYP'=>'Livre syrienne','YER'=>'Rial yéménite',
        'TWD'=>'Nouveau dollar taïwanais','SOS'=>'Shilling somalien','DJF'=>'Franc djiboutien','MRU'=>'Ouguiya mauritanienne',
        'KMF'=>'Franc comorien','XOF'=>'Franc CFA d’Afrique de l’Ouest','XAF'=>'Franc CFA d’Afrique centrale','TZS'=>'Shilling tanzanien',
        'UGX'=>'Shilling ougandais','CDF'=>'Franc congolais','AOA'=>'Kwanza angolais','MZN'=>'Metical mozambicain',
        'ZWL'=>'Dollar zimbabwéen','MGA'=>'Ariary malgache','MUR'=>'Roupie mauricienne','ZMW'=>'Kwacha zambien',
        'BWP'=>'Pula botswanais','NAD'=>'Dollar namibien','RWF'=>'Franc rwandais','BIF'=>'Franc burundais','SSP'=>'Livre sud-soudanaise',
        'ERN'=>'Nakfa érythréen','SZL'=>'Lilangeni swazi','LSL'=>'Loti du Lesotho','GMD'=>'Dalasi gambien','GNF'=>'Franc guinéen',
        'LRD'=>'Dollar libérien','CVE'=>'Escudo cap-verdien','SCR'=>'Roupie seychelloise','SLE'=>'Leone sierra-léonais',
        'STN'=>'Dobra de São Tomé-et-Príncipe','ARS'=>'Peso argentin','BOB'=>'Boliviano bolivien','CLP'=>'Peso chilien',
        'COP'=>'Peso colombien','GYD'=>'Dollar guyanien','PYG'=>'Guarani paraguayen','PEN'=>'Sol péruvien',
        'SRD'=>'Dollar surinamais','UYU'=>'Peso uruguayen','VES'=>'Bolivar vénézuélien','FKP'=>'Livre des îles Malouines',
        'BMD'=>'Dollar bermudien','KYD'=>'Dollar des îles Caïmans','CRC'=>'Colón costaricien','CUP'=>'Peso cubain',
        'DOP'=>'Peso dominicain','GTQ'=>'Quetzal guatémaltèque','HNL'=>'Lempira hondurien','NIO'=>'Córdoba nicaraguayen',
        'PAB'=>'Balboa panaméen','BSD'=>'Dollar bahaméen','BBD'=>'Dollar barbadien','BZD'=>'Dollar bélizien',
        'JMD'=>'Dollar jamaïcain','TTD'=>'Dollar de Trinité-et-Tobago','XCD'=>'Dollar des Caraïbes orientales','HTG'=>'Gourde haïtienne',
        'RON'=>'Leu roumain','BGN'=>'Lev bulgare','RSD'=>'Dinar serbe','UAH'=>'Hryvnia ukrainienne','BYN'=>'Rouble biélorusse',
        'MDL'=>'Leu moldave','ALL'=>'Lek albanais','BAM'=>'Mark convertible de Bosnie-Herzégovine','MKD'=>'Denar macédonien',
        'GEL'=>'Lari géorgien','ISK'=>'Couronne islandaise','GIP'=>'Livre de Gibraltar','HRK'=>'Kuna croate',
        'KPW'=>'Won nord-coréen','VND'=>'Dong vietnamien','BDT'=>'Taka bangladais','NPR'=>'Roupie népalaise',
        'MMK'=>'Kyat birman','KZT'=>'Tenge kazakh','UZS'=>'Sum ouzbek','KGS'=>'Som kirghize',
        'TJS'=>'Somoni tadjik','TMT'=>'Manat turkmène','MNT'=>'Tugrik mongol','LAK'=>'Kip laotien',
        'KHR'=>'Riel cambodgien','BTN'=>'Ngultrum bhoutanais','MVR'=>'Rufiyaa maldivienne','BND'=>'Dollar de Brunei',
        'IRR'=>'Rial iranien','AFN'=>'Afghani afghan','AMD'=>'Dram arménien','AZN'=>'Manat azerbaïdjanais','MOP'=>'Pataca de Macao',
        'ETB'=>'Birr éthiopien','FJD'=>'Dollar fidjien','PGK'=>'Kina papou-néo-guinéen','SBD'=>'Dollar des Îles Salomon',
        'VUV'=>'Vatu du Vanuatu','WST'=>'Tala samoan','TOP'=>'Paʻanga tongien','XPF'=>'Franc CFP','SHP'=>'Livre de Sainte-Hélène'
    );
    $currency_label = isset($currency_labels_fr[$country_currency]) ? $currency_labels_fr[$country_currency] : ($country_currency !== '' ? $country_currency : 'Monnaie locale');
    $today = function_exists('wp_date') ? wp_date('d/m/Y') : date('d/m/Y');

    // Build a text-only translation dictionary for legacy shortcodes that still use Arabic labels.
    $shortcode_translation_map = array(
        'ذهب عيار 24' => 'Or 24 carats', 'ذهب عيار 22' => 'Or 22 carats', 'ذهب عيار 21' => 'Or 21 carats',
        'ذهب عيار 18' => 'Or 18 carats', 'ذهب عيار 14' => 'Or 14 carats', 'ذهب عيار 12' => 'Or 12 carats',
        'عيار 24' => '24 carats', 'عيار 22' => '22 carats', 'عيار 21' => '21 carats', 'عيار 18' => '18 carats', 'عيار 14' => '14 carats', 'عيار 12' => '12 carats',
        'جرام عيار 24' => 'Gramme d’or 24 carats', 'جرام عيار 22' => 'Gramme d’or 22 carats', 'جرام عيار 21' => 'Gramme d’or 21 carats',
        'جرام عيار 18' => 'Gramme d’or 18 carats', 'جرام عيار 14' => 'Gramme d’or 14 carats',
        'الأونصة العالمية' => 'Once d’or mondiale', 'أونصة الذهب العالمية' => 'Once d’or mondiale',
        'الأونصة بالعملة المحلية' => 'Once d’or en monnaie locale', 'أونصة الذهب بالعملة المحلية' => 'Once d’or en monnaie locale',
        'جنيه الذهب' => 'Pièce d’or', 'الجنيه الذهب' => 'Pièce d’or', 'سعر الجنيه الذهب' => 'Prix de la pièce d’or',
        'السعر بالدولار' => 'Prix en USD', 'سعر الدولار' => 'Taux du dollar américain', 'سعر الدولار اليوم' => 'Taux du dollar américain aujourd’hui',
        'السعر بالعملة المحلية' => 'Prix en monnaie locale', 'سعر الذهب بالدولار' => 'Prix de l’or en USD',
        'جنيه مصري' => 'Livre égyptienne', 'الدولار الأمريكي' => 'Dollar américain', 'دولار أمريكي' => 'Dollar américain',
        'الأكثر تداولاً' => 'Le plus échangé',
        'الأكثر تداولا' => 'Le plus échangé',
        'انضم إلى قناتنا على تيليجرام' => 'Rejoignez notre chaîne Telegram', 'انضم إلى قناتنا على تليجرام' => 'Rejoignez notre chaîne Telegram', 'انضم لقناتنا على تيليجرام' => 'Rejoignez notre chaîne Telegram', 'انضم لقناتنا على تليجرام' => 'Rejoignez notre chaîne Telegram',
        'تنويه هام:' => 'Avis important :', 'الوزن / النوع' => 'Poids / Type', 'السعر' => 'Prix',
        'السعر الآن' => 'Prix en direct', 'أعلى سعر' => 'Prix le plus élevé', 'أقل سعر' => 'Prix le plus bas',
        'التغير' => 'Variation', 'التحديث اللحظي' => 'Mise à jour en direct', 'بدون مصنعية' => 'Hors frais de fabrication',
        'سعر الذهب' => 'Prix de l’or', 'أسعار الذهب' => 'Prix de l’or', 'العملة المحلية' => 'Monnaie locale'
    );

    // Reuse the existing functions.php dictionaries where possible without modifying Arabic globals.
    global $currency_names, $carat_labels;
    if (is_array($currency_names)) {
        foreach ($currency_names as $code => $arabic_label) {
            if (isset($currency_labels_fr[$code]) && is_string($arabic_label) && $arabic_label !== '') {
                $shortcode_translation_map[$arabic_label] = $currency_labels_fr[$code];
            }
        }
    }
    if (is_array($carat_labels)) {
        $carat_english = array('24k'=>'Or 24 carats','22k'=>'Or 22 carats','21k'=>'Or 21 carats','18k'=>'Or 18 carats','14k'=>'Or 14 carats','12k'=>'Or 12 carats','24k_oz'=>'Once d’or','gold_pound'=>'Pièce d’or');
        foreach ($carat_labels as $key => $arabic_label) {
            if (isset($carat_english[$key]) && is_string($arabic_label) && $arabic_label !== '') {
                $shortcode_translation_map[$arabic_label] = $carat_english[$key];
            }
        }
    }
    if ($arabic_country_name !== '' && $arabic_country_name !== $display_country_name) {
        $shortcode_translation_map[$arabic_country_name] = $display_country_name;
    }

    // 2) Currency conversion. La source du cours de l’or est le dollar américain ; la conversion utilise le taux de change de la monnaie locale par dollar.
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

    // Preserve the site's established 8g, or 21 carats-coin calculation.
    $gold_pound_currency = $gram_24k_price_currency * 8 * 0.875;
?>

<div class="en-middle-ad-slot" style="width:100%;max-width:1200px;margin:12px auto 18px;padding:10px 8px;box-sizing:border-box;text-align:center;direction:ltr;clear:both;">
    <?php goldnow_display_ad('below_cards'); ?>
</div>
	  
    <!-- ✅ Tab Navigation Buttons -->
    <div class="gold-tabs-nav text-center py-4">
      <button class="gold-tab-btn active" type="button" data-tab="now">Prix en direct</button>
      <button class="gold-tab-btn" type="button" data-tab="buy-sell">Lingots d’or</button>
      <button class="gold-tab-btn" type="button" data-tab="indicator">Graphique du cours de l’or</button>
    </div>

    <!-- ✅ Tab Content Container -->
    <div class="gold-tabs-content">
      
      <!-- 1. Prix en direct Pane -->
      <div id="tab-now" class="gold-tab-pane" style="display:block;">
        <!-- 📊 SEO Heading: Fully programmatically structured in mise en page française -->
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align: left; direction: ltr;">
          <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
          <img alt="Cours de l’or en direct en <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align: middle; margin-right: 5px;">
        <?php
        if ( $gold_view == '24k' ) { echo 'Prix de l’or 24 carats aujourd’hui en ' . esc_html($display_country_name); }
        elseif ( $gold_view == '22k' ) { echo 'Prix de l’or 22 carats aujourd’hui en ' . esc_html($display_country_name); }
        elseif ( $gold_view == '21k' ) { echo 'Prix du gramme d’or 21 carats aujourd’hui en ' . esc_html($display_country_name); }
        elseif ( $gold_view == '18k' ) { echo 'Prix de l’or 18 carats aujourd’hui en ' . esc_html($display_country_name); }
        elseif ( $gold_view == '14k' ) { echo 'Prix de l’or 14 carats aujourd’hui en ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'ounce' ) { echo 'Cours de l’once d’or mondiale aujourd’hui (USD)'; }
        elseif ( $gold_view == 'coin' ) { echo 'Prix de la pièce d’or aujourd’hui en ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'gold-bars' ) { echo 'Prix des lingots d’or aujourd’hui en ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'gold-index' ) { echo 'Indice du marché de l’or en direct aujourd’hui en ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'usd' ) { echo 'Dollar américain et taux de change aujourd’hui en ' . esc_html($display_country_name); }
        else { echo 'Prix de l’or en ' . esc_html($display_country_name) . ' Aujourd’hui '; }
        ?>
        </h2>
        
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align: left; direction: ltr;">
          <?php 
          if ($gold_view == 'usd') { echo 'Taux de change en direct des principales devises internationales et régionales'; }
          elseif ($gold_view == 'ounce') { echo 'Cours de référence international d’une once troy d’or 24 carats, coté en USD'; }
          else { echo 'Prix de l’or en ' . esc_html($display_country_name) . ' — cours du marché en direct, hors frais de fabrication'; }
          ?>
        </h3>

        <!-- Cours de l’or Cards Shortcode Section -->
        <section id="gold-cards" class="mb-4">
            <?php echo altaqrer_gold_fr_translate_shortcode_html(do_shortcode('[infi_gold_cards currency="' . esc_attr($country_currency) . '" currency_label="' . esc_attr($currency_label) . '"]'), $shortcode_translation_map); ?>
        </section>

        <!-- Gold Information Panels Shortcode Section -->
        <section id="gold-info-boxes" class="mb-4">
            <?php echo altaqrer_gold_fr_translate_shortcode_html(do_shortcode('[infi_gold_info_boxes currency="' . esc_attr($country_currency) . '"]'), $shortcode_translation_map); ?>
        </section>
	  </div>
		
      <!-- 2. Tableau des lingots et pièces d’or -->
      <div id="tab-buy-sell" class="gold-tab-pane" style="display:none; text-align: left; direction: ltr;">
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align:left !important; direction:ltr !important;">
            <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
            <img alt="Lingots et pièces d’or en <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; margin-right: 5px;">
            Lingots et pièces d’or en <?php echo esc_html($display_country_name); ?>
        </h2>
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align:left !important; direction:ltr !important;">
          Derniers prix des lingots et pièces d’or (hors frais de fabrication)
        </h3>

        <?php if (function_exists('infi_get_latest_gold_prices')) { ?>
            <!-- A) Lingots d’or Prix Table -->
            <section id="sabika-price" class="gold-section mt-4">
                <div class="section-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <h4>Prix des lingots d’or en <?php echo esc_html($display_country_name); ?></h4>
                    <span class="date-badge" style="background: #262930; padding: 4px 10px; border-radius: 4px; font-size: 13px;"><?php echo esc_html($today); ?></span>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>Poids / Type</th>
                                <th>Prix (<?php echo $currency_label; ?>)</th>
                                <th>Prix (USD)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $weights = [
                                ['weight' => 1, 'name' => 'Lingot d’or — 1 gramme'],
                                ['weight' => 2.5, 'name' => 'Lingot d’or — 2,5 grammes'],
                                ['weight' => 5, 'name' => 'Lingot d’or — 5 grammes'],
                                ['weight' => 10, 'name' => 'Lingot d’or — 10 grammes'],
                                ['weight' => 20, 'name' => 'Lingot d’or — 20 grammes'],
                                ['weight' => 31.1, 'name' => 'Once troy (31,1 g)'],
                                ['weight' => 50, 'name' => 'Lingot d’or — 50 grammes'],
                                ['weight' => 100, 'name' => 'Lingot d’or — 100 grammes'],
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
                    <h4>Prix des pièces d’or en <?php echo esc_html($display_country_name); ?></h4>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>Pureté de la pièce</th>
                                <th>Prix (<?php echo $currency_label; ?>)</th>
                                <th>Prix (USD)</th>
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
                                    <td class="font-bold">Pièce d’or de 8 g (<?php echo $carat_num; ?>K)</td>
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
                <strong>Important :</strong> Les prix des lingots et des pièces indiqués ci-dessus représentent uniquement la valeur de l’or ; ils excluent les frais de fabrication, de poinçonnage et les taxes.
            </div>

        <?php } else { ?>
            <p style="text-align:center; padding:20px;">Désolé, les données du marché sont actuellement indisponibles.</p>
        <?php } ?>
      </div>

      <!-- 3. Graphique du cours de l’or: restored to match the Arabic template structure. -->
      <div id="tab-indicator" class="gold-tab-pane" style="display:none; direction:ltr; text-align:left;">
        <h2 class="col-12 p-0 font-3 mb-3" style="text-align:left; direction:ltr;">
          <span class="start-head cls120" style="background: <?php echo esc_attr(get_theme_mod('infi_default_color', '#ffb301')); ?>;"></span>
          Graphique du cours de l’or en <?php echo esc_html($display_country_name); ?>
        </h2>
        <div class="gold-frame-box mb-4" style="direction:ltr; text-align:left;">
          <?php
          $en_chart_shortcode = '[infi_gold_chart carat="21k" currency="' . esc_attr($country_currency) . '" title="Évolution du cours de l’or 21 carats"]';
          echo altaqrer_gold_fr_translate_shortcode_html(do_shortcode($en_chart_shortcode), $shortcode_translation_map);
          ?>
        </div>
        <div id="ajax-indicator-frames" class="gold-frame-box" style="direction:ltr; text-align:left;"></div>
        <p style="color:#94a3b8; text-align:left; font-size:13px; margin:10px 4px 18px;">Les graphiques présentent des évolutions indicatives du marché. Les prix locaux peuvent varier selon les taux de change, les primes et les conditions du marché.</p>
      </div>

    </div>
  </div>
</main>

<script>
// Translate legacy Arabic labels returned by the existing indicator AJAX action.
function altaqrerTranslateFrenchIndicator(root) {
    if (!root) return;
    const translations = {
        'عيار 24': 'Or 24 carats', 'عيار 22': 'Or 22 carats', 'عيار 21': 'Or 21 carats',
        'عيار 18': 'Or 18 carats', 'عيار 14': 'Or 14 carats', 'عيار 12': 'Or 12 carats',
        'الأونصة العالمية': 'Once d’or mondiale (USD)',
        'الأونصة بالعملة المحلية': 'Once d’or en monnaie locale',
        'جنيه الذهب': 'Pièce d’or', 'سعر الدولار': 'Taux de change du dollar américain',
        'جنيه مصري': 'Livre égyptienne', 'دولار أمريكي': 'Dollar américain',
        'انضم إلى قناتنا على تيليجرام': 'Rejoignez notre chaîne Telegram',
        'انضم إلى قناتنا على تليجرام': 'Rejoignez notre chaîne Telegram'
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
                framesContainer.innerHTML = '<p style="text-align:center;padding:18px;color:#cbd5e1;">Chargement des graphiques de l’or…</p>';
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
                    altaqrerTranslateFrenchIndicator(framesContainer);
                    targetPane.dataset.framesLoaded = 'true';
                } catch (error) {
                    framesContainer.innerHTML = '<p style="text-align:center;padding:18px;color:#fca5a5;">Les données du graphique n’ont pas pu être chargées. Veuillez réessayer.</p>';
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
        📊 Le suivi de l’or présente les dernières évolutions du cours de l’or en <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong>prix de l’or en <?php echo esc_html($display_country_name); ?> en temps réel</strong></span> aujourd’hui <img alt="Drapeau de <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align:middle; margin: 0 4px;"> le <strong><?php echo esc_html($today); ?></strong> à partir des données des marchés régionaux et du cours international de l’or pour (<?php echo esc_html($display_country_name); ?>).
    </p>

    <p style="margin-bottom: 15px;">
        💡 Ce rapport vous permet de suivre les cours de l’or en direct pour toutes les catégories, notamment le <strong>cours de l’or 21 carats aujourd’hui</strong> — le titrage le plus échangé — ainsi que l’<strong>or 22 carats</strong>, l’<strong>or 18 carats</strong> et l’<strong>or 14 carats</strong>. Le suivi couvre également les métaux précieux, le marché de la bijouterie et les évolutions quotidiennes du marché.
    </p>

    <p style="margin-bottom: 15px;">
        ✨ Selon les données du marché en direct, hors frais de fabrication, le <strong>prix du gramme d’or 24 carats</strong> est d’environ <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($gram_24k_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> (soit <strong><?php echo number_format($gram_24k_price_usd_converted, 2); ?> dollars américains</strong>). Grâce à sa grande pureté, ce titrage constitue la référence principale pour les <strong>lingots d’or</strong>.
    </p>

    <p style="margin-bottom: 15px;">
        📈 Le <strong>cours de l’once d’or mondiale aujourd’hui</strong> (31,1 grammes d’or 24 carats) est de <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong>. Il s’agit du cours international de référence ; les prix locaux de l’or sont convertis séparément selon le dernier taux de change disponible.
    </p>

    <p style="margin-bottom: 15px;">
        🪙 Pour les épargnants et les investisseurs, le <strong>prix de la pièce d’or aujourd’hui</strong> (une pièce de 8 grammes en or 21 carats, un titrage très répandu) est d’environ <strong><?php echo number_format($gold_pound_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong>.
    </p>

    <p style="margin-bottom: 20px;">
        🛠️ Pour suivre la valeur de votre épargne, surveiller l’<strong>indice du marché de l’or en direct</strong> et les <strong>prix des lingots d’or</strong> de 1 gramme à 1 kilogramme peut vous aider à suivre les tendances avant un achat ou une vente.
    </p>

    <div style="background: #17191d; padding: 12px; border-radius: 6px; border: 1px dashed #3a3f4d; color: #d1d5db; font-size: 14px; margin-top: 15px;">
        💵 <strong>Indicateur du taux de change :</strong> Les prix locaux de l’or évoluent avec les taux de change. Le <strong>taux de change du dollar américain aujourd’hui en <?php echo esc_html($display_country_name); ?></strong> est de <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> pour un dollar américain, selon les dernières données disponibles. Téléchargez l’<strong>application des prix de l’or</strong> pour recevoir des alertes.
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
            💵 Taux de change en direct par rapport à <?php echo esc_html($currency_label); ?> en <?php echo esc_html($display_country_name); ?> <img alt="Drapeau de <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:
        </strong>
        
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; text-align: left; direction: ltr;">
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'USD') : ?>
                    <div><img alt="Drapeau de United States" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Dollar américain :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                    <div><img alt="Drapeau de United Kingdom" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Livre sterling :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                    <div><img alt="Drapeau de Saudi Arabia" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Riyal saoudien :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>

                <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                    <div><img alt="Drapeau de Bahrain" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Dinar bahreïni :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                    <div><img alt="Drapeau de Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Rial omanais :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                    <div><img alt="Drapeau de European Union" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Euro :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                    <div><img alt="Drapeau de United Arab Emirates" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Dirham des Émirats :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                    <div><img alt="Drapeau de Kuwait" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Dinar koweïtien :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                    <div><img alt="Drapeau de Qatar" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Riyal qatari :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                    <div><img alt="Drapeau du Japon" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Yen japonais :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
        </div>
        <p style="margin: 15px 0 0 0; font-size: 12px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 8px; text-align: left; direction: ltr;">* Les mises à jour sont effectuées automatiquement à partir d’indices officiels du marché. Nous vous recommandons d’installer l’<strong>application des prix de l’or</strong>.</p>
    </div>
<?php endif; ?>

<div class="altaqrer-silo-links" style="margin: 25px auto; padding: 15px; background: #17191d; border: 1px solid #3a3f4d; border-radius: 6px; text-align: center; max-width: 800px; width: 95%; box-sizing: border-box; clear: both; direction: ltr;">
    <?php
    // Reuse the already-resolved French country URL for every tab link.
    $base_country_url = $fr_header_country_url;

    $active_bg = get_theme_mod('infi_default_color', '#ffb301');
    $active_color = '#000000';
    $default_bg = '#262930';
    $default_color = '#ffffff';

    $tabs = [
        ['key' => '',          'fr' => 'Prix de l’or'],
        ['key' => '24k',       'fr' => '24 carats'],
        ['key' => '22k',       'fr' => '22 carats'],
        ['key' => '21k',       'fr' => '21 carats'],
        ['key' => '18k',       'fr' => '18 carats'],
        ['key' => '14k',       'fr' => '14 carats'],
        ['key' => 'ounce',     'fr' => 'Once d’or'],
        ['key' => 'coin',      'fr' => 'Pièce d’or'],
        ['key' => 'gold-bars', 'fr' => 'Lingots d’or'],
        ['key' => 'gold-index','fr' => 'Indice de l’or'],
        ['key' => 'usd',       'fr' => 'USD et taux de change'],
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
            $label = $tab['fr'];
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
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">📈 Indice du marché de l’or en direct en <?php echo esc_html($display_country_name); ?> <img alt="Drapeau de <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Or pur 24 carats :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valeur : <?php echo number_format($price_24k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Or 22 carats :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valeur : <?php echo number_format($price_22k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;">Or 21 carats, le plus populaire:</strong> <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valeur : <?php echo number_format($price_21k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Or 18 carats :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valeur : <?php echo number_format($price_18k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Or 14 carats :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valeur : <?php echo number_format($price_14k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Once d’or mondiale (31,1 g) :</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong></span><br><small style="color:#94a3b8;">Cours international au comptant, coté en USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Once d’or en monnaie locale (31,1 g) :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Le même cours de référence de l’once mondiale converti en monnaie locale</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Cet indice compare les principaux titrages de l’or en <?php echo esc_html($display_country_name); ?> avec le cours international de référence. L’once mondiale est cotée en USD, tandis que l’once en monnaie locale correspond au même cours converti selon le taux de change du pays. Les frais de fabrication et les marges des vendeurs ne sont pas inclus.
                </p>


            <?php elseif ($gold_view == 'gold-bars') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 Prix des lingots d’or aujourd’hui en <?php echo esc_html($display_country_name); ?> (or pur 24 carats) :</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingot d’or — 1 gramme:</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_24k_local * 1, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valeur : <?php echo number_format($price_24k_usd * 1, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingot d’or — 2,5 grammes:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 2.5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valeur : <?php echo number_format($price_24k_usd * 2.5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingot d’or — 5 grammes:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valeur : <?php echo number_format($price_24k_usd * 5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingot d’or — 10 grammes:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 10, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valeur : <?php echo number_format($price_24k_usd * 10, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingot d’or — 20 grammes:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 20, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valeur : <?php echo number_format($price_24k_usd * 20, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Once troy (31,1 grammes) :</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valeur : <?php echo number_format($ounce_price_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingot d’or — 50 grammes:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 50, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valeur : <?php echo number_format($price_24k_usd * 50, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingot d’or — 100 grammes:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 100, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valeur : <?php echo number_format($price_24k_usd * 100, 2); ?> USD</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Ce suivi présente l’évolution des <strong>prix des lingots d’or aujourd’hui</strong> composés exclusivement d’or 24 carats d’une pureté de 999,9. L’achat de lingots d’or demeure un moyen de préserver son patrimoine et sa liquidité à long terme en <strong><?php echo esc_html($display_country_name); ?></strong> face à l’inflation macroéconomique.
                </p>

            <?php elseif ($gold_view == 'coin') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 Prix de la pièce d’or aujourd’hui en <?php echo esc_html($display_country_name); ?> (poids standard de 8 grammes) :</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>Pièce d’or 21 carats (8 g) :</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_21k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Valeur : <?php echo number_format($price_21k_usd * 8, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>Pièce d’or 22 carats (8 g) :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Valeur : <?php echo number_format($price_22k_usd * 8, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>Pièce d’or 24 carats (8 g) :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Valeur : <?php echo number_format($price_24k_usd * 8, 2); ?> USD</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Suivez en direct le <strong>prix actuel de la pièce d’or</strong> sur les marchés d’investissement de <strong><?php echo esc_html($display_country_name); ?></strong>. Les pièces souveraines en or de 8 grammes sont suivies comme des actifs physiques pouvant jouer un rôle de valeur refuge.
                </p>

            <?php elseif ($gold_view == 'usd') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">💵 Taux de change en direct par rapport à <?php echo esc_html($currency_label); ?> en <?php echo esc_html($display_country_name); ?>:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; text-align: left; direction: ltr; margin-bottom: 20px;">
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'USD') : ?>
                            <div><img alt="Drapeau de US" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Dollar américain :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                            <div><img alt="Drapeau de UK" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Livre sterling :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                            <div><img alt="Drapeau de SA" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Riyal saoudien :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                            <div><img alt="Drapeau de BH" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Dinar bahreïni :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                            <div><img alt="Drapeau de Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Rial omanais :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                            <div><img alt="Drapeau de EU" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Euro :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                            <div><img alt="Drapeau de AE" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Dirham des Émirats :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                            <div><img alt="Drapeau de KW" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Dinar koweïtien :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                            <div><img alt="Drapeau de QA" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Riyal qatari :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                            <div><img alt="Drapeau du Japon" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Yen japonais :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Cet indice dynamique suit les taux de change bancaires. Les références des prix locaux de l’or évoluent directement avec les fluctuations des devises sur les marchés internationaux.
                </p>

            <?php elseif ($gold_view == '24k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Rapport en direct sur le 24K par gramme aujourd’hui en <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Prix en monnaie locale :</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Équivalent en dollars américains :</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_24k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Le <strong>prix du gramme d’or 24 carats aujourd’hui</strong> s’établit à <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Avec une pureté de 99,9 %, ce titrage constitue une référence pour la production de lingots.
                </p>

            <?php elseif ($gold_view == '22k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Rapport en direct sur le 22K par gramme aujourd’hui en <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Prix en monnaie locale :</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Équivalent en dollars américains :</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_22k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Le <strong>prix du gramme d’or 22 carats aujourd’hui</strong> s’établit à <strong><?php echo number_format($price_22k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Ce titrage offre un bon équilibre entre une teneur élevée en métal précieux et une bonne résistance.
                </p>

            <?php elseif ($gold_view == '21k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Rapport en direct sur le Prix du gramme d’or 21 carats aujourd’hui en <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Prix en monnaie locale :</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Équivalent en dollars américains :</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_21k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Le <strong>prix du gramme d’or 21 carats aujourd’hui</strong> s’établit à <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Ce titrage représente une grande partie de la demande sur le marché local de la bijouterie.
                </p>

            <?php elseif ($gold_view == '18k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Rapport en direct sur le 18K par gramme aujourd’hui en <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Prix en monnaie locale :</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Équivalent en dollars américains :</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_18k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Les dernières données du marché situent le <strong>prix du gramme d’or 18 carats aujourd’hui</strong> à <strong><?php echo number_format($price_18k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>, une option adaptée à la fabrication de bijoux raffinés à un coût plus accessible.
                </p>

            <?php elseif ($gold_view == '14k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Rapport en direct sur le 14K par gramme aujourd’hui en <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Prix en monnaie locale :</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Équivalent en dollars américains :</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_14k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    L’indice calcule le <strong>prix du gramme d’or 14 carats aujourd’hui</strong> à <strong><?php echo number_format($price_14k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Cet alliage résistant convient à un usage quotidien en bijouterie.
                </p>

            <?php elseif ($gold_view == 'ounce') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Once d’or mondiale Prix Aujourd’hui (31.1g):</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Cours international au comptant :</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($ounce_price_usd, 2); ?></strong></span> USD</li>
                    <li>🔹 <strong>Devise de cotation :</strong> Dollar américain (USD)</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    L’once d’or mondiale est cotée en dollars américains et représente 31,1 grammes d’or 24 carats. Les conversions en monnaie locale sont volontairement exclues de cette référence mondiale ; les prix locaux de l’or sont calculés séparément à partir du taux de change applicable.
                </p>
            <?php endif; ?>

        </div>
    </div>
    <?php
}
?>

<?php if (!empty($gold_view)) :
    // Les valeurs en direct ci-dessous utilisent le même instantané de prix et les mêmes conversions que les tableaux ci-dessus.
    $en_seo_base = home_url('/fr/country/' . rawurlencode($fr_header_country_slug) . '/');
    $en_seo_price_map = array(
        '24k' => array($price_24k_local, $price_24k_usd),
        '22k' => array($price_22k_local, $price_22k_usd),
        '21k' => array($price_21k_local, $price_21k_usd),
        '18k' => array($price_18k_local, $price_18k_usd),
        '14k' => array($price_14k_local, $price_14k_usd)
    );
?>
<article class="en-seo-article" aria-labelledby="fr-seo-title">
<?php if (isset($en_seo_price_map[$gold_view])) :
    $en_active_price_local = $en_seo_price_map[$gold_view][0];
    $en_active_price_usd = $en_seo_price_map[$gold_view][1];
    $en_karat = strtoupper($gold_view);
?>
    <h2 id="fr-seo-title">Prix de l’or <?php echo esc_html($en_karat); ?> aujourd’hui en <?php echo esc_html($display_country_name); ?> par gramme</h2>
    <p>Suivez le dernier cours de <strong><?php echo esc_html($en_karat); ?> aujourd’hui en <?php echo esc_html($display_country_name); ?></strong> grâce au cours de référence en direct affiché ci-dessus. La valeur indicative actuelle est de <strong><?php echo number_format($en_active_price_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> par gramme, soit environ <strong><?php echo number_format($en_active_price_usd, 2); ?> USD</strong>. Ces montants sont calculés à partir du dernier cours de référence disponible pour l’or 24 carats, du coefficient de pureté de l’or <?php echo esc_html($en_karat); ?> et du dernier taux de conversion monétaire disponible sur le site.</p>
    <h3>Que signifie l’or <?php echo esc_html($en_karat); ?> ?</h3>
    <p>Le carat indique la proportion d’or pur dans un alliage. L’or 24 carats sert de référence pour l’or pur, tandis que les titrages inférieurs contiennent une part plus importante d’autres métaux. Le cours de l’or <?php echo esc_html($en_karat); ?> reflète donc sa teneur en or et non le prix de vente final d’un bijou. Le prix en boutique peut également inclure la main-d’œuvre, les marges du détaillant, les taxes et d’autres frais locaux qui ne sont pas compris dans la valeur brute affichée ici.</p>
    <h3>Comment lire les prix en monnaie locale et en USD</h3>
    <p>Le montant en monnaie locale permet de comparer la valeur de référence en <?php echo esc_html($display_country_name); ?>, tandis que l’équivalent en USD facilite la comparaison de la même teneur en or avec les cotations internationales. Les prix locaux peuvent évoluer en fonction du cours mondial de l’or, des taux de change ou des conditions du marché local. Les montants affichés sur cette page sont des valeurs indicatives et ne constituent pas une offre ferme de rachat ou de vente.</p>
    <h3>Cours de l’or associés</h3>
    <p>Comparez ce cours avec <a href="<?php echo esc_url($en_seo_base . '24k/'); ?>">or 24 carats</a>, <a href="<?php echo esc_url($en_seo_base . '21k/'); ?>">or 21 carats</a>, <a href="<?php echo esc_url($en_seo_base . 'gold-bars/'); ?>">prix des lingots d’or</a>, et l’<a href="<?php echo esc_url($en_seo_base . 'gold-index/'); ?>">indice du marché de l’or en direct</a> afin d’obtenir une vue plus complète du marché.</p>
    <h3>Questions fréquentes</h3>
    <details><summary>Le cours affiché de <?php echo esc_html($en_karat); ?> correspond-il au prix final en bijouterie ?</summary><p>Non. Il s’agit d’une référence indicative de la valeur de l’or brut, hors main-d’œuvre, marges des détaillants, taxes et autres frais éventuels liés au produit fini.</p></details>
    <details><summary>Pourquoi l’équivalent en USD diffère-t-il du prix local ?</summary><p>Les deux montants sont exprimés dans des devises différentes. Le montant local est converti à partir des derniers taux de change disponibles utilisés par le site ; le montant en USD représente la valeur correspondante de l’or en dollars américains.</p></details>
<?php elseif ($gold_view === 'ounce') : ?>
    <h2 id="fr-seo-title">Cours de l’once d’or mondiale aujourd’hui en USD</h2>
    <p>Le cours international de l’once d’or présenté sur cette page est de <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong> pour une once troy d’environ 31,1 grammes d’or 24 carats. Il s’agit du <strong>cours mondial de référence de l’or au comptant</strong>, exprimé en dollars américains. Il n’est volontairement pas présenté comme un prix local propre à un pays ; les prix au gramme sont convertis séparément pour le pays sélectionné.</p>
    <h3>Pourquoi l’once d’or mondiale est importante</h3>
    <p>Sur les marchés internationaux, l’or est généralement coté à l’once troy. Les négociants, les affineurs, les sociétés financières et les marchands de lingots utilisent cette référence pour comparer la valeur de l’or entre les marchés. Les variations du dollar américain, les anticipations de taux d’intérêt, les perspectives d’inflation, l’activité des banques centrales et la demande des investisseurs peuvent influencer le cours international de l’or. Il s’agit de facteurs généraux du marché, sans attribuer le mouvement du jour à un facteur particulier.</p>
    <h3>Du cours de l’once mondiale au prix local du gramme</h3>
    <p>À titre de référence, une once troy contient environ 31,1 grammes. Le prix local au gramme dépend également de la conversion dans la devise sélectionnée et des conditions du marché local. Le cours de l’once mondiale ci-dessus reste exprimé en USD afin de permettre une comparaison cohérente avec les cotations internationales.</p>
    <p>Consultez également le <a href="<?php echo esc_url($en_seo_base); ?>">cours de l’or en <?php echo esc_html($display_country_name); ?></a> ; consultez aussi <a href="<?php echo esc_url($en_seo_base . '24k/'); ?>">prix du gramme d’or 24 carats</a> ou ouvrez l’<a href="<?php echo esc_url($en_seo_base . 'gold-index/'); ?>">indice du marché de l’or</a>.</p>
    <h3>Questions fréquentes</h3>
    <details><summary>Combien de grammes contient une once troy d’or ?</summary><p>Une once troy équivaut à environ 31,1035 grammes. Cette page utilise 31,1 grammes pour le calcul de référence affiché.</p></details>
    <details><summary>Ce cours de l’once est-il converti en monnaie locale ?</summary><p>Non. Cette page affiche uniquement le cours international de l’once d’or en USD. Les valeurs en monnaie locale sont indiquées séparément dans les tableaux de prix du pays, le cas échéant.</p></details>
<?php elseif ($gold_view === 'coin') : ?>
    <h2 id="fr-seo-title">Prix de la pièce d’or de 8 grammes aujourd’hui en <?php echo esc_html($display_country_name); ?></h2>
    <p>Suivez la valeur de référence d’une <strong>pièce d’or de 8 grammes</strong> en <?php echo esc_html($display_country_name); ?>. Sur la base des cours actuels au gramme, la valeur indicative d’une pièce de 21 carats est de <strong><?php echo number_format($price_21k_local * 8, 2); ?> <?php echo esc_html($currency_label); ?></strong> (soit environ <strong><?php echo number_format($price_21k_usd * 8, 2); ?> USD</strong>). La page compare également les valeurs en 22 et 24 carats pour le même poids de 8 grammes afin de montrer l’effet du titrage.</p>
    <h3>Comment est calculée la valeur de la pièce de 8 grammes</h3>
    <p>Le calcul multiplie le cours correspondant au gramme par un poids de 8 grammes. Pour la référence courante en 21 carats, l’estimation affichée correspond au prix du gramme 21 carats multiplié par huit. Les valeurs comparatives en 22 et 24 carats utilisent leurs cours respectifs pour le même poids. Le calcul standard de la pièce de 8 grammes utilisé par le site est ainsi conservé.</p>
    <p>Le prix réel d’une pièce peut varier selon sa frappe, son état, son design, sa rareté, les marges du vendeur et les taxes locales. Les valeurs présentées ici correspondent à la teneur en or et ne constituent pas une offre de transaction garantie. Comparez le <a href="<?php echo esc_url($en_seo_base . '21k/'); ?>">prix du gramme d’or 21 carats</a>, <a href="<?php echo esc_url($en_seo_base . '22k/'); ?>">prix de l’or 22 carats</a> et <a href="<?php echo esc_url($en_seo_base . 'gold-bars/'); ?>">prix des lingots d’or</a>.</p>
    <h3>Questions fréquentes</h3>
    <details><summary>Quel poids est utilisé pour le calcul de la pièce d’or ?</summary><p>Cette page conserve le calcul standard de 8 grammes du site pour la comparaison des pièces d’or.</p></details>
    <details><summary>La valeur affichée inclut-elle une marge du vendeur ?</summary><p>Non. Elle estime uniquement la teneur en or et n’inclut pas les frais de frappe, les marges du vendeur, la main-d’œuvre ou les taxes.</p></details>
<?php elseif ($gold_view === 'gold-bars') : ?>
    <h2 id="fr-seo-title">Prix des lingots d’or aujourd’hui en <?php echo esc_html($display_country_name); ?></h2>
    <p>Les lingots d’or sont généralement évalués à partir du cours de référence de l’or 24 carats. Sur la base du cours actuel de <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?> par gramme</strong> (soit environ <strong><?php echo number_format($price_24k_usd, 2); ?> USD</strong>), un lingot de 10 grammes présente une valeur indicative en or de <strong><?php echo number_format($price_24k_local * 10, 2); ?> <?php echo esc_html($currency_label); ?></strong>, tandis qu’un lingot de 100 grammes vaut environ <strong><?php echo number_format($price_24k_local * 100, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Le tableau ci-dessus présente d’autres poids pour faciliter la comparaison.</p>
    <h3>Comment comparer les poids des lingots d’or</h3>
    <p>Pour obtenir une estimation simple, multipliez le cours de référence du gramme 24 carats par le poids du lingot. Le résultat représente la valeur indicative de l’or contenu avant toute prime de fabrication, frais d’analyse ou de poinçonnage, marge du vendeur, coût de livraison ou taxe. Le prix de vente final d’un lingot peut donc être supérieur au calcul brut présenté sur cette page.</p>
    <p>Avant toute transaction, vérifiez le titrage indiqué, le poids exact, le certificat, le fabricant et la réputation du vendeur. Le <a href="<?php echo esc_url($en_seo_base . '24k/'); ?>">cours de l’or 24 carats</a> constitue la principale référence au gramme, tandis que l’<a href="<?php echo esc_url($en_seo_base . 'ounce/'); ?>">once d’or mondiale</a> permet une comparaison internationale en USD.</p>
    <h3>Questions fréquentes</h3>
    <details><summary>Les prix des lingots incluent-ils les frais de fabrication ?</summary><p>Non. Le tableau estime uniquement la valeur de l’or et exclut la fabrication, la certification, les marges des vendeurs et les taxes.</p></details>
    <details><summary>Pourquoi deux lingots de même poids peuvent-ils avoir des prix différents ?</summary><p>La marque, la certification, les coûts de fabrication, les marges des vendeurs, la disponibilité et les taxes locales peuvent influencer le prix de vente final.</p></details>
<?php elseif ($gold_view === 'gold-index') : ?>
    <!-- Global XAU/USD chart added specifically to the Indice de l’or SEO section. -->
    <section class="en-gold-index-chart" aria-labelledby="en-gold-index-chart-title" style="background:#17191d;border:1px solid #323742;border-radius:8px;padding:12px;margin:0 0 22px;direction:ltr;text-align:left;">
        <h3 id="en-gold-index-chart-title" style="color:#f0f1f5;text-align:left;margin:5px 5px 12px;font-size:20px;">Graphiques du cours de l’or</h3>
        <div style="position:relative;width:100%;height:520px;overflow:hidden;border-radius:6px;">
            <iframe
                id="tradingview_gold_index"
                title="Graphiques mondiaux du cours de l’or — XAU/USD"
                src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_gold_index&symbol=OANDA%3AXAUUSD&interval=D&hidesidetoolbar=0&symboledit=0&saveimage=0&toolbarbg=%2317191d&studies=%5B%5D&theme=dark&style=1&timezone=Etc%2FUTC&withdateranges=1&hideideas=1&locale=fr"
                style="width:100%;height:100%;border:0;"
                allowtransparency="true"
                scrolling="no"
                loading="lazy"
                allowfullscreen>
            </iframe>
        </div>
        <p style="color:#94a3b8;text-align:left;font-size:13px;margin:10px 4px 2px;">Suivez le cours international de l’or au comptant en dollars américains (USD) grâce au graphique mondial XAU/USD. Il s’agit d’une référence mondiale et non d’un prix de détail propre à un pays.</p>
    </section>
    <h2 id="fr-seo-title">Indice du marché de l’or en direct et cours par carat en <?php echo esc_html($display_country_name); ?></h2>
    <p>Cette présentation du marché de l’or rassemble les dernières valeurs de référence disponibles pour plusieurs titrages. Le cours de référence actuel de l’or 24 carats est de <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> par gramme, tandis que le 22 carats est d’environ <strong><?php echo number_format($price_22k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> et le 21 carats est d’environ <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> . Le cours de l’once troy mondiale est de <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong> et son équivalent en monnaie locale est de <strong><?php echo number_format($ounce_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong>.</p>
    <h3>Ce que l’indice de l’or permet de comparer</h3>
    <p>L’indice offre un aperçu pratique des valeurs de l’or selon les titrages et les devises courants. Il permet de comparer la référence de l’or 24 carats aux titrages inférieurs utilisés en bijouterie. Les valeurs locales sont calculées à partir du cours de référence de l’or et des taux de change disponibles ; les montants en USD facilitent la comparaison avec le marché international.</p>
    <p>Les cours de l’or peuvent réagir à l’activité du marché international, aux variations des devises, aux anticipations de taux d’intérêt, aux inquiétudes liées à l’inflation et à l’évolution de la demande d’investissement. Une seule observation ne suffit pas à établir une tendance ; il est donc préférable de comparer les mises à jour dans le temps. Consultez la page <a href="<?php echo esc_url($en_seo_base . '21k/'); ?>">page du cours de l’or 21 carats</a>, <a href="<?php echo esc_url($en_seo_base . '24k/'); ?>">page du cours de l’or 24 carats</a> et <a href="<?php echo esc_url($en_seo_base . 'ounce/'); ?>">page de l’once mondiale</a>.</p>
    <h3>Questions fréquentes</h3>
    <details><summary>L’indice indique-t-il un prix de marché garanti ?</summary><p>Non. Il s’agit d’une référence informative fondée sur les dernières données disponibles utilisées par le site. Les prix des transactions réelles peuvent inclure des primes et des frais locaux.</p></details>
    <details><summary>Pourquoi les différents carats ont-ils des prix différents ?</summary><p>Chaque titrage contient une proportion différente d’or pur. À poids égal, les alliages moins purs ont une valeur d’or brut inférieure à celle de l’or 24 carats, avant prise en compte des autres frais.</p></details>
<?php elseif ($gold_view === 'usd') : ?>
    <h2 id="fr-seo-title">Taux de change USD et conversion des devises en <?php echo esc_html($display_country_name); ?></h2>
    <p>Selon la dernière valeur de référence disponible sur cette page, un dollar américain vaut environ <strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Les taux de change sont importants pour les acheteurs d’or, car les cours internationaux des lingots sont généralement exprimés en USD. Lorsque la monnaie locale évolue face au dollar, la valeur locale de l’or peut changer même si le cours international en dollars reste stable.</p>
    <h3>Comment les variations des devises influencent les prix locaux de l’or</h3>
    <p>Une estimation du prix local de l’or combine un cours international de référence et une conversion monétaire auxquels peuvent s’ajouter, dans les marchés de détail, des primes, taxes ou frais locaux. Cette page présente plusieurs comparaisons de devises afin de mieux comprendre le contexte de conversion. Ces taux sont fournis à titre indicatif et peuvent différer des taux appliqués par les banques, les bureaux de change, les cartes ou les services de transfert.</p>
    <p>Pour comparer les cours de l’or, consultez le <a href="<?php echo esc_url($en_seo_base . '24k/'); ?>">prix du gramme 24 carats</a>, le <a href="<?php echo esc_url($en_seo_base . '21k/'); ?>">prix du gramme 21 carats</a>, ainsi que le <a href="<?php echo esc_url($en_seo_base . 'ounce/'); ?>">cours international de l’once d’or en USD</a>.</p>
    <h3>Questions fréquentes</h3>
    <details><summary>Ce taux de change est-il celui proposé par toutes les banques ?</summary><p>Non. Il s’agit de la dernière valeur de référence disponible sur le site. Les banques et les bureaux de change peuvent appliquer des taux d’achat et de vente, des marges ou des frais différents.</p></details>
    <details><summary>Pourquoi le taux du dollar est-il important pour l’or ?</summary><p>Comme le cours international de l’or est généralement exprimé en dollars américains, la conversion de cette référence en monnaie locale contribue à estimer la valeur locale de l’or.</p></details>
<?php endif; ?>
    <p class="en-seo-update-note" style="margin:20px 0 0;padding-top:12px;border-top:1px solid #3a3f4d;color:#9ca3af;font-size:12px;">Date de référence : <?php echo esc_html($today); ?>. Les prix sont indicatifs et reflètent les dernières données disponibles sur cette page ; ils peuvent évoluer au fil des mises à jour des marchés et des taux de change.</p>
</article>
<?php endif; ?>

<?php if (!$fr_header_is_app) : ?>
<footer class="en-site-footer">
  <div class="en-site-footer-inner">
    <section>
      <h3>À propos d’AlTaqrer Gold</h3>
      <p><strong>AlTaqrer Gold</strong> aide les lecteurs à suivre les cours de l’or sur les marchés régionaux et internationaux. Consultez les prix de référence en direct de l’or 24, 22, 21, 18 et 14 carats, comparez la valeur des lingots et des pièces de 8 grammes, et suivez le cours mondial de l’once d’or en USD. Les prix sont fournis à titre informatif et comparatif ; les prix de vente au détail peuvent inclure la main-d’œuvre, des primes et des taxes.</p>
    </section>
    <section>
      <h3>Rubriques des prix de l’or</h3>
      <ul>
        <li><a href="<?php echo esc_url($fr_header_country_url); ?>">Prix de l’or en <?php echo esc_html(isset($display_country_name) ? $display_country_name : ''); ?></a></li>
        <li><a href="<?php echo esc_url($fr_header_country_url . 'gold-bars/'); ?>">Lingots et pièces d’or</a></li>
        <li><a href="<?php echo esc_url($fr_header_country_url . 'gold-index/'); ?>">Indice de l’or en direct</a></li>
        <li><a href="<?php echo esc_url($fr_header_country_url . 'usd/'); ?>">USD et taux de change</a></li>
      </ul>
    </section>
    <section>
      <h3>Prix de l’or par région</h3>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/fr/country/eg/')); ?>">Prix de l’or en Égypte</a></li>
        <li><a href="<?php echo esc_url(home_url('/fr/country/sa/')); ?>">Prix de l’or en Arabie saoudite</a></li>
        <li><a href="<?php echo esc_url(home_url('/fr/country/ae/')); ?>">Prix de l’or aux Émirats arabes unis</a></li>
        <li><a href="<?php echo esc_url(home_url('/fr/country/kw/')); ?>">Prix de l’or au Koweït</a></li>
      </ul>
      <h3 style="margin-top:16px;">Suivez-nous</h3>
      <ul>
        <li><a href="https://t.me/goldaltaqrer" target="_blank" rel="noopener noreferrer">Rejoignez notre chaîne Telegram</a></li>
      </ul>
    </section>
    <?php
    // Afficher uniquement les pages françaises réellement publiées ; ne pas laisser de liens fictifs.
    $en_footer_pages = array();
    foreach (array(
        'privacy-policy' => 'Politique de confidentialité',
        'terms-of-use'   => 'Conditions d’utilisation',
        'contact-us'     => 'Contactez-nous'
    ) as $page_slug => $page_label) {
        $page_object = get_page_by_path('fr/' . $page_slug);
        if (!$page_object) {
            $page_object = get_page_by_path($page_slug);
        }
        if ($page_object && $page_object->post_status === 'publish') {
            $en_footer_pages[] = array('url' => get_permalink($page_object), 'label' => $page_label);
        }
    }
    if (!empty($en_footer_pages)) : ?>
    <section>
      <h3>Liens utiles</h3>
      <ul>
        <?php foreach ($en_footer_pages as $footer_page) : ?>
          <li><a href="<?php echo esc_url($footer_page['url']); ?>"><?php echo esc_html($footer_page['label']); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </section>
    <?php endif; ?>
  </div>
  <div class="en-footer-bottom">Tous droits réservés &copy; <?php echo esc_html(function_exists('wp_date') ? wp_date('Y') : date('Y')); ?> — <a href="<?php echo esc_url($fr_header_home_url); ?>">AlTaqrer Gold</a>.</div>
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
</body>
</html>
