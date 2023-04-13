@extends('layouts.layoutkal')

@section('content')
    <div class="container-fluid">
        <div class="m-4">
            <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
                <h1 class="text-center text text-info">{{ $cite->libelle_cite }}</h1>
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
            <h1 class="h1 text"><span>Logement</span> | <span>reste: <strong>{{ $countlog }}</strong></span> | <span>Vendu: <strong>{{ $countlogvendu }}</strong></span> | <span>Total: <strong>{{ $countlogtotal }}</strong></span></h1>
            <div class="d-flex justify-content-between" mb-4>
                {{-- {{ $logementbycite->links() }} --}}
                <div><a href="{{ route('logementcite.create', ['idcite' => $idcite]) }}" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-circle-plus"></i> Ajout</a></div>
            </div>
            <div class="m-4">
                <div class="row">
                @foreach ($logementbycites as $logementbycite)
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-start-primary py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <div class="text-uppercase text-primary fw-bold text-xs h3 mb-1"><span>{{ $logementbycite->num_log }}</span></div>
                                    <hr class="hr">
                                    <div class="text-dark fw-bold h5 mb-0">
                                        <span><u>Info</u></span><br>
                                        <span>#{{ $logementbycite->id }}</span><br>
                                        <span>Prix: {{ $logementbycite->prix }}</span>

                                        <hr class="hr">
                                        <span>Action</span><br>
                                        <a href="{{ route('achat.create', ['logement' => $logementbycite->id]) }}">Buy</a>
                                        <span class="p-2"></span>
                                        <a href="{{ route('logementcite.edit', ['logement' => $logementbycite->id]) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <span class="p-2"></span>
                                        <span class="text-danger">
                                            <a href="#"><i class="text-danger fa-solid fa-trash-can" onclick="if(confirm('Vous-voulez vraiment supprimer cette cite ?')){document.getElementById('form-{{ $logementbycite->id }}').submit() }"></i></a>
                                        </span>
                                        <form id="form-{{ $logementbycite->id }}" action="{{ route('logementcite.delete', ['logement' => $logementbycite->id]) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">
                                        </form>
                                    </div>
                                </div>
                                {{-- <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div> --}}
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
