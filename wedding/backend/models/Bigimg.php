<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bigimg".
 *
 * @property integer $id_contract
 * @property string $url
 * @property string $size
 *
 * @property Contract $idContract
 * @property Img $idImg
 * @property Sizebigimg $size0
 */
class Bigimg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bigimg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_contract', 'size'], 'required'],
            [['id_contract'], 'integer'],
            [['size'], 'string', 'max' => 20],
            [['url'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contract' => 'Id Contract',
            'url' => 'Url',
            'size' => 'Size',
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
    public function getIdImg()
    {
        return $this->hasOne(Img::className(), ['id_img' => 'id_img']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSize0()
    {
        return $this->hasOne(Sizebigimg::className(), ['size' => 'size']);
    }
}
