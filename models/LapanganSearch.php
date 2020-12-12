<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lapangan;

/**
 * LapanganSearch represents the model behind the search form about `app\models\Lapangan`.
 */
class LapanganSearch extends Lapangan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_lapangan', 'id_gor', 'nomor_lapangan', 'harga'], 'integer'],
            [['jenis', 'createdAt', 'updatedAt'], 'safe'],
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
        $query = Lapangan::find();

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
            'id_lapangan' => $this->id_lapangan,
            'id_gor' => $this->id_gor,
            'nomor_lapangan' => $this->nomor_lapangan,
            'harga' => $this->harga,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ]);

        $query->andFilterWhere(['like', 'jenis', $this->jenis]);

        return $dataProvider;
    }
}
