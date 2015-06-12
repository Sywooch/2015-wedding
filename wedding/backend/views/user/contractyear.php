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

    <div class="demo-container">
        <label>
            <select id = "year-contract">
                <option value="<?php echo date('Y')-4 ?>"><?php echo date('Y')-4 ?></option>
                <option value="<?php echo date('Y')-3 ?>"><?php echo date('Y')-3 ?></option>
                <option value="<?php echo date('Y')-2 ?>"><?php echo date('Y')-2 ?></option>
                <option value="<?php echo date('Y')-1 ?>"><?php echo date('Y')-1 ?></option>
                <option value="<?php echo date('Y') ?>" selected><?php echo date('Y') ?></option>
                <option value="<?php echo date('Y')+1 ?>"><?php echo date('Y')+1 ?></option>
                <option value="<?php echo date('Y')+2 ?>"><?php echo date('Y')+2 ?></option>
                
            </select>
        </label>
         <div class="breadcrumb"> Thống kê số lương hợp đồng trong năm</div>
         <div id="placeholder" class="demo-placeholder" ></div>
    </div>
    <div class="demo-container">
          <label>
            <select id = "year-photo">
                <option value="<?php echo date('Y')-4 ?>"><?php echo date('Y')-4 ?></option>
                <option value="<?php echo date('Y')-3 ?>"><?php echo date('Y')-3 ?></option>
                <option value="<?php echo date('Y')-2 ?>"><?php echo date('Y')-2 ?></option>
                <option value="<?php echo date('Y')-1 ?>"><?php echo date('Y')-1 ?></option>
                <option value="<?php echo date('Y') ?>" selected><?php echo date('Y') ?></option>
                <option value="<?php echo date('Y')+1 ?>"><?php echo date('Y')+1 ?></option>
                <option value="<?php echo date('Y')+2 ?>"><?php echo date('Y')+2 ?></option>
                
            </select>
        </label>
        
         <div class="breadcrumb">Thống kê top thợ chụp ảnh trong năm</div>
         <div id="placeholder1" class="demo-placeholder" ></div>
    </div>
    
    
    <div class="demo-container">
          <label>
            <select id = "year-makeup">
                <option value="<?php echo date('Y')-4 ?>"><?php echo date('Y')-4 ?></option>
                <option value="<?php echo date('Y')-3 ?>"><?php echo date('Y')-3 ?></option>
                <option value="<?php echo date('Y')-2 ?>"><?php echo date('Y')-2 ?></option>
                <option value="<?php echo date('Y')-1 ?>"><?php echo date('Y')-1 ?></option>
                <option value="<?php echo date('Y') ?>" selected><?php echo date('Y') ?></option>
                <option value="<?php echo date('Y')+1 ?>"><?php echo date('Y')+1 ?></option>
                <option value="<?php echo date('Y')+2 ?>"><?php echo date('Y')+2 ?></option>
                
            </select>
        </label>
        
         <div class="breadcrumb">Thống kê top thợ trang điểm trong năm</div>
         <div id="placeholder2" class="demo-placeholder" ></div>
    </div>
    
    
    
    <div class="demo-container">
          <label>
            <select id = "year-local">
                <option value="<?php echo date('Y')-4 ?>"><?php echo date('Y')-4 ?></option>
                <option value="<?php echo date('Y')-3 ?>"><?php echo date('Y')-3 ?></option>
                <option value="<?php echo date('Y')-2 ?>"><?php echo date('Y')-2 ?></option>
                <option value="<?php echo date('Y')-1 ?>"><?php echo date('Y')-1 ?></option>
                <option value="<?php echo date('Y') ?>" selected><?php echo date('Y') ?></option>
                <option value="<?php echo date('Y')+1 ?>"><?php echo date('Y')+1 ?></option>
                <option value="<?php echo date('Y')+2 ?>"><?php echo date('Y')+2 ?></option>
                
            </select>
        </label>
        
         <div class="breadcrumb">Thống kê top địa điểm trong năm</div>
         <div id="placeholder3" class="demo-placeholder" ></div>
    </div>
    
    <div class="demo-container">
          <label>
            <select id = "year-dress">
                <option value="<?php echo date('Y')-4 ?>"><?php echo date('Y')-4 ?></option>
                <option value="<?php echo date('Y')-3 ?>"><?php echo date('Y')-3 ?></option>
                <option value="<?php echo date('Y')-2 ?>"><?php echo date('Y')-2 ?></option>
                <option value="<?php echo date('Y')-1 ?>"><?php echo date('Y')-1 ?></option>
                <option value="<?php echo date('Y') ?>" selected><?php echo date('Y') ?></option>
                <option value="<?php echo date('Y')+1 ?>"><?php echo date('Y')+1 ?></option>
                <option value="<?php echo date('Y')+2 ?>"><?php echo date('Y')+2 ?></option>
                
            </select>
        </label>
        
         <div class="breadcrumb">Thống kê top áo cưới trong năm</div>
         <div id="placeholder4" class="demo-placeholder" ></div>
    </div>
</div>


