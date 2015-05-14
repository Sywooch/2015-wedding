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
    
    //test model get dress free
    public function actionGetdress(){
        $model = new Dress();
        //$re = $model->getDressfree('2015-04-28','2015-04-16');
   
        echo '<pre>';
        print_r($re);
        echo '</pre>';
        
    }
    
//    public function actionTest($start,$end){
//        $model = new Dress();
//        $arr = $model->getAllDressFree($start, $end);
//        echo '<pre>';
//        print_r($arr);
//        echo '</pre>';
//    }
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
    
    


    


    public function actionAddtocart($id)
    {
        $cart = new ShoppingCart();

        $model = Dress::findOne($id);
        if ($model) {
            $cart->put($model, 1);
         //   return $this->redirect(['index']);
        }
        
        $count = $cart->getCount();
       // echo $count;
        //$cart->removeAll();
        //throw new NotFoundHttpException();
        return $this->redirect('index.php?r=dress/alldress');
    }
    
    public function actionListtocart(){
        $cart = new ShoppingCart();
        //echo $cart->getCount();
        $items = $cart->positions;
//        echo '<pre>';
//        print_r($items);
//        echo '</pre>';
        foreach ($items as $item) {
           
            echo $item->getCost().'<br>';
            echo $item->getId().'<br>';
            echo $item->getPrice().'<br>';
        }
       // $cart
    }

    
    // view all image of dress
    public function actionViewimg($id){
        
        //$model = new Imgdress();
        
        $session = Yii::$app->session;
        if(isset($session['username'])&&$session['type_user']==0){
        
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
            $test['title'] = $id;

            return $this->render('viewid',$test);
        }else return $this->goBack ();
        
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
                    $model->avatar->saveAs( 'uploads/'.$imgname.'.'.$model->avatar->extension );

                    //save in db

                    $model->avatar = 'uploads/'.$imgname.'.'. $model->avatar->extension;
                }
                $model->id_dress ='D'.time();
                $model->save();
                return $this->redirect(['view', 'id' => $model->id_dress]);
            }
            else {
                return $this->render('create', [
                        'model' => $model,

                    ]);
                }
        }else return $this->goHome ();
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
        
        
        if(isset($session)&&$session['type_user']==0){
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
        }else return $this->goHome ();
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
//    public function actionTest(){
//        $session = Yii::$app->session;
//        echo $session['username'].'<br>';
//        echo $session['id_user'].'<br>';
//        echo $session['type_user'];
//    }
}
