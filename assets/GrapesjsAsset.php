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
    public $sourcePath = '@vendor/npm-asset/grapesjs';

    public $css = [
        'dist/css/grapes.min.css'
    ];

    public $js = [
        'dist/grapes.min.js'
    ];
}
