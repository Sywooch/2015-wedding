<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\controllers\SiteController;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(isset($photos)) { ?>
    <div class="album">
        <?php foreach ($photos as $photo) {?>
            <li class='oneSer oneAlbum' >
	        <a href='chup-anh-cuoi-lau-dai-tajmasago-khaisilk-sab-c1.html' class='thumb' style='background-image:url(<?php echo $photo['avatar'] ?>);'>
		<img src='<?php echo $photo['avatar'] ?>' /></a>
	            <ul class='mask'>
	                <!--<h2><a href='chup-anh-cuoi-lau-dai-tajmasago-khaisilk-sab-c1.html'>Chụp ảnh cưới lâu đài Tajmasago Khaisilk</a></h2>-->
	                <p><a href=''  title='Ngoại Cảnh Phú Mỹ Hưng'><?php echo $photo['fullname'] ?></a></p>
	            </ul>
	        <h1><a href='' title=''><?php echo $photo['fullname'] ?></a></h1>
	    </li>
        <?php } ?>
    </div>    
    <?php } ?>
</div>
