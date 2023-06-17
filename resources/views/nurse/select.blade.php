
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/madia.css">
    <title>Darmon</title>
</head>

<body>
<header class="header">
    <div class="container">
        <div class="header_container">
            <div class="header_brand_card">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_7bfNOv.json" background="transparent" speed="1" style="width: 600px; height: 600px;" loop="" autoplay=""></lottie-player>
            </div>
            <div class="header_card">
                <img src="./img/oxirgi.png" alt="" class="tolqin">
                <div class="big_card">
                    @if(isset($vacant))
                        <form action="{{ route('select_vacant') }}" method="post">
                    @else
                        <form action="{{ route('select_nurse') }}" method="post">
                    @endif
                            @csrf
                    <div class="header_input_card1 header_card_item ">
                        <img src="./img/LOGO01.png" alt="" class="logo">
                        <p class="header_text">
                            <select name="nurse_id">
                                <option  class="text_input">Ismingizni tanlang</option>
                                @foreach($nurses as $item)
                                    <option class="text_input" value="{{ $item->id }}">{{ $item->fullname }}</option>
                                @endforeach
                            </select>
                        </p>
                        <p class="header_text">
                            <!-- <input type="text" class="text_input" placeholder="Familiyangizni kiriting"> -->
                            @if(isset($vacant))
                                <a href="{{ route('get_nurses')  }}" class="add_link">Hamshiralar</a>
                            @else
                                <a href="{{ route('get_vacants')  }}" class="add_link">Vacantlar</a>
                            @endif
                        </p>
{{--                        <button class="header_btn">Davom etish</button>--}}
                        <button type="submit" class="header_btn">Kirish</button>
                    </div>
                        </form>
                    <div class="header_input_card2 header_card_item">
                        <img src="./img/LOGO01.png" alt="" class="logo">
                        <p class="header_text">

                            <select name="nmae" id="">
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                                <option  class="text_input">Foydalanuvchini ismi</option>
                            </select>
                        </p>
                        <p class="header_text">
                            <!-- <input type="text" class="text_input" placeholder="Familiyangizni kiriting"> -->
                        </p>
                        <button class="header_btn">Davom etish</button>
                    </div>
                    <div class="online_icons">
                        <a href="#!" class="online_link"><i class="fab fa-facebook-square"></i></a>
                        <a href="#!" class="online_link"><i class="fab fa-youtube"></i></a>
                        <a href="#!" class="online_link"><i class="fab fa-telegram"></i></a>
                        <a href="#!" class="online_link"><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="online_tell">
                        <p class="online_text">
                            <i class="fal fa-phone-alt icon"></i>
                            <a href="#!" class="dalny_link">+998 67 232 03 03</a>
                        </p>
                        <p class="online_text">
                            <i class="fal fa-map-marker-alt"></i>
                            <a href="#!" class="dalny_link">Sirdaryo Guliston</a>
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</header>



</body>

</html>
