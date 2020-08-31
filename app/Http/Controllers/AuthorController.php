<?php

namespace App\Http\Controllers;

use App\Author;

class AuthorController extends BaseController
{

    public function index()
    {
        $authors = Author::with('books')->get()
            ->map(function ($author) {
            return collect($author)->only([
                'id',
                'full_name',
                'books',
            ]);
        });

        return $this->sendResponse($authors->toArray(), 'Authors retrieved successfully');
    }

}
