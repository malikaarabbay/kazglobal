<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

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
//        'css/bootstrap.min.css',
        'css/normalize.css',
        'css/style.css',
        'css/slide.css',
//        'css/slide.css',
    ];
    public $js = [
        'http://code.jquery.com/jquery-2.1.4.js',
        'js/jquery-ui.js',
        'js/i18n/jquery.ui.datepicker-ru.js',
        'js/jquery.datepicker.extension.range.min.js',
        'js/app.js',
        'js/custom-file-input.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
