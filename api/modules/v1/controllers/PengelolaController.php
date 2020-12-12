<?php
namespace app\api\modules\v1\controllers;
 use Yii;
 use app\models\Pengelola;
 use yii\rest\Controller;
 use yii\web\Response;

 class PengelolaController extends Controller
 {
 		public function actionLogin () {
	 	Yii::$app->response->format = Response::FORMAT_JSON;

	 	$response = null;
	 	if(Yii::$app->request->isPost){
	 		$data = Yii::$app->request->Post();

	 		$email = $data['email'];
	 		$password= $data['password'];

	 		$pengelola = Pengelola::find()
	 		->where(['email'=> $email])
	 		->andWhere(['password'=>$password])
	 		->one();

	 		if(isset($pengelola)){
	 			$response['code']= 1;
	 			$response['message']= "Login Berhasil";
	 			$response['data']= $pengelola;
	 		} else {
	 			$response['code']=0;
	 			$response['message']= "Login gagal, email atau password";
	 			$response['data']= null;
	 		}
	 	}

	 	return $response;
	 }

	 public function actionRegister(){
	 	Yii::$app->response->format = Response::FORMAT_JSON;

	 	$response = null;

	 	if (Yii::$app->request->isPost){
	 		$data = Yii::$app->request->Post();

	 		$username = $data['username'];
	 		$password =$data ['password'];
	 		$email    = $data['email'];
	 		$nama_lengkap= $data['nama_lengkap'];
	 		$alamat  = $data ['alamat'];
	 		$no_hp   = $data ['no_hp'];

	 		$pengelola = new Pengelola();
	 		$pengelola->username =$username;
	 		$pengelola->password =$password;
	 		$pengelola->email= $email;
	 		$pengelola->nama_lengkap=$nama_lengkap;
	 		$pengelola->alamat = $alamat;
	 		$pengelola->no_hp= $no_hp;

	 		if($pengelola->save(false)){

	 			$response['code']=1;
	 			$response['message']="Register berhasil";
	 			$response['data'] = $pengelola;
	 		}else{
	 			$response['code']=0;
	 			$response['message']= "Registrasi gagal";
	 			$response['data']=null;
	 		}
	 	}

	 	return $response;
	 }

	 public function actionById ($id_pengelola){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

		$pengelola = Pengelola::find()
					->where(['id_pengelola' => $id_pengelola])
					->all();

					$response['master'] = $pengelola;
		}

		return $response;
	}

	public function actionUbahPassword() {
      Yii::$app->response->format = Response::FORMAT_JSON;

      $response = null;

      if (Yii::$app->request->isPost) {
        $data = Yii::$app->request->Post();

        $id_pengelola= $data['id_pengelola'];
        $password = $data['password'];
        
        $pengelolas = Pengelola::find()
                        ->where(['id_pengelola' => $id_pengelola])
                        ->one();

        if (isset($pengelolas)) {
          // code...
          $pengelolas->password= $password;

          if ($pengelolas->update(false)) {
            // jika data berhasil diupdate
            		$response['code'] = 1;
    				$response['message'] = "Kata Sandi berhasil Diubah";
    				$response['data'] = $pengelolas;
          }else {
            $response['code'] = 0;
    				$response['message'] = "Kata Sandi Gagal Diubah";
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

  	public function actionUbahProfil() {
      Yii::$app->response->format = Response::FORMAT_JSON;

      $response = null;

      if (Yii::$app->request->isPost) {
        $data = Yii::$app->request->Post();

        $id_pengelola = $data['id_pengelola'];
        $username = $data['username'];
        $nama_lengkap = $data['nama_lengkap'];
        $alamat = $data['alamat'];
        $email = $data['email'];
        $no_hp = $data['no_hp'];
        
        $pengelola = Pengelola::find()
                        ->where(['id_pengelola' => $id_pengelola])
                        ->one();

        if (isset($pengelola)) {
          // code...
          $pengelola->username= $username;
          $pengelola->nama_lengkap= $nama_lengkap;
          $pengelola->alamat= $alamat;
          $pengelola->email= $email;
          $pengelola->no_hp= $no_hp;

          if ($pengelola->update(false)) {
            // jika data berhasil diupdate
            		$response['code'] = 1;
    				$response['message'] = "Profil berhasil Diubah";
    				$response['data'] = $pengelola;
          }else {
            $response['code'] = 0;
    				$response['message'] = "Profil Gagal Diubah";
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

  public function actionUploadFotoPengelola() {
      Yii::$app->response->format = Response::FORMAT_JSON;

      $response = null;

      if (Yii::$app->request->isPost) {
        $data = Yii::$app->request->Post();

        $id_pengelola= $data['id_pengelola'];
        $foto = $data['foto'];
        
        $pengelola = Pengelola::find()
                        ->where(['id_pengelola' => $id_pengelola])
                        ->one();

        if (isset($pengelola)) {
          // code...
          $pengelola->foto= $foto;

          if ($pengelola->update(false)) {
            // jika data berhasil diupdate
            $response['code'] = 1;
            $response['message'] = "Foto Profil Berhasil diupload";
            $response['data'] = $pengelola;
          }else {
            $response['code'] = 0;
            $response['message'] = "Foto Profil Gagal diupload";
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

 }