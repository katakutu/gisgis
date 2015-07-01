@extends('layouts.public')

@section('include')
	{{HTML::style('source/css/public/profil.css')}}
@stop

@section('kiri')
	@foreach($agenda as $key=>$value)
		<div class="left_box">
			<div class="post_besar">
				<div class="post_header">
					<div class="post_date">
						<?php $date = explode(' ', $value->date) ?>
						<div class="tanggal">{{$date['0']}}</div>
						<div class="bulan">{{$date['1']}}</div>
					</div>
					<div class="post_judul">{{HTML::link('read/'.$value->slug, $value->judul)}}</div>
				</div>
				<div class="post_body">
					{{HTML::image('source/thumb/410x250/'.$value->gambar)}}
					<div class="post_summary">{{$value->summary}}</div>
				</div>
			</div>
		</div>
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