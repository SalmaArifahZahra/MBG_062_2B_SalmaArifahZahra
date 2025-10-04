<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BahanBaku;
use App\Models\Permintaan;
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
}
