<?php
if (!defined('ABSPATH')) { exit; }

/**
 * Localized article publisher.
 * Ports the proven Gold Post publishing model while using GNMM's 10-language
 * dictionary and Gold Manager snapshot. Same-day manual runs update; cron runs
 * skip an existing daily article. A new local date creates a new article.
 */
final class GNMM_Articles {
    public static function init() {
        add_action('gnmm_run_article_module', array(__CLASS__, 'scheduled_run'), 10, 2);
        add_action('wp_head', array(__CLASS__, 'output_faq_schema'), 20);
    }

    private static function country_date($term, $code) {
        if (class_exists('GNAP_Countries') && method_exists('GNAP_Countries', 'local_date')) {
            $local = GNAP_Countries::local_date($code);
            if (is_array($local) && !empty($local['ymd'])) { return $local['ymd']; }
        }
        $timezone = get_term_meta((int) $term->term_id, 'country_timezone', true);
        if (!$timezone) { $timezone = get_term_meta((int) $term->term_id, 'timezone', true); }
        try { $tz = $timezone ? new DateTimeZone($timezone) : wp_timezone(); }
        catch (Exception $e) { $tz = wp_timezone(); }
        return (new DateTime('now', $tz))->format('Y-m-d');
    }

    private static function currency_name($currency, $language) {
        $names = array(
            'EGP'=>array('ar'=>'جنيه مصري','en'=>'Egyptian Pound','fr'=>'livre égyptienne','de'=>'Ägyptisches Pfund','es'=>'libra egipcia','it'=>'sterlina egiziana','pt'=>'libra egípcia','ru'=>'египетский фунт','hi'=>'मिस्री पाउंड','tr'=>'Mısır Lirası'),
            'USD'=>array('ar'=>'دولار أمريكي','en'=>'US Dollar','fr'=>'dollar américain','de'=>'US-Dollar','es'=>'dólar estadounidense','it'=>'dollaro statunitense','pt'=>'dólar americano','ru'=>'доллар США','hi'=>'अमेरिकी डॉलर','tr'=>'ABD doları'),
            'EUR'=>array('ar'=>'يورو','en'=>'Euro','fr'=>'euro','de'=>'Euro','es'=>'euro','it'=>'euro','pt'=>'euro','ru'=>'евро','hi'=>'यूरो','tr'=>'euro'),
            'GBP'=>array('ar'=>'جنيه إسترليني','en'=>'British Pound','fr'=>'livre sterling','de'=>'Britisches Pfund','es'=>'libra esterlina','it'=>'sterlina britannica','pt'=>'libra esterlina','ru'=>'фунт стерлингов','hi'=>'ब्रिटिश पाउंड','tr'=>'İngiliz sterlini'),
            'SAR'=>array('ar'=>'ريال سعودي','en'=>'Saudi Riyal','fr'=>'riyal saoudien','de'=>'Saudi-Riyal','es'=>'riyal saudí','it'=>'riyal saudita','pt'=>'riyal saudita','ru'=>'саудовский риял','hi'=>'सऊदी रियाल','tr'=>'Suudi riyali'),
            'AED'=>array('ar'=>'درهم إماراتي','en'=>'UAE Dirham','fr'=>'dirham des Émirats','de'=>'VAE-Dirham','es'=>'dírham de los EAU','it'=>'dirham degli Emirati','pt'=>'dirham dos EAU','ru'=>'дирхам ОАЭ','hi'=>'यूएई दिरहम','tr'=>'BAE dirhemi'),
            'TRY'=>array('ar'=>'ليرة تركية','en'=>'Turkish Lira','fr'=>'livre turque','de'=>'Türkische Lira','es'=>'lira turca','it'=>'lira turca','pt'=>'lira turca','ru'=>'турецкая лира','hi'=>'तुर्की लीरा','tr'=>'Türk lirası'),
            'INR'=>array('ar'=>'روبية هندية','en'=>'Indian Rupee','fr'=>'roupie indienne','de'=>'Indische Rupie','es'=>'rupia india','it'=>'rupia indiana','pt'=>'rupia indiana','ru'=>'индийская рупия','hi'=>'भारतीय रुपया','tr'=>'Hindistan rupisi'),
            'RUB'=>array('ar'=>'روبل روسي','en'=>'Russian Ruble','fr'=>'rouble russe','de'=>'Russischer Rubel','es'=>'rublo ruso','it'=>'rublo russo','pt'=>'rublo russo','ru'=>'российский рубль','hi'=>'रूसी रूबल','tr'=>'Rus rublesi'),
            'KWD'=>array('ar'=>'دينار كويتي','en'=>'Kuwaiti Dinar','fr'=>'dinar koweïtien','de'=>'Kuwaitischer Dinar','es'=>'dinar kuwaití','it'=>'dinaro kuwaitiano','pt'=>'dinar kuwaitiano','ru'=>'кувейтский динар','hi'=>'कुवैती दीनार','tr'=>'Kuveyt dinarı'),
            'QAR'=>array('ar'=>'ريال قطري','en'=>'Qatari Riyal','fr'=>'riyal qatari','de'=>'Katar-Riyal','es'=>'riyal catarí','it'=>'riyal qatari','pt'=>'riyal catariano','ru'=>'катарский риял','hi'=>'कतरी रियाल','tr'=>'Katar riyali'),
            'BHD'=>array('ar'=>'دينار بحريني','en'=>'Bahraini Dinar','fr'=>'dinar bahreïni','de'=>'Bahrain-Dinar','es'=>'dinar bareiní','it'=>'dinaro bahreinita','pt'=>'dinar bareinita','ru'=>'бахрейнский динар','hi'=>'बहरीनी दीनार','tr'=>'Bahreyn dinarı'),
            'OMR'=>array('ar'=>'ريال عماني','en'=>'Omani Rial','fr'=>'rial omanais','de'=>'Omanischer Rial','es'=>'rial omaní','it'=>'rial omanita','pt'=>'rial omanense','ru'=>'оманский риал','hi'=>'ओमानी रियाल','tr'=>'Umman riyali'),
            'MAD'=>array('ar'=>'درهم مغربي','en'=>'Moroccan Dirham','fr'=>'dirham marocain','de'=>'Marokkanischer Dirham','es'=>'dírham marroquí','it'=>'dirham marocchino','pt'=>'dirham marroquino','ru'=>'марокканский дирхам','hi'=>'मोरक्कन दिरहम','tr'=>'Fas dirhemi'),
            'DZD'=>array('ar'=>'دينار جزائري','en'=>'Algerian Dinar','fr'=>'dinar algérien','de'=>'Algerischer Dinar','es'=>'dinar argelino','it'=>'dinaro algerino','pt'=>'dinar argelino','ru'=>'алжирский динар','hi'=>'अल्जीरियाई दीनार','tr'=>'Cezayir dinarı'),
            'TND'=>array('ar'=>'دينار تونسي','en'=>'Tunisian Dinar','fr'=>'dinar tunisien','de'=>'Tunesischer Dinar','es'=>'dinar tunecino','it'=>'dinaro tunisino','pt'=>'dinar tunisino','ru'=>'тунисский динар','hi'=>'ट्यूनीशियाई दीनार','tr'=>'Tunus dinarı'),
            'JOD'=>array('ar'=>'دينار أردني','en'=>'Jordanian Dinar','fr'=>'dinar jordanien','de'=>'Jordanischer Dinar','es'=>'dinar jordano','it'=>'dinaro giordano','pt'=>'dinar jordaniano','ru'=>'иорданский динар','hi'=>'जॉर्डनियन दीनार','tr'=>'Ürdün dinarı'),
            'ILS'=>array('ar'=>'شيكل إسرائيلي','en'=>'Israeli Shekel','fr'=>'shekel israélien','de'=>'Israelischer Schekel','es'=>'séquel israelí','it'=>'shekel israeliano','pt'=>'shekel israelense','ru'=>'израильский шекель','hi'=>'इज़राइली शेकेल','tr'=>'İsrail şekeli'),
            'CAD'=>array('ar'=>'دولار كندي','en'=>'Canadian Dollar','fr'=>'dollar canadien','de'=>'Kanadischer Dollar','es'=>'dólar canadiense','it'=>'dollaro canadese','pt'=>'dólar canadense','ru'=>'канадский доллар','hi'=>'कनाडाई डॉलर','tr'=>'Kanada doları'),
            'AUD'=>array('ar'=>'دولار أسترالي','en'=>'Australian Dollar','fr'=>'dollar australien','de'=>'Australischer Dollar','es'=>'dólar australiano','it'=>'dollaro australiano','pt'=>'dólar australiano','ru'=>'австралийский доллар','hi'=>'ऑस्ट्रेलियाई डॉलर','tr'=>'Avustralya doları'),
            'JPY'=>array('ar'=>'ين ياباني','en'=>'Japanese Yen','fr'=>'yen japonais','de'=>'Japanischer Yen','es'=>'yen japonés','it'=>'yen giapponese','pt'=>'iene japonês','ru'=>'японская иена','hi'=>'जापानी येन','tr'=>'Japon yeni'),
            'CNY'=>array('ar'=>'يوان صيني','en'=>'Chinese Yuan','fr'=>'yuan chinois','de'=>'Chinesischer Yuan','es'=>'yuan chino','it'=>'yuan cinese','pt'=>'yuan chinês','ru'=>'китайский юань','hi'=>'चीनी युआन','tr'=>'Çin yuanı'),
            'PKR'=>array('ar'=>'روبية باكستانية','en'=>'Pakistani Rupee','fr'=>'roupie pakistanaise','de'=>'Pakistanische Rupie','es'=>'rupia pakistaní','it'=>'rupia pakistana','pt'=>'rupia paquistanesa','ru'=>'пакистанская рупия','hi'=>'पाकिस्तानी रुपया','tr'=>'Pakistan rupisi'),
            'BRL'=>array('ar'=>'ريال برازيلي','en'=>'Brazilian Real','fr'=>'réal brésilien','de'=>'Brasilianischer Real','es'=>'real brasileño','it'=>'real brasiliano','pt'=>'real brasileiro','ru'=>'бразильский реал','hi'=>'ब्राज़ीलियाई रियल','tr'=>'Brezilya reali'),
            'ZAR'=>array('ar'=>'راند جنوب أفريقي','en'=>'South African Rand','fr'=>'rand sud-africain','de'=>'Südafrikanischer Rand','es'=>'rand sudafricano','it'=>'rand sudafricano','pt'=>'rand sul-africano','ru'=>'южноафриканский рэнд','hi'=>'दक्षिण अफ़्रीकी रैंड','tr'=>'Güney Afrika randı')
        );
        if (isset($names[$currency][$language])) { return $names[$currency][$language]; }
        if ($language === 'ar') {
            global $currency_names;
            if (is_array($currency_names) && !empty($currency_names[$currency])) { return $currency_names[$currency]; }
        }
        return $currency;
    }

