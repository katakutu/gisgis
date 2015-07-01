<?php

class AdminInfrastruktur extends BaseController {
	public function index(){
		return View::make('admin.data_infrastruktur.home');
	}

	public function ruas_jalan()
	{
		$data['ruas_jalan'] = DB::table('ruas_jalan')->get();
		foreach($data['ruas_jalan'] as $key=>$value)
		{
			$data['ruas_jalan'][$key]->nama_kecamatan = $this->ambil_nama_kecamatan($value->kecamatan_id);
		}
		return View::make('admin.data_infrastruktur.ruas_jalan', $data);
	}

	public function tambah_ruas_jalan()
	{
		$data['kecamatan'] = DB::table('kecamatan')->get();
		return View::make('admin.data_infrastruktur.tambah_ruas_jalan', $data);
	}

	public function simpan_ruas_jalan()
	{
		require('source/php/gPoint.php');

		$gpoint = new gPoint();
		$gpoint->setUTM( Input::get('easting'), Input::get('northing'), Input::get('primer'));
		$gpoint->convertTMtoLL();
		$long = $gpoint->Long();
		$lat = $gpoint->Lat();

		$ruas_jalan = New Ruasjalan;
		$ruas_jalan->nama_ruas = Input::get('nama_ruas');
		$ruas_jalan->nama_pangkal_ruas = Input::get('nama_pangkal_ruas');
		$ruas_jalan->nama_ujung_ruas = Input::get('nama_ujung_ruas');
		$ruas_jalan->titik_pengenal_awal = Input::get('titik_pengenal_awal');
		$ruas_jalan->titik_pengenal_akhir = Input::get('titik_pengenal_akhir');
		$ruas_jalan->no_gps = Input::get('no_gps');
		$ruas_jalan->koordinat_gps = Input::get('primer')." ".Input::get('easting')." ".Input::get('northing');
		$ruas_jalan->long = $long;
		$ruas_jalan->lat = $lat;
		$ruas_jalan->panjang_ruas = str_replace(',', '.', Input::get('panjang_ruas'));
		$ruas_jalan->lebar = str_replace(',', '.', Input::get('lebar'));
		$ruas_jalan->tipe_permukaan_jalan = Input::get('tipe_permukaan_jalan');
		$ruas_jalan->kondisi_permukaan_jalan = Input::get('kondisi_permukaan_jalan');
		$ruas_jalan->kecamatan_id = Input::get('kecamatan');
		$ruas_jalan->save();

		//periksa apakah gambar kosong atau tidak
		$thumb = Input::file('gambar');
		if(!empty($thumb) && strlen($thumb)>0)
		{
			$id_pemilik = $ruas_jalan->id;
			$kategori_pemilik = "ruas_jalan";

			//define filename
			$filename = md5(time());

			Image::make(Input::file('gambar')->getRealPath())->grab(100, 100)->save('source/thumb/100x100/'.$filename.'.jpg');
			Image::make(Input::file('gambar')->getRealPath())->grab(400, 250)->save('source/thumb/410x250/'.$filename.'.jpg');
			Image::make(Input::file('gambar')->getRealPath())->resize(960, null, true)->save('source/thumb/w960/'.$filename.'.jpg');

			DB::table('foto')
				->insert(array(
					'id_pemilik'=>$id_pemilik,
					'kategori_pemilik'=>$kategori_pemilik,
					'filename'=>$filename.'.jpg'
				));
		}

		return Redirect::to('admin/data_infrastruktur/ruas_jalan');
	}

	public function edit_ruas_jalan($id)
	{
		//ambil data ruas jalan
		$data['ruas_jalan'] = DB::table('ruas_jalan')->where('id', '=', $id)->first();

		//ambil foto ruas jalan tsb
		$data['foto_array'] = DB::table('foto')->where('id_pemilik', '=', $data['ruas_jalan']->id)->where('kategori_pemilik', '=', 'ruas_jalan')->get();

		$data['kecamatan'] = DB::table('kecamatan')->get();

		return View::make('admin.data_infrastruktur.edit_ruas_jalan', $data);
	}

