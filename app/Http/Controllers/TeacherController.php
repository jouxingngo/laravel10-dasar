<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public function index()
    {
        $teachers = Teacher::all();
        return view('teacher.index', compact('teachers'));
    }

    public function show($id)
    {
        $teacher = Teacher::with(['class.students'])->findOrFail($id);

        return view('teacher.show', compact('teacher'));
    }

    public function create()
    {
        return view('teacher.create');
    }

    public function store(Request $request)
    {
        $teachers = Teacher::create($request->all());
        return redirect()->route('teachers.index');
    }
}
