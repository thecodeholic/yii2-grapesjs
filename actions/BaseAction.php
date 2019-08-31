<?php
/**
 * User: TheCodeholic
 * Date: 8/31/2019
 * Time: 5:59 PM
 */

namespace thecodeholic\yii2grapesjs\actions;


use thecodeholic\yii2grapesjs\models\Content;
use yii\base\Action;
use yii\web\NotFoundHttpException;

/**
 * Class BaseAction
 *
 * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package thecodeholic\yii2grapesjs\actions
 */
class BaseAction extends Action
{
    /**
     * Find \thecodeholic\yii2grapesjs\models\Content model by id
     *
     * @param $id
     * @return Content|null
     * @throws NotFoundHttpException
     * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
     */
    public function findModel($id)
    {
        if (($model = Content::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
