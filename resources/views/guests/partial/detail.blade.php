{!! Form::model($guest, [
    'method' => 'PATCH',
    'url' => ['guests', $guest->id],
    'class' => 'form',
    'id' => 'form' . $guest->id
]) !!}

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
    <div class="col-sm-12">
<button type="submit" data-id="{{ $guest->id }}"class="btn btn-warning save-button">Update</button>

        <a href="{{ url('guests/' . $guest->id ) }}">
            <button type="submit" class="btn btn-info">Full Detail</button>
        </a>
    </div>

@include('partials.flash')

</div>

{!! Form::close() !!}