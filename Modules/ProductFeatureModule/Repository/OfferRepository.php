<?php

namespace Modules\ProductFeatureModule\Repository;

use Modules\ProductModule\Entities\ProductDiscount;


use Modules\ProductFeatureModule\Entities\Offers;

class OfferRepository
{
    public function allOffers()
    {
        $now = date('Y-m-d');
        return Offers::where('start_date', '<=', $now)->where('end_date', '>=', $now)->get();

    }

    public function offerProducts($id)
    {
        $now = date('Y-m-d');

        $offer = Offers::where('id', $id)->where('start_date', '<=', $now)->where('end_date', '>=', $now)->with(['products', 'products.images', 'products.discounts'])->first();
        if (!$offer)
            return redirect('/');

        return $offer;

    }

    function findAll()
    {
        return Offers::all();

    }

    public function saveOffer($data)
    {
        $data['viewed_levels'] = (isset($data['viewed_levels'])) ? implode(',', $data['viewed_levels']) : '';
        return Offers::create($data);
    }


    function findOfferById($id)
    {
        return Offers::where('id', $id)->with('products')->first();

    }

    function updateOffer($data, $id)
    {
        if (isset($data['viewed_levels'])) {
            $data['viewed_levels'] = implode(',', $data['viewed_levels']);
        }
        return Offers::where('id', $id)->update($data);

    }

    function deleteOffer($id)
    {
        Offers::destroy($id);
        ProductDiscount::where('offer_id', $id)->delete();
        return true;
    }


}
