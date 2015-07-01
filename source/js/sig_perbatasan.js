var peta;
var markers = [];
var array = new Array();
var garis;
var dragstart;
var dragend;
var base_url = "http://localhost/bky/";

//fungsi inisialisasi membuat peta
function inisialisasi()
{
	//MEMBUAT PROPERTIES DARI PETA
	var properti = {
		center:new google.maps.LatLng(1.2413579498795726,109.610595703125),
		zoom:10,
		mapTypeId:google.maps.MapTypeId.HYBRID
	};

	//MEMBUAT SEBUAH PETA DENGAN PROPERTIES DARI VARIABEL properti
	peta = new google.maps.Map(document.getElementById('peta'),properti);	

	ambil_infrastruktur(1);
	ambil_infrastruktur(2);
}

function ambil_ruas_jalan(id_kecamatan)
{
	$.getJSON( base_url+"ajax/ambil_ruas_jalan/"+id_kecamatan, function( data ) {
		$.each(data, function( index, value ) {
		 	var point = new google.maps.LatLng(parseFloat(value.lat),parseFloat(value.long));

		 	var ruas_jalan = new google.maps.Marker({
				position: point,
				icon: base_url + 'source/maps_icon/transportation/junction.png',
				map: peta
			});
			markers.push(ruas_jalan);

			google.maps.event.addListener(ruas_jalan, 'click', function() {
				show_pop('ruas_jalan', value.id);
			});
		});
	});
}

function ambil_jembatan(id_kecamatan)
{
	$.getJSON( base_url+"ajax/ambil_jembatan/"+id_kecamatan, function( data ) {
		$.each(data, function( index, value ) {
		 	var point = new google.maps.LatLng(parseFloat(value.lat),parseFloat(value.long));

		 	var jembatan = new google.maps.Marker({
				position: point,
				icon: base_url + 'source/maps_icon/tourism/bridge_old.png',
				map: peta
			});
			markers.push(jembatan);

			google.maps.event.addListener(jembatan, 'click', function() {
				show_pop('jembatan', value.id);
			});
		});
	});
}

function ambil_gorong_gorong(id_kecamatan)
{
	$.getJSON( base_url+"ajax/ambil_gorong_gorong/"+id_kecamatan, function( data ) {
		$.each(data, function( index, value ) {
		 	var point = new google.maps.LatLng(parseFloat(value.lat),parseFloat(value.long));

		 	var gorong_gorong = new google.maps.Marker({
				position: point,
				icon: base_url + 'source/maps_icon/transportation/mainroad.png',
				map: peta
			});
			markers.push(gorong_gorong);

			google.maps.event.addListener(gorong_gorong, 'click', function() {
				show_pop('gorong_gorong', value.id);
			});
		});
	});
}

function ambil_infrastruktur(id_kecamatan)
{
	$.getJSON( base_url+"ajax/ambil_infrastruktur/"+id_kecamatan, function( data ) {
		$.each(data, function( index, value ) {
			var file_icon = '';
			if(value.jenis_infrastruktur=='sekolah'){
				file_icon = 'health_education/university.png';
			}else if(value.jenis_infrastruktur=='puskesdes'){
				file_icon = 'health_education/firstaid.png';
			}else if(value.jenis_infrastruktur=='posyandu'){
				file_icon = 'health_education/breast_feeding.png';
			}else if(value.jenis_infrastruktur=='gereja'){
				file_icon = 'transportation/church-2.png';
			}else if(value.jenis_infrastruktur=='masjid'){
				file_icon = 'transportation/mosquee.png';
			}else{
				file_icon = 'transportation/hut.png';
			}

		 	var point = new google.maps.LatLng(parseFloat(value.lat),parseFloat(value.long));

		 	var infrastruktur = new google.maps.Marker({
				position: point,
				icon: base_url + 'source/maps_icon/' + file_icon,
				map: peta
			});
			markers.push(infrastruktur);

			google.maps.event.addListener(infrastruktur, 'click', function() {
				show_pop('infrastruktur', value.id);
			});
		});
	});
}

