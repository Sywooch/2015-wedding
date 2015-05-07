<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\StatusAlbum;
use yii\helpers\ArrayHelper;
use backend\models\Contract;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Album */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="album-form">

    <?php $form = ActiveForm::begin(); ?>

   
    
    <?= $form->field($model, 'id_contract')->dropDownList(
                        ArrayHelper::map(Contract::find()->where(['have_album'=>0])->all(), 'id_contract', 'id_contract'),
                            ['prompt'=>'Select Status',]
                            ) ?>

    <?= $form->field($model, 'url_psd')->textInput(['maxlength' => 350]) ?>

    <?= $form->field($model, 'numpage')->textInput() ?>

   
    
    <?= $form->field($model, 'time_complete')->widget(
            DatePicker::className(), [
              'inline'=>false,
              'clientOptions'=>[
                  'autoclose'=>true,
                  'format'=>'yyyy-mm-dd'
              ]
        ]);?>

    <?= $form->field($model, 'url_folder')->textInput() ?>

    <?= $form->field($model, 'rate')->textInput(['maxlength' => 20]) ?>

  
    
    <?= $form->field($model, 'status')->dropDownList(
                        ArrayHelper::map(StatusAlbum::find()->all(), 'status_album', 'name_status'),
                            ['prompt'=>'Select Status',]
                            ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
