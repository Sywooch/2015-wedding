<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ratealbum".
 *
 * @property integer $page_num
 * @property string $rate
 */
class Ratealbum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ratealbum';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_num', 'rate'], 'required'],
            [['page_num', 'rate'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'page_num' => 'Page Num',
            'rate' => 'Rate',
        ];
    }
}
