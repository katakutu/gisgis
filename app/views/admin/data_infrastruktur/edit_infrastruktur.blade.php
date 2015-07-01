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
			{{HTML::link('admin/data_infrastruktur/ruas_jalan', 'Ruas Jalan', array('class'=>'kiri_item'))}}
			{{HTML::link('admin/data_infrastruktur/jembatan', 'Jembatan', array('class'=>'kiri_item'))}}
			{{HTML::link('admin/data_infrastruktur/gorong_gorong', 'Gorong-Gorong', array('class'=>'kiri_item'))}}
			{{HTML::link('admin/data_infrastruktur/infrastruktur', 'Infrastruktur', array('class'=>'kiri_item', 'id'=>'selected'))}}
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
				<input type="hidden" name="id" value="{{$infrastruktur->id}}">
				<input type="hidden" name="kategori" value="infrastruktur">
				<input type="file" name="foto" accept="image/jpg, image/jpeg" id="input_foto">
			{{Form::close()}}
			<form action="" method="post" enctype="multipart/form-data">
				<label for="">Kecamatan</label>
				<select name="kecamatan" id="">
					<option value=""></option>
					@foreach($kecamatan as $key=>$value)
					<option value="{{$value->id}}" @if($value->id == $infrastruktur->kecamatan_id) selected="selected" @endif>{{$value->nama_kecamatan}}</option>
					@endforeach
				</select><br>
				<label for="">Nama Ruas</label>
				<select name="id_ruas_jalan" id="">
					<option value=""></option>
					@foreach($ruas_jalan as $key=>$value)
					<option value="{{$value->id}}" @if($value->id == $infrastruktur->id_ruas_jalan) selected="selected" @endif>{{$value->nama_ruas}}</option>
					@endforeach
				</select><br>
				<label for="">Nama Infrastruktur</label>
				<input type="text" name="nama_infrastruktur" value="{{$infrastruktur->nama_infrastruktur}}"><br>
				<label for="">Jenis Infrastruktur</label>
				<select name="jenis_infrastruktur" id="">
					<option value=""></option>
					<option value="sekolah" @if($infrastruktur->jenis_infrastruktur == 'sekolah') selected="selected" @endif>Sekolah</option>
					<option value="puskesdes" @if($infrastruktur->jenis_infrastruktur == 'puskesdes') selected="selected" @endif>Puskesdes</option>
					<option value="posyandu" @if($infrastruktur->jenis_infrastruktur == 'posyandu') selected="selected" @endif>Posyandu</option>
					<option value="masjid" @if($infrastruktur->jenis_infrastruktur == 'masjid') selected="selected" @endif>Masjid</option>
					<option value="gereja" @if($infrastruktur->jenis_infrastruktur == 'gereja') selected="selected" @endif>Gereja</option>
					<option value="lain_lain" @if($infrastruktur->jenis_infrastruktur == 'lain_lain') selected="selected" @endif>Lain-Lain</option>
				</select><br>
				<label for="">Kondisi</label>
				<input type="text" name="kondisi" value="{{$infrastruktur->kondisi}}"><br>
				<label for="">No GPS</label>
				<input type="text" name="no_gps" value="{{$infrastruktur->no_gps}}"><br>

				<?php
				$koordinat = explode(' ', $infrastruktur->koordinat_gps);
				?>

				<label for="">Koordinat GPS</label>
				<input type="text" name="primer" class="gps_input" placeholder="contoh(49N)" value="{{$koordinat[0]}}">
				<input type="text" name="easting" class="gps_input" placeholder="contoh(123456)" value="{{$koordinat[1]}}">
				<input type="text" name="northing" class="gps_input" placeholder="contoh(654321)" value="{{$koordinat[2]}}">
				<br>
				<input type="submit" name="submit" value="Simpan Perubahan">
			</form>
		</div>
	</div>
	<div id="blackscreen"></div>
	<div id="upload_loading">
		{{HTML::image('source/images/loading.gif')}}
	</div>
@stop