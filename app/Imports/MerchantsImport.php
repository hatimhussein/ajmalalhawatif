<?php

namespace App\Imports;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\AreaModule\Entities\Zone;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\UserModule\Entities\User;

class MerchantsImport implements ToModel, WithHeadingRow, WithChunkReading, WithBatchInserts
{

    public function model(array $row)
    {
//        "rkm_alhsab" => 121111
//          "asm_alshrkh" => "شركة Test"
//          "alshkhs_almfod" => "علي حسن الشمراني"
//          "albryd_alalktron" => "q@q.q"
//          "kod_aldol" => 966
//          "rkm_alhatf" => 596656679
//          "alsgl_altgary" => 4545
//          "alrkm_aldryby" => "00001111000011111"
//          "alhal" => 1
//          "aldfaa_aand_alastlam" => 1
//          "ldyh_hsab_agl" => 1
//          "althoyl_albnky" => 1
//          "msto_alasaaar" => 3
//          "aldol" => "السعودية"
//          "almntk" => "القنفذة"
//          "almdyn" => "مكة المكرمة"
//          "almhafth" => "المنطقة الغربية"
//          "alshaaar" => "1649738528اسود.jpg"
//          "klm_almror" => "123"
//          "tarykh_altsgyl" => "2021-03-23 21:21:29"

//        $price_levels = array(
//            'سعر عميل خاص' => '1',
//            'سعر موزع' => '2',
//            'سعر صاحب متجر' => '3',
//            'سعر متجر الكتروني' => '4',
//            'سعر عميل نهائي' => '5',
//        );
//        $levels_str = implode(',', array_keys($price_levels));

//                $validator = Validator::make($row->toArray(), [
//                    '0' => 'required|min:3',
//                    '1' => 'required|min:3',
//                    '2' => 'required|email|unique:users,email',
//                    '3' => 'required|min:6',
//                    '4' => 'required|numeric|min:11|unique:users,phone',
//                    '5' => 'required|in:' . $levels_str,
//                    '6' => 'required',
//                    '7' => 'required',
//                    '8' => 'required',
//                    '9' => 'required',
//                    '10' => 'required',
//                    '11' => 'required',
//                ]);

//                if (!$validator->fails()) {
                    $zone = Zone::where(function ($q) use ($row) {
                        $q->where('name_ar', 'like', '%' . $row['almntk'] . '%')->orWhere('name_en', 'like', '%' . $row['almntk'] . '%');
                    })->whereHas('city', function ($q) use ($row) {
                        $q->where('name_ar', 'like', '%' . $row['almdyn'] . '%')->orWhere('name_en', 'like', '%' . $row['almdyn'] . '%');
                    })->whereHas('government', function ($q) use ($row) {
                        $q->where('name_ar', 'like', '%' . $row['almhafth'] . '%')->orWhere('name_en', 'like', '%' . $row['almhafth'] . '%');
                    })->whereHas('country', function ($q) use ($row) {
                        $q->where('name_ar', 'like', '%' . $row['aldol'] . '%')->orWhere('name_en', 'like', '%' . $row['aldol'] . '%');
                    })->with('country', 'government', 'city')->first();

                    if ($zone) {
                        $user = User::query()->where('account_number', '=', trim($row['rkm_alhsab']))->first();

                        if ($user){
                            $user->update([
                                'company_name' => $row['asm_alshrkh'],
                                'authorized_person' => $row['alshkhs_almfod'],
                                'email' => $row['albryd_alalktron'],
                                'phone' => $row['rkm_alhatf'],
                                'prices_level' => $row['msto_alasaaar'],
                                'account_number' => trim($row['rkm_alhsab']),
                                'country_id' => $zone->country->id,
                                'government_id' => $zone->government->id,
                                'city_id' => $zone->city->id,
                                'zone_id' => $zone->id,
                                'is_active' => $row['alhal'] == 1 ? 1 : 0,
                                'is_merchant' => 1,
                                'can_cash' => $row['aldfaa_aand_alastlam'] == 1 ? 1 : 0,
                                'has_forward_account' => $row['ldyh_hsab_agl'] == 1 ? 1 : 0,
                                'bank_transfer' => $row['althoyl_albnky'] == 1 ? 1 : 0,
                                'logo' => $row['alshaaar'] ?? '',
                            ]);
                        }else{
                            User::create([
                                'company_name' => $row['asm_alshrkh'],
                                'authorized_person' => $row['alshkhs_almfod'],
                                'email' => $row['albryd_alalktron'],
                                'password' => trim($row['klm_almror']),
                                'phone' => $row['rkm_alhatf'],
                                'prices_level' => $row['msto_alasaaar'],
                                'account_number' => trim($row['rkm_alhsab']),
                                'country_id' => $zone->country->id,
                                'government_id' => $zone->government->id,
                                'city_id' => $zone->city->id,
                                'zone_id' => $zone->id,
                                'is_active' => $row['alhal'] == 1 ? 1 : 0,
                                'is_merchant' => 1,
                                'can_cash' => $row['aldfaa_aand_alastlam'] == 1 ? 1 : 0,
                                'has_forward_account' => $row['ldyh_hsab_agl'] == 1 ? 1 : 0,
                                'bank_transfer' => $row['althoyl_albnky'] == 1 ? 1 : 0,
                                'logo' => $row['alshaaar'] ?? '',
                            ]);
                        }
                    }

    }

    public function batchSize(): int
    {
        return 300;
    }

    public function chunkSize(): int
    {
        return 300;
    }

}
