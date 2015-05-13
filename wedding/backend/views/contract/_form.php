<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;
use dosamigos\datepicker\DatePicker;
use backend\models\Localtion;
use backend\models\Dress;
use backend\models\Ratealbum;
use backend\models\Sizebigimg;

/* @var $this yii\web\View */
/* @var $model backend\models\Contract */
/* @var $form yii\widgets\ActiveForm */


$var = new Dress();
$user_photo = new backend\models\User();
$user_makeup = new backend\models\User();
$items = [15,20,25,30,35,40,45,50];
$opt = [15,20,25,30,35,40,45,50];


?>

<div class="contract-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php if(!isset($_GET['start'])) {?>
    <div class = "timestart">
    <?= $form->field($model, 'id_local')->dropDownList(
                    ArrayHelper::map(Localtion::find()->all(), 'id_local', 'name_local'),
                        ['prompt'=>'Select Localtion',]
                        ) ?>
        
        <?= $form->field($model, 'start_time')->widget(
            DatePicker::className(), [
              'inline'=>false,
              'clientOptions'=>[
                  'autoclose'=>true,
                  'format'=>'yyyy-mm-dd'
              ]
        ]);?>
        <?= $form->field($model, 'timeadd')->textInput() ?>
                
    </div>
    <?php }?>
    <div class ="info_contract">
    
    
    <?php if($model->isNewRecord) {?>
        <?= $form->field($model, 'id_user')->dropDownList(
                        ArrayHelper::map(User::find()->where(['type_user'=>1,'have_contract'=>0])->all(), 'id', 'username'),
                            ['prompt'=>'Select User',]
                            ) ?>
        <?php } else {
         echo $form->field($model,'id_user')->textInput(['readonly'=>true]);
        }
    ?>

     <?= $form->field($model, 'payment1')->widget(
            DatePicker::className(), [
              'inline'=>false,
              'clientOptions'=>[
                  'autoclose'=>true,
                  'format'=>'yyyy-mm-dd'
              ]
        ]);?>
    
     <?= $form->field($model, 'payment2')->widget(
            DatePicker::className(), [
              'inline'=>false,
              'clientOptions'=>[
                  'autoclose'=>true,
                  'format'=>'yyyy-mm-dd'
              ]
        ]);?>
    
     <?= $form->field($model, 'payment3')->widget(
            DatePicker::className(), [
              'inline'=>false,
              'clientOptions'=>[
                  'autoclose'=>true,
                  'format'=>'yyyy-mm-dd'
              ]
        ]);?>
    
    <?= $form->field($model, 'timephoto')->widget(
            DatePicker::className(), [
              'inline'=>false,
              'clientOptions'=>[
                  'autoclose'=>true,
                  'format'=>'yyyy-mm-dd'
              ]
        ]);?>

    

    <?= $form->field($model, 'timecomplete')->textInput() ?>
    
   
     <?php if(isset($dresscontract)&&isset($_GET['start'])&&isset($_GET['end'])){
         
          if($var->getAllDressFree($_GET['start'], $_GET['end'])!=NULL){
            $dress = ArrayHelper::map($var->getAllDressFree($_GET['start'], $_GET['end']),'id_dress','name_dress');}else $dress=[];
          echo $form->field($dresscontract, 'id_dress[]')->dropDownList(
                        $dress,
                                [/*'prompt'=>'Select Dress',*/
                                   'multiple'=>true,
                                    'size'=>'auto',
                                    
                                ]
                            );
         
     } ?>
    
    <?php if(isset($photocontract)&&isset($_GET['start'])&&isset($_GET['end'])){
          echo $form->field($photocontract, 'id_user')->dropDownList(
                        ArrayHelper::map($user_photo->getAllPhotofree($_GET['start'], $_GET['end']),'id','username'),
                                [/*'prompt'=>'Select Dress',*/
//                                   'multiple'=>true,
                                    'size'=>'auto',
                                    'prompt'=>'Select Photograper',
                                    
                                ]
                            );
         
     } ?>
    
    <?php if(isset($makeupcontract)&&isset($_GET['start'])&&isset($_GET['end'])){
          echo $form->field($makeupcontract, 'id_user')->dropDownList(
                        ArrayHelper::map($user_makeup->getAllMakeupfree($_GET['start'], $_GET['end']),'id','username'),
                                [/*'prompt'=>'Select Dress',*/
//                                   'multiple'=>true,
                                    'size'=>'auto',
                                    'prompt'=>'Select Makeup',
                                    
                                ]
                            );
         
     } ?>
    <?php if(isset($album)){?>
    <div class = "form-group">
        <h2>Album</h2>
    
        <?= $form->field($album, 'numpage')->dropDownList(
                    ArrayHelper::map(Ratealbum::find()->all(), 'page_num', 'page_num') 
                        ) ?>
        <?= $form->field($album, 'time_complete')->widget(
            DatePicker::className(), [
              'inline'=>false,
              'clientOptions'=>[
                  'autoclose'=>true,
                  'format'=>'yyyy-mm-dd'
              ]
        ]);?>
        
        <h2>Big Photo Wedding</h2>
        
       
        
        <?= $form->field($bigimg, 'size')->dropDownList(
                    ArrayHelper::map(Sizebigimg::find()->all(), 'size', 'size') 
                        ) ?>
        
    <?php }?>    
        
        
        
    </div>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::submitButton( 'Review', ['class' => 'btn btn-success']) ?>

    </div>
        </div>    
    <?php ActiveForm::end(); ?>

</div>

