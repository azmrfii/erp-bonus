@extends('layouts.main')
@section('content')
    <div class="container mt-4">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Total Bonus</th>
                <th scope="col">Person 1 & Bonus</th>
                <th scope="col">Person 2 & Bonus</th>
                <th scope="col">Person 3 & Bonus</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>IDR. {{ number_format($bonus->totalBonus) }}</td>
                    <td>{{ $bonus->percentage1 }}% & IDR. {{ number_format($bonus->bonus1) }}</td>
                    <td>{{ $bonus->percentage2 }}% & IDR. {{ number_format($bonus->bonus2) }}</td>
                    <td>{{ $bonus->percentage3 }}% & IDR. {{ number_format($bonus->bonus3) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection   