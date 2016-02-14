<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Guest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DisplayController extends Controller
{
    public function classlist() {
        $guests = Guest::orderBy('last_name')->get();

        return view('classlist', compact('guests'));
    }

    public function email() {
        // campolindo66@gmail.com

    }

    public function answers($id) {

        $guest = Guest::findOrFail($id);

        return view('answers', compact('guest'));
    }

}
