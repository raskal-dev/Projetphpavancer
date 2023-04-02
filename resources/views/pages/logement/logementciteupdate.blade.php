@extends('layouts.layoutkal')

@section('content')
    <div class="container-fluid">
        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">Nouvelle Logement</h1>
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
                <form class="row g-3 was-validated" novalidate method="post" action="{{ route('logementcite.update', ['logement' => $logement->id, 'idcite' => $logement->cite_id]) }}">
                    @csrf
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="cite_id" value="{{ $logement->cite_id }}">
                    <div class="col-md-6">
                        <label for="num_log" class="form-label">Nom du Logement</label>
                        <input type="text" class="form-control" name="num_log" id="num_log" value="{{ $logement->num_log }}" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>

                      <div class="col-md-6">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="number" class="form-control" name="prix" id="prix" value="{{ $logement->prix }}" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>

                    <div class="col-12">
                        <button class="btn btn-outline-primary" type="submit">Mettre à jour</button>
                        <span class="px-2"></span>
                        {{-- <a href="{{ route('liste.log', ['idcite' => $idcite]) }}" class="btn btn-outline-danger">annuler</a> --}}
                    </div>
                  </form>
            </div>
        </div>
    </div>
@endsection
