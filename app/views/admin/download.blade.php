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
	{{HTML::link('admin/download', 'Download', array('class'=>'menu_item', 'id'=>'selected'))}}
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
		Upload File
	</div>
	<div id="content_body">
		<form action="" method="post" enctype="multipart/form-data">
			<label for="">Gambar</label>
			<input type="file" name="files"><br>
			<label for="">Deskripsi</label>
			<input type="text" name="deskripsi"><br>
			<input type="submit" name="submit" value="Tambah File">
		</form>
		<h4>List Berkas Download</h4>
		@foreach($download_array as $key=>$value)
			<p>- <?php echo $value->deskripsi ?> <i><a href="<?php echo "../source/uploads/".$value->filename ?>">Download Disini</a></i> | {{HTML::link('admin/delete_download/'.$value->id, 'Delete')}}</p>
		@endforeach
	</div>
@stop