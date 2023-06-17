<!DOCTYPE html>
<html>
<head>
    <title>Darmon klinika</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="font-family: sans-serif">
{{--<img src="data:image/png;base64, {!! $logo !!}">--}}

<img width="200px" src="{{ public_path("img/LOGO01.png") }}" style="margin-left: 250px">
<br>
<br>
<h1 style="text-align: center">Test natijasi</h1>
<p><b>F.I.Sh: </b>{{ $fullname }}</p>
<p><b>Sana: </b>{{ $created_at }}</p>


<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Fanlar</th>
        <th>Natija</th>
    </tr>

        <tr>
            <td>1</td>
            <td>{{ $sb_name1 }}</td>
            <td>{{ $sb1*10 }}%</td>
        </tr>
    <tr>
        <td>2</td>
        <td>{{ $sb_name2 }}</td>
        <td>{{ $sb2*10 }}%</td>
    </tr>
    <tr>
        <td>3</td>
        <td>{{ $sb_name3 }}</td>
        <td>{{ $sb3*10 }}%</td>
    </tr>
    <tr>
        <td>4</td>
        <td>{{ $sb_name4 }}</td>
        <td>{{ $sb4*10 }}%</td>
    </tr>
</table>
    <h3>Umumiy natija: {{ $prosent }}%</h3>
<br><br>
    @if($results == 1)
        <h1 style="color: green; text-align: center">Topshirildi</h1>
    @else
        <h1 style="color: red; text-align: center">Topshirilmadi</h1>
    @endif
{{--    {!! QrCode::size(300)->generate('https://darmonklinika.uz/generate-pdf/'.$id) !!}--}}
<br><br><br>
<img src="data:image/png;base64, {!! $qr !!}">

</body>
</html>
