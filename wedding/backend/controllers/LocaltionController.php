<?php

namespace backend\controllers;

use Yii;
use backend\models\Localtion;
use backend\models\LocaltionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\db\Query;
use yz\shoppingcart\ShoppingCart;

/**
 * LocaltionController implements the CRUD actions for Localtion model.
 */
class LocaltionController extends Controller
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

   // private $session = Yii::$app->session;
    
    /**
     * Lists all Localtion models.
     * @return mixed
     */
   public function actionViewimg($id){
        
        //$model = new Imgdress();
        
       
        
            $query = new Query();
            $rows = $query->select(['*'])->from('imglocal')->where(['id_local'=>$id])->all();
           // $imgs;
            foreach ($rows as $row) {
                $qr = new Query();
                $imgs[] = $qr->select(['url','id_img'])->from('img')->where(['id_img'=>$row,'status'=>'1'])->one();
            }
            if(isset($imgs)){
                $test['imgs']= $imgs; 

            }else $test['imgs']= []; 
            $test['title'] = LocaltionController::findModel($id)->name_local;

            return $this->render('viewid',$test);
//        }else return $this->goBack ();
        
    }
    
    

    
    
    // get all dress free date_start to end_date
    
    
    public function actionIndex()
    {
        $session = Yii::$app->session;
        
        if(isset($session['username'])&&$session['type_user']==0){
        
            $searchModel = new LocaltionSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        return $this->redirect(['alllocal']);
    }

    /**
     * Displays a single Localtion model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        
        $session = Yii::$app->session;
        
        if(isset($session['usernamr'])&&$session['type_user']==0){
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);}
        return $this->redirect(['viewimg','id'=>$id]);
    }

    /**
     * Creates a new Localtion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $session = Yii::$app->session;
        
        if(isset($session['username'])&&$session['type_user']==0){
        
            $model = new Localtion();

            if ($model->load(Yii::$app->request->post())) {

                $model->id_local = 'L'.time();


                $imgname = time().rand(0, 10000).rand(0, 10000).rand(0, 10000);
                $model->avatar = UploadedFile::getInstance($model, 'avatar');
                //var_dump($model->avatar);
                $model->avatar->saveAs( 'uploads/'.$imgname.'.'.$model->avatar->extension );

                //save in db

                $model->avatar = 'uploads/'.$imgname.'.'. $model->avatar->extension;

                $model->save();
                return $this->redirect(['view', 'id' => $model->id_local]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        return $this->goHome();
    }

    /**
     * Updates an existing Localtion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $session = Yii::$app->session;
        
        if(isset($session['username'])&&$session['type_user']==0){
        
            $model = $this->findModel($id);
            $url_avarta = $model->avatar;    
            if ($model->load(Yii::$app->request->post())) {

                $imgname = time().rand(0, 10000).rand(0, 10000).rand(0, 10000);
                $model->avatar = UploadedFile::getInstance($model, 'avatar');
                //var_dump($model->avatar);
                if($model->avatar!=NULL){
                $model->avatar->saveAs( 'uploads/'.$imgname.'.'.$model->avatar->extension );

                //save in db

                $model->avatar = 'uploads/'.$imgname.'.'. $model->avatar->extension;
                }else{
                    $model->avatar = $url_avarta;
                }
                $model->update();
                return $this->redirect(['view', 'id' => $model->id_local]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
        
        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing Localtion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    //
    
    public function actionAlllocal(){
        $query = new Query();
        $rows = $query->select(['id_local','avatar','name_local','rate','timework'])->from('localtion')->where(['status'=>1])->all();
        $imgs;
       // $i =0;
        foreach ($rows as $row) {
           $imgs[] = $row;
        }
        
       
        
        $test['imgs']= $imgs; 
        $test['title'] = 'All Localtion';
        //$model->find()->all();
        return $this->render('viewalllocaltion',$test);
    }
    
    
    //
    
    public function actionAmb(){
        $local = new Localtion();
        $local->getAmb('L1429606564');
    }
    
    
    // Find local off user 
    
    public function actionMylocal(){
        $local = new Localtion();
        
        $session = Yii::$app->session;
        
        if(isset($session['id_user'])&&$session['type_user']==1){
        $infolocal = $local->getmylocal($session['id_user']);
        
        
        
        
        $sender['imgs'] = $infolocal;
        $sender['title'] = 'My Localtion';
        return $this->render('mylocal',$sender);
        }
    }
    
    public function actionEditimglocal($id){
        
        $session = Yii::$app->session;
        
        if(isset($session['username'])&&$session['type_user']==0){
        
            $this->findModel($id);
            $local = new Localtion();
            $arrimg = $local->getimglocal($id);
            $sender['imglocals'] = $arrimg;
            $sender['id'] = $id;
            return $this->render('localview',$sender);
        }
        return $this->redirect(['view','id'=>$id]);
    }

        /**
     * Finds the Localtion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Localtion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Localtion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
