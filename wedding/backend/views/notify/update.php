<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Notify */

$this->title = 'Update Notify: ' . ' ' . $model->id_notify;
$this->params['breadcrumbs'][] = ['label' => 'Notifies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_notify, 'url' => ['view', 'id' => $model->id_notify]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notify-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