    private static function price_usd($snapshot, $key) {
        if (isset($snapshot['prices_usd'][$key]) && is_numeric($snapshot['prices_usd'][$key])) { return (float) $snapshot['prices_usd'][$key]; }
        foreach ((array) $snapshot['prices_usd'] as $candidate => $value) {
            if (strtolower((string) $candidate) === strtolower((string) $key) && is_numeric($value)) { return (float) $value; }
        }
        return null;
    }

    private static function local_prices($term, $snapshot) {
        $code = GNMM_Gold_Manager::country_code($term);
        $currency = GNMM_Gold_Manager::currency($term, $code);
        $out = array();
        foreach (array('24k','22k','21k','18k','14k') as $karat) {
            $usd = self::price_usd($snapshot, $karat);
            if ($usd === null) { continue; }
            $local = GNMM_Gold_Manager::local_price($usd, $currency, $snapshot['currency_rates']);
            if ($local !== null) { $out[$karat] = $local; }
        }
        return $out;
    }

    private static function localized_price_rows($language, $local, $currency_name) {
        $labels = array(
            'ar'=>array('heading'=>'أسعار جرام الذهب اليوم','karat'=>'العيار','price'=>'السعر','currency'=>'العملة','suffix'=>'عيار %d'),
            'en'=>array('heading'=>'Gold Prices per Gram Today','karat'=>'Karat','price'=>'Price','currency'=>'Currency','suffix'=>'%dK'),
            'fr'=>array('heading'=>'Prix de l’or au gramme aujourd’hui','karat'=>'Carat','price'=>'Prix','currency'=>'Devise','suffix'=>'%d carats'),
            'de'=>array('heading'=>'Goldpreis pro Gramm heute','karat'=>'Karat','price'=>'Preis','currency'=>'Währung','suffix'=>'%d Karat'),
            'es'=>array('heading'=>'Precio del oro por gramo hoy','karat'=>'Quilate','price'=>'Precio','currency'=>'Moneda','suffix'=>'%d quilates'),
            'it'=>array('heading'=>'Prezzo dell’oro al grammo oggi','karat'=>'Carati','price'=>'Prezzo','currency'=>'Valuta','suffix'=>'%d carati'),
            'pt'=>array('heading'=>'Preço do ouro por grama hoje','karat'=>'Quilate','price'=>'Preço','currency'=>'Moeda','suffix'=>'%d quilates'),
            'ru'=>array('heading'=>'Цена золота за грамм сегодня','karat'=>'Проба','price'=>'Цена','currency'=>'Валюта','suffix'=>'%d проба'),
            'hi'=>array('heading'=>'आज प्रति ग्राम सोने की कीमत','karat'=>'कैरेट','price'=>'कीमत','currency'=>'मुद्रा','suffix'=>'%d कैरेट'),
            'tr'=>array('heading'=>'Bugün gram altın fiyatı','karat'=>'Ayar','price'=>'Fiyat','currency'=>'Para birimi','suffix'=>'%d ayar')
        );
        $words = isset($labels[$language]) ? $labels[$language] : $labels['en'];
        $rows = array();
        // Explicit keys only: 24k_oz must never be parsed as another 24K gram row.
        foreach (array('24k','22k','21k','18k','14k') as $key) {
            if (!isset($local[$key])) { continue; }
            $rows[] = '<tr><th>' . esc_html(sprintf($words['suffix'], (int) $key)) . '</th><td>' . esc_html(number_format_i18n($local[$key], 2)) . '</td><td>' . esc_html($currency_name) . '</td></tr>';
        }
        if (!$rows) { return new WP_Error('gnmm_article_prices', 'No supported localized karat prices were found in Gold Manager data.'); }
        return '<section class="gnmm-article-prices"><h2>' . esc_html($words['heading']) . '</h2><table class="gnmm-price-table"><thead><tr><th>' . esc_html($words['karat']) . '</th><th>' . esc_html($words['price']) . '</th><th>' . esc_html($words['currency']) . '</th></tr></thead><tbody>' . implode('', $rows) . '</tbody></table></section>';
    }

