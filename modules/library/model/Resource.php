<?php
/**
 * Created by PhpStorm.
 * User: Igor Naydyonnyy
 * Date: 27.01.20
 * Time: 15:36
 */

namespace app\modules\library\model;


use app\interfaces\ILibraryResource;
use yii\data\ActiveDataProvider;

class Resource implements ILibraryResource
{
    /**
     * load book and author data
     * @return array
     */
    public function loadAllBooks():array
    {
       return Book::find()->with('authors')->asArray()->all();
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function getBook(int $id):array
    {
        return Book::find()->where('id = :id', [':id' => $id])->asArray()->one();
    }

    /**
     * @param int $id
     *
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function deleteBook(int $id):bool
    {
        $book = Book::findOne(['id' => $id]);

        if ($book && $book->delete()) {
            return true;
        }

        return false;
    }

    /**
     * Update book
     * @param int $id
     * @param array $data
     *
     * @return bool
     */
    public function updateBook(int $id, array $data)
    {
        $book = Book::findOne(['id' => $id]);
        $book->setAttributes($data);

        if ($book && $book->save()) {
            return true;
        }

        return false;
    }

    /**
     * @return \yii\data\ActiveDataProvider
     */
    public function loadBooks():ActiveDataProvider
    {
        $model =  Book::find()->with('authors');
        return new ActiveDataProvider(['query' => $model, 'pagination' => ['pageSize' => 20]]);
    }

    /**
     * @param int $id
     *
     * @return \app\modules\library\model\Book|null
     */
    public function getBookModel(int $id):?Book
    {
        return Book::findOne(['id' => $id]);
    }
}