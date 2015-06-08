<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "notify".
 *
 * @property integer $id_notify
 * @property integer $id_user
 * @property string $date_create
 * @property string $content
 * @property integer $status
 *
 * @property User $idUser
 */
class Notify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notify';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'date_create', 'content', 'status'], 'required'],
            [['id_user', 'status'], 'integer'],
            [['date_create'], 'safe'],
            [['content'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_notify' => 'Id Notify',
            'id_user' => 'Id User',
            'date_create' => 'Date Create',
            'content' => 'Content',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
