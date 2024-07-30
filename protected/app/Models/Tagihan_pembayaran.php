<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan_pembayaran extends Model
{
    use HasFactory;

    protected $table = 'tagihan_pembayaran';
    protected $fillable = [
        'id_invoice',
        'tanggal_invoice',
        'nomor_siswa',
        'nik',
        'nama',
        'nominal_tagihan',
        'informasi',
        'nomor_jurnal_pembukuan',
        'waktu_transaksi',
        'channel_pembayaran',
        'status_pembayaran'
    ];

    protected $guarded = [];
}
