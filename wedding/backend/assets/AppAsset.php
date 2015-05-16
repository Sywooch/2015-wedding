<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
        
     public $css = [		    
       //'css/site.css',		
//        'css/stylesheets/elements.css',	
//        'css/stylesheets/isotope.css',		
//        'css/stylesheets/premium.css',		
//        'css/stylesheets/theme.css',	
         'css/cssjquery.fancybox.css',
        'css/css/style218.css',
     ];		     
//     public $js = [		     
//         'js/main.js',
//         ];
//    public $css = [
//        'css/site.css',
////        'css/stylesheets/elements.css',
////        'css/stylesheets/isotope.css',
////        'css/stylesheets/premium.css',
////        'css/stylesheets/theme.css',
//        'css/cssjquery.fancybox.css',
//        'css/css/style218.css',
//    ];
    public $js = [
        'js/main.js',
        'js/jquery.localisation-min.js',
        'js/ui.multiselect.js',
        'js/js/addthis_widget.js',
        'js/js/camera.min.js',
        'js/js/galleria.folio.min.js',
        'js/js/galleria-1.2.8.min.js',
       'js/js/jquery.carouFredSel-6.2.0-packed.js',
        'js/js/jquery.easing.1.3.js',
        'js/js/jquery.idTabs.min.js',
        'js/js/jquery.infinitescroll.min.js',
        'js/js/jquery.masonry.min.js',
        'js/js/jquery.touchSwipe.min.js',
//        'js/js/jquery-1.8.3.min.js',
        'js/js/pinit.js',
//        'js/js/script218.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
