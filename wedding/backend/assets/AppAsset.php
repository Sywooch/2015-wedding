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
       'css/site.css',		
//        'css/stylesheets/elements.css',	
//        'css/stylesheets/isotope.css',		
//        'css/stylesheets/premium.css',		
//        'css/stylesheets/theme.css',	
         'css/cssjquery.fancybox.css',
         'css/css/style218.css',
         'css/css/galleria.folio.css',
     ];		     

    public $js = [
        'js/main.js',
        'js/jquery.localisation-min.js',
        'js/ui.multiselect.js',
        'js/js/galleria.folio.min.js',
        'js/js/galleria-1.2.8.min.js',
//        'js/js/jquery-2.1.4.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
