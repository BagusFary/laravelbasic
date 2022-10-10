@extends('layouts.maintemplate')

@section('title', 'Add New Student')

@section('content')

    <div class="mt-5">
        <h4>Apakah Anda Yakin Ingin Menghapus Data : ({{ $student->nama }} | NIS : {{ $student->nis }})</h4>
    </div>
    <form style="display: inline-block" action="/student-destroy/{{ $student->id }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    
    <a href="/students" class="btn btn-primary">Cancel</a href="/students">

@endsection