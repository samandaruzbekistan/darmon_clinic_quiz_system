@extends('admin.header')

@section('section')

    <br>
    @if(count($results) > 0)
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="fas fa-users-cog"></i>
                    <span class="text" id="glavni">Vacant imtihon natijalari</span>
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
                                    <th>F.I.Sh</th>
                                    <th>Natija</th>
                                    <th>{{ $subjects[0]->name }}</th>
                                    <th>{{ $subjects[1]->name }}</th>
                                    <th>{{ $subjects[2]->name }}</th>
                                    <th>{{ $subjects[3]->name }}</th>
                                    <th>Holat</th>
                                    <th>PDF</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($results as $id => $item)
                                    <tr>
                                        <td>{{ $id+1 }}</td>
                                        <td>{{ $item->fullname }}</td>
                                        <td>{{ $item->prosent }}%</td>
                                        <td>{{ $item->sb1*10 }}%</td>
                                        <td>{{ $item->sb2*10 }}%</td>
                                        <td>{{ $item->sb3*10 }}%</td>
                                        <td>{{ $item->sb4*10 }}%</td>
                                        @if($item->results == 1)
                                            <th style="color: #00af2a">Topshirildi</th>
                                        @else
                                            <th style="color: red">Topshirilmadi</th>
                                        @endif
                                        <td><a href="{{ route('generatePDF', ['id' => $item->id]) }}">Hujjat</a></td>
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



