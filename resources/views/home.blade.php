@extends('layouts.maintemplate')

@section('title', 'Home')

@section('content')
    <h2>Ini Halaman Home</h2>
    <h3>Welcome {{ $name }} Anda Adalah {{ $role }}</h3>

    <table class="table">
        <tr>
            <th>No.</th>
            <th>Nama</th>
        </tr>
        @foreach($buah as $data)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data }}</td>
        </tr>
        @endforeach
    </table>
@endsection


    
    

