<?php
/**
 * User: TheCodeholic
 * Date: 8/31/2019
 * Time: 5:45 PM
 */

namespace thecodeholic\yii2grapesjs\actions;

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
     * @param array $params
     * @return array|mixed
     * @throws \yii\web\NotFoundHttpException
     * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
     */
    public function runWithParams($params)
    {
        $id = $params['id'];
        $model = $this->findModel($id);
        return $model->toArray();
    }
}
