<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DressSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dress-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_dress') ?>

    <?= $form->field($model, 'name_dress') ?>

    <?= $form->field($model, 'avatar') ?>

    <?= $form->field($model, 'type_dress') ?>

    <?= $form->field($model, 'info_dress') ?>

    <?php // echo $form->field($model, 'rate_hire') ?>

    <?php // echo $form->field($model, 'rate_sale') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
