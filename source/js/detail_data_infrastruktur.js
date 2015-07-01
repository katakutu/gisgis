var base_url = "http://localhost/bky/";

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
	$('#big_image_container, #blackscreen, #hidden').hide();

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