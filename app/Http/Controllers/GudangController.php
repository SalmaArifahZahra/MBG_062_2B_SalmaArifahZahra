<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GudangController extends Controller
{
    public function index()
    {
        return view('gudang.dashboard');
    }

    // List data bahan baku
    public function index_bahan()
    {
        $bahan = BahanBaku::all();

        $data = [
            'bahan' => $bahan,
        ];

        return view('gudang.bahan.index', $data);
    }

  
    public function index_tambah_bahan()
    {
        return view('gudang.bahan.tambah');
    }

    // Simpan bahan baru
    public function action_tambah_bahan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_kadaluarsa' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/gudang/bahan/tambah')
                ->withErrors($validator)
                ->withInput();
        }

        BahanBaku::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            'status' => 'tersedia',
            'created_at' => now(),
        ]);

        return redirect('/gudang/bahan');
    }

    // Detail bahan
    public function action_detail_bahan($id)
    {
        $bahan = BahanBaku::findOrFail($id);

        $data = [
            'bahan' => $bahan,
        ];

        return view('gudang.bahan.detail', $data);
    }

    // Form edit bahan
    public function action_edit_bahan($id)
    {
        $bahan = BahanBaku::findOrFail($id);

        $data = [
            'bahan' => $bahan,
        ];

        return view('gudang.bahan.edit', $data);
    }

    // Update bahan
    public function action_update_bahan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_kadaluarsa' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/gudang/bahan/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $bahan = BahanBaku::findOrFail($id);

        $bahan->update([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
        ]);

        return redirect('/gudang/bahan')->with('success', 'Data bahan berhasil diperbarui!');
    }

    // Hapus bahan (hanya jika kadaluarsa)
    public function action_delete_bahan($id)
    {
        $bahan = BahanBaku::findOrFail($id);

        if ($bahan->status !== 'kadaluarsa') {
            return redirect('/gudang/bahan')->with('error', 'Hanya bahan kadaluarsa yang bisa dihapus!');
        }

        $bahan->delete();

        return redirect('/gudang/bahan')->with('success', 'Bahan berhasil dihapus!');
    }
}
