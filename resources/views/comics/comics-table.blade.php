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
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('comics.create') }}" type="button" class="btn btn-primary">Aggiungi un nuovo fumetto</a>
    </div>
@endsection
