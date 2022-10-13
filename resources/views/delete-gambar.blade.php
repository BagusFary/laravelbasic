@extends('layouts.maintemplate')

@section('title', 'Delete Gambar')

@section('content')

    <div class="mt-3">
        <h1>Anda yakin ingin menghapus gambar ini : 
            <img src="{{ asset('storage/gambar/'. $gambar->image) }}" width="150px"> 
        </h1>
    </div>
    <form action="/student-destroy-gambar/{{ $gambar->id }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger" >Hapus Gambar</button>
        <a href="/students" class="btn btn-outline-dark">Cancel</a>
    </form>
    
        
    
@endsection