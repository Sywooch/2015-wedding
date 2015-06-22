<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Contract */

$this->title = 'Tạo hợp đồng';
$this->params['breadcrumbs'][] = ['label' => 'Hợp đồng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dress'=>$dress,
        'dresscontract' =>$dresscontract,
        'photocontract'=>$photocontract,
        'makeupcontract'=>$makeupcontract,
        'album'=>$album,
        'bigimg'=>$bigimg,
    ]) ?>

</div>
