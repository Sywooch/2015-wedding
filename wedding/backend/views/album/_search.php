<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AlbumSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="album-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_album') ?>

    <?= $form->field($model, 'id_contract') ?>

    <?= $form->field($model, 'url_psd') ?>

    <?= $form->field($model, 'numpage') ?>

    <?= $form->field($model, 'time_complete') ?>

    <?php // echo $form->field($model, 'url_folder') ?>

    <?php // echo $form->field($model, 'rate') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
