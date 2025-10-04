@extends('layouts.clientlayout')
@section('content')
<div class="container">
    <h3>Permintaan Saya</h3>
    <a href="/client/permintaan/tambah" class="btn btn-primary mb-3">+ Buat Permintaan</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th><th>Tanggal Masak</th><th>Menu</th><th>Porsi</th><th>Status</th><th>Aksi</th>
        </tr>
        @foreach($permintaan as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->tgl_masak }}</td>
            <td>{{ $p->menu_makan }}</td>
            <td>{{ $p->jumlah_porsi }}</td>
            <td>{{ $p->status }}</td>
            <td><a href="/client/permintaan/{{ $p->id }}" class="btn btn-info btn-sm">Detail</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
