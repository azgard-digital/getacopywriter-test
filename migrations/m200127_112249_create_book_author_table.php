<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book_author}}`.
 */
class m200127_112249_create_book_author_table extends Migration
{
    const TABLE = 'book_author';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE, [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('FK_Author_AuthorId', self::TABLE, 'author_id', 'author', 'id', 'CASCADE');
        $this->addForeignKey('FK_Book_BookId', self::TABLE, 'book_id', 'book', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE);
    }
}