	public function ajax_upload_foto()
	{
		//define filename
		$filename = md5(time());

		Image::make(Input::file('foto')->getRealPath())->grab(100, 100)->save('source/thumb/100x100/'.$filename.'.jpg');
		Image::make(Input::file('foto')->getRealPath())->grab(400, 250)->save('source/thumb/410x250/'.$filename.'.jpg');
		Image::make(Input::file('foto')->getRealPath())->resize(960, null, true)->save('source/thumb/w960/'.$filename.'.jpg');		

		DB::table('foto')
		->insert(array(
			'id_pemilik'=>Input::get('id'),
			'kategori_pemilik'=>Input::get('kategori'),
			'filename'=>$filename.'.jpg'
		));

		$data['filename'] = $filename.'.jpg';
		echo json_encode($data);
	}

	public function hapus_foto($id)
	{
		$data = DB::table('foto')->where('id', '=', $id)->first();
		DB::table('foto')->where('id', '=', $id)->delete();

		unlink('source/thumb/100x100/'.$data->filename);
		unlink('source/thumb/410x250/'.$data->filename);
		unlink('source/thumb/w960/'.$data->filename);

		return Redirect::to('admin/data_infrastruktur/'.$data->kategori_pemilik.'/edit/'.$data->id_pemilik);
	}

	public function update_ruas_jalan($id)
	{
		require('source/php/gPoint.php');

		$gpoint = new gPoint();
		$gpoint->setUTM( Input::get('easting'), Input::get('northing'), Input::get('primer'));
		$gpoint->convertTMtoLL();
		$long = $gpoint->Long();
		$lat = $gpoint->Lat();

		DB::table('ruas_jalan')->where('id', '=', $id)
		->update(array(
			'nama_ruas'=>Input::get('nama_ruas'),
			'nama_pangkal_ruas'=>Input::get('nama_pangkal_ruas'),
			'nama_ujung_ruas'=>Input::get('nama_ujung_ruas'),
			'titik_pengenal_awal'=>Input::get('titik_pengenal_awal'),
			'titik_pengenal_akhir'=>Input::get('titik_pengenal_akhir'),
			'no_gps'=>Input::get('no_gps'),
			'koordinat_gps'=>Input::get('primer')." ".Input::get('easting')." ".Input::get('northing'),
			'long'=>$long,
			'lat'=>$lat,
			'panjang_ruas'=>str_replace(',', '.', Input::get('panjang_ruas')),
			'lebar'=>str_replace(',', '.', Input::get('lebar')),
			'tipe_permukaan_jalan'=>Input::get('tipe_permukaan_jalan'),
			'kondisi_permukaan_jalan'=>Input::get('kondisi_permukaan_jalan'),
			'kecamatan_id'=>Input::get('kecamatan')
		));

		return Redirect::to('admin/data_infrastruktur/ruas_jalan');
	}

	public function hapus_ruas_jalan($id)
	{
		$foto_array = DB::table('foto')->where('id_pemilik', '=', $id)->where('kategori_pemilik', '=', 'ruas_jalan')->get();

		//hapus setiap foto
		foreach($foto_array as $key=>$value)
		{
			unlink('source/thumb/100x100/'.$value->filename);
			unlink('source/thumb/410x250/'.$value->filename);
			unlink('source/thumb/w960/'.$value->filename);
		}

		//kemudian hapus data ruas jelan tsb
		DB::table('ruas_jalan')->where('id', '=', $id)->delete();

		return Redirect::to('admin/data_infrastruktur/ruas_jalan');
	}

	public function jembatan()
	{
		$data['jembatan'] = DB::table('jembatan')->get();
		foreach($data['jembatan'] as $key=>$value)
		{
			$data['jembatan'][$key]->nama_kecamatan = $this->ambil_nama_kecamatan($value->kecamatan_id);
			$data['jembatan'][$key]->nama_ruas = $this->ambil_nama_ruas_jalan($value->id_ruas_jalan);
		}
		return View::make('admin.data_infrastruktur.jembatan', $data);
	}

	public function tambah_jembatan()
	{
		$data['kecamatan'] = DB::table('kecamatan')->get();
		$data['ruas_jalan'] = DB::table('ruas_jalan')->get();
		return View::make('admin.data_infrastruktur.tambah_jembatan', $data);
	}

