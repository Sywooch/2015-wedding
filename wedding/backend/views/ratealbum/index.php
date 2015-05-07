<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RatealbumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ratealbums';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ratealbum-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ratealbum', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'page_num',
            'rate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
