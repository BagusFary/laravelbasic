@extends('layouts.maintemplate')

@section('title', 'Add New Student')

@section('content')
<h3>Add New Student</h3>
    <div class="mt-4 col-5 m-auto">
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="/student" method="post">
            @csrf
            <div class="mb-4">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}" required>
            </div>

            <div class="mb-4">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control"  required>
                <option value="">Select One</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
            </div>

            <div class="mb-4">
                <label for="nis">NIS</label>
                <input type="number" class="form-control" name="nis" id="nis" value="{{ old('nis') }}" required>
            </div>

            <div class="mb-4">
                <label for="class">Class</label>
                <select name="class_id" id="class" class="form-control" required>
                    <option value="">Select One</option>
                    @foreach($class as $data)
                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <button class="btn btn-outline-success" type="submit">Add Data</button>
            </div>
            
        </form>
    </div>


    
@endsection