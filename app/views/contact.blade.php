@extends('layouts.master')

@section('title')
@parent
| Contact
@stop

@section('content')
<div class="container contact">
<div class="row">
<div class="col-lg-5">
	<div class="container contact-info">
		<div class="title">email me</div>
		<div class="container email">
			<a href="mailto:dentonw3@gmail.com" class="btn btn-success">
				<span class="glyphicon glyphicon-comment"></span>
				&nbsp;&nbsp;dentonw3@gmail.com
			</a>
		</div>
	</div>
</div>
<div class="col-lg-7 border-left">
	<div class="title">ask me anything</div>
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
		<textarea  class="textarea form-control" name="message" id="textarea" cols="100" rows="10" placeholder="Your Message"></textarea>
	</div>
	<br>
	<br>
	<button class="btn btn-default">submit</button>
	<br>
	<br>
	<br>
</div>
</div>
</div>
	


@stop