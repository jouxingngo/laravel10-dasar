<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchoolClass extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'teacher_id'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
