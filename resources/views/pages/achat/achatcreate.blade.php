@extends('layouts.layoutkal')

@section('content')
    <div class="container-fluid">
        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">Achat de Logement "{{ $logone->num_log }}"</h1>
        </div>
        <div class="row">
            <div class="col-md-8 m-auto mt-5 shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                <section>
                    <div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </section>
                <form class="row g-3 was-validated" novalidate method="post" action="{{ route('achat.save') }}">
                    @csrf
                    <input type="hidden" name="log_id" value="{{ $log_id }}">
                    <h2 class="text text-info">Client</h2>
                    <div class="col-md-6">
                        <label for="nom_cli" class="form-label">Nom du client</label>
                        <input type="text" class="form-control" name="nom_cli" id="nom_cli" placeholder="Nom Client ..." required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="prenom_cli" class="form-label">Prénom client</label>
                        <input type="text" class="form-control" name="prenom_cli" id="prenom_cli" placeholder="Prénom Client ..." required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="tel_cli" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" name="tel_cli" id="tel_cli" placeholder="Nom Client ..." required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="email_cli" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email_cli" id="email_cli" placeholder="Nom Client ..." required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="typevente_id" class="form-label">Type de Vente</label>
                        <select class="form-control" name="typevente_id" id="typevente_id" required>
                            <option value="">--- Selectionner un type de vente ---</option>
                            @foreach ($typeventes as $typevente)
                                <option value="{{ $typevente->id }}">{{ $typevente->libelle }}</option>
                            @endforeach
                        </select>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-outline-primary" type="submit">Valider</button>
                        <span class="px-2"></span>
                        <a href="#" class="btn btn-outline-danger">annuler</a>
                    </div>
                  </form>
            </div>
        </div>
    </div>
@endsection
