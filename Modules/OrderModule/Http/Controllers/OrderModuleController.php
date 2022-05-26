<?php

namespace Modules\OrderModule\Http\Controllers;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Modules\AreaModule\Repository\CountryRepository;
use Modules\ConfigModule\Repository\ConfigRepository;
use Modules\OrderModule\Notifications\OrderCreatedNotification;
use Modules\OrderModule\Repository\PaymentRepository;
use Modules\OrderModule\Traits\OrderService;
use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Entities\ProductCombination;
use Modules\UserModule\Repository\UserRepository;
use Modules\OrderModule\Repository\OrderRepository;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\AreaModule\Repository\GovernmentRepository;
use Modules\ConfigModule\Repository\VoucherRepository;
use Modules\ProductModule\Repository\ProductRepository;

use Modules\OrderModule\Repository\OrderAdminRepository;
use Modules\OrderModule\Entities\Status;
use Modules\ProductFeatureModule\Repository\DeliverytimeRepository;

class OrderModuleController extends Controller
{
    use ApiResponseHelper, OrderService;

    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;
    /**
     * @var OrderRepository
     */
    private OrderRepository $orderRepository;
    /**
     * @var GovernmentRepository
     */
    private GovernmentRepository $governmentRepository;
    /**
     * @var VoucherRepository
     */
    private VoucherRepository $voucherRepository;
    /**
     * @var ProductRepository
     */
    private ProductRepository $productRepository;
    /**
     * @var OrderAdminRepository
     */
    private OrderAdminRepository $orderAdminRepository;
    /**
     * @var CountryRepository
     */
    private CountryRepository $countryRepository;
    /**
     * @var DeliverytimeRepository
     */
    private DeliverytimeRepository $deliverytimeRepository;
    /**
     * @var PaymentRepository
     */
    private PaymentRepository $paymentRepository;

    private ConfigRepository $configRepository;


    public function __construct(UserRepository $userRepository,
                                OrderRepository $orderRepository,
                                GovernmentRepository $governmentRepository,
                                CountryRepository $countryRepository,
                                VoucherRepository $voucherRepository,
                                ProductRepository $productRepository,
                                OrderAdminRepository $orderAdminRepository,
                                DeliverytimeRepository $deliverytimeRepository,
                                PaymentRepository $paymentRepository,
                                ConfigRepository       $configRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->orderRepository = $orderRepository;
        $this->governmentRepository = $governmentRepository;
        $this->voucherRepository = $voucherRepository;
        $this->productRepository = $productRepository;
        $this->orderAdminRepository = $orderAdminRepository;
        $this->countryRepository = $countryRepository;
        $this->deliverytimeRepository = $deliverytimeRepository;
        $this->paymentRepository = $paymentRepository;
        $this->configRepository = $configRepository;

    }

    public function checkout()
    {
        try {
            $user_addresses = $this->userRepository->userAdresses();
            $countries = $this->countryRepository->findAllCountries();
            $delivery_time = $this->deliverytimeRepository->findFrontDelivertytime();
            $sub_total = round($this->orderRepository->calSubTotal(true), 2);

            $tax = app('tax_settings');

            $tax_shipping = false;
            $country_tax = $tax->country_tax;
            $abroad_tax = $tax->other_country_tax;
            if ($tax->is_active) {
                if ($tax->tax_shipping) $tax_shipping = true;
                $tax_value = auth()->user()->country_id == $tax->country_id ? $tax->country_tax : $tax->other_country_tax;
            } else {
                $tax_value = 0;
            }

            $tax_sub_total = $sub_total;

            if ($sub_total == 0) {
                return redirect()->back();
            }

            $paymentMethods = config('payment.methods');

            $cart_data = $this->orderRepository->getCartData();

            foreach ($cart_data as $key => $item){
//                dd($item['product_id'], $item['quantity'], $item['user_id']);
                $product = Product::find($item['product_id']);
                if ($item['quantity'] < $product->{'product_min_qty'.auth()->user()->prices_level} || $item['quantity'] > $product->{'product_max_qty'.auth()->user()->prices_level}){
                    return redirect()->back()->with('failed', 'يجب عليك شراء كمية مناسبة من منتج (' . $item['item_name'] . ')، تكون بين ' . $product->{'product_min_qty'.auth()->user()->prices_level} . ' - ' . $product->{'product_max_qty'.auth()->user()->prices_level} . ' قطعة');
                }
            }

            return view('ordermodule::front.checkout', compact('user_addresses', 'countries', 'sub_total', 'tax_sub_total', 'delivery_time', 'tax_shipping', 'tax_value', 'country_tax', 'abroad_tax', 'paymentMethods'));
        } catch (Exception $e) {
//            return $this->setCode(201)->setError($e->getTrace())->send();
            return $this->setCode(201)->setError(__('ordermodule::order.general_error'))->send();

        }

    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function doCheckout(Request $request): JsonResponse
    {

//        if (!count(app('cart_data'))) {
//            return $this->setCode(201)->setError(__('ordermodule::cart.no_products'))->send();
//        }
        $delivery_times = $this->deliverytimeRepository->findFrontDelivertytime()->pluck('id')->toArray();

        $data = $request->validate([
            'shipping_address_id' => 'required_without_all:country_id,government_id,city_id,zone_id|nullable|exists:user_addresses,id',
            'country_id' => 'required_without:shipping_address_id|nullable|exists:countries,id',
            'government_id' => 'required_without:shipping_address_id|nullable|exists:governments,id',
            'city_id' => 'required_without:shipping_address_id|nullable|exists:cities,id',
            'zone_id' => 'required_without:shipping_address_id|nullable|exists:zones,id',
            'address' => 'nullable|string',
            'delivery_time' => count($delivery_times) ? 'required|in:' . implode(',', $delivery_times) : 'nullable',
            'payment_type' => 'required|in:' . implode(',', array_keys(config('payment.methods'))),
            'comment' => 'nullable|string',
            'coupon_code' => 'nullable|exists:vouchers,code',
            'send_gift' => 'nullable'
        ]);

        $checkoutOrder = $this->getCheckoutOrderData($data);

//        if (!$checkoutOrder->is_valid) {
//            if ($checkoutOrder->errorCode == 203)
//                return $this->setCode($checkoutOrder->errorCode)->setData($checkoutOrder->errorMessage)->send();
//            else
//                return $this->setCode($checkoutOrder->errorCode)->setError($checkoutOrder->errorMessage)->send();
//        }

        $checkoutOrder->currency = session('currency');

//        if ($this->paymentRepository->isPaymentOnline($checkoutOrder->payment_type)) {
//            $paymentProvider = $this->paymentRepository->makeProvider($checkoutOrder->payment_type);
//            $unpaidOrder = $this->paymentRepository->saveUnPaidOrder($checkoutOrder);
//            try {
//                $url = $paymentProvider->getOrderPaymentUrl($unpaidOrder, $checkoutOrder);
//                $this->orderRepository->clearUserCart();
//                return $this->setCode(100)->setSuccess($url)->send();
//            } catch (Exception $exception) {
//                $unpaidOrder->delete();
//                return $this->setCode(201)->setError(__('ordermodule::payment.init_fail'))->send();
////                return $this->setCode(201)->setError([$exception->getMessage(), $exception->getTrace()])->send();
//            }
//        }

        $main_order_data = $this->orderRepository->getMainOrderData($checkoutOrder);

        try {
            DB::beginTransaction();
            $order = $this->saveOrderData($checkoutOrder, $main_order_data);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return $this->setCode(201)->setError([$e->getMessage(), $e->getTrace()])->send();
//            return $this->setCode(201)->setError(__('ordermodule::order.general_error'))->send();
        }

        $this->orderRepository->clearUserCart();

        try {
            $checkoutOrder->user->notify(new OrderCreatedNotification($order));
        } catch (Exception $e) {
            $data['order_id'] = $order->id;
            $data['message'] = __('ordermodule::order.order_mail_error');
            return $this->setCode(202)->setData($data)->send();
        }

        return $this->setCode(200)->setData($order->id)->send();
    }

    /**
     * @param Request $request
     * @param $provider
     * @param $transaction_id
     * @return Renderable|RedirectResponse|Redirector
     */
    public function paymentCallback(Request $request, $provider, $transaction_id)
    {
        $transaction = $this->paymentRepository->find($transaction_id);
        if (!$transaction || $transaction->status == 'paid' || !config('payment.methods.' . $provider . '.is_online'))
            return redirect('/');

        $paymentProvider = $this->paymentRepository->makeProvider($provider);

        $invoiceId = $transaction->invoice_id;
        $transaction = $paymentProvider->getPaymentResponse($request, $transaction);

        if ($transaction->status == 'paid' && $transaction->invoice_id == $invoiceId) {
            $checkoutOrder = $this->paymentRepository->getTransactionOrder($transaction);

            $main_order_data = $this->orderRepository->getMainOrderData($checkoutOrder);
            try {
                DB::beginTransaction();
                $transaction->save();
                $main_order_data['transaction_id'] = $transaction->id;
                $order = $this->saveOrderData($checkoutOrder, $main_order_data);
                DB::commit();
                return redirect('order/' . $order->id);
            } catch (Exception $e) {
                DB::rollBack();
            }
        } elseif ($transaction->status == 'pending' && $transaction->invoice_id == $invoiceId) {
            $transaction->save();
            return view('ordermodule::pending_payment', compact('transaction_id'));
        }

        return view('ordermodule::failed_payment', compact('transaction_id'));
    }

    public function Invoice($order_id)
    {
        $order = $this->orderRepository->find($order_id);
        $orders = [$order];
        $site_info = $this->configRepository->getConfigsByKey(['commercial_register', 'tax_number', 'hotline']);

        return view('ordermodule::admin.multi_invoice', compact('orders', 'site_info'));
    }

    public function paymentWebHook(Request $request): JsonResponse
    {
        if ($request->Event != 'TransactionsStatusChanged') {
            return response()->json('unhandled event', 400);
        }

        $paymentProvider = $this->paymentRepository->makeProvider('my_fatoorah');;

        $secret = $request->header('MyFatoorah-Signature');
        $data = $request->Data;

        $is_valid = $paymentProvider->validateSignature($data, $request->Event, $secret);

        if (!$is_valid) {
            return response()->json(['status' => 'signature failed'], 400);
        }

        $status = strtolower($data['TransactionStatus']);

        $transaction = $this->paymentRepository->findInvoice($data['InvoiceId'] ?? null);
        if (!$transaction) abort(404);

        if ($status == 'success') {
            $checkoutOrder = $this->paymentRepository->getTransactionOrder($transaction);

            $main_order_data = $this->orderRepository->getMainOrderData($checkoutOrder);

            if ($this->orderRepository->findWhere(['transaction_id' => $transaction->id])) {
                return response()->json(['status' => 'updated before']);
            }

            try {
                DB::beginTransaction();
                $transaction->status = 'paid';
                $transaction->save();
                $main_order_data['transaction_id'] = $transaction->id;
                $order = $this->saveOrderData($checkoutOrder, $main_order_data);
                DB::commit();

                notify($order->user, new OrderCreatedNotification($order));
                return response()->json(['status' => 'updated']);
            } catch (Exception $e) {
                DB::rollBack();
                return response()->json(['status' => 'failed']);
            }
        } else {
            $transaction->status = 'failed';
            $transaction->save();
            return response()->json(['status' => 'updated']);
        }
    }

    public function myOrders()
    {
        $orders = $this->orderRepository->userOrders(auth()->id());

        return view('ordermodule::front.myorders', compact('orders'));
    }

    public function orderDetails($id)
    {

        $order = $this->orderRepository->userOrder(auth()->id(), $id);

        if (!$order)
            return redirect('/');
        return view('ordermodule::front.order_details', compact('order'));
    }

    public function checkCode($code, $total)
    {

        $code = $this->voucherRepository->findCode($total, $code);

        if ($code['code'] == 200) {
            $data = $this->voucherRepository->calAmount($total, $code['item']);
            return ['code' => 200, 'data' => $data];
        }
        return $code;
    }


    public function shippingCost(Request $request)
    {
        if ($request->type == 'address')
            $cost = $this->orderRepository->calShippingPrice($request->shipping_address_id);
        else
            $cost = $this->orderRepository->calShippingPriceFromCity($request->shipping_address_id);

        return $this->setCode(200)->setData($cost)->send();
    }


    public function getShippingWithTax(Request $request)
    {
        if ($request->type == 'address') {
            $address = $this->userRepository->findUserAddress($request->id);
            $country_id = $address->getCountry->id;
            $cost = $this->orderRepository->calShippingPriceFromCity($address->city_id);
        } else {
            $country_id = $request->id;
            $cost = $this->orderRepository->calShippingPriceFromCity($request->city_id);
        }

        $tax = app('tax_settings');

        $tax_value = 0;
        $shipping = $cost;
        if ($tax->is_active) {
            $tax_value = ($tax->country_id == $country_id) ? $tax->country_tax : $tax->other_country_tax;
            if ($tax->tax_shipping)
                $cost += ($cost * $tax_value) / 100;
        }

        return $this->setCode(200)->setData(['tax_value' => $tax_value, 'shipping' => $shipping, 'shipping_cost' => $cost])->send();
    }


    public function cancelOrder(Request $request): JsonResponse
    {
        $order_id = $request->order_id;
        $status_id = Status::where('status_type_id', 3)->first()->id;


        $comment = __('ordermodule::order.user_cancled');
        // find order
        $order = $this->orderRepository->checkOrderStatus(auth()->id(), $order_id);
        if (!$order)
            return $this->setCode(201)->setSuccess(__('ordermodule::order.cant_cancel'))->send();

        $this->orderRepository->revertOrderProductQuantities($order);

        // insert new order status
        $this->orderAdminRepository->saveStatusWithComment($order, $status_id, $comment);

        $this->orderAdminRepository->increaseQtyOrderProducts($order);

        // update order current status
        $this->orderAdminRepository->updateStatusInOrderTable($order,
            [
                'current_status_id' => $status_id,
                // 'current_status_type_id' => $status_type_id->status_type_id ,
                'current_status_type_id' => 3,
            ]

        );

        return $this->setCode(200)->setSuccess(__('ordermodule::order.admin_cancel'))->send();
    }


    public function cancelOrder1(Request $request)
    {
        $id = $request->order_id;

        $status = $this->orderRepository->cancelOrder(auth()->id(), $id);
        if ($status)
            return $this->setCode(200)->setSuccess(__('ordermodule::order.admin_cancel'))->send();

        return $this->setCode(201)->setError(__('ordermodule::order.order_in_shipping'))->send();

    }


}
