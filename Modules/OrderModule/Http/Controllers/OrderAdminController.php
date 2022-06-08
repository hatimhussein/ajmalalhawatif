<?php

namespace Modules\OrderModule\Http\Controllers;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Modules\AdminModule\Repository\AdminRepository;
use Modules\AreaModule\Entities\Country;
use Modules\AreaModule\Entities\Government;
use Modules\ConfigModule\Entities\Voucher;
use Modules\ConfigModule\Repository\ConfigRepository;
use Modules\ConfigModule\Repository\VoucherRepository;
use Modules\OrderModule\Entities\Order;
use Modules\OrderModule\Entities\OrderProduct;
use Modules\OrderModule\Events\OrderStatusChangedEvent;
use Modules\OrderModule\Repository\OrderAdminRepository;
use Modules\UserModule\Entities\User;
use Modules\UserModule\Repository\UserRepository;
use Modules\ProductModule\Repository\CategoryRepository;
use Modules\ProductModule\Repository\ProductRepository;
use Modules\CommonModule\Helper\ProductHelper;
use Modules\CommonModule\Helper\LanguageHelper;
use Modules\AreaModule\Repository\CountryRepository;
use Modules\ProductFeatureModule\Repository\DeliverytimeRepository;
use Modules\OrderModule\Repository\OrderRepository;
use Modules\CommonModule\Helper\ApiResponseHelper;

use Mail;
use Auth;
use Hash;
use Modules\OrderModule\Entities\Status;


class OrderAdminController extends Controller
{
    use ApiResponseHelper;
    use ProductHelper;

    private OrderAdminRepository $orderAdminRepository;
    private ConfigRepository $configRepository;

    public function __construct(
        OrderAdminRepository   $orderAdminRepository,
        UserRepository         $userRepository,
        CategoryRepository     $categoryRepository,
        ProductRepository      $productRepository,
        CountryRepository      $countryRepository,
        DeliverytimeRepository $deliverytimeRepository,
        OrderRepository        $orderRepository,
        VoucherRepository      $voucherRepository,
        AdminRepository        $adminRepository,
        ConfigRepository       $configRepository
    )
    {
        $this->middleware('permission:orders')->only(['index']);
        $this->middleware('permission:order_details')->only(['show']);
        $this->middleware('permission:order_status_change')->only(['updateStatus']);
        $this->middleware('permission:delete_order')->only(['bulk', 'destroy']);
        $this->middleware('permission:add_order')->only(['CreateUserOrder', 'doCheckout', 'previewOrder']);
        $this->middleware('permission:assign_order')->only('assignOrderToUsers');
        $this->middleware('permission:update_order')->only(['edit', 'deleteProduct', 'updateQuantity', 'updateOrder']);
        $this->orderAdminRepository = $orderAdminRepository;
        $this->categoryRepository = $categoryRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->countryRepository = $countryRepository;
        $this->deliverytimeRepository = $deliverytimeRepository;
        $this->orderRepository = $orderRepository;
        $this->voucherRepository = $voucherRepository;
        $this->adminRepository = $adminRepository;
        $this->configRepository = $configRepository;
    }

    public function deletedOrders()
    {
        $orders = $this->orderAdminRepository->getDeletedOrders();
        return view('ordermodule::admin.deleted_orders', compact('orders'));
    }

    public function restoreOrders($id)
    {
        $order = Order::withTrashed()->findOrFail($id);
        $order->restore();

        return redirect()->back()->with('_updated', 'updated');
    }

    public function index($status)
    {
        $flag = 0;
        $page = 0;
        if ($status == "report") {
            $orders = $this->orderAdminRepository->getOrdersReports();
            $page = 1;
            $title = __('ordermodule::admin.reports');

            $status_id = 1;
        } else if ($status == "report_done") {
            $status_id = 6;
            $orders = $this->orderAdminRepository->done();
            $page = 1;
            $title = __('ordermodule::admin.reports');
        } else if ($status == "report_cancel") {
            $status_id = 7;
            $orders = $this->orderAdminRepository->cancel();
            $page = 1;
            $title = __('ordermodule::admin.reports');
        } else if ($status == "current") {
            $orders = $this->orderAdminRepository->current();
            $flag = 1;
        } else if ($status == "done") {
            $orders = $this->orderAdminRepository->done();
        } else {
            $orders = $this->orderAdminRepository->cancel();
        }
        if ($page == 1) {
            $all_status = Status::all();
            return view('ordermodule::admin.reports', compact('orders', 'title', 'flag', 'status', 'status_id', 'all_status'));
        } else {
            $title = __('ordermodule::admin.' . $status);

            $this->orderAdminRepository->markSeen($orders);

            return view('ordermodule::admin.index', compact('orders', 'title', 'flag'));
        }
    }

