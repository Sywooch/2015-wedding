<?php

use yii\helpers\Url;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
$session = Yii::$app->session;
$this->title = $title;
$this->params['breadcrumbs'][] = ['label' => 'Dresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$i =0;
?>
<div id = "albumView">
<?php foreach ($imgs as $img) {
    ?>

    <img src="<?php echo $img['url']; ?>" alt="Smiley face" width="100%">
    
<?php } ?>
    </div>

<?php if(isset($session['username'])&&$session['type_user']==0) {?>
<?=  Html::a('Edit', 'index.php?r=localtion/editimglocal&&id='.$_GET['id'],['class'=>'btn btn-success']) ?>
<?php }
   $this->registerJsFile(Url::base().'/js/img.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
   $this->registerJsFile(Url::base().'/js/js/jquery-1.8.3.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
   $this->registerJsFile(Url::base().'/js/js/galleria.folio.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
   $this->registerJsFile(Url::base().'/js/js/galleria-1.2.8.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
   $this->registerCssFile(Url::base().'/css/css/galleria.folio.css', ['depends' => [BootstrapAsset::className()],]);
?>