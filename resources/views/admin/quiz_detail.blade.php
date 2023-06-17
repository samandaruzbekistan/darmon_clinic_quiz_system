@extends('admin.header')

@section('section')

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="fas fa-notes-medical"></i>
                    <span class="text" id="glavni">Savolni taxrirlash</span>
                </div>
                <div class="form-style-2" id="form-style">
                    <div class="info">
                        <form action="{{ route('quiz_update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                            <label for="field1"><span class="">Savol <span class="">*</span></span>
                                <textarea class="textarea-field" name="quiz">{{ $quiz->quiz }}</textarea>
                            </label>
                            @if($quiz->photo != "no_photo")
                                <label for="field1"><span class="">Savol rasmi</span>
                                    <img src="../quiz_images/{{ $quiz->photo }}" style="width: 20%" class="responsive-img">
                                </label>
                            @endif
                            <label for="field2"><span class="">Yangi rasm <span class=" ">*</span></span>
                                <input type="file" accept="image/*" class="input-field" name="photo">
                            </label>
                            @foreach($answers as $id => $item)
                                @if($item->correct == 1)
                                    <input type="hidden" name="answer_id{{ $id+1 }}" value="{{ $item->id }}">
                                    <label for="field2"><span class="required">To'gri javob</span>
                                        <input type="text" class="input-field" name="answer{{ $id+1 }}" value="{{ $item->answer }}">
                                    </label>
                                @else
                                    <input type="hidden" name="answer_id{{ $id+1 }}" value="{{ $item->id }}">
                                    <label for="field2"><span class="">Noto'g'ri javob</span>
                                        <input type="text" class="input-field" name="answer{{ $id+1 }}" value="{{ $item->answer }}">
                                    </label>
                                @endif
                            @endforeach
                            <br><br>
                            <label><button class="btn" type="submit">Saqlash</button></label>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection


@push('script')
    <script>
        function formOpen(){
            document.getElementById('fan-cards').style.display = 'none';
            document.getElementById('bu').style.display = 'none';
            document.getElementById('form-style').style.display = 'block';
            document.getElementById('glavni').textContent = "Yangi fan qo'shish";
        }
    </script>
@endpush

