<?php

namespace App\Http\Controllers\V1;

use App\Filters\ByTitle;
use App\Filters\IncludeAuthor;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Pipeline;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $result = Pipeline::send(Book::query())
            ->through(
                [
                    ByTitle::class,
                    IncludeAuthor::class . ':author',
                ]
            )
            ->thenReturn();

        return new BookCollection($result->paginate()->appends(request()->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book = Pipeline::send($book->query()->whereId($book->id))
            ->through([IncludeAuthor::class . ':author'])
            ->thenReturn();

        return new BookResource($book->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
