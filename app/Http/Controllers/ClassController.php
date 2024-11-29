<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::with('teacher')->get();
        return view('school_class.index', compact('classes'));
    }

    public function show($id)
    {
        $class = SchoolClass::with('students')->findOrFail($id);
        $students = $class->students;

        return view('school_class.show', compact('students', 'class'));
    }

    public function create()
    {
        $teachers = Teacher::select('id', 'name')->get();
        return view('school_class.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $classes = SchoolClass::create($request->all());
        return redirect()->route('classes.index');
    }
}
