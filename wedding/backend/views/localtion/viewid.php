<?php
$this->title = $title;
$this->params['breadcrumbs'][] = ['label' => 'Dresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$i =0;
foreach ($imgs as $img) {
    
    ?>
<div style="width: 33%">
    <img src="<?php echo $img['url']; ?>" alt="Smiley face" width="100%">
    </div>
    <?php } ?>
