<?php
/**
 * User: TheCodeholic
 * Date: 8/31/2019
 * Time: 1:58 PM
 */

namespace thecodeholic\yii2grapesjs\assets;


use yii\web\AssetBundle;

/**
 * Class GrapesjsAsset
 *
 * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package thecodeholic\yii2grapesjs\assets
 */
class GrapesjsAsset extends AssetBundle
{
    public $sourcePath = '@vendor/thecodeholic/yii2-grapesjs/asset/grapesjs';

    public $css = [
        'css/grapes.min.css'
    ];

    public $js = [
        'grapes.min.js'
    ];
}
