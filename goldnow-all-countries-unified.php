<?php
/**
 * Template Name: GoldNow – All Countries (10 Languages)
 * Description: One multilingual countries directory template for Arabic, English, French, German, Spanish, Italian, Portuguese, Russian, Hindi and Turkish.
 */
if (!defined('ABSPATH')) { exit; }

$gn_langs = ['ar','en','fr','de','es','it','pt','ru','hi','tr'];
$gn_uri_path = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
$gn_segments = $gn_uri_path === '' ? [] : explode('/', $gn_uri_path);
$gn_lang = (!empty($gn_segments[0]) && in_array($gn_segments[0], $gn_langs, true)) ? $gn_segments[0] : 'ar';
$gn_is_rtl = ($gn_lang === 'ar' || $gn_lang === 'fa');
$gn_locale = [
    'ar'=>'ar','en'=>'en','fr'=>'fr','de'=>'de','es'=>'es','it'=>'it','pt'=>'pt','ru'=>'ru','hi'=>'hi','tr'=>'tr'
][$gn_lang];
$gn_home_url = home_url($gn_lang === 'ar' ? '/' : '/' . $gn_lang . '/');
$gn_country_base = home_url($gn_lang === 'ar' ? '/country/' : '/' . $gn_lang . '/country/');
$gn_is_app = isset($_GET['view']) && sanitize_text_field(wp_unslash($_GET['view'])) === 'app';
$gn_accent = get_theme_mod('infi_default_color', '#ffb301');
$gn_logo_id = (int) get_theme_mod('custom_logo');

