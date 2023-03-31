<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing In</title>
    <link rel="stylesheet" href="{{ asset('build/assets/css/style.css') }}">

    <script>
        function preventBack() {
            window.history.forward()
        }
        setTimeout("preventBack()", -100)
        window.onunload = function() {
            null
        }
    </script>
    
    @vite(['resources/js/app.js'])

</head>
<body>
    <div class="login-box">
        <h2>AUTHENTIFICATION</h2>
        <form autocomplete="off" method="POST" action="{{ route('user.login.sign.in') }}">
            @csrf
            @if (Session::has('fail'))
                <div id="error" class="mb-3">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <b>{{ Session()->get('fail'); }}</b>
                </div>
            @endif

            @if (Session::has('message'))
                <div id="error" class="mb-3">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <b>{{ Session()->get('message'); }}</b>
                </div>
            @endif

            <br>
            <div class="user-box">
                <input type="text" id="email" name="email" value="{{ old('email') }}" required>
                <label for="email">Email</label>
                <span class="text-danger"><b>@error('email') {{$message}} @enderror</b></span>
            </div>
            <br>
            <div class="user-box">
                <input type="password" id="password" name="password" value="{{ old('password') }}" required>
                <label for="password">Password</label>
                <span class="text-danger"><b>@error('password') {{$message}} @enderror</b></span>
            </div>
            <button class="btnsub" type="submit">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Sign In
            </button>
        </form>
        <br>
        <a class="create_account" href="{{ route('user.register') }}"><b> Have no Account, create new account</b></a>
    </div>

</body>
</html>