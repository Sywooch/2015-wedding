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
     //  'css/site.css',		
//        'css/stylesheets/elements.css',	
//        'css/stylesheets/isotope.css',		
//        'css/stylesheets/premium.css',		
//        'css/stylesheets/theme.css',	
         'css/css/jquery.fancybox.css',
         'css/css/style218.css',
//         'css/css/galleria.folio.css',
         
     ];		     


    public $js = [
        'js/main.js',
        'js/jquery.localisation-min.js',
        'js/ui.multiselect.js',
        'js/plot/plot.js',
        'js/jshover/jquery.tooltipster.js',
        'js/jshover/jquery.tooltipster.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
      
    ];
    
    public $position=1;
    
}
