<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\Dress */

$this->title = $model->name_dress;
$this->params['breadcrumbs'][] = ['label' => 'Dresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name_dress;
?>
<div class="dress-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_dress], ['class' => 'btn btn-primary']) ?>
        
        <?= Html::a('View Img', ['viewimg', 'id' => $model->id_dress], ['class' => 'btn btn-primary']) ?>
        
         <?= Html::button('Create Img',['value'=> Url::to('index.php?r=img/create&&id='.$model->id_dress.'&&type=dress'),'class' => 'btn btn-success','id'=>'createimg' ] ) ?>
        
        
        
        <?= Html::a('Delete', ['delete', 'id' => $model->id_dress], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
            </p>
    
    <?php 
        Modal::begin([
            'header' => '<h4>Add image</h4>',
            'id' => 'modal',
            'size'=>'modal-lg'
                
                ]);
                echo "<div id ='modalContent'></div> ";
        Modal::end();
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_dress',
            'name_dress',
            'avatar:image',
            'type_dress',
            'info_dress:ntext',
            'rate_hire',
            'rate_sale',
            'status',
        ],
    ]) ?>

</div>
