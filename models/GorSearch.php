<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Gor;

/**
 * GorSearch represents the model behind the search form about `app\models\Gor`.
 */
class GorSearch extends Gor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_gor', 'jumlah_lapangan', 'id_pengelola'], 'integer'],
            [['nama_gor', 'alamat_gor', 'deskripsi', 'foto', 'fasilitas', 'createdAt', 'updatedAt'], 'safe'],
            [['longitude', 'latitude'], 'number'],
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
        $query = Gor::find();

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
            'id_gor' => $this->id_gor,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'jumlah_lapangan' => $this->jumlah_lapangan,
            'id_pengelola' => $this->id_pengelola,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ]);

        $query->andFilterWhere(['like', 'nama_gor', $this->nama_gor])
            ->andFilterWhere(['like', 'alamat_gor', $this->alamat_gor])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'fasilitas', $this->fasilitas]);

        return $dataProvider;
    }
}
