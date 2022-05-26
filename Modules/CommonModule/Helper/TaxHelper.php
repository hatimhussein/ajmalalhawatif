<?php


namespace Modules\CommonModule\Helper;


trait TaxHelper
{
    /**
     * @param $country_id
     * @return int
     */
    public static function getCountryIdTaxValue($country_id)
    {
        $tax = app('tax_settings');
        if ($tax->is_active) {
            return $country_id == $tax->country_id ? $tax->country_tax : $tax->other_country_tax;
        }
        return 0;
    }

    /**
     * @return bool
     */
    public static function isTaxAppliedOnShipping(): bool
    {
        $tax = app('tax_settings');
        if ($tax->is_active && $tax->tax_shipping) {
            return true;
        }
        return false;
    }

    /**
     * @param $price
     * @param $tax_value
     * @return float|int
     */
    public static function getTaxedPrice($price, $tax_value)
    {
        return round($price + ($price * $tax_value) / 100, 2);
    }
}
