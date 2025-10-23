<?php

namespace Modules\OrderModule\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\OrderModule\Entities\Cart;
use Modules\OrderModule\Repository\CartRepository;
use Modules\ProductModule\Entities\ProductCombination;
use Modules\ProductModule\Entities\Product;
use Modules\OrderModule\Repository\OrderRepository;
use Modules\CommonModule\Helper\ProductHelper;
use Modules\ProductModule\Repository\ProductRepository;
use Modules\UserModule\Repository\UserRepository;


class CartController extends Controller
{
    use ApiResponseHelper;
    use ProductHelper;

    public function __construct(OrderRepository $orderRepository, ProductRepository $productRepository,
                                CartRepository $cartRepository, UserRepository $userRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->cartRepository = $cartRepository;
        $this->userRepository = $userRepository;
    }

    function index()
    {
        $wish_list = $this->userRepository->wishList();
        return view('ordermodule::front.cart', compact('wish_list'));
    }

    function addToCart(Request $request)
    {
        request()->validate([
            'product_id' => 'required',
            'product_quantity' => 'bail|required|numeric|integer|gt:0',
        ]);
        if (auth()->check()) {
            return $this->addToUserCart($request);
        } else {
            return $this->addToCookieCart($request);
        }
    }

    function addToUserCart($request)
    {
        $product = $this->productRepository->findProductById($request->product_id, ['discounts']);
        if ($product) {
            if ($product->product_type == 'combination') {
                $combination = trim($request->input('combination'), ',');
                $combination = $product->combinations()->where('combination_values', $combination)->first();
                if ($combination) {
                    $response = $this->cartRepository->addCombinationToUserCart($product, $combination, $request->product_quantity, auth()->user());
                    if ($response === true) {
                        $data = $this->cartRepository->getAddCartResponseData();
                        return $this->setCode(200)->setData($data)->send();
                    } else {
                        return $response;
                    }
                }
                return $this->setCode(201)->setSuccess(__('ordermodule::cart.product_not_founded'))->send();
            } else {
                $response = $this->cartRepository->addSimpleProductToUserCart($product, $request->product_quantity, auth()->user());
                if ($response === true) {
                    $data = $this->cartRepository->getAddCartResponseData();
                    return $this->setCode(200)->setData($data)->send();
                } else {
                    return $response;
                }
            }
        }
        return $this->setCode(201)->setSuccess(__('ordermodule::cart.product_not_founded'))->send();
    }


    function addToCookieCart($request)
    {
        if ($request->product_type == "combination") {
            $cart_data = app('cart_data');
            $product = $this->productRepository->findProductById($request->product_id, ['discounts']);

            $item_id_list = array_column($cart_data, 'product_id');

            $item_combination_list = array_column($cart_data, 'item_combination');
            $combination = trim($request->combination, ',');
            if ($product) {
                $check_combination = ProductCombination::where('product_id', $request->product_id)->where('combination_values', $combination)->first();

                if ($check_combination) {
                    if (in_array($request->product_id, $item_id_list) && in_array($combination, $item_combination_list)) {
                        foreach ($cart_data as $keys => $values) {
                            if ($cart_data[$keys]["product_id"] == $request->product_id && $cart_data[$keys]["item_combination"] == $combination) {
                                $total_quantity = $cart_data[$keys]["quantity"] + $request->product_quantity;

                                if ($total_quantity <= $check_combination->combination_quantity) {
                                    $price = $this->calculateProductPrice($product, $total_quantity);
                                    $tax_free_price = $this->calculateProductPrice($product, $total_quantity, false);
                                    $cart_data[$keys]["quantity"] = $total_quantity;
                                    $cart_data[$keys]["item_price"] = round($price + $check_combination->combination_price, 2);
                                    $cart_data[$keys]["tax_free_price"] = round($tax_free_price + $check_combination->combination_price, 2);
                                } else {
                                    return $this->setCode(201)->setSuccess(__('commonmodule::validation.quantity_unavilable'))->send();
                                }

                            }
                        }
                    } else {

                        if ($request->product_quantity <= $check_combination->combination_quantity) {
                            $price = $this->calculateProductPrice($product, $request->product_quantity);
                            $tax_free_price = $this->calculateProductPrice($product, $request->product_quantity, false);
                            $name = (strlen($request->product_name) > 18) ? mb_substr($request->product_name, 0, 18) : $request->product_name;

                            $item_array = array(
                                'product_id' => $request->product_id,
                                'item_name' => $name,
                                'item_price' => round($price + $check_combination->combination_price, 2),
                                'tax_free_price' => round($tax_free_price + $check_combination->combination_price, 2),
                                'quantity' => $request->product_quantity,
                                'item_photo' => $request->product_photo,
                                'item_combination_name' => $check_combination->combination_names,
                                'item_combination' => $combination,
                                'combination_id' => $check_combination->id,
                            );
                            $cart_data[] = $item_array;

                        } else {
                            return $this->setCode(201)->setSuccess(__('commonmodule::validation.quantity_unavilable'))->send();
                        }


                    }


                    $this->orderRepository->setCookie($cart_data);


                    $data['cart_data'] = $cart_data;
                    $data['currency'] = session('currency');
                    $data['currency_name'] = (session('locale') == 'en') ? $data['currency']['name_en'] : $data['currency']['name_ar'];
                    $data['message'] = __('commonmodule::validation.add_to_cart_success');

                    return $this->setCode(200)->setData($data)->send();
                }

                return $this->setCode(201)->setSuccess(__('commonmodule::validation.add_to_cart_options'))->send();
            }

            return $this->setCode(201)->setSuccess(__('ordermodule::cart.product_not_founded'))->send();

        } else {
            $data = $this->addSimpleProductToCart($request);

            return $data;
        }
    }


