<?php

namespace thecodeholic\yii2grapesjs\models;

use thecodeholic\yii2grapesjs\models\query\ContentQuery;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%content}}".
 *
 * @property int $id
 * @property string $title
 * @property string $assets
 * @property string $components
 * @property string $html
 * @property string $css
 * @property string $styles
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
        return '{{%grapesjs_content}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['assets', 'components', 'css', 'html', 'styles'], 'string'],
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
            'assets' => 'Assets',
            'components' => 'Components',
            'css' => 'CSS',
            'html' => 'Html',
            'styles' => 'Styles',
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
