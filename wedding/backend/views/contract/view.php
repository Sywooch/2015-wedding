<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\User;
use yii\helpers\Url;
use backend\models\Dress;

/* @var $this yii\web\View */
/* @var $model backend\models\Contract */

$this->title = $model->id_contract;
$this->params['breadcrumbs'][] = ['label' => 'Hợp đồng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-view">

<!--    <h1><?//= Html::encode($this->title) ?></h1>-->

    <p>
        
        <?= Html::a('Chỉnh sửa', Url::base().'/index.php?r=contract/update&id='.$model->id_contract, ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->id_contract], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn muốn xóa hợp đồng này?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <table class="table table-striped table-bordered detail-view">
        <tbody>
            <tr>
                <td>Hợp Đồng Số</td>
                <td><?=$model->id_contract?></td>
            </tr>
            <tr>
                <td>Khách Hàng</td>
                <td><?php echo User::find()->where(['id'=>$model->id_user])->one()->fullname; ?></td>
            </tr>
            <tr>
                <td>Địa Điểm Chụp Ảnh</td>
                <td><?php echo \backend\models\Localtion::find()->where(['id_local'=>$model->id_local])->one()->name_local ?></td>
            </tr>
            <tr>
                <td>Thời Gian Bắt Đầu</td>
                <td><?=$model->start_time?></td>
            </tr>
            <tr>
                <td>Thời Gian Kết Thúc</td>
                <td><?=$model->end_time?></td>
            </tr>
            <tr>
                <td>Ngày Tạo Hợp Đồng</td>
                <td><?=$model->create_day?></td>
            </tr>
            <tr>
                <td>Tổng tiên</td>
                <td><?=number_format($model->total).' VND'?></td>
            </tr>
            <tr>
                <td>Thời Gian Thanh Toán Đợt 1</td>
                <td><?=$model->payment1?></td>
            </tr>
            <tr>
                <td>Thời Gian Thanh Toán Đợt 2</td>
                <td><?=$model->payment2?></td>
            </tr>
            <tr>
                <td>Thời Gian Thanh Toán Đợt 3</td>
                <td><?=$model->payment3?></td>
            </tr>
            <tr>
                <td>Thời Gian</td>
                <td><?=$model->total_time.' Ngày'?></td>
            </tr>
            <tr>
                <td>Thời Gian Khách Muốn Thêm</td>
                <td><?=$model->timeadd.' Ngày'?></td>
            </tr>
            <tr>
                <td>Thời Gian Hoàn Thành</td>
                <td><?=$model->timecomplete?></td>
            </tr>
            <tr>
                <td>Thợ chụp ảnh</td>
                <td><a href="<?php echo Url::base().'/index.php?r=user/view&id='.$photo->id_user ?>"><?php echo User::find()->where(['id'=>$photo->id_user])->one()->fullname?></a> </td>
            </tr>
            <tr>
                <td>Thợ trang điểm</td>
                <td><a href="<?php echo Url::base().'/index.php?r=user/view&id='.$makeup->id_user ?>"><?php echo User::find()->where(['id'=>$makeup->id_user])->one()->fullname?></a> </td>
            </tr>
            <tr>
                <td>Áo cưới</td>
                <td>
            <?php foreach ($dresses as $dress) {?>
                 
                    <a href="<?php echo Url::base().'/index.php?r=dress/viewimg&id='.$dress->id_dress ?>"><?php echo Dress::find()->where(['id_dress'=>$dress->id_dress])->one()->name_dress?></a> <br>
                 
             <?php } ?>
                 </td>
            </tr>
<!--            <tr>
                <td>Status</td>
                <td><?php
                    if($model->status==1)echo 'Chưa hoàn thành';else    echo 'Hoàn Thành'; 
                ?></td>
            </tr>-->
        </tbody>
        
    </table>

</div>
