<?php
/**
 * Template Name: GoldNow Multilingual Routes
 * Description: Unified ten-language country template using GoldNow Language Manager.
 * Version: 1.2.0
 *
 * Preserves the existing Arabic, English and French page branches and renders
 * localized SEO articles through the GoldNow Language Manager SEO module.
 */
if (!defined('ABSPATH')) {
    exit;
}

$goldnow_mlr_languages = array('ar','en','fr','de','it','pt','ru','hi','es','tr');
$goldnow_mlr_language = function_exists('altaqrer_ml_current_language')
    ? strtolower((string) altaqrer_ml_current_language())
    : (function_exists('goldnow_current_language') ? strtolower((string) goldnow_current_language()) : 'ar');

if (!in_array($goldnow_mlr_language, $goldnow_mlr_languages, true)) {
    $goldnow_mlr_language = 'ar';
}

/*
 * Use the existing GoldNow Language Manager for every non-Arabic language.
 * Its translate_text() intentionally performs exact source/dictionary matches.
 * Text not present in the site's dictionary is left untouched rather than
 * being silently replaced with an unrelated English translation.
 */
$goldnow_mlr_translate_output = ($goldnow_mlr_language !== 'ar')
    && function_exists('goldnow_translate_text');


/**
 * Template-level fallback glossary for the shared LTR country renderer.
 * The Language Manager remains the primary dictionary; these labels cover
 * the English source phrases used by this template when no saved entry exists.
 */
if (function_exists('add_filter')) {
    add_filter('goldnow_language_manager_unmatched_text', function ($text, $language) {
        static $labels = array(
            'Home' => array('de'=>'Startseite','es'=>'Inicio','it'=>'Home','pt'=>'Início','ru'=>'Главная','hi'=>'होम','tr'=>'Ana Sayfa'),
            'Gold Prices' => array('de'=>'Goldpreise','es'=>'Precios del oro','it'=>'Prezzi dell’oro','pt'=>'Preços do ouro','ru'=>'Цены на золото','hi'=>'सोने की कीमतें','tr'=>'Altın Fiyatları'),
            'Gold Bars' => array('de'=>'Goldbarren','es'=>'Lingotes de oro','it'=>'Lingotti d’oro','pt'=>'Barras de ouro','ru'=>'Золотые слитки','hi'=>'सोने की छड़ें','tr'=>'Altın Külçeleri'),
            'Gold Index' => array('de'=>'Goldindex','es'=>'Índice del oro','it'=>'Indice dell’oro','pt'=>'Índice do ouro','ru'=>'Индекс золота','hi'=>'गोल्ड इंडेक्स','tr'=>'Altın Endeksi'),
            'USD Rates' => array('de'=>'USD-Kurse','es'=>'Tipos de cambio USD','it'=>'Tassi USD','pt'=>'Taxas USD','ru'=>'Курс USD','hi'=>'USD दरें','tr'=>'USD Kurları'),
            'Countries' => array('de'=>'Länder','es'=>'Países','it'=>'Paesi','pt'=>'Países','ru'=>'Страны','hi'=>'देश','tr'=>'Ülkeler'),
            'All Countries' => array('de'=>'Alle Länder','es'=>'Todos los países','it'=>'Tutti i paesi','pt'=>'Todos os países','ru'=>'Все страны','hi'=>'सभी देश','tr'=>'Tüm Ülkeler'),
            'Search for a country' => array('de'=>'Land suchen','es'=>'Buscar un país','it'=>'Cerca un paese','pt'=>'Pesquisar um país','ru'=>'Поиск страны','hi'=>'देश खोजें','tr'=>'Ülke ara'),
            'Live Prices' => array('de'=>'Live-Preise','es'=>'Precios en directo','it'=>'Prezzi in tempo reale','pt'=>'Preços em direto','ru'=>'Цены в реальном времени','hi'=>'लाइव कीमतें','tr'=>'Canlı Fiyatlar'),
            'Gold Price Chart' => array('de'=>'Goldpreisdiagramm','es'=>'Gráfico del precio del oro','it'=>'Grafico del prezzo dell’oro','pt'=>'Gráfico do preço do ouro','ru'=>'График цены золота','hi'=>'सोने की कीमत का चार्ट','tr'=>'Altın Fiyat Grafiği'),
            'Gold Bars and Coins' => array('de'=>'Goldbarren und Münzen','es'=>'Lingotes y monedas de oro','it'=>'Lingotti e monete d’oro','pt'=>'Barras e moedas de ouro','ru'=>'Золотые слитки и монеты','hi'=>'सोने की छड़ें और सिक्के','tr'=>'Altın Külçeleri ve Sikkeler'),
            'Weight / Type' => array('de'=>'Gewicht / Typ','es'=>'Peso / Tipo','it'=>'Peso / Tipo','pt'=>'Peso / Tipo','ru'=>'Вес / Тип','hi'=>'वज़न / प्रकार','tr'=>'Ağırlık / Tür'),
            'Price' => array('de'=>'Preis','es'=>'Precio','it'=>'Prezzo','pt'=>'Preço','ru'=>'Цена','hi'=>'कीमत','tr'=>'Fiyat'),
            'Important:' => array('de'=>'Wichtig:','es'=>'Importante:','it'=>'Importante:','pt'=>'Importante:','ru'=>'Важно:','hi'=>'महत्वपूर्ण:','tr'=>'Önemli:'),
            'Gold Price Sections' => array('de'=>'Goldpreisbereiche','es'=>'Secciones del precio del oro','it'=>'Sezioni dei prezzi dell’oro','pt'=>'Secções dos preços do ouro','ru'=>'Разделы цен на золото','hi'=>'सोने की कीमत के अनुभाग','tr'=>'Altın Fiyatı Bölümleri'),
            'Regional Gold Prices' => array('de'=>'Goldpreise nach Regionen','es'=>'Precios del oro por región','it'=>'Prezzi dell’oro per regione','pt'=>'Preços do ouro por região','ru'=>'Цены на золото по регионам','hi'=>'क्षेत्र के अनुसार सोने की कीमतें','tr'=>'Bölgelere Göre Altın Fiyatları'),
            'Follow Us' => array('de'=>'Folgen Sie uns','es'=>'Síguenos','it'=>'Seguici','pt'=>'Siga-nos','ru'=>'Подписывайтесь на нас','hi'=>'हमें फ़ॉलो करें','tr'=>'Bizi Takip Edin'),
            'Important Links' => array('de'=>'Wichtige Links','es'=>'Enlaces importantes','it'=>'Link importanti','pt'=>'Ligações importantes','ru'=>'Важные ссылки','hi'=>'महत्वपूर्ण लिंक','tr'=>'Önemli Bağlantılar'),
            'Join Our Telegram Channel' => array('de'=>'Unserem Telegram-Kanal beitreten','es'=>'Únete a nuestro canal de Telegram','it'=>'Unisciti al nostro canale Telegram','pt'=>'Junte-se ao nosso canal do Telegram','ru'=>'Подпишитесь на наш канал в Telegram','hi'=>'हमारे टेलीग्राम चैनल से जुड़ें','tr'=>'Telegram Kanalımıza Katılın'),
            'Gold Prices in' => array('de'=>'Goldpreise in','es'=>'Precios del oro en','it'=>'Prezzi dell’oro in','pt'=>'Preços do ouro em','ru'=>'Цены на золото в','hi'=>'में सोने की कीमतें','tr'=>'Altın Fiyatları:'),
            'Gold Bars and Coins in' => array('de'=>'Goldbarren und Münzen in','es'=>'Lingotes y monedas de oro en','it'=>'Lingotti e monete d’oro in','pt'=>'Barras e moedas de ouro em','ru'=>'Золотые слитки и монеты в','hi'=>'में सोने की छड़ें और सिक्के','tr'=>'Altın Külçeleri ve Sikkeler:'),
            'Gold Coin Prices in' => array('de'=>'Goldmünzenpreise in','es'=>'Precios de las monedas de oro en','it'=>'Prezzi delle monete d’oro in','pt'=>'Preços das moedas de ouro em','ru'=>'Цены на золотые монеты в','hi'=>'में सोने के सिक्कों की कीमतें','tr'=>'Altın Sikke Fiyatları:'),
            'The chart data could not be loaded. Please try again.' => array('de'=>'Die Diagrammdaten konnten nicht geladen werden. Bitte versuchen Sie es erneut.','es'=>'No se pudieron cargar los datos del gráfico. Inténtalo de nuevo.','it'=>'Impossibile caricare i dati del grafico. Riprova.','pt'=>'Não foi possível carregar os dados do gráfico. Tente novamente.','ru'=>'Не удалось загрузить данные графика. Попробуйте ещё раз.','hi'=>'चार्ट डेटा लोड नहीं हो सका। कृपया फिर प्रयास करें।','tr'=>'Grafik verileri yüklenemedi. Lütfen tekrar deneyin.'),
            'Loading gold charts...' => array('de'=>'Golddiagramme werden geladen…','es'=>'Cargando gráficos del oro…','it'=>'Caricamento dei grafici dell’oro…','pt'=>'A carregar gráficos do ouro…','ru'=>'Загрузка графиков золота…','hi'=>'सोने के चार्ट लोड हो रहे हैं…','tr'=>'Altın grafikleri yükleniyor…'),
            'About AlTaqrer Gold' => array('de'=>'Über AlTaqrer Gold','es'=>'Acerca de AlTaqrer Gold','it'=>'Informazioni su AlTaqrer Gold','pt'=>'Sobre a AlTaqrer Gold','ru'=>'Об AlTaqrer Gold','hi'=>'AlTaqrer Gold के बारे में','tr'=>'AlTaqrer Gold Hakkında'),
            'All rights reserved' => array('de'=>'Alle Rechte vorbehalten','es'=>'Todos los derechos reservados','it'=>'Tutti i diritti riservati','pt'=>'Todos os direitos reservados','ru'=>'Все права защищены','hi'=>'सर्वाधिकार सुरक्षित','tr'=>'Tüm hakları saklıdır'),
            '24K Gold' => array('de'=>'24-karätiges Gold','es'=>'Oro de 24 quilates','it'=>'Oro a 24 carati','pt'=>'Ouro de 24 quilates','ru'=>'Золото 24 карата','hi'=>'24 कैरेट सोना','tr'=>'24 Ayar Altın'),
            '22K Gold' => array('de'=>'22-karätiges Gold','es'=>'Oro de 22 quilates','it'=>'Oro a 22 carati','pt'=>'Ouro de 22 quilates','ru'=>'Золото 22 карата','hi'=>'22 कैरेट सोना','tr'=>'22 Ayar Altın'),
            '21K Gold' => array('de'=>'21-karätiges Gold','es'=>'Oro de 21 quilates','it'=>'Oro a 21 carati','pt'=>'Ouro de 21 quilates','ru'=>'Золото 21 карата','hi'=>'21 कैरेट सोना','tr'=>'21 Ayar Altın'),
            '18K Gold' => array('de'=>'18-karätiges Gold','es'=>'Oro de 18 quilates','it'=>'Oro a 18 carati','pt'=>'Ouro de 18 quilates','ru'=>'Золото 18 карата','hi'=>'18 कैरेट सोना','tr'=>'18 Ayar Altın'),
            '14K Gold' => array('de'=>'14-karätiges Gold','es'=>'Oro de 14 quilates','it'=>'Oro a 14 carati','pt'=>'Ouro de 14 quilates','ru'=>'Золото 14 карата','hi'=>'14 कैरेट सोना','tr'=>'14 Ayar Altın'),
            'Global Gold Ounce' => array('de'=>'Weltweiter Goldpreis je Unze','es'=>'Precio mundial del oro por onza','it'=>'Prezzo mondiale dell’oro per oncia','pt'=>'Preço mundial do ouro por onça','ru'=>'Мировая цена золота за унцию','hi'=>'अंतरराष्ट्रीय सोने का भाव प्रति औंस','tr'=>'Küresel Ons Altın Fiyatı'),
            'Gold Ounce in Local Currency' => array('de'=>'Goldunze in Landeswährung','es'=>'Onza de oro en moneda local','it'=>'Oncia d’oro in valuta locale','pt'=>'Onça de ouro na moeda local','ru'=>'Унция золота в местной валюте','hi'=>'स्थानीय मुद्रा में सोने का भाव प्रति औंस','tr'=>'Yerel Para Biriminde Ons Altın Fiyatı'),
            'Gold Coin' => array('de'=>'Goldmünze','es'=>'Moneda de oro','it'=>'Moneta d’oro','pt'=>'Moeda de ouro','ru'=>'Золотая монета','hi'=>'सोने का सिक्का','tr'=>'Altın Sikke'),
            'Gold Sovereign / Coin' => array('de'=>'Goldmünze','es'=>'Moneda de oro','it'=>'Moneta d’oro','pt'=>'Moeda de ouro','ru'=>'Золотая монета','hi'=>'सोने का सिक्का','tr'=>'Altın Sikke'),
            'Exchange Rate Indicator:' => array('de'=>'Wechselkursanzeige:','es'=>'Indicador del tipo de cambio:','it'=>'Indicatore del tasso di cambio:','pt'=>'Indicador da taxa de câmbio:','ru'=>'Индикатор обменного курса:','hi'=>'विनिमय दर संकेतक:','tr'=>'Döviz Kuru Göstergesi:'),
            'Pure 24K Gold:' => array('de'=>'Reines 24-karätiges Gold:','es'=>'Oro puro de 24 quilates:','it'=>'Oro puro a 24 carati:','pt'=>'Ouro puro de 24 quilates:','ru'=>'Чистое золото 24 карата:','hi'=>'शुद्ध 24 कैरेट सोना:','tr'=>'Saf 24 Ayar Altın:'),
            'Premium 22K Gold:' => array('de'=>'Hochwertiges 22-karätiges Gold:','es'=>'Oro de 22 quilates:','it'=>'Oro a 22 carati:','pt'=>'Ouro de 22 quilates:','ru'=>'Золото 22 карата:','hi'=>'22 कैरेट सोना:','tr'=>'22 Ayar Altın:'),
            'Popular 21K Gold:' => array('de'=>'Beliebtes 21-karätiges Gold:','es'=>'Oro de 21 quilates:','it'=>'Oro a 21 carati:','pt'=>'Ouro de 21 quilates:','ru'=>'Золото 21 карата:','hi'=>'21 कैरेट सोना:','tr'=>'21 Ayar Altın:'),
            'Standard 18K Gold:' => array('de'=>'Standardmäßiges 18-karätiges Gold:','es'=>'Oro estándar de 18 quilates:','it'=>'Oro standard a 18 carati:','pt'=>'Ouro padrão de 18 quilates:','ru'=>'Стандартное золото 18 карата:','hi'=>'मानक 18 कैरेट सोना:','tr'=>'Standart 18 Ayar Altın:'),
            'Light 14K Gold:' => array('de'=>'14-karätiges Gold:','es'=>'Oro de 14 quilates:','it'=>'Oro a 14 carati:','pt'=>'Ouro de 14 quilates:','ru'=>'Золото 14 карата:','hi'=>'14 कैरेट सोना:','tr'=>'14 Ayar Altın:'),
            'International spot price, quoted in USD' => array('de'=>'Internationaler Kassapreis in USD','es'=>'Precio internacional al contado en USD','it'=>'Prezzo spot internazionale in USD','pt'=>'Preço à vista internacional em USD','ru'=>'Международная спотовая цена в долларах США','hi'=>'USD में अंतरराष्ट्रीय स्पॉट मूल्य','tr'=>'USD cinsinden uluslararası spot fiyat'),
            'Price in Local Currency:' => array('de'=>'Preis in Landeswährung:','es'=>'Precio en moneda local:','it'=>'Prezzo in valuta locale:','pt'=>'Preço na moeda local:','ru'=>'Цена в местной валюте:','hi'=>'स्थानीय मुद्रा में कीमत:','tr'=>'Yerel Para Biriminde Fiyat:'),
            'Equivalent in US Dollars:' => array('de'=>'Gegenwert in US-Dollar:','es'=>'Equivalente en dólares estadounidenses:','it'=>'Equivalente in dollari USA:','pt'=>'Equivalente em dólares americanos:','ru'=>'Эквивалент в долларах США:','hi'=>'अमेरिकी डॉलर में समतुल्य:','tr'=>'ABD Doları Karşılığı:'),
            'US Dollar:' => array('de'=>'US-Dollar:','es'=>'Dólar estadounidense:','it'=>'Dollaro USA:','pt'=>'Dólar americano:','ru'=>'Доллар США:','hi'=>'अमेरिकी डॉलर:','tr'=>'ABD Doları:'),
            'British Pound:' => array('de'=>'Britisches Pfund:','es'=>'Libra esterlina:','it'=>'Sterlina britannica:','pt'=>'Libra esterlina:','ru'=>'Британский фунт:','hi'=>'ब्रिटिश पाउंड:','tr'=>'İngiliz Sterlini:'),
            'Saudi Riyal:' => array('de'=>'Saudi-Riyal:','es'=>'Riyal saudí:','it'=>'Riyal saudita:','pt'=>'Riyal saudita:','ru'=>'Саудовский риял:','hi'=>'सऊदी रियाल:','tr'=>'Suudi Riyali:'),
            'Euro:' => array('de'=>'Euro:','es'=>'Euro:','it'=>'Euro:','pt'=>'Euro:','ru'=>'Евро:','hi'=>'यूरो:','tr'=>'Euro:'),
            'Kuwaiti Dinar:' => array('de'=>'Kuwaitischer Dinar:','es'=>'Dinar kuwaití:','it'=>'Dinaro kuwaitiano:','pt'=>'Dinar kuwaitiano:','ru'=>'Кувейтский динар:','hi'=>'कुवैती दीनार:','tr'=>'Kuveyt Dinarı:'),
            'Japanese Yen:' => array('de'=>'Japanischer Yen:','es'=>'Yen japonés:','it'=>'Yen giapponese:','pt'=>'Iene japonês:','ru'=>'Японская иена:','hi'=>'जापानी येन:','tr'=>'Japon Yeni:'),
            'The same global ounce benchmark converted to the local currency' => array('de'=>'Derselbe globale Unzen-Referenzpreis, umgerechnet in die Landeswährung','es'=>'El mismo precio mundial de referencia por onza convertido a la moneda local','it'=>'Lo stesso prezzo globale di riferimento per oncia convertito nella valuta locale','pt'=>'O mesmo preço global de referência por onça convertido na moeda local','ru'=>'Та же мировая базовая цена за унцию, пересчитанная в местную валюту','hi'=>'वही वैश्विक औंस संदर्भ मूल्य स्थानीय मुद्रा में परिवर्तित','tr'=>'Aynı küresel ons referans fiyatının yerel para birimine çevrilmiş hâli')
        );
        $text = (string) $text;
        if (isset($labels[$text]) && isset($labels[$text][$language])) {
            return $labels[$text][$language];
        }
        return $text;
    }, 20, 2);
}


