<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Bigimg */

$this->title = 'Create Bigimg';
$this->params['breadcrumbs'][] = ['label' => 'Bigimgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bigimg-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
