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
        'css/bootstrap-responsive.css',
        'css/style.css',
        'css/color/default.css',
        'css/site.css',
    ];
    public $js = [
        'js/jquery.js',
        'js/jquery.scrollTo.js',
        'js/jquery.nav.js',
        'js/jquery.localscroll-1.2.7-min.js',
        'js/bootstrap.js',
        'js/jquery.prettyPhoto.js',
        'js/isotope.js',
        'js/jquery.flexslider.js',
        'js/inview.js',
        'js/animate.js',
        'js/validate.js',
        'js/custom.js',
        'js/site.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
