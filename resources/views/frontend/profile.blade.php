@extends('layouts.layoutkal')

@section('content')
    <div class="main1 container mt-4">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            {{-- <div class="search">
                <label>
                    <input type="text" placeholder="Search here">
                    <ion-icon name="search-outline"></ion-icon>
                </label>
            </div> --}}

            {{-- <div class="user">
                <img src="{{ asset('build/assets/images/customer01.jpg') }}" alt="">
            </div> --}}
        </div>

        <div class="details1">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Profile d'information</h2>
                    {{-- <a href="#" class="btn1">View All</a> --}}
                </div>

                <h4>Mettre à jour votre nom et votre email</h4>

                <form class="formupdateuser" method="POST" action="{{route('update.profile', ['user' => $data->id])}}">
                    @csrf

                    <div class="row">
                        <input type="hidden" name="_method" value="put">

                        <input type="hidden" name="id" value="{{ $data -> id }}">

                        <div class="form-goup col-md-4">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $data -> name }}" placeholder="Your name"/>
                            <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('name') {{$message}} @enderror</b></span>

                        </div>

                        <div class="form-goup col-md-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $data -> email }}" placeholder="Your email"/>
                            <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('email') {{$message}} @enderror</b></span>

                        </div>

                        <label><button class="btn btn-outline-primary" type="submit">Enregistrer</button></label>
                    </div>

                  </form>

            </div>
        </div>

        <div class="details1">
            <div class="recentOrders">
                <div class="card mt-4">
                    <h2>Mettre à jour votre Mot de passe</h2>
                    {{-- <a href="#" class="btn1">View All</a> --}}
                </div>

                <h4>Pour changer votre mot de passe, assurer vous de faire votre mot de passe plus longue et securiser</h4>
                <div>
                    <h4>
                        @if (Session::has('success'))
                            {{ Session()->get('success'); }}
                        @endif
                    </h4>
                </div>
                <form class="formupdateuser" method="POST" action="{{route('password.Update', ['user' => $data->id])}}">
                    @csrf
                    <input type="hidden" name="_method" value="put">

                    <input type="hidden" name="id" value="{{ $data -> id }}">

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="current_password" class="labelName">
                            </label>
                                <input type="password" id="current_password" name="current_password" class="form-control" value="{{ old('current_password') }}" placeholder="Current Password"/>
                                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('current_password') {{$message}} @enderror</b></span>
                                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>
                                    @if (Session::has('fail'))
                                        {{ Session()->get('fail'); }}
                                    @endif
                                </b></span>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="password" class="labelEmail"></label>
                            <input type="password" id="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="New Password"/>
                            <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('password') {{$message}} @enderror</b></span>

                        </div>

                        <div class="form-group col-md-4">
                            <label for="password_confirmation" class="labelEmail"></label>
                            <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" placeholder="Confirm Password"/>
                            <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('password_confirmation') {{$message}} @enderror</b></span>
                        </div>

                        <div class="col-md-4">
                            <button class="btn btn-outline-primary" type="submit">Enregistrer</button>
                        </div>
                    </div>

                  </form>

            </div>
        </div>

        <div class="details1">
            <div class="recentOrders">
                <div class="card mt-4">
                    <h2>Suppression de votre compte</h2>
                    {{-- <a href="#" class="btn1">View All</a> --}}
                </div>

                <h4>Un fois que votre compte a été supprimer, tout vos données serra perdu, donc télécharger vos données d'abord.</h4>

                <form action="{{route('user.delete', ['user' => $data -> id])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="delete">

                    <button class="btn btn-outline-danger" type="submit">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <b>Supprimer</b>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
