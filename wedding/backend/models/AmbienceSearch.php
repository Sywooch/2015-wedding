<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Ambience;

/**
 * AmbienceSearch represents the model behind the search form about `backend\models\Ambience`.
 */
class AmbienceSearch extends Ambience
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_local_amb', 'id_local', 'status'], 'integer'],
            [['name_amb', 'info_amb', 'avatar'], 'safe'],
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
        $query = Ambience::find();

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
            'id_local_amb' => $this->id_local_amb,
            'id_local' => $this->id_local,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name_amb', $this->name_amb])
            ->andFilterWhere(['like', 'info_amb', $this->info_amb])
            ->andFilterWhere(['like', 'avatar', $this->avatar]);

        return $dataProvider;
    }
}
