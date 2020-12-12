<?php

namespace app\api\modules\v1\controllers;

use Yii;
use app\models\Jadwal;
use yii\rest\Controller;
use yii\web\Response;

class JadwalController extends Controller
{

	public function actionGetAll($id_lapangan)
	{
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

			$jadwal = Jadwal::find()
				->where(['id_lapangan' => $id_lapangan])
				->andWhere(['status' => 'Tersedia'])
				->all();;

			$response['master'] = $jadwal;
		}

		return $response;
	}

	public function actionByIdPengelola($id_pengelola)
	{
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

			$sql = "SELECT tb_jadwal.id_jadwal, tb_jadwal.id_lapangan, tb_jadwal.hari, tb_jadwal.jam, tb_jadwal.status, tb_jadwal.createdAt, tb_jadwal.updatedAt,


			tb_lapangan.id_gor, tb_lapangan.nomor_lapangan, tb_lapangan.harga, tb_lapangan.jenis, tb_lapangan.createdAt, tb_lapangan.updatedAt,

				tb_gor.nama_gor, tb_gor.id_pengelola,

				tb_pengelola.id_pengelola

				FROM tb_jadwal INNER JOIN tb_gor, tb_pengelola, tb_lapangan
				WHERE tb_jadwal.id_lapangan = tb_lapangan.id_lapangan
				AND tb_lapangan.id_gor = tb_gor.id_gor
				AND tb_gor.id_pengelola = tb_pengelola.id_pengelola
				AND tb_gor.id_pengelola = '$id_pengelola'";

			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionSumJadwal($id_gor)
	{
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

			$sql = "SELECT COUNT(tb_jadwal.id_lapangan) as 'jumlah_lapangan' FROM tb_jadwal INNER JOIN tb_gor, tb_lapangan 
			WHERE tb_jadwal.id_lapangan = tb_lapangan.id_lapangan 
			AND	tb_lapangan.id_gor = tb_gor.id_gor
			AND tb_gor.id_gor = '$id_gor'
			AND tb_jadwal.status = 'Tersedia'";

			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionGetJadwalByGor($id_gor)
	{
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

			// $sql = "SELECT * FROM tb_jadwal INNER JOIN tb_gor, tb_lapangan 
			// WHERE tb_jadwal.id_lapangan = tb_lapangan.id_lapangan 
			// AND	tb_lapangan.id_gor = tb_gor.id_gor
			// AND tb_gor.id_gor = '$id_gor'
			// AND tb_jadwal.status = 'Tersedia'";

			$sql = "SELECT tb_jadwal.id_jadwal, tb_jadwal.id_lapangan,
			tb_jadwal.hari, tb_jadwal.status as status_jadwal, tb_jadwal.jam,
			tb_gor.nama_gor, tb_gor.alamat_gor, tb_gor.longitude, tb_gor.latitude, tb_gor.deskripsi,
			tb_gor.jumlah_lapangan, tb_gor.foto, tb_gor.fasilitas, tb_gor.status as status_gor,
			tb_gor.id_pengelola, tb_lapangan.id_lapangan, tb_lapangan.id_gor, tb_lapangan.nomor_lapangan,
			tb_lapangan.harga, tb_lapangan.jenis FROM tb_jadwal INNER JOIN tb_gor, tb_lapangan 
			WHERE tb_jadwal.id_lapangan = tb_lapangan.id_lapangan 
			AND	tb_lapangan.id_gor = tb_gor.id_gor
			AND tb_gor.id_gor = '$id_gor'";

			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionTambahJadwal()
	{
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isPost) {
			$data = Yii::$app->request->Post();

			$id_lapangan = $data['id_lapangan'];
			$hari = $data['hari'];
			$jam = $data['jam'];
			$status = $data['status'];

			$jadwal = new Jadwal();
			$jadwal->id_lapangan = $id_lapangan;
			$jadwal->hari = $hari;
			$jadwal->jam = $jam;
			$jadwal->status = $status;

			if ($jadwal->save(false)) {

				$response['code'] = 1;
				$response['message'] = "Data Jadwal berhasil ditambahkan";
				$response['data'] = $jadwal;
			} else {
				$response['code'] = 0;
				$response['message'] = "Data Jadwal gagal ditambahkan";
				$response['data'] = null;
			}
		}

		return $response;
	}

	public function actionUpdateJadwal()
	{
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isPost) {
			$data = Yii::$app->request->Post();

			$id_jadwal = $data['id_jadwal'];
			$id_lapangan = $data['id_lapangan'];
			$hari = $data['hari'];
			$jam = $data['jam'];
			$status = $data['status'];

			$jadwal = Jadwal::find()
				->where(['id_jadwal' => $id_jadwal])
				->one();

			if (isset($jadwal)) {
				// code...
				$jadwal->id_jadwal = $id_jadwal;
				$jadwal->id_lapangan = $id_lapangan;
				$jadwal->hari = $hari;
				$jadwal->jam = $jam;
				$jadwal->status = $status;


				if ($jadwal->update(false)) {
					// jika data berhasil diupdate
					$response['code'] = 1;
					$response['message'] = "Update Data Jadwal berhasil";
					$response['data'] = $jadwal;
				} else {
					$response['code'] = 0;
					$response['message'] = "Update Data Jadwal gagal";
					$response['data'] = null;
				}
			} else {
				$response['code'] = 0;
				$response['message'] = "Data tidak ditemukan";
				$response['data'] = null;
			}
		}
		return $response;
	}

	public function actionDeleteJadwal()
	{
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isPost) {
			$data = Yii::$app->request->Post();

			$id_jadwal = $data['id_jadwal'];

			$jadwal = Jadwal::find()
				->where(['id_jadwal' => $id_jadwal])
				->one();

			if (isset($jadwal)) {
				if ($jadwal->delete()) {

					$response['code'] = 1;
					$response['message'] = "Data berhasil dihapus";
				} else {

					$response['code'] = 0;
					$response['message'] = "Data gagal dihapus";
				}
			} else {
				$response['code'] = 0;
				$response['message'] = "Data tidak ditemukan";
			}
		}
		return $response;
	}
}
