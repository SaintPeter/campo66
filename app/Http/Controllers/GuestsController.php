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
        $guests = Guest::orderBy('last_name')->paginate(15);

        return view('guests.index', compact('guests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('guests.create');
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

        return redirect('guests');
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

        return view('guests.show', compact('guest'));
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

    return view('guests.partial.detail', compact('guest'));
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

        return view('guests.edit', compact('guest'));
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

        return view('guests.partial.detail', compact('guest'));
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

        return redirect('guests');
    }

}
