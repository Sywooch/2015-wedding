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
            'photo'=>  Photocontract::find()->where(['id_contract'=>$id])->one(),
            'makeup'=>  Makeupcontract::find()->where(['id_contract'=>$id])->one(),
            'dresses'=>  Dresscontract::find()->where(['id_contract'=>$id])->all(),
        ]);
    }
    
    
    
    public function actionGetendtime($timeadd,$start,$id_local){
       // $model = $this->findModel($id_local);
        $model = new Contract();
        $query = new Query();
        $tb = $query->select(['timework'])->from('localtion')->where(['id_local'=>$id_local])->one();

        $time_add = $tb['timework'] + $timeadd;
        $date1 = str_replace('-', '/', $start);
        $end = date('Y-m-d',strtotime($date1 ."+".$time_add. " days"));
        if(isset($_GET['update'])&&isset($_GET['id'])){
            return  $this->redirect('index.php?r=contract/updateinfo&&id='.$_GET['id'].'&&start='.$start.'&&end='.$end.'&&id_local='.$id_local.'&&timeadd='.$timeadd);
       
        }else{
            return $this->redirect('index.php?r=contract/create&&start='.$start.'&&end='.$end.'&&id_local='.$id_local.'&&timeadd='.$timeadd);
           
        }
        
        
    }
    
    
   

    /**
     * Creates a new Contract model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    { 
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
             //   if(isset($_GET['start'])&&isset($_GET['end'])&&isset($_GET['id_local'])&&isset($_GET['timeadd'])){
                    $this->findModelLocaltion($_GET['id_local']);
                    $model->end_time = $_GET['end'];
                    $model->start_time = $_GET['start'];
                    $model->id_local = $_GET['id_local'];
                    $model->timeadd = $_GET['timeadd'];
            //    }
                
                $query = new Query();
                $tb = $query->select(['timework'])->from('localtion')->where(['id_local'=>$model->id_local])->one();
                $time_add = $tb['timework'] + $model->timeadd;
                $dresscontract->load(Yii::$app->request->post());
                // get id user photogaraper
                $photocontract->load(Yii::$app->request->post());
                // get id user makeup
                $makeupcontract->load(Yii::$app->request->post());
                //create album 
                $album->load(Yii::$app->request->post());

                // load info imgbig
                $bigimg->load(Yii::$app->request->post());


                $model->total_time = $time_add;
                // save contract
                if($model->save()){ 
                    Yii::$app->db->createCommand('UPDATE user SET have_contract=1 WHERE id ='.$model->id_user)->execute();

                    $rent_dress = 0;
                    foreach ($dresscontract->id_dress as $dress) {
                        
                        $dresscon = new Dresscontract();
                        Yii::$app->db->createCommand("INSERT INTO dresscontract (id_dress,id_contract,start_time,end_time) VALUES ('".$dress."','".$model->id_contract."','".$model->start_time."','".$model->end_time."')")->execute();

                        
                        $infodress = Dress::findOne($dress);
                        $rent_dress += intval($infodress->rate_hire)*intval($time_add);

                    }
                    //add photo to contract
                    
                    Yii::$app->db->createCommand("INSERT INTO photocontract (id_user,id_contract,start_time,end_time) VALUES ('".$photocontract->id_user."','".$model->id_contract."','".$model->start_time."','".$model->end_time."')")->execute();
                    

                    
                    // add makeup to contract
                    Yii::$app->db->createCommand("INSERT INTO makeupcontract (id_user,id_contract,start_time,end_time) VALUES ('".$makeupcontract->id_user."','".$model->id_contract."','".$model->start_time."','".$model->end_time."')")->execute();        


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

                            
                             
                            //$bigimg->id_contract = $model->id_contract;

                            $rate_bigimg = \backend\models\Sizebigimg::findOne($bigimg->size)->rate * $model->num_bigimg;


                            for($i=0;$i<$model->num_bigimg;$i++){
                                $bigimg->id_contract = $model->id_contract;
                                $bigimg->save();
                            }
                            $model->total = intval($rate_album)+$wagemakeup+$wagephoto+$rent_dress + $rate_bigimg;
                            $model->save();
                    }


                     return $this->redirect(['view', 'id' => $model->id_contract]);
                }




               
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
    
    //update info contract
    public function actionUpdateinfo($id){
        
        $contract = Contract::find()->where(['id_contract'=>$id])->one();
        $album = Album::find()->where(['id_contract'=>$id])->one();
        $dress = new Dresscontract();
        $photo = Photocontract::find()->where(['id_contract'=>$id])->one();
        $makeup = Makeupcontract::find()->where(['id_contract'=>$id])->one();
        $bigimg = Bigimg::find()->where(['id_contract'=>$id])->one();
        if($contract->load(Yii::$app->request->post())){
            $album->load(Yii::$app->request->post());
            $dress->load(Yii::$app->request->post());
            $photo->load(Yii::$app->request->post());
            $makeup->load(Yii::$app->request->post());
            $bigimg->load(Yii::$app->request->post());
            if(isset($_GET['end']))
            $contract->end_time = $_GET['end'];
            if(isset($_GET['start']))
            $contract->start_time = $_GET['start'];
            if(isset($_GET['id_local']))
            $contract->id_local = $_GET['id_local'];
            if(isset($_GET['timeadd']))
            $contract->timeadd = $_GET['timeadd'];
            
            $query = new Query();
            $tb = $query->select(['timework'])->from('localtion')->where(['id_local'=>$contract->id_local])->one();
            $time_add = $tb['timework'] + $contract->timeadd;
            
            Yii::$app->db->createCommand("delete from dresscontract where id_contract = '".$id."'")->execute();
            $rent_dress = 0;
            foreach ($dress->id_dress as $dress){
                Yii::$app->db->createCommand("INSERT INTO dresscontract (id_dress,id_contract,start_time,end_time) VALUES ('".$dress."','".$id."','".$contract->start_time."','".$contract->end_time."')")->execute();
                 $infodress = Dress::findOne($dress);
                $rent_dress += intval($infodress->rate_hire)*intval($time_add);
            }
            
            
            Yii::$app->db->createCommand("UPDATE photocontract SET id_user = '".$photo->id_user."',start_time = '".$contract->start_time."',end_time = '".$contract->end_time."' where id_contract ='".$id."'")->execute();
            Yii::$app->db->createCommand("UPDATE makeupcontract SET id_user = '".$makeup->id_user."',start_time = '".$contract->start_time."',end_time = '".$contract->end_time."' where id_contract ='".$id."'")->execute();
            
            
            $infophoto = User::findOne($photo->id_user);
            $wagephoto = intval($infophoto->rate_user)*intval($time_add);

                    // wage of makeup
            $infomakeup = User::findOne($makeup->id_user);
            $wagemakeup = intval($infomakeup->rate_user)*intval($time_add);
            
            //Yii::$app->db->createCommand("delete from bigimg where id_contract ='".$contract->id_contract."'")->execute();
            
            $rate_album = Ratealbum::findOne($album->numpage)->rate;

                            
                             
          

            $rate_bigimg = \backend\models\Sizebigimg::findOne($bigimg->size)->rate * $contract->num_bigimg;
            
            for($i=0;$i < $contract->num_bigimg;$i++){
//                Yii::$app->db->createCommand("INSERT INTO bigimg (id_contract,size) VALUES ('".$contract->id_contract."','".$bigimg->size."')")->execute();
                $bigimg->id_contract = $contract->id_contract;
                $bigimg->save();
             }
            
            
            $contract->total = intval($rate_album)+$wagemakeup+$wagephoto+$rent_dress + $rate_bigimg;
            
            if($contract->save()&& $album->save())
            {
              return $this->redirect(['view','id'=>$contract->id_contract]);
            
            }
            else return $this->goHome ();
        }
        $sender['contract'] = $contract;
        $sender['album']=$album;
        $sender['dress'] = $dress;
        $sender['photo']=$photo;
        $sender['makeup']=$makeup;
        $sender['bigimg']=$bigimg;
        return $this->render('updateinfo',$sender);

        
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
//        $model = new Contract();
//        $dress = new Dress();
//        //$dresscontract = new Dresscontract();
//        $photocontract = new Photocontract();
//        $makeupcontract = new Makeupcontract();
//        $bigimg = new Bigimg();
//        $album = new Album();
        
//        if(isset($session['username'])&&$session['type_user']==0){
//        
//            $model = $this->findModel($id);
//           // $dresscontract =  Dresscontract::find()->where(['id_contract'=>$id])->all();
//            if ($model->load(Yii::$app->request->post())) {
//
//
//
//
//                $query = new Query();
//                $tb = $query->select(['timework'])->from('localtion')->where(['id_local'=>$model->id_local])->one();
//
//                $time_add = $tb['timework'] + $model->timeadd;
//
//
//                $date1 = str_replace('-', '/', $model->start_time);
//                $model->end_time = date('Y-m-d',strtotime($date1 ."+".$time_add. " days"));
//
//
//
//
//                $model->save();
//                return $this->redirect(['view', 'id' => $model->id_contract]);
//            } else {
//
//
//
//                return $this->render('update', [
//                    'model' => $model,
//                   // 'dresscontract'=>$dresscontract,
//                ]);
//            }
//        }
        if(isset($session['username'])&&$session['type_user']==0){
            $contract = Contract::find()->where(['id_contract'=>$id])->one();
            $album = Album::find()->where(['id_contract'=>$id])->one();
            $dress = new Dresscontract();
            $photo = Photocontract::find()->where(['id_contract'=>$id])->one();
            $makeup = Makeupcontract::find()->where(['id_contract'=>$id])->one();
            $bigimg = Bigimg::find()->where(['id_contract'=>$id])->one();
            if($contract->load(Yii::$app->request->post())){
                $album->load(Yii::$app->request->post());
                $dress->load(Yii::$app->request->post());
                $photo->load(Yii::$app->request->post());
                $makeup->load(Yii::$app->request->post());
                $bigimg->load(Yii::$app->request->post());
                if(isset($_GET['end']))
                $contract->end_time = $_GET['end'];
                if(isset($_GET['start']))
                $contract->start_time = $_GET['start'];
                if(isset($_GET['id_local']))
                $contract->id_local = $_GET['id_local'];
                if(isset($_GET['timeadd']))
                $contract->timeadd = $_GET['timeadd'];

                $query = new Query();
                $tb = $query->select(['timework'])->from('localtion')->where(['id_local'=>$contract->id_local])->one();
                $time_add = $tb['timework'] + $contract->timeadd;

                Yii::$app->db->createCommand("delete from dresscontract where id_contract = '".$contract->id_contract."'")->execute();
                $rent_dress = 0;
                foreach ($dress->id_dress as $dress){
                    Yii::$app->db->createCommand("INSERT INTO dresscontract (id_dress,id_contract,start_time,end_time) VALUES ('".$dress."','".$contract->id_contract."','".$contract->start_time."','".$contract->end_time."')")->execute();
                     $infodress = Dress::findOne($dress);
                    $rent_dress += intval($infodress->rate_hire)*intval($time_add);
                }
                
                
                Yii::$app->db->createCommand("delete from photocontract where id_contract ='".$id."'")->execute();
                Yii::$app->db->createCommand("INSERT INTO photocontract (id_user,id_contract,start_time,end_time) VALUES ('".$photo->id_user."','".$id."','".$contract->start_time."','".$contract->end_time."')")->execute();
                Yii::$app->db->createCommand("delete from makeupcontract where id_contract ='".$id."'")->execute();
                Yii::$app->db->createCommand("INSERT INTO makeupcontract (id_user,id_contract,start_time,end_time) VALUES ('".$makeup->id_user."','".$id."','".$contract->start_time."','".$contract->end_time."')")->execute();

//                Yii::$app->db->createCommand("UPDATE photocontract SET id_user = '".$photo->id_user."',start_time = '".$contract->start_time."',end_time = '".$contract->end_time."'")->execute();
//                Yii::$app->db->createCommand("UPDATE makeupcontract SET id_user = '".$makeup->id_user."',start_time = '".$contract->start_time."',end_time = '".$contract->end_time."'")->execute();


                $infophoto = User::findOne($photo->id_user);
                $wagephoto = intval($infophoto->rate_user)*intval($time_add);

                        // wage of makeup
                $infomakeup = User::findOne($makeup->id_user);
                $wagemakeup = intval($infomakeup->rate_user)*intval($time_add);

                //Yii::$app->db->createCommand("delete from bigimg where id_contract ='".$contract->id_contract."'")->execute();

                $rate_album = Ratealbum::findOne($album->numpage)->rate;





                $rate_bigimg = \backend\models\Sizebigimg::findOne($bigimg->size)->rate * $contract->num_bigimg;

                for($i=0;$i < $contract->num_bigimg;$i++){
    //                Yii::$app->db->createCommand("INSERT INTO bigimg (id_contract,size) VALUES ('".$contract->id_contract."','".$bigimg->size."')")->execute();
                    $bigimg->id_contract = $contract->id_contract;
                    $bigimg->save();
                 }


                $contract->total = intval($rate_album)+$wagemakeup+$wagephoto+$rent_dress + $rate_bigimg;

                if($contract->save()&& $album->save())
                {
                return $this->redirect(['view','id'=>$contract->id_contract]);}
                else return $this->goHome ();
            }
            $sender['contract'] = $contract;
            $sender['album']=$album;
            $sender['dress'] = $dress;
            $sender['photo']=$photo;
            $sender['makeup']=$makeup;
            $sender['bigimg']=$bigimg;
                return $this->render('updateinfo',$sender);
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    //info contract of customer
    public function actionMycontract(){
        $contract = new Contract();
        $session = Yii::$app->session;
        
        
        if(isset($session['id_user'])&&$session['type_user']==1){
        
            $info = $contract->getMycontract($session['id_user']);

            $sender['model']= $info;


            return  $this->render('mycontract',$sender);
        }
        
    }

    //update info
    
    

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
    
    protected function findModelLocaltion($id)
    {
        if (($model = Localtion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
