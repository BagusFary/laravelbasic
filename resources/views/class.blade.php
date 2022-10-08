@extends('layouts.maintemplate')

@section('title', 'Class')


@section('content')
<h1>Halaman Class</h1>
<h2>Daftar Class</h2>

<table class="table table-dark table-striped">
    <tr>
        <th>No.</th>
        <th>Kelas</th>
        <th>Student</th>
        <th>Teacher</th>
    </tr>
    <tr>
     @foreach($classList as $data)
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->nama }}</td>
        <td>
            @foreach ($data->students as $student)
            {{ $student->nama }} <br>
            @endforeach
        </td>
        <td>{{ $data->homeroomTeacher->nama }}</td>
    </tr>
    @endforeach
</table>

@endsection