	public function simpan_jembatan()
	{
		require('source/php/gPoint.php');

		$gpoint = new gPoint();
		$gpoint->setUTM( Input::get('easting'), Input::get('northing'), Input::get('primer'));
		$gpoint->convertTMtoLL();
		$long = $gpoint->Long();
		$lat = $gpoint->Lat();

		$jembatan = New Jembatan;
		$jembatan->id_ruas_jalan = Input::get('id_ruas_jalan');
		$jembatan->bahan_bangunan_atas = Input::get('bahan_bangunan_atas');
		$jembatan->kondisi_bangunan_atas = Input::get('kondisi_bangunan_atas');
		$jembatan->bahan_lantai = Input::get('bahan_lantai');
		$jembatan->kondisi_lantai = Input::get('kondisi_lantai');
		$jembatan->bahan_pondasi = Input::get('bahan_pondasi');
		$jembatan->kondisi_pondasi = Input::get('kondisi_pondasi');
		$jembatan->no_gps = Input::get('no_gps');
		$jembatan->koordinat_gps = Input::get('primer')." ".Input::get('easting')." ".Input::get('northing');
		$jembatan->long = $long;
		$jembatan->lat = $lat;
		$jembatan->panjang = str_replace(',', '.', Input::get('panjang'));
		$jembatan->lebar = str_replace(',', '.', Input::get('lebar'));
		$jembatan->kecamatan_id = Input::get('kecamatan');
		$jembatan->save();

		//periksa apakah gambar kosong atau tidak
		$thumb = Input::file('gambar');
		if(!empty($thumb) && strlen($thumb)>0)
		{
			$id_pemilik = $jembatan->id;
			$kategori_pemilik = "jembatan";

			//define filename
			$filename = md5(time());

			Image::make(Input::file('gambar')->getRealPath())->grab(100, 100)->save('source/thumb/100x100/'.$filename.'.jpg');
			Image::make(Input::file('gambar')->getRealPath())->grab(400, 250)->save('source/thumb/410x250/'.$filename.'.jpg');
			Image::make(Input::file('gambar')->getRealPath())->resize(960, null, true)->save('source/thumb/w960/'.$filename.'.jpg');

			DB::table('foto')
				->insert(array(
					'id_pemilik'=>$id_pemilik,
					'kategori_pemilik'=>$kategori_pemilik,
					'filename'=>$filename.'.jpg'
				));
		}

		return Redirect::to('admin/data_infrastruktur/jembatan');
	}

	public function edit_jembatan($id)
	{
		//ambil data jembatan
		$data['jembatan'] = DB::table('jembatan')->where('id', '=', $id)->first();

		//ambil foto jembatan tsb
		$data['foto_array'] = DB::table('foto')->where('id_pemilik', '=', $data['jembatan']->id)->where('kategori_pemilik', '=', 'jembatan')->get();

		$data['kecamatan'] = DB::table('kecamatan')->get();
		$data['ruas_jalan'] = DB::table('ruas_jalan')->get();

		return View::make('admin.data_infrastruktur.edit_jembatan', $data);
	}

	public function update_jembatan($id)
	{
		require('source/php/gPoint.php');

		$gpoint = new gPoint();
		$gpoint->setUTM( Input::get('easting'), Input::get('northing'), Input::get('primer'));
		$gpoint->convertTMtoLL();
		$long = $gpoint->Long();
		$lat = $gpoint->Lat();

		DB::table('jembatan')->where('id', '=', $id)
		->update(array(
			'id_ruas_jalan'=>Input::get('id_ruas_jalan'),
			'bahan_bangunan_atas'=>Input::get('bahan_bangunan_atas'),
			'kondisi_bangunan_atas'=>Input::get('kondisi_bangunan_atas'),
			'bahan_lantai'=>Input::get('bahan_lantai'),
			'kondisi_lantai'=>Input::get('kondisi_lantai'),
			'bahan_pondasi'=>Input::get('bahan_pondasi'),
			'kondisi_pondasi'=>Input::get('kondisi_pondasi'),
			'no_gps'=>Input::get('no_gps'),
			'koordinat_gps'=>Input::get('primer')." ".Input::get('easting')." ".Input::get('northing'),
			'long'=>$long,
			'lat'=>$lat,
			'panjang'=>str_replace(',', '.', Input::get('panjang')),
			'lebar'=>str_replace(',', '.', Input::get('lebar')),
			'kecamatan_id'=>Input::get('kecamatan')
		));

		return Redirect::to('admin/data_infrastruktur/jembatan');
	}

