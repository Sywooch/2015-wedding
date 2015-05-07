<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\TypeUser;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                
                <?= $form->field($model, 'type_user')->dropDownList(
                    ArrayHelper::map(TypeUser::find()->all(), 'id_type', 'name_type'),
                        ['prompt'=>'Select Type User',]
                        ) ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'fullname') ?>
                <?= $form->field($model, 'tell') ?>
                <?= $form->field($model, 'info_user')->textarea()?>
                <?= $form->field($model, 'address') ?>
                
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
