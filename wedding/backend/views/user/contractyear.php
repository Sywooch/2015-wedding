<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\controllers\SiteController;
use yii\helpers\Url;
use yii\bootstrap\BootstrapAsset;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;


//$this->registerJsFile(Url::base().'/js/plot/jquery.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Url::base().'/js/plot/plot.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Url::base().'/js/plot/jquery.flot.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Url::base().'/js/plot/jquery.flot.categories.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile(Url::base().'/css/plot/examples.css', ['depends' => [BootstrapAsset::className()],]);  
   

?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php 
    
    foreach ($contracts as $contract) {
        $test[] = intval($contract);
    }
    var_dump($test);
    
    
    ?>
   
    <div type="image" id="placeholder" class="demo-placeholder" style="height: 200px" onload="test();"></div>
   <img onload="test()" width="100" height="132">
</div>

