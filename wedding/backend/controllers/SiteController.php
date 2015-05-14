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
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    $session = Yii::$app->session;
                    $session['username']=$user->username;
                    $session['id_user'] = $user->id;
                    $session['type_user'] = $user->type_user;
//                  echo $session['id_user'];
//                    echo  $session['type_user'];
                     return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
