<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Localtion;

/**
 * LocaltionSearch represents the model behind the search form about `backend\models\Localtion`.
 */
class LocaltionSearch extends Localtion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_local', 'rate', 'timework', 'status'], 'integer'],
            [['name_local', 'info_local', 'avatar'], 'safe'],
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
        $query = Localtion::find();

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
            'id_local' => $this->id_local,
            'rate' => $this->rate,
            'timework' => $this->timework,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name_local', $this->name_local])
            ->andFilterWhere(['like', 'info_local', $this->info_local])
            ->andFilterWhere(['like', 'avatar', $this->avatar]);

        return $dataProvider;
    }
}
