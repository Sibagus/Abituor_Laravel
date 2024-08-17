<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Tagihan_pembayaran as Tagihan;
use Illuminate\Support\Facades\Log;

class GatewayController extends Controller
{
    protected $allowed_collecting_agents  = array('BSM');
    protected $allowed_channels = array('TELLER', 'IBANK', 'ATM', 'MBANK', 'FLAGGING');
    protected $biller_name         = 'ABITOUR';                     // UBAH VARIABEL INI
    protected $secret_key          = 'CND7gy4Fwo6hajUznM0elsR9OukT2HYmiPx18vEf';


    /**
     * Function getDebug
     *
     */
    public function getDebug()
    {
        Log::notice('REQUEST: ');
        $request = file_get_contents('php://input');
        Log::notice($request);
        $_JSON = json_decode($request, true);
        return $_JSON;
    }


    /**
     * Function Inquiry
     *
     */
    public function inquiry(Tagihan $tagihan_pembayaran)
    {
        $_JSON = $this->getDebug();
        if ($_JSON != NULL) {
            $kodeBank             = $_JSON['kodeBank'];
            $kodeChannel          = $_JSON['kodeChannel'];
            $kodeBiller           = $_JSON['kodeBiller'];
            $kodeTerminal         = $_JSON['kodeTerminal'];
            $nomorPembayaran      = $_JSON['nomorPembayaran'];
            $tanggalTransaksi     = $_JSON['tanggalTransaksi'];
            $idTransaksi          = $_JSON['idTransaksi'];
            $totalNominalInquiry  = $_JSON['totalNominalInquiry'];
        }

        // PERIKSA APAKAH SELURUH PARAMETER SUDAH LENGKAP
        if (
            empty($kodeBank) || empty($kodeChannel) || empty($kodeTerminal) ||
            empty($nomorPembayaran) || empty($tanggalTransaksi) || empty($idTransaksi)
        ) {
            $response = json_encode(array(
                'rc' => 'ERR-PARSING-MESSAGE',
                'msg' => 'Invalid Message Format'
            ));
            Log::notice('RESPONSE: ' . $response);

            echo $response;
            exit();
        }


        // PERIKSA APAKAH KODE BANK DIIZINKAN MENGAKSES WEBSERVICE INI

        if (!in_array($kodeBank, $this->allowed_collecting_agents)) {
            $response = json_encode(array(
                'rc' => 'ERR-BANK-UNKNOWN',
                'msg' => 'Collecting agent is not allowed by ' . $this->biller_name
            ));
            Log::notice('RESPONSE: ' . $response);
            echo $response;
            exit();
        }


        // PERIKSA APAKAH KODE CHANNEL DIIZINKAN MENGAKSES WEBSERVICE INI

        if (!in_array($kodeChannel, $this->allowed_channels)) {
            $response = json_encode(array(
                'rc' => 'ERR-CHANNEL-UNKNOWN',
                'msg' => 'Channel is not allowed by ' . $this->biller_name
            ));
            Log::notice('RESPONSE: ' . $response);
            echo $response;
            exit();
        }


        // PERIKSA APAKAH CHECKSUM VALID

        if (
            sha1($_JSON['nomorPembayaran'] . $this->secret_key . $_JSON['tanggalTransaksi']) !=
            $_JSON['checksum']
        ) {
            $response = json_encode(array(
                'rc' => 'ERR-SECURE-HASH',
                'msg' => 'H2H Checksum is invalid'
            ));
            Log::notice('RESPONSE: ' . $response);

            echo $response;
            exit();
        }


        $data_cek_available = $tagihan_pembayaran->where('nomor_siswa', $nomorPembayaran)
            ->orderBy('tanggal_invoice', 'desc')
            ->first();
        Log::notice('RESPONSE: ' . $data_cek_available);

        if ($data_cek_available['nama'] == '') {
            // APABILA NAMA TIDAK DITEMUKAN 
            $response = json_encode(array(
                'rc' => 'ERR-NOT-FOUND',
                'msg' => 'Nomor Tidak Ditemukan'
            ));
            Log::notice('RESPONSE: ' . $response);

            echo $response;
            exit();
        }



        $data_tagihan = $tagihan_pembayaran->where('nomor_siswa', $nomorPembayaran)
            ->orderBy('tanggal_invoice', 'desc')
            ->first();
        Log::notice('RESPONSE: ' . $data_tagihan);



        if ($data_tagihan['nama'] == '') {
            // APABILA tidak ada nama yang bisa diambil berarti semua sudah SUKSES / terbayar 
            $response = json_encode(array(
                'rc' => 'ERR-ALREADY-PAID',
                'msg' => 'Sudah Terbayar'
            ));
            Log::notice('RESPONSE: ' . $response);

            echo $response;
            exit();
        }


        $nama = $data_tagihan['nama'];
        $id_tagihan = $data_tagihan['id_invoice'];
        $all_info = $data_tagihan['informasi'];
        $info1 = substr($all_info, 0, 30);
        $info2 = substr($all_info, 30, 30);
        $arr_informasi = [
            ['label_key' => 'Info1', 'label_value' => $info1],
            ['label_key' => 'Info2', 'label_value' => $info2],
        ];
        $nominalTagihan = intval($data_tagihan['nominal_tagihan']);
        $arr_rincian = [
            [
                'kode_rincian' => 'TAGIHAN',
                'deskripsi' => 'TAGIHAN',
                'nominal' => $nominalTagihan
            ],
        ];

        $data_inquiry = [
            'rc'                => 'OK',
            'msg'               => 'Inquiry Succeeded',
            'nomorPembayaran'   => $nomorPembayaran,
            'idPelanggan'       => $nomorPembayaran,
            'nama'              => $nama,
            'totalNominal'      => $nominalTagihan,
            'informasi'         => $arr_informasi,
            'rincian'           => $arr_rincian,
            'idTagihan'         => $id_tagihan,
        ];

        $response_inquiry = json_encode($data_inquiry);
        $this->debugLog('RESPONSE: ' . $response_inquiry);
        header('Content-Type: application/json');
        echo $response_inquiry;
        exit();
    }


