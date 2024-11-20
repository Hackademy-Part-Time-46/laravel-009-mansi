DETTAGLI

Nome Libro: {{ $book->name }}
Anno:{{ $book->years }}
Pagine:{{ $book->pages }}

<img src="{{ Storage::url($book->image) }}" alt="">
