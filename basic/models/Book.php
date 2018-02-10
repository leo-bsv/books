<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "book".
 *
 * @property int $book_id
 * @property int $genre_id
 * @property string $title
 * @property int $year
 * @property string $picture
 * @property array $_authors
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @var image_file
     */
    public $image_file;

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
            [['title'], 'string', 'max' => 255],
            [['image_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function getGenre()
    {
        return $this->hasOne(Genre::className(), ['genre_id' => 'genre_id']);
    }

    /**
     * @inheritdoc
     */
    public function getAuthors()
    {
        return $this->hasMany(Author::className(), ['author_id' => 'author_id'])
            ->viaTable('book_author', ['book_id' => 'book_id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'book_id' => 'ID книги',
            'picture' => 'Изображение',
            'genre_id' => 'ID жанра',
            'title' => 'Название',
            'year' => 'Год',
            'genre' => 'Жанр',
            'authors' => 'Авторы',
            'image_file' => 'Изображение',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->image_file->saveAs('uploads/' . $this->image_file->baseName . '.' . $this->image_file->extension);
            $this->picture = $this->image_file->baseName . '.' . $this->image_file->extension;
            return true;
        } else {
            return false;
        }
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        $this->image_file = UploadedFile::getInstance($this, 'image_file');
        if (!empty($this->image_file)) $this->upload();
        return true;
    }
}
