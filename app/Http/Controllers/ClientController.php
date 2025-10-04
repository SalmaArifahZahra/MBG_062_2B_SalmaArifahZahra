<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\BahanBaku;
use App\Models\Permintaan;
use App\Models\PermintaanDetail;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.home');
    }

    public function index_permintaan()
    {
        $permintaan = Permintaan::where('pemohon_id', Auth::id())->get();
        return view('client.permintaan.index', ['permintaan' => $permintaan]);
    }

    public function index_status()
    {
        $permintaan = Permintaan::where('pemohon_id', Auth::id())->get();
        return view('client.permintaan.status', ['permintaan' => $permintaan]);
    }

    public function index_tambah_permintaan()
    {
        $bahan = BahanBaku::where('jumlah', '>', 0)
            ->where('status', '!=', 'kadaluarsa')
            ->get();
        return view('client.permintaan.tambah', ['bahan' => $bahan]);
    }

    public function action_tambah_permintaan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tgl_masak'     => 'required|date',
            'menu_makan'    => 'required|string|max:255',
            'jumlah_porsi'  => 'required|integer|min:1',
            'bahan'         => 'required|array|min:1',   // minimal 1 bahan dipilih
            'bahan.*'       => 'required|exists:bahan_baku,id', // id bahan harus ada di tabel
            'jumlah'        => 'required|array|min:1',
            'jumlah.*'      => 'required|integer|min:1', // tiap jumlah bahan harus valid
        ]);

        if ($validator->fails()) {
            return redirect('/client/permintaan/tambah')
                ->withErrors($validator)
                ->withInput();
        }

        $permintaan = new Permintaan;
        $permintaan->pemohon_id = Auth::id();
        $permintaan->tgl_masak = $request->tgl_masak;
        $permintaan->menu_makan = $request->menu_makan;
        $permintaan->jumlah_porsi = $request->jumlah_porsi;
        $permintaan->status = 'menunggu';
        $permintaan->save();

        foreach ($request->bahan as $i => $id_bahan) {
            $detail = new PermintaanDetail;
            $detail->permintaan_id = $permintaan->id;
            $detail->bahan_id = $id_bahan;
            $detail->jumlah_diminta = $request->jumlah[$i];
            $detail->save();
        }

        return redirect('/client/permintaan')->with('success', 'Permintaan berhasil dibuat');
    }
}
