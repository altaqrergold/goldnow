<?php
/**
 * Plugin Name: GoldNow Multilingual Test Manager
 * Plugin URI: https://gold.altaqrer.com/
 * Description: Test build with strict language fallback, safe multilingual HTML blocks, placeholders, and the existing GoldNow SEO renderer.
 * Version: 2.0.0-test
 * Author: GoldNow
 * Text Domain: goldnow-multilingual-test
 * Requires at least: 5.8
 * Requires PHP: 7.4
 */

if (!defined('ABSPATH')) {
    exit;
}

// Load the dedicated multilingual SEO article renderer shipped with this plugin.
$goldnow_seo_content_file = __DIR__ . '/goldnow-seo-content.php';
if (is_readable($goldnow_seo_content_file)) {
    require_once $goldnow_seo_content_file;
}

// Load the reusable SEO article shortcode after its renderer is available.
$goldnow_seo_shortcode_file = __DIR__ . '/goldnow-seo-shortcode.php';
if (is_readable($goldnow_seo_shortcode_file)) {
    require_once $goldnow_seo_shortcode_file;
}

// Load the SEO content editor; it uses the renderer's defaults and stores only admin overrides.
$goldnow_seo_admin_file = __DIR__ . '/goldnow-seo-admin.php';
if (is_readable($goldnow_seo_admin_file)) {
    require_once $goldnow_seo_admin_file;
}

