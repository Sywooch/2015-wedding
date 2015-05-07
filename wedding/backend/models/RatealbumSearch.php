<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Ratealbum;

/**
 * RatealbumSearch represents the model behind the search form about `backend\models\Ratealbum`.
 */
class RatealbumSearch extends Ratealbum
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_num', 'rate'], 'integer'],
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
        $query = Ratealbum::find();

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
            'page_num' => $this->page_num,
            'rate' => $this->rate,
        ]);

        return $dataProvider;
    }
}
