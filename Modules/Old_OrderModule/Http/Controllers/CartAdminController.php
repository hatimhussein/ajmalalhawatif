<?php

namespace Modules\OrderModule\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\OrderModule\Repository\CartRepository;
use Modules\ProductModule\Repository\ProductRepository;
use Modules\UserModule\Repository\UserRepository;

class CartAdminController extends Controller
{
    use ApiResponseHelper;

    /**
     * @var CartRepository $cartRepository
     */
    private CartRepository $cartRepository;

    /**
     * @var ProductRepository $productRepository
     */
    private ProductRepository $productRepository;

    /**
     * @var UserRepository $userRepository
     */
    private UserRepository $userRepository;

    public function __construct(CartRepository $cartRepository, ProductRepository $productRepository, UserRepository $userRepository)
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:update_cart');
//        $this->middleware('permission:update_cart');
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'product_id' => 'required',
            'combination' => 'nullable|exists:product_combinations,combination_values',
        ]);
        $user = $this->userRepository->findUser($request->get('user_id'));

        $product = $this->productRepository->findProductById($request->product_id, ['discounts']);

        if ($product) {
            if ($product->type == 'combination') {
                $combination = trim($request->input('combination'), ',');
                $combination = $product->combinations()->where('combination_values', $combination)->first();
                if ($combination) {
                    $response = $this->cartRepository->addCombinationToUserCart($product, $combination, 1, $user);
                    if ($response === true)
                        return $this->setCode(200)->setSuccess('success')->send();
                    else
                        return $response;
                }
            } else {
                $response = $this->cartRepository->addSimpleProductToUserCart($product, 1, $user);
                if ($response === true)
                    return $this->setCode(200)->setSuccess('success')->send();
                else
                    return $response;
            }
        }
        return $this->setCode(201)->setError(__('ordermodule::cart.product_not_founded'))->send();
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $quantity = $request->input('quantity');
        $cartItem = $this->cartRepository->find($id);

        if ($cartItem) {
            if ($this->cartRepository->checkQuantity($cartItem, $quantity)) {
                $cartItem->update(['quantity' => $quantity]);
                return $this->setCode(200)->setSuccess('success')->send();
            }
            return $this->setCode(201)->setError(__('commonmodule::validation.quantity_unavilable'))->send();
        }
        return $this->setCode(201)->setError(__('commonmodule::validation.product_notfound'))->send();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $this->cartRepository->delete($id);
        return $this->setCode(200)->setSuccess('success')->send();
    }
}
