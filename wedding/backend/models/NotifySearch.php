<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Notify;

/**
 * NotifySearch represents the model behind the search form about `backend\models\Notify`.
 */
class NotifySearch extends Notify
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_notify', 'id_user', 'status'], 'integer'],
            [['fullname', 'email', 'tell', 'date_create', 'content'], 'safe'],
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
        $query = Notify::find();

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
            'id_notify' => $this->id_notify,
            'id_user' => $this->id_user,
            'date_create' => $this->date_create,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'tell', $this->tell])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}