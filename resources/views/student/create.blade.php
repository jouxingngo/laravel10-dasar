@extends('layouts.main')
@section('title', 'Student Create')
@section('content')
    <div class=" mt-4 mx-auto col-8">
            <x-validation-error/>
            <form action="{{ route('students.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="name">Name :</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nis">NIS :</label>
                    <input type="text" class="form-control" id="nis" name="nis">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="gender">Gender :</label>
                    <select class="form-control" name="gender" id="gender">
                        <option selected disabled>-- Pilih --</option>
                        <option value="male">Laki-Laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="class">Class :</label>
                    <select class="form-control" name="school_class_id" id="class">
                        <option selected disabled>-- Pilih --</option>
                        @forelse ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                

            </form>
        </div>

@endsection
