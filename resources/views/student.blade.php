@extends('layouts.maintemplate')

@section('title', 'Students')

@section('content')
<style>
    td {
        width: 10%;
    }
</style>

    <h1>Halaman Student</h1> 
        <div class="mb-3 d-flex justify-content-between">
            @if(Auth::user()->role_id != 1 && Auth::user()->role_id != 2)
            @else
            <a href="/student-create" class="btn btn-outline-dark">Add Data</a>
            @endif

            @if(Auth::user()->role_id != 1)
            @else
            <a href="/student-deleted" class="btn btn-outline-dark">Show Deleted Data</a>
            @endif
        </div>

    @if(Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
      </div>
    @endif

        <h3>List Student</h3>

        <div class="my-4 col-12 col-sm-8 col-md-5">
            <form action="" method="get">   
                <div class="input-group mb-3">
                    <input type="text" class="form-control"  placeholder="Keyword" name="keyword">
                    <button class="input-group-text btn btn-success" >Search</button>
                  </div>
            </form>
        </div>

        <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>NIS</th>
                <th>Class</th>
                <th>Aksi</th>
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
                    @if(Auth::user()->role_id != 1 && Auth::user()->role_id != 2)
                    -
                    @else
                    <a href="student/{{ $data->id }}" class="btn btn-outline-light mb-2 col-12 col-sm-5 col-md-5">Detail</a>
                    <a href="student-edit/{{ $data->id }}" class="btn btn-outline-warning mb-2 col-12 col-sm-5 col-md-5">Edit</a>
                    @endif

                    @if(Auth::user()->role_id != 1)
                    
                    @else
                    <a href="student-delete/{{ $data->id }}" class="btn btn-outline-danger mb-2 col-12 col-sm-5 col-md-5">Delete</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>

        </table>

        <div class="my-4">
        {{ $StudentList->withQueryString()->links() }}
       </div>  

        @endsection

