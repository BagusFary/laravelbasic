@extends('layouts.maintemplate')

@section('title', 'Detail Student')

@section('content')
<style>
    th{
        width: 15%;
    }
</style>

<h3>Halaman Detail Student {{ $student->nama }}</h3>

@if($student->image)
<div class="my-4 d-flex justify-content-center">
    <img src="{{ asset('storage/gambar/'. $student->image) }}" alt="" width="100px">
</div>
@else 
    <div class="my-4 d-flex justify-content-center">
        <img src="{{ asset('storage/gambardefault/default.png') }}" alt="" width="100px">
    </div>

@endif


<table class="table table-dark table-striped mt-5">
    <tr>
        <th>Gender</th>
        <th>NIS</th>
        <th>Kelas</th>
        <th>Homeroom Teacher</th>
        <th>Eskul</th>
    </tr>
    <tr>

        @if($student->gender == 'L')
        <td>{{ "Laki-Laki" }}</td>
        @else
        <td>{{ "Perempuan" }}</td>
        @endif
        <td>{{ $student->nis }}</td>
        <td>{{ $student->class->nama }}</td>
        <td>{{ $student->class->homeroomTeacher->nama }}</td>
        <td>
            
        @if(count($student->extracurriculars) )
            @foreach($student->extracurriculars as $eskul)
                - {{ $eskul->nama }} <br>
            @endforeach
        @else
        Tidak mengikuti eskul
        </td>   
        @endif
    </tr>
</table>




    
@endsection
    