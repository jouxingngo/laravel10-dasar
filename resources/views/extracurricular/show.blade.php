@extends('layouts.main')
@section('title', 'Extracurriculars')
@push('style')
    <!-- DataTables CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endpush

@push('script')
    <!-- jQuery via CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS via CDN -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#classes').DataTable();
        });
    </script>
@endpush
@section('content')
    <h1>Student in {{ $ekskul->name }}</h1>
    <x-button href="{{ route('extracurriculars.index') }}" color="primary">Extracurricular</x-button>
    <x-flash-message/>

    <div class=" my-3">
        <table id="classes" class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($ekskul->students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{ $student->name }},
                        </td>
                        <td>
                            <form
                                action="{{ route('extracurriculars.students.destroy', ['ekskulId' => $ekskul->id, 'studentId' => $student->id]) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this student from {{ $ekskul->name }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Delete from {{ $ekskul->name }}
                                </button>
                            </form>
                        </td>
                    @empty
                        No Student in {{ $ekskul->name }}
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

@endsection