    private static function seo_metadata($language, $country, $local, $currency_name) {
        $titles = array(
            'ar'=>'أسعار الذهب اليوم في %s | التقرير جولد',
            'en'=>'Gold Prices Today in %s | AlTaqrer Gold',
            'fr'=>'Prix de l’or aujourd’hui en %s | AlTaqrer Gold',
            'de'=>'Goldpreise heute in %s | AlTaqrer Gold',
            'es'=>'Precio del oro hoy en %s | AlTaqrer Gold',
            'it'=>'Prezzo dell’oro oggi in %s | AlTaqrer Gold',
            'pt'=>'Preço do ouro hoje em %s | AlTaqrer Gold',
            'ru'=>'Цена золота сегодня в %s | AlTaqrer Gold',
            'hi'=>'%s में आज सोने की कीमत | AlTaqrer Gold',
            'tr'=>'%s güncel altın fiyatları | AlTaqrer Gold'
        );
        $focus_templates = array(
            'ar'=>'سعر الذهب اليوم في %s','en'=>'gold price in %s today','fr'=>'prix de l’or aujourd’hui en %s','de'=>'Goldpreis heute in %s',
            'es'=>'precio del oro hoy en %s','it'=>'prezzo dell’oro oggi in %s','pt'=>'preço do ouro hoje em %s','ru'=>'цена золота сегодня в %s',
            'hi'=>'आज %s में सोने का भाव','tr'=>'%s güncel altın fiyatları'
        );
        $p21 = isset($local['21k']) ? number_format_i18n($local['21k'], 2) : '';
        $p24 = isset($local['24k']) ? number_format_i18n($local['24k'], 2) : '';
        $descriptions = array(
            'ar'=>'تابع سعر الذهب اليوم في %1$s: عيار 21 عند %2$s وعيار 24 عند %3$s لكل جرام، مع أسعار بقية العيارات والأونصة العالمية بالدولار. الأسعار استرشادية ولا تشمل المصنعية.',
            'en'=>'Track gold prices in %1$s today: 21K at %2$s and 24K at %3$s per gram, with other karats and the global gold ounce in USD. Indicative prices exclude making charges.',
            'fr'=>'Suivez le prix de l’or aujourd’hui en %1$s : le 21 carats à %2$s et le 24 carats à %3$s le gramme, avec les autres titrages et l’once mondiale en USD. Hors fabrication.',
            'de'=>'Verfolgen Sie den Goldpreis heute in %1$s: 21 Karat bei %2$s und 24 Karat bei %3$s je Gramm, dazu weitere Legierungen und die Weltunze in USD. Ohne Verarbeitungskosten.',
            'es'=>'Consulte el precio del oro hoy en %1$s: 21 quilates a %2$s y 24 quilates a %3$s por gramo, además de otros quilates y la onza mundial en USD. Sin gastos de fabricación.',
            'it'=>'Segui il prezzo dell’oro oggi in %1$s: 21 carati a %2$s e 24 carati a %3$s al grammo, con altre carature e l’oncia mondiale in USD. Escluse le lavorazioni.',
            'pt'=>'Acompanhe o preço do ouro hoje em %1$s: 21 quilates a %2$s e 24 quilates a %3$s por grama, além de outras purezas e da onça mundial em USD. Sem custos de fabricação.',
            'ru'=>'Следите за ценой золота сегодня в %1$s: 21 проба — %2$s, 24 проба — %3$s за грамм, а также другие пробы и мировая унция в USD. Без стоимости изготовления.',
            'hi'=>'%1$s में आज सोने की कीमत देखें: 21 कैरेट %2$s और 24 कैरेट %3$s प्रति ग्राम, साथ में अन्य कैरेट और USD में वैश्विक औंस। निर्माण शुल्क शामिल नहीं हैं।',
            'tr'=>'%1$s güncel altın fiyatları: gram başına 21 ayar %2$s ve 24 ayar %3$s. Diğer ayarlar ve USD cinsinden küresel ons da listelenir. İşçilik dahil değildir.'
        );
        $title = sprintf(isset($titles[$language]) ? $titles[$language] : $titles['en'], $country);
        $focus = sprintf(isset($focus_templates[$language]) ? $focus_templates[$language] : $focus_templates['en'], $country);
        $description = sprintf(isset($descriptions[$language]) ? $descriptions[$language] : $descriptions['en'], $country, $p21 . ' ' . $currency_name, $p24 . ' ' . $currency_name);
        if (function_exists('mb_strlen') && mb_strlen($description, 'UTF-8') > 160) {
            $description = rtrim(mb_substr($description, 0, 157, 'UTF-8')) . '…';
        } elseif (strlen($description) > 160 && !function_exists('mb_strlen')) {
            $description = substr($description, 0, 157) . '...';
        }
        $tag_templates = array(
            'ar'=>array('أسعار الذهب اليوم في %s','سعر الذهب عيار 21 في %s','سعر الذهب عيار 24','سعر جرام الذهب','سعر أونصة الذهب'),
            'en'=>array('gold prices in %s','21K gold price','24K gold price','gold price per gram','gold ounce price'),
            'fr'=>array('prix de l’or en %s','prix de l’or 21 carats','prix de l’or 24 carats','prix de l’or au gramme','cours de l’once d’or'),
            'de'=>array('Goldpreis in %s','Goldpreis 21 Karat','Goldpreis 24 Karat','Goldpreis pro Gramm','Goldpreis je Unze'),
            'es'=>array('precio del oro en %s','oro de 21 quilates','oro de 24 quilates','precio del oro por gramo','precio de la onza de oro'),
            'it'=>array('prezzo oro in %s','oro 21 carati','oro 24 carati','prezzo oro al grammo','prezzo oncia oro'),
            'pt'=>array('preço do ouro em %s','ouro 21 quilates','ouro 24 quilates','preço do ouro por grama','preço da onça de ouro'),
            'ru'=>array('цена золота в %s','золото 21 пробы','золото 24 пробы','цена золота за грамм','цена унции золота'),
            'hi'=>array('%s में सोने की कीमत','21 कैरेट सोना','24 कैरेट सोना','प्रति ग्राम सोने की कीमत','सोने के औंस की कीमत'),
            'tr'=>array('%s altın fiyatları','21 ayar altın fiyatı','24 ayar altın fiyatı','gram altın fiyatı','altın ons fiyatı')
        );
        $templates = isset($tag_templates[$language]) ? $tag_templates[$language] : $tag_templates['en'];
        $tags = array();
        foreach ($templates as $index => $template) { $tags[] = $index === 0 ? sprintf($template, $country) : $template; }
        return array('title'=>$title,'description'=>$description,'focus_keyword'=>$focus,'tags'=>$tags);
    }

