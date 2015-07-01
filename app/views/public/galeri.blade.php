@extends('layouts.public')
  <link rel="stylesheet" href="source/galeri/dist/css/lightbox.css">
@section('kiri')
    <div>
    	@foreach($galeri_array as $key=>$value)
	    	<a class="example-image-link" href="<?php echo "source/thumb/w960/".$value->filename ?>" data-lightbox="example-2" data-title="<?php echo $value->deskripsi ?>"><img class="example-image" src="<?php echo "source/thumb/410x250/".$value->filename ?>" width="240px" alt="<?php echo $value->deskripsi ?>"/></a>
    	@endforeach
    </div>


  <script src="source/galeri/dist/js/lightbox-plus-jquery.min.js"></script>
@stop