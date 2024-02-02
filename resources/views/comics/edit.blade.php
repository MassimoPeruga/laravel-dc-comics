@extends('layouts.app')

@section('main')
    <div class="container">
        <h3 class="text-center text-warning">Modifica {{ $comic['title'] }}</h3>
        <form class="row g-3" action="{{ route('comics.update', $comic['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="col-md-6">
                <label for="Titolo" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="Titolo" name="title" value="{{ $comic['title'] }}">
            </div>
            <div class="col-md-6">
                <label for="Serie" class="form-label">Serie</label>
                <input type="text" class="form-control" id="Serie" name="series" value="{{ $comic['series'] }}">
            </div>
            <div class="col-12">
                <label for="Descrizione" class="form-label">Descrizione</label>
                <textarea class="form-control" id="Descrizione" rows="3" name="description">{{ $comic['description'] }}</textarea>
            </div>
            <div class="col-12">
                <label for="immagine" class="form-label">Link immagine</label>
                <input type="text" class="form-control" id="immagine" name="thumb" value="{{ $comic['thumb'] }}">
            </div>
            <div class="col-md-6">
                <label for="Disegnatori" class="form-label">Disegnatori</label>
                <textarea class="form-control" id="Disegnatori" rows="3" name="artists">{{ $comic['artists'] }}</textarea>
            </div>
            <div class="col-md-6">
                <label for="Autori" class="form-label">Autori</label>
                <textarea class="form-control" id="Autori" rows="3" name="writers">{{ $comic['writers'] }}</textarea>
            </div>
            <div class="col-md-6">
                <label for="sale_date" class="form-label">Data di vendita</label>
                <input type="text" class="form-control" id="sale_date" name="sale_date"
                    value="{{ $comic['sale_date'] }}">
            </div>
            <div class="col-md-4">
                <label for="Tipo" class="form-label">Tipo</label>
                <select id="Tipo" class="form-select" name="type">
                    <option selected>{{ $comic['type'] }}</option>
                    @if ($comic['type'] === 'graphic novel')
                        <option>comic book</option>
                    @endif
                    @if ($comic['type'] === 'comic book')
                        <option>graphic novel</option>
                    @endif
                </select>
            </div>
            <div class="col-md-2">
                <label for="Prezzo" class="form-label">Prezzo</label>
                <input type="number" step="0.01" class="form-control" id="Prezzo" name="price"
                    value="{{ $comic['price'] }}">
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-warning">Modifica questo fumetto</button>
            </div>
        </form>
        <div class="mt-3">
            <span>Oppure </span>
            <a href="{{ route('comics.index') }}" type="button" class="btn btn-info align-self-center ms-2">
                Torna alla tabella principale
            </a>
        </div>
    </div>
@endsection
