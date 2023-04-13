@extends('layouts.layoutkal')

@section('content')
    <div class="container-fluid">
        <div class="m-4">
            <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
                <h1 class="text-center text text-info">Listes des Achats</h1>
            </div>
            <section>
                @if(session()->has("success"))
                    <div class="alert alert-success">
                        <h3>{{ session()->get('success') }}</h3>
                    </div>
                @elseif (session()->has("errordelete"))
                    <div class="alert alert-danger">
                        <h4>{{ session()->get('errordelete') }}</h4>
                    </div>
                @elseif (session()->has("error"))
                    <div class="alert alert-danger">
                        <h4>{{ session()->get('error') }}</h4>
                    </div>
                @endif
            </section>
            <div class="m-4">
                {{ $achats->links() }}
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Client</th>
                            <th>Logement</th>
                            <th>Type de Vente</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($achats as $achat)
                            <tr>
                                <td>{{ $achat->id }}</td>
                                <td>{{ $achat->client->nom_cli }} {{ $achat->client->prenom_cli }}</td>
                                <td>{{ $achat->log_id }}</td>
                                <td>{{ $achat->typevente->libelle }}</td>
                                <td>mbola hoavy</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
