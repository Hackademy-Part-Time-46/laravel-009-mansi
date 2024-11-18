<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function salva(StoreBookRequest $request)
    {
        Book::create($request->all());
        return to_route('books.index');
    }

    public function show(Book $book)
    {
        return view('books.show', ['book' => $book]);
    }
}
