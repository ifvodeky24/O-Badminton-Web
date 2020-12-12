<?php
namespace app\api\modules\v1\controllers;
 use Yii;
 use app\models\Lapangan;
 use yii\rest\Controller;
 use yii\web\Response;

  class LapanganController extends Controller
 {

 	public function actionGetAll($id_gor){
 		Yii::$app->response->format = Response::FORMAT_JSON;

 		$response = null;

 		if (Yii::$app->request->isGet){

 			$lapangan = Lapangan::find()
 						->where(['id_gor' => $id_gor])
 						->all();
 			;

 			$response['master'] = $lapangan;
 		}

 		return $response;
 	}

 	public function actionGetAllPengelola($id_gor, $id_pengelola){
 		Yii::$app->response->format = Response::FORMAT_JSON;

 		$response = null;

 		if (Yii::$app->request->isGet){

 			$lapangan = "SELECT tb_lapangan.id_lapangan, tb_lapangan.id_gor, tb_lapangan.nomor_lapangan, tb_lapangan.harga, tb_lapangan.jenis, tb_lapangan.createdAt, tb_lapangan.updatedAt,

				tb_gor.nama_gor, tb_gor.id_pengelola,

				tb_pengelola.id_pengelola

				FROM tb_lapangan INNER JOIN tb_gor, tb_pengelola
				WHERE tb_lapangan.id_gor = tb_gor.id_gor
				AND tb_gor.id_pengelola = tb_pengelola.id_pengelola
				AND tb_lapangan.id_gor = '$id_gor'
				AND tb_gor.id_pengelola = '$id_pengelola'";
 			;

 			$response['master'] = Yii::$app->db->createCommand($lapangan)->queryAll();
 		}

 		return $response;
 	}

 	public function actionById($id_lapangan){
 		Yii::$app->response->format = Response::FORMAT_JSON;

 		$response = null;

 		if (Yii::$app->request->isGet){

 			$lapangan = Lapangan::find()
 						->where(['id_lapangan' => $id_lapangan])
 						->all();
 			;

 			$response['master'] = $lapangan;
 		}

 		return $response;
 	}

 	public function actionTambahLapangan(){
	 	Yii::$app->response->format = Response::FORMAT_JSON;

	 	$response = null;

	 	if (Yii::$app->request->isPost){
	 		$data = Yii::$app->request->Post();

	 		$id_gor = $data['id_gor'];
	 		$nomor_lapangan = $data['nomor_lapangan'];
	 		$harga =$data['harga'];
	 		$jenis= $data['jenis'];

	 		$lapangan = new Lapangan();
	 		$lapangan->id_gor=$id_gor;
	 		$lapangan->nomor_lapangan=$nomor_lapangan;
	 		$lapangan->harga=$harga;
	 		$lapangan->jenis=$jenis;
	 	
	 		if($lapangan->save(false)){

	 			$response['code']=1;
	 			$response['message']="Data Lapangan berhasil ditambahkan";
	 			$response['data'] = $lapangan;
	 		}else{
	 			$response['code']=0;
	 			$response['message']= "Data Lapangan gagal ditambahkan";
	 			$response['data']=null;
	 		}
	 	}

	 	return $response;
	 }

	public function actionUpdateLapangan() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      		$id_lapangan = $data['id_lapangan'];
      		$id_gor = $data['id_gor'];
	 		$nomor_lapangan = $data['nomor_lapangan'];
	 		$harga =$data['harga'];
	 		$jenis= $data['jenis'];

      $lapangan = Lapangan::find()
                      ->where(['id_lapangan' => $id_lapangan])
                      ->one();

      if (isset($lapangan)) {
        // code...
        $lapangan->id_gor= $id_gor;
        $lapangan->nomor_lapangan= $nomor_lapangan;
        $lapangan->harga= $harga;
        $lapangan->jenis= $jenis;
        

        if ($lapangan->update(false)) {
          // jika data berhasil diupdate
          $response['code'] = 1;
  				$response['message'] = "Update Data Lapangan berhasil";
  				$response['data'] = $lapangan;
        }else {
          $response['code'] = 0;
  				$response['message'] = "Update Data Lapangan gagal";
  				$response['data'] = null;
        }
      }else {
        $response['code'] = 0;
        $response['message'] = "Data tidak ditemukan";
        $response['data'] = null;
      }
    }
    return $response;

  }

	public function actionByIdPengelola ($id_pengelola){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

			$sql = "SELECT tb_lapangan.id_lapangan, tb_lapangan.id_gor, tb_lapangan.nomor_lapangan, tb_lapangan.harga, tb_lapangan.jenis, tb_lapangan.createdAt, tb_lapangan.updatedAt,

				tb_gor.nama_gor, tb_gor.id_pengelola,

				tb_pengelola.id_pengelola

				FROM tb_lapangan INNER JOIN tb_gor, tb_pengelola
				WHERE tb_lapangan.id_gor = tb_gor.id_gor
				AND tb_gor.id_pengelola = tb_pengelola.id_pengelola
				AND tb_gor.id_pengelola = '$id_pengelola'";

				$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionDeleteLapangan(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if(Yii::$app->request->isPost) {
			$data = Yii::$app->request->Post();

			$id_lapangan = $data['id_lapangan'];

			$lapangan = Lapangan::find()
						->where(['id_lapangan' => $id_lapangan])
						->one();

						if (isset($lapangan)) {
							if($lapangan->delete()){

							$response['code'] = 1;
							$response['message'] = "Data berhasil dihapus";
						}else{

							$response['code'] = 0;
							$response['message'] = "Data gagal dihapus";
						}

					}else{
						$response['code'] = 0;
						$response['message'] = "Data tidak ditemukan";
					}


		}
			return $response;
	}

 }