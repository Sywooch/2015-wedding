<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Contract */

$this->title = 'User';
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usertask-view">
    <div>Start time</div>
    <?php foreach ($contracts_start as $key=>$date) { ?>
    <p><?php echo $key ?></p>
        <?php foreach ($date as $contract) {?>
            <p> Nhắc Nhỡ Khách Hàng <?php echo User::find($contract['id_user'])->one()->fullname; ?> </p>
        <?php } ?>
    
    <?php } ?>
            
    <div>Nhắc Nhở Thanh Toán Đợt 1</div>
    <?php foreach ($contracts_payment1 as $key=>$date) { ?>
    <p><?php echo $key ?></p>
        <?php foreach ($date as $contract) {?>
            <p> Nhắc Nhỡ Khách Hàng Thanh Toán Đợt 1<?php echo User::find($contract['id_user'])->one()->fullname; ?> </p>
        <?php } ?>
    
    <?php } ?>   
            
    <div>Nhắc Nhở Thanh Toán Đợt 2</div>
    <?php foreach ($contracts_payment2 as $key=>$date) { ?>
    <p><?php echo $key ?></p>
        <?php foreach ($date as $contract) {?>
            <p> Nhắc Nhỡ Khách Hàng Thanh Toán Đợt 1<?php echo User::find($contract['id_user'])->one()->fullname; ?> </p>
        <?php } ?>
    
    <?php } ?>    
    <div>Nhắc Nhở Thanh Toán Đợt 3</div>
    <?php foreach ($contracts_payment3 as $key=>$date) { ?>
    <p><?php echo $key ?></p>
        <?php foreach ($date as $contract) {?>
            <p> Nhắc Nhỡ Khách Hàng Thanh Toán Đợt 1<?php echo User::find($contract['id_user'])->one()->fullname; ?> </p>
        <?php } ?>
    
    <?php } ?>   

</div>
