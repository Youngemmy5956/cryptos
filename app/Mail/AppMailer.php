<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppMailer extends Mailable
{
    use Queueable, SerializesModels;

    public $params;
    public $subject;
    public $from_email;
    public $cc_emails;
    public $bcc_emails;
    public $from_name;
    public $template;
    public $template_type;
    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $params)
    {
        $this->params = $params;

        $this->data = $this->params['data'] ?? '';

        $this->subject = $this->params['subject'] ?? 'New Mail';

        $this->from_email = $this->params['from_email'] ?? env("MAIL_FROM_ADDRESS");

        $this->from_name = $this->params['from_name'] ?? env("MAIL_FROM_NAME");

        $this->cc_emails = array_unique(array_merge($this->params['cc_emails'] ?? [], []), SORT_REGULAR);

        $this->bcc_emails = array_unique(array_merge($this->params['bcc_emails'] ?? []), SORT_REGULAR);

        $this->template = $this->params['template'] ?? 'emails.app.general';

        $this->template_type = $this->params['template_type'] ?? 'markdown';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $config = $this->from($this->from_email , $this->from_name)
            ->cc($this->cc_emails)
            ->bcc($this->bcc_emails)
            ->with('data', $this->data)
            ->subject($this->subject);

        if ($this->template_type == 'view') {
            return $config->view($this->template, $this->data);
        } else {
            return $config->markdown($this->template, $this->data);
        }
    }
}
