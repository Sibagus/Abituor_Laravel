<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Va extends Model
{
    use HasFactory;

    // protected $table = 'my_flights';
    protected $fillable = [
        'tanggal_invoice',
        'nomor_siswa',
        'nama',
        'nominal_tagihan',
        'informasi',
        'nomor_jurnal_pembukuan',
        'waktu_transaksi',
        'channel_pembayaran',
        'status_pembayaran'
    ];
}
