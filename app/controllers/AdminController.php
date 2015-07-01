<?php

class AdminController extends BaseController {

	public function login_proses()
	{
		$username = Input::get('username');
		$password = md5(Input::get('password'));

		$admin = DB::table('admin')
					->where('username', '=', $username)
					->where('password', '=', $password)
					->first();
		if(count($admin) == 1)
		{
			Session::put('level', 'admin');
			Session::put('id', $admin->id);
			return Redirect::to('/admin/tulis_artikel');
		}
		else
		{
			return Redirect::to('/login');
		}
	}

	public function tulis_artikel()
	{
		return View::make('admin.tulis_artikel');
	}

	public function simpan_artikel()
	{
		$kategori = Input::get('kategori');
		$judul = Input::get('judul');
		$gambar = Input::file('gambar')->getRealPath();
		$summary = Input::get('summary');
		$content = Input::get('content');

		$urutan = NULL;
		//jika profil, ambil urutan terakhir yang ada
		if($kategori=='profil')
		{
			$data = DB::table('konten')
			->select(DB::raw('MAX(urutan) as urutan_max'))
			->where('kategori', '=', 'profil')
			->first()->urutan_max;

			$urutan = $data + 1;
		}

		//define filename
		$filename = md5(time());

		//create new artikel
		$artikel = New Kontenmodel;
		$artikel->kategori = $kategori;
		$artikel->id_admin = Session::get('id');
		$artikel->views = 0;
		$artikel->judul = $this->escape_quote($judul);
		$artikel->gambar = $filename.'.jpg';
		$artikel->slug = $this->make_slug($judul);
		$artikel->content = $content;
		$artikel->summary = $summary;
		$artikel->date = date('Y-m-d');
		$artikel->urutan = $urutan;
		$artikel->save();

		Image::make(Input::file('gambar')->getRealPath())->grab(100, 100)->save('source/thumb/100x100/'.$filename.'.jpg');
		Image::make(Input::file('gambar')->getRealPath())->grab(400, 250)->save('source/thumb/410x250/'.$filename.'.jpg');

		return Redirect::to('admin/'.$kategori);	
	}

	public function profil()
	{
		$data['profil_array'] = $this->ambil_konten('profil', 'urutan');
		return View::make('admin.profil', $data);
	}

	public function agenda()
	{
		$data['agenda_array'] = $this->ambil_konten('agenda', 'id', 'DESC');
		return View::make('admin.agenda', $data);
	}

	public function berita()
	{
		$data['berita_array'] = $this->ambil_konten('berita', 'updated_at', 'DESC');
		return View::make('admin.berita', $data);
	}

	public function delete_konten($id)
	{
		$konten = DB::table('konten')->where('id', '=', $id)->first();
		$kategori = $konten->kategori;

		DB::table('konten')
			->where('id', '=', $id)
			->delete();

		return Redirect::to('admin/'.$kategori);
	}

	public function edit_konten($id)
	{
		$data['konten'] = DB::table('konten')
							->where('id', '=', $id)
							->first();
		return View::make('admin.edit_konten', $data);
	}

	public function update_artikel()
	{
		$id = Input::get('id');
		$judul = $this->escape_quote(Input::get('judul'));
		$thumb = Input::file('gambar');
		$summary = Input::get('summary');
		$content = Input::get('content');
		$id_author = Session::get('id');
		$date = date('Y-m-d');
		$slug = $this->make_slug(Input::get('judul'));

		DB::table('konten')
			->where('id', '=', $id)
			->update(array(
				'judul'=>$judul,
				'summary'=>$summary,
				'content'=>$content,
				'id_admin'=>$id_author,
				'date'=>$date,
				'slug'=>$slug
				));

		if(!empty($thumb) && strlen($thumb)>0)
		{
			//delete old thumb, upload new thumb, update thumb in database
			$old_thumb = DB::table('konten')
							->where('id', '=', $id)
							->first()->gambar;
			if(file_exists('source/thumb/100x100/'.$old_thumb))
			{
				unlink('source/thumb/100x100/'.$old_thumb);
				unlink('source/thumb/410x250/'.$old_thumb);
			}

			//define filename
			$filename = md5(time());

			Image::make(Input::file('gambar')->getRealPath())->grab(100, 100)->save('source/thumb/100x100/'.$filename.'.jpg');
			Image::make(Input::file('gambar')->getRealPath())->grab(400, 250)->save('source/thumb/410x250/'.$filename.'.jpg');

			//update thumb in database
			DB::table('konten')
				->where('id', '=', $id)
				->update(array('gambar'=>$filename.'.jpg'));
		}
		//ambil kategori konten
		$konten = DB::table('konten')->where('id', '=', $id)->first();
		$kategori = $konten->kategori;

		return Redirect::to('admin/'.$kategori);
	}

