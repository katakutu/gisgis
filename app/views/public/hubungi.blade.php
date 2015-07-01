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
		<center><h4><?php echo $konten->judul ?></h4></center>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127660.26396316518!2d109.495651!3d0.84614605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31e335f2ea2bc623%3A0xfd7a9c39f9baee69!2sBengkayang+Sub-District%2C+Bengkayang+Regency%2C+West+Kalimantan!5e0!3m2!1sen!2sid!4v1435726224318" width="706" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		<br>
		{{$konten->content}}
		<div class="post_besar">
			
		</div>
	</div>
@stop
