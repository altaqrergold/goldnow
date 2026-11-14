<?php
/* Template Name: Русский — Gold Country Prices */

/** RU output localization: translate rendered text and accessible labels only. */
if (!function_exists('altaqrer_gold_ru_output_translate')) {
function altaqrer_gold_ru_output_translate($html) {
    $map = array(
        "Live foreign exchange rates for major international and regional currencies" => "Текущие курсы основных международных и региональных валют",
        "International spot benchmark for one troy ounce of 24K gold, quoted in USD" => "Международный спотовый ориентир для одной тройской унции золота 24 карата в USD",
        "What weight is used for the gold coin calculation?" => "Какой вес используется для расчёта золотой монеты?",
        "Does the displayed value include a dealer premium?" => "Включает ли указанная стоимость наценку продавца?",
        "Sorry, the market data is currently unavailable." => "Извините, данные рынка в данный момент недоступны.",
        "live market price, excluding making charges" => "текущая рыночная цена без стоимости изготовления",
        "How to read the local and USD prices" => "Как читать местные цены и цены в USD",
        "Frequently asked questions" => "Часто задаваемые вопросы",
        "Gold Bullion Bar Prices in" => "Цены на золотые слитки в",
        "Gold Price per Gram Today" => "Цена золота за грамм сегодня",
        "Join Our Telegram Channel" => "Подпишитесь на наш канал в Telegram",
        "Excluding Making Charges" => "Без стоимости изготовления",
        "Gold Bullion Bar Prices" => "Цены на золотые слитки",
        "Gold Bars and Coins in" => "Золотые слитки и монеты в",
        "USD and Currency Rates" => "USD и валютные курсы",
        "Regional Gold Prices" => "Региональные цены на золото",
        "Gold Bars and Coins" => "Золотые слитки и монеты",
        "Gold Price Sections" => "Разделы цен на золото",
        "Gold Price Chart in" => "График цены золота в",
        "About AlTaqrer Gold" => "О проекте AlTaqrer Gold",
        "All rights reserved" => "Все права защищены",
        "Related gold prices" => "Связанные цены на золото",
        "Gold Coin Prices in" => "Цены на золотые монеты в",
        "Gold Price Today in" => "Цена золота сегодня в",
        "Global Gold Ounce" => "Мировая унция золота",
        "Gold Coin Prices" => "Цены на золотые монеты",
        "Gold Price Chart" => "График цены золота",
        "Gold Price Today" => "Цена золота сегодня",
        "Important Links" => "Важные ссылки",
        "Reference date:" => "Дата справки:",
        "Live Gold Index" => "Текущий индекс золота",
        "Local Currency" => "Местная валюта",
        "Privacy Policy" => "Политика конфиденциальности",
        "Gold Prices in" => "Цены на золото в",
        "All Countries" => "Все страны",
        "Weight / Type" => "Вес / Тип",
        "Terms of Use" => "Условия использования",
        "Gold Prices" => "Цены на золото",
        "Live Prices" => "Текущие цены",
        "Coin Purity" => "Проба монеты",
        "Gold Price" => "Цена золота",
        "Gold Index" => "Индекс золота",
        "Important:" => "Важно:",
        "Contact Us" => "Связаться с нами",
        "Gold Bars" => "Золотые слитки",
        "Gold Coin" => "Золотая монета",
        "Countries" => "Страны",
        "USD Rates" => "Курс USD",
        "Follow Us" => "Подписывайтесь на нас",
        "What does" => "Что означает",
        "Today in" => "сегодня в",
        "per Gram" => "за грамм",
        "Price" => "Цена",
        "Home" => "Главная",
        "Yes." => "Да.",
        "Important Notice:" => "Важное примечание:",
        "Live Price" => "Текущая цена",
        "Highest Price" => "Максимальная цена",
        "Lowest Price" => "Минимальная цена",
        "Change" => "Изменение",
        "Live Update" => "Обновление в реальном времени",
        "Price in USD" => "Цена в USD",
        "Gold Ounce in Local Currency" => "Унция золота в местной валюте",
        "Gold Coin Price" => "Цена золотой монеты",
        "US Dollar Rate" => "Курс доллара США",
        "US Dollar Rate Today" => "Курс доллара США сегодня",
        "Gold Price in USD" => "Цена золота в USD",
        "Egyptian Pound" => "Египетский фунт",
        "US Dollar" => "Доллар США",
        "Most Traded" => "Наиболее торгуемый",
        "Gold Price" => "Цена золота",
        "home" => "Главная",
        "Золотой слиток — 1 g" => "Золотой слиток — 1 грамм",
        "Золотой слиток — 2,5 g" => "Золотой слиток — 2,5 грамма",
        "Золотой слиток — 5 g" => "Золотой слиток — 5 граммов",
        "Золотой слиток — 10 g" => "Золотой слиток — 10 граммов",
        "Золотой слиток — 20 g" => "Золотой слиток — 20 граммов",
        "Золотой слиток — 50 g" => "Золотой слиток — 50 граммов",
        "Золотой слиток — 100 g" => "Золотой слиток — 100 граммов",
        "Тройская унция (31,1 g)" => "Тройская унция (31,1 г)",
        "24K Gold" => "Золото 24 карата",
        "22K Gold" => "Золото 22 карата",
        "21K Gold" => "Золото 21 карат",
        "18K Gold" => "Золото 18 карат",
        "14K Gold" => "Золото 14 карат",
        "12K Gold" => "Золото 12 карат",
        "Gold Gram" => "Грамм золота",
        "Gold Ounce" => "Унция золота",
        "Prices" => "Цены",
        "Changes" => "Изменения",
        "No." => "Нет.",
        "Why the мировая цена унции золота matters" => "Почему важна мировая цена золота за унцию",
        "From the global ounce to a local gram price" => "От мировой цены за унцию к местной цене за грамм",
        "Gold is commonly quoted in international markets by the troy ounce. Traders, refiners, financial services, and bullion dealers use this benchmark to compare the value of gold across markets. Changes in the US dollar, interest-rate expectations, inflation outlook, central-bank activity, and investor demand can all influence the international gold price. These are general market drivers, not a claim that any one factor caused today's movement." => "На международных рынках золото обычно котируется за тройскую унцию. Трейдеры, аффинажные предприятия, финансовые компании и продавцы драгоценных металлов используют этот ориентир для сравнения стоимости золота на разных рынках. На международную цену могут влиять курс доллара США, ожидания по процентным ставкам, инфляционные прогнозы, действия центральных банков и спрос инвесторов. Это общие рыночные факторы, а не утверждение, что какой-либо из них вызвал сегодняшнее движение цены.",
        "For a simple reference comparison, a troy ounce contains about 31.1 grams. The local price за грамм also depends on the selected currency conversion and local market conditions. The global ounce figure above remains in USD so that it can be compared consistently with international quotations." => "Для справки: одна тройская унция содержит около 31,1 грамма. Местная цена за грамм также зависит от пересчёта в выбранную валюту и условий местного рынка. Указанная выше мировая цена за унцию остаётся в USD, чтобы её можно было сопоставлять с международными котировками.",
        "One troy ounce is approximately 31.1035 grams. The page uses 31.1 grams for its displayed reference calculation." => "Одна тройская унция составляет примерно 31,1035 грамма. Для отображаемого справочного расчёта на этой странице используется значение 31,1 грамма.",
        "No. This page shows the international gold ounce benchmark in USD only. Local-currency values are shown separately in the country gold-price tables where applicable." => "Нет. На этой странице мировой ориентир цены золота за унцию показан только в USD. Значения в местной валюте, если они доступны, приводятся отдельно в таблицах цен на золото для выбранной страны.",
        "The calculation multiplies the relevant per-gram gold value by 8 grams. For the common 21K reference, the displayed estimate uses the 21K gram price multiplied by eight. The 22K and 24K comparison values use their respective gram prices at the same weight. This preserves the site's established 8-gram coin calculation." => "При расчёте соответствующая стоимость золота за грамм умножается на 8 граммов. Для стандартного ориентира 21K отображаемая оценка рассчитывается умножением цены грамма золота 21K на восемь. Для сравнения стоимости 22K и 24K используются соответствующие цены за грамм при том же весе. Таким образом сохраняется принятый на сайте расчёт монеты весом 8 граммов.",
        "Actual coin prices may differ because of minting, condition, design, scarcity, dealer premiums, and local taxes. The values here represent the gold-content reference and should not be treated as a guaranteed transaction quote." => "Фактическая цена монеты может отличаться в зависимости от чеканки, состояния, дизайна, редкости, наценки продавца и местных налогов. Указанные значения отражают справочную стоимость содержащегося в монете золота и не являются гарантированной ценой сделки.",
        "Gold bars are commonly valued using the 24K gold benchmark." => "Золотые слитки обычно оцениваются на основе ориентира для золота 24 карата.",
        "For a straightforward estimate, multiply the 24K gram benchmark by the bar's weight. The resulting figure represents the reference value of the gold content before any fabrication premium, assay or hallmarking fee, dealer margin, delivery cost, or tax. A bar's final selling price can therefore be higher than the raw calculation shown on this page." => "Для простой оценки умножьте справочную цену грамма золота 24 карата на вес слитка. Полученная сумма отражает ориентировочную стоимость содержащегося золота без учёта изготовления, анализа или сертификации, наценки продавца, доставки и налогов. Поэтому окончательная цена продажи слитка может быть выше расчётной стоимости металла, указанной на этой странице.",
        "Brand, certification, manufacturing costs, dealer premiums, availability, and local taxes can affect the final selling price." => "На окончательную цену продажи могут влиять бренд, сертификация, производственные расходы, наценка продавца, наличие товара и местные налоги.",
        "The index is a convenient snapshot of gold values across common purities and currencies. It helps readers compare the 24K bullion benchmark with the lower-karat values commonly used for jewellery. Local values are derived from the reference gold price and the available exchange-rate data; the USD figures allow comparison with the international market." => "Индекс позволяет быстро оценить стоимость золота распространённых проб в разных валютах. Он помогает сравнить ориентир для золота 24 карата с ценами на более низкие пробы, обычно используемые в ювелирных изделиях. Местные значения рассчитываются на основе справочной цены золота и доступных данных о валютных курсах; показатели в USD позволяют сравнивать их с международным рынком.",
        "Each karat contains a different proportion of pure gold. Lower-purity alloys have a lower raw-gold value за грамм than 24K gold, before other costs are considered." => "Каждая проба содержит разную долю чистого золота. До учёта дополнительных расходов сплавы с более низкой пробой имеют меньшую стоимость золота за грамм, чем золото 24 карата.",
        "A local gold-price estimate combines an international gold benchmark with a currency conversion and, in real retail markets, any applicable local premiums, taxes, or costs. This page lists selected currency comparisons to help readers understand the conversion context. Rates are informational and may differ from bank, cash-market, card, or remittance rates available to an individual customer." => "Оценка местной цены золота объединяет международный ценовой ориентир и пересчёт валюты, а в розничной торговле также может учитывать местные наценки, налоги и расходы. На этой странице приведены отдельные сравнения валют, помогающие понять принципы пересчёта. Эти курсы носят справочный характер и могут отличаться от банковских, наличных, карточных курсов и курсов денежных переводов.",
        "No. It is the latest available reference used by the site. Banks and exchange providers may apply different buy and sell rates, spreads, or fees." => "Нет. Это последнее доступное справочное значение, используемое сайтом. Банки и обменные пункты могут применять другие курсы покупки и продажи, спреды или комиссии.",
        "Because international gold is commonly quoted in US dollars, converting that benchmark into local currency is one of the factors used to estimate local gold values." => "Поскольку на международном рынке золото обычно котируется в долларах США, пересчёт этого ориентира в местную валюту является одним из факторов оценки местной стоимости золота.",
        "Gold Price Charts" => "Графики цен на золото",
        "Track the international gold spot price in US dollars (USD) using the global XAU/USD market chart. This is a worldwide benchmark, not a country-specific retail price." => "Следите за международной спотовой ценой золота в долларах США (USD) с помощью глобального графика XAU/USD. Это мировой ориентир, а не розничная цена для конкретной страны.",
        "How many grams are in a gold troy ounce?" => "Сколько граммов в тройской унции золота?",
        "Is this ounce price converted to local currency?" => "Пересчитывается ли цена за унцию в местную валюту?",
        "Does the index show a guaranteed market trading price?" => "Показывает ли индекс гарантированную рыночную цену?",
        "Does the displayed value include a dealer premium?" => "Включает ли указанная стоимость наценку продавца?",
        "Gold Prices in Egypt" => "Цены на золото в Египте",
        "Gold Prices in Saudi Arabia" => "Цены на золото в Саудовской Аравии",
        "Gold Prices in the UAE" => "Цены на золото в ОАЭ",
        "Gold Prices in Kuwait" => "Цены на золото в Кувейте",
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
        $token = 'ALTQRGOLDRUBLOCK' . count($protected) . 'TOKEN';
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
ob_start('altaqrer_gold_ru_output_translate');

/**
 * Standalone English header for the country gold-price template.
 * The Arabic theme header and navigation are not loaded here.
 */
$ru_header_term = get_queried_object();
$ru_header_country_slug = (is_object($ru_header_term) && !empty($ru_header_term->slug))
    ? sanitize_title($ru_header_term->slug)
    : '';
if ($ru_header_country_slug === '' && is_object($ru_header_term) && !empty($ru_header_term->term_id)) {
    $ru_header_country_slug = strtolower((string) get_term_meta((int) $ru_header_term->term_id, 'country_code', true));
}
if ($ru_header_country_slug === '') {
    $ru_header_country_slug = 'eg';
}
$ru_header_country_url = home_url('/ru/country/' . rawurlencode($ru_header_country_slug) . '/');
$ru_header_home_url = home_url('/ru/');
$ru_header_accent = get_theme_mod('infi_default_color', '#ffb301');
$ru_header_logo_id = (int) get_theme_mod('custom_logo');
$ru_header_is_app = (isset($_GET['view']) && sanitize_text_field(wp_unslash($_GET['view'])) === 'app');
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
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
// RU SEO metadata: unique Rank Math title и description for every gold section.
$ru_meta_term = get_queried_object();
$ru_meta_term_id = (is_object($ru_meta_term) && isset($ru_meta_term->term_id)) ? (int) $ru_meta_term->term_id : 0;
$ru_meta_country = '';
$ru_meta_country = $ru_meta_term_id ? (string) get_term_meta($ru_meta_term_id, 'country_ru_name', true) : '';
if (function_exists('altaqrer_ml_country_name') && is_object($ru_meta_term)) { $ru_meta_country = (string) altaqrer_ml_country_name($ru_meta_term, 'ru'); }
if ($ru_meta_country === '') {
    $ru_meta_country = 'вашей стране';
}
$ru_meta_view = sanitize_key((string) get_query_var('gold_view'));
$ru_meta_titles = array(
    '24k' => 'Цена золота 24 карата сегодня ' . $ru_meta_country,
    '22k' => 'Цена золота 22 карата сегодня ' . $ru_meta_country,
    '21k' => 'Цена золота 21 карата сегодня ' . $ru_meta_country,
    '18k' => 'Цена золота 18 каратов сегодня ' . $ru_meta_country,
    '14k' => 'Цена золота 14 каратов сегодня ' . $ru_meta_country,
    'ounce' => 'Мировая цена унции золота в USD ' . $ru_meta_country,
    'coin' => 'Цена золотой монеты весом 8 граммов ' . $ru_meta_country,
    'gold-bars' => 'Цены на золотые слитки сегодня ' . $ru_meta_country,
    'gold-index' => 'Индекс цен на золото в реальном времени ' . $ru_meta_country,
    'usd' => 'Курс доллара США ' . $ru_meta_country,
);
$ru_meta_descriptions = array(
    '24k' => 'Узнайте справочную цену золота 24 карата за грамм. Сравните значения в местной валюте и USD и изучите влияние пробы.',
    '22k' => 'Посмотрите цену золота 22 карата за грамм и сравните её с 24 каратами, включая справочные значения в местной валюте и USD.',
    '21k' => 'Следите за ценой золота 21 карата за грамм, сравнивайте значения в местной валюте и USD и изучите расчёт монеты весом 8 граммов.',
    '18k' => 'Узнайте цену золота 18 каратов за грамм, долю чистого золота и разницу между стоимостью металла и ценой украшения.',
    '14k' => 'Посмотрите цену золота 14 каратов за грамм и сравните пробу с другими вариантами от 18 до 24 каратов.',
    'ounce' => 'Узнайте мировую спотовую цену тройской унции золота в USD и отличие от местных цен за грамм.',
    'coin' => 'Посмотрите справочную стоимость золотой монеты весом 8 граммов и сравните 21K, 22K и 24K без дополнительных наценок.',
    'gold-bars' => 'Сравните справочную стоимость золотых слитков разного веса на основе цены золота 24 карата за грамм.',
    'gold-index' => 'Сравните цены золота по пробе и валюте, включая местные значения и мировую цену унции в USD.',
    'usd' => 'Посмотрите последний доступный справочный курс USD и узнайте, как изменение валюты может влиять на местную цену золота.',
);
$ru_meta_title = isset($ru_meta_titles[$ru_meta_view]) ? $ru_meta_titles[$ru_meta_view] : 'Цена золота 24 карата сегодня ' . $ru_meta_country;
$ru_meta_description = isset($ru_meta_descriptions[$ru_meta_view]) ? $ru_meta_descriptions[$ru_meta_view] : 'Узнайте справочную цену золота 24 карата за грамм. Сравните значения в местной валюте и USD и изучите влияние пробы.';
add_filter('rank_math/frontend/title', function ($title) use ($ru_meta_title) {
    return $ru_meta_title . ' | AlTaqrer Gold';
}, 99);
add_filter('rank_math/frontend/description', function ($description) use ($ru_meta_description) {
    return $ru_meta_description;
}, 99);
?>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() . '/style.css?v=1sz'); ?>" data-navigate-track="reload">
<script type="application/ld+json">
<?php echo wp_json_encode(array(
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'AlTaqrer Gold',
    'url' => $ru_header_home_url,
    'sameAs' => array('https://www.instagram.com/altaqrergold', 'https://www.facebook.com/altaqrergold')
), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>
<style>
html, body { direction:ltr; text-align:left; }
body { background:#f5d771 !important; max-width:100vw; overflow-x:hidden; position:relative; font-family:Inter,Arial,sans-serif; }
.ru-site-header { position:relative; z-index:1000; background:#1a1a1a; border-bottom:4px solid <?php echo esc_attr($ru_header_accent); ?>; color:#fff; }
.ru-site-header-inner { max-width:1200px; width:95%; margin:0 auto; min-height:74px; display:flex; align-items:center; justify-content:space-between; gap:18px; padding:10px 0; }
.en-brand { display:flex; align-items:center; gap:10px; color:#fff; text-decoration:none; font-weight:800; font-size:20px; white-space:nowrap; }
.en-brand img { max-width:54px; max-height:54px; width:auto; height:auto; object-fit:contain; }
.ru-main-nav { display:flex; align-items:center; justify-content:flex-end; gap:8px; flex-wrap:wrap; }
.ru-main-nav a, .ru-country-toggle { color:#fff; text-decoration:none; border:1px solid rgba(255,255,255,.15); background:transparent; border-radius:6px; padding:9px 12px; font:600 13px Inter,Arial,sans-serif; cursor:pointer; }
.ru-main-nav a:hover, .ru-country-toggle:hover { color:#1a1a1a; background:<?php echo esc_attr($ru_header_accent); ?>; }
.ru-country-wrap { position:relative; }
.ru-country-menu { display:none; position:absolute; top:calc(100% + 6px); left:0; min-width:210px; background:#202329; border:1px solid #444; border-radius:7px; padding:7px; box-shadow:0 8px 24px rgba(0,0,0,.25); z-index:10000; }
.ru-country-menu a { display:block; border:0; border-radius:4px; text-align:left; }
.ru-country-menu.is-open { display:block; }
@media(max-width:760px) { .ru-site-header-inner { align-items:flex-start; flex-direction:column; } .ru-main-nav { justify-content:flex-start; width:100%; } .ru-main-nav a,.ru-country-toggle { padding:8px 10px; } }
@media(max-width:480px) { .ru-main-nav { gap:6px; } .ru-main-nav a,.ru-country-toggle { font-size:12px; } }
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
.ru-seo-article { max-width:900px; width:95%; box-sizing:border-box; margin:28px auto; padding:24px; color:#e5e7eb; background:#1f2126; border:1px solid #343944; border-left:5px solid <?php echo esc_attr($ru_header_accent); ?>; border-radius:9px; line-height:1.85; font-size:15px; }
.ru-seo-article h2,.ru-seo-article h3 { color:#fff; line-height:1.35; }
.ru-seo-article h2 { font-size:23px; margin:0 0 14px; }
.ru-seo-article h3 { font-size:18px; margin:22px 0 8px; }
.ru-seo-article p { margin:0 0 13px; }
.ru-seo-article a { color:<?php echo esc_attr($ru_header_accent); ?>; text-decoration:none; font-weight:700; }
.ru-seo-article a:hover { text-decoration:underline; }
.ru-seo-article details { border-top:1px solid #3a3f4d; padding:11px 0; }
.ru-seo-article summary { cursor:pointer; color:#fff; font-weight:700; }
.ru-seo-article details p { margin:8px 0 0; color:#cbd5e1; }
.ru-site-footer { margin-top:32px; background:#1a1a1a; color:#eee; border-top:4px solid <?php echo esc_attr($ru_header_accent); ?>; }
.ru-site-footer-inner { max-width:1200px; width:95%; margin:0 auto; padding:28px 0 18px; display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:24px; }
.ru-site-footer h3 { color:#e0b94f; font-size:16px; margin:0 0 12px; }
.ru-site-footer p,.ru-site-footer li { color:#c8c8c8; font-size:13px; line-height:1.8; }
.ru-site-footer ul { list-style:none; padding:0; margin:0; }
.ru-site-footer a { color:#e0b94f; text-decoration:none; }
.ru-site-footer a:hover { text-decoration:underline; }
.ru-footer-bottom { text-align:center; border-top:1px solid #393939; padding:15px 10px; font-size:13px; color:#c8c8c8; }
@media(max-width:768px) { .ru-site-footer-inner { grid-template-columns:1fr; gap:18px; text-align:center; } }
</style>
</head>
<body <?php body_class('ru-gold-template'); ?>>
<?php if (function_exists('wp_body_open')) { wp_body_open(); } ?>

<?php if (!$ru_header_is_app) : ?>
<header class="ru-site-header">
  <div class="ru-site-header-inner">
    <a class="en-brand" href="<?php echo esc_url($ru_header_home_url); ?>" aria-label="AlTaqrer Gold home">
      <?php if ($ru_header_logo_id) : ?>
        <?php echo wp_get_attachment_image($ru_header_logo_id, 'full', false, array('alt' => 'AlTaqrer Gold')); ?>
      <?php else : ?>
        <span>AlTaqrer Gold</span>
      <?php endif; ?>
    </a>
    <nav class="ru-main-nav" aria-label="Main navigation">
      <a href="<?php echo esc_url($ru_header_home_url); ?>">Главная</a>
      <a href="<?php echo esc_url($ru_header_country_url); ?>">Цены на золото</a>
      <a href="<?php echo esc_url($ru_header_country_url . 'gold-bars/'); ?>">Золотые слитки</a>
      <a href="<?php echo esc_url($ru_header_country_url . 'gold-index/'); ?>">Индекс золота</a>
      <a href="<?php echo esc_url($ru_header_country_url . 'usd/'); ?>">Курс USD</a>
      <div class="ru-country-wrap">
        <button class="ru-country-toggle" type="button" aria-expanded="false" aria-controls="ru-country-menu">Countries ▾</button>
        <div class="ru-country-menu" id="ru-country-menu">
          <a href="<?php echo esc_url(home_url('/ru/country/eg/')); ?>">Египет</a>
          <a href="<?php echo esc_url(home_url('/ru/country/sa/')); ?>">Саудовская Аравия</a>
          <a href="<?php echo esc_url(home_url('/ru/country/ae/')); ?>">Объединённые Арабские Эмираты</a>
          <a href="<?php echo esc_url(home_url('/ru/country/kw/')); ?>">Кувейт</a>
          <a href="<?php echo esc_url($ru_header_home_url); ?>">Все страны</a>
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
if (!$ru_header_is_app && function_exists('goldnow_display_ad')) :
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
if (!function_exists('altaqrer_gold_ru_translate_shortcode_html')) {
    function altaqrer_gold_ru_translate_shortcode_html($html, $translations = array()) {
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
        ? (string) altaqrer_ml_country_name($current_term, 'ru')
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
    $currency_labels_ru = array(
        'USD'=>'Доллар США','EUR'=>'Евро','GBP'=>'Британский фунт','EGP'=>'Египетский фунт','SAR'=>'Саудовский риял','AED'=>'Дирхам ОАЭ',
        'KWD'=>'Кувейтский динар','QAR'=>'Катарский риял','BHD'=>'Бахрейнский динар','OMR'=>'Оманский риал','JOD'=>'Jordanian Dinar',
        'IQD'=>'Iraqi Dinar','MAD'=>'Moroccan Dirham','TND'=>'Tunisian Dinar','DZD'=>'Algerian Dinar','TRY'=>'Turkish Lira',
        'JPY'=>'Японская иена','CHF'=>'Swiss Franc','CAD'=>'Canadian Dollar','AUD'=>'Australian Dollar','NZD'=>'New Zealand Dollar',
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
    $currency_label = isset($currency_labels_ru[$country_currency]) ? $currency_labels_ru[$country_currency] : ($country_currency !== '' ? $country_currency : 'Местная валюта');
    $today = function_exists('wp_date') ? wp_date('d/m/Y') : date('d/m/Y');

    // Build a text-only translation dictionary for legacy shortcodes that still use Arabic labels.
    $shortcode_translation_map_ru = array(
        'ذهب عيار 24' => 'Золото 24 карата', 'ذهب عيار 22' => 'Золото 22 карата', 'ذهب عيار 21' => 'Золото 21 карата',
        'ذهب عيار 18' => 'Золото 18 карат', 'ذهب عيار 14' => 'Золото 14 карат', 'ذهب عيار 12' => 'Золото 12 карат',
        'عيار 24' => 'Золото 24 карата', 'عيار 22' => 'Золото 22 карата', 'عيار 21' => 'Золото 21 карат', 'عيار 18' => 'Золото 18 карат', 'عيار 14' => 'Золото 14 карат', 'عيار 12' => 'Золото 12 карат',
        'جرام عيار 24' => 'Золото 24 карата за грамм', 'جرام عيار 22' => 'Золото 22 карата за грамм', 'جرام عيار 21' => 'Золото 21 карат за грамм',
        'جرام عيار 18' => 'Золото 18 карат за грамм', 'جرام عيار 14' => 'Золото 14 карат за грамм',
        'جرام عيار 12' => 'Золото 12 карат за грамм',
        'الأونصة العالمية' => 'Мировая унция золота', 'أونصة الذهب العالمية' => 'Мировая унция золота',
        'الأونصة بالعملة المحلية' => 'Gold Ounce in Local Currency', 'أونصة الذهب بالعملة المحلية' => 'Gold Ounce in Local Currency',
        'جنيه الذهب' => 'Золотая монета', 'الجنيه الذهب' => 'Золотая монета', 'سعر الجنيه الذهب' => 'Gold Coin Price',
        'السعر بالدولار' => 'Price in USD', 'سعر الدولار' => 'US Dollar Rate', 'سعر الدولار اليوم' => 'US Dollar Rate Today',
        'السعر بالعملة المحلية' => 'Price in Local Currency', 'سعر الذهب بالدولار' => 'Gold Price in USD',
        'جنيه مصري' => 'Egyptian Pound', 'الدولار الأمريكي' => 'US Dollar', 'دولار أمريكي' => 'US Dollar',
        'الأكثر تداولاً' => 'Наиболее торгуемый',
        'الأكثر تداولا' => 'Наиболее торгуемый',
        'انضم إلى قناتنا على تيليجرام' => 'Подпишитесь на наш канал в Telegram', 'انضم إلى قناتنا على تليجرام' => 'Подпишитесь на наш канал в Telegram', 'انضم لقناتنا على تيليجرام' => 'Подпишитесь на наш канал в Telegram', 'انضم لقناتنا على تليجرام' => 'Подпишитесь на наш канал в Telegram',
        'تنويه هام:' => 'Important Notice:', 'الوزن / النوع' => 'Вес / Тип', 'السعر' => 'Цена',
        'السعر الآن' => 'Live Price', 'أعلى سعر' => 'Highest Price', 'أقل سعر' => 'Lowest Price',
        'التغير' => 'Change', 'التحديث اللحظي' => 'Live Update', 'بدون مصنعية' => 'Без стоимости изготовления',
        'سعر الذهب' => 'Gold Price', 'أسعار الذهب' => 'Цены на золото', 'العملة المحلية' => 'Местная валюта'
    );

    // Reuse the existing functions.php dictionaries where possible without modifying Arabic globals.
    global $currency_names, $carat_labels;
    if (is_array($currency_names)) {
        foreach ($currency_names as $code => $arabic_label) {
            if (isset($currency_labels_ru[$code]) && is_string($arabic_label) && $arabic_label !== '') {
                $shortcode_translation_map_ru[$arabic_label] = $currency_labels_ru[$code];
            }
        }
    }
    if (is_array($carat_labels)) {
        $carat_english = array('24k'=>'Золото 24 карата','22k'=>'Золото 22 карата','21k'=>'Золото 21 карата','18k'=>'Золото 18 карат','14k'=>'Золото 14 карат','12k'=>'Золото 12 карат','24k_oz'=>'Gold Ounce','gold_pound'=>'Золотая монета');
        foreach ($carat_labels as $key => $arabic_label) {
            if (isset($carat_english[$key]) && is_string($arabic_label) && $arabic_label !== '') {
                $shortcode_translation_map_ru[$arabic_label] = $carat_english[$key];
            }
        }
    }
    if ($arabic_country_name !== '' && $arabic_country_name !== $display_country_name) {
        $shortcode_translation_map_ru[$arabic_country_name] = $display_country_name;
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
// RU section-specific SEO H1 titles and introductions, following the Hindi/German layout.
$ru_seo_titles = array(
    '24k' => 'Цена золота 24 карата сегодня в ' . $display_country_name,
    '22k' => 'Цена золота 22 карата сегодня в ' . $display_country_name,
    '21k' => 'Цена золота 21 карата сегодня в ' . $display_country_name,
    '18k' => 'Цена золота 18 каратов сегодня в ' . $display_country_name,
    '14k' => 'Цена золота 14 каратов сегодня в ' . $display_country_name,
    'ounce' => 'Мировая спотовая цена унции золота сегодня в USD',
    'coin' => 'Цена золотой монеты весом 8 граммов сегодня в ' . $display_country_name,
    'gold-bars' => 'Цены на золотые слитки сегодня в ' . $display_country_name,
    'gold-index' => 'Индекс цен на золото в реальном времени в ' . $display_country_name,
    'usd' => 'Курс доллара США сегодня в ' . $display_country_name,
);
$ru_seo_intros = array(
    '24k' => 'Посмотрите справочную цену золота 24 карата за грамм в ' . $display_country_name . '. Сравните значение в местной валюте с эквивалентом в USD. Золото 24 карата служит эталоном чистоты для слитков и инвестиционного золота.',
    '22k' => 'Следите за ценой золота 22 карата за грамм в ' . $display_country_name . ' и сравнивайте её с золотом 24 карата. Сплав 22 карата содержит 22 части золота из 24; остальные металлы влияют на свойства и стоимость.',
    '21k' => 'Посмотрите цену золота 21 карата за грамм в ' . $display_country_name . ', включая справочные значения в местной валюте и USD. Работа ювелира, наценки продавцов и налоги могут изменить конечную цену.',
    '18k' => 'Узнайте справочную цену золота 18 каратов за грамм в ' . $display_country_name . '. Такой сплав содержит 18 частей золота из 24; стоимость металла не обязательно равна розничной цене готового украшения.',
    '14k' => 'Сравните цену золота 14 каратов за грамм в ' . $display_country_name . ' с золотом 18, 21, 22 и 24 карата. Справочная стоимость зависит от доли чистого золота — 14 частей из 24.',
    'ounce' => 'Посмотрите мировую спотовую цену одной тройской унции золота в USD. Тройская унция составляет примерно 31,1035 грамма. Это международный ориентир, а не местная цена унции в национальной валюте.' . $display_country_name . '',
    'coin' => 'Посмотрите справочную стоимость золотой монеты весом 8 граммов в ' . $display_country_name . '. Расчёт сайта использует вес 8 граммов и сравнивает золото 21, 22 и 24 карата; чеканка, состояние, наценки и налоги влияют на фактическую цену.',
    'gold-bars' => 'Сравните справочную стоимость золотых слитков разного веса в ' . $display_country_name . ' на основе цены золота 24 карата за грамм. Сертификация, бренд, изготовление, доставка и налоги могут повлиять на итоговую стоимость.',
    'gold-index' => 'Сравните цены золота по пробе и валюте в ' . $display_country_name . '. Индекс объединяет местные справочные значения и мировую цену тройской унции в USD, помогая оценить рыночную картину.',
    'usd' => 'Посмотрите последний доступный справочный курс USD для ' . $display_country_name . '. Изменения валютного курса могут влиять на местные цены золота, поскольку на международном рынке золото обычно котируется в долларах США.',
);
$ru_seo_h1 = isset($ru_seo_titles[$gold_view]) ? $ru_seo_titles[$gold_view] : 'Цена золота 24 карата сегодня в ' . $display_country_name;
$ru_seo_intro = isset($ru_seo_intros[$gold_view]) ? $ru_seo_intros[$gold_view] : 'Посмотрите справочную цену золота 24 карата за грамм в ' . $display_country_name . '. Сравните значение в местной валюте с эквивалентом в USD. Золото 24 карата служит эталоном чистоты для слитков и инвестиционного золота.';
?>
<section class="ru-seo-intro" aria-labelledby="ru-seo-h1" style="max-width:1000px;width:95%;box-sizing:border-box;margin:18px auto 22px;padding:20px 22px;background:#1f2126;border:1px solid #343944;border-left:5px solid <?php echo esc_attr(get_theme_mod('infi_default_color', '#ffb301')); ?>;border-radius:9px;color:#e5e7eb;line-height:1.85;text-align:left;direction:ltr;">
    <h1 id="ru-seo-h1" style="margin:0 0 10px;color:#fff;font-size:clamp(22px,3vw,30px);line-height:1.35;font-weight:800;"><?php echo esc_html($ru_seo_h1); ?></h1>
    <p style="margin:0;"><?php echo esc_html($ru_seo_intro); ?></p>
    <p style="margin:10px 0 0;color:#aeb7c4;font-size:13px;">Обновлено: <?php echo esc_html($today); ?> · Цены являются ориентировочными и могут меняться вместе с рынком.</p>
</section>

    <!-- ✅ Tab Navigation Buttons -->
    <div class="gold-tabs-nav text-center py-4">
      <button class="gold-tab-btn active" type="button" data-tab="now">Текущие цены</button>
      <button class="gold-tab-btn" type="button" data-tab="buy-sell">Золотые слитки</button>
      <button class="gold-tab-btn" type="button" data-tab="indicator">График цены золота</button>
    </div>

    <!-- ✅ Tab Content Container -->
    <div class="gold-tabs-content">
      
      <!-- 1. Live Prices Pane -->
      <div id="tab-now" class="gold-tab-pane" style="display:block;">
        <!-- 📊 SEO Heading: Fully programmatically structured in English layout -->
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align: left; direction: ltr;">
          <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
          <img alt="Текущие цены на золото в <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align: middle; margin-right: 5px;">
        <?php
        if ( $gold_view == '24k' ) { echo 'Цена золота 24 карата сегодня в ' . esc_html($display_country_name); }
        elseif ( $gold_view == '22k' ) { echo 'Цена золота 22 карата сегодня в ' . esc_html($display_country_name); }
        elseif ( $gold_view == '21k' ) { echo 'Цена грамма золота 21 карата сегодня в ' . esc_html($display_country_name); }
        elseif ( $gold_view == '18k' ) { echo 'Цена золота 18 каратов сегодня в ' . esc_html($display_country_name); }
        elseif ( $gold_view == '14k' ) { echo 'Цена золота 14 каратов сегодня в ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'ounce' ) { echo 'Мировая цена унции золота сегодня (USD)'; }
        elseif ( $gold_view == 'coin' ) { echo 'Цена золотой монеты сегодня в ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'gold-bars' ) { echo 'Цены на золотые слитки сегодня в ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'gold-index' ) { echo 'Индекс рынка золота в реальном времени сегодня в ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'usd' ) { echo 'Курс доллара США и валютные курсы сегодня в ' . esc_html($display_country_name); }
        else { echo 'Цены на золото в ' . esc_html($display_country_name) . ' сегодня'; }?>
        </h2>
        
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align: left; direction: ltr;">
          <?php 
          if ($gold_view == 'usd') { echo 'Текущие курсы основных международных и региональных валют'; }
          elseif ($gold_view == 'ounce') { echo 'Международный спотовый ориентир для одной тройской унции золота 24 карата в USD'; }
          else { echo 'Цена золота в ' . esc_html($display_country_name) . ' —  без учета стоимости изготовления'; }
          ?>
        </h3>

        <!-- Gold Price Cards Shortcode Section -->
        <section id="gold-cards" class="mb-4">
            <?php echo altaqrer_gold_ru_translate_shortcode_html(do_shortcode('[infi_gold_cards currency="' . esc_attr($country_currency) . '" currency_label="' . esc_attr($currency_label) . '"]'), $shortcode_translation_map_ru); ?>
        </section>

        <!-- Gold Information Panels Shortcode Section -->
        <section id="gold-info-boxes" class="mb-4">
            <?php echo altaqrer_gold_ru_translate_shortcode_html(do_shortcode('[infi_gold_info_boxes currency="' . esc_attr($country_currency) . '"]'), $shortcode_translation_map_ru); ?>
        </section>
	  </div>
		
      <!-- 2. Gold Bullion Bars and Coins Table Pane -->
      <div id="tab-buy-sell" class="gold-tab-pane" style="display:none; text-align: left; direction: ltr;">
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align:left !important; direction:ltr !important;">
            <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
            <img alt="Золотые слитки и монеты в <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; margin-right: 5px;">
            Золотые слитки и монеты в <?php echo esc_html($display_country_name); ?>
        </h2>
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align:left !important; direction:ltr !important;">
          Актуальные цены на золотые слитки и монеты (без расходов на изготовление)
        </h3>

        <?php if (function_exists('infi_get_latest_gold_prices')) { ?>
            <!-- A) Gold Bars Price Table -->
            <section id="sabika-price" class="gold-section mt-4">
                <div class="section-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <h4>Цены на золотые слитки в <?php echo esc_html($display_country_name); ?></h4>
                    <span class="date-badge" style="background: #262930; padding: 4px 10px; border-radius: 4px; font-size: 13px;"><?php echo esc_html($today); ?></span>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>Вес / Тип</th>
                                <th>Цена (<?php echo $currency_label; ?>)</th>
                                <th>Цена (USD)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $weights = [
                                ['weight' => 1, 'name' => 'Золотой слиток — 1 g'],
                                ['weight' => 2.5, 'name' => 'Золотой слиток — 2,5 g'],
                                ['weight' => 5, 'name' => 'Золотой слиток — 5 g'],
                                ['weight' => 10, 'name' => 'Золотой слиток — 10 g'],
                                ['weight' => 20, 'name' => 'Золотой слиток — 20 g'],
                                ['weight' => 31.1, 'name' => 'Тройская унция (31,1 g)'],
                                ['weight' => 50, 'name' => 'Золотой слиток — 50 g'],
                                ['weight' => 100, 'name' => 'Золотой слиток — 100 g'],
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
                    <h4>Цены на золотые монеты в <?php echo esc_html($display_country_name); ?></h4>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>Проба монеты</th>
                                <th>Цена (<?php echo $currency_label; ?>)</th>
                                <th>Цена (USD)</th>
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
                                    <td class="font-bold">Золотая монета 8 г (<?php echo $carat_num; ?> карата)</td>
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
                <strong>Важно:</strong> The prices shown above for bars and coins represent Указанные выше цены на слитки и монеты отражают только стоимость золота; расходы на изготовление, клеймение и налоги не включены.
            </div>

        <?php } else { ?>
            <p style="text-align:center; padding:20px;">Извините, данные рынка в данный момент недоступны.</p>
        <?php } ?>
      </div>

      <!-- 3. Gold Price Chart: restored to match the Arabic template structure. -->
      <div id="tab-indicator" class="gold-tab-pane" style="display:none; direction:ltr; text-align:left;">
        <h2 class="col-12 p-0 font-3 mb-3" style="text-align:left; direction:ltr;">
          <span class="start-head cls120" style="background: <?php echo esc_attr(get_theme_mod('infi_default_color', '#ffb301')); ?>;"></span>
          График цены золота в <?php echo esc_html($display_country_name); ?>
        </h2>
        <div class="gold-frame-box mb-4" style="direction:ltr; text-align:left;">
          <?php
          $en_chart_shortcode = '[infi_gold_chart carat="21k" currency="' . esc_attr($country_currency) . '" title="21K Gold Price Movement"]';
          echo altaqrer_gold_ru_translate_shortcode_html(do_shortcode($en_chart_shortcode), $shortcode_translation_map_ru);
          ?>
        </div>
        <div id="ajax-indicator-frames" class="gold-frame-box" style="direction:ltr; text-align:left;"></div>
        <p style="color:#94a3b8; text-align:left; font-size:13px; margin:10px 4px 18px;">Графики показывают ориентировочную динамику рынка. Местные цены могут отличаться из-за валютных курсов, наценок и рыночных условий.</p>
      </div>

    </div>
  </div>
</main>

<script>
// Translate legacy Arabic labels returned by the existing indicator AJAX action.
function altaqrerTranslateEnglishIndicator(root) {
    if (!root) return;
    const translations = {
        'عيار 24': 'Золото 24 карата', 'عيار 22': 'Золото 22 карата', 'عيار 21': 'Золото 21 карата',
        'عيار 18': 'Золото 18 карат', 'عيار 14': 'Золото 14 карат', 'عيار 12': 'Золото 12 карат',
        'الأونصة العالمية': 'Global Gold Ounce (USD)',
        'الأونصة بالعملة المحلية': 'Gold Ounce in Local Currency',
        'جنيه الذهب': 'Золотая монета', 'سعر الدولار': 'US Dollar Exchange Rate',
        'جنيه مصري': 'Egyptian Pound', 'دولار أمريكي': 'US Dollar',
        'انضم إلى قناتنا على تيليجرام': 'Подпишитесь на наш канал в Telegram',
        'انضم إلى قناتنا على تليجرام': 'Подпишитесь на наш канал в Telegram'
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
                framesContainer.innerHTML = '<p style="text-align:center;padding:18px;color:#cbd5e1;">Загрузка графиков цен на золото…</p>';
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
                    framesContainer.innerHTML = '<p style="text-align:center;padding:18px;color:#fca5a5;">Не удалось загрузить данные графика. Попробуйте ещё раз.</p>';
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
        📊 Сервис отслеживания золота показывает последние изменения цен в <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo esc_html($display_country_name); ?> в режиме реального времени</strong></span>. <img alt="Флаг страны <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align:middle; margin: 0 4px;"> Дата: <strong><?php echo esc_html($today); ?></strong>. Данные основаны на региональных показателях и международных биржевых котировках золота для страны <?php echo esc_html($display_country_name); ?>.
    </p>

    <p style="margin-bottom: 15px;">
        💡 В отчёте представлены актуальные цены на золото всех основных проб, включая <strong>золото 21 карата</strong> — наиболее востребованную пробу, — а также <strong>золото 22, 18 и 14 каратов</strong>. Здесь также учитываются другие драгоценные металлы, рынок ювелирных изделий и ежедневные изменения рынка.
    </p>

    <p style="margin-bottom: 15px;">
        ✨ По последним рыночным данным, без учёта изготовления и наценок за работу, ориентировочная цена грамма <strong>золота 24 карата</strong> составляет <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($gram_24k_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> (примерно <strong><?php echo number_format($gram_24k_price_usd_converted, 2); ?> долларов США</strong>). Эта проба служит основным ориентиром для <strong>золотых слитков</strong> благодаря высокой чистоте.
    </p>

    <p style="margin-bottom: 15px;">
        📈 Сегодня <strong>мировая цена унции золота</strong> (31,1 грамма золота 24 карата) составляет <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong>. Это международный спотовый ориентир; местные цены пересчитываются отдельно по последнему доступному обменному курсу.
    </p>

    <p style="margin-bottom: 15px;">
        🪙 Для вкладчиков и инвесторов ориентировочная цена <strong>золотой монеты</strong> весом 8 граммов и распространённой пробы 21 карат составляет около <strong><?php echo number_format($gold_pound_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong>.
    </p>

    <p style="margin-bottom: 20px;">
        🛠️ Чтобы следить за стоимостью сбережений, полезно отслеживать <strong>текущий индекс рынка золота</strong> и <strong>цены на золотые слитки</strong> весом от 1 грамма до 1 килограмма. Это помогает оценить ситуацию на рынке перед покупкой или продажей.
    </p>

    <div style="background: #17191d; padding: 12px; border-radius: 6px; border: 1px dashed #3a3f4d; color: #d1d5db; font-size: 14px; margin-top: 15px;">
        💵 <strong>Индикатор обменного курса:</strong> Местные цены на золото зависят и от валютных курсов. По последним доступным данным, сегодняшний курс <strong>доллара США в стране <?php echo esc_html($display_country_name); ?></strong> составляет <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> за доллар США. Скачайте <strong>приложение с ценами на золото</strong>, чтобы получать своевременные уведомления.
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
            💵 Текущие курсы обмена относительно <?php echo esc_html($currency_label); ?> в <?php echo esc_html($display_country_name); ?> <img alt="Флаг страны: <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:
        </strong>
        
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; text-align: left; direction: ltr;">
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'USD') : ?>
                    <div><img alt="Flag of United States" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_ru['USD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                    <div><img alt="Flag of United Kingdom" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_ru['GBP']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                    <div><img alt="Flag of Saudi Arabia" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_ru['SAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>

                <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                    <div><img alt="Flag of Bahrain" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_ru['BHD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                    <div><img alt="Flag of Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_ru['OMR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                    <div><img alt="Flag of European Union" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_ru['EUR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                    <div><img alt="Flag of United Arab Emirates" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_ru['AED']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                    <div><img alt="Flag of Kuwait" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_ru['KWD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                    <div><img alt="Flag of Qatar" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_ru['QAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                    <div><img alt="Flag of Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_ru['JPY']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
        </div>
        <p style="margin: 15px 0 0 0; font-size: 12px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 8px; text-align: left; direction: ltr;">* Обновления выполняются автоматически на основе официальных рыночных индексов в реальном времени. Рекомендуем установить официальное <strong>приложение с ценами на золото</strong>.</p>
    </div>
<?php endif; ?>

<div class="altaqrer-silo-links" style="margin: 25px auto; padding: 15px; background: #17191d; border: 1px solid #3a3f4d; border-radius: 6px; text-align: center; max-width: 800px; width: 95%; box-sizing: border-box; clear: both; direction: ltr;">
    <?php
    // Reuse the already-resolved English country URL for every tab link.
    $base_country_url = $ru_header_country_url;

    $active_bg = get_theme_mod('infi_default_color', '#ffb301');
    $active_color = '#000000';
    $default_bg = '#262930';
    $default_color = '#ffffff';

    $tabs = [
        ['key' => '',          'ru' => 'Цена золота'],
        ['key' => '24k',       'ru' => '24 карата'],
        ['key' => '22k',       'ru' => '22 карата'],
        ['key' => '21k',       'ru' => '21 карат'],
        ['key' => '18k',       'ru' => '18 карат'],
        ['key' => '14k',       'ru' => '14 карат'],
        ['key' => 'ounce',     'ru' => 'Унция золота'],
        ['key' => 'coin',      'ru' => 'Золотая монета'],
        ['key' => 'gold-bars', 'ru' => 'Золотые слитки'],
        ['key' => 'gold-index','ru' => 'Индекс золота'],
        ['key' => 'usd',       'ru' => 'USD и валютные курсы'],
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
            $label = $tab['ru'];
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
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">📈 Текущий индекс рынка золота в <?php echo esc_html($display_country_name); ?> <img alt="Флаг страны: <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Чистое золото 24K:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Стоимость: <?php echo number_format($price_24k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Золото 22K:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Стоимость: <?php echo number_format($price_22k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;">Популярное золото 21K:</strong> <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Стоимость: <?php echo number_format($price_21k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Стандартное золото 18K:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Стоимость: <?php echo number_format($price_18k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Золото 14K:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Стоимость: <?php echo number_format($price_14k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Мировая унция золота (31,1 г):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong></span><br><small style="color:#94a3b8;">Международная спотовая цена в USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Унция золота в местной валюте (31,1 г):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Тот же мировой ориентир цены унции, пересчитанный в местную валюту</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Этот индекс сравнивает основные пробы золота в <?php echo esc_html($display_country_name); ?>с международной спотовой ценой. Мировая унция указывается в USD, а цена унции в местной валюте представляет тот же ориентир, пересчитанный по курсу страны. Розничные расходы на изготовление и наценки продавцов не включены.
                </p>


            <?php elseif ($gold_view == 'gold-bars') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 Цены на золотые слитки сегодня в <?php echo esc_html($display_country_name); ?> (чистое золото 24K):</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Золотой слиток — 1 g:</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_24k_local * 1, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Стоимость: <?php echo number_format($price_24k_usd * 1, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Золотой слиток — 2,5 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 2.5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Стоимость: <?php echo number_format($price_24k_usd * 2.5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Золотой слиток — 5 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Стоимость: <?php echo number_format($price_24k_usd * 5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Золотой слиток — 10 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 10, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Стоимость: <?php echo number_format($price_24k_usd * 10, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Золотой слиток — 20 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 20, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Стоимость: <?php echo number_format($price_24k_usd * 20, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Тройская унция (31,1 грамма):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Стоимость: <?php echo number_format($ounce_price_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Золотой слиток — 50 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 50, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Стоимость: <?php echo number_format($price_24k_usd * 50, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Золотой слиток — 100 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 100, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Стоимость: <?php echo number_format($price_24k_usd * 100, 2); ?> USD</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Этот инструмент отслеживает <strong>сегодняшние цены на золотые слитки</strong> из золота 24K чистотой 999,9. Покупка слитков остается важным способом сохранения капитала и долгосрочной защиты ликвидности в стране <strong><?php echo esc_html($display_country_name); ?></strong> от макроэкономической инфляции.
                </p>

            <?php elseif ($gold_view == 'coin') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 Цена золотой монеты сегодня в <?php echo esc_html($display_country_name); ?> (стандартный вес — 8 граммов):</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>Золотая монета 21K (8 г):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_21k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Стоимость: <?php echo number_format($price_21k_usd * 8, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>Золотая монета 22K (8 г):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Стоимость: <?php echo number_format($price_22k_usd * 8, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>Золотая монета 24K (8 г):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Стоимость: <?php echo number_format($price_24k_usd * 8, 2); ?> USD</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Следите за обновлениями текущей цены <strong>золотой монеты сегодня</strong> на инвестиционных рынках страны <strong><?php echo esc_html($display_country_name); ?></strong>. Золотые монеты весом ровно 8 граммов рассматриваются как физические защитные активы.
                </p>

            <?php elseif ($gold_view == 'usd') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">💵 Текущие курсы обмена относительно <?php echo esc_html($currency_label); ?> в <?php echo esc_html($display_country_name); ?>:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; text-align: left; direction: ltr; margin-bottom: 20px;">
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'USD') : ?>
                            <div><img alt="Flag of US" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_ru['USD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                            <div><img alt="Flag of UK" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_ru['GBP']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                            <div><img alt="Flag of SA" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_ru['SAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                            <div><img alt="Flag of BH" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_ru['BHD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                            <div><img alt="Flag of Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_ru['OMR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                            <div><img alt="Flag of EU" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_ru['EUR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                            <div><img alt="Flag of AE" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_ru['AED']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                            <div><img alt="Flag of KW" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_ru['KWD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                            <div><img alt="Flag of QA" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_ru['QAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                            <div><img alt="Flag of Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_ru['JPY']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Этот динамический индекс отслеживает банковские обменные курсы. Местные ориентиры цен на золото напрямую зависят от колебаний курсов относительно мировых резервов.
                </p>

            <?php elseif ($gold_view == '24k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Текущий отчет: 24K цена золота за грамм сегодня в <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Цена в местной валюте:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Эквивалент в долларах США:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_24k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Текущая цена <strong>24K золота за грамм сегодня</strong> составляет <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Благодаря чистоте 99,9% эта проба служит промышленным ориентиром для производства инвестиционных слитков.
                </p>

            <?php elseif ($gold_view == '22k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Текущий отчет: 22K цена золота за грамм сегодня в <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Цена в местной валюте:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Эквивалент в долларах США:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_22k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Премиальная цена <strong>22K золота за грамм сегодня</strong> составляет <strong><?php echo number_format($price_22k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Эта проба сочетает высокое содержание драгоценного металла с прочностью сплава.
                </p>

            <?php elseif ($gold_view == '21k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Текущий отчет: 21K цена золота за грамм сегодня в <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Цена в местной валюте:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Эквивалент в долларах США:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_21k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Востребованная цена <strong>21K золота за грамм сегодня</strong> составляет <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. На эту пробу приходится большая часть местной торговли ювелирными изделиями.
                </p>

            <?php elseif ($gold_view == '18k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Текущий отчет: 18K цена золота за грамм сегодня в <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Цена в местной валюте:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Эквивалент в долларах США:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_18k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    По последним рыночным данным стандартная цена <strong>18K золота за грамм сегодня</strong> в <strong><?php echo number_format($price_18k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>, что делает эту пробу более доступным вариантом для ювелирных изделий.
                </p>

            <?php elseif ($gold_view == '14k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Текущий отчет: 14K цена золота за грамм сегодня в <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Цена в местной валюте:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>Эквивалент в долларах США:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_14k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Расчетный индекс оценивает <strong>14K золота за грамм сегодня</strong> в <strong><?php echo number_format($price_14k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>, представляя прочный сплав для повседневных ювелирных изделий.
                </p>

            <?php elseif ($gold_view == 'ounce') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Мировая цена золотой унции сегодня (31,1 г):</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Международная спотовая цена:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($ounce_price_usd, 2); ?></strong></span> USD</li>
                    <li>🔹 <strong>Валюта котировки:</strong> Доллар США (USD)</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Мировая цена золотой унции устанавливается в долларах США и соответствует 31,1 грамма золота 24 карата. Пересчет в местную валюту исключен из этого глобального ориентира; местные цены рассчитываются отдельно с учетом применимого курса.
                </p>
            <?php endif; ?>

        </div>
    </div>
    <?php
}
?>

<?php if (!empty($gold_view)) :
    // The live values below use the same price snapshot and conversions as the tables above.
    $ru_seo_base = home_url('/ru/country/' . rawurlencode($ru_header_country_slug) . '/');
    $ru_seo_price_map = array(
        '24k' => array($price_24k_local, $price_24k_usd),
        '22k' => array($price_22k_local, $price_22k_usd),
        '21k' => array($price_21k_local, $price_21k_usd),
        '18k' => array($price_18k_local, $price_18k_usd),
        '14k' => array($price_14k_local, $price_14k_usd)
    );
?>
<article class="ru-seo-article" aria-labelledby="ru-seo-title">
<?php if (isset($ru_seo_price_map[$gold_view])) :
    $en_active_price_local = $ru_seo_price_map[$gold_view][0];
    $en_active_price_usd = $ru_seo_price_map[$gold_view][1];
    $ru_karat = str_replace(['24K','22K','21K','18K','14K'], ['24 карата','22 карата','21 карат','18 карат','14 карат'], strtoupper($gold_view));
?>
    <h2 id="ru-seo-title">Цена золота <?php echo esc_html($ru_karat); ?> сегодня в <?php echo esc_html($display_country_name); ?> за грамм</h2>
    <p>Следите за текущей ценой золота <strong>цена золота <?php echo esc_html($ru_karat); ?> в <?php echo esc_html($display_country_name); ?> сегодня</strong> по текущему ориентиру, показанному выше. Текущая ориентировочная стоимость составляет <strong><?php echo number_format($en_active_price_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> за грамм, что примерно равно <strong><?php echo number_format($en_active_price_usd, 2); ?> USD</strong>. Эти значения рассчитаны на основе последней доступной справочной цены золота 24K и коэффициента чистоты для <?php echo esc_html($ru_karat); ?> золота и последнего доступного курса конвертации валюты, используемого сайтом.</p>
    <h3>Что означает проба <?php echo esc_html($ru_karat); ?> золота?</h3>
    <p>Проба показывает долю чистого золота в сплаве. 24K считается эталоном чистого золота, а сплавы с меньшей пробой содержат больше других металлов. Цена золота <?php echo esc_html($ru_karat); ?> поэтому отражает содержание золота, а не окончательную розничную цену ювелирного изделия. Цена в магазине может также включать работу, наценку продавца, налоги и другие местные сборы, не входящие в указанную рыночную стоимость.</p>
    <h3>Как читать местные цены и цены в USD</h3>
    <p>Значение в местной валюте позволяет сравнить справочную стоимость в <?php echo esc_html($display_country_name); ?>; эквивалент в USD позволяет сравнивать такое же содержание золота с международными котировками. Местные цены меняются вслед за мировым ориентиром, курсами валют и местными рыночными надбавками. Это справочные значения, а не гарантированное предложение покупки или продажи.</p>
    <h3>Связанные цены на золото</h3>
    <p>Сравните эту цену с <a href="<?php echo esc_url($ru_seo_base . '24k/'); ?>">золото 24K</a>, <a href="<?php echo esc_url($ru_seo_base . '21k/'); ?>">золото 21K</a>, <a href="<?php echo esc_url($ru_seo_base . 'gold-bars/'); ?>">цены на золотые слитки</a>, и <a href="<?php echo esc_url($ru_seo_base . 'gold-index/'); ?>">индекс рынка золота в реальном времени</a> для более полного понимания рынка.</p>
    <h3>Часто задаваемые вопросы</h3>
    <details><summary>Является ли указанная цена <?php echo esc_html($ru_karat); ?> окончательной ценой ювелирного изделия в магазине?</summary><p>Нет. Это справочная стоимость чистого золота без учета работы, наценки продавца, налогов и других расходов на готовое изделие.</p></details>
    <details><summary>Почему значение в USD отличается от местной цены?</summary><p>Эти значения указаны в разных валютах. Местная сумма рассчитывается по последнему доступному курсу сайта, а значение в USD отражает соответствующую стоимость золота в долларах США.</p></details>
<?php elseif ($gold_view === 'ounce') : ?>
    <h2 id="ru-seo-title">Мировая цена золотой унции сегодня в USD</h2>
    <p>Международная справочная цена золотой унции на этой странице составляет <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong> за одну тройскую унцию весом около 31,1 грамма золота 24K. Это <strong>мировой спотовый ориентир цены золота</strong>, который котируется в долларах США. Она намеренно не представлена как местная цена унции в валюте конкретной страны; местные цены за грамм рассчитываются отдельно.</p>
    <h3>Почему важна мировая цена золотой унции</h3>
    <p>На международных рынках золото обычно котируется за тройскую унцию. Трейдеры, аффинажные предприятия, финансовые компании и продавцы слитков используют этот ориентир для сравнения стоимости золота на разных рынках. На цену могут влиять курс доллара США, ожидания по процентным ставкам, инфляционные прогнозы, действия центральных банков и спрос инвесторов. Это общие рыночные факторы, а не утверждение о причине сегодняшнего движения.</p>
    <h3>От мировой унции к местной цене за грамм</h3>
    <p>Для простого сравнения тройская унция составляет около 31,1 грамма. Местная цена за грамм также зависит от выбранного курса валют и условий местного рынка. Указанная выше мировая цена унции остается в USD для сопоставления с международными котировками.</p>
    <p>Перейдите к странице <a href="<?php echo esc_url($ru_seo_base); ?>">цены золота в <?php echo esc_html($display_country_name); ?></a>, посмотрите <a href="<?php echo esc_url($ru_seo_base . '24k/'); ?>">золото 24K за грамм</a>, или откройте <a href="<?php echo esc_url($ru_seo_base . 'gold-index/'); ?>">индекс рынка золота</a>.</p>
    <h3>Часто задаваемые вопросы</h3>
    <details><summary>Сколько граммов в тройской унции золота?</summary><p>Одна тройская унция составляет примерно 31,1035 грамма. Для отображаемого расчета на странице используется 31,1 грамма.</p></details>
    <details><summary>Пересчитана ли цена унции в местную валюту?</summary><p>Нет. На этой странице показан только международный ориентир цены унции золота в USD. Значения в местной валюте, если они доступны, приводятся отдельно в таблицах страны.</p></details>
<?php elseif ($gold_view === 'coin') : ?>
    <h2 id="ru-seo-title">Цена золотой монеты весом 8 граммов сегодня в <?php echo esc_html($display_country_name); ?></h2>
    <p>Отслеживайте справочную стоимость <strong>золотой монеты весом 8 граммов</strong> in <?php echo esc_html($display_country_name); ?>. По текущим ценам за грамм ориентировочная стоимость монеты 21K составляет <strong><?php echo number_format($price_21k_local * 8, 2); ?> <?php echo esc_html($currency_label); ?></strong> (около <strong><?php echo number_format($price_21k_usd * 8, 2); ?> USD</strong>). На странице также сравниваются значения 22K и 24K для того же веса 8 граммов, чтобы сравнить влияние пробы.</p>
    <h3>Как рассчитывается стоимость монеты весом 8 граммов</h3>
    <p>Расчет умножает соответствующую стоимость золота за грамм на 8 граммов. Для стандартного ориентира 21K оценка рассчитывается умножением цены грамма 21K на восемь. Для сравнения 22K и 24K используются их цены за грамм при том же весе. Так сохраняется принятый на сайте расчет монеты весом 8 граммов.</p>
    <p>Фактическая цена монеты может отличаться из-за чеканки, состояния, дизайна, редкости, наценки продавца и местных налогов. Здесь указана справочная стоимость содержащегося золота, а не гарантированная цена сделки. Сравните <a href="<?php echo esc_url($ru_seo_base . '21k/'); ?>">золото цена 21K за грамм</a>, <a href="<?php echo esc_url($ru_seo_base . '22k/'); ?>">22K gold price</a>, and <a href="<?php echo esc_url($ru_seo_base . 'gold-bars/'); ?>">цены на золотые слитки</a>.</p>
    <h3>Часто задаваемые вопросы</h3>
    <details><summary>Какой вес используется при расчете золотой монеты?</summary><p>На этой странице сохраняется стандартный расчет сайта для монеты весом 8 граммов.</p></details>
    <details><summary>Включена ли наценка продавца в указанную стоимость?</summary><p>Нет. Учитывается только содержание золота, без затрат на чеканку, наценки продавца, работы и налогов.</p></details>
<?php elseif ($gold_view === 'gold-bars') : ?>
    <h2 id="ru-seo-title">Цены на золотые слитки сегодня в <?php echo esc_html($display_country_name); ?></h2>
    <p>Золотые слитки обычно оцениваются по ориентиру золота 24K. Исходя из текущей справочной цены 24K <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?> за грамм</strong> (approximately <strong><?php echo number_format($price_24k_usd, 2); ?> USD</strong>), a 10-gram bar has an indicative gold-content value of <strong><?php echo number_format($price_24k_local * 10, 2); ?> <?php echo esc_html($currency_label); ?></strong>, а стоимость слитка весом 100 граммов составляет примерно <strong><?php echo number_format($price_24k_local * 100, 2); ?> <?php echo esc_html($currency_label); ?></strong>. В таблице выше приведены другие варианты веса для сравнения.</p>
    <h3>Как сравнивать вес золотых слитков</h3>
    <p>Для простой оценки умножьте справочную цену 24K за грамм на вес слитка. Полученная сумма отражает стоимость содержащегося золота до учета изготовления, проверки или клеймения, наценки продавца, доставки и налогов. Поэтому конечная цена продажи может быть выше приведенного расчета.</p>
    <p>Перед покупкой проверьте заявленную пробу, точный вес, сертификат, производителя и репутацию продавца. <a href="<?php echo esc_url($ru_seo_base . '24k/'); ?>">золото цена золота 24K</a> — основной ориентир цены за грамм, а <a href="<?php echo esc_url($ru_seo_base . 'ounce/'); ?>">мировая цена унции золота</a> дает возможность международного сравнения в USD.</p>
    <h3>Часто задаваемые вопросы</h3>
    <details><summary>Включены ли расходы на изготовление в цену слитков?</summary><p>Нет. Таблица показывает только стоимость золота без изготовления, сертификации, наценки продавца и налогов.</p></details>
    <details><summary>Почему два слитка одинакового веса могут иметь разную цену?</summary><p>На окончательную цену могут влиять бренд, сертификация, производственные расходы, наценка продавца, наличие и местные налоги.</p></details>
<?php elseif ($gold_view === 'gold-index') : ?>
    <!-- Global XAU/USD chart added specifically to the Gold Index SEO section. -->
    <section class="ru-gold-index-chart" aria-labelledby="ru-gold-index-chart-title" style="background:#17191d;border:1px solid #323742;border-radius:8px;padding:12px;margin:0 0 22px;direction:ltr;text-align:left;">
        <h3 id="ru-gold-index-chart-title" style="color:#f0f1f5;text-align:left;margin:5px 5px 12px;font-size:20px;">Графики цен на золото</h3>
        <div style="position:relative;width:100%;height:520px;overflow:hidden;border-radius:6px;">
            <iframe
                id="tradingview_gold_index"
                title="Global Графики цен на золото — XAU/USD"
                src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_gold_index&symbol=OANDA%3AXAUUSD&interval=D&hidesidetoolbar=0&symboledit=0&saveimage=0&toolbarbg=%2317191d&studies=%5B%5D&theme=dark&style=1&timezone=Etc%2FUTC&withdateranges=1&hideideas=1&locale=ru"
                style="width:100%;height:100%;border:0;"
                allowtransparency="true"
                scrolling="no"
                loading="lazy"
                allowfullscreen>
            </iframe>
        </div>
        <p style="color:#94a3b8;text-align:left;font-size:13px;margin:10px 4px 2px;">Отслеживайте международную спотовую цену золота в долларах США (USD) на глобальном графике XAU/USD. Это мировой ориентир, а не розничная цена конкретной страны.</p>
    </section>
    <h2 id="ru-seo-title">Текущий индекс рынка золота и цены по пробам в <?php echo esc_html($display_country_name); ?></h2>
    <p>В этом обзоре собраны последние доступные справочные значения для разных проб золота. Текущий ориентир 24K составляет <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> за грамм, а 22K составляет примерно <strong><?php echo number_format($price_22k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> а 21K составляет примерно <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Мировая тройская унция составляет <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong>а ее эквивалент в местной валюте составляет <strong><?php echo number_format($ounce_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong>.</p>
    <h3>Что позволяет сравнить индекс золота</h3>
    <p>Индекс дает удобный обзор стоимости золота распространенных проб и валют. Он помогает сравнить ориентир слиткового золота 24K со стоимостью сплавов меньшей пробы, часто используемых в ювелирных изделиях. Местные значения рассчитываются по справочной цене золота и доступным курсам валют; значения в USD позволяют сравнивать их с международным рынком.</p>
    <p>Цены на золото могут реагировать на мировую спотовую торговлю, колебания валют, ожидания по ставкам, инфляционные опасения и изменения инвестиционного спроса. Одного снимка недостаточно, чтобы определить тенденцию, поэтому сравнивайте обновления во времени. Перейдите на страницы <a href="<?php echo esc_url($ru_seo_base . '21k/'); ?>">страница цены 21K</a>, <a href="<?php echo esc_url($ru_seo_base . '24k/'); ?>">страница цены 24K</a>, and <a href="<?php echo esc_url($ru_seo_base . 'ounce/'); ?>">страница мировой цены унции</a>.</p>
    <h3>Часто задаваемые вопросы</h3>
    <details><summary>Показывает ли индекс гарантированную рыночную цену?</summary><p>Нет. Это справочная информация на основе последних доступных данных сайта. Фактические цены сделок могут включать местные надбавки и комиссии.</p></details>
    <details><summary>Почему золото разной пробы стоит по-разному?</summary><p>В каждом карате содержится разная доля чистого золота. Сплавы меньшей пробы имеют меньшую стоимость чистого золота за грамм, чем 24K, до учета дополнительных расходов.</p></details>
<?php elseif ($gold_view === 'usd') : ?>
    <h2 id="ru-seo-title">Курс USD и конвертация валюты в <?php echo esc_html($display_country_name); ?></h2>
    <p>Последний доступный справочный курс на этой странице оценивает один доллар США примерно в <strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Курсы валют важны для покупателей золота, поскольку международные цены на слитки обычно указываются в USD. При изменении курса местной валюты к доллару местная стоимость золота может измениться, даже если мировая цена в USD остается стабильной.</p>
    <h3>Как колебания валют влияют на местные цены золота</h3>
    <p>Оценка местной цены золота объединяет международный ориентир с пересчетом валюты и, в розничной торговле, возможными местными надбавками, налогами и расходами. На странице приведены отдельные сравнения валют для пояснения конвертации. Эти курсы справочные и могут отличаться от банковских, наличных, карточных и переводных курсов.</p>
    <p>Для сравнения цен на золото смотрите <a href="<?php echo esc_url($ru_seo_base . '24k/'); ?>">цена 24K за грамм</a>, the <a href="<?php echo esc_url($ru_seo_base . '21k/'); ?>">цена 21K за грамм</a>, и <a href="<?php echo esc_url($ru_seo_base . 'ounce/'); ?>">международная цена унции золота в USD</a>.</p>
    <h3>Часто задаваемые вопросы</h3>
    <details><summary>Это курс, который предлагают все банки?</summary><p>Нет. Это последний справочный курс, используемый сайтом. Банки и обменные сервисы могут применять другие курсы покупки и продажи, спреды и комиссии.</p></details>
    <details><summary>Почему курс доллара важен для золота?</summary><p>Поскольку на международном рынке золото обычно котируется в долларах США, пересчет этого ориентира в местную валюту является одним из факторов оценки местной цены.</p></details>
<?php endif; ?>
    <p class="en-seo-update-note" style="margin:20px 0 0;padding-top:12px;border-top:1px solid #3a3f4d;color:#9ca3af;font-size:12px;">Дата справки: <?php echo esc_html($today); ?>. Цены являются ориентировочными и отражают последние доступные данные для этой страницы; они могут меняться при обновлении рыночных данных и курсов валют。</p>
</article>
<?php endif; ?>

<?php if (!$ru_header_is_app) : ?>
<footer class="ru-site-footer">
  <div class="ru-site-footer-inner">
    <section>
      <h3>О проекте AlTaqrer Gold</h3>
      <p><strong>AlTaqrer Gold</strong> помогает читателям следить за ценами на золото на региональных и международных рынках. Здесь можно узнать актуальные справочные цены на золото 24, 22, 21, 18 и 14 карат, сравнить стоимость золотых слитков и монет весом 8 граммов, а также отслеживать мировую цену тройской унции золота в USD. Цены приводятся для ознакомления и сравнения; в окончательную розничную стоимость могут входить расходы на изготовление, надбавки и налоги.</p>
    </section>
    <section>
      <h3>Разделы цен на золото</h3>
      <ul>
        <li><a href="<?php echo esc_url($ru_header_country_url); ?>">Gold Prices in <?php echo esc_html(isset($display_country_name) ? $display_country_name : ''); ?></a></li>
        <li><a href="<?php echo esc_url($ru_header_country_url . 'gold-bars/'); ?>">Золотые слитки и монеты</a></li>
        <li><a href="<?php echo esc_url($ru_header_country_url . 'gold-index/'); ?>">Текущий индекс золота</a></li>
        <li><a href="<?php echo esc_url($ru_header_country_url . 'usd/'); ?>">USD и валютные курсы</a></li>
      </ul>
    </section>
    <section>
      <h3>Региональные цены на золото</h3>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/ru/country/eg/')); ?>">Gold Prices in Egypt</a></li>
        <li><a href="<?php echo esc_url(home_url('/ru/country/sa/')); ?>">Gold Prices in Saudi Arabia</a></li>
        <li><a href="<?php echo esc_url(home_url('/ru/country/ae/')); ?>">Gold Prices in the UAE</a></li>
        <li><a href="<?php echo esc_url(home_url('/ru/country/kw/')); ?>">Gold Prices in Kuwait</a></li>
      </ul>
      <h3 style="margin-top:16px;">Подписывайтесь на нас</h3>
      <ul>
        <li><a href="https://t.me/goldaltaqrer" target="_blank" rel="noopener noreferrer">Подпишитесь на наш канал в Telegram</a></li>
      </ul>
    </section>
    <?php
    // Show only real published English pages; never leave dead /ru/# placeholder links.
    $en_footer_pages = array();
    foreach (array(
        'privacy-policy' => 'Политика конфиденциальности',
        'terms-of-use'   => 'Условия использования',
        'contact-us'     => 'Связаться с нами'
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
      <h3>Важные ссылки</h3>
      <ul>
        <?php foreach ($en_footer_pages as $footer_page) : ?>
          <li><a href="<?php echo esc_url($footer_page['url']); ?>"><?php echo esc_html($footer_page['label']); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </section>
    <?php endif; ?>
  </div>
  <div class="ru-footer-bottom">All rights reserved &copy; <?php echo esc_html(function_exists('wp_date') ? wp_date('Y') : date('Y')); ?> to <a href="<?php echo esc_url($ru_header_home_url); ?>">AlTaqrer Gold</a>.</div>
</footer>
<?php endif; ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
  var toggle = document.querySelector('.ru-country-toggle');
  var menu = document.getElementById('ru-country-menu');
  if (!toggle || !menu) return;
  toggle.addEventListener('click', function (event) {
    event.preventDefault();
    var opened = menu.classList.toggle('is-open');
    toggle.setAttribute('aria-expanded', opened ? 'true' : 'false');
  });
  document.addEventListener('click', function (event) {
    if (!event.target.closest('.ru-country-wrap')) {
      menu.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
    }
  });
});
</script>
<?php wp_footer(); ?>
</body>
</html>
