<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Bigimg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bigimg-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_contract')->textInput() ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'size')->textInput(['maxlength' => 20]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
