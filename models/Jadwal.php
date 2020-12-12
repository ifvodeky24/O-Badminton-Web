<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_jadwal".
 *
 * @property int $id_jadwal
 * @property int $id_lapangan
 * @property string $hari
 * @property string $jam
 * @property string $status
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property TbLapangan $lapangan
 * @property TbPemesanan[] $tbPemesanans
 */
class Jadwal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_jadwal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_lapangan', 'hari', 'jam', 'status'], 'required'],
            [['id_lapangan'], 'integer'],
            [['hari', 'status'], 'string'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['jam'], 'string', 'max' => 50],
            [['id_lapangan'], 'exist', 'skipOnError' => true, 'targetClass' => Lapangan::className(), 'targetAttribute' => ['id_lapangan' => 'id_lapangan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jadwal' => 'Id Jadwal',
            'id_lapangan' => 'Id Lapangan',
            'hari' => 'Hari',
            'jam' => 'Jam',
            'status' => 'Status',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLapangan()
    {
        return $this->hasOne(Lapangan::className(), ['id_lapangan' => 'id_lapangan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemesanan()
    {
        return $this->hasMany(Pemesanan::className(), ['id_jadwal' => 'id_jadwal']);
    }
}
