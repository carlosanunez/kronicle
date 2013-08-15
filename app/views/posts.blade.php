@extends('layouts.master')

@section('title')
@parent
| {{$post[0]['title']}}
@stop

@section('content')
<?php
	print '<div class="post">';
		print '<div class="rightered date">';
		$date = new DateTime($post[0]['date']);
    	print $date->format('d/m/Y');
		print '</div>';
		print '<div>';
			print '<span class="title"><a href="/posts/'.$post[0]['id'].'">';
				print $post[0]['title'];
			print '</a></span>';
		print '</div>';
		print '<div class="image">';
			print '<img src="../'.$post[0]['photo'].'" class="img-responsive" />';
		print '</div>';

		print $post[0]['content'];
		print '<br>';
		print '<div class="container">';
		print '<ul class="tag col-lg-10 pull-left" style="text-align: left;  padding-left: 0px;">';
			$countTags = 0;
			while ($countTags < count($post[0]['tags'])) {
			print '<li class="tag">';
				print '<a href="/tags/'.$post[0]['tags'][$countTags][0]['tag'].'">';
					print '<span class="glyphicon glyphicon-tag"></span>';
					print '&nbsp;';
					print $post[0]['tags'][$countTags][0]['tag'];
				print '</a>';
			print '</li>';
			$countTags++;
			}
		print '</ul>';
		print '<a class="disqus pull-right col-lg-2" href="/posts/'.$post[0]['id'].'#disqus_thread">Comment</a>';
		print '</div>';
	print '</div>';
?>
<div class="container centered footer">
<div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_url = 'http://wilfreddenton.com/helloworld.html';
        var disqus_shortname = 'wilfmeister'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>

</div>

@stop