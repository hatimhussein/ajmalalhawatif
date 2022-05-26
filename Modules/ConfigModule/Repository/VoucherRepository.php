<?php

namespace Modules\ConfigModule\Repository;

use Illuminate\Support\Facades\DB;
use Modules\ConfigModule\Entities\Voucher;
use Modules\CommonModule\Helper\ProductHelper;

class VoucherRepository
{

    private $error;

    function findById($id)
    {
        return Voucher::find($id);
    }

    function findCode($total, $code)
    {

        $currency = session()->get('currency');
        $val = $currency->value;
        $total = $total / $val;
        $now = date('Y-m-d');
        $query = Voucher::query()
            ->where(function ($query) use ($code, $total, $now) {

                $query->where('code', $code)->first() ?? $this->error = ['code' => 400, 'message' => __('commonmodule::validation.code_not_valid')];
                if ($this->error == '') $query->where('status', 'enabled')->first() ?? $this->error = ['code' => 400, 'message' => __('commonmodule::validation.code_not_enable')];
                if ($this->error == '') $query->where('min_total', '<=', $total)->first() ?? $this->error = ['code' => 400, 'message' => __('commonmodule::validation.code_not_min_total')];
                if ($this->error == '') $query->whereRaw('vouchers.num_of_use < vouchers.max_num_of_use')->first() ?? $this->error = ['code' => 400, 'message' => __('commonmodule::validation.code_max_number')];
                if ($this->error == '') $query->where('from', '<=', $now)->first() ?? $this->error = ['code' => 400, 'message' => __('commonmodule::validation.time_from_code')];
                if ($this->error == '') $query->where('to', '>=', $now)->first() ?? $this->error = ['code' => 400, 'message' => __('commonmodule::validation.time_code_expire')];

            })->first();

        if ($this->error == '')
            return (['code' => 200, 'item' => $query]);

        return ($this->error);

    }

    function update($data, $id)
    {
        return Voucher::where('id', $id)->update($data);
    }


    public function calAmount($total, $code)
    {

        if ($code['amount'] == null) {
            $discount = $total * $code['percentage'] / 100;
//            $discount = ProductHelper::calPriceCurrency($discount);
        } else {
            $discount = $code['amount'];
            $discount = ProductHelper::calPriceCurrency($discount);
        }

        $data = [
            'code' => $code['code'],
            'amount' => $discount,
            'is_free_ship' => $code['is_shipping']
        ];


        return $data;
    }


    public function CodeUse($code)
    {
        Voucher::where('code', $code)->increment('num_of_use', 1);
    }

    public function saveVoucher($data)
    {
        Voucher::create($data);
    }

    public function FindAllVouchers()
    {
        return Voucher::all();
    }

    public function delete($id)
    {
        return Voucher::destroy($id);
    }

    public function bulkStatus($ids, $status)
    {
        return Voucher::whereIn('id', $ids)->update(['status' => $status]);
    }

}
