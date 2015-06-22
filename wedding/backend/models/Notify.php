<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "notify".
 *
 * @property integer $id_notify
 * @property integer $id_user
 * @property string $fullname
 * @property string $email
 * @property string $tell
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
            [['content'], 'string'],
            [['fullname', 'email'], 'string', 'max' => 255],
            [['tell'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_notify' => 'Id Notify',
            'id_user' => 'Mã Khách Hàng',
            'fullname' => 'Tên Khách Hàng',
            'email' => 'Email',
            'tell' => 'Điện Thoại',
            'date_create' => 'Ngày Nhắc Nhở',
            'content' => 'Nội Dung',
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
    
    public function test($time){
        $a = Yii::$app->db->createCommand("SELECT count(*) from notify where date_create='".$time."'")->queryOne();
        if($a['count(*)']==0)return true; return false;
    }

    

    
    public function getPayment1($time){
        $payment1 = Contract::find()->select('id_user')->where(['payment1'=>$time])->all();
        foreach ($payment1 as $value) {
            $users[] = User::find()->select('id,fullname,email,tell')->where(['id'=>$value->id_user])->one();
        }
        if(isset($users)){
            foreach ($users as $key => $value) {

                        $notify = new Notify();
                        $notify->fullname = $value->fullname;
                        $notify->id_user = $value->id;
                        $notify->tell = $value->tell;
                        $notify->email = $value->email;
                        $notify->date_create = $time;
                        $notify->content = 'Nhắc nhở khách hàng '.$value->fullname.' tới đợt thanh toán lần 1 vào ngày '.$time;
                        $notify->status =1;
                        $notify->save();


            }
        }
    }
    
    public function getPayment2($time){
        $payment2 = Contract::find()->select('id_user')->where(['payment2'=>$time])->all();
        foreach ($payment2 as $value) {
            $users[] = User::find()->select('id,fullname,email,tell')->where(['id'=>$value->id_user])->one();
        }
         if(isset($users)){
            foreach ($users as $key => $value) {

                        $notify = new Notify();
                        $notify->fullname = $value->fullname;
                        $notify->id_user = $value->id;
                        $notify->tell = $value->tell;
                        $notify->email = $value->email;
                        $notify->date_create = $time;
                        $notify->content = 'Nhắc nhở khách hàng '.$value->fullname.' tới đợt thanh toán lần 2 vào ngày '.$time;
                        $notify->status =1;
                        $notify->save();


            }
         }    
    }
    
    
    public function getPayment3($time){
        $payment3 = Contract::find()->select('id_user')->where(['payment3'=>$time])->all();
        foreach ($payment3 as $value) {
            $users[] = User::find()->select('id,fullname,email,tell')->where(['id'=>$value->id_user])->one();
        }
        if(isset($users)){
            foreach ($users as $value) {

                        $notify = new Notify();
                        $notify->fullname = $value->fullname;
                        $notify->id_user = $value->id;
                        $notify->tell = $value->tell;
                        $notify->email = $value->email;
                        $notify->date_create = $time;
                        $notify->content = 'Nhắc nhở khách hàng '.$value->fullname.' tới đợt thanh toán lần 3 vào ngày '.$time;
                        $notify->status =1;
                        $notify->save();


             }
         
        }
    }
    
     public function getStarttime($time){
        $start = Contract::find()->select('id_user')->where(['start_time'=>$time])->all();
        foreach ($start as $value) {
            $users[] = User::find()->select('id,fullname,email,tell')->where(['id'=>$value->id_user])->one();
        }
        
        if(isset($users)){
            foreach ($users as  $value) {

                        $notify = new Notify();
                        $notify->fullname = $value->fullname;
                        $notify->id_user = $value->id;
                        $notify->tell = $value->tell;
                        $notify->email = $value->email;
                        $notify->date_create = $time;
                        $notify->content = 'Nhắc nhở khách hàng '.$value->fullname.' đến studio chuẩn bị chụp ảnh cưới vào ngày '.$time;
                        $notify->status =1;
                        $notify->save();

            }
        }
    }
    
    
    public function createNotify($time){
        for($i=0;$i<=7;$i++){
            $week[] = date('Y-m-d',strtotime($time ."+ ".$i." days"));
        }
        
        foreach ($week as $value) {
            if($this->test($value)){
                $notify = new Notify();
                $notify->getStarttime($value);
                $notify->getPayment1($value);
                $notify->getPayment2($value);
                $notify->getPayment3($value);
            }
        }
        
    }
    
    
    
    
}
