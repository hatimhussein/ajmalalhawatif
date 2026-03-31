<?php

namespace Modules\OrderModule\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\CommonModule\Helper\LanguageHelper;
use Modules\ConfigModule\Entities\NotificationBody;
use Modules\OrderModule\Emails\OrderStatusEmployeeMail;
use Modules\OrderModule\Entities\Order;

class OrderStatusEmployeeNotification extends Notification
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
    public function via($notifiable): array
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
    public function toMail($notifiable): Mailable
    {
        $body = nl2br($this->generateBodyTest($notifiable));
        $address = $notifiable->routeNotificationFor('mail');
        return (new OrderStatusEmployeeMail($notifiable, $this->order, $body))->to($address);
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
    public function toArray($notifiable): array
    {
        return [
            //
        ];
    }


    public function generateBodyTest($notifiable)
    {
        if ($this->bodyText) return $this->bodyText;

        $replacements = [
            '{employee}' => $notifiable->name,
            '{username}' => $this->order->user->name ?? '',
            '{order_id}' => $this->order->id,
            '{status}' => $this->order->currentStatus->title,
            '{cost}' => $this->order->total,
            '{datetime}' => $this->order->created_at->format('Y-m-d h:i:s'),
            '{governorate}' => $this->order->userAddresses->getZone->name
        ];

        $rawMessage = $this->body ? LanguageHelper::productDescription($this->body) : '';
        $this->bodyText = str_replace(array_keys($replacements), array_values($replacements), $rawMessage);
        return $this->bodyText;
    }


    public function getNotificationBody()
    {
        return NotificationBody::where('key', 'employee_order_status')->first();
    }
}
