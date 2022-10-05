@extends('layouts.maintemplate')

@section('title', 'Students')

@section('content')
<h1>Ini Halaman Student</h1>
<h3>List Student</h3>

<table class="table table-dark table-striped">
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Gender</th>
        <th>NIS</th>
        <td>Kelas</td>
    </tr>
    <tr>
        @foreach($StudentList as $student)
        <td>{{ $loop->iteration }}</td>
        <td>{{ $student->nama }}</td>
        <td>{{ $student->gender }}</td>
        <td>{{ $student->nis }}</td>
        <td>{{ $student->class_id }}</td>
    </tr>
         @endforeach
</table>


@endsection

