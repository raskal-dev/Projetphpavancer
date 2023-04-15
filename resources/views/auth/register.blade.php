<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing Up</title>
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/css/style.css') }}"> --}}

    @vite(['resources/js/app.js'])

</head>
<body>
    <div class="container mt-5">
        <h2>Create new account</h2>
        <form method="POST" autocomplete="off" action="{{ route('user.ajouter.register') }}">
            @csrf

            <div class="row">
                <div class="col-md-4 form-goup">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    <label class="form-label" for="name">Username</label>
                    <span class="text-danger"><b>@error('name') {{$message}} @enderror</b></span>
                </div>
                <div class="col-md-4 form-goup">
                    {{-- <input type="text" class="form-control" id="adresse_id" name="adresse_id" value="{{ old('adresse_id') }}"> --}}
                    <select name="adresse_id" class="form-control" id="adresse_id">
                        <option value="">--- Selectionner votre adresse ---</option>
                        @foreach ($adresses as $adresse)
                            <option value="{{ $adresse->id }}">{{ $adresse->adresse }}</option>
                        @endforeach
                    </select>
                    <label class="form-label" for="adresse_id">Adresse</label>
                    <span class="text-danger"><b>@error('adresse_id') {{$message}} @enderror</b></span>
                </div>
            </div>
            <div class="col-md-8">
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                <label for="email">Email</label>
                <span class="text-danger"><b>@error('email') {{$message}} @enderror</b></span>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <input type="password" id="password" class="form-control" name="password" value="{{ old('password') }}" autocomplete="new-password">
                    <label for="password">New Password</label>
                    <span class="text-danger"><b>@error('password') {{$message}} @enderror</b></span>
                </div>

                <div class="col-md-4">
                    <input type="password" id="password-confirm" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" autocomplete="new-password">
                    <label for="password-confirm">Confirm Password</label>
                    <span class="text-danger"><b>@error('password_confirmation') {{$message}} @enderror</b></span>
                </div>
            </div>
            <div class="mt-3">
                <button class="btn btn-outline-primary col-md-8" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Sign Up
                </button>
            </div>
        </form>
        <br>
        <a class="create_account" href="{{ route('user.login') }}"><b> I already have account</b> </a>
    </div>

</body>
</html>
