<?php
/**
 * User: TheCodeholic
 * Date: 8/31/2019
 * Time: 3:02 PM
 */

namespace thecodeholic\yii2grapesjs\widgets;


use thecodeholic\yii2grapesjs\assets\GrapesjsPresetWebpageAsset;
use thecodeholic\yii2grapesjs\assets\Yii2GrapesJsAsset;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * Class GrapesjsWidget
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package thecodeholic\yii2grapesjs\widgets
 */
class GrapesjsWidget extends Widget
{
    public $options = [];
    public $clientOptions = [];

    /**
     * Custom placeholder variables, which will be added inside richtext editor
     *
     * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
     * @var array
     */
    public $variables = [];

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
        Yii2GrapesJsAsset::register($view);
        $id = $this->options['id'];

        if ($this->clientOptions !== false) {
            $clientOptions = Json::htmlEncode(array_merge_recursive([
                'container' => "#$id",
                'fromElement' => true,
                'plugins' => ['gjs-preset-webpage', 'tc-device-manager'],
                'storageManager' => [
                    'params' => [Yii::$app->request->csrfParam => Yii::$app->request->csrfToken]
                ],
                'assetManager' => [
                    'params' => [Yii::$app->request->csrfParam => Yii::$app->request->csrfToken]
                ]
            ], $this->clientOptions));

            $js = "var editor = grapesjs.init($clientOptions);";
            if ($this->variables) {
                $icon = Html::dropDownList('', '', array_merge([
                    '' => '--Select--'
                ], $this->variables), ['class' => 'gjs-field']);
                $js .= "editor.RichTextEditor.add('custom-vars', {
                      icon: `$icon`,
                        // Bind the 'result' on 'change' listener
                      event: 'change',
                      result: (rte, action) => rte.insertHTML(action.btn.firstChild.value),
                      // Reset the select on change
                      update: (rte, action) => { action.btn.firstChild.value = \"\";}
                })";
            }
            $view->registerJs("(function(){
                $js
            })();");
        }
    }
}
