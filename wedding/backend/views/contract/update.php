<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Contract */

$this->title = 'Update Contract: ' . ' ' . $model->id_contract;
$this->params['breadcrumbs'][] = ['label' => 'Contracts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_contract, 'url' => ['view', 'id' => $model->id_contract]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contract-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
