<?php
namespace App\Exports;

use App\Models\Tagihan_pembayaran;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportUser implements FromView
{
    // public function __construct($tgl_awal = "2024-01-01", $tgl_akhir ="2024-10-10")
    public function __construct($tgl_awal, $tgl_akhir)
    {
        $this->tgl_awal = $tgl_awal;
        $this->tgl_akhir = $tgl_akhir;
    }

    public function view(): View
    {
        return view('tagihan_excel', [
            'data' => Tagihan_pembayaran::query()->whereBetween('tanggal_invoice', [$this->tgl_awal, $this->tgl_akhir])->orderBy('id_invoice', 'desc')->get()
        ]);
    }
}
