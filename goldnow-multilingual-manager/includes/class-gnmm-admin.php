<?php
if (!defined('ABSPATH')) { exit; }

final class GNMM_Admin {
    public static function menu() {
        add_menu_page(
            'GoldNow Multilingual Manager',
            'GoldNow Manager',
            'manage_options',
            'goldnow-multilingual-manager',
            array(__CLASS__, 'render'),
            'dashicons-translation',
            58
        );
    }

    public static function save() {
        if (!current_user_can('manage_options')) { wp_die('Not allowed.', 403); }
        check_admin_referer('gnmm_save_settings');
        $settings = GNMM_Core::defaults();
        $raw_languages = isset($_POST['languages']) ? (array) wp_unslash($_POST['languages']) : array();
        foreach (GNMM_Core::languages() as $code => $info) {
            $row = isset($raw_languages[$code]) && is_array($raw_languages[$code]) ? $raw_languages[$code] : array();
            $settings['languages'][$code] = array(
                'enabled' => !empty($row['enabled']),
                'images' => !empty($row['images']),
                'articles' => !empty($row['articles']),
            );
        }

        $raw_countries = isset($_POST['countries']) ? (array) wp_unslash($_POST['countries']) : array();
        foreach ($raw_countries as $code => $value) {
            $code = sanitize_key($code);
            if (preg_match('/^[a-z]{2,3}$/', $code)) {
                $settings['countries'][$code] = !empty($value);
            }
        }

        $position = isset($_POST['image_position']) ? sanitize_key(wp_unslash($_POST['image_position'])) : 'shortcode';
        $settings['image_position'] = in_array($position, array('shortcode', 'footer'), true) ? $position : 'shortcode';
        $status = isset($_POST['article_status']) ? sanitize_key(wp_unslash($_POST['article_status'])) : 'draft';
        $settings['article_status'] = in_array($status, array('draft', 'publish'), true) ? $status : 'draft';
        $settings['daily_enabled'] = !empty($_POST['daily_enabled']);
        $settings['article_sections'] = array('overview');

        update_option(GNMM_Core::OPTION, $settings, false);
        wp_safe_redirect(add_query_arg(array('page' => 'goldnow-multilingual-manager', 'saved' => '1'), admin_url('admin.php')));
        exit;
    }

    public static function render() {
        if (!current_user_can('manage_options')) { return; }
        $settings = GNMM_Core::settings();
        $languages = GNMM_Core::languages();
        $countries = GNMM_Gold_Manager::countries();
        $snapshot = GNMM_Gold_Manager::snapshot();
        ?>
        <div class="wrap">
            <h1>GoldNow Multilingual Manager</h1>
            <?php if (!empty($_GET['saved'])) : ?><div class="notice notice-success is-dismissible"><p>Settings saved.</p></div><?php endif; ?>
            <p>Central controls for country images and localized article publishing. Gold Manager remains the only source of gold prices and exchange rates.</p>
            <div class="notice <?php echo GNMM_Gold_Manager::ready() && !is_wp_error($snapshot) ? 'notice-success' : 'notice-error'; ?>">
                <p><strong>Gold Manager connection:</strong>
                <?php
                if (!GNMM_Gold_Manager::ready()) {
                    echo esc_html('Required Gold Manager functions or countries taxonomy were not found.');
                } elseif (is_wp_error($snapshot)) {
                    echo esc_html($snapshot->get_error_message());
                } else {
                    echo esc_html(sprintf('Connected. %d gold price rows are available.', count($snapshot['prices_usd'])));
                }
                ?>
                </p>
            </div>
            <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                <input type="hidden" name="action" value="gnmm_save_settings">
                <?php wp_nonce_field('gnmm_save_settings'); ?>
                <h2>Language controls</h2>
                <p>Each language has independent master, image and article switches. All are off by default to prevent accidental bulk generation or publishing.</p>
                <table class="widefat striped">
                    <thead><tr><th>Language</th><th>Enabled</th><th>Images</th><th>Articles</th></tr></thead>
                    <tbody>
                    <?php foreach ($languages as $code => $language) : $row = $settings['languages'][$code]; ?>
                        <tr>
                            <td><strong><?php echo esc_html($language['name']); ?></strong> <code><?php echo esc_html($code); ?></code></td>
                            <td><input type="checkbox" name="languages[<?php echo esc_attr($code); ?>][enabled]" value="1" <?php checked(!empty($row['enabled'])); ?>></td>
                            <td><input type="checkbox" name="languages[<?php echo esc_attr($code); ?>][images]" value="1" <?php checked(!empty($row['images'])); ?>></td>
                            <td><input type="checkbox" name="languages[<?php echo esc_attr($code); ?>][articles]" value="1" <?php checked(!empty($row['articles'])); ?>></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

                <h2 style="margin-top:24px">Country controls</h2>
                <p>Countries are discovered from the existing <code>countries</code> taxonomy and their <code>country_code</code> term meta.</p>
                <table class="widefat striped">
                    <thead><tr><th>Country</th><th>Code</th><th>Currency</th><th>Enabled</th></tr></thead>
                    <tbody>
                    <?php if ($countries) : foreach ($countries as $code => $term) : ?>
                        <tr>
                            <td><?php echo esc_html($term->name); ?></td>
                            <td><code><?php echo esc_html($code); ?></code></td>
                            <td><?php echo esc_html(GNMM_Gold_Manager::currency($term, $code)); ?></td>
                            <td><input type="checkbox" name="countries[<?php echo esc_attr($code); ?>]" value="1" <?php checked(!array_key_exists($code, $settings['countries']) || !empty($settings['countries'][$code])); ?>></td>
                        </tr>
                    <?php endforeach; else : ?>
                        <tr><td colspan="4">No country terms were found.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>

                <h2 style="margin-top:24px">Publishing and display</h2>
                <p><label>Image placement:
                    <select name="image_position">
                        <option value="shortcode" <?php selected($settings['image_position'], 'shortcode'); ?>>Shortcode (safe placement inside the template)</option>
                        <option value="footer" <?php selected($settings['image_position'], 'footer'); ?>>Footer fallback</option>
                    </select>
                </label></p>
                <p><label>New article status:
                    <select name="article_status">
                        <option value="draft" <?php selected($settings['article_status'], 'draft'); ?>>Draft (recommended for initial testing)</option>
                        <option value="publish" <?php selected($settings['article_status'], 'publish'); ?>>Publish automatically</option>
                    </select>
                </label></p>
                <p><label><input type="checkbox" name="daily_enabled" value="1" <?php checked(!empty($settings['daily_enabled'])); ?>> Enable daily scheduled processing</label></p>
                <?php submit_button('Save settings'); ?>
            </form>
            <hr>
            <h2>Implementation status</h2>
            <p>Configuration, country discovery and Gold Manager read-only connection are in place. Image rendering and article publishing are separate modules and will only run for explicitly enabled language/country pairs.</p>
            <p><strong>Countries discovered:</strong> <?php echo esc_html((string) count($countries)); ?></p>
        </div>
        <?php
    }
}
