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
        <a href="<?php echo 'index.php?r=dress/viewimg&&id='.$img['id_dress'] ?>"><img src="<?php echo $img['avatar']; ?>"></a>
        <p> <?php echo $img['name_dress'] ?></p>

        <?=  Html::a('Add To Cart', 'index.php?r=dress/addtocart&&id='.$img['id_dress'],['class'=>'btn btn-success']) ?>
        </li>
    <?php
        
    } ?>
        
    </ul>    
        
</div>

