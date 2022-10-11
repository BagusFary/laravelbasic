@extends('layouts.maintemplate')

@section('title', 'Students')

@section('content')
<style>
    td {
        width: 20%;
    }
</style>
    <h1>Ini Halaman Student</h1>
        <div class="mb-3 d-flex justify-content-between">
            <a href="/student-create" class="btn btn-outline-dark">Add Data</a>
            <a href="/student-deleted" class="btn btn-outline-dark">Show Deleted Data</a>
        </div>

    @if(Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
      </div>
    @endif

        <h3>List Student</h3>

        <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>NIS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($StudentList as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->gender }}</td>
                <td>{{ $data->nis }}</td>
                <td><a href="student/{{ $data->id }}" class="btn btn-outline-light">Detail</a>
                    <a href="student-edit/{{ $data->id }}" class="btn btn-outline-warning">Edit</a>
                    <a href="student-delete/{{ $data->id }}" class="btn btn-outline-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>

        </table>


        @endsection

