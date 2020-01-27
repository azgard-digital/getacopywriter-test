<?php
namespace app\interfaces;

use app\modules\library\model\Book;
use yii\data\ActiveDataProvider;

interface ILibraryResource
{
    /**
     * Update book
     * @param int $id
     * @param array $data
     *
     * @return bool
     */
    public function updateBook(int $id, array $data);

    /**
     * @param int $id
     *
     * @return bool
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function deleteBook(int $id):bool;

    /**
     * @param int $id
     *
     * @return array
     */
    public function getBook(int $id):array;

    /**
     * load book and author data
     * @return array
     */
    public function loadAllBooks():array;

    /**
     * @return \yii\data\ActiveDataProvider
     */
    public function loadBooks():ActiveDataProvider;

    /**
     * @param int $id
     *
     * @return \app\modules\library\model\Book|null
     */
    public function getBookModel(int $id):?Book;
}