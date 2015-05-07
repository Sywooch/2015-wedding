<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\Localtion */

$this->title = $model->id_local;
$this->params['breadcrumbs'][] = ['label' => 'Localtions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="localtion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_local], ['class' => 'btn btn-primary']) ?>
        
        <?= Html::a('Update', ['update', 'id' => $model->id_local], ['class' => 'btn btn-primary']) ?>
        
        <?= Html::button('Create Amb',['value'=> Url::to('index.php?r=ambience/create&&id='.$model->id_local),'class' => 'btn btn-primary','id'=>'createamb' ] ) ?>
        <?= Html::button('Create Img',['value'=> Url::to('index.php?r=img/create&&id='.$model->id_local.'&&type=local'),'class' => 'btn btn-primary','id'=>'create_img' ] ) ?>
        
        <?= Html::a('Delete', ['delete', 'id' => $model->id_local], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        
        </p>
    
    
    <?php 
        Modal::begin([
            'header' => '<h4>Add Ambience</h4>',
            'id' => 'modal_amb',
            'size'=>'modal-lg'
                
                ]);
                echo "<div id ='modalContent_amb'></div> ";
        Modal::end();
    ?>
    <?php 
        Modal::begin([
            'header' => '<h4>Add image</h4>',
            'id' => 'modal_img',
            'size'=>'modal-lg'
                
                ]);
                echo "<div id ='modalContent_img'></div> ";
        Modal::end();
    ?>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_local',
            'name_local',
            'info_local:ntext',
            'rate',
            'avatar',
            'timework:integer',
            'status',
        ],
    ]) ?>

</div>