    public function merchantsOrders($status)
    {
        $flag = 0;
        $page = 0;
        if ($status == "report") {
            $orders = $this->orderAdminRepository->getMerchantOrdersReports();
            $page = 1;
            $title = __('ordermodule::admin.merchant_report');
            $status_id = 1;
        } else if ($status == "report_done") {
            $status_id = 6;
            $orders = $this->orderAdminRepository->merchantsDone();
            $page = 1;
            $title = __('ordermodule::admin.merchant_report');
        } else if ($status == "report_cancel") {
            $status_id = 7;
            $orders = $this->orderAdminRepository->merchantsCancel();
            $page = 1;
            $title = __('ordermodule::admin.merchant_report');
        } else if ($status == "current") {
            $orders = $this->orderAdminRepository->merchantsCurrent();
            $flag = 1;
        } else if ($status == "done") {
            $orders = $this->orderAdminRepository->merchantsDone();
        } else {
            $orders = $this->orderAdminRepository->merchantsCancel();


        }
        if ($page == 1) {
            $all_status = Status::all();
            return view('ordermodule::admin.merchants.reports', compact('orders', 'title', 'flag', 'status', 'status_id', 'all_status'));
        } else {
            $title = __('ordermodule::admin.' . $status);

            $this->orderAdminRepository->markSeen($orders);

            return view('ordermodule::admin.merchants.index', compact('orders', 'title', 'flag', 'status'));
        }
    }

    public function getOrders($id)
    {
        $flag = 1;
        $orders = $this->orderAdminRepository->getOrdersByStatus($id);
        $title = __('ordermodule::admin.current');

        return view('ordermodule::admin.index', compact('orders', 'title', 'flag'));
    }

    public function getMerchantOrders($id)
    {
        $flag = 1;
        $orders = $this->orderAdminRepository->getMerchantOrdersByStatus($id);
        $title = __('ordermodule::admin.current');

        $status = 'current';
        return view('ordermodule::admin.merchants.index', compact('orders', 'title', 'flag', 'status'));
    }

    public function getMerchantreportOrders($id)
    {
        $flag = 1;
        $orders = $this->orderAdminRepository->getMerchantOrdersByStatus($id);
        $title = __('ordermodule::admin.merchant_report');

        $status = 'report';
        $status_id = $id;
        $all_status = Status::all();
        return view('ordermodule::admin.merchants.reports', compact('orders', 'title', 'flag', 'status', 'status_id', 'all_status'));
    }

    public function getMerchantreportSearch($id, Request $request)
    {
        $date_from = $request->get("date_from");
        $date_to = $request->get("date_to");
        $flag = 1;
        $orders = $this->orderAdminRepository->getMerchantOrdersByStatusAndDate($id, $date_from, $date_to);
        $title = __('ordermodule::admin.merchant_report');

        $status = 'report';
        $status_id = $id;
        $all_status = Status::all();
        return view('ordermodule::admin.merchants.reports', compact('orders', 'title', 'flag', 'status', 'status_id', 'all_status'));
    }

    public function getreportOrders($id)
    {
        $flag = 1;
        $orders = $this->orderAdminRepository->getOrdersByStatus($id);
        $title = __('ordermodule::admin.reports');

        $status = 'report';
        $status_id = $id;
        $all_status = Status::all();
        return view('ordermodule::admin.reports', compact('orders', 'title', 'flag', 'status', 'status_id', 'all_status'));
    }

