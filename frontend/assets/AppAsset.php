<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/style.css',
        'css/colors/green.css',
        'css/owl.carousel.css',
        'css/owl.transitions.css',
        'css/animate.min.css',
        'css/font-awesome.min.css',
        'css/my.css',
    ];
    public $js = [
        'js/html5shiv.js',
        'js/respond.min.js',
//        'js/jquery-1.10.2.min.js',
        'js/jquery-migrate-1.2.1.js',
//        'js/bootstrap.min.js',
        'js/gmap3.min.js',
        'js/bootstrap-hover-dropdown.min.js',
        'js/owl.carousel.min.js',
        'js/css_browser_selector.min.js',
        'js/echo.min.js',
        'js/jquery.easing-1.3.min.js',
        'js/bootstrap-slider.min.js',
        'js/jquery.raty.min.js',
        'js/jquery.prettyPhoto.min.js',
        'js/jquery.customSelect.min.js',
        'js/wow.min.js',
        'js/buttons.js',
        'js/scripts.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
