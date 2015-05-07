<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Ambience */

$this->title = 'Update Ambience: ' . ' ' . $model->id_local_amb;
$this->params['breadcrumbs'][] = ['label' => 'Ambiences', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_local_amb, 'url' => ['view', 'id' => $model->id_local_amb]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ambience-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
