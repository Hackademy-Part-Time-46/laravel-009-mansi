<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        // $books = Book::where('years', '>=', 2020)
        //     ->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(StoreBookRequest $request)
    {

        // //Fino a Versione Laravel v11.22.0
        // $path_image = '';
        // if ($request->hasFile('image')) {
        //     //Salva con il suo nome originale il file
        //     $name_image = $request->file('image')->getClientOriginalName();
        //     $path_image = $request->file('image')->storeAs('/images', $name_image);
        //     //Oppure Salva con nome generato random
        //     $path_image = $request->file('image')->store();
        // }



        //Da Versione Laravel v11.23.0 https://github.com/laravel/framework/releases/tag/v11.23.0
        $path_image = '';
        if ($request->hasFile('image')) {
            //Salva con il suo nome originale il file
            $name_image = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storePubliclyAs('/images', $name_image);
            //Oppure Salva con nome generato random
            //$path_image = $request->file('image')->storePublicly();
        }








        //1) prendere il file
        //2) verificare che esista 
        //3) Salvare nel server la copia dell'immagine
        //4) Salvare nel database il percorso dell'immagine

        //Book::create($request->all());
        $path_image = '';
        if ($request->hasFile('image')) {
            //Salvo il nome e lo memorizzo nel db
            $name_image = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storePubliclyAs('public/images', $name_image);

            //Oppure Salva con nome generato random
            //$path_image = $request->file('image')->storePublicly(); 
        }

        $book = Book::create([
            "name" => $request->name,
            "pages" => $request->input('pages'),
            "years" => $request->years,
            "alt_image" => $request->alt_image,
            'image' => $path_image
        ]);
        return to_route('books.index');
    }

    public function show(Book $book)
    {

        return view('books.show', ['book' => $book]);
    }
}