    private static function article_dictionary_candidates() {
        $candidates = array();
        if (defined('GNMM_DIR')) { $candidates[] = GNMM_DIR . 'includes/goldnow-seo-content.php'; }
        if (class_exists('GoldNow_Language_Manager')) {
            try {
                $reflection = new ReflectionClass('GoldNow_Language_Manager');
                $main_file = $reflection->getFileName();
                if ($main_file) { $candidates[] = dirname($main_file) . '/goldnow-seo-content.php'; }
            } catch (Exception $e) {}
        }
        $plugin_files = get_option('active_plugins', array());
        if (is_array($plugin_files) && defined('WP_PLUGIN_DIR')) {
            foreach ($plugin_files as $plugin_file) {
                if (basename($plugin_file) === 'goldnow-language-manager.php') {
                    $candidates[] = dirname(WP_PLUGIN_DIR . '/' . ltrim($plugin_file, '/')) . '/goldnow-seo-content.php';
                }
            }
        }
        if (is_multisite()) {
            $network_plugins = get_site_option('active_sitewide_plugins', array());
            if (is_array($network_plugins) && defined('WP_PLUGIN_DIR')) {
                foreach (array_keys($network_plugins) as $plugin_file) {
                    if (basename($plugin_file) === 'goldnow-language-manager.php') {
                        $candidates[] = dirname(WP_PLUGIN_DIR . '/' . ltrim($plugin_file, '/')) . '/goldnow-seo-content.php';
                    }
                }
            }
        }
        return array_values(array_unique(array_map('wp_normalize_path', $candidates)));
    }

