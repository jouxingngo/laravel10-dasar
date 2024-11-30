@extends('layouts.main')
@section('title', 'Students')
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
            $('#students').DataTable();
        });
    </script>
@endpush
@section('content')
    <h1>Deleted Student</h1>
    <div class="d-flex justify-content-between">
        <x-button href="{{ route('students.index') }}" color="primary">Ke Student</x-button>
    </div>

    <div class="mt-3">
        <x-flash-message />
    </div>
    <div class=" my-3">
        <div class="table-responsive ">
            <table id="students" class="table table-auto table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Nis</th>
                        <th>Gender</th>
                        <th>Class</th>
                        <th>Deleted At</th>
                        <th class=" text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($deletedStudents as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->nis }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->schoolClass->name }}</td>
                            <td>{{ $student->deleted_at }}</td>

                            <td>
                                <div class="d-flex justify-content-center flex-wrap gap-2">
                                    <x-button href="{{ route('students.restore',$student->id) }}" color="success">Restore</x-button>
                                    <form action="{{ route('students.forceDelete', $student->id) }}"    method="post"
                                        onsubmit="return confirm('Are u sure deleted student {{ $student->name }}?')">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit">Force Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
