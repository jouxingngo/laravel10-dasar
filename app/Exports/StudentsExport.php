<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Mengambil data student dengan relasi ke SchoolClass
        return Student::with('schoolClass')
            ->orderBy('name', 'asc')
            ->get()
            ->map(function ($student) {
                return [
                    'name' => $student->name,
                    'nis' => $student->nis,
                    'gender' => $student->gender,
                    'class' => $student->schoolClass->name,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Name',
            'NIS',
            'Gender',
            'Class',
        ];
    }
}