	public function hapus_jembatan($id)
	{
		$foto_array = DB::table('foto')->where('id_pemilik', '=', $id)->where('kategori_pemilik', '=', 'jembatan')->get();

		//hapus setiap foto
		foreach($foto_array as $key=>$value)
		{
			unlink('source/thumb/100x100/'.$value->filename);
			unlink('source/thumb/410x250/'.$value->filename);
			unlink('source/thumb/w960/'.$value->filename);
		}

		//kemudian hapus data ruas jelan tsb
		DB::table('jembatan')->where('id', '=', $id)->delete();

		return Redirect::to('admin/data_infrastruktur/jembatan');
	}

	public function gorong_gorong()
	{
		$data['gorong_gorong'] = DB::table('gorong_gorong')->get();
		foreach($data['gorong_gorong'] as $key=>$value)
		{
			$data['gorong_gorong'][$key]->nama_kecamatan = $this->ambil_nama_kecamatan($value->kecamatan_id);
			$data['gorong_gorong'][$key]->nama_ruas = $this->ambil_nama_ruas_jalan($value->id_ruas_jalan);
		}
		return View::make('admin.data_infrastruktur.gorong_gorong', $data);
	}

	public function tambah_gorong_gorong()
	{
		$data['kecamatan'] = DB::table('kecamatan')->get();
		$data['ruas_jalan'] = DB::table('ruas_jalan')->get();
		return View::make('admin.data_infrastruktur.tambah_gorong_gorong', $data);
	}

	public function simpan_gorong_gorong()
	{
		require('source/php/gPoint.php');

		$gpoint = new gPoint();
		$gpoint->setUTM( Input::get('easting'), Input::get('northing'), Input::get('primer'));
		$gpoint->convertTMtoLL();
		$long = $gpoint->Long();
		$lat = $gpoint->Lat();

		$gorong_gorong = New Goronggorong;
		$gorong_gorong->id_ruas_jalan = Input::get('id_ruas_jalan');
		$gorong_gorong->bahan_bangunan_atas = Input::get('bahan_bangunan_atas');
		$gorong_gorong->kondisi_bangunan_atas = Input::get('kondisi_bangunan_atas');
		$gorong_gorong->no_gps = Input::get('no_gps');
		$gorong_gorong->koordinat_gps = Input::get('primer')." ".Input::get('easting')." ".Input::get('northing');
		$gorong_gorong->long = $long;
		$gorong_gorong->lat = $lat;
		$gorong_gorong->panjang = str_replace(',', '.', Input::get('panjang'));
		$gorong_gorong->lebar = str_replace(',', '.', Input::get('lebar'));
		$gorong_gorong->kecamatan_id = Input::get('kecamatan');
		$gorong_gorong->save();

		//periksa apakah gambar kosong atau tidak
		$thumb = Input::file('gambar');
		if(!empty($thumb) && strlen($thumb)>0)
		{
			$id_pemilik = $gorong_gorong->id;
			$kategori_pemilik = "gorong_gorong";

			//define filename
			$filename = md5(time());

			Image::make(Input::file('gambar')->getRealPath())->grab(100, 100)->save('source/thumb/100x100/'.$filename.'.jpg');
			Image::make(Input::file('gambar')->getRealPath())->grab(400, 250)->save('source/thumb/410x250/'.$filename.'.jpg');
			Image::make(Input::file('gambar')->getRealPath())->resize(960, null, true)->save('source/thumb/w960/'.$filename.'.jpg');

			DB::table('foto')
				->insert(array(
					'id_pemilik'=>$id_pemilik,
					'kategori_pemilik'=>$kategori_pemilik,
					'filename'=>$filename.'.jpg'
				));
		}

		return Redirect::to('admin/data_infrastruktur/gorong_gorong');
	}