$gn_t = [
'ar'=>['home'=>'الرئيسية','prices'=>'أسعار الذهب','bars'=>'سبائك الذهب','index'=>'مؤشر الذهب','usd'=>'أسعار الدولار','countries'=>'الدول','all'=>'جميع الدول','search'=>'ابحث عن دولة أو عملة...','arab'=>'العالم العربي','rest'=>'باقي دول العالم','empty'=>'لم يتم العثور على نتائج','try'=>'جرّب البحث باسم الدولة أو العملة أو الرمز.','about'=>'عن التقرير جولد','sections'=>'أقسام أسعار الذهب','regional'=>'أسعار الذهب حسب المنطقة','seo_title'=>'تابع أسعار الذهب لحظة بلحظة مع التقرير جولد','seo'=>'تابع أسعار الذهب اليوم وقارن الأسعار بين الدول والعملات المحلية، وتعرّف إلى اتجاهات سوق الذهب العالمي.','back'=>'العودة للرئيسية','rights'=>'جميع الحقوق محفوظة'],
'en'=>['home'=>'Home','prices'=>'Gold Prices','bars'=>'Gold Bars','index'=>'Gold Index','usd'=>'USD Rates','countries'=>'Countries','all'=>'All Countries','search'=>'Search for a country or currency...','arab'=>'Arab World','rest'=>'Rest of the World','empty'=>'No results found','try'=>'Try searching by country, currency or code.','about'=>'About AlTaqrer Gold','sections'=>'Gold Price Sections','regional'=>'Gold Prices by Region','seo_title'=>'Follow Live Gold Prices with AlTaqrer Gold','seo'=>'Track today’s gold prices, compare local currencies across countries, and follow global gold market trends.','back'=>'Back to Home','rights'=>'All rights reserved'],
'fr'=>['home'=>'Accueil','prices'=>'Cours de l’or','bars'=>'Lingots d’or','index'=>'Indice de l’or','usd'=>'Taux USD','countries'=>'Pays','all'=>'Tous les pays','search'=>'Rechercher un pays ou une devise...','arab'=>'Monde arabe','rest'=>'Reste du monde','empty'=>'Aucun résultat trouvé','try'=>'Recherchez un pays, une devise ou un code.','about'=>'À propos d’AlTaqrer Gold','sections'=>'Rubriques des cours de l’or','regional'=>'Cours de l’or par région','seo_title'=>'Suivez les cours de l’or en direct avec AlTaqrer Gold','seo'=>'Consultez les cours de l’or du jour, comparez les devises locales et suivez les tendances du marché mondial.','back'=>'Retour à l’accueil','rights'=>'Tous droits réservés'],
'de'=>['home'=>'Startseite','prices'=>'Goldpreise','bars'=>'Goldbarren','index'=>'Goldindex','usd'=>'USD-Kurse','countries'=>'Länder','all'=>'Alle Länder','search'=>'Land oder Währung suchen...','arab'=>'Arabische Welt','rest'=>'Übrige Welt','empty'=>'Keine Ergebnisse gefunden','try'=>'Suche nach Land, Währung oder Kürzel.','about'=>'Über AlTaqrer Gold','sections'=>'Goldpreis-Bereiche','regional'=>'Goldpreise nach Regionen','seo_title'=>'Verfolgen Sie Goldpreise live mit AlTaqrer Gold','seo'=>'Sehen Sie die heutigen Goldpreise, vergleichen Sie lokale Währungen und verfolgen Sie globale Markttrends.','back'=>'Zur Startseite','rights'=>'Alle Rechte vorbehalten'],
'es'=>['home'=>'Inicio','prices'=>'Precios del oro','bars'=>'Lingotes de oro','index'=>'Índice del oro','usd'=>'Tipos USD','countries'=>'Países','all'=>'Todos los países','search'=>'Buscar país o moneda...','arab'=>'Mundo árabe','rest'=>'Resto del mundo','empty'=>'No se encontraron resultados','try'=>'Busca por país, moneda o código.','about'=>'Acerca de AlTaqrer Gold','sections'=>'Secciones del precio del oro','regional'=>'Precio del oro por región','seo_title'=>'Sigue el precio del oro en directo con AlTaqrer Gold','seo'=>'Consulta los precios del oro de hoy, compara monedas locales y sigue las tendencias del mercado mundial.','back'=>'Volver al inicio','rights'=>'Todos los derechos reservados'],
'it'=>['home'=>'Home','prices'=>'Prezzi dell’oro','bars'=>'Lingotti d’oro','index'=>'Indice dell’oro','usd'=>'Tassi USD','countries'=>'Paesi','all'=>'Tutti i paesi','search'=>'Cerca un paese o una valuta...','arab'=>'Mondo arabo','rest'=>'Resto del mondo','empty'=>'Nessun risultato trovato','try'=>'Cerca per paese, valuta o codice.','about'=>'Informazioni su AlTaqrer Gold','sections'=>'Sezioni dei prezzi dell’oro','regional'=>'Prezzi dell’oro per regione','seo_title'=>'Segui le quotazioni dell’oro in tempo reale con AlTaqrer Gold','seo'=>'Consulta i prezzi dell’oro di oggi, confronta le valute locali e segui le tendenze del mercato globale.','back'=>'Torna alla home','rights'=>'Tutti i diritti riservati'],
'pt'=>['home'=>'Início','prices'=>'Preços do ouro','bars'=>'Barras de ouro','index'=>'Índice do ouro','usd'=>'Taxas USD','countries'=>'Países','all'=>'Todos os países','search'=>'Pesquisar país ou moeda...','arab'=>'Mundo árabe','rest'=>'Resto do mundo','empty'=>'Nenhum resultado encontrado','try'=>'Pesquise por país, moeda ou código.','about'=>'Sobre a AlTaqrer Gold','sections'=>'Secções dos preços do ouro','regional'=>'Preços do ouro por região','seo_title'=>'Acompanhe os preços do ouro em direto com a AlTaqrer Gold','seo'=>'Consulte os preços do ouro de hoje, compare moedas locais e acompanhe as tendências do mercado mundial.','back'=>'Voltar ao início','rights'=>'Todos os direitos reservados'],
'ru'=>['home'=>'Главная','prices'=>'Цены на золото','bars'=>'Золотые слитки','index'=>'Индекс золота','usd'=>'Курс USD','countries'=>'Страны','all'=>'Все страны','search'=>'Поиск страны или валюты...','arab'=>'Арабский мир','rest'=>'Остальной мир','empty'=>'Ничего не найдено','try'=>'Попробуйте поискать по стране, валюте или коду.','about'=>'Об AlTaqrer Gold','sections'=>'Разделы цен на золото','regional'=>'Цены на золото по регионам','seo_title'=>'Следите за ценами на золото вместе с AlTaqrer Gold','seo'=>'Смотрите сегодняшние цены на золото, сравнивайте местные валюты и следите за мировым рынком.','back'=>'На главную','rights'=>'Все права защищены'],
'hi'=>['home'=>'होम','prices'=>'सोने की कीमतें','bars'=>'सोने की छड़ें','index'=>'गोल्ड इंडेक्स','usd'=>'USD दरें','countries'=>'देश','all'=>'सभी देश','search'=>'देश या मुद्रा खोजें...','arab'=>'अरब जगत','rest'=>'शेष विश्व','empty'=>'कोई परिणाम नहीं मिला','try'=>'देश, मुद्रा या कोड से खोजें।','about'=>'AlTaqrer Gold के बारे में','sections'=>'सोने की कीमत के अनुभाग','regional'=>'क्षेत्र के अनुसार सोने की कीमतें','seo_title'=>'AlTaqrer Gold के साथ सोने की कीमतें लाइव देखें','seo'=>'आज की सोने की कीमतें देखें, स्थानीय मुद्राओं की तुलना करें और वैश्विक बाजार के रुझान जानें।','back'=>'होम पर वापस जाएँ','rights'=>'सर्वाधिकार सुरक्षित'],
'tr'=>['home'=>'Ana Sayfa','prices'=>'Altın Fiyatları','bars'=>'Altın Külçeleri','index'=>'Altın Endeksi','usd'=>'USD Kurları','countries'=>'Ülkeler','all'=>'Tüm Ülkeler','search'=>'Ülke veya para birimi ara...','arab'=>'Arap Dünyası','rest'=>'Dünyanın Geri Kalanı','empty'=>'Sonuç bulunamadı','try'=>'Ülke, para birimi veya kodla arayın.','about'=>'AlTaqrer Gold Hakkında','sections'=>'Altın Fiyatı Bölümleri','regional'=>'Bölgelere Göre Altın Fiyatları','seo_title'=>'AlTaqrer Gold ile canlı altın fiyatlarını takip edin','seo'=>'Bugünün altın fiyatlarını inceleyin, yerel para birimlerini karşılaştırın ve küresel piyasa trendlerini takip edin.','back'=>'Ana Sayfaya Dön','rights'=>'Tüm hakları saklıdır']
];
$gn = $gn_t[$gn_lang];
// Prefer the central Language Manager for keys already present in its dictionary;
// keep this template's translations as fallbacks so it also works before every key is added.
if (function_exists('goldnow_translate')) {
    foreach (['all'=>'all_countries','search'=>'search_country','empty'=>'no_results'] as $field=>$key) {
        $managed = goldnow_translate($key);
        if (is_string($managed) && $managed !== '' && $managed !== $key) { $gn[$field] = $managed; }
    }
}

