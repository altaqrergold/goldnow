<?php
/* Template Name: Português — Gold Country Prices */

/** PT output localization: translate rendered text and accessible labels only. */
if (!function_exists('altaqrer_gold_pt_output_translate')) {
function altaqrer_gold_pt_output_translate($html) {
    $map = array(
        "Live foreign exchange rates for major international and regional currencies" => "Taxas de câmbio em tempo real das principais moedas internacionais e regionais",
        "International spot benchmark for one troy ounce of 24K gold, quoted in USD" => "Referência internacional à vista para uma onça troy de ouro 24 quilates, cotada em USD",
        "What weight is used for the gold coin calculation?" => "Qual peso é usado no cálculo da moeda de ouro?",
        "Does the displayed value include a dealer premium?" => "O valor exibido inclui a margem do revendedor?",
        "Sorry, the market data is currently unavailable." => "Desculpe, os dados do mercado não estão disponíveis no momento.",
        "live market price, excluding making charges" => "preço de mercado em tempo real, sem custos de fabricação",
        "How to read the local and USD prices" => "Como interpretar os preços locais e em USD",
        "Frequently asked questions" => "Perguntas frequentes",
        "Gold Bullion Bar Prices in" => "Preços das barras de ouro em",
        "Gold Price per Gram Today" => "Preço do ouro por grama hoje",
        "Join Our Telegram Channel" => "Entre no nosso canal do Telegram",
        "Excluding Making Charges" => "Sem custos de fabricação",
        "Gold Bullion Bar Prices" => "Preços das barras de ouro",
        "Gold Bars and Coins in" => "Barras e moedas de ouro em",
        "USD and Currency Rates" => "USD e taxas de câmbio",
        "Regional Gold Prices" => "Preços regionais do ouro",
        "Gold Bars and Coins" => "Barras e moedas de ouro",
        "Gold Price Sections" => "Seções de preços do ouro",
        "Gold Price Chart in" => "Gráfico do preço do ouro em",
        "About AlTaqrer Gold" => "Sobre a AlTaqrer Gold",
        "All rights reserved" => "Todos os direitos reservados",
        "Related gold prices" => "Preços do ouro relacionados",
        "Gold Coin Prices in" => "Preços das moedas de ouro em",
        "Gold Price Today in" => "Preço do ouro hoje em",
        "Global Gold Ounce" => "Onça global de ouro",
        "Gold Coin Prices" => "Preços das moedas de ouro",
        "Gold Price Chart" => "Gráfico do preço do ouro",
        "Gold Price Today" => "Preço do ouro hoje",
        "Important Links" => "Links importantes",
        "Reference date:" => "Data de referência:",
        "Live Gold Index" => "Índice do ouro em tempo real",
        "Local Currency" => "Moeda local",
        "Privacy Policy" => "Política de privacidade",
        "Gold Prices in" => "Preços do ouro em",
        "All Countries" => "Todos os países",
        "Weight / Type" => "Peso / Tipo",
        "Terms of Use" => "Termos de uso",
        "Gold Prices" => "Preços do ouro",
        "Live Prices" => "Preços em tempo real",
        "Coin Purity" => "Pureza da moeda",
        "Gold Price" => "Preço do ouro",
        "Gold Index" => "Índice do ouro",
        "Important:" => "Importante:",
        "Contact Us" => "Fale conosco",
        "Gold Bars" => "Barras de ouro",
        "Gold Coin" => "Moeda de ouro",
        "Countries" => "Países",
        "USD Rates" => "Cotações do USD",
        "Follow Us" => "Siga-nos",
        "What does" => "O que significa",
        "Today in" => "hoje em",
        "per Gram" => "por grama",
        "Price" => "Preço",
        "Home" => "Início",
        "Yes." => "Sim.",
        "Important Notice:" => "Aviso importante:",
        "Live Price" => "Preço em tempo real",
        "Highest Price" => "Preço máximo",
        "Lowest Price" => "Preço mínimo",
        "Change" => "Variação",
        "Live Update" => "Atualização em tempo real",
        "Price in USD" => "Preço em USD",
        "Gold Ounce in Local Currency" => "Onça de ouro em moeda local",
        "Gold Coin Price" => "Preço da moeda de ouro",
        "US Dollar Rate" => "Cotação do dólar americano",
        "US Dollar Rate Today" => "Cotação do dólar hoje",
        "Gold Price in USD" => "Preço do ouro em USD",
        "Egyptian Pound" => "Libra egípcia",
        "US Dollar" => "Dólar americano",
        "Most Traded" => "Mais negociado",
        "Gold Price" => "Preço do ouro",
        "home" => "Início",
        "Barra de ouro — 1 g" => "Barra de ouro — 1 grama",
        "Barra de ouro — 2,5 g" => "Barra de ouro — 2,5 gramas",
        "Barra de ouro — 5 g" => "Barra de ouro — 5 gramas",
        "Barra de ouro — 10 g" => "Barra de ouro — 10 gramas",
        "Barra de ouro — 20 g" => "Barra de ouro — 20 gramas",
        "Barra de ouro — 50 g" => "Barra de ouro — 50 gramas",
        "Barra de ouro — 100 g" => "Barra de ouro — 100 gramas",
        "Onça troy (31,1 g)" => "Onça troy (31,1 g)",
        "24K Gold" => "Ouro 24 quilates",
        "22K Gold" => "Ouro 22 quilates",
        "21K Gold" => "Ouro 21 quilates",
        "18K Gold" => "Ouro 18 quilates",
        "14K Gold" => "Ouro 14 quilates",
        "12K Gold" => "Ouro 12 quilates",
        "Gold Gram" => "Grama de ouro",
        "Gold Ounce" => "Onça de ouro",
        "Prices" => "Preços",
        "Changes" => "Alterações",
        "No." => "Não.",
        "Why the global gold ounce matters" => "Por que a onça global do ouro é importante",
        "From the global ounce to a local gram price" => "Da onça global ao preço local por grama",
        "Gold is commonly quoted in international markets by the troy ounce. Traders, refiners, financial services, and bullion dealers use this benchmark to compare the value of gold across markets. Changes in the US dollar, interest-rate expectations, inflation outlook, central-bank activity, and investor demand can all influence the international gold price. These are general market drivers, not a claim that any one factor caused today's movement." => "Nos mercados internacionais, o ouro é normalmente cotado por onça troy. Operadores, refinarias, serviços financeiros e comerciantes de metais preciosos utilizam esta referência para comparar o valor do ouro entre mercados. As alterações do dólar dos Estados Unidos, as expectativas sobre as taxas de juro, as perspetivas de inflação, a atividade dos bancos centrais e a procura dos investidores podem influenciar o preço internacional do ouro. Estes são fatores gerais do mercado, não uma afirmação de que algum deles tenha causado a variação de hoje.",
        "For a simple reference comparison, a troy ounce contains about 31.1 grams. The local price per gram also depends on the selected currency conversion and local market conditions. The global ounce figure above remains in USD so that it can be compared consistently with international quotations." => "Como referência, uma onça troy contém cerca de 31,1 gramas. O preço local por grama também depende da conversão para a moeda selecionada e das condições do mercado local. O valor global por onça apresentado acima permanece em USD para permitir uma comparação consistente com as cotações internacionais.",
        "One troy ounce is approximately 31.1035 grams. The page uses 31.1 grams for its displayed reference calculation." => "Uma onça troy equivale a aproximadamente 31,1035 gramas. Esta página utiliza 31,1 gramas no cálculo de referência apresentado.",
        "No. This page shows the international gold ounce benchmark in USD only. Local-currency values are shown separately in the country gold-price tables where applicable." => "Não. Esta página apresenta apenas a referência internacional da onça de ouro em USD. Quando aplicável, os valores na moeda local são apresentados separadamente nas tabelas nacionais de preços do ouro.",
        "The calculation multiplies the relevant per-gram gold value by 8 grams. For the common 21K reference, the displayed estimate uses the 21K gram price multiplied by eight. The 22K and 24K comparison values use their respective gram prices at the same weight. This preserves the site's established 8-gram coin calculation." => "O cálculo multiplica o valor correspondente do ouro por grama por 8 gramas. Para a referência comum de 21 quilates, a estimativa apresentada utiliza o preço por grama de 21K multiplicado por oito. Os valores de comparação de 22K e 24K utilizam os respetivos preços por grama para o mesmo peso. Assim, mantém-se o cálculo de 8 gramas da moeda já utilizado pelo site.",
        "Actual coin prices may differ because of minting, condition, design, scarcity, dealer premiums, and local taxes. The values here represent the gold-content reference and should not be treated as a guaranteed transaction quote." => "O preço real de uma moeda pode variar consoante a cunhagem, o estado de conservação, o design, a raridade, a margem do vendedor e os impostos locais. Os valores apresentados representam uma referência do conteúdo de ouro e não devem ser considerados uma proposta de transação garantida.",
        "Gold bars are commonly valued using the 24K gold benchmark." => "As barras de ouro são normalmente avaliadas com base na referência do ouro de 24 quilates.",
        "For a straightforward estimate, multiply the 24K gram benchmark by the bar's weight. The resulting figure represents the reference value of the gold content before any fabrication premium, assay or hallmarking fee, dealer margin, delivery cost, or tax. A bar's final selling price can therefore be higher than the raw calculation shown on this page." => "Para obter uma estimativa simples, multiplique a referência por grama do ouro de 24 quilates pelo peso da barra. O resultado representa o valor de referência do conteúdo de ouro antes de quaisquer custos de fabrico, análise ou certificação, margem do vendedor, entrega ou impostos. Por isso, o preço final de venda pode ser superior ao cálculo do valor do ouro apresentado nesta página.",
        "Brand, certification, manufacturing costs, dealer premiums, availability, and local taxes can affect the final selling price." => "A marca, a certificação, os custos de fabrico, a margem do vendedor, a disponibilidade e os impostos locais podem influenciar o preço final de venda.",
        "The index is a convenient snapshot of gold values across common purities and currencies. It helps readers compare the 24K bullion benchmark with the lower-karat values commonly used for jewellery. Local values are derived from the reference gold price and the available exchange-rate data; the USD figures allow comparison with the international market." => "O índice apresenta uma visão geral dos valores do ouro nas purezas e moedas mais comuns. Ajuda a comparar a referência do ouro de investimento de 24 quilates com os valores de menor quilatagem habitualmente utilizados em joalharia. Os valores locais são calculados com base no preço de referência do ouro e nos dados cambiais disponíveis; os valores em USD permitem a comparação com o mercado internacional.",
        "Each karat contains a different proportion of pure gold. Lower-purity alloys have a lower raw-gold value per gram than 24K gold, before other costs are considered." => "Cada quilatagem contém uma proporção diferente de ouro puro. Antes de considerar outros custos, as ligas de menor pureza têm um valor de ouro por grama inferior ao do ouro de 24 quilates.",
        "A local gold-price estimate combines an international gold benchmark with a currency conversion and, in real retail markets, any applicable local premiums, taxes, or costs. This page lists selected currency comparisons to help readers understand the conversion context. Rates are informational and may differ from bank, cash-market, card, or remittance rates available to an individual customer." => "Uma estimativa local do preço do ouro combina uma referência internacional com a conversão cambial e, no comércio a retalho, eventuais margens, impostos ou custos locais. Esta página apresenta algumas comparações entre moedas para ajudar a compreender o contexto da conversão. As taxas são informativas e podem diferir das taxas bancárias, de casas de câmbio, cartões ou serviços de transferência de dinheiro.",
        "No. It is the latest available reference used by the site. Banks and exchange providers may apply different buy and sell rates, spreads, or fees." => "Não. É a referência mais recente disponível utilizada pelo site. Bancos e prestadores de câmbio podem aplicar diferentes taxas de compra e venda, margens ou comissões.",
        "Because international gold is commonly quoted in US dollars, converting that benchmark into local currency is one of the factors used to estimate local gold values." => "Como o ouro internacional é normalmente cotado em dólares dos Estados Unidos, a conversão dessa referência para a moeda local é um dos fatores utilizados para estimar o valor local do ouro.",
        "Gold Price Charts" => "Gráficos do preço do ouro",
        "Track the international gold spot price in US dollars (USD) using the global XAU/USD market chart. This is a worldwide benchmark, not a country-specific retail price." => "Acompanhe o preço internacional à vista do ouro em dólares dos Estados Unidos (USD) através do gráfico global XAU/USD. Trata-se de uma referência mundial, não de um preço de retalho específico de um país.",
        "How many grams are in a gold troy ounce?" => "Quantos gramas tem uma onça troy de ouro?",
        "Is this ounce price converted to local currency?" => "Este preço por onça é convertido para a moeda local?",
        "Does the index show a guaranteed market trading price?" => "O índice apresenta um preço de mercado garantido?",
        "Does the displayed value include a dealer premium?" => "O valor apresentado inclui a margem do revendedor?",
        "Gold Prices in Egypt" => "Preços do ouro no Egito",
        "Gold Prices in Saudi Arabia" => "Preços do ouro na Arábia Saudita",
        "Gold Prices in the UAE" => "Preços do ouro nos Emirados Árabes Unidos",
        "Gold Prices in Kuwait" => "Preços do ouro no Kuwait",
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
        $token = 'ALTQRGOLDPTBLOCK' . count($protected) . 'TOKEN';
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
ob_start('altaqrer_gold_pt_output_translate');

/**
 * Standalone English header for the country gold-price template.
 * The Arabic theme header and navigation are not loaded here.
 */
$pt_header_term = get_queried_object();
$pt_header_country_slug = (is_object($pt_header_term) && !empty($pt_header_term->slug))
    ? sanitize_title($pt_header_term->slug)
    : '';
if ($pt_header_country_slug === '' && is_object($pt_header_term) && !empty($pt_header_term->term_id)) {
    $pt_header_country_slug = strtolower((string) get_term_meta((int) $pt_header_term->term_id, 'country_code', true));
}
if ($pt_header_country_slug === '') {
    $pt_header_country_slug = 'eg';
}
$pt_header_country_url = home_url('/pt/country/' . rawurlencode($pt_header_country_slug) . '/');
$pt_header_home_url = home_url('/pt/');
$pt_header_accent = get_theme_mod('infi_default_color', '#ffb301');
$pt_header_logo_id = (int) get_theme_mod('custom_logo');
$pt_header_is_app = (isset($_GET['view']) && sanitize_text_field(wp_unslash($_GET['view'])) === 'app');
?>
<!DOCTYPE html>
<html lang="pt" dir="ltr">
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
    'url' => $pt_header_home_url,
    'sameAs' => array('https://www.instagram.com/altaqrergold', 'https://www.facebook.com/altaqrergold')
), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>
<style>
html, body { direction:ltr; text-align:left; }
body { background:#f5d771 !important; max-width:100vw; overflow-x:hidden; position:relative; font-family:Inter,Arial,sans-serif; }
.pt-site-header { position:relative; z-index:1000; background:#1a1a1a; border-bottom:4px solid <?php echo esc_attr($pt_header_accent); ?>; color:#fff; }
.pt-site-header-inner { max-width:1200px; width:95%; margin:0 auto; min-height:74px; display:flex; align-items:center; justify-content:space-between; gap:18px; padding:10px 0; }
.en-brand { display:flex; align-items:center; gap:10px; color:#fff; text-decoration:none; font-weight:800; font-size:20px; white-space:nowrap; }
.en-brand img { max-width:54px; max-height:54px; width:auto; height:auto; object-fit:contain; }
.pt-main-nav { display:flex; align-items:center; justify-content:flex-end; gap:8px; flex-wrap:wrap; }
.pt-main-nav a, .pt-country-toggle { color:#fff; text-decoration:none; border:1px solid rgba(255,255,255,.15); background:transparent; border-radius:6px; padding:9px 12px; font:600 13px Inter,Arial,sans-serif; cursor:pointer; }
.pt-main-nav a:hover, .pt-country-toggle:hover { color:#1a1a1a; background:<?php echo esc_attr($pt_header_accent); ?>; }
.pt-country-wrap { position:relative; }
.pt-country-menu { display:none; position:absolute; top:calc(100% + 6px); left:0; min-width:210px; background:#202329; border:1px solid #444; border-radius:7px; padding:7px; box-shadow:0 8px 24px rgba(0,0,0,.25); z-index:10000; }
.pt-country-menu a { display:block; border:0; border-radius:4px; text-align:left; }
.pt-country-menu.is-open { display:block; }
@media(max-width:760px) { .pt-site-header-inner { align-items:flex-start; flex-direction:column; } .pt-main-nav { justify-content:flex-start; width:100%; } .pt-main-nav a,.pt-country-toggle { padding:8px 10px; } }
@media(max-width:480px) { .pt-main-nav { gap:6px; } .pt-main-nav a,.pt-country-toggle { font-size:12px; } }
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
.pt-seo-article { max-width:900px; width:95%; box-sizing:border-box; margin:28px auto; padding:24px; color:#e5e7eb; background:#1f2126; border:1px solid #343944; border-left:5px solid <?php echo esc_attr($pt_header_accent); ?>; border-radius:9px; line-height:1.85; font-size:15px; }
.pt-seo-article h2,.pt-seo-article h3 { color:#fff; line-height:1.35; }
.pt-seo-article h2 { font-size:23px; margin:0 0 14px; }
.pt-seo-article h3 { font-size:18px; margin:22px 0 8px; }
.pt-seo-article p { margin:0 0 13px; }
.pt-seo-article a { color:<?php echo esc_attr($pt_header_accent); ?>; text-decoration:none; font-weight:700; }
.pt-seo-article a:hover { text-decoration:underline; }
.pt-seo-article details { border-top:1px solid #3a3f4d; padding:11px 0; }
.pt-seo-article summary { cursor:pointer; color:#fff; font-weight:700; }
.pt-seo-article details p { margin:8px 0 0; color:#cbd5e1; }
.pt-site-footer { margin-top:32px; background:#1a1a1a; color:#eee; border-top:4px solid <?php echo esc_attr($pt_header_accent); ?>; }
.pt-site-footer-inner { max-width:1200px; width:95%; margin:0 auto; padding:28px 0 18px; display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:24px; }
.pt-site-footer h3 { color:#e0b94f; font-size:16px; margin:0 0 12px; }
.pt-site-footer p,.pt-site-footer li { color:#c8c8c8; font-size:13px; line-height:1.8; }
.pt-site-footer ul { list-style:none; padding:0; margin:0; }
.pt-site-footer a { color:#e0b94f; text-decoration:none; }
.pt-site-footer a:hover { text-decoration:underline; }
.pt-footer-bottom { text-align:center; border-top:1px solid #393939; padding:15px 10px; font-size:13px; color:#c8c8c8; }
@media(max-width:768px) { .pt-site-footer-inner { grid-template-columns:1fr; gap:18px; text-align:center; } }
</style>
</head>
<body <?php body_class('pt-gold-template'); ?>>
<?php if (function_exists('wp_body_open')) { wp_body_open(); } ?>

<?php if (!$pt_header_is_app) : ?>
<header class="pt-site-header">
  <div class="pt-site-header-inner">
    <a class="en-brand" href="<?php echo esc_url($pt_header_home_url); ?>" aria-label="AlTaqrer Gold home">
      <?php if ($pt_header_logo_id) : ?>
        <?php echo wp_get_attachment_image($pt_header_logo_id, 'full', false, array('alt' => 'AlTaqrer Gold')); ?>
      <?php else : ?>
        <span>AlTaqrer Gold</span>
      <?php endif; ?>
    </a>
    <nav class="pt-main-nav" aria-label="Main navigation">
      <a href="<?php echo esc_url($pt_header_home_url); ?>">Início</a>
      <a href="<?php echo esc_url($pt_header_country_url); ?>">Preços do ouro</a>
      <a href="<?php echo esc_url($pt_header_country_url . 'gold-bars/'); ?>">Barras de ouro</a>
      <a href="<?php echo esc_url($pt_header_country_url . 'gold-index/'); ?>">Índice do ouro</a>
      <a href="<?php echo esc_url($pt_header_country_url . 'usd/'); ?>">Cotações do USD</a>
      <div class="pt-country-wrap">
        <button class="pt-country-toggle" type="button" aria-expanded="false" aria-controls="pt-country-menu">Countries ▾</button>
        <div class="pt-country-menu" id="pt-country-menu">
          <a href="<?php echo esc_url(home_url('/pt/country/eg/')); ?>">Egito</a>
          <a href="<?php echo esc_url(home_url('/pt/country/sa/')); ?>">Arábia Saudita</a>
          <a href="<?php echo esc_url(home_url('/pt/country/ae/')); ?>">Emirados Árabes Unidos</a>
          <a href="<?php echo esc_url(home_url('/pt/country/kw/')); ?>">Kuwait</a>
          <a href="<?php echo esc_url($pt_header_home_url); ?>">Todos os países</a>
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
if (!$pt_header_is_app && function_exists('goldnow_display_ad')) :
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
if (!function_exists('altaqrer_gold_pt_translate_shortcode_html')) {
    function altaqrer_gold_pt_translate_shortcode_html($html, $translations = array()) {
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
        ? (string) altaqrer_ml_country_name($current_term, 'pt')
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
    $currency_labels_pt = array(
        'USD'=>'Dólar americano','EUR'=>'Euro','GBP'=>'Libra esterlina','EGP'=>'Libra egípcia','SAR'=>'Rial saudita','AED'=>'Dirham dos Emirados Árabes Unidos',
        'KWD'=>'Dinar kuwaitiano','QAR'=>'Rial do Catar','BHD'=>'Dinar bareinita','OMR'=>'Rial omanense','JOD'=>'Jordanian Dinar',
        'IQD'=>'Iraqi Dinar','MAD'=>'Moroccan Dirham','TND'=>'Tunisian Dinar','DZD'=>'Algerian Dinar','TRY'=>'Turkish Lira',
        'JPY'=>'Iene japonês','CHF'=>'Swiss Franc','CAD'=>'Canadian Dollar','AUD'=>'Australian Dollar','NZD'=>'New Zealand Dollar',
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
    $currency_label = isset($currency_labels_pt[$country_currency]) ? $currency_labels_pt[$country_currency] : ($country_currency !== '' ? $country_currency : 'Moeda local');
    $today = function_exists('wp_date') ? wp_date('d/m/Y') : date('d/m/Y');

    // Build a text-only translation dictionary for legacy shortcodes that still use Arabic labels.
    $shortcode_translation_map_pt = array(
        'ذهب عيار 24' => 'Ouro de 24 quilates', 'ذهب عيار 22' => 'Ouro de 22 quilates', 'ذهب عيار 21' => 'Ouro de 21 quilates',
        'ذهب عيار 18' => 'Ouro de 18 quilates', 'ذهب عيار 14' => 'Ouro de 14 quilates', 'ذهب عيار 12' => 'Ouro de 12 quilates',
        'عيار 24' => 'Ouro de 24 quilates', 'عيار 22' => 'Ouro de 22 quilates', 'عيار 21' => 'Ouro de 21 quilates', 'عيار 18' => 'Ouro de 18 quilates', 'عيار 14' => 'Ouro de 14 quilates', 'عيار 12' => 'Ouro de 12 quilates',
        'جرام عيار 24' => 'Ouro de 24 quilates por grama', 'جرام عيار 22' => 'Ouro de 22 quilates por grama', 'جرام عيار 21' => 'Ouro de 21 quilates por grama',
        'جرام عيار 18' => 'Ouro de 18 quilates por grama', 'جرام عيار 14' => 'Ouro de 14 quilates por grama',
        'جرام عيار 12' => 'Ouro de 12 quilates por grama',
        'الأونصة العالمية' => 'Onça global de ouro', 'أونصة الذهب العالمية' => 'Onça global de ouro',
        'الأونصة بالعملة المحلية' => 'Gold Ounce in Local Currency', 'أونصة الذهب بالعملة المحلية' => 'Gold Ounce in Local Currency',
        'جنيه الذهب' => 'Moeda de ouro', 'الجنيه الذهب' => 'Moeda de ouro', 'سعر الجنيه الذهب' => 'Gold Coin Price',
        'السعر بالدولار' => 'Price in USD', 'سعر الدولار' => 'US Dollar Rate', 'سعر الدولار اليوم' => 'US Dollar Rate Today',
        'السعر بالعملة المحلية' => 'Price in Local Currency', 'سعر الذهب بالدولار' => 'Gold Price in USD',
        'جنيه مصري' => 'Egyptian Pound', 'الدولار الأمريكي' => 'US Dollar', 'دولار أمريكي' => 'US Dollar',
        'الأكثر تداولاً' => 'Mais negociado',
        'الأكثر تداولا' => 'Mais negociado',
        'انضم إلى قناتنا على تيليجرام' => 'Entre no nosso canal do Telegram', 'انضم إلى قناتنا على تليجرام' => 'Entre no nosso canal do Telegram', 'انضم لقناتنا على تيليجرام' => 'Entre no nosso canal do Telegram', 'انضم لقناتنا على تليجرام' => 'Entre no nosso canal do Telegram',
        'تنويه هام:' => 'Important Notice:', 'الوزن / النوع' => 'Peso / Tipo', 'السعر' => 'Preço',
        'السعر الآن' => 'Live Price', 'أعلى سعر' => 'Highest Price', 'أقل سعر' => 'Lowest Price',
        'التغير' => 'Change', 'التحديث اللحظي' => 'Live Update', 'بدون مصنعية' => 'Sem custos de fabricação',
        'سعر الذهب' => 'Gold Price', 'أسعار الذهب' => 'Preços do ouro', 'العملة المحلية' => 'Moeda local'
    );

    // Reuse the existing functions.php dictionaries where possible without modifying Arabic globals.
    global $currency_names, $carat_labels;
    if (is_array($currency_names)) {
        foreach ($currency_names as $code => $arabic_label) {
            if (isset($currency_labels_pt[$code]) && is_string($arabic_label) && $arabic_label !== '') {
                $shortcode_translation_map_pt[$arabic_label] = $currency_labels_pt[$code];
            }
        }
    }
    if (is_array($carat_labels)) {
        $carat_english = array('24k'=>'Ouro de 24 quilates','22k'=>'Ouro de 22 quilates','21k'=>'Ouro de 21 quilates','18k'=>'Ouro de 18 quilates','14k'=>'Ouro de 14 quilates','12k'=>'Ouro de 12 quilates','24k_oz'=>'Gold Ounce','gold_pound'=>'Moeda de ouro');
        foreach ($carat_labels as $key => $arabic_label) {
            if (isset($carat_english[$key]) && is_string($arabic_label) && $arabic_label !== '') {
                $shortcode_translation_map_pt[$arabic_label] = $carat_english[$key];
            }
        }
    }
    if ($arabic_country_name !== '' && $arabic_country_name !== $display_country_name) {
        $shortcode_translation_map_pt[$arabic_country_name] = $display_country_name;
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
      <button class="gold-tab-btn active" type="button" data-tab="now">Preços em tempo real</button>
      <button class="gold-tab-btn" type="button" data-tab="buy-sell">Barras de ouro</button>
      <button class="gold-tab-btn" type="button" data-tab="indicator">Gráfico do preço do ouro</button>
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
        if ( $gold_view == '24k' ) { echo 'Preço do ouro de 24 quilates hoje em ' . esc_html($display_country_name); }
        elseif ( $gold_view == '22k' ) { echo 'Preço do ouro de 22 quilates hoje em ' . esc_html($display_country_name); }
        elseif ( $gold_view == '21k' ) { echo 'Preço do ouro de 21 quilates por grama hoje em ' . esc_html($display_country_name); }
        elseif ( $gold_view == '18k' ) { echo 'Preço do ouro de 18 quilates hoje em ' . esc_html($display_country_name); }
        elseif ( $gold_view == '14k' ) { echo 'Preço do ouro de 14 quilates hoje em ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'ounce' ) { echo 'Preço global da onça de ouro hoje (USD)'; }
        elseif ( $gold_view == 'coin' ) { echo 'Preço da moeda de ouro hoje em ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'gold-bars' ) { echo 'Preços de barras de ouro hoje em ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'gold-index' ) { echo 'Índice do mercado de ouro em tempo real hoje em ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'usd' ) { echo 'Taxas de câmbio do dólar americano e de outras moedas hoje em ' . esc_html($display_country_name); }
        else { echo 'Preços do ouro em ' . esc_html($display_country_name) . ' hoje'; }?>
        </h2>
        
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align: left; direction: ltr;">
          <?php 
          if ($gold_view == 'usd') { echo 'Taxas de câmbio em tempo real das principais moedas internacionais e regionais'; }
          elseif ($gold_view == 'ounce') { echo 'Referência internacional à vista para uma onça troy de ouro 24 quilates, cotada em USD'; }
          else { echo 'Gold Price in ' . esc_html($display_country_name) . ' — live market price, excluding making charges'; }
          ?>
        </h3>

        <!-- Gold Price Cards Shortcode Section -->
        <section id="gold-cards" class="mb-4">
            <?php echo altaqrer_gold_pt_translate_shortcode_html(do_shortcode('[infi_gold_cards currency="' . esc_attr($country_currency) . '" currency_label="' . esc_attr($currency_label) . '"]'), $shortcode_translation_map_pt); ?>
        </section>

        <!-- Gold Information Panels Shortcode Section -->
        <section id="gold-info-boxes" class="mb-4">
            <?php echo altaqrer_gold_pt_translate_shortcode_html(do_shortcode('[infi_gold_info_boxes currency="' . esc_attr($country_currency) . '"]'), $shortcode_translation_map_pt); ?>
        </section>
	  </div>
		
      <!-- 2. Gold Bullion Bars and Coins Table Pane -->
      <div id="tab-buy-sell" class="gold-tab-pane" style="display:none; text-align: left; direction: ltr;">
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align:left !important; direction:ltr !important;">
            <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
            <img alt="Barras e moedas de ouro em <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; margin-right: 5px;">
            Barras e moedas de ouro em <?php echo esc_html($display_country_name); ?>
        </h2>
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align:left !important; direction:ltr !important;">
          Preços mais recentes de barras e moedas de ouro (sem custos de fabrico)
        </h3>

        <?php if (function_exists('infi_get_latest_gold_prices')) { ?>
            <!-- A) Gold Bars Price Table -->
            <section id="sabika-price" class="gold-section mt-4">
                <div class="section-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <h4>Preços das barras de ouro em <?php echo esc_html($display_country_name); ?></h4>
                    <span class="date-badge" style="background: #262930; padding: 4px 10px; border-radius: 4px; font-size: 13px;"><?php echo esc_html($today); ?></span>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>Peso / Tipo</th>
                                <th>Preço (<?php echo $currency_label; ?>)</th>
                                <th>Preço (USD)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $weights = [
                                ['weight' => 1, 'name' => 'Barra de ouro — 1 g'],
                                ['weight' => 2.5, 'name' => 'Barra de ouro — 2,5 g'],
                                ['weight' => 5, 'name' => 'Barra de ouro — 5 g'],
                                ['weight' => 10, 'name' => 'Barra de ouro — 10 g'],
                                ['weight' => 20, 'name' => 'Barra de ouro — 20 g'],
                                ['weight' => 31.1, 'name' => 'Onça troy (31,1 g)'],
                                ['weight' => 50, 'name' => 'Barra de ouro — 50 g'],
                                ['weight' => 100, 'name' => 'Barra de ouro — 100 g'],
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
                    <h4>Preços das moedas de ouro em <?php echo esc_html($display_country_name); ?></h4>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>Pureza da moeda</th>
                                <th>Preço (<?php echo $currency_label; ?>)</th>
                                <th>Preço (USD)</th>
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
                                    <td class="font-bold">Moeda de ouro de 8 g (<?php echo $carat_num; ?> quilates)</td>
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
                <strong>Importante:</strong> The prices shown above for bars and coins represent Os preços apresentados acima para barras e moedas representam apenas o valor do ouro; não incluem custos de fabrico, taxas de marcação nem impostos.
            </div>

        <?php } else { ?>
            <p style="text-align:center; padding:20px;">Desculpe, os dados do mercado não estão disponíveis no momento.</p>
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
          echo altaqrer_gold_pt_translate_shortcode_html(do_shortcode($en_chart_shortcode), $shortcode_translation_map_pt);
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
        'عيار 24': 'Ouro de 24 quilates', 'عيار 22': 'Ouro de 22 quilates', 'عيار 21': 'Ouro de 21 quilates',
        'عيار 18': 'Ouro de 18 quilates', 'عيار 14': 'Ouro de 14 quilates', 'عيار 12': 'Ouro de 12 quilates',
        'الأونصة العالمية': 'Global Gold Ounce (USD)',
        'الأونصة بالعملة المحلية': 'Gold Ounce in Local Currency',
        'جنيه الذهب': 'Moeda de ouro', 'سعر الدولار': 'US Dollar Exchange Rate',
        'جنيه مصري': 'Egyptian Pound', 'دولار أمريكي': 'US Dollar',
        'انضم إلى قناتنا على تيليجرام': 'Entre no nosso canal do Telegram',
        'انضم إلى قناتنا على تليجرام': 'Entre no nosso canal do Telegram'
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
            💵 Taxas de câmbio em tempo real face ao <?php echo esc_html($currency_label); ?> in <?php echo esc_html($display_country_name); ?> <img alt="Flag of <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:
        </strong>
        
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; text-align: left; direction: ltr;">
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'USD') : ?>
                    <div><img alt="Flag of United States" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_pt['USD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                    <div><img alt="Flag of United Kingdom" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_pt['GBP']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                    <div><img alt="Flag of Saudi Arabia" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_pt['SAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>

                <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                    <div><img alt="Flag of Bahrain" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_pt['BHD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                    <div><img alt="Flag of Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_pt['OMR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                    <div><img alt="Flag of European Union" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_pt['EUR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                    <div><img alt="Flag of United Arab Emirates" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_pt['AED']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                    <div><img alt="Flag of Kuwait" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_pt['KWD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                    <div><img alt="Flag of Qatar" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_pt['QAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                    <div><img alt="Flag of Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_pt['JPY']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
        </div>
        <p style="margin: 15px 0 0 0; font-size: 12px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 8px; text-align: left; direction: ltr;">* As atualizações são realizadas automaticamente por meio de índices oficiais do mercado em tempo real. Recomendamos instalar a <strong>aplicação oficial de preços do ouro</strong>.</p>
    </div>
<?php endif; ?>

<div class="altaqrer-silo-links" style="margin: 25px auto; padding: 15px; background: #17191d; border: 1px solid #3a3f4d; border-radius: 6px; text-align: center; max-width: 800px; width: 95%; box-sizing: border-box; clear: both; direction: ltr;">
    <?php
    // Reuse the already-resolved English country URL for every tab link.
    $base_country_url = $pt_header_country_url;

    $active_bg = get_theme_mod('infi_default_color', '#ffb301');
    $active_color = '#000000';
    $default_bg = '#262930';
    $default_color = '#ffffff';

    $tabs = [
        ['key' => '',          'pt' => 'Gold Price'],
        ['key' => '24k',       'pt' => '24K'],
        ['key' => '22k',       'pt' => '22K'],
        ['key' => '21k',       'pt' => '21K'],
        ['key' => '18k',       'pt' => '18K'],
        ['key' => '14k',       'pt' => '14K'],
        ['key' => 'ounce',     'pt' => 'Gold Ounce'],
        ['key' => 'coin',      'pt' => 'Moeda de ouro'],
        ['key' => 'gold-bars', 'pt' => 'Barras de ouro'],
        ['key' => 'gold-index','pt' => 'Índice do ouro'],
        ['key' => 'usd',       'pt' => 'USD e taxas de câmbio'],
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
            $label = $tab['pt'];
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
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Barra de ouro — 1 g:</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_24k_local * 1, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 1, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Barra de ouro — 2,5 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 2.5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 2.5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Barra de ouro — 5 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Barra de ouro — 10 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 10, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 10, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Barra de ouro — 20 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 20, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 20, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Troy Ounce (31.1 Grams):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($ounce_price_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Barra de ouro — 50 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 50, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 50, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Barra de ouro — 100 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 100, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 100, 2); ?> USD</small></div>
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
                            <div><img alt="Flag of US" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_pt['USD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                            <div><img alt="Flag of UK" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_pt['GBP']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                            <div><img alt="Flag of SA" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_pt['SAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                            <div><img alt="Flag of BH" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_pt['BHD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                            <div><img alt="Flag of Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_pt['OMR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                            <div><img alt="Flag of EU" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_pt['EUR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                            <div><img alt="Flag of AE" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_pt['AED']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                            <div><img alt="Flag of KW" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_pt['KWD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                            <div><img alt="Flag of QA" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_pt['QAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                            <div><img alt="Flag of Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_pt['JPY']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
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
    $pt_seo_base = home_url('/pt/country/' . rawurlencode($pt_header_country_slug) . '/');
    $pt_seo_price_map = array(
        '24k' => array($price_24k_local, $price_24k_usd),
        '22k' => array($price_22k_local, $price_22k_usd),
        '21k' => array($price_21k_local, $price_21k_usd),
        '18k' => array($price_18k_local, $price_18k_usd),
        '14k' => array($price_14k_local, $price_14k_usd)
    );
?>
<article class="pt-seo-article" aria-labelledby="en-seo-title">
<?php if (isset($pt_seo_price_map[$gold_view])) :
    $en_active_price_local = $pt_seo_price_map[$gold_view][0];
    $en_active_price_usd = $pt_seo_price_map[$gold_view][1];
    $pt_karat = strtoupper($gold_view);
?>
    <h2 id="en-seo-title"><?php echo esc_html($pt_karat); ?> Gold Price Today in <?php echo esc_html($display_country_name); ?> per Gram</h2>
    <p>Follow the latest <strong><?php echo esc_html($pt_karat); ?> gold price today in <?php echo esc_html($display_country_name); ?></strong> with the live reference shown above. The current indicative value is <strong><?php echo number_format($en_active_price_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> per gram, equivalent to approximately <strong><?php echo number_format($en_active_price_usd, 2); ?> USD</strong>. These figures are calculated from the latest available 24K reference price, the purity factor for <?php echo esc_html($pt_karat); ?> gold, and the latest available currency conversion used by the site.</p>
    <h3>What does <?php echo esc_html($pt_karat); ?> gold mean?</h3>
    <p>Karat indicates the proportion of pure gold in an alloy. 24K is treated as the pure-gold reference, while lower karats contain a greater share of other metals. The <?php echo esc_html($pt_karat); ?> rate therefore reflects its gold content rather than the finished retail price of a jewellery item. The final shop price may also include workmanship, retailer premiums, taxes, and other local charges that are not included in the raw market value displayed here.</p>
    <h3>Como interpretar os preços locais e em USD</h3>
    <p>The local-currency figure helps compare the reference value in <?php echo esc_html($display_country_name); ?>, while the USD equivalent makes it easier to compare the same gold content with international quotations. Local prices can move when the global gold benchmark changes, when exchange rates change, or when local market conditions affect premiums. The figures on this page are indicative reference values, not a guaranteed buy-back or retail offer.</p>
    <h3>Preços do ouro relacionados</h3>
    <p>Compare this rate with <a href="<?php echo esc_url($pt_seo_base . '24k/'); ?>">24K gold</a>, <a href="<?php echo esc_url($pt_seo_base . '21k/'); ?>">21K gold</a>, <a href="<?php echo esc_url($pt_seo_base . 'gold-bars/'); ?>">gold bar prices</a>, and the <a href="<?php echo esc_url($pt_seo_base . 'gold-index/'); ?>">live gold market index</a> for a broader view of the market.</p>
    <h3>Perguntas frequentes</h3>
    <details><summary>Is the displayed <?php echo esc_html($pt_karat); ?> price the final jewellery shop price?</summary><p>No. It is an indicative raw-gold reference and excludes workmanship, retailer premiums, taxes, and any other charges that may apply to a finished item.</p></details>
    <details><summary>Why is the USD equivalent different from the local price?</summary><p>The two values use different currencies. The local figure is converted using the latest available exchange-rate data used by the site; the USD figure represents the corresponding gold value in US dollars.</p></details>
<?php elseif ($gold_view === 'ounce') : ?>
    <h2 id="en-seo-title">Global Gold Ounce Price Today in USD</h2>
    <p>The international gold ounce reference on this page is <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong> for one troy ounce of approximately 31.1 grams of 24K gold. This is the <strong>global gold spot benchmark</strong>, quoted in US dollars. It is deliberately not presented as a country-specific local-currency ounce price; local gram prices are converted separately for the selected country.</p>
    <h3>Why the global gold ounce matters</h3>
    <p>Gold is commonly quoted in international markets by the troy ounce. Traders, refiners, financial services, and bullion dealers use this benchmark to compare the value of gold across markets. Changes in the US dollar, interest-rate expectations, inflation outlook, central-bank activity, and investor demand can all influence the international gold price. These are general market drivers, not a claim that any one factor caused today's movement.</p>
    <h3>From the global ounce to a local gram price</h3>
    <p>For a simple reference comparison, a troy ounce contains about 31.1 grams. The local price per gram also depends on the selected currency conversion and local market conditions. The global ounce figure above remains in USD so that it can be compared consistently with international quotations.</p>
    <p>Continue to the <a href="<?php echo esc_url($pt_seo_base); ?>">gold price in <?php echo esc_html($display_country_name); ?></a>, review <a href="<?php echo esc_url($pt_seo_base . '24k/'); ?>">24K gold per gram</a>, or open the <a href="<?php echo esc_url($pt_seo_base . 'gold-index/'); ?>">gold market index</a>.</p>
    <h3>Perguntas frequentes</h3>
    <details><summary>How many grams are in a gold troy ounce?</summary><p>One troy ounce is approximately 31.1035 grams. The page uses 31.1 grams for its displayed reference calculation.</p></details>
    <details><summary>Is this ounce price converted to local currency?</summary><p>No. This page shows the international gold ounce benchmark in USD only. Local-currency values are shown separately in the country gold-price tables where applicable.</p></details>
<?php elseif ($gold_view === 'coin') : ?>
    <h2 id="en-seo-title">8-Gram Gold Coin Price Today in <?php echo esc_html($display_country_name); ?></h2>
    <p>Track the reference value of an <strong>8-gram gold coin</strong> in <?php echo esc_html($display_country_name); ?>. Using the current gram prices, the indicative 21K coin value is <strong><?php echo number_format($price_21k_local * 8, 2); ?> <?php echo esc_html($currency_label); ?></strong> (about <strong><?php echo number_format($price_21k_usd * 8, 2); ?> USD</strong>). The page also compares 22K and 24K values for the same 8-gram weight so that the effect of purity is clear.</p>
    <h3>How the 8-gram coin value is calculated</h3>
    <p>The calculation multiplies the relevant per-gram gold value by 8 grams. For the common 21K reference, the displayed estimate uses the 21K gram price multiplied by eight. The 22K and 24K comparison values use their respective gram prices at the same weight. This preserves the site's established 8-gram coin calculation.</p>
    <p>Actual coin prices may differ because of minting, condition, design, scarcity, dealer premiums, and local taxes. The values here represent the gold-content reference and should not be treated as a guaranteed transaction quote. Compare the <a href="<?php echo esc_url($pt_seo_base . '21k/'); ?>">21K gold gram price</a>, <a href="<?php echo esc_url($pt_seo_base . '22k/'); ?>">22K gold price</a>, and <a href="<?php echo esc_url($pt_seo_base . 'gold-bars/'); ?>">gold bar prices</a>.</p>
    <h3>Perguntas frequentes</h3>
    <details><summary>What weight is used for the gold coin calculation?</summary><p>This page retains the site's standard 8-gram calculation for the gold coin comparison.</p></details>
    <details><summary>Does the displayed value include a dealer premium?</summary><p>No. It estimates the gold content only and does not include minting costs, dealer premiums, workmanship, or taxes.</p></details>
<?php elseif ($gold_view === 'gold-bars') : ?>
    <h2 id="en-seo-title">Gold Bar Prices Today in <?php echo esc_html($display_country_name); ?></h2>
    <p>Gold bars are commonly valued using the 24K gold benchmark. Based on the current 24K reference of <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?> per gram</strong> (approximately <strong><?php echo number_format($price_24k_usd, 2); ?> USD</strong>), a 10-gram bar has an indicative gold-content value of <strong><?php echo number_format($price_24k_local * 10, 2); ?> <?php echo esc_html($currency_label); ?></strong>, while a 100-gram bar is approximately <strong><?php echo number_format($price_24k_local * 100, 2); ?> <?php echo esc_html($currency_label); ?></strong>. The table above lists additional weights for quick comparison.</p>
    <h3>How to compare gold bullion bar weights</h3>
    <p>For a straightforward estimate, multiply the 24K gram benchmark by the bar's weight. The resulting figure represents the reference value of the gold content before any fabrication premium, assay or hallmarking fee, dealer margin, delivery cost, or tax. A bar's final selling price can therefore be higher than the raw calculation shown on this page.</p>
    <p>Check the bar's stated purity, exact weight, certification, manufacturer, and seller reputation before a transaction. The <a href="<?php echo esc_url($pt_seo_base . '24k/'); ?>">24K gold price</a> is the key per-gram reference, while the <a href="<?php echo esc_url($pt_seo_base . 'ounce/'); ?>">global gold ounce</a> provides an international comparison in USD.</p>
    <h3>Perguntas frequentes</h3>
    <details><summary>Are the gold bar prices inclusive of making charges?</summary><p>No. The table estimates the gold value only and excludes fabrication, certification, dealer premiums, and taxes.</p></details>
    <details><summary>Why can two bars of the same weight have different prices?</summary><p>Brand, certification, manufacturing costs, dealer premiums, availability, and local taxes can affect the final selling price.</p></details>
<?php elseif ($gold_view === 'gold-index') : ?>
    <!-- Global XAU/USD chart added specifically to the Gold Index SEO section. -->
    <section class="pt-gold-index-chart" aria-labelledby="pt-gold-index-chart-title" style="background:#17191d;border:1px solid #323742;border-radius:8px;padding:12px;margin:0 0 22px;direction:ltr;text-align:left;">
        <h3 id="pt-gold-index-chart-title" style="color:#f0f1f5;text-align:left;margin:5px 5px 12px;font-size:20px;">Gold Price Charts</h3>
        <div style="position:relative;width:100%;height:520px;overflow:hidden;border-radius:6px;">
            <iframe
                id="tradingview_gold_index"
                title="Global Gold Price Charts — XAU/USD"
                src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_gold_index&symbol=OANDA%3AXAUUSD&interval=D&hidesidetoolbar=0&symboledit=0&saveimage=0&toolbarbg=%2317191d&studies=%5B%5D&theme=dark&style=1&timezone=Etc%2FUTC&withdateranges=1&hideideas=1&locale=pt"
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
    <p>Gold prices can respond to global spot-market activity, currency movements, interest-rate expectations, inflation concerns, and changes in investment demand. A single snapshot does not establish a trend, so readers should compare updates over time before drawing conclusions. Visit the <a href="<?php echo esc_url($pt_seo_base . '21k/'); ?>">21K price page</a>, <a href="<?php echo esc_url($pt_seo_base . '24k/'); ?>">24K price page</a>, and <a href="<?php echo esc_url($pt_seo_base . 'ounce/'); ?>">global ounce page</a>.</p>
    <h3>Perguntas frequentes</h3>
    <details><summary>Does the index show a guaranteed market trading price?</summary><p>No. It is an informational reference based on the latest available data used by the site. Actual transaction prices may include local premiums and fees.</p></details>
    <details><summary>Why are different karats priced differently?</summary><p>Each karat contains a different proportion of pure gold. Lower-purity alloys have a lower raw-gold value per gram than 24K gold, before other costs are considered.</p></details>
<?php elseif ($gold_view === 'usd') : ?>
    <h2 id="en-seo-title">USD Exchange Rate and Currency Conversion in <?php echo esc_html($display_country_name); ?></h2>
    <p>The latest available reference used by this page values one US dollar at approximately <strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Exchange rates matter to gold buyers because international bullion prices are commonly quoted in USD. When the local currency changes against the dollar, the converted local value of gold can change even if the international USD gold price remains steady.</p>
    <h3>How currency movements affect local gold prices</h3>
    <p>A local gold-price estimate combines an international gold benchmark with a currency conversion and, in real retail markets, any applicable local premiums, taxes, or costs. This page lists selected currency comparisons to help readers understand the conversion context. Rates are informational and may differ from bank, cash-market, card, or remittance rates available to an individual customer.</p>
    <p>For the gold side of the comparison, review the <a href="<?php echo esc_url($pt_seo_base . '24k/'); ?>">24K gram price</a>, the <a href="<?php echo esc_url($pt_seo_base . '21k/'); ?>">21K gram price</a>, and the <a href="<?php echo esc_url($pt_seo_base . 'ounce/'); ?>">international gold ounce in USD</a>.</p>
    <h3>Perguntas frequentes</h3>
    <details><summary>Is this exchange rate the rate offered by every bank?</summary><p>No. It is the latest available reference used by the site. Banks and exchange providers may apply different buy and sell rates, spreads, or fees.</p></details>
    <details><summary>Why does the dollar rate matter for gold?</summary><p>Because international gold is commonly quoted in US dollars, converting that benchmark into local currency is one of the factors used to estimate local gold values.</p></details>
<?php endif; ?>
    <p class="en-seo-update-note" style="margin:20px 0 0;padding-top:12px;border-top:1px solid #3a3f4d;color:#9ca3af;font-size:12px;">Reference date: <?php echo esc_html($today); ?>. Prices are indicative and reflect the latest available data returned to this page; they may change as market and exchange-rate data are updated.</p>
</article>
<?php endif; ?>

<?php if (!$pt_header_is_app) : ?>
<footer class="pt-site-footer">
  <div class="pt-site-footer-inner">
    <section>
      <h3>Sobre a AlTaqrer Gold</h3>
      <p><strong>AlTaqrer Gold</strong> ajuda os leitores a acompanhar os preços do ouro nos mercados regionais e internacionais. Consulte os preços de referência atualizados do ouro de 24, 22, 21, 18 e 14 quilates, compare os valores das barras e das moedas de ouro de 8 gramas e acompanhe a cotação mundial da onça de ouro em USD. Os preços são apresentados para fins informativos e de comparação; o preço final de venda pode incluir custos de fabrico, prémios e impostos.</p>
    </section>
    <section>
      <h3>Seções de preços do ouro</h3>
      <ul>
        <li><a href="<?php echo esc_url($pt_header_country_url); ?>">Gold Prices in <?php echo esc_html(isset($display_country_name) ? $display_country_name : ''); ?></a></li>
        <li><a href="<?php echo esc_url($pt_header_country_url . 'gold-bars/'); ?>">Barras e moedas de ouro</a></li>
        <li><a href="<?php echo esc_url($pt_header_country_url . 'gold-index/'); ?>">Índice do ouro em tempo real</a></li>
        <li><a href="<?php echo esc_url($pt_header_country_url . 'usd/'); ?>">USD e taxas de câmbio</a></li>
      </ul>
    </section>
    <section>
      <h3>Preços regionais do ouro</h3>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/pt/country/eg/')); ?>">Gold Prices in Egypt</a></li>
        <li><a href="<?php echo esc_url(home_url('/pt/country/sa/')); ?>">Gold Prices in Saudi Arabia</a></li>
        <li><a href="<?php echo esc_url(home_url('/pt/country/ae/')); ?>">Gold Prices in the UAE</a></li>
        <li><a href="<?php echo esc_url(home_url('/pt/country/kw/')); ?>">Gold Prices in Kuwait</a></li>
      </ul>
      <h3 style="margin-top:16px;">Siga-nos</h3>
      <ul>
        <li><a href="https://t.me/goldaltaqrer" target="_blank" rel="noopener noreferrer">Entre no nosso canal do Telegram</a></li>
      </ul>
    </section>
    <?php
    // Show only real published English pages; never leave dead /pt/# placeholder links.
    $en_footer_pages = array();
    foreach (array(
        'privacy-policy' => 'Política de privacidade',
        'terms-of-use'   => 'Termos de uso',
        'contact-us'     => 'Fale conosco'
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
      <h3>Links importantes</h3>
      <ul>
        <?php foreach ($en_footer_pages as $footer_page) : ?>
          <li><a href="<?php echo esc_url($footer_page['url']); ?>"><?php echo esc_html($footer_page['label']); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </section>
    <?php endif; ?>
  </div>
  <div class="pt-footer-bottom">All rights reserved &copy; <?php echo esc_html(function_exists('wp_date') ? wp_date('Y') : date('Y')); ?> to <a href="<?php echo esc_url($pt_header_home_url); ?>">AlTaqrer Gold</a>.</div>
</footer>
<?php endif; ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
  var toggle = document.querySelector('.pt-country-toggle');
  var menu = document.getElementById('pt-country-menu');
  if (!toggle || !menu) return;
  toggle.addEventListener('click', function (event) {
    event.preventDefault();
    var opened = menu.classList.toggle('is-open');
    toggle.setAttribute('aria-expanded', opened ? 'true' : 'false');
  });
  document.addEventListener('click', function (event) {
    if (!event.target.closest('.pt-country-wrap')) {
      menu.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
    }
  });
});
</script>
<?php wp_footer(); ?>
</body>
</html>
