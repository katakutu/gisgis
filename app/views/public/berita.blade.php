@extends('layouts.public')

@section('include')
	{{HTML::style('source/css/public/profil.css')}}
@stop

@section('kiri')
	@foreach($berita as $key=>$value)
		<div class="left_box">
			<div class="post_besar">
				<div class="post_header">
					<div class="post_date">
						<?php $date = explode(' ', $value->date) ?>
						<div class="tanggal">{{$date['0']}}</div>
						<div class="bulan">{{$date['1']}}</div>
						<div class="tahun">{{$date['2']}}</div>
					</div>
					<div class="post_judul">{{HTML::link('read/'.$value->slug, $value->judul)}}</div>
				</div>
				<div class="post_body">
					<img src="<?php echo "source/thumb/410x250/". $value->gambar ?>" width="610px">
					<div class="post_summary">{{$value->summary}} <br><b>{{HTML::link('read/'.$value->slug, 'Selanjutnya')}}</b></div>
				</div>
			</div>
		</div>
	@endforeach
@stop
