@extends('layouts.admin')

@section('include')
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
			{{HTML::link('admin/data_infrastruktur/gorong_gorong', 'Gorong-Gorong', array('class'=>'kiri_item', 'id'=>'selected'))}}
			{{HTML::link('admin/data_infrastruktur/infrastruktur', 'Infrastruktur', array('class'=>'kiri_item'))}}
		</div>
		<div id="kanan">
			<form action="" method="post" enctype="multipart/form-data">
				<label for="">Kecamatan</label>
				<select name="kecamatan" id="">
					<option value=""></option>
					@foreach($kecamatan as $key=>$value)
					<option value="{{$value->id}}">{{$value->nama_kecamatan}}</option>
					@endforeach
				</select><br>
				<label for="">Nama Ruas</label>
				<select name="id_ruas_jalan" id="">
					<option value=""></option>
					@foreach($ruas_jalan as $key=>$value)
					<option value="{{$value->id}}">{{$value->nama_ruas}}</option>
					@endforeach
				</select><br>
				<label for="">Bahan Bangunan Atas</label>
				<input type="text" name="bahan_bangunan_atas"><br>
				<label for="">Kondisi Bangunan Atas</label>
				<input type="text" name="kondisi_bangunan_atas"><br>
				<label for="">No GPS</label>
				<input type="text" name="no_gps"><br>
				<label for="">Koordinat GPS</label>
				<input type="text" name="primer" class="gps_input" placeholder="contoh(49N)">
				<input type="text" name="easting" class="gps_input" placeholder="contoh(123456)">
				<input type="text" name="northing" class="gps_input" placeholder="contoh(654321)">
				<br>
				<label for="">Panjang (m)</label>
				<input type="text" name="panjang" placeholder="contoh(9,2)"><br>
				<label for="">Lebar (m)</label>
				<input type="text" name="lebar" placeholder="contoh(6,2)"><br>
				<label for="">Gambar</label>
				<input type="file" name="gambar" accept="image/jpg, image/jpeg"><br>
				<input type="submit" name="submit" value="Simpan">
			</form>
		</div>
	</div>
@stop