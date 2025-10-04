@extends('layouts.clientlayout')
@section('content')
<div class="container">
    <h3>Buat Permintaan Bahan</h3>
    <form method="POST" action="/client/permintaan/tambah">
        @csrf
        <label>Tanggal Masak</label>
        <input type="date" name="tgl_masak" class="form-control">
        <label>Menu</label>
        <input type="text" name="menu_makan" class="form-control">
        <label>Jumlah Porsi</label>
        <input type="number" name="jumlah_porsi" class="form-control">

        <h5>Pilih Bahan</h5>
        @foreach($bahan as $i=>$b)
            <div>
                <input type="checkbox" name="bahan[]" value="{{ $b->id }}"> {{ $b->nama }}
                <input type="number" name="jumlah[]" placeholder="Jumlah">
            </div>
        @endforeach

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
    </form>
</div>
@endsection
