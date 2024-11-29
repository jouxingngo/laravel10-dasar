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
        return Student::with(['schoolClass', 'extracurriculars'])
        ->orderBy('name', 'asc')
        ->get()
            ->map(function ($student) {
                return [
                    'name' => $student->name,
                    'nis' => $student->nis,
                    'gender' => $student->gender,
                    'class' => $student->schoolClass->name,
                'extracurriculars' => $student->extracurriculars->pluck('name')->implode(', '), // Menggabungkan nama extracurricular dengan koma
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
            'Extracurriculars'
        ];
    }
}
