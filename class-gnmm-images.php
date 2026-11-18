<?php
if (!defined('ABSPATH')) { exit; }

final class GNMM_Images {
    const CACHE_TTL = 21600; // 6 Hours Smart TTL

    public static function init() {
        add_shortcode('goldnow_multilingual_image', array(__CLASS__, 'shortcode'));
        add_action('wp_head', array(__CLASS__, 'inject_og_image'), 1);
        add_action('template_redirect', array(__CLASS__, 'start_page_buffer'), 1);
        add_action('wp_footer', array(__CLASS__, 'footer_fallback'), 20);
        add_action('gnmm_run_image_module', array(__CLASS__, 'run_batch'), 10, 1);
    }

    /** Batch generator for manual button or optional daily refresh */
    public static function run_batch($settings) {
        $snapshot = GNMM_Gold_Manager::snapshot();
        if (is_wp_error($snapshot)) { return; }
        $languages = GNMM_Core::languages();
        $countries = GNMM_Gold_Manager::countries();

        foreach ($languages as $lang => $meta) {
            if (empty($settings['languages'][$lang]['enabled']) || empty($settings['languages'][$lang]['images'])) { continue; }
            foreach ($countries as $code => $term) {
                if (empty($settings['countries'][$code]['images'])) { continue; }
                self::generate($term, $lang, $snapshot);
            }
        }
    }

    /** Safe render language: falls back to 'en' for scripts unsupported by basic GD */
    private static function render_lang($lang) {
        if (in_array($lang, array('hi', 'th'), true)) {
            return 'en';
        }
        return $lang;
    }

    /** Return a non-Arabic country label when the selected image language cannot display Arabic. */
    private static function safe_country_name($term, $language, $code = '') {
        $name = GNMM_Gold_Manager::localized_country_name($term, $language);
        if ($language !== 'ar' && preg_match('/[\\x{0600}-\\x{06FF}]/u', (string) $name)) {
            $global_labels = array(
                'ja' => '世界市場・米ドル',
                'ko' => '글로벌 시장 (USD)',
                'th' => 'ตลาดโลก (USD)',
                'hi' => 'वैश्विक बाजार (USD)',
                'en' => 'Global USD',
                'fr' => 'Marché mondial USD',
                'de' => 'Weltmarkt USD',
                'es' => 'Mercado global USD',
                'it' => 'Mercato globale USD',
                'pt' => 'Mercado global USD',
                'ru' => 'Мировой рынок USD',
                'tr' => 'Küresel Piyasa USD',
                'vi' => 'Thị trường toàn cầu USD',
                'id' => 'Pasar Global USD',
            );
            if (strpos((string) $name, 'عالميا') !== false || strtolower((string) $code) === 'gold') {
                return isset($global_labels[$language]) ? $global_labels[$language] : 'Global USD';
            }
            $en_name = GNMM_Gold_Manager::localized_country_name($term, 'en');
            if (!preg_match('/[\\x{0600}-\\x{06FF}]/u', (string) $en_name)) {
                return $en_name;
            }
            return isset($global_labels[$language]) ? $global_labels[$language] : 'Global USD';
        }
        return $name;
    }

    private static function dictionary($lang) {
        $dict = array(
            'ar' => array('title' => 'أسعار الذهب اليوم في %s', 'k21' => 'سعر جرام الذهب عيار 21', 'k24' => 'عيار 24', 'k22' => 'عيار 22', 'k18' => 'عيار 18', 'ounce' => 'الأونصة عالمياً', 'updated' => 'آخر تحديث: %s GMT'),
            'en' => array('title' => 'Gold Prices Today in %s', 'k21' => '21K Gold Price per Gram', 'k24' => '24K Gold', 'k22' => '22K Gold', 'k18' => '18K Gold', 'ounce' => 'Global Ounce', 'updated' => 'Last Updated: %s GMT'),
            'fr' => array('title' => 'Prix de l’or aujourd’hui en %s', 'k21' => 'Prix de l’or 21K par gramme', 'k24' => 'Or 24K', 'k22' => 'Or 22K', 'k18' => 'Or 18K', 'ounce' => 'Once mondiale', 'updated' => 'Mise à jour : %s GMT'),
            'de' => array('title' => 'Goldpreise heute in %s', 'k21' => '21K Goldpreis pro Gramm', 'k24' => '24K Gold', 'k22' => '22K Gold', 'k18' => '18K Gold', 'ounce' => 'Weltunze', 'updated' => 'Aktualisiert: %s GMT'),
            'es' => array('title' => 'Precio del oro hoy en %s', 'k21' => 'Precio del oro 21K por gramo', 'k24' => 'Oro 24K', 'k22' => 'Oro 22K', 'k18' => 'Oro 18K', 'ounce' => 'Onza global', 'updated' => 'Actualizado: %s GMT'),
            'it' => array('title' => 'Prezzo dell’oro oggi in %s', 'k21' => 'Prezzo oro 21K al grammo', 'k24' => 'Oro 24K', 'k22' => 'Oro 22K', 'k18' => 'Oro 18K', 'ounce' => 'Oncia globale', 'updated' => 'Aggiornato: %s GMT'),
            'pt' => array('title' => 'Preço do ouro hoje em %s', 'k21' => 'Preço do ouro 21K por grama', 'k24' => 'Ouro 24K', 'k22' => 'Ouro 22K', 'k18' => 'Ouro 18K', 'ounce' => 'Onça global', 'updated' => 'Atualizado: %s GMT'),
            'ru' => array('title' => 'Цена золота сегодня: %s', 'k21' => 'Цена золота 21 карат за грамм', 'k24' => '24 карат', 'k22' => '22 карат', 'k18' => '18 карат', 'ounce' => 'Мировая унция', 'updated' => 'Обновлено: %s GMT'),
            'tr' => array('title' => 'Bugün %s Altın Fiyatları', 'k21' => '21 Ayar Gram Altın Fiyatı', 'k24' => '24 Ayar', 'k22' => '22 Ayar', 'k18' => '18 Ayar', 'ounce' => 'Küresel Ons', 'updated' => 'Güncelleme: %s GMT'),
            'vi' => array('title' => 'Giá vàng hôm nay tại %s', 'k21' => 'Giá vàng 21K mỗi gam', 'k24' => 'Vàng 24K', 'k22' => 'Vàng 22K', 'k18' => 'Vàng 18K', 'ounce' => 'Ounce thế giới', 'updated' => 'Cập nhật lúc %s GMT'),
            'id' => array('title' => 'Harga Emas Hari Ini di %s', 'k21' => 'Harga Emas 21K per Gram', 'k24' => 'Emas 24K', 'k22' => 'Emas 22K', 'k18' => 'Emas 18K', 'ounce' => 'Ons Global', 'updated' => 'Diperbarui %s GMT'),
            'ja' => array('title' => '本日の金価格（%s）', 'k21' => '21金（1グラムあたり）', 'k24' => '24金', 'k22' => '22金', 'k18' => '18金', 'ounce' => '国際オンス価格', 'updated' => '最終更新 %s GMT'),
            'ko' => array('title' => '오늘의 금 시세 (%s)', 'k21' => '21K 금 1그램당 시세', 'k24' => '24K 순금', 'k22' => '22K 금', 'k18' => '18K 금', 'ounce' => '국제 금 온스', 'updated' => '업데이트: %s GMT'),
        );
        return isset($dict[$lang]) ? $dict[$lang] : $dict['en'];
    }

