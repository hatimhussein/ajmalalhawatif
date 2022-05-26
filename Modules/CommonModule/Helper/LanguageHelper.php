<?php

namespace Modules\CommonModule\Helper;

use App;
use Modules\CommonModule\Entities\Language;

class LanguageHelper
{
    /**
     * Retrieve all active lang from db.
     * active lang has [1] property.
     *
     * @return void
     */
    static function getLang()
    {
        $lang = Language::where('active', '=', 1)->get();

        return $lang;
    }

    public static function productName($product)
    {
        $name = (App::getLocale() == 'en') ? $product->name_en : $product->name_ar;
        return $name;
    }

    public static function productDescription($product)
    {
        $name = (App::getLocale() == 'en') ? $product->desc_en : $product->desc_ar;
        return $name;
    }

    public static function productDetails($product)
    {
        $name = (App::getLocale() == 'en') ? $product->details_en : $product->details_ar;
        return $name;
    }

    public static function nameTranslate($identifier, $type = 'obj')
    {
        if ($identifier == null)
            return null;
        if ($type == 'obj')
            $name = (App::getLocale() == 'en') ? $identifier->name_en : $identifier->name_ar;
        else
            $name = (App::getLocale() == 'en') ? $identifier['name_en'] : $identifier['name_ar'];

        return $name;
    }

    public static function descTranslate($identifier, $type = 'obj')
    {
        if ($identifier == null)
            return null;
        if ($type == 'obj')
            $name = (App::getLocale() == 'en') ? $identifier->name_en : $identifier->name_ar;
        else
            $name = (App::getLocale() == 'en') ? $identifier['name_en'] : $identifier['name_ar'];

        return $name;
    }


    public static function categoryName($category)
    {
        $name = (App::getLocale() == 'en') ? $category->name_en : $category->name_ar;
        return $name;
    }

    public static function deliverytimeName($deliverytime)
    {
        $name = (App::getLocale() == 'en') ? $deliverytime->deliverytime_en : $deliverytime->deliverytime_ar;
        return $name;
    }


    public static function configTranslate($config)
    {

        $name = (App::getLocale() == 'en') ? $config->display_name_en : $config->display_name_ar;
        return $name;
    }

    public static function configValue($config)
    {
        $name = (App::getLocale() == 'en') ? $config->value_en : $config->value_ar;
        return $name;
    }

    public static function title($title)
    {
        if ($title != null)
            $name = (App::getLocale() == 'en') ? $title->title_en : $title->title_ar;
        return $name;
    }

    public static function seoTranslate($seo, $key)
    {
        $data = "";
        if ($seo != null) {
            if ($key == 'name')
                $data = (App::getLocale() == 'en') ? $seo->name_en : $seo->name_ar;
            elseif ($key == 'desc')
                $data = (App::getLocale() == 'en') ? $seo->desc_en : $seo->desc_ar;
            elseif ($key == 'keys')
                $data = (App::getLocale() == 'en') ? $seo->keys_en : $seo->keys_ar;
        }
        return $data;

    }

    public static function getTranslated($item, $attribute)
    {
        $attribute = $attribute . '_' . app()->getLocale();
        return is_array($item) ? $item[$attribute] : $item->$attribute;
    }


}
