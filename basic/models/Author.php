<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property int $author_id
 * @property string $last_name
 * @property string $first_name
 * @property string $patronomic
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['last_name', 'first_name'], 'required'],
            [['last_name', 'first_name', 'patronomic'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'author_id' => 'ID автора',
            'last_name' => 'Фамилия',
            'first_name' => 'Имя',
            'patronomic' => 'Отчество',
        ];
    }
}
