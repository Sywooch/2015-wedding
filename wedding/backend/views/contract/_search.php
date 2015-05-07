<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ContractSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contract-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_contract') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_local') ?>

    <?= $form->field($model, 'start_time') ?>

    <?= $form->field($model, 'end_time') ?>

    <?php // echo $form->field($model, 'create_day') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'payment1') ?>

    <?php // echo $form->field($model, 'payment2') ?>

    <?php // echo $form->field($model, 'payment3') ?>

    <?php // echo $form->field($model, 'timephoto') ?>

    <?php // echo $form->field($model, 'timeadd') ?>

    <?php // echo $form->field($model, 'timecomplete') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
