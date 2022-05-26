<?php

namespace Modules\ConfigModule\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $message;
    private $attachment;

    /**
     * Create a new message instance.
     *
     * @param $subject
     * @param $message
     * @param $attachment
     */
    public function __construct($subject, $message, $attachment)
    {
        $this->subject = $subject;
        $this->message = $message;
        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): NewsletterMail
    {
        $subject = $this->subject;
        $body = $this->message;
        $view = $this->view('configmodule::admin.newsletter.newsletter_mail', compact('subject', 'body'));
        if ($this->attachment)
            return $view->attach(public_path('files/attachment/' . $this->attachment), [
                'as' => $this->attachment
            ]);
        else
            return $view;
    }
}
