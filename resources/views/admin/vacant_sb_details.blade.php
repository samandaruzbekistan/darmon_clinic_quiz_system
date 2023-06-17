@extends('admin.header')

@section('section')

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="fas fa-notes-medical"></i>
                    <span class="text">{{ $subject->name }}</span>
                </div>
                <div class="fan_cards" id="fan-cards">
                    <div class="detail_card border-left-primary">
                        <div class="card-body">
                            <div class="align-items-center no-gutters">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Testlar soni</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $subject->count_quiz }} ta</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="detail_card border-left-primary" onclick="formOpen()">
                        <div class="card-body">
                            <div class="align-items-center">
                                <div class="col">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="text-decoration: none;">
                                        Yangi savol
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-plus" style="color: #4E73DF"></i></div>
                                </div>
                            </div>
                        </div>
                    </button>
                    <button class="detail_card border-left-success" onclick="openEdit()">
                        <div class="card-body">
                            <div class="align-items-center">
                                <div class="col">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="text-decoration: none;">
                                        Taxrirlash
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-edit" style="color: #15a200"></i></div>
                                </div>
                            </div>
                        </div>
                    </button>
                </div>
                <div class="form-style-2" id="form-edit" style="display: none">
                    <div class="info">
                        <form action="{{ route('vacant_subject_update') }}" method="post">
                            @csrf
                            <input type="hidden" name="subject_id" value="{{ $subject->id }}">
                            <label for="field1"><span class="required">Fan nomi <span class="required ">*</span></span>
                                <input type="text" class="input-field" name="name" value="{{ $subject->name }}">
                            </label>
                            <label for="field2"><span class="required">Test nechta chiqsin <span class="required ">*</span></span>
                                <input type="text" class="input-field" name="count" value="{{ $subject->count }}">
                            </label>
                            <label for="field1"><span class="required">Test vaqti qancha (minut) <span class="required ">*</span></span>
                                <input type="number" class="input-field" name="time" value="{{ $subject->time }}">
                            </label>
                            <br><br>
                            <label><button class="btn" type="submit">Saqlash</button></label>
                        </form>
                    </div>
                </div>
                <div class="form-style-2" id="form-style" style="display: none">
                    <div class="info">
                        <form action="{{ route('vacant_quiz_reg') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="field1"><span class="required">Savol <span class="required ">*</span></span>
                                <textarea class="textarea-field"  name="quiz" required></textarea>
                                {{--                                <input type="texta" class="input-field" name="name">--}}
                            </label>
                            <label for="field2"><span class="required">Savol rasmi <span class="required ">*</span></span>
                                <input type="file" accept="image/*" class="input-field" name="photo">
                            </label>
                            <input type="hidden" value="{{ $subject->id }}" name="id">
                            <label for="field2"><span class="required">A javob <span class="required ">*</span></span>
                                <input type="text" class="input-field" name="a_answer">
                            </label>
                            <label for="field2"><span class="required">B javob <span class="required ">*</span></span>
                                <input type="text" class="input-field" name="b_answer">
                            </label>
                            <label for="field2"><span class="required">C javob <span class="required ">*</span></span>
                                <input type="text" class="input-field" name="c_answer">
                            </label>
                            <label for="field2"><span class="required">D javob <span class="required ">*</span></span>
                                <input type="text" class="input-field" name="d_answer">
                            </label>
                            <label for="field2"><span class="required">To'gri javob <span class="required ">*</span></span>
                                <select name="correct" class="form-control">
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                </select>
                            </label>
                            <br><br>
                            <label><button class="btn" type="submit">Kiritish</button></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @if(count($quizzes) > 0)
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Savol</th>
                                <th>A javob</th>
                                <th>B javob</th>
                                <th>C javob</th>
                                <th>D javob</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($quizzes as $id => $item)
                                <tr>
                                    <td>{{ $id+1 }}</td>
                                    <td>{{ $item->quiz }}</td>
                                    @foreach($answers[$id] as $i => $answer)
                                        @if($answer->correct == 1)
                                            <td class="text-danger"><b>{{ $answer->answer }}</b></td>
                                        @else
                                            <td>{{ $answer->answer }}</td>
                                        @endif
                                    @endforeach
                                    <td style="text-align: center; vertical-align: center"><a class="btn" href="{{ route('edit_vc_quiz', ['id' => $item->id]) }}"><i class="fa fa-edit"></i></a></td>
                                    <td style="text-align: center; vertical-align: top">
                                        <form action="{{ route('delete_vc_quiz') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="quiz_id" value="{{ $item->id }}">
                                            <input type="hidden" name="subject_id" value="{{ $subject->id }}">
                                            <button type="submit" class="btn" style="background-color: red"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <h3>Savollar mavjud emas!</h3>
        @endif
    </section>
    <form action="{{ route('vacant_delete_subject') }}" method="post">
        @csrf
        <input type="hidden" name="delete_id" value="{{ $subject->id }}">
        <input type="submit" style="display: none" id="submit-btn">
    </form>
@endsection


@push('script')
    <script type="application/javascript">
        function formOpen(){
            document.getElementById('form-style').style.display = 'block';
        }

        function openEdit(){
            document.getElementById('form-edit').style.display = 'block';
        }

        function trash(){

            if (confirm("Fan bilan qo'shilib barcha savollari ham o'chiriladi") === true) {
                document.getElementById('submit-btn').click();
            }
        }

    </script>
@endpush

