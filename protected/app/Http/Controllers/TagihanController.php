<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Exports\ExportUser;
use Alert;

class TagihanController extends Controller
{
    public function index(Request $request)
    {
        // $t = DB::table('tagihan_pembayaran')->orderBy('id_invoice', 'desc')->first();
        // dd($t->id_invoice + 1);
        if ($request->all()) {
            $tgl_awal = $request->input('tgl_awal');
            $tgl_akhir = $request->input('tgl_akhir');
        } else {
            $tgl_awal = date('Y-m-01');
            $tgl_akhir = date('Y-m-d');
        }


        $data = DB::table('tagihan_pembayaran')->whereBetween('tanggal_invoice', [$tgl_awal, $tgl_akhir])->orderBy('id_invoice', 'desc')->get();
        return view('tagihan', compact('data', 'tgl_awal', 'tgl_akhir'));
    }


    public function export($param1 = "", $param2 = "")
    {

        return Excel::download(new ExportUser($param1, $param2), 'tagihan_' . $param1 . '_' . $param2 . '.xlsx');
    }


    public function form(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'nik' => 'required|integer|min_digits:16',
            'nominal' => 'required|numeric',
            'informasi' => 'required',
        ];

        $message = [
            'nama.required' => 'Nama harus diisi',
            'nominal.required' => 'Nominal harus diisi',
            'nominal.numeric' => 'Nominal harus angka',
            'nik.required' => 'Nik harus diisi',
            'nik.integer' => 'Nik harus angka',
            'nik.min_digits' => 'Nik harus 16 digit',
            'informasi.required' => 'Informasi harus diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $get_last = DB::table('tagihan_pembayaran')->orderBy('id_invoice', 'desc')->first();
        $id_invoice = $get_last->id_invoice + 1;

        $id = $request->id;

        $data = [
            'nik' => $request->nik,
            'nama' => $request->nama,
            'nominal_tagihan' => $request->nominal,
            'informasi' => $request->informasi,
        ];

        if ($id == null) {
            try {
                $data['id_invoice'] = $id_invoice;
                $data['nomor_siswa'] = mt_rand(111111, 999999);
                $data['tanggal_invoice'] = date('Y-m-d');
                // $data['waktu_transaksi'] = date('Y-m-d H:i:s');
                $data['created_at'] = date('Y-m-d H:i:s');

                DB::table('tagihan_pembayaran')->insert($data);
                Alert::success('Berhasil', 'Data Berhasil Ditambah');
            } catch (\Throwable $th) {
                Alert::error('Gagal', $th->getMessage());
            }
        } else {
            try {
                $data['updated_at'] = date('Y-m-d H:i:s');
                DB::table('tagihan_pembayaran')->where('id_invoice', $id)->update($data);
                Alert::success('Berhasil', 'Data Berhasil Diupdate');
            } catch (\Throwable $th) {
                Alert::error('Gagal', $th->getMessage());
            }
        }
        return redirect()->back();
    }

    public function get_ajax(Request $request)
    {
        $id = $request->id;
        $data = DB::table('tagihan_pembayaran')->where('id_invoice', $id)->first();
        return response()->json($data, 200);
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        try {
            DB::table('tagihan_pembayaran')->where('id_invoice', $id)->delete();
            // $data->delete();
            Alert::success('Berhasil', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Data Gagal Dihapus');
        }
        return redirect()->back();
    }
}
