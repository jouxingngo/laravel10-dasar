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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $students = Student::with(['schoolClass'])
        ->where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('gender', $keyword)
            ->orWhere('nis', $keyword)
            ->orWhereHas('schoolClass', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->paginate(15);
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

        // updload image
        $filename = "";
        if ($request->file('photo')) {
            $ekstension = $request->file('photo')->getClientOriginalExtension();
            $filename = $request->name . "_" . now()->timestamp . "." . $ekstension;
            $request->file('photo')->storeAs('images', $filename);
        }


        // menggunakan mass asignment
        $request['image'] = $filename;
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
        $filename = $student->image;
        // Jika ada file image yang diupload, lakukan pengolahan gambar
        if ($request->has('photo')) {
            Storage::delete('images/' . $student->image);

            $ekstension = $request->file('photo')->getClientOriginalExtension();
            $filename = $request->name . "_" . now()->timestamp . "." . $ekstension;
            $request->file('photo')->storeAs('images', $filename);
        }


        $request['image'] = $filename;
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

    public function showDeleted()
    {
        $deletedStudents = Student::onlyTrashed()->get();
        return view('student.deleted', compact('deletedStudents'));
    }

    public function forceDelete($id)
    {
        $student = Student::withTrashed()->findOrFail($id);
        $student->forceDelete();

        session()->flash('status', 'success');
        session()->flash('message', 'Student ' . $student->name . " Student deleted permanently");


        return redirect()->route('students.deleted');
    }

    public function restore($id)
    {
        $student = Student::withTrashed()->findOrFail($id);
        $student->restore();
        session()->flash('status', 'success');
        session()->flash('message', 'Student ' . $student->name . ' has been successfully restored.');

        return redirect()->route('students.deleted');
    }
    
}
