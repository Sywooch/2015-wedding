<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$session = Yii::$app->session;
?>
<div class="user-view">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
           // 'auth_key',
            //'password_hash',
           // 'password_reset_token',
            'type_user',
            'range_user',
            'rate_user',
            'fullname',
           // 'fullname2',
            'tell',
            'tell2',
            'email:email',
          //  'email2:email',
            'info_user:ntext',
            'address',
           // 'avatar',
            'status',
           // 'created_at',
           // 'updated_at',
        ],
    ]) ?>
    
     <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
         
        <?php if(isset($session['usernamr'])&&$session['type_user']==0) { ?> 
         
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php } ?>
    </p>

</div>
