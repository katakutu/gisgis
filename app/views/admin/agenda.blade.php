@extends('layouts.admin')

@section('include')
	{{HTML::style('source/css/admin/post_list.css')}}
@stop

@section('menu_item')
	{{HTML::link('admin/tulis_artikel', 'Tulis Artikel', array('class'=>'menu_item'))}}
	{{HTML::link('admin/profil', 'Profil', array('class'=>'menu_item'))}}
	{{HTML::link('admin/agenda', 'Agenda', array('class'=>'menu_item', 'id'=>'selected'))}}
	{{HTML::link('admin/berita', 'Berita', array('class'=>'menu_item'))}}
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
		Agenda
	</div>
	<div id="content_body">
		@foreach($agenda_array as $key=>$value)
			<div class="post">
				<div class="thumb">
					{{HTML::image('source/thumb/100x100/'.$value->gambar)}}
				</div>
				<div class="text">
					<div class="judul">{{$value->judul}}</div>
					<div class="waktu">{{$value->date}}</div>
				</div>
				<div class="action">
					{{HTML::link('admin/edit/'.$value->id, 'Edit')}} | 
					{{HTML::link('read/'.$value->slug, 'Baca')}} | 
					{{HTML::link('admin/delete/'.$value->id, 'Delete')}}
				</div>
			</div>
		@endforeach
	</div>
@stop