	public function download()
	{
		$data['download_array'] = DB::table('download')->get();
		return View::make('admin.download', $data);
	}

	public function tambah_download()
	{
		$filename = Input::file('files')->getClientOriginalName();
		$download = New Downloadmodel;
		$download->deskripsi = Input::get('deskripsi');
		$download->filename = $filename;
		$download->save();

		Input::file('files')->move('source/uploads',Input::file('files')->getClientOriginalName());
		return Redirect::to('admin/download');
	}

	public function galeri()
	{
		$data['galeri_array'] = DB::table('galeri')->get();
		return View::make('admin.galeri', $data);
	}

	public function tambah_galeri()
	{
		$filename = md5(time());
		$galeri = New Galerimodel;
		$galeri->deskripsi = Input::get('deskripsi');
		$galeri->filename = $filename.'.jpg';
		$galeri->save();

		Image::make(Input::file('gambar')->getRealPath())->grab(100, 100)->save('source/thumb/100x100/'.$filename.'.jpg');
		Image::make(Input::file('gambar')->getRealPath())->grab(400, 250)->save('source/thumb/410x250/'.$filename.'.jpg');
		Image::make(Input::file('gambar')->getRealPath())->resize(960, null, true)->save('source/thumb/w960/'.$filename.'.jpg');
		
		return Redirect::to('admin/galeri');
	}

	public function delete_download($id)
	{
		$filename = DB::table('download')
						->where('id', '=', $id)
						->first()->filename;

		DB::table('download')
			->where('id', '=', $id)
			->delete();

		if(file_exists('source/thumb/w960/'.$filename))
		{
			unlink('source/uploads'.$filename);
		}

		return Redirect::to('admin/download');
	}


	public function delete_galeri($id)
	{
		$filename = DB::table('galeri')
						->where('id', '=', $id)
						->first()->filename;

		DB::table('galeri')
			->where('id', '=', $id)
			->delete();

		if(file_exists('source/thumb/w960/'.$filename))
		{
			unlink('source/thumb/w960/'.$filename);
		}
		if(file_exists('source/thumb/100x100/'.$filename))
		{
			unlink('source/thumb/100x100/'.$filename);
		}
		if(file_exists('source/thumb/410x250/'.$filename))
		{
			unlink('source/thumb/410x250/'.$filename);
		}

		return Redirect::to('admin/galeri');
	}

	public function ubah_password()
	{
		$data['admin'] = DB::table('admin')->where('id', '=', Session::get('id'))->first();
		return View::make('admin.ubah_password', $data);
	}

	public function update_password()
	{
		$username = Input::get('username');
		$old_password = md5(Input::get('password_lama'));
		$new_password = md5(Input::get('password_baru'));

		$jumlah = DB::table('admin')
			->where('id', '=', Session::get('id'))
			->where('password', '=', $old_password)
			->get();

		DB::table('admin')
			->where('id', '=', Session::get('id'))
			->where('password', '=', $old_password)
			->update(array(
				'username'=>$username,
				'password'=>$new_password
				));

		if($jumlah==0)
		{
			$data['pesan'] = "Password lama anda salah, data tidak berhasil di ubah.";
		}
		else
		{
			$data['pesan'] = "Data berhasil di perbaharui.";	
		}
		
		$data['admin'] = DB::table('admin')->where('id', '=', Session::get('id'))->first();
		return View::make('admin.ubah_password', $data);
	}

	public function data_admin()
	{
		$data['admin'] = DB::table('admin')->get();
		return View::make('admin.data_admin', $data);
	}

	public function simpan_admin()
	{
		$username = Input::get('username');
		$password = md5(Input::get('password'));

		DB::table('admin')->insert(
			array(
				'username'=>$username,
				'password'=>$password
			)
		);

		return Redirect::to('admin/admin');
	}

	public function delete_admin($id)
	{
		DB::table('admin')->where('id', '=', $id)->delete();
		return Redirect::to('admin/admin');
	}

	public function hubungi_kami()
	{
		$data['hubungi_kami'] = DB::table('konten')->where('kategori', '=', 'hubungi_kami')->first();
		return View::make('admin.hubungi_kami', $data);
	}

