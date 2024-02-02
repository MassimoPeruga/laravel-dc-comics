@extends('layouts.app')

@section('main')
    <div class="container">
        <table class="table table-bordered table-striped table-info">
            <thead>
                <tr>
                    <th scope="col" class="col">#</th>
                    <th scope="col" class="col">Titolo</th>
                    <th scope="col" class="col-2">Prezzo in $</th>
                    <th scope="col" class="col-1">Serie</th>
                    <th scope="col" class="col">Tipo</th>
                    <th scope="col" class="col-3">Data di creazione</th>
                    <th scope="col" class="col-3">Ultimo aggiornamento</th>
                    <th scope="col" class="col-2">Pagina dettaglio</th>
                    <th scope="col" class="col">Modifica</th>
                    <th scope="col" class="col">Elimina</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comics as $comic)
                    <tr>
                        <th scope="row">{{ $comic['id'] }}</th>
                        <td><strong>{{ $comic['title'] }}</strong></td>
                        <td>{{ $comic['price'] }}</td>
                        <td>{{ $comic['series'] }}</td>
                        <td>{{ $comic['type'] }}</td>
                        <td>{{ $comic['created_at'] }}</td>
                        <td>{{ $comic['updated_at'] }}</td>
                        <td class="text-center align-middle">
                            <a href="{{ route('comics.show', $comic) }}" type="button" class="btn btn-info btn-sm">
                                Vedi Dettagli
                            </a>
                        </td>
                        <td class="text-center align-middle">
                            <a href="{{ route('comics.edit', $comic) }}" type="button" class="btn btn-warning btn-sm">
                                Modifica
                            </a>
                        </td>
                        <td class="text-center align-middle">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Elimina
                            </button>
                            <!-- /Button trigger modal -->

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                <input type="submit" value="Elimina definitivamente"
                                                    class="btn btn-danger">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Modal -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('comics.create') }}" type="button" class="btn btn-primary">Aggiungi un nuovo fumetto</a>
    </div>
@endsection
