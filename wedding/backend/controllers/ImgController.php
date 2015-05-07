<?php

namespace backend\controllers;

use Yii;
use backend\models\Img;
use backend\models\ImgSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\UploadForm;
use backend\models\Imgdress;
use backend\models\Imglocal;



/**
 * ImgController implements the CRUD actions for Img model.
 */
class ImgController extends Controller
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
     * Lists all Img models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ImgSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Img model.
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
     * Creates a new Img model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Img();
        
        
        
        if ($model->load(Yii::$app->request->post())) {
            $img = new UploadForm();

            $img->file = UploadedFile::getInstances($model, 'url');
          
            foreach ($img->file as $file) {
                $test = new Img();
                
                $imgname = time().rand(0, 10000).rand(0, 10000).rand(0, 10000);
                    
                    
                    
                    if(isset($_GET['type'])){
                        if($_GET['type']=='dress'){
                            
                            $file->saveAs('uploads/dress/' . $imgname . '.' . $file->extension);
                            $test->url = 'uploads/dress/' . $imgname . '.' . $file->extension;
                            $test->save();
                            $imgdress = new Imgdress();
                            $imgdress->id_dress = $_GET['id'];
                            $imgdress->id_img = $test->id_img ;
                            $imgdress->save();
                        }else if($_GET['type']=='local'){
                            
                            $file->saveAs('uploads/local/' . $imgname . '.' . $file->extension);
                            $test->url = 'uploads/local/' . $imgname . '.' . $file->extension;
                            $test->save();
                            $imglocal = new Imglocal();
                            $imglocal->id_local = $_GET['id'];
                            $imglocal->id_img = $test->id_img ;
                            $imglocal->save();
                        }
                    }
                    
                }
                if(isset($_GET['type'])){
                    if($_GET['type']=='dress'){
                        return DressController::redirect(['dress/view','id'=>$_GET['id']]);
                    }else if($_GET['type']=='local'){
                        return LocaltionController::redirect(['localtion/view','id'=>$_GET['id']]);
                    }
                }else{
                    return DressController::redirect(['dress/view','id'=>$_GET['id']]);
                }
          
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Img model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_img]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Img model.
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
     * Finds the Img model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Img the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     * 
     */
    protected function findModel($id)
    {
        if (($model = Img::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
