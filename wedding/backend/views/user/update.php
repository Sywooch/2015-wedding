<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\User */


if($model->type_user == 2) {
    $label = 'Thợ Chụp ảnh';
    $url ='getallphoto';
}
if($model->type_user == 3) {
    $label = 'Thợ Trang Điểm';
    $url ='getallmakeup';
}



$this->title = 'Chỉnh sửa tài khoản: ' . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => $label, 'url' => [$url]];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 255,'readonly'=>true]) ?>

    <?= $form->field($model, 'type_user')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'range_user')->textInput() ?>

    <?= $form->field($model, 'rate_user')->textInput() ?>

    <?= $form->field($model, 'tell')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255,'readonly'=>true]) ?>

    <?= $form->field($model, 'info_user')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => 250]) ?>
    
    <?=$form->field($model, 'avatar')->fileInput()?>

    <div class="form-group">
        <?= Html::submitButton('Chỉnh sửa', ['class' =>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
