@extends('layouts.master')

@section('title')
@parent
| {{$message}}
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
		max-height: 350px;
	}
	.alert span {
		font-family: 'Hamburger Heaven NF';
	}
@stop

@section('content')

<div class="title"><span style="font-size: 120%">Post Deleted!</span></div>
<div class="container" style="text-align: center; padding-top: 10px;">
	<img class="img-responsive" src="img/deleted.png" style="border-bottom-right-radius: 140px; border-bottom-left-radius: 130px;"/>
</div>
<br>
<p>The post has been dusted from the database</p>
<div id="Redirect" class="btn btn-success"><a href="/">Back to Home</a></div>
@stop