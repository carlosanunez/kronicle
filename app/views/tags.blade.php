@extends('layouts.master')

@section('title')
@parent
| {{$tag}}
@stop

@section('content')
<?php
	$count = 0;
	while ($count < count($posts)) {
		print '<div class="post">';
			print '<div class="rightered date">';
			$date = new DateTime($posts[$count]['date']);
	    	print $date->format('d/m/Y');
			print '</div>';
			print '<div>';
				print '<span class="title">';
				print $posts[$count]['title'];
				print '</span>';
			print '</div>';
			print '<div class="image">';
				print '<img src="../'.$posts[$count]['photo'].'" class="img-responsive" />';
			print '</div>';
			print '</p>';
				print $posts[$count]['content'];
			print '</p>';
			print '<ul class="tags">';
				$countTags = 0;
				while ($countTags < count($posts[$count]['tags'])) {
				print '<li class="tag">';
					print '<a href="/tags/'.$posts[$count]['tags'][$countTags][0]['tag'].'">';
						print '<span class="glyphicon glyphicon-tag"></span>';
						print '&nbsp;';
						print $posts[$count]['tags'][$countTags][0]['tag'];
					print '</a>';
				print '</li>';
				$countTags++;
				}
			print '</ul>';
		print '</div>';
		$count++;
	}

?>
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
</div>
@stop