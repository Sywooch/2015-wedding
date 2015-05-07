<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Img */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Imgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="img-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_img], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_img], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        
    </p>
    
    <?php
    Modal::begin([
        'header'=>'<h4> Add image dress</h4>',
        'id'=>'modal',
        'size'=>'modal-lg',
    ]);
    echo"<div id='modalContent'></div>";
    Modal::end();
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_img',
            'url:url',
            'title',
            'status',
        ],
    ]) ?>

</div>
