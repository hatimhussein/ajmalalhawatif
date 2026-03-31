<?php

namespace Modules\OrderModule\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\OrderModule\Entities\Cart;

class CartOfferMail extends Mailable
{
    use Queueable, SerializesModels;

    private $cart;
    private $message;

    /**
     * Create a new message instance.
     *
     * @param $cart
     * @param string|null $message
     * @return void
     */
    public function __construct($cart, $message = null)
    {
        $this->cart = $cart;
//        TODO:: if (no message generate new)
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('ordermodule::front.CartOfferMail')->with(['user' => $this->cart->user, 'body' => $this->message]);
    }
}
