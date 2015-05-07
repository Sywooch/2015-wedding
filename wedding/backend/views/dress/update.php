<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Dress */

$this->title = 'Update Dress: ' . ' ' . $model->id_dress;
$this->params['breadcrumbs'][] = ['label' => 'Dresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_dress, 'url' => ['view', 'id' => $model->id_dress]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dress-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
