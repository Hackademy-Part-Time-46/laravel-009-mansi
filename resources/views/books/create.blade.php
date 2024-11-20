@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" id="name" value="{{ old('name') }}" required
        placeholder="Inserisci nomi libro">
    <input type="text" name="pages" id="pages" value="{{ old('pages') }}" required
        placeholder="Inserisci pagine libro">
    <input type="text" name="years" id="years" value="{{ old('years') }}" placeholder="Inserisci anno libro">
    <input type="file" name="image" id="image">
    <input type="text" name="alt_image" id="alt_image" value="{{ old('alt_image') }}" required
        placeholder="Inserisci didascalia immagine">
    <button type="submit">Crea</button>
</form>
