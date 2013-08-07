@extends('layouts.master')

@section('title')
@parent
| Home
@stop

@section('content')
<div class="post">
	<div class="rightered date">08/07/2013</div>
	<div><span class="title">Scarlett Johansson</span></div>
	<div class="image"><img src="img/Scarlett-Johansson.jpg" / class="img-responsive" alt="daftpunk"></div>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at lorem at justo pretium tempor id in odio. Duis viverra, ligula et porta pulvinar, neque purus pretium augue, et condimentum risus risus vitae felis. Sed tristique enim erat, vel suscipit turpis tristique at. Integer at dapibus lacus. Pellentesque bibendum sapien eget quam ultrices feugiat. In scelerisque dolor magna, eget varius ligula feugiat et. Phasellus sit amet enim risus.</p>
	<ul class="tags">
		<li class="tag"><a href="/categories/movies"><span class="glyphicon glyphicon-tag"></span>&nbsp;movies</a></li>
		<li class="tag"><a href="/categories/hot-girls"><span class="glyphicon glyphicon-tag"></span>&nbsp;hot girls</a></li>
	</ul>
</div>
<div class="post">
	<div class="rightered date">03/13/2012</div>
	<div><span class="title">Dota 2</span></div>
	<div class="image"><img src="img/dota2.jpg" / class="img-responsive" alt="dota2"></div>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at lorem at justo pretium tempor id in odio. Duis viverra, ligula et porta pulvinar, neque purus pretium augue, et condimentum risus risus vitae felis. Sed tristique enim erat, vel suscipit turpis tristique at. Integer at dapibus lacus. Pellentesque bibendum sapien eget quam ultrices feugiat. In scelerisque dolor magna, eget varius ligula feugiat et. Phasellus sit amet enim risus.</p>
	<ul class="tags">
		<li class="tag"><a href="/categories/video-games"><span class="glyphicon glyphicon-tag"></span>&nbsp;video games</a></li>
	</ul>
</div>
<div class="post">
	<div class="rightered date">01/31/1994</div>
	<div><span class="title">Daft Punk</span></div>
	<div class="image"><img src="img/daftpunk.jpg" / class="img-responsive" alt="daftpunk"></div>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at lorem at justo pretium tempor id in odio. Duis viverra, ligula et porta pulvinar, neque purus pretium augue, et condimentum risus risus vitae felis. Sed tristique enim erat, vel suscipit turpis tristique at. Integer at dapibus lacus. Pellentesque bibendum sapien eget quam ultrices feugiat. In scelerisque dolor magna, eget varius ligula feugiat et. Phasellus sit amet enim risus.</p>
	<ul class="tags">
		<li class="tag"><a href="/categories/music"><span class="glyphicon glyphicon-tag"></span>&nbsp;music</a></li>
	</ul>
</div>
<div class="post">
	<div class="rightered date">05/23/2003</div>
	<div><span class="title">Moonrise Kingdom</span></div>
	<div class="image"><img src="img/moonrise-kingdom.jpg" / class="img-responsive" alt="moonrise kingdom"></div>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at lorem at justo pretium tempor id in odio. Duis viverra, ligula et porta pulvinar, neque purus pretium augue, et condimentum risus risus vitae felis. Sed tristique enim erat, vel suscipit turpis tristique at. Integer at dapibus lacus. Pellentesque bibendum sapien eget quam ultrices feugiat. In scelerisque dolor magna, eget varius ligula feugiat et. Phasellus sit amet enim risus.</p>
	<ul class="tags">
		<li class="tag"><a href="/categories/movies"><span class="glyphicon glyphicon-tag"></span>&nbsp;movies</a></li>
	</ul>
</div>
<div class="post">
	<div class="rightered date">05/29/2013</div>
	<div><span class="title">Bibio</span></div>
	<div class="image"><img src="img/bibio.jpg" / class="img-responsive" alt="bibio"></div>
	<p>Proin vehicula neque vel lacus imperdiet, quis consectetur risus pulvinar. Fusce lacinia pellentesque ante sed tincidunt. Cras nisl erat, molestie sit amet porta non, placerat eget felis. Donec at condimentum urna. Nulla eu nunc consectetur, ornare libero ac, aliquam ipsum. Nam nisl diam, volutpat vitae augue at, ullamcorper placerat metus. Nunc nec nisl id lectus varius sollicitudin. Etiam quis nunc vel eros bibendum elementum. Aliquam iaculis ut tellus et fringilla. Fusce vel tortor vitae dolor condimentum vulputate. Sed at convallis metus, semper tristique massa. Suspendisse a enim sit amet magna pulvinar congue. Morbi imperdiet lorem quis erat hendrerit convallis.</p>
	<ul class="tags">
		<li class="tag"><a href="/categories/music"><span class="glyphicon glyphicon-tag"></span>&nbsp;music</a></li>
	</ul>
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
</div>
@stop