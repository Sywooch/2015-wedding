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
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            [['type_user','fullname','tell','info_user','address'],'required'],
            [['type_user','range_user','rate_user','have_contract'],'integer'],
            [['email','avatar','fullname','fullname2','address'],'string','max'=>255],
            [['tell','tell2'],'string','max'=>12],
            
            
            
        ];
        
        
//        return [
//            [['username', 'auth_key', 'password_hash', 'type_user', 'fullname', 'tell', 'email', 'info_user', 'address', 'avatar', 'created_at', 'updated_at'], 'required'],
//            [['type_user', 'range_user', 'rate_user', 'status', 'created_at', 'updated_at'], 'integer'],
//            [['info_user'], 'string'],
//            [['username', 'password_hash', 'password_reset_token', 'email', 'email2', 'avatar'], 'string', 'max' => 255],
//            [['auth_key'], 'string', 'max' => 32],
//            [['fullname', 'fullname2', 'address'], 'string', 'max' => 250],
//            [['tell', 'tell2'], 'string', 'max' => 12],
//            ['username', 'filter', 'filter' => 'trim'],
//            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
//            ['username', 'string', 'min' => 2, 'max' => 255],
////
//            ['email', 'filter', 'filter' => 'trim'],
//            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
//            ['email', 'email'],
//            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
//
//            ['password', 'string', 'min' => 6],
//        ];
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
            $user->type_user = $this->type_user;
            $user->fullname = $this->fullname;
            $user->tell = $this->tell;
            $user->address = $this->address;
            $user->info_user = $this->info_user;
            $user->setPassword($this->password);
            $user->generateAuthKey();
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
