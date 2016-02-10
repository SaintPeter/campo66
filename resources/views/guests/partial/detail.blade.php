{!! Form::model($guest, [
    'method' => 'PATCH',
    'url' => ['guests', $guest->id],
    'class' => 'form-inline'
]) !!}

<div class="form-group">
    <label for="address1">Address 1:</label>
    {!! Form::text('address1', null, [ 'class' => 'form-control' ]) !!}
</div>
<div class="form-group">
    <label for="address2">Address 2:</label>
    {!! Form::text('address2', null, [ 'class' => 'form-control' ]) !!}
</div>
<div class="form-group">
    <label for="city">City:</label>
    {!! Form::text('city', null, [ 'class' => 'form-control' ]) !!}
</div>
<div class="form-group">
    <label for="state">State:</label>
    {!! Form::text('state', null, [ 'class' => 'form-control' ]) !!}
</div>
<div class="form-group">
    <label for="zip">Zip:</label>
    {!! Form::text('zip', null, [ 'class' => 'form-control' ]) !!}
</div>




{!! Form::close() !!}