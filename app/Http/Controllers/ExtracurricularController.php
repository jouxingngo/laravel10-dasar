<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use App\Models\Student;
use App\Models\Student_Extracurricular;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    public function index()
    {
        $ekskuls = Extracurricular::with('students')->get();
        return view('extracurricular.index', compact('ekskuls'));
    }
    public function show($id)
    {
        $ekskul = Extracurricular::with('students')->findOrFail($id);
        return view('extracurricular.show', compact('ekskul'));
    }

    public function create()
    {
        return view('extracurricular.create');
    }

    public function store(Request $request)
    {
        $ekskuls = Extracurricular::create($request->all());
        return redirect()->route('extracurriculars.index');
    }

    public function studentEkskul()
    {

        $students = Student::select('id', 'name')->get();
        $ekskuls = Extracurricular::select('id', 'name')->get();
        return view('extracurricular.student.create', compact('students', 'ekskuls'));
    }

    public function studentEkskulStore(Request $request)
    {
        $student_extracurriculars = Student_Extracurricular::create($request->all());
        if ($student_extracurriculars) {
            session()->flash('status', 'success');
            session()->flash('message', 'add new student with ekskul success');
        }

        return redirect()->route('extracurriculars.index');
    }

    public function studentEkskulDestroy($ekskulId, $studentId)
    {
        $ekskul = Extracurricular::findOrFail($ekskulId);
        $result = $ekskul->students()->detach($studentId);
        if ($result) {
            session()->flash('status', 'success');
            session()->flash('message', 'student deleted from ' . $ekskul->name);
        }
        return redirect()->route('extracurriculars.show', ['id' => $ekskulId]);
    }
}
