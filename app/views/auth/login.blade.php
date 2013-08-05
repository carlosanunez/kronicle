@extends('layouts.master')

@section('title')
@parent
:: Login
@stop

{{-- Content --}}
@section('content')
<br><br>
<div class="title">
    Authenticate
</div>
<hr>
<br>
{{ Form::open(array('url' => 'login', 'class' => 'form-horizontal')) }}

    <!-- Name -->
    <div class="input-group control-group {{{ $errors->has('username') ? 'error' : '' }}}">
        {{ Form::label('username', 'Username', array('class' => 'control-label input-group-addon')) }}
        <div class="controls">
            {{ Form::text('username', Input::old('username'), $attributes = array('class' => 'form-control')) }}
            {{ $errors->first('username') }}
        </div>
    </div>
    <br>
    <!-- Password -->
    <div class="input-group control-group {{{ $errors->has('password') ? 'error' : '' }}}">
        {{ Form::label('password', 'Password', array('class' => 'control-label input-group-addon')) }}

        <div class="controls">
            {{ Form::password('password', $attributes = array('class' => 'form-control')) }}
            {{ $errors->first('password') }}
        </div>
    </div>
    <br>
    <!-- Login button -->
    <div class="control-group">
        <div class="controls">
            {{ Form::submit('Login', array('class' => 'btn btn-success')) }}
        </div>
    </div>

{{ Form::close() }}
@stop