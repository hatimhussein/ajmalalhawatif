<?php


namespace Modules\OrderModule\Traits;


use Modules\CommonModule\Helper\TaxHelper;
use Modules\ConfigModule\Entities\Voucher;
use Modules\OrderModule\Processor\OrderProcessor;

trait OrderService
{

    /**
     * @param $data
     * @return OrderProcessor
     */
    public function getCheckoutOrderData($data): OrderProcessor
    {
//      TODO::refactor this ugly method
        $checkoutOrder = new OrderProcessor();
        $checkoutOrder->user = auth()->user();

        $checkoutOrder->setData($data);

        if (!$checkoutOrder->address)
            return $checkoutOrder->setError(__('ordermodule::cart.no_address'));


        $is_found = $this->productRepository->checkIfProductIsFounded();

        if (!$is_found)
            return $checkoutOrder->setError(__('commonmodule::validation.cart_product_error'));
        elseif (is_array($is_found))
            return $checkoutOrder->setError(__('ordermodule::order.product_quantity_error') . ' ' . $is_found['item_name'] . ' ( ' . $is_found['act_quantity'] . ' )');


        $tax_shipping = TaxHelper::isTaxAppliedOnShipping();
        $tax_value = TaxHelper::getCountryIdTaxValue($checkoutOrder->address->country_id);


        $sub_total = $this->orderRepository->calSubTotal(true);
        $sub_total = TaxHelper::getTaxedPrice($sub_total, $tax_value);

        $untaxed_shipping = $shipping_price = $this->orderRepository->calShippingPriceFromCity($checkoutOrder->address->city_id);
        if ($tax_shipping)
            $shipping_price += ($shipping_price * $tax_value) / 100;

        $order_data = $this->orderRepository->checkOrderValues($tax_value);

        $checkoutOrder->setProducts($order_data['order_products']);

        $discount = 0;
        $discount_code = '';

        if ($data['coupon_code']) {
            $discount_data = $this->checkCode($data['coupon_code'], $order_data['subtotal']);
            if ($discount_data['code'] == 400)
                return $checkoutOrder->setError($discount_data['message']);
            $discount = $discount_data['data']['amount'];
        }

        if ($discount != 0) {
            $discount_code = $data['coupon_code'];
        }

        $checkoutOrder->discount = $discount;
        $checkoutOrder->shipping_price = round($shipping_price, 2);
        $checkoutOrder->coupon_code = $discount_code;
        $checkoutOrder->subtotal = $order_data['subtotal'];

        $vtotal = round($sub_total + $shipping_price - $discount, 2);
        $total = $checkoutOrder->total;

        if ($vtotal != $total & !isset($request->confirm)) {
            $vdata['message'] = __('ordermodule::checkout.cookie_error');
            $vdata['data'] = $order_data['order_products'];
            $vdata['total'] = $total;
            return $checkoutOrder->setError($vdata, 203);
        }


        if ($data['send_gift'] ?? false) {
            $giftConfig = $this->orderRepository->getGiftConfig();
            if (($checkoutOrder->user->is_merchant && $giftConfig->properties['merchant_active']) || (!$checkoutOrder->user->is_merchant && $giftConfig->properties['user_active'])) {
                $checkoutOrder->send_gift = 1;
                $checkoutOrder->gift_cost = $this->orderRepository->getGiftCost($giftConfig);
            } else {
                $checkoutOrder->send_gift = 0;
                $checkoutOrder->gift_cost = 0;
            }
        }
        $checkoutOrder->tax_percentage = $tax_value;
        $checkoutOrder->untaxed_shipping = round($untaxed_shipping, 2);

        return $checkoutOrder;
    }

    public function saveOrderData($checkoutOrder, $main_order_data)
    {
        //            TODO::handle Voucher/Product decrement
        if (!$checkoutOrder->is_address_saved) {
            $checkoutOrder->address->save();
            $main_order_data['user_address_id'] = $checkoutOrder->address->id;
        }

        $order = $this->orderRepository->saveOrder($main_order_data);
        $save_products = $this->orderRepository->saveOrderProducts($order, $checkoutOrder->products->toArray());
        $status = $this->orderAdminRepository->saveStatusWithComment($order, 1, 'جديد');
        if (($checkoutOrder->subtotal + $checkoutOrder->shipping_price) != $checkoutOrder->total) {
            if ($order && $save_products && $status && $checkoutOrder->coupon_code) {
                if (Voucher::where('code', $checkoutOrder->coupon_code)->exists()) {
                    $this->voucherRepository->CodeUse($checkoutOrder->coupon_code);
                }
            }
        }
        return $order;
    }
}
