<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $book_id
 * @property int $genre_id
 * @property string $title
 * @property int $year
 * @property string $picture
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['genre_id', 'year'], 'integer'],
            [['title', 'picture'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'book_id' => 'Book ID',
            'genre_id' => 'Genre ID',
            'title' => 'Title',
            'year' => 'Year',
            'picture' => 'Picture',
        ];
    }
}
