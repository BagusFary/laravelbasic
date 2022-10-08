<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // protected $table = 'students';
    // protected $primaryKey = 'id';
    protected $fillable = ['nama','gender','nis','class_id'];


    public function class()
    {
        return $this->belongsTo(ClassRoom::class);
    }
    
    public function extracurriculars()
    {
        return $this->belongsToMany(Extracurricular::class, 'student_extracurricular', 'student_id', 'extracurricular_id');
    }
    
}
