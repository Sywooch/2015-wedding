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
?>
<div class="contract-form">
    <?php $form = ActiveForm::begin(); ?>
         <?= $form->field($contract, 'id_local')->dropDownList(
                    ArrayHelper::map(Localtion::find()->all(), 'id_local', 'name_local'),
                        [
//                            'prompt'=>'Select Localtion',
                            'class'=> "form-control a"
                        ]
                        ) ?> 
        <?= $form->field($contract, 'start_time')->widget(
            DatePicker::className(), [
              'inline'=>false,
              'clientOptions'=>[
                  'autoclose'=>true,
                  'format'=>'yyyy-mm-dd'
              ]
        ]);?> 
        <?= $form->field($contract, 'end_time')->widget(
            DatePicker::className(), [
              'inline'=>false,
              'clientOptions'=>[
                  'autoclose'=>true,
                  'format'=>'yyyy-mm-dd'
              ]
        ]);?> 
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
                        ArrayHelper::map(Dress::getDressNotContractSample($contract->start_time,$contract->end_time,$contract->id_contract),'id_dress','name_dress'),
                                [//'prompt'=>'Select Dress',
                                   'multiple'=>true,
//                                    'size'=>'auto',
                                    
                                ]
                            );
         ?>
  
    
    <?=$form->field($photo, 'id_user')->dropDownList(
                        ArrayHelper::map(User::getPhotoNotContract($contract->start_time,$contract->end_time),'id','username'),
                                [
//                                    'prompt'=>'Select Photograper',
                                    
                                ]
                            );
    ?>
    
    <?=$form->field($makeup, 'id_user')->dropDownList(
                        ArrayHelper::map(User::getMakeupNotContract($contract->start_time,$contract->end_time),'id','username'),
                                [
//                                    'prompt'=>'Select Photograper',
                                    
                                ]
                            );
    ?>
    
    <?php $form = ActiveForm::end() ?>
</div>
