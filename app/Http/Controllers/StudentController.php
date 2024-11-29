<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use App\Http\Requests\FormsRequest;
use App\Models\Extracurricular;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with(['schoolClass'])->get();

        return view('student.index', compact('students'));
    }


    public function show($id)
    {
        $student = Student::with(['schoolClass.teacher', 'extracurriculars'])->findOrFail($id);

        return view('student.show', compact('student'));
    }
    // public function show(Student $student)
    // {
    //     $student->load(['schoolClass.teacher', 'extracurriculars']);
    //     return view('student.show', compact('student'));
    // }

    public function create()
    {
        $classes = SchoolClass::select('id', 'name')->get();
        return view('student.create', compact('classes'));
    }

    public function store(FormsRequest $request)
    {
        // menyimpan data biasa
        // $student = new Student();
        // $student->name = $request->name;
        // $student->nis = $request->nis;
        // $student->gender = $request->gender;
        // $student->school_class_id = $request->class_id;
        // $student->save();


        // validation
        // $validation = $request->validate([
        //     'nis' => 'unique:students|max:10',
        //     'name' => 'max:50'
        // ]);

        // menggunakan mass asignment
        $student = Student::create($request->all());
        if ($student) {
            session()->flash('status', 'success');
            session()->flash('message', 'add new student success');
        }

        return redirect()->route('students.index');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $classes = SchoolClass::select('id', 'name')->get();
        return view('student.edit', compact('student', 'classes'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        if ($student) {
            session()->flash('status', 'success');
            session()->flash('message', 'Student ' . $student->name . " Successfully deleted");
        }
        return redirect()->route('students.index');
    }
    
    public function export_excel()
    {
        return Excel::download(new StudentsExport, "students.xlsx");
    }
}
