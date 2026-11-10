# GoldNow multilingual test build

This is an isolated test build. It does not replace or edit the production language manager or the original country templates.

## New files

- `goldnow-language-manager-multilingual-test.php` — separate plugin class, options, admin page and shortcodes. It supports the ten configured languages, exact text lookup, full text/HTML blocks with placeholders, strict non-Arabic fallback, export of translations and blocks, and an opt-in country-template loader.
- `taxonomy-countries-unified-test.php` — new country taxonomy template copied from the working English layout and wired to the test language manager.
- `goldnow-multilingual-translation-audit.md` — visible-text audit and remaining review notes.

## Existing dependencies

The test plugin loads the existing SEO files from its own directory:

- `goldnow-seo-content.php`
- `goldnow-seo-shortcode.php`
- `goldnow-seo-admin.php`

Keep those files beside the test plugin when installing it. Their existing multilingual article content is reused; the SEO source file is not modified by this test build.

## Staging test procedure

1. Back up the staging site and database.
2. Install `goldnow-language-manager-multilingual-test.php` beside the existing SEO files in the plugin directory.
3. Copy `taxonomy-countries-unified-test.php` into the active theme root (or child-theme root).
4. Activate the new test plugin. Its class, options and translation shortcodes use a separate namespace; the existing plugin files are not overwritten.
5. Open **Settings → GoldNow Multilingual Test**.
6. Enable **تفعيل القالب الجديد لصفحات تصنيف الدول فقط**. The loader switches only the `countries` taxonomy template, and only when the new theme file is present.
7. Test the Arabic, English, French, German, Spanish, Italian, Portuguese, Russian, Hindi and Turkish country URLs, including the ten gold tabs.
8. To roll back, disable the template test checkbox or deactivate the test plugin. The original theme template is then used again.

Do not enable the template switch on the live site before the staging checks pass.

## Translation behavior

- Language is selected from the first URL path segment, using the current routing convention.
- Missing non-Arabic translations fall back to English, never silently to Arabic.
- Text blocks support placeholders such as `{country}`, `{price}`, `{currency}`, `{karat}` and `{weight}`; each language may reorder them.
- Safe HTML tags and inline styles are retained in saved blocks through WordPress KSES. Scripts, event handlers and unsafe URLs are not allowed.
- Dynamically loaded indicator labels receive an English-to-current-language dictionary from the plugin.
- Country names use PHP Intl when available. Common currency names are translated; other currencies use their ISO code instead of an English currency name.

## Preserved behavior

- Original `taxonomy-countries.php`, `taxonomy-countries-en.php`, `taxonomy-countries-fr.php` and `functions.php` are untouched.
- Existing country routing and rewrite rules are untouched.
- The English layout, ad placements, tabs, table structure and CSS class names are retained in the new template.
- Price-source variables and existing conversions are retained.
- The gold coin remains 8 grams at the established 21K calculation.
- The global ounce in the Gold Index is displayed as the international USD benchmark only.

## Validation status

The GitHub-side static checks confirm that the default dictionary JSON parses, all dictionary entries include all ten language fields, all 69 default block entries include all ten language fields, and the PHP source delimiters are balanced. A live WordPress runtime/PHP lint test has not been run from this repository session; perform the staging procedure before treating this as production-ready.
