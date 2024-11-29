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
            $('#students').DataTable();
        });
    </script>
@endpush
@section('content')

    <h1>Teacher {{ $teacher->name }}</h1>
    <x-button href="{{ route('teachers.index') }}" color="primary my-4">Ke Teacher</x-button>
    @if ($teacher->class)

        <h4>Class : {{ $teacher->class->name }}</h4>
        <h5>Student List:</h5>
        <ol>


            @forelse ($teacher->class->students as $student)
                <li>{{ $student->name }}</li>
            @empty
                <p>"Empty"</p>
            @endforelse
        @else
            Not have class
    @endif

    </ol>


@endsection
