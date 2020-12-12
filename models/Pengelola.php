<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_pengelola".
 *
 * @property int $id_pengelola
 * @property string $username
 * @property string $email
 * @property string $nama_lengkap
 * @property string $password
 * @property string $alamat
 * @property string $no_hp
 * @property string $foto
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property TbGor[] $tbGors
 */
class Pengelola extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_pengelola';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'nama_lengkap', 'password', 'alamat', 'no_hp', 'foto'], 'required'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['username', 'nama_lengkap', 'no_hp', 'foto'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 50],
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
            'id_pengelola' => 'Id Pengelola',
            'username' => 'Username',
            'email' => 'Email',
            'nama_lengkap' => 'Nama Lengkap',
            'password' => 'Password',
            'alamat' => 'Alamat',
            'no_hp' => 'No Hp',
            'foto' => 'Foto',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGor()
    {
        return $this->hasMany(Tor::className(), ['id_pengelola' => 'id_pengelola']);
    }
}
