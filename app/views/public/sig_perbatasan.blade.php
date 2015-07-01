<html>
<head>
	<title></title>
	{{HTML::style('source/css/public/home.css')}}
	{{HTML::style('source/css/public/spoiler.css')}}
	{{HTML::style('source/css/public/sig_perbatasan.css')}}
	{{HTML::script('source/js/jquery.js')}}
	{{HTML::script('source/js/menubar.js')}}
	{{HTML::script('source/js/spoiler.js')}}
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAxNwuE5073ygsmUMsiPSWZiRfYdhaMmak&sensor=false"></script>
	<script src="http://google-maps-utility-library-v3.googlecode.com/svn/tags/markerwithlabel/1.0.1/src/markerwithlabel_packed.js"></script>
	{{HTML::script('source/js/sig_perbatasan.js')}}
</head>
<body>
 <div id="header">
		<div id="logo">
			{{HTML::image('source/images/logo.png')}}
		</div>
		<div id="judul">
			KABUPATEN KAPUAS HULU
	
		</div>
	</div>
	<div id="navigasi">
		@include('public.navigasi')
	</div>
	<div id="content">
		<div id="left">
			<div class="left_box">
				<div id="peta"></div>
			</div>
		</div>
		<div id="right">
			<div class="right_box">
				<div class="right_box_header">
					Kecamatan
				</div>
				<div class="right_box_content">
					<form action="" id="kecamatan">
						<div class="spoiler_button">
							<input type="checkbox" name="kecamatan_id" value="1" checked="checked">Kec. Jagoi Babang
						</div>
						<div class="spoiler_button">
							<input type="checkbox" name="kecamatan_id" value="2" checked="checked">Kec. Siding
						</div>
					</form>
				</div>
			</div>
			<div class="right_box">
				<div class="right_box_header">
					Jenis Infrastruktur
				</div>
				<div class="right_box_content">
					<form action="" id="kecamatan">
						<div class="spoiler_button">
							<input type="checkbox" name="jenis" value="ruas_jalan">Ruas Jalan
						</div>
						<div class="spoiler_button">
							<input type="checkbox" name="jenis" value="jembatan">Jembatan
						</div>
						<div class="spoiler_button">
							<input type="checkbox" name="jenis" value="gorong_gorong">Gorong-gorong
						</div>
						<div class="spoiler_button">
							<input type="checkbox" name="jenis" value="infrastruktur" checked="checked">Infrastruktur
						</div>
					</form>
				</div>
			</div>
		</div>
		<div id="blackscreen"></div>
		<div id="hidden" class="pop">
			<div class="pop_header">
				<div id="close_pop">X</div>
			</div>
			<div class="pop_body">
				<div class="pop_left">
					<div class="thumb_container">
						<img src="asdsa" alt="" class="pop_thumb">
						<img src="asdsa" alt="" class="pop_thumb">
						<img src="asdsa" alt="" class="pop_thumb">
						<img src="asdsa" alt="" class="pop_thumb">
					</div>
				</div>
				<div class="pop_right">
					<div id="detail_ruas_jalan" class="pop_detail">
						<label for="">Kecamatan : </label>  <span id="nama_kecamatan"></span><br>
						<label for="">Nama Ruas : </label>  <span id="nama_ruas"></span><br>
						<label for="">Nama Pangkal Ruas : </label>  <span id="nama_pangkal_ruas"></span><br>
						<label for="">Nama Ujung Ruas : </label>  <span id="nama_ujung_ruas"></span><br>
						<label for="">Titik Pengenal Awal : </label>  <span id="titik_pengenal_awal"></span><br>
						<label for="">Titik Pengenal Akhir : </label>  <span id="titik_pengenal_akhir"></span><br>
						<label for="">No GPS : </label>  <span id="no_gps"></span><br>
						<label for="">Koordinat GPS : </label>  <span id="koordinat_gps"></span><br>
						<label for="">Panjang Ruas : </label>  <span id="panjang_ruas"></span><br>
						<label for="">Lebar : </label>  <span id="lebar"></span><br>
						<label for="">Tipe Permukaan Jalan : </label>  <span id="tipe_permukaan_jalan"></span><br>
						<label for="">Kondisi Permukaan Jalan : </label>  <span id="kondisi_permukaan_jalan"></span><br>
					</div>
					<div id="detail_jembatan" class="pop_detail">
						<label for="">Kecamatan : </label>  <span id="nama_kecamatan"></span><br>
						<label for="">Nama Ruas : </label>  <span id="nama_ruas"></span><br>
						<label for="">Bahan Bangunan Atas : </label>  <span id="bahan_bangunan_atas"></span><br>
						<label for="">Kondisi Bangunan Atas : </label>  <span id="kondisi_bangunan_atas"></span><br>
						<label for="">Bahan Lantai : </label>  <span id="bahan_lantai"></span><br>
						<label for="">Kondisi Lantai : </label>  <span id="kondisi_lantai"></span><br>
						<label for="">Bahan Pondasi : </label>  <span id="bahan_pondasi"></span><br>
						<label for="">Kondisi Pondasi : </label>  <span id="kondisi_pondasi"></span><br>
						<label for="">No GPS : </label>  <span id="no_gps"></span><br>
						<label for="">Koordinat GPS : </label>  <span id="koordinat_gps"></span><br>
						<label for="">Panjang : </label>  <span id="panjang"></span><br>
						<label for="">Lebar : </label>  <span id="lebar"></span><br>
					</div>
					<div id="detail_gorong_gorong" class="pop_detail">
						<label for="">Kecamatan : </label>  <span id="nama_kecamatan"></span><br>
						<label for="">Nama Ruas : </label>  <span id="nama_ruas"></span><br>
						<label for="">Bahan Bangunan Atas : </label>  <span id="bahan_bangunan_atas"></span><br>
						<label for="">Kondisi Bangunan Atas : </label>  <span id="kondisi_bangunan_atas"></span><br>
						<label for="">No GPS : </label>  <span id="no_gps"></span><br>
						<label for="">Koordinat GPS : </label>  <span id="koordinat_gps"></span><br>
						<label for="">Panjang : </label>  <span id="panjang"></span><br>
						<label for="">Lebar : </label>  <span id="lebar"></span><br>
					</div>
					<div id="detail_infrastruktur" class="pop_detail">
						<label for="">Kecamatan : </label>  <span id="nama_kecamatan"></span><br>
						<label for="">Nama Ruas : </label>  <span id="nama_ruas"></span><br>
						<label for="">Nama Infrastruktur : </label>  <span id="nama_infrastruktur"></span><br>
						<label for="">Jenis Infrastruktur : </label>  <span id="jenis_infrastruktur"></span><br>
						<label for="">Kondisi : </label>  <span id="kondisi"></span><br>
						<label for="">No GPS : </label>  <span id="no_gps"></span><br>
						<label for="">Koordinat GPS : </label>  <span id="koordinat_gps"></span><br>
					</div>
				</div>
			</div>
		</div>
		<div id="big_image_container">
			<div id="big_image_header"><div id="close_image">X</div></div>
			<img src="asdasd" alt="" id="big_image">
		</div>
	</div>
	<div id="footer">
		<div id="footer_content"></div>
		<div id="copyright"></div>
	</div>
</body>
</html>