    function addSimpleProductToCart($request)
    {
        $cart_data = app('cart_data');

        $item_id_list = array_column($cart_data, 'product_id');


        $product = $this->productRepository->findProductById($request->product_id, ['discounts']);


        if ($product) {

            if (in_array($request->product_id, $item_id_list)) {

                foreach ($cart_data as $keys => $values) {
                    if ($cart_data[$keys]["product_id"] == $request->product_id) {

                        $total_quantity = $cart_data[$keys]["quantity"] + $request->product_quantity;

                        if ($total_quantity <= $product->product_quantity) {
                            $price = $this->calculateProductPrice($product, $total_quantity);
                            $tax_free_price = $this->calculateProductTaxFreePrice($product, $total_quantity);

                            $cart_data[$keys]["quantity"] = $total_quantity;
                            $cart_data[$keys]["item_price"] = round($price, 2);
                            $cart_data[$keys]["tax_free_price"] = round($tax_free_price, 2);
                        } else {
                            return $this->setCode(201)->setSuccess(__('commonmodule::validation.quantity_unavilable'))->send();
                        }

                    }
                }
            } else {

                if ($request->product_quantity <= $product->product_quantity) {
                    $price = $this->calculateProductPrice($product, $request->product_quantity);
                    $tax_free_price = $this->calculateProductTaxFreePrice($product, $request->product_quantity);
                    $name = (strlen($request->product_name) > 18) ? mb_substr($request->product_name, 0, 18) : $request->product_name;
                    $item_array = array(
                        'product_id' => $request->product_id,
                        'item_name' => $name,
                        'item_price' => round($price, 2),
                        'tax_free_price' => round($tax_free_price, 2),
                        'quantity' => $request->product_quantity,
                        'item_photo' => $request->product_photo,
                        'item_combination_name' => null,
                        'item_combination' => null,
                        'combination_id' => null,
                    );
                    $cart_data[] = $item_array;

                } else {
                    return $this->setCode(201)->setSuccess(__('commonmodule::validation.quantity_unavilable'))->send();
                }


            }


            $this->orderRepository->setCookie($cart_data);

            $data['cart_data'] = $cart_data;
            $data['currency'] = session('currency');
            $data['currency_name'] = (session('locale') == 'en') ? $data['currency']['name_en'] : $data['currency']['name_ar'];
            $data['message'] = __('commonmodule::validation.add_to_cart_success');

            return $this->setCode(200)->setData($data)->send();
        }

        return $this->setCode(201)->setSuccess(__('commonmodule::validation.product_unavilable'))->send();
    }


    function updateQuantity(Request $request)
    {

        $request->validate([
            'product_id' => 'required',
            'quantity' => 'bail|required|numeric|integer|gt:0',
        ]);

        if (auth()->check()) {
            return $this->updateUserCartQuantity($request);
        } else {
            return $this->updateCookieCartQuantity($request);
        }
    }

    function updateUserCartQuantity(Request $request)
    {
        $product = $this->productRepository->findProductById($request->input('product_id'), ['discounts']);
        $quantity = $request->input('quantity', 1);
        $combination = null;
        if ($product->type == 'combination') {
            $combination = trim($request->input('item_combination', null), ',');
            $combination = $product->combinations()->where('combination_values', $combination)->first();
            if ($combination) {
                $maxQuantity = $combination->combination_quantity;
            } else {
                return $this->setCode(201)->setSuccess(__('ordermodule::cart.product_not_founded'))->send();
            }
        } else {
            $maxQuantity = $product->product_quantity;
        }

        if ($quantity > $maxQuantity) {
            return $this->setCode(201)->setError(__('ordermodule::cart.limit_quantity'))->send();
        } else {
            $cartProduct = auth()->user()->cart()->where('product_id', $product->id)->where('item_combination', $combination->combination_values ?? null)->first();
            if ($cartProduct) {
                $price = $cartProduct->use_offer_price ? ProductHelper::addTaxToPrice($cartProduct->use_offer_price) : ($this->calculateProductPrice($product, $quantity) + ($combination->combination_price ?? 0));
                $oldQuantity = $cartProduct->quantity;
                $oldPrice = $cartProduct->use_offer_price ? ProductHelper::addTaxToPrice($cartProduct->use_offer_price) : ($this->calculateProductPrice($product, $oldQuantity) + ($combination->combination_price ?? 0));
                $cartProduct->update(['quantity' => $quantity]);

                $add_price = ($price - $oldPrice);

                $total = $this->orderRepository->calSubTotal();

                $data['sub_total'] = $total + $add_price;
                $data['item_price'] = round(ProductHelper::calPriceCurrency($price), 2);

                $data['message'] = __('commonmodule::validation.updated');

                return $this->setCode(200)->setData($data)->send();
            } else {
                return $this->setCode(201)->setSuccess(__('ordermodule::cart.product_not_founded'))->send();
            }
        }

    }