    private static function ensure_article_dictionary() {
        if (function_exists('goldnow_seo_article_data')) { return true; }
        foreach (self::article_dictionary_candidates() as $file) {
            if (is_file($file) && is_readable($file)) {
                require_once $file;
                if (function_exists('goldnow_seo_article_data')) { return true; }
            }
        }
        return function_exists('goldnow_seo_article_data');
    }

    private static function faq_from_html($html) {
        $faq = array();
        if (preg_match_all('/<details><summary>(.*?)<\/summary><p>(.*?)<\/p><\/details>/s', (string) $html, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $faq[] = array(
                    'q'=>html_entity_decode(wp_strip_all_tags($match[1]), ENT_QUOTES | ENT_HTML5, 'UTF-8'),
                    'a'=>html_entity_decode(wp_strip_all_tags($match[2]), ENT_QUOTES | ENT_HTML5, 'UTF-8')
                );
            }
        }
        return $faq;
    }

    public static function article_content($language, $section, $term, $snapshot) {
        self::ensure_article_dictionary();
        if (!function_exists('goldnow_seo_article_data')) {
            return new WP_Error('gnmm_article_dictionary_missing', 'The bundled localized SEO article dictionary is not loaded.');
        }
        $topic = goldnow_seo_article_data($language, $section);
        if (!is_array($topic) || count($topic) < 3) { return new WP_Error('gnmm_article_invalid', 'The localized article entry is incomplete.'); }

        $country = GNMM_Gold_Manager::localized_country_name($term, $language);
        $code = GNMM_Gold_Manager::country_code($term);
        $currency = GNMM_Gold_Manager::currency($term, $code);
        if (!$currency) { return new WP_Error('gnmm_article_currency', 'Country currency is missing.'); }
        $currency_name = self::currency_name($currency, $language);
        $local = self::local_prices($term, $snapshot);
        if (count($local) < 3) { return new WP_Error('gnmm_article_prices', 'Not enough localized karat prices are available.'); }

        $ounce_usd = self::price_usd($snapshot, '24k_oz');
        if ($ounce_usd === null) {
            $price24 = self::price_usd($snapshot, '24k');
            $ounce_usd = $price24 !== null ? $price24 * 31.1034768 : null;
        }
        $usd_rate = 1.0;
        if ($currency !== 'USD') {
            $usd_base = !empty($snapshot['currency_rates']['USD']) ? (float) $snapshot['currency_rates']['USD'] : 1.0;
            $usd_rate = (!empty($snapshot['currency_rates'][$currency]) && $usd_base > 0) ? (float) $snapshot['currency_rates'][$currency] / $usd_base : null;
        }

        $date = self::country_date($term, $code);
        $base_url = GNMM_Gold_Manager::country_url($term, $language);
        $render_data = array(
            'country'=>$country,
            'currency'=>$currency_name,
            'date'=>$date,
            'country_slug'=>$term->slug,
            'base_url'=>$base_url,
            'prices'=>array(
                '24k'=>isset($local['24k']) ? $local['24k'] : null,
                '21k'=>isset($local['21k']) ? $local['21k'] : null,
                'ounce_usd'=>$ounce_usd,
                'usd_rate'=>$usd_rate
            )
        );
        if (function_exists('goldnow_render_seo_article')) {
            $content = goldnow_render_seo_article($language, $section, $render_data);
        } else {
            $content = '<article lang="' . esc_attr($language) . '"><h2>' . esc_html($topic[0] . ' ' . $country) . '</h2><p>' . esc_html($topic[1]) . '</p><p>' . esc_html($topic[2]) . '</p></article>';
        }
        $table = self::localized_price_rows($language, $local, $currency_name);
        if (is_wp_error($table)) { return $table; }
        $content .= $table;
        $content .= '<p><a href="' . esc_url($base_url) . '">' . esc_html($country) . '</a></p>';
        $seo = self::seo_metadata($language, $country, $local, $currency_name);
        return array(
            'title'=>$seo['title'],
            'description'=>$seo['description'],
            'focus_keyword'=>$seo['focus_keyword'],
            'tags'=>$seo['tags'],
            'content'=>$content,
            'faq'=>self::faq_from_html($content),
            'country_url'=>$base_url,
            'seo_title'=>$seo['title']
        );
    }

