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
foreach ($albumimg as $img) {
?>
    
    <a title=''><img src='<?php echo $img['url']; ?>' alt='<?php  ?>'>
    </a>
   

<?php }?>
    
</div>  


<div class="row">
        <?= Html::a('Edit AlBum', Url::base().'/index.php?r=album/myalbum&&edit', ['class' => 'btn btn-success']) ?>
    </div>
<div class="clr"></div>
<!--srcrip and css-->
<?php
   $this->registerJsFile(Url::base().'/js/img.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
   $this->registerJsFile(Url::base().'/js/js/jquery-1.8.3.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
   $this->registerJsFile(Url::base().'/js/js/galleria.folio.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
   $this->registerJsFile(Url::base().'/js/js/galleria-1.2.8.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
   $this->registerCssFile(Url::base().'/css/css/galleria.folio.css', ['depends' => [BootstrapAsset::className()],]);
?>
