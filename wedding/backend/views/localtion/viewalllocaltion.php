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
    <ul>
    <?php foreach ($imgs as $img) {?>
        <li class="list-group-item">
        <a href="<?php echo 'index.php?r=localtion/viewimg&&id='.$img['id_local'] ?>"><img src="<?php echo $img['avatar']; ?>"></a>
        <p> <?php echo $img['name_local'] ?></p>

        <?=  Html::a('Add To Cart', 'index.php?r=localtion/addtocart&&id='.$img['id_local'],['class'=>'btn btn-success']) ?>
        </li>
    <?php
        
    } ?>
        
    </ul>    
        
</div>
