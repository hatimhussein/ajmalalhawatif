<?php


namespace Modules\OrderModule\Repository;


use http\Client\Curl\User;
use Modules\OrderModule\Entities\Transaction;
use Modules\OrderModule\Interfaces\PaymentProvider;
use Modules\OrderModule\Processor\OrderProcessor;

class PaymentRepository
{

    public function find($transaction_id)
    {
        return Transaction::find($transaction_id);
    }

    public function findInvoice($invoice_id)
    {
        return Transaction::where('invoice_id', $invoice_id)->where('invoice_id', '!=', null)->first();
    }

    public function makeProvider($payment_method): PaymentProvider
    {
        $provider = config('payment.methods.' . $payment_method . '.provider');
        return new $provider();
    }


    public function isPaymentOnline($payment_method)
    {
        return config('payment.methods.' . $payment_method . '.is_online');
    }

    /**
     * @param OrderProcessor $order
     * @return Transaction
     */
    public function saveUnPaidOrder(OrderProcessor $order): Transaction
    {
        return Transaction::create([
            'payload' => $order->toArray(),
            'currency_id' => $order->currency->id,
            'user_id' => $order->user->id,
            'amount' => $order->total,
            'payment_method' => $order->payment_type,
        ]);
    }

    public function getTransactionOrder(Transaction $transaction)
    {
        $order = new OrderProcessor();
        $order->forceFill($transaction->payload);
        $order->setUser($order->user);
        $order->setAddress($order->address);
        $order->setProducts($order->products);
        $order->setCurrency($order->currency);
        return $order;
    }
}
