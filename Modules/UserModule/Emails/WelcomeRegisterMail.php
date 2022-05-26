<?php

namespace Modules\UserModule\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeRegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $message;

    /**
     * Create a new message instance.
     *
     * @param $user
     * @param $message
     * @param string $subject
     */
    public function __construct($user, $message, $subject = "Registerd Successfully")
    {
        $this->user = $user;
        $this->message = $message;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('usermodule::front.mails.WelcomeRegisterMail')
            ->subject($this->subject)
            ->with(['user' => $this->user, 'body' => $this->message]);
    }
}
