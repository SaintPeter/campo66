<h1>Campolindo High School Reunion - Class of 1966</h1>
<p>{{ $guest->first_name }}, we are seeking information on our classmates to find out what each other has been up to.  These Questionnaires will be posted on the website.  Please fill out some or all of the questions as you would like.  Note that you can choose to have your contact information public or private.</p>
<p>To fill out the Questionnaire, follow this unique link:<br>
    <a href="{{ route('questionnaire.answer', [ $guest->qcode ]) }}">{{ route('questionnaire.answer', [ $guest->qcode ]) }}</a>
</p>

<p><strong>Please submit by September 16<sup>th</sup>, 2016</strong></p>

<p>Looking forward to reading your response!<br>
Campolindo Reunion Committee<br>
Bill, Bruce, Don, Gwen, Judi, Sandy, Valerie</p>