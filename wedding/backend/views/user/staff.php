<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\controllers\SiteController;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(isset($photos)) { ?>
    <table class ="table table-striped table-bordered table-hover table-condensed">
        <tr>
           
            <td>Avatar</td>
            <td>Tên</td>
            <td>Email</td>
            <td>Thông tin</td>
            
        </tr>
        <?php foreach ($photos as $photo) {?>
         <tr>
             <td style="text-align:center"><img src="<?php echo $photo['avatar']; ?>" style="width: 50px; height: 50px;"></td>
            <td><?=$photo['fullname']?></td>
            <td><?=$photo['email']?></td>
            <td><?=$photo['info_user']?></td>
 
        </tr>
        <?php } ?>
    </table>   
    <?php } ?>
</div>
