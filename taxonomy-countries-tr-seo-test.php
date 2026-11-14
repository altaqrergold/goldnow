<?php
/* Template Name: Türkçe — Gold Country Prices */

/** TR output localization: translate rendered text and accessible labels only. */
if (!function_exists('altaqrer_gold_tr_output_translate')) {
function altaqrer_gold_tr_output_translate($html) {
    $map = array(
        "Live foreign exchange rates for major international and regional currencies" => "Başlıca uluslararası ve bölgesel para birimleri için canlı döviz kurları",
        "International spot benchmark for one troy ounce of 24K gold, quoted in USD" => "USD cinsinden 24 ayar altının bir troy onsu için uluslararası spot referans fiyatı",
        "What weight is used for the gold coin calculation?" => "Altın sikke hesabında hangi ağırlık kullanılır?",
        "Does the displayed value include a dealer premium?" => "Gösterilen değere satıcı primi dahil mi?",
        "Sorry, the market data is currently unavailable." => "Üzgünüz, piyasa verileri şu anda kullanılamıyor.",
        "live market price, excluding making charges" => "işçilik ücreti hariç canlı piyasa fiyatı",
        "How to read the local and USD prices" => "Yerel ve USD fiyatları nasıl okunur",
        "Frequently asked questions" => "Sıkça Sorulan Sorular",
        "Gold Bullion Bar Prices in" => "için Külçe Altın Fiyatları",
        "Gold Price per Gram Today" => "Bugün Gram Altın Fiyatı",
        "Join Our Telegram Channel" => "Telegram Kanalımıza Katılın",
        "Excluding Making Charges" => "İşçilik Ücreti Hariç",
        "Gold Bullion Bar Prices" => "Külçe Altın Fiyatları",
        "Gold Bars and Coins in" => "için Altın Külçeler ve Sikkeler",
        "USD and Currency Rates" => "USD ve Döviz Kurları",
        "Regional Gold Prices" => "Bölgesel Altın Fiyatları",
        "Gold Bars and Coins" => "Altın Külçeler ve Sikkeler",
        "Gold Price Sections" => "Altın Fiyatı Bölümleri",
        "Gold Price Chart in" => "için Altın Fiyat Grafiği",
        "About AlTaqrer Gold" => "AlTaqrer Gold Hakkında",
        "Tüm hakları saklıdır" => "Tüm hakları saklıdır",
        "Related gold prices" => "İlgili altın fiyatları",
        "Gold Coin Prices in" => "için Altın Sikke Fiyatları",
        "Gold Price Today in" => "Bugünkü Altın Fiyatı",
        "Global Gold Ounce" => "Küresel Altın Ons",
        "Gold Coin Prices" => "Altın Sikke Fiyatları",
        "Gold Price Chart" => "Altın Fiyat Grafiği",
        "Gold Price Today" => "Bugünkü Altın Fiyatı",
        "Important Links" => "Önemli Bağlantılar",
        "Reference date:" => "Referans tarihi:",
        "Live Gold Index" => "Canlı Altın Endeksi",
        "Local Currency" => "Yerel Para Birimi",
        "Privacy Policy" => "Gizlilik Politikası",
        "Gold Prices in" => "için Altın Fiyatları",
        "All Countries" => "Tüm Ülkeler",
        "Weight / Type" => "Ağırlık / Tür",
        "Terms of Use" => "Kullanım Koşulları",
        "Gold Prices" => "Altın Fiyatları",
        "Live Prices" => "Canlı Fiyatlar",
        "Coin Purity" => "Sikke Ayarı",
        "Gold Price" => "Altın Fiyatı",
        "Gold Index" => "Altın Endeksi",
        "Important:" => "Önemli:",
        "Contact Us" => "İletişim",
        "Gold Bars" => "Altın Külçeler",
        "Gold Coin" => "Altın Sikke",
        "Countries" => "Ülkeler",
        "USD Rates" => "USD Kurları",
        "Follow Us" => "Bizi Takip Edin",
        "What does" => "Ne anlama gelir",
        "Today in" => "bugün",
        "per Gram" => "gram başına",
        "Price" => "Fiyat",
        "Home" => "Ana Sayfa",
        "Yes." => "Evet.",
        "Important Notice:" => "Önemli Uyarı:",
        "Live Price" => "Canlı Fiyat",
        "Highest Price" => "En Yüksek Fiyat",
        "Lowest Price" => "En Düşük Fiyat",
        "Change" => "Değişim",
        "Live Update" => "Canlı Güncelleme",
        "Price in USD" => "USD Cinsinden Fiyat",
        "Gold Ounce in Local Currency" => "Yerel Para Biriminde Altın Ons",
        "Gold Coin Price" => "Altın Sikke Fiyatı",
        "US Dollar Rate" => "ABD Doları Kuru",
        "US Dollar Rate Today" => "Bugünkü ABD Doları Kuru",
        "Gold Price in USD" => "USD Cinsinden Altın Fiyatı",
        "Egyptian Pound" => "Mısır Lirası",
        "US Dollar" => "ABD Doları",
        "Most Traded" => "En Çok İşlem Gören",
        "Gold Price" => "Altın Fiyatı",
        "home" => "Ana Sayfa",
        "Altın külçe — 1 g" => "Altın Külçe — 1 Gram",
        "Altın külçe — 2,5 g" => "Altın Külçe — 2,5 Gram",
        "Altın külçe — 5 g" => "Altın Külçe — 5 Gram",
        "Altın külçe — 10 g" => "Altın Külçe — 10 Gram",
        "Altın külçe — 20 g" => "Altın Külçe — 20 Gram",
        "Altın külçe — 50 g" => "Altın Külçe — 50 Gram",
        "Altın külçe — 100 g" => "Altın Külçe — 100 Gram",
        "Troy onsu (31,1 g)" => "Troy Ons (31,1 g)",
        "24K Gold" => "24 Ayar Altın",
        "22K Gold" => "22 Ayar Altın",
        "21K Gold" => "21 Ayar Altın",
        "18K Gold" => "18 Ayar Altın",
        "14K Gold" => "14 Ayar Altın",
        "12K Gold" => "12 Ayar Altın",
        "Gold Gram" => "Gram Altın",
        "Gold Ounce" => "Altın Ons",
        "Prices" => "Fiyatlar",
        "Changes" => "Değişiklikler",
        "No." => "Hayır.",
        "Why the küresel altın ons fiyatı matters" => "Küresel altın ons fiyatı neden önemlidir",
        "From the global ounce to a local gram price" => "Küresel ons fiyatından yerel gram fiyatına",
        "Gold is commonly quoted in international markets by the troy ounce. Traders, refiners, financial services, and bullion dealers use this benchmark to compare the value of gold across markets. Changes in the US dollar, interest-rate expectations, inflation outlook, central-bank activity, and investor demand can all influence the international gold price. These are general market drivers, not a claim that any one factor caused today's movement." => "Uluslararası piyasalarda altın genellikle troy ons üzerinden fiyatlandırılır. Yatırımcılar, rafineriler, finans kuruluşları ve külçe altın satıcıları bu ölçütü farklı piyasalardaki altın değerlerini karşılaştırmak için kullanır. ABD dolarındaki değişimler, faiz beklentileri, enflasyon görünümü, merkez bankalarının faaliyetleri ve yatırımcı talebi uluslararası altın fiyatını etkileyebilir. Bunlar genel piyasa etkenleridir; bugünkü hareketin tek bir nedenden kaynaklandığı anlamına gelmez.",
        "For a simple reference comparison, a troy ounce contains about 31.1 grams. The local price gram başına also depends on the selected currency conversion and local market conditions. The global ounce figure above remains in USD so that it can be compared consistently with international quotations." => "Karşılaştırma amacıyla bir troy ons yaklaşık 31,1 gramdır. Gram başına yerel fiyat, seçilen para birimine dönüşüme ve yerel piyasa koşullarına da bağlıdır. Yukarıdaki küresel ons değeri, uluslararası fiyatlarla tutarlı biçimde karşılaştırılabilmesi için USD olarak gösterilir.",
        "One troy ounce is yaklaşık 31.1035 grams. The page uses 31.1 grams for its displayed reference calculation." => "Bir troy ons yaklaşık 31,1035 gramdır. Bu sayfadaki referans hesaplamasında 31,1 gram kullanılır.",
        "No. This page shows the international gold ounce benchmark in USD only. Local-currency values are shown separately in the country gold-price tables where applicable." => "Hayır. Bu sayfada uluslararası altın ons referans fiyatı yalnızca USD olarak gösterilir. Uygun olduğunda yerel para birimindeki değerler ülkenin altın fiyatı tablolarında ayrıca sunulur.",
        "The calculation multiplies the relevant per-gram gold value by 8 grams. For the common 21K reference, the displayed estimate uses the 21K gram price multiplied by eight. The 22K and 24K comparison values use their respective gram prices at the same weight. This preserves the site's established 8-gram coin calculation." => "Hesaplamada ilgili gram altın değeri 8 gram ile çarpılır. Yaygın 21 ayar referansında gösterilen tahmin, 21 ayar gram fiyatının sekizle çarpılmasıyla elde edilir. 22 ve 24 ayar karşılaştırma değerlerinde aynı ağırlık için ilgili gram fiyatları kullanılır. Böylece sitenin yerleşik 8 gramlık sikke hesaplaması korunur.",
        "Actual coin prices may differ because of minting, condition, design, scarcity, dealer premiums, and local taxes. The values here represent the gold-content reference and should not be treated as a guaranteed transaction quote." => "Sikkenin gerçek fiyatı basım, kondisyon, tasarım, nadirlik, satıcı primi ve yerel vergilere göre değişebilir. Buradaki değerler yalnızca altın içeriğinin referans değeridir; kesin bir alım satım teklifi olarak değerlendirilmemelidir.",
        "Gold bars are commonly valued using the 24K gold benchmark." => "Altın külçeler genellikle 24 ayar altın referans fiyatı üzerinden değerlendirilir.",
        "For a straightforward estimate, multiply the 24K gram benchmark by the bar's weight. The resulting figure represents the reference value of the gold content before any fabrication premium, assay or hallmarking fee, dealer margin, delivery cost, or tax. A bar's final selling price can therefore be higher than the raw calculation shown on this page." => "Basit bir tahmin için 24 ayar gram altın referans fiyatını külçenin ağırlığıyla çarpın. Elde edilen tutar; üretim, analiz veya damgalama ücreti, satıcı marjı, teslimat bedeli ve vergiler eklenmeden önceki altın içeriğinin referans değeridir. Bu nedenle külçenin nihai satış fiyatı bu sayfadaki ham hesaplamadan daha yüksek olabilir.",
        "Brand, certification, manufacturing costs, dealer premiums, availability, and local taxes can affect the final selling price." => "Marka, sertifika, üretim maliyetleri, satıcı primi, bulunabilirlik ve yerel vergiler nihai satış fiyatını etkileyebilir.",
        "The index is a convenient snapshot of gold values across common purities and currencies. It helps readers compare the 24K bullion benchmark with the lower-karat values commonly used for jewellery. Local values are derived from the reference gold price and the available exchange-rate data; the USD figures allow comparison with the international market." => "Endeks, yaygın saflık dereceleri ve para birimlerindeki altın değerlerinin genel bir görünümünü sunar. Okuyucuların 24 ayar külçe altın referansını mücevherlerde sık kullanılan daha düşük ayarlarla karşılaştırmasına yardımcı olur. Yerel değerler referans altın fiyatı ve mevcut döviz kuru verilerinden hesaplanır; USD tutarları uluslararası piyasa karşılaştırması sağlar.",
        "Each karat contains a different proportion of pure gold. Lower-purity alloys have a lower raw-gold value gram başına than 24K gold, before other costs are considered." => "Her ayar farklı oranda saf altın içerir. Diğer maliyetler hesaba katılmadan önce düşük ayarlı alaşımların gram başına ham altın değeri 24 ayar altından daha düşüktür.",
        "A local gold-price estimate combines an international gold benchmark with a currency conversion and, in real retail markets, any applicable local premiums, taxes, or costs. This page lists selected currency comparisons to help readers understand the conversion context. Rates are informational and may differ from bank, cash-market, card, or remittance rates available to an individual customer." => "Yerel altın fiyatı tahmini, uluslararası altın referansını döviz dönüşümüyle birleştirir; gerçek perakende piyasasında geçerli yerel primler, vergiler ve masraflar da etkili olabilir. Bu sayfa dönüşüm bağlamını açıklamak için seçilmiş para birimi karşılaştırmaları sunar. Kurlar bilgilendirme amaçlıdır ve bankaların, nakit piyasasının, kartların veya para transferi hizmetlerinin kurlarından farklı olabilir.",
        "No. It is the latest available reference used by the site. Banks and exchange providers may apply different buy and sell rates, spreads, or fees." => "Hayır. Bu, sitenin kullandığı en güncel referans kurdur. Bankalar ve döviz sağlayıcıları farklı alış ve satış kurları, makaslar veya ücretler uygulayabilir.",
        "Because international gold is commonly quoted in US dollars, converting that benchmark into local currency is one of the factors used to estimate local gold values." => "Uluslararası altın genellikle ABD doları üzerinden fiyatlandırıldığından, bu referansın yerel para birimine çevrilmesi yerel altın değerini tahmin etmede kullanılan faktörlerden biridir.",
        "Gold Price Charts" => "Altın Fiyat Grafikleri",
        "Track the international gold spot price in US dollars (USD) using the global XAU/USD market chart. This is a worldwide benchmark, not a country-specific retail price." => "Küresel XAU/USD piyasa grafiğini kullanarak uluslararası spot altın fiyatını ABD doları (USD) cinsinden takip edin. Bu dünya çapında bir referanstır; belirli bir ülkenin perakende fiyatı değildir.",
        "How many grams are in a gold troy ounce?" => "Bir troy ons altın kaç gramdır?",
        "Is this ounce price converted to local currency?" => "Bu ons fiyatı yerel para birimine çevriliyor mu?",
        "Does the index show a guaranteed market trading price?" => "Endeks garantili bir piyasa işlem fiyatı mı gösteriyor?",
        "Does the displayed value include a dealer premium?" => "Gösterilen değere satıcı primi dahil mi?",
        "Mısır altın fiyatları" => "Mısır Altın Fiyatları",
        "Suudi Arabistan altın fiyatları" => "Suudi Arabistan Altın Fiyatları",
        "BAE altın fiyatları" => "Birleşik Arap Emirlikleri Altın Fiyatları",
        "Kuveyt altın fiyatları" => "Kuveyt Altın Fiyatları",
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
        $token = 'ALTQRGOLDTRBLOCK' . count($protected) . 'TOKEN';
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
ob_start('altaqrer_gold_tr_output_translate');

/**
 * Standalone English header for the country gold-price template.
 * The Arabic theme header and navigation are not loaded here.
 */
$tr_header_term = get_queried_object();
$tr_header_country_slug = (is_object($tr_header_term) && !empty($tr_header_term->slug))
    ? sanitize_title($tr_header_term->slug)
    : '';
if ($tr_header_country_slug === '' && is_object($tr_header_term) && !empty($tr_header_term->term_id)) {
    $tr_header_country_slug = strtolower((string) get_term_meta((int) $tr_header_term->term_id, 'country_code', true));
}
if ($tr_header_country_slug === '') {
    $tr_header_country_slug = 'eg';
}
$tr_header_country_url = home_url('/tr/country/' . rawurlencode($tr_header_country_slug) . '/');
$tr_header_home_url = home_url('/tr/');
$tr_header_accent = get_theme_mod('infi_default_color', '#ffb301');
$tr_header_logo_id = (int) get_theme_mod('custom_logo');
$tr_header_is_app = (isset($_GET['view']) && sanitize_text_field(wp_unslash($_GET['view'])) === 'app');
?>
<!DOCTYPE html>
<html lang="tr" dir="ltr">
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
// TR SEO metadata: unique Rank Math title ve description for every gold section.
$tr_meta_term = get_queried_object();
$tr_meta_term_id = (is_object($tr_meta_term) && isset($tr_meta_term->term_id)) ? (int) $tr_meta_term->term_id : 0;
$tr_meta_country = '';
$tr_meta_country = $tr_meta_term_id ? (string) get_term_meta($tr_meta_term_id, 'country_tr_name', true) : '';
if (function_exists('altaqrer_ml_country_name') && is_object($tr_meta_term)) { $tr_meta_country = (string) altaqrer_ml_country_name($tr_meta_term, 'tr'); }
if ($tr_meta_country === '') {
    $tr_meta_country = 'ülkenizde';
}
$tr_meta_view = sanitize_key((string) get_query_var('gold_view'));
$tr_meta_titles = array(
    '24k' => 'Bugün 24 ayar altın fiyatı ' . $tr_meta_country,
    '22k' => 'Bugün 22 ayar altın fiyatı ' . $tr_meta_country,
    '21k' => 'Bugün 21 ayar altın fiyatı ' . $tr_meta_country,
    '18k' => 'Bugün 18 ayar altın fiyatı ' . $tr_meta_country,
    '14k' => 'Bugün 14 ayar altın fiyatı ' . $tr_meta_country,
    'ounce' => 'USD cinsinden küresel altın ons fiyatı ' . $tr_meta_country,
    'coin' => '8 gram altın sikke fiyatı ' . $tr_meta_country,
    'gold-bars' => 'Bugünkü altın külçe fiyatları ' . $tr_meta_country,
    'gold-index' => 'Canlı altın fiyat endeksi ' . $tr_meta_country,
    'usd' => 'ABD doları döviz kuru ' . $tr_meta_country,
);
$tr_meta_descriptions = array(
    '24k' => '24 ayar altının gram fiyatını inceleyin. Yerel para birimi ve USD cinsinden referans değerleri karşılaştırın, saflık oranını öğrenin.',
    '22k' => '22 ayar altının gram fiyatını inceleyin ve 24 ayar altınla yerel para birimi ve USD cinsinden karşılaştırın.',
    '21k' => '21 ayar altının gram fiyatını takip edin, yerel ve USD değerlerini karşılaştırın ve 8 gram sikke hesaplamasını öğrenin.',
    '18k' => '18 ayar altının gram fiyatını, saf altın oranını ve metal değeri ile mücevher satış fiyatı arasındaki farkı inceleyin.',
    '14k' => '14 ayar altının gram fiyatını inceleyin ve saflığını 18, 21, 22 ve 24 ayar altınla karşılaştırın.',
    'ounce' => 'Altının troy ons başına küresel spot fiyatını USD cinsinden inceleyin ve yerel gram fiyatlarından farkını öğrenin.',
    'coin' => '8 gram altın sikkenin referans değerini inceleyin; ek satıcı ücretleri hariç 21, 22 ve 24 ayar değerlerini karşılaştırın.',
    'gold-bars' => '24 ayar gram fiyatını temel alarak farklı ağırlıklardaki altın külçelerinin referans değerlerini karşılaştırın.',
    'gold-index' => 'Altın fiyatlarını ayar ve para birimine göre karşılaştırın; yerel referans değerlerini ve USD cinsinden küresel ons fiyatını görün.',
    'usd' => 'En son mevcut USD referans kurunu inceleyin ve döviz hareketlerinin yerel altın fiyatlarını nasıl etkileyebileceğini öğrenin.',
);
$tr_meta_title = isset($tr_meta_titles[$tr_meta_view]) ? $tr_meta_titles[$tr_meta_view] : 'Bugün 24 ayar altın fiyatı ' . $tr_meta_country;
$tr_meta_description = isset($tr_meta_descriptions[$tr_meta_view]) ? $tr_meta_descriptions[$tr_meta_view] : '24 ayar altının gram fiyatını inceleyin. Yerel para birimi ve USD cinsinden referans değerleri karşılaştırın, saflık oranını öğrenin.';
add_filter('rank_math/frontend/title', function ($title) use ($tr_meta_title) {
    return $tr_meta_title . ' | AlTaqrer Gold';
}, 99);
add_filter('rank_math/frontend/description', function ($description) use ($tr_meta_description) {
    return $tr_meta_description;
}, 99);
?>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() . '/style.css?v=1sz'); ?>" data-navigate-track="reload">
<script type="application/ld+json">
<?php echo wp_json_encode(array(
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'AlTaqrer Gold',
    'url' => $tr_header_home_url,
    'sameAs' => array('https://www.instagram.com/altaqrergold', 'https://www.facebook.com/altaqrergold')
), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>
<style>
html, body { direction:ltr; text-align:left; }
body { background:#f5d771 !important; max-width:100vw; overflow-x:hidden; position:relative; font-family:Inter,Arial,sans-serif; }
.tr-site-header { position:relative; z-index:1000; background:#1a1a1a; border-bottom:4px solid <?php echo esc_attr($tr_header_accent); ?>; color:#fff; }
.tr-site-header-inner { max-width:1200px; width:95%; margin:0 auto; min-height:74px; display:flex; align-items:center; justify-content:space-between; gap:18px; padding:10px 0; }
.en-brand { display:flex; align-items:center; gap:10px; color:#fff; text-decoration:none; font-weight:800; font-size:20px; white-space:nowrap; }
.en-brand img { max-width:54px; max-height:54px; width:auto; height:auto; object-fit:contain; }
.tr-main-nav { display:flex; align-items:center; justify-content:flex-end; gap:8px; flex-wrap:wrap; }
.tr-main-nav a, .tr-country-toggle { color:#fff; text-decoration:none; border:1px solid rgba(255,255,255,.15); background:transparent; border-radius:6px; padding:9px 12px; font:600 13px Inter,Arial,sans-serif; cursor:pointer; }
.tr-main-nav a:hover, .tr-country-toggle:hover { color:#1a1a1a; background:<?php echo esc_attr($tr_header_accent); ?>; }
.tr-country-wrap { position:relative; }
.tr-country-menu { display:none; position:absolute; top:calc(100% + 6px); left:0; min-width:210px; background:#202329; border:1px solid #444; border-radius:7px; padding:7px; box-shadow:0 8px 24px rgba(0,0,0,.25); z-index:10000; }
.tr-country-menu a { display:block; border:0; border-radius:4px; text-align:left; }
.tr-country-menu.is-open { display:block; }
@media(max-width:760px) { .tr-site-header-inner { align-items:flex-start; flex-direction:column; } .tr-main-nav { justify-content:flex-start; width:100%; } .tr-main-nav a,.tr-country-toggle { padding:8px 10px; } }
@media(max-width:480px) { .tr-main-nav { gap:6px; } .tr-main-nav a,.tr-country-toggle { font-size:12px; } }
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
.tr-seo-article { max-width:900px; width:95%; box-sizing:border-box; margin:28px auto; padding:24px; color:#e5e7eb; background:#1f2126; border:1px solid #343944; border-left:5px solid <?php echo esc_attr($tr_header_accent); ?>; border-radius:9px; line-height:1.85; font-size:15px; }
.tr-seo-article h2,.tr-seo-article h3 { color:#fff; line-height:1.35; }
.tr-seo-article h2 { font-size:23px; margin:0 0 14px; }
.tr-seo-article h3 { font-size:18px; margin:22px 0 8px; }
.tr-seo-article p { margin:0 0 13px; }
.tr-seo-article a { color:<?php echo esc_attr($tr_header_accent); ?>; text-decoration:none; font-weight:700; }
.tr-seo-article a:hover { text-decoration:underline; }
.tr-seo-article details { border-top:1px solid #3a3f4d; padding:11px 0; }
.tr-seo-article summary { cursor:pointer; color:#fff; font-weight:700; }
.tr-seo-article details p { margin:8px 0 0; color:#cbd5e1; }
.tr-site-footer { margin-top:32px; background:#1a1a1a; color:#eee; border-top:4px solid <?php echo esc_attr($tr_header_accent); ?>; }
.tr-site-footer-inner { max-width:1200px; width:95%; margin:0 auto; padding:28px 0 18px; display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:24px; }
.tr-site-footer h3 { color:#e0b94f; font-size:16px; margin:0 0 12px; }
.tr-site-footer p,.tr-site-footer li { color:#c8c8c8; font-size:13px; line-height:1.8; }
.tr-site-footer ul { list-style:none; padding:0; margin:0; }
.tr-site-footer a { color:#e0b94f; text-decoration:none; }
.tr-site-footer a:hover { text-decoration:underline; }
.tr-footer-bottom { text-align:center; border-top:1px solid #393939; padding:15px 10px; font-size:13px; color:#c8c8c8; }
@media(max-width:768px) { .tr-site-footer-inner { grid-template-columns:1fr; gap:18px; text-align:center; } }
</style>
</head>
<body <?php body_class('tr-gold-template'); ?>>
<?php if (function_exists('wp_body_open')) { wp_body_open(); } ?>

<?php if (!$tr_header_is_app) : ?>
<header class="tr-site-header">
  <div class="tr-site-header-inner">
    <a class="en-brand" href="<?php echo esc_url($tr_header_home_url); ?>" aria-label="AlTaqrer Gold home">
      <?php if ($tr_header_logo_id) : ?>
        <?php echo wp_get_attachment_image($tr_header_logo_id, 'full', false, array('alt' => 'AlTaqrer Gold')); ?>
      <?php else : ?>
        <span>AlTaqrer Gold</span>
      <?php endif; ?>
    </a>
    <nav class="tr-main-nav" aria-label="Main navigation">
      <a href="<?php echo esc_url($tr_header_home_url); ?>">Ana Sayfa</a>
      <a href="<?php echo esc_url($tr_header_country_url); ?>">Altın Fiyatları</a>
      <a href="<?php echo esc_url($tr_header_country_url . 'gold-bars/'); ?>">Altın Külçeler</a>
      <a href="<?php echo esc_url($tr_header_country_url . 'gold-index/'); ?>">Altın Endeksi</a>
      <a href="<?php echo esc_url($tr_header_country_url . 'usd/'); ?>">USD Kurları</a>
      <div class="tr-country-wrap">
        <button class="tr-country-toggle" type="button" aria-expanded="false" aria-controls="tr-country-menu">Countries ▾</button>
        <div class="tr-country-menu" id="tr-country-menu">
          <a href="<?php echo esc_url(home_url('/tr/country/eg/')); ?>">Mısır</a>
          <a href="<?php echo esc_url(home_url('/tr/country/sa/')); ?>">Suudi Arabistan</a>
          <a href="<?php echo esc_url(home_url('/tr/country/ae/')); ?>">Birleşik Arap Emirlikleri</a>
          <a href="<?php echo esc_url(home_url('/tr/country/kw/')); ?>">Kuveyt</a>
          <a href="<?php echo esc_url($tr_header_home_url); ?>">Tüm Ülkeler</a>
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
if (!$tr_header_is_app && function_exists('goldnow_display_ad')) :
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
if (!function_exists('altaqrer_gold_tr_translate_shortcode_html')) {
    function altaqrer_gold_tr_translate_shortcode_html($html, $translations = array()) {
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
        ? (string) altaqrer_ml_country_name($current_term, 'tr')
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
    $currency_labels_tr = array(
        'USD'=>'ABD Doları','EUR'=>'Euro','GBP'=>'İngiliz Sterlini','EGP'=>'Mısır Lirası','SAR'=>'Suudi Arabistan Riyali','AED'=>'BAE Dirhemi',
        'KWD'=>'Kuveyt Dinarı','QAR'=>'Katar Riyali','BHD'=>'Bahreyn Dinarı','OMR'=>'Umman Riyali','JOD'=>'Jordanian Dinar',
        'IQD'=>'Iraqi Dinar','MAD'=>'Moroccan Dirham','TND'=>'Tunisian Dinar','DZD'=>'Algerian Dinar','TRY'=>'Turkish Lira',
        'JPY'=>'Japon Yeni','CHF'=>'Swiss Franc','CAD'=>'Canadian Dollar','AUD'=>'Australian Dollar','NZD'=>'New Zealand Dollar',
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
    $currency_label = isset($currency_labels_tr[$country_currency]) ? $currency_labels_tr[$country_currency] : ($country_currency !== '' ? $country_currency : 'Yerel Para Birimi');
    $today = function_exists('wp_date') ? wp_date('d/m/Y') : date('d/m/Y');

    // Build a text-only translation dictionary for legacy shortcodes that still use Arabic labels.
    $shortcode_translation_map_tr = array(
        'ذهب عيار 24' => '24 ayar altın', 'ذهب عيار 22' => '22 ayar altın', 'ذهب عيار 21' => '21 ayar altın',
        'ذهب عيار 18' => '18 ayar altın', 'ذهب عيار 14' => '14 ayar altın', 'ذهب عيار 12' => '12 ayar altın',
        'عيار 24' => '24 ayar altın', 'عيار 22' => '22 ayar altın', 'عيار 21' => '21 ayar altın', 'عيار 18' => '18 ayar altın', 'عيار 14' => '14 ayar altın', 'عيار 12' => '12 ayar altın',
        'جرام عيار 24' => '24 ayar altın gram fiyatı', 'جرام عيار 22' => '22 ayar altın gram fiyatı', 'جرام عيار 21' => '21 ayar altın gram fiyatı',
        'جرام عيار 18' => '18 ayar altın gram fiyatı', 'جرام عيار 14' => '14 ayar altın gram fiyatı',
        'جرام عيار 12' => '12 ayar altın gram fiyatı',
        'الأونصة العالمية' => 'Küresel Altın Ons', 'أونصة الذهب العالمية' => 'Küresel Altın Ons',
        'الأونصة بالعملة المحلية' => 'Gold Ounce in Local Currency', 'أونصة الذهب بالعملة المحلية' => 'Gold Ounce in Local Currency',
        'جنيه الذهب' => 'Altın Sikke', 'الجنيه الذهب' => 'Altın Sikke', 'سعر الجنيه الذهب' => 'Gold Coin Price',
        'السعر بالدولار' => 'Price in USD', 'سعر الدولار' => 'US Dollar Rate', 'سعر الدولار اليوم' => 'US Dollar Rate Today',
        'السعر بالعملة المحلية' => 'Price in Local Currency', 'سعر الذهب بالدولار' => 'Gold Price in USD',
        'جنيه مصري' => 'Egyptian Pound', 'الدولار الأمريكي' => 'US Dollar', 'دولار أمريكي' => 'US Dollar',
        'الأكثر تداولاً' => 'En Çok İşlem Gören',
        'الأكثر تداولا' => 'En Çok İşlem Gören',
        'انضم إلى قناتنا على تيليجرام' => 'Telegram Kanalımıza Katılın', 'انضم إلى قناتنا على تليجرام' => 'Telegram Kanalımıza Katılın', 'انضم لقناتنا على تيليجرام' => 'Telegram Kanalımıza Katılın', 'انضم لقناتنا على تليجرام' => 'Telegram Kanalımıza Katılın',
        'تنويه هام:' => 'Important Notice:', 'الوزن / النوع' => 'Ağırlık / Tür', 'السعر' => 'Fiyat',
        'السعر الآن' => 'Live Price', 'أعلى سعر' => 'Highest Price', 'أقل سعر' => 'Lowest Price',
        'التغير' => 'Change', 'التحديث اللحظي' => 'Live Update', 'بدون مصنعية' => 'İşçilik Ücreti Hariç',
        'سعر الذهب' => 'Gold Price', 'أسعار الذهب' => 'Altın Fiyatları', 'العملة المحلية' => 'Yerel Para Birimi'
    );

    // Reuse the existing functions.php dictionaries where possible without modifying Arabic globals.
    global $currency_names, $carat_labels;
    if (is_array($currency_names)) {
        foreach ($currency_names as $code => $arabic_label) {
            if (isset($currency_labels_tr[$code]) && is_string($arabic_label) && $arabic_label !== '') {
                $shortcode_translation_map_tr[$arabic_label] = $currency_labels_tr[$code];
            }
        }
    }
    if (is_array($carat_labels)) {
        $carat_english = array('24k'=>'24 ayar altın','22k'=>'22 ayar altın','21k'=>'21 ayar altın','18k'=>'18 ayar altın','14k'=>'14 ayar altın','12k'=>'12 ayar altın','24k_oz'=>'Gold Ounce','gold_pound'=>'Altın Sikke');
        foreach ($carat_labels as $key => $arabic_label) {
            if (isset($carat_english[$key]) && is_string($arabic_label) && $arabic_label !== '') {
                $shortcode_translation_map_tr[$arabic_label] = $carat_english[$key];
            }
        }
    }
    if ($arabic_country_name !== '' && $arabic_country_name !== $display_country_name) {
        $shortcode_translation_map_tr[$arabic_country_name] = $display_country_name;
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
// TR section-specific SEO H1 titles and introductions, following the Hindi/German layout.
$tr_seo_titles = array(
    '24k' => 'Bugün 24 ayar altın fiyatı: ' . $display_country_name,
    '22k' => 'Bugün 22 ayar altın fiyatı: ' . $display_country_name,
    '21k' => 'Bugün 21 ayar altın fiyatı: ' . $display_country_name,
    '18k' => 'Bugün 18 ayar altın fiyatı: ' . $display_country_name,
    '14k' => 'Bugün 14 ayar altın fiyatı: ' . $display_country_name,
    'ounce' => 'Bugün küresel altın ons spot fiyatı (USD)',
    'coin' => 'Bugün 8 gram altın sikke fiyatı: ' . $display_country_name,
    'gold-bars' => 'Bugün altın külçe fiyatları: ' . $display_country_name,
    'gold-index' => 'Canlı altın fiyat endeksi: ' . $display_country_name,
    'usd' => 'Bugün ABD doları döviz kuru: ' . $display_country_name,
);
$tr_seo_intros = array(
    '24k' => '' . $display_country_name . ' için 24 ayar altının gram başına referans fiyatını inceleyin. Yerel para birimindeki değeri USD karşılığıyla karşılaştırın. 24 ayar altın, külçe ve yatırım altını için saflık ölçütüdür.',
    '22k' => '' . $display_country_name . ' için 22 ayar altının gram fiyatını takip edin ve 24 ayar altınla karşılaştırın. 22 ayar altın 24 parçanın 22 parçası saf altından oluşur; diğer metaller özellikleri ve değeri etkiler.',
    '21k' => '' . $display_country_name . ' için 21 ayar altının gram fiyatını, yerel para birimi ve USD referans değerleriyle inceleyin. İşçilik, satıcı payı ve vergiler nihai satış fiyatını değiştirebilir.',
    '18k' => '' . $display_country_name . ' için 18 ayar altının gram başına referans fiyatını görün. 18 ayar altın 24 parçanın 18 parçası altındır; gösterilen metal değeri bitmiş bir mücevherin mağaza fiyatıyla aynı olmayabilir.',
    '14k' => '' . $display_country_name . ' için 14 ayar altının gram fiyatını 18, 21, 22 ve 24 ayar altınla karşılaştırın. Referans değer, 24 parçanın 14 parçası olan saf altın oranına bağlıdır.',
    'ounce' => 'Altının bir troy onsu için USD cinsinden küresel spot fiyatı takip edin. Bir troy ons yaklaşık 31,1035 gramdır. Bu küresel referanstır; ülkeye özgü yerel para birimiyle ons fiyatı değildir.' . $display_country_name . '',
    'coin' => '' . $display_country_name . ' için 8 gram altın sikkenin referans değerini inceleyin. Sitedeki hesaplama 8 gram ağırlığı esas alır ve 21, 22 ve 24 ayar altın içeriğini karşılaştırır; basım, durum, satıcı payı ve vergiler gerçek fiyatı etkileyebilir.',
    'gold-bars' => '' . $display_country_name . ' için farklı ağırlıklardaki altın külçelerinin referans değerlerini 24 ayar gram fiyatına göre karşılaştırın. Sertifika, marka, üretim, teslimat ve vergiler nihai maliyeti etkileyebilir.',
    'gold-index' => '' . $display_country_name . ' için altın fiyatlarını ayar ve para birimine göre karşılaştırın. Endeks, yerel referans değerlerini ve USD cinsinden küresel troy ons fiyatını bir araya getirir.',
    'usd' => '' . $display_country_name . ' için mevcut en son USD referans kurunu inceleyin. Uluslararası altın genellikle ABD dolarıyla fiyatlandığından döviz hareketleri yerel altın fiyatlarını etkileyebilir.',
);
$tr_seo_h1 = isset($tr_seo_titles[$gold_view]) ? $tr_seo_titles[$gold_view] : 'Bugün 24 ayar altın fiyatı: ' . $display_country_name;
$tr_seo_intro = isset($tr_seo_intros[$gold_view]) ? $tr_seo_intros[$gold_view] : '' . $display_country_name . ' için 24 ayar altının gram başına referans fiyatını inceleyin. Yerel para birimindeki değeri USD karşılığıyla karşılaştırın. 24 ayar altın, külçe ve yatırım altını için saflık ölçütüdür.';
?>
<section class="tr-seo-intro" aria-labelledby="tr-seo-h1" style="max-width:1000px;width:95%;box-sizing:border-box;margin:18px auto 22px;padding:20px 22px;background:#1f2126;border:1px solid #343944;border-left:5px solid <?php echo esc_attr(get_theme_mod('infi_default_color', '#ffb301')); ?>;border-radius:9px;color:#e5e7eb;line-height:1.85;text-align:left;direction:ltr;">
    <h1 id="tr-seo-h1" style="margin:0 0 10px;color:#fff;font-size:clamp(22px,3vw,30px);line-height:1.35;font-weight:800;"><?php echo esc_html($tr_seo_h1); ?></h1>
    <p style="margin:0;"><?php echo esc_html($tr_seo_intro); ?></p>
    <p style="margin:10px 0 0;color:#aeb7c4;font-size:13px;">Son güncelleme: <?php echo esc_html($today); ?> · Fiyatlar gösterge niteliğindedir ve piyasa koşullarına göre değişebilir.</p>
</section>

    <!-- ✅ Tab Navigation Buttons -->
    <div class="gold-tabs-nav text-center py-4">
      <button class="gold-tab-btn active" type="button" data-tab="now">Canlı Fiyatlar</button>
      <button class="gold-tab-btn" type="button" data-tab="buy-sell">Altın Külçeler</button>
      <button class="gold-tab-btn" type="button" data-tab="indicator">Altın Fiyat Grafiği</button>
    </div>

    <!-- ✅ Tab Content Container -->
    <div class="gold-tabs-content">
      
      <!-- 1. Live Prices Pane -->
      <div id="tab-now" class="gold-tab-pane" style="display:block;">
        <!-- 📊 SEO Heading: Fully programmatically structured in English layout -->
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align: left; direction: ltr;">
          <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
          <img alt="<?php echo esc_html($display_country_name); ?> güncel altın fiyatları" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align: middle; margin-right: 5px;">
        <?php
        if ( $gold_view == '24k' ) { echo esc_html($display_country_name) . ' için bugün 24 ayar altın fiyatı'; }
        elseif ( $gold_view == '22k' ) { echo esc_html($display_country_name) . ' için bugün 22 ayar altın fiyatı'; }
        elseif ( $gold_view == '21k' ) { echo esc_html($display_country_name) . ' için bugün 21 ayar altının gram fiyatı'; }
        elseif ( $gold_view == '18k' ) { echo esc_html($display_country_name) . ' için bugün 18 ayar altın fiyatı'; }
        elseif ( $gold_view == '14k' ) { echo esc_html($display_country_name) . ' için bugün 14 ayar altın fiyatı'; }
        elseif ( $gold_view == 'ounce' ) { echo 'Bugünkü küresel altın ons fiyatı (USD)'; }
        elseif ( $gold_view == 'coin' ) { echo esc_html($display_country_name) . ' için bugün altın sikke fiyatı'; }
        elseif ( $gold_view == 'gold-bars' ) { echo esc_html($display_country_name) . ' için bugün külçe altın fiyatları'; }
        elseif ( $gold_view == 'gold-index' ) { echo esc_html($display_country_name) . ' için bugün canlı altın piyasası endeksi'; }
        elseif ( $gold_view == 'usd' ) { echo esc_html($display_country_name) . ' için bugün ABD doları ve döviz kurları'; }
        else { echo esc_html($display_country_name) . ' için bugün altın fiyatları'; }?>
        </h2>
        
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align: left; direction: ltr;">
          <?php 
          if ($gold_view == 'usd') { echo 'Başlıca uluslararası ve bölgesel para birimleri için canlı döviz kurları'; }
          elseif ($gold_view == 'ounce') { echo 'USD cinsinden 24 ayar altının bir troy onsu için uluslararası spot referans fiyatı'; }
          else { echo 'Altın fiyatı ' . esc_html($display_country_name) . ' —  işçilik ücretleri hariç'; }
          ?>
        </h3>

        <!-- Gold Price Cards Shortcode Section -->
        <section id="gold-cards" class="mb-4">
            <?php echo altaqrer_gold_tr_translate_shortcode_html(do_shortcode('[infi_gold_cards currency="' . esc_attr($country_currency) . '" currency_label="' . esc_attr($currency_label) . '"]'), $shortcode_translation_map_tr); ?>
        </section>

        <!-- Gold Information Panels Shortcode Section -->
        <section id="gold-info-boxes" class="mb-4">
            <?php echo altaqrer_gold_tr_translate_shortcode_html(do_shortcode('[infi_gold_info_boxes currency="' . esc_attr($country_currency) . '"]'), $shortcode_translation_map_tr); ?>
        </section>
	  </div>
		
      <!-- 2. Gold Bullion Bars and Coins Table Pane -->
      <div id="tab-buy-sell" class="gold-tab-pane" style="display:none; text-align: left; direction: ltr;">
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align:left !important; direction:ltr !important;">
            <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
            <img alt="Altın külçeler ve sikkeler — <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; margin-right: 5px;">
            Altın külçeler ve sikkeler — <?php echo esc_html($display_country_name); ?>
        </h2>
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align:left !important; direction:ltr !important;">
          En güncel külçe ve altın sikke fiyatları (işçilik ücretleri hariç)
        </h3>

        <?php if (function_exists('infi_get_latest_gold_prices')) { ?>
            <!-- A) Gold Bars Price Table -->
            <section id="sabika-price" class="gold-section mt-4">
                <div class="section-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <h4>Altın külçe fiyatları — <?php echo esc_html($display_country_name); ?></h4>
                    <span class="date-badge" style="background: #262930; padding: 4px 10px; border-radius: 4px; font-size: 13px;"><?php echo esc_html($today); ?></span>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>Ağırlık / Tür</th>
                                <th>Fiyat (<?php echo $currency_label; ?>)</th>
                                <th>Fiyat (USD)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $weights = [
                                ['weight' => 1, 'name' => 'Altın külçe — 1 g'],
                                ['weight' => 2.5, 'name' => 'Altın külçe — 2,5 g'],
                                ['weight' => 5, 'name' => 'Altın külçe — 5 g'],
                                ['weight' => 10, 'name' => 'Altın külçe — 10 g'],
                                ['weight' => 20, 'name' => 'Altın külçe — 20 g'],
                                ['weight' => 31.1, 'name' => 'Troy onsu (31,1 g)'],
                                ['weight' => 50, 'name' => 'Altın külçe — 50 g'],
                                ['weight' => 100, 'name' => 'Altın külçe — 100 g'],
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
                    <h4>Altın sikke fiyatları — <?php echo esc_html($display_country_name); ?></h4>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>Sikke Ayarı</th>
                                <th>Fiyat (<?php echo $currency_label; ?>)</th>
                                <th>Fiyat (USD)</th>
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
                                    <td class="font-bold">8 g altın sikke (<?php echo $carat_num; ?> ayar)</td>
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
                <strong>Önemli:</strong> The prices shown above for bars and coins represent Yukarıda gösterilen külçe ve sikke fiyatları yalnızca altının değerini ifade eder; işçilik ücretleri, damgalama masrafları ve vergiler dahil değildir.
            </div>

        <?php } else { ?>
            <p style="text-align:center; padding:20px;">Üzgünüz, piyasa verileri şu anda kullanılamıyor.</p>
        <?php } ?>
      </div>

      <!-- 3. Gold Price Chart: restored to match the Arabic template structure. -->
      <div id="tab-indicator" class="gold-tab-pane" style="display:none; direction:ltr; text-align:left;">
        <h2 class="col-12 p-0 font-3 mb-3" style="text-align:left; direction:ltr;">
          <span class="start-head cls120" style="background: <?php echo esc_attr(get_theme_mod('infi_default_color', '#ffb301')); ?>;"></span>
          <?php echo esc_html($display_country_name); ?> için altın fiyat grafiği
        </h2>
        <div class="gold-frame-box mb-4" style="direction:ltr; text-align:left;">
          <?php
          $en_chart_shortcode = '[infi_gold_chart carat="21k" currency="' . esc_attr($country_currency) . '" title="21K Gold Price Movement"]';
          echo altaqrer_gold_tr_translate_shortcode_html(do_shortcode($en_chart_shortcode), $shortcode_translation_map_tr);
          ?>
        </div>
        <div id="ajax-indicator-frames" class="gold-frame-box" style="direction:ltr; text-align:left;"></div>
        <p style="color:#94a3b8; text-align:left; font-size:13px; margin:10px 4px 18px;">Grafikler, piyasadaki gösterge niteliğindeki hareketleri gösterir. Yerel fiyatlar döviz kurları, primler ve piyasa koşulları nedeniyle farklılık gösterebilir.</p>
      </div>

    </div>
  </div>
</main>

<script>
// Translate legacy Arabic labels returned by the existing indicator AJAX action.
function altaqrerTranslateEnglishIndicator(root) {
    if (!root) return;
    const translations = {
        'عيار 24': '24 ayar altın', 'عيار 22': '22 ayar altın', 'عيار 21': '21 ayar altın',
        'عيار 18': '18 ayar altın', 'عيار 14': '14 ayar altın', 'عيار 12': '12 ayar altın',
        'الأونصة العالمية': 'Global Gold Ounce (USD)',
        'الأونصة بالعملة المحلية': 'Gold Ounce in Local Currency',
        'جنيه الذهب': 'Altın Sikke', 'سعر الدولار': 'US Dollar Exchange Rate',
        'جنيه مصري': 'Egyptian Pound', 'دولار أمريكي': 'US Dollar',
        'انضم إلى قناتنا على تيليجرام': 'Telegram Kanalımıza Katılın',
        'انضم إلى قناتنا على تليجرام': 'Telegram Kanalımıza Katılın'
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
                framesContainer.innerHTML = '<p style="text-align:center;padding:18px;color:#cbd5e1;">Altın fiyat grafikleri yükleniyor…</p>';
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
                    framesContainer.innerHTML = '<p style="text-align:center;padding:18px;color:#fca5a5;">Grafik verileri yüklenemedi. Lütfen tekrar deneyin.</p>';
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
        📊 Altın takip aracı, bugün <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo esc_html($display_country_name); ?> altın fiyatlarındaki son değişimleri gerçek zamanlı olarak</strong></span> gösterir. <img alt="<?php echo esc_html($display_country_name); ?> bayrağı" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align:middle; margin: 0 4px;"> Tarih: <strong><?php echo esc_html($today); ?></strong>. Bilgiler bölgesel piyasa verilerine ve <?php echo esc_html($display_country_name); ?> için uluslararası altın borsası kuruna dayanır.
    </p>

    <p style="margin-bottom: 15px;">
        💡 Bu rapor, en çok işlem gören saflık olan <strong>21 ayar altın</strong> başta olmak üzere <strong>22, 18 ve 14 ayar altın</strong> dâhil tüm kategorilerdeki güncel altın fiyatlarını takip etmenizi sağlar. Ayrıca diğer değerli metallerin fiyatlarını, mücevher piyasasını ve günlük piyasa hareketlerini kapsar.
    </p>

    <p style="margin-bottom: 15px;">
        ✨ Güncel piyasa verilerine göre, işçilik ücretleri hariç <strong>24 ayar altının gram fiyatı</strong> yaklaşık <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($gram_24k_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> ( <strong><?php echo number_format($gram_24k_price_usd_converted, 2); ?> ABD doları</strong> karşılığı) düzeyindedir. Yüksek saflığı nedeniyle bu değer <strong>külçe altınlar</strong> için temel ölçüttür.
    </p>

    <p style="margin-bottom: 15px;">
        📈 Bugün <strong>küresel altın ons fiyatı</strong> (24 ayar altının 31,1 gramı) <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong> seviyesindedir. Bu, uluslararası spot piyasanın referans fiyatıdır; yerel fiyatlar mevcut en güncel döviz kuruyla ayrıca çevrilir.
    </p>

    <p style="margin-bottom: 15px;">
        🪙 Tasarruf sahipleri ve yatırımcılar için, yaygın olarak işlem gören 21 ayar saflığında 8 gramlık bir <strong>altın sikkenin</strong> yaklaşık referans fiyatı <strong><?php echo number_format($gold_pound_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong> düzeyindedir.
    </p>

    <p style="margin-bottom: 20px;">
        🛠️ Birikimlerinizin değerini izlemek için <strong>canlı altın piyasa endeksini</strong> ve 1 gramdan 1 kilograma kadar farklı ağırlıklardaki <strong>külçe altın fiyatlarını</strong> takip etmek, alım veya satım öncesinde piyasa hareketlerini değerlendirmenize yardımcı olur.
    </p>

    <div style="background: #17191d; padding: 12px; border-radius: 6px; border: 1px dashed #3a3f4d; color: #d1d5db; font-size: 14px; margin-top: 15px;">
        💵 <strong>Döviz kuru göstergesi:</strong> Yerel altın fiyatları döviz kurlarından da etkilenir. En güncel piyasa verilerine göre bugün <strong><?php echo esc_html($display_country_name); ?> ABD doları kuru</strong> <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> / ABD dolarıdır. Güncel fiyat bildirimleri için <strong>altın fiyatları uygulamasını</strong> indirin.
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
            💵 Şu para birimine karşı canlı döviz kurları: <?php echo esc_html($currency_label); ?> karşısında <?php echo esc_html($display_country_name); ?> <img alt="<?php echo esc_html($display_country_name); ?> ülkesinin bayrağı" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:
        </strong>
        
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; text-align: left; direction: ltr;">
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'USD') : ?>
                    <div><img alt="Ülke bayrağı: United States" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_tr['USD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                    <div><img alt="Ülke bayrağı: United Kingdom" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_tr['GBP']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                    <div><img alt="Ülke bayrağı: Saudi Arabia" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_tr['SAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>

                <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                    <div><img alt="Ülke bayrağı: Bahrain" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_tr['BHD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                    <div><img alt="Ülke bayrağı: Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_tr['OMR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                    <div><img alt="Ülke bayrağı: European Union" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_tr['EUR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                    <div><img alt="Ülke bayrağı: United Arab Emirates" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_tr['AED']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                    <div><img alt="Ülke bayrağı: Kuwait" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_tr['KWD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                    <div><img alt="Ülke bayrağı: Qatar" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_tr['QAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                    <div><img alt="Ülke bayrağı: Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_tr['JPY']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
        </div>
        <p style="margin: 15px 0 0 0; font-size: 12px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 8px; text-align: left; direction: ltr;">* Güncellemeler, resmî canlı piyasa endeksleri aracılığıyla otomatik olarak yapılır. Resmî <strong>altın fiyatları uygulamasını</strong> yüklemenizi öneririz.</p>
    </div>
<?php endif; ?>

<div class="altaqrer-silo-links" style="margin: 25px auto; padding: 15px; background: #17191d; border: 1px solid #3a3f4d; border-radius: 6px; text-align: center; max-width: 800px; width: 95%; box-sizing: border-box; clear: both; direction: ltr;">
    <?php
    // Reuse the already-resolved English country URL for every tab link.
    $base_country_url = $tr_header_country_url;

    $active_bg = get_theme_mod('infi_default_color', '#ffb301');
    $active_color = '#000000';
    $default_bg = '#262930';
    $default_color = '#ffffff';

    $tabs = [
        ['key' => '',          'tr' => 'Altın Fiyatı'],
        ['key' => '24k',       'tr' => '24 ayar'],
        ['key' => '22k',       'tr' => '22 ayar'],
        ['key' => '21k',       'tr' => '21 ayar'],
        ['key' => '18k',       'tr' => '18 ayar'],
        ['key' => '14k',       'tr' => '14 ayar'],
        ['key' => 'ounce',     'tr' => 'Altın onsu'],
        ['key' => 'coin',      'tr' => 'Altın sikke'],
        ['key' => 'gold-bars', 'tr' => 'Altın külçeler'],
        ['key' => 'gold-index','tr' => 'Altın endeksi'],
        ['key' => 'usd',       'tr' => 'USD ve döviz kurları'],
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
            $label = $tab['tr'];
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
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">📈 Canlı altın piyasası endeksi: <?php echo esc_html($display_country_name); ?> <img alt="<?php echo esc_html($display_country_name); ?> ülkesinin bayrağı" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Saf 24 ayar altın:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Değer: <?php echo number_format($price_24k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>22 ayar altın:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Değer: <?php echo number_format($price_22k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;">Popüler 21 ayar altın:</strong> <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Değer: <?php echo number_format($price_21k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>Standart 18 ayar altın:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Değer: <?php echo number_format($price_18k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>14 ayar altın:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Değer: <?php echo number_format($price_14k_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Küresel altın onsu (31,1 g):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong></span><br><small style="color:#94a3b8;">USD cinsinden uluslararası spot fiyat</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Yerel para biriminde altın onsu (31,1 g):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Yerel para birimine çevrilmiş aynı küresel ons göstergesi</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Bu endeks, bölgesindeki başlıca altın saflıklarını karşılaştırır: <?php echo esc_html($display_country_name); ?>uluslararası spot göstergeyle karşılaştırır. Küresel ons USD üzerinden verilir; yerel para birimindeki ons ise aynı göstergenin ülke döviz kuruyla çevrilmiş halidir. İşçilik ücretleri ve satıcı primleri dahil değildir.
                </p>


            <?php elseif ($gold_view == 'gold-bars') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 Bugünün külçe altın fiyatları: <?php echo esc_html($display_country_name); ?> (saf 24 ayar altın):</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Altın külçe — 1 g:</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_24k_local * 1, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Değer: <?php echo number_format($price_24k_usd * 1, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Altın külçe — 2,5 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 2.5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Değer: <?php echo number_format($price_24k_usd * 2.5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Altın külçe — 5 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Değer: <?php echo number_format($price_24k_usd * 5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Altın külçe — 10 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 10, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Değer: <?php echo number_format($price_24k_usd * 10, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Altın külçe — 20 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 20, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Değer: <?php echo number_format($price_24k_usd * 20, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Troy ons (31,1 gram):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Değer: <?php echo number_format($ounce_price_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Altın külçe — 50 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 50, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Değer: <?php echo number_format($price_24k_usd * 50, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Altın külçe — 100 g:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 100, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Değer: <?php echo number_format($price_24k_usd * 100, 2); ?> USD</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Bu takip aracı şunların fiyatlarını izler: <strong>bugünün külçe altın fiyatları</strong>; bunlar 999,9 saflıkta 24 ayar altından oluşur. Külçe altın biriktirmek, serveti korumak ve uzun vadeli likiditeyi güvence altına almak için önemli bir yöntemdir: <strong><?php echo esc_html($display_country_name); ?></strong> bölgesinde makroekonomik enflasyona karşı.
                </p>

            <?php elseif ($gold_view == 'coin') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 Bugün altın sikke fiyatı: <?php echo esc_html($display_country_name); ?> (standart ağırlık: 8 gram):</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: left; direction: ltr;">
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>21 ayar altın sikke (8 g):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_21k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Değer: <?php echo number_format($price_21k_usd * 8, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>22 ayar altın sikke (8 g):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Değer: <?php echo number_format($price_22k_usd * 8, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>24 ayar altın sikke (8 g):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Değer: <?php echo number_format($price_24k_usd * 8, 2); ?> USD</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Güncel <strong>altın sikke fiyatı</strong> için canlı güncellemeleri takip edin: <strong><?php echo esc_html($display_country_name); ?></strong>. Tam 8 gram ağırlığındaki altın sikkeler güvenli fiziksel yatırım varlıkları olarak yakından takip edilir.
                </p>

            <?php elseif ($gold_view == 'usd') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">💵 Canlı döviz kurları <?php echo esc_html($currency_label); ?> karşısında <?php echo esc_html($display_country_name); ?>:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; text-align: left; direction: ltr; margin-bottom: 20px;">
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'USD') : ?>
                            <div><img alt="Ülke bayrağı: US" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_tr['USD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                            <div><img alt="Ülke bayrağı: UK" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_tr['GBP']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                            <div><img alt="Ülke bayrağı: SA" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_tr['SAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                            <div><img alt="Ülke bayrağı: BH" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_tr['BHD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                            <div><img alt="Ülke bayrağı: Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_tr['OMR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                            <div><img alt="Ülke bayrağı: EU" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_tr['EUR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                            <div><img alt="Ülke bayrağı: AE" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_tr['AED']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                            <div><img alt="Ülke bayrağı: KW" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_tr['KWD']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                            <div><img alt="Ülke bayrağı: QA" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_tr['QAR']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                            <div><img alt="Ülke bayrağı: Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong><?php echo esc_html($currency_labels_tr['JPY']); ?>:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Bu dinamik endeks bankalar arası çapraz kurları izler. Yerel altın fiyatı göstergeleri, küresel rezervlere karşı döviz kuru dalgalanmalarına doğrudan bağlıdır.
                </p>

            <?php elseif ($gold_view == '24k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Canlı fiyat raporu: 24K bölgesinde bugün gram altın fiyatı <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Yerel para biriminde fiyat:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ABD doları karşılığı:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_24k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Güncel <strong>24K ayar gram altın fiyatı</strong> <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. %99,9 saflığıyla bu ayar, külçe altın üretiminde endüstriyel referans kabul edilir.
                </p>

            <?php elseif ($gold_view == '22k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Canlı fiyat raporu: 22K bölgesinde bugün gram altın fiyatı <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Yerel para biriminde fiyat:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ABD doları karşılığı:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_22k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Üst segment <strong>22K ayar gram altın fiyatı</strong> fiyatı <strong><?php echo number_format($price_22k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Yüksek değerli metal içeriğini yapısal dayanıklılıkla dengeler.
                </p>

            <?php elseif ($gold_view == '21k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Canlı fiyat raporu: 21K bölgesinde bugün gram altın fiyatı <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Yerel para biriminde fiyat:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ABD doları karşılığı:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_21k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Yoğun talep gören <strong>21K ayar gram altın fiyatı</strong> fiyatı <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Yerel mücevher ticaretinin büyük bölümünü bu ayar oluşturur.
                </p>

            <?php elseif ($gold_view == '18k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Canlı fiyat raporu: 18K bölgesinde bugün gram altın fiyatı <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Yerel para biriminde fiyat:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ABD doları karşılığı:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_18k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Piyasa güncellemelerine göre standart <strong>18K ayar gram altın fiyatı</strong> fiyatını <strong><?php echo number_format($price_18k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>, lüks mücevher işçiliği için ekonomik bir seçenektir.
                </p>

            <?php elseif ($gold_view == '14k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Canlı fiyat raporu: 14K bölgesinde bugün gram altın fiyatı <?php echo esc_html($display_country_name); ?>:</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Yerel para biriminde fiyat:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ABD doları karşılığı:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_14k_usd, 2); ?></strong></span> USD</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Hesaplanan endeks <strong>14K ayar gram altın fiyatı</strong> fiyatını <strong><?php echo number_format($price_14k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> fiyatını gösterir; bu dayanıklı alaşım günlük mücevher kullanımı için uygundur.
                </p>

            <?php elseif ($gold_view == 'ounce') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px;">📊 Bugünün küresel altın ons fiyatı (31,1 g):</strong>
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; font-size: 15px;">
                    <li>🔹 <strong>Uluslararası spot fiyat:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($ounce_price_usd, 2); ?></strong></span> USD</li>
                    <li>🔹 <strong>Fiyatlandırma para birimi:</strong> ABD doları (USD)</li>
                </ul>
                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Küresel altın onsu uluslararası piyasalarda ABD doları üzerinden fiyatlandırılır ve 24 ayar altının 31,1 gramına karşılık gelir. Yerel para birimine dönüşüm bu küresel göstergeden hariç tutulur; yerel altın fiyatları geçerli döviz kuru kullanılarak ayrıca hesaplanır.
                </p>
            <?php endif; ?>

        </div>
    </div>
    <?php
}
?>

<?php if (!empty($gold_view)) :
    // The live values below use the same price snapshot and conversions as the tables above.
    $tr_seo_base = home_url('/tr/country/' . rawurlencode($tr_header_country_slug) . '/');
    $tr_seo_price_map = array(
        '24k' => array($price_24k_local, $price_24k_usd),
        '22k' => array($price_22k_local, $price_22k_usd),
        '21k' => array($price_21k_local, $price_21k_usd),
        '18k' => array($price_18k_local, $price_18k_usd),
        '14k' => array($price_14k_local, $price_14k_usd)
    );
?>
<article class="tr-seo-article" aria-labelledby="tr-seo-title">
<?php if (isset($tr_seo_price_map[$gold_view])) :
    $en_active_price_local = $tr_seo_price_map[$gold_view][0];
    $en_active_price_usd = $tr_seo_price_map[$gold_view][1];
    $tr_karat = str_replace(['24K','22K','21K','18K','14K'], ['24 ayar','22 ayar','21 ayar','18 ayar','14 ayar'], strtoupper($gold_view));
?>
    <h2 id="tr-seo-title"><?php echo esc_html($tr_karat); ?> altın fiyatı bugün <?php echo esc_html($display_country_name); ?> gram başına</h2>
    <p>Yukarıdaki canlı referansa göre <strong><?php echo esc_html($display_country_name); ?> için <?php echo esc_html($tr_karat); ?> altının güncel gram fiyatını</strong> takip edin. Güncel gösterge değer <strong><?php echo number_format($en_active_price_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> gram başına, yaklaşık olarak <strong><?php echo number_format($en_active_price_usd, 2); ?> USD</strong>. Bu değerler, mevcut en güncel 24 ayar referans fiyatı ve saflık oranı kullanılarak hesaplanır: <?php echo esc_html($tr_karat); ?> altın ve sitenin kullandığı en güncel döviz kuru.</p>
    <h3><?php echo esc_html($tr_karat); ?> altın ne anlama gelir?</h3>
    <p>Ayar, alaşımdaki saf altın oranını gösterir. 24 ayar saf altın referansıdır; daha düşük ayarlar daha fazla başka metal içerir. <?php echo esc_html($tr_karat); ?> bu nedenle takının nihai satış fiyatını değil, altın içeriğini yansıtır. Mağaza fiyatına işçilik, satıcı primi, vergiler ve burada gösterilen ham piyasa değerine dahil olmayan yerel ücretler eklenebilir.</p>
    <h3>Yerel ve USD fiyatları nasıl okunur</h3>
    <p>Yerel para birimindeki tutar, <?php echo esc_html($display_country_name); ?>; USD karşılığı aynı altın içeriğini uluslararası fiyatlarla karşılaştırmayı kolaylaştırır. Yerel fiyatlar küresel altın göstergesi, döviz kurları veya yerel piyasa koşullarına göre değişebilir. Bunlar gösterge niteliğindedir; garantili alış ya da satış teklifi değildir.</p>
    <h3>İlgili altın fiyatları</h3>
    <p>Bu fiyatı şu değerlerle karşılaştırın: <a href="<?php echo esc_url($tr_seo_base . '24k/'); ?>">24 ayar altın</a>, <a href="<?php echo esc_url($tr_seo_base . '21k/'); ?>">21 ayar altın</a>, <a href="<?php echo esc_url($tr_seo_base . 'gold-bars/'); ?>">altın külçe fiyatları</a>, ve <a href="<?php echo esc_url($tr_seo_base . 'gold-index/'); ?>">gerçek zamanlı altın piyasası endeksi</a> piyasayı daha geniş değerlendirmek için.</p>
    <h3>Sıkça Sorulan Sorular</h3>
    <details><summary>Gösterilen <?php echo esc_html($tr_karat); ?> kuyumcu nihai satış fiyatı mı?</summary><p>Hayır. Bu, işçilik, satıcı primi, vergiler ve bitmiş ürüne uygulanabilecek diğer ücretleri içermeyen gösterge niteliğinde ham altın değeridir.</p></details>
    <details><summary>USD karşılığı neden yerel fiyattan farklı?</summary><p>İki değer farklı para birimlerini kullanır. Yerel tutar sitenin en güncel döviz kuruyla hesaplanır; USD tutarı altının ABD doları karşılığını gösterir.</p></details>
<?php elseif ($gold_view === 'ounce') : ?>
    <h2 id="tr-seo-title">Bugün küresel altın ons fiyatı (USD)</h2>
    <p>Bu sayfadaki uluslararası altın ons referansı <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong> yaklaşık 31,1 gram 24 ayar altın içeren bir troy ons içindir. Bu, <strong>küresel spot altın göstergesidir</strong> ve ABD doları üzerinden fiyatlandırılır. Ülkeye özgü yerel para birimi ons fiyatı olarak sunulmaz; yerel gram fiyatları seçilen ülke için ayrıca dönüştürülür.</p>
    <h3>Küresel altın ons fiyatı neden önemlidir</h3>
    <p>Uluslararası piyasalarda altın genellikle troy ons üzerinden fiyatlanır. İşlemciler, rafineriler, finans kuruluşları ve külçe altın satıcıları bu göstergeyi piyasalar arasında karşılaştırma yapmak için kullanır. ABD doları, faiz beklentileri, enflasyon görünümü, merkez bankalarının faaliyetleri ve yatırımcı talebi uluslararası fiyatı etkileyebilir. Bunlar genel piyasa etkenleridir; bugünkü hareketin tek bir nedeni olduğu iddiası değildir.</p>
    <h3>Küresel ons fiyatından yerel gram fiyatına</h3>
    <p>Basit bir karşılaştırma için bir troy ons yaklaşık 31,1 gramdır. Yerel gram fiyatı seçilen döviz dönüşümüne ve yerel piyasa koşullarına da bağlıdır. Yukarıdaki küresel ons değeri uluslararası kotasyonlarla tutarlı karşılaştırma için USD olarak kalır.</p>
    <p>Şuraya geçin: <a href="<?php echo esc_url($tr_seo_base); ?>"> bölgesindeki altın fiyatı <?php echo esc_html($display_country_name); ?></a>, inceleyin <a href="<?php echo esc_url($tr_seo_base . '24k/'); ?>">24 ayar altın gram başına</a>, veya açın <a href="<?php echo esc_url($tr_seo_base . 'gold-index/'); ?>">altın piyasası endeksi</a>.</p>
    <h3>Sıkça Sorulan Sorular</h3>
    <details><summary>Bir troy ons altın kaç gramdır?</summary><p>Bir troy ons yaklaşık 31,1035 gramdır. Sayfadaki referans hesaplamasında 31,1 gram kullanılır.</p></details>
    <details><summary>Bu ons fiyatı yerel para birimine çevriliyor mu?</summary><p>Hayır. Bu sayfa yalnızca USD cinsinden uluslararası altın ons göstergesini gösterir. Yerel para birimi değerleri ilgili ülke fiyat tablolarında ayrıca sunulur.</p></details>
<?php elseif ($gold_view === 'coin') : ?>
    <h2 id="tr-seo-title">Bugün 8 gram altın sikke fiyatı <?php echo esc_html($display_country_name); ?></h2>
    <p>Referans değerini takip edin: <strong>8 gram altın sikke</strong> in <?php echo esc_html($display_country_name); ?>. Güncel gram fiyatlarına göre 21 ayar sikkenin gösterge değeri <strong><?php echo number_format($price_21k_local * 8, 2); ?> <?php echo esc_html($currency_label); ?></strong> (yaklaşık <strong><?php echo number_format($price_21k_usd * 8, 2); ?> USD</strong>). Sayfa ayrıca şunları karşılaştırır: aynı 8 gram ağırlık için 22 ve 24 ayar değerlerini karşılaştırarak saflığın etkisini görebilirsiniz.</p>
    <h3>8 gram sikkenin değeri nasıl hesaplanır</h3>
    <p>Hesaplamada ilgili gram altın değeri 8 gramla çarpılır. Standart 21 ayar referansı için 21 ayar gram fiyatı sekizle çarpılır. 22 ve 24 ayar karşılaştırmaları aynı ağırlıkta kendi gram fiyatlarını kullanır. Böylece sitenin mevcut 8 gram sikke hesaplaması korunur.</p>
    <p>Sikkenin gerçek fiyatı basım, kondisyon, tasarım, nadirlik, satıcı primi ve yerel vergilere göre değişebilir. Buradaki değer altın içeriği referansıdır; garantili işlem fiyatı değildir. Şunlarla karşılaştırın: <a href="<?php echo esc_url($tr_seo_base . '21k/'); ?>">21 ayar altının gram fiyatı</a>, <a href="<?php echo esc_url($tr_seo_base . '22k/'); ?>">22 ayar altın fiyatı</a>, ve <a href="<?php echo esc_url($tr_seo_base . 'gold-bars/'); ?>">altın külçe fiyatları</a>.</p>
    <h3>Sıkça Sorulan Sorular</h3>
    <details><summary>Altın sikke hesabında hangi ağırlık kullanılır?</summary><p>Bu sayfa altın sikke karşılaştırması için sitenin standart 8 gram hesaplamasını korur.</p></details>
    <details><summary>Gösterilen değere satıcı primi dahil mi?</summary><p>Hayır. Yalnızca altın içeriğini tahmin eder; basım maliyeti, satıcı primi, işçilik veya vergiler dahil değildir.</p></details>
<?php elseif ($gold_view === 'gold-bars') : ?>
    <h2 id="tr-seo-title">Bugün altın külçe fiyatları <?php echo esc_html($display_country_name); ?></h2>
    <p>Altın külçeler genellikle 24 ayar altın göstergesine göre değerlenir. Güncel 24 ayar referansı <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?> gram başına</strong> (yaklaşık <strong><?php echo number_format($price_24k_usd, 2); ?> USD</strong>), 10 gramlık bir külçenin tahmini altın içeriği değeri <strong><?php echo number_format($price_24k_local * 10, 2); ?> <?php echo esc_html($currency_label); ?></strong>; 100 gramlık külçe ise yaklaşık <strong><?php echo number_format($price_24k_local * 100, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Yukarıdaki tabloda hızlı karşılaştırma için başka ağırlıklar da yer alır.</p>
    <h3>Altın külçe ağırlıkları nasıl karşılaştırılır</h3>
    <p>Basit bir tahmin için 24 ayar gram göstergesini külçenin ağırlığıyla çarpın. Sonuç; üretim primi, analiz veya damgalama ücreti, satıcı marjı, teslimat ve vergiler öncesindeki altın değeridir. Bu nedenle nihai satış fiyatı burada gösterilen ham hesaptan yüksek olabilir.</p>
    <p>İşlemden önce külçenin belirtilen saflığını, kesin ağırlığını, sertifikasını, üreticisini ve satıcının güvenilirliğini kontrol edin. <a href="<?php echo esc_url($tr_seo_base . '24k/'); ?>">24 ayar altın fiyatı</a> gram başına temel referanstır; <a href="<?php echo esc_url($tr_seo_base . 'ounce/'); ?>">küresel altın ons fiyatı</a> USD cinsinden uluslararası karşılaştırma sağlar.</p>
    <h3>Sıkça Sorulan Sorular</h3>
    <details><summary>Altın külçe fiyatlarına işçilik dahil mi?</summary><p>Hayır. Tablo yalnızca altın değerini tahmin eder; üretim, sertifikasyon, satıcı primi ve vergileri içermez.</p></details>
    <details><summary>Aynı ağırlıktaki iki külçenin fiyatı neden farklı olabilir?</summary><p>Marka, sertifika, üretim maliyetleri, satıcı primi, bulunabilirlik ve yerel vergiler nihai fiyatı etkileyebilir.</p></details>
<?php elseif ($gold_view === 'gold-index') : ?>
    <!-- Global XAU/USD chart added specifically to the Gold Index SEO section. -->
    <section class="tr-gold-index-chart" aria-labelledby="tr-gold-index-chart-title" style="background:#17191d;border:1px solid #323742;border-radius:8px;padding:12px;margin:0 0 22px;direction:ltr;text-align:left;">
        <h3 id="tr-gold-index-chart-title" style="color:#f0f1f5;text-align:left;margin:5px 5px 12px;font-size:20px;">Altın fiyat grafikleri</h3>
        <div style="position:relative;width:100%;height:520px;overflow:hidden;border-radius:6px;">
            <iframe
                id="tradingview_gold_index"
                title="Global Altın fiyat grafikleri — XAU/USD"
                src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_gold_index&symbol=OANDA%3AXAUUSD&interval=D&hidesidetoolbar=0&symboledit=0&saveimage=0&toolbarbg=%2317191d&studies=%5B%5D&theme=dark&style=1&timezone=Etc%2FUTC&withdateranges=1&hideideas=1&locale=tr"
                style="width:100%;height:100%;border:0;"
                allowtransparency="true"
                scrolling="no"
                loading="lazy"
                allowfullscreen>
            </iframe>
        </div>
        <p style="color:#94a3b8;text-align:left;font-size:13px;margin:10px 4px 2px;">Küresel XAU/USD grafiğiyle uluslararası spot altın fiyatını ABD doları (USD) cinsinden takip edin. Bu dünya çapında bir göstergedir, ülkeye özgü perakende fiyatı değildir.</p>
    </section>
    <h2 id="tr-seo-title">Canlı altın piyasası endeksi ve ayar fiyatları: <?php echo esc_html($display_country_name); ?></h2>
    <p>Bu altın piyasası özeti farklı saflıklar için en güncel referans değerlerini bir araya getirir. Güncel 24 ayar göstergesi <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> gram başına; 22 ayar yaklaşık <strong><?php echo number_format($price_22k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> ve 21 ayar yaklaşık <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Küresel troy ons fiyatı <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong>ve yerel para birimi karşılığı <strong><?php echo number_format($ounce_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong>.</p>
    <h3>Altın endeksi neleri karşılaştırmanıza yardımcı olur</h3>
    <p>Endeks, yaygın saflık ve para birimlerindeki altın değerlerinin pratik bir anlık görüntüsünü sunar. 24 ayar külçe göstergesini mücevherlerde kullanılan daha düşük ayarlarla karşılaştırmaya yardımcı olur. Yerel değerler referans altın fiyatı ve mevcut döviz kurlarından hesaplanır; USD değerleri uluslararası piyasa karşılaştırmasını sağlar.</p>
    <p>Altın fiyatları küresel spot piyasa hareketlerinden, döviz değişimlerinden, faiz beklentilerinden, enflasyon kaygılarından ve yatırım talebindeki değişikliklerden etkilenebilir. Tek bir anlık görüntü trend göstermez; sonuç çıkarmadan önce güncellemeleri zaman içinde karşılaştırın. Şu sayfaları ziyaret edin: <a href="<?php echo esc_url($tr_seo_base . '21k/'); ?>">21 ayar fiyat sayfası</a>, <a href="<?php echo esc_url($tr_seo_base . '24k/'); ?>">24 ayar fiyat sayfası</a>, ve <a href="<?php echo esc_url($tr_seo_base . 'ounce/'); ?>">küresel ons sayfası</a>.</p>
    <h3>Sıkça Sorulan Sorular</h3>
    <details><summary>Endeks garantili bir piyasa işlem fiyatı mı gösterir?</summary><p>Hayır. Sitenin mevcut en güncel verilerine dayanan bilgilendirici bir referanstır. Gerçek işlem fiyatlarına yerel primler ve ücretler eklenebilir.</p></details>
    <details><summary>Farklı ayarlar neden farklı fiyatlandırılır?</summary><p>Her ayar farklı oranda saf altın içerir. Daha düşük saflıktaki alaşımların gram başına ham altın değeri, diğer maliyetler hariç, 24 ayardan düşüktür.</p></details>
<?php elseif ($gold_view === 'usd') : ?>
    <h2 id="tr-seo-title">USD döviz kuru ve para birimi dönüşümü: <?php echo esc_html($display_country_name); ?></h2>
    <p>Bu sayfada kullanılan en güncel referansa göre bir ABD doları yaklaşık <strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong>. Döviz kurları altın alıcıları için önemlidir; uluslararası külçe fiyatları genellikle USD üzerinden kote edilir. Yerel para dolar karşısında değiştiğinde, uluslararası USD altın fiyatı sabit kalsa bile altının yerel değeri değişebilir.</p>
    <h3>Döviz hareketleri yerel altın fiyatlarını nasıl etkiler</h3>
    <p>Yerel altın fiyatı tahmini, uluslararası altın göstergesini döviz dönüşümüyle ve perakende piyasadaki yerel prim, vergi veya maliyetlerle birleştirir. Bu sayfa dönüşüm bağlamını açıklamak için seçili para birimi karşılaştırmaları sunar. Kurlar bilgilendirme amaçlıdır; banka, nakit, kart veya havale kurlarından farklı olabilir.</p>
    <p>Altın karşılaştırması için şu sayfaları inceleyin: <a href="<?php echo esc_url($tr_seo_base . '24k/'); ?>">24 ayar gram fiyatı</a>,  href="<?php echo esc_url($tr_seo_base . '21k/'); ?>">21 ayar gram fiyatı</a>, ve <a href="<?php echo esc_url($tr_seo_base . 'ounce/'); ?>">USD cinsinden uluslararası altın onsu</a>.</p>
    <h3>Sıkça Sorulan Sorular</h3>
    <details><summary>Bu döviz kuru tüm bankaların sunduğu kur mudur?</summary><p>Hayır. Bu, sitenin kullandığı en güncel referans kurdur. Bankalar ve döviz sağlayıcıları farklı alış-satış kurları, makas veya ücret uygulayabilir.</p></details>
    <details><summary>Dolar kuru altın için neden önemlidir?</summary><p>Altın uluslararası piyasalarda genellikle ABD dolarıyla fiyatlandığından, bu göstergenin yerel para birimine çevrilmesi yerel altın değerini tahmin etmenin unsurlarından biridir.</p></details>
<?php endif; ?>
    <p class="en-seo-update-note" style="margin:20px 0 0;padding-top:12px;border-top:1px solid #3a3f4d;color:#9ca3af;font-size:12px;">Referans tarihi: <?php echo esc_html($today); ?>. Fiyatlar gösterge niteliğindedir ve bu sayfaya sunulan en güncel verileri yansıtır; piyasa ve döviz verileri güncellendikçe değişebilir.</p>
</article>
<?php endif; ?>

<?php if (!$tr_header_is_app) : ?>
<footer class="tr-site-footer">
  <div class="tr-site-footer-inner">
    <section>
      <h3>AlTaqrer Gold Hakkında</h3>
      <p><strong>AlTaqrer Gold</strong>, okuyucuların bölgesel ve uluslararası piyasalardaki altın fiyatlarını takip etmelerine yardımcı olur. 24, 22, 21, 18 ve 14 ayar altının güncel referans fiyatlarını inceleyin, külçe altın ile 8 gramlık altın sikkenin değerlerini karşılaştırın ve altının küresel ons fiyatını USD cinsinden takip edin. Fiyatlar bilgilendirme ve karşılaştırma amacıyla sunulur; nihai perakende fiyatına işçilik, prim ve vergiler eklenebilir.</p>
    </section>
    <section>
      <h3>Altın Fiyatı Bölümleri</h3>
      <ul>
        <li><a href="<?php echo esc_url($tr_header_country_url); ?>"><?php echo esc_html(isset($display_country_name) ? $display_country_name : ''); ?> altın fiyatları</a></li>
        <li><a href="<?php echo esc_url($tr_header_country_url . 'gold-bars/'); ?>">Altın Külçeler ve Sikke</a></li>
        <li><a href="<?php echo esc_url($tr_header_country_url . 'gold-index/'); ?>">Canlı Altın Endeksi</a></li>
        <li><a href="<?php echo esc_url($tr_header_country_url . 'usd/'); ?>">USD ve Döviz Kurları</a></li>
      </ul>
    </section>
    <section>
      <h3>Bölgesel Altın Fiyatları</h3>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/tr/country/eg/')); ?>">Mısır altın fiyatları</a></li>
        <li><a href="<?php echo esc_url(home_url('/tr/country/sa/')); ?>">Suudi Arabistan altın fiyatları</a></li>
        <li><a href="<?php echo esc_url(home_url('/tr/country/ae/')); ?>">BAE altın fiyatları</a></li>
        <li><a href="<?php echo esc_url(home_url('/tr/country/kw/')); ?>">Kuveyt altın fiyatları</a></li>
      </ul>
      <h3 style="margin-top:16px;">Bizi Takip Edin</h3>
      <ul>
        <li><a href="https://t.me/goldaltaqrer" target="_blank" rel="noopener noreferrer">Telegram Kanalımıza Katılın</a></li>
      </ul>
    </section>
    <?php
    // Show only real published English pages; never leave dead /tr/# placeholder links.
    $en_footer_pages = array();
    foreach (array(
        'privacy-policy' => 'Gizlilik Politikası',
        'terms-of-use'   => 'Kullanım Koşulları',
        'contact-us'     => 'İletişim'
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
      <h3>Önemli Bağlantılar</h3>
      <ul>
        <?php foreach ($en_footer_pages as $footer_page) : ?>
          <li><a href="<?php echo esc_url($footer_page['url']); ?>"><?php echo esc_html($footer_page['label']); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </section>
    <?php endif; ?>
  </div>
  <div class="tr-footer-bottom">Tüm hakları saklıdır &copy; <?php echo esc_html(function_exists('wp_date') ? wp_date('Y') : date('Y')); ?> — <a href="<?php echo esc_url($tr_header_home_url); ?>">AlTaqrer Gold</a>.</div>
</footer>
<?php endif; ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
  var toggle = document.querySelector('.tr-country-toggle');
  var menu = document.getElementById('tr-country-menu');
  if (!toggle || !menu) return;
  toggle.addEventListener('click', function (event) {
    event.preventDefault();
    var opened = menu.classList.toggle('is-open');
    toggle.setAttribute('aria-expanded', opened ? 'true' : 'false');
  });
  document.addEventListener('click', function (event) {
    if (!event.target.closest('.tr-country-wrap')) {
      menu.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
    }
  });
});
</script>
<?php wp_footer(); ?>
</body>
</html>
