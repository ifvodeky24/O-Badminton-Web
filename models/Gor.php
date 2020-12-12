<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_gor".
 *
 * @property int $id_gor
 * @property string $nama_gor
 * @property string $alamat_gor
 * @property float $longitude
 * @property float $latitude
 * @property string $deskripsi
 * @property int $jumlah_lapangan
 * @property string $foto
 * @property string $fasilitas
 * @property string $status
 * @property int $id_pengelola
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property TbPengelola $pengelola
 * @property TbLapangan[] $tbLapangans
 */
class Gor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_gor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_gor', 'alamat_gor', 'longitude', 'latitude', 'deskripsi', 'jumlah_lapangan', 'foto', 'fasilitas', 'id_pengelola', 'status'], 'required'],
            [['longitude', 'latitude'], 'number'],
            [['status'], 'string'],
            [['jumlah_lapangan', 'id_pengelola'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['nama_gor'], 'string', 'max' => 50],
            [['alamat_gor'], 'string', 'max' => 100],
            [['deskripsi'], 'string', 'max' => 200],
            [['foto', 'fasilitas'], 'string', 'max' => 30],
            [['id_pengelola'], 'exist', 'skipOnError' => true, 'targetClass' => Pengelola::className(), 'targetAttribute' => ['id_pengelola' => 'id_pengelola']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_gor' => 'Id Gor',
            'nama_gor' => 'Nama Gor',
            'alamat_gor' => 'Alamat Gor',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'deskripsi' => 'Deskripsi',
            'jumlah_lapangan' => 'Jumlah Lapangan',
            'foto' => 'Foto',
            'fasilitas' => 'Fasilitas',
            'status' => 'Status',
            'id_pengelola' => 'Id Pengelola',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengelola()
    {
        return $this->hasOne(Pengelola::className(), ['id_pengelola' => 'id_pengelola']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLapangan()
    {
        return $this->hasMany(Lapangan::className(), ['id_gor' => 'id_gor']);
    }
}
