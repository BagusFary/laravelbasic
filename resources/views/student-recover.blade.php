@extends('layouts.maintemplate')

@section('title', 'Restore Student')

@section('content')

    @foreach($student as $data)
        <div class="mt-3">
            <h2>Restore Student  : Nama ({{ $data->nama }}), NIS ({{ $data->nis }})</h2>
        </div>
    @endforeach

    <div>
        <a href="/student/{{ $data->id }}/restored" class="btn btn-outline-success">Restore</a>
        <a href="/student-deleted" class="btn btn-danger">Cancel</a>
    </div>
    
@endsection