<?php

namespace App\Http\Controllers;

use App\Models\Va;
use App\Models\Tagihan_pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Welcome'
        ], 200);
    }

    public function en($pass = "")
    {
        return response()->json([
            'message' => bcrypt($pass)
        ], 200);
    }

    public function data()
    {
        return response()->json([
            'message' => 'success',
            'data' => Va::all()
        ], 200);
    }

    public function va($no = "")
    {
        if ($no != "") {
            return response()->json([
                'message' => 'success',
                'data' => Tagihan_pembayaran::where('nomor_siswa', $no)->first()
            ], 200);
        }

        return response()->json([
            'message' => 'success',
            'data' => 'No Data'
        ], 200);
    }

    public function create_va(Request $request)
    {
        // set validation
        $validator = Validator::make($request->all(), [
            'id_invoice' => 'required',
            'tanggal_invoice' => 'required',
            'nomor_siswa' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'nominal_tagihan' => 'required',
            'informasi' => 'required'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // print_r($request->post());
        $values = array(
            'id_invoice' => $request->id_invoice,
            'tanggal_invoice' => $request->tanggal_invoice,
            'nomor_siswa' => $request->nomor_siswa,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'nominal_tagihan' => $request->nominal_tagihan,
            'informasi' => $request->informasi
        );
        try {
            $ins = Tagihan_pembayaran::create($values);
            return response()->json([
                'message' => 'success',
                'data' => $ins
            ], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '1062') {
                return response()->json([
                    'message' => 'Duplicate Entry'
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Error'
                ], 200);
            }
        }
    }

    public function update_va(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_invoice' => 'required',
            'tanggal_invoice' => 'required',
            'nomor_siswa' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'nominal_tagihan' => 'required',
            'informasi' => 'required'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // print_r($request->post());
        $values = array(
            'tanggal_invoice' => $request->tanggal_invoice,
            'nomor_siswa' => $request->nomor_siswa,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'nominal_tagihan' => $request->nominal_tagihan,
            'informasi' => $request->informasi
        );

        try {
            $upd = Tagihan_pembayaran::where('id_invoice', $request->id_invoice)->update($values);
            return response()->json([
                'message' => 'success',
                'data' => $upd
            ], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => 'Error'
            ], 200);
        }

    }

    public function delete_va(Request $request)
    {
        // set validation
        $validator = Validator::make($request->all(), [
            'id_invoice' => 'required'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // print_r($request->post());
        $values = array(
            'id_invoice' => $request->id_invoice
        );

        try {
            $del = Tagihan_pembayaran::where($values)->delete();
            return response()->json([
                'message' => 'success',
                'data' => $del
            ], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => 'Error'
            ], 200);
        }

    }

}
