<?php

namespace app\modules\library\model;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $name
 *
 * @property BookAuthor[] $bookAuthors
 */
class Book extends \yii\db\ActiveRecord implements \JsonSerializable
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }

    /**
     * Gets query for [[BookAuthors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookAuthors()
    {
        return $this->hasMany(BookAuthor::class, ['book_id' => 'id']);
    }

    public function getAuthors()
    {
        return $this->hasMany(Author::class, ['id' => 'author_id'])
            ->viaTable(BookAuthor::tableName(), ['book_id' => 'id']);
    }
}
