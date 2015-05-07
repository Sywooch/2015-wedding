<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Ambience */

$this->title = 'Create Ambience';
$this->params['breadcrumbs'][] = ['label' => 'Ambiences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ambience-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
