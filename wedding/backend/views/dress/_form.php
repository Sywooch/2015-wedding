<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\Dress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dress-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'name_dress')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'avatar')->fileInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'type_dress')->textInput() ?>
    
    <?= $form->field($model, 'info_dress')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rate_hire')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'rate_sale')->textInput(['maxlength' => 20]) ?>
    
    <?= $form->field($model, 'status')->textInput() ?>

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
