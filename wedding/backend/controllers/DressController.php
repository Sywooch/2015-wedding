<?php

namespace backend\controllers;

use Yii;
use backend\models\Dress;
use backend\models\DressSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\Imgdress;
use yii\db\Query;
use yz\shoppingcart\ShoppingCart;
use yii\web\Session;



/**
 * DressController implements the CRUD actions for Dress model.
 */
class DressController extends Controller
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
     * Lists all Dress models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        
        $session = Yii::$app->session;
        if(isset($session['username'])&&$session['type_user']==0){
            $searchModel = new DressSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //        var_dump($dataProvider);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else return $this->goHome ();
    }
    
 
    

    // get all dress don't have task from start to end
    public function actionGetalldressfree($start, $end){
        $model = new Dress();
        $arr = $model->getDressfree($start, $end);
        if($arr!=NULL){
            foreach ($arr as $value) {
               // if($value['id_contract']!=$id){
                    $arr_iddress[] = Yii::$app->db->createCommand('select id_dress from dresscontract where id_contract = '.$value['id_contract'])->queryAll();
                //}
            }
             // dress have task
            for ($i=0;$i<count($arr_iddress);$i++){
                foreach ($arr_iddress[$i] as $value) {
                   $dress[]= $value['id_dress']; 
                }
            }

            //all dress 
            $alldress = Yii::$app->db->createCommand('select id_dress from dress')->queryAll();


            // get dress don't have task
            $dressfree;
            foreach ($alldress as $val) {
                $dressfree[] = $val['id_dress'];
            }
            $dressfree = array_diff($dressfree, $dress);


            foreach ($dressfree as $key=>$value) {
                $imgs[] = Yii::$app->db->createCommand('select * from dress where status = 1 and id_dress = "'.$dressfree[$key].'"')->queryOne();

            }
 
        }
        else $imgs = Yii::$app->db->createCommand ('select * from dress where status =1')->queryAll(); 
        
        $test['imgs']= $imgs; 
        $test['title'] = 'All Dress';
        //$model->find()->all();
        return $this->render('viewalldress',$test);
    }
    /**
     * Displays a single Dress model.
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
     * Creates a new Dress model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    


    
    // view all image of dress
    public function actionViewimg($id){
        
        //$model = new Imgdress();
        
        $session = Yii::$app->session;
//        if(isset($session['username'])&&$session['type_user']==0){
        
            $query = new Query();
            $rows = $query->select(['*'])->from('imgdress')->where(['id_dress'=>$id])->all();
           // $imgs;
            foreach ($rows as $row) {
                $qr = new Query();
                $imgs[] = $qr->select(['url','id_img'])->from('img')->where(['id_img'=>$row,'status'=>'1'])->one();
            }
            if(isset($imgs)){
                $test['imgs']= $imgs; 

            }else $test['imgs']= []; 
            $test['title'] = DressController::findModel($id)->name_dress;

            return $this->render('viewid',$test);
//        }else return $this->goBack ();
        
    }
    
    
    public function actionEditimgdress($id){
        
        $session = Yii::$app->session;
        
        if(isset($session['username'])&&$session['type_user']==0){
        
            $this->findModel($id);
            $dress = new Dress();
            $arrurl = $dress->getimgdress($id);
            $sender['imgdress'] = $arrurl;
            $sender['id_dress'] = $id;
            $sender['title'] = $this->findModel($id)->name_dress;
            return $this->render('dressview',$sender);
        }return $this->goBack();
        
    }

        // get all dress
    public function actionAlldress(){
        $query = new Query();
        $rows = $query->select(['id_dress','avatar','name_dress'])->from('dress')->where(['status'=>1])->all();
        $imgs;
       // $i =0;
        foreach ($rows as $row) {
           $imgs[] = $row;
        }
        
       
        
        $test['imgs']= $imgs; 
        $test['title'] = 'All Dress';
        //$model->find()->all();
        return $this->render('viewalldress',$test);
    }

    public function actionCreate()
    {
        $model = new Dress();
       // $image[] = new Img();
        $session = Yii::$app->session;
       
        if(isset($session['username'])&&$session['type_user']==0){
            if ($model->load(Yii::$app->request->post())) {
                // get the instane of upload file

                $imgname = time().rand(0, 10000).rand(0, 10000).rand(0, 10000);
                $model->avatar = UploadedFile::getInstance($model, 'avatar');
                //var_dump($model->avatar);
                if($model->avatar!=NULL){
                    $model->avatar->saveAs( 'uploads/avatar/'.$imgname.'.'.$model->avatar->extension );

                    //save in db

                    $model->avatar = 'uploads/avatar/'.$imgname.'.'. $model->avatar->extension;
                }
                $model->id_dress ='D'.time();
//                $model->save();
                if($model->save()){
//                    return $this->redirect('index.php?r=img/create&&id='.$model->id_dress.'&&type=dress');
                }
                return $this->redirect(['view', 'id' => $model->id_dress]);
            }
            else {
                return $this->render('create', [
                        'model' => $model,

                    ]);
                }
        }else return $this->goHome ();
     }   
     
     /*My dress*/
     
     public function actionMydress(){
         
         $session = Yii::$app->session;
         
         if(isset($session['id_user'])&&$session['type_user']==1){
            $dress = new Dress();
            
            $id_user = $session['id_user'];
            
            $arr = $dress->getmydress($id_user);

            $sender['imgs'] = $arr;
            $sender['title'] = 'My Dress';
            return $this->render('mydress',$sender);
             
         }
         return $this->goBack();
        
         
         
     }

          /**
     * Updates an existing Dress model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
     
     
     
    public function actionUpdate($id)
    {
        $session = Yii::$app->session;
        
        
        if(isset($session['id_user'])&&$session['type_user']==0){
            $model = $this->findModel($id);
            $url_avatar = $model->avatar;
            if ($model->load(Yii::$app->request->post())) {

                 $imgname = time().rand(0, 10000).rand(0, 10000).rand(0, 10000);
                $model->avatar = UploadedFile::getInstance($model, 'avatar');
                //var_dump($model->avatar);
                if($model->avatar!=NULL){
                     $model->avatar->saveAs( 'uploads/'.$imgname.'.'.$model->avatar->extension );

                //save in db

                $model->avatar = 'uploads/'.$imgname.'.'. $model->avatar->extension;
                }else{
                    $model->avatar = $url_avatar;
                }
                $model->save();
                return $this->redirect(['view', 'id' => $model->id_dress]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
        return $this->goHome ();
    }

    /**
     * Deletes an existing Dress model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionTest($start,$end){
        $dress = new Dress();
        $a=$dress->getAllDressFree($start, $end);
        
        echo '<pre>';
        print_r($a);
        echo '</pre>';
        
        
    }

    

    /**
     * Finds the Dress model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dress the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dress::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
