@extends('layouts.master')

@section('title')
@parent
| Create
@stop

@section('content')

<style>
	.marg {
		margin-top: 100px;
	}
</style>
<div class="marg">
	
	{{$title}}
	{{$file}}
	{{$message}}
	{{$tags}}

</div>

@stop