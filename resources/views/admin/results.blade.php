@extends('admin.header')

@section('section')

    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="fas fa-notes-medical"></i>
                <span class="text" id="glavni">Imtixon natijalari</span>
            </div>
            <div class="fan_cards" id="fan-cards">
                @if(count($subjects) > 0)
                    @foreach($subjects as $subject)
                        <div class="fan_card">
                            {{--                            <i class="fal fa-clipboard-list fa-5x fan_icon"></i>--}}
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player src="https://assets10.lottiefiles.com/private_files/lf30_46kycmnm.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop="" autoplay=""></lottie-player>
                            <h2 class="fan_title">{{ $subject->name }}</h2>
                            <a href="{{ route('subject_results', ['id' => $subject->id]) }}"><button type="submit" class="fan_btn">Ko'rish</button></a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    </section>
@endsection


@push('script')
    <script>
        @if(!empty($delete))
        @if($delete == 'true')
        alert('Fan o\'chirildi')
        @else
        alert('Fan o\'chirilmadi')
        @endif
        @endif
        function formOpen(){
            document.getElementById('fan-cards').style.display = 'none';
            document.getElementById('bu').style.display = 'none';
            document.getElementById('form-style').style.display = 'block';
            document.getElementById('glavni').textContent = "Yangi fan qo'shish";
        }
    </script>
@endpush

