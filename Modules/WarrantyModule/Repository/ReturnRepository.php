<?php


namespace Modules\WarrantyModule\Repository;


use Illuminate\Database\Eloquent\Builder;
use Modules\WarrantyModule\Entities\Returned;
use Modules\WarrantyModule\Entities\ReturnReason;

class ReturnRepository extends BaseRepository
{
    public function model(): string
    {
        return Returned::class;
    }


    public function getUserReturns($user_id, $columns = ['*'])
    {
        return $this->get(['user_id' => $user_id], $columns);
    }

    public function getUserReturnableProducts($user_id)
    {
        $orderProductIds = $this->getUserReturns($user_id, ['order_product_id'])
            ->pluck('order_product_id')->toArray();

    }

    public function reasonQuery(): Builder
    {
        return ReturnReason::query();
    }

    public function getAllReturnReasons()
    {
        return ReturnReason::all();
    }

    public function getReturnReasons($is_merchant)
    {
        return $this->reasonQuery()->whereRaw("find_in_set({$is_merchant}, `view_for`)")->get();
    }

}
