<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
        'css/animate.css',
        'css/bootstrap.min.css',
        'css/bootstrap.min.css',
        'css/style.css',
        'font-awesome/css/font-awesome.css',
        'font-awesome/css/font-awesome.min.css',
        'css/plugins/toastr/toastr.min.css',

    ];
    public $js = [
        // 'js/bootstrap.js',
        // 'js/jquery-3.1.1.min.js',
        'js/bootstrap.min.js',
        'js/plugins/metisMenu/jquery.metisMenu.js',
        'js/plugins/slimscroll/jquery.slimscroll.min.js',
        'js/plugins/flot/jquery.flot.js',
        'js/plugins/flot/jquery.flot.tooltip.min.js',
        'js/plugins/flot/jquery.flot.spline.js',
        'js/plugins/flot/jquery.flot.pie.js',
        'js/plugins/peity/jquery.peity.min.js',
        'js/demo/peity-demo.js',
        'js/inspinia.js',
        'js/plugins/pace/pace.min.js',
        'js/plugins/jquery-ui/jquery-ui.min.js',
        'js/plugins/gritter/jquery.gritter.min.js',
        'js/plugins/gritter/jquery.gritter.css',
        'js/plugins/sparkline/jquery.sparkline.min.js',
        'js/demo/sparkline-demo.js',
        'js/plugins/chartJs/Chart.min.js',
        'js/plugins/toastr/toastr.min.js',
        'js/popper.min.js',
        'js/plugins/flot/jquery.flot.resize.js',

        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
