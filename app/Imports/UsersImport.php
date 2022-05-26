<?php

namespace App\Imports;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Modules\AreaModule\Entities\Zone;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\UserModule\Entities\User;

class UsersImport implements ToCollection
{
    public function collection(Collection $rows)
    {

        foreach ($rows as $index => $row) {
            if ($index > 0) {
                $validator = Validator::make($row->toArray(), [
                    '0' => 'required|min:3',
                    '1' => 'required|min:3',
                    '2' => 'required|email|unique:users,email',
                    '3' => 'required|min:6',
                    '4' => 'required|numeric|min:11|unique:users,phone',
                    '5' => 'required',
                    '6' => 'required',
                    '7' => 'required',
                    '8' => 'required',
                    '9' => 'required',
                ]);

                if (!$validator->fails()) {
                    $zone = Zone::where(function ($q) use ($row) {
                        $q->where('name_ar', 'like', '%' . $row[9] . '%')->orWhere('name_en', 'like', '%' . $row[9] . '%');
                    })->whereHas('city', function ($q) use ($row) {
                        $q->where('name_ar', 'like', '%' . $row[8] . '%')->orWhere('name_en', 'like', '%' . $row[8] . '%');
                    })->whereHas('government', function ($q) use ($row) {
                        $q->where('name_ar', 'like', '%' . $row[7] . '%')->orWhere('name_en', 'like', '%' . $row[7] . '%');
                    })->whereHas('country', function ($q) use ($row) {
                        $q->where('name_ar', 'like', '%' . $row[6] . '%')->orWhere('name_en', 'like', '%' . $row[6] . '%');
                    })->with('country', 'government', 'city')->first();

                    if ($zone) {
                        User::create([
                            'first_name' => $row[0],
                            'last_name' => $row[1],
                            'email' => $row[2],
                            'password' => trim($row[3]),
                            'phone' => $row[4],
                            'gender' => $row[5] == 'ذكر' ? 1 : 2,
                            'country_id' => $zone->country->id,
                            'government_id' => $zone->government->id,
                            'city_id' => $zone->city->id,
                            'zone_id' => $zone->id,
                            'is_active' => 1,
                            'is_merchant' => 0
                        ]);
                    }
                }
            }
        }
    }
}
