<?php

class PublicController extends BaseController {

	public $data;

	public function __construct()
	{
		$this->data['profil'] = $this->ambil_konten('profil', 'urutan', 'ASC', '4');
		$this->data['agenda'] = $this->ambil_konten('agenda', 'date', 'DESC', '4');
		$this->data['berita'] = $this->ambil_konten('berita', 'id', 'DESC', '3');
	}

	public function home()
	{
		$this->data['menu'] = 'beranda';
		return View::make('public.home', $this->data);
	}

	public function galeri()
	{
		$this->data['menu'] = 'galeri';
		$this->data['galeri_array'] = DB::table('galeri')->get();
		return View::make('public.galeri', $this->data);
	}


	public function test()
	{
		
		return View::make('test');
	}

	public function download()
	{
		$this->data['menu'] = 'download';
		$this->data['download_array'] = DB::table('download')->get();
		return View::make('public.download', $this->data);
	}

	public function profil()
	{
		$this->data['menu'] = 'profil';
		return View::make('public.profil', $this->data);
	}

	public function agenda()
	{
		$this->data['menu'] = 'agenda';
		$this->data['agenda'] = $this->ambil_konten('agenda', 'date', 'DESC');
		return View::make('public.agenda', $this->data);
	}

	public function berita()
	{
		$this->data['menu'] = 'berita';
		$this->data['berita'] = $this->ambil_konten('berita', 'id', 'DESC');
		return View::make('public.berita', $this->data);
	}


	public function hubungi_kami()
	{
		$this->data['konten'] = DB::table('konten')->where('kategori', '=', 'hubungi_kami')->first();
		$this->data['konten']->date = $this->parse_date($this->data['konten']->date);
		$this->data['menu'] = 'hubungi_kami';
		return View::make('public.hubungi', $this->data);
	}

	public function sig_perbatasan()
	{
		$this->data['menu'] = 'sig_perbatasan';
		return View::make('public.sig_perbatasan', $this->data);
	}

	public function data_infrastruktur_kosong()
	{
		$this->data['menu'] = 'data_infrastruktur';
		return View::make('public.data_infrastruktur_kosong', $this->data);
	}

	public function data_infrastruktur($id_kecamatan, $jenis, $page=1)
	{
		$this->data['menu'] = 'data_infrastruktur';
		$this->data['id_kecamatan'] = $id_kecamatan;
		$this->data['jenis'] = $jenis;

		if($id_kecamatan==0)
		{
			//ambil data semua kecamatan
			$this->data['data'] = DB::table($jenis)->get();
		}
		else
		{
			//ambil data kecamatan tertentu
			$this->data['data'] = DB::table($jenis)->where('kecamatan_id', '=', $id_kecamatan)->get();
		}

		if($jenis=='ruas_jalan')
		{
			foreach($this->data['data'] as $key=>$value)
			{
				$this->data['data'][$key]->nama_kecamatan = $this->ambil_nama_kecamatan($value->kecamatan_id);
			}
			return View::make('public.data_infrastruktur_ruas_jalan', $this->data);
		}
		else if($jenis=='jembatan')
		{
			foreach($this->data['data'] as $key=>$value)
			{
				$this->data['data'][$key]->nama_kecamatan = $this->ambil_nama_kecamatan($value->kecamatan_id);
				$this->data['data'][$key]->nama_ruas = $this->ambil_nama_ruas_jalan($value->id_ruas_jalan);
			}
			return View::make('public.data_infrastruktur_jembatan', $this->data);
		}
		else if($jenis=='gorong_gorong')
		{
			foreach($this->data['data'] as $key=>$value)
			{
				$this->data['data'][$key]->nama_kecamatan = $this->ambil_nama_kecamatan($value->kecamatan_id);
				$this->data['data'][$key]->nama_ruas = $this->ambil_nama_ruas_jalan($value->id_ruas_jalan);
			}
			return View::make('public.data_infrastruktur_gorong_gorong', $this->data);
		}
		else if($jenis=='infrastruktur')
		{
			foreach($this->data['data'] as $key=>$value)
			{
				$this->data['data'][$key]->nama_kecamatan = $this->ambil_nama_kecamatan($value->kecamatan_id);
				$this->data['data'][$key]->nama_ruas = $this->ambil_nama_ruas_jalan($value->id_ruas_jalan);
			}
			return View::make('public.data_infrastruktur_infrastruktur', $this->data);
		}
	}

	public function read($slug)
	{
		$this->data['konten'] = $this->ambil_konten_by_slug($slug);
		$this->data['menu'] = $this->data['konten']->kategori;
		return View::make('public.read', $this->data);
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

	private function ambil_konten($kategori, $orderby='id', $urutan='ASC', $limit=false, $offset=0)
	{
		$konten_query = DB::table('konten')
							->where('kategori', '=', $kategori)
							->orderBy($orderby, $urutan);
							
		if ($limit)
		{
		    $konten_query->limit($limit);
		    
		    if ($offset)
		    {
		        $konten_query->offset($offset);
		    }
		}
		
		$konten_array = $konten_query->get();

		foreach($konten_array as $key=>$value)
		{
			$konten_array[$key]->date = $this->parse_date($value->date);
		}
		return $konten_array;
	}


	private function ambil_konten_by_slug($slug)
	{
		$konten = DB::table('konten')
						->where('slug', '=', $slug)
						->first();

		$konten->date = $this->parse_date($konten->date);

		return $konten;
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

}