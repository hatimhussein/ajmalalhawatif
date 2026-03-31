<?php

namespace Modules\OrderModule\Repository;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\CommonModule\Helper\LanguageHelper;
use Modules\ConfigModule\Entities\Config;
use Modules\ConfigModule\Entities\Voucher;
use Modules\OrderModule\Entities\Cart;
use Modules\OrderModule\Entities\OrderProduct;
use Modules\OrderModule\Processor\OrderProcessor;
use Modules\ProductModule\Scopes\ProductFrontScope;
use Modules\UserModule\Entities\UserAddress;
use Modules\OrderModule\Entities\Order;
use Modules\CommonModule\Helper\ProductHelper;
use Modules\AreaModule\Entities\City;
use Modules\ProductModule\Entities\Product;
use Modules\ProductModule\Entities\ProductCombination;


class OrderRepository
{
    use ProductHelper;

    function find($id)
    {
        return Order::find($id);
    }

    function findWhere($where)
    {
        $query = Order::query();
        foreach ($where as $key => $value) {
            $query->where($key, $value);
        }
        return $query->first();
    }

    function saveOrder($data)
    {
        return Order::create($data);
    }


    /** start New Cart Operations */
    function getCartData(): array
    {
        $cart_data = $this->getCookieCartData();
        if (auth()->check()) {
            $user_cart = $this->getUserCartData();
            if (!empty($cart_data)) {
                $user_cart = $this->appendCookieCartToUser($cart_data, $user_cart);
                $this->clearCookie();
            }
            $cart_data = $user_cart->toArray();
            $cart_data = empty($cart_data) ? $cart_data : $this->updateCartData($cart_data);
        }
        return $cart_data;
    }

    function appendCookieCartToUser($cart_data, $user_cart)
    {
        foreach ($cart_data as $item) {
            $userCartItem = $user_cart->where('product_id', $item['product_id'])->where('item_combination', $item['item_combination'])->first();
            if ($userCartItem) {
                // TODO::Choose The Greater Quantity
            } else {
                try {
                    $newItem = (new CartRepository())->create($item, auth()->user());
                    $user_cart[] = $newItem;
                } catch (Exception $exception) {
                    continue;
                }
            }
        }
        return $user_cart;
    }

    function getUserCartData()
    {
        return auth()->user()->cart()->get();
    }

    /** END New Cart Operations */

    function getCookieCartData(): array
    {
        $cart_data = [];
        if (isset($_COOKIE["shopping_cart"])) {
            $cookie_data = stripslashes($_COOKIE['shopping_cart']);
            $cart_data = json_decode($cookie_data, true);
        }
        $cart_data = empty($cart_data) ? $cart_data : $this->updateCartData($cart_data);
        $this->setCookie($cart_data);

        return $cart_data;
    }

//    public function updatedCartData()
//    {
//        return $this->getCartData();
////        return $this->updateCartData($this->getCartData());
//    }

    public function updateCartData($cart_data): array
    {
        $products_id = array_reduce($cart_data, function ($ids, $item) {
            $ids[] = $item['product_id'] ?? null;
            return $ids;
        });
        if (!$products_id) return [];

        $products = Product::withoutGlobalScope(ProductFrontScope::class)->whereIn('id', $products_id)->with('combinations', 'discounts')->get();
        $cart_data = array_map(function ($item) use ($products) {
            $product = $products->where('id', $item['product_id'])->first();
            if ($product) {
                $item['item_name'] = trim(LanguageHelper::nameTranslate($product));
                $item['item_photo'] = $product->product_photo;
                $item['use_offer_price'] = $item['use_offer_price'] ?? null;

                if ($product->type == 'simple') {
                    $item['item_price'] = isset($item['use_offer_price']) && $item['use_offer_price'] ? ProductHelper::addTaxToPrice($item['use_offer_price']) : $this->calculateProductPrice($product, $item['quantity']);
                    $item['tax_free_price'] = $item['use_offer_price'] ?? $this->calculateProductPrice($product, $item['quantity'], false);
                    $item['combination_id'] = null;
                    $item['item_combination'] = null;
                    $item['item_combination_name'] = null;
                } else {
                    $combination = $product->combinations->where('combination_values', $item['item_combination'])->first();
                    if ($combination) {
                        $item['item_price'] = isset($item['use_offer_price']) && $item['use_offer_price'] ? ProductHelper::addTaxToPrice($item['use_offer_price']) : $this->calculateProductPrice($product, $item['quantity']) + $combination->combination_price;
                        $item['tax_free_price'] = $item['use_offer_price'] ?? $this->calculateProductPrice($product, $item['quantity'], false) + $combination->combination_price;
                        $item['combination_id'] = $combination->id;
                        $item['item_combination'] = $combination->combination_values;
                        $item['item_combination_name'] = $combination->combination_names;
                    } else return null;
                }
                return $item;
            } else return null;
        }, $cart_data);

        $cart_data = array_filter($cart_data, function ($item) {
            return !is_null($item);
        });

        return $cart_data;
    }

