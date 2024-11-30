@extends('layouts.main')

@section('title', 'Teachers')

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
            $('#teachers').DataTable({
                processing: true,  // Tampilkan loading saat request
                serverSide: true,  // Aktifkan server-side processing
                ajax: '{{ route('teachers.index') }}', // Endpoint untuk mengambil data
                columns: [
                    { data: 'id' },               // Kolom id
                    { data: 'name' },             // Kolom name
                    { data: 'actions', orderable: false, searchable: false }  // Kolom actions untuk tombol
                ]
            });
        });
    </script>
@endpush

@section('content')
    <h1>Teacher List</h1>
    <x-button href="/" color="primary">Go to Home</x-button>
    <x-button href="{{ route('teachers.create') }}" color="success">Add Teacher</x-button>

    <div class="my-3">
        <table id="teachers" class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- DataTables akan mengisi data otomatis -->
            </tbody>
        </table>
    </div>
@endsection
