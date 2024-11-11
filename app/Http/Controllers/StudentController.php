<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('schoolClass:id,name')->get();
        return view('student.index', compact('students'));
    }


    public function export_excel()
    {
        return Excel::download(new StudentsExport, "students.xlsx");
    }
}
