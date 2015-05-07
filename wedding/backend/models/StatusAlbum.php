<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "status_album".
 *
 * @property integer $status_album
 * @property string $name_status
 */
class StatusAlbum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_album';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_album', 'name_status'], 'required'],
            [['status_album'], 'integer'],
            [['name_status'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'status_album' => 'Status Album',
            'name_status' => 'Name Status',
        ];
    }
}