	public function edit_gorong_gorong($id)
	{
		//ambil data gorong_gorong
		$data['gorong_gorong'] = DB::table('gorong_gorong')->where('id', '=', $id)->first();

		//ambil foto gorong_gorong tsb
		$data['foto_array'] = DB::table('foto')->where('id_pemilik', '=', $data['gorong_gorong']->id)->where('kategori_pemilik', '=', 'gorong_gorong')->get();

		$data['kecamatan'] = DB::table('kecamatan')->get();
		$data['ruas_jalan'] = DB::table('ruas_jalan')->get();

		return View::make('admin.data_infrastruktur.edit_gorong_gorong', $data);
	}

	public function update_gorong_gorong($id)
	{
		require('source/php/gPoint.php');

		$gpoint = new gPoint();
		$gpoint->setUTM( Input::get('easting'), Input::get('northing'), Input::get('primer'));
		$gpoint->convertTMtoLL();
		$long = $gpoint->Long();
		$lat = $gpoint->Lat();

		DB::table('gorong_gorong')->where('id', '=', $id)
		->update(array(
			'id_ruas_jalan'=>Input::get('id_ruas_jalan'),
			'bahan_bangunan_atas'=>Input::get('bahan_bangunan_atas'),
			'kondisi_bangunan_atas'=>Input::get('kondisi_bangunan_atas'),
			'no_gps'=>Input::get('no_gps'),
			'koordinat_gps'=>Input::get('primer')." ".Input::get('easting')." ".Input::get('northing'),
			'long'=>$long,
			'lat'=>$lat,
			'panjang'=>str_replace(',', '.', Input::get('panjang')),
			'lebar'=>str_replace(',', '.', Input::get('lebar')),
			'kecamatan_id'=>Input::get('kecamatan')
		));

		return Redirect::to('admin/data_infrastruktur/gorong_gorong');
	}

	public function hapus_gorong_gorong($id)
	{
		$foto_array = DB::table('foto')->where('id_pemilik', '=', $id)->where('kategori_pemilik', '=', 'gorong_gorong')->get();

		//hapus setiap foto
		foreach($foto_array as $key=>$value)
		{
			unlink('source/thumb/100x100/'.$value->filename);
			unlink('source/thumb/410x250/'.$value->filename);
			unlink('source/thumb/w960/'.$value->filename);
		}

		//kemudian hapus data ruas jelan tsb
		DB::table('gorong_gorong')->where('id', '=', $id)->delete();

		return Redirect::to('admin/data_infrastruktur/gorong_gorong');
	}

	public function infrastruktur()
	{
		$data['infrastruktur'] = DB::table('infrastruktur')->get();
		foreach($data['infrastruktur'] as $key=>$value)
		{
			$data['infrastruktur'][$key]->nama_kecamatan = $this->ambil_nama_kecamatan($value->kecamatan_id);
			$data['infrastruktur'][$key]->nama_ruas = $this->ambil_nama_ruas_jalan($value->id_ruas_jalan);
		}
		return View::make('admin.data_infrastruktur.infrastruktur', $data);
	}

	public function tambah_infrastruktur()
	{
		$data['kecamatan'] = DB::table('kecamatan')->get();
		$data['ruas_jalan'] = DB::table('ruas_jalan')->get();
		return View::make('admin.data_infrastruktur.tambah_infrastruktur', $data);
	}

