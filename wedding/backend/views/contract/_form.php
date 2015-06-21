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
                        ['prompt'=>'Select Localtion','class'=> "form-control a"]
                        ) ?>
        
        <?= $form->field($model, 'start_time')->widget(
            DatePicker::className(), [
              'inline'=>false,
              'clientOptions'=>[
                  'autoclose'=>true,
                  'format'=>'yyyy-mm-dd'
              ]
        ]);?>
        <?= $form->field($model, 'timeadd')->dropDownList(
                    [
                        '0'=>'0',
                        '1'=>'1',
                        '2'=>'2',
                        '3'=>'3',
                        '4'=>'4',
                        '5'=>'5',
                        '6'=>'6',
                        '7'=>'7',
                        '8'=>'8',
                        '9'=>'9',
                        '10'=>'10',
                    ],
                    
                   ['prompt'=>'Thêm ngày','class'=> "form-control b"]);
        
        ?>
                
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
    
   
     <?php if(isset($dresscontract)&&isset($_GET['start'])&&isset($_GET['end'])){?>
        
    <?php    
          echo $form->field($dresscontract, 'id_dress[]')->dropDownList(
                        ArrayHelper::map($var->getDressNotContract($_GET['start'], $_GET['end']),'id_dress','name_dress'),
                                [//'prompt'=>'Select Dress',
                                   'multiple'=>true,
                                    'size'=>'auto',
                                    
                                ]
                            );
         ?>
          <div id="test" ></div>    
     <?php   
     } ?>
    
    <?php if(isset($photocontract)&&isset($_GET['start'])&&isset($_GET['end'])){
        
        
//        if(!$model->isNewRecord){
//            $arr = $user_photo->getAllPhotofree($_GET['start'], $_GET['end']);
//        }else {
//            $arr = $user_photo->getAllPhotofreeupdate($_GET['start'], $_GET['end'],$model->id_contract);
//        }
          echo $form->field($photocontract, 'id_user')->dropDownList(
                        ArrayHelper::map(backend\models\User::getPhotoNotContract($_GET['start'], $_GET['end']),'id','username'),
                                [/*'prompt'=>'Select Dress',*/
//                                   'multiple'=>true,
                                    'size'=>'auto',
                                    'prompt'=>'Select Photograper',
                                    
                                ]
                            );
         
     } ?>
    
    <?php if(isset($makeupcontract)&&isset($_GET['start'])&&isset($_GET['end'])){
          echo $form->field($makeupcontract, 'id_user')->dropDownList(
                        ArrayHelper::map($user_makeup->getMakeupNotContract($_GET['start'], $_GET['end']),'id','username'),
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
        
        
        
       
        
    <?php }?>    
        <h2>Ảnh cưới</h2>
         <?= $form->field($bigimg, 'size')->dropDownList(
                    ArrayHelper::map(Sizebigimg::find()->all(), 'size', 'size') 
                        ) ?>
       <?= $form->field($model, 'num_bigimg')->textInput() ?>
        
        
    </div>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tạo' : 'Chỉnh sửa', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::submitButton( 'Quay Lại', ['class' => 'btn btn-success','onclick' => "history.go(-1).clear"]) ?>

    </div>
        </div>    
    <?php ActiveForm::end(); ?>

</div>

