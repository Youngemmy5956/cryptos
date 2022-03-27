<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() 
    {
        return $this
            ->from($this->data['email'])
            ->subject($this->data['subject'])
            ->markdown('mail.contact-us', [
                'messageBody' => $this->data['message'],
            ]);
        // return $this->markdown("emails.general.contact");
    }
}
