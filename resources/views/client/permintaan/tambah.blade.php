@extends('layouts.clientlayout')
@section('content')
    <div class="container-fluid mt-5 ms-0 ps-4">
        <h3 class="mb-5">Buat Permintaan Bahan</h3>
        <form method="POST" action="/client/permintaan/tambah">
            @csrf
            <div class="mb-2">
                <label>Tanggal Masak</label>
                <input type="date" name="tgl_masak" class="form-control">
            </div>
            <div class="mb-2">
                <label>Menu</label>
                <input type="text" name="menu_makan" class="form-control">
            </div>
            <div class="mb-2">
                <label>Jumlah Porsi</label>
                <input type="number" name="jumlah_porsi" class="form-control">
            </div>

            <h5 class="mt-3">Daftar Bahan Baku</h5>
            <table class="table table-bordered" id="bahan-table">
                <thead>
                    <tr>
                        <th>Bahan</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select name="bahan[]" class="form-control">
                                @foreach ($bahan as $b)
                                    <option value="{{ $b->id }}">{{ $b->nama }} (Stok: {{ $b->jumlah }})
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" name="jumlah[]" placeholder="Jumlah" class="form-control">
                        </td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm add-row">+ Tambah</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary mt-2">Simpan Permintaan</button>
        </form>
    </div>

    <script>
        document.getElementById('bahan-table').addEventListener('click', function(e) {
            if (e.target.classList.contains('add-row')) {
                let table = document.querySelector('#bahan-table tbody');
                let row = e.target.closest('tr').cloneNode(true);
                row.querySelector('input').value = ''; // reset jumlah
                row.querySelector('button').classList.remove('btn-success', 'add-row');
                row.querySelector('button').classList.add('btn-danger', 'remove-row');
                row.querySelector('button').textContent = 'Hapus';
                table.appendChild(row);
            }

            // Hapus row
            if (e.target.classList.contains('remove-row')) {
                e.target.closest('tr').remove();
            }
        });
    </script>
@endsection
