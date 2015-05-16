<?php
use yii\helpers\Html;

$this->title = $title;
$this->params['breadcrumbs'][] = ['label' => 'Dresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>


<div style="margin: 0 auto" id='albumView'>
<?php 
foreach ($imgs as $img) {
//    echo 'asdfjksdbjadfjsadf';
?>
    
    <a title='Ảnh Cưới Đẹp Phim Trường Rue'><img style="width: 33%" src='<?php echo $img['url']; ?>' alt='<?php echo $title; ?>'></a>

<?php }?>
    <div class="clr"></div>
</div>   

<?=  Html::a('Add To Cart', 'index.php?r=dress/addtocart&&id='.$_GET['id'],['class'=>'btn btn-success']) ?>