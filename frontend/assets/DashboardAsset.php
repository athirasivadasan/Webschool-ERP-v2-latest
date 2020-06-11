<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DashboardAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
   	    'css/site.css',
        'https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900',
        'themes/css/styles.min.css',
        'themes/css/bootstrap.min.css',
        'themes/css/bootstrap_limitless.min.css',
        'themes/css/layout.min.css',
        'themes/css/components.min.css',
        'themes/css/colors.min.css',
        'themes/css/cutom.css',
        'themes/css/bootstrap-datepicker.min.css',
        'themes/css/bootstrap-datetimepicker.css',
        
    ];
    public $js = [
        /*    Core JS files    */
          
    //    'themes/js/main/jquery.min.js',
    //    'themes/js/bootstrap.min.js',        
       'themes/js/main/bootstrap.bundle.min.js',
       'themes/js/main/blockui.min.js',
       'themes/js/main/app.js',
       'themes/js/bootstrap-datepicker.js',
       'themes/js/bootstrap-datetimepicker.js',

        /*    Core JS files    */
       'themes/js/timezone/moment.min.js',
       'themes/js/timezone/moment-timezone-with-data.js',
       'themes/js/timezone/bootstrap-select.min.js',
       'themes/js/country.js',

       'themes/js/custom.js',
       


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}

