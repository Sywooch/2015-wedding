<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "photocontract".
 *
 * @property integer $id_user
 * @property integer $id_contract
 * @property string $start_time
 * @property string $end_time
 * @property string $status
 * 
 * @property User $idUser
 * @property Contract $idContract
 */
class Photocontract extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photocontract';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_contract'], 'required','message' => 'Thông tin này không được để trống'],
            [['id_user', 'id_contract','status'], 'integer'],
            [['start_time', 'end_time'], 'string','max'=>100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Thợ Chụp Ảnh',
            'id_contract' => 'Mã Hợp Đồng',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdContract()
    {
        return $this->hasOne(Contract::className(), ['id_contract' => 'id_contract']);
    }
}
