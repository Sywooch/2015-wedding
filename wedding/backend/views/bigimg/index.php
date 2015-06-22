<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BigimgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bigimgs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bigimg-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'id_contract',
            'url:url',
            'size',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
