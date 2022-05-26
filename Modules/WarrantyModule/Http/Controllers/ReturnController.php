<?php

namespace Modules\WarrantyModule\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\OrderModule\Entities\Order;
use Modules\OrderModule\Repository\OrderRepository;
use Modules\WarrantyModule\Repository\ReturnRepository;
use Modules\UserModule\Repository\UserRepository;

class ReturnController extends Controller
{
    use ApiResponseHelper;

    /**
     * @var ReturnRepository
     */
    private ReturnRepository $returnRepository;
    /**
     * @var OrderRepository
     */
    private OrderRepository $orderRepository;
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    public function __construct(ReturnRepository $returnRepository,
                                OrderRepository $orderRepository,
                                UserRepository $userRepository)
    {
        $this->returnRepository = $returnRepository;
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function index()
    {
        $returns = $this->returnRepository->getUserReturns(auth()->id());
        $returns->load('order_product.product', 'order_product.order.currency', 'reason', 'user', 'address.getZone');
        return view('warrantymodule::front.returns.index', compact('returns'));
    }

    public function myOrders()
    {
        $orders = $this->orderRepository->userReturnAbleOrders(auth()->id());

        return view('warrantymodule::front.returns.orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $order = $this->orderRepository->find($id);
        if ($order->completed_at < now()->subDays(14))
            abort(404);

        $user_id = auth()->id();

        $products = $order->orderProducts()->doesnthave('return_requests')->with('product', 'order.currency')->get();

        $reasons = $this->returnRepository->getReturnReasons(auth()->user()->is_merchant);
        $user_addresses = $this->userRepository->getuserAdresses(auth()->id());
        return view('warrantymodule::front.returns.create', compact('products', 'reasons', 'user_addresses'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'products' => 'required|min:1',
            'user_address_id' => 'required',
        ]);
        $returns = array();
        $stamp = Str::orderedUuid()->toString();
        $product_ids = $request->get('products');

        if (!$this->validateReturnedProducts($product_ids))
            return $this->setCode(201)->setError(__('ordermodule::cart.product_not_founded'))->send();

        foreach ($product_ids as $product_id) {
            $request->validate([
                'reasons.' . $product_id => 'required'
            ]);
            $returns[] = [
                'user_id' => auth()->id(),
                'order_product_id' => $product_id,
                'return_reason_id' => $request->get('reasons')[$product_id],
                'user_address_id' => $request->get('user_address_id'),
                'group_stamp' => $stamp,
            ];
        }

        $this->returnRepository->createMany($returns);

        return $this->setCode(200)->setSuccess(__('ordermodule::order.order_success'))->send();
    }

    /**
     * @param $product_ids
     * @param null $user_id
     * @return bool
     */
    public function validateReturnedProducts($product_ids, $user_id = null): bool
    {
        $user_id = $user_id ?? auth()->id();
        $found = $this->returnRepository->query()->whereIn('order_product_id', $product_ids)->first();
        if ($found)
            return false;
        $count = $this->orderRepository->validateReturnableProducts($user_id, $product_ids);
        if ($count == count($product_ids))
            return true;
        return false;
    }
}
