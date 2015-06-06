<?php

namespace backend\models;

use Yii;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionProviderInterface;
use yz\shoppingcart\CartPositionTrait;
use yii\db\ActiveRecord; 

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
class User extends ActiveRecord implements CartPositionInterface
{
    /**
     * @inheritdoc
     */
    
    use CartPositionTrait;
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
            [['username', 'auth_key', 'password_hash', 'type_user', 'fullname', 'tell', 'email', 'info_user', 'address', 'created_at', 'updated_at'], 'required'],
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

     public function getPrice()
    {
        return $this->rate_user;
    }

    public function getId()
    {
        return $this->id_user;
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
    
    
    public function getUserfressupdate($start,$end,$id_contract){
        $contract = Yii::$app->db->createCommand("SELECT id_contract FROM contract WHERE ((start_time BETWEEN '".$start."' AND '".$end."')OR(end_time BETWEEN '".$start."' AND '".$end."')OR('".$start ."'<= start_time AND '".$end."' >=end_time  ) ) ")->queryAll();
        
        foreach ($contract as $key => $value) {
            if($id_contract==$value['id_contract']){
                unset($contract[$key]);
            }
        }
        
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

            $allphoto = Yii::$app->db->createCommand('select id from user where type_user = 2')->queryAll();

            
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
    
    
    
    public function getPhotofreeupdate($start,$end,$id_contract){
        
        $contract = $this->getUserfressupdate($start, $end,$id_contract);
        
        if($contract!=NULL){
            foreach ($contract as $value) {
                $arr_staff[] = Yii::$app->db->createCommand('select id_user from photocontract where id_contract = '.$value['id_contract'] )->queryOne();
            }

            $allphoto = Yii::$app->db->createCommand('select id from user where type_user = 2')->queryAll();

            
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
    
    
    public function getAllPhotofreeupdate($start, $end,$id_contract){
        $arr = $this->getPhotofreeupdate($start, $end,$id_contract);
        
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

            $allmakeup = Yii::$app->db->createCommand('select id from user where type_user = 3')->queryAll();
   
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
            if(isset($arr_allmakeup))
            return $arr_allmakeup;
            return NULL;
        }
        
    }
    
    
    
    public function getAllMakeupfree($start, $end){
        $arr = $this->getMakeupfree($start, $end);
        
        if($arr){
            foreach ($arr as $userphoto) {
                $arr_userphoto[] = Yii::$app->db->createCommand("SELECT id,username from user where id = '".$userphoto."'")->queryOne();
            }
        }  else {
            $arr_userphoto = [];
           
        }

        return $arr_userphoto;
    }
    

    

    
    public function getdate($month,$year){
        switch ($month){
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:     $date = 31;                break;
            case 4:
            case 6:
            case 9:
            case 11: $date = 30;                break;
            default :
                if(($year%4==0 && $year%100!=0)||$year%400==0){
                    $date = 29;
                }else $date = 28;
                break;
        }
        return $date;
    }

    public function getContractYear($year){
       // $year = intval($year);
        for($i=1;$i<13;$i++){
            $date = $this->getdate($i, $year);
            $endmonth = $year.'-'.$i.'-'.$date;
            $startmonth = $year.'-'.$i.'-'.'01';
            $numcontract = Yii::$app->db->createCommand("SELECT count(*) FROM contract WHERE start_time >='".$startmonth."' AND start_time<='".$endmonth."'")->queryOne();
        
             $result[$i] =$numcontract['count(*)'];
        }
        
       return $result;
    }
    
    
    public function arrContractinYear($year){
        $year = intval($year);
        for($i = 1; $i<=12 ;$i++){
             $date = $this->getdate($i, $year);
            $endmonth = $year.'-'.$i.'-'.$date;
            $startmonth = $year.'-'.$i.'-'.'01';
            $contracts[] = Yii::$app->db->createCommand("SELECT id_contract FROM contract WHERE start_time >='".$startmonth."' AND start_time<='".$endmonth."'")->queryAll();
        }

        foreach ($contracts as $month => $contract) {
            foreach ($contract as $value) {
                $allcontract[] = $value['id_contract'];
            }
        }
        foreach ($allcontract as $contract) {
            
        }
        echo '<pre>';
        print_r($allcontract);
        echo '</pre>';
        
        exit;
    }
    
        public function getallphoto(){
        $photo = \Yii::$app->db->createCommand('SELECT * FROM user where type_user = 2 and status != 0')->queryAll();
        if(isset($photo)&&$photo!=NULL){
            return $photo;
        }else {return NULL;}
    }
    
    public function getallmakeup(){
        $makeups = \Yii::$app->db->createCommand('SELECT * FROM user where type_user = 3 and status != 0')->queryAll();
        if(isset($makeups)&&$makeups!=NULL){
            return $makeups;
        }else {return NULL;}
    }
    
    
    public function getphotoinmonth($month,$year){
        
        $month = intval($month);
        $year = intval($year);
        $date = $this->getdate($month, $year);
        
        $start = '2015-'.$month.'-01';
        $end = '2015-'.$month.'-'.$date;
        $result = Yii::$app->db->createCommand("SELECT count(*),id_user FROM photocontract WHERE start_time >='".$start."' AND start_time<='".$end."' GROUP BY id_user")->queryAll();
        echo '<pre>';
        print_r($result);
        echo '</pre>';
    }
    
    public function getmakeupinmonth($month,$year){
        
        $month = intval($month);
        $year = intval($year);
        $date = $this->getdate($month, $year);
        
        $start = $year.'-'.$month.'-01';
        $end = $year.'-'.$month.'-'.$date;
        $result = Yii::$app->db->createCommand("SELECT id_user FROM makeupcontract WHERE start_time >='".$start."' AND start_time<='".$end."'")->queryAll();
        echo '<pre>';
        print_r($result);
        echo '</pre>';
    }
    
    
    public function getphotoinyear($year) {
        $year = intval($year);
        $start = $year.'-01-01';
        $end = $year.'-12-31';
        $result = Yii::$app->db->createCommand("SELECT count(*),id_user FROM photocontract WHERE start_time >='".$start."' AND start_time<='".$end."' GROUP BY id_user LIMIT 10")->queryAll();
//        echo '<pre>';
//        print_r($result);
//        echo '</pre>';
        
        
        foreach ($result as $key=>$value) {
            
            $info = User::find()->where(['id'=>$value['id_user']])->one();
            
            $res[] = [$key,$value['count(*)']];
        }
        return $res;
    }
    
    public function getmakeupinyear($year) {
        $year = intval($year);
        $start = $year.'-01-01';
        $end = $year.'-12-31';
        $result = Yii::$app->db->createCommand("SELECT count(*),id_user FROM makeupcontract WHERE start_time >='".$start."' AND start_time<='".$end."' GROUP BY id_user")->queryAll();
        echo '<pre>';
        print_r($result);
        echo '</pre>';
    }
    
    public function getmystaff($id_user){
        $contract = Contract::find()->where(['id_user'=>$id_user])->one();
        if(isset($contract)){
            $staff[] = Photocontract::find()->where(['id_contract'=>$contract->id_contract])->one();
            $staff[] = Makeupcontract::find()->where(['id_contract'=>$contract->id_contract])->one();
        }
        
        if(isset($staff)){
            foreach ($staff as $value) {
                $staffs[] = User::find()->where(['id'=>$value->id_user])->one();
            }
        }
        if(isset($staff))return $staffs;
        
        return NULL;
    }
    
    
    public function getContractstart($time){
        $nexttime =  date('Y-m-d',strtotime($time ."+ 1 days"));
        $nexttwotime =  date('Y-m-d',strtotime($time ."+ 2 days"));
        $nextthreeday =  date('Y-m-d',strtotime($time ."+ 3 days"));
        
        $start[$time] = Contract::find()->select('id_contract,id_user')->where(['start_time'=>$time])->all();
        $start[$nexttime] = Contract::find()->select('id_contract,id_user')->where(['start_time'=>$nexttime])->all();
        $start[$nexttwotime] = Contract::find()->select('id_contract,id_user')->where(['start_time'=>$nexttwotime])->all();
        $start[$nextthreeday] = Contract::find()->select('id_contract,id_user')->where(['start_time'=>$nextthreeday])->all();
        
       
        
        
//        echo '<pre>';
//        print_r($start);
//        echo '</pre>';
        return $start;
    }
    
    public function getContractpayment1($time){
        $nexttime =  date('Y-m-d',strtotime($time ."+ 1 days"));
        $nexttwotime =  date('Y-m-d',strtotime($time ."+ 2 days"));
        
       
        
        $payment1[$time] = Contract::find()->select('id_contract,id_user')->where(['payment1'=>$time])->all();
        $payment1[$nexttime] = Contract::find()->select('id_contract,id_user')->where(['payment1'=>$nexttime])->all();
        $payment1[$nexttwotime] = Contract::find()->select('id_contract,id_user')->where(['payment1'=>$nexttwotime])->all();
        
      
        
        return $payment1;

    }
    
    
    public function getContractpayment2($time){
        $nexttime =  date('Y-m-d',strtotime($time ."+ 1 days"));
        $nexttwotime =  date('Y-m-d',strtotime($time ."+ 2 days"));
        
       
        
        $payment2[$time] = Contract::find()->select('id_contract,id_user')->where(['payment2'=>$time])->all();
        $payment2[$nexttime] = Contract::find()->select('id_contract,id_user')->where(['payment2'=>$nexttime])->all();
        $payment2[$nexttwotime] = Contract::find()->select('id_contract,id_user')->where(['payment2'=>$nexttwotime])->all();
        
        return $payment2;
        
        echo '<pre>';
        print_r($payment2);
        echo '</pre>';

    }
    
    
    public function getContractpayment3($time){
        $nexttime =  date('Y-m-d',strtotime($time ."+ 1 days"));
        $nexttwotime =  date('Y-m-d',strtotime($time ."+ 2 days"));
        
        
        $payment3[$time] = Contract::find()->select('id_contract,id_user')->where(['payment3'=>$time])->all();
        $payment3[$nexttime] = Contract::find()->select('id_contract,id_user')->where(['payment3'=>$nexttime])->all();
        $payment3[$nexttwotime] = Contract::find()->select('id_contract,id_user')->where(['payment3'=>$nexttwotime])->all();
        
       
        return $payment3;
        echo '<pre>';
        print_r($payment3);
        echo '</pre>';

    }
    
   
    
    
}
