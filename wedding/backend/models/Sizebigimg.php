<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sizebigimg".
 *
 * @property string $size
 * @property string $rate
 *
 * @property Bigimg[] $bigimgs
 */
class Sizebigimg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sizebigimg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['size'], 'required'],
            [['rate'], 'integer'],
            [['size'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'size' => 'Size',
            'rate' => 'Rate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBigimgs()
    {
        return $this->hasMany(Bigimg::className(), ['size' => 'size']);
    }
}
