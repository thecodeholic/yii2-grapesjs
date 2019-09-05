<?php
/**
 * User: TheCodeholic
 * Date: 8/31/2019
 * Time: 5:45 PM
 */

namespace thecodeholic\yii2grapesjs\actions;

use Yii;
use yii\web\Response;

/**
 * Class GetAction
 *
 * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package thecodeholic\yii2grapesjs\actions
 */
class GetAction extends BaseAction
{
    /**
     * The fields to be included in returned array
     * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
     * @var array
     */
    public $includeFields = false;

    /**
     * The fields to be excluded from the returned array
     * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
     * @var array
     */
    public $excludeFields = false;

    /**
     * @inheritDoc
     * @param integer $id
     * @return array|mixed
     * @throws \yii\web\NotFoundHttpException
     * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
     */
    public function run($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = $this->findModel($id);
        $fields = $model->fields();
        if ($this->includeFields !== false) {
            $fields = $this->includeFields;
        } elseif ($this->excludeFields !== false) {
            $fields = array_diff($fields, $this->excludeFields);
        }
        return $model->toArray($fields);
    }
}
