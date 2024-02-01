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
        <a href="{{ route('comics.index') }}" type="button" class="btn btn-primary align-self-center">Torna alla tabella
            principale</a>
    </div>
@endsection
