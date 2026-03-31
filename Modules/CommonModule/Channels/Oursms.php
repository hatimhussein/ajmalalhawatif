<?php

namespace Modules\CommonModule\Channels;

use GuzzleHttp\Client;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class Oursms
{
    /**
     * Send the given notification via Oursms.
     *
     * @param mixed $notifiable
     * @param Notification $notification
     * @return void
     *
     * @throws \Throwable
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSMS($notifiable);

        $dests = $notifiable->routeNotificationFor('sms', $notification);
        if (!$dests) {
            return;
        }

        $this->sendSMS($dests, $message, $notification);
    }

    /**
     * @param mixed $dests
     * @param array $message
     * @param Notification $notification
     * @return \Psr\Http\Message\ResponseInterface
     *
     * @throws \Throwable
     */
    private function sendSMS($dests, array $message, Notification $notification)
    {
        $client = new Client([
            'timeout' => 20,
            'connect_timeout' => 10,
        ]);

        // Oursms accepts up to 500 comma-separated numbers in `dests`
        if (is_array($dests)) {
            $dests = implode(',', array_filter($dests));
        }

        $formParams = [
            'username' => (string) config('sms.username'),
            'token' => (string) config('sms.api_key'),
            'src' => (string) (config('sms.sender.name') ?: config('sms.sender.phone')),
            'dests' => (string) $dests,
            // Arabic/Unicode is fine: Oursms auto-detects encoding; we send UTF-8.
            'body' => (string) ($message['body'] ?? ''),
        ];

        // Optional params supported by Oursms (if the Notification provides them)
        foreach (['priority', 'delay', 'validity', 'dlr', 'prevDups', 'msgClass'] as $key) {
            if (array_key_exists($key, $message) && $message[$key] !== null && $message[$key] !== '') {
                $formParams[$key] = $message[$key];
            }
        }

        try {
            $response = $client->post((string) config('sms.url'), [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
                ],
                'form_params' => $formParams,
            ]);

            return $response;
        } catch (\Throwable $e) {
            Log::channel(config('sms.log_channel') ?: null)->error('Oursms SMS send failed', [
                'exception' => $e->getMessage(),
                'url' => config('sms.url'),
                'dests' => $dests,
                'notification' => get_class($notification),
            ]);
            throw $e;
        }
    }
}


