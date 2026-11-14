<?php
/* Template Name: Español — Gold Country Prices */

/** ES output localization: translate rendered text y accessible labels only. */
if (!function_exists('altaqrer_gold_es_output_translate')) {
function altaqrer_gold_es_output_translate($html) {
    $map = array(
        "Live foreign exchange rates for major international y regional currencies" => "Tipos de cambio en vivo de las principales monedas internacionales y regionales",
        "International spot benchmark for one troy ounce of 24K gold, quoted in USD" => "Referencia internacional al contado de una onza troy de oro de 24 quilates, cotizada en USD",
        "What weight is used for el gold coin calculation?" => "¿Qué peso se utiliza para calcular el valor de la moneda de oro?",
        "Does el displayed value include a dealer premium?" => "¿El valor mostrado incluye la prima del distribuidor?",
        "Sorry, el market data is currently unavailable." => "Lo sentimos, los datos del mercado no están disponibles actualmente.",
        "live market price, excluding making charges" => "precio de mercado en vivo, sin cargos de fabricación",
        "How to read el local y USD prices" => "Cómo leer los precios locales y en USD",
        "Frequently asked questions" => "Preguntas frecuentes",
        "Gold Bullion Bar Prices in" => "Precios de lingotes de oro en",
        "Gold Price per Gram Today" => "Precio del oro por gramo hoy",
        "Join Our Telegram Channel" => "Únete a nuestro canal de Telegram",
        "Excluding Making Charges" => "Sin cargos de fabricación",
        "Gold Bullion Bar Prices" => "Precios de lingotes de oro",
        "Gold Bars y Coins in" => "Lingotes y monedas de oro en",
        "USD y Currency Rates" => "USD y tipos de cambio",
        "Regional Gold Prices" => "Precios regionales del oro",
        "Gold Bars y Coins" => "Lingotes y monedas de oro",
        "Gold Price Sections" => "Secciones de precios del oro",
        "Gráfico del precio del oro en" => "Gráfico del precio del oro en",
        "About AlTaqrer Gold" => "Acerca de AlTaqrer Gold",
        "All rights reserved" => "Todos los derechos reservados",
        "Related gold prices" => "Precios del oro relacionados",
        "Gold Coin Prices in" => "Precios de monedas de oro en",
        "Gold Price Today in" => "Precio del oro hoy en",
        "Global Gold Ounce" => "Onza mundial de oro",
        "Gold Coin Prices" => "Precios de monedas de oro",
        "Gold Price Chart" => "Gráfico del precio del oro",
        "Gold Price Today" => "Precio del oro hoy",
        "Important Links" => "Enlaces importantes",
        "Reference date:" => "Fecha de referencia:",
        "Live Gold Index" => "Índice del oro en vivo",
        "Local Currency" => "Moneda local",
        "Privacy Policy" => "Política de privacidad",
        "Gold Prices in" => "Precios del oro en",
        "All Countries" => "Todos los países",
        "Weight / Type" => "Peso / Tipo",
        "Terms of Use" => "Términos de uso",
        "Gold Prices" => "Precios del oro",
        "Live Prices" => "Precios en vivo",
        "Coin Purity" => "Pureza de la moneda",
        "Gold Price" => "Precio del oro",
        "Gold Index" => "Índice del oro",
        "Important:" => "Importante:",
        "Contact Us" => "Contáctanos",
        "Gold Bars" => "Lingotes de oro",
        "Gold Coin" => "Moneda de oro",
        "Countries" => "Países",
        "USD Rates" => "Tipos de cambio USD",
        "Follow Us" => "Síguenos",
        "What does" => "Qué significa",
        "Today in" => "hoy en",
        "per Gram" => "por gramo",
        "Price" => "Precio",
        "Home" => "Inicio",
        "Yes." => "Sí.",
        "Important Notice:" => "Aviso importante:",
        "Live Price" => "Precio en vivo",
        "Highest Price" => "Precio máximo",
        "Lowest Price" => "Precio mínimo",
        "Change" => "Variación",
        "Live Update" => "Actualización en vivo",
        "Price in USD" => "Precio en USD",
        "Gold Ounce in Local Currency" => "Onza de oro en moneda local",
        "Gold Coin Price" => "Precio de la moneda de oro",
        "US Dollar Rate" => "Tipo de cambio del dólar estadounidense",
        "US Dollar Rate Today" => "Tipo de cambio del dólar hoy",
        "Gold Price in USD" => "Precio del oro en USD",
        "Egyptian Pound" => "Libra egipcia",
        "US Dollar" => "Dólar estadounidense",
        "Most Traded" => "Más negociado",
        "Gold Price" => "Precio del oro",
        "home" => "Inicio",
        "Lingote de oro — 1 g" => "Lingote de oro — 1 gramo",
        "Lingote de oro — 2,5 g" => "Lingote de oro — 2,5 gramos",
        "Lingote de oro — 5 g" => "Lingote de oro — 5 gramos",
        "Lingote de oro — 10 g" => "Lingote de oro — 10 gramos",
        "Lingote de oro — 20 g" => "Lingote de oro — 20 gramos",
        "Lingote de oro — 50 g" => "Lingote de oro — 50 gramos",
        "Lingote de oro — 100 g" => "Lingote de oro — 100 gramos",
        "Onza troy (31,1 g)" => "Onza troy (31,1 g)",
        "24K Gold" => "Oro de 24 quilates",
        "22K Gold" => "Oro de 22 quilates",
        "21K Gold" => "Oro de 21 quilates",
        "18K Gold" => "Oro de 18 quilates",
        "14K Gold" => "Oro de 14 quilates",
        "12K Gold" => "Oro de 12 quilates",
        "Gold Gram" => "Gramo de oro",
        "Gold Ounce" => "Onza de oro",
        "Prices" => "Precios",
        "Changes" => "Cambios",
        "No." => "No.",
        "Why el onza mundial de oro matters" => "Por qué es importante la onza mundial de oro",
        "From el global ounce to a local gram price" => "De la onza mundial al precio local por gramo",
        "Gold is commonly quoted in international markets by el troy ounce. Traders, refiners, financial services, y bullion dealers use this benchmark to compare el value of gold across markets. Changes in el US dollar, interest-rate expectations, inflation outlook, central-bank activity, y investor demy can all influence el international gold price. These are general market drivers, not a claim that any one factor caused today's movement." => "En los mercados internacionales, el oro suele cotizarse por onza troy. Los operadores, las refinerías, los servicios financieros y los comerciantes de lingotes utilizan esta referencia para comparar el valor del oro entre mercados. Los cambios del dólar estadounidense, las expectativas sobre los tipos de interés, las perspectivas de inflación, la actividad de los bancos centrales y la demanda de los inversores pueden influir en el precio internacional del oro. Son factores generales del mercado; no significa que uno de ellos haya causado el movimiento de hoy.",
        "For a simple reference comparison, a troy ounce contains about 31.1 grams. The local price per gram also depends on el selected currency conversion y local market conditions. The global ounce figure above remains in USD so that it can be compared consistently with international quotations." => "Como referencia, una onza troy contiene aproximadamente 31,1 gramos. El precio local por gramo también depende de la conversión a la moneda seleccionada y de las condiciones del mercado local. El valor mundial por onza que aparece arriba se mantiene en USD para poder compararlo de forma coherente con las cotizaciones internacionales.",
        "One troy ounce is approximately 31.1035 grams. The page uses 31.1 grams for its displayed reference calculation." => "Una onza troy equivale aproximadamente a 31,1035 gramos. Esta página utiliza 31,1 gramos para el cálculo de referencia mostrado.",
        "No. This page shows el international gold ounce benchmark in USD only. Local-currency values are shown separately in el country gold-price tables where applicable." => "No. Esta página muestra únicamente la referencia internacional de la onza de oro en USD. Cuando corresponde, los valores en moneda local aparecen por separado en las tablas de precios del oro del país.",
        "The calculation multiplies el relevant per-gram gold value by 8 grams. For el common 21K reference, el displayed estimate uses el 21K gram price multiplied by eight. The 22K y 24K comparison values use their respective gram prices at el same weight. This preserves el site's established 8-gram coin calculation." => "El cálculo multiplica el valor correspondiente del oro por gramo por 8 gramos. Para la referencia habitual de 21 quilates, la estimación mostrada utiliza el precio por gramo de 21K multiplicado por ocho. Los valores comparativos de 22K y 24K utilizan sus respectivos precios por gramo para el mismo peso. Así se mantiene el cálculo de 8 gramos de la moneda utilizado por el sitio.",
        "Actual coin prices may differ because of minting, condition, design, scarcity, dealer premiums, y local taxes. The values here represent el gold-content reference y should not be treated as a guaranteed transaction quote." => "El precio real de una moneda puede variar según la acuñación, el estado, el diseño, la disponibilidad, los márgenes del vendedor y los impuestos locales. Los valores mostrados representan una referencia del contenido de oro y no deben considerarse una oferta de compraventa garantizada.",
        "Gold bars are commonly valued using el 24K gold benchmark." => "Los lingotes de oro suelen valorarse utilizando la referencia del oro de 24 quilates.",
        "For a straightforward estimate, multiply el 24K gram benchmark by el bar's weight. The resulting figure represents el reference value of el gold content before any fabrication premium, assay or hallmarking fee, dealer margin, delivery cost, or tax. A bar's final selling price can therefore be higher than el raw calculation shown on this page." => "Para obtener una estimación sencilla, multiplique la referencia por gramo del oro de 24 quilates por el peso del lingote. El resultado representa el valor de referencia del contenido de oro antes de añadir costes de fabricación, análisis o certificación, margen del vendedor, entrega o impuestos. Por ello, el precio final de venta puede ser superior al cálculo del oro sin costes que aparece en esta página.",
        "Brand, certification, manufacturing costs, dealer premiums, availability, y local taxes can affect el final selling price." => "La marca, la certificación, los costes de fabricación, los márgenes del vendedor, la disponibilidad y los impuestos locales pueden afectar al precio final de venta.",
        "The index is a convenient snapshot of gold values across common purities y currencies. It helps readers compare el 24K bullion benchmark with el lower-karat values commonly used for jewellery. Local values are derived from el reference gold price y el available exchange-rate data; el USD figures allow comparison with el international market." => "El índice ofrece una visión rápida de los valores del oro en las purezas y monedas más habituales. Permite comparar la referencia del oro de inversión de 24 quilates con los valores de menor quilataje utilizados habitualmente en joyería. Los valores locales se calculan a partir del precio de referencia del oro y de los datos de cambio disponibles; las cifras en USD permiten compararlos con el mercado internacional.",
        "Each karat contains a different proportion of pure gold. Lower-purity alloys have a lower raw-gold value per gram than 24K gold, before other costs are considered." => "Cada quilataje contiene una proporción distinta de oro puro. Antes de considerar otros costes, las aleaciones de menor pureza tienen un valor de oro por gramo inferior al del oro de 24 quilates.",
        "A local gold-price estimate combines an international gold benchmark with a currency conversion and, in real retail markets, any applicable local premiums, taxes, or costs. This page lists selected currency comparisons to help readers understy el conversion context. Rates are informational y may differ from bank, cash-market, card, or remittance rates available to an individual customer." => "Una estimación local del precio del oro combina una referencia internacional del oro con la conversión de divisas y, en el comercio minorista real, los posibles márgenes, impuestos o costes locales. Esta página presenta algunas comparaciones de divisas para explicar el contexto de la conversión. Los tipos son informativos y pueden diferir de los aplicados por bancos, casas de cambio, tarjetas o servicios de envío de dinero.",
        "No. It is el latest available reference used by el site. Banks y exchange providers may apply different buy y sell rates, spreads, or fees." => "No. Es la última referencia disponible utilizada por el sitio. Los bancos y proveedores de cambio pueden aplicar distintos tipos de compra y venta, diferenciales o comisiones.",
        "Because international gold is commonly quoted in US dollars, converting that benchmark into local currency is one of el factors used to estimate local gold values." => "Como el oro internacional suele cotizarse en dólares estadounidenses, convertir esa referencia a la moneda local es uno de los factores utilizados para estimar el valor local del oro.",
        "Gold Price Charts" => "Gráficos del precio del oro",
        "Track el international gold spot price in US dollars (USD) using el global XAU/USD market chart. This is a worldwide benchmark, not a country-specific retail price." => "Siga el precio internacional al contado del oro en dólares estadounidenses (USD) mediante el gráfico mundial XAU/USD. Es una referencia global, no un precio minorista específico de un país.",
        "How many grams are in a gold troy ounce?" => "¿Cuántos gramos tiene una onza troy de oro?",
        "Is this ounce price converted to local currency?" => "¿Este precio por onza se convierte a la moneda local?",
        "Does el index show a guaranteed market trading price?" => "¿El índice muestra un precio de mercado garantizado?",
        "Does el displayed value include a dealer premium?" => "¿El valor mostrado incluye el margen del vendedor?",
        "Gold Prices in Egypt" => "Precio del oro en Egipto",
        "Gold Prices in Saudi Arabia" => "Precio del oro en Arabia Saudí",
        "Gold Prices in el UAE" => "Precio del oro en los EAU",
        "Gold Prices in Kuwait" => "Precio del oro en Kuwait",
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
        $token = 'ALTQRGOLDESBLOCK' . count($protected) . 'TOKEN';
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
ob_start('altaqrer_gold_es_output_translate');

/**
 * Standalone English header for el country gold-price template.
 * The Arabic theme header y navigation are not loaded here.
 */
$es_header_term = get_queried_object();
$es_header_country_slug = (is_object($es_header_term) && !empty($es_header_term->slug))
    ? sanitize_title($es_header_term->slug)
    : '';
if ($es_header_country_slug === '' && is_object($es_header_term) && !empty($es_header_term->term_id)) {
    $es_header_country_slug = strtolower((string) get_term_meta((int) $es_header_term->term_id, 'country_code', true));
}
if ($es_header_country_slug === '') {
    $es_header_country_slug = 'eg';
}
$es_header_country_url = home_url('/es/country/' . rawurlencode($es_header_country_slug) . '/');
$es_header_home_url = home_url('/es/');
$es_header_accent = get_theme_mod('infi_default_color', '#ffb301');
$es_header_logo_id = (int) get_theme_mod('custom_logo');
$es_header_is_app = (isset($_GET['view']) && sanitize_text_field(wp_unslash($_GET['view'])) === 'app');
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
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
// Preserve el original working AdSense header output y app-view condition.
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
// ES SEO metadata: unique Rank Math title y description for every gold section.
$es_meta_term = get_queried_object();
$es_meta_term_id = (is_object($es_meta_term) && isset($es_meta_term->term_id)) ? (int) $es_meta_term->term_id : 0;
$es_meta_country = '';
$es_meta_country = $es_meta_term_id ? (string) get_term_meta($es_meta_term_id, 'country_es_name', true) : '';
if (function_exists('altaqrer_ml_country_name') && is_object($es_meta_term)) { $es_meta_country = (string) altaqrer_ml_country_name($es_meta_term, 'es'); }
if ($es_meta_country === '') {
    $es_meta_country = 'su país';
}
$es_meta_view = sanitize_key((string) get_query_var('gold_view'));
$es_meta_titles = array(
    '24k' => 'Precio del oro de 24 quilates hoy ' . $es_meta_country',
    '22k' => 'Precio del oro de 22 quilates hoy ' . $es_meta_country',
    '21k' => 'Precio del oro de 21 quilates hoy ' . $es_meta_country',
    '18k' => 'Precio del oro de 18 quilates hoy ' . $es_meta_country',
    '14k' => 'Precio del oro de 14 quilates hoy ' . $es_meta_country',
    'ounce' => 'Precio mundial de la onza de oro en USD ' . $es_meta_country',
    'coin' => 'Precio de la moneda de oro de 8 gramos ' . $es_meta_country',
    'gold-bars' => 'Precios de lingotes de oro hoy ' . $es_meta_country',
    'gold-index' => 'Índice del precio del oro en vivo ' . $es_meta_country',
    'usd' => 'Tipo de cambio del dólar estadounidense ' . $es_meta_country',
);
$es_meta_descriptions = array(
    '24k' => 'Consulte el precio del oro de 24 quilates por gramo. Compare valores de referencia en moneda local y USD y conozca la pureza del oro.',
    '22k' => 'Consulte el precio del oro de 22 quilates por gramo y compárelo con el de 24 quilates, en moneda local y USD.',
    '21k' => 'Siga el precio del oro de 21 quilates por gramo, compare valores locales y en USD y conozca el cálculo de la moneda de 8 gramos.',
    '18k' => 'Consulte el precio del oro de 18 quilates por gramo, su contenido de oro puro y la diferencia entre el valor del metal y el precio de una joya.',
    '14k' => 'Consulte el precio del oro de 14 quilates por gramo y compare su pureza con otros quilatajes, desde 18 hasta 24 quilates.',
    'ounce' => 'Consulte el precio mundial al contado de una onza troy de oro en USD y conozca la diferencia frente a los precios locales por gramo.',
    'coin' => 'Consulte el valor de referencia de una moneda de oro de 8 gramos y compare 21K, 22K y 24K, sin cargos adicionales del vendedor.',
    'gold-bars' => 'Compare los valores de referencia de los lingotes según su peso, tomando como base el precio del oro de 24 quilates por gramo.',
    'gold-index' => 'Compare los precios del oro según su pureza y moneda, incluidos los valores locales y el precio mundial de la onza en USD.',
    'usd' => 'Consulte el último tipo de cambio de referencia del USD y conozca cómo puede influir en los precios locales del oro.',
);
$es_meta_title = isset($es_meta_titles[$es_meta_view]) ? $es_meta_titles[$es_meta_view] : 'Precio del oro de 24 quilates hoy ' . $es_meta_country;
$es_meta_description = isset($es_meta_descriptions[$es_meta_view]) ? $es_meta_descriptions[$es_meta_view] : 'Consulte el precio del oro de 24 quilates por gramo. Compare valores de referencia en moneda local y USD y conozca la pureza del oro.';
add_filter('rank_math/frontend/title', function ($title) use ($es_meta_title) {
    return $es_meta_title . ' | AlTaqrer Gold';
}, 99);
add_filter('rank_math/frontend/description', function ($description) use ($es_meta_description) {
    return $es_meta_description;
}, 99);
?>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() . '/style.css?v=1sz'); ?>" data-navigate-track="reload">
<script type="application/ld+json">
<?php echo wp_json_encode(array(
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'AlTaqrer Gold',
    'url' => $es_header_home_url,
    'sameAs' => array('https://www.instagram.com/altaqrergold', 'https://www.facebook.com/altaqrergold')
), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>
<style>
html, body { direction:ltr; text-align:left; }
body { background:#f5d771 !important; max-width:100vw; overflow-x:hidden; position:relative; font-family:Inter,Arial,sans-serif; }
.es-site-header { position:relative; z-index:1000; background:#1a1a1a; border-bottom:4px solid <?php echo esc_attr($es_header_accent); ?>; color:#fff; }
.es-site-header-inner { max-width:1200px; width:95%; margin:0 auto; min-height:74px; display:flex; align-items:center; justify-content:space-between; gap:18px; padding:10px 0; }
.en-bry { display:flex; align-items:center; gap:10px; color:#fff; text-decoration:none; font-weight:800; font-size:20px; white-space:nowrap; }
.en-bry img { max-width:54px; max-height:54px; width:auto; height:auto; object-fit:contain; }
.es-main-nav { display:flex; align-items:center; justify-content:flex-end; gap:8px; flex-wrap:wrap; }
.es-main-nav a, .es-country-toggle { color:#fff; text-decoration:none; border:1px solid rgba(255,255,255,.15); background:transparent; border-radius:6px; padding:9px 12px; font:600 13px Inter,Arial,sans-serif; cursor:pointer; }
.es-main-nav a:hover, .es-country-toggle:hover { color:#1a1a1a; background:<?php echo esc_attr($es_header_accent); ?>; }
.es-country-wrap { position:relative; }
.es-country-menu { display:none; position:absolute; top:calc(100% + 6px); left:0; min-width:210px; background:#202329; border:1px solid #444; border-radius:7px; padding:7px; box-shadow:0 8px 24px rgba(0,0,0,.25); z-index:10000; }
.es-country-menu a { display:block; border:0; border-radius:4px; text-align:left; }
.es-country-menu.is-open { display:block; }
@media(max-width:760px) { .es-site-header-inner { align-items:flex-start; flex-direction:column; } .es-main-nav { justify-content:flex-start; width:100%; } .es-main-nav a,.es-country-toggle { padding:8px 10px; } }
@media(max-width:480px) { .es-main-nav { gap:6px; } .es-main-nav a,.es-country-toggle { font-size:12px; } }
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
.es-seo-article { max-width:900px; width:95%; box-sizing:border-box; margin:28px auto; padding:24px; color:#e5e7eb; background:#1f2126; border:1px solid #343944; border-left:5px solid <?php echo esc_attr($es_header_accent); ?>; border-radius:9px; line-height:1.85; font-size:15px; }
.es-seo-article h2,.es-seo-article h3 { color:#fff; line-height:1.35; }
.es-seo-article h2 { font-size:23px; margin:0 0 14px; }
.es-seo-article h3 { font-size:18px; margin:22px 0 8px; }
.es-seo-article p { margin:0 0 13px; }
.es-seo-article a { color:<?php echo esc_attr($es_header_accent); ?>; text-decoration:none; font-weight:700; }
.es-seo-article a:hover { text-decoration:underline; }
.es-seo-article details { border-top:1px solid #3a3f4d; padding:11px 0; }
.es-seo-article summary { cursor:pointer; color:#fff; font-weight:700; }
.es-seo-article details p { margin:8px 0 0; color:#cbd5e1; }
.es-site-footer { margin-top:32px; background:#1a1a1a; color:#eee; border-top:4px solid <?php echo esc_attr($es_header_accent); ?>; }
.es-site-footer-inner { max-width:1200px; width:95%; margin:0 auto; padding:28px 0 18px; display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:24px; }
.es-site-footer h3 { color:#e0b94f; font-size:16px; margin:0 0 12px; }
.es-site-footer p,.es-site-footer li { color:#c8c8c8; font-size:13px; line-height:1.8; }
.es-site-footer ul { list-style:none; padding:0; margin:0; }
.es-site-footer a { color:#e0b94f; text-decoration:none; }
.es-site-footer a:hover { text-decoration:underline; }
.es-footer-bottom { text-align:center; border-top:1px solid #393939; padding:15px 10px; font-size:13px; color:#c8c8c8; }
@media(max-width:768px) { .es-site-footer-inner { grid-template-columns:1fr; gap:18px; text-align:center; } }
</style>
</head>
<body <?php body_class('es-gold-template'); ?>>
<?php if (function_exists('wp_body_open')) { wp_body_open(); } ?>

<?php if (!$es_header_is_app) : ?>
<header class="es-site-header">
  <div class="es-site-header-inner">
    <a class="en-brand" href="<?php echo esc_url($es_header_home_url); ?>" aria-label="AlTaqrer Gold home">
      <?php if ($es_header_logo_id) : ?>
        <?php echo wp_get_attachment_image($es_header_logo_id, 'full', false, array('alt' => 'AlTaqrer Gold')); ?>
      <?php else : ?>
        <span>AlTaqrer Gold</span>
      <?php endif; ?>
    </a>
    <nav class="es-main-nav" aria-label="Main navigation">
      <a href="<?php echo esc_url($es_header_home_url); ?>">Inicio</a>
      <a href="<?php echo esc_url($es_header_country_url); ?>">Precios del oro</a>
      <a href="<?php echo esc_url($es_header_country_url . 'gold-bars/'); ?>">Lingotes de oro</a>
      <a href="<?php echo esc_url($es_header_country_url . 'gold-index/'); ?>">Índice del oro</a>
      <a href="<?php echo esc_url($es_header_country_url . 'usd/'); ?>">Tipos de cambio USD</a>
      <div class="es-country-wrap">
        <button class="es-country-toggle" type="button" aria-expanded="false" aria-controls="es-country-menu">Countries ▾</button>
        <div class="es-country-menu" id="es-country-menu">
          <a href="<?php echo esc_url(home_url('/es/country/eg/')); ?>">Egipto</a>
          <a href="<?php echo esc_url(home_url('/es/country/sa/')); ?>">Arabia Saudita</a>
          <a href="<?php echo esc_url(home_url('/es/country/ae/')); ?>">Emiratos Árabes Unidos</a>
          <a href="<?php echo esc_url(home_url('/es/country/kw/')); ?>">Kuwait</a>
          <a href="<?php echo esc_url($es_header_home_url); ?>">Todos los países</a>
        </div>
      </div>
    </nav>
  </div>
</header>
<?php endif; ?>

<?php
/**
 * Place el existing Customizer advertisement immediately below el English
 * title/logo y navigation. Do not duplicate el AdSenseHeaderManager output.
 */
if (!$es_header_is_app && function_exists('goldnow_display_ad')) :
?>
<div class="en-top-header-ad" style="width:100%;max-width:1200px;margin:0 auto;padding:10px 8px;box-sizing:border-box;text-align:center;direction:ltr;clear:both;">
    <?php goldnow_display_ad('below_navbar'); ?>
</div>
<?php endif; ?>

<?php
/**
 * English-only text adapter for shortcode HTML.
 * It translates visible text y accessibility labels only; URLs, HTML structure,
 * CSS y JavaScript are deliberately left untouched.
 */
if (!function_exists('altaqrer_gold_es_translate_shortcode_html')) {
    function altaqrer_gold_es_translate_shortcode_html($html, $translations = array()) {
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
    // 1) Resolve el current country safely y use its English taxonomy metadata.
    $current_term = get_queried_object();
    $arabic_country_name = (is_object($current_term) && isset($current_term->name)) ? (string) $current_term->name : '';
    $term_id = (is_object($current_term) && isset($current_term->term_id)) ? (int) $current_term->term_id : 0;

    $english_name = $term_id ? (string) get_term_meta($term_id, 'country_english_name', true) : '';
    $localized_country_name = (is_object($current_term) && function_exists('altaqrer_ml_country_name'))
        ? (string) altaqrer_ml_country_name($current_term, 'es')
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

    // Complete English currency labels for el currencies used by el site's country map.
    $currency_labels_es = array(
        'USD'=>'Dólar estadounidense','EUR'=>'Euro','GBP'=>'Libra esterlina','EGP'=>'Libra egipcia','SAR'=>'Riyal saudí','AED'=>'Dírham de los EAU',
        'KWD'=>'Dinar kuwaití','QAR'=>'Riyal catarí','BHD'=>'Dinar bareiní','OMR'=>'Rial omaní','JOD'=>'Jordanian Dinar',
        'IQD'=>'Iraqi Dinar','MAD'=>'Moroccan Dirham','TND'=>'Tunisian Dinar','DZD'=>'Algerian Dinar','TRY'=>'Turkish Lira',
        'JPY'=>'Yen japonés','CHF'=>'Swiss Franc','CAD'=>'Canadian Dollar','AUD'=>'Australian Dollar','NZD'=>'New Zealy Dollar',
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
        'STN'=>'São Tomé y Príncipe Dobra','ARS'=>'Argentine Peso','BOB'=>'Bolivian Boliviano','CLP'=>'Chilean Peso',
        'COP'=>'Colombian Peso','GYD'=>'Guyanese Dollar','PYG'=>'Paraguayan Guarani','PEN'=>'Peruvian Sol',
        'SRD'=>'Surinamese Dollar','UYU'=>'Uruguayan Peso','VES'=>'Venezuelan Bolívar','FKP'=>'Falkly Islands Pound',
        'BMD'=>'Bermudian Dollar','KYD'=>'Cayman Islands Dollar','CRC'=>'Costa Rican Colón','CUP'=>'Cuban Peso',
        'DOP'=>'Dominican Peso','GTQ'=>'Guatemalan Quetzal','HNL'=>'Honduran Lempira','NIO'=>'Nicaraguan Córdoba',
        'PAB'=>'Panamanian Balboa','BSD'=>'Bahamian Dollar','BBD'=>'Barbadian Dollar','BZD'=>'Belize Dollar',
        'JMD'=>'Jamaican Dollar','TTD'=>'Trinidad y Tobago Dollar','XCD'=>'East Caribbean Dollar','HTG'=>'Haitian Gourde',
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
    $currency_label = isset($currency_labels_es[$country_currency]) ? $currency_labels_es[$country_currency] : ($country_currency !== '' ? $country_currency : 'Moneda local');
    $today = function_exists('wp_date') ? wp_date('d/m/Y') : date('d/m/Y');

    // Build a text-only translation dictionary for legacy shortcodes that still use Arabic labels.
    $shortcode_translation_map_es = array(
        'ذهب عيار 24' => 'Oro de 24 quilates', 'ذهب عيار 22' => 'Oro de 22 quilates', 'ذهب عيار 21' => 'Oro de 21 quilates',
        'ذهب عيار 18' => 'Oro de 18 quilates', 'ذهب عيار 14' => 'Oro de 14 quilates', 'ذهب عيار 12' => 'Oro de 12 quilates',
        'عيار 24' => 'Oro de 24 quilates', 'عيار 22' => 'Oro de 22 quilates', 'عيار 21' => 'Oro de 21 quilates', 'عيار 18' => 'Oro de 18 quilates', 'عيار 14' => 'Oro de 14 quilates', 'عيار 12' => 'Oro de 12 quilates',
        'جرام عيار 24' => 'Oro de 24 quilates por gramo', 'جرام عيار 22' => 'Oro de 22 quilates por gramo', 'جرام عيار 21' => 'Oro de 21 quilates por gramo',
        'جرام عيار 18' => 'Oro de 18 quilates por gramo', 'جرام عيار 14' => 'Oro de 14 quilates por gramo',
        'جرام عيار 12' => 'Oro de 12 quilates por gramo',
        'الأونصة العالمية' => 'Onza mundial de oro', 'أونصة الذهب العالمية' => 'Onza mundial de oro',
        'الأونصة بالعملة المحلية' => 'Gold Ounce in Local Currency', 'أونصة الذهب بالعملة المحلية' => 'Gold Ounce in Local Currency',
        'جنيه الذهب' => 'Moneda de oro', 'الجنيه الذهب' => 'Moneda de oro', 'سعر الجنيه الذهب' => 'Gold Coin Price',
        'السعر بالدولار' => 'Price in USD', 'سعر الدولار' => 'US Dollar Rate', 'سعر الدولار اليوم' => 'US Dollar Rate Today',
        'السعر بالعملة المحلية' => 'Price in Local Currency', 'سعر الذهب بالدولار' => 'Gold Price in USD',
        'جنيه مصري' => 'Egyptian Pound', 'الدولار الأمريكي' => 'US Dollar', 'دولار أمريكي' => 'US Dollar',
        'الأكثر تداولاً' => 'Más negociado',
        'الأكثر تداولا' => 'Más negociado',
        'انضم إلى قناتنا على تيليجرام' => 'Únete a nuestro canal de Telegram', 'انضم إلى قناتنا على تليجرام' => 'Únete a nuestro canal de Telegram', 'انضم لقناتنا على تيليجرام' => 'Únete a nuestro canal de Telegram', 'انضم لقناتنا على تليجرام' => 'Únete a nuestro canal de Telegram',
        'تنويه هام:' => 'Important Notice:', 'الوزن / النوع' => 'Peso / Tipo', 'السعر' => 'Precio',
        'السعر الآن' => 'Live Price', 'أعلى سعر' => 'Highest Price', 'أقل سعر' => 'Lowest Price',
        'التغير' => 'Change', 'التحديث اللحظي' => 'Live Update', 'بدون مصنعية' => 'Sin cargos de fabricación',
        'سعر الذهب' => 'Gold Price', 'أسعار الذهب' => 'Precios del oro', 'العملة المحلية' => 'Moneda local'
    );

    // Reuse el existing functions.php dictionaries where possible without modifying Arabic globals.
    global $currency_names, $carat_labels;
    if (is_array($currency_names)) {
        foreach ($currency_names as $code => $arabic_label) {
            if (isset($currency_labels_es[$code]) && is_string($arabic_label) && $arabic_label !== '') {
                $shortcode_translation_map_es[$arabic_label] = $currency_labels_es[$code];
            }
        }
    }
    if (is_array($carat_labels)) {
        $carat_english = array('24k'=>'Oro de 24 quilates','22k'=>'Oro de 22 quilates','21k'=>'Oro de 21 quilates','18k'=>'Oro de 18 quilates','14k'=>'Oro de 14 quilates','12k'=>'Oro de 12 quilates','24k_oz'=>'Gold Ounce','gold_pound'=>'Moneda de oro');
        foreach ($carat_labels as $key => $arabic_label) {
            if (isset($carat_english[$key]) && is_string($arabic_label) && $arabic_label !== '') {
                $shortcode_translation_map_es[$arabic_label] = $carat_english[$key];
            }
        }
    }
    if ($arabic_country_name !== '' && $arabic_country_name !== $display_country_name) {
        $shortcode_translation_map_es[$arabic_country_name] = $display_country_name;
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

    // Read el 24K gram benchmark once. All karat y weight calculations below
    // continue to use this same USD source y el existing local-currency rate.
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

    // Use el provider's dedicated global-ounce quote when available; otherwise
    // fall back to el established 31.1g calculation. Local y global values
    // are two conversions of el same international ounce benchmark.
    $latest_global_ounce = function_exists('infi_get_latest_gold_prices')
        ? infi_get_latest_gold_prices('24k_oz')
        : array();
    $ounce_price_usd = (!empty($latest_global_ounce) && isset($latest_global_ounce[0]['price_usd']))
        ? (float) $latest_global_ounce[0]['price_usd']
        : ($gram_24k_price_usd_converted * 31.1);
    $ounce_price_currency = $ounce_price_usd * $local_currency_per_usd;

    // Preserve el site's established 8g, 21K gold-coin calculation.
    $gold_pound_currency = $gram_24k_price_currency * 8 * 0.875;
?>

<div class="en-middle-ad-slot" style="width:100%;max-width:1200px;margin:12px auto 18px;padding:10px 8px;box-sizing:border-box;text-align:center;direction:ltr;clear:both;">
    <?php goldnow_display_ad('below_cards'); ?>
</div>
	  
    <!-- ✅ Tab Navigation Buttons -->
    <div class="gold-tabs-nav text-center py-4">
      <button class="gold-tab-btn active" type="button" data-tab="now">Precios en vivo</button>
      <button class="gold-tab-btn" type="button" data-tab="buy-sell">Lingotes de oro</button>
      <button class="gold-tab-btn" type="button" data-tab="indicator">Gráfico del precio del oro</button>
    </div>

    <!-- ✅ Tab Content Container -->
    <div class="gold-tabs-content">
      
      <!-- 1. Live Prices Pane -->
      <div id="tab-now" class="gold-tab-pane" style="display:block;">
        <!-- 📊 SEO Heading: Fully programmatically structured in English layout -->
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align: left; direction: ltr;">
          <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
          <img alt="Precios actuales del oro en <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align: middle; margin-right: 5px;">
        <?php
        if ( $gold_view == '24k' ) { echo 'Precio del oro de 24 quilates hoy en ' . esc_html($display_country_name); }
        elseif ( $gold_view == '22k' ) { echo 'Precio del oro de 22 quilates hoy en ' . esc_html($display_country_name); }
        elseif ( $gold_view == '21k' ) { echo 'Precio del oro de 21 quilates por gramo hoy en ' . esc_html($display_country_name); }
        elseif ( $gold_view == '18k' ) { echo 'Precio del oro de 18 quilates hoy en ' . esc_html($display_country_name); }
        elseif ( $gold_view == '14k' ) { echo 'Precio del oro de 14 quilates hoy en ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'ounce' ) { echo 'Precio mundial de la onza de oro hoy (USD)'; }
        elseif ( $gold_view == 'coin' ) { echo 'Precio de la moneda de oro hoy en ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'gold-bars' ) { echo 'Precios de lingotes de oro hoy en ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'gold-index' ) { echo 'Índice del mercado del oro en tiempo real hoy en ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'usd' ) { echo 'Tipos de cambio del dólar estadounidense y otras divisas hoy en ' . esc_html($display_country_name); }
        else { echo 'Precios del oro en ' . esc_html($display_country_name) . ' hoy'; }?>
        </h2>
        
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align: left; direction: ltr;">
          <?php 
          if ($gold_view == 'usd') { echo 'Tipos de cambio en vivo de las principales monedas internacionales y regionales'; }
          elseif ($gold_view == 'ounce') { echo 'Referencia internacional al contado de una onza troy de oro de 24 quilates, cotizada en USD'; }
          else { echo 'Precio del oro en ' . esc_html($display_country_name) . ' —  sin costes de fabricación'; }
          ?>
        </h3>

        <!-- Gold Price Cards Shortcode Section -->
        <section id="gold-cards" class="mb-4">
            <?php echo altaqrer_gold_es_translate_shortcode_html(do_shortcode('[infi_gold_cards currency="' . esc_attr($country_currency) . '" currency_label="' . esc_attr($currency_label) . '"]'), $shortcode_translation_map_es); ?>
        </section>

        <!-- Gold Information Panels Shortcode Section -->
        <section id="gold-info-boxes" class="mb-4">
            <?php echo altaqrer_gold_es_translate_shortcode_html(do_shortcode('[infi_gold_info_boxes currency="' . esc_attr($country_currency) . '"]'), $shortcode_translation_map_es); ?>
        </section>
	  </div>
		
      <!-- 2. Gold Bullion Bars y Coins Table Pane -->
      <div id="tab-buy-sell" class="gold-tab-pane" style="display:none; text-align: left; direction: ltr;">
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align:left !important; direction:ltr !important;">
            <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
            <img alt="Lingotes y monedas de oro en <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; margin-right: 5px;">
            Lingotes y monedas de oro en <?php echo esc_html($display_country_name); ?>
        </h2>
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align:left !important; direction:ltr !important;">
          Precios más recientes de lingotes y monedas de oro (sin cargos de fabricación)
        </h3>

        <?php if (function_exists('infi_get_latest_gold_prices')) { ?>
            <!-- A) Gold Bars Price Table -->
            <section id="sabika-price" class="gold-section mt-4">
                <div class="section-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <h4>Precios de lingotes de oro en <?php echo esc_html($display_country_name); ?></h4>
                    <span class="date-badge" style="background: #262930; padding: 4px 10px; border-radius: 4px; font-size: 13px;"><?php echo esc_html($today); ?></span>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>Peso / Tipo</th>
                                <th>Precio (<?php echo $currency_label; ?>)</th>
                                <th>Precio (USD)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $weights = [
                                ['weight' => 1, 'name' => 'Lingote de oro — 1 g'],
                                ['weight' => 2.5, 'name' => 'Lingote de oro — 2,5 g'],
                                ['weight' => 5, 'name' => 'Lingote de oro — 5 g'],
                                ['weight' => 10, 'name' => 'Lingote de oro — 10 g'],
                                ['weight' => 20, 'name' => 'Lingote de oro — 20 g'],
                                ['weight' => 31.1, 'name' => 'Onza troy (31,1 g)'],
                                ['weight' => 50, 'name' => 'Lingote de oro — 50 g'],
                                ['weight' => 100, 'name' => 'Lingote de oro — 100 g'],
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
                    <h4>Precios de monedas de oro en <?php echo esc_html($display_country_name); ?></h4>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>Pureza de la moneda</th>
                                <th>Precio (<?php echo $currency_label; ?>)</th>
                                <th>Precio (USD)</th>
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
                                    <td class="font-bold">Moneda de oro de 8 g (<?php echo $carat_num; ?> quilates)</td>
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
                <strong>Importante:</strong> The prices shown above for bars y coins represent Los precios indicados arriba para lingotes y monedas representan únicamente el valor del oro; no incluyen gastos de fabricación, tasas de contraste ni impuestos.
            </div>

        <?php } else { ?>
            <p style="text-align:center; padding:20px;">Lo sentimos, los datos del mercado no están disponibles actualmente.</p>
        <?php } ?>
      </div>

      <!-- 3. Gold Price Chart: restored to match el Arabic template structure. -->
      <div id="tab-indicator" class="gold-tab-pane" style="display:none; direction:ltr; text-align:left;">
        <h2 class="col-12 p-0 font-3 mb-3" style="text-align:left; direction:ltr;">
          <span class="start-head cls120" style="background: <?php echo esc_attr(get_theme_mod('infi_default_color', '#ffb301')); ?>;"></span>
          Gráfico del precio del oro en <?php echo esc_html($display_country_name); ?>
        </h2>
        <div class="gold-frame-box mb-4" style="direction:ltr; text-align:left;">
          <?php
          $en_chart_shortcode = '[infi_gold_chart carat="21k" currency="' . esc_attr($country_currency) . '" title="21K Gold Price Movement"]';
          echo altaqrer_gold_es_translate_shortcode_html(do_shortcode($en_chart_shortcode), $shortcode_translation_map_es);
          ?>
        </div>
        <div id="ajax-indicator-frames" class="gold-frame-box" style="direction:ltr; text-align:left;"></div>
        <p style="color:#94a3b8; text-align:left; font-size:13px; margin:10px 4px 18px;">Los gráficos muestran la evolución orientativa del mercado. Los precios locales pueden variar debido a los tipos de cambio, las primas y las condiciones del mercado.</p>
      </div>

    </div>
  </div>
</main>

<script>
// Translate legacy Arabic labels returned by el existing indicator AJAX action.
function altaqrerTranslateEnglishIndicator(root) {
    if (!root) return;
    const translations = {
        'عيار 24': 'Oro de 24 quilates', 'عيار 22': 'Oro de 22 quilates', 'عيار 21': 'Oro de 21 quilates',
        'عيار 18': 'Oro de 18 quilates', 'عيار 14': 'Oro de 14 quilates', 'عيار 12': 'Oro de 12 quilates',
        'الأونصة العالمية': 'Global Gold Ounce (USD)',
        'الأونصة بالعملة المحلية': 'Gold Ounce in Local Currency',
        'جنيه الذهب': 'Moneda de oro', 'سعر الدولار': 'US Dollar Exchange Rate',
        'جنيه مصري': 'Egyptian Pound', 'دولار أمريكي': 'US Dollar',
        'انضم إلى قناتنا على تيليجرام': 'Únete a nuestro canal de Telegram',
        'انضم إلى قناتنا على تليجرام': 'Únete a nuestro canal de Telegram'
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

            // Load el same indicator frames used by el Arabic template once only.
            if (tab === 'indicator' && !targetPane.dataset.framesLoaded) {
                const framesContainer = document.getElementById('ajax-indicator-frames');
                framesContainer.innerHTML = '<p style="text-align:center;padding:18px;color:#cbd5e1;">Cargando los gráficos del oro…</p>';
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
                    framesContainer.innerHTML = '<p style="text-align:center;padding:18px;color:#fca5a5;">No se han podido cargar los datos del gráfico. Inténtalo de nuevo.</p>';
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
        📊 El seguimiento del oro muestra los últimos movimientos de los precios en <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo esc_html($display_country_name); ?> en tiempo real</strong></span>. <img alt="Bandera de <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align:middle; margin: 0 4px;"> Fecha: <strong><?php echo esc_html($today); ?></strong>. Se utilizan datos de los mercados regionales y la cotización internacional del oro para <?php echo esc_html($display_country_name); ?>.
    </p>

    <p style="margin-bottom: 15px;">
        💡 Este informe permite consultar los precios actuales de todas las categorías de oro: incluye el <strong>oro de 21 quilates</strong> —la pureza más negociada— y también el <strong>oro de 22, 18 y 14 quilates</strong>. Además, abarca otros metales preciosos, el mercado de la joyería y los movimientos diarios del mercado.
    </p>

    <p style="margin-bottom: 15px;">
        ✨ Según los datos actuales, el precio aproximado por gramo del <strong>oro de 24 quilates</strong>, sin gastos de fabricación, es de <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($gram_24k_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> (equivalente a <strong><?php echo number_format($gram_24k_price_usd_converted, 2); ?> dólares estadounidenses</strong>). Por su alta pureza, es la referencia principal para los <strong>lingotes de oro</strong>.
    </p>

    <p style="margin-bottom: 15px;">
        📈 El <strong>precio mundial de la onza de oro</strong> (31,1 gramos de oro de 24 quilates) es hoy de <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong>. Es la referencia internacional del mercado al contado; los precios locales se convierten por separado con el tipo de cambio más reciente disponible.
    </p>

    <p style="margin-bottom: 15px;">
        🪙 Para ahorradores e inversores, el precio orientativo actual de una <strong>moneda de oro</strong> de 8 gramos y 21 quilates es de aproximadamente <strong><?php echo number_format($gold_pound_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong>.
    </p>

    <p style="margin-bottom: 20px;">
        🛠️ Para seguir el valor de sus ahorros, puede consultar el <strong>índice del mercado del oro en tiempo real</strong> y los <strong>precios de los lingotes</strong> desde 1 gramo hasta 1 kilogramo, y así observar la evolución del mercado antes de comprar o vender.
    </p>

    <div style="background: #17191d; padding: 12px; border-radius: 6px; border: 1px dashed #3a3f4d; color: #d1d5db; font-size: 14px; margin-top: 15px;">
        💵 <strong>Indicador del tipo de cambio:</strong> Los precios locales del oro también dependen de las divisas. Según los últimos datos disponibles, el tipo de cambio actual del <strong>dólar estadounidense en <?php echo esc_html($display_country_name); ?></strong> es de <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> por dólar. Descargue la <strong>aplicación de precios del oro</strong> para recibir alertas actualizadas.
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

        // Same rate direction y conversion formula used by el Arabic template.
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
            💵 Tipos de cambio en tiempo real frente a <?php echo esc_html($currency_label); ?> en <?php echo esc_html($display_country_name); ?> <img alt="Bandera de <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:
        </strong>
        
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; text-align: left; direction: ltr;">
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'USD') : ?>
                    <div><img alt="Flag of United States" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_es['USD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                    <div><img alt="Flag of United Kingdom" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_es['GBP']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                    <div><img alt="Flag of Saudi Arabia" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_es['SAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>

                <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                    <div><img alt="Flag of Bahrain" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_es['BHD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                    <div><img alt="Flag of Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_es['OMR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                    <div><img alt="Flag of European Union" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_es['EUR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                    <div><img alt="Flag of United Arab Emirates" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_es['AED']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                    <div><img alt="Flag of Kuwait" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_es['KWD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                    <div><img alt="Flag of Qatar" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_es['QAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                    <div><img alt="Flag of Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_es['JPY']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
        </div>
        <p style="margin: 15px 0 0 0; font-size: 12px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 8px; text-align: left; direction: ltr;">* Las actualizaciones se realizan automáticamente mediante índices oficiales del mercado en tiempo real. Recomendamos instalar la <strong>aplicación oficial de precios del oro</strong>.</p>
    </div>
<?php endif; ?>

<div class="altaqrer-silo-links" style="margin: 25px auto; padding: 15px; background: #17191d; border: 1px solid #3a3f4d; border-radius: 6px; text-align: center; max-width: 800px; width: 95%; box-sizing: border-box; clear: both; direction: ltr;">
    <?php
    // Reuse el already-resolved English country URL for every tab link.
    $base_country_url = $es_header_country_url;

    $active_bg = get_theme_mod('infi_default_color', '#ffb301');
    $active_color = '#000000';
    $default_bg = '#262930';
    $default_color = '#ffffff';

    $tabs = [
        ['key' => '',          'es' => 'Precio del oro'],
        ['key' => '24k',       'es' => '24 quilates'],
        ['key' => '22k',       'es' => '22 quilates'],
        ['key' => '21k',       'es' => '21 quilates'],
        ['key' => '18k',       'es' => '18 quilates'],
        ['key' => '14k',       'es' => '14 quilates'],
        ['key' => 'ounce',     'es' => 'Onza de oro'],
        ['key' => 'coin',      'es' => 'Moneda de oro'],
        ['key' => 'gold-bars', 'es' => 'Lingotes de oro'],
        ['key' => 'gold-index','es' => 'Índice del oro'],
        ['key' => 'usd',       'es' => 'USD y tipos de cambio'],
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
            $label = $tab['es'];
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
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">📈 Índice del mercado del oro en vivo en <?php echo esc_html($display_country_name); ?> <img alt="Bandera de <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Oro puro de 24K:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valor: <?php echo number_format($price_24k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Oro de 22K:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valor: <?php echo number_format($price_22k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;">Oro popular de 21K:</strong> <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valor: <?php echo number_format($price_21k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Oro estándar de 18K:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valor: <?php echo number_format($price_18k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Oro de 14K:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valor: <?php echo number_format($price_14k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Onza mundial de oro (31,1 g):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong></span><br><small style="color:#94a3b8;">Precio internacional al contado, en USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Onza de oro en moneda local (31,1 g):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">El mismo precio mundial de referencia de la onza convertido a la moneda local</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Este índice compara las principales purezas del oro en <?php echo esc_html($display_country_name); ?>con la referencia internacional al contado. La onza mundial se cotiza en USD, mientras que la onza en moneda local es ese mismo valor convertido según el tipo de cambio del país. No se incluyen los costes de fabricación ni los márgenes del vendedor.
                </p>


            <?php elseif ($gold_view == 'gold-bars') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 Precios de lingotes de oro hoy en <?php echo esc_html($display_country_name); ?> (oro puro de 24K):</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingote de oro — 1 g:</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_24k_local * 1, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valor: <?php echo number_format($price_24k_usd * 1, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingote de oro — 2,5 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 2.5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valor: <?php echo number_format($price_24k_usd * 2.5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingote de oro — 5 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valor: <?php echo number_format($price_24k_usd * 5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingote de oro — 10 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 10, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valor: <?php echo number_format($price_24k_usd * 10, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingote de oro — 20 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 20, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valor: <?php echo number_format($price_24k_usd * 20, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Onza troy (31,1 gramos):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valor: <?php echo number_format($ounce_price_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingote de oro — 50 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 50, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valor: <?php echo number_format($price_24k_usd * 50, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingote de oro — 100 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 100, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valor: <?php echo number_format($price_24k_usd * 100, 2); ?> USD</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Este indicador permite seguir <strong>los precios actuales de los lingotes de oro</strong> compuestos exclusivamente por oro 24K de pureza 999,9. La acumulación de lingotes sigue siendo una cobertura importante para conservar el patrimonio y proteger la liquidez a largo plazo en <strong><?php echo esc_html($display_country_name); ?></strong> frente a la inflación macroeconómica.
                </p>

            <?php elseif ($gold_view == 'coin') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 Precio de la moneda de oro hoy en <?php echo esc_html($display_country_name); ?> (peso estándar de 8 gramos):</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>Moneda de oro de 21K (8 g):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_21k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Valor: <?php echo number_format($price_21k_usd * 8, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>Moneda de oro de 22K (8 g):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Valor: <?php echo number_format($price_22k_usd * 8, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>Moneda de oro de 24K (8 g):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Valor: <?php echo number_format($price_24k_usd * 8, 2); ?> USD</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Consulta las actualizaciones en vivo del <strong>precio de la moneda de oro hoy</strong> en los mercados de inversión de <strong><?php echo esc_html($display_country_name); ?></strong>. Las monedas de oro de exactamente 8 gramos se siguen como activos físicos refugio.
                </p>

            <?php elseif ($gold_view == 'usd') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">💵 Tipos de cambio en tiempo real frente a <?php echo esc_html($currency_label); ?> en <?php echo esc_html($display_country_name); ?>:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; text-align: left; direction: ltr; margin-bottom: 20px;">
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'USD') : ?>
                            <div><img alt="Flag of US" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_es['USD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                            <div><img alt="Flag of UK" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_es['GBP']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                            <div><img alt="Flag of SA" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_es['SAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                            <div><img alt="Flag of BH" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_es['BHD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                            <div><img alt="Flag of Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_es['OMR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                            <div><img alt="Flag of EU" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_es['EUR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                            <div><img alt="Flag of AE" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_es['AED']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                            <div><img alt="Flag of KW" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_es['KWD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                            <div><img alt="Flag of QA" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_es['QAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                            <div><img alt="Flag of Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_es['JPY']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Este índice dinámico supervisa los tipos de cambio bancarios. Los precios locales de referencia del oro varían directamente con las fluctuaciones cambiarias frente a las reservas mundiales.
                </p>

            <?php elseif ($gold_view == '24k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Informe en vivo: 24K precio del oro por gramo hoy en <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Precio en moneda local:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Equivalente en dólares estadounidenses:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_24k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    El precio actual del <strong>24K oro por gramo hoy</strong> se sitúa en <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Con una pureza del 99,9 %, este quilataje es la referencia industrial para producir lingotes.
                </p>

            <?php elseif ($gold_view == '22k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Informe en vivo: 22K precio del oro por gramo hoy en <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Precio en moneda local:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Equivalente en dólares estadounidenses:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_22k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    El <strong>22K oro por gramo hoy</strong> registra <strong><?php echo number_format($price_22k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Combina un alto contenido de metal precioso con resistencia estructural.
                </p>

            <?php elseif ($gold_view == '21k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Informe en vivo: 21K precio del oro por gramo hoy en <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Precio en moneda local:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Equivalente en dólares estadounidenses:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_21k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    El popular <strong>21K oro por gramo hoy</strong> cotiza a <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Este quilataje representa la mayor parte del comercio local de joyería.
                </p>

            <?php elseif ($gold_view == '18k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Informe en vivo: 18K precio del oro por gramo hoy en <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Precio en moneda local:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Equivalente en dólares estadounidenses:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_18k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Según las actualizaciones del mercado, el <strong>18K oro por gramo hoy</strong> en <strong><?php echo number_format($price_18k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>, y ofrece una opción económica para la joyería de lujo.
                </p>

            <?php elseif ($gold_view == '14k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Informe en vivo: 14K precio del oro por gramo hoy en <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Precio en moneda local:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Equivalente en dólares estadounidenses:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_14k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    El índice calculado sitúa el <strong>14K oro por gramo hoy</strong> en <strong><?php echo number_format($price_14k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>, una aleación resistente para el uso habitual en joyería.
                </p>

            <?php elseif ($gold_view == 'ounce') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Precio mundial de la onza de oro hoy (31,1 g):</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Precio internacional al contado:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($ounce_price_usd, 2); ?></strong></span> USD</li>
                    <li>🔹 <strong>Moneda de cotización:</strong> Dólar estadounidense (USD)</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    La onza mundial de oro se cotiza internacionalmente en dólares estadounidenses y equivale a 31,1 gramos de oro de 24 quilates. Las conversiones a moneda local se excluyen de esta referencia mundial; los precios locales se calculan por separado según el tipo de cambio aplicable.
                </p>
            <?php endif; ?>

        </div>
    </div>
    <?php
}
?>

<?php if (!empty($gold_view)) :
    // The live values below use el same price snapshot y conversions as el tables above.
    $es_seo_base = home_url('/es/country/' . rawurlencode($es_header_country_slug) . '/');
    $es_seo_price_map = array(
        '24k' => array($price_24k_local, $price_24k_usd),
        '22k' => array($price_22k_local, $price_22k_usd),
        '21k' => array($price_21k_local, $price_21k_usd),
        '18k' => array($price_18k_local, $price_18k_usd),
        '14k' => array($price_14k_local, $price_14k_usd)
    );
?>
<article class="es-seo-article" aria-labelledby="es-seo-title">
<?php if (isset($es_seo_price_map[$gold_view])) :
    $en_active_price_local = $es_seo_price_map[$gold_view][0];
    $en_active_price_usd = $es_seo_price_map[$gold_view][1];
    $es_karat = str_replace(['24K','22K','21K','18K','14K'], ['24 quilates','22 quilates','21 quilates','18 quilates','14 quilates'], strtoupper($gold_view));
?>
    <h2 id="es-seo-title">Precio del oro de <?php echo esc_html($es_karat); ?> hoy en <?php echo esc_html($display_country_name); ?> por gramo</h2>
    <p>Consulta el precio actual del oro de <strong><?php echo esc_html($es_karat); ?> en <?php echo esc_html($display_country_name); ?></strong> según la referencia en tiempo real mostrada arriba. El valor indicativo actual es <strong><?php echo number_format($en_active_price_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> por gramo, equivalente a aproximadamente <strong><?php echo number_format($en_active_price_usd, 2); ?> USD</strong>. Estas cifras se calculan con el último precio de referencia disponible del oro de 24K y el factor de pureza de <?php echo esc_html($es_karat); ?> y la conversión de divisas más reciente utilizada por el sitio.</p>
    <h3>¿Qué significa el oro <?php echo esc_html($es_karat); ?>?</h3>
    <p>El quilataje indica la proporción de oro puro en una aleación. El 24K se considera la referencia de oro puro, mientras que los quilates inferiores contienen una mayor proporción de otros metales. El precio del oro de <?php echo esc_html($es_karat); ?> refleja el contenido de oro y no el precio final de venta de una joya. El precio en tienda también puede incluir mano de obra, márgenes del vendedor, impuestos y otros cargos locales que no forman parte del valor bruto mostrado aquí.</p>
    <h3>Cómo leer los precios locales y en USD</h3>
    <p>El importe en moneda local permite comparar el valor de referencia en <?php echo esc_html($display_country_name); ?>; el equivalente en USD facilita comparar el mismo contenido de oro con las cotizaciones internacionales. Los precios locales pueden variar por cambios en la referencia mundial del oro, los tipos de cambio o las condiciones del mercado local. Las cifras son valores orientativos, no una oferta garantizada de compra o venta.</p>
    <h3>Precios del oro relacionados</h3>
    <p>Compara este precio con <a href="<?php echo esc_url($es_seo_base . '24k/'); ?>">oro de 24K</a>, <a href="<?php echo esc_url($es_seo_base . '21k/'); ?>">oro de 21K</a>, <a href="<?php echo esc_url($es_seo_base . 'gold-bars/'); ?>">precios de los lingotes de oro</a>, y el <a href="<?php echo esc_url($es_seo_base . 'gold-index/'); ?>">índice del mercado del oro en tiempo real</a> para obtener una visión más amplia del mercado.</p>
    <h3>Preguntas frecuentes</h3>
    <details><summary>¿El precio mostrado del oro de <?php echo esc_html($es_karat); ?> es el precio final de una joya en una tienda?</summary><p>No. Es un valor orientativo del oro sin elaborar y no incluye mano de obra, márgenes del vendedor, impuestos ni otros cargos aplicables a una pieza terminada.</p></details>
    <details><summary>¿Por qué el equivalente en USD es distinto del precio local?</summary><p>Los dos valores usan monedas distintas. El importe local se convierte con el último tipo de cambio disponible utilizado por el sitio; el importe en USD representa el valor equivalente del oro en dólares estadounidenses.</p></details>
<?php elseif ($gold_view === 'ounce') : ?>
    <h2 id="es-seo-title">Precio mundial de la onza de oro hoy en USD</h2>
    <p>El precio internacional de referencia de la onza de oro en esta página es <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong> por una onza troy de aproximadamente 31,1 gramos de oro de 24K. Este es el <strong>referencia mundial del oro al contado</strong>, cotizada en dólares estadounidenses. No se presenta como un precio local por onza en una moneda nacional; los precios locales por gramo se convierten por separado para el país seleccionado.</p>
    <h3>Por qué importa la onza mundial de oro</h3>
    <p>En los mercados internacionales, el oro suele cotizarse por onza troy. Comerciantes, refinerías, servicios financieros y distribuidores de lingotes utilizan esta referencia para comparar el valor del oro entre mercados. El dólar estadounidense, las expectativas sobre los tipos de interés, las perspectivas de inflación, la actividad de los bancos centrales y la demanda de los inversores pueden influir en el precio internacional. Son factores generales del mercado, no una afirmación de que alguno haya causado el movimiento de hoy.</p>
    <h3>De la onza mundial al precio local por gramo</h3>
    <p>Como referencia sencilla, una onza troy contiene unos 31,1 gramos. El precio local por gramo también depende de la conversión de moneda seleccionada y de las condiciones del mercado local. El valor mundial de la onza se mantiene en USD para compararlo de forma coherente con las cotizaciones internacionales.</p>
    <p>Continúa en <a href="<?php echo esc_url($es_seo_base); ?>">precio del oro en <?php echo esc_html($display_country_name); ?></a>, consulta <a href="<?php echo esc_url($es_seo_base . '24k/'); ?>">oro de 24K por gramo</a>, o abre el <a href="<?php echo esc_url($es_seo_base . 'gold-index/'); ?>">índice del mercado del oro</a>.</p>
    <h3>Preguntas frecuentes</h3>
    <details><summary>¿Cuántos gramos tiene una onza troy de oro?</summary><p>Una onza troy equivale aproximadamente a 31,1035 gramos. Esta página utiliza 31,1 gramos para el cálculo de referencia mostrado.</p></details>
    <details><summary>¿Este precio de la onza está convertido a moneda local?</summary><p>No. Esta página muestra únicamente la referencia internacional de la onza de oro en USD. Los valores en moneda local aparecen por separado en las tablas de precios del país, cuando corresponde.</p></details>
<?php elseif ($gold_view === 'coin') : ?>
    <h2 id="es-seo-title">Precio de la moneda de oro de 8 gramos hoy en <?php echo esc_html($display_country_name); ?></h2>
    <p>Consulta el valor de referencia de una <strong>moneda de oro de 8 gramos</strong> in <?php echo esc_html($display_country_name); ?>. Con los precios actuales por gramo, el valor orientativo de la moneda de 21K es <strong><?php echo number_format($price_21k_local * 8, 2); ?> <?php echo esc_html($currency_label); ?></strong> (aproximadamente <strong><?php echo number_format($price_21k_usd * 8, 2); ?> USD</strong>). La página también compara los valores de 22K y 24K para el mismo peso de 8 gramos, para comparar el efecto de la pureza.</p>
    <h3>Cómo se calcula el valor de la moneda de 8 gramos</h3>
    <p>El cálculo multiplica el valor del oro por gramo correspondiente por 8 gramos. Para la referencia habitual de 21K, la estimación multiplica el precio por gramo de 21K por ocho. Los valores comparativos de 22K y 24K usan sus respectivos precios por gramo con el mismo peso. Así se mantiene el cálculo de 8 gramos establecido por el sitio.</p>
    <p>El precio real de la moneda puede variar por la acuñación, el estado, el diseño, la escasez, los márgenes del vendedor y los impuestos locales. Estos valores representan el contenido de oro y no son una oferta de transacción garantizada. Compara el <a href="<?php echo esc_url($es_seo_base . '21k/'); ?>">oro de precio del oro de 21K por gramo</a>, <a href="<?php echo esc_url($es_seo_base . '22k/'); ?>">22K gold price</a>, y <a href="<?php echo esc_url($es_seo_base . 'gold-bars/'); ?>">precios de los lingotes de oro</a>.</p>
    <h3>Preguntas frecuentes</h3>
    <details><summary>¿Qué peso se utiliza para calcular la moneda de oro?</summary><p>Esta página mantiene el cálculo estándar de 8 gramos del sitio para comparar la moneda de oro.</p></details>
    <details><summary>¿El valor mostrado incluye el margen del vendedor?</summary><p>No. Solo estima el contenido de oro y no incluye acuñación, márgenes del vendedor, mano de obra ni impuestos.</p></details>
<?php elseif ($gold_view === 'gold-bars') : ?>
    <h2 id="es-seo-title">Precio de los lingotes de oro hoy en <?php echo esc_html($display_country_name); ?></h2>
    <p>Los lingotes de oro suelen valorarse según la referencia del oro de 24K. Según el valor actual de referencia de 24K de <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?> per gram</strong> (approximately <strong><?php echo number_format($price_24k_usd, 2); ?> USD</strong>), a 10-gram bar has an indicative gold-content value of <strong><?php echo number_format($price_24k_local * 10, 2); ?> <?php echo esc_html($currency_label); ?></strong>, mientras que un lingote de 100 gramos vale aproximadamente <strong><?php echo number_format($price_24k_local * 100, 2); ?> <?php echo esc_html($currency_label); ?></strong>. La tabla anterior incluye otros pesos para compararlos rápidamente.</p>
    <h3>Cómo comparar los pesos de los lingotes de oro</h3>
    <p>Para obtener una estimación sencilla, multiplica la referencia de 24K por gramo por el peso del lingote. El resultado representa el valor de referencia del oro antes de primas de fabricación, análisis o certificación, margen del vendedor, entrega o impuestos. Por eso, el precio final puede ser superior al cálculo bruto mostrado aquí.</p>
    <p>Antes de comprar, comprueba la pureza indicada, el peso exacto, la certificación, el fabricante y la reputación del vendedor. El <a href="<?php echo esc_url($es_seo_base . '24k/'); ?>">oro de precio del oro de 24K</a> es la referencia clave por gramo, mientras que la <a href="<?php echo esc_url($es_seo_base . 'ounce/'); ?>">onza mundial de oro</a> permite una comparación internacional en USD.</p>
    <h3>Preguntas frecuentes</h3>
    <details><summary>¿Los precios de los lingotes incluyen los gastos de fabricación?</summary><p>No. La tabla estima solo el valor del oro y excluye fabricación, certificación, márgenes del vendedor e impuestos.</p></details>
    <details><summary>¿Por qué dos lingotes del mismo peso pueden tener precios diferentes?</summary><p>La marca, la certificación, los costes de fabricación, los márgenes del vendedor, la disponibilidad y los impuestos locales pueden afectar al precio final.</p></details>
<?php elseif ($gold_view === 'gold-index') : ?>
    <!-- Global XAU/USD chart added specifically to el Gold Index SEO section. -->
    <section class="es-gold-index-chart" aria-labelledby="es-gold-index-chart-title" style="background:#17191d;border:1px solid #323742;border-radius:8px;padding:12px;margin:0 0 22px;direction:ltr;text-align:left;">
        <h3 id="es-gold-index-chart-title" style="color:#f0f1f5;text-align:left;margin:5px 5px 12px;font-size:20px;">Gráficos del precio del oro</h3>
        <div style="position:relative;width:100%;height:520px;overflow:hidden;border-radius:6px;">
            <iframe
                id="tradingview_gold_index"
                title="Global Gráficos del precio del oro — XAU/USD"
                src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_gold_index&symbol=OANDA%3AXAUUSD&interval=D&hidesidetoolbar=0&symboledit=0&saveimage=0&toolbarbg=%2317191d&studies=%5B%5D&theme=dark&style=1&timezone=Etc%2FUTC&withdateranges=1&hideideas=1&locale=es"
                style="width:100%;height:100%;border:0;"
                allowtransparency="true"
                scrolling="no"
                loading="lazy"
                allowfullscreen>
            </iframe>
        </div>
        <p style="color:#94a3b8;text-align:left;font-size:13px;margin:10px 4px 2px;">Sigue el precio internacional del oro al contado en dólares estadounidenses (USD) mediante el gráfico mundial XAU/USD. Es una referencia global, no un precio minorista específico de un país.</p>
    </section>
    <h2 id="es-seo-title">Índice del mercado del oro en vivo y precios por quilate en <?php echo esc_html($display_country_name); ?></h2>
    <p>Este resumen del mercado del oro reúne los últimos valores de referencia disponibles para distintas purezas. La referencia actual de 24K es <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> por gramo, mientras que 22K equivale aproximadamente a <strong><?php echo number_format($price_22k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> y 21K equivale aproximadamente a <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. La onza troy mundial es de <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong> y su equivalente en moneda local es <strong><?php echo number_format($ounce_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong>.</p>
    <h3>Qué permite comparar el índice del oro</h3>
    <p>El índice ofrece una instantánea práctica de los valores del oro en purezas y monedas habituales. Permite comparar la referencia de lingotes de 24K con valores de quilatajes inferiores usados en joyería. Los valores locales se calculan con el precio de referencia del oro y los tipos de cambio disponibles; los importes en USD permiten compararlos con el mercado internacional.</p>
    <p>Los precios del oro pueden reaccionar a la actividad del mercado al contado mundial, los movimientos de divisas, las expectativas de tipos de interés, la inflación y los cambios en la demanda de inversión. Una sola observación no establece una tendencia; conviene comparar las actualizaciones a lo largo del tiempo. Visita la <a href="<?php echo esc_url($es_seo_base . '21k/'); ?>">página del precio de 21K</a>, <a href="<?php echo esc_url($es_seo_base . '24k/'); ?>">página del precio de 24K</a>, y <a href="<?php echo esc_url($es_seo_base . 'ounce/'); ?>">página de la onza mundial</a>.</p>
    <h3>Preguntas frecuentes</h3>
    <details><summary>¿El índice muestra un precio de mercado garantizado?</summary><p>No. Es una referencia informativa basada en los últimos datos disponibles del sitio. Los precios reales de transacción pueden incluir primas y cargos locales.</p></details>
    <details><summary>¿Por qué tienen precios distintos los diferentes quilatajes?</summary><p>Cada quilataje contiene una proporción distinta de oro puro. Las aleaciones de menor pureza tienen un valor de oro bruto por gramo inferior al 24K, antes de considerar otros costes.</p></details>
<?php elseif ($gold_view === 'usd') : ?>
    <h2 id="es-seo-title">Tipo de cambio USD y conversión de divisas en <?php echo esc_html($display_country_name); ?></h2>
    <p>La última referencia disponible utilizada por esta página valora un dólar estadounidense en aproximadamente <strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Los tipos de cambio son importantes para los compradores de oro porque los precios internacionales suelen cotizarse en USD. Si la moneda local cambia frente al dólar, el valor local convertido del oro puede variar aunque el precio internacional en USD permanezca estable.</p>
    <h3>Cómo afectan los movimientos de divisas a los precios locales del oro</h3>
    <p>Una estimación local del precio del oro combina una referencia internacional con la conversión de moneda y, en el comercio minorista, los posibles márgenes, impuestos o costes locales. Esta página muestra algunas comparaciones de divisas para explicar la conversión. Los tipos son informativos y pueden diferir de los ofrecidos por bancos, efectivo, tarjetas o remesas.</p>
    <p>Para comparar el oro, consulta <a href="<?php echo esc_url($es_seo_base . '24k/'); ?>">precio del oro de 24K por gramo</a>, el <a href="<?php echo esc_url($es_seo_base . '21k/'); ?>">precio del oro de 21K por gramo</a>, y el <a href="<?php echo esc_url($es_seo_base . 'ounce/'); ?>">precio internacional de la onza de oro en USD</a>.</p>
    <h3>Preguntas frecuentes</h3>
    <details><summary>¿Es este el tipo de cambio que ofrece cada banco?</summary><p>No. Es la última referencia disponible utilizada por el sitio. Los bancos y proveedores de cambio pueden aplicar distintos tipos de compra y venta, diferenciales o comisiones.</p></details>
    <details><summary>¿Por qué importa el tipo de cambio del dólar para el oro?</summary><p>Como el oro suele cotizarse internacionalmente en dólares estadounidenses, convertir esa referencia a moneda local es uno de los factores para estimar los precios locales del oro.</p></details>
<?php endif; ?>
    <p class="en-seo-update-note" style="margin:20px 0 0;padding-top:12px;border-top:1px solid #3a3f4d;color:#9ca3af;font-size:12px;">Fecha de referencia: <?php echo esc_html($today); ?>. Los precios son orientativos y reflejan los últimos datos disponibles para esta página; pueden cambiar al actualizarse los datos del mercado y los tipos de cambio.</p>
</article>
<?php endif; ?>

<?php if (!$es_header_is_app) : ?>
<footer class="es-site-footer">
  <div class="es-site-footer-inner">
    <section>
      <h3>Acerca de AlTaqrer Gold</h3>
      <p><strong>AlTaqrer Gold</strong> ayuda a los lectores a seguir los precios del oro en los mercados regionales e internacionales. Consulte los precios de referencia actualizados del oro de 24, 22, 21, 18 y 14 quilates, compare los valores de los lingotes y las monedas de oro de 8 gramos, y siga la cotización mundial de la onza de oro en USD. Los precios se ofrecen con fines informativos y comparativos; el precio final de venta al público puede incluir costes de fabricación, primas e impuestos.</p>
    </section>
    <section>
      <h3>Secciones de precios del oro</h3>
      <ul>
        <li><a href="<?php echo esc_url($es_header_country_url); ?>">Gold Prices in <?php echo esc_html(isset($display_country_name) ? $display_country_name : ''); ?></a></li>
        <li><a href="<?php echo esc_url($es_header_country_url . 'gold-bars/'); ?>">Lingotes y monedas de oro</a></li>
        <li><a href="<?php echo esc_url($es_header_country_url . 'gold-index/'); ?>">Índice del oro en vivo</a></li>
        <li><a href="<?php echo esc_url($es_header_country_url . 'usd/'); ?>">USD y tipos de cambio</a></li>
      </ul>
    </section>
    <section>
      <h3>Precios regionales del oro</h3>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/es/country/eg/')); ?>">Gold Prices in Egypt</a></li>
        <li><a href="<?php echo esc_url(home_url('/es/country/sa/')); ?>">Gold Prices in Saudi Arabia</a></li>
        <li><a href="<?php echo esc_url(home_url('/es/country/ae/')); ?>">Gold Prices in el UAE</a></li>
        <li><a href="<?php echo esc_url(home_url('/es/country/kw/')); ?>">Gold Prices in Kuwait</a></li>
      </ul>
      <h3 style="margin-top:16px;">Síguenos</h3>
      <ul>
        <li><a href="https://t.me/goldaltaqrer" target="_blank" rel="noopener noreferrer">Únete a nuestro canal de Telegram</a></li>
      </ul>
    </section>
    <?php
    // Show only real published English pages; never leave dead /es/# placeholder links.
    $en_footer_pages = array();
    foreach (array(
        'privacy-policy' => 'Política de privacidad',
        'terms-of-use'   => 'Términos de uso',
        'contact-us'     => 'Contáctanos'
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
      <h3>Enlaces importantes</h3>
      <ul>
        <?php foreach ($en_footer_pages as $footer_page) : ?>
          <li><a href="<?php echo esc_url($footer_page['url']); ?>"><?php echo esc_html($footer_page['label']); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </section>
    <?php endif; ?>
  </div>
  <div class="es-footer-bottom">All rights reserved &copy; <?php echo esc_html(function_exists('wp_date') ? wp_date('Y') : date('Y')); ?> to <a href="<?php echo esc_url($es_header_home_url); ?>">AlTaqrer Gold</a>.</div>
</footer>
<?php endif; ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
  var toggle = document.querySelector('.es-country-toggle');
  var menu = document.getElementById('es-country-menu');
  if (!toggle || !menu) return;
  toggle.addEventListener('click', function (event) {
    event.preventDefault();
    var opened = menu.classList.toggle('is-open');
    toggle.setAttribute('aria-expanded', opened ? 'true' : 'false');
  });
  document.addEventListener('click', function (event) {
    if (!event.target.closest('.es-country-wrap')) {
      menu.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
    }
  });
});
</script>
<?php wp_footer(); ?>
</body>
</html>
