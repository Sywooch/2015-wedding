<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord; 
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionProviderInterface;
use yz\shoppingcart\CartPositionTrait;
/**
 * This is the model class for table "localtion".
 *
 * @property integer $id_local
 * @property string $name_local
 * @property string $info_local
 * @property integer $rate
 * @property string $avatar
 * @property integer $timework
 * @property integer $status
 *
 * @property Ambience[] $ambiences
 * @property Imglocal[] $imglocals
 */
class Localtion extends ActiveRecord implements CartPositionInterface
{
    use CartPositionTrait;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'localtion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_local', 'info_local', 'rate',  'timework', 'status'], 'required'],
            [['info_local'], 'string'],
            [['rate', 'timework', 'status'], 'integer'],
            [['name_local', 'avatar'], 'string', 'max' => 100]
        ];
    }
    
     public function getPrice()
    {
        return $this->rate;
    }

    public function getId()
    {
        return $this->id_local;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_local' => 'Id Local',
            'name_local' => 'Name Local',
            'info_local' => 'Info Local',
            'rate' => 'Rate',
            'avatar' => 'Avatar',
            'timework' => 'Timework',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAmbiences()
    {
        return $this->hasMany(Ambience::className(), ['id_local' => 'id_local']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImglocals()
    {
        return $this->hasMany(Imglocal::className(), ['id_local' => 'id_local']);
    }
    
    public function getName($id_local){
        $result = Yii::$app->db->createCommand("SELECT name_local from localtion where id_local = '" .$id_local . "'")->queryOne();
//        echo '<pre>';
//        print_r($result);
//        echo '</pre>';
        //echo $result['name_local'];
        return $result['name_local'];
    }
    
    public function getAmb($id_local){
        $arr = Ambience::find()->where(['id_local'=>$id_local])->all();
        
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }
    
    public function getmylocal($id_user){
        $mycontract = Contract::find()->where(['id_user'=>$id_user])->one();
        if(isset($mycontract))
        $mylocal = Localtion::find()->where(['id_local'=>$mycontract->id_local])->all();
        if(isset($mylocal))return $mylocal;else return NULL;
    }
    
    
    
    public function getimglocal($id_local){
        $arridimg = Imglocal::find()->where(['id_local'=>$id_local])->all();
        
        

        if(isset($arridimg)){
            foreach ($arridimg as $idimg) {
                $imgs[]= Img::find()->where(['id_img'=>$idimg->id_img])->one();
            }
        }
        

        
        if(isset($imgs))return $imgs;else return NULL;
    }
}
