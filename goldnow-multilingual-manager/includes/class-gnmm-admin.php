<?php
if (!defined('ABSPATH')) { exit; }

final class GNMM_Admin {
    public static function menu() {
        add_menu_page('GoldNow Multilingual Manager','GoldNow Manager','manage_options','goldnow-multilingual-manager',array(__CLASS__,'render'),'dashicons-translation',58);
    }

    public static function save() {
        if (!current_user_can('manage_options')) { wp_die('Not allowed.',403); }
        check_admin_referer('gnmm_save_settings');
        $settings = GNMM_Core::defaults();
        $raw_languages = isset($_POST['languages']) ? (array) wp_unslash($_POST['languages']) : array();
        foreach (GNMM_Core::languages() as $code => $info) {
            $row = isset($raw_languages[$code]) && is_array($raw_languages[$code]) ? $raw_languages[$code] : array();
            $settings['languages'][$code] = array('enabled'=>!empty($row['enabled']),'images'=>!empty($row['images']),'articles'=>!empty($row['articles']));
        }
        $raw_countries = isset($_POST['countries']) ? (array) wp_unslash($_POST['countries']) : array();
        foreach (GNMM_Gold_Manager::countries() as $code => $term) {
            $row = isset($raw_countries[$code]) && is_array($raw_countries[$code]) ? $raw_countries[$code] : array();
            $settings['countries'][$code] = array('images'=>!empty($row['images']),'articles'=>!empty($row['articles']));
        }
        $position = isset($_POST['image_position']) ? sanitize_key(wp_unslash($_POST['image_position'])) : 'shortcode';
        $settings['image_position'] = in_array($position,array('shortcode','footer'),true) ? $position : 'shortcode';
        $status = isset($_POST['article_status']) ? sanitize_key(wp_unslash($_POST['article_status'])) : 'draft';
        $settings['article_status'] = in_array($status,array('draft','publish'),true) ? $status : 'draft';
        $settings['article_category'] = isset($_POST['article_category']) ? absint($_POST['article_category']) : 0;
        $settings['article_author'] = isset($_POST['article_author']) ? absint($_POST['article_author']) : get_current_user_id();
        $settings['article_comments'] = !empty($_POST['article_comments']) ? 'open' : 'closed';
        $settings['article_pingbacks'] = !empty($_POST['article_pingbacks']) ? 'open' : 'closed';
        $sections = isset($_POST['article_sections']) ? array_map('sanitize_key',(array)wp_unslash($_POST['article_sections'])) : array();
        $allowed_sections = array('overview');
        $settings['article_sections'] = array_values(array_intersect($sections,$allowed_sections));
        $settings['daily_enabled'] = !empty($_POST['daily_enabled']);
        update_option(GNMM_Core::OPTION,$settings,false);
        wp_safe_redirect(add_query_arg(array('page'=>'goldnow-multilingual-manager','saved'=>'1'),admin_url('admin.php'))); exit;
    }

    public static function run_now() {
        if (!current_user_can('manage_options')) { wp_die('Not allowed.',403); }
        check_admin_referer('gnmm_run_now');
        $module = isset($_POST['module']) ? sanitize_key(wp_unslash($_POST['module'])) : '';
        if (!in_array($module,array('images','articles'),true)) { wp_die('Invalid module.',400); }
        $settings = GNMM_Core::settings();
        if ($module === 'images') {
            do_action('gnmm_run_image_module', $settings);
        } else {
            // Manual reruns refresh today's existing draft/post; cron remains duplicate-safe.
            do_action('gnmm_run_article_module', $settings, 'manual');
        }
        wp_safe_redirect(add_query_arg(array('page'=>'goldnow-multilingual-manager','queued'=>$module),admin_url('admin.php'))); exit;
    }

    private static function bulk_script() {
        ?>
        <script>
        document.addEventListener('DOMContentLoaded',function(){
            document.querySelectorAll('[data-bulk]').forEach(function(master){
                master.addEventListener('change',function(){
                    document.querySelectorAll(master.getAttribute('data-target')).forEach(function(box){box.checked=master.checked;});
                });
            });
        });
        </script>
        <?php
    }

