<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m200127_111327_create_book_table extends Migration
{
    const TABLE = 'book';

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
