<?php

namespace Modules\ConfigModule\Repository;

use Illuminate\Database\Eloquent\Collection;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\ConfigModule\Entities\Config;
use Modules\ConfigModule\Entities\ConfigCategory;
use Modules\WarrantyModule\Repository\BaseRepository;

class ConfigRepository extends BaseRepository
{
    use UploaderHelper;

    function model(): string
    {
        return Config::class;
    }

    function getConfigsByKey($keys)
    {
        return Config::whereIn('key', $keys)->get();
    }

    function getConfigByCategoryId($categories)
    {
        return Config::whereIn('category_id', $categories)->orderBy('id')->get();
    }

    function getConfigByCategoryKey($key)
    {
        $keys = func_get_args();
        return Config::query()->whereHas('category', function ($q) use ($keys) {
            return $q->whereIn('key', $keys);
        })->get();
    }

    function configCategorires()
    {
        return ConfigCategory::with('configs')->where('id', '!=', '6')->get();
    }


    public function update($data, $category_id = null)
    {
        $update = [
            "value_ar" => $data['value_ar'],
        ];
        if (isset($data['value_en'])) {
            $update["value_en"] = $data['value_en'];
        }
        if (isset($data['photo'])) {
            $update["photo"] = $data['photo'];
        }

        $query = Config::where('key', $data['key']);

        if ($category_id) {
            $query = $query->where('category_id', $category_id);
        }

        return $query->update($update);
    }


    public function updateConfigArray($data)
    {
        foreach ($data as $key => $val) {
            if (request()->hasFile($key)) {
                $image = request()->file($key);
                $val = $this->upload($image, 'img');
                Config::where('key', $key)->update(["photo" => $val]);
            } elseif ($key == 'gift_price') {
                $config = Config::where('key', $key)->first();
                $config->update($val);
            } elseif ($key == 'warranty') {
                Config::where('key', $key)->update($val);
            } elseif ($key == 'site_name') {
                Config::where('key', '=', 'site_name')->update([
                    'value_' . app()->getLocale() => $val,
                ]);
            } elseif ($key == 'hotline') {
               Config::where('key', '=', 'hotline')->update([
                    'value_' . app()->getLocale() => $val,
                ]);
            } elseif ($key == 'email') {
                Config::where('key', '=', 'email')->update([
                    'value_' . app()->getLocale() => $val,
                ]);
            } else {
                $val = $val ?? '';
                Config::where('key', $key)->update(["value_ar" => $val]);
            }
        }
    }

    public function updateConfigArrayShare($data)
    {

        foreach ($data as $key => $val) {

            if (request()->hasFile($key)) {
                $image = request()->file($key)['image'];
                $image = $this->upload($image, 'img');
                Config::where('key', $key)->update(["photo" => $image]);
            }

            $val = $val ?? '';

            Config::where('key', $key)->update(["value_ar" => $val['ar'], "value_en" => $val['en']]);

        }
    }

    public function setMailConfigs($configs)
    {
        config([
            'mail.driver' => $configs->where('key', 'driver')->first()->value_ar ?? 'smtp',
            'mail.host' => $configs->where('key', 'host')->first()->value_ar ?? '',
            'mail.port' => $configs->where('key', 'port')->first()->value_ar ?? '',
            'mail.encryption' => $configs->where('key', 'encryption')->first()->value_ar ?? '',
            'mail.from.address' => $configs->where('key', 'from_email')->first()->value_ar ?? '',
            'mail.username' => $configs->where('key', 'username')->first()->value_ar ?? '',
            'mail.password' => $configs->where('key', 'password')->first()->value_ar ?? '',
        ]);
    }

    public function setSmsConfigs($configs)
    {
        // If an old/disabled driver key exists in DB (ex: MSEGAT), fallback safely to OURSMS.
        $driverKey = $configs->where('key', 'sms_driver')->first()->value_ar ?? '';
        $driver = config('sms.drivers.' . $driverKey) ?: config('sms.drivers.OURSMS');

        if ($driver) {
            config([
                'sms.driver' => $driver['driver'],
                'sms.url' => $driver['url'],
                'sms.api_key' => $configs->where('key', 'sms_api_key')->first()->value_ar ?? '',
                'sms.username' => $configs->where('key', 'sms_username')->first()->value_ar ?? '',
                'sms.password' => $configs->where('key', 'sms_password')->first()->value_ar ?? '',
                'sms.sender.name' => $configs->where('key', 'sms_sender_name')->first()->value_ar ?? '',
                'sms.sender.phone' => $configs->where('key', 'sms_sender_phone')->first()->value_ar ?? '',
            ]);
        }
    }

    public function setInitConfigs($configs)
    {
        $site_name = $configs->where('key', 'site_name')->first();
        if ($site_name) {
            config([
                'app.app_name' => $site_name->value_ar,
                'app.name' => $site_name->value_ar
            ]);
        }
        $timezone = $configs->where('key', 'timezone')->first();
        if ($timezone != null) {
            config(['timezone' => $timezone->value_ar]);
            date_default_timezone_set($timezone->value_ar);
        }
    }

    public function preparePaymentMethods()
    {
        if (auth('web')->check()) {
            if (auth('web')->user()->is_merchant && auth('web')->user()->has_forward_account) {
                $this->appendForwardAccountPayment();

            }
            if (auth('web')->user()->can_cash) {
                $this->appendCashPayment();
            }
            if (auth('web')->user()->bank_transfer) {
                $this->appendBankTransferPayment();
            }
        }
    }

    public function appendForwardAccountPayment()
    {
        config([
            'payment.methods.forward_account' => [
                'is_online' => false,
            ]
        ]);
    }

    public function appendCashPayment()
    {
        config([
            'payment.methods.cash_on_delivery' => [
                'is_online' => false,
            ]
        ]);
    }

    public function appendBankTransferPayment()
    {
        config([
            'payment.methods.bank_transfer' => [
                'is_online' => false,
            ]
        ]);
    }
}
