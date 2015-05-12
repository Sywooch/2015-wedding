<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $type_user
 * @property integer $range_user
 * @property integer $rate_user
 * @property string $fullname
 * @property string $fullname2
 * @property string $tell
 * @property string $tell2
 * @property string $email
 * @property string $email2
 * @property string $info_user
 * @property string $address
 * @property string $avatar
 * @property integer $have_contract
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Contract[] $contracts
 * @property Staffcontract[] $staffcontracts
 * @property Timework[] $timeworks
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'type_user', 'fullname', 'tell', 'email', 'info_user', 'address', 'avatar', 'created_at', 'updated_at'], 'required'],
            [['type_user', 'range_user', 'rate_user', 'have_contract', 'status', 'created_at', 'updated_at'], 'integer'],
            [['info_user'], 'string'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'email2', 'avatar'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['fullname', 'fullname2', 'address'], 'string', 'max' => 250],
            [['tell', 'tell2'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'type_user' => 'Type User',
            'range_user' => 'Range User',
            'rate_user' => 'Rate User',
            'fullname' => 'Fullname',
            'fullname2' => 'Fullname2',
            'tell' => 'Tell',
            'tell2' => 'Tell2',
            'email' => 'Email',
            'email2' => 'Email2',
            'info_user' => 'Info User',
            'address' => 'Address',
            'avatar' => 'Avatar',
            'have_contract' => 'Have Contract',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContracts()
    {
        return $this->hasMany(Contract::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaffcontracts()
    {
        return $this->hasMany(Staffcontract::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimeworks()
    {
        return $this->hasMany(Timework::className(), ['id_user' => 'id']);
    }
     public function getInfobyUsername($username){
        return User::find()->where(['username'=>$username])->one();
    }
    
    public function getInfobyId($id){
        return User::find()->where(['id'=>$id])->one();
    }
    
    public function getUserByType($type_user){
        return User::find()->where(['type_user'=>$type_user])->all();
    }
    public function getUserfress($start,$end){
        $contract = Yii::$app->db->createCommand("SELECT id_contract FROM contract WHERE ((start_time BETWEEN '".$start."' AND '".$end."')OR(end_time BETWEEN '".$start."' AND '".$end."')OR('".$start ."'<= start_time AND '".$end."' >=end_time  ) ) ")->queryAll();
        
        //var_dump($contract);
        
        if($contract){
        
            return $contract;
        
        }
        return NULL;
    
    }
    
    
    public function getPhotofree($start,$end){
        
        $contract = $this->getUserfress($start, $end);
        
        if($contract!=NULL){
            foreach ($contract as $value) {
                $arr_staff[] = Yii::$app->db->createCommand('select id_user from photocontract where id_contract = '.$value['id_contract'] )->queryOne();
            }
           //var_dump($arr_staff);
            $allphoto = Yii::$app->db->createCommand('select id from user where type_user = 2')->queryAll();
            
//            echo '<pre>';
//            print_r($arr_staff);
//            echo '</pre>';
            
            foreach ($arr_staff as $key=> $value) {
               $phototask[] =  $arr_staff[$key]['id_user'] ;
            }
            foreach ($allphoto as $value) {
                $arr_allphoto[] = $value['id'];
            }
           
            
            $phototask = array_diff($arr_allphoto,$phototask);
           return $phototask;
        }else {
            $allphoto = Yii::$app->db->createCommand('select id from user where type_user = 2')->queryAll();
            foreach ($allphoto as $value) {
                $arr_allphoto[] = $value['id'];
            }
            return $arr_allphoto;
        }
        
    }
    
    
    public function getAllPhotofree($start, $end){
        $arr = $this->getPhotofree($start, $end);
        
        if($arr){
            foreach ($arr as $userphoto) {
               // echo $userphoto;
                $arr_userphoto[] = Yii::$app->db->createCommand("SELECT id,username from user where id = '".$userphoto."'")->queryOne();
            }
        }  else {
            $arr_userphoto = [];
           
        }

        return $arr_userphoto;
    }


    public function getMakeupfree($start,$end){
        
        $contract = $this->getUserfress($start, $end);
        
        if($contract!=NULL){
            foreach ($contract as $value) {
                $arr_staff[] = Yii::$app->db->createCommand('select id_user from makeupcontract where id_contract = '.$value['id_contract'] )->queryOne();
            }
           //var_dump($arr_staff);
            $allmakeup = Yii::$app->db->createCommand('select id from user where type_user = 3')->queryAll();
            
//            echo '<pre>';
//            print_r($arr_staff);
//            echo '</pre>';
            
            foreach ($arr_staff as $key=> $value) {
               $makeuptask[] =  $arr_staff[$key]['id_user'] ;
            }
            foreach ($allmakeup as $value) {
                $arr_allmakeup[] = $value['id'];
            }
           
            
            $makeuptask = array_diff($arr_allmakeup,$makeuptask);
           return $makeuptask;
        }else {
            $allmakeup = Yii::$app->db->createCommand('select id from user where type_user = 3')->queryAll();
            foreach ($allmakeup as $value) {
                $arr_allmakeup[] = $value['id'];
            }
            return $arr_allmakeup;
        }
        
    }
    
    public function getAllMakeupfree($start, $end){
        $arr = $this->getMakeupfree($start, $end);
        
        if($arr){
            foreach ($arr as $userphoto) {
               // echo $userphoto;
                $arr_userphoto[] = Yii::$app->db->createCommand("SELECT id,username from user where id = '".$userphoto."'")->queryOne();
            }
        }  else {
            $arr_userphoto = [];
           
        }

        return $arr_userphoto;
    }
    
    public function getName($id_user) {
        $result = Yii::$app->db->createCommand("SELECT fullname,fullname2 from user where id = '".$id_user."'")->queryOne();
        
        var_dump($result);
        
    }
}
