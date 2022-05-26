<?php


namespace Modules\CommonModule\Helper;

use App;
use Modules\ConfigModule\Entities\Currency;
use Modules\ProductFeatureModule\Entities\Offers;
use Modules\ConfigModule\Entities\Tax;
use Session;

trait ProductHelper
{
    public static function calDiscountAmountWithoutCurrency($product_price, $discount, $with_tax = true)
    {
        if (!$discount) {
            return $product_price;
        } else {
            $discount = ($discount->discount_type === 'percentage') ?
                $product_price * $discount->discount_value / 100 :
                $discount->discount_value;

            $new_price = round($product_price - $discount, 2);
            $product_price = $new_price > 0 ? $new_price : $product_price;
            return ($with_tax) ? self::addTaxToPrice($product_price) : $product_price;
        }
    }

    public static function calDiscountAmount($product_price, $discount, $with_tax = true)
    {
        $currency = Session::get('currency');
        $val = $currency->value;

        if (!$discount) {
            return $product_price * $val;
        } else {
            $discount = ($discount->discount_type === 'percentage') ?
                $product_price * $discount->discount_value / 100 :
                $discount->discount_value;

            $new_price = round(($product_price - $discount) * $val, 2);
            $product_price = $new_price > 0 ? $new_price : $product_price;
            return ($with_tax) ? self::addTaxToPrice($product_price) : $product_price;
        }
    }

    public static function productName($product)
    {
        $name = (App::isLocale('en')) ? $product->name_en : $product->name_ar;
        return $name;
    }

    public static function calPriceCurrency($price)
    {
        return $price * session('currency')->value;
    }

    public function calculateProductPrice($product, $quantity, $with_tax = true, $admin = false)
    {
        $product_price = ($admin) ? $product->price : $product->tax_free_price;

        $discount = $product->discounts->sortByDesc('id')->where('discount_quantity', '<=', $quantity)->first();

        if ($discount) {
            return $this->calDiscountAmountWithoutCurrency($product_price, $discount, $with_tax);
        } else {
            return $with_tax ? self::addTaxToPrice($product_price) : $product_price;
        }
    }


    public static function addTaxToPrice($product_price)
    {
        $tax = app('tax_settings');
        $country_tax = $tax->country_tax;
        if (auth()->check()) {
            $country_tax = ($tax->country_id == auth()->user()->country_id) ? $tax->country_tax : $tax->other_country_tax;
        }
        if ($tax->is_active && $tax->tax_product) {
            $product_price += (($product_price * $country_tax) / 100);
        }

        return $product_price > 0 ? round($product_price, 2) : 0;
    }

    public function calculateProductTaxFreePrice($product, $quantity)
    {
        $product_price = $product->tax_free_price;

        $discount = $product->discounts->sortByDesc('id')->where('discount_quantity', '<=', $quantity)->first();

        if ($discount) {
            return $this->calDiscountAmountWithoutCurrency($product_price, $discount);
        } else {
            return $product_price;
        }
    }

    public static function getRawDiscountPrice($price, $discount)
    {
        if ($discount)
            return self::calDiscountAmountWithoutCurrency($price, $discount);
        else return $price;
    }

    public static function getCurrentPrice($product)
    {
        $product_price = $product->product_price;

        if (auth()->check() && auth()->user()->is_merchant == 1) {
            if (auth()->user()->prices_level == 1) {
                $product_price = $product->product_price1;
            } elseif (auth()->user()->prices_level == 2) {
                $product_price = $product->product_price2;
            } elseif (auth()->user()->prices_level == 3) {
                $product_price = $product->product_price3;
            } elseif (auth()->user()->prices_level == 4) {
                $product_price = $product->product_price4;
            }
        }

        return $product_price;
    }

