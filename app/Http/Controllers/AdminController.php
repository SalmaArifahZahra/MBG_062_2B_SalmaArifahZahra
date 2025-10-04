<?php

namespace App\Http\Controllers;
use App\Models\BahanBaku;
use App\Models\Permintaan;
use App\Models\PermintaanDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index()
    {
        $totalBahan = BahanBaku::count();

        $permintaanMasuk = Permintaan::where('status', 'masuk')->count();

        $permintaanProses = Permintaan::where('status', 'proses')->count();

        return view('admin.dashboard', compact('totalBahan', 'permintaanMasuk', 'permintaanProses'));
    }

    public function index_bahan()
    {
        $bahan = BahanBaku::all();
        return view('admin.bahan.index', ['bahan' => $bahan]);
    }

    public function index_tambah_bahan()
    {
        return view('admin.bahan.tambah');
    }

    public function action_tambah_bahan(Request $request)
    {
        $data = new BahanBaku;
        $data->nama = $request->nama;
        $data->kategori = $request->kategori;
        $data->jumlah = $request->jumlah;
        $data->satuan = $request->satuan;
        $data->tanggal_masuk = $request->tanggal_masuk;
        $data->tanggal_kadaluarsa = $request->tanggal_kadaluarsa;
        $data->status = 'tersedia';
        $data->save();

        return redirect('/admin/bahan');
    }

}
