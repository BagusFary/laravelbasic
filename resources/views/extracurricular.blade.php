@extends('layouts.maintemplate')

@section('title', 'Extracurriculars')

@section('content')

<h2>Daftar Eskul</h2>

<a href="" class="btn btn-outline-dark">Add Data</a>

<table class="table table-dark table-striped mt-2">
    <tr>
        <th>No.</th>
        <th>Nama Esktrakurikuler</th>
        <th>Aksi</th>
    </tr>
    <tr>
        @foreach($eskulList as $data)
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->nama }}</td>
        <td><a href="extracurriculars/{{ $data->id }}" class="btn btn-outline-light">Detail</a></td>
    </tr>
    @endforeach
</table>

@endsection
