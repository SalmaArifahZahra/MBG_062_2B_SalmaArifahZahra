<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\Permintaan;
use App\Models\PermintaanDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_kadaluarsa' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/bahan/tambah')
                ->withErrors($validator)
                ->withInput();
        }

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

    public function action_edit_bahan($id)
    {
        $bahan = BahanBaku::find($id);
        return view('admin.bahan.edit', ['bahan' => $bahan]);
    }

    public function action_update_bahan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required|min:0',
            'satuan' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_kadaluarsa' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/bahan/' . $id . '/edit')
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

        return redirect('/admin/bahan')->with('success', 'Data bahan berhasil diperbarui!');
    }


    public function action_delete_bahan($id)
    {
        $bahan = BahanBaku::find($id);
        if ($bahan->status == 'kadaluarsa') {
            $bahan->delete();
        }
        return redirect('/admin/bahan');
    }

    public function index_permintaan()
    {
        $permintaan = Permintaan::all();
        return view('admin.permintaan.index', ['permintaan' => $permintaan]);
    }

    public function action_detail_permintaan($id)
    {
        $permintaan = Permintaan::find($id);
        $detail = PermintaanDetail::where('permintaan_id', $id)->get();
        return view('admin.permintaan.detail', [
            'permintaan' => $permintaan,
            'detail' => $detail
        ]);
    }

    public function action_proses_permintaan(Request $request, $id)
    {
        $permintaan = Permintaan::find($id);

        if ($request->aksi == 'setuju') {
            $detail = PermintaanDetail::where('permintaan_id', $id)->get();
            foreach ($detail as $d) {
                $bahan = BahanBaku::find($d->bahan_id);
                $bahan->jumlah = $bahan->jumlah - $d->jumlah_diminta;
                if ($bahan->jumlah == 0) {
                    $bahan->status = 'habis';
                }
                $bahan->save();
            }
            $permintaan->status = 'disetujui';
        } else {
            $permintaan->status = 'ditolak';
        }

        $permintaan->save();
        return redirect('/admin/permintaan');
    }
}
