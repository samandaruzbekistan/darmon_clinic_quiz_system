<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/madia.css">
</head>
<body>
<header class="header">
    <div class="container">
        <div class="header_brand_card">
            <!-- <img src="./img/LOGO YANGI.png" alt="" class="header_brand_img"> -->
            <img src="./img/admin.png" alt="" class="brand_hamshira">
        </div>
        <div class="tolqin">
            <img src="./img/tolqin_2.svg" alt="" class="tolqin_img">
        </div>
        <div class="header_input">
            <div class="header_card active  ">
                <img src="./img/LOGO01.png" alt="" class="header_card_logo">
                @if(isset($vacant))
                    <form action="{{ route('select_vacant') }}" method="post">
                        @else
                            <form action="{{ route('select_nurse') }}" method="post">
                                @endif
                                @csrf
                                <select name="nurse_id">
                                    @foreach($nurses as $item)
                                        <option value="{{ $item->id }}">{{ $item->fullname }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="header_btn">Davom etish</button>
                                <div class="header_add">
                                    @if(isset($vacant))
                                        <a href="{{ route('get_nurses')  }}" class="add_link">Hamshiralar</a>
                                    @else
                                        <a href="{{ route('get_vacants')  }}" class="add_link">Vacantlar</a>
                                    @endif
                                </div>
                            </form>
            </div>
            <!-- <div class="user_card  ">
                <img src="./img/LOGO01.png" alt="" class="header_card_logo">
                <p class="header_text">
                    <input type="text" class="header_input" placeholder="Ismingizni kiriting">
                </p>
                <p class="header_text">
                     <input type="text"class="header_input" placeholder="Familiyangizni kiriting">
                 </p>
                 <button class="header_btn">Davom etish</button>
            </div> -->




            <div class="online_icons">
                <a href="#!" class="online_link"><i class="fab fa-facebook-square"></i></a>
                <a href="#!" class="online_link"><i class="fab fa-youtube"></i></a>
                <a href="#!" class="online_link"><i class="fab fa-telegram"></i></a>
                <a href="#!" class="online_link"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="online_tell">
                <p class="online_text">
                    <i class="fal fa-phone-alt icon"></i>
                    <a href="#!" class="dalny_link">+998 90 123 45 56</a>
                </p>
                <p class="online_text">
                    <i class="fal fa-map-marker-alt"></i>
                    <a href="#!" class="dalny_link">Sirdaryo Guliston</a>
                </p>
            </div>

        </div>

    </div>

</header>
<script src="./javascript/login.js"></script>
</body>
</html>