    public function getreportSearch($id, Request $request)
    {
        $date_from = $request->get("date_from");
        $date_to = $request->get("date_to");
        $flag = 1;
        $orders = $this->orderAdminRepository->getOrdersByStatusAndDate($id, $date_from, $date_to);
        $title = __('ordermodule::admin.reports');

        $status = 'report';
        $status_id = $id;
        $all_status = Status::all();
        return view('ordermodule::admin.reports', compact('orders', 'title', 'flag', 'status', 'status_id', 'all_status'));
    }

    public function getOrderByPriceLevel($status, $level)
    {
        $flag = 0;
        if ($status == "current") {
            $flag = 1;
        }

        $orders = $this->orderAdminRepository->getMerchantOrdersByPriceLevel($status, $level);

        $title = __('ordermodule::admin.' . $status);

        return view('ordermodule::admin.merchants.index', compact('orders', 'title', 'flag', 'status'));

    }


    public function show($order_id)
    {
        $order = $this->orderAdminRepository->find($order_id);

        if ($order) {
            $admins = $this->adminRepository->findAllAdmins();
            $orderAdminIds = explode(',', $order->assigned_ids);
            $statuses = $this->orderAdminRepository->allowedStatuses();
            return view('ordermodule::admin.show', compact('order', 'statuses', 'admins', 'orderAdminIds'));
        } else {
            return redirect('admin/orders/current');
        }
    }

    public function destroy($order_id)
    {
        $order = $this->orderAdminRepository->find($order_id);

        if ($order->current_status_type_id == 1) {
            $this->orderRepository->revertOrderProductQuantities($order);
        }

        $this->orderAdminRepository->delete($order);
        return redirect()->back()->with('deleted', 'deleted');
    }

    public function bulk(Request $request)
    {
        $request->validate([
            'ids' => 'required',
            'method' => 'required|in:invoice,delete',
        ]);

        $ids = explode(',', $request->get('ids'));
        switch ($request->get('method')) {
//            case 'active':
//                $this->categoryRepository->bulkStatus($ids, 1);
//                break;
            case 'invoice':
                $orders = $this->orderAdminRepository->bulkInvoice($ids);
                $site_info = $this->configRepository->getConfigsByKey(['commercial_register', 'tax_number', 'hotline']);
                return view('ordermodule::admin.multi_invoice', compact('orders', 'site_info'));
                break;
            case 'delete':
                $failed = $this->orderAdminRepository->bulkDelete($ids);
                break;
        }

        if ($failed ?? false)
            return back()->with('warning', __('productmodule::admin.warn_count', ['attribute' => $failed]));
        return back()->with('success', 'success');
    }


    /**
     * @param $id
     * @return Application|Factory|RedirectResponse|View
     */
    public function edit($id)
    {
        $order = Order::where('orders.id', $id)->with(['products', 'currency'])->first();
        if ($order->current_status_type_id != 1) {
            return redirect()->back();
        }
        $user = User::find($order->user_id);
        $user_addresses = $user->addresses;
        $countries = Country::all();

        $this->configRepository->appendCashPayment();
        if ($order->user->is_merchant) {
            $this->configRepository->appendForwardAccountPayment();
        }
        $paymentMethods = config('payment.methods');

        return view('ordermodule::admin.edit', compact('order', 'user_addresses', 'countries', 'paymentMethods'));
    }

