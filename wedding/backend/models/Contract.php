<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contract".
 *
 * @property integer $id_contract
 * @property integer $id_user
 * @property integer $id_local
 * @property string $start_time
 * @property string $end_time
 * @property string $create_day
 * @property string $total
 * @property string $payment1
 * @property string $payment2
 * @property string $payment3
 * @property string $timephoto
 * @property integer $timeadd
 * @property string $timecomplete
 * @property integer $status
 * @property integer $num_bigimg
 * @property integer $have_album
 * @property double $total_time
 * @property Localtion $idLocal
 * @property User $idUser
 * @property Dresscontract[] $dresscontracts
 * @property Staffcontract[] $staffcontracts
 * @property Toolcontract[] $toolcontracts
 */
class Contract extends \yii\db\ActiveRecord
//class Contract extends User
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_local', 'start_time', 'payment1', 'timeadd','num_bigimg'], 'required','message' => 'Thông tin này không được để trống'],
            [['id_user', 'total', 'timeadd', 'status','have_album','num_bigimg'], 'integer','message' => 'Nhập số nguyên'],
            [['id_local'],'string'],[['total_time'],'double'],
            [['start_time', 'end_time', 'create_day', 'payment1', 'payment2', 'payment3', 'timephoto', 'timecomplete'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contract' => 'Hợp Đồng Số',
            'id_user' => 'Khách Hàng',
            'id_local' => 'Địa Điểm Chụp Ảnh',
            'start_time' => 'Thời Gian Bắt Đầu',
            'end_time' => 'Thời Gian Kết Thúc',
            'create_day' => 'Ngày Tạo Hợp Đồng',
            'total' => 'Tổng tiên',
            'payment1' => 'Thời Gian Thanh Toán Đợt 1',
            'payment2' => 'Thời Gian Thanh Toán Đợt 2',
            'payment3' => 'Thời Gian Thanh Toán Đợt 3',
            'timephoto' => 'Thời Gian',
            'timeadd' => 'Thời Gian Khách Muốn Thêm',
            'num_bigimg'=>'Tổng số ảnh cưới',
            'timecomplete' => 'Thời Gian Hoàn Thành',
            'status' => 'Status',
            'fullname'=>  Yii::t('app', 'Tên Khách Hàng'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLocal()
    {
        return $this->hasOne(Localtion::className(), ['id_local' => 'id_local']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDresscontracts()
    {
        return $this->hasMany(Dresscontract::className(), ['id_contract' => 'id_contract']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaffcontracts()
    {
        return $this->hasMany(Staffcontract::className(), ['id_contract' => 'id_contract']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToolcontracts()
    {
        return $this->hasMany(Toolcontract::className(), ['id_contract' => 'id_contract']);
    }
    
    public function getDressfree($start,$end){
       $contract = Yii::$app->db->createCommand("SELECT id_contract FROM contract WHERE ((start_time BETWEEN '".$start."' AND '".$end."')OR(end_time BETWEEN '".$start."' AND '".$end."')OR('".$start ."'<= start_time AND '".$end."' >=end_time  ) ) ")->queryAll();
        if($contract){
        
            return $contract;
        
        }
        return NULL;
    }
    
     public function getJoinArr($arr,$arr2){
        if($arr!=NULL&&$arr2!=NULL){
            $result;
            foreach ($arr as $value) {
                foreach ($arr2 as $value2) {
                    if($value == $value2)
                        $result[] = $value2;
                }
            }
            if(isset($result)){
            return $result;}else return NULL;
        }
        return NULL;
    }
    
    public function getContractInMonth($monthyear) {
        $date;
        $year = intval(date('Y'));
        $monthyear = intval($monthyear);
        if($monthyear<=0 || $monthyear >12)return NULL;
        switch ($monthyear){
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
        
        $endmonth = $year.'-'.$monthyear.'-'.$date;
        $startmonth = $year.'-'.$monthyear.'-'.'01';
        
<<<<<<< HEAD
        $contract = Yii::$app->db->createCommand("SELECT id_contract FROM contract WHERE start_time >='".$startmonth."' AND start_time<='".$endmonth."' ORDER BY start_time")->queryAll();

=======
        $contract = Yii::$app->db->createCommand("SELECT id_contract FROM contract WHERE start_time >='".$startmonth."' AND start_time<='".$endmonth."' ORDER BY start_time desc")->queryAll();
>>>>>>> branch#nhan
        
        //var_dump($contract);
        
        $allcontract ;
        
        foreach ($contract as $key => $value) {
            $allcontract[] = $contract[$key]['id_contract'];
        }
        
        if(isset($allcontract))
        return $allcontract;else
        return NULL;
    }
    
    
    
    public function getMycontract($id_user){
        $contract = Contract::find()->where(['id_user'=>$id_user])->one();
        if(isset($contract)) return $contract;
        return NULL;
    }
   
}
