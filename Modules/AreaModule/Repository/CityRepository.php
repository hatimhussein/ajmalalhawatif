<?php

namespace Modules\AreaModule\Repository;

use Illuminate\Support\Facades\DB;
use Modules\AreaModule\Entities\City;


class CityRepository
{
    static function find($id)
    {
        $city = City::where('id', $id)->with(['country', 'government'])->first();

        return $city;
    }

    static function findAll()
    {
        $cities = City::all();

        return $cities;
    }

    static function findWhere($att, $value)
    {
        $city = City::where($att, $value)->get();

        return $city;
    }

    static function save($data)
    {
        $city = City::create($data);

        return $city;
    }

    static function update($id, $data)
    {
        return City::where('id', $id)->update($data);

    }


    static function delete($id)
    {
        $city = City::where('id', $id)->with(['zones', 'users', 'userAdresses'])->first();

        if ($city->zones->count() <= 0 && $city->users->count() <= 0 && $city->userAdresses->count() <= 0) {
            City::destroy($id);
            return true;
        }

        return false;

    }
}
