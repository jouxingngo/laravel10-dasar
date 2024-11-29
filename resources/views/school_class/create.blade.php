@extends('layouts.main')
@section('title', 'Student Create')
@section('content')
    <div class=" mt-4 mx-auto col-8">
            <form action="{{ route('classes.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="name">Name :</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="class">Class :</label>
                    <select class="form-control" name="teacher_id" id="class">
                        <option selected disabled>-- Pilih --</option>
                        @forelse ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}-{{ $teacher->id }}</option>
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
