$(document).ready(function() {
	$('#blackscreen, #upload_loading').hide();

	$('#tambah_foto').click(function(){
		$('#input_foto').trigger('click');
	});

	$('#input_foto').change(function(){
		$('#form_upload_foto').ajaxSubmit({
			dataType: 'json',
			success:  after_upload //call function after success
		});
		$('#blackscreen').fadeIn(300);
		$('#upload_loading').fadeIn(300);
	});

	function after_upload(data)
	{
		$('#blackscreen, #upload_loading').fadeOut(300);
		var append = '';

		append += 	'<div class="foto_item">';
		append +=		'<img src="http://localhost/bky/source/thumb/100x100/'+data.filename+'" alt="">';/*perlu diubah sourcenya*/
		append +=		'<a href="" class="delete_foto">Delete</a>';
		append +=	'</div>';

		$('#tempat_foto').append(append);
	}
});