<?php
/**
 * GoldNow SEO content administration.
 * Stores editable overrides in WordPress options while retaining bundled defaults.
 */
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('GoldNow_SEO_Admin')) {
    final class GoldNow_SEO_Admin {
        const OPTION = 'goldnow_seo_article_overrides';
        const PAGE = 'goldnow-seo-content';

        public function __construct() {
            add_action('admin_menu', array($this, 'menu'));
            add_action('admin_post_goldnow_seo_save_article', array($this, 'save'));
        }

        public function menu() {
            add_submenu_page(
                'options-general.php',
                'GoldNow SEO Articles',
                'GoldNow SEO Articles',
                'manage_options',
                self::PAGE,
                array($this, 'render')
            );
        }

        private function sections() {
            return array(
                'overview' => 'الصفحة العامة',
                '24k' => 'عيار 24',
                '22k' => 'عيار 22',
                '21k' => 'عيار 21',
                '18k' => 'عيار 18',
                '14k' => 'عيار 14',
                'ounce' => 'الأونصة',
                'coin' => 'الجنيه / العملة الذهبية',
                'gold-bars' => 'سبائك الذهب',
                'gold-index' => 'مؤشر الذهب',
                'usd' => 'الدولار'
            );
        }

        public function save() {
            if (!current_user_can('manage_options')) {
                wp_die(esc_html__('You are not allowed to edit SEO articles.', 'goldnow-language-manager'), 403);
            }
            check_admin_referer('goldnow_seo_save_article');
            $languages = GoldNow_Language_Manager::languages();
            $language = isset($_POST['language']) ? sanitize_key(wp_unslash($_POST['language'])) : 'en';
            $section = isset($_POST['section']) ? sanitize_key(wp_unslash($_POST['section'])) : 'overview';
            if (!isset($languages[$language]) || !isset($this->sections()[$section])) {
                wp_die(esc_html__('Invalid language or article section.', 'goldnow-language-manager'), 400);
            }

            $saved = get_option(self::OPTION, array());
            if (!is_array($saved)) {
                $saved = array();
            }
            $fields = array('title', 'intro', 'body');
            foreach ($fields as $field) {
                $raw = isset($_POST[$field]) ? wp_unslash($_POST[$field]) : '';
                $saved[$language][$section][$field] = ($field === 'body') ? wp_kses_post($raw) : sanitize_textarea_field($raw);
            }
            foreach (array('faq1_q', 'faq1_a', 'faq2_q', 'faq2_a') as $field) {
                if (isset($_POST[$field])) {
                    $saved[$language][$section][$field] = sanitize_textarea_field(wp_unslash($_POST[$field]));
                }
            }
            update_option(self::OPTION, $saved, false);

            $url = add_query_arg(array(
                'page' => self::PAGE,
                'language' => $language,
                'section' => $section,
                'gnseo_saved' => '1'
            ), admin_url('options-general.php'));
            wp_safe_redirect($url);
            exit;
        }

        public function render() {
            if (!current_user_can('manage_options')) {
                return;
            }
            $languages = GoldNow_Language_Manager::languages();
            $sections = $this->sections();
            $language = isset($_GET['language']) ? sanitize_key(wp_unslash($_GET['language'])) : 'en';
            $section = isset($_GET['section']) ? sanitize_key(wp_unslash($_GET['section'])) : 'overview';
            if (!isset($languages[$language])) {
                $language = 'en';
            }
            if (!isset($sections[$section])) {
                $section = 'overview';
            }
            $article = function_exists('goldnow_seo_article_data') ? goldnow_seo_article_data($language, $section) : array('', '', '');
            $article = array_pad(is_array($article) ? $article : array(), 3, '');
            $overrides = get_option(self::OPTION, array());
            $current = (is_array($overrides) && isset($overrides[$language][$section]) && is_array($overrides[$language][$section])) ? $overrides[$language][$section] : array();
            $faq_defaults = array('faq1_q' => '', 'faq1_a' => '', 'faq2_q' => '', 'faq2_a' => '');
            if (function_exists('goldnow_render_seo_article')) {
                $preview = goldnow_render_seo_article($language, $section, array());
                if (preg_match_all('/<details><summary>(.*?)<\\/summary><p>(.*?)<\\/p><\\/details>/s', $preview, $faq_matches, PREG_SET_ORDER)) {
                    foreach (array_slice($faq_matches, 0, 2) as $index => $match) {
                        $number = $index + 1;
                        $faq_defaults['faq' . $number . '_q'] = html_entity_decode(wp_strip_all_tags($match[1]), ENT_QUOTES | ENT_HTML5, 'UTF-8');
                        $faq_defaults['faq' . $number . '_a'] = html_entity_decode(wp_strip_all_tags($match[2]), ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    }
                }
            }
            foreach ($faq_defaults as $field => $default_value) {
                if (isset($current[$field]) && is_string($current[$field])) {
                    $faq_defaults[$field] = $current[$field];
                }
            }
            ?>
            <div class="wrap">
                <h1>مكتبة مقالات GoldNow SEO</h1>
                <p>اختر اللغة والقسم لمعاينة محتوى المقال وتعديله. يتم حفظ تعديلاتك في قاعدة بيانات WordPress، بينما تظل النصوص الافتراضية داخل ملفات الإضافة كنسخة احتياطية.</p>
                <?php if (isset($_GET['gnseo_saved'])) : ?>
                    <div class="notice notice-success is-dismissible"><p>تم حفظ المقال بنجاح.</p></div>
                <?php endif; ?>
                <form method="get" action="<?php echo esc_url(admin_url('options-general.php')); ?>" style="margin:16px 0;padding:12px;background:#fff;border:1px solid #ccd0d4">
                    <input type="hidden" name="page" value="<?php echo esc_attr(self::PAGE); ?>">
                    <label for="gnseo-language"><strong>اللغة:</strong></label>
                    <select id="gnseo-language" name="language">
                        <?php foreach ($languages as $code => $meta) : ?>
                            <option value="<?php echo esc_attr($code); ?>" <?php selected($language, $code); ?>><?php echo esc_html($meta['native'] . ' (' . $code . ')'); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="gnseo-section" style="margin-inline-start:12px"><strong>القسم:</strong></label>
                    <select id="gnseo-section" name="section">
                        <?php foreach ($sections as $key => $label) : ?>
                            <option value="<?php echo esc_attr($key); ?>" <?php selected($section, $key); ?>><?php echo esc_html($label . ' — ' . $key); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php submit_button('عرض المقال', 'secondary', 'submit', false); ?>
                </form>
                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <input type="hidden" name="action" value="goldnow_seo_save_article">
                    <input type="hidden" name="language" value="<?php echo esc_attr($language); ?>">
                    <input type="hidden" name="section" value="<?php echo esc_attr($section); ?>">
                    <?php wp_nonce_field('goldnow_seo_save_article'); ?>
                    <h2><?php echo esc_html($sections[$section] . ' — ' . $languages[$language]['native']); ?></h2>
                    <p><label for="gnseo-title"><strong>عنوان المقال</strong></label></p>
                    <input id="gnseo-title" type="text" name="title" class="large-text" value="<?php echo esc_attr($article[0]); ?>">
                    <p><label for="gnseo-intro"><strong>المقدمة / الوصف المختصر</strong></label></p>
                    <textarea id="gnseo-intro" name="intro" rows="3" class="large-text"><?php echo esc_textarea($article[1]); ?></textarea>
                    <p><label for="gnseo-body"><strong>محتوى المقال</strong></label></p>
                    <textarea id="gnseo-body" name="body" rows="12" class="large-text" style="direction:auto"><?php echo esc_textarea(wp_strip_all_tags($article[2], false)); ?></textarea>
                    <h3>الأسئلة الشائعة</h3>
                    <p><label for="gnseo-faq1-q"><strong>السؤال الأول</strong></label></p>
                    <textarea id="gnseo-faq1-q" name="faq1_q" rows="2" class="large-text"><?php echo esc_textarea($faq_defaults['faq1_q']); ?></textarea>
                    <p><label for="gnseo-faq1-a"><strong>إجابة السؤال الأول</strong></label></p>
                    <textarea id="gnseo-faq1-a" name="faq1_a" rows="3" class="large-text"><?php echo esc_textarea($faq_defaults['faq1_a']); ?></textarea>
                    <p><label for="gnseo-faq2-q"><strong>السؤال الثاني</strong></label></p>
                    <textarea id="gnseo-faq2-q" name="faq2_q" rows="2" class="large-text"><?php echo esc_textarea($faq_defaults['faq2_q']); ?></textarea>
                    <p><label for="gnseo-faq2-a"><strong>إجابة السؤال الثاني</strong></label></p>
                    <textarea id="gnseo-faq2-a" name="faq2_a" rows="3" class="large-text"><?php echo esc_textarea($faq_defaults['faq2_a']); ?></textarea>
                    <p class="description">يمكنك كتابة فقرات متعددة. تُحفظ النصوص كبدائل للمحتوى الافتراضي لهذا القسم واللغة فقط. لا تغيّر هذه الشاشة الأسعار أو الحسابات أو أوزان الذهب.</p>
                    <?php submit_button('حفظ المقال'); ?>
                </form>
                <hr>
                <p><strong>ملاحظة:</strong> النسخة الحالية تتيح تعديل العنوان والمقدمة ونص المقال والسؤالين وإجابتيهما. الروابط الداخلية تبقى من المحتوى الافتراضي داخل ملف SEO.</p>
            </div>
            <?php
        }
    }
    new GoldNow_SEO_Admin();
}
