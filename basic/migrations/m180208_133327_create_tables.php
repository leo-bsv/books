<?php

use yii\db\Migration;

/**
 * Class m180208_133327_create_tables
 */
class m180208_133327_create_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('genre', [
            'genre_id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ]);

        $this->createTable('author', [
            'author_id' => $this->primaryKey(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'patronomic' => $this->string()->notNull(),
        ]);

        $this->createTable('book', [
            'book_id' => $this->primaryKey(),
            'genre_id' => $this->integer(),
            'title' => $this->string(),
            'year' => $this->integer(),
            'picture' => $this->string()
        ]);

        $this->createTable('book_author', [
            'book_id' => $this->integer(),
            'author_id' => $this->integer(),
            'PRIMARY KEY(book_id, author_id)',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('genre');
        $this->dropTable('author');
        $this->dropTable('book');
        $this->dropTable('book_author');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180208_133327_create_tables cannot be reverted.\n";

        return false;
    }
    */
}
