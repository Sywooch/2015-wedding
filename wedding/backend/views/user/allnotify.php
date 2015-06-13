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
    <?php if(isset($allnotify)) {?>
    <table class="table table-striped table-bordered detail-view">
        <tr>
            <td>Tên Khách Hàng</td>
            <td>Email</td>
            <td>Điện Thoại</td>
            <td>Ngày Thực Hiện</td>
            <td>Nội dung</td>
            <td>Trạng Thái</td>
            <td>Hành Động</td>
        </tr>
        <?php foreach ($allnotify as $notify) { ?>
        <tr>
            <td><?php echo $notify['fullname'] ?></td>
            <td><?php echo $notify['email'] ?></td>
            <td><?php echo $notify['tell'] ?></td>
            <td><?php echo $notify['date_create'] ?></td>
            <td><?php echo $notify['content'] ?></td>
            <td><?php echo $notify['status'] ?></td>
            <td></td>
        </tr>
        <?php } ?>
    </table>
    <?php } else { ?>
        <h1>Không có gì để nhắc nhở</h1>
    <?php } ?>
</div>
