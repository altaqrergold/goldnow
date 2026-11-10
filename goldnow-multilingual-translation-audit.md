# GoldNow multilingual translation audit

**Branch:** `work/unified-country-template-rebuild`  
**Source template:** `taxonomy-countries-en.php` (unchanged)  
**Test template:** `taxonomy-countries-unified-test.php`  
**Test plugin:** `goldnow-language-manager-multilingual-test.php`

The new template now uses the multilingual dictionary for exact labels, localized block templates for long text, locale-aware country/currency labels, and the existing per-language SEO article data. Dynamic prices, dates, weights and currency codes remain values and are not translated.

## Remaining visible text requiring a specific check (14)

- L584: ({dynamic})
- L728: framesContainer.innerHTML = ' ' + {dynamic} + ' ';
- L743: 📊 {dynamic} {dynamic} .
- L1004: : {dynamic}
- L931: 🔹 {dynamic}: {dynamic} {dynamic} {dynamic}: {dynamic} USD
- L932: 🔸 {dynamic} (31.1g): {dynamic} USD
- L951: 🔸 {dynamic}: {dynamic} {dynamic} {dynamic}: {dynamic} USD
- L949: 🔸 {dynamic} (31.1 g): {dynamic} {dynamic} {dynamic}: {dynamic} USD
- L963: 👑 {dynamic}: {dynamic} {dynamic} {dynamic}: {dynamic} USD
- L1055: 🔹 {dynamic}: {dynamic}
- L1065: 🔹 {dynamic}: {dynamic} USD
- L1063: 📊 {dynamic} (31.1g):
- L1066: 🔹 {dynamic}: {dynamic} (USD)
- L1159: © {dynamic} AlTaqrer Gold .

## Areas covered by localized blocks and SEO content

- Live report introduction, karat coverage, 24K gram reference, global ounce, 8-gram coin and exchange-rate explanation.
- Gold index, bullion, coin and per-karat explanatory copy from the existing 10-language SEO content source.
- Gold bar weights and coin purity labels.
- Currency names for the most common country currencies; unsupported currency names display their standard currency code rather than an English label.
- Chart title, loading/error messages, chart note and dynamically loaded indicator labels.
- Country navigation, country names where PHP Intl is available, regional footer links, footer description and legal links.

## Remaining review notes

- Some visible content inside the existing gold cards/info-box shortcodes may be returned by their own PHP functions. The exact-text adapter translates only phrases present in the dictionary; any new phrase returned by those functions must be added to the dictionary or converted to a block call.
- The AJAX indicator uses the exported English-to-current-locale phrase map after normalizing known Arabic labels.
- Country-name localization uses PHP Intl when available. If Intl is unavailable, the English country fallback remains.
- Currency names are translated for common currencies; other codes remain as ISO currency codes to avoid showing the wrong language.

## Data and layout invariants

- Original Arabic, English and French templates and `functions.php` remain unchanged.
- Preserve the English layout, ordering, CSS classes, ads, tabs, tables and shortcode placement.
- Existing price calculations and source variables are retained.
- Gold Coin remains 8 grams at the established 21K reference calculation.
- The global ounce in the Gold Index is shown only as the international USD benchmark; local-ounce display is omitted there.
- The global ounce section remains quoted in USD.
- Translations may reorder placeholders; numeric values, currency codes, dates, URLs and calculations remain unchanged.
