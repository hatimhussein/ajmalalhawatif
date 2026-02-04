<?php

namespace Modules\CommonModule\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TestSmsNotification extends Notification
{
    use Queueable;

    /**
     * @var string
     */
    private $text;

    public function __construct($text)
    {
        $this->text = (string) $text;
    }

    public function via($notifiable)
    {
        return [config('sms.driver')];
    }

    /**
     * This array is consumed by Modules\CommonModule\Channels\Oursms (and any SMS channel).
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toSMS($notifiable)
    {
        return [
            'body' => $this->text,
            'timeToSend' => 'now',
        ];
    }
}


