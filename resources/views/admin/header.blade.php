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
            <li><a href="{{ route('admin_home') }}">
                    <i class="fas fa-home-alt"></i>
                    <span class="link-name">Asosiy</span>
                </a></li>
            <li><a href="{{ route('exam_results') }}">
                    <i class="far fa-poll-h"></i>
                    <span class="link-name">Natijalar</span>
                </a></li>
            <li><a href="{{ route('nurses') }}">
                    <i class="far fa-user-md"></i>
                    <span class="link-name">Hamshiralar</span>
                </a></li>
            <hr>
            <li><a href="{{ route('vacant_subjects') }}">
                    <i class="fas fa-brain"></i>
                    <span class="link-name">Imtihon fanlar</span>
                </a></li>
            <li><a href="{{ route('vacant_results') }}">
                    <i class="fal fa-clipboard-check"></i>
                    <span class="link-name">Imtihon natijalar</span>
                </a></li>


            <li><a href="{{ route('vacants') }}">
                    <i class="fas fa-users"></i>
                    <span class="link-name">Vakantlar</span>
                </a></li>
            <hr>
            <li><a href="{{ route('settings') }}">
                    <i class="fas fa-users-cog"></i>
                    <span class="link-name">Sozlamalar</span>
                </a></li>
        </ul>

        <ul class="logout-mode">
            <li><a href="#">
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
        <i class="far fa-bars fa-2x   sidebar-toggle"></i>
        <h3>Admin</h3>
        <img src="../img/admin-icon.png" alt="profile">
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
