@extends('layouts.main')
@section('content')
    <div class="container mt-4">
        @if (session()->has('message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h1>Hitung Bonus</h1>
        <form method="POST" action="{{ route('bonuses.update', $bonus->id) }}">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="totalBonus" class="form-label">Total Bonus</label>
            <input type="number" name="totalBonus" class="form-control" id="totalBonus" placeholder="Total Bonus(Rupiah)" value="{{ old('bonus', $bonus->totalBonus) }}">
          </div>
          <div class="mb-3">
            <label for="percentage1" class="form-label">Percentage1</label>
            <input type="number" name="percentage1" class="form-control" id="percentage1" placeholder="Percentage for Person 1" value="{{ old('bonus', $bonus->percentage1) }}">
          </div>
          <div class="mb-3">
            <label for="percentage2" class="form-label">Percentage2</label>
            <input type="number"  name="percentage2" class="form-control" id="percentage2" placeholder="Percentage for Person 2" value="{{ old('bonus', $bonus->percentage2) }}">
          </div>
          <div class="mb-3">
            <label for="percentage3" class="form-label">Percentage3</label>
            <input type="number" name="percentage3" class="form-control" id="percentage3" placeholder="Percentage for Person 3" value="{{ old('bonus', $bonus->percentage3) }}">
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
    </div>
@endsection   