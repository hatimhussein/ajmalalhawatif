<?php

namespace Modules\OrderModule\Repository;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Modules\AdminModule\Repository\AdminRepository;
use Modules\ConfigModule\Entities\Voucher;
use Modules\OrderModule\Entities\Order;
use Modules\OrderModule\Entities\Status;
use Modules\OrderModule\Entities\OrderProduct;
use Modules\OrderModule\Notifications\OrderStatusEmployeeNotification;
use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Entities\ProductCombination;
use Modules\UserModule\Entities\User;
use Modules\WarrantyModule\Repository\BaseRepository;

//

class OrderAdminRepository extends BaseRepository
{

    public function model(): string
    {
        return Order::class;
    }

    public function find($order_id)
    {
        return Order::with(['user', "userAddresses", 'status', 'products'])->where('orders.id', $order_id)->first();
    }

    function getDeletedOrders()
    {
        return Order::onlyTrashed()->get();
    }

    public function getOrdersByStatus($status)
    {
        $orders = Order::where(["current_status_id" => $status, "current_status_type_id" => 1, "is_merchant" => 0])
            ->with(['user', 'products', 'currentStatus', 'status'])
            ->get()
            ->sortByDesc('id');


        return $orders;
    }

    public function getMerchantOrdersByPriceLevel($status, $level)
    {
        if ($status == 'current') {
            $status = 1;
        } elseif ($status == 'done') {
            $status = 2;
        } elseif ($status == 'cancel') {
            $status = 3;
        }
        $orders = Order::where(["current_status_type_id" => $status, "prices_level" => $level, "is_merchant" => 1])
            ->with(['user', 'products', 'currentStatus', 'status',])
            ->get()
            ->sortByDesc('id');


        return $orders;
    }

    public function getMerchantOrdersByStatus($status)
    {

        $orders = Order::where(["current_status_id" => $status, "current_status_type_id" => 1, "is_merchant" => 1])
            ->with(['user', 'products', 'currentStatus', 'status',])
            ->get()
            ->sortByDesc('id');

        return $orders;
    }

    public function getMerchantOrdersByStatusAndDate($status, $date_from, $date_to)
    {

        $orders = Order::where(["current_status_id" => $status, "current_status_type_id" => 1, "is_merchant" => 1])
            ->where('orders.created_at', '>=', $date_from)
            ->where('orders.created_at', '<=', $date_to)
            ->with(['user', 'products', 'currentStatus', 'status',])
            ->get()
            ->sortByDesc('id');

        return $orders;
    }

    public function getMerchantOrdersReports()
    {

        $orders = Order::where(["is_merchant" => 1])
            ->with(['user', 'products', 'currentStatus', 'status',])
            ->get()
            ->sortByDesc('id');

        return $orders;
    }

    public function getOrdersReports()
    {

        $orders = Order::where(["is_merchant" => 0])
            ->with(['user', 'products', 'currentStatus', 'status',])
            ->get()
            ->sortByDesc('id');

        return $orders;
    }

    public function getOrdersByStatusAndDate($status, $date_from, $date_to)
    {
        $orders = Order::where(["current_status_id" => $status, "current_status_type_id" => 1, "is_merchant" => 0])
            ->where('orders.created_at', '>=', $date_from)
            ->where('orders.created_at', '<=', $date_to)
            ->with(['user', 'products', 'currentStatus', 'status',])
            ->get()
            ->sortByDesc('id');

        return $orders;
    }

    public function statuses()
    {
        return Status::all();
    }

    public function allowedStatuses()
    {
        $user_statuses = auth()->user()->status_levels;
        return Status::whereRaw("find_in_set(`id`,'{$user_statuses}') > 0")->get();
    }

    public function saveStatusWithComment($order, $orderStatus, $comment)
    {
        $status_type_id = $this->findStatusType($orderStatus);


        return $order->orderStatus()->create(['status_id' => $orderStatus, 'status_type_id' => $status_type_id->status_type_id, 'status_comment' => $comment]);
    }

    function findStatusType($status_id)
    {
        return Status::where('id', $status_id)->first(['status_type_id']);
    }


    function updateStatusInOrderTable($order, $data)
    {
        if (auth('admin')->check())
            $data['last_modifier_id'] = $data['last_modifier_id'] ?? auth('admin')->user()->id;
        $order->update($data);
        return $order;
    }


    public function done()
    {

        $orders = Order::where("current_status_id", 6)->where('is_merchant', 0)->with(['user', 'products', 'currentStatus', 'status'])->get()->sortByDesc('id');

        return $orders;
    }

    public function merchantsDone()
    {
        $orders = Order::where("current_status_id", 6)->where('is_merchant', 1)->with(['user', 'products', 'currentStatus', 'status'])->get()->sortByDesc('id');


        return $orders;
    }

