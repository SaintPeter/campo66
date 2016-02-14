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
        Mail::send('emails.contact', $request->all(), function($message) {
           $message->to('rex@schraders.org', 'Rex Schrader')->subject('Contact Form E-mail');
        });

        return redirect('contact')->with('message', 'E-mail Sent!  Thank you!');

    }

    public function answers($id) {

        $guest = Guest::findOrFail($id);

        return view('answers', compact('guest'));
    }

}
