@extends('layouts.app')

@section('main')
    <div class="container">
        <form class="row g-3" action="{{ route('comics.store') }}" method="POST">
            @csrf

            <div class="col-md-6">
                <label for="Titolo" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="Titolo" name="title"
                    required value="{{ old('title') }}">
                @error('title')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="Serie" class="form-label">Serie</label>
                <input type="text" class="form-control @error('series') is-invalid @enderror" id="Serie"
                    name="series">
                @error('series')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="Descrizione" class="form-label">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="Descrizione" rows="3"
                    name="description">
                    {{ old('description') }}
                </textarea>
                @error('description')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="immagine" class="form-label">Link immagine</label>
                <input type="url" class="form-control @error('thumb') is-invalid @enderror" id="immagine"
                    name="thumb" value="{{ old('thumb') }}">
                @error('thumb')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="Disegnatori" class="form-label">Disegnatori</label>
                <textarea class="form-control @error('artists') is-invalid @enderror" id="Disegnatori" rows="3" name="artists">
                    {{ old('artists') }}
                </textarea>
                @error('artists')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="Autori" class="form-label">Autori</label>
                <textarea class="form-control @error('writers') is-invalid @enderror" id="Autori" rows="3" name="writers">
                    {{ old('writers') }}
                </textarea>
                @error('writers')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="sale_date" class="form-label">Data di vendita</label>
                <input type="date" class="form-control @error('sale_date') is-invalid @enderror" placeholder="aaaa/mm/gg"
                    id="sale_date" name="sale_date" value="{{ old('sale_date') }}">
                @error('sale_date')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="Tipo" class="form-label">Tipo</label>
                <select id="Tipo" class="form-select @error('type') is-invalid @enderror" name="type">
                    @if (old('type') === 'graphic novel')
                        <option value="comic book">Comic Book</option>
                        <option value="graphic novel" selected>Graphic Novel</option>
                    @else
                        <option value="comic book" selected>Comic Book</option>
                        <option value="graphic novel">Graphic Novel</option>
                    @endif
                </select>
                @error('type')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-2">
                <label for="Prezzo" class="form-label">Prezzo</label>
                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                    id="Prezzo" name="price" value="{{ old('price') }}">
                @error('price')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Crea un nuovo fumetto</button>
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
