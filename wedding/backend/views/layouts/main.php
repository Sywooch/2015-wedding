<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
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
        <a href="index.html" class="logo" title="Việt Khanh Bridal"><img src="images/logo.png" width="478" alt="Việt Khanh Bridal"></a>
        <div id="menuMain">
            <ul id="menu">
                <li class=""><a href="index.html" title="Trang chủ">Trang chủ</a></li>
                <li class=""><a href="gioi-thieu.html" title="Giới thiệu">Giới thiệu</a></li>
                <li class="haveSub "><a href="dich-vu-cuoi.html">Dịch vụ cưới</a><span></span>
                    <ul>
						<li><a href='chup-hinh-cuoi-sdv.html' title='Chụp hình Cưới'>Chụp hình Cưới</a></li><li><a href='ao-cuoi-sdv.html' title='Áo Cưới'>Áo Cưới</a></li><li><a href='trang-diem-co-dau-sdv.html' title='Trang điểm cô dâu'>Trang điểm cô dâu</a></li><li><a href='nhan-cuoi-sdv.html' title='Nhẫn Cưới'>Nhẫn Cưới</a></li><li><a href='hoa-cuoi-sdv.html' title='Hoa Cưới'>Hoa Cưới</a></li> 
                    </ul>
                </li>
                <li class="haveSub current"><a href="album-anh.html" title="Album ảnh">Album ảnh</a><span></span>
                    <ul>
                        <li><a href='album-cuoi-sab.html' title='Album Cưới'>Album Cưới</a></li><li><a href='ao-cuoi-sab.html' title='Áo Cưới'>Áo Cưới</a></li><li><a href='trang-diem-sab.html' title='Trang Điểm'>Trang Điểm</a></li><li><a href='thoi-trang-sab.html' title='Thời Trang'>Thời Trang</a></li><li><a href='gia-dinh-sab.html' title='Gia Đình'>Gia Đình</a></li><li><a href='quang-cao-sab.html' title='Quảng Cáo'>Quảng Cáo</a></li>                    </ul>
                </li>
                <li class="haveSub "><a href="bang-gia.html" title="Bảng giá">Bảng giá</a><span></span>
                    <ul>
                        <li><a href='bang-gia-sbg.html' title='Bảng giá'>Bảng giá</a></li> 
                    </ul>
                </li>
                <li class=""><a href="dia-diem-chup-hinh-cuoi.html" title="Địa điểm chụp hình cưới" class="place">Địa điểm chụp hình cưới</a></li>
                <li class=""><a href="tin-tuc-cuoi.html" title="Tin tức">Tin tức</a></li>
                <li class=""><a href="khuyen-mai.html" title="Khuyến mãi">Khuyến mãi</a><label>HOT</label></li>
            </ul>
            <div class="clr"></div>
            <div id="menuHide">
                <div id="menuMobile">
                	<a href="index.html" class="homeButton" title="Trang chủ">Trang chủ</a>
                    <h1>MENU</h1>
                    <ul>
                        <li><a href="gioi-thieu.html" title="Giới thiệu">Giới thiệu</a></li>
		                <h2>Dịch vụ cưới</h2>
                        <ul>
                            <li><a href='chup-hinh-cuoi-sdv.html' title='Chụp hình Cưới'>Chụp hình Cưới</a></li><li><a href='ao-cuoi-sdv.html' title='Áo Cưới'>Áo Cưới</a></li><li><a href='trang-diem-co-dau-sdv.html' title='Trang điểm cô dâu'>Trang điểm cô dâu</a></li><li><a href='nhan-cuoi-sdv.html' title='Nhẫn Cưới'>Nhẫn Cưới</a></li><li><a href='hoa-cuoi-sdv.html' title='Hoa Cưới'>Hoa Cưới</a></li>                        </ul>
		                <h2>Album ảnh</h2>
                        <ul>
                           <li><a href='album-cuoi-sab.html' title='Album Cưới'>Album Cưới</a></li><li><a href='ao-cuoi-sab.html' title='Áo Cưới'>Áo Cưới</a></li><li><a href='trang-diem-sab.html' title='Trang Điểm'>Trang Điểm</a></li><li><a href='thoi-trang-sab.html' title='Thời Trang'>Thời Trang</a></li><li><a href='gia-dinh-sab.html' title='Gia Đình'>Gia Đình</a></li><li><a href='quang-cao-sab.html' title='Quảng Cáo'>Quảng Cáo</a></li>                        </ul>
		                <h2>Bảng giá</h2>
                        <ul>
                            <li><a href='bang-gia-sbg.html' title='Bảng giá'>Bảng giá</a></li>                        </ul>
		                <li><a href="dia-diem-chup-hinh-cuoi.html" title="Địa điểm Chụp hình cưới" class="place">Địa điểm Chụp hình cưới</a></li>
		                <li><a href="tin-tuc-cuoi.html" title="Tin tức">Tin tức</a></li>
		                <li><a href="khuyen-mai.html" title="Khuyến mãi">Khuyến mãi</a></li>
                        <li><a href="video.html" title="Video">Video</a></li>
                        <li><a href="#bubble" title="Album khách hàng">Album khách hàng</a></li>
                        <li><a href="site-map.html" title="Sitemap">Sitemap</a></li>
                        <li><a href="lien-he.html" title="Liên hệ<">Liên hệ</a></li>
                    </ul>
                </div><!--menu menuMobile-->
		        <div class="clr"></div>
		    </div><!--menu menuHide-->
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
</div>
        
        
        
       

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
             <div class="clr"></div>
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
