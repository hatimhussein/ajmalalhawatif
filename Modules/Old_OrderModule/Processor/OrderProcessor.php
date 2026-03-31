<?php


namespace Modules\OrderModule\Processor;

use Illuminate\Database\Eloquent\Model;
use Modules\ConfigModule\Entities\Currency;
use Modules\OrderModule\Entities\OrderProduct;
use Modules\UserModule\Entities\User;
use Modules\UserModule\Entities\UserAddress;

class OrderProcessor extends Model
{
    protected $attributes = [
        'is_address_saved' => true,
        'is_valid' => true,
    ];

    protected $appends = ['total'];

    /**
     * @param $address_id
     * @return mixed
     */
    public function setShippingAddressById($address_id)
    {
        $this->address = $this->user->addresses()->where('id', $address_id)->first();
        return $this->address;
    }

    /**
     * @param array $area
     * @return mixed|UserAddress
     */
    public function setShippingAddressByZone(array $area)
    {
        $address = new UserAddress();
        $address->user_id = $this->user->id;
        $address->country_id = $area['country_id'];
        $address->government_id = $area['government_id'];
        $address->city_id = $area['city_id'];
        $address->zone_id = $area['zone_id'];
        $address->address = $area['address'];
        $this->address = $address;
        $this->is_address_saved = false;
        return $this->address;
    }

    public function setData($data)
    {
        $rawData = ['delivery_time', 'payment_type', 'comment'];
        foreach ($rawData as $key) {
            if (isset($data[$key]))
                $this->{$key} = $data[$key];
        }

        if ($data['shipping_address_id'])
            $this->setShippingAddressById($data['shipping_address_id']);
        else
            $this->setShippingAddressByZone($data);
    }

    /**
     * @param $products
     */
    public function setProducts($products)
    {
        $orderProducts = collect([]);
        foreach ($products as $product) {
            $orderProduct = new OrderProduct();
            $orderProduct->forceFill($product);
            $orderProducts->push($orderProduct);
        }
        $this->products = $orderProducts;
    }

    public function setUser($user)
    {
        $this->user = new User();
        $this->user->forceFill($user);
    }

    public function setAddress($address)
    {
        $this->address = new UserAddress();
        $this->address->forceFill($address);
    }

    public function setCurrency($currency)
    {
        $this->currency = new Currency();
        $this->currency->forceFill($currency);
    }

    /**
     * @return float
     */
    public function getTotalAttribute(): float
    {
        return round(($this->subtotal + $this->shipping_price - $this->discount) + ($this->gift_cost ?? 0), 2);
    }

    public function setError($message, $code = 201)
    {
        $this->is_valid = false;
        $this->errorCode = $code;
        $this->errorMessage = $message;

        return $this;
    }

}
