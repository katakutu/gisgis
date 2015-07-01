<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::filter('auth_admin', function(){
	if(Session::get('level') != 'admin')
	{
		return Redirect::to('/');
	}
});

//=================================================================================================
//PUBLIC ROUTES
//=================================================================================================
Route::get('/', array('uses'=>'PublicController@home'));
Route::get('/profil', array('uses'=>'PublicController@profil'));
Route::get('/test', array('uses'=>'PublicController@test'));
Route::get('/agenda', array('uses'=>'PublicController@agenda'));
Route::get('/download', array('uses'=>'PublicController@download'));
Route::get('/berita', array('uses'=>'PublicController@berita'));
Route::get('/hubungi_kami', array('uses'=>'PublicController@hubungi_kami'));
Route::get('/galeri', array('uses'=>'PublicController@galeri'));
Route::get('/hubungi_kami', array('uses'=>'PublicController@hubungi_kami'));
Route::get('/read/{slug}', array('uses'=>'PublicController@read'));
Route::get('/sig_perbatasan', array('uses'=>'PublicController@sig_perbatasan'));
Route::get('/data_infrastruktur', array('uses'=>'PublicController@data_infrastruktur_kosong'));
Route::get('/data_infrastruktur/{id_kecamatan}/{jenis}/{page}', array('uses'=>'PublicController@data_infrastruktur'));

Route::get('/ajax/ambil_ruas_jalan/{id_kecamatan}', array('uses'=>'PublicAjax@ambil_ruas_jalan'));
Route::get('/ajax/ambil_jembatan/{id_kecamatan}', array('uses'=>'PublicAjax@ambil_jembatan'));
Route::get('/ajax/ambil_gorong_gorong/{id_kecamatan}', array('uses'=>'PublicAjax@ambil_gorong_gorong'));
Route::get('/ajax/ambil_infrastruktur/{id_kecamatan}', array('uses'=>'PublicAjax@ambil_infrastruktur'));

Route::get('/ajax/detail_ruas_jalan/{id}', array('uses'=>'PublicAjax@detail_ruas_jalan'));
Route::get('/ajax/detail_jembatan/{id}', array('uses'=>'PublicAjax@detail_jembatan'));
Route::get('/ajax/detail_gorong_gorong/{id}', array('uses'=>'PublicAjax@detail_gorong_gorong'));
Route::get('/ajax/detail_infrastruktur/{id}', array('uses'=>'PublicAjax@detail_infrastruktur'));




//=================================================================================================
//ADMIN ROUTES
//=================================================================================================
Route::get('/login', function(){return View::make('admin.login');});
Route::get('/admin/tulis_artikel', array('before'=>'auth_admin', 'uses'=>'AdminController@tulis_artikel'));
Route::get('/admin/profil', array('before'=>'auth_admin', 'uses'=>'AdminController@profil'));
Route::get('/admin/download', array('before'=>'auth_admin', 'uses'=>'AdminController@download'));
Route::get('/admin/delete_download/{id}', array('before'=>'auth_admin', 'uses'=>'AdminController@delete_download'));
Route::get('/admin/agenda', array('before'=>'auth_admin', 'uses'=>'AdminController@agenda'));
Route::get('/admin/galeri', array('before'=>'auth_admin', 'uses'=>'AdminController@galeri'));
Route::get('/admin/berita', array('before'=>'auth_admin', 'uses'=>'AdminController@berita'));
Route::get('/admin/ubah_password', array('before'=>'auth_admin', 'uses'=>'AdminController@ubah_password'));
Route::get('/admin/admin', array('before'=>'auth_admin', 'uses'=>'AdminController@data_admin'));
Route::get('/admin/hubungi_kami', array('before'=>'auth_admin', 'uses'=>'AdminController@hubungi_kami'));
Route::get('/admin/delete_admin/{id}', array('before'=>'auth_admin', 'uses'=>'AdminController@delete_admin'));
Route::get('/admin/delete_galeri/{id}', array('before'=>'auth_admin', 'uses'=>'AdminController@delete_galeri'));
Route::get('/admin/delete/{id}', array('before'=>'auth_admin', 'uses'=>'AdminController@delete_konten'));
Route::get('/admin/edit/{id}', array('before'=>'auth_admin', 'uses'=>'AdminController@edit_konten'));
Route::get('/admin/up/{id}', array('before'=>'auth_admin', 'uses'=>'AdminController@up_konten'));
Route::get('/admin/down/{id}', array('before'=>'auth_admin', 'uses'=>'AdminController@down_konten'));
Route::get('/admin/logout', function(){
	Session::flush();
	return Redirect::to('/');
});

include_once('routes/data_infrastruktur_admin.php');


Route::post('/login', array('uses'=>'AdminController@login_proses'));
Route::post('/admin/simpan_artikel', array('uses'=>'AdminController@simpan_artikel'));
Route::post('/admin/edit/{id}', array('uses'=>'AdminController@update_artikel'));
Route::post('/admin/galeri', array('before'=>'auth_admin', 'uses'=>'AdminController@tambah_galeri'));
Route::post('/admin/download', array('before'=>'auth_admin', 'uses'=>'AdminController@tambah_download'));
Route::post('/admin/ubah_password', array('before'=>'auth_admin', 'uses'=>'AdminController@update_password'));
Route::post('/admin/admin', array('before'=>'auth_admin', 'uses'=>'AdminController@simpan_admin'));
Route::post('/admin/hubungi_kami', array('before'=>'auth_admin', 'uses'=>'AdminController@simpan_hubungi_kami'));

