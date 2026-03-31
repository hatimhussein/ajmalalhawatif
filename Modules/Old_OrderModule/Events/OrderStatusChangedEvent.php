<?php

namespace Modules\OrderModule\Events;

use Illuminate\Queue\SerializesModels;
use Modules\OrderModule\Entities\Order;

class OrderStatusChangedEvent
{
    use SerializesModels;

    public Order $order;

    /**
     * Create a new event instance.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
