@extends('layouts.adminlayout')
@section('content')
<div class="container mt-5">
    <h3>Edit Bahan Baku</h3>
    <form method="POST" action="/admin/bahan/{{ $bahan->id }}/update">
        @csrf

        <label>Nama</label>
        <input type="text" name="nama" value="{{ old('nama', $bahan->nama) }}" class="form-control">

        <label>Kategori</label>
        <input type="text" name="kategori" value="{{ old('kategori', $bahan->kategori) }}" class="form-control">

        <label>Jumlah</label>
        <input type="number" name="jumlah" value="{{ old('jumlah', $bahan->jumlah) }}" class="form-control" min="1">

        <label>Satuan</label>
        <input type="text" name="satuan" value="{{ old('satuan', $bahan->satuan) }}" class="form-control">

        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', $bahan->tanggal_masuk) }}" class="form-control">

        <label>Tanggal Kadaluarsa</label>
        <input type="date" name="tanggal_kadaluarsa" value="{{ old('tanggal_kadaluarsa', $bahan->tanggal_kadaluarsa) }}" class="form-control">

        <label>Status</label>
        <input type="text" value="{{ $bahan->status }}" class="form-control" readonly>

        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
