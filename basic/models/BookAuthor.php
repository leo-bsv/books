<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book_author".
 *
 * @property int $book_id
 * @property int $author_id
 */
class BookAuthor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book_author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [];
    }

}
