@extends('layouts.main')
@section('title', 'Home')
@section('content')
    <h1>Ini Halaman Home</h1>
    <h3>{{ $name }}</h3>
    <x-button href="{{ route('students.index') }}" color="warning">Ke Student</x-button>
    <x-button href="{{ route('classes.index') }}" color="info">Ke Class</x-button>
    <table class="table">
        <tr>
            <th>No.</th>
            <th>Nama</th>
        </tr>
        @forelse ($buahs as $buah)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $buah }}</td>
            </tr>
        @empty
        @endforelse

    </table>
@endsection