    public static function render() {
        if (!current_user_can('manage_options')) { return; }
        $settings = GNMM_Core::settings();
        $languages = GNMM_Core::languages();
        $countries = GNMM_Gold_Manager::countries();
        $snapshot = GNMM_Gold_Manager::snapshot();
        $categories = get_categories(array('hide_empty'=>false));
        $users = get_users(array('who'=>'authors','orderby'=>'display_name'));
        ?>
        <div class="wrap">
        <h1>GoldNow Multilingual Manager</h1>
        <?php if (!empty($_GET['saved'])): ?><div class="notice notice-success is-dismissible"><p>Settings saved.</p></div><?php endif; ?>
        <?php if (!empty($_GET['queued'])): ?><div class="notice notice-success is-dismissible"><p><?php echo esc_html(ucfirst(sanitize_key(wp_unslash($_GET['queued'])))); ?> module was submitted. Check Recent activity for results.</p></div><?php endif; ?>
        <p>Image generation and article publishing have separate country switches. A country can be selected for images only, articles only, both, or neither.</p>
        <div class="notice <?php echo GNMM_Gold_Manager::ready() && !is_wp_error($snapshot) ? 'notice-success':'notice-error'; ?>"><p><strong>Gold Manager:</strong>
        <?php if (!GNMM_Gold_Manager::ready()) { echo esc_html('Required Gold Manager functions or countries taxonomy were not found.'); }
        elseif (is_wp_error($snapshot)) { echo esc_html($snapshot->get_error_message()); }
        else { echo esc_html(sprintf('Connected. %d gold price rows are available.',count($snapshot['prices_usd']))); } ?></p></div>

        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        <input type="hidden" name="action" value="gnmm_save_settings"><?php wp_nonce_field('gnmm_save_settings'); ?>
        <h2>Language controls</h2>
        <p>All languages start disabled. Enable the language, then choose which modules should run for it.</p>
        <table class="widefat striped"><thead><tr><th>Language</th><th>Enabled</th><th>Images</th><th>Articles</th></tr></thead><tbody>
        <?php foreach ($languages as $code=>$language): $row=$settings['languages'][$code]; ?>
        <tr><td><strong><?php echo esc_html($language['name']); ?></strong> <code><?php echo esc_html($code); ?></code></td>
        <td><input type="checkbox" name="languages[<?php echo esc_attr($code); ?>][enabled]" value="1" <?php checked(!empty($row['enabled'])); ?>></td>
        <td><input type="checkbox" name="languages[<?php echo esc_attr($code); ?>][images]" value="1" <?php checked(!empty($row['images'])); ?>></td>
        <td><input type="checkbox" name="languages[<?php echo esc_attr($code); ?>][articles]" value="1" <?php checked(!empty($row['articles'])); ?>></td></tr>
        <?php endforeach; ?></tbody></table>

        <h2 style="margin-top:24px">Country module selection</h2>
        <p>Choose image and article processing independently for every country. New and previously unconfigured countries remain disabled.</p>
        <p><label><input type="checkbox" data-bulk="1" data-target=".gnmm-all-images"> Select all image countries</label>
        &nbsp; <label><input type="checkbox" data-bulk="1" data-target=".gnmm-all-articles"> Select all article countries</label></p>
        <table class="widefat striped"><thead><tr><th>Country</th><th>Code</th><th>Currency</th><th>Image</th><th>Article</th></tr></thead><tbody>
        <?php if ($countries): foreach ($countries as $code=>$term): $row=$settings['countries'][$code]; ?>
        <tr><td><?php echo esc_html($term->name); ?></td><td><code><?php echo esc_html($code); ?></code></td><td><?php echo esc_html(GNMM_Gold_Manager::currency($term,$code)); ?></td>
        <td><input class="gnmm-all-images" type="checkbox" name="countries[<?php echo esc_attr($code); ?>][images]" value="1" <?php checked(!empty($row['images'])); ?>></td>
        <td><input class="gnmm-all-articles" type="checkbox" name="countries[<?php echo esc_attr($code); ?>][articles]" value="1" <?php checked(!empty($row['articles'])); ?>></td></tr>
        <?php endforeach; else: ?><tr><td colspan="5">No country terms were found.</td></tr><?php endif; ?></tbody></table>

        <h2 style="margin-top:24px">Article settings</h2>
        <p>These settings control the WordPress post created by the article module. New articles are drafts by default for review.</p>
        <table class="form-table"><tbody>
        <tr><th><label for="gnmm_article_status">Publication status</label></th><td><select id="gnmm_article_status" name="article_status"><option value="draft" <?php selected($settings['article_status'],'draft'); ?>>Draft</option><option value="publish" <?php selected($settings['article_status'],'publish'); ?>>Publish automatically</option></select></td></tr>
        <tr><th><label for="gnmm_article_category">Category</label></th><td><select id="gnmm_article_category" name="article_category"><option value="0">Default category</option><?php foreach($categories as $cat): ?><option value="<?php echo esc_attr($cat->term_id); ?>" <?php selected((int)$settings['article_category'],(int)$cat->term_id); ?>><?php echo esc_html($cat->name); ?></option><?php endforeach; ?></select></td></tr>
        <tr><th><label for="gnmm_article_author">Author</label></th><td><select id="gnmm_article_author" name="article_author"><?php foreach($users as $user): ?><option value="<?php echo esc_attr($user->ID); ?>" <?php selected((int)$settings['article_author'],(int)$user->ID); ?>><?php echo esc_html($user->display_name); ?></option><?php endforeach; ?></select></td></tr>
        <tr><th>Comments</th><td><label><input type="checkbox" name="article_comments" value="1" <?php checked($settings['article_comments'],'open'); ?>> Allow comments on generated articles</label></td></tr>
        <tr><th>Pingbacks</th><td><label><input type="checkbox" name="article_pingbacks" value="1" <?php checked($settings['article_pingbacks'],'open'); ?>> Allow pingbacks</label></td></tr>
        <tr><th>Article content</th><td><label><input type="checkbox" checked disabled> Localized overview, intro and body</label><br><span class="description">Gold price table is appended automatically from the live Gold Manager snapshot. Additional article sections can be added when their localized source texts are configured.</span><input type="hidden" name="article_sections[]" value="overview"></td></tr>
        </tbody></table>

        <h2 style="margin-top:24px">Image display and schedule</h2>
        <p><label>Image placement: <select name="image_position"><option value="shortcode" <?php selected($settings['image_position'],'shortcode'); ?>>Before gold tabs content</option><option value="footer" <?php selected($settings['image_position'],'footer'); ?>>Footer fallback</option></select></label></p>
        <p><label><input type="checkbox" name="daily_enabled" value="1" <?php checked(!empty($settings['daily_enabled'])); ?>> Enable daily scheduled processing (only selected language/country/module combinations)</label></p>
        <?php submit_button('Save settings'); ?>
        </form>

        <hr><h2>Manual processing</h2>
        <p>Each button runs only its own module and respects both the language and country switches above.</p>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="display:inline-block;margin-right:12px"><input type="hidden" name="action" value="gnmm_run_now"><input type="hidden" name="module" value="images"><?php wp_nonce_field('gnmm_run_now'); ?><?php submit_button('Generate selected images','secondary','submit',false); ?></form>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="display:inline-block"><input type="hidden" name="action" value="gnmm_run_now"><input type="hidden" name="module" value="articles"><?php wp_nonce_field('gnmm_run_now'); ?><?php submit_button('Create selected articles','secondary','submit',false); ?></form>
        <h2>Recent activity</h2>
        <?php global $wpdb; $log_table=GNMM_Storage::tables()['logs']; $logs=$wpdb->get_results("SELECT level,module,country_code,language,message,created_at FROM {$log_table} ORDER BY id DESC LIMIT 20"); ?>
        <table class="widefat striped"><thead><tr><th>Time (UTC)</th><th>Level</th><th>Module</th><th>Country</th><th>Language</th><th>Message</th></tr></thead><tbody>
        <?php if($logs): foreach($logs as $log): ?><tr><td><?php echo esc_html($log->created_at); ?></td><td><?php echo esc_html($log->level); ?></td><td><?php echo esc_html($log->module); ?></td><td><?php echo esc_html($log->country_code); ?></td><td><?php echo esc_html($log->language); ?></td><td><?php echo esc_html($log->message); ?></td></tr><?php endforeach; else: ?><tr><td colspan="6">No activity recorded yet.</td></tr><?php endif; ?></tbody></table>
        <p><strong>Countries discovered:</strong> <?php echo esc_html((string)count($countries)); ?></p>
        </div>
        <?php self::bulk_script();
    }
}
