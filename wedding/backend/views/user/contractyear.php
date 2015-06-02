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
    
    foreach ($contracts as $contract) {
        $test[] = intval($contract);
    }
    //var_dump($test);
    
    $data = [ ["Tháng 1", $test[0]], ["Tháng 2", $test[1]], ["Tháng 3", $test[2]], ["Tháng 4", $test[3]], ["Tháng 5", $test[4]], ["Tháng 6", $test[5]] ,["Tháng 7", $test[6]],["Tháng 8", $test[7]] ,["Tháng 9", $test[8]],["Tháng 10", $test[9]],["Tháng 11", $test[10]],["Tháng 12", $test[11]]];
    
    //$test ='1';
    ?>
    <div class="demo-container">
         <div class="breadcrumb"><?= Html::encode($this->title) ?></div>
         <div id="placeholder" class="demo-placeholder" ></div>
    </div>
    <div class="demo-container">
        
        <label>
            <select>
                <option value="volvo">Volvo</option>
                <option value="saab">Saab</option>
                <option value="opel">Opel</option>
                <option value="audi">Audi</option>
            </select>
        </label>
         <div class="breadcrumb"><?= Html::encode($this->title) ?></div>
         <div id="placeholder1" class="demo-placeholder" ></div>
    </div>
</div>

<script type="text/javascript">document.onload = chartcontract(<?php echo json_encode($data); ?>,<?php echo json_encode('#placeholder'); ?>);</script>
<script type="text/javascript">document.onload = chartcontract(<?php echo json_encode($data); ?>,<?php echo json_encode('#placeholder1'); ?>);</script>