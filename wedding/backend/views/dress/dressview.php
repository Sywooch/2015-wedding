<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\BootstrapAsset;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AlbumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Album';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="albumView">
    
     
<?php 

foreach ($imgdress as $img) {
?>
     <div class="row">  
        <div class="" ><a title=''><img style="width: 50%" src='<?php  echo $img['url']; ?>' alt='<?php  ?>'></a></div>
        <div class="box"><?= Html::a('Delete', Url::base().'/index.php?r=img/delete&&id='.$img['id_img'].'&&typedelete=editdress&&id_dress='.$id_dress, [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?></div>
   
         </div>
<?php }?>
   
    
    <div class="row">
        <?= Html::a('Edit', Url::base().'/index.php?r=dress/editimgdress&&id_dress='.$_GET['id'], ['class' => 'btn btn-success']) ?>
    </div>
    
</div>  
<div class="clr"></div>
<!--srcrip and css-->
<?php
//   $this->registerJsFile(Url::base().'/js/img.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
//   $this->registerJsFile(Url::base().'/js/js/jquery-1.8.3.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
//   $this->registerJsFile(Url::base().'/js/js/galleria.folio.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
//   $this->registerJsFile(Url::base().'/js/js/galleria-1.2.8.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
//   $this->registerCssFile(Url::base().'/css/css/galleria.folio.css', ['depends' => [BootstrapAsset::className()],]);
?>

