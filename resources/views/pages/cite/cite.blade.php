@extends('layouts.layoutkal')

@section('content')
    <div class="container-fluid">
        <div class="m-4">
            <h1><span>Cité</span> | <strong>{{ $citecount }}</strong></h1>
            <section>
                @if(session()->has("success"))
                    <div class="alert alert-success">
                        <h3>{{ session()->get('success') }}</h3>
                    </div>
                @elseif (session()->has("errordelete"))
                    <div class="alert alert-danger">
                        <h4>{{ session()->get('errordelete') }}</h4>
                    </div>
                @endif
            </section>
            <div class="d-flex justify-content-between" mb-4>
                {{ $cites->links() }}
                <div><a href="{{ route('cite.create') }}" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-circle-plus"></i> Ajout</a></div>
            </div>
            <div class="m-4">
                <div class="row">
                @foreach ($cites as $cite)
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-start-primary py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <div class="text-uppercase text-primary fw-bold text-xs h3 mb-1"><span>{{ $cite->libelle_cite }}</span></div>
                                    <hr class="hr">
                                    <div class="text-dark fw-bold h5 mb-0">
                                        <span>Info</span><br>
                                        <span>#{{ $cite->id }}</span>

                                        <hr class="hr">
                                        <span>Action</span><br>
                                        <a href="{{ route('cite.edit', ['cite' => $cite->id]) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <span class="p-2"></span>
                                        <a href="#"><i class="fa-solid fa-trash-can" onclick="if(confirm('Vous-voulez vraiment supprimer cette cite ?')){document.getElementById('form-{{ $cite->id }}').submit() }"></i></a>
                                        <form id="form-{{ $cite->id }}" action="{{ route('cite.delete', ['cite' => $cite->id]) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">
                                        </form>
                                    </div>
                                </div>
                                <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>
@endsection
