@extends('layouts.main')
@section('title', 'Students')
@push('style')
    <!-- DataTables CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endpush

@push('script')
    <!-- jQuery via CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <!-- DataTables JS via CDN -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#students').DataTable();
        });
    </script> --}}
@endpush
@section('content')
    <h1>Ini Halaman Student</h1>
    <div class="d-flex justify-content-between">
        <x-button href="/" color="primary">Ke Home</x-button>
        <x-button href="{{ route('students.deleted') }}" color="info">Show Deleted Students</x-button>
    </div>
    <div class="mt-3 d-flex justify-content-between">
        <x-button href="{{ route('students.export.excel') }}" color="success">Download Excel</x-button>
        <x-button href="{{ route('students.create') }}" color="success">Tambah Student</x-button>
    </div>
    <div class="mt-3">
        <x-flash-message />
    </div>
    <div class=" my-3">
        <form action="" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="keyword" placeholder="keyword"
                    aria-describedby="button-addon2">
                <button class="btn btn-outline-primary" id="button-addon2">Search</button>
                <button class="btn btn-outline-primary" onclick="reload"> Reset</button>
            </div>
        </form>
        <div class="table-responsive ">
            <table id="students" class="table  table-bordered">

                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Nis</th>
                        <th>Gender</th>
                        <th>Class</th>
                        @if (Auth::user()->role_id == 3 || Auth::user()->role_id == 2)
                            <th class="w-25 text-center">Actions</th>
                        @endif
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
                            @if (Auth::user()->role_id == 3 || Auth::user()->role_id == 2)
                                <td>
                                    <div class="d-flex justify-content-center flex-wrap gap-2">
                                        <x-button color="info"
                                            href="{{ route('students.show', $student->id) }}">Detail</x-button>
                                        @if (Auth::user()->role_id == 3)
                                            <x-button href="{{ route('students.edit', $student->id) }}"
                                                color="warning">Edit</x-button>
                                            <form action="{{ route('students.destroy', $student->id) }}" method="post"
                                                onsubmit="return confirm('Are u sure deleted student {{ $student->name }}?')">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            @endif

                        </tr>
                    @empty
                    @endforelse
                </tbody>

            </table>

            {{ $students->withQueryString()->links() }}
        </div>
    </div>

@endsection
