@extends('layouts.maintemplate')

@section('title', 'Home')

@section('content')
    <h2>Ini Halaman Home</h2>
    <h3>Welcome, {{ Auth::user()->name }}. Anda Adalah {{ Auth::user()->role->name }} </h3>

    
@endsection


    
    

