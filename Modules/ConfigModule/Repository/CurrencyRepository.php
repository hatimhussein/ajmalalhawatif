<?php

namespace Modules\ConfigModule\Repository;

use Modules\ConfigModule\Entities\Currency;

class CurrencyRepository
{


    function FindAll()
    {
        return Currency::all();
    }

    function findById($id)
    {
        return Currency::find($id);
    }

    function update($data, $id)
    {
        return Currency::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        $currency = Currency::where('id', $id)->with('orders')->first();
        if ($currency->orders->count() > 0)
            return false;

        return Currency::destroy($id);
    }

    public function saveCurrency($data)
    {
        Currency::create($data);
    }

    function setDefaultCurrency($id)
    {
        Currency::where('is_deafult', '!=', 0)->update(['is_deafult' => 0]);
        return Currency::where('id', $id)->update(['is_deafult' => 1, 'value' => 1]);
    }

    public function getDefaultCurrency()
    {
        return Currency::where('is_deafult', 1)->first();
    }

}
