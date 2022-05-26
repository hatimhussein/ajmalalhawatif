<?php

namespace Modules\OrderModule\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\ConfigModule\Entities\NotificationBody;
use Modules\OrderModule\Emails\CartOfferMail;
use Modules\OrderModule\Entities\Cart;

class CartOfferNotification extends Notification
{
    use Queueable;


    /**
     * @var  Cart $cart
     */
    public $cart;

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
     * @param $cart
     * @return void
     */
    public function __construct($cart)
    {
        $this->bodyText = '';
        $this->body = $this->getNotificationBody();
        $this->cart = $cart;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $channels = ['database', 'mail'];

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
        return (new CartOfferMail($this->cart, nl2br($this->generateBodyTest($notifiable))))->to($address);
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
            'timeToSend' => Carbon::parse($this->cart->offer_send_time)->isFuture() ? 'later' : 'now',
            'exactTime' => Carbon::parse($this->cart->offer_send_time)->format('Y-M-d H:m:s'),
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
            'title_ar' => 'تخفيض على سلة المشتريات',
            'title_en' => 'Cart Items Offer',
            'body_ar' => 'تم اضافة تخفيض جديد لسلة مشترياتك حتى ' . $this->cart->offer_end_time,
            'body_en' => 'You have received a new cart offer. until' . $this->cart->offer_end_time,
            'url' => url('cart'),
            'offer_send_time' => $this->cart->offer_send_time,
            'offer_end_time' => $this->cart->offer_end_time,
            'offer_price' => $this->cart->offer_price,
            'body' => $this->generateBodyTest($notifiable),
        ];
    }


    public function generateBodyTest($notifiable)
    {
        if ($this->bodyText) return $this->bodyText;

        $replacements = [
            '{username}' => $notifiable->is_merchant ? $notifiable->company_name : $notifiable->first_name,
            '{time_from}' => Carbon::parse($this->cart->offer_send_time)->format('Y-M-d H:m a'),
            '{time_to}' => Carbon::parse($this->cart->offer_end_time)->format('Y-M-d H:m a'),
        ];

        $rawMessage = $this->body->desc_ar ?? '';
        $this->bodyText = str_replace(array_keys($replacements), array_values($replacements), $rawMessage);
        return $this->bodyText;
    }

    public function getNotificationBody()
    {
        return NotificationBody::where('key', 'cart_offer')->first();
    }
}
