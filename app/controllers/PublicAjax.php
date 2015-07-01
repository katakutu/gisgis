<?php

class PublicAjax extends BaseController {

	public function ambil_ruas_jalan($id_kecamatan)
	{
		$data = DB::table('ruas_jalan')->where('kecamatan_id', '=', $id_kecamatan)->get();
		echo json_encode($data);
	}

	public function ambil_jembatan($id_kecamatan)
	{
		$data = DB::table('jembatan')->where('kecamatan_id', '=', $id_kecamatan)->get();
		echo json_encode($data);
	}

	public function ambil_gorong_gorong($id_kecamatan)
	{
		$data = DB::table('gorong_gorong')->where('kecamatan_id', '=', $id_kecamatan)->get();
		echo json_encode($data);
	}

	public function ambil_infrastruktur($id_kecamatan)
	{
		$data = DB::table('infrastruktur')->where('kecamatan_id', '=', $id_kecamatan)->get();
		echo json_encode($data);
	}

	public function detail_ruas_jalan($id)
	{
		$data = DB::table('ruas_jalan')->where('id', '=', $id)->first();
		$data->foto = DB::table('foto')->where('id_pemilik', '=', $id)->where('kategori_pemilik', '=', 'ruas_jalan')->get();
		$data->nama_kecamatan = DB::table('kecamatan')->where('id', '=', $data->kecamatan_id)->first()->nama_kecamatan;
		echo json_encode($data);
	}

	public function detail_jembatan($id)
	{
		$data = DB::table('jembatan')->where('id', '=', $id)->first();
		$data->foto = DB::table('foto')->where('id_pemilik', '=', $id)->where('kategori_pemilik', '=', 'jembatan')->get();
		$data->nama_kecamatan = DB::table('kecamatan')->where('id', '=', $data->kecamatan_id)->first()->nama_kecamatan;
		$data->nama_ruas = DB::table('ruas_jalan')->where('id', '=', $data->id_ruas_jalan)->first()->nama_ruas;
		echo json_encode($data);
	}

	public function detail_gorong_gorong($id)
	{
		$data = DB::table('gorong_gorong')->where('id', '=', $id)->first();
		$data->foto = DB::table('foto')->where('id_pemilik', '=', $id)->where('kategori_pemilik', '=', 'gorong_gorong')->get();
		$data->nama_kecamatan = DB::table('kecamatan')->where('id', '=', $data->kecamatan_id)->first()->nama_kecamatan;
		$data->nama_ruas = DB::table('ruas_jalan')->where('id', '=', $data->id_ruas_jalan)->first()->nama_ruas;
		echo json_encode($data);
	}

	public function detail_infrastruktur($id)
	{
		$data = DB::table('infrastruktur')->where('id', '=', $id)->first();
		$data->foto = DB::table('foto')->where('id_pemilik', '=', $id)->where('kategori_pemilik', '=', 'infrastruktur')->get();
		$data->nama_kecamatan = DB::table('kecamatan')->where('id', '=', $data->kecamatan_id)->first()->nama_kecamatan;
		$data->nama_ruas = DB::table('ruas_jalan')->where('id', '=', $data->id_ruas_jalan)->first()->nama_ruas;
		echo json_encode($data);
	}
}