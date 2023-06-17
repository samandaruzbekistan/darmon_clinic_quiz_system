@extends('admin.header')

@section('section')

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="fas fa-users-cog"></i>
                    <span class="text" id="glavni">Vacant imtihon natijalari</span>
                </div>
                <a href="{{ route('exportExcel',['id' => 1]) }}"><button class="btn" ><i class="fas fa-lock"></i> Admin login parol yangilash</button></a>
                <a href="{{ route('delete_data',['id' => 1]) }}"><button class="btn"><i class="fas fa-users-cog"></i> Hamshira login parol yangilash</button></a>
                <br>
                <br>
            </div>
        </div>

</section>
@endsection



