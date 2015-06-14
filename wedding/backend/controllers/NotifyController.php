<?php

namespace backend\controllers;

use Yii;
use backend\models\Notify;
use backend\models\NotifySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NotifyController implements the CRUD actions for Notify model.
 */
class NotifyController extends Controller
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

    
   // public $session = Yii::$app->session;
    /**
     * Lists all Notify models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $session = Yii::$app->session;
        
        if(isset($session['type_user'])&&$session['type_user']==0){
        
            $searchModel = new NotifySearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Displays a single Notify model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $session = Yii::$app->session;
        
        if(isset($session['type_user'])&&$session['type_user']==0){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
         }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Creates a new Notify model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {   
        $session = Yii::$app->session;
        
        if(isset($session['type_user'])&&$session['type_user']==0){
        
            $model = new Notify();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_notify]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Updates an existing Notify model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
//        $session = Yii::$app->session;
//        
//        if(isset($session['type_user'])&&$session['type_user']==0){
//            $model = $this->findModel($id);
//
//            if ($model->load(Yii::$app->request->post()) && $model->save()) {
//                return $this->redirect(['view', 'id' => $model->id_notify]);
//            } else {
//                return $this->render('update', [
//                    'model' => $model,
//                ]);
//            }
//        }
//        throw new NotFoundHttpException('The requested page does not exist.');
        $noty = new Notify();
        $session = Yii::$app->session;
        
        if(isset($session['type_user'])&&$session['type_user']==0){
            $noty = $this->findModel($id);

            //$noty->status = 0;
            if($noty->status==1)$noty->status=0;else $noty->status=1;
            if($noty->save()){
                return $this->redirect(\yii\helpers\Url::base().'/index.php?r=notify');
            }else return $this->redirect (['index']);

        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Deletes an existing Notify model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(\yii\helpers\Url::base().'/index.php?r=user/notify');
    }
    
    public function actionAa(){
        $model = new Notify();
        $model->test(date('Y-m-d'));
        for($i=0;$i<=7;$i++){
            $week[] = date('Y-m-d',strtotime(date('Y-m-d') ."+ ".$i." days"));
        }
        
        foreach ($week as $value) {
            if($model->test($value)){
                $model->getStarttime($value);
                $model->getPayment1($value);
                $model->getPayment2($value);
                $model->getPayment3($value);
            }
        }
        
        

    }
    
    public function actionUpdatestatus($id){
        $noty = new Notify();
        $session = Yii::$app->session;
        
        if(isset($session['type_user'])&&$session['type_user']==0){
            $noty = $this->findModel($id);

            //$noty->status = 0;
            if($noty->status==1)$noty->status=0;else $noty->status=1;
            if($noty->save()){
                return $this->redirect(\yii\helpers\Url::base().'/index.php?r=user/notify');
            }else return $this->redirect (['index']);

        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Notify model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Notify the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Notify::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
