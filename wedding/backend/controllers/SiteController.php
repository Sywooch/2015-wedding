<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use backend\models\PasswordResetRequestForm;
use backend\models\ResetPasswordForm;
use backend\models\SignupForm;
use backend\models\ContactForm;
use yii\web\Session;
use backend\models\User;
//use backend\models\UploadForm;
use yii\web\UploadedFile;
use yii\web\Cookie;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'actions' => ['login', 'error'],
//                        'allow' => true,
//                    ],
//                    [
//                        'actions' => ['logout', 'index'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $cookie = Yii::$app->response->cookies;
        $session = Yii::$app->session;
        
        //if(isset($cookie['username'])&&!isset($session['username'])) {
        if(Yii::$app->user->identity){
            $user = new User();
            $session['username'] = Yii::$app->user->identity->username;
            $session['id_user'] = $user->getInfobyUsername($session['username'])->id;
            $session['type_user'] = $user->getInfobyUsername($session['username'])->type_user;
        }
        
//        echo '<pre>';
//        print_r($cookie);
//        echo '</pre>';
        return $this->render('index');
    }

    public function actionAbout()
    {
        echo 'hahahahasfsdfsd';
        //return $this->render('about');
    }
    
//    public function actionLogin()
//    {
//        if (!\Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//
//        $model = new LoginForm();
//        $user = new User();
//        
//        if ($model->load(Yii::$app->request->post()) &&$model->login()) {
//            
//            
//            
//            
//          
//                var_dump($model);
//           
//                $session = Yii::$app->session;
//               // var_dump($user->getInfobyUsername($model->username));
//               $session['username'] = $model->username;
//                $session['id_user'] = $user->getInfobyUsername($model->username)->id;
//                $session['type_user'] = $user->getInfobyUsername($model->username)->type_user;
//                
//            
//                return $this->goBack();
//            
//            
//        } else {
//            return $this->render('login', [
//                'model' => $model,
//            ]);
//        }
//    }
    
    public function actionLogin()
    {
        
//        if(isset($_POST['value'])){
//           //$_POST['value'] =+456789;
//            $a=[1,2,3,4,5];
//            //echo $a;
//           echo $_POST['value'];exit;
//        }
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        
        $user = new User();
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            
                  $session = Yii::$app->session;
//               // var_dump($user->getInfobyUsername($model->username));
                $session['username'] = $model->username;
                $session['id_user'] = $user->getInfobyUsername($model->username)->id;
                $session['type_user'] = $user->getInfobyUsername($model->username)->type_user;
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    public function actionSignup()
    {
        $session = Yii::$app->session;
        if(isset($session['username'])&&$session['type_user']==0){
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            
                $imgname = time().rand(0, 10000).rand(0, 10000).rand(0, 10000);
                $model->avatar = UploadedFile::getInstance($model, 'avatar');
                //var_dump($model->avatar);
                if($model->avatar!=NULL){
                    $model->avatar->saveAs( 'uploads/'.$imgname.'.'.$model->avatar->extension );

                    //save in db

                    $model->avatar = 'uploads/'.$imgname.'.'. $model->avatar->extension;
                }else {$model->avatar = 'uploads/avatar/avatar.jpg';}
            
            if ($user = $model->signup()) {
//                if (Yii::$app->getUser()->login($user)) {
//                    $session = Yii::$app->session;
//                    $session['username']=$user->username;
//                    $session['id_user'] = $user->id;
//                    $session['type_user'] = $user->type_user;
////                  echo $session['id_user'];
////                    echo  $session['type_user'];
//                     return $this->goHome();
//                }
                return $this->goHome();
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
        }else return $this->goHome();
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        $cookies = Yii::$app->response->cookies;
        if(isset($cookies['username'])){
            unset($cookies['username']);
        }
//        session_destroy ();
        return $this->goHome();
    }

}
