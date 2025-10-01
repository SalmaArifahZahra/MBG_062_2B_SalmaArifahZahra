@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Bahan Baku</h2>
    <a href="{{ url('/gudang/bahan/tambah') }}" class="btn btn-success mb-3">+ Tambah Bahan</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Kadaluarsa</th>
                <th>Status</th>
                <th width="180px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bahan as $row)
            <tr>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->kategori }}</td>
                <td>{{ $row->jumlah }}</td>
                <td>{{ $row->satuan }}</td>
                <td>{{ $row->tanggal_masuk }}</td>
                <td>{{ $row->tanggal_kadaluarsa }}</td>
                <td>{{ $row->status }}</td>
                <td>
                    <a href="{{ url('/gudang/bahan/'.$row->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ url('/gudang/bahan/'.$row->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ url('/gudang/bahan/'.$row->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
