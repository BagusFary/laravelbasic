<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StudentCreateValidator;

class StudentController extends Controller
{
    public function index() 
    {
        $student = Student::get();
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
        $student = Student::findOrFail($id);
        $student->update($request->all());
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
            Session::flash('status', 'success');
            Session::flash('message', 'Delete Student Success');
        }

        return redirect('/students');
    }
}
