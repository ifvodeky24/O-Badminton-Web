<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

use yii;

/**
 * This is the model class for table "tb_user".
 *
 * @property int $id_user
 * @property string $username
 * @property string $nama_lengkap
 * @property string $password
 * @property string $alamat
 * @property string $no_hp
 * @property string $authKey
 * @property string $accesToken
 * @property string $foto
 * @property string $authKey
 * @property string $accesToken
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'nama_lengkap', 'password', 'alamat', 'no_hp', 'authKey', 'accesToken', 'foto'], 'required'],
            [['username'], 'string', 'max' => 50],
            [['nama_lengkap', 'no_hp', 'authKey', 'accesToken', 'foto'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 255],
            [['alamat'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'username' => 'Username',
            'nama_lengkap' => 'Nama Lengkap',
            'password' => 'Password',
            'alamat' => 'Alamat',
            'no_hp' => 'No Hp',
            'authKey' => 'Auth Key',
            'accesToken' => 'Acces Token',
            'foto' => 'Foto',
        ];
    }


/**
     * {@inheritdoc}
     */
   public static function findIdentity($id)
    {
        // mencari user berdasarkan ID dan yg dicari hanya 1
        $user = User::findOne($id);

        if ($user != null) {
            return $user;
        }else{
            return null;
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
      // mencari user berdasarkan accesToken dan yang dicari hanya 1
      $user = User::find()->where(['accessToken' => $token])->one();

      if ($user != null) {
            return $user;
        }else{
            return null;
        }
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
      // mencari user berdasarkan username dan yang dicari haya 1
        $user = User::find()->where(['username' => $username])->one();

        if ($user != null) {
            return $user;
        }else{
            return null;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id_user;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    
}
