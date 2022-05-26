<?php

namespace Modules\OrderModule\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class OrderScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        if (request()->is('admin/*', 'admin')) {
            $order_zones = (auth('admin')->user()->orders_zones != null)
                ? explode(',', auth('admin')->user()->orders_zones) : '';

            $order_type = auth('admin')->user()->order_type;

            $status_levels = (auth('admin')->user()->status_levels != null)
                ? explode(',', auth('admin')->user()->status_levels) : '';

            $builder->join('user_addresses', 'orders.user_address_id', '=', 'user_addresses.id')
                ->where(function ($q) use ($order_zones, $status_levels, $order_type) {
                    $q->where(function ($q) use ($order_zones, $status_levels, $order_type) {
                        if (!empty($order_zones))
                            $q->whereIn('user_addresses.zone_id', $order_zones);
                        if (!empty($status_levels))
                            $q->whereIn('orders.current_status_id', $status_levels);
                        if (!auth('admin')->user()->hasPermissionTo('assign_order'))
                            $q->where('orders.assigned_ids', null);
                        if ($order_type != 2)
                            $q->where('orders.is_merchant', '=', $order_type);
                    });

                    $q->orWhereRaw("find_in_set('" . auth()->user()->id . "', `orders`.`assigned_ids`)");
                })
                ->selectRaw('orders.*');
        }
    }
}

?>
