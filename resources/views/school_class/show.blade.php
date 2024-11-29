@extends('layouts.main')
@section('title', 'Classes')
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
    <h1>Student in {{ $class->name }}</h1>
    <h3>Teacher : {{ $class->teacher->name }}</h3>

    <x-button href="{{ route('classes.index') }}" color="primary">Ke Class</x-button>
    <div class=" my-3">
        <table id="classes" class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NIS</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->nis }}</td>
                        <td>{{ $student->name }}</td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
