<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Ratealbum */

$this->title = 'Update Ratealbum: ' . ' ' . $model->page_num;
$this->params['breadcrumbs'][] = ['label' => 'Ratealbums', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->page_num, 'url' => ['view', 'id' => $model->page_num]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ratealbum-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
