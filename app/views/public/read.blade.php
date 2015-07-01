@extends('layouts.public')

@section('include')
	{{HTML::style('source/css/public/profil.css')}}
	<script type="text/javascript">
		$(document).ready(function() {
			var lebar = $('.content_box').width()-11;
			$('.content_box').css('width', lebar);
		});
	</script>
@stop

@section('kiri')
	<div class="content_box">
		<div class="post_besar">
			<div class="post_header">
				<div class="post_date">
					<?php $date = explode(' ', $konten->date) ?>
					<div class="tanggal">{{$date['0']}}</div>
					<div class="bulan">{{$date['1']}}</div>
					<div class="tahun">{{$date['2']}}</div>
				</div>
				<div class="post_judul">{{HTML::link('read/'.$konten->slug, $konten->judul)}}</div>
			</div>
			<div class="post_body">
				<img src="<?php echo "../source/thumb/410x250/". $konten->gambar ?>" width="610px">
				{{$konten->content}}
			</div>
		</div>
	</div>
	<div class="content_box">
		<div id="disqus_thread"></div>
		<script type="text/javascript">
		    /* * * CONFIGURATION VARIABLES * * */
		    var disqus_shortname = 'sigbengkayangkab';
		    
		    /* * * DON'T EDIT BELOW THIS LINE * * */
		    (function() {
		        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
		        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
		        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		    })();
		</script>
		<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
		<script type="text/javascript">
	    	/* * * CONFIGURATION VARIABLES * * */
		    var disqus_shortname = 'sigbengkayangkab';
		    
		    /* * * DON'T EDIT BELOW THIS LINE * * */
		    (function () {
		        var s = document.createElement('script'); s.async = true;
		        s.type = 'text/javascript';
		        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
		        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
		    }());
		</script>
	</div>
@stop
