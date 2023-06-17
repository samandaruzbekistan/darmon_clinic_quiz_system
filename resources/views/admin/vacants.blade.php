@extends('admin.header')

@section('section')

        <br>
        @if(count($vacants) > 0)
            <div class="dash-content">
                <div class="overview">
                    <div class="title">
                        <i class="fas fa-user-md"></i>
                        <span class="text" id="glavni">Vakantlar ro'yhati</span>
                    </div>
                    <button id="bu" class="btn" onclick="formOpen()">Yangi vacant qo'shish <i class="fas fa-rectangle-history-circle-plus"></i></button>
                    <form action="{{ route('new_vacant_reg') }}" class="form-style-2" method="post" id="form-style" style="display: none">
                        @csrf
                        <label for="field1"><span class="required">F.I.Sh <span class="required ">*</span></span>
                            <input type="text" class="input-field" name="name">
                        </label>
                        <br><br>
                        <label><button class="btn" type="submit">Saqlash</button></label>
                    </form>
                    <br>
                    <br>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>F.I.Sh</th>
                                        <th>Natija</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($vacants as $id => $item)
                                        <tr>
                                            <td>{{ $id+1 }}</td>
                                            <td>{{ $item->fullname }}</td>
                                            <td>{{ $item->results }}%</td>
                                            <td style="text-align: center; vertical-align: top">
                                                <form action="{{ route('delete_nurse') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="nurse_id" value="{{ $item->id }}">
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
                </div>
            </div>
        @else
            <div class="dash-content">
                <div class="overview">
                    <div class="title">
                        <i class="fas fa-user-md"></i>
                        <span class="text" id="glavni">Vacantlar hali kiritilmagan!</span>
                    </div>
                    <button id="bu" class="btn" onclick="formOpen()">Yangi hamshira qo'shish <i class="fas fa-rectangle-history-circle-plus"></i></button>
                    <form action="{{ route('new_vacant_reg') }}" class="form-style-2" method="post" id="form-style" style="display: none">
                        @csrf
                        <label for="field1"><span class="required">F.I.Sh <span class="required ">*</span></span>
                            <input type="text" class="input-field" name="name">
                        </label>
                        <label for="field1"><span class="required">Telefon (971234567) <span class="required ">*</span></span>
                            <input type="number" class="input-field" name="phone" minlength="9" maxlength="9">
                        </label>
                        <br><br>
                        <label><button class="btn" type="submit">Saqlash</button></label>
                    </form>
                </div>
            </div>
        @endif
    </section>
@endsection


@push('script')
    <script type="application/javascript">
        function formOpen(){
            document.getElementById('form-style').style.display = 'block';
            document.getElementById('bu').style.display = 'none';
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

