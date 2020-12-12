<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_pengguna".
 *
 * @property int $id_pengguna
 * @property string $username
 * @property string $nama_lengkap
 * @property string $password
 * @property string $email
 * @property string $alamat
 * @property string $no_hp
 * @property string $foto
 * @property string $no_rekening
 * @property string $nama_bank
 * @property string|null $total_saldo
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property TbPemesanan[] $tbPemesanans
 */
class Pengguna extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_pengguna';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'nama_lengkap', 'password', 'email', 'alamat', 'no_hp', 'foto', 'no_rekening', 'nama_bank'], 'required'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['username', 'email', 'no_rekening', 'nama_bank', 'total_saldo'], 'string', 'max' => 50],
            [['nama_lengkap', 'no_hp', 'foto'], 'string', 'max' => 30],
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
            'id_pengguna' => 'Id Pengguna',
            'username' => 'Username',
            'nama_lengkap' => 'Nama Lengkap',
            'password' => 'Password',
            'email' => 'Email',
            'alamat' => 'Alamat',
            'no_hp' => 'No Hp',
            'foto' => 'Foto',
            'no_rekening' => 'No Rekening',
            'nama_bank' => 'Nama Bank',
            'total_saldo' => 'Total Saldo',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemesanan()
    {
        return $this->hasMany(Pemesanan::className(), ['id_pengguna' => 'id_pengguna']);
    }
}
