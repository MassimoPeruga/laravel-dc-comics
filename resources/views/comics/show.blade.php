@extends('layouts.app')

@section('main')
    <div class="container d-flex flex-column">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 d-flex">
                    <img src="{{ $comic['thumb'] }}" class="img-fluid rounded-start my-auto" alt="{{ $comic['title'] }} thumb">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title">{{ $comic['title'] }}</h4>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <h6 class="d-inline">Data della vendita: </h6>
                                {{ $comic['sale_date'] }}
                            </div>
                            <div class="col-3">
                                <h6 class="d-inline">Serie: </h6>
                                {{ $comic['series'] }}
                            </div>
                            <div class="col-3">
                                <h6 class="d-inline">Tipo: </h6>
                                {{ $comic['type'] }}
                            </div>
                        </div>
                        <hr>
                        <h6>Descrizione: </h6>
                        <p class="card-text">{{ $comic['description'] }}</p>
                        <hr>
                        <div class="row row-cols-2">
                            <div class="col">
                                <h6>Autori: </h6>
                                <p>{{ $comic['writers'] }}</p>
                            </div>
                            <div class="col">
                                <h6>Disegnatori: </h6>
                                <p>{{ $comic['artists'] }}</p>
                            </div>
                        </div>
                        <p class="card-text text-end">
                            <small class="text-body-secondary">
                                Ultimo aggiornamento: {{ $comic['updated_at'] }}
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3 d-flex">
            <a href="{{ route('comics.index') }}" type="button" class="btn btn-info align-self-center me-auto">
                Torna alla tabella principale
            </a>
            <a href="{{ route('comics.edit', $comic) }}" type="button" class="btn btn-warning me-2">
                Modifica questo fumetto
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
