@extends('layouts.admin')

@section('include')
	{{HTML::style('source/css/admin/galeri.css')}}
@stop

@section('menu_item')
	{{HTML::link('admin/tulis_artikel', 'Tulis Artikel', array('class'=>'menu_item'))}}
	{{HTML::link('admin/profil', 'Profil', array('class'=>'menu_item'))}}
	{{HTML::link('admin/agenda', 'Agenda', array('class'=>'menu_item'))}}
	{{HTML::link('admin/berita', 'Berita', array('class'=>'menu_item'))}}
	{{HTML::link('admin/download', 'Download', array('class'=>'menu_item'))}}
	{{HTML::link('admin/galeri', 'Galeri', array('class'=>'menu_item', 'id'=>'selected'))}}
	{{HTML::link('admin/data_infrastruktur', 'Data Infrastruktur', array('class'=>'menu_item'))}}
	{{HTML::link('admin/hubungi_kami', 'Hubungi Kami', array('class'=>'menu_item'))}}
	<div class="menu_separator">&nbsp;</div>
	{{HTML::link('admin/ubah_password', 'Ubah Password', array('class'=>'menu_item'))}}
	{{HTML::link('admin/admin', 'Admin', array('class'=>'menu_item'))}}
	<div class="menu_separator">&nbsp;</div>
	{{HTML::link('admin/logout', 'Log Out', array('class'=>'menu_item'))}}
@stop

@section('content')
	<div id="content_header">
		Galeri
	</div>
	<div id="content_body">
		<form action="" method="post" enctype="multipart/form-data">
			<label for="">Gambar</label>
			<input type="file" name="gambar" accept="image/jpg, image/jpeg"><br>
			<label for="">Deskripsi Gambar</label>
			<input type="text" name="deskripsi"><br>
			<input type="submit" name="submit" value="Tambah Gambar">
		</form>
		@foreach($galeri_array as $key=>$value)
			<div class="galeri_item">
				<div class="thumb">
					{{HTML::image('source/thumb/410x250/'.$value->filename)}}
				</div>
				<div class="text">
					{{$value->deskripsi}}
				</div>
				<div class="action"> 
					{{HTML::link('admin/delete_galeri/'.$value->id, 'Delete')}}
				</div>
			</div>
		@endforeach
	</div>
@stop