<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StudentCreateValidator;

class StudentController extends Controller
{
    public function index(Request $request) 
    {
        $keyword = $request->keyword;
        $student = Student::with('class')
                            ->where('nama', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('gender', $keyword)
                            ->orWhere('nis', 'LIKE', '%'.$keyword.'%')
                            ->orWhereHas('class', function($query) use($keyword) {
                                $query->where('nama', 'LIKE', '%'.$keyword.'%');
                            }) 
                            ->paginate(15);
        return view('student', ['StudentList' => $student]);

    }

    public function show($id)
    {
        $student = Student::with(['class.homeroomTeacher', 'extracurriculars'])->FindOrFail($id);
        return view('student-detail', ['student' => $student]);
    }

    public function create() 
    {
        $class = ClassRoom::select('id', 'nama')->get();
        return view('student-add', ['class' => $class]);
    }
    
    public function store(StudentCreateValidator $request)
    {
        $newName = '';

        if($request->file('gambar')) {
        $extension = $request->file('gambar')->getClientOriginalExtension();
        $newName = $request->nama.'-'.now()->timestamp.'.'.$extension;
        $request->file('gambar')->storeAs('gambar', $newName);
    }

    $request['image'] = $newName;
    $student = Student::create($request->all());

        if($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'Add New Student Success');
        }
        return redirect('/students');
    }

    public function edit($id) 
    {
        $student = Student::with('class')->findOrFail($id);
        $class = ClassRoom::where('id', '!=', $student->class_id)->select('id', 'nama')->get();
        return view('student-edit', ['student' => $student, 'class' => $class]);
    }

    public function update(Request $request, $id)
    {
        $newName = '';

        if($request->file('gambar')) {
        $extension = $request->file('gambar')->getClientOriginalExtension();
        $newName = $request->nama.'-'.now()->timestamp.'.'.$extension;
        $request->file('gambar')->storeAs('gambar', $newName);
        }

        

        if($request->file('gambar'))
        {
            $request['image'] = $newName;
            $gambar = Student::where('id', $id )->select('image')->get();
            Storage::delete('gambar/' .$gambar[0]->image);


        }
        
        $student = Student::findOrFail($id);
        $student->update($request->all());
        if($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'Update Student Success');
        }
        return redirect('/students');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return view('student-delete', ['student' => $student]);
    }

    public function destroy($id)
    {
        $deletedStudent = Student::findOrFail($id);
        $deletedStudent->delete();

        if($deletedStudent) {
            // Session::flash('status', 'success');
            Session::flash('message', 'Delete Student Success');
        }

        return redirect('/students');
    }

    public function deleteGambar($id)
    {
        $gambar = Student::findOrFail($id);
        return view('delete-gambar', ['gambar' => $gambar]);
    }

    public function destroyGambar($id)
    {
        $gambar = Student::where('id', '=', $id )->select('image')->get();
        Storage::delete('gambar/' .$gambar[0]->image);
        $destroyGambar = Student::findOrFail($id);
        $destroyGambar->update(['image' => null]);

        if($destroyGambar) {
            // Session::flash('status', 'success');
            Session::flash('message', 'Delete Gambar Success');
        }

        return redirect('/students');
        
    }

    public function deletedStudent()
    {
        $student = Student::onlyTrashed()->with('class')->get();
        return view('student-deleted-list', ['deletedStudent' => $student]);
    }

    public function recoverStudent($id)
    {
        $recoverStudent = Student::withTrashed()->where('id', $id)->get();
        return view('student-recover', ['student' => $recoverStudent]);
    }

    public function restoredStudent($id)
    {
        $restoredStudent = Student::withTrashed()->where('id', $id)->restore();

        if($restoredStudent) {
            // Session::flash('status', 'success');
            Session::flash('message', 'Restore Student Success');
        }

        return redirect('/students');
        
    }
}
