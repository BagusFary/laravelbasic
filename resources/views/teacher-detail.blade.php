@extends('layouts.maintemplate')

@section('title', 'Detail Teacher')

@section('content')
<style> 
        td{
            width: 
        }
</style>
<h3 class="mt-2">Halaman Detail Teacher {{ $teacher->nama }}</h3>

<h3> @if ( $teacher->class )
                Kelas {{ $teacher->class->nama }}
            @else
                Tidak Ada Kelas
            @endif
</h3>

<table class="table table-dark table-striped">
    <tr>
        <th>Students</th>
    </tr>
    <tr>
        <td>
            @if($teacher->class)
                @foreach( $teacher->class->students as $student)
                {{ $loop->iteration }}, {{ $student->nama }} <br>
                @endforeach
            @else
                Tidak Ada Student
            @endif
        </td>
    </tr>
</table>
    
@endsection
