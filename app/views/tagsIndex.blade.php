@extends('layouts.master')

@section('title')
@parent
| Tags
@stop

@section('content')
<div class="container" style="padding-top: 25px">
	<div class="title">Tags</div>
	<div class="panel">
		<div class="panel-headiing">Search for tags with your browsers search function. On OSX it's <span class="emphasize">⌘ + f</span>, and a Windows it's <span class="emphasize">Ctrl + f</span></div>
		<ul class="list-group tagsIndex">
			<?php
				foreach ($tags as $tag) {
					print '<li class="list-group-item">';
					print '<span class="glyphicon glyphicon-tag"></span>';
					print '<span class="badge">'.$tag['count'].'</span>';
					print '<a href="/tags/'.$tag['tagID'].'">&nbsp;';
					print $tag['tag'];
					print '</a>';
					print '</li>';
				}
			?>
		</ul>
	</div>
</div>
@stop