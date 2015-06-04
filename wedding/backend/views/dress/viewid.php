<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\BootstrapAsset;
$session = Yii::$app->session;
$this->title = $title;
$this->params['breadcrumbs'][] = ['label' => 'Dresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
backend\assets\AppAsset::register($this);

?>


<div id="albumView">
<?php 
foreach ($imgs as $img) {
//    echo 'asdfjksdbjadfjsadf';
?>
    
    <a title=''><img src='<?php echo $img['url']; ?>' alt='<?php echo $title; ?>'></a>

<?php }?>
    
</div>  
<div class="clr"></div>
<!--srcrip and css-->

<?php if(isset($session['id_user'])&&$session['type_user']==0) {?>


<?= Html::a('Edit', Url::base().'/index.php?r=dress/editimgdress&&id='.$_GET['id'], ['class' => 'btn btn-success']) ?>
    
<?php }
   $this->registerJsFile(Url::base().'/js/img.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
   $this->registerJsFile(Url::base().'/js/js/jquery-1.8.3.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
   $this->registerJsFile(Url::base().'/js/js/galleria.folio.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
   $this->registerJsFile(Url::base().'/js/js/galleria-1.2.8.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
   $this->registerCssFile(Url::base().'/css/css/galleria.folio.css', ['depends' => [BootstrapAsset::className()],]);
?>

