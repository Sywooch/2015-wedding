<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "type_user".
 *
 * @property integer $id_type
 * @property string $name_type
 */
class TypeUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_type', 'name_type'], 'required'],
            [['id_type'], 'integer'],
            [['name_type'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_type' => 'Id Type',
            'name_type' => 'Name Type',
        ];
    }
}
