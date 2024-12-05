@extends('layouts.main')
@section('title', 'Student Create')
@section('content')
    <div class=" mt-4 mx-auto col-8">
            <form action="{{ route('students.update', $student->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="name">Name :</label>
                    <input type="text" class="form-control" value="{{ $student->name }}" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nis">NIS :</label>
                    <input type="text" class="form-control" value="{{ $student->nis }}" id="nis" name="nis">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="gender">Gender :</label>
                    <select class="form-control" name="gender" id="gender">
                        <option selected disabled>-- Pilih --</option>
                        <option value="male" {{ $student->gender == "male" ? "selected" : "" }}>Laki-Laki</option>
                        <option value="female" {{ $student->gender == "female" ? "selected" : "" }}>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="class">Class :</label>
                    <select class="form-control" name="school_class_id" id="class">
                        <option selected disabled>-- Pilih --</option>
                        @forelse ($classes as $class)
                            <option value="{{ $class->id }}" {{ $student->school_class_id == $class->id ? "selected" : "" }} >{{ $class->name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="mb-3 ">
                    <label for="pp" class="form-label">Photo Profile</label>
                    <input type="file" class="form-control" id="pp" name="photo">
                </div>
                
                
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                

            </form>
        </div>

@endsection
