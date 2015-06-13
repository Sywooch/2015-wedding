<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NotifySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notifies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notify-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Notify', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_notify',
            'id_user',
            'date_create',
            'content:ntext',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>