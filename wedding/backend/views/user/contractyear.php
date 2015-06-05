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
$this->registerJsFile(Url::base().'/js/plot/plot.js', ['depends' => [\yii\web\JqueryAsset::className()],'position'=>1]);
$this->registerJsFile(Url::base().'/js/plot/jquery.flot.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Url::base().'/js/plot/jquery.flot.categories.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile(Url::base().'/css/plot/examples.css', ['depends' => [BootstrapAsset::className()],]);  
   

?>
<div class="user-index">

    
   
    <?php 
    
//    foreach ($contracts as $contract) {
//        $test[] = intval($contract);
//    }
    //var_dump($test);
    
    //$data = [ [1, $test[0]], [2, $test[1]], [3,$test[2]], [4,$test[3]], [5, $test[4]], [6,$test[5]] ,[7,$test[6]],[8,$test[7]] ,[9,$test[8]],[10, $test[9]],[11,$test[10]],[12,$test[11]]];
    
    //$test ='1';
    ?>
    <div class="demo-container">
        <label>
            <select id = "year-contract">
                <option value="2014">2014</option>
                <option value="2015" selected="true">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
            </select>
        </label>
         <div class="breadcrumb"><?= Html::encode($this->title) ?></div>
         <div id="placeholder" class="demo-placeholder" ></div>
    </div>
    <div class="demo-container">
        
        
         <div class="breadcrumb"><?= Html::encode($this->title) ?></div>
         <div id="placeholder1" class="demo-placeholder" ></div>
    </div>
</div>


