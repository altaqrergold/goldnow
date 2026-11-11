GoldNow Dynamic Country Images 1.0.0
===================================

Purpose
-------
Creates one stable JPEG image per country taxonomy term and refreshes the image content every 24 hours. Each file is stored in:

  wp-content/uploads/goldnow-country-images/{country-code}.jpg

The image is displayed on its matching countries taxonomy page inside a link to that same page, so search engines can associate the image with the country page where it appears.

Data source
-----------
- Country code and currency: countries taxonomy term meta (country_code, country_currency), with the theme's $country_to_currency map as a fallback.
- Gold prices and FX rates: the existing Gold Manager functions and database tables.
- Image rendering: the existing GNAP_Image generator from GoldNow Auto Posts. The original plugins are not edited.

Requirements
------------
- WordPress 5.8+
- PHP 7.4+
- Gold Manager active, with current 24K and currency-rate data.
- GoldNow Auto Posts active, because this add-on deliberately reuses its existing GD image generator, Arabic text shaping, and fonts.
- PHP GD with FreeType enabled on the server.
- The countries taxonomy must expose country_code and country_currency term metadata (or the theme's country-to-currency map must contain the code).

Install
-------
1. Upload and activate goldnow-dynamic-images.zip from Plugins > Add New > Upload Plugin.
2. Open Settings > GoldNow Dynamic Images.
3. Use "تحديث صورة الدولة المحددة" to test Egypt first.
4. If the Egypt image is correct, use "تحديث صور جميع الدول الآن".
5. The plugin also schedules a daily refresh. WP-Cron runs when the site receives visits; for strict timing, configure a real server cron to call WordPress cron regularly.

Stable URLs
-----------
The file name is based only on the country code (for example eg.jpg), so daily regeneration overwrites the same file instead of creating a new URL each day.

Notes
-----
- A country is skipped if its currency rate is unavailable or the gold data is older than 36 hours. The plugin does not invent or fetch replacement prices.
- Country pages that use another taxonomy name or do not expose country_code/country_currency metadata will not be picked up automatically.
- For non-Arab countries that are not already in GoldNow Auto Posts' local flag asset set, the existing image renderer falls back to displaying the country code in the flag badge.
- The plugin does not change posts, featured images, gold calculations, Gold Manager tables, or the Auto Posts scheduler.
