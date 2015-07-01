@extends('layouts.admin')

@section('include')
	{{HTML::style('source/css/admin/tulis_artikel.css')}}
	{{HTML::script('source/ckeditor/ckeditor.js')}}
@stop

@section('menu_item')
	{{HTML::link('admin/tulis_artikel', 'Tulis Artikel', array('class'=>'menu_item'))}}
	{{HTML::link('admin/profil', 'Profil', array('class'=>'menu_item'))}}
	{{HTML::link('admin/agenda', 'Agenda', array('class'=>'menu_item'))}}
	{{HTML::link('admin/download', 'Download', array('class'=>'menu_item'))}}
	{{HTML::link('admin/galeri', 'Galeri', array('class'=>'menu_item'))}}
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
		Edit Artikel
	</div>
	<div id="content_body">
		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="{{$konten->id}}">
			<label for="">Kategori</label>
			<span>{{strtoupper($konten->kategori)}}</span>
			<br>
			<label for="">Judul</label>
			<input type="text" name="judul" value="{{$konten->judul}}"><br>
			<label for="">Gambar</label>
			{{HTML::image('source/thumb/100x100/'.$konten->gambar)}}
			<input type="file" name="gambar" accept="image/jpg, image/jpeg"><br>
			<label for="">Summary (Deskripsi singkat)</label>
			<textarea name="summary" id="summary">{{$konten->summary}}</textarea><br>
			<label for="">Isi</label>
			<textarea name="content" class="ckeditor">{{$konten->content}}</textarea><br>
			<input type="submit" name="submit" value="Simpan Perubahan">
		</form>
	</div>
@stop