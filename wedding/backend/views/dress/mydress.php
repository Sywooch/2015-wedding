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
$this->params['breadcrumbs'][] = ['label' => 'Áo cưới', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "dress-index">
    
    <?php foreach ($imgs as $img) {?>
        
        
        <li class='oneSer oneAlbum ' >
	        <a href='<?php echo 'index.php?r=dress/viewimg&&id='.$img['id_dress'] ?>' class='thumb' style='background-image:url(<?php echo $img['avatar'] ?>);'>
		<img src='<?php echo $img['avatar'] ?>' /></a>
	            <ul class='mask'>
	                <!--<h2><a href='chup-anh-cuoi-lau-dai-tajmasago-khaisilk-sab-c1.html'>Chụp ảnh cưới lâu đài Tajmasago Khaisilk</a></h2>-->
	                <p><a href='<?php echo 'index.php?r=dress/viewimg&&id='.$img['id_dress'] ?>'  title='Ngoại Cảnh Phú Mỹ Hưng'><?php echo $img['name_dress'] ?></a></p>
                       
                    </ul>
	        <h1><a href='<?php echo 'index.php?r=dress/viewimg&&id='.$img['id_dress'] ?>' title=''><?php echo $img['name_dress'] ?></a></h1>
                
        </li>
        
    <?php
        
    } 
    
    
    ?>
        
       
        
</div>

