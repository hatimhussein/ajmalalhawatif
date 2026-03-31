<?php

namespace Modules\OrderModule\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderStatusEmployeeMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $order;
    private $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $order, $message)
    {
        $this->user = $user;
        $this->order = $order;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('ordermodule::admin.OrderStatusEmployeeMail')
            ->with(['user' => $this->user, 'body' => $this->message, 'url' => url('admin/order/' . $this->order->id)]);
    }
}
