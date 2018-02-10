<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "genre".
 *
 * @property int $genre_id
 * @property string $title
 */
class Genre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'genre';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function getBook()
    {
        return $this->hasMany(Book::className(), ['genre_id' => 'genre_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'genre_id' => 'ID жанра',
            'title' => 'Название',
        ];
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }


}
