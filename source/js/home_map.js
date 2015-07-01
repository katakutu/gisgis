var peta;
var array = new Array();
var garis;
var dragstart;
var dragend;

//fungsi inisialisasi membuat peta
function inisialisasi()
{
	//MEMBUAT PROPERTIES DARI PETA
	var properti = {
		center:new google.maps.LatLng(-0.024719237514403372,109.324951171875),
		zoom:10,
		mapTypeId:google.maps.MapTypeId.TERRAIN
	};

	//MEMBUAT SEBUAH PETA DENGAN PROPERTIES DARI VARIABEL properti
	peta = new google.maps.Map(document.getElementById('peta'),properti);	
}
$(document).ready(inisialisasi);