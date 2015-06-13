<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Contract */

$this->title = 'Thông báo';
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usertask-view">
<!--    <div class ="row">-->
    <div>Nhắc nhỡ khách hàng đến studio trang điểm chụp ảnh vào ngày <?php echo date('Y-m-d',strtotime(date('Y-m-d')."+ 3 days")) ?></div>
    <?php if(isset($contracts_start)) { ?>
    <table class="table table-striped table-bordered detail-view">
        <tr>
            <td>Khách Hàng</td>
            <td>Số điện thoại</td>
            <td>Email</td>
        </tr>
     <?php foreach ($contracts_start as $customer) {?>
        <tr>
            <td><?php echo $customer['fullname'] ?></td>
            <td><?php echo $customer['tell'] ?></td>
            <td><?php  echo $customer['email'] ?></td>
        </tr>
     <?php }
        ?>
    
        
    </table>
    <?php } else {?>   
        
    <p>Không có hợp đồng vào ngày này</p>
        
    <?php } ?>
    <!--</div>-->
    
    
    
    <div>Nhắc nhỡ khách hàng đến studio thanh toán đợt 1 vào ngày <?php echo date('Y-m-d',strtotime(date('Y-m-d')."+ 3 days")) ?></div>
    <?php if(isset($contracts_payment1)) { ?>
    <table class="table table-striped table-bordered detail-view">
        <tr>
            <td>Khách Hàng</td>
            <td>Số điện thoại</td>
            <td>Email</td>
        </tr>
     <?php foreach ($contracts_payment1 as $customer) {?>
        <tr>
            <td><?php echo $customer['fullname'] ?></td>
            <td><?php echo $customer['tell'] ?></td>
            <td><?php  echo $customer['email'] ?></td>
        </tr>
     <?php }
        ?>
    
        
    </table>
    <?php } else {?>   
        
    <p>Không có khách hàng nào thanh toán đợt 1 <?php echo date('Y-m-d',strtotime(date('Y-m-d')."+ 3 days")) ?></p>
        
    <?php } ?>
    
    
    <div>Nhắc nhỡ khách hàng đến studio thanh toán đợt 2 vào ngày <?php echo date('Y-m-d',strtotime(date('Y-m-d')."+ 3 days")) ?></div>
    <?php if(isset($contracts_payment2)) { ?>
    <table class="table table-striped table-bordered detail-view">
        <tr>
            <td>Khách Hàng</td>
            <td>Số điện thoại</td>
            <td>Email</td>
        </tr>
     <?php foreach ($contracts_payment2 as $customer) {?>
        <tr>
            <td><?php echo $customer['fullname'] ?></td>
            <td><?php echo $customer['tell'] ?></td>
            <td><?php  echo $customer['email'] ?></td>
        </tr>
     <?php }
        ?>
    
        
    </table>
    <?php } else {?>   
        
    <p>Không có khách hàng nào thanh toán đợt 3 vào ngày <?php echo date('Y-m-d',strtotime(date('Y-m-d')."+ 3 days")) ?></p>
        
    <?php } ?>
    
    
    <div>Nhắc nhỡ khách hàng đến studio thanh toán đợt 4 vào ngày <?php echo date('Y-m-d',strtotime(date('Y-m-d')."+ 3 days")) ?></div>
    <?php if(isset($contracts_payment3)) { ?>
    <table class="table table-striped table-bordered detail-view">
        <tr>
            <td>Khách Hàng</td>
            <td>Số điện thoại</td>
            <td>Email</td>
        </tr>
     <?php foreach ($contracts_payment3 as $customer) {?>
        <tr>
            <td><?php echo $customer['fullname'] ?></td>
            <td><?php echo $customer['tell'] ?></td>
            <td><?php  echo $customer['email'] ?></td>
        </tr>
     <?php }
        ?>
    
        
    </table>
    <?php } else {?>   
        
    <p>Không có khách hàng nào thanh toán đợt 2 vào ngày <?php echo date('Y-m-d',strtotime(date('Y-m-d')."+ 3 days")) ?></p>
        
    <?php } ?>
</div>
