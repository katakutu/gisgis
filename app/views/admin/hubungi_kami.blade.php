@extends('layouts.admin')

@section('include')
	{{HTML::style('source/css/admin/tulis_artikel.css')}}
	{{HTML::script('source/ckeditor/ckeditor.js')}}
@stop

@section('menu_item')
	{{HTML::link('admin/tulis_artikel', 'Tulis Artikel', array('class'=>'menu_item'))}}
	{{HTML::link('admin/profil', 'Profil', array('class'=>'menu_item'))}}
	{{HTML::link('admin/agenda', 'Agenda', array('class'=>'menu_item'))}}
	{{HTML::link('admin/berita', 'Berita', array('class'=>'menu_item'))}}
	{{HTML::link('admin/download', 'Download', array('class'=>'menu_item'))}}
	{{HTML::link('admin/galeri', 'Galeri', array('class'=>'menu_item'))}}
	{{HTML::link('admin/data_infrastruktur', 'Data Infrastruktur', array('class'=>'menu_item'))}}
	{{HTML::link('admin/hubungi_kami', 'Hubungi Kami', array('class'=>'menu_item', 'id'=>'selected'))}}
	<div class="menu_separator">&nbsp;</div>
	{{HTML::link('admin/ubah_password', 'Ubah Password', array('class'=>'menu_item'))}}
	{{HTML::link('admin/admin', 'Admin', array('class'=>'menu_item'))}}
	<div class="menu_separator">&nbsp;</div>
	{{HTML::link('admin/logout', 'Log Out', array('class'=>'menu_item'))}}
@stop

@section('content')
	<div id="content_header">
		Hubungi Kami
	</div>
	<div id="content_body">
		@if(isset($pesan))
		{{$pesan}}
		@endif
		<form action="" method="post" enctype="multipart/form-data">
			<label for="">Judul</label>
			<input type="text" name="judul" value="{{$hubungi_kami->judul}}"><br>
			<label for="">Isi</label>
			<textarea name="content" class="ckeditor">{{$hubungi_kami->content}}</textarea><br>
			<input type="submit" name="submit" value="Simpan">
		</form>
	</div>
@stop