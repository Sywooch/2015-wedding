<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Ambience */

$this->title = $model->id_local_amb;
$this->params['breadcrumbs'][] = ['label' => 'Ambiences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ambience-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_local_amb], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_local_amb], [
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
            'id_local_amb',
            'id_local',
            'name_amb',
            'info_amb:ntext',
            'avatar',
            'status',
        ],
    ]) ?>

</div>
