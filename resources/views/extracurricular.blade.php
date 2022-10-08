@extends('layouts.maintemplate')

@section('title', 'Extracurriculars')

@section('content')
<h2>Daftar Eskul</h2>

<table class="table table-dark table-striped">
    <tr>
        <th>No.</th>
        <th>Nama Esktrakurikuler</th>
        <th>Anggota</th>
    </tr>
    <tr>
        @foreach($eskulList as $data)
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->nama }}</td>
        <td>
            @foreach($data->students as $data)
            - {{ $data->nama }} <br>
            @endforeach
        </td>
    </tr>
    @endforeach
</table>

@endsection
