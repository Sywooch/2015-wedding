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
use yii\helpers\Url;

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
        $searchModel = new AlbumSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Album model.
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
     * Creates a new Album model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
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
    //
    
    public function actionAllalbum(){
        $album = new Album;
        $model['allalbum'] = $album->getAllalbum();
        $model['title'] = 'All Album';
        $model['']= '';
        
        
        
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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            
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
//            echo '<pre>';
//            print_r($model);
//            echo '</pre>';
            
            if($model->save()){
            return $this->redirect(['view', 'id' => $model->id_album]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
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
