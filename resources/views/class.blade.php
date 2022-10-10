@extends('layouts.maintemplate')

@section('title', 'Class')


@section('content')

<style>
    th{
        width: 25%;
    }
</style>

<h1>Halaman Class</h1>

<a href="" class="btn btn-outline-dark">Add Data</a>

<h2>Daftar Class</h2>

<table class="table table-dark table-striped">
    <tr>
        <th>No.</th>
        <th>Kelas</th>
        <th>Aksi</th>
    </tr>
    <tr>
     @foreach($classList as $data)
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->nama }}</td>
        <td><a href="class/{{ $data->id }}" class="btn btn-outline-light">Detail</a></td>
    </tr>
    @endforeach
</table>

@endsection