# GoldNow multilingual translation audit

**Branch:** `work/unified-country-template-rebuild`  
**Source template:** `taxonomy-countries-en.php` (unchanged)  
**Test template:** `taxonomy-countries-unified-test.php`  
**Test plugin:** `goldnow-language-manager-multilingual-test.php`

The test build now contains **58 short dictionary entries** and **69 long-form translation blocks**, each populated for the ten configured languages. The new template uses exact phrase lookup, localized blocks with placeholders, the existing multilingual SEO article renderer, and a current-language phrase map for dynamically loaded indicator text.

## Remaining items for visual/runtime review (24)

These are the remaining text fragments found by the static line scan. Most contain dynamic PHP output and are not standalone translation keys; verify them on a rendered page rather than translating their numeric or data portions.

- L212: Gold Prices
- L213: Gold Bars
- L214: Gold Index
- L215: USD Exchange Rates
- L223: All Countries
- L541: Weight / Type
- L590: ({dynamic})
- L591: Price (USD)
- L734: framesContainer.innerHTML = ' ' + {dynamic} + ' ';
- L749: 📊 {dynamic} {dynamic} .
- L1010: : {dynamic}
- L937: 🔹 {dynamic}: {dynamic} {dynamic} {dynamic}: {dynamic} USD
- L938: 🔸 {dynamic} (31.1g): {dynamic} USD
- L957: 🔸 {dynamic}: {dynamic} {dynamic} {dynamic}: {dynamic} USD
- L955: 🔸 {dynamic} (31.1 g): {dynamic} {dynamic} {dynamic}: {dynamic} USD
- L969: 👑 {dynamic}: {dynamic} {dynamic} {dynamic}: {dynamic} USD
- L1061: 🔹 {dynamic}: {dynamic}
- L1071: 🔹 {dynamic}: {dynamic} USD
- L1069: 📊 {dynamic} (31.1g):
- L1072: 🔹 {dynamic}: {dynamic} (USD)
- L1133: Follow Us
- L1135: Join Our Telegram Channel
- L1156: Important Links
- L1165: © {dynamic} AlTaqrer Gold .

## Areas already connected to translation

- Header navigation, country dropdown, page headings, subtitles, tabs and table labels.
- Currency comparison headings and common currency names. Unmapped currency names display ISO currency codes rather than English labels.
- Live report introduction, 24K reference, global USD ounce, 8-gram coin and exchange-rate explanation.
- Gold index, bullion, coin and per-karat descriptions, reusing the existing ten-language SEO content.
- Gold bar weights, coin karat labels, value labels, local/USD price labels and currency names.
- Chart title, note, loading state, error state and dynamically loaded indicator labels.
- Footer headings, country links, legal links, copyright label and site description.

## Remaining runtime checks

- Some strings returned by existing gold cards/info-box shortcodes may not be present in the source template. The exact-text adapter translates dictionary/block phrases; add any new shortcode phrase discovered in staging to the test dictionary.
- Country-name localization depends on PHP Intl. Without Intl, the English country-name fallback remains.
- Verify the translated shortcode output and AJAX indicator in all ten languages, especially Arabic RTL and non-Arabic fallback behavior.

## Preserved data and layout rules

- Original Arabic, English and French templates and `functions.php` are unchanged.
- The new template retains the English layout, CSS classes, ad placements, tabs, tables and shortcode placement.
- Existing price-source variables and conversions remain in place.
- Gold Coin remains 8 grams at the established 21K calculation.
- The global ounce in the Gold Index is displayed as the international USD benchmark only.
- The global ounce section remains quoted in USD.
- Placeholders may move within translated sentences; prices, weights, currency codes, dates, URLs and calculations remain data.
