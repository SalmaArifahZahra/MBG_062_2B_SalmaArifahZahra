@extends('layouts.adminlayout')
@section('content')
<div class="container mt-5">
    <h3>Daftar Permintaan Bahan</h3>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Pemohon</th>
            <th>Tanggal Masak</th>
            <th>Menu</th>
            <th>Jumlah Porsi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @foreach($permintaan as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->pemohon_id }}</td>
            <td>{{ $p->tgl_masak }}</td>
            <td>{{ $p->menu_makan }}</td>
            <td>{{ $p->jumlah_porsi }}</td>
            <td>{{ $p->status }}</td>
            <td><a href="/admin/permintaan/{{ $p->id }}" class="btn btn-info btn-sm">Detail</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