if ($goldnow_mlr_translate_output) {
    add_filter('language_attributes', function ($output) use ($goldnow_mlr_language) {
        $output = preg_replace('/\bdir=(["\'])rtl\1/i', 'dir="ltr"', $output);
        $output = preg_replace('/\blang=(["\'])[^"\']*\1/i', 'lang="' . esc_attr($goldnow_mlr_language) . '"', $output);
        return $output;
    }, 99);

    ob_start(function ($html) use ($goldnow_mlr_language) {
        if (!is_string($html) || $html === '' || !function_exists('goldnow_translate_text')) {
            return $html;
        }

        // Translate visible text nodes while leaving markup, scripts and styles intact.
        $parts = preg_split('/(<script\b[^>]*>.*?<\/script\s*>|<style\b[^>]*>.*?<\/style\s*>|<textarea\b[^>]*>.*?<\/textarea\s*>|<pre\b[^>]*>.*?<\/pre\s*>|<code\b[^>]*>.*?<\/code\s*>|<[^>]+>)/is', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
        if (is_array($parts)) {
            foreach ($parts as $index => $part) {
                if ($part === '' || $part[0] === '<') {
                    continue;
                }
                $decoded = html_entity_decode($part, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                $leading = '';
                $trailing = '';
                if (preg_match('/^\s+/u', $decoded, $m)) {
                    $leading = $m[0];
                }
                if (preg_match('/\s+$/u', $decoded, $m)) {
                    $trailing = $m[0];
                }
                $core = trim($decoded);
                if ($core === '') {
                    continue;
                }
                $translated = goldnow_translate_text($core, $goldnow_mlr_language);
                if (is_string($translated) && $translated !== $core) {
                    $parts[$index] = $leading . htmlspecialchars($translated, ENT_NOQUOTES | ENT_SUBSTITUTE, 'UTF-8') . $trailing;
                }
            }
            $html = implode('', $parts);
        }

        // Translate common accessible/UI attributes using the same shared dictionary.
        $html = preg_replace_callback('/\b(placeholder|title|aria-label|alt)=(["\'])(.*?)\2/is', function ($m) use ($goldnow_mlr_language) {
            $decoded = html_entity_decode($m[3], ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $translated = goldnow_translate_text($decoded, $goldnow_mlr_language);
            if (!is_string($translated) || $translated === $decoded) {
                return $m[0];
            }
            return $m[1] . '=' . $m[2] . esc_attr($translated) . $m[2];
        }, $html);

        // Convert explicit RTL inline styles in the shared Arabic source for LTR languages.
        $html = str_ireplace(array('direction: rtl', 'direction:rtl'), 'direction:ltr', $html);
        $html = str_ireplace(array('text-align: right', 'text-align:right'), 'text-align:left', $html);

        return $html;
    });
}
?>
<?php if ($goldnow_mlr_language === 'ar') : ?>
<?php get_header(); ?>

<main class="p-0 font-2">
  <div class="container home px-2">
    <?php
    // 1️⃣ جلب بيانات الدولة الحالية (من الرابط)
    $current_term = get_queried_object();
    $country_name = $current_term->name; // الاسم بالعربي
    // Use the existing multilingual country-name resolver for non-Arabic routes.
    if (
        isset($goldnow_mlr_language) &&
        $goldnow_mlr_language !== 'ar' &&
        function_exists('altaqrer_ml_country_name') &&
        $current_term instanceof WP_Term
    ) {
        $country_name = altaqrer_ml_country_name($current_term, $goldnow_mlr_language);
    }
    $english_name = get_term_meta($current_term->term_id, 'country_english_name', true);
    $country_code = get_term_meta($current_term->term_id, 'country_code', true);
    $country_flag = get_term_meta($current_term->term_id, 'country_flag', true);
    $country_currency = get_term_meta($current_term->term_id, 'country_currency', true);


	  

    // 2️⃣ إعداد مسميات العملة
    global $currency_names;
    $currency_label = isset($currency_names[$country_currency]) ? $currency_names[$country_currency] : $country_currency;
    $today = date('d/m/Y'); 

    // 3️⃣ منطق تحويل العملة (تم نقله من الصفحة الرئيسية)
    $local_currency_per_usd = 1.0;
    if ($country_currency !== 'USD') {
        if (function_exists('infi_get_latest_currency_rates')) {
            $currency_data_for_conversion = infi_get_latest_currency_rates($country_currency);

            if (!empty($currency_data_for_conversion) && isset($currency_data_for_conversion['rate_to_usd']) && $currency_data_for_conversion['rate_to_usd'] > 0) {
                $local_currency_per_usd = floatval($currency_data_for_conversion['rate_to_usd']);
            }
        }
    }
	  
	  
 $usd_rate_value = 1; // للاستخدام المستقبلي إذا لزم الأمر

       
?>


<?php goldnow_display_ad('below_cards'); ?>
	  
    <!-- ✅ أزرار التبويبات (مطابقة للصفحة الرئيسية) -->
    <div class="gold-tabs-nav text-center py-4">
      <button class="gold-tab-btn active" data-tab="now">الأسعار الآن</button>
      <button class="gold-tab-btn" data-tab="buy-sell">أسعار السبائك</button>
      <button class="gold-tab-btn" data-tab="indicator">مؤشر الذهب</button>
    </div>

    <!-- ✅ محتوى التبويبات -->
    <div class="gold-tabs-content">
      
      <!-- 1. الأسعار الآن -->
      <div id="tab-now" class="gold-tab-pane" style="display:block;">
                <!-- 📊 عنوان الجدول التلقائي المطور للسيو: يتغير حسب نوع العيار أو العملة المفتوحة -->
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align: right; direction: rtl;">
          <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
          <img alt="أسعار الذهب الآن في <?php echo esc_html($country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align: middle; margin-left: 5px;">
                  <?php
        // قراءة المتغير لتحديد صياغة العنوان الداخلي للجدول والمقال
        if ( $gold_view == '24k' ) { echo 'أسعار الذهب عيار 24 اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == '22k' ) { echo 'أسعار الذهب عيار 22 اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == '21k' ) { echo 'سعر جرام الذهب عيار 21 اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == '18k' ) { echo 'أسعار الذهب عيار 18 اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == '14k' ) { echo 'أسعار الذهب عيار 14 اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == 'ounce' ) { echo 'أسعار أونصة الذهب اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == 'coin' ) { echo 'سعر الجنيه الذهب اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == 'gold-bars' ) { echo 'أسعار سبائك الذهب اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == 'gold-index' ) { echo 'مؤشر الذهب المباشر اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == 'usd' ) { echo 'سعر الدولار والعملات اليوم في ' . esc_html($country_name); }
        else { echo 'أسعار الذهب في ' . esc_html($country_name) . ' اليوم '; }
        ?>

        </h2>
        
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align: right; direction: rtl;">
          <?php 
          if ($gold_view == 'usd') { echo 'مؤشر أسعار صرف العملات الأجنبية والعربية بالتحديث اللحظي'; }
          else { echo 'سعر الذهب في ' . esc_html($country_name) . ' بدون المصنعية تعاملات حية'; }
          ?>
        </h3>



    <!-- بطاقات أسعار الذهب -->
    <section id="gold-cards" class="mb-4">
        <?php echo do_shortcode('[infi_gold_cards currency="' . esc_attr($country_currency) . '" currency_label="' . esc_attr($currency_label) . '"]'); ?>
    </section>

    <!-- صناديق معلومات الذهب -->
    <section id="gold-info-boxes" class="mb-4">
        <?php echo do_shortcode('[infi_gold_info_boxes currency="' . esc_attr($country_currency) . '"]'); ?>
    </section>

		</div>
		
      <!-- 2. السبائك والجنيهات (تم التعديل ليكون مثل الرئيسية تماماً) -->
      <div id="tab-buy-sell" class="gold-tab-pane" style="display:none;" data-loaded="false">
        <h2 class="col-12 p-0 font-3 mb-0">
            <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
            <img alt="أسعار السبائك والجنيهات في <?php echo esc_html($country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px">
            أسعار السبائك والجنيهات في <?php echo esc_html($country_name); ?>
        </h2>
        <h3 class="col-12 p-0 mt-1" style="opacity: .7;font-size: 15px;">
          أحدث أسعار السبائك والجنيهات (بدون مصنعية)
        </h3>

        <?php
        if (function_exists('infi_get_latest_gold_prices')) {
            // جلب سعر عيار 24 الأساسي للحسابات
            $latest_24k = infi_get_latest_gold_prices('24k');
            $gram_24k_price_usd_raw = !empty($latest_24k) ? floatval($latest_24k[0]['price_usd']) : 0;
            $gram_24k_price_currency = $gram_24k_price_usd_raw * $local_currency_per_usd;
            $gram_24k_price_usd_converted = $gram_24k_price_usd_raw;
            ?>

            <!-- أ) جدول السبائك -->
            <section id="sabika-price" class="gold-section mt-4">
                <div class="section-header">
                    <h4>أسعار سبائك الذهب في <?php echo $country_name; ?></h4>
                    <span class="date-badge"><?php echo $today; ?></span>
                </div>
                <div class="table-responsive">
                    <table class="gold-table">
                        <thead>
                            <tr>
                                <th>الوزن / النوع</th>
                                <th>السعر (<?php echo $currency_label; ?>)</th>
                                <th>السعر (دولار)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $weights = [
                                ['weight' => 1, 'name' => 'سبيكة 1 جرام'],
                                ['weight' => 2.5, 'name' => 'سبيكة 2.5 جرام'],
                                ['weight' => 5, 'name' => 'سبيكة 5 جرام'],
                                ['weight' => 10, 'name' => 'سبيكة 10 جرام'],
                                ['weight' => 20, 'name' => 'سبيكة 20 جرام'],
                                ['weight' => 31.1, 'name' => 'أونصة (31.1 جرام)'],
                                ['weight' => 50, 'name' => 'سبيكة 50 جرام'],
                                ['weight' => 100, 'name' => 'سبيكة 100 جرام'],
                            ];
                            
                            foreach ($weights as $bar) {
                                // معالجة خاصة للأونصة
                                if ($bar['weight'] == 31.1) {
                                    $ounce_data = infi_get_latest_gold_prices('24k_oz');
                                    if (!empty($ounce_data)) {
                                        $bar_price_usd = floatval($ounce_data[0]['price_usd']);
                                        $bar_price_currency = $bar_price_usd * $local_currency_per_usd;
                                    } else {
                                        $bar_price_currency = $gram_24k_price_currency * $bar['weight'];
                                        $bar_price_usd = $gram_24k_price_usd_converted * $bar['weight'];
                                    }
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

            <!-- ب) جدول الجنيهات -->
            <section id="gold-pounds-price" class="gold-section mt-4">
                <div class="section-header">
                    <h4>أسعار جنيهات الذهب في <?php echo $country_name; ?></h4>
                </div>
                <div class="table-responsive">
                    <table class="gold-table">
                        <thead>
                            <tr>
                                <th>عيار الجنيه</th>
                                <th>السعر (<?php echo $currency_label; ?>)</th>
                                <th>السعر (دولار)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $gold_pounds_carats = ['21k', '22k', '24k']; 
                            foreach ($gold_pounds_carats as $carat) {
                                $pound_gram_data = infi_get_latest_gold_prices($carat);
                                if (!empty($pound_gram_data)) {
                                    $price_usd_per_gram = floatval($pound_gram_data[0]['price_usd']);
                                    $pound_weight = 8;
                                    
                                    $pound_price_currency = $price_usd_per_gram * $pound_weight * $local_currency_per_usd;
                                    $pound_price_usd = $price_usd_per_gram * $pound_weight;
                                    $carat_num = str_replace('k', '', $carat);
                                ?>
                                <tr>
                                    <td class="font-bold">جنيه ذهب 8 جرام (عيار <?php echo $carat_num; ?>)</td>
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

            <!-- ج) التنويه -->
            <div class="raw-gold-alert mt-4">
                <span class="alert-icon">⚠️</span>
                <strong>تنويه هام:</strong> الأسعار المعروضة أعلاه (السبائك والجنيهات) هي أسعار <u>الذهب الخام</u> فقط، ولا تشمل المصنعية أو الدمغة أو الضريبة.
            </div>

        <?php } else { ?>
            <p style="text-align:center; padding:20px;">عذراً، البيانات غير متوفرة حالياً.</p>
        <?php } ?>
      </div>
     
      <!-- 3. مؤشر الذهب -->
      <div id="tab-indicator" class="gold-tab-pane" style="display:none;">
        <div class="gold-frame-box mb-5">
          <?php echo do_shortcode('[infi_gold_chart carat="21k" currency="' . esc_attr($country_currency) . '" title="تغير السعر محلياً عيار"]'); ?>
        </div>
        <div id="ajax-indicator-frames"></div>
      </div>

    </div>
  </div>
</main>

<!-- ✅ جافاسكربت -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const buttons = document.querySelectorAll(".gold-tab-btn");

    buttons.forEach(btn => {
        btn.addEventListener("click", async (event) => {
            const tab = event.target.getAttribute("data-tab");

            // إخفاء كل التبويبات
            document.querySelectorAll(".gold-tab-pane").forEach(p => p.style.display = "none");
            document.querySelectorAll(".gold-tab-btn").forEach(b => b.classList.remove("active"));

            // إظهار التبويب المختار
            const pane = document.getElementById("tab-" + tab);
            pane.style.display = "block";
            event.target.classList.add("active");

            // التبويب مؤشر الذهب: تحميل iframes فقط عند أول مرة
            if (tab === 'indicator' && !pane.dataset.framesLoaded) {
                const formData = new FormData();
                formData.append("action", "load_indicator_frames");
                formData.append("country_currency", "<?php echo esc_js($country_currency); ?>");
                formData.append("country_name", "<?php echo esc_js($country_name); ?>");

                const response = await fetch("<?php echo admin_url('admin-ajax.php'); ?>", { method: "POST", body: formData });
                const html = await response.text();
                document.getElementById("ajax-indicator-frames").innerHTML = html;
                pane.dataset.framesLoaded = "true";
            }

            // بالنسبة لتبويب السبائك (buy-sell)، تم إزالة الـ AJAX لأنه أصبح الآن محملاً مسبقاً
            // ولكن نضع هذا السطر لتأكيد التحميل في حالة أردت استخدام الكود لاحقاً
            if (tab === 'buy-sell') {
                pane.dataset.loaded = "true";
            }
        });
    });
});
</script>

<?php goldnow_display_ad('below_countries'); ?>






<?php
// إعداد حسابات الأسعار الإضافية للموضوع بناءً على كود قالبك
$ounce_price_currency = $gram_24k_price_currency * 31.1; // سعر الأونصة بالعملة المحلية
$ounce_price_usd = $gram_24k_price_usd_converted * 31.1;   // سعر الأونصة بالدولار
$gold_pound_currency = $gram_24k_price_currency * 8 * 0.875; // سعر الجنيه الذهب عيار 21 (8 جرام)

// جلب وتأمين المتغير الجغرافي الفرعي لـ التقرير جولد لمعالجة شروط السيو والإخفاء والإظهار
$gold_view = get_query_var('gold_view');
?>

<?php 
// 2️⃣ شروط إخفاء وإظهار ذكية: يظهر البوكس العلوي الكبير المطور وجدول عملاته فقط فى صفحة الدولة الرئيسية ويختفي من الفرعيات
if (empty($gold_view) && $goldnow_mlr_language === 'ar') : 
?>
<!-- حاوية المقال الذكي محددة العرض (بوكس) بلون متباين وهادئ لمنع التداخل البصري -->
<div class="altaqrer-dynamic-article-box" style="background: #1f2126; padding: 20px; border: 1px solid #323742; border-right: 5px solid <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; color: #f0f1f5; font-size: 14.5px; line-height: 1.9; direction: rtl; text-align: right; border-radius: 8px; margin: 25px auto; max-width: 800px; width: 95%; box-sizing: border-box; box-shadow: 0 4px 15px rgba(0,0,0,0.25); font-family: sans-serif; clear: both;">
    
    <p style="margin-top: 0; margin-bottom: 15px;">
        📊 يرصد مؤشر <strong>التقرير جولد</strong> تحديثاً شاملاً لحركة <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong>أسعار الذهب في <?php echo esc_html($country_name); ?> لحظة بلحظة</strong></span> اليوم <img alt="علم <?php echo esc_html($country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align:middle; margin: 0 4px;"> بتاريخ <strong><?php echo esc_html($today); ?></strong> مباشرة من داخل أسواق الصاغة المحلية وبورصة الذهب العالمية المخصصة لنطاق (<?php echo esc_html($english_name); ?>).
    </p>

    <!-- تطوير محتوى السيو ليشمل فقرات مكثفة عن الفرعيات والأعيرة والسبائك لاستهداف كلمات بحثية قوية لجوجل -->
    <p style="margin-bottom: 15px;">
        💡 يتيح لك هذا التقرير الشامل تتبع تداولات الذهب الحية بكافة تصنيفاتها؛ حيث يمكنك فحص <strong>سعر الذهب عيار 21 اليوم</strong> الخيار الأكثر طلباً وتداولاً، ومتابعة ندرة <strong>عيار 22</strong>، بالإضافة إلى حسابات <strong>عيار 18</strong> الاقتصادي و<strong>عيار 14</strong>. كما يغطي المؤشر أسعار المعدن النفيس في الأسواق الفرعية والمشغولات وصافي التداول اليومي.
    </p>

    <p style="margin-bottom: 15px;">
        ✨ سجلت شاشات العرض الحية الآن الأسعار الحرة بدون مصنعية، حيث بلغ <strong>سعر جرام الذهب عيار 24</strong> النقي نحو <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($gram_24k_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> (ما يعادل <strong><?php echo number_format($gram_24k_price_usd_converted, 2); ?> دولار أمريكي</strong>). ويُعد هذا العيار هو المكون الأساسي لـ <strong>سبائك الذهب</strong> الاستثمارية بفضل نقائه المطلق.
    </p>

    <p style="margin-bottom: 15px;">
        📈 وعلى صعيد التعاملات التداولية لوحدات الذهب الكبرى، سجلت <strong>أسعار أونصة الذهب اليوم في <?php echo esc_html($country_name); ?></strong> قيمة <strong><?php echo number_format($ounce_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong> في السوق المحلي، وهو ما يقابل <strong><?php echo number_format($ounce_price_usd, 2); ?> دولار</strong> في التحديث المباشر للبورصة.
    </p>

    <p style="margin-bottom: 15px;">
        🪙 بالنسبة لراغبي الادخار والاستثمار الذكي، سجل <strong>سعر الجنيه الذهب اليوم</strong> (وزن 8 جرامات من عيار 21 الأكثر تداولاً) نحو <strong><?php echo number_format($gold_pound_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong>.
    </p>

    <p style="margin-bottom: 20px;">
        🛠️ إذا كنت تبحث عن حفظ قيمة مدخراتك، فإن رصد <strong>مؤشر الذهب المباشر</strong> ومتابعة <strong>أسعار سبائك الذهب</strong> بجميع أوزانها (من 1 جرام وحتى 1 كيلو) يمنحك الرؤية الدقيقة للتوقيت المثالي للشراء والبيع داخل محلات الصاغة، وتجنب تقلبات الأسعار المفاجئة.
    </p>

    <!-- صندوق مؤشر صرف العملة بلون داخلي متناسق ومنفصل -->
    <div style="background: #17191d; padding: 12px; border-radius: 6px; border: 1px dashed #3a3f4d; color: #d1d5db; font-size: 14px; margin-top: 15px;">
        💵 <strong>مؤشر صرف العملة:</strong> يرتبط تسعير المعدن الثمين محلياً بحركة الصرف الحية؛ حيث يسجل <strong>سعر الدولار اليوم في <?php echo esc_html($country_name); ?></strong> تحديثا عند <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> لكل دولار أمريكي واحد بحسب البيانات الحالية المربطة بالسوق المالي. ننصح بتحميل <strong>تطبيق أسعار الذهب</strong> الرسمي التابع لشبكة التقرير للحصول على التنبيهات فوراً.
    </div>
</div>
<?php endif; ?>






<?php
// دالة ذكية لحساب سعر صرف العملات المختلفة مقابل العملة المحلية للموقع
if (!function_exists('altaqrer_get_currency_live_rate')) {
    function altaqrer_get_currency_live_rate($target_currency, $local_currency_per_usd) {
        if (function_exists('infi_get_latest_currency_rates')) {
            $currency_data = infi_get_latest_currency_rates($target_currency);
            if (!empty($currency_data) && isset($currency_data['rate_to_usd']) && $currency_data['rate_to_usd'] > 0) {
                return $local_currency_per_usd / floatval($currency_data['rate_to_usd']);
            }
        }
        return 0;
    }
}

// حساب أسعار سلة العملات حياً ومباشرة من السيرفر
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

<?php 
// إخفاء جدول العملات العلوي من الصفحات الفرعية ونتركه فقط في صفحة الدولة الرئيسية
if (empty($gold_view)) : 
?>
    <!-- صندوق مؤشر صرف العملات المتناسق والمحاذي هندسياً لأبعاد البوكس العلوي -->
    <div style="background: #17191d; padding: 15px; border-radius: 6px; border: 1px solid #3a3f4d; color: #d1d5db; font-size: 14px; margin: 20px auto; max-width: 800px; width: 95%; box-sizing: border-box; clear: both;">
        <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 15px; text-align: right; direction: rtl;">
            💵 مؤشر صرف العملات اليوم مقابل <?php echo esc_html($currency_label); ?> في <?php echo esc_html($country_name); ?> <img alt="علم <?php echo esc_html($country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:
        </strong>
        
        <!-- تقسيم ديناميكي مرن ومترابط بالكامل للشاشات -->
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; text-align: right; direction: rtl;">
            
            <!-- العمود الأول -->
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'USD') : ?>
                    <div><img alt="علم الولايات المتحدة" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدولار اليوم:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                    <div><img alt="علم المملكة المتحدة" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الجنيه الإسترليني:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                    <div><img alt="علم السعودية" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الريال السعودي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>

                <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                    <div><img alt="علم البحرين" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدينار البحريني:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
            
            <!-- العمود الثاني موازي تماماً -->
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                    <div><img alt="علم الاتحاد الأوروبي" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر اليورو اليوم:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                    <div><img alt="علم الإمارات" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدرهم الإماراتي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                    <div><img alt="علم الكويت" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدينار الكويتي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                    <div><img alt="علم قطر" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الريال القطري:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
            
        </div>
        <p style="margin: 15px 0 0 0; font-size: 12px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 8px; text-align: right; direction: rtl;">* التحديث يتم تلقائياً بالتزامن مع شاشات صرف البورصة العالمية الحية. ننصح بتحميل <strong>تطبيق أسعار الذهب</strong> الرسمي.</p>
    </div>
<?php endif; ?>






<div class="altaqrer-silo-links" style="margin: 25px auto; padding: 15px; background: #17191d; border: 1px solid #3a3f4d; border-radius: 6px; text-align: center; max-width: 800px; width: 95%; box-sizing: border-box; clear: both; direction: <?php echo (isset($_SERVER['REQUEST_URI']) && preg_match('#^/en(?:/|$)#i', wp_parse_url(wp_unslash($_SERVER['REQUEST_URI']), PHP_URL_PATH))) ? 'ltr' : 'rtl'; ?>;">
    <?php
    $current_term_object = get_queried_object();

    $request_path = isset($_SERVER['REQUEST_URI'])
        ? wp_parse_url(wp_unslash($_SERVER['REQUEST_URI']), PHP_URL_PATH)
        : '/';

    $is_english = (bool) preg_match('#^/en(?:/|$)#i', $request_path);

    $base_country_url = '';

    if ($is_english) {
        // Build the English country URL while preserving the country slug.
        $country_slug = '';

        if (isset($current_term_object->slug)) {
            $country_slug = $current_term_object->slug;
        } elseif (isset($country_code)) {
            $country_slug = strtolower($country_code);
        }

        if ($country_slug !== '') {
            $base_country_url = home_url('/' . $goldnow_mlr_language . '/country/' . rawurlencode($country_slug) . '/');
        }
    } else {
        // Keep the original Arabic URL behavior.
        if (isset($current_term_object->term_id)) {
            $term_link = get_term_link($current_term_object->term_id);

            if (!is_wp_error($term_link)) {
                $base_country_url = trailingslashit($term_link);
            }
        }

        if (empty($base_country_url) && isset($country_code)) {
            $base_country_url = home_url('/country/' . strtolower($country_code) . '/');
        }
    }

    $active_bg = get_theme_mod('infi_default_color', '#ffb301');
    $active_color = '#000000';
    $default_bg = '#262930';
    $default_color = '#ffffff';

    $tabs = [
        ['key' => '',          'ar' => 'سعر الذهب',            'en' => 'Gold Price'],
        ['key' => '24k',       'ar' => 'عيار 24',              'en' => '24K'],
        ['key' => '22k',       'ar' => 'عيار 22',              'en' => '22K'],
        ['key' => '21k',       'ar' => 'عيار 21',              'en' => '21K'],
        ['key' => '18k',       'ar' => 'عيار 18',              'en' => '18K'],
        ['key' => '14k',       'ar' => 'عيار 14',              'en' => '14K'],
        ['key' => 'ounce',     'ar' => 'أونصة الذهب',          'en' => 'Gold Ounce'],
        ['key' => 'coin',      'ar' => 'الجنيه الذهب',         'en' => 'Gold Coin'],
        ['key' => 'gold-bars', 'ar' => 'أسعار السبائك',        'en' => 'Gold Bars'],
        ['key' => 'gold-index','ar' => 'مؤشر الذهب',           'en' => 'Gold Index'],
        ['key' => 'usd',       'ar' => 'سعر الدولار والعملات', 'en' => 'USD and Currency Rates'],
    ];

    $container_direction = $is_english ? 'ltr' : 'rtl';
    ?>

    <div style="display: flex; justify-content: center; gap: 8px; flex-wrap: wrap; row-gap: 10px; direction: <?php echo esc_attr($container_direction); ?>;">
        <?php foreach ($tabs as $tab) :
            $key = $tab['key'];
            $is_active = ($key === '') ? empty($gold_view) : ($gold_view === $key);

            $tab_url = ($key === '')
                ? $base_country_url
                : $base_country_url . rawurlencode($key) . '/';

            $tab_style = 'text-decoration: none; padding: 8px 14px; border-radius: 4px; font-size: 13px; border: 1px solid #3a3f4d; ';

            if ($is_active) {
                $tab_style .= "color: {$active_color}; background: {$active_bg}; font-weight: bold;";
            } else {
                $tab_style .= "color: {$default_color}; background: {$default_bg}; font-weight: 500;";
            }

            $label = $is_english ? $tab['en'] : $tab['ar'];
        ?>
            <a href="<?php echo esc_url($tab_url); ?>"
               style="<?php echo esc_attr($tab_style); ?>"
               <?php echo $is_active ? 'aria-current="page"' : ''; ?>>
                <?php echo esc_html($label); ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>




<?php
// 3️⃣ Preserve the original Arabic SEO box only for Arabic; other languages use the dedicated localized SEO renderer.
if (!empty($gold_view) && $goldnow_mlr_language === 'ar') {
    // 📊 حسابات الأعيرة والوحدات الاستثمارية الأساسية لتمريرها في الجداول والمقالات المطولة
    $ounce_price_currency = $gram_24k_price_currency * 31.1; 
    $ounce_price_usd      = $gram_24k_price_usd_converted * 31.1;   
    
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
    <div class="altaqrer-unified-hero-box" style="background: #17191d; padding: 25px; border-radius: 8px; border: 1px solid #3a3f4d; color: #d1d5db; font-size: 15px; margin: 15px auto 20px auto; max-width: 800px; width: 95%; box-sizing: border-box; clear: both; box-shadow: 0 4px 15px rgba(0,0,0,0.3); direction: rtl; text-align: right; line-height: 1.8;">
        <div class="altaqrer-dynamic-inner-content">
            
            <?php 
            // ==================== 1️⃣ التبويب الأول: مؤشر الذهب (gold-index) ====================
            if ($gold_view == 'gold-index') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">📈 مؤشر الذهب مباشر اليوم وأسعار الأعيرة الحية في <?php echo esc_html($country_name); ?> <img alt="علم <?php echo esc_html($country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: right; direction: rtl;">
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>عيار 24 النقي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>عيار 22 الممتاز:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_22k_usd, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;">عيار 21 المفضل:</strong> <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_21k_usd, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>عيار 18 الاقتصادي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_18k_usd, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>عيار 14 الخفيف:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_14k_usd, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930; grid-column: span 1;">🔸 <strong>الأونصة العالمية (31.1 جرام):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong></span><br><small style="color:#94a3b8;">السعر العالمي الفوري بالدولار الأمريكي</small></div>
                </div>

                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    يقدم <strong>مؤشر الذهب مباشر اليوم</strong> قراءة برمجية فورية لرصد حركة التعاملات الحية وتدفقات الصاغة داخل أسواق <strong><?php echo esc_html($country_name); ?></strong> بالتزامن مع البورصة الفورية. يتيح لك هذا التقرير فحص وتتبع أسعار أعيرة الذهب في الصاغة لحظة بلحظة لكافة التصنيفات التجارية بدون مصنعية، حيث يسجل عيار 24 النقي الآن نحو <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_24k_usd, 2); ?></strong> دولار)، بينما يبلغ عيار 21 الأكثر طلباً بقيمة <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_21k_usd, 2); ?></strong> دولار) وعيار 18 بسعر <strong><?php echo number_format($price_18k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_18k_usd, 2); ?></strong> دولار)، كما يبلغ السعر العالمي الفوري لأونصة الذهب <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong>، دون ربط قيمة الأونصة المعروضة بسعر العملة المحلية. يرتبط المؤشر الهندسي بحجم العرض والطلب وحجم التداولات الفورية الجارية لبورصة الذهب في نطاق تداول المعدن النفيس عالمياً، مما يمنح المستثمرين الرؤية الدقيقة لتحديد التوقيت المثالي لعمليات الشراء والبيع وتجنب تقلبات الأسعار المفاجئة.
                </p>

            <?php 
            // ==================== 2️⃣ التبويب الثاني: أسعار السبائك (gold-bars) ====================
            elseif ($gold_view == 'gold-bars') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 أسعار سبائك الذهب اليوم في <?php echo esc_html($country_name); ?> لجميع الأوزان (عيار 24 النقي):</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: right; direction: rtl;">
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 1 جرام:</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_24k_local * 1, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 1, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 2.5 جرام:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 2.5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 2.5, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 5 جرام:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 5, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 10 جرام:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 10, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 10, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 20 جرام:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 20, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 20, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>أونصة ذهب (31.1 جرام):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($ounce_price_usd, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 50 جرام:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 50, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 50, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 100 جرام:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 100, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 100, 2); ?> دولار</small></div>
                </div>

                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    يرصد مؤشر التقرير جولد بشكل هندسي دقيق <strong>أسعار سبائك الذهب اليوم</strong> المصنوعة كلياً من نقاء <strong>سبيكة ذهب عيار 24</strong> النقي بنسبة 999.9 بدون احتساب قيم تشغيلية إضافية. يبدأ تسعير الأوزان الصغيرة من سبيكة 1 جرام بقيمة <strong><?php echo number_format($price_24k_local * 1, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_24k_usd * 1, 2); ?></strong> دولار)، وصولاً إلى الأونصة القياسية بسعر <strong><?php echo number_format($ounce_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($ounce_price_usd, 2); ?></strong> دولار)، وسبيكة الـ 100 جرام بنحو <strong><?php echo number_format($price_24k_local * 100, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_24k_usd * 100, 2); ?></strong> دولار). يفضل المستثمرون ورجال الأعمال شراء سبائك الذهب للادخار وحفظ قيمة رأس المال والأموال السائلة داخل محلات الصاغة في <strong><?php echo esc_html($country_name); ?></strong> كونه الملاذ الآمن والأكثر كفاءة ضد التضخم الاقتصادي وتراجع القوة الشرائية للعملات، وتتميز هذه السبائك بانخفاض مصنعيتها مقارنة بالمشغولات، مع ميزة استرداد جزء من الكاش (الكاش باك) عند إعادة بيعها.
                </p>

            <?php 
            // ==================== 3️⃣ التبويب الثالث: الجنيه الذهب (coin) ====================
            elseif ($gold_view == 'coin') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 سعر الجنيه الذهب اليوم في <?php echo esc_html($country_name); ?> بجميع أعيرته القياسية (وزن 8 جرام):</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: right; direction: rtl;">
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>جنيه ذهب عيار 21:</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_21k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_21k_usd * 8, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>جنيه ذهب عيار 22:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_22k_usd * 8, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>جنيه ذهب عيار 24:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 8, 2); ?> دولار</small></div>
                </div>

                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    تحديث حي ومباشر يرصد <strong>سعر الجنيه الذهب اليوم</strong> في محلات الصاغة والأسواق الاستثمارية بجميع تصنيفاته التجارية. يغطي هذا الجدول فحص <strong>أنواع وأعيرة الجنيه الذهب</strong> بوزنها القياسي الثابت (8 جرامات)، وعلى رأسها <strong>جنيه ذهب عيار 21 وزن 8 جرام</strong> الخيار الاستثماري الطاغي والأكثر بحثاً وطلباً في <strong><?php echo esc_html($country_name); ?></strong> والذي يسجل اليوم <strong><?php echo number_format($price_21k_local * 8, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_21k_usd * 8, 2); ?></strong> دولار)، متقدماً على الجنيه عيار 22 البالغ <strong><?php echo number_format($price_22k_local * 8, 2); ?> <?php echo esc_html($currency_label); ?></strong> والجنيه عيار 24 بقيمة <strong><?php echo number_format($price_24k_local * 8, 2); ?> <?php echo esc_html($currency_label); ?></strong>. يعد الجنيه الذهب الملاذ الأفضل لراغبي الادخار وحفظ السيولة النقدية بأقل مصنعية ممكنة وتجنب تكاليف تشغيل المشغولات الذهبية التقليدية الخفيفة.
                </p>

            <?php 
            // ==================== 4️⃣ التبويب الرابع: سعر الدولار والعملات (usd) ====================
            elseif ($gold_view == 'usd') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">💵 مؤشر صرف العملات اليوم مقابل <?php echo esc_html($currency_label); ?> في <?php echo esc_html($country_name); ?> <img alt="علم <?php echo esc_html($country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; text-align: right; direction: rtl; margin-bottom: 20px;">
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'USD') : ?>
                            <div><img alt="علم الولايات المتحدة" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدولار اليوم:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if (isset($local_currency_per_gbp) && $local_currency_per_gbp > 0) : ?>
                            <div><img alt="علم المملكة المتحدة" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الجنيه الإسترليني:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span></div>
                        <?php endif; ?>
                        <?php if (isset($local_currency_per_sar) && $local_currency_per_sar > 0) : ?>
                            <div><img alt="علم السعودية" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الريال السعودي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span></div>
                        <?php endif; ?>
                        <?php if (isset($local_currency_per_bhd) && $local_currency_per_bhd > 0) : ?>
                            <div><img alt="علم البحرين" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدينار البحريني:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span></div>
                        <?php endif; ?>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if (isset($local_currency_per_euro) && $local_currency_per_euro > 0) : ?>
                            <div><img alt="علم الاتحاد الأوروبي" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر اليورو اليوم:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span></div>
                        <?php endif; ?>
                        <?php if (isset($local_currency_per_aed) && $local_currency_per_aed > 0) : ?>
                            <div><img alt="علم الإمارات" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدرهم الإماراتي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span></div>
                        <?php endif; ?>
                        <?php if (isset($local_currency_per_kwd) && $local_currency_per_kwd > 0) : ?>
                            <div><img alt="علم الكويت" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدينار الكويتي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span></div>
                        <?php endif; ?>
                        <?php if (isset($local_currency_per_qar) && $local_currency_per_qar > 0) : ?>
                            <div><img alt="علم قطر" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الريال القطري:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span></div>
                        <?php endif; ?>
                    </div>
                </div>

                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    يرصد <strong>مؤشد صرف العملات اليوم</strong> الأداء الحي لحركة المال الأجنبي والتداولات المصرفية والبنكية. يتم تحديث <strong>سعر الدولار اليوم في الصاغة</strong> والأسواق المالية الفورية في <strong><?php echo esc_html($country_name); ?></strong> حيث تسجل العملة الأمريكية الآن قيمة <strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong> بالتزامن مع شاشات القطاع المصرفي المركزي لضمان تقديم دقيق لـ <strong>أسعار العملات مقابل العملة المحلية</strong> لحظة بلحظة. وبما أن تسعير المعدن النفيس محلياً يرتبط كلياً بحركة أسعار الصرف الحية أمام النقد الأجنبي، فإن رصد هذا المؤشر يمنحك الرؤية الشاملة لحساب السعر الصافي للذهب وتوقع اتجاهات التداولات القادمة بوضوح.
                </p>

            <?php 
            // ==================== 5️⃣ التبويب الخامس: عيار 24 (24k) ====================
            elseif ($gold_view == '24k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px; text-align: right; direction: rtl;">📊 تقرير التحديث اللحظي لـ جرام الذهب عيار 24 في <?php echo esc_html($country_name); ?>:</strong>
                
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; text-align: right; direction: rtl; font-size: 15px;">
                    <li>🔹 <strong>السعر بالعملة المحلية:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ما يعادل بالدولار الأمريكي:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_24k_usd, 2); ?></strong></span> دولار أمريكي</li>
                </ul>

                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    يقدم مؤشر التقرير جولد رصداً حياً لحركة التداول، حيث استقر <strong>سعر جرام الذهب عيار 24 اليوم</strong> النقي بأسواق <strong><?php echo esc_html($country_name); ?></strong> عند قيمة <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> في الصاغة الحية، وهو ما يعادل عالمياً <strong><?php echo number_format($price_24k_usd, 2); ?></strong> دولار أمريكي. يتميز هذا العيار الاستثماري بالنقاء المطلق والكامل بنسبة 99.9%، وهو المكون والركيزة الأساسية لصناعة وبيع سبائك الذهب بجميع أوزانها لحفظ الثروات ومدخرات الأفراد؛ ليمثل الأمان المالي بعيداً عن تقلبات السوق والتضخم النظري للعملة المحلية.
                </p>

            <?php 
            // ==================== 6️⃣ التبويب السادس: عيار 22 (22k) ====================
            elseif ($gold_view == '22k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px; text-align: right; direction: rtl;">📊 تقرير التحديث اللحظي لـ جرام الذهب عيار 22 في <?php echo esc_html($country_name); ?>:</strong>
                
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; text-align: right; direction: rtl; font-size: 15px;">
                    <li>🔹 <strong>السعر بالعملة المحلية:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ما يعادل بالدولار الأمريكي:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_22k_usd, 2); ?></strong></span> دولار أمريكي</li>
                </ul>

                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    سجلت شاشات العرض المباشرة تحديثاً جديداً لحركة أسواق الصاغة لـ <strong>سعر جرام الذهب عيار 22 اليوم</strong> النقي في <strong><?php echo esc_html($country_name); ?></strong> ليبلغ قيمته الحالية البالغة <strong><?php echo number_format($price_22k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_22k_usd, 2); ?></strong> دولار أمريكي). ويعتبر عيار 22 من التصنيفات الممتازة والفريدة التي تجمع بشكل متناسق وهندسي بين النقاوة العالية والصلابة النسبية المطلوبة لتصنيع وتشكيل أفخم قطع الحلي والمشغولات الفنية الفاخرة داخل محلات الصاغة الفرعية، ونحن نغطي مؤشره الفوري الحر بدون مصنعيات ودمغات مضافة بالتزامن مع البورصة.
                </p>

            <?php 
            // ==================== 7️⃣ التبويب السابع: عيار 21 (21k) ====================
            elseif ($gold_view == '21k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px; text-align: right; direction: rtl;">📊 تقرير التحديث اللحظي لـ جرام الذهب عيار 21 في <?php echo esc_html($country_name); ?>:</strong>
                
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; text-align: right; direction: rtl; font-size: 15px;">
                    <li>🔹 <strong>السعر بالعملة المحلية:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ما يعادل بالدولار الأمريكي:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_21k_usd, 2); ?></strong></span> دولار أمريكي</li>
                </ul>

                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    يرصد المؤشر الفوري لشبكة التقرير جولد رغبة المستهلكين الأولى، حيث استقر <strong>سعر جرام الذهب عيار 21 اليوم</strong> في أسواق <strong><?php echo esc_html($country_name); ?></strong> محققاً تداولات نشطة بالصاغة عند مستوى <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>، بما يوازي قيمته الدولية البالغة <strong><?php echo number_format($price_21k_usd, 2); ?></strong> دولار أمريكي. ويُعد عيار 21 الخيار الأكثر بحثاً وطلباً بالأسواق ويمثل النسبة الأكبر من حجم التداولات والمشغولات المحلية والجنيهات الذهب بوزن 8 جرام، وذلك بفضل بريقه الكلاسيكي الجذاب، ونحن نضمن لك المتابعة الحية لحركة هذا العيار بدون احتساب المصنعية لتحديد الوقت الأنسب لتداولاتك.
                </p>

            <?php 
            // ==================== 8️⃣ التبويب الثامن: عيار 18 (18k) ====================
            elseif ($gold_view == '18k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px; text-align: right; direction: rtl;">📊 تقرير التحديث اللحظي لـ جرام الذهب عيار 18 في <?php echo esc_html($country_name); ?>:</strong>
                
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; text-align: right; direction: rtl; font-size: 15px;">
                    <li>🔹 <strong>السعر بالعملة المحلية:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ما يعادل بالدولار الأمريكي:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_18k_usd, 2); ?></strong></span> دولار أمريكي</li>
                </ul>

                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    شهدت أسواق التداول الفورية تحديثاً جديداً في حركة <strong>سعر جرام الذهب عيار 18 اليوم</strong> في <strong><?php echo esc_html($country_name); ?></strong>، حيث يسجل الجرام الآن سعر <strong><?php echo number_format($price_18k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> (أي ما يعادل <strong><?php echo number_format($price_18k_usd, 2); ?></strong> دولار أمريكي)، مشكلاً رواجاً واسعاً بفضل تشكيلاته الهندسي الفاخرة وخفته المناسبة لصناعة أحدث أطقم الحلي العصرية. ويُعد عيار 18 المفضل والأول للهدايا والادخار متوسط الميزانية لراغبي اقتناء الذهب الاقتصادي بأقل كلفة تشغيلية ممكنة، ونحن نوفر لك التحديث الفوري المربوط بالبورصة العالمية على مدار الساعة.
                </p>

            <?php 
            // ==================== 9️⃣ التبويب التاسع: عيار 14 (14k) ====================
            elseif ($gold_view == '14k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px; text-align: right; direction: rtl;">📊 تقرير التحديث اللحظي لـ جرام الذهب عيار 14 في <?php echo esc_html($country_name); ?>:</strong>
                
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; text-align: right; direction: rtl; font-size: 15px;">
                    <li>🔹 <strong>السعر بالعملة المحلية:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ما يعادل بالدولار الأمريكي:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_14k_usd, 2); ?></strong></span> دولار أمريكي</li>
                </ul>

                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    بالتزامن مع شاشات العرض الفورية الجارية بالبورصة، سجل <strong>سعر جرام الذهب عيار 14 اليوم</strong> في أسواق <strong><?php echo esc_html($country_name); ?></strong> تحديثاً مستقراً عند مستوى <strong><?php echo number_format($price_14k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>، وهو ما يعادل <strong><?php echo number_format($price_14k_usd, 2); ?></strong> دولار أمريكي. ويُعد عيار 14 خياراً اقتصادياً وعملياً وممتازاً داخل أسواق الصاغة لراغبي اقتناء القطع الذهبية والمشغولات الخفيفة بأقل تكلفة ممكنة للجرام الواحد، بفضل صلابته العالية التي تتحمل الاستخدام اليومي المستمر وتدني سعره الصافي الحر بالمقارنة مع الأعيرة الكبرى.
                </p>

            <?php 
            // ==================== 🔟 التبويب العاشر: أونصة الذهب (ounce) ====================
            elseif ($gold_view == 'ounce') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px; text-align: right; direction: rtl;">📊 تقرير التحديث اللحظي لـ أونصة الذهب العالمية في <?php echo esc_html($country_name); ?>:</strong>
                
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; text-align: right; direction: rtl; font-size: 15px;">
                    <li>🔹 <strong>السعر بالعملة المحلية:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ما يعادل بالدولار الأمريكي:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($ounce_price_usd, 2); ?></strong></span> دولار أمريكي</li>
                </ul>

                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    وفقاً لشاشات التداول المباشرة لبورصة الذهب العالمية الفورية، بلغت <strong>أسعار أونصة الذهب اليوم</strong> في نطاق أسواق <strong><?php echo esc_html($country_name); ?></strong> قيمتها الحالية المستقرة عند <strong><?php echo number_format($ounce_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong>، لتعادل بالدولار <strong><?php echo number_format($ounce_price_usd, 2); ?></strong> دولار. وترتبط الأونصة (وزن 31.1 جرام من عيار 24 الصافي) ارتباطاً وثيقاً ومباشراً بحركة المؤشرات الكلية للاقتصاد العالمي والتغير السعري للدولار، وتعتبر الأونصة هي المحرك الرئيسي والدليل المعتمد لتسعير كافة الأعيرة والسبائك بالأسواق المحلية والفرعية.
                </p>
            <?php endif; ?>

        </div>
    </div>
    <?php
}
?>


<?php
if (function_exists('goldnow_render_seo_article_shortcode')) {
    echo '<style id="goldnow-mlr-seo-style">\n.goldnow-seo-article{box-sizing:border-box;max-width:1120px;width:calc(100% - 32px);margin:36px auto 30px;padding:clamp(20px,3vw,38px);background:#fff;color:#273244;border:1px solid rgba(20,30,45,.10);border-radius:18px;box-shadow:0 10px 28px rgba(0,0,0,.10);font:inherit;line-height:1.85;overflow-wrap:anywhere}\n.goldnow-seo-article *{box-sizing:border-box}\n.goldnow-seo-article header{margin:0 0 22px;padding:0 0 16px;border-bottom:1px solid #e7eaf0}\n.goldnow-seo-article h2{margin:0 0 8px;color:#202b3c;font-size:clamp(22px,2.5vw,30px);line-height:1.4;font-weight:800}\n.goldnow-seo-article h3{margin:22px 0 12px;color:#26364d;font-size:clamp(18px,2vw,22px);line-height:1.5;font-weight:750}\n.goldnow-seo-article p{margin:10px 0;color:#4b5565;font-size:16px;line-height:1.9}\n.goldnow-seo-article .goldnow-seo-date{margin:0;color:#788395}\n.goldnow-seo-article .goldnow-seo-snapshot{margin:20px 0;padding:16px 20px;background:#f7f8fa;border:1px solid #e8ebf0;border-radius:12px}\n.goldnow-seo-article .goldnow-seo-snapshot ul{margin:10px 0;padding-inline-start:22px}\n.goldnow-seo-article .goldnow-seo-faq{margin-top:24px;padding-top:8px;border-top:1px solid #e7eaf0}\n.goldnow-seo-article .goldnow-seo-faq details{margin:10px 0;padding:13px 16px;background:#f7f8fa;border:1px solid #e8ebf0;border-radius:10px}\n.goldnow-seo-article .goldnow-seo-faq summary{color:#26364d;font-weight:700;cursor:pointer}\n.goldnow-seo-article .goldnow-seo-faq details p{margin:10px 0 0}\n.goldnow-seo-article .goldnow-seo-related{margin-top:22px;padding:14px 16px;background:#fff9e9;border:1px solid #f0dfad;border-radius:10px}\n.goldnow-seo-article .goldnow-seo-related p{margin:0}\n.goldnow-seo-article .goldnow-seo-related a{color:#8a6100;text-decoration:underline;text-underline-offset:3px}\n.goldnow-seo-article .goldnow-seo-disclaimer{font-size:13px;color:#77808d}\n.goldnow-seo-article[dir="rtl"]{text-align:right}\n.goldnow-seo-article[dir="ltr"]{text-align:left}\n@media(max-width:640px){.goldnow-seo-article{width:calc(100% - 20px);margin:24px auto;padding:18px 16px;border-radius:14px}.goldnow-seo-article p{font-size:15px}}\n</style>';

    $goldnow_seo_prices = array(
        '24k' => isset($price_24k_local) ? $price_24k_local : null,
        '22k' => isset($price_22k_local) ? $price_22k_local : null,
        '21k' => isset($price_21k_local) ? $price_21k_local : null,
        '18k' => isset($price_18k_local) ? $price_18k_local : null,
        '14k' => isset($price_14k_local) ? $price_14k_local : null,
        'ounce_usd' => isset($ounce_price_usd) ? $ounce_price_usd : null,
        'coin' => isset($price_21k_local) ? ($price_21k_local * 8) : null,
        'usd_rate' => isset($local_currency_per_usd) ? $local_currency_per_usd : null
    );
    $goldnow_seo_section = !empty($gold_view) ? (string) $gold_view : 'overview';
    $goldnow_seo_base_path = ($goldnow_mlr_language === 'ar') ? '/country/' : '/' . $goldnow_mlr_language . '/country/';
    $goldnow_seo_base_url = home_url($goldnow_seo_base_path . rawurlencode((string) $country_code) . '/');
    echo goldnow_render_seo_article_shortcode($goldnow_mlr_language, $goldnow_seo_section, array(
        'country' => $country_name,
        'currency' => $country_currency,
        'date' => $today,
        'country_slug' => $country_code,
        'base_url' => $goldnow_seo_base_url,
        'prices' => $goldnow_seo_prices
    ));
}
?>

<?php get_footer(); elseif (in_array($goldnow_mlr_language, array('en','de','es','it','pt','ru','hi','tr'), true)) : ?>
<?php
/**
 * Standalone English header for the country gold-price template.
 * The Arabic theme header and navigation are not loaded here.
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
$en_header_country_url = home_url('/' . $goldnow_mlr_language . '/country/' . rawurlencode($en_header_country_slug) . '/');
$en_header_home_url = home_url('/' . $goldnow_mlr_language . '/');
$en_header_accent = get_theme_mod('infi_default_color', '#ffb301');
$en_header_logo_id = (int) get_theme_mod('custom_logo');
$en_header_is_app = (isset($_GET['view']) && sanitize_text_field(wp_unslash($_GET['view'])) === 'app');
?>
<!DOCTYPE html>
<html lang="<?php echo esc_attr($goldnow_mlr_language); ?>" dir="ltr">
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
html, body { direction:ltr; text-align:left; }
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
.en-seo-article { max-width:900px; width:95%; box-sizing:border-box; margin:28px auto; padding:24px; color:#e5e7eb; background:#1f2126; border:1px solid #343944; border-left:5px solid <?php echo esc_attr($en_header_accent); ?>; border-radius:9px; line-height:1.85; font-size:15px; }
.en-seo-article h2,.en-seo-article h3 { color:#fff; line-height:1.35; }
.en-seo-article h2 { font-size:23px; margin:0 0 14px; }
.en-seo-article h3 { font-size:18px; margin:22px 0 8px; }
.en-seo-article p { margin:0 0 13px; }
.en-seo-article a { color:<?php echo esc_attr($en_header_accent); ?>; text-decoration:none; font-weight:700; }
.en-seo-article a:hover { text-decoration:underline; }
.en-seo-article details { border-top:1px solid #3a3f4d; padding:11px 0; }
.en-seo-article summary { cursor:pointer; color:#fff; font-weight:700; }
.en-seo-article details p { margin:8px 0 0; color:#cbd5e1; }
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
      <a href="<?php echo esc_url($en_header_country_url . 'usd/'); ?>">USD Rates</a>
      <div class="en-country-wrap">
        <button class="en-country-toggle" type="button" aria-expanded="false" aria-controls="en-country-menu">Countries ▾</button>
        <div class="en-country-menu" id="en-country-menu">
          <a href="<?php echo esc_url(home_url('/' . $goldnow_mlr_language . '/country/eg/')); ?>">Egypt</a>
          <a href="<?php echo esc_url(home_url('/' . $goldnow_mlr_language . '/country/sa/')); ?>">Saudi Arabia</a>
          <a href="<?php echo esc_url(home_url('/' . $goldnow_mlr_language . '/country/ae/')); ?>">United Arab Emirates</a>
          <a href="<?php echo esc_url(home_url('/' . $goldnow_mlr_language . '/country/kw/')); ?>">Kuwait</a>
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
    $country_name = $display_country_name; // AJAX/legacy variables must also receive English.

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
      <button class="gold-tab-btn active" type="button" data-tab="now">Live Prices</button>
      <button class="gold-tab-btn" type="button" data-tab="buy-sell">Gold Bars</button>
      <button class="gold-tab-btn" type="button" data-tab="indicator">Gold Price Chart</button>
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
        if ( $gold_view == '24k' ) { echo '24K Gold Price Today in ' . esc_html($display_country_name); }
        elseif ( $gold_view == '22k' ) { echo '22K Gold Price Today in ' . esc_html($display_country_name); }
        elseif ( $gold_view == '21k' ) { echo '21K Gold Price per Gram Today in ' . esc_html($display_country_name); }
        elseif ( $gold_view == '18k' ) { echo '18K Gold Price Today in ' . esc_html($display_country_name); }
        elseif ( $gold_view == '14k' ) { echo '14K Gold Price Today in ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'ounce' ) { echo 'Global Gold Ounce Price Today (USD)'; }
        elseif ( $gold_view == 'coin' ) { echo 'Gold Coin Price Today in ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'gold-bars' ) { echo 'Gold Bullion Bar Prices Today in ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'gold-index' ) { echo 'Live Gold Market Index Today in ' . esc_html($display_country_name); }
        elseif ( $gold_view == 'usd' ) { echo 'US Dollar and Currency Exchange Rates Today in ' . esc_html($display_country_name); }
        else { echo 'Gold Prices in ' . esc_html($display_country_name) . ' Today '; }
        ?>
        </h2>
        
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align: left; direction: ltr;">
          <?php 
          if ($gold_view == 'usd') { echo 'Live foreign exchange rates for major international and regional currencies'; }
          elseif ($gold_view == 'ounce') { echo 'International spot benchmark for one troy ounce of 24K gold, quoted in USD'; }
          else { echo 'Gold Price in ' . esc_html($display_country_name) . ' — live market price, excluding making charges'; }
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
            <img alt="Gold Bars and Coins in <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; margin-right: 5px;">
            Gold Bars and Coins in <?php echo esc_html($display_country_name); ?>
        </h2>
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align:left !important; direction:ltr !important;">
          Latest gold bar and coin prices (excluding making charges)
        </h3>

        <?php if (function_exists('infi_get_latest_gold_prices')) { ?>
            <!-- A) Gold Bars Price Table -->
            <section id="sabika-price" class="gold-section mt-4">
                <div class="section-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <h4>Gold Bullion Bar Prices in <?php echo esc_html($display_country_name); ?></h4>
                    <span class="date-badge" style="background: #262930; padding: 4px 10px; border-radius: 4px; font-size: 13px;"><?php echo esc_html($today); ?></span>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>Weight / Type</th>
                                <th>Price (<?php echo $currency_label; ?>)</th>
                                <th>Price (USD)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $weights = [
                                ['weight' => 1, 'name' => 'Gold Bar — 1 Gram'],
                                ['weight' => 2.5, 'name' => 'Gold Bar — 2.5 Grams'],
                                ['weight' => 5, 'name' => 'Gold Bar — 5 Grams'],
                                ['weight' => 10, 'name' => 'Gold Bar — 10 Grams'],
                                ['weight' => 20, 'name' => 'Gold Bar — 20 Grams'],
                                ['weight' => 31.1, 'name' => 'Troy Ounce (31.1 g)'],
                                ['weight' => 50, 'name' => 'Gold Bar — 50 Grams'],
                                ['weight' => 100, 'name' => 'Gold Bar — 100 Grams'],
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
                    <h4>Gold Coin Prices in <?php echo esc_html($display_country_name); ?></h4>
                </div>
                <div class="table-responsive">
                    <table class="gold-table" style="width: 100%; text-align: left; direction: ltr;">
                        <thead>
                            <tr>
                                <th>Coin Purity</th>
                                <th>Price (<?php echo $currency_label; ?>)</th>
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
                                    <td class="font-bold">8g Gold Coin (<?php echo $carat_num; ?>K)</td>
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
                <strong>Important:</strong> The prices shown above for bars and coins represent <u>gold value only</u>; they exclude making charges, hallmarking fees, and taxes.
            </div>

        <?php } else { ?>
            <p style="text-align:center; padding:20px;">Sorry, the market data is currently unavailable.</p>
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
          echo altaqrer_gold_en_translate_shortcode_html(do_shortcode($en_chart_shortcode), $shortcode_translation_map);
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
            💵 Live exchange rates against <?php echo esc_html($currency_label); ?> in <?php echo esc_html($display_country_name); ?> <img alt="Flag of <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:
        </strong>
        
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; text-align: left; direction: ltr;">
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'USD') : ?>
                    <div><img alt="Flag of United States" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong>US Dollar:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                    <div><img alt="Flag of United Kingdom" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong>British Pound:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                    <div><img alt="Flag of Saudi Arabia" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Saudi Riyal:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>

                <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                    <div><img alt="Flag of Bahrain" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Bahraini Dinar:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                    <div><img alt="Flag of Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Omani Rial:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                    <div><img alt="Flag of European Union" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Euro:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                    <div><img alt="Flag of United Arab Emirates" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong>UAE Dirham:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                    <div><img alt="Flag of Kuwait" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Kuwaiti Dinar:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                    <div><img alt="Flag of Qatar" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Qatari Riyal:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                    <div><img alt="Flag of Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Japanese Yen:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
        </div>
        <p style="margin: 15px 0 0 0; font-size: 12px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 8px; text-align: left; direction: ltr;">* Updates are performed programmatically via official live market indices. We advise installing the official <strong>gold prices app</strong>.</p>
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
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 1 Gram:</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_24k_local * 1, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 1, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 2.5 Grams:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 2.5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 2.5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 5 Grams:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 5, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 10 Grams:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 10, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 10, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 20 Grams:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 20, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 20, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Troy Ounce (31.1 Grams):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($ounce_price_usd, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 50 Grams:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 50, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 50, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>Gold Bar — 100 Grams:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 100, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">Value: <?php echo number_format($price_24k_usd * 100, 2); ?> USD</small></div>
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
                            <div><img alt="Flag of US" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-right: 5px;"> <strong>US Dollar:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                            <div><img alt="Flag of UK" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-right: 5px;"> <strong>British Pound:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                            <div><img alt="Flag of SA" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Saudi Riyal:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                            <div><img alt="Flag of BH" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Bahraini Dinar:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'OMR' && $local_currency_per_omr > 0) : ?>
                            <div><img alt="Flag of Oman" src="https://flagcdn.com/16x12/om.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Omani Rial:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_omr, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                            <div><img alt="Flag of EU" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Euro:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                            <div><img alt="Flag of AE" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-right: 5px;"> <strong>UAE Dirham:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                            <div><img alt="Flag of KW" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Kuwaiti Dinar:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                            <div><img alt="Flag of QA" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Qatari Riyal:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if ($country_currency !== 'JPY' && $local_currency_per_jpy > 0) : ?>
                            <div><img alt="Flag of Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Japanese Yen:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
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

<?php
if (function_exists('goldnow_render_seo_article_shortcode')) {
    echo '<style id="goldnow-mlr-seo-style">\n.goldnow-seo-article{box-sizing:border-box;max-width:1120px;width:calc(100% - 32px);margin:36px auto 30px;padding:clamp(20px,3vw,38px);background:#fff;color:#273244;border:1px solid rgba(20,30,45,.10);border-radius:18px;box-shadow:0 10px 28px rgba(0,0,0,.10);font:inherit;line-height:1.85;overflow-wrap:anywhere}\n.goldnow-seo-article *{box-sizing:border-box}\n.goldnow-seo-article header{margin:0 0 22px;padding:0 0 16px;border-bottom:1px solid #e7eaf0}\n.goldnow-seo-article h2{margin:0 0 8px;color:#202b3c;font-size:clamp(22px,2.5vw,30px);line-height:1.4;font-weight:800}\n.goldnow-seo-article h3{margin:22px 0 12px;color:#26364d;font-size:clamp(18px,2vw,22px);line-height:1.5;font-weight:750}\n.goldnow-seo-article p{margin:10px 0;color:#4b5565;font-size:16px;line-height:1.9}\n.goldnow-seo-article .goldnow-seo-date{margin:0;color:#788395}\n.goldnow-seo-article .goldnow-seo-snapshot{margin:20px 0;padding:16px 20px;background:#f7f8fa;border:1px solid #e8ebf0;border-radius:12px}\n.goldnow-seo-article .goldnow-seo-snapshot ul{margin:10px 0;padding-inline-start:22px}\n.goldnow-seo-article .goldnow-seo-faq{margin-top:24px;padding-top:8px;border-top:1px solid #e7eaf0}\n.goldnow-seo-article .goldnow-seo-faq details{margin:10px 0;padding:13px 16px;background:#f7f8fa;border:1px solid #e8ebf0;border-radius:10px}\n.goldnow-seo-article .goldnow-seo-faq summary{color:#26364d;font-weight:700;cursor:pointer}\n.goldnow-seo-article .goldnow-seo-faq details p{margin:10px 0 0}\n.goldnow-seo-article .goldnow-seo-related{margin-top:22px;padding:14px 16px;background:#fff9e9;border:1px solid #f0dfad;border-radius:10px}\n.goldnow-seo-article .goldnow-seo-related p{margin:0}\n.goldnow-seo-article .goldnow-seo-related a{color:#8a6100;text-decoration:underline;text-underline-offset:3px}\n.goldnow-seo-article .goldnow-seo-disclaimer{font-size:13px;color:#77808d}\n.goldnow-seo-article[dir="rtl"]{text-align:right}\n.goldnow-seo-article[dir="ltr"]{text-align:left}\n@media(max-width:640px){.goldnow-seo-article{width:calc(100% - 20px);margin:24px auto;padding:18px 16px;border-radius:14px}.goldnow-seo-article p{font-size:15px}}\n</style>';

    $goldnow_seo_prices = array(
        '24k' => isset($price_24k_local) ? $price_24k_local : null,
        '22k' => isset($price_22k_local) ? $price_22k_local : null,
        '21k' => isset($price_21k_local) ? $price_21k_local : null,
        '18k' => isset($price_18k_local) ? $price_18k_local : null,
        '14k' => isset($price_14k_local) ? $price_14k_local : null,
        'ounce_usd' => isset($ounce_price_usd) ? $ounce_price_usd : null,
        'coin' => isset($price_21k_local) ? ($price_21k_local * 8) : null,
        'usd_rate' => isset($local_currency_per_usd) ? $local_currency_per_usd : null
    );
    $goldnow_seo_section = !empty($gold_view) ? (string) $gold_view : 'overview';
    $goldnow_seo_base_url = home_url('/' . $goldnow_mlr_language . '/country/' . rawurlencode((string) $en_header_country_slug) . '/');
    echo goldnow_render_seo_article_shortcode($goldnow_mlr_language, $goldnow_seo_section, array(
        'country' => $display_country_name,
        'currency' => $country_currency,
        'date' => $today,
        'country_slug' => $en_header_country_slug,
        'base_url' => $goldnow_seo_base_url,
        'prices' => $goldnow_seo_prices
    ));
}
?>

<?php if (!$en_header_is_app) : ?>
<footer class="en-site-footer">
  <div class="en-site-footer-inner">
    <section>
      <h3>About AlTaqrer Gold</h3>
      <p><strong>AlTaqrer Gold</strong> helps readers follow gold prices across regional and international markets. Explore live reference prices for 24K, 22K, 21K, 18K and 14K gold, compare bullion bar and 8-gram coin values, and track the global gold ounce in USD. Prices are provided for information and comparison; final retail prices may include workmanship, premiums, and taxes.</p>
    </section>
    <section>
      <h3>Gold Price Sections</h3>
      <ul>
        <li><a href="<?php echo esc_url($en_header_country_url); ?>">Gold Prices in <?php echo esc_html(isset($display_country_name) ? $display_country_name : ''); ?></a></li>
        <li><a href="<?php echo esc_url($en_header_country_url . 'gold-bars/'); ?>">Gold Bars and Coins</a></li>
        <li><a href="<?php echo esc_url($en_header_country_url . 'gold-index/'); ?>">Live Gold Index</a></li>
        <li><a href="<?php echo esc_url($en_header_country_url . 'usd/'); ?>">USD and Currency Rates</a></li>
      </ul>
    </section>
    <section>
      <h3>Regional Gold Prices</h3>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/' . $goldnow_mlr_language . '/country/eg/')); ?>">Gold Prices in Egypt</a></li>
        <li><a href="<?php echo esc_url(home_url('/' . $goldnow_mlr_language . '/country/sa/')); ?>">Gold Prices in Saudi Arabia</a></li>
        <li><a href="<?php echo esc_url(home_url('/' . $goldnow_mlr_language . '/country/ae/')); ?>">Gold Prices in the UAE</a></li>
        <li><a href="<?php echo esc_url(home_url('/' . $goldnow_mlr_language . '/country/kw/')); ?>">Gold Prices in Kuwait</a></li>
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
        $page_object = get_page_by_path($goldnow_mlr_language . '/' . $page_slug);
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
</body>
</html>

<?php elseif ($goldnow_mlr_language === 'fr') : ?>
<?php
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
 * Place the existing Customizer advertisement immediately below the English
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
 * English-only text adapter for shortcode HTML.
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
    // 1) Resolve the current country safely and use its English taxonomy metadata.
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
    $french_country_names = array(
        'eg'=>'Égypte','sa'=>'Arabie saoudite','ae'=>'Émirats arabes unis','kw'=>'Koweït','qa'=>'Qatar','bh'=>'Bahreïn','om'=>'Oman','jo'=>'Jordanie','iq'=>'Irak','ma'=>'Maroc','tn'=>'Tunisie','dz'=>'Algérie','ly'=>'Libye','sd'=>'Soudan','lb'=>'Liban','sy'=>'Syrie','ye'=>'Yémen','us'=>'États-Unis','gb'=>'Royaume-Uni','fr'=>'France','de'=>'Allemagne','it'=>'Italie','es'=>'Espagne','ca'=>'Canada','au'=>'Australie','tr'=>'Turquie','in'=>'Inde','pk'=>'Pakistan','cn'=>'Chine','jp'=>'Japon','ru'=>'Russie','za'=>'Afrique du Sud','ng'=>'Nigeria','ke'=>'Kenya'
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

    // Preserve the site's established 8g, 21K gold-coin calculation.
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
        <!-- 📊 SEO Heading: Fully programmatically structured in English layout -->
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align: left; direction: ltr;">
          <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
          <img alt="Prixs of gold live in <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align: middle; margin-right: 5px;">
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
		
      <!-- 2. Gold Bullion Bars and Coins Table Pane -->
      <div id="tab-buy-sell" class="gold-tab-pane" style="display:none; text-align: left; direction: ltr;">
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align:left !important; direction:ltr !important;">
            <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
            <img alt="Lingots et pièces d’or in <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; margin-right: 5px;">
            Lingots et pièces d’or in <?php echo esc_html($display_country_name); ?>
        </h2>
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align:left !important; direction:ltr !important;">
          Derniers prix des lingots et pièces d’or (hors frais de fabrication)
        </h3>

        <?php if (function_exists('infi_get_latest_gold_prices')) { ?>
            <!-- A) Lingots d’or Prix Table -->
            <section id="sabika-price" class="gold-section mt-4">
                <div class="section-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <h4>Prix des lingots d’or in <?php echo esc_html($display_country_name); ?></h4>
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
                    <h4>Prix des pièces d’or in <?php echo esc_html($display_country_name); ?></h4>
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
            <p style="text-align:center; padding:20px;">Sorry, the market data is currently unavailable.</p>
        <?php } ?>
      </div>

      <!-- 3. Graphique du cours de l’or: restored to match the Arabic template structure. -->
      <div id="tab-indicator" class="gold-tab-pane" style="display:none; direction:ltr; text-align:left;">
        <h2 class="col-12 p-0 font-3 mb-3" style="text-align:left; direction:ltr;">
          <span class="start-head cls120" style="background: <?php echo esc_attr(get_theme_mod('infi_default_color', '#ffb301')); ?>;"></span>
          Graphique du cours de l’or in <?php echo esc_html($display_country_name); ?>
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
            💵 Taux de change en direct par rapport à <?php echo esc_html($currency_label); ?> in <?php echo esc_html($display_country_name); ?> <img alt="Drapeau de <?php echo esc_html($display_country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:
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
                    <div><img alt="Drapeau de Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Yen japonais :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
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
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>Pièce d’or 21 carats (8g):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_21k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Valeur : <?php echo number_format($price_21k_usd * 8, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>22K Pièce d’or (8g):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Valeur : <?php echo number_format($price_22k_usd * 8, 2); ?> USD</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>24K Pièce d’or (8g):</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">Valeur : <?php echo number_format($price_24k_usd * 8, 2); ?> USD</small></div>
                </div>
                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    Suivez en direct le <strong>prix actuel de la pièce d’or</strong> en the investment markets of <strong><?php echo esc_html($display_country_name); ?></strong>. Sovereign pièce d’ors weighing exactly 8 grams are widely monitored as safe haven physical assets.
                </p>

            <?php elseif ($gold_view == 'usd') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">💵 Taux de change en direct par rapport à <?php echo esc_html($currency_label); ?> in <?php echo esc_html($display_country_name); ?>:</strong>
                
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
                            <div><img alt="Drapeau de Japan" src="https://flagcdn.com/16x12/jp.png" style="vertical-align:middle; margin-right: 5px;"> <strong>Yen japonais :</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_jpy, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
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

<?php
if (function_exists('goldnow_render_seo_article_shortcode')) {
    echo '<style id="goldnow-mlr-seo-style">\n.goldnow-seo-article{box-sizing:border-box;max-width:1120px;width:calc(100% - 32px);margin:36px auto 30px;padding:clamp(20px,3vw,38px);background:#fff;color:#273244;border:1px solid rgba(20,30,45,.10);border-radius:18px;box-shadow:0 10px 28px rgba(0,0,0,.10);font:inherit;line-height:1.85;overflow-wrap:anywhere}\n.goldnow-seo-article *{box-sizing:border-box}\n.goldnow-seo-article header{margin:0 0 22px;padding:0 0 16px;border-bottom:1px solid #e7eaf0}\n.goldnow-seo-article h2{margin:0 0 8px;color:#202b3c;font-size:clamp(22px,2.5vw,30px);line-height:1.4;font-weight:800}\n.goldnow-seo-article h3{margin:22px 0 12px;color:#26364d;font-size:clamp(18px,2vw,22px);line-height:1.5;font-weight:750}\n.goldnow-seo-article p{margin:10px 0;color:#4b5565;font-size:16px;line-height:1.9}\n.goldnow-seo-article .goldnow-seo-date{margin:0;color:#788395}\n.goldnow-seo-article .goldnow-seo-snapshot{margin:20px 0;padding:16px 20px;background:#f7f8fa;border:1px solid #e8ebf0;border-radius:12px}\n.goldnow-seo-article .goldnow-seo-snapshot ul{margin:10px 0;padding-inline-start:22px}\n.goldnow-seo-article .goldnow-seo-faq{margin-top:24px;padding-top:8px;border-top:1px solid #e7eaf0}\n.goldnow-seo-article .goldnow-seo-faq details{margin:10px 0;padding:13px 16px;background:#f7f8fa;border:1px solid #e8ebf0;border-radius:10px}\n.goldnow-seo-article .goldnow-seo-faq summary{color:#26364d;font-weight:700;cursor:pointer}\n.goldnow-seo-article .goldnow-seo-faq details p{margin:10px 0 0}\n.goldnow-seo-article .goldnow-seo-related{margin-top:22px;padding:14px 16px;background:#fff9e9;border:1px solid #f0dfad;border-radius:10px}\n.goldnow-seo-article .goldnow-seo-related p{margin:0}\n.goldnow-seo-article .goldnow-seo-related a{color:#8a6100;text-decoration:underline;text-underline-offset:3px}\n.goldnow-seo-article .goldnow-seo-disclaimer{font-size:13px;color:#77808d}\n.goldnow-seo-article[dir="rtl"]{text-align:right}\n.goldnow-seo-article[dir="ltr"]{text-align:left}\n@media(max-width:640px){.goldnow-seo-article{width:calc(100% - 20px);margin:24px auto;padding:18px 16px;border-radius:14px}.goldnow-seo-article p{font-size:15px}}\n</style>';

    $goldnow_seo_prices = array(
        '24k' => isset($price_24k_local) ? $price_24k_local : null,
        '22k' => isset($price_22k_local) ? $price_22k_local : null,
        '21k' => isset($price_21k_local) ? $price_21k_local : null,
        '18k' => isset($price_18k_local) ? $price_18k_local : null,
        '14k' => isset($price_14k_local) ? $price_14k_local : null,
        'ounce_usd' => isset($ounce_price_usd) ? $ounce_price_usd : null,
        'coin' => isset($price_21k_local) ? ($price_21k_local * 8) : null,
        'usd_rate' => isset($local_currency_per_usd) ? $local_currency_per_usd : null
    );
    $goldnow_seo_section = !empty($gold_view) ? (string) $gold_view : 'overview';
    $goldnow_seo_base_url = home_url('/fr/country/' . rawurlencode((string) $fr_header_country_slug) . '/');
    echo goldnow_render_seo_article_shortcode($goldnow_mlr_language, $goldnow_seo_section, array(
        'country' => $display_country_name,
        'currency' => $country_currency,
        'date' => $today,
        'country_slug' => $fr_header_country_slug,
        'base_url' => $goldnow_seo_base_url,
        'prices' => $goldnow_seo_prices
    ));
}
?>

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

<?php else : // de, it, pt, ru, hi, es, tr: Arabic source translated by GoldNow Language Manager dictionary. ?>
<?php get_header(); ?>

<main class="p-0 font-2">
  <div class="container home px-2">
    <?php
    // 1️⃣ جلب بيانات الدولة الحالية (من الرابط)
    $current_term = get_queried_object();
    $country_name = $current_term->name; // الاسم بالعربي
    if (
        $goldnow_mlr_language !== 'ar' &&
        function_exists('altaqrer_ml_country_name') &&
        $current_term instanceof WP_Term
    ) {
        $country_name = altaqrer_ml_country_name($current_term, $goldnow_mlr_language);
    }
    $english_name = get_term_meta($current_term->term_id, 'country_english_name', true);
    $country_code = get_term_meta($current_term->term_id, 'country_code', true);
    $country_flag = get_term_meta($current_term->term_id, 'country_flag', true);
    $country_currency = get_term_meta($current_term->term_id, 'country_currency', true);


	  

    // 2️⃣ إعداد مسميات العملة
    global $currency_names;
    $currency_label = isset($currency_names[$country_currency]) ? $currency_names[$country_currency] : $country_currency;
    $today = date('d/m/Y'); 

    // 3️⃣ منطق تحويل العملة (تم نقله من الصفحة الرئيسية)
    $local_currency_per_usd = 1.0;
    if ($country_currency !== 'USD') {
        if (function_exists('infi_get_latest_currency_rates')) {
            $currency_data_for_conversion = infi_get_latest_currency_rates($country_currency);

            if (!empty($currency_data_for_conversion) && isset($currency_data_for_conversion['rate_to_usd']) && $currency_data_for_conversion['rate_to_usd'] > 0) {
                $local_currency_per_usd = floatval($currency_data_for_conversion['rate_to_usd']);
            }
        }
    }
	  
	  
 $usd_rate_value = 1; // للاستخدام المستقبلي إذا لزم الأمر

       
?>


<?php goldnow_display_ad('below_cards'); ?>
	  
    <!-- ✅ أزرار التبويبات (مطابقة للصفحة الرئيسية) -->
    <div class="gold-tabs-nav text-center py-4">
      <button class="gold-tab-btn active" data-tab="now">الأسعار الآن</button>
      <button class="gold-tab-btn" data-tab="buy-sell">أسعار السبائك</button>
      <button class="gold-tab-btn" data-tab="indicator">مؤشر الذهب</button>
    </div>

    <!-- ✅ محتوى التبويبات -->
    <div class="gold-tabs-content">
      
      <!-- 1. الأسعار الآن -->
      <div id="tab-now" class="gold-tab-pane" style="display:block;">
                <!-- 📊 عنوان الجدول التلقائي المطور للسيو: يتغير حسب نوع العيار أو العملة المفتوحة -->
        <h2 class="col-12 p-0 font-3 mb-0" style="text-align: right; direction: rtl;">
          <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
          <img alt="أسعار الذهب الآن في <?php echo esc_html($country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align: middle; margin-left: 5px;">
                  <?php
        // قراءة المتغير لتحديد صياغة العنوان الداخلي للجدول والمقال
        if ( $gold_view == '24k' ) { echo 'أسعار الذهب عيار 24 اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == '22k' ) { echo 'أسعار الذهب عيار 22 اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == '21k' ) { echo 'سعر جرام الذهب عيار 21 اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == '18k' ) { echo 'أسعار الذهب عيار 18 اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == '14k' ) { echo 'أسعار الذهب عيار 14 اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == 'ounce' ) { echo 'أسعار أونصة الذهب اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == 'coin' ) { echo 'سعر الجنيه الذهب اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == 'gold-bars' ) { echo 'أسعار سبائك الذهب اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == 'gold-index' ) { echo 'مؤشر الذهب المباشر اليوم في ' . esc_html($country_name); }
        elseif ( $gold_view == 'usd' ) { echo 'سعر الدولار والعملات اليوم في ' . esc_html($country_name); }
        else { echo 'أسعار الذهب في ' . esc_html($country_name) . ' اليوم '; }
        ?>

        </h2>
        
        <h3 class="col-12 p-0 mt-1" style="opacity: .7; font-size: 15px; text-align: right; direction: rtl;">
          <?php 
          if ($gold_view == 'usd') { echo 'مؤشر أسعار صرف العملات الأجنبية والعربية بالتحديث اللحظي'; }
          else { echo 'سعر الذهب في ' . esc_html($country_name) . ' بدون المصنعية تعاملات حية'; }
          ?>
        </h3>



    <!-- بطاقات أسعار الذهب -->
    <section id="gold-cards" class="mb-4">
        <?php echo do_shortcode('[infi_gold_cards currency="' . esc_attr($country_currency) . '" currency_label="' . esc_attr($currency_label) . '"]'); ?>
    </section>

    <!-- صناديق معلومات الذهب -->
    <section id="gold-info-boxes" class="mb-4">
        <?php echo do_shortcode('[infi_gold_info_boxes currency="' . esc_attr($country_currency) . '"]'); ?>
    </section>

		</div>
		
      <!-- 2. السبائك والجنيهات (تم التعديل ليكون مثل الرئيسية تماماً) -->
      <div id="tab-buy-sell" class="gold-tab-pane" style="display:none;" data-loaded="false">
        <h2 class="col-12 p-0 font-3 mb-0">
            <span class="start-head cls120" style="background: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"></span>
            <img alt="أسعار السبائك والجنيهات في <?php echo esc_html($country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px">
            أسعار السبائك والجنيهات في <?php echo esc_html($country_name); ?>
        </h2>
        <h3 class="col-12 p-0 mt-1" style="opacity: .7;font-size: 15px;">
          أحدث أسعار السبائك والجنيهات (بدون مصنعية)
        </h3>

        <?php
        if (function_exists('infi_get_latest_gold_prices')) {
            // جلب سعر عيار 24 الأساسي للحسابات
            $latest_24k = infi_get_latest_gold_prices('24k');
            $gram_24k_price_usd_raw = !empty($latest_24k) ? floatval($latest_24k[0]['price_usd']) : 0;
            $gram_24k_price_currency = $gram_24k_price_usd_raw * $local_currency_per_usd;
            $gram_24k_price_usd_converted = $gram_24k_price_usd_raw;
            ?>

            <!-- أ) جدول السبائك -->
            <section id="sabika-price" class="gold-section mt-4">
                <div class="section-header">
                    <h4>أسعار سبائك الذهب في <?php echo $country_name; ?></h4>
                    <span class="date-badge"><?php echo $today; ?></span>
                </div>
                <div class="table-responsive">
                    <table class="gold-table">
                        <thead>
                            <tr>
                                <th>الوزن / النوع</th>
                                <th>السعر (<?php echo $currency_label; ?>)</th>
                                <th>السعر (دولار)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $weights = [
                                ['weight' => 1, 'name' => 'سبيكة 1 جرام'],
                                ['weight' => 2.5, 'name' => 'سبيكة 2.5 جرام'],
                                ['weight' => 5, 'name' => 'سبيكة 5 جرام'],
                                ['weight' => 10, 'name' => 'سبيكة 10 جرام'],
                                ['weight' => 20, 'name' => 'سبيكة 20 جرام'],
                                ['weight' => 31.1, 'name' => 'أونصة (31.1 جرام)'],
                                ['weight' => 50, 'name' => 'سبيكة 50 جرام'],
                                ['weight' => 100, 'name' => 'سبيكة 100 جرام'],
                            ];
                            
                            foreach ($weights as $bar) {
                                // معالجة خاصة للأونصة
                                if ($bar['weight'] == 31.1) {
                                    $ounce_data = infi_get_latest_gold_prices('24k_oz');
                                    if (!empty($ounce_data)) {
                                        $bar_price_usd = floatval($ounce_data[0]['price_usd']);
                                        $bar_price_currency = $bar_price_usd * $local_currency_per_usd;
                                    } else {
                                        $bar_price_currency = $gram_24k_price_currency * $bar['weight'];
                                        $bar_price_usd = $gram_24k_price_usd_converted * $bar['weight'];
                                    }
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

            <!-- ب) جدول الجنيهات -->
            <section id="gold-pounds-price" class="gold-section mt-4">
                <div class="section-header">
                    <h4>أسعار جنيهات الذهب في <?php echo $country_name; ?></h4>
                </div>
                <div class="table-responsive">
                    <table class="gold-table">
                        <thead>
                            <tr>
                                <th>عيار الجنيه</th>
                                <th>السعر (<?php echo $currency_label; ?>)</th>
                                <th>السعر (دولار)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $gold_pounds_carats = ['21k', '22k', '24k']; 
                            foreach ($gold_pounds_carats as $carat) {
                                $pound_gram_data = infi_get_latest_gold_prices($carat);
                                if (!empty($pound_gram_data)) {
                                    $price_usd_per_gram = floatval($pound_gram_data[0]['price_usd']);
                                    $pound_weight = 8;
                                    
                                    $pound_price_currency = $price_usd_per_gram * $pound_weight * $local_currency_per_usd;
                                    $pound_price_usd = $price_usd_per_gram * $pound_weight;
                                    $carat_num = str_replace('k', '', $carat);
                                ?>
                                <tr>
                                    <td class="font-bold">جنيه ذهب 8 جرام (عيار <?php echo $carat_num; ?>)</td>
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

            <!-- ج) التنويه -->
            <div class="raw-gold-alert mt-4">
                <span class="alert-icon">⚠️</span>
                <strong>تنويه هام:</strong> الأسعار المعروضة أعلاه (السبائك والجنيهات) هي أسعار <u>الذهب الخام</u> فقط، ولا تشمل المصنعية أو الدمغة أو الضريبة.
            </div>

        <?php } else { ?>
            <p style="text-align:center; padding:20px;">عذراً، البيانات غير متوفرة حالياً.</p>
        <?php } ?>
      </div>
     
      <!-- 3. مؤشر الذهب -->
      <div id="tab-indicator" class="gold-tab-pane" style="display:none;">
        <div class="gold-frame-box mb-5">
          <?php echo do_shortcode('[infi_gold_chart carat="21k" currency="' . esc_attr($country_currency) . '" title="تغير السعر محلياً عيار"]'); ?>
        </div>
        <div id="ajax-indicator-frames"></div>
      </div>

    </div>
  </div>
</main>

<!-- ✅ جافاسكربت -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const buttons = document.querySelectorAll(".gold-tab-btn");

    buttons.forEach(btn => {
        btn.addEventListener("click", async (event) => {
            const tab = event.target.getAttribute("data-tab");

            // إخفاء كل التبويبات
            document.querySelectorAll(".gold-tab-pane").forEach(p => p.style.display = "none");
            document.querySelectorAll(".gold-tab-btn").forEach(b => b.classList.remove("active"));

            // إظهار التبويب المختار
            const pane = document.getElementById("tab-" + tab);
            pane.style.display = "block";
            event.target.classList.add("active");

            // التبويب مؤشر الذهب: تحميل iframes فقط عند أول مرة
            if (tab === 'indicator' && !pane.dataset.framesLoaded) {
                const formData = new FormData();
                formData.append("action", "load_indicator_frames");
                formData.append("country_currency", "<?php echo esc_js($country_currency); ?>");
                formData.append("country_name", "<?php echo esc_js($country_name); ?>");

                const response = await fetch("<?php echo admin_url('admin-ajax.php'); ?>", { method: "POST", body: formData });
                const html = await response.text();
                document.getElementById("ajax-indicator-frames").innerHTML = html;
                pane.dataset.framesLoaded = "true";
            }

            // بالنسبة لتبويب السبائك (buy-sell)، تم إزالة الـ AJAX لأنه أصبح الآن محملاً مسبقاً
            // ولكن نضع هذا السطر لتأكيد التحميل في حالة أردت استخدام الكود لاحقاً
            if (tab === 'buy-sell') {
                pane.dataset.loaded = "true";
            }
        });
    });
});
</script>

<?php goldnow_display_ad('below_countries'); ?>






<?php
// إعداد حسابات الأسعار الإضافية للموضوع بناءً على كود قالبك
$ounce_price_currency = $gram_24k_price_currency * 31.1; // سعر الأونصة بالعملة المحلية
$ounce_price_usd = $gram_24k_price_usd_converted * 31.1;   // سعر الأونصة بالدولار
$gold_pound_currency = $gram_24k_price_currency * 8 * 0.875; // سعر الجنيه الذهب عيار 21 (8 جرام)

// جلب وتأمين المتغير الجغرافي الفرعي لـ التقرير جولد لمعالجة شروط السيو والإخفاء والإظهار
$gold_view = get_query_var('gold_view');
?>

<?php 
// 2️⃣ شروط إخفاء وإظهار ذكية: يظهر البوكس العلوي الكبير المطور وجدول عملاته فقط فى صفحة الدولة الرئيسية ويختفي من الفرعيات
if (empty($gold_view) && $goldnow_mlr_language === 'ar') : 
?>
<!-- حاوية المقال الذكي محددة العرض (بوكس) بلون متباين وهادئ لمنع التداخل البصري -->
<div class="altaqrer-dynamic-article-box" style="background: #1f2126; padding: 20px; border: 1px solid #323742; border-right: 5px solid <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; color: #f0f1f5; font-size: 14.5px; line-height: 1.9; direction: rtl; text-align: right; border-radius: 8px; margin: 25px auto; max-width: 800px; width: 95%; box-sizing: border-box; box-shadow: 0 4px 15px rgba(0,0,0,0.25); font-family: sans-serif; clear: both;">
    
    <p style="margin-top: 0; margin-bottom: 15px;">
        📊 يرصد مؤشر <strong>التقرير جولد</strong> تحديثاً شاملاً لحركة <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong>أسعار الذهب في <?php echo esc_html($country_name); ?> لحظة بلحظة</strong></span> اليوم <img alt="علم <?php echo esc_html($country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:20px; vertical-align:middle; margin: 0 4px;"> بتاريخ <strong><?php echo esc_html($today); ?></strong> مباشرة من داخل أسواق الصاغة المحلية وبورصة الذهب العالمية المخصصة لنطاق (<?php echo esc_html($english_name); ?>).
    </p>

    <!-- تطوير محتوى السيو ليشمل فقرات مكثفة عن الفرعيات والأعيرة والسبائك لاستهداف كلمات بحثية قوية لجوجل -->
    <p style="margin-bottom: 15px;">
        💡 يتيح لك هذا التقرير الشامل تتبع تداولات الذهب الحية بكافة تصنيفاتها؛ حيث يمكنك فحص <strong>سعر الذهب عيار 21 اليوم</strong> الخيار الأكثر طلباً وتداولاً، ومتابعة ندرة <strong>عيار 22</strong>، بالإضافة إلى حسابات <strong>عيار 18</strong> الاقتصادي و<strong>عيار 14</strong>. كما يغطي المؤشر أسعار المعدن النفيس في الأسواق الفرعية والمشغولات وصافي التداول اليومي.
    </p>

    <p style="margin-bottom: 15px;">
        ✨ سجلت شاشات العرض الحية الآن الأسعار الحرة بدون مصنعية، حيث بلغ <strong>سعر جرام الذهب عيار 24</strong> النقي نحو <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($gram_24k_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> (ما يعادل <strong><?php echo number_format($gram_24k_price_usd_converted, 2); ?> دولار أمريكي</strong>). ويُعد هذا العيار هو المكون الأساسي لـ <strong>سبائك الذهب</strong> الاستثمارية بفضل نقائه المطلق.
    </p>

    <p style="margin-bottom: 15px;">
        📈 وعلى صعيد التعاملات التداولية لوحدات الذهب الكبرى، سجلت <strong>أسعار أونصة الذهب اليوم في <?php echo esc_html($country_name); ?></strong> قيمة <strong><?php echo number_format($ounce_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong> في السوق المحلي، وهو ما يقابل <strong><?php echo number_format($ounce_price_usd, 2); ?> دولار</strong> في التحديث المباشر للبورصة.
    </p>

    <p style="margin-bottom: 15px;">
        🪙 بالنسبة لراغبي الادخار والاستثمار الذكي، سجل <strong>سعر الجنيه الذهب اليوم</strong> (وزن 8 جرامات من عيار 21 الأكثر تداولاً) نحو <strong><?php echo number_format($gold_pound_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong>.
    </p>

    <p style="margin-bottom: 20px;">
        🛠️ إذا كنت تبحث عن حفظ قيمة مدخراتك، فإن رصد <strong>مؤشر الذهب المباشر</strong> ومتابعة <strong>أسعار سبائك الذهب</strong> بجميع أوزانها (من 1 جرام وحتى 1 كيلو) يمنحك الرؤية الدقيقة للتوقيت المثالي للشراء والبيع داخل محلات الصاغة، وتجنب تقلبات الأسعار المفاجئة.
    </p>

    <!-- صندوق مؤشر صرف العملة بلون داخلي متناسق ومنفصل -->
    <div style="background: #17191d; padding: 12px; border-radius: 6px; border: 1px dashed #3a3f4d; color: #d1d5db; font-size: 14px; margin-top: 15px;">
        💵 <strong>مؤشر صرف العملة:</strong> يرتبط تسعير المعدن الثمين محلياً بحركة الصرف الحية؛ حيث يسجل <strong>سعر الدولار اليوم في <?php echo esc_html($country_name); ?></strong> تحديثا عند <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong></span> لكل دولار أمريكي واحد بحسب البيانات الحالية المربطة بالسوق المالي. ننصح بتحميل <strong>تطبيق أسعار الذهب</strong> الرسمي التابع لشبكة التقرير للحصول على التنبيهات فوراً.
    </div>
</div>
<?php endif; ?>






<?php
// دالة ذكية لحساب سعر صرف العملات المختلفة مقابل العملة المحلية للموقع
if (!function_exists('altaqrer_get_currency_live_rate')) {
    function altaqrer_get_currency_live_rate($target_currency, $local_currency_per_usd) {
        if (function_exists('infi_get_latest_currency_rates')) {
            $currency_data = infi_get_latest_currency_rates($target_currency);
            if (!empty($currency_data) && isset($currency_data['rate_to_usd']) && $currency_data['rate_to_usd'] > 0) {
                return $local_currency_per_usd / floatval($currency_data['rate_to_usd']);
            }
        }
        return 0;
    }
}

// حساب أسعار سلة العملات حياً ومباشرة من السيرفر
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

<?php 
// إخفاء جدول العملات العلوي من الصفحات الفرعية ونتركه فقط في صفحة الدولة الرئيسية
if (empty($gold_view)) : 
?>
    <!-- صندوق مؤشر صرف العملات المتناسق والمحاذي هندسياً لأبعاد البوكس العلوي -->
    <div style="background: #17191d; padding: 15px; border-radius: 6px; border: 1px solid #3a3f4d; color: #d1d5db; font-size: 14px; margin: 20px auto; max-width: 800px; width: 95%; box-sizing: border-box; clear: both;">
        <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 15px; text-align: right; direction: rtl;">
            💵 مؤشر صرف العملات اليوم مقابل <?php echo esc_html($currency_label); ?> في <?php echo esc_html($country_name); ?> <img alt="علم <?php echo esc_html($country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:
        </strong>
        
        <!-- تقسيم ديناميكي مرن ومترابط بالكامل للشاشات -->
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; text-align: right; direction: rtl;">
            
            <!-- العمود الأول -->
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'USD') : ?>
                    <div><img alt="علم الولايات المتحدة" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدولار اليوم:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'GBP' && $local_currency_per_gbp > 0) : ?>
                    <div><img alt="علم المملكة المتحدة" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الجنيه الإسترليني:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'SAR' && $local_currency_per_sar > 0) : ?>
                    <div><img alt="علم السعودية" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الريال السعودي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>

                <?php if ($country_currency !== 'BHD' && $local_currency_per_bhd > 0) : ?>
                    <div><img alt="علم البحرين" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدينار البحريني:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
            
            <!-- العمود الثاني موازي تماماً -->
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <?php if ($country_currency !== 'EUR' && $local_currency_per_euro > 0) : ?>
                    <div><img alt="علم الاتحاد الأوروبي" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر اليورو اليوم:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'AED' && $local_currency_per_aed > 0) : ?>
                    <div><img alt="علم الإمارات" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدرهم الإماراتي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'KWD' && $local_currency_per_kwd > 0) : ?>
                    <div><img alt="علم الكويت" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدينار الكويتي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
                
                <?php if ($country_currency !== 'QAR' && $local_currency_per_qar > 0) : ?>
                    <div><img alt="علم قطر" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الريال القطري:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                <?php endif; ?>
            </div>
            
        </div>
        <p style="margin: 15px 0 0 0; font-size: 12px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 8px; text-align: right; direction: rtl;">* التحديث يتم تلقائياً بالتزامن مع شاشات صرف البورصة العالمية الحية. ننصح بتحميل <strong>تطبيق أسعار الذهب</strong> الرسمي.</p>
    </div>
<?php endif; ?>






<div class="altaqrer-silo-links" style="margin: 25px auto; padding: 15px; background: #17191d; border: 1px solid #3a3f4d; border-radius: 6px; text-align: center; max-width: 800px; width: 95%; box-sizing: border-box; clear: both; direction: <?php echo (isset($_SERVER['REQUEST_URI']) && preg_match('#^/en(?:/|$)#i', wp_parse_url(wp_unslash($_SERVER['REQUEST_URI']), PHP_URL_PATH))) ? 'ltr' : 'rtl'; ?>;">
    <?php
    $current_term_object = get_queried_object();

    $request_path = isset($_SERVER['REQUEST_URI'])
        ? wp_parse_url(wp_unslash($_SERVER['REQUEST_URI']), PHP_URL_PATH)
        : '/';

    $is_english = (bool) preg_match('#^/en(?:/|$)#i', $request_path);

    $base_country_url = '';

    if ($is_english) {
        // Build the English country URL while preserving the country slug.
        $country_slug = '';

        if (isset($current_term_object->slug)) {
            $country_slug = $current_term_object->slug;
        } elseif (isset($country_code)) {
            $country_slug = strtolower($country_code);
        }

        if ($country_slug !== '') {
            $base_country_url = home_url('/' . $goldnow_mlr_language . '/country/' . rawurlencode($country_slug) . '/');
        }
    } else {
        // Keep the original Arabic URL behavior.
        if (isset($current_term_object->term_id)) {
            $term_link = get_term_link($current_term_object->term_id);

            if (!is_wp_error($term_link)) {
                $base_country_url = trailingslashit($term_link);
            }
        }

        if (empty($base_country_url) && isset($country_code)) {
            $base_country_url = home_url('/country/' . strtolower($country_code) . '/');
        }
    }

    $active_bg = get_theme_mod('infi_default_color', '#ffb301');
    $active_color = '#000000';
    $default_bg = '#262930';
    $default_color = '#ffffff';

    $tabs = [
        ['key' => '',          'ar' => 'سعر الذهب',            'en' => 'Gold Price'],
        ['key' => '24k',       'ar' => 'عيار 24',              'en' => '24K'],
        ['key' => '22k',       'ar' => 'عيار 22',              'en' => '22K'],
        ['key' => '21k',       'ar' => 'عيار 21',              'en' => '21K'],
        ['key' => '18k',       'ar' => 'عيار 18',              'en' => '18K'],
        ['key' => '14k',       'ar' => 'عيار 14',              'en' => '14K'],
        ['key' => 'ounce',     'ar' => 'أونصة الذهب',          'en' => 'Gold Ounce'],
        ['key' => 'coin',      'ar' => 'الجنيه الذهب',         'en' => 'Gold Coin'],
        ['key' => 'gold-bars', 'ar' => 'أسعار السبائك',        'en' => 'Gold Bars'],
        ['key' => 'gold-index','ar' => 'مؤشر الذهب',           'en' => 'Gold Index'],
        ['key' => 'usd',       'ar' => 'سعر الدولار والعملات', 'en' => 'USD and Currency Rates'],
    ];

    $container_direction = $is_english ? 'ltr' : 'rtl';
    ?>

    <div style="display: flex; justify-content: center; gap: 8px; flex-wrap: wrap; row-gap: 10px; direction: <?php echo esc_attr($container_direction); ?>;">
        <?php foreach ($tabs as $tab) :
            $key = $tab['key'];
            $is_active = ($key === '') ? empty($gold_view) : ($gold_view === $key);

            $tab_url = ($key === '')
                ? $base_country_url
                : $base_country_url . rawurlencode($key) . '/';

            $tab_style = 'text-decoration: none; padding: 8px 14px; border-radius: 4px; font-size: 13px; border: 1px solid #3a3f4d; ';

            if ($is_active) {
                $tab_style .= "color: {$active_color}; background: {$active_bg}; font-weight: bold;";
            } else {
                $tab_style .= "color: {$default_color}; background: {$default_bg}; font-weight: 500;";
            }

            $label = $is_english ? $tab['en'] : $tab['ar'];
        ?>
            <a href="<?php echo esc_url($tab_url); ?>"
               style="<?php echo esc_attr($tab_style); ?>"
               <?php echo $is_active ? 'aria-current="page"' : ''; ?>>
                <?php echo esc_html($label); ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>




<?php
// 3️⃣ Preserve the original Arabic SEO box only for Arabic; other languages use the dedicated localized SEO renderer.
if (!empty($gold_view) && $goldnow_mlr_language === 'ar') {
    // 📊 حسابات الأعيرة والوحدات الاستثمارية الأساسية لتمريرها في الجداول والمقالات المطولة
    $ounce_price_currency = $gram_24k_price_currency * 31.1; 
    $ounce_price_usd      = $gram_24k_price_usd_converted * 31.1;   
    
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
    <div class="altaqrer-unified-hero-box" style="background: #17191d; padding: 25px; border-radius: 8px; border: 1px solid #3a3f4d; color: #d1d5db; font-size: 15px; margin: 15px auto 20px auto; max-width: 800px; width: 95%; box-sizing: border-box; clear: both; box-shadow: 0 4px 15px rgba(0,0,0,0.3); direction: rtl; text-align: right; line-height: 1.8;">
        <div class="altaqrer-dynamic-inner-content">
            
            <?php 
            // ==================== 1️⃣ التبويب الأول: مؤشر الذهب (gold-index) ====================
            if ($gold_view == 'gold-index') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">📈 مؤشر الذهب مباشر اليوم وأسعار الأعيرة الحية في <?php echo esc_html($country_name); ?> <img alt="علم <?php echo esc_html($country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: right; direction: rtl;">
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>عيار 24 النقي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>عيار 22 الممتاز:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_22k_usd, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;">عيار 21 المفضل:</strong> <span style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_21k_usd, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>عيار 18 الاقتصادي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_18k_usd, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930;">🔹 <strong>عيار 14 الخفيف:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_14k_usd, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px 15px; border-radius: 6px; border: 1px solid #262930; grid-column: span 1;">🔸 <strong>الأونصة العالمية (31.1 جرام):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong></span><br><small style="color:#94a3b8;">السعر العالمي الفوري بالدولار الأمريكي</small></div>
                </div>

                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    يقدم <strong>مؤشر الذهب مباشر اليوم</strong> قراءة برمجية فورية لرصد حركة التعاملات الحية وتدفقات الصاغة داخل أسواق <strong><?php echo esc_html($country_name); ?></strong> بالتزامن مع البورصة الفورية. يتيح لك هذا التقرير فحص وتتبع أسعار أعيرة الذهب في الصاغة لحظة بلحظة لكافة التصنيفات التجارية بدون مصنعية، حيث يسجل عيار 24 النقي الآن نحو <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_24k_usd, 2); ?></strong> دولار)، بينما يبلغ عيار 21 الأكثر طلباً بقيمة <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_21k_usd, 2); ?></strong> دولار) وعيار 18 بسعر <strong><?php echo number_format($price_18k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_18k_usd, 2); ?></strong> دولار)، كما يبلغ السعر العالمي الفوري لأونصة الذهب <strong><?php echo number_format($ounce_price_usd, 2); ?> USD</strong>، دون ربط قيمة الأونصة المعروضة بسعر العملة المحلية. يرتبط المؤشر الهندسي بحجم العرض والطلب وحجم التداولات الفورية الجارية لبورصة الذهب في نطاق تداول المعدن النفيس عالمياً، مما يمنح المستثمرين الرؤية الدقيقة لتحديد التوقيت المثالي لعمليات الشراء والبيع وتجنب تقلبات الأسعار المفاجئة.
                </p>

            <?php 
            // ==================== 2️⃣ التبويب الثاني: أسعار السبائك (gold-bars) ====================
            elseif ($gold_view == 'gold-bars') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 أسعار سبائك الذهب اليوم في <?php echo esc_html($country_name); ?> لجميع الأوزان (عيار 24 النقي):</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: right; direction: rtl;">
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 1 جرام:</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_24k_local * 1, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 1, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 2.5 جرام:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 2.5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 2.5, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 5 جرام:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 5, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 5, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 10 جرام:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 10, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 10, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 20 جرام:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 20, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 20, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>أونصة ذهب (31.1 جرام):</strong> <span style="color: #ffb301;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($ounce_price_usd, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 50 جرام:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 50, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 50, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 10px; border-radius: 6px; border: 1px solid #262930;">🔸 <strong>سبيكة وزن 100 جرام:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 100, 2); ?></strong></span> <?php echo esc_html($currency_label); ?><br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 100, 2); ?> دولار</small></div>
                </div>

                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    يرصد مؤشر التقرير جولد بشكل هندسي دقيق <strong>أسعار سبائك الذهب اليوم</strong> المصنوعة كلياً من نقاء <strong>سبيكة ذهب عيار 24</strong> النقي بنسبة 999.9 بدون احتساب قيم تشغيلية إضافية. يبدأ تسعير الأوزان الصغيرة من سبيكة 1 جرام بقيمة <strong><?php echo number_format($price_24k_local * 1, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_24k_usd * 1, 2); ?></strong> دولار)، وصولاً إلى الأونصة القياسية بسعر <strong><?php echo number_format($ounce_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($ounce_price_usd, 2); ?></strong> دولار)، وسبيكة الـ 100 جرام بنحو <strong><?php echo number_format($price_24k_local * 100, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_24k_usd * 100, 2); ?></strong> دولار). يفضل المستثمرون ورجال الأعمال شراء سبائك الذهب للادخار وحفظ قيمة رأس المال والأموال السائلة داخل محلات الصاغة في <strong><?php echo esc_html($country_name); ?></strong> كونه الملاذ الآمن والأكثر كفاءة ضد التضخم الاقتصادي وتراجع القوة الشرائية للعملات، وتتميز هذه السبائك بانخفاض مصنعيتها مقارنة بالمشغولات، مع ميزة استرداد جزء من الكاش (الكاش باك) عند إعادة بيعها.
                </p>

            <?php 
            // ==================== 3️⃣ التبويب الثالث: الجنيه الذهب (coin) ====================
            elseif ($gold_view == 'coin') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">🪙 سعر الجنيه الذهب اليوم في <?php echo esc_html($country_name); ?> بجميع أعيرته القياسية (وزن 8 جرام):</strong>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; margin-bottom: 20px; text-align: right; direction: rtl;">
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>جنيه ذهب عيار 21:</strong> <span style="color: #ffb301;"><strong><?php echo number_format($price_21k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_21k_usd * 8, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>جنيه ذهب عيار 22:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_22k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_22k_usd * 8, 2); ?> دولار</small></div>
                    <div style="background: #1f2126; padding: 12px; border-radius: 6px; border: 1px solid #262930;">👑 <strong>جنيه ذهب عيار 24:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($price_24k_local * 8, 2); ?></strong></span> <?php echo esc_html($currency_label); ?> <br><small style="color:#94a3b8;">ما يعادل: <?php echo number_format($price_24k_usd * 8, 2); ?> دولار</small></div>
                </div>

                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    تحديث حي ومباشر يرصد <strong>سعر الجنيه الذهب اليوم</strong> في محلات الصاغة والأسواق الاستثمارية بجميع تصنيفاته التجارية. يغطي هذا الجدول فحص <strong>أنواع وأعيرة الجنيه الذهب</strong> بوزنها القياسي الثابت (8 جرامات)، وعلى رأسها <strong>جنيه ذهب عيار 21 وزن 8 جرام</strong> الخيار الاستثماري الطاغي والأكثر بحثاً وطلباً في <strong><?php echo esc_html($country_name); ?></strong> والذي يسجل اليوم <strong><?php echo number_format($price_21k_local * 8, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_21k_usd * 8, 2); ?></strong> دولار)، متقدماً على الجنيه عيار 22 البالغ <strong><?php echo number_format($price_22k_local * 8, 2); ?> <?php echo esc_html($currency_label); ?></strong> والجنيه عيار 24 بقيمة <strong><?php echo number_format($price_24k_local * 8, 2); ?> <?php echo esc_html($currency_label); ?></strong>. يعد الجنيه الذهب الملاذ الأفضل لراغبي الادخار وحفظ السيولة النقدية بأقل مصنعية ممكنة وتجنب تكاليف تشغيل المشغولات الذهبية التقليدية الخفيفة.
                </p>

            <?php 
            // ==================== 4️⃣ التبويب الرابع: سعر الدولار والعملات (usd) ====================
            elseif ($gold_view == 'usd') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 15px; font-size: 16px;">💵 مؤشر صرف العملات اليوم مقابل <?php echo esc_html($currency_label); ?> في <?php echo esc_html($country_name); ?> <img alt="علم <?php echo esc_html($country_name); ?>" src="<?php echo esc_url($country_flag); ?>" style="width:18px; vertical-align:middle; margin: 0 4px;">:</strong>
                
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; text-align: right; direction: rtl; margin-bottom: 20px;">
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if ($country_currency !== 'USD') : ?>
                            <div><img alt="علم الولايات المتحدة" src="https://flagcdn.com/16x12/us.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدولار اليوم:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_usd, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></div>
                        <?php endif; ?>
                        <?php if (isset($local_currency_per_gbp) && $local_currency_per_gbp > 0) : ?>
                            <div><img alt="علم المملكة المتحدة" src="https://flagcdn.com/16x12/gb.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الجنيه الإسترليني:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_gbp, 2); ?></strong></span></div>
                        <?php endif; ?>
                        <?php if (isset($local_currency_per_sar) && $local_currency_per_sar > 0) : ?>
                            <div><img alt="علم السعودية" src="https://flagcdn.com/16x12/sa.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الريال السعودي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_sar, 2); ?></strong></span></div>
                        <?php endif; ?>
                        <?php if (isset($local_currency_per_bhd) && $local_currency_per_bhd > 0) : ?>
                            <div><img alt="علم البحرين" src="https://flagcdn.com/16x12/bh.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدينار البحريني:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_bhd, 2); ?></strong></span></div>
                        <?php endif; ?>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <?php if (isset($local_currency_per_euro) && $local_currency_per_euro > 0) : ?>
                            <div><img alt="علم الاتحاد الأوروبي" src="https://flagcdn.com/16x12/eu.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر اليورو اليوم:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_euro, 2); ?></strong></span></div>
                        <?php endif; ?>
                        <?php if (isset($local_currency_per_aed) && $local_currency_per_aed > 0) : ?>
                            <div><img alt="علم الإمارات" src="https://flagcdn.com/16x12/ae.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدرهم الإماراتي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_aed, 2); ?></strong></span></div>
                        <?php endif; ?>
                        <?php if (isset($local_currency_per_kwd) && $local_currency_per_kwd > 0) : ?>
                            <div><img alt="علم الكويت" src="https://flagcdn.com/16x12/kw.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الدينار الكويتي:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_kwd, 2); ?></strong></span></div>
                        <?php endif; ?>
                        <?php if (isset($local_currency_per_qar) && $local_currency_per_qar > 0) : ?>
                            <div><img alt="علم قطر" src="https://flagcdn.com/16x12/qa.png" style="vertical-align:middle; margin-left: 5px;"> <strong>سعر الريال القطري:</strong> <span style="color: #ffffff;"><strong><?php echo number_format($local_currency_per_qar, 2); ?></strong></span></div>
                        <?php endif; ?>
                    </div>
                </div>

                <p style="margin: 15px 0 0 0; font-size: 14.5px; color: #94a3b8; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    يرصد <strong>مؤشد صرف العملات اليوم</strong> الأداء الحي لحركة المال الأجنبي والتداولات المصرفية والبنكية. يتم تحديث <strong>سعر الدولار اليوم في الصاغة</strong> والأسواق المالية الفورية في <strong><?php echo esc_html($country_name); ?></strong> حيث تسجل العملة الأمريكية الآن قيمة <strong><?php echo number_format($local_currency_per_usd, 2); ?> <?php echo esc_html($currency_label); ?></strong> بالتزامن مع شاشات القطاع المصرفي المركزي لضمان تقديم دقيق لـ <strong>أسعار العملات مقابل العملة المحلية</strong> لحظة بلحظة. وبما أن تسعير المعدن النفيس محلياً يرتبط كلياً بحركة أسعار الصرف الحية أمام النقد الأجنبي، فإن رصد هذا المؤشر يمنحك الرؤية الشاملة لحساب السعر الصافي للذهب وتوقع اتجاهات التداولات القادمة بوضوح.
                </p>

            <?php 
            // ==================== 5️⃣ التبويب الخامس: عيار 24 (24k) ====================
            elseif ($gold_view == '24k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px; text-align: right; direction: rtl;">📊 تقرير التحديث اللحظي لـ جرام الذهب عيار 24 في <?php echo esc_html($country_name); ?>:</strong>
                
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; text-align: right; direction: rtl; font-size: 15px;">
                    <li>🔹 <strong>السعر بالعملة المحلية:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_24k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ما يعادل بالدولار الأمريكي:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_24k_usd, 2); ?></strong></span> دولار أمريكي</li>
                </ul>

                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    يقدم مؤشر التقرير جولد رصداً حياً لحركة التداول، حيث استقر <strong>سعر جرام الذهب عيار 24 اليوم</strong> النقي بأسواق <strong><?php echo esc_html($country_name); ?></strong> عند قيمة <strong><?php echo number_format($price_24k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> في الصاغة الحية، وهو ما يعادل عالمياً <strong><?php echo number_format($price_24k_usd, 2); ?></strong> دولار أمريكي. يتميز هذا العيار الاستثماري بالنقاء المطلق والكامل بنسبة 99.9%، وهو المكون والركيزة الأساسية لصناعة وبيع سبائك الذهب بجميع أوزانها لحفظ الثروات ومدخرات الأفراد؛ ليمثل الأمان المالي بعيداً عن تقلبات السوق والتضخم النظري للعملة المحلية.
                </p>

            <?php 
            // ==================== 6️⃣ التبويب السادس: عيار 22 (22k) ====================
            elseif ($gold_view == '22k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px; text-align: right; direction: rtl;">📊 تقرير التحديث اللحظي لـ جرام الذهب عيار 22 في <?php echo esc_html($country_name); ?>:</strong>
                
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; text-align: right; direction: rtl; font-size: 15px;">
                    <li>🔹 <strong>السعر بالعملة المحلية:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_22k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ما يعادل بالدولار الأمريكي:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_22k_usd, 2); ?></strong></span> دولار أمريكي</li>
                </ul>

                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    سجلت شاشات العرض المباشرة تحديثاً جديداً لحركة أسواق الصاغة لـ <strong>سعر جرام الذهب عيار 22 اليوم</strong> النقي في <strong><?php echo esc_html($country_name); ?></strong> ليبلغ قيمته الحالية البالغة <strong><?php echo number_format($price_22k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> (ما يعادل <strong><?php echo number_format($price_22k_usd, 2); ?></strong> دولار أمريكي). ويعتبر عيار 22 من التصنيفات الممتازة والفريدة التي تجمع بشكل متناسق وهندسي بين النقاوة العالية والصلابة النسبية المطلوبة لتصنيع وتشكيل أفخم قطع الحلي والمشغولات الفنية الفاخرة داخل محلات الصاغة الفرعية، ونحن نغطي مؤشره الفوري الحر بدون مصنعيات ودمغات مضافة بالتزامن مع البورصة.
                </p>

            <?php 
            // ==================== 7️⃣ التبويب السابع: عيار 21 (21k) ====================
            elseif ($gold_view == '21k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px; text-align: right; direction: rtl;">📊 تقرير التحديث اللحظي لـ جرام الذهب عيار 21 في <?php echo esc_html($country_name); ?>:</strong>
                
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; text-align: right; direction: rtl; font-size: 15px;">
                    <li>🔹 <strong>السعر بالعملة المحلية:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_21k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ما يعادل بالدولار الأمريكي:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_21k_usd, 2); ?></strong></span> دولار أمريكي</li>
                </ul>

                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    يرصد المؤشر الفوري لشبكة التقرير جولد رغبة المستهلكين الأولى، حيث استقر <strong>سعر جرام الذهب عيار 21 اليوم</strong> في أسواق <strong><?php echo esc_html($country_name); ?></strong> محققاً تداولات نشطة بالصاغة عند مستوى <strong><?php echo number_format($price_21k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>، بما يوازي قيمته الدولية البالغة <strong><?php echo number_format($price_21k_usd, 2); ?></strong> دولار أمريكي. ويُعد عيار 21 الخيار الأكثر بحثاً وطلباً بالأسواق ويمثل النسبة الأكبر من حجم التداولات والمشغولات المحلية والجنيهات الذهب بوزن 8 جرام، وذلك بفضل بريقه الكلاسيكي الجذاب، ونحن نضمن لك المتابعة الحية لحركة هذا العيار بدون احتساب المصنعية لتحديد الوقت الأنسب لتداولاتك.
                </p>

            <?php 
            // ==================== 8️⃣ التبويب الثامن: عيار 18 (18k) ====================
            elseif ($gold_view == '18k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px; text-align: right; direction: rtl;">📊 تقرير التحديث اللحظي لـ جرام الذهب عيار 18 في <?php echo esc_html($country_name); ?>:</strong>
                
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; text-align: right; direction: rtl; font-size: 15px;">
                    <li>🔹 <strong>السعر بالعملة المحلية:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_18k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ما يعادل بالدولار الأمريكي:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_18k_usd, 2); ?></strong></span> دولار أمريكي</li>
                </ul>

                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    شهدت أسواق التداول الفورية تحديثاً جديداً في حركة <strong>سعر جرام الذهب عيار 18 اليوم</strong> في <strong><?php echo esc_html($country_name); ?></strong>، حيث يسجل الجرام الآن سعر <strong><?php echo number_format($price_18k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong> (أي ما يعادل <strong><?php echo number_format($price_18k_usd, 2); ?></strong> دولار أمريكي)، مشكلاً رواجاً واسعاً بفضل تشكيلاته الهندسي الفاخرة وخفته المناسبة لصناعة أحدث أطقم الحلي العصرية. ويُعد عيار 18 المفضل والأول للهدايا والادخار متوسط الميزانية لراغبي اقتناء الذهب الاقتصادي بأقل كلفة تشغيلية ممكنة، ونحن نوفر لك التحديث الفوري المربوط بالبورصة العالمية على مدار الساعة.
                </p>

            <?php 
            // ==================== 9️⃣ التبويب التاسع: عيار 14 (14k) ====================
            elseif ($gold_view == '14k') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px; text-align: right; direction: rtl;">📊 تقرير التحديث اللحظي لـ جرام الذهب عيار 14 في <?php echo esc_html($country_name); ?>:</strong>
                
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; text-align: right; direction: rtl; font-size: 15px;">
                    <li>🔹 <strong>السعر بالعملة المحلية:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($price_14k_local, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ما يعادل بالدولار الأمريكي:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($price_14k_usd, 2); ?></strong></span> دولار أمريكي</li>
                </ul>

                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    بالتزامن مع شاشات العرض الفورية الجارية بالبورصة، سجل <strong>سعر جرام الذهب عيار 14 اليوم</strong> في أسواق <strong><?php echo esc_html($country_name); ?></strong> تحديثاً مستقراً عند مستوى <strong><?php echo number_format($price_14k_local, 2); ?> <?php echo esc_html($currency_label); ?></strong>، وهو ما يعادل <strong><?php echo number_format($price_14k_usd, 2); ?></strong> دولار أمريكي. ويُعد عيار 14 خياراً اقتصادياً وعملياً وممتازاً داخل أسواق الصاغة لراغبي اقتناء القطع الذهبية والمشغولات الخفيفة بأقل تكلفة ممكنة للجرام الواحد، بفضل صلابته العالية التي تتحمل الاستخدام اليومي المستمر وتدني سعره الصافي الحر بالمقارنة مع الأعيرة الكبرى.
                </p>

            <?php 
            // ==================== 🔟 التبويب العاشر: أونصة الذهب (ounce) ====================
            elseif ($gold_view == 'ounce') : ?>
                <strong style="color: <?php echo get_theme_mod('infi_default_color', '#ffb301'); ?>; display: block; margin-bottom: 12px; font-size: 16px; text-align: right; direction: rtl;">📊 تقرير التحديث اللحظي لـ أونصة الذهب العالمية في <?php echo esc_html($country_name); ?>:</strong>
                
                <ul style="list-style: none; padding: 0; margin: 0 0 15px 0; line-height: 2.2; text-align: right; direction: rtl; font-size: 15px;">
                    <li>🔹 <strong>السعر بالعملة المحلية:</strong> <span style="color: #ffb301; font-size: 19px;"><strong><?php echo number_format($ounce_price_currency, 2); ?></strong></span> <?php echo esc_html($currency_label); ?></li>
                    <li>🔹 <strong>ما يعادل بالدولار الأمريكي:</strong> <span style="color: #ffffff; font-size: 16px;"><strong><?php echo number_format($ounce_price_usd, 2); ?></strong></span> دولار أمريكي</li>
                </ul>

                <p style="margin: 10px 0 0 0; font-size: 14.5px; color: #d1d5db; border-top: 1px solid #262930; padding-top: 12px; text-align: justify;">
                    وفقاً لشاشات التداول المباشرة لبورصة الذهب العالمية الفورية، بلغت <strong>أسعار أونصة الذهب اليوم</strong> في نطاق أسواق <strong><?php echo esc_html($country_name); ?></strong> قيمتها الحالية المستقرة عند <strong><?php echo number_format($ounce_price_currency, 2); ?> <?php echo esc_html($currency_label); ?></strong>، لتعادل بالدولار <strong><?php echo number_format($ounce_price_usd, 2); ?></strong> دولار. وترتبط الأونصة (وزن 31.1 جرام من عيار 24 الصافي) ارتباطاً وثيقاً ومباشراً بحركة المؤشرات الكلية للاقتصاد العالمي والتغير السعري للدولار، وتعتبر الأونصة هي المحرك الرئيسي والدليل المعتمد لتسعير كافة الأعيرة والسبائك بالأسواق المحلية والفرعية.
                </p>
            <?php endif; ?>

        </div>
    </div>
    <?php
}
?>


<?php
if (function_exists('goldnow_render_seo_article_shortcode')) {
    echo '<style id="goldnow-mlr-seo-style">\n.goldnow-seo-article{box-sizing:border-box;max-width:1120px;width:calc(100% - 32px);margin:36px auto 30px;padding:clamp(20px,3vw,38px);background:#fff;color:#273244;border:1px solid rgba(20,30,45,.10);border-radius:18px;box-shadow:0 10px 28px rgba(0,0,0,.10);font:inherit;line-height:1.85;overflow-wrap:anywhere}\n.goldnow-seo-article *{box-sizing:border-box}\n.goldnow-seo-article header{margin:0 0 22px;padding:0 0 16px;border-bottom:1px solid #e7eaf0}\n.goldnow-seo-article h2{margin:0 0 8px;color:#202b3c;font-size:clamp(22px,2.5vw,30px);line-height:1.4;font-weight:800}\n.goldnow-seo-article h3{margin:22px 0 12px;color:#26364d;font-size:clamp(18px,2vw,22px);line-height:1.5;font-weight:750}\n.goldnow-seo-article p{margin:10px 0;color:#4b5565;font-size:16px;line-height:1.9}\n.goldnow-seo-article .goldnow-seo-date{margin:0;color:#788395}\n.goldnow-seo-article .goldnow-seo-snapshot{margin:20px 0;padding:16px 20px;background:#f7f8fa;border:1px solid #e8ebf0;border-radius:12px}\n.goldnow-seo-article .goldnow-seo-snapshot ul{margin:10px 0;padding-inline-start:22px}\n.goldnow-seo-article .goldnow-seo-faq{margin-top:24px;padding-top:8px;border-top:1px solid #e7eaf0}\n.goldnow-seo-article .goldnow-seo-faq details{margin:10px 0;padding:13px 16px;background:#f7f8fa;border:1px solid #e8ebf0;border-radius:10px}\n.goldnow-seo-article .goldnow-seo-faq summary{color:#26364d;font-weight:700;cursor:pointer}\n.goldnow-seo-article .goldnow-seo-faq details p{margin:10px 0 0}\n.goldnow-seo-article .goldnow-seo-related{margin-top:22px;padding:14px 16px;background:#fff9e9;border:1px solid #f0dfad;border-radius:10px}\n.goldnow-seo-article .goldnow-seo-related p{margin:0}\n.goldnow-seo-article .goldnow-seo-related a{color:#8a6100;text-decoration:underline;text-underline-offset:3px}\n.goldnow-seo-article .goldnow-seo-disclaimer{font-size:13px;color:#77808d}\n.goldnow-seo-article[dir="rtl"]{text-align:right}\n.goldnow-seo-article[dir="ltr"]{text-align:left}\n@media(max-width:640px){.goldnow-seo-article{width:calc(100% - 20px);margin:24px auto;padding:18px 16px;border-radius:14px}.goldnow-seo-article p{font-size:15px}}\n</style>';

    $goldnow_seo_prices = array(
        '24k' => isset($price_24k_local) ? $price_24k_local : null,
        '22k' => isset($price_22k_local) ? $price_22k_local : null,
        '21k' => isset($price_21k_local) ? $price_21k_local : null,
        '18k' => isset($price_18k_local) ? $price_18k_local : null,
        '14k' => isset($price_14k_local) ? $price_14k_local : null,
        'ounce_usd' => isset($ounce_price_usd) ? $ounce_price_usd : null,
        'coin' => isset($price_21k_local) ? ($price_21k_local * 8) : null,
        'usd_rate' => isset($local_currency_per_usd) ? $local_currency_per_usd : null
    );
    $goldnow_seo_section = !empty($gold_view) ? (string) $gold_view : 'overview';
    $goldnow_seo_base_path = ($goldnow_mlr_language === 'ar') ? '/country/' : '/' . $goldnow_mlr_language . '/country/';
    $goldnow_seo_base_url = home_url($goldnow_seo_base_path . rawurlencode((string) $country_code) . '/');
    echo goldnow_render_seo_article_shortcode($goldnow_mlr_language, $goldnow_seo_section, array(
        'country' => $country_name,
        'currency' => $country_currency,
        'date' => $today,
        'country_slug' => $country_code,
        'base_url' => $goldnow_seo_base_url,
        'prices' => $goldnow_seo_prices
    ));
}
?>

<?php get_footer(); endif; ?>
<?php if ($goldnow_mlr_translate_output && ob_get_level() > 0) { ob_end_flush(); } ?>
