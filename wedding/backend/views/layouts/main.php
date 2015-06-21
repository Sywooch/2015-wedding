<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
 $session = Yii::$app->session;
//echo $session['type_user'];

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body >
    <?php $this->beginBody() ?>
    <div class="wrap">
        <div id="header">

           <div id="logo_menu" class="pagewrap">
               <a href="" class="logo" title=""><img src="images/logo.png" width="478" alt=""></a>
               <div id="menuMain">
                   
                   <?php if(!isset($session['username'])){ ?>
                   <ul id="menu">
                       <li class=""><a href="<?php echo Url::base().'/index.php' ?>" title="Trang chủ">Trang chủ</a></li>
<!--                       <li class=""><a href="<?php echo Url::base().'/index.php?r=album' ?>" title="Giới thiệu">Album cưới</a></li>-->
                       <li class="haveSub "><a href="">Nhân Viên</a><span></span>
                           <ul>
                                <li><a href='<?php echo Url::base().'/index.php?r=user/allphotograper' ?>' title='Chụp hình Cưới'>Thợ chụp ảnh</a></li>
                                <li><a href='<?php echo Url::base().'/index.php?r=user/allmakeup' ?>' title='Áo Cưới'>Thợ Trang Điểm</a></li>
                               
                           </ul>
                       </li>
                       <li><a href="<?php echo Url::base().'/index.php?r=localtion/alllocal' ?>" title="Album ảnh">Địa điểm</a><span></span>
                           
                       </li>
                       <li class=" "><a href="<?php echo Url::base().'/index.php?r=dress/alldress' ?>" title="">Áo cưới</a><span></span>
                          
                       </li>
                       <li class=""><a href="" title="Địa điểm chụp hình cưới" class="place">Liên lạc</a></li>
                       <li class=""><a href="<?php echo Url::base().'/index.php?r=site/login' ?>" title="">Đăng Nhập</a></li>
                       <!--<li class=""><a href="" title="Khuyến mãi">Khuyến mãi</a><label>HOT</label></li>-->
                   </ul>
                       <?php }else if(isset($session['username'])){ ?>
                        <?php if($session['type_user']==1){ ?>
                            <ul id="menu">
                               
                                <li class="haveSub"><a href="" title="">Thông Tin Ảnh Cưới</a>
                                    <ul>
                                        <li><a href="<?php echo Url::base().'/index.php?r=album/myalbum' ?>">Album cưới</a></li>
                                        <li><a href="<?php echo Url::base().'/index.php?r=album/mybigimg' ?>">Ảnh lễ cưới</a></li>
                                    </ul>
                                </li>
                                <li class=" "><a href="<?php echo Url::base().'/index.php?r=user/mystaff' ?>">Nhân Viên </a><span></span>
                                    
                                </li>
                                <li class="haveSub "><a href="">Áo cưới</a><span></span>
                                    <ul>
                                         <li><a href="<?php echo Url::base().'/index.php?r=dress/mydress' ?>" title=''>Áo cưới của tôi</a></li>
                                         <li><a href='<?php echo Url::base().'/index.php?r=dress/alldress' ?>' title='Áo Cưới'>Tất cả áo cưới</a></li>
                                         
                                    </ul>
                                </li>
                                <li class="haveSub"><a href=""  title="">Địa điểm</a><span></span>
                                    <ul>
                                         <li><a href="<?php echo Url::base().'/index.php?r=localtion/mylocal' ?>" title=''>Địa điểm của tôi</a></li>
                                         <li><a href='<?php echo Url::base().'/index.php?r=localtion/alllocal' ?>' title=''>Tất cả địa điểm</a></li>
                                         
                                    </ul>
                                </li>
                               
                                <li class=""><a href="" title="Địa điểm chụp hình cưới" class="place">Liên lạc</a></li>
                                
                                <li class=""><a href="<?php echo Url::base().'/index.php?r=contract/mycontract' ?>" title="Tin tức">Hợp Đồng</a></li>
                                <li class=""><a href="" title="Khuyến mãi">Thông Tin Cá Nhân</a></li>
                                <li class=""><a href="<?php echo Url::base().'/index.php?r=site/logout' ?>" data-method = "post" class="place">Đăng Xuất(<?php echo $session['username']; ?>)</a></li>
                            </ul>
                        <?php } else if($session['type_user']== 0) { ?>
                            <ul id="menu">
                                <li class="haveSub"><a href="" title="Trang chủ">Ảnh cưới</a>
                                    <ul>
                                        <li><a href="<?php echo Url::base().'/index.php?r=album' ?>" title="Trang chủ">Album cưới</a></li>
                                        <li><a href="<?php echo Url::base().'/index.php?r=bigimg' ?>" title="Trang chủ">Ảnh cưới lớn</a></li>
                                    </ul>
                                    
                                </li>
                                
                                <li class="haveSub "><a href="">Tài Khoản </a><span></span>
                                    <ul>
                                         <li class=""><a href='<?php echo Url::base().'/index.php?r=user/getallphoto' ?>' title=''>Thợ Chụp Hình</a></li>
                                         <li class=""><a href='<?php echo Url::base().'/index.php?r=user/getallmakeup' ?>' title=''>Thợ Trang Điểm</a></li>
                                        
                                         <li><a href='<?php echo Url::base().'/index.php?r=user/getallcustomer' ?>' title='Áo Cưới'>Khách Hàng</a></li>
                                         <li><a href='<?php echo Url::base().'/index.php?r=site/signup' ?>' title=''>Thêm Tài Khoản</a></li>
                                         
                                    </ul>
                                </li>
                                <li class="haveSub"><a href="" title="">Địa điểm</a><span></span>
                                    <ul>
                                        <li class=""><a href="<?php echo Url::base().'/index.php?r=localtion' ?>" title="">Tất Cả Địa Điểm</a></li>
                                         <li class=""><a href="<?php echo Url::base().'/index.php?r=localtion/create' ?>" title="">Thêm Mới</a></li>
                                        
                                    </ul>
                                </li>
                                <li class="haveSub "><a href="" title="">Áo cưới</a><span></span>
                                    <ul>
                                        <li class=""><a href="<?php echo Url::base().'/index.php?r=dress'; ?>" title="">Tất Cả Áo Cưới</a></li>
                                        <li class=""><a href="<?php echo Url::base().'/index.php?r=dress/create'; ?>" title="">Thêm Mới</a></li>
                                    </ul>
                                </li>
                                
                                
                                <li class="haveSub"><a href="" title="Tin tức">Hợp Đồng</a>
                                    <ul>
                                        <li class=""><a href="<?php echo Url::base().'/index.php?r=contract' ?>" title="" class="place">Tất Cả Hợp Đồng</a></li>
                                        <li class=""><a href="<?php echo Url::base().'/index.php?r=contract/create' ?>" title="" class="place">Hợp Đồng Mới</a></li>
                                    </ul>
                                </li>
                                <li class=""><a href="<?php echo Url::base().'/index.php?r=user/contract' ?>" title="Địa điểm chụp hình cưới" class="place">Thống Kê</a></li>
                                <li class=""><a href="<?php echo Url::base().'/index.php?r=user/view&&id='.$session['id_user'] ?>" title="Khuyến mãi">Thông Tin Cá Nhân</a></li>
                                <li class=""><a href="<?php echo Url::base().'/index.php?r=site/logout' ?>" data-method = "post" class="place">Đăng Xuất</a></li>
                            </ul>
                        <?php }
                        else { ?>
                            <ul id="menu">
                                
                                <li class="haveSub "><a href="<?php echo Url::base().'/index.php?r=user/task&&id_user='.$session['id_user']; ?>" title="">Nhiệm Vụ</a><span></span>
                                    <ul>
                                    <?php for($i=1;$i<=12;$i++){ ?>
                                        <li><a href="<?php echo Url::base().'/index.php?r=user/mytask&&month='.$i; ?>" title=""><?php echo 'Tháng '.$i ?></a><span></span></li>
                                    <?php } ?>
                                    </ul>
                                </li>
                                <?php 
                                    $x =$session['type_user'];
                                    if($x == 2) $type = 'photographer';else if($x == 3 )$type = 'make up'; 
                                    ?>
                                <li class="haveSub"><a href="" title=""><?php echo $type.'('. $session['username'].')' ?></a><span></span>
                                    <ul>
                                        <li class=""><a href="<?php echo Url::base().'/index.php?r=user/view&&id='.$session['id_user']?>"  class="place">Thông Tin Cá Nhân</a></li>
                                       <li class=""><a href="<?php echo Url::base().'/index.php?r=site/logout' ?>" data-method = "post" title="Địa điểm chụp hình cưới" class="place">Đăng Xuất</a></li>
                                        
                                    </ul>
                                </li>
                            </ul>
                            
                   <?php    }
                       }        ?>
                   <div class="clr"></div>
                  
               </div><!--end menuMain-->
               <div class="bgHeader">
                    <img src="images/bg-header/1.png" width="122" class="img1" alt="" />
                   <img src="images/bg-header/2.png" width="50" class="img2" alt="" />
                   <img src="images/bg-header/3.png" width="50" class="img3" alt="" />
                   <img src="images/bg-header/4.png" width="22" class="img4" alt="" />
                   <img src="images/bg-header/5.png" width="22" class="img5" alt="" />
                   <img src="images/bg-header/6.png" width="70" class="img6" alt="" />
                   <img src="images/bg-header/7.png" width="70" class="img7" alt="" />
                   <img src="images/bg-header/8.png" width="33" class="img8" alt="" />
               </div><!--end bgHeader-->
               <div class="clr"></div>
           </div><!--end logo_menu-->
       </div><!--end header-->        
        
       
       
       <div class="pagewrap">
	<div id="pageNav">
            <div class="clr"></div>
        </div>
       

            <div class="content">
                
                <?php if(!isset($session['type_user'])) {?>
                <div id="colLeft">
                     <div class="leftBox">
                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                        <?= $content ?>
                         <div class="clr"></div>
                    </div>
                    
                </div>
                
                <div id="colRight">
                    <div class="rightBox menuRight">
                        <div class="titleBox"><h1>DỊCH VỤ CƯỚI</h1><i></i></div>
                        <ul>
                           <li><a href='<?php echo Url::base().'/index.php?r=user/allphotograper' ?>'  >Thợ Chụp Ảnh</a></li>
                           <li><a href='<?php echo Url::base().'/index.php?r=user/allmakeup' ?>' title='Áo Cưới' >Thợ Trang Điểm</a></li>
                           <li><a href='<?php echo Url::base().'/index.php?r=dress/alldress' ?>' title='Trang điểm cô dâu' >Áo cưới</a></li>
                           <li><a href='<?php echo Url::base().'/index.php?r=localtion/alllocal' ?>' title='Nhẫn Cưới' >Địa điểm</a></li>
                           <li><a href='hoa-cuoi-sdv.html' title='Hoa Cưới' >Liên lạc</a></li>        
                        </ul>
                        <div class="clr"></div>
                    </div><!--end rightBox-->
                    <div class ="rightBox">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5046422685427!2d106.65774599999996!3d10.772607999999986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ec17709146b%3A0x54a1658a0639d341!2zMjY4IEzDvSBUaMaw4budbmcgS2nhu4d0!5e0!3m2!1svi!2sus!4v1434440586118" width="260px" height="300px" frameborder="0" style="border:0"></iframe>
                        
                    </div>
                    <div class="rightBox">
                        <div class="fb-like" style="position: fixed" data-share="true"  data-show-faces="true"></div>    
                    </div>
                </div><!--end colRight-->        
                <div class="clr"></div>
                <?php } else { ?>
                    
                <div id="colLeft" style="width:100%">
                     <div class="leftBox">
                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                        <?= $content ?>
                         <div class="clr"></div>
                    </div>
                    
                </div>
                    
                <?php } ?>
    </div>
                
                
                
                
            </div>
       
    </div>
       <div class="clr"></div>
       </div>
