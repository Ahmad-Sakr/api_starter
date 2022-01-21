<?php

namespace App\Http\Controllers\api\v1;


use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Interfaces\BookInterface;

class BookController extends Controller
{
    protected $bookInterface;

    public function __construct(BookInterface $bookInterface)
    {
        $this->bookInterface = $bookInterface;
    }

    public function index()
    {
        return $this->bookInterface->getAllBooks();
    }

    public function store(BookRequest $request)
    {
        return $this->bookInterface->storeBook($request);
    }

    public function show($id)
    {
        return $this->bookInterface->getBookById($id);
    }

    public function destroy($id)
    {
        return $this->bookInterface->deleteBook($id);
    }
}
