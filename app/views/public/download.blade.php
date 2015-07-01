@extends('layouts.public')

@section('include')
	{{HTML::style('source/css/public/profil.css')}}
@stop

@section('kiri')
	<h4>Download Berkas</h4>
	@foreach($download_array as $key=>$value)
		<ul>
			<li><?php echo $value->deskripsi ?> <i><a href="<?php echo "source/uploads/".$value->filename ?>">Download Disini</a></i></li>
		</ul>
	@endforeach
@stop

@section('kanan')
	<div class="right_box">
		<div class="right_box_header">
			 Agenda
		</div>
		<div class="right_box_content">
			<div class="post">
				<div class="thumb">
					<img src="asdasd">
				</div>
				<div class="text">
					<div class="judul"><a href="">Judul Agenda Pertama judul agenda judul melalui judul agenda</a></div>
					<div class="waktu">28 September 2013</div>
				</div>
			</div>
			<div class="post">
				<div class="thumb">
					<img src="asdasd">
				</div>
				<div class="text">
					<div class="judul"><a href="">Judul Agenda Pertama judul agenda judul melalui judul agenda asd askjki walsh oaih asid asjd</a></div>
					<div class="waktu">28 September 2013</div>
				</div>
			</div>
			<div class="post">
				<div class="thumb">
					<img src="asdasd">
				</div>
				<div class="text">
					<div class="judul"><a href="">Judul Agenda Pertama judul agenda judul melalui judul agenda</a></div>
					<div class="waktu">28 September 2013</div>
				</div>
			</div>
			<div class="post">
				<div class="thumb">
					<img src="asdasd">
				</div>
				<div class="text">
					<div class="judul"><a href="">Judul Agenda Pertama judul agenda judul melalui judul agenda</a></div>
					<div class="waktu">28 September 2013</div>
				</div>
			</div>
			<div class="post">
				<div class="thumb">
					<img src="asdasd">
				</div>
				<div class="text">
					<div class="judul"><a href="">Judul Agenda Pertama judul agenda judul melalui judul agenda</a></div>
					<div class="waktu">28 September 2013</div>
				</div>
			</div>
		</div>
	</div>
@stop