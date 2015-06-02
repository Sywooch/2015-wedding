<?php

namespace backend\controllers;

use Yii;
use backend\models\Ambience;
use backend\models\AmbienceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\controllers\LocaltionController;

/**
 * AmbienceController implements the CRUD actions for Ambience model.
 */
class AmbienceController extends Controller
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
     * Lists all Ambience models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AmbienceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ambience model.
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
     * Creates a new Ambience model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ambience();

        if ($model->load(Yii::$app->request->post()) ) {
            
            $model->id_local = $_GET['id'];
            
//            $imgname = time().rand(0, 10000).rand(0, 10000).rand(0, 10000);
            $model->avatar = UploadedFile::getInstance($model, 'avatar');
            
            if(isset($model->avatar))
            {
            $imgname = time().rand(0, 10000).rand(0, 10000).rand(0, 10000);
            $model->avatar = UploadedFile::getInstance($model, 'avatar');
            $model->avatar->saveAs('uploads/amb/'.$imgname.'.'.$model->avatar->extension );

                    //save in db

            $model->avatar = 'uploads/amb/'.$imgname.'.'. $model->avatar->extension;
            }else $model->avatar='';    
    
            $hehe = Yii::$app->db->createCommand("INSERT INTO ambience (id_local,name_amb,info_amb,avatar) VALUES ('".$_GET['id']."','".$model->name_amb
                    ."','".$model->info_amb."','".$model->avatar."')");

            
            
            if($hehe->execute())
            {
                return LocaltionController::redirect(['localtion/view', 'id' => $model->id_local]);
            }
           
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ambience model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_local_amb]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ambience model.
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
     * Finds the Ambience model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ambience the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ambience::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
