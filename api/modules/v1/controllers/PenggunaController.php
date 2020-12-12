<?php
namespace app\api\modules\v1\controllers;
 use Yii;
 use app\models\Pengguna;
 use yii\rest\Controller;
 use yii\web\Response;

 class PenggunaController extends Controller
 {
 		public function actionLogin () {
	 	Yii::$app->response->format = Response::FORMAT_JSON;

	 	$response = null;
	 	if(Yii::$app->request->isPost){
	 		$data = Yii::$app->request->Post();

	 		$email = $data['email'];
	 		$password= $data['password'];

	 		$pengguna = Pengguna::find()
	 		->where(['email'=> $email])
	 		->andWhere(['password'=>$password])
	 		->one();

	 		if(isset($pengguna)){
	 			$response['code']= 1;
	 			$response['message']= "Login Berhasil";
	 			$response['data']= $pengguna;
	 		} else {
	 			$response['code']=0;
	 			$response['message']= "Login gagal, email atau password salah";
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
	 		$no_rekening   = $data ['no_rekening'];
	 		$nama_bank   = $data ['nama_bank'];
      $total_saldo   = $data ['total_saldo'];

	 		$pengguna = new Pengguna();
	 		$pengguna->username =$username;
	 		$pengguna->password =$password;
	 		$pengguna->email= $email;
	 		$pengguna->nama_lengkap=$nama_lengkap;
			$pengguna->alamat = $alamat;
			$pengguna->no_hp = $no_hp;
			$pengguna->no_rekening= $no_rekening;
			$pengguna->nama_bank= $nama_bank;
      $pengguna->total_saldo= $total_saldo;
			 
	 		if($pengguna->save(false)){

	 			$response['code']=1;
	 			$response['message']="Register berhasil";
	 			$response['data'] = $pengguna;
	 		}else{
	 			$response['code']=0;
	 			$response['message']= "Registrasi gagal";
	 			$response['data']=null;
	 		}
	 	}

	 	return $response;
	 }

	 public function actionById ($id_pengguna){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet) {

		// $sql = "SELECT tb_pengguna.id_pengguna, tb_pengguna.username, tb_pengguna.nama_lengkap, tb_pengguna.password, tb_pengguna.email, tb_pengguna.alamat, tb_pengguna.no_hp, tb_pengguna.foto, tb_pengguna.no_rekening, tb_pengguna.nama_bank, tb_pengguna.createdAt, tb_pengguna.updatedAt,

		// 		tb_saldo.id_saldo, tb_saldo.saldo, tb_saldo.uang_keluar

		// 		FROM tb_pengguna INNER JOIN tb_saldo
		// 		WHERE tb_pengguna.id_pengguna = tb_saldo.id_pengguna
		// 		AND tb_pengguna.id_pengguna = '$id_pengguna'";

		// 		$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();

			$pengguna = Pengguna::find()
					->where(['id_pengguna' => $id_pengguna])
					->all();

					$response['master'] = $pengguna;
		}

		return $response;
	}

	public function actionUbahPassword() {
      Yii::$app->response->format = Response::FORMAT_JSON;

      $response = null;

      if (Yii::$app->request->isPost) {
        $data = Yii::$app->request->Post();

        $id_pengguna= $data['id_pengguna'];
        $password = $data['password'];
        
        $penggunas = Pengguna::find()
                        ->where(['id_pengguna' => $id_pengguna])
                        ->one();

        if (isset($penggunas)) {
          // code...
          $penggunas->password= $password;

          if ($penggunas->update(false)) {
            // jika data berhasil diupdate
            		$response['code'] = 1;
    				$response['message'] = "Kata Sandi berhasil Diubah";
    				$response['data'] = $penggunas;
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

        $id_pengguna = $data['id_pengguna'];
        $username = $data['username'];
        $nama_lengkap = $data['nama_lengkap'];
        $alamat = $data['alamat'];
        $email = $data['email'];
		$no_hp = $data['no_hp'];
		$no_rekening   = $data ['no_rekening'];
	 	$nama_bank   = $data ['nama_bank'];
        
        $penggunas = Pengguna::find()
                        ->where(['id_pengguna' => $id_pengguna])
                        ->one();

        if (isset($penggunas)) {
          // code...
          $penggunas->username= $username;
          $penggunas->nama_lengkap= $nama_lengkap;
          $penggunas->alamat= $alamat;
          $penggunas->email= $email;
		  $penggunas->no_hp= $no_hp;
		  $penggunas->no_rekening= $no_rekening;
		  $penggunas->nama_bank= $nama_bank;

          if ($penggunas->update(false)) {
            // jika data berhasil diupdate
            		$response['code'] = 1;
    				$response['message'] = "Profil berhasil Diubah";
    				$response['data'] = $penggunas;
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

  public function actionUploadFotoPengguna() {
      Yii::$app->response->format = Response::FORMAT_JSON;

      $response = null;

      if (Yii::$app->request->isPost) {
        $data = Yii::$app->request->Post();

        $id_pengguna= $data['id_pengguna'];
        $foto = $data['foto'];
        
        $pengguna = Pengguna::find()
                        ->where(['id_pengguna' => $id_pengguna])
                        ->one();

        if (isset($pengguna)) {
          // code...
          $pengguna->foto= $foto;

          if ($pengguna->update(false)) {
            // jika data berhasil diupdate
            $response['code'] = 1;
            $response['message'] = "Foto Profil Berhasil diupload";
            $response['data'] = $pengguna;
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

  public function actionSimpanSaldo() {
      Yii::$app->response->format = Response::FORMAT_JSON;

      $response = null;

      if (Yii::$app->request->isPost) {
        $data = Yii::$app->request->Post();

        $id_pengguna = $data['id_pengguna'];
        $total_saldo = $data['total_saldo'];
        
        $penggunas = Pengguna::find()
                        ->where(['id_pengguna' => $id_pengguna])
                        ->one();

        if (isset($penggunas)) {
          // code...
		  $penggunas->total_saldo= $total_saldo;

          if ($penggunas->update(false)) {
            // jika data berhasil diupdate
            		$response['code'] = 1;
    				$response['message'] = "Total Saldo berhasil Diubah";
    				$response['data'] = $penggunas;
          }else {
            $response['code'] = 0;
    				$response['message'] = "Total Saldo Gagal Diubah";
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