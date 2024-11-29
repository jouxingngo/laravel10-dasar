@extends('layouts.main')
@section('title', 'Teachers')
@push('style')
    <!-- DataTables CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endpush

@push('script')
    <!-- jQuery via CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
@endpush
@section('content')
    <h1>Ini Halaman Teacher</h1>
    <x-button href="/" color="primary">Ke Home</x-button>
    <x-button href="{{ route('teachers.create') }}" color="success">Tambah Teacher</x-button>

    <div class=" my-3">
        <table id="" class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($teachers as $teacher)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>
                            <x-button href="{{ route('teachers.show', $teacher->id) }}" color="info">Detail</x-button>
                        </td>
                       
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
