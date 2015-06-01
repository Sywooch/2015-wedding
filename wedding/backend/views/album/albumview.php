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
    
    <div class="row">    
<?php 

foreach ($albumimg as $img) {
?>
        <div class="" style="width: 50%"><a title=''><img src='<?php echo $img['url']; ?>' alt='<?php  ?>'></a></div>
        <div class="box"><?= Html::a('Delete', Url::base().'/index.php?r=img/delete&&id='.$img['id_img'].'&&typedelete=myalbum', [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?></div>
   

<?php }?>
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

