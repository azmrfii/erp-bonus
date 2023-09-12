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
        <form method="POST" action="{{ route('bonuses.store') }}">
          @csrf
          @method('POST')
          <div class="mb-3">
            <label for="totalBonus" class="form-label">Total Bonus</label>
            <input type="number" name="totalBonus" class="form-control" id="totalBonus" placeholder="Total Bonus(Rupiah)">
          </div>
          <div class="mb-3">
            <label for="percentage1" class="form-label">Percentage1</label>
            <input type="number" name="percentage1" class="form-control" id="percentage1" placeholder="Percentage for Person 1">
          </div>
          <div class="mb-3">
            <label for="percentage2" class="form-label">Percentage2</label>
            <input type="number"  name="percentage2" class="form-control" id="percentage2" placeholder="Percentage for Person 2">
          </div>
          <div class="mb-3">
            <label for="percentage3" class="form-label">Percentage3</label>
            <input type="number" name="percentage3" class="form-control" id="percentage3" placeholder="Percentage for Person 3">
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary">Calculate</button>
          </div>

        </form>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $('#inputAngka').on('keyup',function(){
            var angka = $(this).val();
    
            var hasilAngka = formatRibuan(angka);
    
            $(this).val(hasilAngka);
        });
    
        function formatRibuan(angka){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split           = number_string.split(','),
            sisa            = split[0].length % 3,
            angka_hasil     = split[0].substr(0, sisa),
            ribuan          = split[0].substr(sisa).match(/\d{3}/gi);
    
            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                angka_hasil += separator + ribuan.join('.');
            }
    
            angka_hasil = split[1] != undefined ? angka_hasil + ',' + split[1] : angka_hasil;
            return angka_hasil;
        }
    </script> --}}
@endsection   