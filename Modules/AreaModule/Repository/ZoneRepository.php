<?php

namespace Modules\AreaModule\Repository;

use Illuminate\Support\Facades\DB;
use Modules\AreaModule\Entities\Zone;


class ZoneRepository
{
    static function find($id)
    {
        return Zone::where('id', $id)->with(['country', 'government', 'city'])->first();
    }

    static function findAll()
    {
        return Zone::all();
    }

    static function getAll($with = ['country', 'government', 'city'])
    {
        return Zone::with($with)->get();
    }

    static function findWhere($att, $value)
    {
        return Zone::where($att, $value)->get();
    }

    static function save($data)
    {
        return Zone::create($data);
    }

    static function update($id, $data)
    {
        return Zone::where('id', $id)->update($data);
    }


    static function delete($id): bool
    {
        $zone = Zone::where('id', $id)->with(['users', 'userAdresses'])->first();

        if ($zone->users->count() <= 0 && $zone->userAdresses->count() <= 0) {
            Zone::destroy($id);
            return true;
        }

        return false;
    }
}
