<?php


namespace Modules\OrderModule\Interfaces;


use Modules\OrderModule\Entities\Transaction;
use Modules\OrderModule\Processor\OrderProcessor;
use Symfony\Component\HttpFoundation\Request;

interface PaymentProvider
{
    public function getOrderPaymentUrl(Transaction $transaction, OrderProcessor $checkoutOrder);

    public function getPaymentResponse(Request $request, Transaction $transaction);

    public function validateSignature($data, $event_type, $MyFatoorah_Signature): bool;
}
