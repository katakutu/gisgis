@extends('layouts.admin')

@section('include')
	{{HTML::script('source/js/jquery.js')}}
	{{HTML::script('source/js/jquery.form.js')}}
	{{HTML::script('source/js/tambah_foto_infrastruktur.js')}}
	{{HTML::style('source/css/admin/data_infrastruktur.css')}}
	{{HTML::style('source/css/admin/tulis_artikel.css')}}
@stop

@section('menu_item')
	{{HTML::link('admin/tulis_artikel', 'Tulis Artikel', array('class'=>'menu_item'))}}
	{{HTML::link('admin/profil', 'Profil', array('class'=>'menu_item'))}}
	{{HTML::link('admin/agenda', 'Agenda', array('class'=>'menu_item'))}}
	{{HTML::link('admin/berita', 'Berita', array('class'=>'menu_item'))}}
	{{HTML::link('admin/download', 'Download', array('class'=>'menu_item'))}}
	{{HTML::link('admin/galeri', 'Galeri', array('class'=>'menu_item'))}}
	{{HTML::link('admin/data_infrastruktur', 'Data Infrastruktur', array('class'=>'menu_item', 'id'=>'selected'))}}
	{{HTML::link('admin/hubungi_kami', 'Hubungi Kami', array('class'=>'menu_item'))}}
	<div class="menu_separator">&nbsp;</div>
	{{HTML::link('admin/ubah_password', 'Ubah Password', array('class'=>'menu_item'))}}
	{{HTML::link('admin/admin', 'Admin', array('class'=>'menu_item'))}}
	<div class="menu_separator">&nbsp;</div>
	{{HTML::link('admin/logout', 'Log Out', array('class'=>'menu_item'))}}
@stop

@section('content')
	<div id="content_header">
		Data Infrastruktur
	</div>
	<div id="content_body">
		<div id="kiri">
			{{HTML::link('admin/data_infrastruktur/ruas_jalan', 'Ruas Jalan', array('class'=>'kiri_item', 'id'=>'selected'))}}
			{{HTML::link('admin/data_infrastruktur/jembatan', 'Jembatan', array('class'=>'kiri_item'))}}
			{{HTML::link('admin/data_infrastruktur/gorong_gorong', 'Gorong-Gorong', array('class'=>'kiri_item'))}}
			{{HTML::link('admin/data_infrastruktur/infrastruktur', 'Infrastruktur', array('class'=>'kiri_item'))}}
		</div>
		<div id="kanan">
			<div id="foto_container">
				<label for="">Foto</label>
				<div id="tempat_foto">
					@foreach($foto_array as $key=>$value)
						<div class="foto_item">
							{{HTML::image('source/thumb/100x100/'.$value->filename)}}
							{{HTML::link('admin/data_infrastruktur/hapus_foto/'.$value->id, 'Delete', array('class'=>'delete_foto'))}}
						</div>
					@endforeach
				</div>
				<div id="tambah_foto">Tambah Foto</div>
			</div>			
			{{Form::open(array('url' => 'admin/data_infrastruktur/ajax/upload_foto', 'method'=>'post', 'enctype'=>'multipart/form-data', 'id'=>'form_upload_foto'))}}
				<input type="hidden" name="id" value="{{$ruas_jalan->id}}">
				<input type="hidden" name="kategori" value="ruas_jalan">
				<input type="file" name="foto" accept="image/jpg, image/jpeg" id="input_foto">
			{{Form::close()}}
			<form action="" method="post" enctype="multipart/form-data">
				<label for="">Kecamatan</label>
				<select name="kecamatan" id="">
					<option value=""></option>
					@foreach($kecamatan as $key=>$value)
					<option value="{{$value->id}}" @if($value->id == $ruas_jalan->kecamatan_id) selected="selected" @endif>{{$value->nama_kecamatan}}</option>
					@endforeach
				</select><br>
				<label for="">Nama Ruas</label>
				<input type="text" name="nama_ruas" value="{{$ruas_jalan->nama_ruas}}"><br>
				<label for="">Nama Pangkal Ruas</label>
				<input type="text" name="nama_pangkal_ruas" value="{{$ruas_jalan->nama_pangkal_ruas}}"><br>
				<label for="">Nama Ujung Ruas</label>
				<input type="text" name="nama_ujung_ruas" value="{{$ruas_jalan->nama_ujung_ruas}}"><br>
				<label for="">Titik Pengenal Awal</label>
				<input type="text" name="titik_pengenal_awal" value="{{$ruas_jalan->titik_pengenal_awal}}"><br>
				<label for="">Titik Pengenal Akhir</label>
				<input type="text" name="titik_pengenal_akhir" value="{{$ruas_jalan->titik_pengenal_akhir}}"><br>
				<label for="">No GPS</label>
				<input type="text" name="no_gps" value="{{$ruas_jalan->no_gps}}"><br>

				<?php
				$koordinat = explode(' ', $ruas_jalan->koordinat_gps);
				?>

				<label for="">Koordinat GPS</label>
				<input type="text" name="primer" class="gps_input" placeholder="contoh(49N)" value="{{$koordinat[0]}}">
				<input type="text" name="easting" class="gps_input" placeholder="contoh(123456)" value="{{$koordinat[1]}}">
				<input type="text" name="northing" class="gps_input" placeholder="contoh(654321)" value="{{$koordinat[2]}}">
				<br>
				<label for="">Panjang ruas (Km)</label>
				<input type="text" name="panjang_ruas" placeholder="contoh(9,2)" value="{{$ruas_jalan->panjang_ruas}}"><br>
				<label for="">Lebar (m)</label>
				<input type="text" name="lebar" placeholder="contoh(6,2)" value="{{$ruas_jalan->lebar}}"><br>
				<label for="">Tipe Permukaan Jalan</label>
				<input type="text" name="tipe_permukaan_jalan" value="{{$ruas_jalan->tipe_permukaan_jalan}}"><br>
				<label for="">Kondisi Permukaan Jalan</label>
				<input type="text" name="kondisi_permukaan_jalan" value="{{$ruas_jalan->kondisi_permukaan_jalan}}"><br>
				<input type="submit" name="submit" value="Simpan Perubahan">
			</form>
		</div>
	</div>
	<div id="blackscreen"></div>
	<div id="upload_loading">
		{{HTML::image('source/images/loading.gif')}}
	</div>
@stop