    public function setCookie($cart_data)
    {
        $this->clearCookie();
        if (!empty($cart_data)) {
            $item_data = $this->json_encode_unicode($cart_data);
            setcookie('shopping_cart', $item_data, time() + (86400 * 30), '/');
        }
    }

    public function clearCookie()
    {
        setcookie("shopping_cart", "", time() - 3600, '/');
    }

    public function clearUserCart()
    {
        auth()->user()->cart()->delete();
    }

    public function json_encode_unicode($data)
    {
        if (defined('JSON_UNESCAPED_UNICODE'))
            return json_encode($data, JSON_UNESCAPED_UNICODE);

        return preg_replace_callback('/(?<!\\\\)\\\\u([0-9a-f]{4})/i',
            function ($m) {
                $d = pack("H*", $m[1]);
                $r = mb_convert_encoding($d, "UTF8", "UTF-16BE");
                return $r !== "?" && $r !== "" ? $r : $m[0];
            }, json_encode($data)
        );

    }

    function calSubTotal($tax_free = false)
    {
        $price_col = $tax_free ? 'tax_free_price' : 'item_price';
        $total = 0;

        $cart_data = app('cart_data');

        foreach ($cart_data as $item) {
            if ($item['use_offer_price']) {
                $item[$price_col] = $tax_free ? $item['use_offer_price'] : ProductHelper::addTaxToPrice($item['use_offer_price']);
            }
            $total = $total + ($item["quantity"] * $item[$price_col]);
        }

        return ProductHelper::calPriceCurrency($total);
    }


    function checkOrderValues($tax_value)
    {
        $cart_data = app('cart_data');

        $productIds = array_column($cart_data, 'product_id');
        $products = Product::whereIn('id', $productIds)->get();

        $arr = [];
        $total = 0;

        foreach ($cart_data as $key => $item) {
            $product = $products->where('id', $item['product_id'])->first();

            if ($item['use_offer_price']) {
                $price = $item['use_offer_price'];
            } else {
                $price = $this->calculateProductPrice($product, $item['quantity'], false);
                if ($product->type != 'simple') {
                    $product_combination = ProductCombination::where('product_id', $item['product_id'])->where('combination_values', $item['item_combination'])->first();
                    $price += $product_combination->combination_price;
                }
            }

            $tax = ($price * $tax_value) / 100;
            $new_price = $tax + $price;
            $price = $this->calPriceCurrency($new_price);
            $arr[$key]['product_id'] = $item['product_id'];
            $arr[$key]['item_photo'] = $item['item_photo'];
            $arr[$key]['item_name'] = $item['item_name'];
            $arr[$key]['quantity'] = $item['quantity'];
            $arr[$key]['item_combination_name'] = $item['item_combination_name'];
            $arr[$key]['combination_id'] = null;
            $arr[$key]['item_price'] = $price;
            $total += $price * $item['quantity'];

        }
        $data['order_products'] = $arr;
        $data['subtotal'] = $total;
        return $data;
    }


