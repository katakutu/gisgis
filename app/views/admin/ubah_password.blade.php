@extends('layouts.admin')

@section('include')
	{{HTML::style('source/css/admin/tulis_artikel.css')}}
@stop

@section('menu_item')
	{{HTML::link('admin/tulis_artikel', 'Tulis Artikel', array('class'=>'menu_item'))}}
	{{HTML::link('admin/profil', 'Profil', array('class'=>'menu_item'))}}
	{{HTML::link('admin/agenda', 'Agenda', array('class'=>'menu_item'))}}
	{{HTML::link('admin/berita', 'Berita', array('class'=>'menu_item'))}}
	{{HTML::link('admin/download', 'Download', array('class'=>'menu_item'))}}
	{{HTML::link('admin/galeri', 'Galeri', array('class'=>'menu_item'))}}
	{{HTML::link('admin/data_infrastruktur', 'Data Infrastruktur', array('class'=>'menu_item'))}}
	{{HTML::link('admin/hubungi_kami', 'Hubungi Kami', array('class'=>'menu_item'))}}
	<div class="menu_separator">&nbsp;</div>
	{{HTML::link('admin/ubah_password', 'Ubah Password', array('class'=>'menu_item', 'id'=>'selected'))}}
	{{HTML::link('admin/admin', 'Admin', array('class'=>'menu_item'))}}
	<div class="menu_separator">&nbsp;</div>
	{{HTML::link('admin/logout', 'Log Out', array('class'=>'menu_item'))}}
@stop

@section('content')
	<div id="content_header">
		Ubah Password
	</div>
	<div id="content_body">
		@if(isset($pesan))
		{{$pesan}}
		@endif
		<form action="" method="post" enctype="multipart/form-data">
			<label for="">Username</label>
			<input type="text" name="username" value="{{$admin->username}}"><br>
			<label for="">Password Lama</label>
			<input type="password" name="password_lama"><br>
			<label for="">Password Baru</label>
			<input type="password" name="password_baru"><br>
			<input type="submit" name="submit" value="Simpan Perubahan">
		</form>
	</div>
@stop