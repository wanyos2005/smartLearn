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
class AppAsset extends AssetBundle {

    public $sourcePath = '@bower/';
    public $css = [
        'admin-lte/css/AdminLTE.css',
        'admin-lte/css/custom.css',
        'admin-lte/css/font-awesome.css',
        'admin-lte/css/font-awesome.min.css'
    ];
    public $js = ['admin-lte/js/AdminLTE/app.js'];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}
