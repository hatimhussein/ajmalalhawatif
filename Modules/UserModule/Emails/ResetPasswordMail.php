<?php

namespace Modules\UserModule\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;

    private $user;
    private $message;

    /**
     * Create a new message instance.
     *
     * @param $user
     * @param $message
     * @param string $subject
     */
    public function __construct($user, $token, $message, $subject = "Reset Password")
    {
        $this->user = $user;
        $this->message = $message;
        $this->subject = $subject;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('usermodule::front.mails.reset_password_mail')
            ->subject($this->subject)
            ->with(['user' => $this->user, 'body' => $this->message, 'token' => $this->token]);
    }
}
