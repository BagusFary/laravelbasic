<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extracurricular;

class ExtracurricularController extends Controller
{
    public function index()
    {
        $Extra = Extracurricular::get();
        return view('extracurricular', ['eskulList' => $Extra]);
    }

    public function show($id)
    {
        $Extra = Extracurricular::with('students')->findOrFail($id);
        return view('extracurricular-detail', ['eskul' => $Extra]);
    }
}
