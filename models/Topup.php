<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_topup".
 *
 * @property int $id_topup
 * @property int $id_pengguna
 * @property string $jumlah
 * @property string $bukti_transfer
 * @property string $status
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property TbPengguna $pengguna
 */
class Topup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_topup';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pengguna', 'jumlah', 'bukti_transfer', 'status'], 'required'],
            [['id_pengguna'], 'integer'],
            [['status'], 'string'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['jumlah', 'bukti_transfer'], 'string', 'max' => 50],
            [['id_pengguna'], 'exist', 'skipOnError' => true, 'targetClass' => Pengguna::className(), 'targetAttribute' => ['id_pengguna' => 'id_pengguna']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_topup' => 'Id Topup',
            'id_pengguna' => 'Id Pengguna',
            'jumlah' => 'Jumlah',
            'bukti_transfer' => 'Bukti Transfer',
            'status' => 'Status',
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
}
