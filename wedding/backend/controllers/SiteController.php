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


use backend\models\User;
//use backend\models\UploadForm;
use yii\web\UploadedFile;


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
       // $cookie = Yii::$app->response->cookies;
        $session = Yii::$app->session;
        
        //if(isset($cookie['username'])&&!isset($session['username'])) {
        if(Yii::$app->user->identity){
            $user = new User();
            $session['username'] = Yii::$app->user->identity->username;
            $session['id_user'] = $user->getInfobyUsername($session['username'])->id;
            $session['type_user'] = $user->getInfobyUsername($session['username'])->type_user;
            if($session['type_user']==0){
                    $notify = new \backend\models\Notify();
                    //$notify->test(date('Y-m-d'));
                    for($i=0;$i<=7;$i++){
                        $week[] = date('Y-m-d',strtotime(date('Y-m-d') ."+ ".$i." days"));
                    }

                    foreach ($week as $value) {
                        if($notify->test($value)){
                            $notify->getStarttime($value);
                            $notify->getPayment1($value);
                            $notify->getPayment2($value);
                            $notify->getPayment3($value);
                        }
                    }
                }
        }
        
        
        if(isset($session['type_user'])){
            if($session['type_user']==0){
              return $this->redirect('index.php?r=notify');
            }else if($session['type_user']==1){
                return $this->redirect('index.php?r=album/myalbum');
            }else if($session['type_user']==2||$session['type_user']==3){
                return $this->redirect('index.php?r=user/mytask');
            }
        }
        
        $user = new User();
        
        $topdress =  $user->getdressinyear(date('y'));
        $toplocal = $user->getlocaltioninyear(date('y'));
        $topphoto = $user->getphotoinyear(date('y'));
        $topmakeup = $user->getmakeupinyear(date('y'));
        
        
        $sender['topdress'] = $topdress;
        $sender['toplocal'] = $toplocal;
        $sender['topphoto'] = $topphoto;
        $sender['topmakeup'] = $topmakeup;
        
        return $this->render('index',$sender);
    }
    
    public function actionSearch(){
        if(isset($_POST['bt_search'])){
            //echo $_POST['search_text'];
            //echo $_POST['search'];
            if($_POST['search'] == 'dress'){
                $result = Yii::$app->db->createCommand("select id_dress, avatar, name_dress, rate_hire from dress where name_dress like '%".$_POST['search_text']."%'")->queryAll();
                foreach ($result as $row) {
                    $imgs[] = $row;
                 }


                if(isset($imgs)){
                    $test['imgs']= $imgs; 
                }else $test['imgs'] = [];
                 $test['title'] = 'Tìm kiếm áo cưới';
                 //$model->find()->all();
                 return $this->render('searchdress',$test);
            }
            if($_POST['search'] == 'local'){
                 $result = Yii::$app->db->createCommand("select id_local, avatar, name_local , rate, timework from localtion where name_local like '%".$_POST['search_text']."%'")->queryAll();
            
                foreach ($result as $row) {
                    $imgs[] = $row;
                }


                if(isset($imgs))
                $test['imgs']= $imgs; 
                else $test['imgs']=[];
                $test['title'] = 'Tìm kiếm địa điểm';
             //$model->find()->all();
                return $this->render('searchlocaltion',$test);
            
             
                 }
        }
    }

    

    public function actionAbout()
    {
        echo 'hahahahasfsdfsd';
        //return $this->render('about');
    }
    

    
    public function actionLogin()
    {
        
        
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        
        $user = new User();
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) 
        {
            
                  $session = Yii::$app->session;
//               // var_dump($user->getInfobyUsername($model->username));
                $session['username'] = $model->username;
                $session['id_user'] = $user->getInfobyUsername($model->username)->id;
                $session['type_user'] = $user->getInfobyUsername($model->username)->type_user;
                if($session['type_user']==0){
                    $notify = new \backend\models\Notify();
                    //$notify->test(date('Y-m-d'));
                    for($i=0;$i<=7;$i++){
                        $week[] = date('Y-m-d',strtotime(date('Y-m-d') ."+ ".$i." days"));
                    }

                    foreach ($week as $value) {
                        if($notify->test($value)){
                            $notify->getStarttime($value);
                            $notify->getPayment1($value);
                            $notify->getPayment2($value);
                            $notify->getPayment3($value);
                        }
                    }
                }
            return $this->goBack();
        } 
        else {
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
            
            if ($model->signup()) {

                return $this->goHome();
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
        }
        return $this->goHome();
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        
//        session_destroy ();
        return $this->redirect('index.php');
    }
    
    
    

}
