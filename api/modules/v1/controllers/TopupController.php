<?php
namespace app\api\modules\v1\controllers;
 use Yii;
 use app\models\Topup;
 use yii\rest\Controller;
 use yii\web\Response;

  class TopupController extends Controller
 {

 	public function actionTambahTopup(){
	 	Yii::$app->response->format = Response::FORMAT_JSON;

	 	$response = null;

	 	if (Yii::$app->request->isPost){
	 		$data = Yii::$app->request->Post();

	 		$id_pengguna = $data['id_pengguna'];
	 		$jumlah = $data['jumlah'];
	 		$bukti_transfer =$data['bukti_transfer'];
	 		$status    = $data['status'];

	 		$top_up = new Topup();
	 		$top_up->id_pengguna=$id_pengguna;
	 		$top_up->jumlah=$jumlah;
	 		$top_up->bukti_transfer=$bukti_transfer;
	 		$top_up->status=$status;

	 		if($top_up->save(false)){

	 			$response['code']=1;
	 			$response['message']="Data Top Up berhasil ditamabahkan";
	 			$response['data'] = $top_up;
	 		}else{
	 			$response['code']=0;
	 			$response['message']= "Data Top Up gagal ditambahkan";
	 			$response['data']=null;
	 		}
	 	}

	 	return $response;
	 }

	public function actionUpdateTopup() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      		$id_topup = $data['id_topup'];
    //   		$id_pengguna = $data['id_pengguna'];
	 		// $jumlah = $data['jumlah'];
	 		$bukti_transfer =$data['bukti_transfer'];
	 		// $status= $data['status'];

      $top_up = Topup::find()
                      ->where(['id_topup' => $id_topup])
                      ->one();

      if (isset($top_up)) {
        // code...
        $top_up->id_topup= $id_topup;
        // $top_up->id_pengguna= $id_pengguna;
        // $top_up->jumlah= $jumlah;
        $top_up->bukti_transfer= $bukti_transfer;
        // $top_up->status= $status;
        

        if ($top_up->update(false)) {
          // jika data berhasil diupdate
          $response['code'] = 1;
  				$response['message'] = "Update Data Topup berhasil";
  				$response['data'] = $top_up;
        }else {
          $response['code'] = 0;
  				$response['message'] = "Update Data Topup gagal";
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

  public function actionBatalTopup(){
	    Yii::$app->response->format = Response::FORMAT_JSON;

	    $response = null;

	    if (Yii::$app->request->isPost) {
		      $data = Yii::$app->request->Post();

		      $id_topup = $data['id_topup'];
		   	
		   	  $top_up = Topup::find()
                      ->where(['id_topup' => $id_topup])
                      ->one();

              $top_up->status = "Batal";

		      if($top_up->update(false)){
		      			$response['code'] = 1;
			   			$response['message'] = "Batal Topup Berhasil ";
			   			$response['data'] = $top_up;
		      		
					}else {
			    		$response['code'] = 0;
						$response['message'] = "Batal Topup Gagal";
						$response['data'] = null;
			      }
		      }
	      return $response;
	    }


	public function actionByIdPengguna ($id_pengguna){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

			$sql = "SELECT tb_topup.id_topup, tb_topup.id_pengguna, tb_topup.jumlah, tb_topup.status, 

				tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap, tb_topup.createdAt

				FROM tb_topup INNER JOIN tb_pengguna
				WHERE tb_topup.id_pengguna = tb_pengguna.id_pengguna
				AND tb_topup.id_pengguna = '$id_pengguna'";

				$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}



 }