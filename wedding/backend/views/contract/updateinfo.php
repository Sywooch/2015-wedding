<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
//use common\models\User;
use dosamigos\datepicker\DatePicker;
use backend\models\Localtion;
use backend\models\Dress;
use backend\models\Ratealbum;
use backend\models\Sizebigimg;
use backend\models\User;
//use backend\models\Ratealbum;

$this->title = 'Update Contract '.$contract->id_contract;


if(isset($_GET['start'])&&isset($_GET['end'])){
            $start =$_GET['start'];
            $end =$_GET['end'];
        }else{
            $start =$contract->start_time;
            $end =$contract->end_time;
        }  
if(isset($_GET['id_local'])){
    $contract->id_local = $_GET['id_local'];
}
?>
<div class="contract-form">
    <?php $form = ActiveForm::begin(); ?>
        <?=$form->field($contract, 'id_contract')->hiddenInput()?>
        
         <?= $form->field($contract, 'id_local')->dropDownList(
                    ArrayHelper::map(Localtion::find()->all(), 'id_local', 'name_local'),
                        [
//                            'prompt'=>'Select Localtion',
                            'class'=> "form-control b"
                        ]
                        ) ?> 
        <?= $form->field($contract, 'start_time')->widget(
            DatePicker::className(), [
              'inline'=>false,
              'clientOptions'=>[
                  'autoclose'=>true,
                  'format'=>'yyyy-mm-dd',
                  'class'=> "form-control b"
              ],
                'class'=> "form-control b",
        ]);?> 
        
        <?php if(isset($_GET['timeadd'])){
            $contract->timeadd = $_GET['timeadd'];
            echo $form->field($contract, 'timeadd')->textInput(['class'=> "form-control b"]) ;
        } else {
            echo $form->field($contract, 'timeadd')->textInput(['class'=> "form-control b"]);
        } ?>
        
      
        <?=$form->field($contract,'id_user')->textInput(['readonly'=>true]);?>
    
        <?= $form->field($contract, 'payment1')->widget(
               DatePicker::className(), [
                 'inline'=>false,
                 'clientOptions'=>[
                     'autoclose'=>true,
                     'format'=>'yyyy-mm-dd'
                 ]
           ]);?>

        <?= $form->field($contract, 'payment2')->widget(
               DatePicker::className(), [
                 'inline'=>false,
                 'clientOptions'=>[
                     'autoclose'=>true,
                     'format'=>'yyyy-mm-dd'
                 ]
           ]);?>

        <?= $form->field($contract, 'payment3')->widget(
               DatePicker::className(), [
                 'inline'=>false,
                 'clientOptions'=>[
                     'autoclose'=>true,
                     'format'=>'yyyy-mm-dd'
                 ]
           ]);?>
    
    
    <?php   
    
          
        
        echo $form->field($dress, 'id_dress[]')->dropDownList(
                        ArrayHelper::map(Dress::getDressNotContractSample($start,$end,$contract->id_contract),'id_dress','name_dress'),
                                [//'prompt'=>'Select Dress',
                                   'multiple'=>true,
//                                    'size'=>'auto',
                                    
                                ]
                            );
         ?>
    <div id="test"></div>
    
    <?=$form->field($photo, 'id_user')->dropDownList(
                        ArrayHelper::map(User::getPhotoNotContractSample($start,$end,$contract->id_contract),'id','username'),
                                [
//                                    'prompt'=>'Select Photograper',
                                    
                                ]
                            );
    ?>
    
    <?=$form->field($makeup, 'id_user')->dropDownList(
                        ArrayHelper::map(User::getMakeupNotContractSample($start,$end,$contract->id_contract),'id','username'),
                                [
//                                    'prompt'=>'Select Photograper',
                                    
                                ]
                            );
    ?>
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
    <?= $form->field($contract, 'num_bigimg')->textInput() ?>
    <?= $form->field($contract, 'total')->textInput(['readonly'=>true]) ?>
    <div class ="form-group">
             <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
        <?= Html::submitButton( 'Back', ['class' => 'btn btn-success','onclick' => "history.go(-1).clear"]) ?>
    </div>
    <?php $form = ActiveForm::end() ?>
</div>
