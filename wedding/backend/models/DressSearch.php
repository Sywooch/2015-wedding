<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Dress;

/**
 * DressSearch represents the model behind the search form about `backend\models\Dress`.
 */
class DressSearch extends Dress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dress', 'type_dress', 'rate_hire', 'rate_sale', 'status'], 'integer'],
            [['name_dress', 'avatar', 'info_dress'], 'safe'],
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
        $query = Dress::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_dress' => $this->id_dress,
            'type_dress' => $this->type_dress,
            'rate_hire' => $this->rate_hire,
            'rate_sale' => $this->rate_sale,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name_dress', $this->name_dress])
            ->andFilterWhere(['like', 'avatar', $this->avatar])
            ->andFilterWhere(['like', 'info_dress', $this->info_dress]);

        return $dataProvider;
    }
}
