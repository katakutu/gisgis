@extends('layouts.admin')

@section('include')
	{{HTML::style('source/css/admin/post_list.css')}}
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
	{{HTML::link('admin/ubah_password', 'Ubah Password', array('class'=>'menu_item'))}}
	{{HTML::link('admin/admin', 'Admin', array('class'=>'menu_item', 'id'=>'selected'))}}
	<div class="menu_separator">&nbsp;</div>
	{{HTML::link('admin/logout', 'Log Out', array('class'=>'menu_item'))}}
@stop

@section('content')
	<div id="content_header">
		Data Admin
	</div>
	<div id="content_body">
		<form action="" method="post">
			<label for="">Username</label>
			<input type="text" name="username"><br>
			<label for="">Password</label>
			<input type="password" name="password"><br>
			<input type="submit" name="submit" value="Tambah Admin">
		</form>
		@foreach($admin as $key=>$value)
			<div class="post">
				<div class="text">
					<div class="judul">{{$value->username}}</div>
				</div>
				<div class="action">
					{{HTML::link('admin/delete_admin/'.$value->id, 'Delete')}}
				</div>
			</div>
		@endforeach
	</div>
@stop