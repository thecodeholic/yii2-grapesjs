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
    /**
     * Custom placeholder variables, which will be added inside richtext editor
     *
     * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
     * @var array
     */
    public $grapesJsVariables = [];

    public function init()
    {
        \Yii::$app->request->parsers['application/json'] = JsonParser::class;
        parent::init();
    }
}
