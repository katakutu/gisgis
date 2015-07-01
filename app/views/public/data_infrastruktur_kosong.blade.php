@extends('layouts.public')

@section('include')
	{{HTML::style('source/css/public/data_infrastruktur.css')}}
	{{HTML::script('source/js/data_infrastruktur.js')}}
	{{HTML::script('source/js/sig_perbatasan.js')}}
@stop

@section('kiri')
	<div class="left_box">
		<form action="">
			<label for="">Kecamatan</label>
			<select name="kecamatan" id="select_kecamatan">
				<option value="1">Kec. Jagoi Babang</option>
				<option value="2">Kec. Siding</option>
				<option value="0">Semua Kecamatan</option>
			</select>
			<label for="">Data</label>
			<select name="data" id="data">
				<option value="ruas_jalan">Ruas Jalan</option>
				<option value="jembatan">Jembatan</option>
				<option value="gorong_gorong">Gorong-gorong</option>
				<option value="infrastruktur">Infrastruktur</option>
			</select>
			<input type="button" name="tombol" id="tombol" value="Tampilkan Data">
		</form>
	</div>
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