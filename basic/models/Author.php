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
 * @property string $_fio // on-the-fly generated property
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

    /**
     * @param string $name
     * @return mixed
     * @throws \yii\base\UnknownPropertyException
     */
    public function __get($name)
    {
        if ($name == '_fio') {
            $first_name_symbol = mb_substr($this->first_name,0,1);
            $first_name_symbol .= (!empty($first_name_symbol) ? '.' : '');
            $patronomic_symbol = mb_substr($this->patronomic, 0, 1);
            $patronomic_symbol .= (!empty($patronomic_symbol) ? '.' : '');
            return $this->last_name . ' ' . $first_name_symbol . $patronomic_symbol;
        }

        return parent::__get($name);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->_fio;
    }

}