    // getCurrentPriceWithTax
    public static function getCurrentPriceWithTax($product)
    {
        $product_price = $product->product_price;

        if (auth()->check() && auth()->user()->is_merchant == 1) {
            if (auth()->user()->prices_level == 1) {
                $product_price = $product->product_price1;
            } elseif (auth()->user()->prices_level == 2) {
                $product_price = $product->product_price2;
            } elseif (auth()->user()->prices_level == 3) {
                $product_price = $product->product_price3;
            } elseif (auth()->user()->prices_level == 4) {
                $product_price = $product->product_price4;
            }
        }

        $tax = Tax::first();
        $tax_product = $tax->tax_product;
        $tax_active = $tax->is_active;
        $country_tax = $tax->country_tax;
        if ($tax_active == 1 && $tax_product == 1) {
            $new_price = ($product_price * $country_tax) / 100;
            $price = $product_price + $new_price;
            return $price;
        } else {
            return $product_price;
        }
        //return $product_price;
    }

    public static function calDiscountAmountForAdmin($product_price, $discountType, $discountValue, $offer_id, $prices_level)
    {
        $flag = 0;
        $tax = Tax::all()->first();
        $tax_product = $tax->tax_product;
        $tax_active = $tax->is_active;
        if ($tax_active == 1 && $tax_product == 1)
            $flag = 1;
        if ($offer_id > 0) {
            $offer_data = Offers::where('id', $offer_id)->first();

            $user_level = $prices_level;


            $data = $offer_data->viewed_levels;
            // $data='2_4_5';
            $viewed_levels = explode('_', $data);
            if (in_array($user_level, $viewed_levels)) {


                if ($discountType == 'percentage') {
                    $discount = $product_price * $discountValue / 100;
                } else {
                    $discount = $discountValue;
                }

                $currency = Session::get('currency');
                $val = $currency->value;
                $new_price = ($product_price - $discount);
                if ($flag == 1) {
                    return self::calTaxUserPrice($new_price);
                    // $tax_price = ($new_price*$tax->country_tax)/100;
                    // $new_product_price =$new_price+$tax_price;
                    //  return $new_product_price;
                } else {
                    return $new_price;
                }

            } else {
                $currency = Session::get('currency');
                $val = $currency->value;
                if ($flag == 1) {
                    return self::calTaxUserPrice($product_price);
                    //  $tax_price = ($product_price*$tax->country_tax)/100;

                    // $new_product_price =$product_price+$tax_price;
                    //  return $new_product_price;
                } else {
                    return $product_price;
                }
                // return $product_price;
            }

        } else {

            if ($discountType == 'percentage') {
                $discount = $product_price * $discountValue / 100;
            } else {
                $discount = $discountValue;
            }

            $currency = Session::get('currency');
            $val = $currency->value;
            $new_price = ($product_price - $discount);
            if ($flag == 1) {
                return self::calTaxUserPrice($new_price);


                //      $tax_price = ($new_price*$tax->country_tax)/100;
                // $new_product_price =$new_price+$tax_price;
                //  return $new_product_price;
            } else {
                return $new_price;
            }
        }

    }


    public static function calPriceTax($sub_total)
    {
        $tax = Tax::where('is_active', 1)->where('tax_shipping', 1)->first();
        if ($tax) {

            if ($tax->country_id == 1) {
                $tax_shipping = $tax->country_tax;

            } else {
                $tax_shipping = $tax->other_country_tax;
            }

            $tax_sub_total = ($sub_total * $tax_shipping) / 100;
            $sub_total_tax = $sub_total + $tax_sub_total;
            $sub_total = $sub_total_tax;
        }
        return $sub_total;
    }

    public static function calTaxUserPrice($price)
    {
        $tax = Tax::all()->first();
        $country_id = $tax->country_id;
        if (auth()->check()) {
            $auth_country = auth()->user()->country_id;
            if ($country_id == $auth_country)
                $tax_value = $tax->country_tax;
            else
                $tax_value = $tax->other_country_tax;
        } else {
            $tax_value = $tax->country_tax;
        }
        $tax_price = ($price * $tax_value) / 100;
        $new_product_price = $price + $tax_price;

        return $new_product_price;
    }


    public static function getPriceLevel($level)
    {
        switch ($level) {
            case '1':
                $col = 'product_price1';
                break;
            case '2':
                $col = 'product_price2';
                break;
            case '3':
                $col = 'product_price3';
                break;
            case '4':
                $col = 'product_price4';
                break;
            default:
                $col = 'product_price';
                break;
        }
        return $col;
    }
}
