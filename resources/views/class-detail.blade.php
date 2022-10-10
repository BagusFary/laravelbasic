@extends('layouts.maintemplate')

@section('title', 'Detail Class')

@section('content')
<h2>Halaman Detail Class {{ $class->nama }}</h2>

<table class="table table-dark table-striped mt-3">
    <tr>
        <th>Homeroom Teacher</th>
        <th>Student</th>
    </tr>
    <tr>
        <td>{{ $class->homeroomTeacher->nama }}</td>
        <td>
            @foreach($class->students as $student)
            {{ $loop->iteration }}. {{ $student->nama }} <br>
            @endforeach
        </td>
    </tr>

</table>
    
@endsection