<!--    <div id="footer">
	<div class="pagewrap">
    	<ul class="fooLink">
        	<h1><span>DANH MỤC</span></h1>
            <li>
                <a href="">Trang chủ</a>
				<a href="">Giới thiệu</a>
				<a href="">Dịch vụ cưới</a>
				<a href="">Bảng giá</a>
				<a href="">Album ảnh</a>
				<a href="">Địa điểm chụp hình cưới</a>
            </li>
            <li class="right">
            	<a href="">Tin tức cưới</a>
				<a href="">Album khách hàng</a>
				<a href="">Video clip</a>
				<a href="">Sitemap</a>
				<a href="">Liên hệ</a>
            </li>
            <div class="clr"></div>
        </ul>
        <ul class="fooLink fix">
        	<h1><span>DANH MỤC XEM NHIỀU</span></h1>
			 
        	<li>
            	<a href='' title='Chụp hình Cưới'>Chụp hình Cưới</a> <a href='' title='Áo Cưới'>Áo Cưới</a> <a href='http://vietkhanhphoto.com/trang-diem-co-dau-sdv' title='Trang điểm cô dâu'>Trang điểm cô dâu</a> <a href='http://vietkhanhphoto.com/nhan-cuoi-sdv' title='Nhẫn Cưới'>Nhẫn Cưới</a> <a href='http://vietkhanhphoto.com/hoa-cuoi-sdv' title='Hoa Cưới'>Hoa Cưới</a>             </li>
            <li class="right">
            	<a href='' title='Địa điểm chụp hình cưới'>Địa điểm chụp hình cưới</a> <a href='' title='Áo cưới đẹp'>Áo cưới đẹp</a> <a href='http://vietkhanhphoto.com/lam-toc-co-dau-sab-c3' title='Làm tóc cô dâu'>Làm tóc cô dâu</a> <a href='http://vietkhanhphoto.com/chup-anh-chan-dung-sab-c5' title='Chụp ảnh chân dung'>Chụp ảnh chân dung</a> <a href='http://vietkhanhphoto.com/chup-anh-thoi-trang-sab-c5' title='Chụp ảnh thời trang'>Chụp ảnh thời trang</a>             </li>
        </ul>
        
        <div class="clr"></div>
    </div>end pagewrap
	<div class="clr"></div>
</div>end footer-->

    <?php $this->endBody() ?>
</body>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '387081961481281',
      xfbml      : true,
      version    : 'v2.3'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
</html>
<?php $this->endPage() ?>