    /**
     * Function Reversal
     *
     */
    public function reversal()
    {
        $_JSON = $this->getDebug();
        if ($_JSON != NULL) {
            $kodeBank             = $_JSON['kodeBank'];
            $kodeChannel             = $_JSON['kodeChannel'];
            $kodeTerminal             = $_JSON['kodeTerminal'];
            $nomorPembayaran         = $_JSON['nomorPembayaran'];
            $idTagihan             = $_JSON['idTagihan'];
            $tanggalTransaksi         = $_JSON['tanggalTransaksi'];
            $tanggalTransaksiAsal         = $_JSON['tanggalTransaksiAsal'];
            $idTransaksi             = $_JSON['idTransaksi'];
            $totalNominal             = $_JSON['totalNominal'];
            $nomorJurnalPembukuan         = $_JSON['nomorJurnalPembukuan'];
        }


        // MENOLAK REVERSAL
        $response = json_encode(array(
            'rc' => 'ERR-REVERSAL-DENIED',
            'msg' => 'Reversal ditolak. Pembayaran sudah update ke DB di ' . $this->biller_name
        ));

        Log::notice('RESPONSE: ' . $response);

        echo $response;
    }

    public function payment(Tagihan $tagihan_pembayaran)
    {
        $_JSON = $this->getDebug();
        if ($_JSON != NULL) {
            $kodeBank             = $_JSON['kodeBank'];
            $kodeChannel             = $_JSON['kodeChannel'];
            $kodeBiller             = $_JSON['kodeBiller'];
            $kodeTerminal             = $_JSON['kodeTerminal'];
            $nomorPembayaran         = $_JSON['nomorPembayaran'];
            $idTagihan             = $_JSON['idTagihan'];
            $tanggalTransaksi         = $_JSON['tanggalTransaksi'];
            $idTransaksi             = $_JSON['idTransaksi'];
            $totalNominal             = $_JSON['totalNominal'];
            $nomorJurnalPembukuan        = $_JSON['nomorJurnalPembukuan'];
        }


        // PERIKSA APAKAH SELURUH PARAMETER SUDAH LENGKAP

        if (
            empty($kodeBank) || empty($kodeChannel) || empty($kodeTerminal) ||
            empty($nomorPembayaran) || empty($tanggalTransaksi) || empty($idTransaksi) ||
            empty($totalNominal) || empty($nomorJurnalPembukuan)
        ) {
            $response = json_encode(array(
                'rc' => 'ERR-PARSING-MESSAGE',
                'msg' => 'Invalid Message Format'
            ));
            Log::notice('RESPONSE: ' . $response);

            echo $response;
            exit();
        }


        // PERIKSA APAKAH KODE BANK DIIZINKAN MENGAKSES WEBSERVICE INI
        if (!in_array($kodeBank, $this->allowed_collecting_agents)) {
            $response = json_encode(array(
                'rc' => 'ERR-BANK-UNKNOWN',
                'msg' => 'Collecting agent is not allowed by ' . $biller_name
            ));
            Log::notice('RESPONSE: ' . $response);

            echo $response;
            exit();
        }

        // PERIKSA APAKAH KODE CHANNEL DIIZINKAN MENGAKSES WEBSERVICE INI

        if (!in_array($kodeChannel, $this->allowed_channels)) {
            $response = json_encode(array(
                'rc' => 'ERR-CHANNEL-UNKNOWN',
                'msg' => 'Channel is not allowed by ' . $this->biller_name
            ));
            Log::notice('RESPONSE: ' . $response);
            echo $response;
            exit();
        }

        // PERIKSA APAKAH CHECKSUM VALID
        if (sha1($_JSON['nomorPembayaran'] . $this->secret_key . $_JSON['tanggalTransaksi'] . $totalNominal . $nomorJurnalPembukuan) != $_JSON['checksum']) {
            $response = json_encode(array(
                'rc' => 'ERR-SECURE-HASH',
                'msg' => 'H2H Checksum is invalid'
            ));
            Log::notice('RESPONSE: ' . $response);

            echo $response;
            exit();
        }


        $data_cek_available = $tagihan_pembayaran->where('nomor_siswa', $nomorPembayaran)
            ->orderBy('tanggal_invoice', 'desc')
            ->first();
        Log::notice('RESPONSE: ' . $data_cek_available);

        if ($data_cek_available['nama'] == '') {
            // APABILA NAMA TIDAK DITEMUKAN 
            $response = json_encode(array(
                'rc' => 'ERR-NOT-FOUND',
                'msg' => 'Nomor Tidak Ditemukan'
            ));
            Log::notice('RESPONSE: ' . $response);

            echo $response;
            exit();
        }



        $data_tagihan = $tagihan_pembayaran->where('nomor_siswa', $nomorPembayaran)
            ->orderBy('tanggal_invoice', 'desc')
            ->first();
        Log::notice('RESPONSE: ' . $data_tagihan);



        if ($data_tagihan['nama'] == '') {
            // APABILA tidak ada nama yang bisa diambil berarti semua sudah SUKSES / terbayar 
            $response = json_encode(array(
                'rc' => 'ERR-ALREADY-PAID',
                'msg' => 'Sudah Terbayar'
            ));
            Log::notice('RESPONSE: ' . $response);

            echo $response;
            exit();
        }


        $nama = $data_tagihan['nama'];
        $id_tagihan = $data_tagihan['id_invoice'];
        $all_info = $data_tagihan['informasi'];
        $info1 = substr($all_info, 0, 30);
        $info2 = substr($all_info, 30, 30);
        $arr_informasi = [
            ['label_key' => 'Info1', 'label_value' => $info1],
            ['label_key' => 'Info2', 'label_value' => $info2],
        ];
        $nominalTagihan = intval($data_tagihan['nominal_tagihan']);
        $arr_rincian = [
            [
                'kode_rincian' => 'TAGIHAN',
                'deskripsi' => 'TAGIHAN',
                'nominal' => $nominalTagihan
            ],
        ];

        $data_inquiry = [
            'rc'            => 'OK',
            'msg'             => 'Inquiry Succeeded',
            'nomorPembayaran'     => $nomorPembayaran,
            'idPelanggan'         => $nomorPembayaran,
            'nama'             => $nama,
            'totalNominal'         => $nominalTagihan,
            'informasi'         => $arr_informasi,
            'rincian'         => $arr_rincian,
            'idTagihan'        => $id_tagihan,
        ];

        if ($nominalTagihan != $totalNominal) {
            // APABILA [CLOSE PATYMENT]
            // MAKA NILAI TAGIHAN DI DALAM DATABASE HARUS SAMA DENGAN YANG DIBAYARKAN	
            $response = json_encode(array(
                'rc'     => 'ERR-PAYMENT-WRONG-AMOUNT',
                'msg'     => 'Terdapat kesalahan nilai pembayaran ' . $totalNominal . ' tidak sama
						dengan tagihan ' . $nominalTagihan
            ));
            Log::notice('RESPONSE: ' . $response);

            echo $response;
            exit();
        }



        //// PAYMENT /////
        Log::notice("START PAYMENT");
        try {
            DB::beginTransaction();

            $status = "SUKSES";
            $waktu_pembayaran = now();  // Menggunakan helper `now()` untuk mendapatkan waktu saat ini.

            // Melakukan update pada tabel `tagihan_pembayaran`
            $tagihan_pembayaran
                ->where('id_invoice', $id_tagihan)
                ->update([
                    'status_pembayaran' => $status,
                    'nomor_jurnal_pembukuan' => $nomorJurnalPembukuan,
                    'waktu_transaksi' => $waktu_pembayaran,
                    'channel_pembayaran' => $kodeChannel,
                ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $response = json_encode([
                'rc' => 'ERR-DB',
                'msg' => 'Error saat Update Transaksi',
            ]);

            Log::error('RESPONSE: ' . $response);
            echo $response;
            exit();
        }
        Log::notice("END PAYMENT");
        //// ENDPAYMENT /////


        $data_payment = $data_inquiry;
        $data_payment['msg'] = 'Payment Succeded';
        Log::notice($data_payment);


        $response_payment = json_encode($data_payment);
        Log::notice('RESPONSE: ' . $response_payment);
        header('Content-Type: application/json');
        echo $response_payment;
        exit();
    }
}
