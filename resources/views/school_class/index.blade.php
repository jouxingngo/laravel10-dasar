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
    <h1>Ini Halaman Student</h1>
    <x-button href="/" color="primary">Ke Home</x-button>
    <div class=" my-3">
        <table id="classes" class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($classes as $class)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $class->name }}</td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
