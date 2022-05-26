<?php

namespace Modules\ProductFeatureModule\Repository;


use Modules\ProductFeatureModule\Entities\Deliverytime;

class DeliverytimeRepository
{


    function findAllDelivertytime()
    {
        return Deliverytime::OrderBy('sort_order', 'desc')->get();
    }

    function findFrontDelivertytime()
    {
        if (auth()->check() && auth()->user()->is_merchant)
            return Deliverytime::where('for_merchant', 1)->OrderBy('sort_order', 'desc')->get();
        else
            return Deliverytime::where('for_user', 1)->OrderBy('sort_order', 'desc')->get();
    }

    public function delete($id)
    {
        $deliverytime = Deliverytime::where('id', $id)->with('orders')->first();
        if ($deliverytime->orders->count() > 0)
            return false;
        return $deliverytime->delete();

    }


}
