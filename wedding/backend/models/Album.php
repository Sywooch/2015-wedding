<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "album".
 *
 * @property integer $id_album
 * @property integer $id_contract
 * @property string $url_psd
 * @property integer $numpage
 * @property string $time_complete
 * @property integer $url_folder
 * @property string $rate
 * @property integer $status
 *
 * @property Contract $idContract
 */
class Album extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'album';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_contract', 'numpage'], 'required'],
            [['id_contract', 'numpage', 'url_folder', 'rate', 'status'], 'integer'],
            [['time_complete'], 'safe'],
            [['url_psd'], 'string', 'max' => 350]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_album' => 'Id Album',
            'id_contract' => 'Id Contract',
            'url_psd' => 'Url Psd',
            'numpage' => 'Numpage',
            'time_complete' => 'Time Complete',
            'url_folder' => 'Url Folder',
            'rate' => 'Rate',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdContract()
    {
        return $this->hasOne(Contract::className(), ['id_contract' => 'id_contract']);
    }
}
