@extends('layouts.adminlayout')
@section('content')
<div class="container mt-5">
    <h3>Tambah Bahan Baku</h3>
    <form method="POST" action="/admin/bahan/tambah">
        @csrf
        <label>Nama</label>
        <input type="text" name="nama" class="form-control">
        <label>Kategori</label>
        <input type="text" name="kategori" class="form-control">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control">
        <label>Satuan</label>
        <input type="text" name="satuan" class="form-control">
        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" class="form-control">
        <label>Tanggal Kadaluarsa</label>
        <input type="date" name="tanggal_kadaluarsa" class="form-control">
        <button type="submit" class="btn btn-success mt-3">Simpan</button>
    </form>
</div>
@endsection

