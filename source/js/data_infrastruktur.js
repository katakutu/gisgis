$(document).ready(function() {
	var base_url = "http://localhost/bky/";

	$('#tombol').click(function(){
		var kecamatan = $('#select_kecamatan').val();
		var jenis = $('#data').val();
		window.location.href = base_url+'data_infrastruktur/'+kecamatan+'/'+jenis+'/1';
	});
});