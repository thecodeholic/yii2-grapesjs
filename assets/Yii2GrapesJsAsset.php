<?php
/**
 * User: zura
 * Date: 06.09.19
 * Time: 16:53
 */

namespace thecodeholic\yii2grapesjs\assets;


use yii\web\AssetBundle;

/**
 * Class Yii2GrapesJsAsset
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package thecodeholic\yii2grapesjs\assets
 */
class Yii2GrapesJsAsset extends AssetBundle
{
    public $sourcePath = '@vendor/thecodeholic/yii2-grapesjs/asset';

    public $js = [
        'tc-device-manager.plugin.js'
    ];
}