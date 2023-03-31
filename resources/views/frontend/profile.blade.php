@extends('layouts.layoutkal')

@section('content')
    <div class="main1">
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

                <h4>Update your account's profile information and email address</h4>

                <form class="formupdateuser" method="POST" action="{{route('update.profile', ['user' => $data->id])}}">
                    @csrf

                    <input type="hidden" name="_method" value="put">

                    <input type="hidden" name="id" value="{{ $data -> id }}">

                    <label class="labelName">
                        <input type="text" id="inputText" name="name" class="inputName" value="{{ $data -> name }}" placeholder="Your name"/>
                        <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('name') {{$message}} @enderror</b></span>
                    </label>

                    <label class="labelEmail">
                        <input type="email" id="inputText" name="email" class="inputEmail" value="{{ $data -> email }}" placeholder="Your email"/>
                        <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('email') {{$message}} @enderror</b></span>
                    </label>

                    <button class="redSubmit" type="submit">Enregistrer</button>

                  </form>

            </div>
        </div>

        <div class="details1">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Update Password</h2>
                    {{-- <a href="#" class="btn1">View All</a> --}}
                </div>

                <h4>Ensure your account is using a long, random password to stay secure.</h4>
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

                    <label class="labelName">
                        <input type="password" id="inputText" name="current_password" class="inputName" value="{{ old('current_password') }}" placeholder="Current Password"/>
                        <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('current_password') {{$message}} @enderror</b></span>
                        <span style="color: red; margin-top: -10px;margin-left: 20px"><b>
                            @if (Session::has('fail'))
                                {{ Session()->get('fail'); }}
                            @endif
                        </b></span>
                    </label>

                    <label class="labelEmail">
                      <input type="password" id="inputText" name="password" class="inputEmail" value="{{ old('password') }}" placeholder="New Password"/>
                      <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('password') {{$message}} @enderror</b></span>
                    </label>

                    <label class="labelEmail">
                        <input type="password" id="inputText" name="password_confirmation" value="{{ old('password_confirmation') }}" class="inputEmail" placeholder="Confirm Password"/>
                        <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('password_confirmation') {{$message}} @enderror</b></span>
                    </label>

                    <button class="redSubmit" type="submit">Enregistrer</button>

                  </form>

            </div>
        </div>

        <div class="details1">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Delete Account</h2>
                    {{-- <a href="#" class="btn1">View All</a> --}}
                </div>

                <h4>Once your account is deleted, all of its resources and data will be permanently deleted.
                    Before deleting your account, please download any data or information that you wish to retain.</h4>

                <form action="{{route('user.delete', ['user' => $data -> id])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="delete">

                    <button class="btnsub" type="submit">
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
