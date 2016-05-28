<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\Guest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DisplayController extends Controller
{
    public function classlist() {
        $guests = Guest::orderBy('last_name')->get();

        return view('classlist', compact('guests'));
    }

    public function email(Request $request) {
        // campolindo66@gmail.com
        try {
            $sent = Mail::send('emails.contact', $request->all(), function($message) {
                $message->from('campolindo66@gmail.com', 'Campolindo Reunion Website');
                $message->to('campolindo66@gmail.com', 'Reunion Coordinators');
                $message->subject('Contact Form E-mail');
                $message->sender('campolin@campolindoreunion1966.com');
                return $message;
            });
        }
        catch (\Exception $e)
        {
            dd($e->getMessage());
        }

        if( !$sent) {
            return redirect('contact')->with('error', 'An error occured while sending your message.');
        }

        return redirect('contact')->with('message', 'E-mail Sent!  Thank you!');
    }

    public function answers(Guest $guest) {
        return view('answers', compact('guest'));
    }
}
