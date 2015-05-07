<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "imgdress".
 *
 * @property integer $id_img
 * @property integer $id_dress
 *
 * @property Dress $idDress
 * @property Img $idImg
 */
class Imgdress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'imgdress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_img', 'id_dress'], 'required'],
            [['id_img' ], 'integer'],
            [[ 'id_dress'], 'string','max'=>20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_img' => 'Id Img',
            'id_dress' => 'Id Dress',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDress()
    {
        return $this->hasOne(Dress::className(), ['id_dress' => 'id_dress']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdImg()
    {
        return $this->hasOne(Img::className(), ['id_img' => 'id_img']);
    }
}
