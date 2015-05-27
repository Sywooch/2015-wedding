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

    <h1><?= Html::encode($this->title) ?></h1>
    <?php 
    
    foreach ($contracts as $contract) {
        $test[] = intval($contract);
    }
    //var_dump($test);
    
    $data = [ ["January", $test[0]], ["February", $test[1]], ["March", $test[2]], ["April", $test[3]], ["May", $test[4]], ["June", $test[5]] ,["July", $test[6]],["Aug", $test[7]] ,["Sep", $test[8]],["Oct", $test[9]],["Nov", $test[10]],["Dec", $test[11]]];
    
    //$test ='1';
    ?>
    <div class="demo-container">

     <div id="placeholder" class="demo-placeholder" ></div>
    </div>
</div>

<script type="text/javascript">document.onload = plot(<?php echo json_encode($data); ?>);</script>