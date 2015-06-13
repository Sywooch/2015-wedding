<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Contract;
use backend\models\Localtion;

/* @var $this yii\web\View */
/* @var $model backend\models\Contract */

$this->title = 'User';
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$i=1;
?>
<div class="usertask-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    
    <?php if (isset($taskofuser)&& $taskofuser !=NULL){ 
    ?>
    
    
    
    <table class ="table table-striped table-bordered table-hover table-condensed">
        <tr>
            <td></td>
            <td>Tên địa điểm</td>
            <td>Thời Gian Bắt Đầu</td>
            <td>Thời Gian Kết Thúc</td>
            <td>Trạng Thái</td>
            <td>Action</td>
        </tr>
        <?php foreach ($taskofuser as $task) { ?>
        <tr>
            <td><?=$i?></td>
            <td><?php 
                $local = Contract::find()->where(['id_contract'=>$task['id_contract']])->one()->id_local;
                $namelocal = Localtion::find()->where(['id_local'=>$local])->one()->name_local;
                echo $namelocal;
                
            ?></td>
            <td><?=$task['start_time']?></td>
            <td><?=$task['end_time']?></td>
            <td><?=$task['status']?></td>
            <td></td>
            
        </tr>
                
    
        <?php     $i++; } ?>
    </table>
    <?php } else { ?>
    <h2> <?php echo $mess;?>  </h2>
    <?php } ?>

</div>