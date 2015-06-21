<?php
namespace backend\models;
use Yii;
use common\models\User;
use yii\base\Model;


/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $type_user;
    public $range_user;
    public $rate_user;
    public $fullname;
    public $fullname2;
    public $tell;
    public $tell2;
    public $email2;
    public $info_user;
    public $address;
    public $avatar;
    public $have_contract ;





    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required','message' => 'Tên tài khoản không được để trống'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Tài khoản này đã tồn tài'],
            ['username', 'string', 'min' => 2, 'max' => 255,'message' => 'Tài khoản có ít nhất 2 kí tự'],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required','message' => 'Thông tin này không được để trống'],
            
            ['email', 'email','message' => 'Địa chỉ mail không hợp lệ'],
            ['email2', 'email','message' => 'Địa chỉ mail không hợp lệ'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Mail này đã tồn tại trong hệ thống'],
            ['password', 'required','message' => 'Thông tin này không được để trống'],
            ['password', 'string', 'min' => 6,'message' => 'Mật khảu có ít nhất 6 kí tự'],
            
            [['type_user','fullname','tell','info_user','address'],'required','message' => 'Thông tin này không được để trống'],
            [['type_user','range_user','rate_user','have_contract'],'integer','message' => 'Nhập kiểu số nguyên '],
            [['email','avatar','fullname','fullname2','address'],'string','max'=>255],
            [['tell','tell2'],'string','max'=>12],    
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Tên Tài Khoản',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'type_user' => 'Loại Tài Khoản',
            'range_user' => 'Hạng Tài Khoản',
            'rate_user' => 'Giá Thuê Tài Khoản',
            'fullname' => 'Họ Tên',
            'fullname2' => 'Họ tên 2',
            'tell' => 'Điện Thoại',
            'tell2' => 'Điện Thoại 2',
            'email' => 'Email',
            'email2' => 'Email2',
            'info_user' => 'Thông Tin Tài Khoản',
            'address' => 'Địa Chỉ',
            'avatar' => 'Avatar',
            'have_contract' => 'Have Contract',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->type_user = $this->type_user;
            $user->fullname = $this->fullname;
            $user->tell = $this->tell;
            $user->address = $this->address;
            $user->info_user = $this->info_user;
            if(isset($this->range_user)){
                $user->range_user = $this->range_user;
            }
            if(isset($this->rate_user)){
                $user->rate_user = $this->rate_user;
            }
            
            $user->avatar = $this->avatar;
            
            
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
    
    public function update(){
        $user = new User();
        
    }
}
