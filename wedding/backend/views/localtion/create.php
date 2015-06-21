<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Localtion */

$this->title = 'Tạo Địa Điểm';
$this->params['breadcrumbs'][] = ['label' => 'Địa điểm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="localtion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
