<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/all.min.css">


    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <!----===== Iconscout CSS ===== -->
    <!-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Darmon</title>
</head>

<body>

<nav>
    <div class="logo-name">
        <div>
            <img src="../img/LOGO01.png" class="logo_image" alt="">
        </div>

        <!-- <span class="logo_name"></span> -->
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li><a href="{{ route('vacant_home') }}">
                    <i class="fas fa-brain"></i>
                    <span class="link-name">Imtihon </span>
                </a></li>


        </ul>

        <ul class="logout-mode">
            <li><a href="{{ route('user_logout') }}">
                    <i class="fal fa-sign-out"></i>
                    <span class="link-name">Chiqish</span>
                </a></li>

            <li class="mode">
                <a href="#">
                    <i class="uil uil-moon"></i>
                    <span class="link-name">Qorong'i rejim</span>
                </a>

                <div class="mode-toggle">
                    <span class="switch"></span>
                </div>
            </li>
        </ul>
    </div>

</nav>
<section class= "dashboard">
    <div class="top">
        @if(session('test') == 1)
            <i class="far fa-bars fa-2x   sidebar-toggle"></i>
            <b>Qolgan vaqt: <span class="text-danger"  id="timer"></span></b>
            <button class="btn" style="background-color: red" onclick="complate()">Testni yakunlash</button>
        @else
            <i class="far fa-bars fa-2x   sidebar-toggle"></i>
            <h3>{{ session('fullname') }}</h3>
            <img src="../img/vacant.png" alt="profile">
        @endif
    </div>
    @yield('section')

    @stack('script')
    <div class="connections">
        <div class="connection offline">
            <i class="material-icons wifi-off">wifi_off</i>
            <p>Siz hozir oflaynsiz</p>
            <i class="material-icons close">close</i>
        </div>
        <div class="connection online">
            <i class="material-icons wifi">wifi</i>
            <p>Internetga ulanishingiz tiklandi</p>
            <i class="material-icons close">close</i>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../javascript/script.js"></script>
    <script src="../javascript/script-js.js"></script>
</body>
</html>
