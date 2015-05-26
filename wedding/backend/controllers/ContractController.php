<?php

namespace backend\controllers;

use Yii;
use backend\models\Contract;
use backend\models\ContractSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
//use common\models\User
use backend\models\User;
use yii\db\Connection;
use backend\models\Dress;
use backend\models\Dresscontract;
use backend\models\Photocontract;
use backend\models\Makeupcontract;
use backend\models\Album;
use backend\models\Ratealbum;
use backend\models\Bigimg;
use app\base\Model;
use backend\models\Localtion;
use yii\web\Session;
//use backend\controllers\UserController;
//use backend\controllers\DressController;
//use backend\controllers\RatealbumController;


/**
 * ContractController implements the CRUD actions for Contract model.
 */
class ContractController extends Controller
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
     * Lists all Contract models.
     * @return mixed
     */
    //private $data;
    public function actionIndex()
    {
        $session = Yii::$app->session;
        if(isset($session['username'])&&$session['type_user']==0){

            $searchModel = new ContractSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else return $this->goHome ();
    }

    /**
     * Displays a single Contract model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Contract model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $modelsBigImg = [new Bigimg];
        
       $session = Yii::$app->session;
       
       if(isset($session['username'])&&$session['type_user']==0){
        
           $model = new Contract();
            $dress = new Dress();
            $dresscontract = new Dresscontract();
            $photocontract = new Photocontract();
            $makeupcontract = new Makeupcontract();
            $bigimg = new Bigimg();
            $album = new Album();
            if ($model->load(Yii::$app->request->post())) {

                // get all multi img


                // get data form create contract
                //get info dress contract
                $dresscontract->load(Yii::$app->request->post());
                // get id user photogaraper
                $photocontract->load(Yii::$app->request->post());
                // get id user makeup
                $makeupcontract->load(Yii::$app->request->post());
                //create album 
                $album->load(Yii::$app->request->post());

                // load info imgbig
                $bigimg->load(Yii::$app->request->post());

                // create end time photo
                $query = new Query();
                $tb = $query->select(['timework'])->from('localtion')->where(['id_local'=>$model->id_local])->one();

                $time_add = $tb['timework'] + $model->timeadd;


                $date1 = str_replace('-', '/', $model->start_time);
                $model->end_time = date('Y-m-d',strtotime($date1 ."+".$time_add. " days"));
                //end create phôt
    //            echo '<pre>';
    //            print_r($photocontract->id_user);
    //            echo '</pre>';

                //time work of contract
                $model->total_time = $time_add;
                // save contract
                if($model->save()){ 
                    //$db = new Connection();
                    //update customer have contract
                    Yii::$app->db->createCommand('UPDATE user SET have_contract=1 WHERE id ='.$model->id_user)->execute();
                     //money rent dress
                //
                    $rent_dress = 0;
                    // add dress contract
                    foreach ($dresscontract->id_dress as $dress) {

                        Yii::$app->db->createCommand("INSERT INTO dresscontract (id_dress,id_contract) VALUES ('".$dress."','".$model->id_contract."')")->execute();

                        $infodress = Dress::findOne($dress);
                        $rent_dress += intval($infodress->rate_hire)*intval($time_add);

                    }
                    //add photo to contract
                    Yii::$app->db->createCommand("INSERT INTO photocontract (id_user,id_contract) VALUES ('".$photocontract->id_user."','".$model->id_contract."')")->execute();
                    // add makeup to contract
                    Yii::$app->db->createCommand("INSERT INTO makeupcontract (id_user,id_contract) VALUES ('".$makeupcontract->id_user."','".$model->id_contract."')")->execute();        


                    // wage of photo
                    $infophoto = User::findOne($photocontract->id_user);
                    $wagephoto = intval($infophoto->rate_user)*intval($time_add);

                    // wage of makeup
                    $infomakeup = User::findOne($makeupcontract->id_user);
                    $wagemakeup = intval($infomakeup->rate_user)*intval($time_add);



                    // create and save album db
                    $album->id_contract =  $model->id_contract;

                    if($album->save()){
                             $rate_album = Ratealbum::findOne($album->numpage)->rate;



                            $bigimg->id_contract = $model->id_contract;

                            $rate_bigimg = \backend\models\Sizebigimg::findOne($bigimg->size)->rate;



                            $bigimg->save();

                            $model->total = intval($rate_album)+$wagemakeup+$wagephoto+$rent_dress + $rate_bigimg;
                            $model->save();
                    }



                }




                return $this->redirect(['view', 'id' => $model->id_contract]);
            } 
            else {

                return $this->render('create', [
                    'model' => $model,
                    'dress'=>$dress,
                    'dresscontract'=>$dresscontract,
                    'photocontract'=>$photocontract,
                    'makeupcontract'=>$makeupcontract,
                    'album'=>$album,
                    'bigimg'=>$bigimg,

                ]);
            }
       }else{
           return $this->goHome();
       }
    }
    public function actionViewcontractref($id)
    {
        $model = new Contract();
        $contract = ContractController::findModel($id);

        $array = $model->getDressfree($contract->start_time, $contract->end_time);
        
        foreach ($array as $value) {
            if($value['id_contract']!=$id){
                $arr_iddress[] = Yii::$app->db->createCommand('select id_dress from dresscontract where id_contract = '.$value['id_contract'])->queryAll();
                $arr_idstaff[] = Yii::$app->db->createCommand('select id_user from staffcontract where id_type = 2 AND id_contract = '.$value['id_contract'])->queryAll();
            }
        }
        $dress;
        
        // dress have task
        for ($i=0;$i<count($arr_iddress);$i++){
            foreach ($arr_iddress[$i] as $value) {
               $dress[]= $value['id_dress']; 
            }
        }
        
        // user staff have staff
        for ($i=0;$i<count($arr_idstaff);$i++){
            foreach ($arr_idstaff[$i] as $value) {
               $staff[]= $value['id_dress']; 
            }
        }
        
        
        
        //all dress 
        $alldress = Yii::$app->db->createCommand('select id_dress from dress')->queryAll();
        
        // all staff have type = 2
        
        $allstaff = Yii::$app->db->createCommand('select id_user from user where type_user = 2')->queryAll();
        
        
        // get dress don't have task
        $dressfree;
        
        
        foreach ($alldress as $val) {
            $dressfree[] = $val['id_dress'];
        }
        $dressfree = array_diff($dressfree, $dress);
       // get staff dont't have task and id_type =2
        $stafffree;
        foreach ($allstaff as $val) {
            $stafffree[] = $val['id_dress'];
        }
        $stafffree = array_diff($stafffree, $staff);
        
        echo '<pre>';
        print_r($alldress);
        echo'</pre>';
        
        echo '<pre>';
        print_r($dressfree);
        echo'</pre>';
    }
    
    public function actionTest(){
        //echo time();
       // var_dump(User::find());
       $test = new Localtion();
       $test->getName('L1429634734');
    }
    
    /**
     * Updates an existing Contract model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {   
        $session = Yii::$app->session;
        
        if(isset($session['username'])&&$session['type_user']==0){
        
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post())) {




                $query = new Query();
                $tb = $query->select(['timework'])->from('localtion')->where(['id_local'=>$model->id_local])->one();

                $time_add = $tb['timework'] + $model->timeadd;


                $date1 = str_replace('-', '/', $model->start_time);
                $model->end_time = date('Y-m-d',strtotime($date1 ."+".$time_add. " days"));




                $model->save();
                return $this->redirect(['view', 'id' => $model->id_contract]);
            } else {



                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Deletes an existing Contract model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Contract model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Contract the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Contract::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
