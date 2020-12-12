<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Topup;

/**
 * TopupSearch represents the model behind the search form about `app\models\Topup`.
 */
class TopupSearch extends Topup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_topup', 'id_pengguna'], 'integer'],
            [['jumlah', 'bukti_transfer', 'status', 'createdAt', 'updatedAt'], 'safe'],
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
        $query = Topup::find();

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
            'id_topup' => $this->id_topup,
            'id_pengguna' => $this->id_pengguna,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ]);

        $query->andFilterWhere(['like', 'jumlah', $this->jumlah])
            ->andFilterWhere(['like', 'bukti_transfer', $this->bukti_transfer])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
