<?php
/* @var $this yii\web\View */

$this->title = 'Trang Chu';
//$this->params['breadcrumbs'][] = $this->title;
?>


   
  
<div class="breadcrumb"><h1> Top 5 áo cưới</h1></div>   
<div id ="album">
   
    <?php if(isset($topdress)&&$topdress!=NULL){ ?>
    <?php foreach ($topdress as $img) {?>
        
        
        <li class='oneSer oneAlbum ' >
	        <a href='<?php echo 'index.php?r=dress/viewimg&&id='.$img[2] ?>' class='thumb' style='background-image:url(<?php echo $img[3] ?>);'>
		<img src='<?php echo $img[3] ?>' /></a>
	            <ul class='mask'>
	                <!--<h2><a href='chup-anh-cuoi-lau-dai-tajmasago-khaisilk-sab-c1.html'>Chụp ảnh cưới lâu đài Tajmasago Khaisilk</a></h2>-->
	                <p><a href='<?php echo 'index.php?r=dress/viewimg&&id='.$img[2] ?>'  title='Ngoại Cảnh Phú Mỹ Hưng'><?php echo $img[0] ?></a></p>
                       <p><a href='<?php echo 'index.php?r=dress/viewimg&&id='.$img[2] ?>'  title='Ngoại Cảnh Phú Mỹ Hưng'><?php echo $img[4] ?>VND/Ngay</a></p>
                    </ul>
	        <h1><a href='<?php echo 'index.php?r=dress/viewimg&&id='.$img[2] ?>' title=''><?php echo $img[0] ?></a></h1>
                
        </li>
        
    <?php
        
    } 
    }
    
    ?>
   
</div>

<div class="clr"></div>
<div class="breadcrumb"><h1> Top 5 địa điểm</h1></div>   
<div id ="album">
   
    <?php if(isset($toplocal)&&$toplocal!=NULL){ ?>
    <?php foreach ($toplocal as $img) {?>
        <li class='oneSer oneAlbum ' >
	        <a href='<?php echo 'index.php?r=localtion/viewimg&&id='.$img[2] ?>' class='thumb' style='background-image:url(<?php echo $img[3] ?>);'>
		<img src='<?php echo $img[3] ?>' /></a>
	            <ul class='mask'>
	                <!--<h2><a href='chup-anh-cuoi-lau-dai-tajmasago-khaisilk-sab-c1.html'>Chụp ảnh cưới lâu đài Tajmasago Khaisilk</a></h2>-->
	                <p><a href='<?php echo 'index.php?r=localtion/viewimg&&id='.$img[2] ?>'  title=''><?php echo $img[0] ?></a></p>
                        <p><a href='<?php echo 'index.php?r=localtion/viewimg&&id='.$img[2] ?>'  title=''><?php echo $img[4].'VND' ?></a></p>
                        <p><a href='<?php echo 'index.php?r=localtion/viewimg&&id='.$img[2] ?>'  title=''><?php echo $img[5].' Ngày' ?></a></p>
                 
                    </ul>
	        <h1><a href='<?php echo 'index.php?r=dress/viewimg&&id='.$img[2] ?>' title=''><?php echo $img[0] ?></a></h1>
                
        </li>
    <?php
    }
    } ?>
   
</div>
   

