<html>
<head>
	<title>Sistem Informasi Geografis Infrastruktur</title>
	{{HTML::style('source/css/public/home.css')}}
	{{HTML::style('source/css/public/spoiler.css')}}
	{{HTML::style('source/slider/css/normalize.css')}}
	{{HTML::style('source/slider/css/style.css')}}

	{{HTML::script('source/js/jquery.js')}}
	{{HTML::script('source/js/menubar.js')}}
	{{HTML::script('source/js/spoiler.js')}}
	{{HTML::script('source/slider/js/modernizr.js')}}


	<script type="text/javascript">
		$(document).ready(function() {
			var lebar = $('.left_box').width()-11;
			$('.left_box').css('width', lebar);
		});
	</script>
	@yield('include')
</head>
<body>
	<div id="header">
		<div id="logo">
			{{HTML::image('source/images/logo.png')}}
		</div>
		<div id="judul">
			Sistem Informasi Geografis Infrastruktur  
		</div>
	</div>
	
	<div id="navigasi">
		@include('public.navigasi')
	</div>
	<div id="content">
		<div id="left">
			@yield('kiri')
		</div>
		<div id="right">
			<div class="right_box">
				<div class="right_box_header">Hari Ini</div>
				<div class="right_box_content">
					<center>
						<div id="widget">
							<span id="big_day"></span>
							<span id="month" class="block">month</span><span id="year" class="block"></span>
						</div>
					</center>
				</div>
			</div>
			<div class="right_box">
				<div class="right_box_header">
					Data Infrastruktur
				</div>
				<div class="right_box_content">
					<div class="spoiler_button">
						Kec. Jagoi Babang
					</div>
					<div class="spoiler">
						<li>{{HTML::link('data_infrastruktur/1/ruas_jalan/1', 'Ruas Jalan')}}</li>
						<li>{{HTML::link('data_infrastruktur/1/gorong_gorong/1', 'Gorong-gorong')}}</li>
						<li>{{HTML::link('data_infrastruktur/1/jembatan/1', 'Jembatan')}}</li>
						<li>{{HTML::link('data_infrastruktur/1/nfrastruktur/1', 'Infrastruktur')}}</li>
					</div>
					<div class="spoiler_button">
						Kec. Siding
					</div>
					<div class="spoiler">
						<li>{{HTML::link('data_infrastruktur/2/ruas_jalan/1', 'Ruas Jalan')}}</li>
						<li>{{HTML::link('data_infrastruktur/2/gorong_gorong/1', 'Gorong-gorong')}}</li>
						<li>{{HTML::link('data_infrastruktur/2/jembatan/1', 'Jembatan')}}</li>
						<li>{{HTML::link('data_infrastruktur/2/nfrastruktur/1', 'Infrastruktur')}}</li>
					</div>
					<div class="spoiler_button">
						Kecamatan 3
					</div>
					<div class="spoiler">
						<li>{{HTML::link('#', 'Ruas Jalan')}}</li>
						<li>{{HTML::link('#', 'Gorong-gorong')}}</li>
						<li>{{HTML::link('#', 'Jembatan')}}</li>
						<li>{{HTML::link('#', 'Infrastruktur')}}</li>
					</div>
					<div class="spoiler_button">
						Kecamatan 4
					</div>
					<div class="spoiler">
						<li>{{HTML::link('#', 'Ruas Jalan')}}</li>
						<li>{{HTML::link('#', 'Gorong-gorong')}}</li>
						<li>{{HTML::link('#', 'Jembatan')}}</li>
						<li>{{HTML::link('#', 'Infrastruktur')}}</li>
					</div>
					<div class="spoiler_button">
						Kecamatan 5
					</div>
					<div class="spoiler">
						<li>{{HTML::link('#', 'Ruas Jalan')}}</li>
						<li>{{HTML::link('#', 'Gorong-gorong')}}</li>
						<li>{{HTML::link('#', 'Jembatan')}}</li>
						<li>{{HTML::link('#', 'Infrastruktur')}}</li>
					</div>
					<div class="spoiler_button">
						Kecamatan 6
					</div>
					<div class="spoiler">
						<li>{{HTML::link('#', 'Ruas Jalan')}}</li>
						<li>{{HTML::link('#', 'Gorong-gorong')}}</li>
						<li>{{HTML::link('#', 'Jembatan')}}</li>
						<li>{{HTML::link('#', 'Infrastruktur')}}</li>
					</div>
				</div>
			</div>
			<div class="right_box">
				<div class="right_box_header">
					 Agenda
				</div>
				<div class="right_box_content">
					@foreach($agenda as $key=>$value)
					<div class="post">
						<div class="thumb">
							{{HTML::image('source/thumb/100x100/'.$value->gambar)}}
						</div>
						<div class="text">
							<div class="judul"><a href="">{{HTML::link('read/'.$value->slug, $value->judul)}}</a></div>
							<div class="waktu"><?php $date = explode(' ', $value->date) ?>{{$date['0']}} {{$date['1']}} {{$date['2']}}</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="footer_content">
			<br>
			<div class="footer_kiri">
				<h4>Menu Link</h4>
				<ul>
					<li><a href="sig_perbatasan" class="link">GIS</a></li>
					<li><a href="data_infrastuktur" class="link">Data Infrastruktur</a></li>
					<li><a href="agenda" class="link">Agenda</a></li>
					<li><a href="berita" class="link">Berita</a></li>
				</ul>	
			</div>
			<div class="footer_tengah">
				<h4>Website Terkait</h4>
				<ul>
					<li><a href="#" class="link">KalbarProv</a></li>
					<li><a href="#" class="link">BengkayangKab</a></li>
					<li><a href="#" class="link">Bappeda Bengkayang</a></li>
					<li><a href="#" class="link">Other</a></li>
				</ul>
			</div>
			<div class="footer_right">
				<h4>Tentang Kami</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p>
			</div>
		</div>
		<div id="copyright">
			<br>
		  <div align="center"><strong>Copyright &copy; 2015 Dinas Kajian Perbatasan </strong></div>
		</div>
	</div>

	<script type="text/javascript">
		var months = ['JANUARI','FEBRUARI','MARET','APRIL','MEI','JUNI','JULI','AGUSTUS','SEPTEMBER','OKTOBER','NOVEMBER','DESEMBER'];
		var weekDay = ['Minggu','Senin','Selasa','Rabu','Kamis','Jum`at','Sabtu'];
		var current = new Date();
		document.getElementById('big_day').innerHTML = current.getDate();
		document.getElementById('month').innerHTML = months[current.getMonth()];
		document.getElementById('year').innerHTML = current.getFullYear(); 
	</script>
</body>
</html>