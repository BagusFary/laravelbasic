@extends('layouts.maintemplate')

@section('title', 'Teachers')

@section('content')
<h2>Ini Adalah Halaman Teachers</h2>

<table class="table table-dark table-striped">
    <tr>
        <th>No.</th>
        <th>Nama</th>
    </tr>
    <tr>
        @foreach($teacherList as $data)
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->nama }}</td>
    </tr>
    @endforeach
</table>
    
@endsection