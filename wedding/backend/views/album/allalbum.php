<?php
use backend\controllers\DressController;
use yii\helpers\Html;
use yii\helpers\Url;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->title =$title;
?>
<div class = "dress-index">
    <?php if(isset($allalbum)){ ?>
    <?php foreach ($allalbum as $album) {?>
        
        
        <li class='oneSer oneAlbum ' >
	        <a href='<?php echo 'index.php?r=dress/viewimg&&id='.$album->id_album ?>' class='thumb' style='background-image:url(<?php  ?>);'>
		<img src='<?php echo $album->avatar ?>' /></a>
	            <ul class='mask'>
	                <!--<h2><a href='chup-anh-cuoi-lau-dai-tajmasago-khaisilk-sab-c1.html'>Chụp ảnh cưới lâu đài Tajmasago Khaisilk</a></h2>-->
	                <p><a href='<?php echo 'index.php?r=dress/viewimg&&id='.$album ?>'  title='Ngoại Cảnh Phú Mỹ Hưng'><?php echo $album ?></a></p>
                       
                    </ul>
	        <h1><a href='<?php echo 'index.php?r=dress/viewimg&&id='.$album ?>' title=''><?php echo $album ?></a></h1>
                
        </li>
        
    <?php
        
    } 
    
    }
    ?>
        
       
        
</div>
