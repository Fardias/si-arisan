@extends('layouts.app')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded shadow">
            <p class="text-gray-500">Total Anggota</p>
            <p class="text-3xl font-bold">{{ $total_anggota }}</p>
        </div>
    </div>
@endsection
