@extends('layouts.maintemplate')

@section('title', 'Students')

@section('content')
<h1>Ini Halaman Student</h1>
<h3>List Student</h3>

<table class="table table-dark table-striped">
<thead>
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Gender</th>
        <th>NIS</th>
        <th>Kelas</th>
        <th>Eskul</th>
        {{-- <th>Teacher</th> --}}
    </tr>
</thead>
<tbody>
    @foreach($StudentList as $data)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->nama }}</td>
        <td>{{ $data->gender }}</td>
        <td>{{ $data->nis }}</td>
        <td>{{ $data->class->nama }}</td>
        <td>
            @foreach($data->extracurriculars as $data)
           - {{ $data->nama }} <br>
            @endforeach
        </td>
        {{-- <td>{{ $data->class->homeroomTeacher->nama }}</td> --}}
    </tr>
    @endforeach
</tbody>

</table>


@endsection

