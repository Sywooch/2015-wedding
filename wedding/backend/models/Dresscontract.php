<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dresscontract".
 *
 * @property integer $id_dress
 * @property integer $id_contract
 * @property string $start_time
 * @property string $end_time
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
            [['id_dress', 'id_contract'], 'integer'],
            [['start_time', 'end_time'], 'string','max'=>100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dress' => 'Áo Cưới',
            'id_contract' => 'Mã Hợp Đồng',
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
