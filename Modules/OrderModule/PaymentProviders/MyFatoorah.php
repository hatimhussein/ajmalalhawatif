<?php


namespace Modules\OrderModule\PaymentProviders;


use Exception;
use GuzzleHttp\Client;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Modules\OrderModule\Entities\Transaction;
use Modules\OrderModule\Interfaces\PaymentProvider;
use Modules\OrderModule\Processor\OrderProcessor;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\HttpFoundation\Request;

class MyFatoorah implements PaymentProvider
{
    protected array $attributes;
    /**
     * @var Repository|Application|mixed
     */
    private $settings;

    public function __construct()
    {
        $this->prepareSettings();
    }

    private function prepareSettings()
    {
        $settings = config('payment.methods.my_fatoorah');

        $this->settings['env'] = $settings['env'];

        $this->settings = $this->settings['env'] == 'live'
            ? $settings['live']
            : $settings['test'];

        $this->settings = array_merge($this->settings, $settings);
    }

    /**
     * @throws Exception
     */
    public function getOrderPaymentUrl(Transaction $transaction, OrderProcessor $checkoutOrder)
    {
        $this->setMainAttributes($transaction->id, $checkoutOrder);
        $this->setInvoiceItems($checkoutOrder->products);
        $this->setUserAddress($checkoutOrder->address);
        $this->setShippingFees($checkoutOrder->shipping_price);
        if ($checkoutOrder->send_gift == 1) {
            $this->setGiftCost($checkoutOrder->gift_cost);
        }

        $response = $this->getPaymentFormResponse();

        if ($response->IsSuccess != true) {
//            dd($response, $this->attributes);
            //                TODO::remove static on error response
//            return 'https://demo.MyFatoorah.com/SAR/ia/0106260219436';
            throw new Exception(json_encode($response));
        }

        $transaction->invoice_id = $response->Data->InvoiceId;
        $transaction->save();

        return $response->Data->InvoiceURL;
    }

    protected function getPaymentFormResponse()
    {
        $client = new Client();

        try {
            $response = $client->post($this->settings['send_payment_url'], [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $this->settings['api_token'],
                ],
                'json' => $this->attributes,
            ]);
            return json_decode($response->getBody());
        } catch (RequestException $exception) {
            return json_decode($exception->getResponse()->getBody());
        }
    }

    protected function setMainAttributes($transaction_id, $checkoutOrder)
    {
        $callbackRoute = route('payment.callback.success', [
            'provider' => 'my_fatoorah',
            'transaction_id' => $transaction_id
        ]);
//        $callbackRoute = "https://protection2.pioneers-solutions.org/admin/product";
        $this->attributes = [
            'CustomerName' => $checkoutOrder->user->name,
            'NotificationOption' => 'LNK',
            'MobileCountryCode' => $checkoutOrder->user->code->code,
            'CustomerMobile' => $checkoutOrder->user->phone ?? '',
            'CustomerEmail' => $checkoutOrder->user->email ?? '',
            'InvoiceValue' => $checkoutOrder->total,
            'DisplayCurrencyIso' => strtolower($checkoutOrder->currency->code),
            'CallBackUrl' => $callbackRoute,
            'ErrorUrl' => $callbackRoute,
            'Language' => strtoupper(app()->getLocale()),
        ];
    }

    protected function setInvoiceItems($products)
    {
        $this->attributes['InvoiceItems'] = array();
        foreach ($products as $product) {
            $this->attributes['InvoiceItems'][] = [
                'ItemName' => $product->item_name . $product->item_combination_name,
                'Quantity' => $product->quantity,
                'UnitPrice' => $product->item_price,
                'Description' => $product->item_name . $product->item_combination_name,
                'Weight' => 1,
                'Width' => 1,
                'Height' => 1,
                'Depth' => 1,
            ];
        }
    }

    protected function setUserAddress($address)
    {
        $this->attributes['CustomerAddress'] = [
            'Block' => '',
            'Street' => '',
            'HouseBuildingNo' => '',
            'Address' => $address->address,
            'AddressInstructions' => '',
        ];
    }

    protected function setShippingFees($shipping_price)
    {
        $this->attributes['InvoiceItems'][] = [
            'ItemName' => __('ordermodule::checkout.shipping_cost'),
            'Quantity' => '1',
            'UnitPrice' => $shipping_price,
            'Description' => __('ordermodule::checkout.shipping_cost'),
            'Weight' => 1,
            'Width' => 1,
            'Height' => 1,
            'Depth' => 1,
        ];
    }

    protected function setGiftCost($gift_cost)
    {
        $this->attributes['InvoiceItems'][] = [
            'ItemName' => __('ordermodule::checkout.gift_cost'),
            'Quantity' => '1',
            'UnitPrice' => $gift_cost,
            'Description' => __('ordermodule::checkout.gift_cost'),
            'Weight' => 1,
            'Width' => 1,
            'Height' => 1,
            'Depth' => 1,
        ];
    }

    public function getPaymentResponse(Request $request, Transaction $transaction): Transaction
    {
        $paymentId = $request->get('paymentId');
        $client = new Client();

        try {
            $response = $client->post($this->settings['get_payment_status'], [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $this->settings['api_token'],
                ],
                'json' => [
                    'Key' => $paymentId,
                    'KeyType' => 'PaymentId'
                ],
            ]);
            $response = json_decode($response->getBody());
        } catch (RequestException $exception) {
            $response = json_decode($exception->getResponse()->getBody());
        }
        $data = $response->Data;
        $transaction->invoice_id = $data->InvoiceId;
        $transaction->status = strtolower($data->InvoiceStatus);
        $transaction->invoice_data = json_encode($data);
        $transaction->txn_id = $paymentId;
        $transaction->processed_at = now();

        return $transaction;
    }



    //------------------------------------------------------------------------------
    /*
     * validateSignature function
     */

    function validateSignature($data, $event_type, $MyFatoorah_Signature): bool
    {
        if ($event_type == 'RefundStatusChanged') {
            unset($data['GatewayReference']);
        }

        ksort($data);
        $output = implode(',',
            array_map(function ($v, $k) {
                return sprintf("%s=%s", $k, $v);
            },
                $data,
                array_keys($data)
            ));

        $encodedData = utf8_encode($output);
        $keySecret = utf8_encode($this->settings['signature']);


        $hash = base64_encode(hash_hmac('sha256', $encodedData, $keySecret, true));

        if ($MyFatoorah_Signature === $hash) {
            return true;
        } else {
            return false;
        }
    }
}