// Shared country/currency dataset. Country names are localized through PHP Intl when available,
// then through the site's GoldNow Language Manager translation helper, with English as a safe fallback.
$gn_countries = [
'sa'=>'SAR|Saudi Arabia','eg'=>'EGP|Egypt','ae'=>'AED|United Arab Emirates','kw'=>'KWD|Kuwait','qa'=>'QAR|Qatar','bh'=>'BHD|Bahrain','om'=>'OMR|Oman','jo'=>'JOD|Jordan','iq'=>'IQD|Iraq','lb'=>'LBP|Lebanon','ps'=>'ILS|Palestine','sy'=>'SYP|Syria','ye'=>'YER|Yemen','ly'=>'LYD|Libya','sd'=>'SDG|Sudan','dz'=>'DZD|Algeria','ma'=>'MAD|Morocco','tn'=>'TND|Tunisia','mr'=>'MRU|Mauritania','dj'=>'DJF|Djibouti','km'=>'KMF|Comoros',
'us'=>'USD|United States','gb'=>'GBP|United Kingdom','ca'=>'CAD|Canada','au'=>'AUD|Australia','nz'=>'NZD|New Zealand','eu'=>'EUR|Europe','ch'=>'CHF|Switzerland','no'=>'NOK|Norway','se'=>'SEK|Sweden','dk'=>'DKK|Denmark','is'=>'ISK|Iceland','pl'=>'PLN|Poland','cz'=>'CZK|Czechia','hu'=>'HUF|Hungary','ro'=>'RON|Romania','bg'=>'BGN|Bulgaria','hr'=>'HRK|Croatia','rs'=>'RSD|Serbia','al'=>'ALL|Albania','mk'=>'MKD|North Macedonia','ba'=>'BAM|Bosnia and Herzegovina','ge'=>'GEL|Georgia','ua'=>'UAH|Ukraine','by'=>'BYN|Belarus','md'=>'MDL|Moldova','ru'=>'RUB|Russia','cn'=>'CNY|China','jp'=>'JPY|Japan','in'=>'INR|India','kr'=>'KRW|South Korea','sg'=>'SGD|Singapore','my'=>'MYR|Malaysia','th'=>'THB|Thailand','id'=>'IDR|Indonesia','ph'=>'PHP|Philippines','vn'=>'VND|Vietnam','mm'=>'MMK|Myanmar','kz'=>'KZT|Kazakhstan','uz'=>'UZS|Uzbekistan','tj'=>'TJS|Tajikistan','tm'=>'TMT|Turkmenistan','la'=>'LAK|Laos','kh'=>'KHR|Cambodia','mn'=>'MNT|Mongolia','bd'=>'BDT|Bangladesh','pk'=>'PKR|Pakistan','lk'=>'LKR|Sri Lanka','np'=>'NPR|Nepal','bt'=>'BTN|Bhutan','mv'=>'MVR|Maldives','ir'=>'IRR|Iran','af'=>'AFN|Afghanistan',
'za'=>'ZAR|South Africa','ng'=>'NGN|Nigeria','ke'=>'KES|Kenya','et'=>'ETB|Ethiopia','gh'=>'GHS|Ghana','ci'=>'XOF|Ivory Coast','sn'=>'XOF|Senegal','tz'=>'TZS|Tanzania','ug'=>'UGX|Uganda','cm'=>'XAF|Cameroon','cd'=>'CDF|Democratic Republic of the Congo','ao'=>'AOA|Angola','mz'=>'MZN|Mozambique','zw'=>'ZWL|Zimbabwe','mg'=>'MGA|Madagascar','mu'=>'MUR|Mauritius',
'mx'=>'MXN|Mexico','br'=>'BRL|Brazil','ar'=>'ARS|Argentina','cl'=>'CLP|Chile','co'=>'COP|Colombia','pe'=>'PEN|Peru','ve'=>'VES|Venezuela','py'=>'PYG|Paraguay','uy'=>'UYU|Uruguay','bo'=>'BOB|Bolivia','gt'=>'GTQ|Guatemala','hn'=>'HNL|Honduras','ni'=>'NIO|Nicaragua','cr'=>'CRC|Costa Rica','pa'=>'PAB|Panama','bs'=>'BSD|Bahamas','jm'=>'JMD|Jamaica','ht'=>'HTG|Haiti','do'=>'DOP|Dominican Republic','tt'=>'TTD|Trinidad and Tobago','gy'=>'GYD|Guyana','sr'=>'SRD|Suriname','bz'=>'BZD|Belize',
'fj'=>'FJD|Fiji','pg'=>'PGK|Papua New Guinea','sb'=>'SBD|Solomon Islands','vu'=>'VUV|Vanuatu','ws'=>'WST|Samoa','to'=>'TOP|Tonga','ki'=>'AUD|Kiribati','nr'=>'AUD|Nauru','tv'=>'AUD|Tuvalu','pw'=>'USD|Palau','fm'=>'USD|Micronesia','mh'=>'USD|Marshall Islands'
];
$gn_arab_codes = ['sa','eg','ae','kw','qa','bh','om','jo','iq','lb','ps','sy','ye','ly','sd','dz','ma','tn','mr','dj','km'];
$gn_region_groups = [
    $gn['arab'] => $gn_arab_codes,
    $gn['rest'] => array_values(array_diff(array_keys($gn_countries), $gn_arab_codes))
];
$gn_get_country_name = static function($code, $english) use ($gn_lang) {
    if (class_exists('Locale')) {
        $locale = ['ar'=>'ar','en'=>'en','fr'=>'fr','de'=>'de','es'=>'es','it'=>'it','pt'=>'pt','ru'=>'ru','hi'=>'hi','tr'=>'tr'][$gn_lang] ?? 'en';
        $region = strtoupper($code);
        if ($code === 'eu') { return ['ar'=>'أوروبا','en'=>'Europe','fr'=>'Europe','de'=>'Europa','es'=>'Europa','it'=>'Europa','pt'=>'Europa','ru'=>'Европа','hi'=>'यूरोप','tr'=>'Avrupa'][$gn_lang]; }
        $localized = Locale::getDisplayRegion('en_' . $region, $locale);
        if (is_string($localized) && $localized !== '' && $localized !== $region) { return $localized; }
    }
    if (function_exists('goldnow_translate_text')) {
        $translated = goldnow_translate_text($english);
        if (is_string($translated) && $translated !== '' && $translated !== $english) { return $translated; }
    }
    return $english;
};

