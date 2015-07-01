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
			{{HTML::link('admin/data_infrastruktur/ruas_jalan', 'Ruas Jalan', array('class'=>'kiri_item'))}}
			{{HTML::link('admin/data_infrastruktur/jembatan', 'Jembatan', array('class'=>'kiri_item'))}}
			{{HTML::link('admin/data_infrastruktur/gorong_gorong', 'Gorong-Gorong', array('class'=>'kiri_item'))}}
			{{HTML::link('admin/data_infrastruktur/infrastruktur', 'Infrastruktur', array('class'=>'kiri_item', 'id'=>'selected'))}}
		</div>
		<div id="kanan">
			{{HTML::link('admin/data_infrastruktur/infrastruktur/tambah', 'Tambah Infrastruktur', array('id'=>'tambah'))}}
			<table cellspacing="0">
				<tr>
					<td class="table_header">No</td>
					<td class="table_header">Nama Infrastruktur</td>
					<td class="table_header">Kecamatan</td>
					<td class="table_header">Jenis</td>
					<td class="table_header">Ruas Jalan</td>
					<td class="table_header">Kondisi</td>
					<td class="table_header">Action</td>
				</tr>
				<?php $loop = 1; ?>
				@foreach($infrastruktur as $key=>$value)
				<tr>
					<td>{{$loop}}</td>
					<td>{{$value->nama_infrastruktur}}</td>
					<td>{{$value->nama_kecamatan}}</td>
					<td>{{$value->jenis_infrastruktur}}</td>
					<td>{{$value->nama_ruas}}</td>
					<td>{{$value->kondisi}}</td>
					<td>{{HTML::link('admin/data_infrastruktur/infrastruktur/edit/'.$value->id, 'Edit')}} | {{HTML::link('admin/data_infrastruktur/infrastruktur/delete/'.$value->id, 'Delete')}}</td>
				</tr>
				<?php $loop++ ?>
				@endforeach
			</table>
		</div>
	</div>
@stop