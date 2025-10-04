@extends('layouts.adminlayout')
@section('content')
<div class="container mt-5">
    <h3>Data Bahan Baku</h3>
    <a href="/admin/bahan/tambah" class="btn btn-primary mb-3">+ Tambah Bahan</a>
    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Kadaluarsa</th>
            <th>Status</th>
            <th>Aksi</th>
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
                <button type="button" class="btn btn-danger btn-sm btn-delete"
                    data-delete='@json($b)'>Hapus</button>
            </td>
        </tr>
        @endforeach
    </table>

    <form id="formDeleteBahan" method="POST" class="d-none">
        @csrf
        @method('DELETE')
        <input type="hidden" name="bahan_id" id="deleteBahanId">
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const btnDelete = document.querySelectorAll('.btn-delete');
    const formDelete = document.getElementById('formDeleteBahan');
    const inputBahanId = document.getElementById('deleteBahanId');

    btnDelete.forEach(del => {
        del.addEventListener('click', function() {
            const bahanData = this.getAttribute('data-delete');
            const bahan = JSON.parse(bahanData);

            if (bahan.status !== 'kadaluarsa') {
                Swal.fire({
                    title: 'Tidak Bisa Dihapus',
                    text: `Bahan baku "${bahan.nama}" tidak dapat dihapus karena statusnya masih tersedia.`,
                    icon: 'error',
                    confirmButtonText: 'Oke',
                });
                return;
            }

            Swal.fire({
                title: 'Hapus Bahan Baku?',
                html: `
                    Nama: <strong>${bahan.nama}</strong><br>
                    Kategori: ${bahan.kategori}<br>
                    Jumlah: ${bahan.jumlah} ${bahan.satuan}<br>
                    Tanggal Masuk: ${bahan.tanggal_masuk}<br>
                    Tanggal Kadaluarsa: ${bahan.tanggal_kadaluarsa}
                `,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#d33',
            }).then((result) => {
                if (result.isConfirmed) {
                    inputBahanId.value = bahan.id;
                    formDelete.action = `/admin/bahan/${bahan.id}`;
                    formDelete.submit();
                }
            });
        });
    });
</script>
@endsection
