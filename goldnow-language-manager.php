<?php
/**
 * Plugin Name: GoldNow Language Manager
 * Plugin URI: https://gold.altaqrer.com/
 * Description: Shared 10-language translation dictionary, language detection, URL helpers, and shortcodes for GoldNow themes and plugins.
 * Version: 1.3.0
 * Author: GoldNow
 * Text Domain: goldnow-language-manager
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

// Load the SEO content editor; it uses the renderer's defaults and stores only admin overrides.
$goldnow_seo_admin_file = __DIR__ . '/goldnow-seo-admin.php';
if (is_readable($goldnow_seo_admin_file)) {
    require_once $goldnow_seo_admin_file;
}

if (!class_exists('GoldNow_Language_Manager')) {
    final class GoldNow_Language_Manager {
        const VERSION = '1.3.0';
        const OPTION_TRANSLATIONS = 'goldnow_lm_translations';
        const OPTION_ENABLED = 'goldnow_lm_enabled_languages';
        const OPTION_DEFAULT = 'goldnow_lm_default_language';
        const MENU_SLUG = 'goldnow-language-manager';

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
            add_action('admin_post_goldnow_lm_save', array($this, 'save_settings'));
            add_action('admin_post_goldnow_lm_export', array($this, 'export_dictionary'));
            add_shortcode('goldnow_translate', array($this, 'translation_shortcode'));
            add_shortcode('goldnow_language_switcher', array($this, 'language_switcher_shortcode'));
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
            if ($value === '' && isset($entry['ar']) && is_scalar($entry['ar'])) {
                $value = (string) $entry['ar'];
            }
            if ($value === '' && isset($entry['source'])) {
                $value = (string) $entry['source'];
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
                $source = isset($entry['source']) ? (string) $entry['source'] : '';
                $arabic = isset($entry['ar']) ? (string) $entry['ar'] : '';
                if ($source_text === $source || ($arabic !== '' && $source_text === $arabic)) {
                    return $this->translate($key, $language, $source_text);
                }
            }
            return apply_filters('goldnow_language_manager_unmatched_text', $source_text, $language);
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
            $atts = shortcode_atts(array('key' => '', 'lang' => '', 'fallback' => ''), $atts, 'goldnow_translate');
            $fallback = ($atts['fallback'] !== '') ? $atts['fallback'] : null;
            $value = $this->translate($atts['key'], $atts['lang'] !== '' ? $atts['lang'] : null, $fallback);
            return esc_html($value);
        }

        public function language_switcher_shortcode($atts) {
            $atts = shortcode_atts(array('current' => '1', 'class' => 'goldnow-language-switcher'), $atts, 'goldnow_language_switcher');
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
            add_options_page('GoldNow Language Manager', 'GoldNow Languages', 'manage_options', self::MENU_SLUG, array($this, 'settings_page'));
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
            check_admin_referer('goldnow_lm_save');

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
            update_option(self::OPTION_ENABLED, $enabled, false);
            update_option(self::OPTION_DEFAULT, $default, false);
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
            check_admin_referer('goldnow_lm_export');
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
            $status = isset($_GET['gnlm_status']) ? sanitize_key(wp_unslash($_GET['gnlm_status'])) : '';
            ?>
            <div class="wrap">
                <h1>GoldNow Language Manager</h1>
                <p>قاموس ترجمة مركزي داخل الموقع. القوالب والإضافات تستدعي الترجمات من هذا المكان، ولا يتم تغيير أسعار الذهب أو حسابات Gold Manager.</p>
                <?php if ($status === 'saved') : ?><div class="notice notice-success is-dismissible"><p>تم حفظ إعدادات اللغات والترجمات.</p></div><?php elseif ($status === 'invalid_json') : ?><div class="notice notice-error"><p>ملف JSON غير صالح. لم يتم حفظ أي تغيير.</p></div><?php endif; ?>
                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <input type="hidden" name="action" value="goldnow_lm_save">
                    <?php wp_nonce_field('goldnow_lm_save'); ?>
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
                    <h2 style="margin-top:28px">قاموس الترجمات</h2>
                    <p>كل مفتاح يحتوي على <code>source</code> للنص الأصلي، ثم الترجمات حسب رموز اللغات. احتفظ بالمفاتيح كما هي عند التعديل، ويمكنك إضافة مفاتيح جديدة.</p>
                    <textarea name="translations_json" spellcheck="false" rows="28" style="width:100%;max-width:1200px;font-family:monospace;direction:ltr;text-align:left"><?php echo esc_textarea(wp_json_encode($dictionary, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)); ?></textarea>
                    <?php submit_button('حفظ إعدادات الترجمة'); ?>
                </form>
                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="margin-top:12px">
                    <input type="hidden" name="action" value="goldnow_lm_export">
                    <?php wp_nonce_field('goldnow_lm_export'); ?>
                    <?php submit_button('تصدير القاموس كملف JSON', 'secondary'); ?>
                </form>
                <hr>
                <h2>طريقة الاستخدام</h2>
                <p><strong>داخل ملفات PHP:</strong> <code>goldnow_translate('gold_price');</code></p>
                <p><strong>تحديد لغة الصفحة:</strong> <code>goldnow_current_language();</code></p>
                <p><strong>ترجمة نص عربي مطابق للمصدر:</strong> <code>goldnow_translate_text('سعر الذهب');</code></p>
                <p><strong>تحديد اتجاه الصفحة:</strong> <code>goldnow_is_rtl();</code></p>
                <p><strong>داخل المحرر أو محتوى الصفحة:</strong> <code>[goldnow_translate key="gold_price"]</code></p>
                <p><strong>روابط تبديل اللغة:</strong> <code>[goldnow_language_switcher]</code></p>
                <p class="description">ملاحظة: الإضافة توفر القاموس وواجهات الاستدعاء. لا تستطيع ترجمة كل نصوص القوالب والشورت كودز تلقائيًا قبل ربط مواضع النصوص بها.</p>
            </div>
            <?php
        }
    }

    GoldNow_Language_Manager::instance();

    register_activation_hook(__FILE__, function () {
        GoldNow_Language_Manager::instance()->activate();
    });
    // Also initialize defaults on first load in case activation hooks were bypassed by deployment tools.
    add_action('plugins_loaded', function () {
        GoldNow_Language_Manager::instance()->activate();
    });
}

if (!function_exists('goldnow_translate')) {
    function goldnow_translate($key, $language = null, $fallback = null, $replacements = array()) {
        return GoldNow_Language_Manager::instance()->translate($key, $language, $fallback, $replacements);
    }
}
if (!function_exists('goldnow_current_language')) {
    function goldnow_current_language() {
        return GoldNow_Language_Manager::instance()->current_language();
    }
}
if (!function_exists('goldnow_is_rtl')) {
    function goldnow_is_rtl($language = null) {
        return GoldNow_Language_Manager::instance()->is_rtl($language);
    }
}
if (!function_exists('goldnow_translate_text')) {
    function goldnow_translate_text($text, $language = null) {
        return GoldNow_Language_Manager::instance()->translate_text($text, $language);
    }
}
if (!function_exists('goldnow_language_url')) {
    function goldnow_language_url($language, $url = '') {
        return GoldNow_Language_Manager::instance()->language_url($language, $url);
    }
}
