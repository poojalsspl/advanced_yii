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

        'css/site.css',

        'css/icofont.min.css',

        'css/custom.css',
        'css/bootstrap-toggle.min.css'



    ];

    public $js = [

        'js/jsLib.js',
        'js/bootstrap-toggle.min.js',
        'js/ajax-modal-popup.js',
        'js/ckeditor/ckeditor.js'


    ];

    public $depends = [

        'yii\web\YiiAsset',

        'yii\bootstrap\BootstrapAsset',

    ];

}

