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
 * @property string $url_folder
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
            [['id_contract', 'numpage', 'rate', 'status'], 'integer'],
            [['time_complete'], 'safe'],
            [['url_psd','url_folder'], 'string', 'max' => 350]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_album' => 'Id Album',
            'id_contract' => 'Hơp Đồng Số',
            'url_psd' => 'Url Psd',
            'numpage' => 'Số lượng trang',
            'time_complete' => 'Thời gian hoàn thành album',
            'url_folder' => 'Upload trang album',
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
//    public function getAllalbum(){
//        $result = Yii::$app->db->createCommand('SELECT id_album FROM album where status = 4')->queryAll();
////        echo '<pre>';
////        print_r($result);
////        echo '</pre>';
//        
//        foreach ($result as $value) {
//            $allalbum[] = $value['id_album'];
//        }
//        if(isset($allalbum)){
//            return $allalbum;
//        }
//        else return NULL;
//    }
    
    
    
    public function getImgOfAlbum($id_album){
        $result = Yii::$app->db->createCommand("select id_img from imgalbum where id_album ='".$id_album."'")->queryAll();
        
        
        if(isset($result)){
            
            
            foreach ($result as $img) {
                $arrurlimg[]= Yii::$app->db->createCommand("select url from img where id_img ='".$img['id_img']."'")->queryOne();
            }
            
            foreach ($arrurlimg as $value) {
                $arr[]= $value['url'];
            }
        }
        
        return $arr;
    }
    
    public function getAllAlbum(){
        $album = $this->find()->all();
        if(isset($album)) return $album;else return NULL;
    }
    
}