    function updateCookieCartQuantity($request)
    {
        $cart_data = app('cart_data');

        $combination = trim($request->item_combination, ',');


        $product = Product::where('id', $request->product_id)->with('discounts')->first();

        if ($product->type == 'combination') {
            $product_comb = ProductCombination::where('product_id', $request->product_id)->where('combination_values', $combination)->first();
            $quantity = $product_comb->combination_quantity;
            $add_price = $product_comb->combination_price;
        } else {
            $product_main = Product::where('id', $request->product_id)->first();
            $quantity = $product_main->product_quantity;
            $add_price = 0;
        }

        $price = $this->calculateProductPrice($product, $request->quantity);

        foreach ($cart_data as $keys => $values) {
            if ($cart_data[$keys]['product_id'] == $request->product_id && $cart_data[$keys]['item_combination'] == $request->item_combination) {
                if ($request->quantity <= $quantity) {
                    $cart_data[$keys]['quantity'] = $request->quantity;
                    $cart_data[$keys]['item_price'] = $price + $add_price;

                    $this->orderRepository->setCookie($cart_data);

                    $total = $this->orderRepository->calSubTotal();
                    $data['sub_total'] = $total;
                    $data['item_price'] = round(($price + $add_price) * session('currency')->value, 2);

                    $data['message'] = __('commonmodule::validation.updated');

                    return $this->setCode(200)->setData($data)->send();
                } else {
                    return $this->setCode(201)->setError(__('ordermodule::cart.limit_quantity'))->send();
                }
            }
        }
        // TODO::set translation to 'empty'
        return $this->setCode(201)->setError(__('ordermodule::cart.empty'))->send();
    }


    function removeItem(Request $request)
    {
        $cart_data = app('cart_data');
        if (auth()->check()) {
            $data = $this->removeUserCartItem($request, $cart_data);
        } else {
            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]['product_id'] == $request->product_id && $cart_data[$keys]['item_combination'] == $request->item_combination) {
                    $item_price = $cart_data[$keys]['item_price'] * $cart_data[$keys]['quantity'] * session('currency')->value;
                    unset($cart_data[$keys]);
                    $this->orderRepository->setCookie($cart_data);
                }
            }

            $total = $this->orderRepository->calSubTotal() - $item_price;
            $data['sub_total'] = round($total, 2);

            $data['message'] = __('commonmodule::validation.deleted');
            $data['length'] = count($cart_data);
        }
        return $this->setCode(200)->setData($data)->send();
    }

    function removeUserCartItem(Request $request, $cart_data)
    {
        $cartProduct = auth()->user()->cart()
            ->where('product_id', $request->input('product_id'))
            ->where('item_combination', $request->input('item_combination'))
            ->with('product')
            ->first();

        $found = array_filter($cart_data, function ($item) use ($cartProduct) {
            return ($item['product_id'] == $cartProduct->product_id && $item['item_combination'] == $cartProduct->item_combination);
        });

        $item_price = (isset($found[0])) ? $found[0]['item_price'] * $found[0]['quantity'] : 0;

        $cartProduct->delete();

        $total = $this->orderRepository->calSubTotal() - $item_price;
        $data['sub_total'] = round($total, 2);

        $data['message'] = __('commonmodule::validation.deleted');
        $data['length'] = count($cart_data) - 1;

        return $data;
    }


    function clearCart()
    {
        if (auth()->check()) {
            auth()->user()->cart()->delete();
        } else {
            $this->orderRepository->clearCookie();
        }
        return $this->setCode(200)->setSuccess(__('commonmodule::validation.cleared_cart'))->send();
    }


    /**
     * @param $id
     * @return RedirectResponse
     */
    function reOrder($id): RedirectResponse
    {
        $order = $this->orderRepository->find($id);
        if (!$order || $order->user_id != auth()->id())
            return back();

        $order->load('orderProducts.product');

        foreach ($order->orderProducts as $orderProduct) {
            $product = $orderProduct->product;
            if ($product->product_type == 'combination') {
                $combination = $product->combinations()->where('id', $orderProduct->combination_id)->first();
                if ($combination) {
                    $this->cartRepository->addCombinationToUserCart($product, $combination, $orderProduct->quantity, auth()->user());
                }
            } else {
                $this->cartRepository->addSimpleProductToUserCart($product, $orderProduct->quantity, auth()->user());
            }
        }
        return redirect('cart');
    }


}
