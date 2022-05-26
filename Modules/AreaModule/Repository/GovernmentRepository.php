<?php

namespace Modules\AreaModule\Repository;

use Illuminate\Support\Facades\DB;
use Modules\AreaModule\Entities\Government;


class GovernmentRepository
{

    static function findAll()
    {
        $govs = Government::with('country')->get();

        // dd($govs);
        return $govs;
    }

    static function find($id)
    {
        $gov = Government::where('id', $id)->first();

        return $gov;
    }

    static function findWhere($att, $value)
    {
        $gov = Government::where($att, $value)->get();

        return $gov;
    }

    static function save($data)
    {
        $gov = Government::create($data);

        return $gov;
    }

    static function update($id, $data)
    {
        $gov = Government::where('id', $id)->update($data);

        return $gov;

    }

    static function delete($id)
    {
        $government = Government::where('id', $id)->with(['cities', 'users', 'userAdresses'])->first();

        if ($government->cities->count() <= 0 && $government->users->count() <= 0 && $government->userAdresses->count() <= 0) {
            Government::destroy($id);
            return true;
        }

        return false;

    }

}
