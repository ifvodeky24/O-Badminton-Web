<?php

namespace app\api\modules\v1\controllers;

use Yii;
use app\models\Gor;
use yii\rest\Controller;
use yii\web\Response;

class GorController extends Controller
{

	public function actionGetAll()
	{
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

			$gor = Gor::find()->all();

			$response['master'] = $gor;
		}

		return $response;
	}

	public function actionTambahGor()
	{
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isPost) {
			$data = Yii::$app->request->Post();

			$id_pengelola = $data['id_pengelola'];
			$nama_gor = $data['nama_gor'];
			$alamat_gor = $data['alamat_gor'];
			$longitude    = $data['longitude'];
			$latitude = $data['latitude'];
			$deskripsi = $data['deskripsi'];
			$jumlah_lapangan = $data['jumlah_lapangan'];
			$fasilitas   = $data['fasilitas'];
			$status   = $data['status'];
			$foto = $data['foto'];

			$gor = new Gor();
			$gor->id_pengelola = $id_pengelola;
			$gor->nama_gor = $nama_gor;
			$gor->alamat_gor = $alamat_gor;
			$gor->longitude = $longitude;
			$gor->latitude = $latitude;
			$gor->deskripsi = $deskripsi;
			$gor->jumlah_lapangan = $jumlah_lapangan;
			$gor->fasilitas = $fasilitas;
			$gor->status = $status;
			$gor->foto = $foto;

			if ($gor->save(false)) {

				$response['code'] = 1;
				$response['message'] = "Data Gor berhasil ditamabahkan";
				$response['data'] = $gor;
			} else {
				$response['code'] = 0;
				$response['message'] = "Data Gor gagal ditambahkan";
				$response['data'] = null;
			}
		}

		return $response;
	}

	public function actionUpdateGor()
	{
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isPost) {
			$data = Yii::$app->request->Post();

			$id_gor = $data['id_gor'];
			$id_pengelola = $data['id_pengelola'];
			$nama_gor = $data['nama_gor'];
			$longitude = $data['longitude'];
			$latitude = $data['latitude'];
			$deskripsi = $data['deskripsi'];
			$jumlah_lapangan = $data['jumlah_lapangan'];
			$fasilitas = $data['fasilitas'];
			$status   = $data['status'];
			$foto = $data['foto'];

			$gor = Gor::find()
				->where(['id_gor' => $id_gor])
				->one();

			if (isset($gor)) {
				// code...
				$gor->id_pengelola = $id_pengelola;
				$gor->nama_gor = $nama_gor;
				$gor->longitude = $longitude;
				$gor->latitude = $latitude;
				$gor->deskripsi = $deskripsi;
				$gor->jumlah_lapangan = $jumlah_lapangan;
				$gor->fasilitas = $fasilitas;
				$gor->status = $status;
				$gor->foto = $foto;


				if ($gor->update(false)) {
					// jika data berhasil diupdate
					$response['code'] = 1;
					$response['message'] = "Update Data Gor berhasil";
					$response['data'] = $gor;
				} else {
					$response['code'] = 0;
					$response['message'] = "Update Data Gor gagal";
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

	public function actionUpdateStatusGor()
	{
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isPost) {
			$data = Yii::$app->request->Post();

			$id_gor = $data['id_gor'];
			$status = $data['status'];

			$gor = Gor::find()
				->where(['id_gor' => $id_gor])
				->one();

			if (isset($gor)) {
				// code...
				$gor->status = $status;


				if ($gor->update(false)) {
					// jika data berhasil diupdate
					$response['code'] = 1;
					$response['message'] = "Update Status Gor berhasil";
					$response['data'] = $gor;
				} else {
					$response['code'] = 0;
					$response['message'] = "Update Status Gor gagal";
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

	public function actionByName($nama_gor)
	{
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

			$sql = "SELECT tb_gor.id_gor, tb_gor.nama_gor, tb_gor.alamat_gor, tb_gor.latitude, tb_gor.longitude, tb_gor.deskripsi, tb_gor.jumlah_lapangan, tb_gor.foto, tb_gor.fasilitas, tb_gor.id_pengelola, 

				tb_pengelola.nama_lengkap

				FROM tb_gor INNER JOIN tb_pengelola
				WHERE tb_gor.id_pengelola = tb_pengelola.id_pengelola
				AND tb_gor.nama_gor = '$nama_gor'";

			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionById($id_gor)
	{
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

			$sql = "SELECT tb_gor.id_gor, tb_gor.nama_gor, tb_gor.alamat_gor, tb_gor.latitude, tb_gor.longitude, tb_gor.deskripsi, tb_gor.jumlah_lapangan, tb_gor.foto, tb_gor.fasilitas, tb_gor.id_pengelola, 

				tb_pengelola.nama_lengkap

				FROM tb_gor INNER JOIN tb_pengelola
				WHERE tb_gor.id_pengelola = tb_pengelola.id_pengelola
				AND tb_gor.id_gor = '$id_gor'";

			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionByIdPengelola($id_pengelola)
	{
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

			$sql = "SELECT tb_gor.id_gor, tb_gor.nama_gor, tb_gor.alamat_gor, tb_gor.latitude, tb_gor.longitude, tb_gor.deskripsi, tb_gor.jumlah_lapangan, tb_gor.foto, tb_gor.fasilitas, tb_gor.id_pengelola, 

				tb_pengelola.nama_lengkap

				FROM tb_gor INNER JOIN tb_pengelola
				WHERE tb_gor.id_pengelola = tb_pengelola.id_pengelola
				AND tb_gor.id_pengelola = '$id_pengelola'";

			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionDeleteGor()
	{
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isPost) {
			$data = Yii::$app->request->Post();

			$id_gor = $data['id_gor'];

			$gor = Gor::find()
				->where(['id_gor' => $id_gor])
				->one();

			if (isset($gor)) {
				if ($gor->delete()) {

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

	public function actionSearch($query)
	{
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

			// select * from tb_produk berdasarkan nama produk
			$data = "SELECT * FROM tb_gor WHERE nama_gor LIKE '%" . $query . "%'";

			$response['master'] = Yii::$app->db->createCommand($data)->queryAll();
		}

		return $response;
	}
}
