<?php

namespace Modules\WarrantyModule\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\CommonModule\Helper\LanguageHelper;
use Modules\ConfigModule\Entities\NotificationBody;
use Modules\WarrantyModule\Emails\InsuranceReplyMail;

class InsuranceRepliedNotification extends Notification
{
    use Queueable;

    private $insurance;
    private $body;
    private string $bodyText = '';

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($insurance)
    {
        $this->insurance = $insurance;
        $this->body = $this->getNotificationBody();
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
        if ($notifiable->routeNotificationFor('mail')) {
            $channels[] = 'mail';
        }

        if ($notifiable->phone && $this->body->send_sms)
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
        $body = $this->generateBodyTest($notifiable);
        $address = $notifiable->routeNotificationFor('mail');
        return (new InsuranceReplyMail($notifiable, $body))->to($address);
    }


    /**
     * Get the sms representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toSMS($notifiable): array
    {
        $insurance_config = app('site_data')->where('key', 'insurance')->first();
        $body = $this->generateBodyTest($notifiable) . '   ' . LanguageHelper::configTranslate($insurance_config) . ': ' . url('config/' . $insurance_config->id);

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
            '{username}' => $notifiable->name,
            '{email}' => $notifiable->email,
            '{qr_code}' => $this->insurance->id
        ];

        $rawMessage = $this->body ? LanguageHelper::productDescription($this->body) : '';
        $this->bodyText = str_replace(array_keys($replacements), array_values($replacements), $rawMessage);
        return $this->bodyText;
    }

    public function getNotificationBody()
    {
        return NotificationBody::where('key', 'insurance')->first();
    }
}
