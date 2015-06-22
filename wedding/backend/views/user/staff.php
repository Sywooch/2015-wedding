<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\controllers\SiteController;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;

//if($type==3) $action = Url::base().'/index.php?r=user/allmakeup';
//if($type==2) $action = Url::base().'/index.php?r=user/allphotograper';
?>
<div class="user-index">
    <?php if(isset($photos)) { ?>
    <div id="album">
        <?php foreach ($photos as $photo) {?>
            <li class='oneSer oneAlbum' >
	        <a href='chup-anh-cuoi-lau-dai-tajmasago-khaisilk-sab-c1.html' class='thumb' style='background-image:url(<?php echo $photo['avatar'] ?>);'>
		<img src='<?php echo $photo['avatar'] ?>' /></a>
	            <ul class='mask'>
	                <!--<h2><a href='chup-anh-cuoi-lau-dai-tajmasago-khaisilk-sab-c1.html'>Chụp ảnh cưới lâu đài Tajmasago Khaisilk</a></h2>-->
                        <p><a href='<?php echo Url::base().'/index.php?r=user/view&id='.$photo['id'] ?>'  title=''><?php echo $photo['fullname'] ?></a></p>
                        <p><a href=''  title=''><?php echo $photo['rate_user'] ?> VND/Ngay</a></p>
	            </ul>
	        <h1><a href='' title=''><?php echo $photo['fullname'] ?></a></h1>
	    </li>
        <?php } ?>
    </div>    
    <?php } ?>
</div>
