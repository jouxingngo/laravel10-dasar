<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TeacherController extends Controller
{

    public function index(Request $request)
    {
        // Mengecek apakah request datang dari DataTables
        if ($request->ajax()) {
            // Ambil data teacher yang dibutuhkan
            $teachers = Teacher::select(['id', 'name']);

            // Mengembalikan data dalam format DataTables
            return DataTables::of($teachers)
                ->addColumn('actions', function ($teacher) {
                    // Menambahkan kolom actions untuk tombol detail
                    return '<a href="' . route('teachers.show', $teacher->id) . '" class="btn btn-info">Detail</a>';
                })
                ->rawColumns(['actions']) // Kolom yang mengandung HTML harus dirender dengan raw
                ->make(true); // Menghasilkan JSON yang dibutuhkan oleh DataTables
        }

        // Menampilkan halaman index jika bukan request AJAX
        return view('teacher.index');
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
