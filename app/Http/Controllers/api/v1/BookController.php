<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;

class BookController extends Controller
{
    Use ApiResponder;

    public function index()
    {
        return $this->success(BookResource::collection(Book::all()));
    }

    public function store(BookRequest $request)
    {
        //Validation
        $data = $request->validated();

        //Save to Database
        $book = Book::create($data);

        //Return Response
        return $this->success($book, 'Book successfully saved.');
    }

    public function show($id)
    {
        return $this->success(new BookResource(Book::findorfail($id)));
    }
}
