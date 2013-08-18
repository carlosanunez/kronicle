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

<div class="title">
@if ($message == 'deleted')
	<span style="font-size: 120%">Post Deleted!</span>
@endif
@if ($message == 'uploaded')
	<span style="font-size: 120%">Post Uploaded!</span>
@endif
@if ($message == 'updated')
	<span style="font-size: 120%">Post Updated!</span>
@endif
@if ($message == 'error')
	<span style="font-size: 120%">Wups!</span>
@endif
@if ($message == 'noResults')
	<span style="font-size: 120%">Nothing Found!</span>
@endif
</div>
<div class="container" style="text-align: center; padding-top: 10px;">
	@if ($message == 'deleted')
	<img class="img-responsive" src="img/deleted.png" style="border-bottom-right-radius: 140px; border-bottom-left-radius: 130px;"/>
	@endif
	@if ($message == 'uploaded')
	<img class="img-responsive" src="img/uploaded.png" style="border-bottom-right-radius: 140px; border-bottom-left-radius: 150px;"/>
	@endif
	@if ($message == 'updated')
	<img class="img-responsive" src="../img/update.png" style="border-bottom-right-radius: 75px; border-bottom-left-radius: 20px;"/>
	@endif
	@if ($message == 'error')
	<img class="img-responsive" src="img/error.png" style="border-bottom-right-radius: 100px; border-bottom-left-radius: 130px;"/>
	@endif
	@if ($message == 'noResults')
	<img class="img-responsive" src="img/noresults.png" style="border-bottom-right-radius: 50px; border-bottom-left-radius: 130px; border-top-right-radius: 100px"/>
	@endif
</div>
<br>
@if ($message == 'deleted')
<p>The post has been dusted from the database</p>
<div class="container" style="text-align:center;">
<a id="Redirect" class="btn btn-success" href="/">Back to Home</a>
</div>
@endif
@if ($message == 'uploaded')
<p>Sit back, relax, and enjoy your blog</p>
<div class="container" style="text-align:center;">
<a id="Redirect" class="btn btn-success" href="/posts/<?php print $post[0]['id']; ?>">Go to Post</a>
</div>
@endif
@if ($message == 'updated')
<p>The post has been refreshed with new content</p>
<div class="container" style="text-align:center;">
<a id="Redirect" class="btn btn-success" href="/posts/<?php print $post[0]['id']; ?>">Go to Post</a>
</div>
@endif
@if ($message == 'error')
<p>Sorry, there was an error</p>
<div class="container" style="text-align:center;">
<a id="Redirect" class="btn btn-success" href="/">Back to Home</a>
</div>
@endif
@if ($message == 'noResults')
<p>Sorry captain, there's no posts to be seen anywhere!</p>
<div class="container" style="text-align:center;">
<a id="Redirect" class="btn btn-success" href="/">Back to Home</a>
</div>
@endif

@stop