<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%content}}`.
 */
class m190831_101017_create_content_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%grapesjs_content}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(1024),
            'assets' => 'LONGTEXT',
            'components' => 'LONGTEXT',
            'css' => 'LONGTEXT',
            'html' => 'LONGTEXT',
            'styles' => 'LONGTEXT',
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%grapesjs_content}}');
    }
}
