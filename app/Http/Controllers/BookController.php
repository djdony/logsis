<?php

namespace App\Http\Controllers;

use App\Book;

class BookController extends BaseController
{

    public function index()
    {
        $books = Book::with('authors')->get();

        return $this->sendResponse($books->toArray(), 'Books retrieved successfully');
    }

    public function noAuthor()
    {
        $books = Book::doesntHave('authors')->get()
            ->map(function ($book) {
                return collect($book)->only([
                    'id',
                    'name',
                ]);
            });

        return $this->sendResponse($books->toArray(), 'Books retrieved successfully');
    }

}
