<?php
/**
 * User: TheCodeholic
 * Date: 8/31/2019
 * Time: 1:58 PM
 */

namespace thecodeholic\yii2grapesjs\assets;


use yii\web\AssetBundle;

/**
 * Class GrapesjsPresetWebpageAsset
 *
 * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package thecodeholic\yii2grapesjs\assets
 */
class GrapesjsPresetWebpageAsset extends AssetBundle
{
    public $sourcePath = '@vendor/thecodeholic/yii2-grapesjs/asset/grapesjs-preset-webpage';

    public $css = [
        'grapesjs-preset-webpage.min.css'
    ];

    public $js = [
        'grapesjs-preset-webpage.min.js'
    ];

    public $depends = [
        GrapesjsAsset::class
    ];
}
