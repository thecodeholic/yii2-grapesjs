<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%css_column_on_content}}`.
 */
class m190831_113159_drop_css_column_on_content_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%content}}', 'css');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%content}}',  'css', 'LONGTEXT AFTER html');
    }
}
