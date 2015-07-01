@extends('layouts.public')
@section('include')
@stop
@section('kiri')
	<div class="flexslider">
  <ul class="slides">
    <li>
      <img src="http://flexslider.woothemes.com/images/kitchen_adventurer_cheesecake_brownie.jpg" width="800" height="300" alt="" />
      <div class="slide_text">
        <div class="slide_title">Title of Slide 1</div>
        <div class="slide_byline">Teaser text for slide 1</div>
      </div>
    </li>
    <li>
      <img src="http://flexslider.woothemes.com/images/kitchen_adventurer_lemon.jpg" width="800" height="300" alt="" />
      <div class="slide_text">
        <div class="slide_title">Title of Slide 2</div>
        <div class="slide_byline">Teaser text for slide 2</div>
      </div>
    </li>
    <li>
      <img src="http://flexslider.woothemes.com/images/kitchen_adventurer_donut.jpg" width="800" height="300" alt="" />
      <div class="slide_text">
        <div class="slide_title">Title of Slide 3</div>
        <div class="slide_byline">Teaser text for slide 3</div>
      </div>
    </li>
    <li>
      <img src="http://flexslider.woothemes.com/images/kitchen_adventurer_caramel.jpg" width="800" height="300" alt="" />
      <div class="slide_text">
        <div class="slide_title">Title of Slide 4</div>
        <div class="slide_byline">Teaser text for slide 4</div>
      </div>
    </li>
  </ul>
</div>
<div class="flexslider-controls">
  <ol class="flex-control-nav">
    <li>Slide 1 Control</li>
    <li>Slide 2 Control</li>
    <li>Slide 3 Control</li>
    <li>Slide 4 Control</li>
  </ol>
</div>
	{{HTML::script('source/slider/css/jquery.min.js')}}
	{{HTML::script('source/slider/css/jquery.flexslider-min.js')}}
	{{HTML::script('source/slider/js/index.js')}}


	<div class="left_box">
		<div id="peta"></div>
	</div>
	<div class="left_box">
		@foreach($profil as $key=>$value)
			@if($key==0)
			<div class="left_kiri">
				<div class="post">
					<div class="thumb">
						{{HTML::image('source/thumb/410x250/'.$value->gambar)}}
					</div>
					<div class="text">
						<div class="judul">{{HTML::link('read/'.$value->slug, $value->judul)}}</div>
						<div class="waktu">{{$value->date}}</div>
					</div>
				</div>
			</div>
			<div class="left_kanan">
			@else
			<div class="post">
				<div class="thumb">
					{{HTML::image('source/thumb/100x100/'.$value->gambar)}}
				</div>
				<div class="text">
					<div class="judul">{{HTML::link('read/'.$value->slug, $value->judul)}}</div>
					<div class="waktu">{{$value->date}}</div>
				</div>
			</div>
			@endif
		@endforeach
			</div>
	</div>

	<div class="kiri_box">
		<div class="heading">Berita Terbaru</div>
		<br>
		@foreach($berita as $key=>$value)
			@if($key==0)
				<div class="kiri_kiri">
					<div class="post">
						<div class="thumb">
							{{HTML::image('source/thumb/410x250/'.$value->gambar)}}
						</div>
						<div class="text">
							<div class="judul">{{HTML::link('read/'.$value->slug, $value->judul)}}</div>
							<div class="waktu">{{$value->date}}</div>
						</div>
					</div>
				</div>
				<div class="kiri_kanan">
				@else
				<div class="post">
					<div class="thumb">
						{{HTML::image('source/thumb/100x100/'.$value->gambar)}}
					</div>
					<div class="text">
						<div class="judul">{{HTML::link('read/'.$value->slug, $value->judul)}}</div>
						<div class="waktu">{{$value->date}}</div>
					</div>
				</div>
			@endif
		@endforeach
			<a href="berita" class="button">Berita Lainnya</a>
	</div>
	</div>
@stop

