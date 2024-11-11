<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        SchoolClass::truncate();
        Schema::enableForeignKeyConstraints();
        $classes = ['1A', '2A', '1B', '2B'];  // Kelas yang ingin ditambahkan

        foreach ($classes as $className) {
            SchoolClass::create([
                'name' => $className
            ]);
        }
    }
}
