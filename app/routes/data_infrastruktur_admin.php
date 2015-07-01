<?php 
	Route::get('/admin/data_infrastruktur', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@index'));

	Route::get('/admin/data_infrastruktur/ruas_jalan', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@ruas_jalan'));
	Route::get('/admin/data_infrastruktur/ruas_jalan/tambah', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@tambah_ruas_jalan'));
	Route::get('/admin/data_infrastruktur/ruas_jalan/edit/{id}', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@edit_ruas_jalan'));
	Route::get('/admin/data_infrastruktur/ruas_jalan/delete/{id}', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@hapus_ruas_jalan'));

	Route::get('/admin/data_infrastruktur/jembatan', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@jembatan'));
	Route::get('/admin/data_infrastruktur/jembatan/tambah', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@tambah_jembatan'));
	Route::get('/admin/data_infrastruktur/jembatan/edit/{id}', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@edit_jembatan'));
	Route::get('/admin/data_infrastruktur/jembatan/delete/{id}', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@hapus_jembatan'));

	Route::get('/admin/data_infrastruktur/gorong_gorong', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@gorong_gorong'));
	Route::get('/admin/data_infrastruktur/gorong_gorong/tambah', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@tambah_gorong_gorong'));
	Route::get('/admin/data_infrastruktur/gorong_gorong/edit/{id}', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@edit_gorong_gorong'));
	Route::get('/admin/data_infrastruktur/gorong_gorong/delete/{id}', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@hapus_gorong_gorong'));

	Route::get('/admin/data_infrastruktur/infrastruktur', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@infrastruktur'));
	Route::get('/admin/data_infrastruktur/infrastruktur/tambah', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@tambah_infrastruktur'));
	Route::get('/admin/data_infrastruktur/infrastruktur/edit/{id}', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@edit_infrastruktur'));
	Route::get('/admin/data_infrastruktur/infrastruktur/delete/{id}', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@hapus_infrastruktur'));

	Route::get('/admin/data_infrastruktur/hapus_foto/{id}', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@hapus_foto'));



//=================================================================================================================================================
//	POST
//=================================================================================================================================================
	Route::post('/admin/data_infrastruktur/ruas_jalan/tambah', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@simpan_ruas_jalan'));
	Route::post('/admin/data_infrastruktur/ruas_jalan/edit/{id}', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@update_ruas_jalan'));

	Route::post('/admin/data_infrastruktur/jembatan/tambah', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@simpan_jembatan'));
	Route::post('/admin/data_infrastruktur/jembatan/edit/{id}', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@update_jembatan'));

	Route::post('/admin/data_infrastruktur/gorong_gorong/tambah', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@simpan_gorong_gorong'));
	Route::post('/admin/data_infrastruktur/gorong_gorong/edit/{id}', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@update_gorong_gorong'));

	Route::post('/admin/data_infrastruktur/infrastruktur/tambah', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@simpan_infrastruktur'));
	Route::post('/admin/data_infrastruktur/infrastruktur/edit/{id}', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@update_infrastruktur'));

	Route::post('/admin/data_infrastruktur/ajax/upload_foto', array('before'=>'auth_admin', 'uses'=>'AdminInfrastruktur@ajax_upload_foto'));
?>