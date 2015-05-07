<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Localtion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="localtion-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name_local')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'info_local')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rate')->textInput() ?>

    <?= $form->field($model, 'avatar')->fileInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'timework')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
