@extends('layouts.app')

@section('main')
    <div class="container">
        <h3 class="text-center text-warning">Modifica {{ $comic['title'] }}</h3>
        <form class="row g-3" action="{{ route('comics.update', $comic['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="col-md-6">
                <label for="Titolo" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="Titolo" name="title"
                    value="{{ old('title', $comic->title) }}" required>
                @error('title')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="Serie" class="form-label">Serie</label>
                <input type="text" class="form-control @error('series') is-invalid @enderror" id="Serie"
                    name="series" value="{{ old('series', $comic->series) }}">
                @error('series')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="Descrizione" class="form-label">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="Descrizione" rows="3"
                    name="description">
                    {{ old('description', $comic->description) }}
                </textarea>
                @error('description')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="immagine" class="form-label">Link immagine</label>
                <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="immagine"
                    name="thumb" value="{{ old('thumb', $comic->thumb) }}">
                @error('thumb')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="Disegnatori" class="form-label">Disegnatori</label>
                <textarea class="form-control @error('artists') is-invalid @enderror" id="Disegnatori" rows="3" name="artists">
                    {{ old('artists', $comic->artists) }}
                </textarea>
                @error('artists')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="Autori" class="form-label">Autori</label>
                <textarea class="form-control @error('writers') is-invalid @enderror" id="Autori" rows="3" name="writers">
                    {{ old('writers', $comic->writers) }}
                </textarea>
                @error('writers')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="sale_date" class="form-label">Data di vendita</label>
                <input type="date" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date"
                    name="sale_date" value="{{ old('sale_date', $comic->sale_date) }}" placeholder="aaaa/mm/gg">
                @error('sale_date')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="Tipo" class="form-label">Tipo</label>
                <select id="Tipo" class="form-select @error('type') is-invalid @enderror" name="type">
                    <option value="comic book" {{ old('type', $comic->type) === 'comic book' ? 'selected' : '' }}></option>
                    <option value="graphic novel" {{ old('type', $comic->type) === 'graphic novel' ? 'selected' : '' }}>
                    </option>
                </select>
                @error('type')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-2">
                <label for="Prezzo" class="form-label">Prezzo</label>
                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                    id="Prezzo" name="price" value="{{ old('price', $comic->price) }}">
                @error('price')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-warning">Modifica questo fumetto</button>
            </div>
        </form>
        <div class="mt-3 d-flex">
            <span>Oppure </span>
            <a href="{{ route('comics.index') }}" type="button" class="btn btn-info align-self-center ms-2 me-auto">
                Torna alla tabella principale
            </a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop-{{ $comic->id }}">
                Elimina questo fumetto
            </button>
            <!-- /Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop-{{ $comic->id }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title fs-5 text-start" id="staticBackdropLabel">
                                Vuoi davvero cancellare {{ $comic['title'] }}?
                            </h3>
                        </div>
                        <div class="modal-body text-danger">
                            <h6>
                                <span class="text-uppercase">Attenzione!</span>
                                <span>Questa azione è irreversibile.</span>
                            </h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Annulla
                            </button>
                            <form action="{{ route('comics.destroy', $comic['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Elimina definitivamente" class="btn btn-danger">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Modal -->
        </div>
    </div>
@endsection
