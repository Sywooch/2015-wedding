<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\TypeUser;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Thêm Tài Khoản';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>Please fill out the following fields to signup:</p>-->

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup','options' => ['enctype' => 'multipart/form-data']]); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                
                <?= $form->field($model, 'type_user')->dropDownList(
                    ArrayHelper::map(TypeUser::find()->all(), 'id_type', 'name_type'),
                        ['prompt'=>'Select Type User',]
                        ) ?>
            
                <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
                    
                    <div class = "email-customer" style="display: none;">
                   
                        <?= $form->field($model, 'email2')->textInput(['maxlength' => 255]) ?>
                    </div>

                   
                    <?= $form->field($model, 'fullname')->textInput(['maxlength' => 250]) ?>
                    <div class = "fullname-customer" style="display: none;">
                   
                         <?= $form->field($model, 'fullname2')->textInput(['maxlength' => 250]) ?>
                    </div>
                   

                    <?= $form->field($model, 'tell')->textInput(['maxlength' => 12]) ?>
                    
                    <div class = "tell-customer" style="display: none;">
                   
                         <?= $form->field($model, 'tell2')->textInput(['maxlength' => 12]) ?>
                    </div>
                   

                    

                    

                    <?= $form->field($model, 'info_user')->textarea(['rows' => 6]) ?>


                    <?= $form->field($model, 'address')->textInput(['maxlength' => 250]) ?>            
            <div id ="staff" class="staff" style="display: none;">
                <?= $form->field($model, 'range_user')->dropDownList([
                        '1'=>'1',
                        '2'=>'2',
                        '3'=>'3'
                    ],['prompt'=>'Select Range User']) ?>
                
                 <?= $form->field($model, 'rate_user')->textInput() ?>

                
                
            </div>
                <?=$form->field($model, 'avatar')->fileInput()?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


