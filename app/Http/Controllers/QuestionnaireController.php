<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Answer;
use App\Guest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Mail;

class QuestionnaireController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('questionnaire.index');
    }

    /**
     * Allow someone to answer a questionnaire
     *
     * @param Request $request
     * @param string $qcode
     * @return Response
     */
    public function answer(Request $request, $qcode = null)
    {
        //DB::connection()->enableQueryLog();
        $qcode = $request->input('qcode', $qcode);

        if(!isset($qcode)) {
            return redirect('questionnaire')->with('error', 'Questionnaire code not set');
        }

        $guest = Guest::findByQcode($qcode);

        if(!isset($guest)) {
            return redirect('questionnaire')->with('error', 'Cannot find that questionnaire code');
        }

        // Pre-load answers
        if(isset($guest->answer)) {
            $answers = $guest->answer;
        } elseif($request->has('address1')) {
            $answers = new Answer;
            $answers->fill($request->all());
        } else {
            $answers = new Answer;
            $answers->fill($guest->toArray());
        }
//dd(DB::getQueryLog());
        return view('questionnaire.answer', compact('guest', 'answers', 'qcode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if(!isset($request->qcode)) {
            return redirect('questionnaire')->with('error', 'Questionnaire code not set');
        }

        $guest = Guest::findByQcode($request->qcode);

        if(!isset($guest)) {
            return redirect('questionnaire')->with('error', 'Cannot find that questionnaire code');
        }

        // Check for changes to the guest
        $delta = $this->delta_check($guest, $request);

        $answer = Answer::create($request->all() + [ 'guest_id' => $guest->id,  'delta' => $delta ]);

        Session::flash('message', 'Answer added for ' . $guest->full_name . '!');

        return redirect()->route('answers', ['guest' => $guest, '#view2016']);
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
        $answer = Answer::findOrFail($id);

        return view('questionnaire.show', compact('answer'));
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

        if(!isset($request->qcode)) {
            return redirect('questionnaire')->with('error', 'Questionnaire code not set');
        }

        $guest = Guest::findByQcode($request->qcode);

        if(!isset($guest)) {
            return redirect('questionnaire')->with('error', 'Cannot find that questionnaire code');
        }

        // Check for changes to the guest
        $delta = $this->delta_check($guest, $request);

        $answer = Answer::findOrFail($id);
        $answer->update($request->all() + ['delta' => $delta]);

        Session::flash('message', 'Questionnaire updated!');

        return redirect()->route('answers', ['guest' => $guest, '#view2016']);
    }
     /**
     * Check if there are changes to the guest record
     *
     * @param  Guest $guest
     * @param  Request $request
     *
     * @return Response
     */
    public function delta_check($guest, $request)
    {
        $fields = [ 'married_name', 'spouse_name',
                    'address1', 'address2', 'city', 'state', 'zip',
                    'phone1', 'phone1type', 'phone2', 'phone2type', 'phone3', 'phone3type',
                    'email', 'email2' ];

        foreach($fields as $field) {
            if($guest->$field != $request->$field) {
                return true;
            }
        }
        return false;
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
        Answer::destroy($id);

        Session::flash('flash_message', 'Answer deleted!');

        return redirect('answers');
    }

    /**
     * Resend the qcode e-mail.
     *
     * @return Response
     */
    public function resend(Request $request)
    {
        $email = trim($request->email);

        if(strlen($email) < 3) {
            return redirect('questionnaire')->with('error', "Invalid e-mail address");
        }

        $guest = Guest::where('email', 'like', $email)->orWhere('email2','like', $email)->first();

        if(!isset($guest)) {
            return redirect('questionnaire')->with('error', "Cannot find a classmate with an e-mail \"$email\"");
        }

        if(!$this->send_qcode($guest, $email)) {
            return redirect('questionnaire')->with('error', 'An error occured while sending your message.');
        }

        return redirect('questionnaire')->with('message', 'Questionnaire Code Sent');
    }

    public static function send_qcode($guest, $email) {
        try {
            $sent = Mail::send([ 'emails.qcode', 'emails.qcode_text'] , [ 'guest' => $guest, 'email' => $email ], function($message) use ($email, $guest) {
                $message->from('campolindo66@gmail.com', 'Campolindo Reunion Website');
                $message->to($email, $guest->full_name);
                $message->subject('Have you submitted your Campo Questionnaire?');
                $message->sender('campolin@campolindoreunion1966.com');
                return $message;
            });
        }
        catch (\Exception $e)
        {
            dd('User: '. $guest->full_name . ' e-mail: ' . $email, $e->getMessage());
        }

        if( !$sent) {
            return false;
        }

        $guest->update( [ 'qsent' => Carbon::now() ] );

        return true;
    }
}
