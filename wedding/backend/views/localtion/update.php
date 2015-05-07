<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Localtion */

$this->title = 'Update Localtion: ' . ' ' . $model->id_local;
$this->params['breadcrumbs'][] = ['label' => 'Localtions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_local, 'url' => ['view', 'id' => $model->id_local]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="localtion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
