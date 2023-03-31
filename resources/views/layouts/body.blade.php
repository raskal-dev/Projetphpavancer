
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentation</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('build/assets/css/theme.css') }}">

    {{-- @vite(['resources/js/app.js']) --}}

</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container1">
        <div class="navigation">
            <ul>
                <li>
                    <a href="{{ route('home.laravel') }}">
                        <span class="icone">
                            <ion-icon name="logo-apple" style="font-size: 40px; margin-right: 5px;"></ion-icon>
                        </span>
                        <span class="title1">Brand Name</span>
                    </a>
                </li>

                <br><br><br><br><br><br><br>
                <li class="{{request() -> is('menu') ? 'active' : ''}}">
                    <a href="{{ route('home.dash') }}">
                        <span class="icone">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title1">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icone">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title1">Messages</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icone">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title1">Help</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icone">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title1">Settings</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icone">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title1">Password</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icone">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title1">Password</span>
                    </a>
                </li>

                <li class="{{request() -> is('profile') ? 'mande' : ''}}" id="bottom-content1">
                    <a href="{{ route('user.profile') }}">
                        <span class="icone">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title1">Profile</span>
                    </a>
                </li>

                <li id="bottom-content">
                    <a href="{{ route('logout') }}">
                        <span class="icone">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title1">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>

    <main>
        @yield('content')
    </main>
    <!-- =========== Scripts =========  -->
    <script src="{{ asset('build/assets/js/demo.js') }}"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
