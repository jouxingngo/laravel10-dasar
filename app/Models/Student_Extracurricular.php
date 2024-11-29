<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Extracurricular extends Model
{
    use HasFactory;
    protected $table = 'student_extracurriculars';
    protected $fillable = ['student_id', 'extracurricular_id'];
    public $timestamps = false;
}
