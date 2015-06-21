<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Localtion */

$this->title = 'Chỉnh sửa địa điểm: ' . ' ' . $model->name_local;
$this->params['breadcrumbs'][] = ['label' => 'Địa điểm', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name_local, 'url' => ['view', 'id' => $model->id_local]];
$this->params['breadcrumbs'][] = 'Chỉnh Sửa';
?>
<div class="localtion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
