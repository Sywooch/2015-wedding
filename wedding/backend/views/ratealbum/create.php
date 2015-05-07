<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Ratealbum */

$this->title = 'Create Ratealbum';
$this->params['breadcrumbs'][] = ['label' => 'Ratealbums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ratealbum-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
