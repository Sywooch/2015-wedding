<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Ambience */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ambience-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    

    <?= $form->field($model, 'name_amb')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'info_amb')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'avatar')->fileInput(['maxlength' => 350]) ?>

    <?= $form->field($model, 'status')->textInput() ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
