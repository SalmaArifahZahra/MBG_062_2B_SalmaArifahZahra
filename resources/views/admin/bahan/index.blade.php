@extends('layouts.adminlayout')
@section('content')
<div class="container mt-5">
    <h3>Data Bahan Baku</h3>
    <a href="/admin/bahan/tambah" class="btn btn-primary mb-3">+ Tambah Bahan</a>
    <table class="table table-bordered">
        <tr>
            <th>Nama</th><th>Kategori</th><th>Jumlah</th><th>Satuan</th>
            <th>Tanggal Masuk</th><th>Tanggal Kadaluarsa</th><th>Status</th><th>Aksi</th>
        </tr>
        @foreach($bahan as $b)
        <tr>
            <td>{{ $b->nama }}</td>
            <td>{{ $b->kategori }}</td>
            <td>{{ $b->jumlah }}</td>
            <td>{{ $b->satuan }}</td>
            <td>{{ $b->tanggal_masuk }}</td>
            <td>{{ $b->tanggal_kadaluarsa }}</td>
            <td>{{ $b->status }}</td>
            <td>
                <a href="/admin/bahan/{{ $b->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                <form method="POST" action="/admin/bahan/{{ $b->id }}" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

