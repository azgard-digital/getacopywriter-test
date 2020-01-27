<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%author}}`.
 */
class m200127_111725_create_author_table extends Migration
{
    const TABLE = 'author';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE);
    }
}
