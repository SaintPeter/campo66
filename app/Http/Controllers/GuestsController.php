<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\QuestionnaireController;

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
        $guests = Guest::with('answer')->orderBy('last_name')->get();

        return view('classmates.index', compact('guests'));
    }

    /**
     * Display Questionnaire status and controls.
     *
     * @return Response
     */
    public function questionnaire()
    {
        $guests_sent = Guest::with('answer')->whereNotNull('qsent')->orderBy('last_name')->get();
        $guests_unsent = Guest::with('answer')
                              ->whereNull('qsent')
                              ->where(function($q) {
                                  $q->where('email', '<>', '')->orWhere('email2', '<>', '');
                              })
                              ->orderBy('last_name')->get();

        return view('classmates.questionnaire', compact('guests_sent', 'guests_unsent'));
    }

    /**
     * Send all of the unsent questionnaires
     *
     * @return Redirect to questionnaire
     */
    public function questionnaires_send()
    {
        $guests = Guest::with('answer')
                      ->whereNull('qsent')
                      ->where(function($q) {
                          $q->where('email', '<>', '')->orWhere('email2', '<>', '');
                      })->get();

        $good_count = 0;
        $bad_count = 0;
        $errors = [];

        foreach($guests as $guest) {
            if(!empty($guest->email)) {
                if(filter_var($guest->email, FILTER_VALIDATE_EMAIL)) {
                    if(QuestionnaireController::send_qcode($guest, $guest->email)) {
                        $good_count++;
                    } else {
                        $bad_count++;
                    }
                } else {
                    $errors[] = "Classmate {$guest->full_name} has an invalid e-mail address.";
                    $bad_count++;
                }
            }
            if(!empty($guest->email2)) {
                if(filter_var($guest->email2, FILTER_VALIDATE_EMAIL)) {
                    if(QuestionnaireController::send_qcode($guest, $guest->email2)) {
                        $good_count++;
                    } else {
                        $bad_count++;
                    }
                } else {
                    $errors[] = "Classmate {$guest->full_name} has an invalid e-mail address.";
                    $bad_count++;
                }
            }
        }

        return redirect()->route('classmates.questionnaire')
            ->with([ 'message' => "Questionnaires Sent - $good_count good, $bad_count bad.",
                'error' => join(', ', $errors)
            ]);
    }

    /**
     * Resend single questionnaire
     *
     * @return Response
     */
    public function questionnaire_resend($guest_id)
    {
        $guest = Guest::find($guest_id);

        if(isset($guest)) {
            if(!empty($guest->email)) {
                if(filter_var($guest->email, FILTER_VALIDATE_EMAIL)) {
                    if(QuestionnaireController::send_qcode($guest, $guest->email)) {
                        return redirect()->route('classmates.questionnaire')
                                         ->with('message', "Code Resent");
                    }
                } else {
                    return redirect()->route('classmates.questionnaire')
                                     ->with('error', "{$guest->full_name} has an invalid e-mail address.");
                }
            }
        }

        return redirect()->route('classmates.questionnaire')
                         ->with('error', "Unable to resend questionnaire");
    }

     /**
     * Resend single questionnaire for Ajax
     *
     * @return Response
     */
    public function questionnaire_resend_async($guest_id)
    {
        $guest = Guest::find($guest_id);

        if(isset($guest)) {
            if(!empty($guest->email)) {
                if(filter_var($guest->email, FILTER_VALIDATE_EMAIL)) {
                    if(QuestionnaireController::send_qcode($guest, $guest->email)) {
                        Session::flash('message', "Code Resent");
                        return view('partials.flash');
                    }
                } else {
                    Session::flash('error', "{$guest->full_name} has an invalid e-mail address.");
                    return view('partials.flash');
                }
            }
        }

        Session::flash('error', "Unable to resend questionnaire");
        return view('partials.flash');
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
    $guest = Guest::with('answer')->findOrFail($id);

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

        $jsonData = json_encode($guests->reduce(function($arr, $guest) {
            $arr[] = [
                'first_name'   => $guest->first_name,
                'last_name'    => $guest->last_name,
                'married_name' => $guest->married_name,
                'status'       => $guest->status,
                'found16'      => $guest->found16
            ];
            return $arr;
        }, []));

        return view('classmates.status', compact('jsonData', 'print'));
    }

    /**
     * Generate all of the q-codes for all users
     *
     * @param none
     *
     * @return response
     */
    public function generate_qcodes()
    {
        $guests = Guest::all();

        $count = 0;
        foreach($guests as $guest) {
            $guest->qcode = $guest->generate_qcode();
            $guest->save();
            $count++;
        }

        return redirect('classmates')->with('message', "$count Guests Updated");
    }
}
