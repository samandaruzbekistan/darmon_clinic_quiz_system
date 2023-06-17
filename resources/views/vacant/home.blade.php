@extends('vacant.header')

@section('section')

    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="fas fa-notes-medical"></i>
                <span class="text" id="glavni">Imtihon bo'limi</span>
            </div>
            <div class="fan_cards" id="fan-cards">
                <div class="fan_card">
                    {{--                            <i class="fal fa-clipboard-list fa-5x fan_icon"></i>--}}
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets10.lottiefiles.com/private_files/lf30_46kycmnm.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop="" autoplay=""></lottie-player>
                    <h2 class="fan_title">Imtihon</h2>
                    <a href="{{ route('start_vacant', ['id' => session('vacant_id')]) }}"><button type="submit" class="fan_btn">Boshlash</button></a>
                </div>
            </div>
        </div>
    </div>

    </section>
@endsection



