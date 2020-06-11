<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LoginAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900',
        'themes/css/styles.min.css',
        'themes/css/bootstrap.min.css',
        'themes/css/bootstrap_limitless.min.css',
        'themes/css/layout.min.css',
        'themes/css/components.min.css',
        'themes/css/colors.min.css',
        'themes/css/cutom.css',
    ];
    public $js = [              
        /*    Core JS files    */
          
       'themes/js/main/jquery.min.js',
       'themes/js/main/bootstrap.bundle.min.js',
       'themes/js/main/blockui.min.js',
       'themes/js/main/app.js'

        /*    Core JS files    */
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