wp_enqueue_style('goldnow-countries-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', [], '6.4.0');
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
<style>
:root{--gn-accent:<?php echo esc_attr($gn_accent); ?>;--gn-gold:#b8860b;--gn-ink:#1a1a1a;--gn-bg:#fff;--gn-text:#252525;--gn-muted:#777;--gn-radius:16px;--gn-shadow:0 4px 20px rgba(0,0,0,.06)}
*{box-sizing:border-box}.gn-site-header{position:relative;z-index:1000;background:#1a1a1a;border-bottom:4px solid var(--gn-accent);color:#fff}.gn-site-header-inner{max-width:1200px;width:95%;margin:auto;min-height:74px;display:flex;align-items:center;justify-content:space-between;gap:18px;padding:10px 0}.gn-brand{display:flex;align-items:center;gap:10px;color:#fff;text-decoration:none;font-weight:800;font-size:20px;white-space:nowrap}.gn-brand img{max-width:54px;max-height:54px;width:auto;height:auto;object-fit:contain}.gn-nav{display:flex;align-items:center;justify-content:flex-end;gap:8px;flex-wrap:wrap}.gn-nav a,.gn-country-toggle{color:#fff;text-decoration:none;border:1px solid rgba(255,255,255,.15);background:transparent;border-radius:6px;padding:9px 12px;font:600 13px Arial,sans-serif;cursor:pointer}.gn-nav a:hover,.gn-country-toggle:hover{color:#1a1a1a;background:var(--gn-accent)}.gn-country-wrap{position:relative}.gn-country-menu{display:none;position:absolute;top:calc(100% + 6px);<?php echo $gn_is_rtl ? 'right:0' : 'left:0'; ?>;min-width:210px;background:#202329;border:1px solid #444;border-radius:7px;padding:7px;z-index:10000}.gn-country-menu a{display:block;border:0;border-radius:4px}.gn-country-menu.open{display:block}.gn-ad{width:100%;margin:auto;padding:10px 8px;text-align:center;background:#dfb551;clear:both}.gn-footer{margin-top:32px;background:#1a1a1a;color:#eee;border-top:4px solid var(--gn-accent)}.gn-footer-inner{max-width:1200px;width:95%;margin:auto;padding:28px 0 18px;display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:24px}.gn-footer h3{color:#e0b94f;font-size:16px;margin:0 0 12px}.gn-footer p,.gn-footer li{color:#c8c8c8;font-size:13px;line-height:1.8}.gn-footer ul{list-style:none;padding:0;margin:0}.gn-footer a{color:#e0b94f;text-decoration:none}.gn-footer-bottom{text-align:center;border-top:1px solid #393939;padding:15px 10px;font-size:13px;color:#c8c8c8}
.gn-directory{background:#dfb551;min-height:100vh;padding-bottom:34px;font-family:Arial,sans-serif;color:var(--gn-text)}.gn-directory *{box-sizing:border-box}.gn-dir-head{background:#b8860b;padding:20px 20px 25px;border-radius:0 0 30px 30px;position:sticky;top:0;z-index:50;box-shadow:0 4px 15px rgba(0,0,0,.1)}.gn-dir-top{max-width:1200px;margin:0 auto 15px;display:flex;align-items:center;justify-content:space-between;color:#fff}.gn-dir-title{margin:0;font-size:1.5rem;font-weight:800;color:#fff}.gn-back{background:rgba(255,255,255,.15);width:38px;height:38px;display:flex;align-items:center;justify-content:center;border-radius:50%;color:#fff;text-decoration:none}.gn-search{max-width:850px;margin:auto;background:#fff;border-radius:15px;height:52px;display:flex;align-items:center;padding:0 15px;gap:10px;box-shadow:0 2px 8px rgba(0,0,0,.1)}.gn-search input{border:0;outline:none;width:100%;height:100%;font-size:1rem;background:transparent;color:#333;direction:<?php echo $gn_is_rtl ? 'rtl' : 'ltr'; ?>}.gn-clear{display:none;color:#999;cursor:pointer;padding:5px}.gn-content{padding:25px 15px;max-width:1200px;margin:auto}.gn-region{margin-bottom:30px}.gn-region-title{font-size:1.1rem;color:#2c3e50;margin:0 0 15px;font-weight:800;display:flex;align-items:center;gap:10px}.gn-region-title:before{content:'';display:inline-block;width:4px;height:18px;background:var(--gn-gold);border-radius:2px}.gn-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(130px,1fr));gap:12px}.gn-country{display:block;text-decoration:none;color:inherit;transition:transform .2s}.gn-country:hover{transform:translateY(-3px)}.gn-card{background:#fff;border-radius:var(--gn-radius);padding:15px 10px;display:flex;flex-direction:column;align-items:center;justify-content:center;box-shadow:var(--gn-shadow);height:100%;border:1px solid #eee;min-height:145px}.gn-flag{width:52px;height:52px;border-radius:50%;overflow:hidden;border:3px solid #f2f2f2;margin-bottom:10px;background:#eee}.gn-flag img{width:100%;height:100%;object-fit:cover}.gn-name{font-size:.9rem;font-weight:700;color:#252525;margin-bottom:5px;text-align:center;line-height:1.35;width:100%;min-height:2.4em;display:flex;align-items:center;justify-content:center}.gn-currency{font-size:.75rem;background:#eff2f5;color:#6c757d;padding:3px 10px;border-radius:20px;font-weight:700;letter-spacing:.5px}.gn-empty{text-align:center;margin:45px auto;color:#777}.gn-empty i{font-size:3rem;color:#ddd}.gn-hide{display:none!important}.gn-seo{max-width:1100px;width:95%;margin:20px auto;padding:18px;background:#fff;border-<?php echo $gn_is_rtl ? 'right' : 'left'; ?>:4px solid #d4af37;border-radius:6px;direction:<?php echo $gn_is_rtl ? 'rtl' : 'ltr'; ?>;text-align:<?php echo $gn_is_rtl ? 'right' : 'left'; ?>;line-height:1.8}.gn-seo h2{margin-top:0}.gn-seo p{margin-bottom:0}
@media(max-width:760px){.gn-site-header-inner{align-items:flex-start;flex-direction:column}.gn-nav{justify-content:flex-start;width:100%}.gn-nav a,.gn-country-toggle{padding:8px 10px}.gn-grid{grid-template-columns:repeat(auto-fill,minmax(105px,1fr));gap:9px}.gn-card{padding:12px 7px;min-height:135px}}@media(max-width:768px){.gn-footer-inner{grid-template-columns:1fr;gap:18px;text-align:center}}
</style>
</head>
<body <?php body_class('goldnow-unified-countries'); ?>>
<?php if (function_exists('wp_body_open')) { wp_body_open(); } ?>
<?php if (!$gn_is_app): ?>
<header class="gn-site-header"><div class="gn-site-header-inner">
<a class="gn-brand" href="<?php echo esc_url($gn_home_url); ?>" aria-label="AlTaqrer Gold">
<?php if ($gn_logo_id) { echo wp_get_attachment_image($gn_logo_id, 'full', false, ['alt'=>'AlTaqrer Gold']); } else { ?><span>AlTaqrer Gold</span><?php } ?>
</a>
<nav class="gn-nav" aria-label="<?php echo esc_attr($gn['countries']); ?>">
<a href="<?php echo esc_url($gn_home_url); ?>"><?php echo esc_html($gn['home']); ?></a>
<a href="<?php echo esc_url($gn_country_base . 'eg/'); ?>"><?php echo esc_html($gn['prices']); ?></a>
<a href="<?php echo esc_url($gn_country_base . 'eg/gold-bars/'); ?>"><?php echo esc_html($gn['bars']); ?></a>
<a href="<?php echo esc_url($gn_country_base . 'eg/gold-index/'); ?>"><?php echo esc_html($gn['index']); ?></a>
<a href="<?php echo esc_url($gn_country_base . 'eg/usd/'); ?>"><?php echo esc_html($gn['usd']); ?></a>
<div class="gn-country-wrap"><button class="gn-country-toggle" type="button" aria-expanded="false"><?php echo esc_html($gn['countries']); ?> ▾</button><div class="gn-country-menu">
<?php foreach (['eg'=>'Egypt','sa'=>'Saudi Arabia','ae'=>'United Arab Emirates','kw'=>'Kuwait'] as $code=>$fallback): ?><a href="<?php echo esc_url($gn_country_base . $code . '/'); ?>"><?php echo esc_html($gn_get_country_name($code, $fallback)); ?></a><?php endforeach; ?>
<a href="<?php echo esc_url($gn_lang === 'ar' ? home_url('/all-countries/') : home_url('/' . $gn_lang . '/all-countries/')); ?>"><?php echo esc_html($gn['all']); ?></a>
</div></div></nav></div></header>
<?php if (function_exists('goldnow_display_ad')): ?><div class="gn-ad"><?php goldnow_display_ad('below_navbar'); ?></div><?php endif; ?>
<?php endif; ?>
<div class="gn-directory" dir="<?php echo $gn_is_rtl ? 'rtl' : 'ltr'; ?>">
<header class="gn-dir-head"><div class="gn-dir-top"><h1 class="gn-dir-title"><?php echo esc_html($gn['all']); ?></h1><a class="gn-back" href="<?php echo esc_url($gn_home_url); ?>" aria-label="<?php echo esc_attr($gn['back']); ?>"><i class="fa-solid fa-arrow-<?php echo $gn_is_rtl ? 'right' : 'left'; ?>" aria-hidden="true"></i></a></div>
<div class="gn-search"><i class="fa-solid fa-magnifying-glass" aria-hidden="true" style="color:#bbb"></i><input type="search" id="gnCountrySearch" placeholder="<?php echo esc_attr($gn['search']); ?>" autocomplete="off"><i class="fa-solid fa-circle-xmark gn-clear" id="gnCountryClear" aria-label="Clear search"></i></div></header>
<main class="gn-content">
<?php foreach ($gn_region_groups as $region_name=>$codes): ?><section class="gn-region"><h2 class="gn-region-title"><?php echo esc_html($region_name); ?></h2><div class="gn-grid">
<?php foreach ($codes as $code): $parts=explode('|',$gn_countries[$code]); $currency=$parts[0]; $english=$parts[1]; $country_name=$gn_get_country_name($code,$english); $flag_local=get_template_directory().'/assets/flags/'.$code.'.svg'; $flag_local_png=get_template_directory().'/assets/flags/'.$code.'.png'; $flag_url=file_exists($flag_local)?get_template_directory_uri().'/assets/flags/'.$code.'.svg':(file_exists($flag_local_png)?get_template_directory_uri().'/assets/flags/'.$code.'.png':'https://flagcdn.com/w160/'.$code.'.png'); $search=$country_name.' '.$english.' '.$currency.' '.$code; ?>
<a class="gn-country" href="<?php echo esc_url($gn_country_base . $code . '/'); ?>" data-search="<?php echo esc_attr(function_exists('mb_strtolower') ? mb_strtolower($search, 'UTF-8') : strtolower($search)); ?>"><div class="gn-card"><div class="gn-flag"><img src="<?php echo esc_url($flag_url); ?>" alt="<?php echo esc_attr($country_name); ?>" loading="lazy" width="52" height="52"></div><span class="gn-name"><?php echo esc_html($country_name); ?></span><span class="gn-currency"><?php echo esc_html($currency); ?></span></div></a>
<?php endforeach; ?></div></section><?php endforeach; ?>
<div id="gnCountryEmpty" class="gn-empty gn-hide"><i class="fa-solid fa-earth-americas" aria-hidden="true"></i><h3><?php echo esc_html($gn['empty']); ?></h3><p><?php echo esc_html($gn['try']); ?></p></div>
</main></div>
<section class="gn-seo"><h2><?php echo esc_html($gn['seo_title']); ?></h2><p><?php echo esc_html($gn['seo']); ?></p></section>
<?php if (!$gn_is_app): ?><footer class="gn-footer"><div class="gn-footer-inner">
<section><h3><?php echo esc_html($gn['about']); ?></h3><p><strong>AlTaqrer Gold</strong> — <?php echo esc_html($gn['seo']); ?></p></section>
<section><h3><?php echo esc_html($gn['sections']); ?></h3><ul><li><a href="<?php echo esc_url($gn_country_base.'eg/'); ?>"><?php echo esc_html($gn['prices']); ?></a></li><li><a href="<?php echo esc_url($gn_country_base.'eg/gold-bars/'); ?>"><?php echo esc_html($gn['bars']); ?></a></li><li><a href="<?php echo esc_url($gn_country_base.'eg/gold-index/'); ?>"><?php echo esc_html($gn['index']); ?></a></li><li><a href="<?php echo esc_url($gn_country_base.'eg/usd/'); ?>"><?php echo esc_html($gn['usd']); ?></a></li></ul></section>
<section><h3><?php echo esc_html($gn['regional']); ?></h3><ul><?php foreach (['eg'=>'Egypt','sa'=>'Saudi Arabia','ae'=>'United Arab Emirates','kw'=>'Kuwait'] as $code=>$fallback): ?><li><a href="<?php echo esc_url($gn_country_base.$code.'/'); ?>"><?php echo esc_html($gn_get_country_name($code,$fallback)); ?></a></li><?php endforeach; ?></ul></section>
</div><div class="gn-footer-bottom"><?php echo esc_html($gn['rights']); ?> &copy; <?php echo esc_html(function_exists('wp_date')?wp_date('Y'):date('Y')); ?> <a href="<?php echo esc_url($gn_home_url); ?>">AlTaqrer Gold</a>.</div></footer><?php endif; ?>
<script>
document.addEventListener('DOMContentLoaded',function(){
 const input=document.getElementById('gnCountrySearch'),clear=document.getElementById('gnCountryClear'),empty=document.getElementById('gnCountryEmpty'),sections=document.querySelectorAll('.gn-region');
 if(input&&clear&&empty){const run=function(){const term=input.value.toLocaleLowerCase().trim();let total=0;clear.style.display=term?'block':'none';sections.forEach(function(section){let count=0;section.querySelectorAll('.gn-country').forEach(function(card){const words=(card.getAttribute('data-search')||'').toLocaleLowerCase();const match=!term||words.includes(term);card.classList.toggle('gn-hide',!match);if(match){count++;total++;}});section.classList.toggle('gn-hide',count===0);});empty.classList.toggle('gn-hide',total!==0);};input.addEventListener('input',run);clear.addEventListener('click',function(){input.value='';run();input.focus();});}
 const toggle=document.querySelector('.gn-country-toggle'),menu=document.querySelector('.gn-country-menu');if(toggle&&menu){toggle.addEventListener('click',function(e){e.preventDefault();const open=menu.classList.toggle('open');toggle.setAttribute('aria-expanded',open?'true':'false');});document.addEventListener('click',function(e){if(!e.target.closest('.gn-country-wrap')){menu.classList.remove('open');toggle.setAttribute('aria-expanded','false');}});}
});
</script>
<?php wp_footer(); ?>
</body></html>