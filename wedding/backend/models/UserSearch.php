<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\User;

/**
 * UserSearch represents the model behind the search form about `backend\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type_user', 'range_user', 'rate_user', 'have_contract', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'fullname', 'fullname2', 'tell', 'tell2', 'email', 'email2', 'info_user', 'address', 'avatar'], 'safe'],
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
        $query = User::find();

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
            'id' => $this->id,
            'type_user' => $this->type_user,
            'range_user' => $this->range_user,
            'rate_user' => $this->rate_user,
            'have_contract' => $this->have_contract,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'fullname2', $this->fullname2])
            ->andFilterWhere(['like', 'tell', $this->tell])
            ->andFilterWhere(['like', 'tell2', $this->tell2])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'email2', $this->email2])
            ->andFilterWhere(['like', 'info_user', $this->info_user])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'avatar', $this->avatar]);

        return $dataProvider;
    }
    
    
    public function searchUser($params,$id)
    {
        $query = User::find()->where(['type_user'=>$id]);

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
            'id' => $this->id,
           // 'type_user' => $this->type_user,
            'range_user' => $this->range_user,
            'rate_user' => $this->rate_user,
            'have_contract' => $this->have_contract,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'fullname2', $this->fullname2])
            ->andFilterWhere(['like', 'tell', $this->tell])
            ->andFilterWhere(['like', 'tell2', $this->tell2])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'email2', $this->email2])
            ->andFilterWhere(['like', 'info_user', $this->info_user])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'avatar', $this->avatar]);

        return $dataProvider;
    }
    
    
    
}
