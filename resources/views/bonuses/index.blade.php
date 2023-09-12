@extends('layouts.main')
@section('content')
    <div class="container mt-4">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <a href="{{ route('bonuses.create') }}" class="btn btn-primary badge text-white">create</a>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Total Bonus</th>
                <th scope="col">Person 1 & Bonus</th>
                <th scope="col">Person 2 & Bonus</th>
                <th scope="col">Person 3 & Bonus</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($bonuses as $bonus)       
                <tr>
                <td>IDR. {{ number_format($bonus->totalBonus) }}</td>
                <td>{{ $bonus->percentage1 }}% & IDR. {{ number_format($bonus->bonus1) }}</td>
                <td>{{ $bonus->percentage2 }}% & IDR. {{ number_format($bonus->bonus2) }}</td>
                <td>{{ $bonus->percentage3 }}% & IDR. {{ number_format($bonus->bonus3) }}</td>
                <td>
                    <a href="{{ route('bonuses.show', $bonus->id) }}" class="btn btn-info badge">Detail</a>     
                    @if (Auth::user()->role != 'user')    
                    <form action="{{ route('bonuses.destroy',$bonus->id) }}" method="Post">
     
                        <a class="btn btn-warning badge" href="{{ route('bonuses.edit',$bonus->id) }}">Edit</a>
        
                        @csrf
                        @method('DELETE')
           
                        <button type="submit" class="btn btn-danger badge">Delete</button>
                    </form>
                    @endif
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection   