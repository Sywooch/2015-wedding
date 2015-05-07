<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ambience".
 *
 * @property integer $id_local_amb
 * @property integer $id_local
 * @property string $name_amb
 * @property string $info_amb
 * @property string $avatar
 * @property integer $status
 *
 * @property Localtion $idLocal
 */
class Ambience extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ambience';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_local', 'name_amb', 'info_amb', 'status'], 'required'],
            [['id_local', 'status'], 'integer'],
            [['info_amb'], 'string'],
            [['name_amb'], 'string', 'max' => 200],
            [['avatar'], 'string', 'max' => 350]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_local_amb' => 'Id Local Amb',
            'id_local' => 'Id Local',
            'name_amb' => 'Name Amb',
            'info_amb' => 'Info Amb',
            'avatar' => 'Avatar',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLocal()
    {
        return $this->hasOne(Localtion::className(), ['id_local' => 'id_local']);
    }
}
