<?php


namespace App\Interfaces;


use App\Http\Requests\BookRequest;

interface BookInterface
{

    public function getAllBooks();

    public function getBookById($id);

    public function storeBook(BookRequest $request);

    public function deleteBook($id);

}
