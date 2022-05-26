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
use Modules\UserModule\Emails\ResetPasswordMail;

class ForgotPasswordNotification extends Notification
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

    private string $channel;
    private string $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $channel)
    {
        $this->body = $this->getNotificationBody();
        $this->bodyText = '';
        $this->channel = $channel;
        $this->token = $token;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [$this->channel == 'sms' ? config('sms.driver') : 'mail'];
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
        return (new ResetPasswordMail($notifiable, $this->token, $body))->to($address);
    }


    /**
     * Get the sms representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toSMS($notifiable): array
    {
        $body = $this->generateBodyTest($notifiable) . ' ' . url('reset-password', $this->token);

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

        ];
    }


    public function generateBodyTest($notifiable)
    {
        if ($this->bodyText) return $this->bodyText;

        $replacements = [
            '{username}' => $notifiable->is_merchant ? $notifiable->company_name : $notifiable->first_name,
            '{email}' => $notifiable->email,
        ];

        $rawMessage = $this->body ? LanguageHelper::productDescription($this->body) : '';
        $this->bodyText = str_replace(array_keys($replacements), array_values($replacements), $rawMessage);
        return $this->bodyText;
    }

    public function getNotificationBody()
    {
        return NotificationBody::where('key', 'forgot_password')->first();
    }
}
