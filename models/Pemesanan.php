<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_pemesanan".
 *
 * @property int $id_pemesanan
 * @property int $id_pengguna
 * @property int $id_lapangan
 * @property string $status
 * @property int $id_jadwal
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property TbPengguna $pengguna
 * @property TbLapangan $lapangan
 * @property TbJadwal $jadwal
 */
class Pemesanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_pemesanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pengguna', 'id_lapangan', 'status', 'id_jadwal'], 'required'],
            [['id_pengguna', 'id_lapangan', 'id_jadwal'], 'integer'],
            [['status'], 'string'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['id_pengguna'], 'exist', 'skipOnError' => true, 'targetClass' => Pengguna::className(), 'targetAttribute' => ['id_pengguna' => 'id_pengguna']],
            [['id_lapangan'], 'exist', 'skipOnError' => true, 'targetClass' => Lapangan::className(), 'targetAttribute' => ['id_lapangan' => 'id_lapangan']],
            [['id_jadwal'], 'exist', 'skipOnError' => true, 'targetClass' => Jadwal::className(), 'targetAttribute' => ['id_jadwal' => 'id_jadwal']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pemesanan' => 'Id Pemesanan',
            'id_pengguna' => 'Id Pengguna',
            'id_lapangan' => 'Id Lapangan',
            'status' => 'Status',
            'id_jadwal' => 'Id Jadwal',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengguna()
    {
        return $this->hasOne(Pengguna::className(), ['id_pengguna' => 'id_pengguna']);
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
    public function getJadwal()
    {
        return $this->hasOne(Jadwal::className(), ['id_jadwal' => 'id_jadwal']);
    }
}
