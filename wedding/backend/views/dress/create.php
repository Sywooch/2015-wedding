<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Dress */

$this->title = 'Create Dress';
$this->params['breadcrumbs'][] = ['label' => 'Dresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dress-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
