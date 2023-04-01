@extends('layouts.layoutkal')

@section('content')
    <div class="container-fluid">
        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">Mettre à jour | Cité</h1>
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
                <form class="row g-3 was-validated" novalidate method="post" action="{{ route('cite.update', ['cite' => $cite->id]) }}">
                    @csrf
                    <input type="hidden" name="_method" value="put">
                    <div class="col-md-6">
                      <label for="libelle_cite" class="form-label">Nom du cité</label>
                      <input type="text" class="form-control" name="libelle_cite" id="libelle_cite" value="{{ $cite->libelle_cite }}" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                    </div>

                    <div class="col-md-6">
                        <label for="superficie" class="form-label">Superficie</label>
                        <input type="number" class="form-control" name="superficie" id="superficie" value="{{ $cite->superficie }}" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>

                    <div class="col-12">
                        <button class="btn btn-outline-primary" type="submit">Mettre à jour</button>
                        <span class="px-2"></span>
                        <a href="{{ route('cite') }}" class="btn btn-outline-danger">annuler</a>
                    </div>
                  </form>
            </div>
        </div>
    </div>
@endsection
