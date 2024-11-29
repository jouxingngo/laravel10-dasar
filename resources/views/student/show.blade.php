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
    <h1>Student {{ $student->name }}</h1>
    <h3>Teacher : {{ $student->schoolClass->teacher->name }}</h3>
    <x-button href="{{ route('students.index') }}" color="primary">Ke Students</x-button>
    <ul>
        <li>Name                : {{ $student->name }}</li>
        <li>NIS                 : {{ $student->nis }}</li>
        <li>Gender              : {{ $student->gender }}</li>
        <li>Class               : {{ $student->schoolClass->name }}</li>
        <li>Teacher             : {{ $student->schoolClass->teacher->name }}</li>
        <li>Extracurriculars    : 
            @forelse ($student->extracurriculars as $ekskul)
                {{ $ekskul->name }},
            @empty
                Not Have Ekskul                
            @endforelse
        </li>
    </ul>


@endsection
