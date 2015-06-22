<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Dress */

$this->title = 'Thêm Áo Cưới';
$this->params['breadcrumbs'][] = ['label' => 'Áo cưới', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dress-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
