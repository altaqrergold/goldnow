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

$gn = goldnow_country_directory_labels($gn_lang);
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
<?php echo do_shortcode('[goldnow_country_directory]'); ?>
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