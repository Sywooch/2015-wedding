<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'type_user')->textInput() ?>

    <?= $form->field($model, 'range_user')->textInput() ?>

    <?= $form->field($model, 'rate_user')->textInput() ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'fullname2')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'tell')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'tell2')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'email2')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'info_user')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'avatar')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
