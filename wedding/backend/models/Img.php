<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "img".
 *
 * @property integer $id_img
 * @property string $url
 * @property string $title
 * @property integer $status
 *
 * @property Imgdress[] $imgdresses
 * @property Imglocal[] $imglocals
 * @property Imgtool[] $imgtools
 */
class Img extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'img';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['status'], 'integer'],
            [['url'], 'string', 'max' => 250],
            [['title'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_img' => 'Id Img',
            'url' => 'Url',
            'title' => 'Title',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImgdresses()
    {
        return $this->hasMany(Imgdress::className(), ['id_img' => 'id_img']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImglocals()
    {
        return $this->hasMany(Imglocal::className(), ['id_img' => 'id_img']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImgtools()
    {
        return $this->hasMany(Imgtool::className(), ['id_img' => 'id_img']);
    }
}
