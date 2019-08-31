<?php
/**
 * User: TheCodeholic
 * Date: 8/31/2019
 * Time: 3:02 PM
 */

namespace thecodeholic\yii2grapesjs\widgets;


use thecodeholic\yii2grapesjs\assets\GrapesjsPresetWebpageAsset;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

/**
 * Class GrapesjsInputWidget
 *
 * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package thecodeholic\yii2grapesjs\widgets
 */
class GrapesjsInputWidget extends InputWidget
{
    public $clientOptions = [];

    public function run()
    {
        if ($this->hasModel()) {
            $value = Html::getAttributeValue($this->model, $this->attribute);
        } else {
            $value = $this->value;
        }
        $this->registerPlugin();
        return Html::tag('div', $value, $this->options);
    }

    protected function registerPlugin()
    {
        GrapesjsPresetWebpageAsset::register($this->getView());

        $clientOptions = Json::encode(array_merge([
            'container' => "#{$this->options['id']}",
            'fromElement' => true,
            'plugins' => ['gjs-preset-webpage'],
        ], $this->clientOptions));
        $this->getView()->registerJs("
            var editor = grapesjs.init($clientOptions);
            editor.on('change:changesCount', () => {
                console.log('UPDATED');
            })
        ");
    }
}
