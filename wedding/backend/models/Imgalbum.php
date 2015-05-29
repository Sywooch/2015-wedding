<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "imgalbum".
 *
 * @property integer $id_album
 * @property integer $id_img
 *
 * @property Album $idAlbum
 * @property Img $idImg
 */
class Imgalbum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'imgalbum';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_album', 'id_img'], 'required'],
            [['id_album', 'id_img'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_album' => 'Id Album',
            'id_img' => 'Id Img',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAlbum()
    {
        return $this->hasOne(Album::className(), ['id_album' => 'id_album']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdImg()
    {
        return $this->hasOne(Img::className(), ['id_img' => 'id_img']);
    }
}
