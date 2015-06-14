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
use yii\web\UploadedFile;
use backend\models\Localtion;
use backend\models\Notify;

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
        $session = Yii::$app->session;
        if(isset($session['username'])&&$session['type_user']==0){
            $searchModel = new UserSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);



            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,

            ]);
        }
        return $this->goBack ();
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
    
    public function actionGetallphoto(){
        
        $session = Yii::$app->session;
        if(isset($session['username'])&&$session['type_user']==0){
        
            $searchModel = new UserSearch();
            $dataProvider = $searchModel->searchUser(Yii::$app->request->queryParams,2);
           // $model = User::getUserByType(3);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                //'model'=>$model,
            ]);
        
        } 
        return $this->goHome ();
    }
    // get all makeup
    public function actionGetallmakeup() {
         $session = Yii::$app->session;
        if(isset($session['username'])&&$session['type_user']==0){
        
            $searchModel = new UserSearch();
            $dataProvider = $searchModel->searchUser(Yii::$app->request->queryParams,3);
           // $model = User::getUserByType(3);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                //'model'=>$model,
            ]);
        
        } 
        return $this->goHome ();
    }
    
  
    
    public function actionTask($id_user){
        
        
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
                
                
                if(isset($_GET['month'])){
                    $allcontractinmonth = $modelcontract->getContractInMonth($_GET['month']);
                }else{
                    $allcontractinmonth = $modelcontract->getContractInMonth(date('m'));
                }
                


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
                }else {
                    $noti['mess'] = 'Không có nhiệm vụ nào trong tháng này';
                    return $this->render('taskuser',$noti);
                }
            }
        }
    }
    
    
    public function actionMytask(){
        $session = Yii::$app->session;
        $user = new User();
        
        if(isset($session['type_user'])){
            if($session['type_user']==2)
                $task = $user->getTaskOfphoto(6,2015,$session['id_user']);
            else if($session['type_user']==3)
                $task = $user->getTaskOfmakeup(6,2015,$session['id_user']);
            else throw new NotFoundHttpException('The requested page does not exist.');
            
            $sender['taskofuser']= $task;
            $sender['mess'] = "Không có nhiệm vụ trong tháng nay";
            return $this->render('mytask',$sender);
            
        }
      //  throw new NotFoundHttpException('The requested page does not exist.');
    }

    



    public function actionAllphotograper(){
        $modeluser = new User();
        return $this->render('staff',[
            'title'=>'Photograper',
            'photos'=>$modeluser->getallphoto(),
            'type'=>2,
        ]);
    }
    
    public function actionAllmakeup(){
        $model = new User();
        return $this->render('staff',[
            'title'=>'Make up',
            'photos'=>$model->getallmakeup(),
            'type'=>3,
        ]);
    }



    //get all photo
    
    
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
        
        }
        return    $this->goHome ();
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
       
        return $this->goHome ();
    }
    
    
    public function actionEditavatar($id){
        $model = $this->findModel($id);
        $avar = $model->avatar;
         if ($model->load(Yii::$app->request->post())){
            $imgname = time().rand(0, 10000).rand(0, 10000).rand(0, 10000);
            $model->avatar = UploadedFile::getInstance($model, 'avatar');
            if($model->avatar!=NULL){
                    $model->avatar->saveAs( 'uploads/avatar/'.$imgname.'.'.$model->avatar->extension );

                    //save in db

                    $model->avatar = 'uploads/avatar/'.$imgname.'.'. $model->avatar->extension;
            }else $model->avatar= $avar;
            
            $test = \Yii::$app->db->createCommand("UPDATE user SET avatar = '".$model->avatar."' WHERE id='".$id."'")->execute();
            return $this->redirect(['view','id'=>$id]);
         }else {
             return $this->renderAjax('editavatar',['model'=>$model]);
         }
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
        
        $session= Yii::$app->session;
        if(isset($session['username'])&&($session['type_user']==0||$session['id_user']==$id)){
        
            $model = $this->findModel($id);
            $url_avar = $model->avatar;
            
            if ($model->load(Yii::$app->request->post()))
                {
//                echo '<pre>';
//                var_dump($model->save());
//                echo '</pre>';
                if($model->avatar==NULL){
                    $model->avatar = $url_avar;
                }else{
                    
                    $imgname = time().rand(0, 10000).rand(0, 10000).rand(0, 10000);
                    $model->avatar = UploadedFile::getInstance($model, 'avatar');
                    $model->avatar->saveAs( 'uploads/'.$imgname.'.'.$model->avatar->extension );

                    //save in db

                    $model->avatar = 'uploads/'.$imgname.'.'. $model->avatar->extension;
                }
                if($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
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
        }
        return $this->goHome ();
    }
    
    public function actionContract(){
        $model = new User();
        
        
        
        
        
        if(isset($_POST['year'])){
           
            $a=$model->getContractYear($_POST['year']);
            $c = [[1,$a[1]],[2,$a[2]],[3,$a[3]],[4,$a[4]],[5,$a[5]],[6,$a[6]],[7,$a[7]],[8,$a[8]],[9,$a[9]],[10,$a[10]],[11,$a[11]],[12,$a[12]]];
           echo json_encode($c);exit;
        }

      // $contracts = $model->getContractYear(2015);
     //  var_dump($contracts);   
       
        
        $session = \Yii::$app->session;
        if(isset($session['type_user'])&&$session['type_user']==0){
        $sender['title'] = 'Thống Kê';
        
       // $sender['contracts'] = $contracts;
        
        return $this->render('contractyear',$sender);
        
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    
    public function actionPlotphoto(){
//        $user = new User();
        if(isset($_POST['year'])){
            $user = new User();
            $users = $user->getphotoinyear($_POST['year']);
          //  $a= [['1',2],['2',5],['3',7]];
            echo json_encode($users);
        }
        
//        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionPlotlocal(){        
        if(isset($_POST['year'])){
            $user = new User();
            $users = $user->getlocaltioninyear($_POST['year']);
            $a= [['1',2],['2',5],['3',7]];
            echo json_encode($users);
        }
//       throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionPlotdress(){        
        if(isset($_POST['year'])){
            $user = new User();
            $users = $user->getdressinyear($_POST['year']);
            $a= [['1',2],['2',5],['3',7]];
            echo json_encode($users);
        }
    }


    public function actionPlotmakeup() {
        if(isset($_POST['year'])){
            $user = new User();
            $users = $user->getmakeupinyear($_POST['year']);
          //  $a= [['1',2],['2',5],['3',7]];
            echo json_encode($users);
        }
//        throw new NotFoundHttpException('The requested page does not exist.');
    }
    

    public function actionNotify(){
//        $user = new User();
//        $sender['contracts_start']=$user->getContractstart(date('Y-m-d'));
//        
//
//        $sender['contracts_payment1']=$user->getContractpayment1(date('Y-m-d'));
////        
//        $sender['contracts_payment2']=$user->getContractpayment2(date('Y-m-d'));
////        
//        $sender['contracts_payment3']=$user->getContractpayment3(date('Y-m-d'));
//        return $this->render('notify',$sender);
        
        $notify = Notify::find()->all();
        $sender['allnotify']= $notify;
        return $this->render('allnotify',$sender);
        
    }
    
    
    //
    
    public function actionMystaff(){
        $user = new User();
        $session = Yii::$app->session;
        
        if(isset($session['id_user'])&&$session['type_user']==1){
        
        
        $sender['title'] = 'My Staff';
        $sender['photos'] =$user->getmystaff($session['id_user']);
        
        
        return $this->render('staff',$sender);
        }
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
