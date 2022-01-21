<?php


namespace App\Repositories;


use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Interfaces\BookInterface;
use App\Models\Book;
use App\Traits\ApiResponder;
use Illuminate\Http\Response;
use Exception;

class BookRepository implements BookInterface
{
    Use ApiResponder;

    public function getAllBooks()
    {
        return $this->success(BookResource::collection(Book::all()));
    }

    public function getBookById($id)
    {
        $book = Book::query()->find( $id);
        if(!$book)
            return $this->error('Not found', Response::HTTP_NOT_FOUND);

        return $this->success(new BookResource($book));
    }

    public function storeBook(BookRequest $request)
    {
        //Validation
        $data = $request->validated();

        //Save to Database
        $book = Book::create($data);

        //Return Response
        return $this->success(new BookResource($book), 'Book successfully saved.');
    }

    public function deleteBook($id)
    {
        //Get book
        $book = Book::query()->find($id);

        //Check if Exists
        if(!$book)
            return $this->error('Not found', Response::HTTP_NOT_FOUND);

        //Delete
        try {
            $book->delete();
        } catch (Exception $e) {
            return $this->error($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        //Return Response
        return $this->success(null, 'Book successfully deleted.', Response::HTTP_OK);
    }
}
