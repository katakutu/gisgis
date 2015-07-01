@extends('layouts.public')

@section('include')
	{{HTML::style('source/css/public/data_infrastruktur.css')}}
	{{HTML::style('source/css/admin/data_infrastruktur.css')}}
	{{HTML::style('source/css/public/sig_perbatasan.css')}}
	{{HTML::script('source/js/data_infrastruktur.js')}}
	{{HTML::script('source/js/detail_data_infrastruktur.js')}}
@stop

@section('kiri')
	<div class="left_box">
		<form action="">
			<label for="">Kecamatan</label>
			<select name="kecamatan" id="select_kecamatan">
				<option value="1" @if($id_kecamatan=='1') selected="selected" @endif>Kec. Jagoi Babang</option>
				<option value="2" @if($id_kecamatan=='2') selected="selected" @endif>Kec. Siding</option>
				<option value="0" @if($id_kecamatan=='0') selected="selected" @endif>Semua Kecamatan</option>
			</select>
			<label for="">Data</label>
			<select name="data" id="data">
				<option value="ruas_jalan" @if($jenis=='ruas_jalan') selected="selected" @endif>Ruas Jalan</option>
				<option value="jembatan" @if($jenis=='jembatan') selected="selected" @endif>Jembatan</option>
				<option value="gorong_gorong" @if($jenis=='gorong_gorong') selected="selected" @endif>Gorong-gorong</option>
				<option value="infrastruktur" @if($jenis=='infrastruktur') selected="selected" @endif>Infrastruktur</option>
			</select>
			<input type="button" name="tombol" id="tombol" value="Tampilkan Data">
		</form>
		<table cellspacing="0">
			<tr>
				<td class="table_header">No</td>
				<td class="table_header">Nama ruas</td>
				<td class="table_header">Kecamatan</td>
				<td class="table_header">Panjang</td>
				<td class="table_header">Lebar</td>
				<td class="table_header">Action</td>
			</tr>
			<?php $loop = 1; ?>
			@foreach($data as $key=>$value)
			<tr>
				<td>{{$loop}}</td>
				<td>{{$value->nama_ruas}}</td>
				<td>{{$value->nama_kecamatan}}</td>
				<td>{{$value->panjang_ruas}} Km</td>
				<td>{{$value->lebar}} m</td>
				<td><input type="button" onclick="show_pop('ruas_jalan', {{$value->id}})" value="detail"></td>
			</tr>
			<?php $loop++ ?>
			@endforeach
		</table>
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
	<div id="blackscreen"></div>
	<div id="hidden" class="pop">
		<div class="pop_header">
			<div id="close_pop">X</div>
		</div>
		<div class="pop_body">
			<div class="pop_left">
				<div class="thumb_container">
					<img src="asdsa" alt="" class="pop_thumb">
					<img src="asdsa" alt="" class="pop_thumb">
					<img src="asdsa" alt="" class="pop_thumb">
					<img src="asdsa" alt="" class="pop_thumb">
				</div>
			</div>
			<div class="pop_right">
				<div id="detail_ruas_jalan" class="pop_detail">
					<label for="">Kecamatan : </label>  <span id="nama_kecamatan"></span><br>
					<label for="">Nama Ruas : </label>  <span id="nama_ruas"></span><br>
					<label for="">Nama Pangkal Ruas : </label>  <span id="nama_pangkal_ruas"></span><br>
					<label for="">Nama Ujung Ruas : </label>  <span id="nama_ujung_ruas"></span><br>
					<label for="">Titik Pengenal Awal : </label>  <span id="titik_pengenal_awal"></span><br>
					<label for="">Titik Pengenal Akhir : </label>  <span id="titik_pengenal_akhir"></span><br>
					<label for="">No GPS : </label>  <span id="no_gps"></span><br>
					<label for="">Koordinat GPS : </label>  <span id="koordinat_gps"></span><br>
					<label for="">Panjang Ruas : </label>  <span id="panjang_ruas"></span><br>
					<label for="">Lebar : </label>  <span id="lebar"></span><br>
					<label for="">Tipe Permukaan Jalan : </label>  <span id="tipe_permukaan_jalan"></span><br>
					<label for="">Kondisi Permukaan Jalan : </label>  <span id="kondisi_permukaan_jalan"></span><br>
				</div>
				<div id="detail_jembatan" class="pop_detail">
					<label for="">Kecamatan : </label>  <span id="nama_kecamatan"></span><br>
					<label for="">Nama Ruas : </label>  <span id="nama_ruas"></span><br>
					<label for="">Bahan Bangunan Atas : </label>  <span id="bahan_bangunan_atas"></span><br>
					<label for="">Kondisi Bangunan Atas : </label>  <span id="kondisi_bangunan_atas"></span><br>
					<label for="">Bahan Lantai : </label>  <span id="bahan_lantai"></span><br>
					<label for="">Kondisi Lantai : </label>  <span id="kondisi_lantai"></span><br>
					<label for="">Bahan Pondasi : </label>  <span id="bahan_pondasi"></span><br>
					<label for="">Kondisi Pondasi : </label>  <span id="kondisi_pondasi"></span><br>
					<label for="">No GPS : </label>  <span id="no_gps"></span><br>
					<label for="">Koordinat GPS : </label>  <span id="koordinat_gps"></span><br>
					<label for="">Panjang : </label>  <span id="panjang"></span><br>
					<label for="">Lebar : </label>  <span id="lebar"></span><br>
				</div>
				<div id="detail_gorong_gorong" class="pop_detail">
					<label for="">Kecamatan : </label>  <span id="nama_kecamatan"></span><br>
					<label for="">Nama Ruas : </label>  <span id="nama_ruas"></span><br>
					<label for="">Bahan Bangunan Atas : </label>  <span id="bahan_bangunan_atas"></span><br>
					<label for="">Kondisi Bangunan Atas : </label>  <span id="kondisi_bangunan_atas"></span><br>
					<label for="">No GPS : </label>  <span id="no_gps"></span><br>
					<label for="">Koordinat GPS : </label>  <span id="koordinat_gps"></span><br>
					<label for="">Panjang : </label>  <span id="panjang"></span><br>
					<label for="">Lebar : </label>  <span id="lebar"></span><br>
				</div>
				<div id="detail_infrastruktur" class="pop_detail">
					<label for="">Kecamatan : </label>  <span id="nama_kecamatan"></span><br>
					<label for="">Nama Ruas : </label>  <span id="nama_ruas"></span><br>
					<label for="">Nama Infrastruktur : </label>  <span id="nama_infrastruktur"></span><br>
					<label for="">Jenis Infrastruktur : </label>  <span id="jenis_infrastruktur"></span><br>
					<label for="">Kondisi : </label>  <span id="kondisi"></span><br>
					<label for="">No GPS : </label>  <span id="no_gps"></span><br>
					<label for="">Koordinat GPS : </label>  <span id="koordinat_gps"></span><br>
				</div>
			</div>
		</div>
	</div>
	<div id="big_image_container">
		<div id="big_image_header"><div id="close_image">X</div></div>
		<img src="asdasd" alt="" id="big_image">
	</div>
@stop