    function saveOrderProducts($order, $products, $col = 'product_id')
    {
        foreach ($products as $key => $item) {
            $product = Product::where('id', $item[$col])->first();
            if ($product->type == 'simple') {
                if ($product->product_quantity >= $item['quantity'])
                    $product->decrement('product_quantity', $item['quantity']);
                else
                    $product->update(['product_quantity' => 0]);
            } else {
                $comb = ProductCombination::where('product_id', $item[$col])->where('combination_names', $item['item_combination_name'])->first();
                if ($comb->combination_quantity >= $item['quantity'])
                    $comb->decrement('combination_quantity', $item['quantity']);
                else
                    $comb->update(['combination_quantity' => 0]);
            }
        }
        return $order->orderProducts()->createMany((array)$products);
    }


    function calShippingPrice($user_address_id)
    {
        $address = UserAddress::where('id', $user_address_id)->first();
        return ProductHelper::calPriceCurrency($address->getCity->shipping_price);
    }

    function calShippingPriceFromCity($city_id)
    {
        $city = City::where('id', $city_id)->first();
        return ProductHelper::calPriceCurrency($city->shipping_price);
    }


    public function userOrders($user_id)
    {
        return Order::where('user_id', $user_id)->with('currentStatus')->orderBy('id', 'desc')->get();
    }


    public function userReturnAbleOrders($user_id)
    {
        return Order::where('user_id', $user_id)->where('current_status_type_id', '2')
            ->whereDate('completed_at', '>=', now()->subDays(14))->orderBy('id', 'desc')->get();
    }

    public function userOrder($user_id, $order_id)
    {
        return Order::with(['user', 'products', 'userAddresses', 'status'])->where('user_id', $user_id)->where('id', $order_id)->first();
    }

    public function checkOrderStatus($user_id, $order_id)
    {
        return Order::where('user_id', $user_id)->where('id', $order_id)
            ->where('current_status_id', 1)->first();
    }

    public function cancelOrder($user_id, $order_id)
    {
        return Order::where('user_id', $user_id)
            ->where('id', $order_id)
            ->where('current_status_id', 1)->update(['current_status_id' => 7, 'current_status_type_id' => '3']);
    }

    public function getGiftConfig()
    {
        return Config::where('key', 'gift_price')->first();
    }

    public function getGiftCost($giftConfig)
    {
        return $giftConfig->value_ar * session()->get('currency')->value;
    }


//    admin order

    public function getCartDBProducts($requestProducts)
    {
        $product_ids = array_column($requestProducts, 'id');
        return Product::whereIn('id', $product_ids)->with('discounts', 'combinations')->get();
    }

    public function prepareAdminOrderProducts($products, $requestProducts, $user)
    {
        $level = $user->is_merchant ? $user->prices_level : 5;
        $col = $this->getPriceLevel($level);

        return array_map(function ($item) use ($products, $col) {
            $product = $products->where('id', $item['id'])->first();
            $product->price = $product->$col;
            if ($product) {
                $item['product_id'] = $product->id;
                $item['name'] = $product->name;
                if ($product->type == 'simple') {
                    $item['item_price'] = $this->calculateProductPrice($product, $item['quantity'], false, true);
                } else {
                    $combination = $product->combinations->where('combination_values', $item['combination'])->first();
                    if ($combination) {
                        $item['item_price'] = $this->calculateProductPrice($product, $item['quantity'], false, true) + $combination->combination_price;
                        $item['combination_id'] = $combination->id;
                        $item['item_combination_name'] = $combination->combination_names;
                        $item['item_combination'] = $combination->combination_values;
                    } else return null;
                }
                return $item;
            } else return null;
        }, $requestProducts);
    }

    public function checkQuantity($preparedProducts, $dbProducts)
    {
        $failed = [];
        array_map(function ($item) use ($dbProducts, $failed) {
            $product = $dbProducts->where('id', $item['id'])->first();
            if ($product) {
                if ($product->type == 'simple') {
                    if ($item['quantity'] > $product->product_quantity) {
                        $failed['name'] = $product->name;
                        $failed['quantity'] = $item['quantity'];
                    }
                } else {
                    $combination = $product->combinations->where('combination_values', $item['item_combination'])->first();
                    if ($combination) {
                        if ($item['quantity'] > $combination->combination_quantity) {
                            $failed['name'] = $product->name . ' ' . $combination->combination_names;
                            $failed['quantity'] = $item['quantity'];
                        }
                    }
                }
                return $item;
            }
        }, $preparedProducts);
        return (empty($failed)) ? false : $failed;
    }


