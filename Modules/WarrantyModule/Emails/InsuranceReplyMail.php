<?php

namespace Modules\WarrantyModule\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\UserModule\Entities\User;

class InsuranceReplyMail extends Mailable
{
    use Queueable, SerializesModels;


    private User $user;
    private string $message;

    /**
     * Create a new message instance.
     *
     * @param $user
     * @param $message
     * @param string $subject
     */
    public function __construct($user, $message, string $subject = "Insurance Accepted")
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
    public function build(): InsuranceReplyMail
    {
        $insurance_config = app('site_data')->where('key', 'insurance')->first();

        return $this->view('warrantymodule::emails.InsuranceReplyMail')
            ->subject($this->subject)
            ->with(['user' => $this->user, 'body' => $this->message, 'insurance_config' => $insurance_config]);
    }
}
