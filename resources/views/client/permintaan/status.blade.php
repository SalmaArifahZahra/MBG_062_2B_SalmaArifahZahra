@extends('layouts.clientlayout')

@section('content')
<div class="container-fluid mt-5 ms-0 ps-4">
    <h3>Status Permintaan</h3>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Tanggal Masak</th>
            <th>Menu</th>
            <th>Porsi</th>
            <th>Status</th>
        </tr>
        @foreach($permintaan as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->tgl_masak }}</td>
            <td>{{ $p->menu_makan }}</td>
            <td>{{ $p->jumlah_porsi }}</td>
            <td>
                @if ($p->status == 'menunggu')
                    <span class="badge bg-warning">Menunggu</span>
                @elseif ($p->status == 'disetujui')
                    <span class="badge bg-success">Disetujui</span>
                @else
                    <span class="badge bg-danger">Ditolak</span>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