    public function current()
    {
        $orders = Order::select('orders.*')
            ->where('is_merchant', 0)->whereIn("current_status_id", [1, 2, 3, 4, 5])
            ->with(['user', 'products', 'currentStatus', 'status'])
            ->get()
            ->sortByDesc('id');


        return $orders;
    }

    public function merchantsCurrent()
    {
        $orders = Order::where('is_merchant', 1)->whereIn("current_status_id", [1, 2, 3, 4, 5])
            ->with(['user', 'products', 'currentStatus', 'status',])
            ->get()
            ->sortByDesc('id');
        return $orders;
    }

    public function cancel()
    {
        $orders = Order::where("current_status_id", 7)->where('is_merchant', 0)
            ->with(['user', 'products', 'currentStatus', 'status'])
            ->get()
            ->sortByDesc('id');

        return $orders;
    }

    public function merchantsCancel()
    {
        return Order::where("current_status_id", 7)->where('is_merchant', 1)
            ->with(['user', 'products', 'currentStatus', 'status'])
            ->get()
            ->sortByDesc('id');
    }


    public function calTotalIncome()
    {
        return Order::where('current_status_type_id', 2)->with('currency')->groupBy('currency_id')
            ->select('currency_id')
            ->selectRaw('sum(total) as sum')
            ->get();
    }


    public function calTotalSales()
    {
        return Order::where('current_status_type_id', 2)->with('orderProducts')->get();
    }

    public function allOrdersCount()
    {
        $orders = Order::get();
        return $orders->count();
    }

    public function clientOrdersCount()
    {
        return Order::where('is_merchant', 0)->count();
    }

    public function merchantOrdersCount()
    {
        return Order::where('is_merchant', 1)->count();
    }


    public function allNewOrdersCount()
    {
        $orders = Order::where('current_status_id', 1)->get();
        return $orders->count();
    }


    public function allPreparingOrdersCount()
    {

        $orders = Order::where('current_status_id', 2)->get();
        return $orders->count();
    }

    public function allPreparedOrdersCount()
    {
        $orders = Order::where('current_status_id', 3)->get();
        return $orders->count();
    }


    public function allShippingOrdersCount()
    {
        $orders = Order::where('current_status_id', 4)->get();
        return $orders->count();
    }

    public function allShippedOrdersCount()
    {
        $orders = Order::where('current_status_id', 5)->get();
        return $orders->count();
    }

    public function allDoneOrdersCount()
    {
        $orders = Order::where('current_status_id', 6)->get();
        return $orders->count();
    }

    public function allCancelledOrdersCount()
    {
        $orders = Order::where('current_status_id', 7)->get();
        return $orders->count();
    }

    public function assignOrderToUsers($order, $admins_ids)
    {
        if ($admins_ids && is_array($admins_ids)) {
            return $order->update(['assigned_ids' => implode(',', $admins_ids)]);
        } else {
            $ids = is_null($admins_ids) ? null : str_replace(' ', '', $admins_ids);
            return $order->update(['assigned_ids' => $ids]);
        }
    }

    public function increaseQtyOrderProducts($order)
    {
        foreach ($order->products as $key => $product) {

            if ($product->type == 'simple') {
                $product->increment('product_quantity', $product->pivot->quantity);
            } else {
                ProductCombination::where('combination_names', $product->pivot->item_combination_name)->increment('combination_quantity', $product->pivot->quantity);
            }
        }
    }

    public function sendNotificationToOrderEmployees($order)
    {
//        $employees = (new AdminRepository())->findOrderStatusEmployees($order, true);
        $employees = (new AdminRepository())->findOrderAssignedAdmins($order);
        if ($employees->count()) {
            $order->load('currentStatus');
            try {
                Notification::send($employees, new OrderStatusEmployeeNotification($order));
            } catch (Exception $e) {
                // do nothing
            }
        }
    }


    function delete($order)
    {
        $order->orderProducts()->delete();
        $order->orderStatus()->delete();
        $order->delete();
    }

    public function bulkDelete($ids): int
    {
        Order::whereIn('orders.id', $ids)->delete();
        return 0;
    }

    public function bulkInvoice($ids)
    {
        return Order::whereIn('orders.id', $ids)->get();
    }


    public function changeProductQuantity($type, $quantity, $order_product)
    {
        if ($type == 'increase') {
            if ($order_product->item_combination_name == null || $order_product->item_combination_name == '') {
                Product::where('id', $order_product->product_id)->first()->increment('product_quantity', $quantity);
            } else {
                ProductCombination::where('product_id', $order_product->product_id)->where('combination_names', $order_product->item_combination_name)->increment('combination_quantity', $quantity);
            }
        } else {
            if ($order_product->item_combination_name == null || $order_product->item_combination_name == '') {
                Product::where('id', $order_product->product_id)->first()->decrement('product_quantity', $quantity);
            } else {
                ProductCombination::where('product_id', $order_product->product_id)->where('combination_names', $order_product->item_combination_name)->decrement('combination_quantity', $quantity);
            }
        }
    }

}
