@extends('layouts.main')
@section('title', 'Student Create')
@section('content')
    <div class=" mt-4 mx-auto col-8">
        <form action="{{ route('extracurriculars.students.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="student_id">Student :</label>
                <select class="form-control" name="student_id" id="student_id">
                    <option value="" disabled selected>-Select-</option>
                    @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="ekskul">Ekskul :</label>
                <select class="form-control" name="extracurricular_id" id="ekskul">
                    <option value="" disabled selected>-Select-</option>
                    @foreach ($ekskuls as $ekskul)
                    <option value="{{ $ekskul->id }}">{{ $ekskul->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Save</button>
            </div>


        </form>
    </div>

@endsection
