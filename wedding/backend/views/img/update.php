<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Img */

$this->title = 'Update Img: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Imgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id_img]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="img-update">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php
    Modal::begin([
        'header'=>'<h4> Add image dress</h4>',
        'id'=>'modal',
        'size'=>'modal-lg',
    ]);
    echo"<div id='modalContent'></div>";
    Modal::end();
    ?>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
