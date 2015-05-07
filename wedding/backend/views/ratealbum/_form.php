<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Ratealbum */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ratealbum-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'page_num')->textInput() ?>

    <?= $form->field($model, 'rate')->textInput(['maxlength' => 20]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