	public function simpan_infrastruktur()
	{
		require('source/php/gPoint.php');

		$gpoint = new gPoint();
		$gpoint->setUTM( Input::get('easting'), Input::get('northing'), Input::get('primer'));
		$gpoint->convertTMtoLL();
		$long = $gpoint->Long();
		$lat = $gpoint->Lat();

		$infrastruktur = New Infrastruktur;
		$infrastruktur->id_ruas_jalan = Input::get('id_ruas_jalan');
		$infrastruktur->kondisi = Input::get('kondisi');
		$infrastruktur->nama_infrastruktur = Input::get('nama_infrastruktur');
		$infrastruktur->jenis_infrastruktur = Input::get('jenis_infrastruktur');
		$infrastruktur->no_gps = Input::get('no_gps');
		$infrastruktur->koordinat_gps = Input::get('primer')." ".Input::get('easting')." ".Input::get('northing');
		$infrastruktur->long = $long;
		$infrastruktur->lat = $lat;
		$infrastruktur->kecamatan_id = Input::get('kecamatan');
		$infrastruktur->save();

		//periksa apakah gambar kosong atau tidak
		$thumb = Input::file('gambar');
		if(!empty($thumb) && strlen($thumb)>0)
		{
			$id_pemilik = $infrastruktur->id;
			$kategori_pemilik = "infrastruktur";

			//define filename
			$filename = md5(time());

			Image::make(Input::file('gambar')->getRealPath())->grab(100, 100)->save('source/thumb/100x100/'.$filename.'.jpg');
			Image::make(Input::file('gambar')->getRealPath())->grab(400, 250)->save('source/thumb/410x250/'.$filename.'.jpg');
			Image::make(Input::file('gambar')->getRealPath())->resize(960, null, true)->save('source/thumb/w960/'.$filename.'.jpg');

			DB::table('foto')
				->insert(array(
					'id_pemilik'=>$id_pemilik,
					'kategori_pemilik'=>$kategori_pemilik,
					'filename'=>$filename.'.jpg'
				));
		}

		return Redirect::to('admin/data_infrastruktur/infrastruktur');
	}

	public function edit_infrastruktur($id)
	{
		//ambil data infrastruktur
		$data['infrastruktur'] = DB::table('infrastruktur')->where('id', '=', $id)->first();

		//ambil foto infrastruktur tsb
		$data['foto_array'] = DB::table('foto')->where('id_pemilik', '=', $data['infrastruktur']->id)->where('kategori_pemilik', '=', 'infrastruktur')->get();

		$data['kecamatan'] = DB::table('kecamatan')->get();
		$data['ruas_jalan'] = DB::table('ruas_jalan')->get();

		return View::make('admin.data_infrastruktur.edit_infrastruktur', $data);
	}

	public function update_infrastruktur($id)
	{
		require('source/php/gPoint.php');

		$gpoint = new gPoint();
		$gpoint->setUTM( Input::get('easting'), Input::get('northing'), Input::get('primer'));
		$gpoint->convertTMtoLL();
		$long = $gpoint->Long();
		$lat = $gpoint->Lat();

		DB::table('infrastruktur')->where('id', '=', $id)
		->update(array(
			'id_ruas_jalan'=>Input::get('id_ruas_jalan'),
			'nama_infrastruktur'=>Input::get('nama_infrastruktur'),
			'jenis_infrastruktur'=>Input::get('jenis_infrastruktur'),
			'kondisi'=>Input::get('kondisi'),
			'no_gps'=>Input::get('no_gps'),
			'koordinat_gps'=>Input::get('primer')." ".Input::get('easting')." ".Input::get('northing'),
			'long'=>$long,
			'lat'=>$lat,
			'kecamatan_id'=>Input::get('kecamatan')
		));

		return Redirect::to('admin/data_infrastruktur/infrastruktur');
	}

	public function hapus_infrastruktur($id)
	{
		$foto_array = DB::table('foto')->where('id_pemilik', '=', $id)->where('kategori_pemilik', '=', 'infrastruktur')->get();

		//hapus setiap foto
		foreach($foto_array as $key=>$value)
		{
			unlink('source/thumb/100x100/'.$value->filename);
			unlink('source/thumb/410x250/'.$value->filename);
			unlink('source/thumb/w960/'.$value->filename);
		}

		//kemudian hapus data ruas jelan tsb
		DB::table('infrastruktur')->where('id', '=', $id)->delete();

		return Redirect::to('admin/data_infrastruktur/infrastruktur');
	}
//===========================================================================================================================
//	PRIVATE FUNCTION
//===========================================================================================================================


	private function ambil_nama_kecamatan($id_kecamatan)
	{
		$data = DB::table('kecamatan')->where('id', '=', $id_kecamatan)->first();
		return $data->nama_kecamatan;
	}

	private function ambil_nama_ruas_jalan($id_ruas_jalan)
	{
		$data = DB::table('ruas_jalan')->where('id', '=', $id_ruas_jalan)->first();
		return $data->nama_ruas;
	}
}