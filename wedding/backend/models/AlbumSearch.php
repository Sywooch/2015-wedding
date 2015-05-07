<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Album;

/**
 * AlbumSearch represents the model behind the search form about `backend\models\Album`.
 */
class AlbumSearch extends Album
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_album', 'id_contract', 'numpage', 'url_folder', 'rate', 'status'], 'integer'],
            [['url_psd', 'time_complete'], 'safe'],
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
        $query = Album::find();

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
            'id_album' => $this->id_album,
            'id_contract' => $this->id_contract,
            'numpage' => $this->numpage,
            'time_complete' => $this->time_complete,
            'url_folder' => $this->url_folder,
            'rate' => $this->rate,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'url_psd', $this->url_psd]);

        return $dataProvider;
    }
}