    /**
     * @param $orderId
     * @param $id
     * @return int
     */
    public function deleteProduct($orderId, $id)
    {
        $order_product = OrderProduct::where(['order_id' => $orderId, 'product_id' => $id])->first();
        if ($order_product) {
            $this->orderAdminRepository->changeProductQuantity('increase', $order_product->quantity, $order_product);
            $order_product->delete();
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * @param $orderId
     * @param $id
     * @param Request $request
     * @return int
     */
    public function updateQuantity($orderId, $id, Request $request)
    {
        $product = OrderProduct::where(['order_id' => $orderId, 'product_id' => $id])->first();
        if ($product) {
            if ($product->quantity > $request->quantity) {
                $diff = $product->quantity - $request->quantity;
                $this->orderAdminRepository->changeProductQuantity('increase', $diff, $product);
            } else {
                $diff = $request->quantity - $product->quantity;
                $this->orderAdminRepository->changeProductQuantity('decrease', $diff, $product);
            }
            $product->quantity = $request->quantity;
            $product->update();
            return 1;
        } else {
            return 0;
        }


    }

    /**
     * @param $id
     * @param Request $request
     * @return int
     */
    public function updateOrder($id, Request $request)
    {
        $data = $request->except('_token');
        $order = $this->orderRepository->updateOrder($id, $data);
        if ($order) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */

    public function updateStatus(Request $request)
    {
        //check User Password
        $password = auth()->user()->password;
        $confirm_pass = $request->get("password");
        if (Hash::check($confirm_pass, $password)) {
            $order_id = $request->get("modal_order_id");
            $status_id = $request->get("modal_status_id");
            $comment = $request->get("modal_status_comment");
            // find order
            $order = $this->orderAdminRepository->find($order_id);

            if ($order) {
                //insert new order status
                $status = $this->orderAdminRepository->saveStatusWithComment($order, $status_id, $comment);
                $status_type_id = $this->orderAdminRepository->findStatusType($status->status_id);

                if ($status_type_id->status_type_id == 3) {
                    $this->orderAdminRepository->increaseQtyOrderProducts($order);
                }
                //return $status_type_id;
                //update order current status

                $data = [
                    'current_status_id' => $status_id,
                    'current_status_type_id' => $status_type_id->status_type_id,
                ];

                if ($status_type_id->status_type_id == 2) {
                    $data['completed_at'] = now();
                } else {
                    $data['completed_at'] = null;
                }

                $order = $this->orderAdminRepository->updateStatusInOrderTable($order, $data);

                event(new OrderStatusChangedEvent($order));
                return redirect()->back()->with('updated', 'updated');
            } else {
                return redirect('admin/orders/current');
            }
        } else {
            $title = __('ordermodule::admin.error_password');
            return redirect()->back()->with('deleted', $title);
        }
    }

    public function Invoice($order_id)
    {
        $order = $this->orderAdminRepository->find($order_id);
        $orders = [$order];
        $site_info = $this->configRepository->getConfigsByKey(['commercial_register', 'tax_number', 'hotline']);
        return view('ordermodule::admin.multi_invoice', compact('orders', 'site_info'));
    }

    public function assignOrderToUsers($order_id, Request $request)
    {
        $order = $this->orderAdminRepository->find($order_id);
        if ($order) {
            $admins_ids = $request->input('admin_ids');
            $this->orderAdminRepository->assignOrderToUsers($order, $admins_ids);
            return $this->setCode(200)->setSuccess('success')->send();
        } else {
            return $this->setCode(400)->setError(__('ordermodule::order.not_found'))->send();
        }
    }

    public function CreateUserOrder($type)
    {
        if ($type == 'user') {
            $users = $this->userRepository->findAllUsers();
            $title = __('ordermodule::admin.add_user_order');
            $is_merchant = 0;
        } else if ($type == 'merchant') {
            $users = $this->userRepository->findAllMerchants();
            $title = __('ordermodule::admin.add_merchant_order');
            $is_merchant = 1;
            $this->configRepository->appendForwardAccountPayment();
        } else abort(404);

        $this->configRepository->appendCashPayment();

        $categories = $this->categoryRepository->findCategoriesDosnotHaveChildern();
        $countries = $this->countryRepository->findAllCountries();
        $delivery_time = $this->deliverytimeRepository->findAllDelivertytime();

        $tax_shipping = '-';
        $percentag = '';
        $add_to_ship = 0;

        $paymentMethods = config('payment.methods');


        return view('ordermodule::admin.create', compact('users', 'categories', 'countries', 'delivery_time', 'tax_shipping', 'percentag', 'title', 'is_merchant', 'add_to_ship', 'paymentMethods'));
    }

    public function getUserInfo($id)
    {
        $user = $this->userRepository->findUser($id);
        $user->load('addresses.getCountry', 'addresses.getGovernment', 'addresses.getZone', 'addresses.getCity');
        return $this->setCode(200)->setData($user->toArray())->send();
    }

    public function getCategoryProducts($id)
    {
        $products = $this->productRepository->getCategoryProducts($id);
        return $this->setCode(200)->setData($products->toArray())->send();
    }

    public function getProductInfo($id, Request $request)
    {
        $user = $this->userRepository->findUser($request->input('user_id'));
        if (!$user)
            return $this->setCode(201)->setError(__('ordermodule::admin.choose_user'))->send();

        $level = $user->is_merchant ? $user->prices_level : 5;

        $product = $this->productRepository->findProductById($id, ['combinations', 'discounts' => function ($q) use ($level) {
            $q->where('start_date', "<=", date('Y-m-d'))
                ->where('end_date', ">=", date('Y-m-d'))
                ->where(function ($q) use ($level) {
                    $q->whereIn('offer_id', [null, 0])->orWhereHas('offer', function ($q) use ($level) {
                        $q->where(\DB::raw("find_in_set({$level}, `viewed_levels`)"), '!=', 0);
                    });
                });
        }]);

        $products = json_decode($request->input('products'), true);
        if (($product->type == 'simple' || $product->combinations->count() <= 1) && is_array($products)) {
            $products = array_filter($products, function ($item) use ($product) {
                return ($item['id'] == $product->id);
            });
            if (count($products))
                return $this->setCode(201)->setError(__('ordermodule::admin.chosen_before'))->send();
        }

        $col = $this->orderRepository->getPriceLevel($level);
        $product->price = $product->$col;

        $discount = $product->discounts->sortByDesc('id')->where('discount_quantity', '1')->first();

        if ($discount)
            $product->price = $this->calDiscountAmount($product->price, $discount, false);

        $product->currency = session()->get('currency');

        return $this->setCode(200)->setData($product->toArray())->send();
    }


    public function doCheckout(Request $request)
    {
        $this->configRepository->appendForwardAccountPayment();
        $this->configRepository->appendCashPayment();

        $request->validate([
            'user_id' => 'required',
            'delivery_time' => 'required',
            'payment_type' => 'required|in:' . implode(',', array_keys(config('payment.methods'))),
            'products' => 'required',
            'products.*.id' => 'required',
            'products.*.quantity' => 'required|min:1',
        ]);

        try {
            $orderDetails = $this->getOrderDetails($request);
            if (is_array($orderDetails) && isset($orderDetails['orderProducts']) & isset($orderDetails['main_order_data']))
                extract($orderDetails);
            else
                return $orderDetails;
        } catch (ValidationException $e) {
            throw $e;
        } catch (Exception $e) {
            return $this->setCode(201)->setError(__('ordermodule::order.general_error') . ' 1')->send();
        }

        try {
            DB::beginTransaction();
            $order = $this->orderRepository->saveOrder($main_order_data);
            $save_products = $this->orderRepository->saveOrderProducts($order, $orderProducts);

            $status = $this->orderAdminRepository->saveStatusWithComment($order, 1, 'جديد');
            if ($main_order_data['discount']) {
                if ($order && $save_products && $status && $main_order_data['coupon_code']) {
                    if (Voucher::where('code', $main_order_data['coupon_code'])->exists()) {
                        $this->voucherRepository->CodeUse($main_order_data['coupon_code']);
                    }
                }
            }
            DB::commit();
            return $this->setCode(200)->setData(url('admin/order/' . $order->id))->send();
        } catch (Exception $e) {
            DB::rollBack();
            return $this->setCode(201)->setError(__('ordermodule::order.general_error'))->send();
        }
    }

    public function previewOrder(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'delivery_time' => 'required',
            'payment_type' => 'required',
            'products' => 'required',
            'products.*.id' => 'required',
            'products.*.quantity' => 'required|min:1',
        ]);

        try {
            DB::beginTransaction();
            $orderDetails = $this->getOrderDetails($request);
            DB::rollBack();
            if (is_array($orderDetails) && isset($orderDetails['orderProducts']) & isset($orderDetails['main_order_data'])) {
                extract($orderDetails);
                return view('ordermodule::admin.includes.summery', compact('orderProducts', 'main_order_data'));
            }
            return $orderDetails;
        } catch (ValidationException $e) {
            DB::rollBack();
            throw $e;
        } catch (Exception $e) {
            DB::rollBack();
            return $this->setCode(201)->setError(__('ordermodule::order.general_error') . ' 1')->send();
        }
    }


    public function checkCode($code, $total)
    {
        $code = $this->voucherRepository->findCode($total, $code);
        if ($code) {
            $data = $this->voucherRepository->calAmount($total, $code);
            return $data;
        }
        return false;
    }

    public function getOrderDetails($request)
    {
        $request->products = json_decode($request->input('products'), true);

        if (empty($request->products)) {
            return $this->setCode(201)->setError(__('ordermodule::cart.no_products'))->send();
        }

        $user = $this->userRepository->findUser($request->input('user_id'));
        if (!$user) {
            return $this->setCode(201)->setError(__('ordermodule::admin.choose_user'))->send();
        }

        if ($request->shipping_address_id == null) {
            $data = $request->validate([
                'country_id' => 'required',
                'government_id' => 'required',
                'city_id' => 'required',
                'zone_id' => 'required',
            ]);

            $address = $this->userRepository->saveAccountUserAddress($data, $user->id);
            $request->shipping_address_id = $address->id;
        } else {
            $address = $this->userRepository->findAddress($request->shipping_address_id);
        }

        if (!$address) {
            return $this->setCode(201)->setError(__('ordermodule::cart.no_address'))->send();
        }

        $dbProducts = $this->orderRepository->getCartDBProducts($request->products);

        $orderProducts = $this->orderRepository->prepareAdminOrderProducts($dbProducts, $request->products, $user);
        if (in_array(null, $orderProducts))
            return $this->setCode(201)->setError(__('commonmodule::validation.cart_product_error'))->send();

        $failed = $this->orderRepository->checkQuantity($orderProducts, $dbProducts);
        if ($failed !== false) {
            return $this->setCode(201)->setError(__('ordermodule::order.product_quantity_error') . ' ' . $failed['name'] . ' ( ' . $failed['quantity'] . ' )')->send();
        }

//        tax value
        $tax = app('tax_settings');
        $tax_shipping = false;
        $tax_value = 0;
        if ($tax->is_active) {
            if ($tax->tax_shipping) $tax_shipping = true;
            $tax_value = $address->getCountry->id == $tax->country_id ? $tax->country_tax : $tax->other_country_tax;
        }

        $sub_total = $this->orderRepository->calOrderProductsSubTotal($orderProducts);
        $sub_total += ($sub_total * $tax_value) / 100;

        $shipping_price = $this->orderRepository->calShippingPrice($address->id);
        if ($tax_shipping)
            $shipping_price += ($shipping_price * $tax_value) / 100;

        $discount = 0;
        $discount_code = '';
        if ($request->input('coupon_code')) {
            $discount_data = $this->checkCode($request->coupon_code, $sub_total);
            if (!$discount_data)
                return $this->setCode(201)->SetError(__('commonmodule::validation.voucher_code_error'))->send();

            $discount = $discount_data['amount'];
            if ($discount != 0) {
                $discount_code = $request->coupon_code;
            }
        }

        $total = $sub_total + $shipping_price - $discount;

        $currency = session()->get('currency');

        $main_order_data = [
            'user_id' => $user->id,
            'user_address_id' => $address->id,
            'delivery_time_id' => $request->delivery_time,
            'comment' => $request->comment,
            'coupon_code' => $discount_code,
            'payment_type' => $request->payment_type,
            'sub_total' => $sub_total,
            'shipping' => $shipping_price,
            'discount' => $discount,
            'gift_cost' => 0,
            'total' => $total,
            'order_currency' => LanguageHelper::nameTranslate($currency),
            'currency_id' => $currency->id,
            'currency_value' => $currency->value,
            'is_merchant' => $user->is_merchant,
            'prices_level' => $user->prices_level,
            'send_gift' => 0,
            'tax_percentage' => $tax_value,
        ];

        if (isset($request->send_gift)) {
            $giftConfig = $this->orderRepository->getGiftConfig();
            if (($user->is_merchant && $giftConfig->properties['merchant_active']) || (!$user->is_merchant && $giftConfig->properties['user_active'])) {
                $main_order_data['send_gift'] = 1;
                $main_order_data['gift_cost'] = $this->orderRepository->getGiftCost($giftConfig);
                $main_order_data['total'] += $main_order_data['gift_cost'];
            }
        }

        return ['main_order_data' => $main_order_data, 'orderProducts' => $orderProducts];
    }
}
