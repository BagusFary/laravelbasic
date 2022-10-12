@extends('layouts.maintemplate')

@section('title', 'Edit Student')

@section('content')
<h3>Edit Student</h3>

<div class="mt-4 col-5 m-auto">
    <form action="/student/{{ $student->id }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-4">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" value="{{ $student->nama }}" required>
        </div>

        <div class="mb-4">
        <label for="gender">Gender</label>
        <select name="gender" id="gender" class="form-control" value="{{ $student->gender }}" required>

            <option value="{{ $student->gender }}">
                @if($student->gender == "L")
                    Laki-Laki
                @else
                    Perempuan
                @endif
            </option>

            @if($student->gender == "L")
            <option value="P">Perempuan</option>
            @else
            <option value="L">Laki-Laki</option>
            @endif
            
        </select>
        </div>

        <div class="mb-4">
            <label for="nis">NIS</label>
            <input type="number" class="form-control" name="nis" id="nis" value="{{ $student->nis }}" required>
        </div>

        <div class="mb-4">
            <label for="class">Class</label>
            <select name="class_id" id="class" class="form-control" required>
                <option value="{{ $student->class->id }}">{{ $student->class->nama }}</option>
                @foreach($class as $data)
                <option value="{{ $data->id }}">{{ $data->nama }}</option>
                @endforeach
                
            </select>
        </div>

        @if($student->image)
        <div class="mb-4">
            <img src="{{ asset('storage/gambar/'. $student->image) }}" alt="" width="100px">
        </div>
        @else
        <div class="mb-4">
            <img src="{{ asset('storage/gambardefault/default.png') }}" alt="" width="100px">
        </div>
        @endif
        <div class="mb-4">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control" name="gambar" id="gambar">
        </div>

        <div class="mb-5">
            <button class="btn btn-outline-success" type="submit">Edit Data</button>
        </div>
        
    </form>
</div>


@endsection