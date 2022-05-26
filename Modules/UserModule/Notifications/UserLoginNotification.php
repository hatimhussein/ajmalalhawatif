<?php

namespace Modules\UserModule\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\CommonModule\Helper\LanguageHelper;
use Modules\ConfigModule\Entities\NotificationBody;
use Modules\UserModule\Emails\WelcomeRegisterMail;

class UserLoginNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var string $bodyText
     */
    public string $bodyText;

    /**
     * @var NotificationBody $body
     */
    public $body;

    /**
     * @var string $code
     */
    public string $code;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($code)
    {
        $this->body = $this->getNotificationBody();
        $this->bodyText = '';
        $this->code = $code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        $channels = [];

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
        $body = $this->generateBodyTest($notifiable);
        $address = $notifiable->routeNotificationFor('mail');
        return (new WelcomeRegisterMail($notifiable, $body, "Login Successful"))->to($address);
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

        $replacements = [
            '{username}' => $notifiable->is_merchant ? $notifiable->company_name : $notifiable->first_name,
            '{email}' => $notifiable->email,
            '{now}' => Carbon::now()->toString(),
            '{code}' => $this->code,
        ];

        $rawMessage = $this->body ? LanguageHelper::productDescription($this->body) : '';
        $this->bodyText = str_replace(array_keys($replacements), array_values($replacements), $rawMessage);
        return $this->bodyText;
    }

    public function getNotificationBody()
    {
        return NotificationBody::where('key', 'user_login')->first();
    }
}
