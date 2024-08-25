<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan_pembayaran as Tagihan;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        if ($request->all()) {
            $tgl_awal = $request->input('tgl_awal');
            $tgl_akhir = $request->input('tgl_akhir');
            $tgl_awal_f = $request->input('tgl_awal');
            $tgl_akhir__f = date('Y-m-d', strtotime('+1 days', strtotime($tgl_akhir)));
            $tahun = date('Y', strtotime($tgl_awal));
        } else {
            $tgl_awal = date('Y-m-d');
            $tgl_awal_f = date('Y-m-01');
            $tgl_akhir = date('Y-m-d', strtotime('-1 days', strtotime($tgl_awal)));
            $tgl_akhir__f = date('Y-m-d', strtotime('+1 days', strtotime($tgl_awal)));
            $tahun = date('Y', strtotime($tgl_awal));
        }


        $date = Carbon::now()->locale('id');
        $jml_data = Tagihan::count();
        $nominal_bayar = Tagihan::where([['status_pembayaran', 'SUKSES']], [['tanggal_invoice', 'like', $tahun . '%']])->sum('nominal_tagihan');
        $status_bayar = Tagihan::whereNotNull('status_pembayaran')->where([['tanggal_invoice', 'like', $tahun . '%']])->count('id_invoice');
        $nominal_blmbayar = Tagihan::whereNull('status_pembayaran')->where([['tanggal_invoice', 'like', $tahun . '%']])->sum('nominal_tagihan');
        $status_blmbayar = Tagihan::whereNull('status_pembayaran')->where([['tanggal_invoice', 'like', $tahun . '%']])->count('id_invoice');


        $date_bulan = date('Y-m', strtotime($tgl_akhir));
        // $t_bulanini = Tagihan::where([['waktu_transaksi', 'like', $date_bulan . '%'], ['status_pembayaran', '=', 'SUKSES']])->sum('nominal_tagihan');
        $t_bulanini = Tagihan::where([['status_pembayaran', '=', 'SUKSES']])->whereBetween('waktu_transaksi', [$tgl_awal_f, $tgl_akhir__f])->sum('nominal_tagihan');
        $t_hariini = Tagihan::where([['waktu_transaksi', 'like', $tgl_awal . '%'], ['status_pembayaran', '=', 'SUKSES']])->sum('nominal_tagihan');
        $t_kemarin = Tagihan::where([['waktu_transaksi', 'like', $tgl_akhir . '%'], ['status_pembayaran', '=', 'SUKSES']])->sum('nominal_tagihan');
        return view('home', compact('jml_data', 'nominal_blmbayar', 'nominal_bayar', 'status_blmbayar', 'status_bayar', 't_bulanini', 't_hariini', 't_kemarin', 'date', 'tgl_awal', 'tgl_akhir'));
    }
}
