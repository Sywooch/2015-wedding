<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord; 
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionProviderInterface;
use yz\shoppingcart\CartPositionTrait;
use yii\db\Query;
/**
 * This is the model class for table "dress".
 *
 *
 * @property integer $id_dress
 * @property string $name_dress
 * @property string $avatar
 * @property integer $type_dress
 * @property string $info_dress
 * @property string $rate_hire
 * @property string $rate_sale
 * @property integer $status
 *
 * @property Dresscontract[] $dresscontracts
 * @property Imgdress[] $imgdresses
 */
class Dress extends ActiveRecord implements CartPositionInterface
{
    /**
     * @inheritdoc
     */
    
    use CartPositionTrait;
    
    public static function tableName()
    {
        return 'dress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_dress', 'type_dress', 'info_dress', 'rate_hire', 'status'], 'required'],
            [['type_dress', 'rate_hire', 'rate_sale', 'status'], 'integer'],
            [['info_dress'], 'string'],
            [['name_dress', 'avatar'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    
     
     
     public function getPrice()
    {
        return $this->rate_hire;
    }

    public function getId()
    {
        return $this->id_dress;
    }
    
    public function getName(){
        return $this->name_dress;
    }
    
    public function getUrl(){
        return $this->avatar;
    }


    public function attributeLabels()
    {
        return [
            'id_dress' => 'Mã Áo Cưới',
            'name_dress' => 'Tên Áo Cưới',
            'avatar' => 'Avatar',
            'type_dress' => 'Loại Áo Cưới',
            'info_dress' => 'Thông Tin Áo Cưới',
            'rate_hire' => 'Giá Thuê',
            'rate_sale' => 'Giá Bán',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDresscontracts()
    {
        return $this->hasMany(Dresscontract::className(), ['id_dress' => 'id_dress']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImgdresses()
    {
        return $this->hasMany(Imgdress::className(), ['id_dress' => 'id_dress']);
    }
    
    public function getDressfree($start,$end){
        $contract = Yii::$app->db->createCommand("SELECT id_contract FROM contract WHERE ((start_time BETWEEN '".$start."' AND '".$end."')OR(end_time BETWEEN '".$start."' AND '".$end."')OR('".$start ."'<= start_time AND '".$end."' >=end_time  ) ) ")->queryAll();
        
        //var_dump($contract);
        
        if($contract){
        
            return $contract;
        
        }
        return NULL;
    }
    
    public function getAllDressFree($start,$end) {
        $contract = $this->getDressfree($start, $end);
        if($contract!=NULL){
            foreach ($contract as $value) {
                 $arr_iddress[] = Yii::$app->db->createCommand('select id_dress from dresscontract where id_contract = '.$value['id_contract'])->queryAll();
            }
            
            for ($i=0;$i<count($arr_iddress);$i++){
                foreach ($arr_iddress[$i] as $value) {
                   $dress[]= $value['id_dress']; 
                }
            }
            
            
            
            
            $alldress = Yii::$app->db->createCommand('select id_dress from dress where status = 1')->queryAll();
            
            $imgs;
            foreach ($alldress as $key=>$value) {
                
               
                $imgs[] = $alldress[$key]['id_dress'] ;
            
            }
            if(isset($imgs)&&isset($dress)){
                $dress = array_diff($imgs,$dress);


                foreach ($dress as $dre) {
                    $dress_free[]  = Yii::$app->db->createCommand("select id_dress, name_dress from dress where id_dress = '".$dre."'")->queryOne();
                }
            }
            if(isset($dress_free)){
                return $dress_free;
            }else return NULL;
            
            
        }else {
            return Yii::$app->db->createCommand('select id_dress,name_dress from dress where status = 1')->queryAll();
        }
    }
    
    
    public function getmydress($id_user){
        
        
        $contract = Contract::find()->where(['id_user'=>$id_user])->one();
        if(isset($contract))
        $arrdress = Dresscontract::find()->where(['id_contract'=>$contract->id_contract])->all();
        
        
        if(isset($arrdress))
        foreach ($arrdress as $dress) {
            $arr[] = Dress::find()->where(['id_dress'=>$dress->id_dress])->one();
        }
        
        if(isset($arr))return $arr; else return NULL;
        
        
    }
    public function getimgdress($id_dress){
        $arridimg = Imgdress::find()->where(['id_dress'=>$id_dress])->all();
        

        if(isset($arridimg)){
            foreach ($arridimg as $idimg) {
                $imgs[]= Img::find()->where(['id_img'=>$idimg->id_img])->one();
            }
        }

        
        if(isset($imgs))return $imgs;else return NULL;
    }
    
    
    public function getDressNotContract($start,$end){
        $result = Yii::$app->db->createCommand("SELECT id_dress FROM dresscontract WHERE ((start_time BETWEEN '".$start."' AND '".$end."')OR(end_time BETWEEN '".$start."' AND '".$end."')OR('".$start ."'<= start_time AND '".$end."' >=end_time  ) ) ")->queryAll();
        $alldress = Yii::$app->db->createCommand("SELECT id_dress from dress")->queryAll();
        foreach ($alldress as $key=>$value) {
            foreach ($result as $value1) {
                if($value['id_dress']==$value1['id_dress'])
                    unset ($alldress[$key]);
            }
        }
        
        foreach ($alldress as $dress_val) {
            $dress[]= Yii::$app->db->createCommand("SELECT id_dress,name_dress from dress where id_dress ='".$dress_val['id_dress']."'")->queryOne();
        }
        if(isset($dress)) return $dress;else return [];
    }
    
    public function getDressNotContractSample($start,$end,$id_contract){
        $result = Yii::$app->db->createCommand("SELECT id_dress FROM dresscontract WHERE ((start_time BETWEEN '".$start."' AND '".$end."')OR(end_time BETWEEN '".$start."' AND '".$end."')OR('".$start ."'<= start_time AND '".$end."' >=end_time  ) )AND id_contract != '".$id_contract."'")->queryAll();
        $alldress = Yii::$app->db->createCommand("SELECT id_dress from dress")->queryAll();
        foreach ($alldress as $key=>$value) {
            foreach ($result as $value1) {
                if($value['id_dress']==$value1['id_dress'])
                    unset ($alldress[$key]);
            }
        }
        
        foreach ($alldress as $dress_val) {
            $dress[]= Yii::$app->db->createCommand("SELECT id_dress,name_dress from dress where id_dress ='".$dress_val['id_dress']."'")->queryOne();
        }
        if(isset($dress)) return $dress;else return [];
    }
   
}
