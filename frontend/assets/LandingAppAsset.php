<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class LandingAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/custom.css',
        'css/landing_page/style.css',
        'css/landing_page/jquery-ui.css'
    ];
    public $js = [
        'js/jsLib.js',
        'js/ajax-modal-popup.js',
        'js/landing_page/owl.carousel.min.js',        
        'js/landing_page/jquery.waypoints.min.js',
        'js/landing_page/jquery.slicknav.min.js',
        'js/landing_page/jquery-ui.js',
        'js/landing_page/counterup.js',
        'js/landing_page/theme.js'


         
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
