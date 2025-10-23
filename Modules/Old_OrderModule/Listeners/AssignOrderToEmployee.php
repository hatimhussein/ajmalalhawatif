<?php

namespace Modules\OrderModule\Listeners;

use Modules\OrderModule\Events\OrderStatusChangedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\OrderModule\Repository\OrderAdminRepository;

class AssignOrderToEmployee
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(OrderAdminRepository $orderAdminRepository)
    {
        $this->orderAdminRepository = $orderAdminRepository;
    }

    /**
     * Handle the event.
     *
     * @param OrderStatusChangedEvent $event
     * @return void
     */
    public function handle(OrderStatusChangedEvent $event)
    {
        $order = $event->order;
        if ($order->current_status_id == 2) {
            $this->orderAdminRepository->sendNotificationToOrderEmployees($order);
        }
    }
}
