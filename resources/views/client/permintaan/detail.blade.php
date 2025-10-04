@extends('layouts.clientlayout')
@section('content')
    <div class="container-fluid mt-5 ms-0 ps-4">
        <h3>Detail Permintaan</h3>
        <p>Menu: {{ $permintaan->menu_makan }}</p>
        <p>Tanggal Masak: {{ $permintaan->tgl_masak }}</p>
        <p>Jumlah Porsi: {{ $permintaan->jumlah_porsi }}</p>
        <p>Status: {{ $permintaan->status }}</p>

        <h5>Detail Bahan</h5>
        <table class="table table-bordered">
            <tr>
                <th>Bahan</th>
                <th>Jumlah</th>
            </tr>
            @forelse ($detail as $d)
                <tr>
                    <td>{{ $d->bahan ? $d->bahan->nama : 'Bahan tidak ditemukan' }}</td>
                    <td>{{ $d->jumlah_diminta }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center">Tidak ada detail bahan</td>
                </tr>
            @endforelse
        </table>

    </div>
@endsection
