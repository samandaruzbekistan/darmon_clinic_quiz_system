@extends('nurse.header')

@section('section')
    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="fas fa-notes-medical"></i>
                <span class="text">Imtihon</span>
            </div>
            <form action="{{ route('test_check') }}" method="post">
                @csrf
                <input type="hidden" name="nurse_id" value="{{ $nurse->id }}">
                <input type="hidden" name="nurse_fullname" value="{{ $nurse->fullname }}">
                <input type="hidden" name="sb_id" value="{{ $subject->id }}">
                <input type="hidden" name="sb_name" value="{{ $subject->name }}">
                <h1 style="text-align: center; margin-top: 1rem; color: blue">{{ $subject->name }}</h1>
                @foreach ($first as $id => $quiz)
                    @if($quiz->photo != "no_photo")
                        <div class="big_test">
                            <section class="test">
                                <div class="test_questions">
                                    <div>
                                        <h2 class="test_request"><b>{{ $id+1 }}. </b> {{ $quiz->quiz }}</h2>
                                        @foreach ($first_answer[$id] as $item)
                                            <label>
                                                <input type="radio" name="answer{{ $id+1 }}" value="{{ $item->id }}">
                                                <span>{{ $item->answer }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="test_image">
                                    <img src="../quiz_images/{{ $quiz->photo }}" alt="" class="test_img">
                                </div>
                            </section>
                        </div>
                    @else
                        <div class="small_tests">
                            <section class="small_test">
                                <div>
                                    <h2 class="test_title">{{ $id+1 }}. </b> {{ $quiz->quiz }}</h2>
                                    @foreach ($first_answer[$id] as $item)
                                        <label>
                                            <input type="radio" name="answer{{ $id+1 }}" value="{{ $item->id }}">
                                            <span>{{ $item->answer }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </section>
                        </div>
                    @endif
                    <hr>
                @endforeach
                <input type="submit" id="submit" style="display: none">
            </form>
            <div class="connections">
                <div class="connection offline">
                    <i class="material-icons wifi-off">wifi_off</i>
                    <p>siz hozir oflaynsiz</p>
                    <i class="material-icons close">close</i>
                </div>
                <div class="connection online">
                    <i class="material-icons wifi">wifi</i>
                    <p>Internetga ulanishingiz tiklandi</p>
                    <i class="material-icons close">close</i>
                </div>
            </div>
        </div>
    </div>

    </section>
    {{--            <div class="small_tests">--}}
    {{--                <section class="small_test">--}}
    {{--                    <h2 class="test_title">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem, temporibus? Eveniet, recusandae. Itaque repellat quia excepturi ad, explicabo odit distinctio, culpa doloribus doloremque, molestias quisquam quasi ipsam. Sint, corporis amet!</h2>--}}
    {{--                    <label>--}}

    {{--                        <input type="radio" name="radio" checked="">--}}
    {{--                        <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt, tempore.</span>--}}
    {{--                    </label>--}}
    {{--                    <label>--}}
    {{--                        <input type="radio" name="radio">--}}
    {{--                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis tenetur illum recusandae maxime nisi assumenda optio, adipisci voluptates sapiente vero!</span>--}}
    {{--                    </label>--}}
    {{--                    <label>--}}
    {{--                        <input type="radio" name="radio">--}}
    {{--                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium veniam a quisquam in laudantium officiis labore itaque similique sed nam, voluptatem, consectetur esse porro dolorem, eos amet repellat modi optio!</span>--}}
    {{--                    </label>--}}
    {{--                    <label>--}}
    {{--                        <input type="radio" name="radio">--}}
    {{--                        <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium placeat neque at illum praesentium enim deleniti aspernatur cum fugiat. Quam nulla sapiente mollitia quasi nisi laborum tenetur dignissimos necessitatibus, corporis amet omnis voluptate architecto magni minus voluptas ipsam animi deserunt!</span>--}}
    {{--                    </label>--}}
    {{--                </section>--}}
    {{--                <hr>--}}
    {{--            </div>--}}
@endsection


@push('script')
    <script>
        function formatTime(seconds) {
            var m = Math.floor(seconds / 60) % 60,
                s = seconds % 60;
            if (m < 10) m = "0" + m;
            if (s < 10) s = "0" + s;
            return m + ":" + s;
        }

        var count = {{ $subject->time }}*60;
        var counter = setInterval(timer, 1000);

        function timer() {
            count--;
            if (count < 0){
                document.getElementById('submit').click();
            }
            document.getElementById('timer').innerHTML = formatTime(count);
        }

        function complate(){
            document.getElementById('submit').click();
        }
    </script>
@endpush
