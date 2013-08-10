@extends('layouts.master')

@section('title')
@parent
| catagory
@stop

@section('content')

<style>
	.cat-post {
		max-width: 400px;
		margin: auto;
	}
	.cat-title {
		font-size: 200%;
	}
</style>

<?php
	$count = 0;
	$index = 0;
	$rPosts = [[[[[]]]]];

	foreach ($posts as $post) {
		foreach ($post['tags'] as $tag) {
			$thing = $tag[0]['tag'];

			if($thing == strtolower($_GET['cat']))
			{
				$rPosts[$index] = $post;
				$index++;
			}
		}
	}

	while ($count < count($rPosts)) {
		print '<div class="post">';
			print '<div class="rightered date">';
			$date = new DateTime($rPosts[$count]['date']);
	    	print $date->format('d/m/Y');
			print '</div>';
			print '<div>';
				print '<span class="title">';
				print $rPosts[$count]['title'];
				print '</span>';
			print '</div>';
			print '<div class="image">';
				print '<img src="'.$rPosts[$count]['photo'].'" class="img-responsive" />';
			print '</div>';
			print '</p>';
				print $rPosts[$count]['content'];
			print '</p>';
			print '<ul class="tags">';
				$countTags = 0;
				while ($countTags < count($rPosts[$count]['tags'])) {
				print '<li class="tag">';
					print '<a href="/tags/'.$rPosts[$count]['tags'][$countTags][0]['tag'].'">';
						print '<span class="glyphicon glyphicon-tag"></span>';
						print '&nbsp;';
						print $rPosts[$count]['tags'][$countTags][0]['tag'];
					print '</a>';
				print '</li>';
				$countTags++;
				}
			print '</ul>';
		print '</div>';
		$count++;
	}

?>

<!-- <div><span class="title">Music</span></div>

<div class="cat-post">
	<div class="rightered date">01/31/1994</div>
	<div><span class="cat-title">Daft Punk</span></div>
	<div class="image"><img src="img/daftpunk.jpg" / class="img-responsive" alt="daftpunk"></div>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at lorem at justo pretium tempor id in odio. Duis viverra, ligula et porta pulvinar, neque purus pretium augue, et condimentum risus risus vitae felis. Sed tristique enim erat, vel suscipit turpis tristique at. Integer at dapibus lacus. Pellentesque bibendum sapien eget quam ultrices feugiat. In scelerisque dolor magna, eget varius ligula feugiat et. Phasellus sit amet enim risus.</p>
	<div class="user">-&nbsp;wilfmeister</div>
</div>

<div class="container centered footer">
    <ul class="pagination">
        <li><a href="#"><span class="glyphicon glyphicon-chevron-left" style="font-size: 70%"></span></a></li>
        <li><a href="#" class="active">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-chevron-right" style="font-size: 70%"></a></li>
    </ul>
</div> -->
@stop