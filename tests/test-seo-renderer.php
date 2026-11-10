<?php
/**
 * Lightweight CLI smoke test for the standalone SEO renderer.
 * Run with: php tests/test-seo-renderer.php
 */
define('ABSPATH', __DIR__);

function esc_html($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
function esc_attr($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
function esc_url($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
function trailingslashit($value) {
    return rtrim((string) $value, '/') . '/';
}
function number_format_i18n($value, $decimals = 0) {
    return number_format((float) $value, (int) $decimals, '.', '');
}

$GLOBALS['goldnow_test_filters'] = array();
$GLOBALS['goldnow_test_language'] = 'en';
$GLOBALS['goldnow_test_section'] = '';
$GLOBALS['goldnow_test_term'] = null;

class WP_Term {
    public $taxonomy = 'countries';
    public $name = 'Egypt';
}
function add_filter($hook, $callback, $priority = 10) {
    $GLOBALS['goldnow_test_filters'][$hook] = $callback;
}
function get_queried_object() {
    return $GLOBALS['goldnow_test_term'];
}
function get_query_var($key) {
    return ($key === 'gold_view') ? $GLOBALS['goldnow_test_section'] : '';
}
function altaqrer_ml_current_language() {
    return $GLOBALS['goldnow_test_language'];
}
function altaqrer_ml_country_name($term, $language) {
    return ($language === 'ar') ? 'مصر' : 'Egypt';
}
function wp_strip_all_tags($value) {
    return strip_tags((string) $value);
}
function wp_html_excerpt($value, $length, $more = null) {
    return mb_substr((string) $value, 0, (int) $length, 'UTF-8');
}

require_once dirname(__DIR__) . '/goldnow-seo-content.php';

// Verify that saved editorial overrides are applied without changing the bundled defaults.
$GLOBALS['goldnow_test_option_overrides'] = array();
function get_option($key, $default = false) {
    if ($key === 'goldnow_seo_article_overrides') {
        return $GLOBALS['goldnow_test_option_overrides'];
    }
    return $default;
}


$GLOBALS['goldnow_test_option_overrides'] = array(
    'en' => array('24k' => array('title' => 'Custom English SEO title', 'intro' => 'Custom intro', 'body' => 'Custom first paragraph.\\n\\nCustom second paragraph.'))
);
$override = goldnow_seo_article_data('en', '24k');
$GLOBALS['goldnow_test_option_overrides']['en']['24k']['faq1_q'] = 'Custom FAQ question';
$faq_html = goldnow_render_seo_article('en', '24k', array());
if (strpos($faq_html, '<p>Custom first paragraph.</p><p>Custom second paragraph.</p>') === false) {
    fwrite(STDERR, "Multi-paragraph SEO body was not rendered as separate paragraphs.\\n");
    exit(1);
}
if (strpos($faq_html, 'Custom FAQ question') === false) {
    fwrite(STDERR, "Saved FAQ overrides were not applied.\\n");
    exit(1);
}
$GLOBALS['goldnow_test_option_overrides'] = array();
if ($override[0] !== 'Custom English SEO title' || $override[1] !== 'Custom intro' || $override[2] !== 'Custom body paragraph.') {
    fwrite(STDERR, "Saved SEO editorial overrides were not applied.\\n");
    exit(1);
}
$GLOBALS['goldnow_test_option_overrides'] = array();

$languages = array('ar','en','fr','de','es','it','pt','ru','hi','tr');
$sections = array('overview','24k','22k','21k','18k','14k','ounce','coin','gold-bars','gold-index','usd');
$prices = array(
    '24k' => 100.25, '22k' => 91.90, '21k' => 87.70,
    '18k' => 75.20, '14k' => 58.60, 'ounce_usd' => 3117.75,
    'coin' => 701.60, 'usd_rate' => 50.25
);

$tested = 0;
foreach ($languages as $language) {
    foreach ($sections as $section) {
        $html = goldnow_render_seo_article($language, $section, array(
            'country' => 'Egypt',
            'currency' => 'EGP',
            'date' => '10/11/2026',
            'country_slug' => 'eg',
            'base_url' => 'https://example.test/' . ($language === 'ar' ? '' : $language . '/') . 'country/eg/',
            'prices' => $prices
        ));

        if (!is_string($html) || strpos($html, 'goldnow-seo-article') === false) {
            fwrite(STDERR, "Missing SEO article: {$language}/{$section}\n");
            exit(1);
        }
        if (substr_count($html, '<details>') !== 2) {
            fwrite(STDERR, "FAQ count mismatch: {$language}/{$section}\n");
            exit(1);
        }
        if (substr_count($html, '<a href=') !== 10) {
            fwrite(STDERR, "Internal link count mismatch: {$language}/{$section}\n");
            exit(1);
        }
        if ($language !== 'ar' && preg_match('/[\x{0600}-\x{06FF}]/u', $html)) {
            fwrite(STDERR, "Arabic text leaked into {$language}/{$section}\n");
            exit(1);
        }
        if ($section === 'ounce' && strpos($html, '3117.75 USD') === false) {
            fwrite(STDERR, "Global ounce USD value missing: {$language}\n");
            exit(1);
        }
        $tested++;
    }
}


$GLOBALS['goldnow_test_term'] = new WP_Term();
foreach ($languages as $language) {
    foreach ($sections as $section) {
        $GLOBALS['goldnow_test_language'] = $language;
        $GLOBALS['goldnow_test_section'] = ($section === 'overview') ? '' : $section;
        $meta = goldnow_seo_meta_description('');
        if (!is_string($meta) || $meta === '') {
            fwrite(STDERR, "Missing meta description: {$language}/{$section}\\n");
            exit(1);
        }
        if ($language !== 'ar' && preg_match('/[\\x{0600}-\\x{06FF}]/u', $meta)) {
            fwrite(STDERR, "Arabic text leaked into meta description: {$language}/{$section}\\n");
            exit(1);
        }
        if ($section === 'ounce' && strpos($meta, 'Egypt') !== false) {
            fwrite(STDERR, "Global ounce meta description incorrectly includes a country: {$language}\\n");
            exit(1);
        }
    }
}
if (goldnow_seo_meta_description('Existing custom description') !== 'Existing custom description') {
    fwrite(STDERR, "Existing custom meta description was overwritten.\\n");
    exit(1);
}
if (!isset($GLOBALS['goldnow_test_filters']['rank_math/frontend/description']) || !isset($GLOBALS['goldnow_test_filters']['wpseo_metadesc'])) {
    fwrite(STDERR, "SEO plugin meta description filters were not registered.\\n");
    exit(1);
}
echo "Localized meta-description tests passed: 110 combinations.\\n";

echo "SEO renderer smoke tests passed: {$tested} language/section combinations.\n";
