<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Contract;
use backend\models\User;
use yii\db\Query;

/**
 * ContractSearch represents the model behind the search form about `backend\models\Contract`.
 */
class ContractSearch extends Contract
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_contract', 'id_user', 'id_local', 'total', 'timeadd', 'status'], 'integer'],
            [['start_time', 'end_time', 'create_day', 'payment1', 'payment2', 'payment3', 'timephoto', 'timecomplete'], 'safe'],
        ];
    }
    
    public $user;

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
        //$query = Contract::find();
        
        $query =Contract::find()->joinWith('idUser');
        //var_dump($query);exit;
        $test = Yii::$app->db->createCommand('select * from contract INNER JOIN user ON contract.id_user = user.id')->execute();
        
         
        
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
            'id_contract' => $this->id_contract,
            'id_user' => $this->id_user,
            'id_local' => $this->id_local,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'create_day' => $this->create_day,
            'total' => $this->total,
            'payment1' => $this->payment1,
            'payment2' => $this->payment2,
            'payment3' => $this->payment3,
            'timephoto' => $this->timephoto,
            'timeadd' => $this->timeadd,
            'timecomplete' => $this->timecomplete,
            'status' => $this->status,
        ]);

        return $dataProvider;
    }
}
