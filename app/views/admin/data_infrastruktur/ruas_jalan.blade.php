@extends('layouts.admin')

@section('include')
	{{HTML::style('source/css/admin/data_infrastruktur.css')}}
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
			{{HTML::link('admin/data_infrastruktur/ruas_jalan/tambah', 'Tambah Ruas Jalan', array('id'=>'tambah'))}}
			<table cellspacing="0">
				<tr>
					<td class="table_header">No</td>
					<td class="table_header">Nama ruas</td>
					<td class="table_header">Kecamatan</td>
					<td class="table_header">Panjang</td>
					<td class="table_header">Lebar</td>
					<td class="table_header">Action</td>
				</tr>
				<?php $loop = 1; ?>
				@foreach($ruas_jalan as $key=>$value)
				<tr>
					<td>{{$loop}}</td>
					<td>{{$value->nama_ruas}}</td>
					<td>{{$value->nama_kecamatan}}</td>
					<td>{{$value->panjang_ruas}} Km</td>
					<td>{{$value->lebar}} m</td>
					<td>{{HTML::link('admin/data_infrastruktur/ruas_jalan/edit/'.$value->id, 'Edit')}} | {{HTML::link('admin/data_infrastruktur/ruas_jalan/delete/'.$value->id, 'Delete')}}</td>
				</tr>
				<?php $loop++ ?>
				@endforeach
			</table>
		</div>
	</div>
@stop