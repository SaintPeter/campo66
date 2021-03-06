{!! Form::model($guest, [
    'method' => 'PATCH',
    'url' => ['classmates', $guest->id],
    'class' => 'form',
    'id' => 'form' . $guest->id
]) !!}

<div class="form-group">
    <div class="col-md-4 col-sm-12">
        <label for="first_name">First Name</label>
        {!! Form::text('first_name', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 col-sm-12">
        <label for="last_name">Last Name</label>
        {!! Form::text('last_name', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 col-sm-12">
        <label for="married_name">Married Name</label>
        {!! Form::text('married_name', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>


<div class="form-group">
<div class="col-md-6 col-sm-12">
    <label for="address1">Address 1</label>
    {!! Form::text('address1', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-sm-12">
    <label for="address2">Address 2</label>
    {!! Form::text('address2', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-sm-12">
    <label for="city">City</label>
    {!! Form::text('city', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-2 col-sm-6">
    <label for="state">State</label>
    {!! Form::text('state', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-4 col-sm-6">
    <label for="zip">Zip</label>
    {!! Form::text('zip', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>
<hr style="margin: 5px 5px;">
<div class="col-xs-12">&nbsp;</div>
@for($i = 1; $i < 4; $i++)
<div class="form-group margin">
    <div class="col-md-2 col-sm-3 col-xs-6">
        <label for="phone{{ $i }}">Phone {{ $i }}</label>
        {!! Form::text('phone' . $i, null, [ 'class' => 'form-control' ]) !!}
    </div>
    <div class="col-md-2 col-sm-3 col-xs-6">
        <label for="phone{{ $i }}type">Type {{ $i }}</label>
        <div class="input-group">
            {!! Form::text('phone' . $i . 'type', null, [ 'class' => 'form-control' ]) !!}
            <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a class="phonetype" href="#">Home</a></li>
                    <li><a class="phonetype" href="#">Work</a></li>
                    <li><a class="phonetype" href="#">Mobile</a></li>
                </ul>
            </div><!-- /btn-group -->
        </div>
    </div>
</div>
@endfor

<div class="form-group">
    <div class="col-md-3 col-sm-6">
    <label for="dlnum">Driver's License Number</label>
    {!! Form::text('dlnum', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="col-xs-6 hidden-sm">
&nbsp;
</div>

<div class="col-xs-12">&nbsp;</div>

<div class="form-group">
    <div class="col-sm-12 col-md-9">
        <label for="notes">Notes</label>
        {!! Form::textarea('notes', null, [ 'class' => 'form-control', 'rows' => '4' ]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-3 col-sm-6">
    <label for="email">Email 1</label>
    {!! Form::text('email', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-3 col-sm-6">
    <label for="email2">Email 2</label>
    {!! Form::text('email2', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="col-xs-12">&nbsp;</div>

<div class="form-group">
    <div class="col-sm-6 text-center">
    <label for="qcode">Questionnaire Code</label>
    {!! Form::text('qcode', null, [ 'class' => 'form-control', 'readonly' => 'readonly'  ]) !!}
    [
    @if(isset($guest->answer))
        <a href="{{ route('answers', [ $guest ]) }}#view2016" target="_blank"><i class="fa fa-eye"></i>&nbsp;View Answers</a> |
    @endif
    <a href="{{ route('questionnaire.answer', [ $guest->qcode ]) }}" target="_blank"><i class="fa fa-edit"></i>&nbsp;Create/Edit</a> ]
    </div>
</div>

<div class="col-xs-12">&nbsp;</div>

{!! Form::close() !!}

<div class="form-group">
    <div class="col-sm-12">
        <button data-id="{{ $guest->id }}" class="btn btn-warning save-button">Update</button>
        <button data-id="{{ $guest->id }}" class="btn btn-info resend-button" >{{ isset($guest->qsent) ? 'Resend' : 'Send' }} Questionnaire</button>
        {{ Form::open(['route' => ['classmates.destroy', $guest->id], "id" =>  "delete-user" . $guest->id,  'method' => 'delete', "class"=>"pull-right", "style" => "display: inline-block"]) }}
        {{ Form::button('Delete', [ "class" => "btn btn-danger delete-button pull-right"]) }}
        {{ Form::close() }}
    </div>

@include('partials.flash')

</div>


<script>
    $(".delete-button").confirm({
        title: "Delete",
        content: "Delete '{{ $guest->full_name }}'?",
        confirmButton: 'Delete',
        cancelButton: 'Cancel',
        confirmButtonClass: 'btn-danger',
        cancelButtonClass: 'btn-info',
        backgroundDismiss: true,
        confirm: function() {
            $("#delete-user" + {{ $guest->id }}).submit();
        }
    });
</script>