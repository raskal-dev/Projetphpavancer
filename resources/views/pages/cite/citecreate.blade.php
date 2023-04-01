@extends('layouts.layoutkal')

@section('content')
    <div class="container-fluid">
        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">Nouvelle Cité</h1>
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
                <form class="row g-3 was-validated" novalidate method="post" action="{{ route('cite.save') }}">
                    @csrf
                    <div class="col-md-6">
                      <label for="libelle_cite" class="form-label">Nom du cité</label>
                      <input type="text" class="form-control" name="libelle_cite" id="libelle_cite" placeholder="Nom Cité ..." required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-outline-primary" type="submit">Ajouter</button>
                        <span class="px-2"></span>
                        <a href="{{ route('cite') }}" class="btn btn-outline-danger">annuler</a>
                    </div>
                  </form>
            </div>
        </div>
    </div>
@endsection
