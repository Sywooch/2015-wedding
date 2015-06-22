<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Contract */

$this->title = 'Hợp đồng của tôi';
$this->params['breadcrumbs'][] = ['label' => 'Hợp đồng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-view">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_contract], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_contract], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>-->
    
    <?php if(isset($model)){ ?>
    <table class="table table-striped table-bordered detail-view">
        <tr>
            <td style="width: 30%">Hợp Đồng Số</td>
            <td><?php echo $model->id_contract; ?></td>
        </tr>
        <tr>
            <td>Địa Điểm</td>
            <td><?php  $model->id_local;
        echo backend\models\Localtion::find()->where(['id_local'=>$model->id_local])->one()->name_local; ?></td>
        </tr>
        <tr>
            <td>Thời Gian Bắt Đầu</td>
            <td><?php echo $model->start_time; ?></td>
        </tr>
        <tr>
            <td>Thời Gian Kết Thúc</td>
            <td><?php echo $model->end_time; ?></td>
        </tr>
        <tr>
            <td>Thanh Toán Đợt 1</td>
            <td><?php echo $model->payment1; ?></td>
        </tr>
        <tr>
            <td>Thanh Toán Đợt 2</td>
            <td><?php echo $model->payment2; ?></td>
        </tr>
        <tr>
            <td>Thanh Toán Đợt 3</td>
            <td><?php echo $model->payment3; ?></td>
        </tr>
        <tr>
            <td>Áo cưới</td>
            <td><?= Html::a('Áo cưới', ['dress/mydress'], ['class' => 'btn btn-primary']) ?></td>
        </tr>
        <tr>
            <td>Thợ Chụp Ảnh, Thợ Trang Điểm</td>
            <td><?= Html::a('Nhân Viên', ['user/mystaff'], ['class' => 'btn btn-primary']) ?></td>
        </tr>
        <tr>
            <td>Tổng Thời Gian</td>
            <td><?php echo $model->total_time; ?> Ngày</td>
        </tr>
        <tr>
            <td>Tổng Tiền</td>
            <td><?php echo $model->total; ?></td>
        </tr>
        
    </table>
    
    
    
    
    
    <?php }?>
</div>
