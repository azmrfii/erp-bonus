@extends('layouts.main')
@section('content')
    <div class="container mt-4">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h2>Dashboard</h2>
    </div>
@endsection   