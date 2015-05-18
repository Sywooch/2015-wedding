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
               <a href="" class="logo" title=""><img src="images/logo.png" width="478" alt="Việt Khanh Bridal"></a>
               <div id="menuMain">
                   
                   <?php if(!isset($session['username'])){ ?>
                   <ul id="menu">
                       <li class=""><a href="<?php echo Url::base().'/index.php' ?>" title="Trang chủ">Trang chủ</a></li>
                       <li class=""><a href="" title="Giới thiệu">Album cưới</a></li>
                       <li class="haveSub "><a href="">Dịch vụ cưới</a><span></span>
                           <ul>
                                <li><a href='' title='Chụp hình Cưới'>Chụp hình Cưới</a></li>
                                <li><a href='<?php echo Url::base().'/index.php?r=dress/alldress' ?>' title='Áo Cưới'>Áo Cưới</a></li>
                                <li><a href='' title='Trang điểm cô dâu'>Trang điểm cô dâu</a></li>
                                <li><a href='' title='Nhẫn Cưới'>Nhẫn Cưới</a></li>
                                <li><a href='' title='Hoa Cưới'>Hoa Cưới</a></li> 
                           </ul>
                       </li>
                       <li><a href="<?php echo Url::base().'/index.php?r=localtion/alllocal' ?>" title="Album ảnh">Địa điểm</a><span></span>
                           
                       </li>
                       <li class="haveSub "><a href="<?php echo Url::base().'/index.php?r=dress/alldress' ?>" title="Bảng giá">Áo cưới</a><span></span>
                           <ul>
                               <li><a href='' title='Bảng giá'>Bảng giá</a></li> 
                           </ul>
                       </li>
                       <li class=""><a href="" title="Địa điểm chụp hình cưới" class="place">Liên lạc</a></li>
                       <li class=""><a href="<?php echo Url::base().'/index.php?r=site/login' ?>" title="">Đăng Nhập</a></li>
                       <!--<li class=""><a href="" title="Khuyến mãi">Khuyến mãi</a><label>HOT</label></li>-->
                   </ul>
                       <?php }else if(isset($session['username'])){ ?>
                        <?php if($session['type_user']==1){ ?>
                            <ul id="menu">
                                <li class=""><a href="" title="Trang chủ">Trang chủ</a></li>
                                <li class="haveSub"><a href="" title="Giới thiệu">Album cưới</a>
                                    <ul>
                                         <li class=""><a href="" title="">Album Của Tôi</a></li>
                                         <li class=""><a href="" title="">Tất Cả Album</a></li>
                                        
                                    </ul>
                                </li>
                                <li class="haveSub "><a href="">Dịch vụ cưới</a><span></span>
                                    <ul>
                                         <li><a href='' title='Chụp hình Cưới'>Chụp hình Cưới</a></li>
                                         <li><a href='' title='Áo Cưới'>Áo Cưới</a></li>
                                         <li><a href='' title='Trang điểm cô dâu'>Trang điểm cô dâu</a></li>
                                         <li><a href='' title='Nhẫn Cưới'>Nhẫn Cưới</a></li>
                                         <li><a href='' title='Hoa Cưới'>Hoa Cưới</a></li> 
                                    </ul>
                                </li>
                                <li><a href="" title="Album ảnh">Địa điểm</a><span></span>

                                </li>
                                <li class="haveSub "><a href="" title="Bảng giá">Áo cưới</a><span></span>
                                    <ul>
                                        <li><a href='' title='Bảng giá'>Bảng giá</a></li> 
                                    </ul>
                                </li>
                                <li class=""><a href="" title="Địa điểm chụp hình cưới" class="place">Liên lạc</a></li>
                                
                                <li class=""><a href="" title="Tin tức">Hợp Đồng</a></li>
                                <li class=""><a href="" title="Khuyến mãi">Thông Tin Cá Nhân</a></li>
                                <li class=""><a href="<?php echo Url::base().'/index.php?r=site/logout' ?>" data-method = "post" class="place">Đăng Xuất</a></li>
                            </ul>
                        <?php } else if($session['type_user']== 0) { ?>
                            <ul id="menu">
                                <li class=""><a href="" title="Trang chủ">Trang chủ</a></li>
                                <li class="haveSub"><a href="" title="Giới thiệu">Album cưới</a>
                                    <ul>
                                         <li class=""><a href="" title="">Album Của Tôi</a></li>
                                         <li class=""><a href="" title="">Tất Cả Album</a></li>
                                        
                                    </ul>
                                </li>
                                <li class="haveSub "><a href="">Dịch vụ cưới</a><span></span>
                                    <ul>
                                         <li><a href='' title='Chụp hình Cưới'>Chụp hình Cưới</a></li>
                                         <li><a href='' title='Áo Cưới'>Áo Cưới</a></li>
                                         <li><a href='' title='Trang điểm cô dâu'>Trang điểm cô dâu</a></li>
                                         <li><a href='' title='Nhẫn Cưới'>Nhẫn Cưới</a></li>
                                         <li><a href='' title='Hoa Cưới'>Hoa Cưới</a></li> 
                                    </ul>
                                </li>
                                <li class="haveSub"><a href="" title="Album ảnh">Địa điểm</a><span></span>
                                    <ul>
                                         <li class=""><a href="" title="">Tất Cả Địa Điểm</a></li>
                                         <li class=""><a href="" title="">Thêm Mới</a></li>
                                        
                                    </ul>
                                </li>
                                <li class="haveSub "><a href="" title="">Áo cưới</a><span></span>
                                    <ul>
                                        <li class=""><a href="" title="">Tất Cả Áo Cưới</a></li>
                                         <li class=""><a href="" title="">Thêm Mới</a></li>
                                    </ul>
                                </li>
                                <li class=""><a href="" title="Địa điểm chụp hình cưới" class="place">Liên lạc</a></li>
                                
                                <li class=""><a href="" title="Tin tức">Hợp Đồng</a></li>
                                <li class=""><a href="<?php echo Url::base().'/index.php?r=user/view&&id='.$session['id_user'] ?>" title="Khuyến mãi">Thông Tin Cá Nhân</a></li>
                                <li class=""><a href="<?php echo Url::base().'/index.php?r=site/logout' ?>" data-method = "post" class="place">Đăng Xuất</a></li>
                            </ul>
                        <?php }
                        else { ?>
                            <ul id="menu">
                                
                                <li class="haveSub "><a href="<?php echo Url::base().'/index.php?r=user/task&&id_user='.$session['id_user']; ?>" title="">Nhiệm Vụ</a><span></span>
                                    <ul>
                                    <?php for($i=1;$i<=12;$i++){ ?>
                                        <li><a href="<?php echo Url::base().'/index.php?r=user/task&&id_user='.$session['id_user'].'&&month='.$i; ?>" title=""><?php echo 'Tháng '.$i ?></a><span></span></li>
                                    <?php } ?>
                                    </ul>
                                </li>
                                <li class=""><a href="<?php echo Url::base().'/index.php?r=user/view&&id='.$session['id_user']?>"  class="place">Thông Tin Cá Nhân</a></li>
                                <li class=""><a href="<?php echo Url::base().'/index.php?r=site/logout' ?>" data-method = "post" title="Địa điểm chụp hình cưới" class="place">Đăng Xuất</a></li>
                                
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
        
        
      
        
        
        
       

        <div class="container">
            <div class="content">
                <div id="colLeft">
                     <div class="leftBox">
                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                        <?= $content ?>
                         <div class="clr"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="footer">
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
            	<a href='' title='Chụp hình Cưới'>Chụp hình Cưới</a> <a href='http://vietkhanhphoto.com/ao-cuoi-sdv' title='Áo Cưới'>Áo Cưới</a> <a href='http://vietkhanhphoto.com/trang-diem-co-dau-sdv' title='Trang điểm cô dâu'>Trang điểm cô dâu</a> <a href='http://vietkhanhphoto.com/nhan-cuoi-sdv' title='Nhẫn Cưới'>Nhẫn Cưới</a> <a href='http://vietkhanhphoto.com/hoa-cuoi-sdv' title='Hoa Cưới'>Hoa Cưới</a>             </li>
            <li class="right">
            	<a href='' title='Địa điểm chụp hình cưới'>Địa điểm chụp hình cưới</a> <a href='http://vietkhanhphoto.com/ao-cuoi-dep-sab-c2' title='Áo cưới đẹp'>Áo cưới đẹp</a> <a href='http://vietkhanhphoto.com/lam-toc-co-dau-sab-c3' title='Làm tóc cô dâu'>Làm tóc cô dâu</a> <a href='http://vietkhanhphoto.com/chup-anh-chan-dung-sab-c5' title='Chụp ảnh chân dung'>Chụp ảnh chân dung</a> <a href='http://vietkhanhphoto.com/chup-anh-thoi-trang-sab-c5' title='Chụp ảnh thời trang'>Chụp ảnh thời trang</a>             </li>
        </ul>
        
        <div class="clr"></div>
    </div><!--end pagewrap-->
	<div class="clr"></div>
</div><!--end footer-->

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
