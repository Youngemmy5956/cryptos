<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Services\Notifications\AppMailerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function contact()
    {
        return view("web.contact.index");
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);
        //  Store data in database
        ContactUs::create($request->all());
        //  Send mail to admin
        AppMailerService::send([
            "data" => [
                "email" => $request->get("email"),
                'subject' => $request->get('subject'),
                'user_query' => $request->get('message'),
            ],
            "to" => "sudo@cryptoinvest.com",
            "template" => "emails.general.contact_us",
            "subject" => $request->get("subject")
        ]);
        // Mail::send('emails.contact', array(
        //     'email' => $request->get('email'),
        //     'subject' => $request->get('subject'),
        //     'user_query' => $request->get('message'),
        // ), function ($message) use ($request) {
        //     $message->from($request->email);
        //     $message->to('sudo@cryptoinvest.com', 'Admin')->subject($request->get('subject'));
        // });
        return back()->with('success_message', 'We have received your message and would like to thank you for writing to us.');
    }
}
