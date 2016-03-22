<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Guest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class GuestsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $guests = Guest::orderBy('last_name')->get();

        return view('classmates.index', compact('guests'));
    }

    /**
     * Display all of the e-mail addresses.
     *
     * @return Response
     */
    public function emails()
    {
        // Update e-mail dates
        Guest::where('email', '<>', '')->whereNull('email_date')->update( [ 'email_date' => Carbon::now() ] );

        // List non-blank e-mail dates
        $guests = Guest::whereNotNull('email_date')->orderBy('email_date', 'desc')->get();

        // Generate a 2d list
        $mail_list = $guests->reduce( function($acc, $item) {
            $acc[$item->email_date->format('l, F jS, Y')][] = $item->full_name . ' &lt;' . $item->email  . '&gt;;';
            return $acc;
        }, [] );

        return view('classmates.emails', compact('mail_list'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('classmates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        Guest::create($request->all());

        Session::flash('flash_message', 'Guest added!');

        return redirect('classmates');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $guest = Guest::findOrFail($id);

        return view('classmates.show', compact('guest'));
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    *
    * @return Response
    */
    public function detail($id)
    {
    $guest = Guest::findOrFail($id);

    return view('classmates.partial.detail', compact('guest'));
    }

    /**
    * Update User Status
    *
    * @param  int  $id
    * @param  string $status
    *
    * @return Response
    */
    public function setstatus($id, $status)
    {
        $guest = Guest::findOrFail($id);
        $guest->status = $status;
        $guest->save();

        return "true";
    }

    /**
    * Toggle found16 status
    *
    * @param  int  $id
    *
    * @return true or 404
    */
    public function toggle16($id)
    {
        $guest = Guest::findOrFail($id);
        $guest->found16 = !$guest->found16;
        $guest->save();

        return $guest->found16 ? 'true' : 'false';
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $guest = Guest::findOrFail($id);

        return view('classmates.edit', compact('guest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {

        $guest = Guest::findOrFail($id);
        $guest->update($request->all());

        Session::flash('message', 'Guest Saved!');

        return view('classmates.partial.detail', compact('guest'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        Guest::destroy($id);

        Session::flash('flash_message', 'Guest deleted!');

        return redirect('classmates');
    }

    /**
     * Display list of guests
     *
     * @param  int  $print
     *
     * @return Response
     */
    public function status($print = '') {
        $guests = Guest::orderBy('last_name')->get();

        return view('classmates.status', compact('guests', 'print'));
    }
}