if (!class_exists('GoldNow_Multilingual_Test_Manager')) {
    final class GoldNow_Multilingual_Test_Manager {
        const VERSION = '2.0.0-test';
        const OPTION_TRANSLATIONS = 'goldnow_mt_translations';
        const OPTION_ENABLED = 'goldnow_mt_enabled_languages';
        const OPTION_DEFAULT = 'goldnow_mt_default_language';
        const OPTION_TEMPLATE_TEST = 'goldnow_mt_enable_unified_template';
        const MENU_SLUG = 'goldnow-multilingual-test';

        private static $instance = null;
        private $translations_cache = null;

        public static function instance() {
            if (self::$instance === null) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public static function languages() {
            return array(
                'ar' => array('name' => 'العربية', 'native' => 'العربية', 'rtl' => true),
                'en' => array('name' => 'English', 'native' => 'English', 'rtl' => false),
                'fr' => array('name' => 'French', 'native' => 'Français', 'rtl' => false),
                'de' => array('name' => 'German', 'native' => 'Deutsch', 'rtl' => false),
                'es' => array('name' => 'Spanish', 'native' => 'Español', 'rtl' => false),
                'it' => array('name' => 'Italian', 'native' => 'Italiano', 'rtl' => false),
                'pt' => array('name' => 'Portuguese', 'native' => 'Português', 'rtl' => false),
                'ru' => array('name' => 'Russian', 'native' => 'Русский', 'rtl' => false),
                'hi' => array('name' => 'Hindi', 'native' => 'हिन्दी', 'rtl' => false),
                'tr' => array('name' => 'Turkish', 'native' => 'Türkçe', 'rtl' => false),
            );
        }

        private function __construct() {
            add_action('admin_menu', array($this, 'admin_menu'));
            add_filter('template_include', array($this, 'maybe_use_unified_template'), 99);
            add_action('admin_post_goldnow_mt_save', array($this, 'save_settings'));
            add_action('admin_post_goldnow_mt_export', array($this, 'export_dictionary'));
            add_shortcode('goldnow_mt_translate', array($this, 'translation_shortcode'));
            add_shortcode('goldnow_mt_translate_block', array($this, 'translation_block_shortcode'));
            add_shortcode('goldnow_mt_language_switcher', array($this, 'language_switcher_shortcode'));
        }

        public function activate() {
            $defaults = self::default_dictionary();
            $saved = get_option(self::OPTION_TRANSLATIONS, false);
            if ($saved === false || !is_array($saved)) {
                add_option(self::OPTION_TRANSLATIONS, $defaults, '', false);
            } else {
                // Add new default keys/translations while preserving every saved customization and custom key.
                $merged = array_replace_recursive($defaults, $saved);
                if ($merged !== $saved) {
                    update_option(self::OPTION_TRANSLATIONS, $merged, false);
                }
            }
            if (get_option(self::OPTION_ENABLED, false) === false) {
                add_option(self::OPTION_ENABLED, array_keys(self::languages()), '', false);
            }
            if (get_option(self::OPTION_DEFAULT, false) === false) {
                add_option(self::OPTION_DEFAULT, 'ar', '', false);
            }
            $default_blocks = self::default_blocks();
            $saved_blocks = get_option('goldnow_mt_blocks', false);
            if ($saved_blocks === false || !is_array($saved_blocks)) {
                add_option('goldnow_mt_blocks', $default_blocks, '', false);
            } else {
                $merged_blocks = array_replace_recursive($default_blocks, $saved_blocks);
                if ($merged_blocks !== $saved_blocks) {
                    update_option('goldnow_mt_blocks', $merged_blocks, false);
                }
            }
            if (get_option(self::OPTION_TEMPLATE_TEST, false) === false) {
                add_option(self::OPTION_TEMPLATE_TEST, false, '', false);
            }
        }

        /** Load the new theme template only after an explicit test toggle. */
        public function maybe_use_unified_template($template) {
            if (!get_option(self::OPTION_TEMPLATE_TEST, false) || !function_exists('is_tax') || !is_tax('countries')) {
                return $template;
            }
            $candidate = trailingslashit(get_stylesheet_directory()) . 'taxonomy-countries-unified-test.php';
            if (!is_readable($candidate)) {
                $candidate = trailingslashit(get_template_directory()) . 'taxonomy-countries-unified-test.php';
            }
            return is_readable($candidate) ? $candidate : $template;
        }

        public static function default_dictionary() {
            $json = <<<'GOLDNOW_DICTIONARY'
{
    "gold_price": {
        "source": "سعر الذهب",
        "ar": "سعر الذهب",
        "en": "Gold Price",
        "fr": "Prix de l’or",
        "de": "Goldpreis",
        "es": "Precio del oro",
        "it": "Prezzo dell’oro",
        "pt": "Preço do ouro",
        "ru": "Цена золота",
        "hi": "सोने की कीमत",
        "tr": "Altın Fiyatı"
    },
    "gold_prices_today": {
        "source": "أسعار الذهب اليوم",
        "ar": "أسعار الذهب اليوم",
        "en": "Gold Prices Today",
        "fr": "Prix de l’or aujourd’hui",
        "de": "Goldpreise heute",
        "es": "Precio del oro hoy",
        "it": "Prezzi dell’oro oggi",
        "pt": "Preços do ouro hoje",
        "ru": "Цены на золото сегодня",
        "hi": "आज सोने की कीमतें",
        "tr": "Bugünün Altın Fiyatları"
    },
    "karat_24": {
        "source": "عيار 24",
        "ar": "عيار 24",
        "en": "24 Karat",
        "fr": "24 carats",
        "de": "24 Karat",
        "es": "24 quilates",
        "it": "24 carati",
        "pt": "24 quilates",
        "ru": "24 карата",
        "hi": "24 कैरेट",
        "tr": "24 Ayar"
    },
    "karat_22": {
        "source": "عيار 22",
        "ar": "عيار 22",
        "en": "22 Karat",
        "fr": "22 carats",
        "de": "22 Karat",
        "es": "22 quilates",
        "it": "22 carati",
        "pt": "22 quilates",
        "ru": "22 карата",
        "hi": "22 कैरेट",
        "tr": "22 Ayar"
    },
    "karat_21": {
        "source": "عيار 21",
        "ar": "عيار 21",
        "en": "21 Karat",
        "fr": "21 carats",
        "de": "21 Karat",
        "es": "21 quilates",
        "it": "21 carati",
        "pt": "21 quilates",
        "ru": "21 карата",
        "hi": "21 कैरेट",
        "tr": "21 Ayar"
    },
    "karat_18": {
        "source": "عيار 18",
        "ar": "عيار 18",
        "en": "18 Karat",
        "fr": "18 carats",
        "de": "18 Karat",
        "es": "18 quilates",
        "it": "18 carati",
        "pt": "18 quilates",
        "ru": "18 карата",
        "hi": "18 कैरेट",
        "tr": "18 Ayar"
    },
    "karat_14": {
        "source": "عيار 14",
        "ar": "عيار 14",
        "en": "14 Karat",
        "fr": "14 carats",
        "de": "14 Karat",
        "es": "14 quilates",
        "it": "14 carati",
        "pt": "14 quilates",
        "ru": "14 карата",
        "hi": "14 कैरेट",
        "tr": "14 Ayar"
    },
    "global_gold_ounce": {
        "source": "الأونصة العالمية",
        "ar": "الأونصة العالمية",
        "en": "Global Gold Ounce",
        "fr": "Cours mondial de l’or par once",
        "de": "Weltweiter Goldpreis je Unze",
        "es": "Precio mundial del oro por onza",
        "it": "Prezzo mondiale dell’oro per oncia",
        "pt": "Preço mundial do ouro por onça",
        "ru": "Мировая цена золота за унцию",
        "hi": "अंतरराष्ट्रीय सोने का भाव (प्रति औंस)",
        "tr": "Küresel Ons Altın Fiyatı"
    },
    "local_gold_ounce": {
        "source": "الأونصة بالعملة المحلية",
        "ar": "الأونصة بالعملة المحلية",
        "en": "Gold Ounce in Local Currency",
        "fr": "Once d’or en monnaie locale",
        "de": "Goldunze in Landeswährung",
        "es": "Onza de oro en moneda local",
        "it": "Oncia d’oro in valuta locale",
        "pt": "Onça de ouro na moeda local",
        "ru": "Унция золота в местной валюте",
        "hi": "स्थानीय मुद्रा में प्रति औंस सोने का भाव",
        "tr": "Yerel Para Biriminde Ons Altın Fiyatı"
    },
    "gold_coin": {
        "source": "جنيه الذهب",
        "ar": "جنيه الذهب",
        "en": "Gold Sovereign / Coin",
        "fr": "Souverain / pièce d’or",
        "de": "Goldmünze",
        "es": "Moneda de oro",
        "it": "Moneta d’oro",
        "pt": "Moeda de ouro",
        "ru": "Золотая монета",
        "hi": "सोने का सिक्का",
        "tr": "Altın Sikke"
    },
    "usd_price": {
        "source": "سعر الدولار",
        "ar": "سعر الدولار",
        "en": "USD Exchange Rate",
        "fr": "Taux de change USD",
        "de": "USD-Wechselkurs",
        "es": "Tipo de cambio USD",
        "it": "Tasso di cambio USD",
        "pt": "Taxa de câmbio USD",
        "ru": "Курс доллара США",
        "hi": "USD विनिमय दर",
        "tr": "USD Döviz Kuru"
    },
    "gold_bars": {
        "source": "سبائك الذهب",
        "ar": "سبائك الذهب",
        "en": "Gold Bars",
        "fr": "Lingots d’or",
        "de": "Goldbarren",
        "es": "Lingotes de oro",
        "it": "Lingotti d’oro",
        "pt": "Barras de ouro",
        "ru": "Золотые слитки",
        "hi": "गोल्ड बार",
        "tr": "Altın Külçeleri"
    },
    "gold_index": {
        "source": "مؤشر الذهب",
        "ar": "مؤشر الذهب",
        "en": "Gold Index",
        "fr": "Indice de l’or",
        "de": "Goldindex",
        "es": "Índice del oro",
        "it": "Indice dell’oro",
        "pt": "Índice do ouro",
        "ru": "Индекс золота",
        "hi": "सोने की कीमतों का सूचकांक",
        "tr": "Altın Endeksi"
    },
    "search_country": {
        "source": "ابحث عن دولة",
        "ar": "ابحث عن دولة",
        "en": "Search for a country",
        "fr": "Rechercher un pays",
        "de": "Land suchen",
        "es": "Buscar un país",
        "it": "Cerca un paese",
        "pt": "Pesquisar um país",
        "ru": "Поиск страны",
        "hi": "देश का नाम खोजें",
        "tr": "Ülke ara"
    },
    "all_countries": {
        "source": "جميع الدول",
        "ar": "جميع الدول",
        "en": "All Countries",
        "fr": "Tous les pays",
        "de": "Alle Länder",
        "es": "Todos los países",
        "it": "Tutti i paesi",
        "pt": "Todos os países",
        "ru": "Все страны",
        "hi": "सभी देश",
        "tr": "Tüm Ülkeler"
    },
    "no_results": {
        "source": "لا توجد نتائج",
        "ar": "لا توجد نتائج",
        "en": "No results found",
        "fr": "Aucun résultat trouvé",
        "de": "Keine Ergebnisse gefunden",
        "es": "No se encontraron resultados",
        "it": "Nessun risultato trovato",
        "pt": "Nenhum resultado encontrado",
        "ru": "Ничего не найдено",
        "hi": "कोई परिणाम नहीं मिला",
        "tr": "Sonuç bulunamadı"
    },
    "home": {
        "source": "الرئيسية",
        "ar": "الرئيسية",
        "en": "Home",
        "fr": "Accueil",
        "de": "Startseite",
        "es": "Inicio",
        "it": "Home",
        "pt": "Início",
        "ru": "Главная",
        "hi": "होम पेज",
        "tr": "Ana Sayfa"
    },
    "gold_prices": {
        "source": "أسعار الذهب",
        "ar": "أسعار الذهب",
        "en": "Gold Prices",
        "fr": "Prix de l’or",
        "de": "Goldpreise",
        "es": "Precios del oro",
        "it": "Prezzi dell’oro",
        "pt": "Preços do ouro",
        "ru": "Цены на золото",
        "hi": "सोने की कीमतें",
        "tr": "Altın Fiyatları"
    },
    "gold_bars_nav": {
        "source": "سبائك الذهب",
        "ar": "سبائك الذهب",
        "en": "Gold Bars",
        "fr": "Lingots d’or",
        "de": "Goldbarren",
        "es": "Lingotes de oro",
        "it": "Lingotti d’oro",
        "pt": "Barras de ouro",
        "ru": "Золотые слитки",
        "hi": "गोल्ड बार",
        "tr": "Altın Külçeleri"
    },
    "gold_index_nav": {
        "source": "مؤشر الذهب",
        "ar": "مؤشر الذهب",
        "en": "Gold Price Index",
        "fr": "Indice du prix de l’or",
        "de": "Goldpreisindex",
        "es": "Índice del precio del oro",
        "it": "Indice del prezzo dell’oro",
        "pt": "Índice do preço do ouro",
        "ru": "Индекс цен на золото",
        "hi": "गोल्ड प्राइस इंडेक्स",
        "tr": "Altın Fiyat Endeksi"
    },
    "all_countries_nav": {
        "source": "جميع الدول",
        "ar": "جميع الدول",
        "en": "All Countries",
        "fr": "Tous les pays",
        "de": "Alle Länder",
        "es": "Todos los países",
        "it": "Tutti i paesi",
        "pt": "Todos os países",
        "ru": "Все страны",
        "hi": "सभी देश",
        "tr": "Tüm Ülkeler"
    },
    "search_country_nav": {
        "source": "ابحث عن دولة",
        "ar": "ابحث عن دولة",
        "en": "Search for a country",
        "fr": "Rechercher un pays",
        "de": "Land suchen",
        "es": "Buscar un país",
        "it": "Cerca un paese",
        "pt": "Pesquisar um país",
        "ru": "Найти страну",
        "hi": "देश का नाम खोजें",
        "tr": "Ülke adı ara"
    },
    "arab_world": {
        "source": "العالم العربي",
        "ar": "العالم العربي",
        "en": "Arab World",
        "fr": "Monde arabe",
        "de": "Arabische Welt",
        "es": "Mundo árabe",
        "it": "Mondo arabo",
        "pt": "Mundo árabe",
        "ru": "Арабский мир",
        "hi": "अरब जगत",
        "tr": "Arap Dünyası"
    },
    "rest_of_world": {
        "source": "بقية العالم",
        "ar": "بقية العالم",
        "en": "Rest of the World",
        "fr": "Reste du monde",
        "de": "Rest der Welt",
        "es": "Resto del mundo",
        "it": "Resto del mondo",
        "pt": "Resto do mundo",
        "ru": "Остальной мир",
        "hi": "शेष दुनिया",
        "tr": "Dünyanın Geri Kalanı"
    },
    "usd_rates": {
        "source": "أسعار صرف الدولار",
        "ar": "أسعار صرف الدولار",
        "en": "USD Exchange Rates",
        "fr": "Taux de change USD",
        "de": "USD-Wechselkurse",
        "es": "Tipos de cambio del USD",
        "it": "Tassi di cambio USD",
        "pt": "Taxas de câmbio USD",
        "ru": "Курсы доллара США",
        "hi": "USD विनिमय दरें",
        "tr": "USD Döviz Kurları"
    },
    "about": {
        "source": "من نحن",
        "ar": "من نحن",
        "en": "About",
        "fr": "À propos",
        "de": "Über uns",
        "es": "Acerca de",
        "it": "Chi siamo",
        "pt": "Sobre",
        "ru": "О нас",
        "hi": "हमारे बारे में",
        "tr": "Hakkımızda"
    },
    "gold_price_sections": {
        "source": "أقسام أسعار الذهب",
        "ar": "أقسام أسعار الذهب",
        "en": "Gold Price Sections",
        "fr": "Rubriques des prix de l’or",
        "de": "Goldpreisbereiche",
        "es": "Secciones del precio del oro",
        "it": "Sezioni dei prezzi dell’oro",
        "pt": "Seções de preços do ouro",
        "ru": "Разделы цен на золото",
        "hi": "सोने की कीमतों के अनुभाग",
        "tr": "Altın Fiyatı Kategorileri"
    },
    "gold_prices_by_country": {
        "source": "أسعار الذهب حسب الدولة",
        "ar": "أسعار الذهب حسب الدولة",
        "en": "Gold Prices by Country",
        "fr": "Prix de l’or par pays",
        "de": "Goldpreise nach Ländern",
        "es": "Precios del oro por país",
        "it": "Prezzi dell’oro per paese",
        "pt": "Preços do ouro por país",
        "ru": "Цены на золото по странам",
        "hi": "देश के अनुसार सोने की कीमतें",
        "tr": "Ülkelere Göre Altın Fiyatları"
    },
    "live_gold_prices_title": {
        "source": "تابع أسعار الذهب لحظة بلحظة",
        "ar": "تابع أسعار الذهب لحظة بلحظة",
        "en": "Track Live Gold Prices",
        "fr": "Suivez le cours de l’or en direct",
        "de": "Goldpreise in Echtzeit verfolgen",
        "es": "Sigue el precio del oro en tiempo real",
        "it": "Segui il prezzo dell’oro in tempo reale",
        "pt": "Acompanhe o preço do ouro em tempo real",
        "ru": "Следите за ценами на золото в реальном времени",
        "hi": "लाइव सोने की कीमतें देखें",
        "tr": "Canlı Altın Fiyatlarını Takip Edin"
    },
    "gold_prices_tagline": {
        "source": "تابع الأسعار العالمية وقارن الأسعار بالعملات المحلية",
        "ar": "تابع الأسعار العالمية وقارن الأسعار بالعملات المحلية",
        "en": "Follow global prices and compare local-currency rates",
        "fr": "Suivez les cours mondiaux et comparez les prix en monnaies locales",
        "de": "Verfolgen Sie die Weltmarktpreise und vergleichen Sie Kurse in lokalen Währungen",
        "es": "Sigue los precios mundiales y compara las cotizaciones en monedas locales",
        "it": "Segui i prezzi globali e confronta le quotazioni nelle valute locali",
        "pt": "Acompanhe os preços globais e compare as cotações em moedas locais",
        "ru": "Следите за мировыми ценами и сравнивайте их в местных валютах",
        "hi": "वैश्विक कीमतें देखें और स्थानीय मुद्राओं में दरों की तुलना करें",
        "tr": "Küresel fiyatları takip edin ve yerel para birimlerindeki kurları karşılaştırın"
    },
    "countries": {
        "source": "Countries",
        "en": "Countries",
        "fr": "Pays",
        "de": "Länder",
        "es": "Países",
        "it": "Paesi",
        "pt": "Países",
        "ru": "Страны",
        "hi": "देश",
        "tr": "Ülkeler",
        "ar": "الدول"
    },
    "live_prices": {
        "source": "Live Prices",
        "en": "Live Prices",
        "fr": "Prix en direct",
        "de": "Live-Preise",
        "es": "Precios en directo",
        "it": "Prezzi in tempo reale",
        "pt": "Preços em direto",
        "ru": "Цены онлайн",
        "hi": "लाइव कीमतें",
        "tr": "Canlı Fiyatlar",
        "ar": "الأسعار المباشرة"
    },
    "gold_price_chart": {
        "source": "Gold Price Chart",
        "en": "Gold Price Chart",
        "fr": "Graphique du cours de l’or",
        "de": "Goldpreisdiagramm",
        "es": "Gráfico del precio del oro",
        "it": "Grafico del prezzo dell’oro",
        "pt": "Gráfico do preço do ouro",
        "ru": "График цены золота",
        "hi": "सोने की कीमत का चार्ट",
        "tr": "Altın Fiyat Grafiği",
        "ar": "مخطط أسعار الذهب"
    },
    "weight_type": {
        "source": "Weight / Type",
        "en": "Weight / Type",
        "fr": "Poids / Type",
        "de": "Gewicht / Typ",
        "es": "Peso / Tipo",
        "it": "Peso / Tipo",
        "pt": "Peso / Tipo",
        "ru": "Вес / Тип",
        "hi": "वजन / प्रकार",
        "tr": "Ağırlık / Tür",
        "ar": "الوزن / النوع"
    },
    "price": {
        "source": "Price",
        "en": "Price",
        "fr": "Prix",
        "de": "Preis",
        "es": "Precio",
        "it": "Prezzo",
        "pt": "Preço",
        "ru": "Цена",
        "hi": "कीमत",
        "tr": "Fiyat",
        "ar": "السعر"
    },
    "price_usd": {
        "source": "Price (USD)",
        "en": "Price (USD)",
        "fr": "Prix (USD)",
        "de": "Preis (USD)",
        "es": "Precio (USD)",
        "it": "Prezzo (USD)",
        "pt": "Preço (USD)",
        "ru": "Цена (USD)",
        "hi": "कीमत (USD)",
        "tr": "Fiyat (USD)",
        "ar": "السعر (دولار)"
    },
    "coin_purity": {
        "source": "Coin Purity",
        "en": "Coin Purity",
        "fr": "Pureté de la pièce",
        "de": "Münzfeinheit",
        "es": "Pureza de la moneda",
        "it": "Purezza della moneta",
        "pt": "Pureza da moeda",
        "ru": "Проба монеты",
        "hi": "सिक्के की शुद्धता",
        "tr": "Sikke Ayarı",
        "ar": "عيار العملة"
    },
    "important_notice": {
        "source": "Important Notice:",
        "en": "Important Notice:",
        "fr": "Avis important :",
        "de": "Wichtiger Hinweis:",
        "es": "Aviso importante:",
        "it": "Avviso importante:",
        "pt": "Aviso importante:",
        "ru": "Важное примечание:",
        "hi": "महत्वपूर्ण सूचना:",
        "tr": "Önemli Not:",
        "ar": "تنويه هام:"
    },
    "live_price": {
        "source": "Live Price",
        "en": "Live Price",
        "fr": "Prix en direct",
        "de": "Live-Preis",
        "es": "Precio en vivo",
        "it": "Prezzo in tempo reale",
        "pt": "Preço em tempo real",
        "ru": "Текущая цена",
        "hi": "लाइव कीमत",
        "tr": "Canlı Fiyat",
        "ar": "السعر الآن"
    },
    "highest_price": {
        "source": "Highest Price",
        "en": "Highest Price",
        "fr": "Prix le plus élevé",
        "de": "Höchstpreis",
        "es": "Precio máximo",
        "it": "Prezzo massimo",
        "pt": "Preço mais alto",
        "ru": "Максимальная цена",
        "hi": "सबसे अधिक कीमत",
        "tr": "En Yüksek Fiyat",
        "ar": "أعلى سعر"
    },
    "lowest_price": {
        "source": "Lowest Price",
        "en": "Lowest Price",
        "fr": "Prix le plus bas",
        "de": "Tiefstpreis",
        "es": "Precio mínimo",
        "it": "Prezzo minimo",
        "pt": "Preço mais baixo",
        "ru": "Минимальная цена",
        "hi": "सबसे कम कीमत",
        "tr": "En Düşük Fiyat",
        "ar": "أقل سعر"
    },
    "change": {
        "source": "Change",
        "en": "Change",
        "fr": "Variation",
        "de": "Änderung",
        "es": "Cambio",
        "it": "Variazione",
        "pt": "Variação",
        "ru": "Изменение",
        "hi": "बदलाव",
        "tr": "Değişim",
        "ar": "التغير"
    },
    "live_update": {
        "source": "Live Update",
        "en": "Live Update",
        "fr": "Mise à jour en direct",
        "de": "Live-Aktualisierung",
        "es": "Actualización en vivo",
        "it": "Aggiornamento in tempo reale",
        "pt": "Atualização em tempo real",
        "ru": "Обновление в реальном времени",
        "hi": "लाइव अपडेट",
        "tr": "Canlı Güncelleme",
        "ar": "التحديث اللحظي"
    },
    "excluding_making_charges": {
        "source": "Excluding Making Charges",
        "en": "Excluding Making Charges",
        "fr": "Hors frais de fabrication",
        "de": "Ohne Verarbeitungskosten",
        "es": "Sin gastos de fabricación",
        "it": "Esclusi i costi di lavorazione",
        "pt": "Sem custos de fabrico",
        "ru": "Без стоимости изготовления",
        "hi": "मेकिंग चार्ज के बिना",
        "tr": "İşçilik Hariç",
        "ar": "بدون مصنعية"
    },
    "gold_bullion_bar_prices": {
        "source": "Gold Bullion Bar Prices",
        "en": "Gold Bullion Bar Prices",
        "fr": "Prix des lingots d’or",
        "de": "Goldbarrenpreise",
        "es": "Precios de lingotes de oro",
        "it": "Prezzi dei lingotti d’oro",
        "pt": "Preços de barras de ouro",
        "ru": "Цены на золотые слитки",
        "hi": "सोने की छड़ों की कीमतें",
        "tr": "Altın Külçe Fiyatları",
        "ar": "أسعار سبائك الذهب"
    },
    "gold_coin_prices": {
        "source": "Gold Coin Prices",
        "en": "Gold Coin Prices",
        "fr": "Prix des pièces d’or",
        "de": "Goldmünzenpreise",
        "es": "Precios de monedas de oro",
        "it": "Prezzi delle monete d’oro",
        "pt": "Preços de moedas de ouro",
        "ru": "Цены на золотые монеты",
        "hi": "सोने के सिक्कों की कीमतें",
        "tr": "Altın Sikke Fiyatları",
        "ar": "أسعار العملات الذهبية"
    },
    "important": {
        "source": "Important:",
        "en": "Important:",
        "fr": "Important :",
        "de": "Wichtig:",
        "es": "Importante:",
        "it": "Importante:",
        "pt": "Importante:",
        "ru": "Важно:",
        "hi": "महत्वपूर्ण:",
        "tr": "Önemli:",
        "ar": "مهم:"
    },
    "sorry_market_unavailable": {
        "source": "Sorry, the market data is currently unavailable.",
        "en": "Sorry, the market data is currently unavailable.",
        "fr": "Désolé, les données du marché sont actuellement indisponibles.",
        "de": "Die Marktdaten sind derzeit leider nicht verfügbar.",
        "es": "Lo sentimos, los datos del mercado no están disponibles actualmente.",
        "it": "Spiacenti, i dati di mercato non sono attualmente disponibili.",
        "pt": "Lamentamos, os dados de mercado não estão disponíveis no momento.",
        "ru": "К сожалению, рыночные данные сейчас недоступны.",
        "hi": "क्षमा करें, बाजार डेटा फिलहाल उपलब्ध नहीं है।",
        "tr": "Üzgünüz, piyasa verileri şu anda kullanılamıyor.",
        "ar": "عذرًا، بيانات السوق غير متاحة حاليًا."
    },
    "gold_price_charts": {
        "source": "Gold Price Charts",
        "en": "Gold Price Charts",
        "fr": "Graphiques du cours de l’or",
        "de": "Goldpreisdiagramme",
        "es": "Gráficos del precio del oro",
        "it": "Grafici del prezzo dell’oro",
        "pt": "Gráficos do preço do ouro",
        "ru": "Графики цен на золото",
        "hi": "सोने की कीमत के चार्ट",
        "tr": "Altın Fiyat Grafikleri",
        "ar": "مخططات أسعار الذهب"
    },
    "follow_us": {
        "source": "Follow Us",
        "en": "Follow Us",
        "fr": "Suivez-nous",
        "de": "Folgen Sie uns",
        "es": "Síguenos",
        "it": "Seguici",
        "pt": "Siga-nos",
        "ru": "Подписывайтесь на нас",
        "hi": "हमें फ़ॉलो करें",
        "tr": "Bizi Takip Edin",
        "ar": "تابعنا"
    },
    "important_links": {
        "source": "Important Links",
        "en": "Important Links",
        "fr": "Liens importants",
        "de": "Wichtige Links",
        "es": "Enlaces importantes",
        "it": "Link importanti",
        "pt": "Ligações importantes",
        "ru": "Важные ссылки",
        "hi": "महत्वपूर्ण लिंक",
        "tr": "Önemli Bağlantılar",
        "ar": "روابط مهمة"
    },
    "regional_gold_prices": {
        "source": "Regional Gold Prices",
        "en": "Regional Gold Prices",
        "fr": "Prix régionaux de l’or",
        "de": "Regionale Goldpreise",
        "es": "Precios regionales del oro",
        "it": "Prezzi regionali dell’oro",
        "pt": "Preços regionais do ouro",
        "ru": "Региональные цены на золото",
        "hi": "क्षेत्रीय सोने की कीमतें",
        "tr": "Bölgesel Altın Fiyatları",
        "ar": "أسعار الذهب الإقليمية"
    },
    "privacy_policy": {
        "source": "Privacy Policy",
        "en": "Privacy Policy",
        "fr": "Politique de confidentialité",
        "de": "Datenschutzerklärung",
        "es": "Política de privacidad",
        "it": "Informativa sulla privacy",
        "pt": "Política de privacidade",
        "ru": "Политика конфиденциальности",
        "hi": "गोपनीयता नीति",
        "tr": "Gizlilik Politikası",
        "ar": "سياسة الخصوصية"
    },
    "terms_of_use": {
        "source": "Terms of Use",
        "en": "Terms of Use",
        "fr": "Conditions d’utilisation",
        "de": "Nutzungsbedingungen",
        "es": "Términos de uso",
        "it": "Termini di utilizzo",
        "pt": "Termos de utilização",
        "ru": "Условия использования",
        "hi": "उपयोग की शर्तें",
        "tr": "Kullanım Koşulları",
        "ar": "شروط الاستخدام"
    },
    "contact_us": {
        "source": "Contact Us",
        "en": "Contact Us",
        "fr": "Contactez-nous",
        "de": "Kontakt",
        "es": "Contáctanos",
        "it": "Contattaci",
        "pt": "Contacte-nos",
        "ru": "Связаться с нами",
        "hi": "संपर्क करें",
        "tr": "İletişim",
        "ar": "اتصل بنا"
    },
    "all_rights_reserved": {
        "source": "All rights reserved",
        "en": "All rights reserved",
        "fr": "Tous droits réservés",
        "de": "Alle Rechte vorbehalten",
        "es": "Todos los derechos reservados",
        "it": "Tutti i diritti riservati",
        "pt": "Todos os direitos reservados",
        "ru": "Все права защищены",
        "hi": "सर्वाधिकार सुरक्षित",
        "tr": "Tüm hakları saklıdır",
        "ar": "جميع الحقوق محفوظة"
    },
    "join_telegram": {
        "source": "Join Our Telegram Channel",
        "en": "Join Our Telegram Channel",
        "fr": "Rejoignez notre chaîne Telegram",
        "de": "Abonnieren Sie unseren Telegram-Kanal",
        "es": "Únete a nuestro canal de Telegram",
        "it": "Unisciti al nostro canale Telegram",
        "pt": "Junte-se ao nosso canal do Telegram",
        "ru": "Присоединяйтесь к нашему каналу Telegram",
        "hi": "हमारे टेलीग्राम चैनल से जुड़ें",
        "tr": "Telegram Kanalımıza Katılın",
        "ar": "انضم إلى قناتنا على تيليجرام"
    },
    "homepage_seo_title": {
        "source": "التقرير جولد: تطبيق أسعار الذهب اليوم لحظة بلحظة | AlTaqrer Gold",
        "ar": "التقرير جولد: تطبيق أسعار الذهب اليوم لحظة بلحظة | AlTaqrer Gold",
        "en": "Today's Gold Price | Live Gold Rates – AlTaqrer Gold",
        "fr": "Prix de l’or aujourd’hui | Cours de l’or en direct – AlTaqrer Gold",
        "de": "Goldpreis heute | Aktuelle Goldkurse live – AlTaqrer Gold",
        "es": "Precio del oro hoy | Cotización del oro en vivo – AlTaqrer Gold",
        "it": "Prezzo dell’oro oggi | Quotazione oro in tempo reale – AlTaqrer Gold",
        "pt": "Preço do ouro hoje | Cotação do ouro em tempo real – AlTaqrer Gold",
        "ru": "Цена золота сегодня | Курс золота онлайн – AlTaqrer Gold",
        "hi": "आज के सोने के भाव | लाइव गोल्ड रेट – AlTaqrer Gold",
        "tr": "Güncel Altın Fiyatları | Canlı Altın Kuru – AlTaqrer Gold"
    }
}
GOLDNOW_DICTIONARY;
            $dictionary = json_decode($json, true);
            return is_array($dictionary) ? $dictionary : array();
        }

        public static function default_blocks() {
            return array(
                'live_intro' => array(
                    'source' => 'The gold tracker monitors the latest gold-price movements in {country} using regional market data and the international benchmark.',
                    'ar' => 'يتابع مؤشر الذهب أحدث تحركات أسعار الذهب في {country} بالاعتماد على بيانات الأسواق الإقليمية والسعر العالمي المرجعي.',
                    'en' => 'The gold tracker monitors the latest gold-price movements in {country} using regional market data and the international benchmark.',
                    'fr' => 'Le suivi de l’or présente les dernières évolutions des prix à {country}, à partir des données régionales et de la référence internationale.',
                    'de' => 'Der Goldtracker zeigt die neuesten Goldpreisbewegungen in {country} anhand regionaler Marktdaten und des internationalen Referenzpreises.',
                    'es' => 'El seguimiento del oro muestra los últimos movimientos de precios en {country} mediante datos regionales y la referencia internacional.',
                    'it' => 'Il monitoraggio dell’oro mostra gli ultimi movimenti dei prezzi in {country} usando dati regionali e il riferimento internazionale.',
                    'pt' => 'O acompanhamento do ouro mostra os movimentos mais recentes dos preços em {country}, com dados regionais e a referência internacional.',
                    'ru' => 'Индикатор золота показывает последние изменения цен в регионе {country} на основе местных данных и международного ориентира.',
                    'hi' => 'गोल्ड ट्रैकर क्षेत्रीय बाजार डेटा और अंतरराष्ट्रीय संदर्भ दर के आधार पर {country} में सोने की कीमतों की नवीनतम गतिविधि दिखाता है।',
                    'tr' => 'Altın takip aracı, bölgesel piyasa verileri ve uluslararası referans fiyatıyla {country} altın fiyatlarındaki son hareketleri gösterir.'
                ),
                'live_categories' => array(
                    'source' => 'This report covers 21K, 22K, 18K and 14K gold, along with bullion, coins and daily market movements.',
                    'ar' => 'يعرض هذا التقرير أسعار عيارات 21 و22 و18 و14، إلى جانب السبائك والعملات الذهبية وحركة السوق اليومية.',
                    'en' => 'This report covers 21K, 22K, 18K and 14K gold, along with bullion, coins and daily market movements.',
                    'fr' => 'Ce rapport couvre l’or 21, 22, 18 et 14 carats, ainsi que les lingots, les pièces et les mouvements quotidiens du marché.',
                    'de' => 'Dieser Bericht umfasst 21-, 22-, 18- und 14-karätiges Gold sowie Barren, Münzen und tägliche Marktbewegungen.',
                    'es' => 'Este informe incluye oro de 21, 22, 18 y 14 quilates, además de lingotes, monedas y movimientos diarios del mercado.',
                    'it' => 'Questo rapporto include oro a 21, 22, 18 e 14 carati, oltre a lingotti, monete e movimenti giornalieri del mercato.',
                    'pt' => 'Este relatório abrange ouro de 21, 22, 18 e 14 quilates, além de barras, moedas e movimentos diários do mercado.',
                    'ru' => 'В отчете представлены цены на золото 21, 22, 18 и 14 проб, а также на слитки и монеты и ежедневные изменения рынка.',
                    'hi' => 'इस रिपोर्ट में 21K, 22K, 18K और 14K सोना, गोल्ड बार, सिक्के और बाजार की दैनिक गतिविधियां शामिल हैं।',
                    'tr' => 'Bu rapor 21, 22, 18 ve 14 ayar altının yanı sıra külçeleri, sikkeleri ve günlük piyasa hareketlerini kapsar.'
                ),
                'live_24k' => array(
                    'source' => 'The 24K gold gram reference is {price} {currency}, equivalent to {usd} USD. It is the main purity benchmark for bullion.',
                    'ar' => 'يبلغ السعر المرجعي لجرام الذهب عيار 24 نحو {price} {currency}، بما يعادل {usd} دولارًا أمريكيًا. وهو المعيار الأساسي لنقاء السبائك.',
                    'en' => 'The 24K gold gram reference is {price} {currency}, equivalent to {usd} USD. It is the main purity benchmark for bullion.',
                    'fr' => 'La référence du gramme d’or 24 carats est de {price} {currency}, soit {usd} USD. Elle sert de norme principale pour les lingots.',
                    'de' => 'Der Referenzpreis für ein Gramm 24-karätiges Gold beträgt {price} {currency}, entsprechend {usd} USD. Er ist der wichtigste Reinheitsmaßstab für Barren.',
                    'es' => 'El precio de referencia del gramo de oro de 24 quilates es {price} {currency}, equivalente a {usd} USD. Es la referencia principal para los lingotes.',
                    'it' => 'Il prezzo di riferimento del grammo d’oro 24 carati è {price} {currency}, pari a {usd} USD. È il principale standard di purezza per i lingotti.',
                    'pt' => 'O preço de referência do grama de ouro de 24 quilates é {price} {currency}, equivalente a {usd} USD. É o padrão principal de pureza para barras.',
                    'ru' => 'Справочная цена грамма золота 24 карата составляет {price} {currency}, или {usd} USD. Это основной стандарт чистоты для слитков.',
                    'hi' => '24 कैरेट सोने के एक ग्राम का संदर्भ मूल्य {price} {currency} है, जो {usd} USD के बराबर है। यह गोल्ड बार के लिए मुख्य शुद्धता मानक है।',
                    'tr' => '24 ayar altının gram referans fiyatı {price} {currency}, yani {usd} USD’dir. Külçeler için temel saflık ölçütüdür.'
                ),
                'live_ounce' => array(
                    'source' => 'The global gold ounce is {price} USD for approximately 31.1 grams of 24K gold. Local prices are converted separately.',
                    'ar' => 'يبلغ سعر أونصة الذهب العالمية {price} دولارًا أمريكيًا، وهي تعادل نحو 31.1 جرامًا من الذهب عيار 24. وتُحسب الأسعار المحلية بصورة منفصلة.',
                    'en' => 'The global gold ounce is {price} USD for approximately 31.1 grams of 24K gold. Local prices are converted separately.',
                    'fr' => 'L’once mondiale d’or vaut {price} USD pour environ 31,1 grammes d’or 24 carats. Les prix locaux sont convertis séparément.',
                    'de' => 'Die weltweite Goldunze kostet {price} USD für etwa 31,1 Gramm 24-karätiges Gold. Lokale Preise werden separat umgerechnet.',
                    'es' => 'La onza mundial de oro cuesta {price} USD por unos 31,1 gramos de oro de 24 quilates. Los precios locales se convierten por separado.',
                    'it' => 'L’oncia mondiale d’oro vale {price} USD per circa 31,1 grammi di oro 24 carati. I prezzi locali vengono convertiti separatamente.',
                    'pt' => 'A onça mundial de ouro custa {price} USD por cerca de 31,1 gramas de ouro de 24 quilates. Os preços locais são convertidos separadamente.',
                    'ru' => 'Мировая цена унции золота составляет {price} USD за примерно 31,1 грамма золота 24 карата. Местные цены пересчитываются отдельно.',
                    'hi' => 'लगभग 31.1 ग्राम 24 कैरेट सोने की वैश्विक कीमत {price} USD है। स्थानीय कीमतों की गणना अलग से की जाती है।',
                    'tr' => 'Küresel altın onsu, yaklaşık 31,1 gram 24 ayar altın için {price} USD’dir. Yerel fiyatlar ayrı hesaplanır.'
                ),
                'live_coin' => array(
                    'source' => 'The standard gold coin reference uses an 8-gram weight. Its indicative 21K value is {price} {currency}.',
                    'ar' => 'يعتمد الحساب القياسي للعملة الذهبية على وزن 8 جرامات. وتبلغ قيمتها التقديرية بعيار 21 نحو {price} {currency}.',
                    'en' => 'The standard gold coin reference uses an 8-gram weight. Its indicative 21K value is {price} {currency}.',
                    'fr' => 'La référence standard de la pièce d’or utilise un poids de 8 grammes. Sa valeur indicative en 21 carats est de {price} {currency}.',
                    'de' => 'Die Standardreferenz für die Goldmünze verwendet ein Gewicht von 8 Gramm. Ihr Richtwert bei 21 Karat beträgt {price} {currency}.',
                    'es' => 'La referencia estándar de la moneda de oro utiliza un peso de 8 gramos. Su valor orientativo de 21 quilates es {price} {currency}.',
                    'it' => 'Il riferimento standard della moneta d’oro utilizza un peso di 8 grammi. Il valore indicativo a 21 carati è {price} {currency}.',
                    'pt' => 'A referência padrão da moeda de ouro utiliza um peso de 8 gramas. O seu valor indicativo de 21 quilates é {price} {currency}.',
                    'ru' => 'В стандартном расчете золотой монеты используется вес 8 граммов. Ее ориентировочная стоимость 21 пробы составляет {price} {currency}.',
                    'hi' => 'सोने के सिक्के के मानक संदर्भ में 8 ग्राम वजन का उपयोग होता है। 21 कैरेट में इसका अनुमानित मूल्य {price} {currency} है।',
                    'tr' => 'Standart altın sikke referansı 8 gram ağırlık kullanır. 21 ayar için gösterge niteliğindeki değeri {price} {currency}’dir.'
                ),
                'live_index' => array(
                    'source' => 'The gold market index compares common karat values with the international benchmark. A single snapshot does not establish a future trend.',
                    'ar' => 'يقارن مؤشر سوق الذهب قيم العيارات الشائعة بالسعر العالمي المرجعي. ولا تكفي قراءة واحدة لإثبات اتجاه مستقبلي للسوق.',
                    'en' => 'The gold market index compares common karat values with the international benchmark. A single snapshot does not establish a future trend.',
                    'fr' => 'L’indice du marché de l’or compare les titrages courants à la référence internationale. Une seule observation ne permet pas d’établir une tendance future.',
                    'de' => 'Der Goldmarktindex vergleicht gängige Karatwerte mit dem internationalen Referenzpreis. Eine einzelne Momentaufnahme belegt keinen zukünftigen Trend.',
                    'es' => 'El índice del mercado del oro compara quilates habituales con la referencia internacional. Una sola lectura no determina una tendencia futura.',
                    'it' => 'L’indice del mercato dell’oro confronta le carature comuni con il riferimento internazionale. Una singola rilevazione non stabilisce una tendenza futura.',
                    'pt' => 'O índice do mercado do ouro compara quilates comuns com a referência internacional. Uma única leitura não determina uma tendência futura.',
                    'ru' => 'Индекс рынка золота сопоставляет распространенные пробы с международным ориентиром. Одного снимка недостаточно для определения будущего тренда.',
                    'hi' => 'गोल्ड मार्केट इंडेक्स सामान्य कैरेट कीमतों की तुलना अंतरराष्ट्रीय संदर्भ दर से करता है। एक बार का आंकड़ा भविष्य की प्रवृत्ति तय नहीं करता।',
                    'tr' => 'Altın piyasa endeksi yaygın ayar değerlerini uluslararası referansla karşılaştırır. Tek bir görünüm gelecekteki eğilimi göstermez.'
                ),
                'live_exchange' => array(
                    'source' => 'The USD exchange-rate reference in {country} is {rate} {currency} per US dollar, based on the latest available market data.',
                    'ar' => 'يبلغ سعر صرف الدولار المرجعي في {country} نحو {rate} {currency} لكل دولار أمريكي، وفق أحدث بيانات السوق المتاحة.',
                    'en' => 'The USD exchange-rate reference in {country} is {rate} {currency} per US dollar, based on the latest available market data.',
                    'fr' => 'Le taux de référence du dollar à {country} est de {rate} {currency} par dollar américain, selon les dernières données disponibles.',
                    'de' => 'Der USD-Referenzwechselkurs in {country} beträgt {rate} {currency} je US-Dollar, basierend auf den neuesten verfügbaren Marktdaten.',
                    'es' => 'El tipo de cambio de referencia del USD en {country} es {rate} {currency} por dólar estadounidense, según los últimos datos disponibles.',
                    'it' => 'Il tasso di cambio di riferimento USD in {country} è {rate} {currency} per dollaro statunitense, secondo gli ultimi dati disponibili.',
                    'pt' => 'A taxa de câmbio de referência do USD em {country} é {rate} {currency} por dólar americano, segundo os dados mais recentes.',
                    'ru' => 'Справочный курс USD в регионе {country} составляет {rate} {currency} за доллар США по последним доступным рыночным данным.',
                    'hi' => '{country} में USD की संदर्भ विनिमय दर प्रति अमेरिकी डॉलर {rate} {currency} है, जो उपलब्ध नवीनतम बाजार डेटा पर आधारित है।',
                    'tr' => '{country} için USD referans kuru, mevcut en son piyasa verilerine göre ABD doları başına {rate} {currency}’dir.'
                ),
                'chart_note' => array(
                    'source' => 'Charts show indicative market movements. Local prices may differ because of exchange rates, premiums and market conditions.',
                    'ar' => 'تعرض الرسوم البيانية تحركات السوق الاسترشادية. وقد تختلف الأسعار المحلية بسبب أسعار الصرف والعلاوات وظروف السوق.',
                    'en' => 'Charts show indicative market movements. Local prices may differ because of exchange rates, premiums and market conditions.',
                    'fr' => 'Les graphiques montrent les mouvements indicatifs du marché. Les prix locaux peuvent varier selon les taux de change, les primes et les conditions du marché.',
                    'de' => 'Die Diagramme zeigen indikative Marktbewegungen. Lokale Preise können aufgrund von Wechselkursen, Aufschlägen und Marktbedingungen abweichen.',
                    'es' => 'Los gráficos muestran movimientos indicativos del mercado. Los precios locales pueden variar por tipos de cambio, primas y condiciones del mercado.',
                    'it' => 'I grafici mostrano movimenti indicativi del mercato. I prezzi locali possono variare per tassi di cambio, premi e condizioni di mercato.',
                    'pt' => 'Os gráficos mostram movimentos indicativos do mercado. Os preços locais podem variar devido a taxas de câmbio, prémios e condições do mercado.',
                    'ru' => 'Графики показывают ориентировочные движения рынка. Местные цены могут отличаться из-за валютных курсов, премий и рыночных условий.',
                    'hi' => 'चार्ट बाजार की संकेतात्मक गतिविधियां दिखाते हैं। विनिमय दर, प्रीमियम और बाजार की स्थितियों के कारण स्थानीय कीमतें अलग हो सकती हैं।',
                    'tr' => 'Grafikler gösterge niteliğindeki piyasa hareketlerini gösterir. Yerel fiyatlar döviz kurları, primler ve piyasa koşulları nedeniyle farklı olabilir.'
                ),
                'chart_loading' => array(
                    'source' => 'Loading gold charts...',
                    'ar' => 'جارٍ تحميل مخططات الذهب...',
                    'en' => 'Loading gold charts...',
                    'fr' => 'Chargement des graphiques de l’or...',
                    'de' => 'Golddiagramme werden geladen...',
                    'es' => 'Cargando gráficos del oro...',
                    'it' => 'Caricamento dei grafici dell’oro...',
                    'pt' => 'A carregar os gráficos do ouro...',
                    'ru' => 'Загрузка графиков золота...',
                    'hi' => 'सोने के चार्ट लोड हो रहे हैं...',
                    'tr' => 'Altın grafikleri yükleniyor...'
                ),
                'chart_error' => array(
                    'source' => 'The chart data could not be loaded. Please try again.',
                    'ar' => 'تعذر تحميل بيانات الرسم البياني. يُرجى المحاولة مرة أخرى.',
                    'en' => 'The chart data could not be loaded. Please try again.',
                    'fr' => 'Impossible de charger les données du graphique. Veuillez réessayer.',
                    'de' => 'Die Diagrammdaten konnten nicht geladen werden. Bitte versuchen Sie es erneut.',
                    'es' => 'No se pudieron cargar los datos del gráfico. Inténtalo de nuevo.',
                    'it' => 'Impossibile caricare i dati del grafico. Riprova.',
                    'pt' => 'Não foi possível carregar os dados do gráfico. Tente novamente.',
                    'ru' => 'Не удалось загрузить данные графика. Повторите попытку.',
                    'hi' => 'चार्ट डेटा लोड नहीं हो सका। कृपया फिर से प्रयास करें।',
                    'tr' => 'Grafik verileri yüklenemedi. Lütfen tekrar deneyin.'
                ),
                'price_local_label' => array(
                    'source' => 'Price in Local Currency',
                    'ar' => 'السعر بالعملة المحلية',
                    'en' => 'Price in Local Currency',
                    'fr' => 'Prix en monnaie locale',
                    'de' => 'Preis in Landeswährung',
                    'es' => 'Precio en moneda local',
                    'it' => 'Prezzo in valuta locale',
                    'pt' => 'Preço em moeda local',
                    'ru' => 'Цена в местной валюте',
                    'hi' => 'स्थानीय मुद्रा में कीमत',
                    'tr' => 'Yerel Para Biriminde Fiyat'
                ),
                'price_usd_label' => array(
                    'source' => 'Equivalent in US Dollars',
                    'ar' => 'ما يعادله بالدولار الأمريكي',
                    'en' => 'Equivalent in US Dollars',
                    'fr' => 'Équivalent en dollars américains',
                    'de' => 'Gegenwert in US-Dollar',
                    'es' => 'Equivalente en dólares estadounidenses',
                    'it' => 'Equivalente in dollari statunitensi',
                    'pt' => 'Equivalente em dólares americanos',
                    'ru' => 'Эквивалент в долларах США',
                    'hi' => 'अमेरिकी डॉलर में समतुल्य',
                    'tr' => 'ABD Doları Karşılığı'
                ),
                'currency_usd' => array(
                    'source' => 'US Dollar',
                    'ar' => 'الدولار الأمريكي',
                    'en' => 'US Dollar',
                    'fr' => 'Dollar américain',
                    'de' => 'US-Dollar',
                    'es' => 'Dólar estadounidense',
                    'it' => 'Dollaro statunitense',
                    'pt' => 'Dólar americano',
                    'ru' => 'Доллар США',
                    'hi' => 'अमेरिकी डॉलर',
                    'tr' => 'ABD Doları'
                ),
                'currency_gbp' => array(
                    'source' => 'British Pound',
                    'ar' => 'الجنيه الإسترليني',
                    'en' => 'British Pound',
                    'fr' => 'Livre sterling',
                    'de' => 'Britisches Pfund',
                    'es' => 'Libra esterlina',
                    'it' => 'Sterlina britannica',
                    'pt' => 'Libra esterlina',
                    'ru' => 'Британский фунт',
                    'hi' => 'ब्रिटिश पाउंड',
                    'tr' => 'İngiliz Sterlini'
                ),
                'currency_sar' => array(
                    'source' => 'Saudi Riyal',
                    'ar' => 'الريال السعودي',
                    'en' => 'Saudi Riyal',
                    'fr' => 'Riyal saoudien',
                    'de' => 'Saudi-Riyal',
                    'es' => 'Riyal saudí',
                    'it' => 'Riyal saudita',
                    'pt' => 'Riyal saudita',
                    'ru' => 'Саудовский риял',
                    'hi' => 'सऊदी रियाल',
                    'tr' => 'Suudi Riyali'
                ),
                "currency_bhd" => {"source":"Bahraini Dinar","en":"Bahraini Dinar","ar":"الدينار البحريني","fr":"Dinar bahreïni","de":"Bahrain-Dinar","es":"Dinar bareiní","it":"Dinaro del Bahrein","pt":"Dinar bareinita","ru":"Бахрейнский динар","hi":"बहरीनी दीनार","tr":"Bahreyn Dinarı"},
                "currency_omr" => {"source":"Omani Rial","en":"Omani Rial","ar":"الريال العماني","fr":"Rial omanais","de":"Omanischer Rial","es":"Rial omaní","it":"Rial omanita","pt":"Rial omanita","ru":"Оманский риал","hi":"ओमानी रियाल","tr":"Umman Riyali"},
                "currency_aed" => {"source":"UAE Dirham","en":"UAE Dirham","ar":"الدرهم الإماراتي","fr":"Dirham des Émirats","de":"VAE-Dirham","es":"Dírham de los EAU","it":"Dirham degli EAU","pt":"Dirham dos EAU","ru":"Дирхам ОАЭ","hi":"यूएई दिरहम","tr":"BAE Dirhemi"},
                "currency_kwd" => {"source":"Kuwaiti Dinar","en":"Kuwaiti Dinar","ar":"الدينار الكويتي","fr":"Dinar koweïtien","de":"Kuwaitischer Dinar","es":"Dinar kuwaití","it":"Dinaro kuwaitiano","pt":"Dinar kuwaitiano","ru":"Кувейтский динар","hi":"कुवैती दीनार","tr":"Kuveyt Dinarı"},
                "currency_qar" => {"source":"Qatari Riyal","en":"Qatari Riyal","ar":"الريال القطري","fr":"Riyal qatari","de":"Katar-Riyal","es":"Riyal catarí","it":"Riyal qatariota","pt":"Rial do Qatar","ru":"Катарский риал","hi":"कतरी रियाल","tr":"Katar Riyali"},
                "currency_jpy" => {"source":"Japanese Yen","en":"Japanese Yen","ar":"الين الياباني","fr":"Yen japonais","de":"Japanischer Yen","es":"Yen japonés","it":"Yen giapponese","pt":"Iene japonês","ru":"Японская иена","hi":"जापानी येन","tr":"Japon Yeni"},
                "value_label" => {"source":"Value","en":"Value","ar":"القيمة","fr":"Valeur","de":"Wert","es":"Valor","it":"Valore","pt":"Valor","ru":"Значение","hi":"मूल्य","tr":"Değer"},
                "international_spot" => {"source":"International Spot Price","en":"International Spot Price","ar":"السعر الفوري العالمي","fr":"Prix spot international","de":"Internationaler Spotpreis","es":"Precio spot internacional","it":"Prezzo spot internazionale","pt":"Preço spot internacional","ru":"Мировая спотовая цена","hi":"अंतरराष्ट्रीय स्पॉट मूल्य","tr":"Uluslararası Spot Fiyat"},
                "quote_currency" => {"source":"Quote Currency","en":"Quote Currency","ar":"عملة التسعير","fr":"Devise de cotation","de":"Notierungswährung","es":"Moneda de cotización","it":"Valuta di quotazione","pt":"Moeda de cotação","ru":"Валюта котировки","hi":"कोटेशन मुद्रा","tr":"Kotasyon Para Birimi"},
                "flag_of_country" => {"source":"Flag of {country}","en":"Flag of {country}","ar":"علم {country}","fr":"Drapeau de {country}","de":"Flagge von {country}","es":"Bandera de {country}","it":"Bandiera di {country}","pt":"Bandeira de {country}","ru":"Флаг: {country}","hi":"{country} का ध्वज","tr":"{country} Bayrağı"},
                "gold_index_heading" => {"source":"Live Gold Market Index in {country}","en":"Live Gold Market Index in {country}","ar":"مؤشر سوق الذهب المباشر في {country}","fr":"Indice du marché de l’or en direct à {country}","de":"Live-Goldmarktindex in {country}","es":"Índice del mercado del oro en directo en {country}","it":"Indice del mercato dell’oro in tempo reale in {country}","pt":"Índice do mercado do ouro em tempo real em {country}","ru":"Текущий индекс рынка золота в регионе {country}","hi":"{country} में लाइव गोल्ड मार्केट इंडेक्स","tr":"{country} Canlı Altın Piyasa Endeksi"},
                "gold_bullion_heading" => {"source":"Gold Bullion Bar Prices Today in {country} (Pure 24K Gold)","en":"Gold Bullion Bar Prices Today in {country} (Pure 24K Gold)","ar":"أسعار سبائك الذهب اليوم في {country} (ذهب عيار 24 خالص)","fr":"Prix des lingots d’or aujourd’hui à {country} (or pur 24 carats)","de":"Goldbarrenpreise heute in {country} (reines 24-Karat-Gold)","es":"Precios de lingotes de oro hoy en {country} (oro puro de 24 quilates)","it":"Prezzi dei lingotti d’oro oggi in {country} (oro puro 24 carati)","pt":"Preços das barras de ouro hoje em {country} (ouro puro de 24 quilates)","ru":"Цены на золотые слитки сегодня в регионе {country} (чистое золото 24 карата)","hi":"{country} में आज सोने की छड़ों की कीमतें (शुद्ध 24 कैरेट सोना)","tr":"{country} Bugünkü Altın Külçe Fiyatları (Saf 24 Ayar Altın)"},
                "gold_coin_heading" => {"source":"Gold Coin Price Today in {country} (Standard 8-Gram Weight)","en":"Gold Coin Price Today in {country} (Standard 8-Gram Weight)","ar":"سعر العملة الذهبية اليوم في {country} (الوزن القياسي 8 جرامات)","fr":"Prix de la pièce d’or aujourd’hui à {country} (poids standard de 8 grammes)","de":"Goldmünzenpreis heute in {country} (Standardgewicht 8 Gramm)","es":"Precio de la moneda de oro hoy en {country} (peso estándar de 8 gramos)","it":"Prezzo della moneta d’oro oggi in {country} (peso standard di 8 grammi)","pt":"Preço da moeda de ouro hoje em {country} (peso padrão de 8 gramas)","ru":"Цена золотой монеты сегодня в регионе {country} (стандартный вес 8 граммов)","hi":"{country} में आज सोने के सिक्के की कीमत (मानक 8 ग्राम वजन)","tr":"{country} Bugünkü Altın Sikke Fiyatı (Standart 8 Gram Ağırlık)"},
                "exchange_rates_heading" => {"source":"Live Exchange Rates against {currency} in {country}","en":"Live Exchange Rates against {currency} in {country}","ar":"أسعار الصرف المباشرة مقابل {currency} في {country}","fr":"Taux de change en direct par rapport au {currency} à {country}","de":"Live-Wechselkurse gegenüber {currency} in {country}","es":"Tipos de cambio en directo frente a {currency} en {country}","it":"Tassi di cambio in tempo reale rispetto a {currency} in {country}","pt":"Taxas de câmbio em tempo real face a {currency} em {country}","ru":"Текущие курсы валют относительно {currency} в регионе {country}","hi":"{country} में {currency} के मुकाबले लाइव विनिमय दरें","tr":"{country} bölgesinde {currency} karşısındaki canlı döviz kurları"},
                "live_report_heading" => {"source":"Live Report for {karat} Gold Price per Gram Today in {country}","en":"Live Report for {karat} Gold Price per Gram Today in {country}","ar":"تقرير مباشر لسعر جرام الذهب عيار {karat} اليوم في {country}","fr":"Rapport en direct sur le prix du gramme d’or {karat} carats aujourd’hui à {country}","de":"Live-Bericht zum heutigen Grammpreis für {karat}-Karat-Gold in {country}","es":"Informe en directo del precio por gramo de oro de {karat} quilates hoy en {country}","it":"Rapporto in tempo reale sul prezzo al grammo dell’oro a {karat} carati oggi in {country}","pt":"Relatório em direto do preço por grama do ouro de {karat} quilates hoje em {country}","ru":"Текущий отчет о цене грамма золота {karat} карата сегодня в регионе {country}","hi":"{country} में आज {karat} कैरेट सोने के प्रति ग्राम मूल्य की लाइव रिपोर्ट","tr":"{country} için bugün {karat} ayar altının gram fiyatı canlı raporu"},
                "gold_bar_weight" => {"source":"Gold Bar — {weight} Grams","en":"Gold Bar — {weight} Grams","ar":"سبيكة ذهب — {weight} جرام","fr":"Lingot d’or — {weight} grammes","de":"Goldbarren — {weight} Gramm","es":"Lingote de oro — {weight} gramos","it":"Lingotto d’oro — {weight} grammi","pt":"Barra de ouro — {weight} gramas","ru":"Золотой слиток — {weight} граммов","hi":"सोने की छड़ — {weight} ग्राम","tr":"Altın Külçe — {weight} Gram"},
                "gold_coin_karat" => {"source":"{karat}K Gold Coin (8g)","en":"{karat}K Gold Coin (8g)","ar":"عملة ذهبية عيار {karat} (8 جرامات)","fr":"Pièce d’or {karat} carats (8 g)","de":"{karat}-Karat-Goldmünze (8 g)","es":"Moneda de oro de {karat} quilates (8 g)","it":"Moneta d’oro {karat} carati (8 g)","pt":"Moeda de ouro de {karat} quilates (8 g)","ru":"Золотая монета {karat} пробы (8 г)","hi":"{karat} कैरेट सोने का सिक्का (8 ग्राम)","tr":"{karat} Ayar Altın Sikke (8 g)"},
                'currency_eur' => array(
                    'source' => 'Euro',
                    'ar' => 'اليورو',
                    'en' => 'Euro',
                    'fr' => 'Euro',
                    'de' => 'Euro',
                    'es' => 'Euro',
                    'it' => 'Euro',
                    'pt' => 'Euro',
                    'ru' => 'Евро',
                    'hi' => 'यूरो',
                    'tr' => 'Euro'
                )
            );
        }

        public function enabled_languages() {
            $saved = get_option(self::OPTION_ENABLED, array_keys(self::languages()));
            if (!is_array($saved)) {
                $saved = array_keys(self::languages());
            }
            $saved = array_values(array_unique(array_intersect(array_keys(self::languages()), array_map('sanitize_key', $saved))));
            if (!in_array('ar', $saved, true)) {
                array_unshift($saved, 'ar');
            }
            return $saved;
        }

        public function default_language() {
            $language = sanitize_key((string) get_option(self::OPTION_DEFAULT, 'ar'));
            return isset(self::languages()[$language]) ? $language : 'ar';
        }

        public function current_language() {
            $uri = isset($_SERVER['REQUEST_URI']) ? wp_unslash($_SERVER['REQUEST_URI']) : '/';
            $path = trim((string) parse_url($uri, PHP_URL_PATH), '/');
            $segments = ($path === '') ? array() : explode('/', $path);
            $first = isset($segments[0]) ? strtolower(sanitize_key($segments[0])) : '';
            $enabled = $this->enabled_languages();
            if ($first !== '' && in_array($first, $enabled, true)) {
                return $first;
            }
            return $this->default_language();
        }

        public function is_rtl($language = null) {
            $language = $language ? sanitize_key($language) : $this->current_language();
            $languages = self::languages();
            return isset($languages[$language]) ? (bool) $languages[$language]['rtl'] : false;
        }

        public function translations() {
            if ($this->translations_cache !== null) {
                return $this->translations_cache;
            }
            $saved = get_option(self::OPTION_TRANSLATIONS, array());
            $this->translations_cache = is_array($saved) ? $saved : array();
            return $this->translations_cache;
        }

        public function translate($key, $language = null, $fallback = null, $replacements = array()) {
            $key = sanitize_key($key);
            if ($key === '') {
                return '';
            }
            $language = $language ? sanitize_key($language) : $this->current_language();
            if (!isset(self::languages()[$language])) {
                $language = $this->default_language();
            }
            $dictionary = $this->translations();
            $entry = (isset($dictionary[$key]) && is_array($dictionary[$key])) ? $dictionary[$key] : array();
            $value = '';
            if (isset($entry[$language]) && is_scalar($entry[$language])) {
                $value = (string) $entry[$language];
            }
            // Strict locale behavior: never fall back to Arabic on a non-Arabic page.
            if ($value === '' && $language !== 'ar' && isset($entry['en']) && is_scalar($entry['en'])) {
                $value = (string) $entry['en'];
            }
            if ($value === '' && $language === 'ar' && isset($entry['ar']) && is_scalar($entry['ar'])) {
                $value = (string) $entry['ar'];
            }
            if ($value === '' && isset($entry['source']) && is_scalar($entry['source'])) {
                $source_value = (string) $entry['source'];
                if ($language === 'ar' || !preg_match('/[\\x{0600}-\\x{06FF}]/u', $source_value)) {
                    $value = $source_value;
                }
            }
            if ($value === '') {
                $value = ($fallback !== null) ? (string) $fallback : $key;
            }
            if (is_array($replacements)) {
                foreach ($replacements as $name => $replacement) {
                    if (is_scalar($replacement)) {
                        $value = str_replace('{' . sanitize_key($name) . '}', (string) $replacement, $value);
                    }
                }
            }
            return apply_filters('goldnow_language_manager_translation', $value, $key, $language, $entry);
        }

        public function translate_text($source_text, $language = null) {
            $source_text = (string) $source_text;
            if ($source_text === '') {
                return $source_text;
            }
            $language = $language ? sanitize_key($language) : $this->current_language();
            foreach ($this->translations() as $key => $entry) {
                if (!is_array($entry)) {
                    continue;
                }
                // Match the text against every known locale value so an English
                // template can be translated without rewriting its original wording.
                $matched = false;
                foreach (array_merge(array('source'), array_keys(self::languages())) as $locale_key) {
                    if (isset($entry[$locale_key]) && is_scalar($entry[$locale_key]) && (string) $entry[$locale_key] !== '' && $source_text === (string) $entry[$locale_key]) {
                        $matched = true;
                        break;
                    }
                }
                if ($matched) {
                    // The original English text is a safe fallback for non-Arabic locales;
                    // never pass an Arabic source string as a fallback to a non-Arabic page.
                    $safe_fallback = ($language === 'ar' || !preg_match('/[\\x{0600}-\\x{06FF}]/u', $source_text))
                        ? $source_text
                        : null;
                    return $this->translate($key, $language, $safe_fallback);
                }
            }
            return apply_filters('goldnow_language_manager_unmatched_text', $source_text, $language);
        }

        /**
         * Allow the same common content structure and safe inline styling used
         * by the template while keeping scripts, event handlers and unsafe URLs out.
         */
        private function allowed_block_html() {
            $allowed = wp_kses_allowed_html('post');
            $tags = array('div','span','section','article','header','footer','nav','h2','h3','h4','p','ul','ol','li','table','thead','tbody','tr','th','td','small','strong','b','em','i','u','a','br','hr','details','summary','blockquote');
            foreach ($tags as $tag) {
                if (!isset($allowed[$tag]) || !is_array($allowed[$tag])) {
                    $allowed[$tag] = array();
                }
                foreach (array('class','id','style','dir','lang','title','role') as $attribute) {
                    $allowed[$tag][$attribute] = true;
                }
            }
            if (isset($allowed['a'])) {
                foreach (array('href','target','rel') as $attribute) {
                    $allowed['a'][$attribute] = true;
                }
            }
            return $allowed;
        }

        /**
         * Translate a complete HTML/text block. Unlike the short dictionary,
         * blocks preserve safe post HTML and multiline content.
         */
        public function translate_block($key, $language = null, $fallback = null, $replacements = array()) {
            $key = sanitize_key($key);
            if ($key === '') {
                return '';
            }
            $language = $language ? sanitize_key($language) : $this->current_language();
            if (!isset(self::languages()[$language])) {
                $language = $this->default_language();
            }
            $blocks = get_option('goldnow_mt_blocks', array());
            $entry = (is_array($blocks) && isset($blocks[$key]) && is_array($blocks[$key])) ? $blocks[$key] : array();
            $value = '';
            if (isset($entry[$language]) && is_scalar($entry[$language])) {
                $value = (string) $entry[$language];
            }
            // Never silently substitute Arabic on a non-Arabic page.
            if ($value === '' && isset($entry['source']) && is_scalar($entry['source'])) {
                $value = (string) $entry['source'];
            }
            if ($value === '' && $fallback !== null) {
                $value = (string) $fallback;
            }
            if (is_array($replacements)) {
                foreach ($replacements as $name => $replacement) {
                    if (is_scalar($replacement)) {
                        $value = str_replace('{' . sanitize_key($name) . '}', (string) $replacement, $value);
                    }
                }
            }
            return wp_kses($value, $this->allowed_block_html());
        }

        public function translation_block_shortcode($atts) {
            $atts = shortcode_atts(array('key' => '', 'lang' => '', 'fallback' => ''), $atts, 'goldnow_mt_translate_block');
            $fallback = ($atts['fallback'] !== '') ? $atts['fallback'] : null;
            return $this->translate_block($atts['key'], $atts['lang'] !== '' ? $atts['lang'] : null, $fallback);
        }

        private function sanitize_blocks($blocks) {
            if (!is_array($blocks)) {
                return new WP_Error('invalid_blocks', 'The blocks JSON root must be an object.');
            }
            $clean = array();
            $allowed = array_keys(self::languages());
            foreach ($blocks as $key => $entry) {
                $key = sanitize_key($key);
                if ($key === '' || !is_array($entry)) {
                    continue;
                }
                $clean[$key] = array();
                foreach (array_merge(array('source'), $allowed) as $code) {
                    if (isset($entry[$code]) && is_scalar($entry[$code])) {
                        $clean[$key][$code] = wp_kses((string) $entry[$code], $this->allowed_block_html());
                    }
                }
                if (empty($clean[$key])) {
                    unset($clean[$key]);
                }
            }
            return $clean;
        }

        public function language_url($language, $url = '') {
            $language = sanitize_key($language);
            if (!isset(self::languages()[$language])) {
                $language = $this->default_language();
            }
            $url = ($url !== '') ? $url : home_url(isset($_SERVER['REQUEST_URI']) ? wp_unslash($_SERVER['REQUEST_URI']) : '/');
            $parts = wp_parse_url($url);
            $path = isset($parts['path']) ? trim($parts['path'], '/') : '';
            $segments = ($path === '') ? array() : explode('/', $path);
            $enabled = $this->enabled_languages();
            if (isset($segments[0]) && in_array(strtolower($segments[0]), $enabled, true)) {
                array_shift($segments);
            }
            if ($language !== $this->default_language()) {
                array_unshift($segments, $language);
            }
            $new_path = '/' . implode('/', array_map('rawurlencode', $segments));
            if ($new_path !== '/') {
                $new_path .= '/';
            }
            $base = home_url($new_path);
            if (!empty($parts['query'])) {
                $base .= '?' . $parts['query'];
            }
            if (!empty($parts['fragment'])) {
                $base .= '#' . $parts['fragment'];
            }
            return $base;
        }

        public function translation_shortcode($atts) {
            $atts = shortcode_atts(array('key' => '', 'lang' => '', 'fallback' => ''), $atts, 'goldnow_mt_translate');
            $fallback = ($atts['fallback'] !== '') ? $atts['fallback'] : null;
            $value = $this->translate($atts['key'], $atts['lang'] !== '' ? $atts['lang'] : null, $fallback);
            return esc_html($value);
        }

        public function language_switcher_shortcode($atts) {
            $atts = shortcode_atts(array('current' => '1', 'class' => 'goldnow-language-switcher'), $atts, 'goldnow_mt_language_switcher');
            $current = $this->current_language();
            $items = array();
            foreach ($this->enabled_languages() as $code) {
                $meta = self::languages()[$code];
                $label = ($atts['current'] === '1') ? $meta['native'] : strtoupper($code);
                $class = ($code === $current) ? ' class="is-current" aria-current="page"' : '';
                $items[] = '<a' . $class . ' href="' . esc_url($this->language_url($code)) . '" lang="' . esc_attr($code) . '">' . esc_html($label) . '</a>';
            }
            return '<nav class="' . esc_attr($atts['class']) . '" aria-label="Language">' . implode(' ', $items) . '</nav>';
        }

        public function admin_menu() {
            add_options_page('GoldNow Multilingual Test Manager', 'GoldNow Multilingual Test', 'manage_options', self::MENU_SLUG, array($this, 'settings_page'));
        }

        private function sanitize_dictionary($dictionary) {
            if (!is_array($dictionary)) {
                return new WP_Error('invalid_dictionary', 'The JSON root must be an object of translation keys.');
            }
            $clean = array();
            $allowed = array_keys(self::languages());
            foreach ($dictionary as $key => $entry) {
                $key = sanitize_key($key);
                if ($key === '' || !is_array($entry)) {
                    continue;
                }
                $clean[$key] = array();
                if (isset($entry['source']) && is_scalar($entry['source'])) {
                    $clean[$key]['source'] = sanitize_text_field((string) $entry['source']);
                }
                foreach ($allowed as $code) {
                    if (isset($entry[$code]) && is_scalar($entry[$code])) {
                        $clean[$key][$code] = sanitize_text_field((string) $entry[$code]);
                    }
                }
                if (empty($clean[$key])) {
                    unset($clean[$key]);
                }
            }
            return $clean;
        }

        public function save_settings() {
            if (!current_user_can('manage_options')) {
                wp_die(esc_html__('You are not allowed to manage translations.', 'goldnow-language-manager'), 403);
            }
            check_admin_referer('goldnow_mt_save');

            $raw = isset($_POST['translations_json']) ? wp_unslash($_POST['translations_json']) : '{}';
            $decoded = json_decode($raw, true);
            if (!is_array($decoded) || json_last_error() !== JSON_ERROR_NONE) {
                $this->redirect_admin('invalid_json');
            }
            $clean = $this->sanitize_dictionary($decoded);
            if (is_wp_error($clean)) {
                $this->redirect_admin('invalid_json');
            }

            $enabled_raw = isset($_POST['enabled_languages']) ? (array) wp_unslash($_POST['enabled_languages']) : array('ar');
            $enabled = array_values(array_unique(array_intersect(array_keys(self::languages()), array_map('sanitize_key', $enabled_raw))));
            if (!in_array('ar', $enabled, true)) {
                array_unshift($enabled, 'ar');
            }
            $default = isset($_POST['default_language']) ? sanitize_key(wp_unslash($_POST['default_language'])) : 'ar';
            if (!in_array($default, $enabled, true)) {
                $default = 'ar';
            }

            update_option(self::OPTION_TRANSLATIONS, $clean, false);
            if (isset($_POST['blocks_json'])) {
                $blocks_raw = wp_unslash($_POST['blocks_json']);
                $blocks_decoded = json_decode($blocks_raw, true);
                if (is_array($blocks_decoded) && json_last_error() === JSON_ERROR_NONE) {
                    $blocks_clean = $this->sanitize_blocks($blocks_decoded);
                    if (!is_wp_error($blocks_clean)) {
                        update_option('goldnow_mt_blocks', $blocks_clean, false);
                    }
                }
            }
            update_option(self::OPTION_ENABLED, $enabled, false);
            update_option(self::OPTION_DEFAULT, $default, false);
            update_option(self::OPTION_TEMPLATE_TEST, !empty($_POST['enable_unified_template']), false);
            $this->translations_cache = null;
            $this->redirect_admin('saved');
        }

        private function redirect_admin($status) {
            wp_safe_redirect(add_query_arg(array('page' => self::MENU_SLUG, 'gnlm_status' => $status), admin_url('options-general.php')));
            exit;
        }

        public function export_dictionary() {
            if (!current_user_can('manage_options')) {
                wp_die(esc_html__('You are not allowed to export translations.', 'goldnow-language-manager'), 403);
            }
            check_admin_referer('goldnow_mt_export');
            nocache_headers();
            header('Content-Type: application/json; charset=utf-8');
            header('Content-Disposition: attachment; filename=goldnow-translations.json');
            echo wp_json_encode($this->translations(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            exit;
        }

        public function settings_page() {
            if (!current_user_can('manage_options')) {
                return;
            }
            $languages = self::languages();
            $enabled = $this->enabled_languages();
            $dictionary = $this->translations();
            $blocks = get_option('goldnow_mt_blocks', array());
            if (!is_array($blocks)) { $blocks = array(); }
            $template_enabled = (bool) get_option(self::OPTION_TEMPLATE_TEST, false);
            $status = isset($_GET['gnlm_status']) ? sanitize_key(wp_unslash($_GET['gnlm_status'])) : '';
            ?>
            <div class="wrap">
                <h1>GoldNow Multilingual Test Manager</h1>
                <p>قاموس ترجمة مركزي داخل الموقع. القوالب والإضافات تستدعي الترجمات من هذا المكان، ولا يتم تغيير أسعار الذهب أو حسابات Gold Manager.</p>
                <?php if ($status === 'saved') : ?><div class="notice notice-success is-dismissible"><p>تم حفظ إعدادات اللغات والترجمات.</p></div><?php elseif ($status === 'invalid_json') : ?><div class="notice notice-error"><p>ملف JSON غير صالح. لم يتم حفظ أي تغيير.</p></div><?php endif; ?>
                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <input type="hidden" name="action" value="goldnow_mt_save">
                    <?php wp_nonce_field('goldnow_mt_save'); ?>
                    <h2>اللغات المفعّلة</h2>
                    <p>العربية هي اللغة الافتراضية للمسارات التي لا تبدأ برمز لغة. يمكنك تعطيل أي لغة أخرى دون حذف ترجماتها.</p>
                    <fieldset style="display:flex;flex-wrap:wrap;gap:14px;margin:12px 0 20px">
                        <?php foreach ($languages as $code => $meta) : ?>
                            <label style="min-width:145px"><input type="checkbox" name="enabled_languages[]" value="<?php echo esc_attr($code); ?>" <?php checked(in_array($code, $enabled, true)); ?> <?php disabled($code === 'ar'); ?>> <?php echo esc_html($meta['native'] . ' (' . $code . ')'); ?><?php if ($code === 'ar') : ?><input type="hidden" name="enabled_languages[]" value="ar"><?php endif; ?></label>
                        <?php endforeach; ?>
                    </fieldset>
                    <label for="goldnow-lm-default"><strong>اللغة الافتراضية</strong></label>
                    <select id="goldnow-lm-default" name="default_language">
                        <?php foreach ($languages as $code => $meta) : ?><option value="<?php echo esc_attr($code); ?>" <?php selected($this->default_language(), $code); ?>><?php echo esc_html($meta['native'] . ' (' . $code . ')'); ?></option><?php endforeach; ?>
                    </select>
                    <h2 style="margin-top:28px">تجربة القالب الموحد</h2>
                    <label><input type="checkbox" name="enable_unified_template" value="1" <?php checked($template_enabled); ?>> تفعيل القالب الجديد لصفحات تصنيف الدول فقط (يتطلب نسخ ملف القالب إلى مجلد القالب النشط)</label>
                    <p class="description">اترك الخيار مغلقًا أثناء تجهيز الملفات. عند تفعيله، سيستخدم WordPress الملف الجديد بدل القالب الحالي لصفحات الدول فقط. يمكن إيقافه في أي وقت من نفس الصفحة.</p>
                    <h2 style="margin-top:28px">قاموس الترجمات</h2>
                    <p>كل مفتاح يحتوي على <code>source</code> للنص الأصلي، ثم الترجمات حسب رموز اللغات. احتفظ بالمفاتيح كما هي عند التعديل، ويمكنك إضافة مفاتيح جديدة.</p>
                    <textarea name="translations_json" spellcheck="false" rows="22" style="width:100%;max-width:1200px;font-family:monospace;direction:ltr;text-align:left"><?php echo esc_textarea(wp_json_encode($dictionary, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)); ?></textarea>
                    <h2 style="margin-top:28px">ترجمة الفقرات والمحتوى المنسق (HTML)</h2>
                    <p>استخدم هذا القسم للجمل الطويلة ومحتوى SEO. يدعم وسوم HTML الآمنة ومتغيرات مثل {country} و{price}. اترك ترجمة أي لغة فارغة ليظهر النص الأصلي الإنجليزي بدلًا من العربية.</p>
                    <textarea name="blocks_json" spellcheck="false" rows="22" style="width:100%;max-width:1200px;font-family:monospace;direction:ltr;text-align:left"><?php echo esc_textarea(wp_json_encode($blocks, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)); ?></textarea>
                    <?php submit_button('حفظ إعدادات الترجمة'); ?>
                </form>
                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="margin-top:12px">
                    <input type="hidden" name="action" value="goldnow_mt_export">
                    <?php wp_nonce_field('goldnow_mt_export'); ?>
                    <?php submit_button('تصدير القاموس كملف JSON', 'secondary'); ?>
                </form>
                <hr>
                <h2>طريقة الاستخدام</h2>
                <p><strong>داخل ملفات PHP:</strong> <code>goldnow_mt_translate('gold_price');</code></p>
                <p><strong>تحديد لغة الصفحة:</strong> <code>goldnow_mt_current_language();</code></p>
                <p><strong>ترجمة نص عربي مطابق للمصدر:</strong> <code>goldnow_mt_translate_text('سعر الذهب');</code></p>
                <p><strong>تحديد اتجاه الصفحة:</strong> <code>goldnow_mt_is_rtl();</code></p>
                <p><strong>داخل المحرر أو محتوى الصفحة:</strong> <code>[goldnow_translate key="gold_price"]</code></p>
                <p><strong>للفقرات الطويلة مع HTML آمن:</strong> <code>[goldnow_mt_translate_block key="seo_intro" ]</code></p>
                <p><strong>داخل ملفات PHP:</strong> <code>goldnow_mt_translate_block('seo_intro', $language, null, array('country' =&gt; $country));</code></p>
                <p><strong>روابط تبديل اللغة:</strong> <code>[goldnow_language_switcher]</code></p>
                <p><strong>قائمة الدول الموحدة مع البطاقات والبحث:</strong> <code>[goldnow_country_directory]</code></p>
                <p class="description">ملاحظة: الإضافة توفر القاموس وواجهات الاستدعاء. لا تستطيع ترجمة كل نصوص القوالب والشورت كودز تلقائيًا قبل ربط مواضع النصوص بها.</p>
            </div>
            <?php
        }
    }

    GoldNow_Multilingual_Test_Manager::instance();

    register_activation_hook(__FILE__, function () {
        GoldNow_Multilingual_Test_Manager::instance()->activate();
    });
    // Also initialize defaults on first load in case activation hooks were bypassed by deployment tools.
    add_action('plugins_loaded', function () {
        GoldNow_Multilingual_Test_Manager::instance()->activate();
    });
}

// Compatibility aliases used by the existing SEO renderer and legacy theme code.
if (!function_exists('goldnow_current_language')) {
    function goldnow_current_language() { return goldnow_mt_current_language(); }
}
if (!function_exists('goldnow_is_rtl')) {
    function goldnow_is_rtl($language = null) { return goldnow_mt_is_rtl($language); }
}
if (!function_exists('goldnow_translate_text')) {
    function goldnow_translate_text($text, $language = null) { return goldnow_mt_translate_text($text, $language); }
}
if (!function_exists('goldnow_language_url')) {
    function goldnow_language_url($language, $url = '') { return goldnow_mt_language_url($language, $url); }
}
if (!function_exists('goldnow_translate')) {
    function goldnow_translate($key, $language = null, $fallback = null, $replacements = array()) { return goldnow_mt_translate($key, $language, $fallback, $replacements); }
}

if (!function_exists('goldnow_mt_translate')) {
    function goldnow_mt_translate($key, $language = null, $fallback = null, $replacements = array()) {
        return GoldNow_Multilingual_Test_Manager::instance()->translate($key, $language, $fallback, $replacements);
    }
}
if (!function_exists('goldnow_mt_translate_block')) {
    function goldnow_mt_translate_block($key, $language = null, $fallback = null, $replacements = array()) {
        return GoldNow_Multilingual_Test_Manager::instance()->translate_block($key, $language, $fallback, $replacements);
    }
}
if (!function_exists('goldnow_mt_current_language')) {
    function goldnow_mt_current_language() {
        return GoldNow_Multilingual_Test_Manager::instance()->current_language();
    }
}
if (!function_exists('goldnow_mt_is_rtl')) {
    function goldnow_mt_is_rtl($language = null) {
        return GoldNow_Multilingual_Test_Manager::instance()->is_rtl($language);
    }
}
if (!function_exists('goldnow_mt_translate_text')) {
    function goldnow_mt_translate_text($text, $language = null) {
        return GoldNow_Multilingual_Test_Manager::instance()->translate_text($text, $language);
    }
}
if (!function_exists('goldnow_mt_language_url')) {
    function goldnow_mt_language_url($language, $url = '') {
        return GoldNow_Multilingual_Test_Manager::instance()->language_url($language, $url);
    }
}


/**
 * Centralized labels and country data for the All Countries directory.
 * The directory shortcode returns the same HTML class structure as the original template.
 */
if (!function_exists('goldnow_country_directory_labels')) {
    function goldnow_country_directory_labels($language = null) {
        $language = $language ? sanitize_key($language) : goldnow_mt_current_language();
        $labels = [
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
        return isset($labels[$language]) ? $labels[$language] : $labels['ar'];
    }
}

if (!function_exists('goldnow_country_directory_shortcode')) {
    function goldnow_country_directory_shortcode($atts = array()) {
        $language = goldnow_mt_current_language();
        $labels = goldnow_country_directory_labels($language);
        $countries = [
'sa'=>'SAR|Saudi Arabia','eg'=>'EGP|Egypt','ae'=>'AED|United Arab Emirates','kw'=>'KWD|Kuwait','qa'=>'QAR|Qatar','bh'=>'BHD|Bahrain','om'=>'OMR|Oman','jo'=>'JOD|Jordan','iq'=>'IQD|Iraq','lb'=>'LBP|Lebanon','ps'=>'ILS|Palestine','sy'=>'SYP|Syria','ye'=>'YER|Yemen','ly'=>'LYD|Libya','sd'=>'SDG|Sudan','dz'=>'DZD|Algeria','ma'=>'MAD|Morocco','tn'=>'TND|Tunisia','mr'=>'MRU|Mauritania','dj'=>'DJF|Djibouti','km'=>'KMF|Comoros',
'us'=>'USD|United States','gb'=>'GBP|United Kingdom','ca'=>'CAD|Canada','au'=>'AUD|Australia','nz'=>'NZD|New Zealand','eu'=>'EUR|Europe','ch'=>'CHF|Switzerland','no'=>'NOK|Norway','se'=>'SEK|Sweden','dk'=>'DKK|Denmark','is'=>'ISK|Iceland','pl'=>'PLN|Poland','cz'=>'CZK|Czechia','hu'=>'HUF|Hungary','ro'=>'RON|Romania','bg'=>'BGN|Bulgaria','hr'=>'HRK|Croatia','rs'=>'RSD|Serbia','al'=>'ALL|Albania','mk'=>'MKD|North Macedonia','ba'=>'BAM|Bosnia and Herzegovina','ge'=>'GEL|Georgia','ua'=>'UAH|Ukraine','by'=>'BYN|Belarus','md'=>'MDL|Moldova','ru'=>'RUB|Russia','cn'=>'CNY|China','jp'=>'JPY|Japan','in'=>'INR|India','kr'=>'KRW|South Korea','sg'=>'SGD|Singapore','my'=>'MYR|Malaysia','th'=>'THB|Thailand','id'=>'IDR|Indonesia','ph'=>'PHP|Philippines','vn'=>'VND|Vietnam','mm'=>'MMK|Myanmar','kz'=>'KZT|Kazakhstan','uz'=>'UZS|Uzbekistan','tj'=>'TJS|Tajikistan','tm'=>'TMT|Turkmenistan','la'=>'LAK|Laos','kh'=>'KHR|Cambodia','mn'=>'MNT|Mongolia','bd'=>'BDT|Bangladesh','pk'=>'PKR|Pakistan','lk'=>'LKR|Sri Lanka','np'=>'NPR|Nepal','bt'=>'BTN|Bhutan','mv'=>'MVR|Maldives','ir'=>'IRR|Iran','af'=>'AFN|Afghanistan',
'za'=>'ZAR|South Africa','ng'=>'NGN|Nigeria','ke'=>'KES|Kenya','et'=>'ETB|Ethiopia','gh'=>'GHS|Ghana','ci'=>'XOF|Ivory Coast','sn'=>'XOF|Senegal','tz'=>'TZS|Tanzania','ug'=>'UGX|Uganda','cm'=>'XAF|Cameroon','cd'=>'CDF|Democratic Republic of the Congo','ao'=>'AOA|Angola','mz'=>'MZN|Mozambique','zw'=>'ZWL|Zimbabwe','mg'=>'MGA|Madagascar','mu'=>'MUR|Mauritius',
'mx'=>'MXN|Mexico','br'=>'BRL|Brazil','ar'=>'ARS|Argentina','cl'=>'CLP|Chile','co'=>'COP|Colombia','pe'=>'PEN|Peru','ve'=>'VES|Venezuela','py'=>'PYG|Paraguay','uy'=>'UYU|Uruguay','bo'=>'BOB|Bolivia','gt'=>'GTQ|Guatemala','hn'=>'HNL|Honduras','ni'=>'NIO|Nicaragua','cr'=>'CRC|Costa Rica','pa'=>'PAB|Panama','bs'=>'BSD|Bahamas','jm'=>'JMD|Jamaica','ht'=>'HTG|Haiti','do'=>'DOP|Dominican Republic','tt'=>'TTD|Trinidad and Tobago','gy'=>'GYD|Guyana','sr'=>'SRD|Suriname','bz'=>'BZD|Belize',
'fj'=>'FJD|Fiji','pg'=>'PGK|Papua New Guinea','sb'=>'SBD|Solomon Islands','vu'=>'VUV|Vanuatu','ws'=>'WST|Samoa','to'=>'TOP|Tonga','ki'=>'AUD|Kiribati','nr'=>'AUD|Nauru','tv'=>'AUD|Tuvalu','pw'=>'USD|Palau','fm'=>'USD|Micronesia','mh'=>'USD|Marshall Islands'
];
        $arab_codes = ['sa','eg','ae','kw','qa','bh','om','jo','iq','lb','ps','sy','ye','ly','sd','dz','ma','tn','mr','dj','km'];
        $region_groups = array(
            $labels['arab'] => $arab_codes,
            $labels['rest'] => array_values(array_diff(array_keys($countries), $arab_codes))
        );
        $locale_map = array('ar'=>'ar','en'=>'en','fr'=>'fr','de'=>'de','es'=>'es','it'=>'it','pt'=>'pt','ru'=>'ru','hi'=>'hi','tr'=>'tr');
        $locale = isset($locale_map[$language]) ? $locale_map[$language] : 'en';
        $html = '';
        foreach ($region_groups as $region_name => $codes) {
            $html .= '<section class="gn-region"><h2 class="gn-region-title">' . esc_html($region_name) . '</h2><div class="gn-grid">';
            foreach ($codes as $code) {
                if (!isset($countries[$code])) {
                    continue;
                }
                $parts = explode('|', $countries[$code]);
                $currency = isset($parts[0]) ? $parts[0] : '';
                $english = isset($parts[1]) ? $parts[1] : $code;
                $country_name = $english;
                if ($code === 'eu') {
                    $eu_names = array('ar'=>'أوروبا','en'=>'Europe','fr'=>'Europe','de'=>'Europa','es'=>'Europa','it'=>'Europa','pt'=>'Europa','ru'=>'Европа','hi'=>'यूरोप','tr'=>'Avrupa');
                    $country_name = isset($eu_names[$language]) ? $eu_names[$language] : 'Europe';
                } elseif (class_exists('Locale')) {
                    $localized = Locale::getDisplayRegion('en_' . strtoupper($code), $locale);
                    if (is_string($localized) && $localized !== '' && $localized !== strtoupper($code)) {
                        $country_name = $localized;
                    }
                }
                if ($country_name === $english && function_exists('goldnow_mt_translate_text')) {
                    $country_name = goldnow_mt_translate_text($english, $language);
                }
                $flag_local = get_template_directory() . '/assets/flags/' . $code . '.svg';
                $flag_local_png = get_template_directory() . '/assets/flags/' . $code . '.png';
                $flag_url = file_exists($flag_local)
                    ? get_template_directory_uri() . '/assets/flags/' . $code . '.svg'
                    : (file_exists($flag_local_png)
                        ? get_template_directory_uri() . '/assets/flags/' . $code . '.png'
                        : 'https://flagcdn.com/w160/' . $code . '.png');
                $search = $country_name . ' ' . $english . ' ' . $currency . ' ' . $code;
                $search = function_exists('mb_strtolower') ? mb_strtolower($search, 'UTF-8') : strtolower($search);
                $url = home_url(($language === 'ar' ? '/country/' : '/' . $language . '/country/') . rawurlencode($code) . '/');
                $html .= '<a class="gn-country" href="' . esc_url($url) . '" data-search="' . esc_attr($search) . '">';
                $html .= '<div class="gn-card"><div class="gn-flag"><img src="' . esc_url($flag_url) . '" alt="' . esc_attr($country_name) . '" loading="lazy" width="52" height="52"></div>';
                $html .= '<span class="gn-name">' . esc_html($country_name) . '</span><span class="gn-currency">' . esc_html($currency) . '</span></div></a>';
            }
            $html .= '</div></section>';
        }
        $html .= '<div id="gnCountryEmpty" class="gn-empty gn-hide"><i class="fa-solid fa-earth-americas" aria-hidden="true"></i><h3>' . esc_html($labels['empty']) . '</h3><p>' . esc_html($labels['try']) . '</p></div>';
        return $html;
    }
}
add_shortcode('goldnow_country_directory', 'goldnow_country_directory_shortcode');
