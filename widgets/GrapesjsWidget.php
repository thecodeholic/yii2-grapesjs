<?php
/**
 * User: TheCodeholic
 * Date: 8/31/2019
 * Time: 3:02 PM
 */

namespace thecodeholic\yii2grapesjs\widgets;


use thecodeholic\yii2grapesjs\assets\GrapesjsPresetWebpageAsset;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * Class GrapesjsWidget
 *
 * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package thecodeholic\yii2grapesjs\widgets
 */
class GrapesjsWidget extends Widget
{
    public $options = [];
    public $clientOptions = [];

    public function init()
    {
        parent::init();
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }

    public function run()
    {
        $this->registerPlugin();
        return Html::tag('div', '', $this->options);
    }

    protected function registerPlugin()
    {
        $view = $this->getView();
        GrapesjsPresetWebpageAsset::register($view);
        $id = $this->options['id'];

        if ($this->clientOptions !== false) {
            $clientOptions = Json::htmlEncode(array_merge_recursive ([
                'container' => "#$id",
                'fromElement' => true,
                'plugins' => ['gjs-preset-webpage'],
                'storageManager' => [
                    'params' => [Yii::$app->request->csrfParam => Yii::$app->request->csrfToken]
                ]
            ], $this->clientOptions));
            $js = "grapesjs.init($clientOptions);";
            $view->registerJs($js);
        }
    }
}
