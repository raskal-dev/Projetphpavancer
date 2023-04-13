<!-- Coding by CodingLab | www.codinglabweb.com -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">

    <!----======== Font CSS ======== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!----===== Font JS ===== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Gestion</title>

    @vite(['resources/js/app.js'])
</head>
<body>
    <nav class="sidebar1">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="{{ asset('asset/img/logo.png') }}" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name1">Codinglab</span>
                    <span class="profession">Web developer</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar1">
            <div class="menu1">

                <li class="search-box">
                    {{-- <i class='bx bx-search icon'></i> --}}
                    {{-- <input type="text" placeholder="Search..."> --}}

                        <h1 class="m-auto text">MENU</h1>

                </li>

                <ul>
                    <li class="{{ request()->is('menu') ? 'active1' : '' }}">
                        <a href="{{ route('home.dash') }}">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="{{ request()->is('cite') ? 'active1' : '' }}">
                        <a href="{{ route('cite') }}">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Cité</span>
                        </a>
                    </li>

                    <li class="{{ request()->is('achat') ? 'active1' : '' }}">
                        <a href="{{ route('achat') }}">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Achat</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Analytics</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class='bx bx-heart icon' ></i>
                            <span class="text nav-text">Likes</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Wallets</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">

                <li class="{{request() -> is('profile') ? 'active1' : ''}}" id="bottom-content1">
                    <a href="{{ route('user.profile') }}">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Profile</span>
                    </a>
                </li>

                <li class="">
                    <a href="{{ route('logout') }}">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>

            </div>
        </div>

    </nav>

    <section class="home">
        <main>
            @yield('content')
        </main>
    </section>

    <script src="{{ asset('asset/js/script.js') }}"></script>

</body>
</html>