    private static function localized_date($language) {
        $ts = current_time('timestamp');
        if (class_exists('GNAP_Languages') && method_exists('GNAP_Languages', 'date') && $language !== 'ar') {
            $p = GNAP_Languages::get($language);
            $ymd = gmdate('Y-m-d', $ts);
            return GNAP_Languages::upper_first(strtr($p['full_date'], GNAP_Languages::date($language, $ymd)));
        }
        if ($language === 'ar') {
            $days = array('الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس','الجمعة','السبت');
            $months = array(1=>'يناير','فبراير','مارس','أبريل','مايو','يونيو','يوليو','أغسطس','سبتمبر','أكتوبر','نوفمبر','ديسمبر');
            return $days[(int) gmdate('w', $ts)] . ' ' . (int) gmdate('j', $ts) . ' ' . $months[(int) gmdate('n', $ts)] . ' ' . gmdate('Y', $ts);
        }
        return gmdate('l, F j, Y', $ts);
    }

    private static function normalized_prices($snapshot) {
        $out = array();
        foreach ((array) $snapshot['prices_usd'] as $key => $value) {
            $digits = preg_replace('/[^0-9]/', '', (string) $key);
            if (in_array($digits, array('24','22','21','18','14'), true) && (float) $value > 0) {
                $out[$digits] = (float) $value;
            }
        }
        return $out;
    }

    private static function font_for($lang, $bold = true) {
        $base = WP_PLUGIN_DIR . '/goldnow-auto-posts/assets/fonts/';
        if ($lang === 'ar') {
            return $base . ($bold ? 'Cairo-Bold.ttf' : 'Cairo-Regular.ttf');
        }
        if ($lang === 'ja' && is_file($base . 'NotoSansJP-Bold.ttf')) {
            return $base . 'NotoSansJP-Bold.ttf';
        }
        if ($lang === 'ko' && is_file($base . 'NotoSansKR-Bold.ttf')) {
            return $base . 'NotoSansKR-Bold.ttf';
        }
        return $base . ($bold ? 'PTSans-Bold.ttf' : 'PTSans-Regular.ttf');
    }

