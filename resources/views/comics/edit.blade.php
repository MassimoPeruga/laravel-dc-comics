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
        <div class="mt-3 d-flex">
            <span>Oppure </span>
            <a href="{{ route('comics.index') }}" type="button" class="btn btn-info align-self-center ms-2 me-auto">
                Torna alla tabella principale
            </a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Elimina questo fumetto
            </button>
            <!-- /Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
