@extends('layouts.app')

@section('main')
    <div class="container">
        <form class="row g-3" action="{{ route('comics.store') }}" method="POST">
            @csrf

            <div class="col-md-6">
                <label for="Titolo" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="Titolo" name="title">
            </div>
            <div class="col-md-6">
                <label for="Serie" class="form-label">Serie</label>
                <input type="text" class="form-control" id="Serie" name="series">
            </div>
            <div class="col-12">
                <label for="Descrizione" class="form-label">Descrizione</label>
                <textarea class="form-control" id="Descrizione" rows="3" name="description"></textarea>
            </div>
            <div class="col-12">
                <label for="immagine" class="form-label">Link immagine</label>
                <input type="text" class="form-control" id="immagine" name="thumb">
            </div>
            <div class="col-md-6">
                <label for="Disegnatori" class="form-label">Disegnatori</label>
                <textarea class="form-control" id="Disegnatori" rows="3" name="artists"></textarea>
            </div>
            <div class="col-md-6">
                <label for="Autori" class="form-label">Autori</label>
                <textarea class="form-control" id="Autori" rows="3" name="writers"></textarea>
            </div>
            <div class="col-md-6">
                <label for="sale_date" class="form-label">Data di vendita</label>
                <input type="text" class="form-control" id="sale_date" name="sale_date">
            </div>
            <div class="col-md-4">
                <label for="Tipo" class="form-label">Tipo</label>
                <select id="Tipo" class="form-select" name="type">
                    <option selected>comic book</option>
                    <option>graphic novel</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="Prezzo" class="form-label">Prezzo</label>
                <input type="number" class="form-control" id="Prezzo" name="price">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Crea un nuovo fumetto</button>
            </div>
        </form>
    </div>
@endsection
