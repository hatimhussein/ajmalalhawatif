<?php

namespace Modules\AdminModule\Repository;


use Illuminate\Database\Eloquent\Collection;
use Modules\AdminModule\Entities\Admin;

class AdminRepository
{

    function findById($id)
    {
        return Admin::find($id);
    }

    function findAllAdmins()
    {
        return Admin::all();
    }

    function saveAdmin($data)
    {
        return Admin::create($data);
    }

    function updateAdminData($admin, $data)
    {

        return $admin->update($data);
    }


    function deleteAdmin($id)
    {
        $admin = Admin::find($id);
        if ($admin)
            return $admin->delete();
    }


    function findByIds($adminIds)
    {
        $adminIds = is_array($adminIds) ? $adminIds : explode(',', $adminIds);
        return Admin::whereIn('id', $adminIds)->get();
    }


    public function findOrderStatusEmployees($order, $withoutLastModifier = false)
    {
        $q = Admin::query();
        if ($order->assigned_ids) {
            $q->whereIn('id', explode(',', $order->assigned_ids))->get();
        }

        if ($withoutLastModifier)
            $q->where('id', '!=', $order->last_modifier_id);

        $q->whereRaw("find_in_set('{$order->current_status_id}',`status_levels`) > 0")
            ->whereRaw("find_in_set('{$order->userAddresses->zone_id}',`orders_zones`) > 0")
            ->whereIn('order_type', [$order->is_merchant, 2]);

        return $q->get();
    }

    public function findOrderAssignedAdmins($order): Collection
    {
        if ($order->assigned_ids) {
            return Admin::whereIn('id', explode(',', $order->assigned_ids))->where('id', '!=', $order->last_modifier_id)->get();
        }
        return (new Admin())->newCollection();
    }
}
