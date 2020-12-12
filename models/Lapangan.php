<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_lapangan".
 *
 * @property int $id_lapangan
 * @property int $id_gor
 * @property int $nomor_lapangan
 * @property int $harga
 * @property string $jenis
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property TbJadwal[] $tbJadwals
 * @property TbGor $gor
 * @property TbPemesanan[] $tbPemesanans
 */
class Lapangan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_lapangan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_gor', 'nomor_lapangan', 'harga', 'jenis'], 'required'],
            [['id_gor', 'nomor_lapangan', 'harga'], 'integer'],
            [['jenis'], 'string'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['id_gor'], 'exist', 'skipOnError' => true, 'targetClass' => Gor::className(), 'targetAttribute' => ['id_gor' => 'id_gor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_lapangan' => 'Id Lapangan',
            'id_gor' => 'Id Gor',
            'nomor_lapangan' => 'Nomor Lapangan',
            'harga' => 'Harga',
            'jenis' => 'Jenis',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwas()
    {
        return $this->hasMany(Jadwal::className(), ['id_lapangan' => 'id_lapangan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGor()
    {
        return $this->hasOne(Gor::className(), ['id_gor' => 'id_gor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemesanan()
    {
        return $this->hasMany(Pemesanan::className(), ['id_lapangan' => 'id_lapangan']);
    }
}
