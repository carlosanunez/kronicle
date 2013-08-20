@extends('layouts.master')

@section('title')
@parent
| 404
@stop

@section('styles')
	.title, p {
		text-align: center;
		margin-top: 20px;
		font-family: 'Hamburger Heaven NF';
	}
	#Redirect {
		position: relative;
		left: 50%;
		margin-left: -58px;
		margin-top: 15px;
		font-family: 'Futura LT';
		padding-top: 6px;
	}
	#Redirect a {
		color: white !important;
	}
	.img-responsive {
		max-height: 300px;
	}
@stop

@section('content')

<div class="title"><span style="font-size: 150%">404</span> error:</div>
<div class="container" style="text-align: center; padding-top: 30px">
	<img class="img-responsive" src="img/404.png"/>
</div>
<br>
<p>Looks like you missed the mark by a little...</p>

<div id="Redirect" class="btn btn-success"><a href="/">Back to Home</a></div>
<div class="footer" style="border: none"></div>
@stop