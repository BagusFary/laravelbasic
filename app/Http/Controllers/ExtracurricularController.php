<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extracurricular;

class ExtracurricularController extends Controller
{
    public function index(){
        $Extra = Extracurricular::with('students')->get();
        return view('extracurricular', ['eskulList' => $Extra]);
    }
}
