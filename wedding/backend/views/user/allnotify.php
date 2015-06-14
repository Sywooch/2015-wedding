<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\User;
use yii\helpers\Url;

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
            <td width="50px">Hành Động</td>
        </tr>
        <?php foreach ($allnotify as $notify) { ?>
        <tr>
            <td><?php echo $notify['fullname'] ?></td>
            <td><?php echo $notify['email'] ?></td>
            <td><?php echo $notify['tell'] ?></td>
            <td><?php echo $notify['date_create'] ?></td>
            <td><?php echo $notify['content'] ?></td>
            <td><?php if($notify['status']==1) echo 'Chưa Hoàn Thành';else echo 'Hoàn thành'; ?></td>
            <td><?php if($notify['status']==1) { ?>
                <a c href="<?php echo Url::base().'/index.php?r=notify/updatestatus&&id='.$notify['id_notify'];?>"><span class="glyphicon glyphicon-pencil"></span></a>
                <a data-method ="POST" href="<?php echo Url::base().'/index.php?r=notify/delete&&id='.$notify['id_notify'];?>"><span class="glyphicon glyphicon-trash"> </span></a>
            <?php 
                }else { ?>
                    
                    
                <a  href="<?php echo Url::base().'/index.php?r=notify/updatestatus&&id='.$notify['id_notify'];?>"><span class="glyphicon glyphicon-pencil"></a>
                <a  data-method ="POST" href="<?php echo Url::base().'/index.php?r=notify/delete&&id='.$notify['id_notify'];?>"><span class="glyphicon glyphicon-trash"> </span></a>
                <?php } ?></td>
        </tr>
        <?php } ?>
    </table>
    <?php } else { ?>
        <h1>Không có gì để nhắc nhở</h1>
    <?php } ?>
</div>
