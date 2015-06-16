<?php
namespace backend\models;
use Yii;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionProviderInterface;
use yz\shoppingcart\CartPositionTrait;
use yii\db\ActiveRecord; 
use backend\models\Notify;
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
    
    
    
    
    public function getphotoinyear($year) {
        $year = intval($year);
        $start = $year.'-01-01';
        $end = $year.'-12-31';
        $result = Yii::$app->db->createCommand("SELECT count(*),id_user FROM photocontract WHERE start_time >='".$start."' AND start_time<='".$end."' GROUP BY id_user LIMIT 5")->queryAll();
        
        
        foreach ($result as $key=>$value) {
            
            $info = User::find()->where(['id'=>$value['id_user']])->one();
            
            $res[] = [$info->username,$value['count(*)'],$value['id_user'],$info->avatar];
        }
        return $res;
    }
    
    public function getmakeupinyear($year) {
//        $year = intval($year);
        $start = $year.'-01-01';
        $end = $year.'-12-31';
        $result = Yii::$app->db->createCommand("SELECT count(*),id_user FROM makeupcontract WHERE start_time >='".$start."' AND start_time<='".$end."' GROUP BY id_user LIMIT 5")->queryAll();
        
        foreach ($result as $key=>$value) {
            
            $info = User::find()->where(['id'=>$value['id_user']])->one();
            
            $res[] = [$info->username,$value['count(*)'],$value['id_user'],$info->avatar];
        }
        return $res;
    }
    
    
    public function getdressinyear($year) {
//        $year = intval($year);
        $start = $year.'-01-01';
        $end = $year.'-12-31';
        $result = Yii::$app->db->createCommand("SELECT count(*),id_dress FROM dresscontract WHERE start_time >='".$start."' AND start_time<='".$end."' GROUP BY id_dress LIMIT 5")->queryAll();
        
        foreach ($result as $key=>$value) {
            
            $info = Dress::find()->where(['id_dress'=>$value['id_dress']])->one();
            
            $res[] = [$info->name_dress,$value['count(*)'],$value['id_dress'],$info->avatar,$info->rate_hire];
        }
        return $res;
    }
    
    
    public function getlocaltioninyear($year) {
//        $year = intval($year);
        $start = $year.'-01-01';
        $end = $year.'-12-31';
        $result = Yii::$app->db->createCommand("SELECT count(*),id_local FROM contract WHERE start_time >='".$start."' AND start_time<='".$end."' GROUP BY id_user LIMIT 5")->queryAll();
         
        foreach ($result as $key=>$value) {
            
            $info = Localtion::find()->where(['id_local'=>$value['id_local']])->one();
            
            $res[] = [$info->name_local,$value['count(*)'],$value['id_local'],$info->avatar,$info->rate,  $info->timework];
        }
        return $res;
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
        //$nexttime =  date('Y-m-d',strtotime($time ."+ 1 days"));
       // $nexttwotime =  date('Y-m-d',strtotime($time ."+ 2 days"));
        $nextthreeday =  date('Y-m-d',strtotime($time ."+ 3 days"));
        
         $start = Contract::find()->select('id_user')->where(['start_time'=>$nextthreeday])->all();
        
        
        if(isset($start)){
            foreach ($start as $key=>$contract){
                $customer[]= User::find()->select('fullname,email,tell')->where(['id'=>$contract['id_user']])->one();
            }
        }else $customer=NULL;
        
//        echo '<pre>';
//        print_r($customer);
//        echo '</pre>';
        if(isset($customer))
        return $customer;
        return NULL;
    }
    
    public function getContractpayment1($time){
       // $nexttime =  date('Y-m-d',strtotime($time ."+ 1 days"));
        $nextthreeday =  date('Y-m-d',strtotime($time ."+ 3 days"));
        
       
        
      
        $payment1 = Contract::find()->select('id_user')->where(['payment1'=>$nextthreeday])->all();
        
        if(isset($payment1)){
            foreach ($payment1 as $key=>$contract){
                $customer[]= User::find()->select('fullname,email,tell')->where(['id'=>$contract['id_user']])->one();
            }
        }
        if(isset($customer))
        return $customer;
        return NULL;
    }
    
    
    public function getContractpayment2($time){
       // $nexttime =  date('Y-m-d',strtotime($time ."+ 1 days"));
        $nextthreeday =  date('Y-m-d',strtotime($time ."+ 3 days"));
        
       
        
      
        $payment2 = Contract::find()->select('id_user')->where(['payment2'=>$nextthreeday])->all();
        
        if(isset($payment2)){
            foreach ($payment2 as $contract){
                $customer[]= User::find()->select('fullname,email,tell')->where(['id'=>$contract['id_user']])->one();
            }
        }
        
        //var_dump($customer);exit;
        
        
        if(isset($customer))
        return $customer;
        return NULL;
    }
    
    
    public function getContractpayment3($time){
        $nextthreeday =  date('Y-m-d',strtotime($time ."+ 3 days"));
        
       
        
      
        $payment3 = Contract::find()->select('id_user')->where(['payment3'=>$nextthreeday])->all();
        
        if(isset($payment3)){
            foreach ($payment3 as $contract){
                $customer[]= User::find()->select('fullname,email,tell')->where(['id'=>$contract['id_user']])->one();
            }
        }
        
        //var_dump($customer);exit;
        
        
        if(isset($customer))
        return $customer;
        return NULL;
    }
    
   
    public function getTaskOfphoto($month,$year,$id_user){
        
        $year=date('y');
        $date = $this->getdate($month, $year);
        $endmonth = $year.'-'.$month.'-'.$date;
        $startmonth = $year.'-'.$month.'-'.'01';
        
        $con = Yii::$app->db->createCommand("SELECT * FROM photocontract WHERE start_time >='".$startmonth."' AND start_time<='".$endmonth."' AND id_user='".$id_user."'")->QueryAll();
        
        if(isset($con)) return $con;else return NULL;
    }
    
    
    public function getTaskOfmakeup($month,$year,$id_user){
        
        $year=date('y');
        $date = $this->getdate($month, $year);
        $endmonth = $year.'-'.$month.'-'.$date;
        $startmonth = $year.'-'.$month.'-'.'01';
        
        $con = Yii::$app->db->createCommand("SELECT * FROM makeupcontract WHERE start_time >='".$startmonth."' AND start_time<='".$endmonth."' AND id_user='".$id_user."'")->QueryAll();
        
        if(isset($con)) return $con;else return NULL;
    }
    
    
    public function getPhotoNotContract($start,$end){
        $result = Yii::$app->db->createCommand("SELECT id_user FROM photocontract where ((start_time BETWEEN '".$start."' AND '".$end."')OR(end_time BETWEEN '".$start."' AND '".$end."')OR('".$start ."'<= start_time AND '".$end."' >=end_time  ) ) ")->queryAll();
        $allphoto = Yii::$app->db->createCommand("SELECT id FROM user where type_user =2")->queryAll();
        foreach ($allphoto as $key=>$value) {
            foreach ($result as $value1) {
                if($value['id']==$value1['id_user'])
                    unset ($allphoto[$key]);
            }
        }
        
        foreach ($allphoto as $photo) {
            $user[]= Yii::$app->db->createCommand("SELECT id,username from user where id ='".$photo['id']."'")->queryOne();
        }
        if(isset($user)) return $user; else return [];
    }
    
    
    public function getMakeupNotContract($start,$end){
        $result = Yii::$app->db->createCommand("SELECT id_user FROM makeupcontract where ((start_time BETWEEN '".$start."' AND '".$end."')OR(end_time BETWEEN '".$start."' AND '".$end."')OR('".$start ."'<= start_time AND '".$end."' >=end_time  ) ) ")->queryAll();
        $allphoto = Yii::$app->db->createCommand("SELECT id FROM user where type_user =3")->queryAll();
        foreach ($allphoto as $key=>$value) {
            foreach ($result as $value1) {
                if($value['id']==$value1['id_user'])
                    unset ($allphoto[$key]);
            }
        }
        
        foreach ($allphoto as $photo) {
            $user[]= Yii::$app->db->createCommand("SELECT id,username from user where id ='".$photo['id']."'")->queryOne();
        }
        if(isset($user)) return $user; else return [];
    }
    
    
    
    public function getMakeupNotContractSample($start,$end,$id_contract){
        $result = Yii::$app->db->createCommand("SELECT id_user FROM makeupcontract where ((start_time BETWEEN '".$start."' AND '".$end."')OR(end_time BETWEEN '".$start."' AND '".$end."')OR('".$start ."'<= start_time AND '".$end."' >=end_time  ) ) AND id_contract!='".$id_contract."'")->queryAll();
        $allphoto = Yii::$app->db->createCommand("SELECT id FROM user where type_user =3")->queryAll();
        foreach ($allphoto as $key=>$value) {
            foreach ($result as $value1) {
                if($value['id']==$value1['id_user'])
                    unset ($allphoto[$key]);
            }
        }
        
        foreach ($allphoto as $photo) {
            $user[]= Yii::$app->db->createCommand("SELECT id,username from user where id ='".$photo['id']."'")->queryOne();
        }
        if(isset($user)) return $user; else return [];
    }
    
    public function getPhotoNotContractSample($start,$end,$id_contract){
        $result = Yii::$app->db->createCommand("SELECT id_user FROM photocontract where ((start_time BETWEEN '".$start."' AND '".$end."')OR(end_time BETWEEN '".$start."' AND '".$end."')OR('".$start ."'<= start_time AND '".$end."' >=end_time  ) ) AND id_contract !='".$id_contract."'")->queryAll();
        $allphoto = Yii::$app->db->createCommand("SELECT id FROM user where type_user =2")->queryAll();
        foreach ($allphoto as $key=>$value) {
            foreach ($result as $value1) {
                if($value['id']==$value1['id_user'])
                    unset ($allphoto[$key]);
            }
        }
        
        foreach ($allphoto as $photo) {
            $user[]= Yii::$app->db->createCommand("SELECT id,username from user where id ='".$photo['id']."'")->queryOne();
        }
        if(isset($user)) return $user; else return [];
    }
    
}