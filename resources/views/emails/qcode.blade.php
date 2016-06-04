<h1>Campolindo High School Reunion - Class of 1966</h1>
<p>{{ $guest->first_name }}, we're taking a fun survey of our classmates to find out what they've been up to.</p>
<p>To take the survey, follow this unique link:</p>
<a href="{{ route('questionnaire.answer', [ $guest->qcode ]) }}">{{ route('questionnaire.answer', [ $guest->qcode ]) }}</a><br>
<p>Alternatively, you can visit this page:</p>
{{ route('questionnaire.index') }}

<p>Your Questionnaire Code is:<br>
<strong>{{ $guest->qcode }}</strong><br><br>

You can always re-visit your link to edit your answers.</p>

<p>Looking forward to reading your response!<br>
-- Campolindo Reunion Team</p>