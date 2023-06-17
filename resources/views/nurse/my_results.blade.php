@extends('nurse.header')

@section('section')

<br>
@if(count($results) > 0)
<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="fas fa-users-cog"></i>
            <span class="text" id="glavni">Imtihon natijalari</span>
        </div>
        <br>
        <br>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Fan nomi</th>
                            <th>Sana</th>
                            <th>Natija</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($results as $id => $item)
                        <tr>
                            <td>{{ $id+1 }}</td>
                            <td>{{ $item->subject_name }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->prosent }}%</td>
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
            <span class="text" id="glavni">Imtihonlar o'tkazilmagan!</span>
        </div>
    </div>
</div>
@endif
</section>
@endsection



