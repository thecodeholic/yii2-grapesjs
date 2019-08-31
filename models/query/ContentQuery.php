<?php

namespace thecodeholic\yii2grapesjs\models\query;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\thecodeholic\yii2grapesjs\models\Content]].
 *
 * @see \thecodeholic\yii2grapesjs\models\Content
 */
class ContentQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \thecodeholic\yii2grapesjs\models\Content[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \thecodeholic\yii2grapesjs\models\Content|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
