<?php

namespace Modules\WarrantyModule\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InsuranceReplyNotification extends Notification
{
    use Queueable;

    private Model $insurance;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Model $insurance)
    {

        $this->insurance = $insurance;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable): array
    {

        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {

        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', 'https://laravel.com')
            ->line('Thank you for using our application!');
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
            'title_ar' => __('warrantymodule::insurance.notification_title', ['number' => $this->insurance->id], 'ar'),
            'title_en' => __('warrantymodule::insurance.notification_title', ['number' => $this->insurance->id], 'en'),
            'body_ar' => __('warrantymodule::insurance.notification_body', ['number' => $this->insurance->id], 'ar'),
            'body_en' => __('warrantymodule::insurance.notification_body', ['number' => $this->insurance->id], 'en'),
            'url' => route('front.insurance.show', $this->insurance->id),
            'status' => $this->insurance->status,
            'body' => null,
        ];
    }
}
