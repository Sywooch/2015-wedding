<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AmbienceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ambience-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_local_amb') ?>

    <?= $form->field($model, 'id_local') ?>

    <?= $form->field($model, 'name_amb') ?>

    <?= $form->field($model, 'info_amb') ?>

    <?= $form->field($model, 'avatar') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