    function calOrderProductsSubTotal($products)
    {
        $total = 0;
        foreach ($products as $keys => $values) {
            $total = $total + ($values["quantity"] * $values['item_price']);
        }

        return ProductHelper::calPriceCurrency($total);
    }

    function getPriceLevel($level)
    {
        switch ($level) {
            case '1':
                $col = 'product_price1';
                break;
            case '2':
                $col = 'product_price2';
                break;
            case '3':
                $col = 'product_price3';
                break;
            case '4':
                $col = 'product_price4';
                break;
            default:
                $col = 'product_price';
                break;
        }
        return $col;
    }


    /**
     * @param OrderProcessor $order
     * @return array
     */
    public function getMainOrderData(OrderProcessor $order): array
    {
        return [
            'user_id' => $order->user->id,
            'user_address_id' => $order->address->id,
            'delivery_time' => $order->delivery_time,
            'comment' => $order->comment,
            'coupon_code' => $order->coupon_code,
            'payment_type' => $order->payment_type,
            'sub_total' => $order->subtotal,
            'shipping' => $order->shipping_price,
            'untaxed_shipping' => $order->untaxed_shipping ?? 0,
            'discount' => $order->discount,
            'send_gift' => $order->send_gift ?? 0,
            'gift_cost' => $order->gift_cost ?? 0,
            'total' => $order->total,
            'order_currency' => LanguageHelper::nameTranslate($order->currency),
            'currency_id' => $order->currency->id,
            'currency_value' => $order->currency->value,
            'is_merchant' => $order->user->is_merchant,
            'prices_level' => $order->user->prices_level,
            'tax_percentage' => $order->tax_percentage
        ];
    }


    /**    got those from store 2 */

    public function updateOrder($id, $data)
    {
        $order = Order::find($id);
        if ($order) {
            $sub_total = 0;
            $total = 0;
            $shipping_cost = 0;
            $discount = 0;

            $orderProducts = OrderProduct::where('order_id', $id)->get();
            foreach ($orderProducts as $product) {
                $sub_total += $product->item_price * $product->quantity;
            }
            if ($order->coupon_code) {
                $code = Voucher::where('code', $order->coupon_code)->first();
                if ($code) {
                    $amount = $this->calAmount($sub_total, $code);
                    $discount = $amount['amount'];
                }

            }

            $order->discount = $discount;
            $shipping_cost = $this->calShippingPrice($data['shipping_address_id']);
            $order->sub_total = $sub_total;
            $order->user_address_id = $data['shipping_address_id'];
            $order->payment_type = $data['payment_type'];
            $order->shipping = $shipping_cost;
            $total = $sub_total + $shipping_cost - $discount;
            $order->total = $total;

            if ($order->update()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    /***
     * End store2 Stealing
     */

    /**
     * @param $user_id
     * @param array $returned_ids
     * @return Collection
     */
    public function getUserReturnableProducts($user_id, $returned_ids = []): Collection
    {
        return OrderProduct::join('orders', 'orders.id', '=', 'order_products.order_id')
            ->where('orders.user_id', $user_id)
            ->whereNotIn('order_products.id', $returned_ids)
            ->whereDate('orders.created_at', '>=', now()->subDays(14))
            ->select('order_products.*')->with('product', 'order.currency')->get();
    }

    public function validateReturnableProducts($user_id, $product_ids)
    {
        return OrderProduct::join('orders', 'orders.id', '=', 'order_products.order_id')
            ->where('orders.user_id', $user_id)
            ->whereIn('order_products.id', $product_ids)
            ->whereDate('orders.completed_at', '>=', now()->subDays(14))
            ->select('order_products.id')->count();
    }

    public function revertOrderProductQuantities($order)
    {
        return $order->products->map(function ($product) {
            if ($product->type == 'simple') {
                $product->product_quantity += $product->pivot->quantity;
                $product->save();
            } else {
                $combination = ProductCombination::where('product_id', $product->id)->where('id', $product->combination_id)->first();
                if ($combination) {
                    $combination->combination_quantity += $product->pivot->quantity;
                    $combination->save();
                }
            }
            return $product;
        });
    }
}
