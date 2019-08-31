<?php
/**
 * User: TheCodeholic
 * Date: 8/31/2019
 * Time: 7:42 PM
 */

namespace thecodeholic\yii2grapesjs;


use yii\web\JsonParser;

/**
 * Class Module
 *
 * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package thecodeholic\yii2grapesjs
 */
class Module extends \yii\base\Module
{
    public function init()
    {
        \Yii::$app->request->parsers['application/json'] = JsonParser::class;
        parent::init();
    }
}
