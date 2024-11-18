@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <input type="text" name="name" id="name" value="{{ old('name') }}" required
        placeholder="Inserisci nomi libro">
    <input type="text" name="pages" id="pages" value="{{ old('pages') }}" required
        placeholder="Inserisci pagine libro">
    <input type="text" name="years" id="years" value="{{ old('years') }}" placeholder="Inserisci anno libro">
    <button type="submit">Crea</button>
</form>
