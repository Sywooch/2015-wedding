<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "imglocal".
 *
 * @property integer $id_local
 * @property integer $id_img
 *
 * @property Img $idImg
 * @property Localtion $idLocal
 */
class Imglocal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'imglocal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_local', 'id_img'], 'required'],
            [[ 'id_img'], 'integer'],
            [[ 'id_local'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_local' => 'Id Local',
            'id_img' => 'Id Img',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdImg()
    {
        return $this->hasOne(Img::className(), ['id_img' => 'id_img']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLocal()
    {
        return $this->hasOne(Localtion::className(), ['id_local' => 'id_local']);
    }
}
