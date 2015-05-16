<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Contract;
use DateTime;
use backend\models\Localtion;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            
        ]);
    }
    
    // get all customer
    public function actionGetallcustomer(){
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->searchUser(Yii::$app->request->queryParams,1);
       // $model = User::getUserByType(3);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            //'model'=>$model,
        ]);
    }
    
    // get timework user
    public function  actionTimework(){
        $model = new Contract();
        //$test = $model->getContractInMonth(1);
        //var_dump(Yii::$app->user);
        echo '<pre>';
        print_r(Yii::$app->user);
        echo '</pre>';
        
        //var_dump($test);
    }
    // view task yourself
    // 
    
    public function actionTask($id_user,$month){
        
        
        $session = Yii::$app->session;
        
        if(isset($session['username'])&&($session['id_user']==$id_user||$session['type_user']==0)){
        // find user 
            $model = UserController::findModel($id_user);


            if($model->type_user==2){

                // user is photo
                $allcontract = Yii::$app->db->createCommand("SELECT id_contract FROM photocontract where id_user = '".$id_user."'")->queryAll();
            }else if($model->type_user == 3){
                //user is makeup
                 $allcontract = Yii::$app->db->createCommand("SELECT id_contract FROM makeupcontract where id_user = '".$id_user."'")->queryAll();
            }else if($model->type_user == 4){
                // user is assitant
                 $allcontract = Yii::$app->db->createCommand("SELECT id_contract FROM photocontract where id_user = '".$id_user."'")->queryAll();
            }




            // get all contract of user 
            if(isset($allcontract)){
                foreach ($allcontract as $key=>$contract) {
                    $allcontractofuser[] = $allcontract[$key]['id_contract'];
                }
                $modelcontract = new Contract();
                //$gettime = new DateTime($time);
                // get all contract in month
                $allcontractinmonth = $modelcontract->getContractInMonth($month);


                // get overall 2 arr
                // the first is contract of user
                // the second is contract in month
                $result = $modelcontract->getJoinArr($allcontractinmonth,$allcontractofuser);

                $arr_time;
                if($result!=NULL){

                    foreach ($result as $key=>$value) {
                        // get start time and end time of all contract
                         $result_start_end[] = Yii::$app->db->createCommand("select start_time,end_time from CONTRACT WHERE id_contract = '".$value."'" )->queryOne();   
                    }
                }

                // check isset 
                if(isset($result_start_end)){
                    $time;

                    // this session is arr time work ofcontract 
                    foreach ($result_start_end as $key=>$value) {

                        $end = new DateTime($result_start_end[$key]['end_time']);
                        $start = new DateTime($result_start_end[$key]['start_time']);

                        $time[] = $start->diff($end);
                    }

                    $arrtimework;
                    // format arr
                    foreach ($time as $key => $value) {
                        $arrtimework[] = $time[$key]->d;
                    }

                    //all timework of user
                    $timework = 0;
                    foreach ($arrtimework as $value) {
                        $timework += intval($value);
                    }




                    // set task of user
                    $taskofuser;
                    foreach ($result as $val) {
                        $taskofuser[] = Yii::$app->db->createCommand("SELECT id_user,id_local,start_time,end_time,status FROM contract where id_contract = '".$val."'")->queryOne();
                    }

                    $modellocal = new Localtion();
                    foreach ($taskofuser as $key => $value) {
                        $taskofuser[$key]['name_local'] = $modellocal->getName($value['id_local']);
                    }

                    $array['taskofuser'] = $taskofuser;
                    return $this->render('taskuser',$array);
                }
            }
        }
    }
    
    
    
    //get all photo
    public function actionGetallphoto(){
        
        $session = \Yii::$app->session;
        if(isset($session['username'])&&$session['type_user']==0){
        
            $searchModel = new UserSearch();
            $dataProvider = $searchModel->searchUser(Yii::$app->request->queryParams,2);
           // $model = User::getUserByType(3);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                //'model'=>$model,
            ]);
        
        } else  return $this->goHome ();
    }
    // get all makeup
    public function actionGetallmakeup() {
         $session = \Yii::$app->session;
        if(isset($session['username'])&&$session['type_user']==0){
        
            $searchModel = new UserSearch();
            $dataProvider = $searchModel->searchUser(Yii::$app->request->queryParams,3);
           // $model = User::getUserByType(3);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                //'model'=>$model,
            ]);
        
        } else     return $this->goHome ();
    }
    
    // get all assistant
    public function actionGetallassistant() {
             $session = \Yii::$app->session;
        if(isset($session['username'])&&$session['type_user']==0){
        
            $searchModel = new UserSearch();
            $dataProvider = $searchModel->searchUser(Yii::$app->request->queryParams,4);
           // $model = User::getUserByType(3);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                //'model'=>$model,
            ]);
        
        } else        return    $this->goHome ();
    }
    
    // get all all photo free from start to end
    public function actionGetallphotofree($start,$end){
        $model = new User();
        //$model->getAllPhotofree($start, $end);
        echo '<pre>';
        print_r($model->getAllPhotofree($start, $end));
        echo '</pre>';
    }

    // get all makeup free from start to end
    
    public function actionGetallmakeupfree($start, $end){
        $model = new User();
        
        echo '<pre>';
        print_r($model->getMakeupfree($start, $end));
        echo '</pre>';
    }

    
    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $session = Yii::$app->session;
        if(isset($session['username'])&&($session['type_user']==0||$session['id_user']==$id)){
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
        
        }
        else        return    $this->goHome ();
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        
        $session= \Yii::$app->session;
        if(isset($session['username'])&&($session['type_user']==0||$session['id_user']==$id)){
        
            $model = $this->findModel($id);
            
            if ($model->load(Yii::$app->request->post())) {
                echo '<pre>';
                var_dump($model->save());
                echo '</pre>';
                if($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }else
                {
                    
                }
            } else {
                if($model->type_user==0){
                    return $this->render('update_admin', [
                        'model' => $model,
                    ]);
                }else if($model->type_user==1){
                    return $this->render('update_customer', [
                        'model' => $model,
                    ]);
                }
                    return $this->render('update', [
                    'model' => $model,
                     ]);
                
            }
        }else return $this->goHome ();
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    protected function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
   

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