function setAllMap(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

function update_data()
{
	setAllMap(null);

	$('input[name="kecamatan_id"]:checked').each(function() {
		var id_kecamatan = this.value;
		$('input[name="jenis"]:checked').each(function() {
			var jenis_infrastruktur = this.value;

			if(jenis_infrastruktur == 'ruas_jalan')
			{
				ambil_ruas_jalan(id_kecamatan);
			}else if(jenis_infrastruktur == 'jembatan')
			{
				ambil_jembatan(id_kecamatan);
			}
			else if(jenis_infrastruktur == 'gorong_gorong')
			{
				ambil_gorong_gorong(id_kecamatan);
			}
			else if(jenis_infrastruktur == 'infrastruktur')
			{
				ambil_infrastruktur(id_kecamatan);
			}
		});
	});
}

function show_pop(jenis, id)
{
	//sembunyikan detail lainnya
	$('#detail_ruas_jalan, #detail_jembatan, #detail_gorong_gorong, #detail_infrastruktur').hide();

	//ambil data json nya terlebih dahulu
	$.getJSON( base_url+"ajax/detail_"+jenis+"/"+id, function( data ) {
		if(jenis=='ruas_jalan')
		{
			$('#detail_ruas_jalan #nama_kecamatan').html(data.nama_kecamatan);
			$('#detail_ruas_jalan #nama_ruas').html(data.nama_ruas);
			$('#detail_ruas_jalan #nama_pangkal_ruas').html(data.nama_pangkal_ruas);
			$('#detail_ruas_jalan #nama_ujung_ruas').html(data.nama_ujung_ruas);
			$('#detail_ruas_jalan #titik_pengenal_awal').html(data.titik_pengenal_awal);
			$('#detail_ruas_jalan #titik_pengenal_akhir').html(data.titik_pengenal_akhir);
			$('#detail_ruas_jalan #no_gps').html(data.no_gps);
			$('#detail_ruas_jalan #koordinat_gps').html(data.koordinat_gps);
			$('#detail_ruas_jalan #panjang_ruas').html(data.panjang_ruas+' Km');
			$('#detail_ruas_jalan #lebar').html(data.lebar+' m');
			$('#detail_ruas_jalan #tipe_permukaan_jalan').html(data.tipe_permukaan_jalan);
			$('#detail_ruas_jalan #kondisi_permukaan_jalan').html(data.kondisi_permukaan_jalan);
			$('#detail_ruas_jalan').show();
		}
		if(jenis=='jembatan')
		{
			$('#detail_jembatan #nama_kecamatan').html(data.nama_kecamatan);
			$('#detail_jembatan #nama_ruas').html(data.nama_ruas);
			$('#detail_jembatan #bahan_bangunan_atas').html(data.bahan_bangunan_atas);
			$('#detail_jembatan #kondisi_bangunan_atas').html(data.kondisi_bangunan_atas);
			$('#detail_jembatan #bahan_lantai').html(data.bahan_lantai);
			$('#detail_jembatan #kondisi_lantai').html(data.kondisi_lantai);
			$('#detail_jembatan #bahan_pondasi').html(data.bahan_pondasi);
			$('#detail_jembatan #kondisi_pondasi').html(data.kondisi_pondasi);
			$('#detail_jembatan #no_gps').html(data.no_gps);
			$('#detail_jembatan #koordinat_gps').html(data.koordinat_gps);
			$('#detail_jembatan #panjang').html(data.panjang+' m');
			$('#detail_jembatan #lebar').html(data.lebar+' m');
			$('#detail_jembatan').show();
		}
		if(jenis=='gorong_gorong')
		{
			$('#detail_gorong_gorong #nama_kecamatan').html(data.nama_kecamatan);
			$('#detail_gorong_gorong #nama_ruas').html(data.nama_ruas);
			$('#detail_gorong_gorong #bahan_bangunan_atas').html(data.bahan_bangunan_atas);
			$('#detail_gorong_gorong #kondisi_bangunan_atas').html(data.kondisi_bangunan_atas);
			$('#detail_gorong_gorong #no_gps').html(data.no_gps);
			$('#detail_gorong_gorong #koordinat_gps').html(data.koordinat_gps);
			$('#detail_gorong_gorong #panjang').html(data.panjang+' m');
			$('#detail_gorong_gorong #lebar').html(data.lebar+' m');
			$('#detail_gorong_gorong').show();
		}
		if(jenis=='infrastruktur')
		{
			$('#detail_infrastruktur #nama_kecamatan').html(data.nama_kecamatan);
			$('#detail_infrastruktur #nama_ruas').html(data.nama_ruas);
			$('#detail_infrastruktur #nama_infrastruktur').html(data.nama_infrastruktur);
			$('#detail_infrastruktur #jenis_infrastruktur').html(data.jenis_infrastruktur);
			$('#detail_infrastruktur #kondisi').html(data.kondisi);
			$('#detail_infrastruktur #no_gps').html(data.no_gps);
			$('#detail_infrastruktur #koordinat_gps').html(data.koordinat_gps);
			$('#detail_infrastruktur').show();
		}



		$('.thumb_container').html('');
		$.each(data.foto, function( index, value ) {
			var append = "<img class='pop_thumb' src='"+base_url+"source/thumb/100x100/"+value.filename+"' onclick='show_big_image(\""+value.filename+"\")'/>";
			$('.thumb_container').append(append);
		});

		$('#blackscreen, #hidden').fadeIn(300);
	});
}

function show_big_image(filename)
{
	//tampilkan big_image
	$('#big_image').attr('src', base_url+'source/thumb/w960/'+filename);
	$('#big_image_container').fadeIn(300);
}

$(document).ready(function(){
	inisialisasi();
	$('#big_image_container, #blackscreen, #hidden').hide();

	$("input[name='jenis'], input[name='kecamatan_id']").change(function(){
		update_data();
	});

	//efek klik close pop
	$('#close_pop').click(function(){
		$('#blackscreen, #hidden').fadeOut(300);
	});

	//efek klik close big image
	$('#close_image').click(function(){
		$('#big_image_container').fadeOut(300);
	});

	//positioning big image container
	var width = ($(window).width()-960)/2;
	$('#big_image_container').css('left', width);
});