	public function simpan_hubungi_kami()
	{
		$judul = Input::get('judul');
		$konten = Input::get('content');

		DB::table('konten')->where('kategori', '=', 'hubungi_kami')
		->update(array(
			'judul'=>$judul,
			'date'=>date('Y-m-d'),
			'content'=>$konten
		));

		$data['pesan'] = "Data berhasil di simpan";
		$data['hubungi_kami'] = DB::table('konten')->where('kategori', '=', 'hubungi_kami')->first();
		return View::make('admin.hubungi_kami', $data);
	}

	public function up_konten($id)
	{
		//ambil kategori konten
		$konten = DB::table('konten')->where('id', '=', $id)->first();

		$kategori = $konten->kategori;
		$urutan = $konten->urutan;

		//periksa apakah ini adalah urutan teratas atau bukan
		$konten_atas = DB::table('konten')
						->where('kategori', '=', $kategori)
						->where('urutan', '<', $urutan)
						->count();

		if($konten_atas > 0)
		{
			//jika ada yang diatasnya, tukar urutannya
			$konten_atas = DB::table('konten')
							->where('kategori', '=', $kategori)
							->where('urutan', '<', $urutan)
							->orderBy('urutan', 'DESC')
							->first();

			$id_konten_atas = $konten_atas->id;
			$urutan_konten_atas = $konten_atas->urutan;

			DB::table('konten')
				->where('id', '=', $id_konten_atas)
				->update(array(
					'urutan'=>$urutan
				));

			DB::table('konten')
				->where('id', '=', $id)
				->update(array(
					'urutan'=>$urutan_konten_atas
				));
		}

		return Redirect::to('admin/'.$kategori);
	}

	public function down_konten($id)
	{
		//ambil kategori konten
		$konten = DB::table('konten')->where('id', '=', $id)->first();

		$kategori = $konten->kategori;
		$urutan = $konten->urutan;

		//periksa apakah ini adalah urutan teratas atau bukan
		$konten_bawah = DB::table('konten')
						->where('kategori', '=', $kategori)
						->where('urutan', '>', $urutan)
						->count();

		if($konten_bawah > 0)
		{
			//jika ada yang diatasnya, tukar urutannya
			$konten_bawah = DB::table('konten')
							->where('kategori', '=', $kategori)
							->where('urutan', '>', $urutan)
							->orderBy('urutan', 'ASC')
							->first();

			$id_konten_bawah = $konten_bawah->id;
			$urutan_konten_bawah = $konten_bawah->urutan;

			DB::table('konten')
				->where('id', '=', $id_konten_bawah)
				->update(array(
					'urutan'=>$urutan
				));

			DB::table('konten')
				->where('id', '=', $id)
				->update(array(
					'urutan'=>$urutan_konten_bawah
				));
		}

		return Redirect::to('admin/'.$kategori);
	}


//=========================================================================================================================
//	PRIVATE FUNCTION
//=========================================================================================================================
	private function ambil_konten($kategori, $orderby='id', $urutan='ASC')
	{
		$konten_array = DB::table('konten')
							->where('kategori', '=', $kategori)
							->orderBy($orderby, $urutan)
							->get();

		foreach($konten_array as $key=>$value)
		{
			$konten_array[$key]->date = $this->parse_date($value->date);
		}
		return $konten_array;
	}

	private function parse_date($date)
	{
		$list = explode('-', $date);

		$bulan = 
		$tanggal = $list[2];
		$tahun = $list[0];
		if($list[1]==1){$bulan = 'Januari';}
		else if($list[1]==2){$bulan = 'Febuari';}
		else if($list[1]==3){$bulan = 'Maret';}
		else if($list[1]==4){$bulan = 'April';}
		else if($list[1]==5){$bulan = 'Mei';}
		else if($list[1]==6){$bulan = 'Juni';}
		else if($list[1]==7){$bulan = 'Juli';}
		else if($list[1]==8){$bulan = 'Agustus';}
		else if($list[1]==9){$bulan = 'September';}
		else if($list[1]==10){$bulan = 'Oktober';}
		else if($list[1]==11){$bulan = 'November';}
		else if($list[1]==12){$bulan = 'Desember';}

		return $tanggal.' '.$bulan.' '.$tahun;
	}

	private function make_slug($judul)
	{
		$slug = strtolower($judul);
		$slug = str_replace('"', '', $slug);
		$slug = str_replace("'", "", $slug);
		$slug = str_replace('-', '', $slug);
		$slug = str_replace(' ', '-', $slug);
		$slug = str_replace(':', '', $slug);
		$slug = str_replace('(', '', $slug);
		$slug = str_replace(')', '', $slug);
		$slug = str_replace('?', '', $slug);
		return $slug;
	}

	private function escape_quote($text)
	{
		$slug = str_replace('"', "'", $text);
		return $slug;
	}
}