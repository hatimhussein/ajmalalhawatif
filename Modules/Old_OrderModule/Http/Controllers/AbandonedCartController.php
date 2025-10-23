<?php

namespace Modules\OrderModule\Http\Controllers;

use DB;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Entities\Traits\Notifier;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\OrderModule\Entities\Cart;
use Modules\OrderModule\Notifications\CartOfferNotification;
use Modules\OrderModule\Repository\CartRepository;
use Modules\ProductModule\Repository\ProductRepository;
use Modules\UserModule\Repository\UserRepository;

class AbandonedCartController extends Controller
{
    use ApiResponseHelper;

    /**
     * @var CartRepository $cartRepository
     */
    protected CartRepository $cartRepository;
    /**
     * @var UserRepository $userRepository
     */
    protected UserRepository $userRepository;
    /**
     * @var ProductRepository $productRepository
     */
    protected ProductRepository $productRepository;

    public function __construct(UserRepository $userRepository, CartRepository $cartRepository, ProductRepository $productRepository)
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:abandoned_cart');
        $this->cartRepository = $cartRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $carts = $this->cartRepository->getAbandonedCarts();
        $carts = $this->cartRepository->prepareAbandonedCarts($carts);

        DB::table('carts')->where('id', '>', 0)->update(['seen_at' => now()]);

        return view('ordermodule::admin.cart.index', compact('carts'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->cartRepository->getUserCartProductsById($id);
        $products = $this->productRepository->findAllProductsToOffers(['id', 'name_ar', 'name_en', 'type']);

        return view('ordermodule::admin.cart.offer', compact('user', 'products'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'offer_send_time' => 'required|date',
            'offer_end_time' => 'required|date|after_or_equal:now|after:offer_send_time',
            'offer_price' => 'required',
            'offer_price.*' => 'required|numeric|min:0',
        ]);

        $cart = null;
        foreach ($request->offer_price as $cart_id => $offer_price) {
            if ($request->old_price[$cart_id] != $offer_price) {
                $this->cartRepository->updateWhere(['id' => $cart_id], ['offer_price' => $offer_price, 'offer_end_time' => $request->offer_end_time, 'offer_send_time' => $request->offer_send_time]);
                $cart = $cart ?? $this->cartRepository->findWhere(['id' => $cart_id]);
            }
        }

        if ($cart) {
            $user = $this->userRepository->findUser($id);
            try {
                $user->notify(new CartOfferNotification($cart));
            } catch (Exception $e) {
//                do nothing
                return $this->setCode(200)->setSuccess($e->getMessage())->send();
            }
        }
        return $this->setCode(200)->setSuccess('success')->send();
    }

}
