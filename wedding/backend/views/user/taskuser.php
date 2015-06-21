<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Contract */

$session = Yii::$app->session;

if($session['type_user']==2){
    $this->title = 'Thợ Chụp Ảnh';
}
if($session['type_user']==3){
    $this->title = 'Thợ Trang Điểm';
}
//$this->title = 'Nhân viên';
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usertask-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    
    <?php if (isset($taskofuser)&& $taskofuser !=NULL){ 
    ?>
    
    
    
    <table class ="table table-striped table-bordered table-hover table-condensed">
        <tr>
            <!--<td></td>-->
            <td>Tên địa điểm</td>
            <td>Thời Gian Bắt Đầu</td>
            <td>Thời Gian Kết Thúc</td>
            <td>Trạng Thái</td>
            <td>Action</td>
        </tr>
        <?php foreach ($taskofuser as $task) { ?>
        <tr>
            <!--<td><?//=$task['id_user']?></td>-->
            <td><?=$task['name_local']?></td>
            <td><?=$task['start_time']?></td>
            <td><?=$task['end_time']?></td>
            <td><?php if ($task['status']==1)
                echo 'Chưa Hoàn Thành';else echo 'Hoàn Thành';
                ?></td>
            <td><?php if($task['status']!=1) { ?><a href="<?php echo yii\helpers\Url::base().'/index.php?r=user/updatetask&id='.$task['id_contract'].'&type='.$session['type_user'].'&status='.$task['status'].'&id_user='.$session['id_user'] ?>"><span class ="glyphicon glyphicon-pencil"></span></a><?php } ?></td>
            
        </tr>
                
    
        <?php      } ?>
    </table>
    <?php } else { ?>
    <h2> <?php echo $mess;?>  </h2>
    <?php } ?>

</div>
