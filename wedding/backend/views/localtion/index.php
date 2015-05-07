<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LocaltionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Localtions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="localtion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Localtion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id_local',
            'name_local',
            'info_local:ntext',
            'rate',
            [
               'header'=>'Avatar' ,
                'headerOptions'=> ['width' => '170px'],
                'attribute'=>'avatar',
                'format'=>'image',
               // 'value' =>'width:100px',
               // 'options'=>'100px',

            ],
//            'avatar:image'=>['width'=>'100px'],
            // 'timework:datetime',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
