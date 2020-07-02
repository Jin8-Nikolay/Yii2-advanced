<?php

namespace backend\assets;

use yii\web\AssetBundle;


class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/theme-default/bootstrap.css?1422792965',
        'css/theme-default/materialadmin.css?1425466319',
        'css/theme-default/font-awesome.min.css?1422529194',
        'css/theme-default/material-design-iconic-font.min.css?1421434286',
        'css/theme-default/libs/rickshaw/rickshaw.css?1422792967',
        'css/theme-default/libs/morris/morris.core.css?1420463396',
        'css/site.css',
        'css/menu.css',
    ];
    public $js = [
        'js/jquery.domenu-0.0.1.js',
        'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js',
        'https://buttons.github.io/buttons.js',
        'js/menu.js',
        'js/libs/utils/html5shiv.js?1403934957',
        'js/libs/utils/respond.min.js?1403934956',
//        'js/libs/jquery/jquery-1.11.2.min.js',
//        'js/libs/jquery/jquery-migrate-1.2.1.min.js',
        'js/libs/bootstrap/bootstrap.min.js',
        'js/libs/spin.js/spin.min.js',
        'js/libs/autosize/jquery.autosize.min.js',
        'js/libs/moment/moment.min.js',
        'js/libs/flot/jquery.flot.min.js',
        'js/libs/flot/jquery.flot.time.min.js',
        'js/libs/flot/jquery.flot.resize.min.js',
        'js/libs/flot/jquery.flot.orderBars.js',
        'js/libs/flot/jquery.flot.pie.js',
        'js/libs/flot/curvedLines.js',
        'js/libs/jquery-knob/jquery.knob.min.js',
        'js/libs/sparkline/jquery.sparkline.min.js',
        'js/libs/nanoscroller/jquery.nanoscroller.min.js',
        'js/libs/d3/d3.min.js',
        'js/libs/d3/d3.v3.js',
        'js/libs/rickshaw/rickshaw.min.js',
        'js/core/source/App.js',
        'js/core/source/AppNavigation.js',
        'js/core/source/AppOffcanvas.js',
        'js/core/source/AppCard.js',
        'js/core/source/AppForm.js',
        'js/core/source/AppNavSearch.js',
        'js/core/source/AppVendor.js',
        'js/core/demo/Demo.js',
        'js/core/demo/DemoDashboard.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
