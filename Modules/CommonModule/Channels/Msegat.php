<?php


namespace Modules\CommonModule\Channels;


use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Notifications\Notification;

class Msegat
{
    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param Notification $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSMS($notifiable);


        if (!$notifiable->routeNotificationFor('sms', $notification)) {
            return;
        }

        $this->sendSMS($notifiable, $message, $notification);
    }

    private function sendSMS($notifiable, $message, $notification)
    {
        $client = new Client();
        $smsData = [
            'userName' => config('sms.username'),
            'apiKey' => config('sms.api_key'),
            'userSender' => config('sms.sender.name'),
            'numbers' => $notifiable->routeNotificationFor('sms', $notification),
            'msg' => $message['body'],
            'timeToSend' => $message['timeToSend'] ?? 'now',
            'msgEncoding' => 'UTF8',
        ];
        if ($smsData['timeToSend'] != 'now') $smsData['exactTime'] = $message['exactTime'] ?? Carbon::now()->format('Y-M-d H:m:s');
        return $client->post(config('sms.url'), [
            'json' => $smsData
        ]);
    }
}
