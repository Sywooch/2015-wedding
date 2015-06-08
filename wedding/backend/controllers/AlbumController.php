<?php

namespace backend\controllers;

use Yii;
use backend\models\Album;
use backend\models\AlbumSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\UploadForm;
use yii\web\UploadedFile;
use backend\models\Img;
use backend\models\Imgalbum;
use backend\models\Bigimg;

/**
 * AlbumController implements the CRUD actions for Album model.
 */
class AlbumController extends Controller
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
     * Lists all Album models.
     * @return mixed
     */
    public function actionIndex()
    {
        $session = Yii::$app->session;
        
        if(isset($session['username'])&&$session['type_user']==0){
        
            $searchModel = new AlbumSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Displays a single Album model.
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
     * Creates a new Album model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $session = Yii::$app->session;
        
        if(isset($session['username'])&&$session['type_user']==0){
        
            $model = new Album();

            if ($model->load(Yii::$app->request->post())) {



                $model->save();
                Yii::$app->db->createCommand('update contract set have_album = 1 where id_contract = '.$model->id_contract)->execute();
                return $this->redirect(['view', 'id' => $model->id_album]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        
        }
        return $this->goBack();
    }
    //
    
    public function actionAllalbum(){
        $album = new Album;
        $model['allalbum'] = $album->getAllalbum();
        $model['title'] = 'All Album';
        $model['']= '';
        
        echo '<pre>';
        print_r($model['allalbum']);
        echo '</pre>';
        exit;
        
        return $this->render('allalbum',$model);
    }

    
    public function actionAlbum($id){
        $album = new Album();
        $album->getImgOfAlbum($id);
    }
    
   


    /**
     * Updates an existing Album model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $session = Yii::$app->session;
        
        if(isset($session['username'])&&$session['type_user']==0){
        
            $model = $this->findModel($id);
            $bigimg = Bigimg::find()->where(['id_contract'=>$model->id_contract])->one();

            if ($model->load(Yii::$app->request->post()) && $bigimg->load(Yii::$app->request->post()) ) {
                $url = $bigimg->url;


                $img = new UploadForm();
                $img->file = UploadedFile::getInstances($model,'url_folder');
                $dirpath = 'uploads/album/'.$id;
               // var_dump(!is_dir($dirpath));
                 if(!is_dir($dirpath)) {
                    mkdir($dirpath,0777,true);     
                 }

                 if($img->file!=NULL){
                       foreach ($img->file as $file) {
                            $image = new Img();
                            $imgname = time().rand(0, 10000).rand(0, 10000).rand(0, 10000);


                            $file->saveAs($dirpath.'/'.$imgname.'.'.$file->extension);

                            $image->url = $dirpath.'/'.$imgname.'.'.$file->extension;

                            $image->save();

                            $imgalbum = new Imgalbum();
                            $imgalbum->id_album = $id;
                            $imgalbum->id_img = $image->id_img;
                            $imgalbum->save();


                        }
                }
                $model->url_folder = '';

                //$imgbig = new UploadForm();     
                $bigimg->url = UploadedFile::getInstance($bigimg,'url');
                $dirpathimg = 'uploads/album/'.$id.'/bigimg';


                if($bigimg->url!=NULL){
                    if(!is_dir($dirpathimg)) {
                         mkdir($dirpathimg,0777,true);     
                    }
                    $imgname = time().rand(0, 10000).rand(0, 10000);
                    $bigimg->url->saveAs($dirpathimg.'/'.$imgname.'.'.$bigimg->url->extension);
                    $bigimg->url = $dirpathimg.'/'.$imgname.'.'.$bigimg->url->extension;
                }else $bigimg->url = $url;



                if($model->save()){

                    Yii::$app->db->createCommand("UPDATE bigimg set url = '".$bigimg->url."' where id_contract = '".$model->id_contract."'")->execute();
                return $this->redirect(['view', 'id' => $model->id_album]);
                }
            } else {
                return $this->render('update', [
                    'model' => $model,
                    'bigimg'=>  $bigimg,
                ]);
            }
        }
        
        return $this->goBack();
    }
    
    
    public function actionMyalbum(){
        
        $session = Yii::$app->session;
        if(isset($session['username'])&&isset($session['id_user'])&&$session['type_user']==1){
            $contract = \backend\models\Contract::find()->where(['id_user'=>$session['id_user']])->one();
            if(isset($contract)){
                $album = Album::find()->where(['id_contract'=>$contract->id_contract])->one();

                $bigimg = Bigimg::find()->where(['id_contract'=>$contract->id_contract])->one();
                if(isset($album)){
                    $imgalbum = Imgalbum::find()->where(['id_album'=>$album->id_album])->all();
                }
                if(isset($imgalbum)){
                    foreach ($imgalbum as $key => $img) {
                        $albumimg[$key]= $img->id_img;
                       // $hehe[$key][]= $img->id_album;
                    }
                }    
            }

            if(isset($albumimg)){
                foreach ($albumimg as $img){
                    $allimg[] = Img::findOne($img);
                }

            }
            if(isset($allimg)){
                foreach ($allimg as $key=> $img) {
                    $sender[$key]['url']= $img->url;
                    $sender[$key]['id_img']= $img->id_img;

                }
            }  else {
                $sender[0]['url']= null;
                $sender[0]['id_img']= null;
            }


    //        echo '<pre>';
    //        print_r($sender);
    //        echo '</pre>';
            if(!isset($_GET['edit'])){
                return $this->render('myalbum',
                    [
                        'albumimg'=>$sender,
                        'id_album'=>$album->id_album,
                        'title'=>'My Album',
                        'status' =>\backend\models\StatusAlbum::find()->where(['status_album'=>$album->status])->one()->name_status,
                    ]);
            }else{
                return $this->render('albumview',
                    [
                        'albumimg'=>$sender,
                        'id_album'=>$album->id_album,
                        'title'=>'My Album',
                    ]);
            }
            
        
        }else
        {
            return $this->redirect(['index']);
        }
        
    }
    
    
    
    public function actionAlbumview($id){
        
       
        
        $session = Yii::$app->session;
        if(isset($session['username'])&&$session['type_user']==0){
             $this->findModel($id);
            
                //$album = Album::find()->where(['id_album'=>$id])->one();

                //$bigimg = Bigimg::find()->where(['id_contract'=>$contract->id_contract])->one();
               
                    $imgalbum = Imgalbum::find()->where(['id_album'=>$id])->all();
                
                if(isset($imgalbum)){
                    foreach ($imgalbum as $key => $img) {
                        $albumimg[$key]= $img->id_img;
                       // $hehe[$key][]= $img->id_album;
                    }
                }    
            

            if(isset($albumimg)){
                foreach ($albumimg as $img){
                    $allimg[] = Img::findOne($img);
                }

            }
            if(isset($allimg)){
                foreach ($allimg as $key=> $img) {
                    $sender[$key]['url']= $img->url;
                    $sender[$key]['id_img']= $img->id_img;

                }
            }  else {
                $sender[0]['url']= null;
                $sender[0]['id_img']= null;
            }
            

    //        echo '<pre>';
    //        print_r($sender);
    //        echo '</pre>';
            if(!isset($_GET['edit'])){
                return $this->render('myalbum',
                    [
                        'albumimg'=>$sender,
                        'id_album'=>$id,
                        'title'=>$id,
                    ]);
            }else{
                return $this->render('albumview',
                    [
                        'albumimg'=>$sender,
                        'id_album'=>$id,
                        'title'=>$id,
                    ]);
            }
            
        
        }else
        {
            return $this->redirect(['index']);
        }
        
    }
    
    public function actionBigimg($id_user){
        $contract = \backend\models\Contract::find()->where(['id_user'=>$id_user])->one();
        if(isset($contract)){
            $bigimg = Bigimg::find()->where(['id_contract'=>$contract->id_contract])->all();
        }
        
        if(isset($bigimg)){
            echo '<pre>';
            print_r($bigimg);
            echo '</pre>';
        }    
    }
    
    public function actionMybigimg(){
        $session = Yii::$app->session;
        if(isset($session['username'])&&isset($session['id_user'])&&$session['type_user']==1){
             $contract = \backend\models\Contract::find()->where(['id_user'=>$session['id_user']])->one();
             if(isset($contract)){
                 $bigimg = Bigimg::find()->where(['id_contract'=>$contract->id_contract])->all();
             }else {
                 $mess = 'Chưa có hình ảnh';
             }
             
             if(isset($bigimg)){
                 $sender['bigimg'] = $bigimg;
             }
             if(isset($mess)) $sender['mess'] = $mess;
             
             $sender['title'] = 'My Big Photo';
             
             return $this->render('mybigimg',$sender);
        }
    }

    

    /**
     * Deletes an existing Album model.
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
     * Finds the Album model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Album the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Album::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