    private static function find_existing_post($key, $include_trash = false) {
        $statuses = array('draft','publish','pending','future','private');
        if ($include_trash) { $statuses[] = 'trash'; }
        $ids = get_posts(array(
            'post_type'=>'post','post_status'=>$statuses,'posts_per_page'=>1,'fields'=>'ids',
            'no_found_rows'=>true,'suppress_filters'=>true,'meta_key'=>'_gnmm_daily_article_key',
            'meta_value'=>$key,'orderby'=>'date','order'=>'DESC'
        ));
        return $ids ? (int) $ids[0] : 0;
    }

    public static function scheduled_run($settings, $context = 'cron') {
        if (!is_array($settings) || !GNMM_Gold_Manager::ready()) { return; }
        $snapshot = GNMM_Gold_Manager::snapshot();
        if (is_wp_error($snapshot)) {
            GNMM_Storage::log('error','articles',$snapshot->get_error_message());
            return;
        }
        foreach (GNMM_Core::languages() as $language => $meta) {
            $config = isset($settings['languages'][$language]) ? $settings['languages'][$language] : array();
            if (empty($config['enabled']) || empty($config['articles'])) { continue; }
            foreach (GNMM_Gold_Manager::countries() as $code => $term) {
                $country_config = isset($settings['countries'][$code]) && is_array($settings['countries'][$code]) ? $settings['countries'][$code] : array();
                if (empty($country_config['articles'])) { continue; }
                $result = self::publish_daily_article($term,$language,$settings,$snapshot,$context);
                if (is_wp_error($result)) { GNMM_Storage::log('error','articles',$result->get_error_message(),$code,$language); }
            }
        }
    }

