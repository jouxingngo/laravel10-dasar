@extends('layouts.main')
@section('title', 'Home')
@section('content')
    <h1>Ini Halaman Home</h1>
    <h3></h3>
    <h4>Hi {{ Auth::user()->name }}, Selamat Datang di Halaman {{ Auth::user()->role->name }} </h4>
    <x-button href="{{ route('students.index') }}" color="warning">Ke Student</x-button>
    <x-button href="{{ route('classes.index') }}" color="info">Ke Class</x-button>

@endsection
