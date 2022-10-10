@extends('layouts.maintemplate')

@section('title', 'Detail Extracurricular')

@section('content')
<h3>Halaman Detail Extracurricular {{ $eskul->nama }}</h3>

<table class="table table-dark table-striped">
    <tr>
        <th>Students</th>
    </tr>
    <tr>
        <td>
            @foreach($eskul->students as $student)
            {{ $loop->iteration }}. {{ $student->nama }} <br>
            @endforeach
        </td>
    </tr>
</table>


    
@endsection