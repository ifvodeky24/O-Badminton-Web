<?php
namespace app\api\modules\v1\controllers;
 use Yii;
 use app\models\Pemesanan;
 use app\models\Jadwal;
 use yii\rest\Controller;
 use yii\web\Response;

  class PemesananController extends Controller
 {

 	public function actionPesan(){
	    Yii::$app->response->format = Response::FORMAT_JSON;

	    $response = null;

	    if (Yii::$app->request->isPost) {
		      $data = Yii::$app->request->Post();

		      $id_pengguna = $data['id_pengguna'];
		      $id_lapangan = $data['id_lapangan'];
		      $status = $data['status'];
		      $id_jadwal = $data['id_jadwal'];

			  $pemesanan = new Pemesanan();
		      $pemesanan->id_pengguna= $id_pengguna;
		      $pemesanan->id_lapangan= $id_lapangan;
		      $pemesanan->status= $status;
		      $pemesanan->id_jadwal= $id_jadwal;

		      if($pemesanan->save(false)){

		      		$jadwal = Jadwal::find()
		      					->where(['id_jadwal' => $pemesanan->id_jadwal])
		      					->one();

		      		$jadwal->status = 'Booking';

		      		if ($jadwal->save(false)) {
		      			$response['code'] = 1;
			   			$response['message'] = "Pemesanan Berhasil dan Status jadwal menjadi Booking";
			   			$response['data'] = $pemesanan;
		      		}else{
		      			$response['code'] = 0;
			            $response['message'] = "Pemesanan dan status gagal diupdate";
			            $response['data'] = null;
		      		}

		   			
					}else {
			    		$response['code'] = 0;
						$response['message'] = "Pemesanan Gagal";
						$response['data'] = null;
			      }
		      }
	      return $response;
	    }

	    public function actionBatalPesan(){
	    Yii::$app->response->format = Response::FORMAT_JSON;

	    $response = null;

	    if (Yii::$app->request->isPost) {
		      $data = Yii::$app->request->Post();

		      $id_pemesanan = $data['id_pemesanan'];
		   	
		   	  $pemesanan = Pemesanan::find()
                      ->where(['id_pemesanan' => $id_pemesanan])
                      ->one();

              $pemesanan->status = "Batal";

              $jadwal = Jadwal::find()
              			->where(['id_jadwal' => $pemesanan->id_jadwal])
              			->one();

              $jadwal->status = "Tersedia";

		      if($pemesanan->update(false) && $jadwal->update(false)){
		      			$response['code'] = 1;
			   			$response['message'] = "Batal Pemesanan Berhasil dan Status jadwal menjadi Tersedia";
			   			$response['data'] = $pemesanan;
		      		
					}else {
			    		$response['code'] = 0;
						$response['message'] = "Batal Pemesanan Gagal";
						$response['data'] = null;
			      }
		      }
	      return $response;
	    }

	    public function actionKonfirmasiPesan(){
	    Yii::$app->response->format = Response::FORMAT_JSON;

	    $response = null;

	    if (Yii::$app->request->isPost) {
		      $data = Yii::$app->request->Post();

		      $id_pemesanan = $data['id_pemesanan'];
		   	
		   	  $pemesanan = Pemesanan::find()
                      ->where(['id_pemesanan' => $id_pemesanan])
                      ->one();

              $pemesanan->status = "Sedang Memesan";

		      if($pemesanan->update(false)){
		      			$response['code'] = 1;
			   			$response['message'] = "Status pemesanan berhasil menjadi sedang memesan";
			   			$response['data'] = $pemesanan;
		      		
					}else {
			    		$response['code'] = 0;
						$response['message'] = "Status pemesanan gagal menjadi sedang memesan";
						$response['data'] = null;
			      }
		      }
	      return $response;
	    }

	    public function actionSelesaiPesan(){
	    Yii::$app->response->format = Response::FORMAT_JSON;

	    $response = null;

	    if (Yii::$app->request->isPost) {
		      $data = Yii::$app->request->Post();

		      $id_pemesanan = $data['id_pemesanan'];
		   	
		   	  $pemesanan = Pemesanan::find()
                      ->where(['id_pemesanan' => $id_pemesanan])
                      ->one();

              $pemesanan->status = "Selesai";

              $jadwal = Jadwal::find()
              			->where(['id_jadwal' => $pemesanan->id_jadwal])
              			->one();

              $jadwal->status = "Tersedia";

		      if($pemesanan->update(false) && $jadwal->update(false)){
		      			$response['code'] = 1;
			   			$response['message'] = "Selesai Pemesanan Berhasil dan Status jadwal menjadi Tersedia";
			   			$response['data'] = $pemesanan;
		      		
					}else {
			    		$response['code'] = 0;
						$response['message'] = "Selesai Pemesanan Gagal";
						$response['data'] = null;
			      }
		      }
	      return $response;
	    }

	    public function actionGetAllByPenggunaMenungguKonfirmasi($id_pengguna){
 		Yii::$app->response->format = Response::FORMAT_JSON;

 		$response = null;

 		if (Yii::$app->request->isGet){

 			$pemesanan = "SELECT tb_pemesanan.id_pemesanan, tb_pemesanan.id_pengguna, tb_pemesanan.id_lapangan, tb_pemesanan.status, tb_pemesanan.id_jadwal, tb_pemesanan.createdAt, tb_pemesanan.updatedAt,

			tb_pengguna.username as username_pengguna, tb_pengguna.nama_lengkap as nama_lengkap_pengguna, tb_pengguna.email as email_pengguna, tb_pengguna.alamat as alamat_pengguna, tb_pengguna.no_hp as no_hp_pengguna, tb_pengguna.foto as foto_pengguna, tb_pengguna.no_rekening, tb_pengguna.nama_bank, tb_pengguna.total_saldo,
            
            tb_lapangan.id_gor, tb_lapangan.nomor_lapangan, tb_lapangan.harga, tb_lapangan.jenis,
            
            tb_gor.nama_gor, tb_gor.alamat_gor, tb_gor.alamat_gor, tb_gor.longitude, tb_gor.latitude, tb_gor.deskripsi, tb_gor.jumlah_lapangan, tb_gor.foto, tb_gor.fasilitas, tb_gor.id_pengelola,
            
            tb_pengelola.username as username_pengelola, tb_pengelola.email as email_pengelola, tb_pengelola.nama_lengkap as nama_lengkap_pengelola, tb_pengelola.alamat as alamat_pengelola, tb_pengelola.no_hp as no_hp_pengelola, tb_pengelola.foto as foto_pengelola
           
				FROM tb_pemesanan INNER JOIN tb_pengguna, tb_lapangan, tb_gor, tb_pengelola
				WHERE tb_pemesanan.id_pengguna = tb_pengguna.id_pengguna
                AND tb_pemesanan.id_lapangan = tb_lapangan.id_lapangan
                AND tb_lapangan.id_gor = tb_gor.id_gor
                AND tb_gor.id_pengelola = tb_pengelola.id_pengelola
                AND tb_pemesanan.status = 'Menunggu Konfirmasi'
				AND tb_pemesanan.id_pengguna = '$id_pengguna'";

 			$response['master'] = Yii::$app->db->createCommand($pemesanan)->queryAll();
 		}

 		return $response;
 	}

 	public function actionGetAllByPenggunaSedangMemesan($id_pengguna){
 		Yii::$app->response->format = Response::FORMAT_JSON;

 		$response = null;

 		if (Yii::$app->request->isGet){

 			$pemesanan = "SELECT tb_pemesanan.id_pemesanan, tb_pemesanan.id_pengguna, tb_pemesanan.id_lapangan, tb_pemesanan.status, tb_pemesanan.id_jadwal, tb_pemesanan.createdAt, tb_pemesanan.updatedAt,

			tb_pengguna.username as username_pengguna, tb_pengguna.nama_lengkap as nama_lengkap_pengguna, tb_pengguna.email as email_pengguna, tb_pengguna.alamat as alamat_pengguna, tb_pengguna.no_hp as no_hp_pengguna, tb_pengguna.foto as foto_pengguna, tb_pengguna.no_rekening, tb_pengguna.nama_bank, tb_pengguna.total_saldo,
            
            tb_lapangan.id_gor, tb_lapangan.nomor_lapangan, tb_lapangan.harga, tb_lapangan.jenis,
            
            tb_gor.nama_gor, tb_gor.alamat_gor, tb_gor.alamat_gor, tb_gor.longitude, tb_gor.latitude, tb_gor.deskripsi, tb_gor.jumlah_lapangan, tb_gor.foto, tb_gor.fasilitas, tb_gor.id_pengelola,
            
            tb_pengelola.username as username_pengelola, tb_pengelola.email as email_pengelola, tb_pengelola.nama_lengkap as nama_lengkap_pengelola, tb_pengelola.alamat as alamat_pengelola, tb_pengelola.no_hp as no_hp_pengelola, tb_pengelola.foto as foto_pengelola
           
				FROM tb_pemesanan INNER JOIN tb_pengguna, tb_lapangan, tb_gor, tb_pengelola
				WHERE tb_pemesanan.id_pengguna = tb_pengguna.id_pengguna
                AND tb_pemesanan.id_lapangan = tb_lapangan.id_lapangan
                AND tb_lapangan.id_gor = tb_gor.id_gor
                AND tb_gor.id_pengelola = tb_pengelola.id_pengelola
                AND tb_pemesanan.status = 'Sedang Memesan'
				AND tb_pemesanan.id_pengguna = '$id_pengguna'";

 			$response['master'] = Yii::$app->db->createCommand($pemesanan)->queryAll();
 		}

 		return $response;
 	}

 	public function actionGetAllByPenggunaSelesai($id_pengguna){
 		Yii::$app->response->format = Response::FORMAT_JSON;

 		$response = null;

 		if (Yii::$app->request->isGet){

 			$pemesanan = "SELECT tb_pemesanan.id_pemesanan, tb_pemesanan.id_pengguna, tb_pemesanan.id_lapangan, tb_pemesanan.status, tb_pemesanan.id_jadwal, tb_pemesanan.createdAt, tb_pemesanan.updatedAt,

			tb_pengguna.username as username_pengguna, tb_pengguna.nama_lengkap as nama_lengkap_pengguna, tb_pengguna.email as email_pengguna, tb_pengguna.alamat as alamat_pengguna, tb_pengguna.no_hp as no_hp_pengguna, tb_pengguna.foto as foto_pengguna, tb_pengguna.no_rekening, tb_pengguna.nama_bank, tb_pengguna.total_saldo,
            
            tb_lapangan.id_gor, tb_lapangan.nomor_lapangan, tb_lapangan.harga, tb_lapangan.jenis,
            
            tb_gor.nama_gor, tb_gor.alamat_gor, tb_gor.alamat_gor, tb_gor.longitude, tb_gor.latitude, tb_gor.deskripsi, tb_gor.jumlah_lapangan, tb_gor.foto, tb_gor.fasilitas, tb_gor.id_pengelola,
            
            tb_pengelola.username as username_pengelola, tb_pengelola.email as email_pengelola, tb_pengelola.nama_lengkap as nama_lengkap_pengelola, tb_pengelola.alamat as alamat_pengelola, tb_pengelola.no_hp as no_hp_pengelola, tb_pengelola.foto as foto_pengelola
           
				FROM tb_pemesanan INNER JOIN tb_pengguna, tb_lapangan, tb_gor, tb_pengelola
				WHERE tb_pemesanan.id_pengguna = tb_pengguna.id_pengguna
                AND tb_pemesanan.id_lapangan = tb_lapangan.id_lapangan
                AND tb_lapangan.id_gor = tb_gor.id_gor
                AND tb_gor.id_pengelola = tb_pengelola.id_pengelola
                AND tb_pemesanan.status = 'Selesai'
				AND tb_pemesanan.id_pengguna = '$id_pengguna'";

 			$response['master'] = Yii::$app->db->createCommand($pemesanan)->queryAll();
 		}

 		return $response;
 	}

 	public function actionGetAllByPenggunaBatal($id_pengguna){
 		Yii::$app->response->format = Response::FORMAT_JSON;

 		$response = null;

 		if (Yii::$app->request->isGet){

 			$pemesanan = "SELECT tb_pemesanan.id_pemesanan, tb_pemesanan.id_pengguna, tb_pemesanan.id_lapangan, tb_pemesanan.status, tb_pemesanan.id_jadwal, tb_pemesanan.createdAt, tb_pemesanan.updatedAt,

			tb_pengguna.username as username_pengguna, tb_pengguna.nama_lengkap as nama_lengkap_pengguna, tb_pengguna.email as email_pengguna, tb_pengguna.alamat as alamat_pengguna, tb_pengguna.no_hp as no_hp_pengguna, tb_pengguna.foto as foto_pengguna, tb_pengguna.no_rekening, tb_pengguna.nama_bank, tb_pengguna.total_saldo,
            
            tb_lapangan.id_gor, tb_lapangan.nomor_lapangan, tb_lapangan.harga, tb_lapangan.jenis,
            
            tb_gor.nama_gor, tb_gor.alamat_gor, tb_gor.alamat_gor, tb_gor.longitude, tb_gor.latitude, tb_gor.deskripsi, tb_gor.jumlah_lapangan, tb_gor.foto, tb_gor.fasilitas, tb_gor.id_pengelola,
            
            tb_pengelola.username as username_pengelola, tb_pengelola.email as email_pengelola, tb_pengelola.nama_lengkap as nama_lengkap_pengelola, tb_pengelola.alamat as alamat_pengelola, tb_pengelola.no_hp as no_hp_pengelola, tb_pengelola.foto as foto_pengelola
           
				FROM tb_pemesanan INNER JOIN tb_pengguna, tb_lapangan, tb_gor, tb_pengelola
				WHERE tb_pemesanan.id_pengguna = tb_pengguna.id_pengguna
                AND tb_pemesanan.id_lapangan = tb_lapangan.id_lapangan
                AND tb_lapangan.id_gor = tb_gor.id_gor
                AND tb_gor.id_pengelola = tb_pengelola.id_pengelola
                AND tb_pemesanan.status = 'Batal'
				AND tb_pemesanan.id_pengguna = '$id_pengguna'";

 			$response['master'] = Yii::$app->db->createCommand($pemesanan)->queryAll();
 		}

 		return $response;
 	}

 	public function actionGetAllByPengelolaMenungguKonfirmasi($id_pengelola){
 		Yii::$app->response->format = Response::FORMAT_JSON;

 		$response = null;

 		if (Yii::$app->request->isGet){

 			$pemesanan = "SELECT tb_pemesanan.id_pemesanan, tb_pemesanan.id_pengguna, tb_pemesanan.id_lapangan, tb_pemesanan.status, tb_pemesanan.id_jadwal, tb_pemesanan.createdAt, tb_pemesanan.updatedAt,

			tb_pengguna.username as username_pengguna, tb_pengguna.nama_lengkap as nama_lengkap_pengguna, tb_pengguna.email as email_pengguna, tb_pengguna.alamat as alamat_pengguna, tb_pengguna.no_hp as no_hp_pengguna, tb_pengguna.foto as foto_pengguna, tb_pengguna.no_rekening, tb_pengguna.nama_bank, tb_pengguna.total_saldo,
            
            tb_lapangan.id_gor, tb_lapangan.nomor_lapangan, tb_lapangan.harga, tb_lapangan.jenis,
            
            tb_gor.nama_gor, tb_gor.alamat_gor, tb_gor.alamat_gor, tb_gor.longitude, tb_gor.latitude, tb_gor.deskripsi, tb_gor.jumlah_lapangan, tb_gor.foto, tb_gor.fasilitas, tb_gor.id_pengelola,
            
            tb_pengelola.username as username_pengelola, tb_pengelola.email as email_pengelola, tb_pengelola.nama_lengkap as nama_lengkap_pengelola, tb_pengelola.alamat as alamat_pengelola, tb_pengelola.no_hp as no_hp_pengelola, tb_pengelola.foto as foto_pengelola
           
				FROM tb_pemesanan INNER JOIN tb_pengguna, tb_lapangan, tb_gor, tb_pengelola
				WHERE tb_pemesanan.id_pengguna = tb_pengguna.id_pengguna
                AND tb_pemesanan.id_lapangan = tb_lapangan.id_lapangan
                AND tb_lapangan.id_gor = tb_gor.id_gor
                AND tb_gor.id_pengelola = tb_pengelola.id_pengelola
                AND tb_pemesanan.status = 'Menunggu Konfirmasi'
				AND tb_gor.id_pengelola = '$id_pengelola'";

 			$response['master'] = Yii::$app->db->createCommand($pemesanan)->queryAll();
 		}

 		return $response;
 	}

 	public function actionGetAllByPengelolaSedangMemesan($id_pengelola){
 		Yii::$app->response->format = Response::FORMAT_JSON;

 		$response = null;

 		if (Yii::$app->request->isGet){

 			$pemesanan = "SELECT tb_pemesanan.id_pemesanan, tb_pemesanan.id_pengguna, tb_pemesanan.id_lapangan, tb_pemesanan.status, tb_pemesanan.id_jadwal, tb_pemesanan.createdAt, tb_pemesanan.updatedAt,

			tb_pengguna.username as username_pengguna, tb_pengguna.nama_lengkap as nama_lengkap_pengguna, tb_pengguna.email as email_pengguna, tb_pengguna.alamat as alamat_pengguna, tb_pengguna.no_hp as no_hp_pengguna, tb_pengguna.foto as foto_pengguna, tb_pengguna.no_rekening, tb_pengguna.nama_bank, tb_pengguna.total_saldo,
            
            tb_lapangan.id_gor, tb_lapangan.nomor_lapangan, tb_lapangan.harga, tb_lapangan.jenis,
            
            tb_gor.nama_gor, tb_gor.alamat_gor, tb_gor.alamat_gor, tb_gor.longitude, tb_gor.latitude, tb_gor.deskripsi, tb_gor.jumlah_lapangan, tb_gor.foto, tb_gor.fasilitas, tb_gor.id_pengelola,
            
            tb_pengelola.username as username_pengelola, tb_pengelola.email as email_pengelola, tb_pengelola.nama_lengkap as nama_lengkap_pengelola, tb_pengelola.alamat as alamat_pengelola, tb_pengelola.no_hp as no_hp_pengelola, tb_pengelola.foto as foto_pengelola
           
				FROM tb_pemesanan INNER JOIN tb_pengguna, tb_lapangan, tb_gor, tb_pengelola
				WHERE tb_pemesanan.id_pengguna = tb_pengguna.id_pengguna
                AND tb_pemesanan.id_lapangan = tb_lapangan.id_lapangan
                AND tb_lapangan.id_gor = tb_gor.id_gor
                AND tb_gor.id_pengelola = tb_pengelola.id_pengelola
                AND tb_pemesanan.status = 'Sedang Memesan'
				AND tb_gor.id_pengelola = '$id_pengelola'";

 			$response['master'] = Yii::$app->db->createCommand($pemesanan)->queryAll();
 		}

 		return $response;
 	}

 	public function actionGetAllByPengelolaSelesai($id_pengelola){
 		Yii::$app->response->format = Response::FORMAT_JSON;

 		$response = null;

 		if (Yii::$app->request->isGet){

 			$pemesanan = "SELECT tb_pemesanan.id_pemesanan, tb_pemesanan.id_pengguna, tb_pemesanan.id_lapangan, tb_pemesanan.status, tb_pemesanan.id_jadwal, tb_pemesanan.createdAt, tb_pemesanan.updatedAt,

			tb_pengguna.username as username_pengguna, tb_pengguna.nama_lengkap as nama_lengkap_pengguna, tb_pengguna.email as email_pengguna, tb_pengguna.alamat as alamat_pengguna, tb_pengguna.no_hp as no_hp_pengguna, tb_pengguna.foto as foto_pengguna, tb_pengguna.no_rekening, tb_pengguna.nama_bank, tb_pengguna.total_saldo,
            
            tb_lapangan.id_gor, tb_lapangan.nomor_lapangan, tb_lapangan.harga, tb_lapangan.jenis,
            
            tb_gor.nama_gor, tb_gor.alamat_gor, tb_gor.alamat_gor, tb_gor.longitude, tb_gor.latitude, tb_gor.deskripsi, tb_gor.jumlah_lapangan, tb_gor.foto, tb_gor.fasilitas, tb_gor.id_pengelola,
            
            tb_pengelola.username as username_pengelola, tb_pengelola.email as email_pengelola, tb_pengelola.nama_lengkap as nama_lengkap_pengelola, tb_pengelola.alamat as alamat_pengelola, tb_pengelola.no_hp as no_hp_pengelola, tb_pengelola.foto as foto_pengelola
           
				FROM tb_pemesanan INNER JOIN tb_pengguna, tb_lapangan, tb_gor, tb_pengelola
				WHERE tb_pemesanan.id_pengguna = tb_pengguna.id_pengguna
                AND tb_pemesanan.id_lapangan = tb_lapangan.id_lapangan
                AND tb_lapangan.id_gor = tb_gor.id_gor
                AND tb_gor.id_pengelola = tb_pengelola.id_pengelola
                AND tb_pemesanan.status = 'Selesai'
				AND tb_gor.id_pengelola = '$id_pengelola'";

 			$response['master'] = Yii::$app->db->createCommand($pemesanan)->queryAll();
 		}

 		return $response;
 	}

 	public function actionGetAllByPengelolaBatal($id_pengelola){
 		Yii::$app->response->format = Response::FORMAT_JSON;

 		$response = null;

 		if (Yii::$app->request->isGet){

 			$pemesanan = "SELECT tb_pemesanan.id_pemesanan, tb_pemesanan.id_pengguna, tb_pemesanan.id_lapangan, tb_pemesanan.status, tb_pemesanan.id_jadwal, tb_pemesanan.createdAt, tb_pemesanan.updatedAt,

			tb_pengguna.username as username_pengguna, tb_pengguna.nama_lengkap as nama_lengkap_pengguna, tb_pengguna.email as email_pengguna, tb_pengguna.alamat as alamat_pengguna, tb_pengguna.no_hp as no_hp_pengguna, tb_pengguna.foto as foto_pengguna, tb_pengguna.no_rekening, tb_pengguna.nama_bank, tb_pengguna.total_saldo,
            
            tb_lapangan.id_gor, tb_lapangan.nomor_lapangan, tb_lapangan.harga, tb_lapangan.jenis,
            
            tb_gor.nama_gor, tb_gor.alamat_gor, tb_gor.alamat_gor, tb_gor.longitude, tb_gor.latitude, tb_gor.deskripsi, tb_gor.jumlah_lapangan, tb_gor.foto, tb_gor.fasilitas, tb_gor.id_pengelola,
            
            tb_pengelola.username as username_pengelola, tb_pengelola.email as email_pengelola, tb_pengelola.nama_lengkap as nama_lengkap_pengelola, tb_pengelola.alamat as alamat_pengelola, tb_pengelola.no_hp as no_hp_pengelola, tb_pengelola.foto as foto_pengelola
           
				FROM tb_pemesanan INNER JOIN tb_pengguna, tb_lapangan, tb_gor, tb_pengelola
				WHERE tb_pemesanan.id_pengguna = tb_pengguna.id_pengguna
                AND tb_pemesanan.id_lapangan = tb_lapangan.id_lapangan
                AND tb_lapangan.id_gor = tb_gor.id_gor
                AND tb_gor.id_pengelola = tb_pengelola.id_pengelola
                AND tb_pemesanan.status = 'Batal'
				AND tb_gor.id_pengelola = '$id_pengelola'";

 			$response['master'] = Yii::$app->db->createCommand($pemesanan)->queryAll();
 		}

 		return $response;
 	}

 	public function actionById($id_pemesanan){
 		Yii::$app->response->format = Response::FORMAT_JSON;

 		$response = null;

 		if (Yii::$app->request->isGet){

 			$pemesanan = "SELECT tb_pemesanan.id_pemesanan, tb_pemesanan.id_pengguna, tb_pemesanan.id_lapangan, tb_pemesanan.status, tb_pemesanan.id_jadwal, tb_pemesanan.createdAt, tb_pemesanan.updatedAt,

			tb_pengguna.username as username_pengguna, tb_pengguna.nama_lengkap as nama_lengkap_pengguna, tb_pengguna.email as email_pengguna, tb_pengguna.alamat as alamat_pengguna, tb_pengguna.no_hp as no_hp_pengguna, tb_pengguna.foto as foto_pengguna, tb_pengguna.no_rekening, tb_pengguna.nama_bank, tb_pengguna.total_saldo,
            
            tb_lapangan.id_gor, tb_lapangan.nomor_lapangan, tb_lapangan.harga, tb_lapangan.jenis,
            
            tb_gor.nama_gor, tb_gor.alamat_gor, tb_gor.alamat_gor, tb_gor.longitude, tb_gor.latitude, tb_gor.deskripsi, tb_gor.jumlah_lapangan, tb_gor.foto, tb_gor.fasilitas, tb_gor.id_pengelola,
            
            tb_pengelola.username as username_pengelola, tb_pengelola.email as email_pengelola, tb_pengelola.nama_lengkap as nama_lengkap_pengelola, tb_pengelola.alamat as alamat_pengelola, tb_pengelola.no_hp as no_hp_pengelola, tb_pengelola.foto as foto_pengelola
           
				FROM tb_pemesanan INNER JOIN tb_pengguna, tb_lapangan, tb_gor, tb_pengelola
				WHERE tb_pemesanan.id_pengguna = tb_pengguna.id_pengguna
                AND tb_pemesanan.id_lapangan = tb_lapangan.id_lapangan
                AND tb_lapangan.id_gor = tb_gor.id_gor
                AND tb_gor.id_pengelola = tb_pengelola.id_pengelola
                AND tb_pemesanan.id_pemesanan = '$id_pemesanan'";

 			$response['master'] = Yii::$app->db->createCommand($pemesanan)->queryAll();
 		}

 		return $response;
 	}

 }