    private static function shape($text, $lang) {
        $text = (string) $text;
        if ($lang !== 'ar' || $text === '') {
            return $text;
        }
        // Index: 0 = Final, 1 = Medial, 2 = Initial, 3 = Isolated
        $map = [
            'ا'=>['ﺎ','ﺎ','ا','ا'],'أ'=>['ﺄ','ﺄ','أ','أ'],'إ'=>['ﺈ','ﺈ','إ','إ'],'آ'=>['ﺂ','ﺂ','آ','آ'],
            'ب'=>['ﺐ','ﺒ','ﺑ','ب'],'ت'=>['ﺖ','ﺘ','ﺗ','ت'],'ث'=>['ﺚ','ﺜ','ﺛ','ث'],'ج'=>['ﺞ','ﺠ','ﺟ','ج'],
            'ح'=>['ﺢ','ﺤ','ﺣ','ح'],'خ'=>['ﺦ','ﺨ','ﺧ','خ'],'د'=>['ﺪ','ﺪ','د','د'],'ذ'=>['ﺬ','ﺬ','ذ','ذ'],
            'ر'=>['ﺮ','ﺮ','ر','ر'],'ز'=>['ﺰ','ﺰ','ز','ز'],'س'=>['ﺲ','ﺴ','ﺳ','س'],'ش'=>['ﺶ','ﺸ','ﺷ','ش'],
            'ص'=>['ﺺ','ﺼ','ﺻ','ص'],'ض'=>['ﺾ','ﻀ','ﺿ','ض'],'ط'=>['ﻂ','ﻄ','ﻃ','ط'],'ظ'=>['ﻆ','ﻈ','ﻇ','ظ'],
            'ع'=>['ﻊ','ﻌ','ﻋ','ع'],'غ'=>['ﻎ','ﻐ','ﻏ','غ'],'ف'=>['ﻒ','ﻔ','ﻓ','ف'],'ق'=>['ﻖ','ﻘ','ﻗ','ق'],
            'ك'=>['ﻚ','ﻜ','ﻛ','ك'],'ل'=>['ﻞ','ﻠ','ﻟ','ل'],'م'=>['ﻢ','ﻤ','ﻣ','م'],'ن'=>['ﻦ','ﻨ','ﻧ','ن'],
            'ه'=>['ﻪ','ﻬ','ﻫ','ه'],'ة'=>['ﺔ','ﺔ','ة','ة'],'و'=>['ﻮ','ﻮ','و','و'],'ؤ'=>['ﺆ','ﺆ','ﺆ','ؤ'],
            'ي'=>['ﻲ','ﻴ','ﻳ','ي'],'ى'=>['ﻰ','ﻰ','ى','ى'],'ئ'=>['ﺊ','ﺌ','ﺋ','ئ'],'ء'=>['ء','ء','ء','ء'],
        ];
        $non_joining = ['ا','أ','إ','آ','د','ذ','ر','ز','و','ؤ','ة','ى','ء'];
        $lam_alef = ['ا'=>'ﻻ','أ'=>'ﻷ','إ'=>'ﻹ','آ'=>'ﻵ'];
        $lam_alef_final = ['ا'=>'ﻼ','أ'=>'ﻸ','إ'=>'ﻺ','آ'=>'ﻶ'];

        $chars = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
        if (!is_array($chars)) { return $text; }

        $out = [];
        $count = count($chars);
        for ($i = 0; $i < $count; $i++) {
            $c = $chars[$i];
            if ($c === 'ل' && isset($chars[$i + 1]) && isset($lam_alef[$chars[$i + 1]])) {
                $prev = $i > 0 ? $chars[$i - 1] : '';
                $prev_joins = isset($map[$prev]) && !in_array($prev, $non_joining, true);
                $out[] = $prev_joins ? $lam_alef_final[$chars[$i + 1]] : $lam_alef[$chars[$i + 1]];
                $i++;
                continue;
            }
            if (!isset($map[$c])) {
                $out[] = $c;
                continue;
            }
            $prev = $i > 0 ? $chars[$i - 1] : '';
            $next = $i + 1 < $count ? $chars[$i + 1] : '';
            $prev_joins = isset($map[$prev]) && !in_array($prev, $non_joining, true);
            $next_joins = isset($map[$next]) && !in_array($c, $non_joining, true);

            if ($prev_joins && $next_joins) { $out[] = $map[$c][1]; }
            elseif ($prev_joins) { $out[] = $map[$c][0]; }
            elseif ($next_joins) { $out[] = $map[$c][2]; }
            else { $out[] = $map[$c][3]; }
        }

        $joined = implode('', $out);
        $tokens = preg_split('/([0-9A-Za-z.,:%\-]+)/u', $joined, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
        $result = '';
        foreach (array_reverse($tokens) as $tok) {
            if (preg_match('/^[0-9A-Za-z.,:%\-]+$/', $tok)) {
                $result .= $tok;
            } else {
                $sub = preg_split('//u', $tok, -1, PREG_SPLIT_NO_EMPTY);
                $result .= implode('', array_reverse($sub));
            }
        }
        return $result;
    }

    private static function clean_vietnamese($str) {
        $map = array(
            'à'=>'a','á'=>'a','ạ'=>'a','ả'=>'a','ã'=>'a','â'=>'a','ầ'=>'a','ấ'=>'a','ậ'=>'a','ẩ'=>'a','ẫ'=>'a','ă'=>'a','ằ'=>'a','ắ'=>'a','ặ'=>'a','ẳ'=>'a','ẵ'=>'a',
            'è'=>'e','é'=>'e','ẹ'=>'e','ẻ'=>'e','ẽ'=>'e','ê'=>'e','ề'=>'e','ế'=>'e','ệ'=>'e','ể'=>'e','ễ'=>'e',
            'ì'=>'i','í'=>'i','ị'=>'i','ỉ'=>'i','ĩ'=>'i',
            'ò'=>'o','ó'=>'o','ọ'=>'o','ỏ'=>'o','õ'=>'o','ô'=>'o','ồ'=>'o','ố'=>'o','ộ'=>'o','ổ'=>'o','ỗ'=>'o','ơ'=>'o','ờ'=>'o','ớ'=>'o','ợ'=>'o','ở'=>'o','ỡ'=>'o',
            'ù'=>'u','ú'=>'u','ụ'=>'u','ủ'=>'u','ũ'=>'u','ư'=>'u','ừ'=>'u','ứ'=>'u','ự'=>'u','ử'=>'u','ữ'=>'u',
            'ỳ'=>'y','ý'=>'y','ỵ'=>'y','ỷ'=>'y','ỹ'=>'y','đ'=>'d',
            'À'=>'A','Á'=>'A','Ạ'=>'A','Ả'=>'A','Ã'=>'A','Â'=>'A','Ầ'=>'A','Ấ'=>'A','Ậ'=>'A','Ẩ'=>'A','Ẫ'=>'A','Ă'=>'A','Ằ'=>'A','Ắ'=>'A','Ặ'=>'A','Ẳ'=>'A','Ẵ'=>'A',
            'È'=>'E','É'=>'E','Ẹ'=>'E','Ẻ'=>'E','Ẽ'=>'E','Ê'=>'E','Ề'=>'E','Ế'=>'E','Ệ'=>'E','Ể'=>'E','Ễ'=>'E',
            'Ì'=>'I','Í'=>'I','Ị'=>'I','Ỉ'=>'I','Ĩ'=>'I',
            'Ò'=>'O','Ó'=>'O','Ọ'=>'O','Ỏ'=>'O','Õ'=>'O','Ô'=>'O','Ồ'=>'O','Ố'=>'O','Ộ'=>'O','Ổ'=>'O','Ỗ'=>'O','Ơ'=>'O','Ờ'=>'O','Ớ'=>'O','Ợ'=>'O','Ở'=>'O','Ỡ'=>'O',
            'Ù'=>'U','Ú'=>'U','Ụ'=>'U','Ủ'=>'U','Ũ'=>'U','Ư'=>'U','Ừ'=>'U','Ứ'=>'U','Ự'=>'U','Ử'=>'U','Ữ'=>'U',
            'Ỳ'=>'Y','Ý'=>'Y','Ỵ'=>'Y','Ỷ'=>'Y','Ỹ'=>'Y','Đ'=>'D',
        );
        return strtr((string) $str, $map);
    }

    private static function draw_text($im, $size, $x, $y, $color, $font, $text, $align = 'center', $lang = 'en') {
        if (!is_file($font)) { return; }
        $text = (string) $text;
        if ($lang === 'vi') {
            $text = self::clean_vietnamese($text);
        }

        if (in_array($lang, array('ja', 'ko'), true)) {
            $latin_font = self::font_for('en', true);
            $parts = preg_split('/([0-9A-Za-z\s.,:%\-\(\)\/]+)/u', $text, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
            if (is_array($parts)) {
                $total_w = 0;
                $metrics = array();
                foreach ($parts as $p) {
                    $is_latin = (bool) preg_match('/^[0-9A-Za-z\s.,:%\-\(\)\/]+$/', $p);
                    $f = ($is_latin && is_file($latin_font)) ? $latin_font : $font;
                    $box = imagettfbbox($size, 0, $f, $p);
                    $pw = is_array($box) ? abs($box[2] - $box[0]) : 0;
                    $metrics[] = array('text' => $p, 'font' => $f, 'w' => $pw);
                    $total_w += $pw;
                }
                $cur_x = $x;
                if ($align === 'center') { $cur_x = (int) round($x - ($total_w / 2)); }
                elseif ($align === 'right') { $cur_x = (int) round($x - $total_w); }
                foreach ($metrics as $m) {
                    imagettftext($im, $size, 0, (int) $cur_x, (int) $y, $color, $m['font'], $m['text']);
                    $cur_x += $m['w'];
                }
                return;
            }
        }

        $shaped = self::shape($text, $lang);
        $box = imagettfbbox($size, 0, $font, $shaped);
        $w = is_array($box) ? abs($box[2] - $box[0]) : 0;
        if ($align === 'center') {
            $x = (int) round($x - ($w / 2));
        } elseif ($align === 'right') {
            $x = (int) round($x - $w);
        }
        imagettftext($im, $size, 0, (int) $x, (int) $y, $color, $font, $shaped);
    }

    private static function draw_rounded_rect($im, $x1, $y1, $x2, $y2, $r, $color, $filled = true) {
        if ($filled) {
            imagefilledrectangle($im, $x1 + $r, $y1, $x2 - $r, $y2, $color);
            imagefilledrectangle($im, $x1, $y1 + $r, $x2, $y2 - $r, $color);
            imagefilledellipse($im, $x1 + $r, $y1 + $r, $r * 2, $r * 2, $color);
            imagefilledellipse($im, $x2 - $r, $y1 + $r, $r * 2, $r * 2, $color);
            imagefilledellipse($im, $x1 + $r, $y2 - $r, $r * 2, $r * 2, $color);
            imagefilledellipse($im, $x2 - $r, $y2 - $r, $r * 2, $r * 2, $color);
        } else {
            imageline($im, $x1 + $r, $y1, $x2 - $r, $y1, $color);
            imageline($im, $x1 + $r, $y2, $x2 - $r, $y2, $color);
            imageline($im, $x1, $y1 + $r, $x1, $y2 - $r, $color);
            imageline($im, $x2, $y1 + $r, $x2, $y2 - $r, $color);
            imagearc($im, $x1 + $r, $y1 + $r, $r * 2, $r * 2, 180, 270, $color);
            imagearc($im, $x2 - $r, $y1 + $r, $r * 2, $r * 2, 270, 360, $color);
            imagearc($im, $x1 + $r, $y2 - $r, $r * 2, $r * 2, 90, 180, $color);
            imagearc($im, $x2 - $r, $y2 - $r, $r * 2, $r * 2, 0, 90, $color);
        }
    }

    private static function draw_flag($im, $code, $cx, $cy, $radius = 24) {
        $code = strtolower((string) $code);
        $flag_path = '';
        $gnap_flag = WP_PLUGIN_DIR . '/goldnow-auto-posts/assets/flags/' . $code . '.png';
        if (is_file($gnap_flag)) {
            $flag_path = $gnap_flag;
        }
        if ($flag_path === '') {
            static $plugin_flag_dirs = null;
            if ($plugin_flag_dirs === null) {
                $plugin_flag_dirs = array();
                $matches = glob(WP_PLUGIN_DIR . '/*/{flags,assets/flags,images/flags,img/flags,assets/img/flags,icons/flags}', GLOB_BRACE | GLOB_ONLYDIR);
                if (is_array($matches)) {
                    $plugin_flag_dirs = $matches;
                }
            }
            foreach ($plugin_flag_dirs as $dir) {
                foreach (array($code . '.png', strtoupper($code) . '.png', $code . '.jpg') as $fname) {
                    if (is_file($dir . '/' . $fname)) {
                        $flag_path = $dir . '/' . $fname;
                        break 2;
                    }
                }
            }
        }
        if ($flag_path === '') {
            $upload = wp_upload_dir();
            if (!empty($upload['basedir'])) {
                $cache_dir  = trailingslashit($upload['basedir']) . 'goldnow-multilingual-manager/flags/';
                $cached_png = $cache_dir . $code . '.png';
                if (!is_file($cached_png) && function_exists('wp_remote_get')) {
                    wp_mkdir_p($cache_dir);
                    $res = wp_remote_get('https://flagcdn.com/w80/' . rawurlencode($code) . '.png', array('timeout' => 5));
                    if (!is_wp_error($res) && wp_remote_retrieve_response_code($res) === 200) {
                        $body = wp_remote_retrieve_body($res);
                        if ($body !== '' && strlen($body) > 100) {
                            @file_put_contents($cached_png, $body);
                        }
                    }
                }
                if (is_file($cached_png)) {
                    $flag_path = $cached_png;
                }
            }
        }
        if ($flag_path === '' || !is_file($flag_path)) { return false; }

        $info = @getimagesize($flag_path);
        $src = (!empty($info['mime']) && $info['mime'] === 'image/jpeg')
            ? @imagecreatefromjpeg($flag_path)
            : @imagecreatefrompng($flag_path);
        if (!$src) { return false; }

        $sw = imagesx($src);
        $sh = imagesy($src);
        $d = $radius * 2;
        $tmp = imagecreatetruecolor($d, $d);
        imagealphablending($tmp, false);
        imagesavealpha($tmp, true);
        $trans = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
        imagefill($tmp, 0, 0, $trans);
        imagecopyresampled($tmp, $src, 0, 0, 0, 0, $d, $d, $sw, $sh);
        for ($x = 0; $x < $d; $x++) {
            for ($y = 0; $y < $d; $y++) {
                $dx = $x - $radius;
                $dy = $y - $radius;
                if (($dx * $dx + $dy * $dy) <= ($radius * $radius)) {
                    $c = imagecolorat($tmp, $x, $y);
                    imagesetpixel($im, $cx - $radius + $x, $cy - $radius + $y, $c);
                }
            }
        }
        imagedestroy($src);
        imagedestroy($tmp);
        return true;
    }

    private static function draw_site_logo($im, $x, $y, $max_h = 56) {
        $logo_id = 0;
        if (class_exists('GNAP_Settings')) {
            $gnap = GNAP_Settings::get();
            if (!empty($gnap['logo_id'])) {
                $logo_id = (int) $gnap['logo_id'];
            }
        }
        if (!$logo_id) {
            $logo_id = (int) get_theme_mod('custom_logo');
        }
        if (!$logo_id) {
            $logo_id = (int) get_option('site_icon');
        }

        $path = $logo_id ? get_attached_file($logo_id) : '';
        if (!$path || !is_file($path)) { return false; }

        $info = @getimagesize($path);
        if (!$info || empty($info['mime'])) { return false; }

        $src = null;
        if ($info['mime'] === 'image/png' && function_exists('imagecreatefrompng')) {
            $src = @imagecreatefrompng($path);
        } elseif ($info['mime'] === 'image/jpeg' && function_exists('imagecreatefromjpeg')) {
            $src = @imagecreatefromjpeg($path);
        } elseif ($info['mime'] === 'image/webp' && function_exists('imagecreatefromwebp')) {
            $src = @imagecreatefromwebp($path);
        }
        if (!$src) { return false; }

        $sw = imagesx($src);
        $sh = imagesy($src);
        if ($sw <= 0 || $sh <= 0) { imagedestroy($src); return false; }

        $nh = $max_h;
        $nw = (int) round(($sw / $sh) * $nh);
        if ($nw > 170) {
            $nw = 170;
            $nh = (int) round(($sh / $sw) * $nw);
        }

        imagealphablending($im, true);
        imagecopyresampled($im, $src, (int) $x, (int) $y, 0, 0, $nw, $nh, $sw, $sh);
        imagedestroy($src);
        return $nw;
    }

    private static function format_currency_label($currency, $lang) {
        if ($lang !== 'ar') {
            return $currency;
        }
        $ar_currencies = array(
            'AED'=>'درهم إماراتي','AFN'=>'أفغاني','ALL'=>'ليك ألباني','AMD'=>'درام أرميني','ANG'=>'غيلدر أنتيل','AOA'=>'كوانزا أنغولي',
            'ARS'=>'بيزو أرجنتيني','AUD'=>'دولار أسترالي','AWG'=>'فلورن أروبي','AZN'=>'مانات أذربيجاني','BAM'=>'مارك بوسني','BBD'=>'دولار بربادوسي',
            'BDT'=>'تاكا بنغلاديشي','BGN'=>'ليف بلغاري','BHD'=>'دينار بحريني','BIF'=>'فرنك بوروندي','BMD'=>'دولار برمودي','BND'=>'دولار بروناي',
            'BOB'=>'بوليفيانو بوليفي','BRL'=>'ريال برازيلي','BSD'=>'دولار بهامي','BTN'=>'نغولترم بوتاني','BWP'=>'بولا بوتسواني','BYN'=>'روبل بيلاروسي',
            'BZD'=>'دولار بليزي','CAD'=>'دولار كندي','CDF'=>'فرنك كونغولي','CHF'=>'فرنك سويسري','CLP'=>'بيزو تشيلي','CNY'=>'يوان صيني',
            'COP'=>'بيزو كولومبي','CRC'=>'كولون كوستاريكي','CUP'=>'بيزو كوبي','CVE'=>'إسكودو الرأس الأخضر','CZK'=>'كرونة تشيكية','DJF'=>'فرنك جيبوتي',
            'DKK'=>'كرونة دنماركية','DOP'=>'بيزو دومينيكاني','DZD'=>'دينار جزائري','EGP'=>'جنيه مصري','ERN'=>'ناكفا إريتري','ETB'=>'بير إثيوبي',
            'EUR'=>'يورو','FJD'=>'دولار فيجي','FKP'=>'جنيه فوكلاند','GBP'=>'جنيه إسترليني','GEL'=>'لاري جورجي','GHS'=>'سيدي غاني',
            'GIP'=>'جنيه جبل طارق','GMD'=>'دالاسي غامبي','GNF'=>'فرنك غيني','GTQ'=>'كتزال غواتيمالي','GYD'=>'دولار غياني','HKD'=>'دولار هونغ كونغ',
            'HNL'=>'لمبيرة هندوراسية','HRK'=>'كونا كرواتية','HTG'=>'غورد هايتي','HUF'=>'فورنت مجري','IDR'=>'روبية إندونيسية','ILS'=>'شيكل',
            'INR'=>'روبية هندية','IQD'=>'دينار عراقي','IRR'=>'ريال إيراني','ISK'=>'كرونة آيسلندية','JMD'=>'دولار جامايكي','JOD'=>'دينار أردني',
            'JPY'=>'ين ياباني','KES'=>'شلن كيني','KGS'=>'سوم قيرغيزي','KHR'=>'ريال كمبودي','KMF'=>'فرنك قمري','KPW'=>'وون كوري شمالي',
            'KRW'=>'وون كوري جنوبي','KWD'=>'دينار كويتي','KYD'=>'دولار جزر كايمان','KZT'=>'تينغ كازاخستاني','LAK'=>'كيب لاوي','LBP'=>'ليرة لبنانية',
            'LKR'=>'روبية سريلانكية','LRD'=>'دولار ليبيري','LSL'=>'لوتي ليسوتو','LYD'=>'دينار ليبي','MAD'=>'درهم مغربي','MDL'=>'ليو مولدوفي',
            'MGA'=>'أرياري مدغشقري','MKD'=>'دينار مقدوني','MMK'=>'كيات ميانماري','MNT'=>'توغروغ منغولي','MOP'=>'باتاكا ماكاوي','MRU'=>'أوقية موريتانية',
            'MUR'=>'روبية موريشيوسية','MVR'=>'روفيا مالديفية','MWK'=>'كواشا مالاوية','MXN'=>'بيزو مكسيكي','MYR'=>'رينغيت ماليزي','MZN'=>'متكال موزمبيقي',
            'NAD'=>'دولار ناميبي','NGN'=>'نيرة نيجيرية','NIO'=>'كوردوبا نيكاراغوي','NOK'=>'كرونة نرويجية','NPR'=>'روبية نيبالية','NZD'=>'دولار نيوزيلندي',
            'OMR'=>'ريال عماني','PAB'=>'بالبوا بنمي','PEN'=>'سول بيروفي','PGK'=>'كينا بابوا غينيا','PHP'=>'بيزو فلبيني','PKR'=>'روبية باكستانية',
            'PLN'=>'زلوتي بولندي','PYG'=>'غواراني باراغواي','QAR'=>'ريال قطري','RON'=>'ليو روماني','RSD'=>'دينار صربي','RUB'=>'روبل روسي',
            'RWF'=>'فرنك رواندي','SAR'=>'ريال سعودي','SBD'=>'دولار جزر سليمان','SCR'=>'روبية سيشيلية','SDG'=>'جنيه سوداني','SEK'=>'كرونة سويدية',
            'SGD'=>'دولار سنغافوري','SHP'=>'جنيه سانت هيلينا','SLE'=>'ليون سيراليوني','SLL'=>'ليون سيراليوني','SOS'=>'شلن صومالي','SRD'=>'دولار سورينامي',
            'SSP'=>'جنيه جنوب سوداني','STN'=>'دوبرا ساو تومي','SYP'=>'ليرة سورية','SZL'=>'ليلانغيني سوازيلندي','THB'=>'بات تايلاندي','TJS'=>'ساماني طاجيكي',
            'TMT'=>'مانات تركماني','TND'=>'دينار تونسي','TOP'=>'بانغا تونغي','TRY'=>'ليرة تركية','TTD'=>'دولار ترينيداد','TWD'=>'دولار تايواني',
            'TZS'=>'شلن تنزاني','UAH'=>'هريفنيا أوكرانية','UGX'=>'شلن أوغندي','USD'=>'دولار أمريكي','UYU'=>'بيزو أوروغواي','UZS'=>'سوم أوزبكي',
            'VES'=>'بوليفار فنزويلي','VND'=>'دونغ فيتنامي','VUV'=>'فاتو فانواتي','WST'=>'تالا ساموي','XAF'=>'فرنك وسط أفريقي','XCD'=>'دولار شرق الكاريبي',
            'XOF'=>'فرنك غرب أفريقي','XPF'=>'فرنك باسيفيكي','YER'=>'ريال يمني','ZAR'=>'راند جنوب أفريقي','ZMW'=>'كواشا زامبية','ZWL'=>'دولار زيمبابوي',
        );
        return isset($ar_currencies[$currency]) ? $ar_currencies[$currency] : $currency;
    }

    /** On-demand image resolver with 6-hour Smart TTL & Stampede Lock */
    public static function resolve_image($term, $language) {
        $code = GNMM_Gold_Manager::country_code($term);
        if (!$code) { return null; }

        $upload   = wp_upload_dir();
        if (!empty($upload['error'])) { return null; }

        $base_dir = trailingslashit($upload['basedir']) . 'goldnow-multilingual-manager/';
        $base_url = trailingslashit($upload['baseurl']) . 'goldnow-multilingual-manager/';
        $file     = $base_dir . $language . '/' . $code . '.png';
        $raw_url  = $base_url . rawurlencode($language) . '/' . rawurlencode($code) . '.png';

        $snapshot = GNMM_Gold_Manager::snapshot();
        $source_updated = (!is_wp_error($snapshot) && !empty($snapshot['source_updated_at']))
            ? (int) $snapshot['source_updated_at']
            : 0;

        if (is_file($file) && filesize($file) > 0) {
            $mtime = (int) filemtime($file);
            $age   = time() - $mtime;
            if ($age < self::CACHE_TTL && ($source_updated === 0 || $mtime >= $source_updated)) {
                return array(
                    'url'   => add_query_arg('v', $mtime, $raw_url),
                    'path'  => $file,
                    'mtime' => $mtime,
                );
            }
        }

        $lock_key = 'gnmm_lock_' . md5($language . '_' . $code);
        if (get_transient($lock_key)) {
            if (is_file($file) && filesize($file) > 0) {
                $mtime = (int) filemtime($file);
                return array('url' => add_query_arg('v', $mtime, $raw_url), 'path' => $file, 'mtime' => $mtime);
            }
            return null;
        }

        set_transient($lock_key, 1, 15);
        if (!is_wp_error($snapshot)) {
            $generated = self::generate($term, $language, $snapshot);
            delete_transient($lock_key);
            if (!is_wp_error($generated) && !empty($generated['url'])) {
                return $generated;
            }
        }
        delete_transient($lock_key);

        if (is_file($file) && filesize($file) > 0) {
            $mtime = (int) filemtime($file);
            return array('url' => add_query_arg('v', $mtime, $raw_url), 'path' => $file, 'mtime' => $mtime);
        }
        return null;
    }

    public static function generate($term, $language, $snapshot) {
        if (!function_exists('imagecreatetruecolor') || !function_exists('imagettftext')) {
            return new WP_Error('gnmm_gd_missing', 'PHP GD with FreeType support is required.');
        }

        $code = GNMM_Gold_Manager::country_code($term);
        $currency = GNMM_Gold_Manager::currency($term, $code);
        if (!$code || !$currency) {
            return new WP_Error('gnmm_image_country_data', 'Country code or currency is missing.');
        }

        $prices = self::normalized_prices($snapshot);
        if (!$prices) {
            return new WP_Error('gnmm_image_prices', 'No supported karat prices found in snapshot.');
        }

        $local = array();
        foreach ($prices as $karat => $usd) {
            $converted = GNMM_Gold_Manager::local_price($usd, $currency, $snapshot['currency_rates']);
            if ($converted !== null) {
                $local[$karat] = $converted;
            }
        }
        if (!$local) {
            return new WP_Error('gnmm_image_currency', 'No exchange rate available for ' . $currency);
        }

        $upload = wp_upload_dir();
        if (!empty($upload['error'])) {
            return new WP_Error('gnmm_upload_dir', $upload['error']);
        }

        $base_dir = trailingslashit($upload['basedir']) . 'goldnow-multilingual-manager/';
        $base_url = trailingslashit($upload['baseurl']) . 'goldnow-multilingual-manager/';
        $lang_dir = $base_dir . $language . '/';
        if (!wp_mkdir_p($lang_dir)) {
            return new WP_Error('gnmm_image_directory', 'Could not create directory: ' . $lang_dir);
        }

        $rlang = self::render_lang($language);
        $dict  = self::dictionary($rlang);
        $country_name = self::safe_country_name($term, $rlang, $code);

        $W = 1200;
        $H = 630;
        $im = imagecreatetruecolor($W, $H);
        imagealphablending($im, true);
        imagesavealpha($im, true);

        // Royal Black & Luxury Gold Palette
        $bg_dark     = imagecolorallocate($im, 8, 8, 8);
        $card_bg     = imagecolorallocate($im, 18, 17, 15);
        $hero_bg     = imagecolorallocate($im, 26, 23, 18);
        $gold_main   = imagecolorallocate($im, 235, 190, 65);
        $gold_bright = imagecolorallocate($im, 255, 223, 110);
        $gold_dim    = imagecolorallocate($im, 165, 128, 42);
        $white       = imagecolorallocate($im, 255, 255, 255);
        $text_muted  = imagecolorallocate($im, 210, 198, 170);
        $footer_bg   = imagecolorallocate($im, 4, 4, 4);

        // Background & Double Gold Frame
        imagefilledrectangle($im, 0, 0, $W, $H, $bg_dark);
        self::draw_rounded_rect($im, 18, 18, $W - 18, $H - 18, 22, $gold_main, false);
        self::draw_rounded_rect($im, 26, 26, $W - 26, $H - 26, 18, $gold_dim, false);

        $font_bold = self::font_for($rlang, true);
        $font_reg  = self::font_for($rlang, false);
        $is_rtl    = ($rlang === 'ar');

        // Header: Flag + Title + Date + Site Logo
        $title_text = sprintf($dict['title'], $country_name);
        $date_text  = self::localized_date($rlang);

        if ($is_rtl) {
            $has_flag = self::draw_flag($im, $code, $W - 95, 82, 26);
            $title_x  = $has_flag ? ($W - 138) : ($W - 65);
            self::draw_text($im, 28, $title_x, 82, $gold_bright, $font_bold, $title_text, 'right', $rlang);
            self::draw_text($im, 16, $title_x, 118, $text_muted, $font_reg, $date_text, 'right', $rlang);

            $logo_w  = self::draw_site_logo($im, 58, 56, 54);
            $brand_x = $logo_w ? (58 + $logo_w + 14) : 65;
            self::draw_text($im, 17, $brand_x, 90, $gold_main, $font_bold, 'ALTAQRER GOLD', 'left', $rlang);
        } else {
            $has_flag = self::draw_flag($im, $code, 95, 82, 26);
            $title_x  = $has_flag ? 138 : 65;
            self::draw_text($im, 26, $title_x, 82, $gold_bright, $font_bold, $title_text, 'left', $rlang);
            self::draw_text($im, 15, $title_x, 118, $text_muted, $font_reg, $date_text, 'left', $rlang);

            $logo_w  = self::draw_site_logo($im, $W - 125, 56, 54);
            $brand_x = $logo_w ? ($W - 138) : ($W - 65);
            self::draw_text($im, 17, $brand_x, 90, $gold_main, $font_bold, 'ALTAQRER GOLD', 'right', $rlang);
        }

        imageline($im, 55, 142, $W - 55, 142, $gold_dim);

        // Main Hero Price Card (21K Gold)
        self::draw_rounded_rect($im, 55, 162, $W - 55, 305, 18, $hero_bg, true);
        self::draw_rounded_rect($im, 55, 162, $W - 55, 305, 18, $gold_main, false);

        $curr_label = self::format_currency_label($currency, $rlang);
        $main_karat = isset($local['21']) ? '21' : (string) key($local);
        $main_price = number_format($local[$main_karat], 2) . ' ' . $curr_label;
        self::draw_text($im, 20, $W / 2, 205, $text_muted, $font_bold, $dict['k21'], 'center', $rlang);
        self::draw_text($im, 42, $W / 2, 272, $white, $font_bold, $main_price, 'center', $rlang);

        // 4 Secondary Grid Boxes
        $ounce_label = ($rlang === 'ar') ? 'دولار' : 'USD';
        $ounce_usd   = isset($prices['24']) ? number_format($prices['24'] * 31.1034768, 2) . ' ' . $ounce_label : '--';
        $boxes = array(
            array('label' => $dict['k24'],   'val' => isset($local['24']) ? number_format($local['24'], 2) . ' ' . $curr_label : '--'),
            array('label' => $dict['k22'],   'val' => isset($local['22']) ? number_format($local['22'], 2) . ' ' . $curr_label : '--'),
            array('label' => $dict['k18'],   'val' => isset($local['18']) ? number_format($local['18'], 2) . ' ' . $curr_label : '--'),
            array('label' => $dict['ounce'], 'val' => $ounce_usd),
        );
        if ($is_rtl) {
            $boxes = array_reverse($boxes);
        }

        $grid_top = 325;
        $grid_bot = 485;
        $gap      = 20;
        $total_w  = ($W - 110) - ($gap * 3);
        $box_w    = (int) floor($total_w / 4);

        for ($i = 0; $i < 4; $i++) {
            $bx1 = 55 + ($i * ($box_w + $gap));
            $bx2 = $bx1 + $box_w;
            $bcx = (int) round(($bx1 + $bx2) / 2);

            self::draw_rounded_rect($im, $bx1, $grid_top, $bx2, $grid_bot, 14, $card_bg, true);
            self::draw_rounded_rect($im, $bx1, $grid_top, $bx2, $grid_bot, 14, $gold_dim, false);

            self::draw_text($im, 17, $bcx, $grid_top + 52, $gold_bright, $font_bold, $boxes[$i]['label'], 'center', $rlang);
            self::draw_text($im, 19, $bcx, $grid_top + 115, $white, $font_bold, $boxes[$i]['val'], 'center', $rlang);
        }

        // Elevated Timestamp Line
        $stamp = !empty($snapshot['source_updated_at'])
            ? gmdate('Y-m-d H:i', (int) $snapshot['source_updated_at'])
            : gmdate('Y-m-d H:i');
        $updated_line = sprintf($dict['updated'], $stamp);
        self::draw_text($im, 16, $W / 2, 532, $gold_bright, $font_reg, $updated_line, 'center', $rlang);

        // Bottom Footer Bar
        imagefilledrectangle($im, 27, 558, $W - 27, $H - 27, $footer_bg);
        imageline($im, 27, 558, $W - 27, 558, $gold_dim);
        $site_host = wp_parse_url(home_url(), PHP_URL_HOST);
        self::draw_text($im, 15, $W / 2, 588, $text_muted, $font_bold, strtoupper((string) $site_host), 'center', $rlang);

        // Atomic Overwrite Save
        $final_path = $lang_dir . $code . '.png';
        $temp_path  = $final_path . '.tmp-' . wp_generate_password(6, false, false);
        $saved = imagepng($im, $temp_path, 6);
        imagedestroy($im);
        if (!$saved || !is_file($temp_path) || filesize($temp_path) <= 0) {
            @unlink($temp_path);
            return new WP_Error('gnmm_png_write', 'Failed to render PNG image.');
        }
        if (!@rename($temp_path, $final_path)) {
            @unlink($temp_path);
            return new WP_Error('gnmm_png_replace', 'Failed to overwrite PNG image atomically.');
        }
        clearstatcache(true, $final_path);
        $mtime   = (int) filemtime($final_path);
        $size    = (int) filesize($final_path);
        $raw_url = $base_url . rawurlencode($language) . '/' . rawurlencode($code) . '.png';
        $ver_url = add_query_arg('v', $mtime, $raw_url);
                if (class_exists('GNMM_Storage')) {
            if (method_exists('GNMM_Storage', 'upsert_asset')) {
                GNMM_Storage::upsert_asset(array(
                    'asset_type'        => 'image',
                    'country_code'      => $code,
                    'language'          => $language,
                    'current_url'       => $raw_url,
                    'archive_url'       => '',
                    'source_updated_at' => isset($snapshot['source_updated_at']) ? $snapshot['source_updated_at'] : time(),
                    'meta'              => array(
                        'currency'   => $currency,
                        'prices'     => $local,
                        'file_mtime' => $mtime,
                        'file_size'  => $size,
                        'format'     => 'png',
                    ),
                ));
            }
                        if (method_exists('GNMM_Storage', 'log')) {
                GNMM_Storage::log(
                    'success',
                    'images',
                    'Generated localized PNG image.',
                    $code,
                    $language,
                    array('url' => $ver_url, 'size' => $size)
                );
            }
 }

        return array(
            'url'     => $ver_url,
            'raw_url' => $raw_url,
            'path'    => $final_path,
            'mtime'   => $mtime,
        );
    }

    /** Helper to always return 'ar' on main country pages without prefix */
    private static function current_lang() {
        $raw = function_exists('altaqrer_ml_current_language') ? sanitize_key((string) altaqrer_ml_current_language()) : '';
        return ($raw !== '') ? $raw : 'ar';
    }

    /** Localized SEO Alt & Title text for Google Images (15 Languages) */
    public static function localized_alt($term, $language) {
        $code = GNMM_Gold_Manager::country_code($term);
        $name = self::safe_country_name($term, $language, $code);
        $date = self::localized_date($language);
        $templates = array(
            'ar' => 'سعر الذهب اليوم في %1$s عيار 21 و24 - %2$s',
            'en' => 'Gold Prices Today in %1$s 21K & 24K - %2$s',
            'fr' => 'Prix de l’or aujourd’hui en %1$s 21K et 24K - %2$s',
            'de' => 'Goldpreise heute in %1$s 21K & 24K - %2$s',
            'es' => 'Precio del oro hoy en %1$s 21K y 24K - %2$s',
            'it' => 'Prezzo dell’oro oggi in %1$s 21K e 24K - %2$s',
            'pt' => 'Preço do ouro hoje em %1$s 21K e 24K - %2$s',
            'ru' => 'Цена золота сегодня %1$s 21 и 24 карата - %2$s',
            'hi' => 'आज %1$s में सोने का भाव 21K और 24K - %2$s',
            'tr' => 'Bugün %1$s Altın Fiyatları 21 ve 24 Ayar - %2$s',
            'th' => 'ราคาทองคำวันนี้ใน %1$s 21K และ 24K - %2$s',
            'vi' => 'Giá vàng hôm nay tại %1$s 21K và 24K - %2$s',
            'id' => 'Harga Emas Hari Ini di %1$s 21K & 24K - %2$s',
            'ja' => '本日の%1$s金価格 21金・24金 - %2$s',
            'ko' => '오늘의 %1$s 금 시세 21K 및 24K - %2$s',
        );
        $tpl = isset($templates[$language]) ? $templates[$language] : $templates['en'];
        return sprintf($tpl, $name, $date);
    }

    /** Inject Facebook Open Graph, Twitter Card & Google ImageObject Schema */
    public static function inject_og_image() {
        if (!is_tax('countries')) { return; }
        $term = get_queried_object();
        if (!$term || !is_object($term)) { return; }
        $language = self::current_lang();
        if (!isset(GNMM_Core::languages()[$language])) { return; }
        $settings = GNMM_Core::settings();
        if (empty($settings['languages'][$language]['enabled']) || empty($settings['languages'][$language]['images'])) { return; }
        $code = GNMM_Gold_Manager::country_code($term);
        $country_config = isset($settings['countries'][$code]) && is_array($settings['countries'][$code]) ? $settings['countries'][$code] : array();
        if (empty($country_config['images'])) { return; }
        $resolved = self::resolve_image($term, $language);
        if (!$resolved || empty($resolved['url'])) { return; }

        $img_url  = esc_url($resolved['url']);
        $page_url = esc_url(GNMM_Gold_Manager::country_url($term, $language));
        $alt      = esc_attr(self::localized_alt($term, $language));
        $iso_date = gmdate('c', !empty($resolved['mtime']) ? (int) $resolved['mtime'] : time());

        echo "
<!-- GNMM OpenGraph & Image Schema -->
";
        echo '<meta property="og:image" content="' . $img_url . '" />' . "
";
        echo '<meta property="og:image:secure_url" content="' . $img_url . '" />' . "
";
        echo '<meta property="og:image:type" content="image/png" />' . "
";
        echo '<meta property="og:image:width" content="1200" />' . "
";
        echo '<meta property="og:image:height" content="630" />' . "
";
        echo '<meta property="og:image:alt" content="' . $alt . '" />' . "
";
        echo '<meta name="twitter:card" content="summary_large_image" />' . "
";
        echo '<meta name="twitter:image" content="' . $img_url . '" />' . "
";

        $schema = array(
            '@context'             => 'https://schema.org',
            '@type'                => 'ImageObject',
            'contentUrl'           => $resolved['url'],
            'url'                  => $resolved['url'],
            'representativeOfPage' => true,
            'caption'              => self::localized_alt($term, $language),
            'name'                 => self::localized_alt($term, $language),
            'encodingFormat'       => 'image/png',
            'width'                => 1200,
            'height'               => 630,
            'dateModified'         => $iso_date,
            'inLanguage'           => $language,
            'mainEntityOfPage'     => $page_url,
        );
        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "
";
    }

    /** Shortcode renderer with On-Demand Smart TTL & SEO Alt */
    public static function shortcode($atts = array()) {
        $atts = shortcode_atts(array('lang' => '', 'country' => ''), $atts, 'goldnow_multilingual_image');
        $language = ($atts['lang'] !== '') ? sanitize_key($atts['lang']) : self::current_lang();
        $term = null;
        if ($atts['country'] !== '') {
            $code = sanitize_key($atts['country']);
            $countries = GNMM_Gold_Manager::countries();
            $term = isset($countries[$code]) ? $countries[$code] : null;
        } elseif (is_tax('countries')) {
            $term = get_queried_object();
        }
        if (!$term || !isset(GNMM_Core::languages()[$language])) { return ''; }
        $code = GNMM_Gold_Manager::country_code($term);
        $settings = GNMM_Core::settings();
        if (empty($settings['languages'][$language]['enabled']) || empty($settings['languages'][$language]['images'])) { return ''; }
        $country_config = isset($settings['countries'][$code]) && is_array($settings['countries'][$code]) ? $settings['countries'][$code] : array();
        if (empty($country_config['images'])) { return ''; }
        $resolved = self::resolve_image($term, $language);
        if (!$resolved || empty($resolved['url'])) { return ''; }

        $url = esc_url(GNMM_Gold_Manager::country_url($term, $language));
        $img = esc_url($resolved['url']);
        $alt = esc_attr(self::localized_alt($term, $language));

        do_action('gnmm_image_printed');
        return '<div class="gnmm-country-image" style="margin:20px 0;text-align:center;"><a href="' . $url . '" title="' . $alt . '"><img src="' . $img . '" alt="' . $alt . '" title="' . $alt . '" width="1200" height="630" loading="lazy" style="max-width:100%;height:auto;border-radius:12px;" /></a></div>';
    }

    public static function start_page_buffer() {
        $settings = GNMM_Core::settings();
        if (!is_tax('countries') || empty($settings['image_position']) || $settings['image_position'] !== 'shortcode') { return; }
        ob_start(array(__CLASS__, 'inject_before_tabs_content'));
    }

    public static function inject_before_tabs_content($html) {
        if (!is_string($html) || strlen($html) < 500) { return $html; }
        if (strpos($html, 'gold-tabs-content') === false || strpos($html, 'gnmm-country-image') !== false) { return $html; }
        $term = get_queried_object();
        if (!$term || !is_object($term)) { return $html; }
        $language = self::current_lang();
        $image = self::shortcode(array('lang' => $language));
        if ($image === '') { return $html; }
       $pattern = '/(<(?:div|section)\b[^>]*class=["\'][^"\']*gold-tabs-content[^"\']*["\'][^>]*>)/i';

        $replaced = preg_replace($pattern, '$1' . "
" . $image, $html, 1);
        return is_string($replaced) ? $replaced : $html;
    }

    public static function footer_fallback() {
        $settings = GNMM_Core::settings();
        if (isset($settings['image_position']) && $settings['image_position'] !== 'footer') { return; }
        if (!is_tax('countries') || did_action('gnmm_image_printed')) { return; }
        $language = self::current_lang();
        $image = self::shortcode(array('lang' => $language));
        if ($image !== '') { echo $image; }
    }

    /** Dynamic XML Image Sitemap at /goldnow-image-sitemap.xml */
    public static function serve_image_sitemap() {
        $req = isset($_SERVER['REQUEST_URI']) ? (string) wp_unslash($_SERVER['REQUEST_URI']) : '';
        $path = (string) wp_parse_url($req, PHP_URL_PATH);
        if (rtrim($path, '/') !== '/goldnow-image-sitemap.xml') { return; }
        status_header(200);
        header('Content-Type: application/xml; charset=UTF-8');
        header('X-Robots-Tag: noindex, follow');

        $settings  = GNMM_Core::settings();
        $languages = GNMM_Core::languages();
        $countries = GNMM_Gold_Manager::countries();
        $upload    = wp_upload_dir();
        $base_dir  = trailingslashit($upload['basedir']) . 'goldnow-multilingual-manager/';
        $base_url  = trailingslashit($upload['baseurl']) . 'goldnow-multilingual-manager/';

        echo '<?xml version="1.0" encoding="UTF-8"?>' . "
";
		echo '<?xml-stylesheet type="text/xsl" href="' . esc_url(home_url('/main-sitemap.xsl')) . '"?>' . "\n";

        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "
";
        foreach ($languages as $lang => $meta) {
            if (empty($settings['languages'][$lang]['enabled']) || empty($settings['languages'][$lang]['images'])) { continue; }
            foreach ($countries as $code => $term) {
                if (empty($settings['countries'][$code]['images'])) { continue; }
                $page_url = GNMM_Gold_Manager::country_url($term, $lang);
                if (!$page_url) { continue; }
                $file_path = $base_dir . $lang . '/' . $code . '.png';
                $mtime     = is_file($file_path) ? (int) filemtime($file_path) : time();
                $img_url   = add_query_arg('v', $mtime, $base_url . rawurlencode($lang) . '/' . rawurlencode($code) . '.png');
                $caption   = self::localized_alt($term, $lang);
                $title     = self::safe_country_name($term, $lang, $code);

                echo "  <url>
";
                echo "    <loc>" . esc_url($page_url) . "</loc>
";
                echo "    <lastmod>" . esc_html(gmdate('c', $mtime)) . "</lastmod>
";
                echo "    <image:image>
";
                echo "      <image:loc>" . esc_url($img_url) . "</image:loc>
";
                echo "      <image:title>" . esc_html($title) . "</image:title>
";
                echo "      <image:caption>" . esc_html($caption) . "</image:caption>
";
                echo "    </image:image>
";
                echo "  </url>
";
            }
        }
        echo "</urlset>
";
        exit;
    }
}
add_action('template_redirect', array('GNMM_Images', 'serve_image_sitemap'), 0);
GNMM_Images::init();

