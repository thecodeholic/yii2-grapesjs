<?php

namespace thecodeholic\yii2grapesjs\models;

use thecodeholic\yii2grapesjs\models\query\ContentQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%content}}".
 *
 * @property int $id
 * @property string $title
 * @property string $html
 * @property int $created_at
 * @property int $updated_at
 */
class Content extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%content}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['html'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'html' => 'Html',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ContentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContentQuery(get_called_class());
    }
}
