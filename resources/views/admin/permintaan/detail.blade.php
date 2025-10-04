@extends('layouts.adminlayout')
@section('content')
<div class="container mt-5">
    <h3>Detail Permintaan</h3>
    <p>Menu: {{ $permintaan->menu_makan }}</p>
    <p>Tanggal Masak: {{ $permintaan->tgl_masak }}</p>
    <p>Jumlah Porsi: {{ $permintaan->jumlah_porsi }}</p>
    <p>Status: {{ $permintaan->status }}</p>

    <h5 class="mt-4">Detail Bahan</h5>
    <table class="table table-bordered">
        <tr>
            <th>Bahan</th>
            <th>Jumlah Diminta</th>
        </tr>
        @foreach($detail as $d)
        <tr>
            <td>{{ $d->bahan_id }}</td>
            <td>{{ $d->jumlah_diminta }}</td>
        </tr>
        @endforeach
    </table>

    <form method="POST" action="/admin/permintaan/{{ $permintaan->id }}/proses">
        @csrf
        <button name="aksi" value="setuju" class="btn btn-success">Setujui</button>
        <button name="aksi" value="tolak" class="btn btn-danger">Tolak</button>
    </form>
</div>
@endsection
