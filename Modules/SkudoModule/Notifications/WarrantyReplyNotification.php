<?php

namespace Modules\SkudoModule\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class WarrantyReplyNotification extends Notification
{
    use Queueable;

    private Model $warranty;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Model $warranty)
    {
        $this->warranty = $warranty;
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
            'title_ar' => __('skudomodule::warranty.notification_title', ['number' => $this->warranty->id], 'ar'),
            'title_en' => __('skudomodule::warranty.notification_title', ['number' => $this->warranty->id], 'en'),
            'body_ar' => __('skudomodule::warranty.notification_body', ['number' => $this->warranty->id], 'ar'),
            'body_en' => __('skudomodule::warranty.notification_body', ['number' => $this->warranty->id], 'en'),
            'url' => route('front.skudo.warranty.show', $this->warranty->id),
            'status' => $this->warranty->status,
            'body' => null,
        ];
    }
}
