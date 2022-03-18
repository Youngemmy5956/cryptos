<?php

namespace App\Services\Notifications;

use App\Jobs\AppMailerJob;

class AppMailerService
{
    /**
     * Global email helper
     *  @param $params['data']           = ['foo' => 'Hello John Doe!']; //optional
     *  @param  $params['to']*             = 'recipient@example.com'; //required
     *  @param  $params['template_type']  = 'markdown';  //default is view
     *  @param  $params['template']*       = 'emails.app-mailer'; //path to the email template
     *  @param  $params['subject']*        = 'Some Awesome Subject'; //required
     *  @param  $params['from_email']     = 'johndoe@example.com';
     *  @param  $params['from_name']      = 'John Doe';
     *  @param  $params['cc_emails']      = ['email@mail.com', 'email1@mail.com'];
     *  @param  $params['bcc_emails']      = ['email@mail.com', 'email1@mail.com'];
     */
    public static function send(array $data)
    {
        try {
            AppMailerJob::dispatch($data);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
