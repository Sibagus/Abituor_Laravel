<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan_pembayaran as Tagihan;

class HomeController extends Controller
{
    public function index()
    {
        $jml_data = Tagihan::count();
        $nominal_bayar = Tagihan::where('status_pembayaran', 'SUKSES')->sum('nominal_tagihan');
        $nominal_blmbayar  = Tagihan::whereNull('status_pembayaran')->sum('nominal_tagihan');
        $status_blmbayar = Tagihan::whereNull('status_pembayaran')->count('id_invoice');
        $status_bayar = Tagihan::whereNotNull('status_pembayaran')->count('id_invoice');
        return view('home', compact('jml_data', 'nominal_blmbayar', 'nominal_bayar', 'status_blmbayar', 'status_bayar'));
    }
}
