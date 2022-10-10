@extends('layouts.maintemplate')

@section('title', 'Teachers')

@section('content')
<style>
    th{
        width: 25%;
    }
</style>

<h2>Ini Adalah Halaman Teachers</h2>

<a href="" class="btn btn-outline-dark">Add Data</a>

<table class="table table-dark table-striped mt-2">
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>
    <tr>
        @foreach($teacherList as $data)
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->nama }}</td>
        <td><a href="teacher/{{ $data->id }}" class="btn btn-outline-light">Detail</a></td>
    </tr>
    @endforeach
</table>
    
@endsection