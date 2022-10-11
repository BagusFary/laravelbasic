@extends('layouts.maintemplate')

@section('title', 'Deleted Student')

@section('content')
<style>
    th {
        width: 15%;
    }
</style>
<h2>List Deleted Student</h2>

    <div class="mt-3">
        <a href="/students" class="btn btn-outline-dark">Back</a>
    </div>

    <div class="mt-4">
        <table class="table table-dark table-striped">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
            @foreach($deletedStudent as $data)
            <tr>               
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->gender }}</td>
                <td>{{ $data->nis }}</td>
                <td>{{ $data->class->nama }}</td> 
                <td><a href="/student/{{ $data->id }}/recover" class="btn btn-outline-info">Restore Data</a></td>  
            </tr>
            @endforeach
        </table>
    </div>
    
@endsection