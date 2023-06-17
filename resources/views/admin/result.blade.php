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
                <a href="{{ route('exportExcel',['id' => $id]) }}"><button class="btn" style="background-color: #00af00; color: #efefef"><i class="fas fa-file-excel"></i> Export Excel</button></a>
                <a href="{{ route('delete_data',['id' => $id]) }}"><button class="btn" style="background-color: #ff0000; color: #efefef"><i class="fas fa-trash"></i> Malumotalarni tozalash</button></a>
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
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($results as $id => $item)
                                    <tr>
                                        <td>{{ $id+1 }}</td>
                                        <td>{{ $item->fullname }}</td>
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



