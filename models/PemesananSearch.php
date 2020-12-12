<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pemesanan;

/**
 * PemesananSearch represents the model behind the search form about `app\models\Pemesanan`.
 */
class PemesananSearch extends Pemesanan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pemesanan', 'id_pengguna', 'id_lapangan', 'id_jadwal'], 'integer'],
            [['status', 'createdAt', 'updatedAt'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Pemesanan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_pemesanan' => $this->id_pemesanan,
            'id_pengguna' => $this->id_pengguna,
            'id_lapangan' => $this->id_lapangan,
            'id_jadwal' => $this->id_jadwal,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
