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
        return $model->toArray();
    }
}
