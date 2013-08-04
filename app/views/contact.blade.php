@extends('layouts.master')

@section('title')
@parent
| Contact
@stop

@section('content')
<div class="container contact">
	<div class="title">contact</div>
	<div class="input-group">
		<span class="input-group-addon">Name</span>
		<input type="text" class="form-control" placeholder="John Doe">
	</div>
	<br>
	<div class="input-group">
		<span class="input-group-addon">Email</span>
		<input type="text" class="form-control" placeholder="jdoe@gmail.com">
	</div>
	<br>
	<div class="input-group">
		<textarea  class="textarea" name="message" id="textarea" cols="100" rows="10"></textarea>
	</div>
	<br>
	<br>
	<button class="btn btn-default">submit</button>
	<br>
	<br>
	<br>
</div>
	


@stop