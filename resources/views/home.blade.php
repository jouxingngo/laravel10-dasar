@extends('layouts.main')
@section('title', 'Home')
@section('content')
    <h1>Ini Halaman Home</h1>
    <h3>{{ $name }}</h3>
    @if ($role == 'admin')
        <a href="#">ke halaman Admin</a>
    @elseif ($role == 'user')
        <a href="#">ke halaman user</a>    
    @endif
    <table class="table">
        <tr>
            <th>No.</th>
            <th>Nama</th>
        </tr>
        @forelse ($buahs as $buah )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $buah }}</td>
        </tr>
        @empty
            
        @endforelse
        
    </table>
@endsection