    public static function publish_daily_article($term, $language, $settings, $snapshot, $context = 'cron') {
        $code = GNMM_Gold_Manager::country_code($term);
        $date = self::country_date($term,$code);
        $key = $date . '|' . $code . '|' . $language;
        $existing = self::find_existing_post($key,$context === 'cron');
        if ($existing && $context === 'cron') {
            GNMM_Storage::log('info','articles','Daily article already exists; scheduled run skipped to prevent duplicates.',$code,$language,array('post_id'=>$existing,'post_url'=>get_permalink($existing)));
            return $existing;
        }

        $article = self::article_content($language,'overview',$term,$snapshot);
        if (is_wp_error($article)) { return $article; }
        $status = isset($settings['article_status']) && $settings['article_status'] === 'publish' ? 'publish' : 'draft';
        $postarr = array(
            'post_type'=>'post',
            'post_title'=>$article['title'],
            'post_content'=>$article['content'],
            'post_excerpt'=>$article['description'],
            'meta_input'=>array(
                '_gnmm_daily_article_key'=>$key,
                '_gnmm_country_code'=>$code,
                '_gnmm_language'=>$language,
                '_gnmm_country_url'=>$article['country_url'],
                '_gnmm_source_updated_at'=>!empty($snapshot['source_updated_at']) ? (int) $snapshot['source_updated_at'] : 0,
                '_gnmm_seo_title'=>$article['seo_title'],
                '_gnmm_seo_description'=>$article['description'],
                '_gnmm_focus_keyword'=>$article['focus_keyword'],
                '_gnmm_faq'=>$article['faq'],
                '_yoast_wpseo_title'=>$article['seo_title'],
                '_yoast_wpseo_metadesc'=>$article['description'],
                '_yoast_wpseo_focuskw'=>$article['focus_keyword'],
                'rank_math_title'=>$article['seo_title'],
                'rank_math_description'=>$article['description'],
                'rank_math_focus_keyword'=>implode(', ',array_merge(array($article['focus_keyword']),$article['tags']))
            )
        );

        if ($existing) {
            $postarr['ID'] = $existing;
            $post_id = wp_update_post($postarr,true);
            $result = 'updated';
        } else {
            $postarr['post_status'] = $status;
            $postarr['post_author'] = !empty($settings['article_author']) ? absint($settings['article_author']) : get_current_user_id();
            $postarr['comment_status'] = isset($settings['article_comments']) ? $settings['article_comments'] : 'closed';
            $postarr['ping_status'] = isset($settings['article_pingbacks']) ? $settings['article_pingbacks'] : 'closed';
            if (!empty($settings['article_category'])) { $postarr['post_category'] = array(absint($settings['article_category'])); }
            $post_id = wp_insert_post($postarr,true);
            $result = 'created';
        }
        if (is_wp_error($post_id)) { return $post_id; }

        wp_set_post_tags($post_id,$article['tags'],false);
        if (!empty($settings['article_category'])) {
            wp_set_post_categories($post_id,array(absint($settings['article_category'])),false);
        }
        if (taxonomy_exists('countries')) { wp_set_object_terms($post_id,array((int) $term->term_id),'countries',false); }
        update_post_meta($post_id,'_gnmm_post_status',get_post_status($post_id));
        GNMM_Storage::log('success','articles',($result === 'created' ? 'Created' : 'Updated') . ' localized SEO country article.',$code,$language,array(
            'post_id'=>$post_id,'post_url'=>get_permalink($post_id),'edit_url'=>get_edit_post_link($post_id,'raw'),
            'status'=>get_post_status($post_id),'seo_title'=>$article['seo_title'],'focus_keyword'=>$article['focus_keyword']
        ));
        return (int) $post_id;
    }

    public static function output_faq_schema() {
        if (!is_singular('post')) { return; }
        $post_id = get_queried_object_id();
        if (!$post_id || !get_post_meta($post_id,'_gnmm_daily_article_key',true)) { return; }
        $faq = get_post_meta($post_id,'_gnmm_faq',true);
        if (!is_array($faq) || !$faq) { return; }
        $entities = array();
        foreach ($faq as $item) {
            if (empty($item['q']) || empty($item['a'])) { continue; }
            $entities[] = array('@type'=>'Question','name'=>$item['q'],'acceptedAnswer'=>array('@type'=>'Answer','text'=>$item['a']));
        }
        if (!$entities) { return; }
        echo '<script type="application/ld+json">' . wp_json_encode(array('@context'=>'https://schema.org','@type'=>'FAQPage','mainEntity'=>$entities),JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }
}
GNMM_Articles::init();
