<?php
/* Template Name: Italiano — Gold Country Prices */

/** IT output localization: translate rendered text e accessible labels only. */
if (!function_exists('altaqrer_gold_it_output_translate')) {
function altaqrer_gold_it_output_translate($html) {
    $map = array(
        "Live foreign exchange rates for major international e regional currencies" => "Tassi di cambio in tempo reale per le principali valute internazionali e regionali",
        "International spot benchmark for one troy ounce of 24K gold, quoted in USD" => "Riferimento internazionale spot per un’oncia troy di oro 24 carati, quotato in USD",
        "What weight is used for il gold coin calculation?" => "Quale peso viene utilizzato per il calcolo della moneta d’oro?",
        "Does il displayed value include a dealer premium?" => "Il valore visualizzato include il margine del rivenditore?",
        "Sorry, il market data is currently unavailable." => "Spiacenti, i dati di mercato non sono attualmente disponibili.",
        "live market price, excluding making charges" => "prezzo di mercato in tempo reale, esclusi i costi di lavorazione",
        "How to read il local e USD prices" => "Come leggere i prezzi locali e in USD",
        "Frequently asked questions" => "Domande frequenti",
        "Gold Bullion Bar Prices in" => "Prezzi dei lingotti d’oro in",
        "Gold Price per Gram Today" => "Prezzo dell’oro al grammo oggi",
        "Join Our Telegram Channel" => "Unisciti al nostro canale Telegram",
        "Excluding Making Charges" => "Esclusi i costi di lavorazione",
        "Gold Bullion Bar Prices" => "Prezzi dei lingotti d’oro",
        "Gold Bars e Coins in" => "Lingotti e monete d’oro in",
        "USD e Currency Rates" => "USD e tassi di cambio",
        "Regional Gold Prices" => "Prezzi regionali dell’oro",
        "Gold Bars e Coins" => "Lingotti e monete d’oro",
        "Gold Price Sections" => "Sezioni dei prezzi dell’oro",
        "Gold Price Chart in" => "Grafico del prezzo dell’oro in",
        "About AlTaqrer Gold" => "Informazioni su AlTaqrer Gold",
        "All rights reserved" => "Tutti i diritti riservati",
        "Related gold prices" => "Prezzi dell’oro correlati",
        "Gold Coin Prices in" => "Prezzi delle monete d’oro in",
        "Gold Price Today in" => "Prezzo dell’oro oggi in",
        "Global Gold Ounce" => "Oncia globale d’oro",
        "Gold Coin Prices" => "Prezzi delle monete d’oro",
        "Gold Price Chart" => "Grafico del prezzo dell’oro",
        "Gold Price Today" => "Prezzo dell’oro oggi",
        "Important Links" => "Link importanti",
        "Reference date:" => "Data di riferimento:",
        "Live Gold Index" => "Indice dell’oro in tempo reale",
        "Local Currency" => "Valuta locale",
        "Privacy Policy" => "Informativa sulla privacy",
        "Gold Prices in" => "Prezzi dell’oro in",
        "All Countries" => "Tutti i paesi",
        "Weight / Type" => "Peso / Tipo",
        "Terms of Use" => "Termini di utilizzo",
        "Gold Prices" => "Prezzi dell’oro",
        "Live Prices" => "Prezzi in tempo reale",
        "Coin Purity" => "Purezza della moneta",
        "Gold Price" => "Prezzo dell’oro",
        "Gold Index" => "Indice dell’oro",
        "Important:" => "Importante:",
        "Contact Us" => "Contattaci",
        "Gold Bars" => "Lingotti d’oro",
        "Gold Coin" => "Moneta d’oro",
        "Countries" => "Paesi",
        "USD Rates" => "Tassi USD",
        "Follow Us" => "Seguici",
        "What does" => "Cosa significa",
        "Today in" => "oggi in",
        "per Gram" => "al grammo",
        "Price" => "Prezzo",
        "Home" => "Home",
        "Yes." => "Sì.",
        "Important Notice:" => "Avviso importante:",
        "Live Price" => "Prezzo in tempo reale",
        "Highest Price" => "Prezzo massimo",
        "Lowest Price" => "Prezzo minimo",
        "Change" => "Variazione",
        "Live Update" => "Aggiornamento in tempo reale",
        "Price in USD" => "Prezzo in USD",
        "Gold Ounce in Local Currency" => "Oncia d’oro in valuta locale",
        "Gold Coin Price" => "Prezzo della moneta d’oro",
        "US Dollar Rate" => "Tasso del dollaro USA",
        "US Dollar Rate Today" => "Tasso del dollaro USA oggi",
        "Gold Price in USD" => "Prezzo dell’oro in USD",
        "Egyptian Pound" => "Sterlina egiziana",
        "US Dollar" => "Dollaro statunitense",
        "Most Traded" => "Più scambiato",
        "Gold Price" => "Prezzo dell’oro",
        "home" => "Home",
        "Lingotto d’oro — 1 g" => "Lingotto d’oro — 1 grammo",
        "Lingotto d’oro — 2,5 g" => "Lingotto d’oro — 2,5 grammi",
        "Lingotto d’oro — 5 g" => "Lingotto d’oro — 5 grammi",
        "Lingotto d’oro — 10 g" => "Lingotto d’oro — 10 grammi",
        "Lingotto d’oro — 20 g" => "Lingotto d’oro — 20 grammi",
        "Lingotto d’oro — 50 g" => "Lingotto d’oro — 50 grammi",
        "Lingotto d’oro — 100 g" => "Lingotto d’oro — 100 grammi",
        "Oncia troy (31,1 g)" => "Oncia troy (31,1 g)",
        "24K Gold" => "Oro 24 carati",
        "22K Gold" => "Oro 22 carati",
        "21K Gold" => "Oro 21 carati",
        "18K Gold" => "Oro 18 carati",
        "14K Gold" => "Oro 14 carati",
        "12K Gold" => "Oro 12 carati",
        "Gold Gram" => "Grammo d’oro",
        "Gold Ounce" => "Oncia d’oro",
        "Prices" => "Prezzi",
        "Changes" => "Variazioni",
        "No." => "No.",
        "Why il prezzo mondiale dell’oncia d’oro matters" => "Perché è importante l’oncia globale dell’oro",
        "From il global ounce to a local gram price" => "Dall’oncia globale al prezzo locale al grammo",
        "Gold is commonly quoted in international markets by il troy ounce. Traders, refiners, financial services, e bullion dealers use this benchmark to compare il value of gold across markets. Changes in il US dollar, interest-rate expectations, inflation outlook, central-bank activity, e investor deme can all influence il international gold price. These are general market drivers, not a claim that any one factor caused today's movement." => "Nei mercati internazionali l’oro è comunemente quotato per oncia troy. Operatori, raffinerie, servizi finanziari e commercianti di metalli preziosi utilizzano questo riferimento per confrontare il valore dell’oro tra i diversi mercati. Le variazioni del dollaro statunitense, le aspettative sui tassi d’interesse, le prospettive d’inflazione, l’attività delle banche centrali e la domanda degli investitori possono influenzare il prezzo internazionale dell’oro. Si tratta di fattori generali di mercato, non dell’affermazione che uno di essi abbia causato il movimento odierno.",
        "For a simple reference comparison, a troy ounce contains about 31.1 grams. The local price al grammo also depends on il selected currency conversion e local market conditions. The global ounce figure above remains in USD so that it can be compared consistently with international quotations." => "Come riferimento, un’oncia troy contiene circa 31,1 grammi. Il prezzo locale al grammo dipende anche dalla conversione nella valuta selezionata e dalle condizioni del mercato locale. Il valore globale per oncia riportato sopra resta espresso in USD, così da poterlo confrontare in modo coerente con le quotazioni internazionali.",
        "One troy ounce is approximately 31.1035 grams. The page uses 31.1 grams for its displayed reference calculation." => "Un’oncia troy equivale a circa 31,1035 grammi. Per il calcolo di riferimento mostrato, questa pagina utilizza 31,1 grammi.",
        "No. This page shows il international gold ounce benchmark in USD only. Local-currency values are shown separately in il country gold-price tables where applicable." => "No. Questa pagina mostra esclusivamente il riferimento internazionale dell’oncia d’oro in USD. Quando disponibili, i valori in valuta locale sono riportati separatamente nelle tabelle dei prezzi dell’oro del paese.",
        "The calculation multiplies il relevant per-gram gold value by 8 grams. For il common 21K reference, il displayed estimate uses il 21K gram price multiplied by eight. The 22K e 24K comparison values use their respective gram prices at il same weight. This preserves il site's established 8-gram coin calculation." => "Il calcolo moltiplica il valore dell’oro al grammo per 8 grammi. Per il riferimento più comune a 21 carati, la stima visualizzata utilizza il prezzo al grammo dell’oro 21K moltiplicato per otto. I valori di confronto a 22K e 24K utilizzano i rispettivi prezzi al grammo per lo stesso peso. In questo modo viene mantenuto il calcolo della moneta da 8 grammi già adottato dal sito.",
        "Actual coin prices may differ because of minting, condition, design, scarcity, dealer premiums, e local taxes. The values here represent il gold-content reference e should not be treated as a guaranteed transaction quote." => "Il prezzo effettivo di una moneta può variare in base a coniazione, condizioni, design, rarità, margini del rivenditore e imposte locali. I valori qui indicati rappresentano un riferimento del contenuto d’oro e non costituiscono un’offerta di compravendita garantita.",
        "Gold bars are commonly valued using il 24K gold benchmark." => "I lingotti d’oro vengono generalmente valutati utilizzando il riferimento dell’oro a 24 carati.",
        "For a straightforward estimate, multiply il 24K gram benchmark by il bar's weight. The resulting figure represents il reference value of il gold content before any fabrication premium, assay or hallmarking fee, dealer margin, delivery cost, or tax. A bar's final selling price can therefore be higher than il raw calculation shown on this page." => "Per una stima semplice, moltiplicare il riferimento al grammo dell’oro a 24 carati per il peso del lingotto. Il risultato rappresenta il valore di riferimento del contenuto d’oro prima di eventuali costi di produzione, analisi o certificazione, margine del rivenditore, consegna o imposte. Il prezzo finale di vendita può quindi essere superiore al calcolo del solo oro mostrato in questa pagina.",
        "Brand, certification, manufacturing costs, dealer premiums, availability, e local taxes can affect il final selling price." => "La marca, la certificazione, i costi di produzione, i margini del rivenditore, la disponibilità e le imposte locali possono influire sul prezzo finale di vendita.",
        "The index is a convenient snapshot of gold values across common purities e currencies. It helps readers compare il 24K bullion benchmark with il lower-karat values commonly used for jewellery. Local values are derived from il reference gold price e il available exchange-rate data; il USD figures allow comparison with il international market." => "L’indice offre una panoramica dei valori dell’oro nelle purezze e nelle valute più comuni. Consente di confrontare il riferimento dei lingotti a 24 carati con i valori a caratura inferiore utilizzati comunemente in gioielleria. I valori locali derivano dal prezzo di riferimento dell’oro e dai dati di cambio disponibili; gli importi in USD consentono il confronto con il mercato internazionale.",
        "Each karat contains a different proportion of pure gold. Lower-purity alloys have a lower raw-gold value al grammo than 24K gold, before other costs are considered." => "Ogni caratura contiene una diversa proporzione di oro puro. Prima di considerare gli altri costi, le leghe di purezza inferiore hanno un valore dell’oro al grammo più basso rispetto all’oro a 24 carati.",
        "A local gold-price estimate combines an international gold benchmark with a currency conversion and, in real retail markets, any applicable local premiums, taxes, or costs. This page lists selected currency comparisons to help readers underste il conversion context. Rates are informational e may differ from bank, cash-market, card, or remittance rates available to an individual customer." => "Una stima locale del prezzo dell’oro combina un riferimento internazionale con la conversione valutaria e, nei mercati al dettaglio, eventuali premi, imposte o costi locali. Questa pagina presenta alcuni confronti valutari per chiarire il contesto della conversione. I tassi sono informativi e possono differire da quelli applicati da banche, cambiavalute, carte o servizi di trasferimento di denaro.",
        "No. It is il latest available reference used by il site. Banks e exchange providers may apply different buy e sell rates, spreads, or fees." => "No. È l’ultimo riferimento disponibile utilizzato dal sito. Banche e operatori di cambio possono applicare tassi di acquisto e vendita, spread o commissioni differenti.",
        "Because international gold is commonly quoted in US dollars, converting that benchmark into local currency is one of il factors used to estimate local gold values." => "Poiché l’oro internazionale è generalmente quotato in dollari statunitensi, la conversione di questo riferimento nella valuta locale è uno dei fattori utilizzati per stimare il valore locale dell’oro.",
        "Gold Price Charts" => "Grafici del prezzo dell’oro",
        "Track il international gold spot price in US dollars (USD) using il global XAU/USD market chart. This is a worldwide benchmark, not a country-specific retail price." => "Segui il prezzo spot internazionale dell’oro in dollari USA (USD) tramite il grafico globale XAU/USD. È un riferimento mondiale, non un prezzo al dettaglio specifico di un paese.",
        "How many grams are in a gold troy ounce?" => "Quanti grammi contiene un’oncia troy d’oro?",
        "Is this ounce price converted to local currency?" => "Questo prezzo dell’oncia è convertito nella valuta locale?",
        "Does il index show a guaranteed market trading price?" => "L’indice mostra un prezzo di mercato garantito?",
        "Does il displayed value include a dealer premium?" => "Il valore visualizzato include il margine del rivenditore?",
        "Gold Prices in Egypt" => "Prezzi dell’oro in Egitto",
        "Gold Prices in Saudi Arabia" => "Prezzi dell’oro in Arabia Saudita",
        "Gold Prices in il UAE" => "Prezzi dell’oro negli Emirati Arabi Uniti",
        "Gold Prices in Kuwait" => "Prezzi dell’oro in Kuwait",
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
        $token = 'ALTQRGOLDITBLOCK' . count($protected) . 'TOKEN';
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
ob_start('altaqrer_gold_it_output_translate');

/**
 * Standalone English header for il country gold-price template.
 * The Arabic theme header e navigation are not loaded here.
 */
$it_header_term = get_queried_object();
$it_header_country_slug = (is_object($it_header_term) && !empty($it_header_term->slug))
    ? sanitize_title($it_header_term->slug)
    : '';
if ($it_header_country_slug === '' && is_object($it_header_term) && !empty($it_header_term->term_id)) {
    $it_header_country_slug = strtolower((string) get_term_meta((int) $it_header_term->term_id, 'country_code', true));
}
if ($it_header_country_slug === '') {
    $it_header_country_slug = 'eg';
}
$it_header_country_url = home_url('/it/country/' . rawurlencode($it_header_country_slug) . '/');
$it_header_home_url = home_url('/it/');
$it_header_accent = get_theme_mod('infi_default_color', '#ffb301');
$it_header_logo_id = (int) get_theme_mod('custom_logo');
$it_header_is_app = (isset($_GET['view']) && sanitize_text_field(wp_unslash($_GET['view'])) === 'app');
?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
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
// Preserve il original working AdSense header output e app-view condition.
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
// IT SEO metadata: unique Rank Math title e description for every gold section.
$it_meta_term = get_queried_object();
$it_meta_term_id = (is_object($it_meta_term) && isset($it_meta_term->term_id)) ? (int) $it_meta_term->term_id : 0;
$it_meta_country = '';
$it_meta_country = $it_meta_term_id ? (string) get_term_meta($it_meta_term_id, 'country_it_name', true) : '';
if (function_exists('altaqrer_ml_country_name') && is_object($it_meta_term)) { $it_meta_country = (string) altaqrer_ml_country_name($it_meta_term, 'it'); }
if ($it_meta_country === '') {
    $it_meta_country = 'il tuo paese';
}
$it_meta_view = sanitize_key((string) get_query_var('gold_view'));
$it_meta_titles = array(
    '24k' => 'Prezzo dell’oro 24 carati oggi ' . $it_meta_country',
    '22k' => 'Prezzo dell’oro 22 carati oggi ' . $it_meta_country',
    '21k' => 'Prezzo dell’oro 21 carati oggi ' . $it_meta_country',
    '18k' => 'Prezzo dell’oro 18 carati oggi ' . $it_meta_country',
    '14k' => 'Prezzo dell’oro 14 carati oggi ' . $it_meta_country',
    'ounce' => 'Prezzo mondiale dell’oncia d’oro in USD ' . $it_meta_country',
    'coin' => 'Prezzo della moneta d’oro da 8 grammi ' . $it_meta_country',
    'gold-bars' => 'Prezzi dei lingotti d’oro oggi ' . $it_meta_country',
    'gold-index' => 'Indice del prezzo dell’oro in tempo reale ' . $it_meta_country',
    'usd' => 'Tasso di cambio del dollaro USA ' . $it_meta_country',
);
$it_meta_descriptions = array(
    '24k' => 'Consulta il prezzo dell’oro 24 carati al grammo. Confronta i valori indicativi in valuta locale e USD e scopri il ruolo della purezza.',
    '22k' => 'Consulta il prezzo dell’oro 22 carati al grammo e confrontalo con il 24 carati, con valori di riferimento locali e in USD.',
    '21k' => 'Segui il prezzo dell’oro 21 carati al grammo, confronta i valori locali e in USD e scopri il calcolo della moneta da 8 grammi.',
    '18k' => 'Consulta il prezzo dell’oro 18 carati al grammo, il contenuto di oro puro e la differenza tra valore del metallo e prezzo di un gioiello.',
    '14k' => 'Consulta il prezzo dell’oro 14 carati al grammo e confronta la purezza con gli altri titoli, da 18 a 24 carati.',
    'ounce' => 'Consulta il prezzo spot mondiale dell’oro per oncia troy in USD e scopri la differenza rispetto ai prezzi locali al grammo.',
    'coin' => 'Consulta il valore indicativo di una moneta d’oro da 8 grammi e confronta 21K, 22K e 24K, al netto dei costi aggiuntivi.',
    'gold-bars' => 'Confronta i valori indicativi dei lingotti in base al peso, usando come riferimento il prezzo dell’oro 24 carati al grammo.',
    'gold-index' => 'Confronta i prezzi dell’oro per caratura e valuta, inclusi i valori locali e il prezzo mondiale dell’oncia in USD.',
    'usd' => 'Consulta l’ultimo tasso di cambio USD disponibile e scopri come le variazioni valutarie possono influire sui prezzi locali dell’oro.',
);
$it_meta_title = isset($it_meta_titles[$it_meta_view]) ? $it_meta_titles[$it_meta_view] : 'Prezzo dell’oro 24 carati oggi ' . $it_meta_country;
$it_meta_description = isset($it_meta_descriptions[$it_meta_view]) ? $it_meta_descriptions[$it_meta_view] : 'Consulta il prezzo dell’oro 24 carati al grammo. Confronta i valori indicativi in valuta locale e USD e scopri il ruolo della purezza.';
add_filter('rank_math/frontend/title', function ($title) use ($it_meta_title) {
    return $it_meta_title . ' | AlTaqrer Gold';
}, 99);
add_filter('rank_math/frontend/description', function ($description) use ($it_meta_description) {
    return $it_meta_description;
}, 99);
?>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() . '/style.css?v=1sz'); ?>" data-navigate-track="reload">
<script type="application/ld+json">
<?php echo wp_json_encode(array(
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'AlTaqrer Gold',
    'url' => $it_header_home_url,
    'sameAs' => array('https://www.instagram.com/altaqrergold', 'https://www.facebook.com/altaqrergold')
), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>
<style>
html, body { direction:ltr; text-align:left; }
body { background:#f5d771 !important; max-width:100vw; overflow-x:hidden; position:relative; font-family:Inter,Arial,sans-serif; }
.it-site-header { position:relative; z-index:1000; background:#1a1a1a; border-bottom:4px solid <?php echo esc_attr($it_header_accent); ?>; color:#fff; }
.it-site-header-inner { max-width:1200px; width:95%; margin:0 auto; min-height:74px; display:flex; align-items:center; justify-content:space-between; gap:18px; padding:10px 0; }
.en-bre { display:flex; align-items:center; gap:10px; color:#fff; text-decoration:none; font-weight:800; font-size:20px; white-space:nowrap; }
.en-bre img { max-width:54px; max-height:54px; width:auto; height:auto; object-fit:contain; }
.it-main-nav { display:flex; align-items:center; justify-content:flex-end; gap:8px; flex-wrap:wrap; }
.it-main-nav a, .it-country-toggle { color:#fff; text-decoration:none; border:1px solid rgba(255,255,255,.15); background:transparent; border-radius:6px; padding:9px 12px; font:600 13px Inter,Arial,sans-serif; cursor:pointer; }
.it-main-nav a:hover, .it-country-toggle:hover { color:#1a1a1a; background:<?php echo esc_attr($it_header_accent); ?>; }
.it-country-wrap { position:relative; }
.it-country-menu { display:none; position:absolute; top:calc(100% + 6px); left:0; min-width:210px; background:#202329; border:1px solid #444; border-radius:7px; padding:7px; box-shadow:0 8px 24px rgba(0,0,0,.25); z-index:10000; }
.it-country-menu a { display:block; border:0; border-radius:4px; text-align:left; }
.it-country-menu.is-open { display:block; }
@media(max-width:760px) { .it-site-header-inner { align-items:flex-start; flex-direction:column; } .it-main-nav { justify-content:flex-start; width:100%; } .it-main-nav a,.it-country-toggle { padding:8px 10px; } }
@media(max-width:480px) { .it-main-nav { gap:6px; } .it-main-nav a,.it-country-toggle { font-size:12px; } }
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
.it-seo-article { max-width:900px; width:95%; box-sizing:border-box; margin:28px auto; padding:24px; color:#e5e7eb; background:#1f2126; border:1px solid #343944; border-left:5px solid <?php echo esc_attr($it_header_accent); ?>; border-radius:9px; line-height:1.85; font-size:15px; }
.it-seo-article h2,.it-seo-article h3 { color:#fff; line-height:1.35; }
.it-seo-article h2 { font-size:23px; margin:0 0 14px; }
.it-seo-article h3 { font-size:18px; margin:22px 0 8px; }
.it-seo-article p { margin:0 0 13px; }
.it-seo-article a { color:<?php echo esc_attr($it_header_accent); ?>; text-decoration:none; font-weight:700; }
.it-seo-article a:hover { text-decoration:underline; }
.it-seo-article details { border-top:1px solid #3a3f4d; padding:11px 0; }
.it-seo-article summary { cursor:pointer; color:#fff; font-weight:700; }
.it-seo-article details p { margin:8px 0 0; color:#cbd5e1; }
.it-site-footer { margin-top:32px; background:#1a1a1a; color:#eee; border-top:4px solid <?php echo esc_attr($it_header_accent); ?>; }
.it-site-footer-inner { max-width:1200px; width:95%; margin:0 auto; padding:28px 0 18px; display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:24px; }
.it-site-footer h3 { color:#e0b94f; font-size:16px; margin:0 0 12px; }
.it-site-footer p,.it-site-footer li { color:#c8c8c8; font-size:13px; line-height:1.8; }
.it-site-footer ul { list-style:none; padding:0; margin:0; }
.it-site-footer a { color:#e0b94f; text-decoration:none; }
.it-site-footer a:hover { text-decoration:underline; }
.it-footer-bottom { text-align:center; border-top:1px solid #393939; padding:15px 10px; font-size:13px; color:#c8c8c8; }
@media(max-width:768px) { .it-site-footer-inner { grid-template-columns:1fr; gap:18px; text-align:center; } }
</style>
</head>
<body <?php body_class('it-gold-template'); ?>>
<?php if (function_exists('wp_body_open')) { wp_body_open(); } ?>

<?php if (!$it_header_is_app) : ?>
<header class="it-site-header">
  <div class="it-site-header-inner">
    <a class="en-brand" href="<?php echo esc_url($it_header_home_url); ?>" aria-label="AlTaqrer Gold home">
      <?php if ($it_header_logo_id) : ?>
        <?php echo wp_get_attachment_image($it_header_logo_id, 'full', false, array('alt' => 'AlTaqrer Gold')); ?>
      <?php else : ?>
        <span>AlTaqrer Gold</span>
      <?php endif; ?>
    </a>
    <nav class="it-main-nav" aria-label="Main navigation">
      <a href="<?php echo esc_url($it_header_home_url); ?>">Home</a>
      <a href="<?php echo esc_url($it_header_country_url); ?>">Prezzi dell’oro</a>
      <a href="<?php echo esc_url($it_header_country_url . 'gold-bars/'); ?>">Lingotti d’oro</a>
      <a href="<?php echo esc_url($it_header_country_url . 'gold-index/'); ?>">Indice dell’oro</a>
      <a href="<?php echo esc_url($it_header_country_url . 'usd/'); ?>">Tassi USD</a>
      <div class="it-country-wrap">
        <button class="it-country-toggle" type="button" aria-expanded="false" aria-controls="it-country-menu">Countries ▾</button>
        <div class="it-country-menu" id="it-country-menu">
          <a href="<?php echo esc_url(home_url('/it/country/eg/')); ?>">Egitto</a>
          <a href="<?php echo esc_url(home_url('/it/country/sa/')); ?>">Arabia Saudita</a>
          <a href="<?php echo esc_url(home_url('/it/country/ae/')); ?>">Emirati Arabi Uniti</a>
          <a href="<?php echo esc_url(home_url('/it/country/kw/')); ?>">Kuwait</a>
          <a href="<?php echo esc_url($it_header_home_url); ?>">Tutti i paesi</a>
        </div>
      </div>
    </nav>
  </div>
</header>
<?php endif; ?>

<?php
/**
 * Place il existing Customizer advertisement immediately below il English
 * title/logo e navigation. Do not duplicate il AdSenseHeaderManager output.
 */
if (!$it_header_is_app && function_exists('goldnow_display_ad')) :
?>
<div class="en-top-header-ad" style="width:100%;max-width:1200px;margin:0 auto;padding:10px 8px;box-sizing:border-box;text-align:center;direction:ltr;clear:both;">
    <?php goldnow_display_ad('below_navbar'); ?>
</div>
<?php endif; ?>

<?php
/**
 * English-only text adapter for shortcode HTML.
 * It translates visible text e accessibility labels only; URLs, HTML structure,
 * CSS e JavaScript are deliberately left untouched.
 */
if (!function_exists('altaqrer_gold_it_translate_shortcode_html')) {
    function altaqrer_gold_it_translate_shortcode_html($html, $translations = array()) {
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
    // 1) Resolve il current country safely e use its English taxonomy metadata.
    $current_term = get_queried_object();
    $arabic_country_name = (is_object($current_term) && isset($current_term->name)) ? (string) $current_term->name : '';
    $term_id = (is_object($current_term) && isset($current_term->term_id)) ? (int) $current_term->term_id : 0;

    $english_name = $term_id ? (string) get_term_meta($term_id, 'country_english_name', true) : '';
    $localized_country_name = (is_object($current_term) && function_exists('altaqrer_ml_country_name'))
        ? (string) altaqrer_ml_country_name($current_term, 'it')
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

    // Complete English currency labels for il currencies used by il site's country map.
    $currency_labels_it = array(
        'USD'=>'Dollaro statunitense','EUR'=>'Euro','GBP'=>'Sterlina britannica','EGP'=>'Sterlina egiziana','SAR'=>'Riyal saudita','AED'=>'Dirham degli Emirati Arabi Uniti',
        'KWD'=>'Dinaro kuwaitiano','QAR'=>'Riyal qatariota','BHD'=>'Dinaro bahreinita','OMR'=>'Rial omanita','JOD'=>'Jordanian Dinar',
        'IQD'=>'Iraqi Dinar','MAD'=>'Moroccan Dirham','TND'=>'Tunisian Dinar','DZD'=>'Algerian Dinar','TRY'=>'Turkish Lira',
        'JPY'=>'Yen giapponese','CHF'=>'Swiss Franc','CAD'=>'Canadian Dollar','AUD'=>'Australian Dollar','NZD'=>'New Zeale Dollar',
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
        'STN'=>'São Tomé e Príncipe Dobra','ARS'=>'Argentine Peso','BOB'=>'Bolivian Boliviano','CLP'=>'Chilean Peso',
        'COP'=>'Colombian Peso','GYD'=>'Guyanese Dollar','PYG'=>'Paraguayan Guarani','PEN'=>'Peruvian Sol',
        'SRD'=>'Surinamese Dollar','UYU'=>'Uruguayan Peso','VES'=>'Venezuelan Bolívar','FKP'=>'Falkle Islands Pound',
        'BMD'=>'Bermudian Dollar','KYD'=>'Cayman Islands Dollar','CRC'=>'Costa Rican Colón','CUP'=>'Cuban Peso',
        'DOP'=>'Dominican Peso','GTQ'=>'Guatemalan Quetzal','HNL'=>'Honduran Lempira','NIO'=>'Nicaraguan Córdoba',
        'PAB'=>'Panamanian Balboa','BSD'=>'Bahamian Dollar','BBD'=>'Barbadian Dollar','BZD'=>'Belize Dollar',
        'JMD'=>'Jamaican Dollar','TTD'=>'Trinidad e Tobago Dollar','XCD'=>'East Caribbean Dollar','HTG'=>'Haitian Gourde',
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
    $currency_label = isset($currency_labels_it[$country_currency]) ? $currency_labels_it[$country_currency] : ($country_currency !== '' ? $country_currency : 'Valuta locale');
    $today = function_exists('wp_date') ? wp_date('d/m/Y') : date('d/m/Y');

    // Build a text-only translation dictionary for legacy shortcodes that still use Arabic labels.
    $shortcode_translation_map_it = array(
        'ذهب عيار 24' => 'Oro a 24 carati', 'ذهب عيار 22' => 'Oro a 22 carati', 'ذهب عيار 21' => 'Oro a 21 carati',
        'ذهب عيار 18' => 'Oro a 18 carati', 'ذهب عيار 14' => 'Oro a 14 carati', 'ذهب عيار 12' => 'Oro a 12 carati',
        'عيار 24' => 'Oro a 24 carati', 'عيار 22' => 'Oro a 22 carati', 'عيار 21' => 'Oro a 21 carati', 'عيار 18' => 'Oro a 18 carati', 'عيار 14' => 'Oro a 14 carati', 'عيار 12' => 'Oro a 12 carati',
        'جرام عيار 24' => 'Oro a 24 carati al grammo', 'جرام عيار 22' => 'Oro a 22 carati al grammo', 'جرام عيار 21' => 'Oro a 21 carati al grammo',
        'جرام عيار 18' => 'Oro a 18 carati al grammo', 'جرام عيار 14' => 'Oro a 14 carati al grammo',
        'جرام عيار 12' => 'Oro a 12 carati al grammo',
        'الأونصة العالمية' => 'Oncia globale d’oro', 'أونصة الذهب العالمية' => 'Oncia globale d’oro',
        'الأونصة بالعملة المحلية' => 'Gold Ounce in Local Currency', 'أونصة الذهب بالعملة المحلية' => 'Gold Ounce in Local Currency',
        'جنيه الذهب' => 'Moneta d’oro', 'الجنيه الذهب' => 'Moneta d’oro', 'سعر الجنيه الذهب' => 'Gold Coin Price',
        'السعر بالدولار' => 'Price in USD', 'سعر الدولار' => 'US Dollar Rate', 'سعر الدولار اليوم' => 'US Dollar Rate Today',
        'السعر بالعملة المحلية' => 'Price in Local Currency', 'سعر الذهب بالدولار' => 'Gold Price in USD',
        'جنيه مصري' => 'Egyptian Pound', 'الدولار الأمريكي' => 'US Dollar', 'دولار أمريكي' => 'US Dollar',
        'الأكثر تداولاً' => 'Più scambiato',
        'الأكثر تداولا' => 'Più scambiato',
        'انضم إلى قناتنا على تيليجرام' => 'Unisciti al nostro canale Telegram', 'انضم إلى قناتنا على تليجرام' => 'Unisciti al nostro canale Telegram', 'انضم لقناتنا على تيليجرام' => 'Unisciti al nostro canale Telegram', 'انضم لقناتنا على تليجرام' => 'Unisciti al nostro canale Telegram',
        'تنويه هام:' => 'Important Notice:', 'الوزن / النوع' => 'Peso / Tipo', 'السعر' => 'Prezzo',
        'السعر الآن' => 'Live Price', 'أعلى سعر' => 'Highest Price', 'أقل سعر' => 'Lowest Price',
        'التغير' => 'Change', 'التحديث اللحظي' => 'Live Update', 'بدون مصنعية' => 'Esclusi i costi di lavorazione',
        'سعر الذهب' => 'Gold Price', 'أسعار الذهب' => 'Prezzi dell’oro', 'العملة المحلية' => 'Valuta locale'
    );

    // Reuse il existing functions.php dictionaries where possible without modifying Arabic globals.
    global $currency_names, $carat_labels;
    if (is_array($currency_names)) {
        foreach ($currency_names as $code => $arabic_label) {
            if (isset($currency_labels_it[$code]) && is_string($arabic_label) && $arabic_label !== '') {
                $shortcode_translation_map_it[$arabic_label] = $currency_labels_it[$code];
            }
        }
    }
    if (is_array($carat_labels)) {
        $carat_english = array('24k'=>'Oro a 24 carati','22k'=>'Oro a 22 carati','21k'=>'Oro a 21 carati','18k'=>'Oro a 18 carati','14k'=>'Oro a 14 carati','12k'=>'Oro a 12 carati','24k_oz'=>'Gold Ounce','gold_pound'=>'Moneta d’oro');
        foreach ($carat_labels as $key => $arabic_label) {
            if (isset($carat_english[$key]) && is_string($arabic_label) && $arabic_label !== '') {
                $shortcode_translation_map_it[$arabic_label] = $carat_english[$key];
            }
        }
    }
    if ($arabic_country_name !== '' && $arabic_country_name !== $display_country_name) {
        $shortcode_translation_map_it[$arabic_country_name] = $display_country_name;
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

    // Read il 24K gram benchmark once. All karat e weight calculations below
    // continue to use this same USD source e il existing local-currency rate.
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

    // Use il provider's dedicated global-ounce quote when available; otherwise
    // fall back to il established 31.1g calculation. Local e global values
    // are two conversions of il same international ounce benchmark.
    $latest_global_ounce = function_exists('infi_get_latest_gold_prices')
        ? infi_get_latest_gold_prices('24k_oz')
        : array();
    $ounce_price_usd = (!empty($latest_global_ounce) && isset($latest_global_ounce[0]['price_usd']))
        ? (float) $latest_global_ounce[0]['price_usd']
        : ($gram_24k_price_usd_converted * 31.1);
    $ounce_price_currency = $ounce_price_usd * $local_currency_per_usd;

    // Preserve il site's established 8g, 21K gold-coin calculation.
    $gold_pound_currency = $gram_24k_price_currency * 8 * 0.875;
?>

<div class="en-middle-ad-slot" style="width:100%;max-width:1200px;margin:12px auto 18px;padding:10px 8px;box-sizing:border-box;text-align:center;direction:ltr;clear:both;">
    <?php goldnow_display_ad('below_cards'); ?>
</div>
	  
    <!-- ✅ Tab Navigation Buttons -->
    <div class="gold-tabs-nav text-center py-4">
      <button class="gold-tab-btn active" type="button" data-tab="now">Prezzi in tempo reale</button>
      <button class="gold-tab-btn" type="button" data-tab="buy-sell">Lingotti d’oro</button>
      <button class="gold-tab-btn" type="button" data-tab="indicator">Grafico del prezzo dell’oro</button>
    </div>

    <!-- ✅ Tab Content Container -->
    <div class="gold-tabs-content">
      
      <!-- 1. Live Prices Pane -->
      <div id="tab-now" class="gold-tab-pane" style="display:block;">
        <!-- 📊 SEO Heading: Fully programmatically structured in English layout -->
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align: left; direction: ltr;">
          <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
          <img alt="Prezzi attuali dell’oro a <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align: middle; margin-right: 5px;">
        <?php
        if ( $gold_view == '24k' ) { echo 'Prezzo dell’oro a 24 carati oggi in ' . esc_html($display_country_name); }
        elseif ( $gold_view == '22k' ) { echo 'Prezzo dell’oro a 22 carati oggi in ' . esc_html($display_country_name); }
        elseif ( $gold_view == '21k' ) { echo 'Prezzo dell’oro a 21 carati al grammo oggi in ' . esc_html($display_country_name); }
        elseif ( $gold_view == '18k' ) { echo 'Prezzo dell’oro a 18 carati oggi in ' . esc_html($display_country_name); }
        elseif ( $gold_view == '14k' ) { echo 'Prezzo dell’oro a 14 carati oggi in ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'ounce' ) { echo 'Prezzo globale dell’oncia d’oro oggi (USD)'; }
        elseif ( $gold_view == 'coin' ) { echo 'Prezzo della moneta d’oro oggi in ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'gold-bars' ) { echo 'Prezzi dei lingotti d’oro oggi in ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'gold-index' ) { echo 'Indice del mercato dell’oro in tempo reale oggi in ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'usd' ) { echo 'Tassi di cambio del dollaro USA e delle altre valute oggi in ' . esc_html($display_country_name); }
        else { echo 'Prezzi dell’oro in ' . esc_html($display_country_name) . ' oggi'; }?>
        </h2>
        
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align: left; direction: ltr;">
          <?php 
          if ($gold_view == 'usd') { echo 'Tassi di cambio in tempo reale per le principali valute internazionali e regionali'; }
          elseif ($gold_view == 'ounce') { echo 'Riferimento internazionale spot per un’oncia troy di oro 24 carati, quotato in USD'; }
          else { echo 'Prezzo dell’oro in ' . esc_html($display_country_name) . ' —  escluse le spese di lavorazione'; }
          ?>
        </h3>

        <!-- Gold Price Cards Shortcode Section -->
        <section id="gold-cards" class="mb-4">
            <?php echo altaqrer_gold_it_translate_shortcode_html(do_shortcode('[infi_gold_cards currency="' . esc_attr($country_currency) . '" currency_label="' . esc_attr($currency_label) . '"]'), $shortcode_translation_map_it); ?>
        </section>

        <!-- Gold Information Panels Shortcode Section -->
        <section id="gold-info-boxes" class="mb-4">
            <?php echo altaqrer_gold_it_translate_shortcode_html(do_shortcode('[infi_gold_info_boxes currency="' . esc_attr($country_currency) . '"]'), $shortcode_translation_map_it); ?>
        </section>
	  </div>
		
      <!-- 2. Gold Bullion Bars e Coins Table Pane -->
      <div id="tab-buy-sell" class="gold-tab-pane" style="display:none; text-align: left; direction: ltr;">
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align:left !important; direction:ltr !important;">
            <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
            <img alt="Lingotti e monete d’oro in <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; margin-right: 5px;">
            Lingotti e monete d’oro in <?php echo esc_html($display_country_name); ?>
        </h2>
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align:left !important; direction:ltr !important;">
          Ultimi prezzi di lingotti e monete d’oro (escluse le spese di lavorazione)
        </h3>

        <?php if (function_exists('infi_get_latest_gold_prices')) { ?>
            <!-- A) Gold Bars Price Table -->
            <section id="sabika-price" class="gold-section mt-4">
                <div class="section-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <h4>Prezzi dei lingotti d’oro in <?php echo esc_html($display_country_name); ?></h4>
                    <span class="date-badge" style="background: #262930; padding: 4px 10px; border-radius: 4px; font-size: 13px;"><?php echo esc_html($today); ?></span>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>Peso / Tipo</th>
                                <th>Prezzo (<?php echo $currency_label; ?>)</th>
                                <th>Prezzo (USD)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $weights = [
                                ['weight' => 1, 'name' => 'Lingotto d’oro — 1 g'],
                                ['weight' => 2.5, 'name' => 'Lingotto d’oro — 2,5 g'],
                                ['weight' => 5, 'name' => 'Lingotto d’oro — 5 g'],
                                ['weight' => 10, 'name' => 'Lingotto d’oro — 10 g'],
                                ['weight' => 20, 'name' => 'Lingotto d’oro — 20 g'],
                                ['weight' => 31.1, 'name' => 'Oncia troy (31,1 g)'],
                                ['weight' => 50, 'name' => 'Lingotto d’oro — 50 g'],
                                ['weight' => 100, 'name' => 'Lingotto d’oro — 100 g'],
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
                    <h4>Prezzi delle monete d’oro in <?php echo esc_html($display_country_name); ?></h4>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>Purezza della moneta</th>
                                <th>Prezzo (<?php echo $currency_label; ?>)</th>
                                <th>Prezzo (USD)</th>
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
                                    <td class="font-bold">Moneta d’oro da 8 g (<?php echo $carat_num; ?> carati)</td>
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
                <strong>Importante:</strong> The prices shown above for bars e coins represent I prezzi indicati sopra per lingotti e monete rappresentano esclusivamente il valore dell’oro; non includono costi di lavorazione, spese di marchiatura e imposte.
            </div>

        <?php } else { ?>
            <p style="text-align:center; padding:20px;">Spiacenti, i dati di mercato non sono attualmente disponibili.</p>
        <?php } ?>
      </div>

      <!-- 3. Gold Price Chart: restored to match il Arabic template structure. -->
      <div id="tab-indicator" class="gold-tab-pane" style="display:none; direction:ltr; text-align:left;">
        <h2 class="col-12 p-0 font-3 mb-3" style="text-align:left; direction:ltr;">
          <span class="start-head cls120" style="background: <?php echo esc_attr(get_theme_mod('infi_default_color', '#ffb301')); ?>;"></span>
          Grafico del prezzo dell’oro a <?php echo esc_html($display_country_name); ?>
        </h2>
        <div class="gold-frame-box mb-4" style="direction:ltr; text-align:left;">
          <?php
          $en_chart_shortcode = '[infi_gold_chart carat="21k" currency="' . esc_attr($country_currency) . '" title="21K Gold Price Movement"]';
          echo altaqrer_gold_it_translate_shortcode_html(do_shortcode($en_chart_shortcode), $shortcode_translation_map_it);
          ?>
        </div>
        <div id="ajax-indicator-frames" class="gold-frame-box" style="direction:ltr; text-align:left;"></div>
        <p style="color:#94a3b8; text-align:left; font-size:13px; margin:10px 4px 18px;">I grafici mostrano l’andamento indicativo del mercato. I prezzi locali possono variare in base ai tassi di cambio, ai premi e alle condizioni di mercato.</p>
      </div>

    </div>
  </div>
</main>

<script>
// Translate legacy Arabic labels returned by il existing indicator AJAX action.
function altaqrerTranslateEnglishIndicator(root) {
    if (!root) return;
    const translations = {
        'عيار 24': 'Oro a 24 carati', 'عيار 22': 'Oro a 22 carati', 'عيار 21': 'Oro a 21 carati',
        'عيار 18': 'Oro a 18 carati', 'عيار 14': 'Oro a 14 carati', 'عيار 12': 'Oro a 12 carati',
        'الأونصة العالمية': 'Global Gold Ounce (USD)',
        'الأونصة بالعملة المحلية': 'Gold Ounce in Local Currency',
        'جنيه الذهب': 'Moneta d’oro', 'سعر الدولار': 'US Dollar Exchange Rate',
        'جنيه مصري': 'Egyptian Pound', 'دولار أمريكي': 'US Dollar',
        'انضم إلى قناتنا على تيليجرام': 'Unisciti al nostro canale Telegram',
        'انضم إلى قناتنا على تليجرام': 'Unisciti al nostro canale Telegram'
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

            // Load il same indicator frames used by il Arabic template once only.
            if (tab === 'indicator' && !targetPane.dataset.framesLoaded) {
                const framesContainer = document.getElementById('ajax-indicator-frames');
                framesContainer.innerHTML = '<p style="text-align:center;padding:18px;color:#cbd5e1;">Caricamento dei grafici dell’oro…</p>';
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
                    framesContainer.innerHTML = '<p style="text-align:center;padding:18px;color:#fca5a5;">Impossibile caricare i dati del grafico. Riprova.</p>';
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
        📊 Il monitoraggio dell’oro mostra gli ultimi movimenti dei prezzi in <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo esc_html($display_country_name); ?> in tempo reale</strong></span>. <img alt="Bandiera di <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align:middle; margin: 0 4px;"> Data: <strong><?php echo esc_html($today); ?></strong>. I dati si basano sui mercati regionali e sulla quotazione internazionale dell’oro per <?php echo esc_html($display_country_name); ?>.
    </p>

    <p style="margin-bottom: 15px;">
        💡 Questo rapporto presenta i prezzi aggiornati di tutte le principali categorie: include l’<strong>oro a 21 carati</strong> — la purezza più scambiata — e anche l’<strong>oro a 22, 18 e 14 carati</strong>. Comprende inoltre altri metalli preziosi, il mercato della gioielleria e i movimenti quotidiani del mercato.
    </p>

    <p style="margin-bottom: 15px;">
        ✨ Secondo i dati di mercato aggiornati, il prezzo indicativo al grammo dell’<strong>oro a 24 carati</strong>, esclusi i costi di lavorazione, è di <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($gram_24k_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> (pari a <strong><?php echo number_format($gram_24k_price_usd_converted, 2); ?> dollari statunitensi</strong>). L’elevata purezza lo rende il riferimento principale per i <strong>lingotti d’oro</strong>.
    </p>

    <p style="margin-bottom: 15px;">
        📈 Il <strong>prezzo mondiale dell’oncia d’oro</strong> (31,1 grammi di oro a 24 carati) è oggi pari a <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong>. È il riferimento internazionale del mercato spot; i prezzi locali vengono convertiti separatamente usando il tasso di cambio più recente disponibile.
    </p>

    <p style="margin-bottom: 15px;">
        🪙 Per risparmiatori e investitori, il prezzo indicativo attuale di una <strong>moneta d’oro</strong> da 8 grammi a 21 carati è di circa <strong><?php echo number_format($gold_pound_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong>.
    </p>

    <p style="margin-bottom: 20px;">
        🛠️ Per seguire il valore dei risparmi, consultare l’<strong>indice in tempo reale del mercato dell’oro</strong> e i <strong>prezzi dei lingotti</strong> da 1 grammo a 1 chilogrammo aiuta a valutare l’andamento del mercato prima di acquistare o vendere.
    </p>

    <div style="background: #17191d; padding: 12px; border-radius: 6px; border: 1px dashed #3a3f4d; color: #d1d5db; font-size: 14px; margin-top: 15px;">
        💵 <strong>Indicatore del tasso di cambio:</strong> I prezzi locali dell’oro dipendono anche dai tassi di cambio. Secondo gli ultimi dati disponibili, oggi il tasso del <strong>dollaro statunitense in <?php echo esc_html($display_country_name); ?></strong> è di <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> per dollaro. Scarica l’<strong>app dei prezzi dell’oro</strong> per ricevere avvisi aggiornati.
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

        // Same rate direction e conversion formula used by il Arabic template.
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
            💵 Tassi di cambio in tempo reale rispetto a <?php echo esc_html($currency_label); ?> in <?php echo esc_html($display_country_name); ?> <img alt="Bandiera di <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:
        </strong>
        
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; text-align: left; direction: ltr;">
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'USD') : ?>
                    <div><img alt="Flag of United States" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_it['USD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                    <div><img alt="Flag of United Kingdom" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_it['GBP']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                    <div><img alt="Flag of Saudi Arabia" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_it['SAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>

                <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                    <div><img alt="Flag of Bahrain" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_it['BHD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                    <div><img alt="Flag of Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_it['OMR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                    <div><img alt="Flag of European Union" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_it['EUR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                    <div><img alt="Flag of United Arab Emirates" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_it['AED']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                    <div><img alt="Flag of Kuwait" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_it['KWD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                    <div><img alt="Flag of Qatar" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_it['QAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                    <div><img alt="Flag of Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_it['JPY']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
        </div>
        <p style="margin: 15px 0 0 0; font-size: 12px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 8px; text-align: left; direction: ltr;">* Gli aggiornamenti vengono eseguiti automaticamente tramite indici ufficiali di mercato in tempo reale. Consigliamo di installare l'<strong>app ufficiale dei prezzi dell’oro</strong>.</p>
    </div>
<?php endif; ?>

<div class="altaqrer-silo-links" style="margin: 25px auto; padding: 15px; background: #17191d; border: 1px solid #3a3f4d; border-radius: 6px; text-align: center; max-width: 800px; width: 95%; box-sizing: border-box; clear: both; direction: ltr;">
    <?php
    // Reuse il already-resolved English country URL for every tab link.
    $base_country_url = $it_header_country_url;

    $active_bg = get_theme_mod('infi_default_color', '#ffb301');
    $active_color = '#000000';
    $default_bg = '#262930';
    $default_color = '#ffffff';

    $tabs = [
        ['key' => '',          'it' => 'Prezzo dell’oro'],
        ['key' => '24k',       'it' => '24 carati'],
        ['key' => '22k',       'it' => '22 carati'],
        ['key' => '21k',       'it' => '21 carati'],
        ['key' => '18k',       'it' => '18 carati'],
        ['key' => '14k',       'it' => '14 carati'],
        ['key' => 'ounce',     'it' => 'Oncia d’oro'],
        ['key' => 'coin',      'it' => 'Moneta d’oro'],
        ['key' => 'gold-bars', 'it' => 'Lingotti d’oro'],
        ['key' => 'gold-index','it' => 'Indice dell’oro'],
        ['key' => 'usd',       'it' => 'USD e tassi di cambio'],
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
            $label = $tab['it'];
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
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">📈 Indice live del mercato dell’oro in <?php echo esc_html($display_country_name); ?> <img alt="Bandiera di <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Oro puro 24K:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valore: <?php echo number_format($price_24k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Oro 22K:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valore: <?php echo number_format($price_22k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;">Oro 21K più richiesto:</strong> <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valore: <?php echo number_format($price_21k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Oro 18K standard:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valore: <?php echo number_format($price_18k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Oro 14K:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valore: <?php echo number_format($price_14k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Oncia d’oro globale (31,1 g):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong></span><br><small style="color:#94a3b8;">Prezzo spot internazionale, espresso in USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Oncia d’oro in valuta locale (31,1 g):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Lo stesso riferimento globale dell’oncia convertito nella valuta locale</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Questo indice confronta le principali purezze dell’oro in <?php echo esc_html($display_country_name); ?>con il riferimento spot internazionale. L’oncia globale è quotata in USD, mentre l’oncia in valuta locale è lo stesso riferimento convertito al tasso di cambio del paese. Non sono incluse le spese di lavorazione né i margini del rivenditore.
                </p>


            <?php elseif ($gold_view == 'gold-bars') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 Prezzi dei lingotti d’oro oggi in <?php echo esc_html($display_country_name); ?> (oro puro 24K):</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingotto d’oro — 1 g:</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_24k_local * 1, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valore: <?php echo number_format($price_24k_usd * 1, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingotto d’oro — 2,5 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 2.5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valore: <?php echo number_format($price_24k_usd * 2.5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingotto d’oro — 5 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valore: <?php echo number_format($price_24k_usd * 5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingotto d’oro — 10 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 10, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valore: <?php echo number_format($price_24k_usd * 10, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingotto d’oro — 20 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 20, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valore: <?php echo number_format($price_24k_usd * 20, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Oncia troy (31,1 grammi):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valore: <?php echo number_format($ounce_price_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingotto d’oro — 50 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 50, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valore: <?php echo number_format($price_24k_usd * 50, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Lingotto d’oro — 100 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 100, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Valore: <?php echo number_format($price_24k_usd * 100, 2); ?> USD</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Questo strumento monitora <strong>i prezzi attuali dei lingotti d’oro</strong> composti esclusivamente da oro 24K con purezza 999,9. L’accumulo di lingotti resta una copertura importante per preservare il patrimonio e la liquidità a lungo termine in <strong><?php echo esc_html($display_country_name); ?></strong> contro l’inflazione macroeconomica.
                </p>

            <?php elseif ($gold_view == 'coin') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 Prezzo della moneta d’oro oggi in <?php echo esc_html($display_country_name); ?> (peso standard di 8 grammi):</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>Moneta d’oro 21K (8 g):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_21k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Valore: <?php echo number_format($price_21k_usd * 8, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>Moneta d’oro 22K (8 g):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Valore: <?php echo number_format($price_22k_usd * 8, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>Moneta d’oro 24K (8 g):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Valore: <?php echo number_format($price_24k_usd * 8, 2); ?> USD</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Ricevi aggiornamenti in tempo reale sul <strong>prezzo attuale della moneta d’oro</strong> nei mercati d’investimento di <strong><?php echo esc_html($display_country_name); ?></strong>. Le monete d’oro sovrane da 8 grammi sono seguite come beni rifugio fisici.
                </p>

            <?php elseif ($gold_view == 'usd') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">💵 Tassi di cambio in tempo reale rispetto a <?php echo esc_html($currency_label); ?> in <?php echo esc_html($display_country_name); ?>:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; text-align: left; direction: ltr; margin-bottom: 20px;">
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'USD') : ?>
                            <div><img alt="Flag of US" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_it['USD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                            <div><img alt="Flag of UK" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_it['GBP']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                            <div><img alt="Flag of SA" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_it['SAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                            <div><img alt="Flag of BH" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_it['BHD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                            <div><img alt="Flag of Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_it['OMR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                            <div><img alt="Flag of EU" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_it['EUR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                            <div><img alt="Flag of AE" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_it['AED']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                            <div><img alt="Flag of KW" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_it['KWD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                            <div><img alt="Flag of QA" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_it['QAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                            <div><img alt="Flag of Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_it['JPY']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Questo indice dinamico monitora i tassi di cambio bancari. I prezzi locali di riferimento dell’oro variano direttamente con le oscillazioni valutarie rispetto alle riserve globali.
                </p>

            <?php elseif ($gold_view == '24k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Rapporto in tempo reale: 24K prezzo dell’oro al grammo oggi in <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Prezzo in valuta locale:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Equivalente in dollari USA:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_24k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    L’attuale prezzo <strong>24K dell’oro al grammo oggi</strong> è pari a <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Con una purezza del 99,9%, questa caratura è il riferimento industriale per la produzione di lingotti.
                </p>

            <?php elseif ($gold_view == '22k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Rapporto in tempo reale: 22K prezzo dell’oro al grammo oggi in <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Prezzo in valuta locale:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Equivalente in dollari USA:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_22k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Il <strong>22K dell’oro al grammo oggi</strong> è pari a <strong><?php echo number_format($price_22k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Combina un elevato contenuto di metallo prezioso con una buona resistenza strutturale.
                </p>

            <?php elseif ($gold_view == '21k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Rapporto in tempo reale: 21K prezzo dell’oro al grammo oggi in <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Prezzo in valuta locale:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Equivalente in dollari USA:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_21k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Il molto richiesto <strong>21K dell’oro al grammo oggi</strong> è quotato a <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Questa caratura rappresenta la maggior parte del commercio locale di gioielli.
                </p>

            <?php elseif ($gold_view == '18k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Rapporto in tempo reale: 18K prezzo dell’oro al grammo oggi in <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Prezzo in valuta locale:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Equivalente in dollari USA:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_18k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Secondo gli aggiornamenti di mercato, il <strong>18K dell’oro al grammo oggi</strong> a <strong><?php echo number_format($price_18k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>, ed è una scelta più economica per la gioielleria di lusso.
                </p>

            <?php elseif ($gold_view == '14k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Rapporto in tempo reale: 14K prezzo dell’oro al grammo oggi in <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Prezzo in valuta locale:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Equivalente in dollari USA:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_14k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    L’indice calcolato valuta il <strong>14K dell’oro al grammo oggi</strong> a <strong><?php echo number_format($price_14k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>, una lega resistente adatta all’uso quotidiano in gioielleria.
                </p>

            <?php elseif ($gold_view == 'ounce') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Prezzo globale dell’oncia d’oro oggi (31,1 g):</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Prezzo spot internazionale:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($ounce_price_usd, 2); ?></strong></span> USD</li>
                    <li>🔹 <strong>Valuta di quotazione:</strong> Dollaro statunitense (USD)</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    L’oncia d’oro globale è quotata a livello internazionale in dollari USA e corrisponde a 31,1 grammi di oro 24 carati. Le conversioni in valuta locale sono escluse da questo riferimento globale; i prezzi locali sono calcolati separatamente usando il tasso di cambio applicabile.
                </p>
            <?php endif; ?>

        </div>
    </div>
    <?php
}
?>

<?php if (!empty($gold_view)) :
    // The live values below use il same price snapshot e conversions as il tables above.
    $it_seo_base = home_url('/it/country/' . rawurlencode($it_header_country_slug) . '/');
    $it_seo_price_map = array(
        '24k' => array($price_24k_local, $price_24k_usd),
        '22k' => array($price_22k_local, $price_22k_usd),
        '21k' => array($price_21k_local, $price_21k_usd),
        '18k' => array($price_18k_local, $price_18k_usd),
        '14k' => array($price_14k_local, $price_14k_usd)
    );
?>
<article class="it-seo-article" aria-labelledby="it-seo-title">
<?php if (isset($it_seo_price_map[$gold_view])) :
    $en_active_price_local = $it_seo_price_map[$gold_view][0];
    $en_active_price_usd = $it_seo_price_map[$gold_view][1];
    $it_karat = str_replace(['24K','22K','21K','18K','14K'], ['24 carati','22 carati','21 carati','18 carati','14 carati'], strtoupper($gold_view));
?>
    <h2 id="it-seo-title">Prezzo dell’oro <?php echo esc_html($it_karat); ?> oggi a <?php echo esc_html($display_country_name); ?> al grammo</h2>
    <p>Segui il prezzo attuale dell’oro <strong><?php echo esc_html($it_karat); ?> a <?php echo esc_html($display_country_name); ?></strong> in base al riferimento in tempo reale mostrato sopra. Il valore indicativo attuale è <strong><?php echo number_format($en_active_price_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> al grammo, pari a circa <strong><?php echo number_format($en_active_price_usd, 2); ?> USD</strong>. Questi valori sono calcolati usando l’ultimo prezzo di riferimento disponibile dell’oro 24K e il fattore di purezza di <?php echo esc_html($it_karat); ?> e l’ultimo tasso di cambio disponibile utilizzato dal sito.</p>
    <h3>Che cosa significa oro <?php echo esc_html($it_karat); ?>?</h3>
    <p>La caratura indica la percentuale di oro puro in una lega. Il 24K è il riferimento dell’oro puro, mentre le carature inferiori contengono una quota maggiore di altri metalli. Il prezzo dell’oro <?php echo esc_html($it_karat); ?> riflette quindi il contenuto d’oro e non il prezzo finale al dettaglio di un gioiello. Il prezzo in negozio può includere anche lavorazione, margini del rivenditore, imposte e altri costi locali non compresi nel valore di mercato mostrato.</p>
    <h3>Come leggere i prezzi locali e in USD</h3>
    <p>Il valore in valuta locale consente di confrontare il riferimento in <?php echo esc_html($display_country_name); ?>; l’equivalente in USD facilita il confronto dello stesso contenuto d’oro con le quotazioni internazionali. I prezzi locali possono variare con il benchmark globale, i tassi di cambio o i premi del mercato locale. I valori sono indicativi e non costituiscono un’offerta garantita di acquisto o vendita.</p>
    <h3>Prezzi dell’oro correlati</h3>
    <p>Confronta questo prezzo con <a href="<?php echo esc_url($it_seo_base . '24k/'); ?>">oro 24K</a>, <a href="<?php echo esc_url($it_seo_base . '21k/'); ?>">oro 21K</a>, <a href="<?php echo esc_url($it_seo_base . 'gold-bars/'); ?>">prezzi dei lingotti d’oro</a>, e il <a href="<?php echo esc_url($it_seo_base . 'gold-index/'); ?>">indice del mercato dell’oro in tempo reale</a> per una panoramica più completa del mercato.</p>
    <h3>Domande frequenti</h3>
    <details><summary>Il prezzo visualizzato di <?php echo esc_html($it_karat); ?> è il prezzo finale in gioielleria?</summary><p>No. È un valore indicativo dell’oro grezzo e non include lavorazione, margini del rivenditore, imposte o altri costi applicabili a un gioiello finito.</p></details>
    <details><summary>Perché l’equivalente in USD è diverso dal prezzo locale?</summary><p>I due valori utilizzano valute diverse. L’importo locale è convertito con l’ultimo tasso di cambio disponibile utilizzato dal sito; il valore in USD rappresenta il corrispondente valore dell’oro in dollari statunitensi.</p></details>
<?php elseif ($gold_view === 'ounce') : ?>
    <h2 id="it-seo-title">Prezzo globale dell’oncia d’oro oggi in USD</h2>
    <p>Il prezzo internazionale di riferimento dell’oncia d’oro in questa pagina è <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong> per un’oncia troy di circa 31,1 grammi di oro 24K. Si tratta del <strong>benchmark globale dell’oro spot</strong>, quotato in dollari USA. Non viene presentato come prezzo locale dell’oncia in una valuta nazionale; i prezzi locali al grammo sono convertiti separatamente per il paese selezionato.</p>
    <h3>Perché è importante l’oncia globale dell’oro</h3>
    <p>Nei mercati internazionali l’oro è generalmente quotato per oncia troy. Operatori, raffinerie, servizi finanziari e commercianti di metalli preziosi usano questo riferimento per confrontare il valore dell’oro tra mercati. Dollaro USA, aspettative sui tassi, prospettive d’inflazione, attività delle banche centrali e domanda degli investitori possono influenzare il prezzo internazionale. Sono fattori generali, non l’affermazione che uno di essi abbia causato il movimento odierno.</p>
    <h3>Dall’oncia globale al prezzo locale al grammo</h3>
    <p>Per un confronto semplice, un’oncia troy contiene circa 31,1 grammi. Il prezzo locale al grammo dipende anche dal cambio selezionato e dalle condizioni del mercato locale. Il valore globale dell’oncia resta in USD per consentire un confronto coerente con le quotazioni internazionali.</p>
    <p>Continua alla pagina <a href="<?php echo esc_url($it_seo_base); ?>">prezzo dell’oro in <?php echo esc_html($display_country_name); ?></a>, consulta <a href="<?php echo esc_url($it_seo_base . '24k/'); ?>">oro 24K al grammo</a>, oppure apri <a href="<?php echo esc_url($it_seo_base . 'gold-index/'); ?>">indice del mercato dell’oro</a>.</p>
    <h3>Domande frequenti</h3>
    <details><summary>Quanti grammi contiene un’oncia troy d’oro?</summary><p>Un’oncia troy equivale a circa 31,1035 grammi. Questa pagina utilizza 31,1 grammi per il calcolo di riferimento mostrato.</p></details>
    <details><summary>Questo prezzo dell’oncia è convertito nella valuta locale?</summary><p>No. Questa pagina mostra solo il benchmark internazionale dell’oncia d’oro in USD. I valori in valuta locale sono indicati separatamente nelle tabelle nazionali, ove applicabile.</p></details>
<?php elseif ($gold_view === 'coin') : ?>
    <h2 id="it-seo-title">Prezzo della moneta d’oro da 8 grammi oggi in <?php echo esc_html($display_country_name); ?></h2>
    <p>Segui il valore di riferimento di una <strong>moneta d’oro da 8 grammi</strong> in <?php echo esc_html($display_country_name); ?>. Con i prezzi attuali al grammo, il valore indicativo della moneta 21K è <strong><?php echo number_format($price_21k_local * 8, 2); ?> <?php echo esc_html($currency_label); ?></strong> (circa <strong><?php echo number_format($price_21k_usd * 8, 2); ?> USD</strong>). La pagina confronta anche i valori 22K e 24K per lo stesso peso di 8 grammi, così da confrontare l’effetto della purezza.</p>
    <h3>Come si calcola il valore della moneta da 8 grammi</h3>
    <p>Il calcolo moltiplica il valore dell’oro al grammo per 8 grammi. Per il riferimento comune 21K, la stima moltiplica il prezzo al grammo 21K per otto. I valori di confronto 22K e 24K usano i rispettivi prezzi al grammo per lo stesso peso. In questo modo si mantiene il calcolo da 8 grammi previsto dal sito.</p>
    <p>Il prezzo effettivo della moneta può variare in base a coniazione, condizioni, design, rarità, margini del rivenditore e imposte locali. I valori indicano il contenuto d’oro e non costituiscono un’offerta garantita. Confronta il <a href="<?php echo esc_url($it_seo_base . '21k/'); ?>">oro prezzo 21K al grammo</a>, <a href="<?php echo esc_url($it_seo_base . '22k/'); ?>">22K gold price</a>, e <a href="<?php echo esc_url($it_seo_base . 'gold-bars/'); ?>">prezzi dei lingotti d’oro</a>.</p>
    <h3>Domande frequenti</h3>
    <details><summary>Quale peso viene utilizzato per il calcolo della moneta d’oro?</summary><p>Questa pagina mantiene il calcolo standard da 8 grammi del sito per il confronto della moneta d’oro.</p></details>
    <details><summary>Il valore mostrato include il margine del rivenditore?</summary><p>No. Stima solo il contenuto d’oro e non include costi di coniazione, margini del rivenditore, lavorazione o imposte.</p></details>
<?php elseif ($gold_view === 'gold-bars') : ?>
    <h2 id="it-seo-title">Prezzi dei lingotti d’oro oggi in <?php echo esc_html($display_country_name); ?></h2>
    <p>I lingotti d’oro sono generalmente valutati usando il riferimento dell’oro 24K. Sulla base dell’attuale riferimento 24K di <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?> al grammo</strong> (approximately <strong><?php echo number_format($price_24k_usd, 2); ?> USD</strong>), a 10-gram bar has an indicative gold-content value of <strong><?php echo number_format($price_24k_local * 10, 2); ?> <?php echo esc_html($currency_label); ?></strong>, mentre un lingotto da 100 grammi vale circa <strong><?php echo number_format($price_24k_local * 100, 2); ?> <?php echo esc_html($currency_label); ?></strong>. La tabella sopra riporta altri pesi per un rapido confronto.</p>
    <h3>Come confrontare i pesi dei lingotti d’oro</h3>
    <p>Per una stima semplice, moltiplica il riferimento 24K al grammo per il peso del lingotto. Il risultato rappresenta il valore di riferimento dell’oro prima di premi di fabbricazione, costi di analisi o certificazione, margini del rivenditore, consegna o imposte. Il prezzo finale può quindi essere superiore al calcolo grezzo mostrato.</p>
    <p>Prima dell’acquisto, verifica purezza dichiarata, peso esatto, certificazione, produttore e reputazione del venditore. Il <a href="<?php echo esc_url($it_seo_base . '24k/'); ?>">oro prezzo dell’oro 24K</a> è il riferimento principale al grammo, mentre l’<a href="<?php echo esc_url($it_seo_base . 'ounce/'); ?>">prezzo mondiale dell’oncia d’oro</a> offre un confronto internazionale in USD.</p>
    <h3>Domande frequenti</h3>
    <details><summary>I prezzi dei lingotti includono i costi di lavorazione?</summary><p>No. La tabella stima solo il valore dell’oro ed esclude fabbricazione, certificazione, margini del rivenditore e imposte.</p></details>
    <details><summary>Perché due lingotti dello stesso peso possono avere prezzi diversi?</summary><p>Marchio, certificazione, costi di produzione, margini del rivenditore, disponibilità e imposte locali possono influire sul prezzo finale.</p></details>
<?php elseif ($gold_view === 'gold-index') : ?>
    <!-- Global XAU/USD chart added specifically to il Gold Index SEO section. -->
    <section class="it-gold-index-chart" aria-labelledby="it-gold-index-chart-title" style="background:#17191d;border:1px solid #323742;border-radius:8px;padding:12px;margin:0 0 22px;direction:ltr;text-align:left;">
        <h3 id="it-gold-index-chart-title" style="color:#f0f1f5;text-align:left;margin:5px 5px 12px;font-size:20px;">Grafici del prezzo dell’oro</h3>
        <div style="position:relative;width:100%;height:520px;overflow:hidden;border-radius:6px;">
            <iframe
                id="tradingview_gold_index"
                title="Global Grafici del prezzo dell’oro — XAU/USD"
                src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_gold_index&symbol=OANDA%3AXAUUSD&interval=D&hidesidetoolbar=0&symboledit=0&saveimage=0&toolbarbg=%2317191d&studies=%5B%5D&theme=dark&style=1&timezone=Etc%2FUTC&withdateranges=1&hideideas=1&locale=it"
                style="width:100%;height:100%;border:0;"
                allowtransparency="true"
                scrolling="no"
                loading="lazy"
                allowfullscreen>
            </iframe>
        </div>
        <p style="color:#94a3b8;text-align:left;font-size:13px;margin:10px 4px 2px;">Segui il prezzo internazionale dell’oro spot in dollari USA (USD) tramite il grafico globale XAU/USD. È un riferimento mondiale, non un prezzo al dettaglio specifico di un paese.</p>
    </section>
    <h2 id="it-seo-title">Indice live del mercato dell’oro e prezzi per caratura in <?php echo esc_html($display_country_name); ?></h2>
    <p>Questa panoramica del mercato dell’oro riunisce gli ultimi valori di riferimento disponibili per diverse purezze. Il riferimento attuale 24K è <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> al grammo, mentre il 22K vale circa <strong><?php echo number_format($price_22k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> e il 21K vale circa <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. L’oncia troy globale è pari a <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong> e il suo equivalente in valuta locale è <strong><?php echo number_format($ounce_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong>.</p>
    <h3>Cosa permette di confrontare l’indice dell’oro</h3>
    <p>L’indice offre una fotografia pratica dei valori dell’oro nelle purezze e valute più comuni. Consente di confrontare il riferimento dei lingotti 24K con le carature inferiori usate comunemente in gioielleria. I valori locali derivano dal prezzo di riferimento dell’oro e dai tassi di cambio disponibili; quelli in USD permettono il confronto con il mercato internazionale.</p>
    <p>I prezzi dell’oro possono reagire all’attività del mercato spot globale, ai movimenti valutari, alle aspettative sui tassi, alle preoccupazioni per l’inflazione e ai cambiamenti della domanda d’investimento. Una singola rilevazione non definisce una tendenza: confronta gli aggiornamenti nel tempo. Visita la <a href="<?php echo esc_url($it_seo_base . '21k/'); ?>">pagina del prezzo 21K</a>, <a href="<?php echo esc_url($it_seo_base . '24k/'); ?>">pagina del prezzo 24K</a>, e <a href="<?php echo esc_url($it_seo_base . 'ounce/'); ?>">pagina dell’oncia globale</a>.</p>
    <h3>Domande frequenti</h3>
    <details><summary>L’indice mostra un prezzo di mercato garantito?</summary><p>No. È un riferimento informativo basato sugli ultimi dati disponibili sul sito. I prezzi effettivi delle transazioni possono includere premi e commissioni locali.</p></details>
    <details><summary>Perché le diverse carature hanno prezzi differenti?</summary><p>Ogni caratura contiene una percentuale diversa di oro puro. Le leghe meno pure hanno un valore di oro fino al grammo inferiore al 24K, prima di considerare altri costi.</p></details>
<?php elseif ($gold_view === 'usd') : ?>
    <h2 id="it-seo-title">Tasso di cambio USD e conversione valutaria in <?php echo esc_html($display_country_name); ?></h2>
    <p>L’ultimo riferimento disponibile utilizzato da questa pagina valuta un dollaro USA circa <strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong>. I tassi di cambio sono importanti per chi acquista oro, poiché i prezzi internazionali dei lingotti sono generalmente quotati in USD. Se la valuta locale cambia rispetto al dollaro, il valore locale convertito dell’oro può variare anche quando il prezzo internazionale in USD resta stabile.</p>
    <h3>Come i movimenti valutari influenzano i prezzi locali dell’oro</h3>
    <p>Una stima locale del prezzo dell’oro combina un riferimento internazionale con la conversione valutaria e, nel mercato al dettaglio, eventuali premi, imposte o costi locali. Questa pagina presenta alcuni confronti valutari per chiarire il contesto della conversione. I tassi sono informativi e possono differire da quelli bancari, contanti, delle carte o delle rimesse.</p>
    <p>Per il confronto dell’oro, consulta <a href="<?php echo esc_url($it_seo_base . '24k/'); ?>">prezzo 24K al grammo</a>, il <a href="<?php echo esc_url($it_seo_base . '21k/'); ?>">prezzo 21K al grammo</a>, e il <a href="<?php echo esc_url($it_seo_base . 'ounce/'); ?>">oncia d’oro internazionale in USD</a>.</p>
    <h3>Domande frequenti</h3>
    <details><summary>Questo è il tasso di cambio offerto da tutte le banche?</summary><p>No. È l’ultimo riferimento disponibile utilizzato dal sito. Banche e operatori di cambio possono applicare tassi di acquisto e vendita, spread o commissioni differenti.</p></details>
    <details><summary>Perché il tasso del dollaro è importante per l’oro?</summary><p>Poiché l’oro è generalmente quotato a livello internazionale in dollari USA, la conversione di questo riferimento nella valuta locale è uno dei fattori usati per stimare i prezzi locali.</p></details>
<?php endif; ?>
    <p class="en-seo-update-note" style="margin:20px 0 0;padding-top:12px;border-top:1px solid #3a3f4d;color:#9ca3af;font-size:12px;">Data di riferimento: <?php echo esc_html($today); ?>. I prezzi sono indicativi e riflettono gli ultimi dati disponibili per questa pagina; possono variare con l’aggiornamento dei dati di mercato e dei tassi di cambio.</p>
</article>
<?php endif; ?>

<?php if (!$it_header_is_app) : ?>
<footer class="it-site-footer">
  <div class="it-site-footer-inner">
    <section>
      <h3>Informazioni su AlTaqrer Gold</h3>
      <p><strong>AlTaqrer Gold</strong> aiuta i lettori a seguire i prezzi dell’oro nei mercati regionali e internazionali. Consulta i prezzi indicativi aggiornati dell’oro a 24, 22, 21, 18 e 14 carati, confronta i valori dei lingotti e delle monete d’oro da 8 grammi e segui la quotazione internazionale dell’oncia d’oro in USD. I prezzi sono forniti a scopo informativo e di confronto; il prezzo finale al dettaglio può includere costi di lavorazione, premi e imposte.</p>
    </section>
    <section>
      <h3>Sezioni dei prezzi dell’oro</h3>
      <ul>
        <li><a href="<?php echo esc_url($it_header_country_url); ?>">Gold Prices in <?php echo esc_html(isset($display_country_name) ? $display_country_name : ''); ?></a></li>
        <li><a href="<?php echo esc_url($it_header_country_url . 'gold-bars/'); ?>">Lingotti e monete d’oro</a></li>
        <li><a href="<?php echo esc_url($it_header_country_url . 'gold-index/'); ?>">Indice dell’oro in tempo reale</a></li>
        <li><a href="<?php echo esc_url($it_header_country_url . 'usd/'); ?>">USD e tassi di cambio</a></li>
      </ul>
    </section>
    <section>
      <h3>Prezzi regionali dell’oro</h3>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/it/country/eg/')); ?>">Gold Prices in Egypt</a></li>
        <li><a href="<?php echo esc_url(home_url('/it/country/sa/')); ?>">Gold Prices in Saudi Arabia</a></li>
        <li><a href="<?php echo esc_url(home_url('/it/country/ae/')); ?>">Gold Prices in il UAE</a></li>
        <li><a href="<?php echo esc_url(home_url('/it/country/kw/')); ?>">Gold Prices in Kuwait</a></li>
      </ul>
      <h3 style="margin-top:16px;">Seguici</h3>
      <ul>
        <li><a href="https://t.me/goldaltaqrer" target="_blank" rel="noopener noreferrer">Unisciti al nostro canale Telegram</a></li>
      </ul>
    </section>
    <?php
    // Show only real published English pages; never leave dead /it/# placeholder links.
    $en_footer_pages = array();
    foreach (array(
        'privacy-policy' => 'Informativa sulla privacy',
        'terms-of-use'   => 'Termini di utilizzo',
        'contact-us'     => 'Contattaci'
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
      <h3>Link importanti</h3>
      <ul>
        <?php foreach ($en_footer_pages as $footer_page) : ?>
          <li><a href="<?php echo esc_url($footer_page['url']); ?>"><?php echo esc_html($footer_page['label']); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </section>
    <?php endif; ?>
  </div>
  <div class="it-footer-bottom">All rights reserved &copy; <?php echo esc_html(function_exists('wp_date') ? wp_date('Y') : date('Y')); ?> to <a href="<?php echo esc_url($it_header_home_url); ?>">AlTaqrer Gold</a>.</div>
</footer>
<?php endif; ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
  var toggle = document.querySelector('.it-country-toggle');
  var menu = document.getElementById('it-country-menu');
  if (!toggle || !menu) return;
  toggle.addEventListener('click', function (event) {
    event.preventDefault();
    var opened = menu.classList.toggle('is-open');
    toggle.setAttribute('aria-expanded', opened ? 'true' : 'false');
  });
  document.addEventListener('click', function (event) {
    if (!event.target.closest('.it-country-wrap')) {
      menu.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
    }
  });
});
</script>
<?php wp_footer(); ?>
</body>
</html>
