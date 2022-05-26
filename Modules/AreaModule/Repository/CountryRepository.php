<?php

namespace Modules\AreaModule\Repository;

use Illuminate\Support\Facades\DB;
use Modules\AreaModule\Entities\Country;


/**
 * SliderRepository Class, will deal with all data of Slider,
 * Including its images and relations.
 */
class CountryRepository
{
    static function findCountry($id)
    {
        $country = Country::where('id', $id)->first();

        return $country;
    }

    static function findAllCountries($with = false)
    {
        if ($with)
            $countries = Country::with($with)->get();
        else
            $countries = Country::all();

        return $countries;
    }

    static function find_limit()
    {
        $countrys = Country::limit(4)->get();

        return $countrys;
    }

    static function save($data)
    {
        $country = Country::create($data);

        return $country;
    }

    static function update($id, $data)
    {
        $country = Country::where('id', $id)->update($data);
        return $country;
    }


    static function delete($id)
    {
        $option = Country::where('id', $id)->with('governments')->first();

        if ($option->governments->count() <= 0) {
            Country::destroy($id);
            return true;
        }

        return false;
    }

}
