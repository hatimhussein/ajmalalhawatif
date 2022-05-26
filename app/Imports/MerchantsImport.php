<?php

namespace App\Imports;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Modules\AreaModule\Entities\Zone;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\UserModule\Entities\User;

class MerchantsImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $price_levels = array(
            'سعر عميل خاص' => '1',
            'سعر موزع' => '2',
            'سعر صاحب متجر' => '3',
            'سعر متجر الكتروني' => '4',
            'سعر عميل نهائي' => '5',
        );
        $levels_str = implode(',', array_keys($price_levels));

        foreach ($rows as $index => $row) {
            if ($index > 0) {
                $validator = Validator::make($row->toArray(), [
                    '0' => 'required|min:3',
                    '1' => 'required|min:3',
                    '2' => 'required|email|unique:users,email',
                    '3' => 'required|min:6',
                    '4' => 'required|numeric|min:11|unique:users,phone',
                    '5' => 'required|in:' . $levels_str,
                    '6' => 'required',
                    '7' => 'required',
                    '8' => 'required',
                    '9' => 'required',
                    '10' => 'required',
                    '11' => 'required',
                ]);

                if (!$validator->fails()) {
                    $zone = Zone::where(function ($q) use ($row) {
                        $q->where('name_ar', 'like', '%' . $row[11] . '%')->orWhere('name_en', 'like', '%' . $row[11] . '%');
                    })->whereHas('city', function ($q) use ($row) {
                        $q->where('name_ar', 'like', '%' . $row[10] . '%')->orWhere('name_en', 'like', '%' . $row[10] . '%');
                    })->whereHas('government', function ($q) use ($row) {
                        $q->where('name_ar', 'like', '%' . $row[9] . '%')->orWhere('name_en', 'like', '%' . $row[9] . '%');
                    })->whereHas('country', function ($q) use ($row) {
                        $q->where('name_ar', 'like', '%' . $row[8] . '%')->orWhere('name_en', 'like', '%' . $row[8] . '%');
                    })->with('country', 'government', 'city')->first();

                    if ($zone) {
                        User::create([
                            'company_name' => $row[0],
                            'authorized_person' => $row[1],
                            'email' => $row[2],
                            'password' => trim($row[3]),
                            'phone' => $row[4],
                            'prices_level' => $price_levels[$row[5]],
                            'gender' => $row[6] == 'ذكر' ? 1 : 2,
                            'account_number' => $row[7],
                            'country_id' => $zone->country->id,
                            'government_id' => $zone->government->id,
                            'city_id' => $zone->city->id,
                            'zone_id' => $zone->id,
                            'is_active' => 1,
                            'is_merchant' => 1,
                        ]);
                    }
                }
            }
        }
    }
}
