<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Contract */

$this->title = 'Chỉnh sửa hợp đồng: ' . ' ' . $model->id_contract;
$this->params['breadcrumbs'][] = ['label' => 'Hợp đồng', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_contract, 'url' => ['view', 'id' => $model->id_contract]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="contract-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
       // 'dresscontract'=>$dresscontract,
    ]) ?>

</div>
