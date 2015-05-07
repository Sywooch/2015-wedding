<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LocaltionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="localtion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_local') ?>

    <?= $form->field($model, 'name_local') ?>

    <?= $form->field($model, 'info_local') ?>

    <?= $form->field($model, 'rate') ?>

    <?= $form->field($model, 'avatar') ?>

    <?php // echo $form->field($model, 'timework') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
