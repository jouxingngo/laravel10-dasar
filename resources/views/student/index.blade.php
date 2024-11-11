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
    <h1>Ini Halaman Student</h1>
    <x-button href="/" color="primary">Ke Home</x-button>
    <div class="mt-3 d-flex">
        <x-button href="{{ route('students.export.excel') }}" color="success">Download Excel</x-button>
    </div>


    <div class=" my-3">
        <table id="students" class="table  table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Nis</th>
                    <th>Gender</th>
                    <th>Class</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->nis }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->schoolClass->name }}</td>
                        <td><a href="" class="btn btn-primary">tes</a></td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
