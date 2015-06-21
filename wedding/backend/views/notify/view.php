<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Notify */

$this->title = $model->id_notify;
$this->params['breadcrumbs'][] = ['label' => 'Thông báo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notify-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_notify], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_notify], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_notify',
            'id_user',
            'date_create',
            'content:ntext',
            'status',
        ],
    ]) ?>

</div>
