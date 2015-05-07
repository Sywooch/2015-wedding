<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dresscontract".
 *
 * @property integer $id_dress
 * @property integer $id_contract
 *
 * @property Contract $idContract
 * @property Dress $idDress
 */
class Dresscontract extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dresscontract';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dress', 'id_contract'], 'required'],
            [['id_dress', 'id_contract'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dress' => 'Id Dress',
            'id_contract' => 'Id Contract',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdContract()
    {
        return $this->hasOne(Contract::className(), ['id_contract' => 'id_contract']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDress()
    {
        return $this->hasOne(Dress::className(), ['id_dress' => 'id_dress']);
    }
}
