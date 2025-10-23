<?php

namespace Modules\OrderModule\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\ConfigModule\Entities\NotificationBody;
use Modules\OrderModule\Emails\OrderSummary;
use Modules\OrderModule\Entities\Order;

class OrderCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var Order $order
     */
    public $order;

    /**
     * @var string $bodyText
     */
    public string $bodyText;

    /**
     * @var NotificationBody $body
     */
    public $body;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->body = $this->getNotificationBody();
        $this->order = $order;
        $this->bodyText = '';
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $channels = ['mail'];

        if ($this->body->send_sms)
            array_unshift($channels, config('sms.driver'));

        return $channels;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return Mailable
     */
    public function toMail($notifiable)
    {
        $address = $notifiable->routeNotificationFor('mail');
        return (new OrderSummary($this->order))->to($address);
    }


    /**
     * Get the sms representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toSMS($notifiable): array
    {
        $body = $this->generateBodyTest($notifiable);

        return [
            'body' => $body,
            'timeToSend' => 'now',
            'exactTime' => Carbon::now()->format('Y-M-d H:m:s'),
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }


    public function generateBodyTest($notifiable)
    {
        if ($this->bodyText) return $this->bodyText;

       $tot = $this->order->sub_total / (1 + ($this->order->tax_percentage / 100));
        $end_tot = ((((($tot - $this->order->discount) + $this->order->untaxed_shipping) * $this->order->tax_percentage) / 100) + (($tot - $this->order->discount) + $this->order->untaxed_shipping));

        $replacements = [
            '{username}' => $notifiable->is_merchant ? $notifiable->company_name : $notifiable->first_name,
            '{order_id}' => $this->order->id,
            '{total}' => $end_tot,
        ];

        $rawMessage = $this->body->desc_ar ?? '';
        $this->bodyText = str_replace(array_keys($replacements), array_values($replacements), $rawMessage);
        return $this->bodyText;
    }


    public function getNotificationBody()
    {
        return NotificationBody::where('key', 'order')->first();
    }
}
