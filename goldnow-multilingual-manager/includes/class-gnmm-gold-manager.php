<?php
if (!defined('ABSPATH')) { exit; }

final class GNMM_Gold_Manager {
    public static function ready() {
        return function_exists('infi_get_latest_gold_prices')
            && function_exists('infi_get_latest_currency_rates')
            && taxonomy_exists('countries');
    }

    public static function countries() {
        if (!taxonomy_exists('countries')) { return array(); }
        $terms = get_terms(array('taxonomy' => 'countries', 'hide_empty' => false, 'number' => 0));
        if (is_wp_error($terms) || !is_array($terms)) { return array(); }
        $out = array();
        foreach ($terms as $term) {
            $code = self::country_code($term);
            if ($code !== '' && !isset($out[$code])) { $out[$code] = $term; }
        }
        return $out;
    }

    public static function country_code($term) {
        if (!is_object($term) || empty($term->term_id)) { return ''; }
        $code = get_term_meta((int) $term->term_id, 'country_code', true);
        if (!$code && !empty($term->slug)) { $code = $term->slug; }
        $code = strtolower(preg_replace('/[^a-z0-9]/', '', (string) $code));
        return preg_match('/^[a-z]{2,3}$/', $code) ? $code : '';
    }

    public static function currency($term, $code = '') {
        $currency = strtoupper((string) get_term_meta($term->term_id, 'country_currency', true));
        if ($currency === '') {
            global $country_to_currency;
            if (is_array($country_to_currency) && $code !== '' && !empty($country_to_currency[$code])) {
                $currency = strtoupper((string) $country_to_currency[$code]);
            }
        }
        return preg_match('/^[A-Z]{3}$/', $currency) ? $currency : '';
    }

    public static function snapshot() {
        if (!self::ready()) {
            return new WP_Error('gnmm_gold_manager_missing', 'Gold Manager APIs or countries taxonomy are not available.');
        }
        $gold = infi_get_latest_gold_prices();
        $rates = infi_get_latest_currency_rates();
        if (!is_array($gold) || !$gold) {
            return new WP_Error('gnmm_gold_prices_missing', 'Gold Manager returned no gold price rows.');
        }
        if (!is_array($rates)) {
            return new WP_Error('gnmm_rates_missing', 'Gold Manager returned invalid currency rates.');
        }

        $prices = array();
        $updated = 0;
        foreach ($gold as $row) {
            if (!is_array($row) || empty($row['carat']) || !isset($row['price_usd'])) { continue; }
            $value = (float) $row['price_usd'];
            if ($value <= 0) { continue; }
            $prices[(string) $row['carat']] = $value;
            if (!empty($row['fetch_date'])) {
                $stamp = strtotime((string) $row['fetch_date'] . ' UTC');
                if ($stamp) { $updated = max($updated, $stamp); }
            }
        }
        if (!$prices) {
            return new WP_Error('gnmm_gold_prices_invalid', 'Gold Manager price rows did not contain usable price_usd values.');
        }
        return array(
            'prices_usd' => $prices,
            'currency_rates' => $rates,
            'source_updated_at' => $updated,
            'raw_gold_rows' => $gold,
        );
    }

    public static function localized_country_name($term, $language) {
        if (function_exists('altaqrer_ml_country_name')) {
            $name = altaqrer_ml_country_name($term, $language);
            if (is_string($name) && $name !== '') { return $name; }
        }
        if ($language === 'en') {
            $name = get_term_meta($term->term_id, 'country_english_name', true);
            if (is_string($name) && $name !== '') { return $name; }
        }
        return (string) $term->name;
    }

    public static function country_url($term, $language) {
        if ($language === 'ar') {
            $url = get_term_link($term);
            return is_wp_error($url) ? '' : $url;
        }
        return home_url('/' . rawurlencode($language) . '/country/' . rawurlencode($term->slug) . '/');
    }

    public static function local_price($usd_price, $currency, $rates) {
        if ($currency === 'USD') { return (float) $usd_price; }
        if (empty($rates[$currency])) { return null; }
        $usd_base = !empty($rates['USD']) ? (float) $rates['USD'] : 1.0;
        if ($usd_base <= 0) { return null; }
        return (float) $usd_price * ((float) $rates[$currency] / $usd_base);
    }
}
