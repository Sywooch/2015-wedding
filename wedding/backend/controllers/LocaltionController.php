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

    /**
     * Lists all Localtion models.
     * @return mixed
     */
    public function actionViewimg($id){
        
        //$model = new Imgdress();
        $query = new Query();
        $rows = $query->select(['*'])->from('imglocal')->where(['id_local'=>$id])->all();
        $imgs;
        foreach ($rows as $row) {
            $qr = new Query();
            $imgs[] = $qr->select(['url','id_img'])->from('img')->where(['id_img'=>$row,'status'=>'1'])->one();
        }
        
        $test['imgs']= $imgs; 
        $test['title'] = $id;
        //$model->find()->all();
        return $this->render('viewid',$test);
        echo '<pre>';
       // print_r($img);
        echo '</pre>';
        
    }
    
    
    
     public function actionAddtocart($id)
    {
        $cart = new ShoppingCart();

        $model = Localtion::findOne($id);
        if ($model) {
            $cart->put($model, 1);
            //return $this->redirect(['index']);
        }
        //var_dump($cart->getCost());
       // var_dump($model);
        $count = $cart->getCount();
        echo $count;
        //$cart->removeAll();
        //throw new NotFoundHttpException();
    }
    
    public function actionListtocart(){
        $cart = new ShoppingCart();
      //  echo $cart->getCount();
        $items = $cart->positions;
//        echo '<pre>';
//        print_r($items);
//        echo '</pre>';
        $i=0;
        foreach ($items as $item) {
            //echo $item->getPrice().'<br>';
            echo $item->getCost().'<br>';
          //  $i++;
        }
        //echo $i;
        
        //$cart->removeAll();
       // $cart
    }
    
    // get all dress free date_start to end_date
    
    
    public function actionIndex()
    {
        $searchModel = new LocaltionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Localtion model.
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
     * Creates a new Localtion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
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

    /**
     * Updates an existing Localtion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
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
