<?php

namespace Modules\UserModule\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SuggestionRespnseNotification extends Notification
{
    use Queueable;

    private $suggestion;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($suggestion)
    {
        $this->suggestion = $suggestion;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            'title_ar' => 'رد على رسائلك',
            'title_en' => 'Reply to your messages',
            'body_ar' => 'تم الرد على الرسالة رقم ' . $this->suggestion->generate,
            'body_en' => 'Message No ' . $this->suggestion->generate . ' has been answered',
            'url' => url('userReply/' . $this->suggestion->id)
        ];
    }
}
