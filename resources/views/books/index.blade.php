<ul>
    <a href="{{ route('books.create') }}">Crea nuovo libro</a>
    <hr>
    @foreach ($books as $book)
        <li>
            <a href="{{ route('books.show', ['book' => $book]) }}">{{ $book->name }}</a>
        </li>
    @endforeach

</ul>
