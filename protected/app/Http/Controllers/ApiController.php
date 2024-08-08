<?php

namespace App\Http\Controllers;

use App\Models\Va;
use App\Models\Tagihan_pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
        if ($request->isMethod('post')) {
            // set validation
            $validator = Validator::make($request->all(), [
                'id_invoice' => 'required',
                'tanggal_invoice' => 'required',
                'id_jamaah' => 'required|min:6',
                'nik' => 'required',
                'nama' => 'required',
                'nominal_tagihan' => 'numeric',
                'informasi' => 'required'
            ]);

            //if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
            if (DB::table('tagihan_pembayaran')->where('nomor_siswa', $request->id_jamaah)->doesntExist()) {

                // print_r($request->post());
                $values = array(
                    'id_invoice' => $request->id_invoice,
                    'tanggal_invoice' => $request->tanggal_invoice,
                    'nomor_siswa' => $request->id_jamaah,
                    'nik' => $request->nik,
                    'nama' => $request->nama,
                    'nominal_tagihan' => $request->nominal_tagihan,
                    'informasi' => $request->informasi
                );

                $respondata = array(
                    'id_invoice' => $request->id_invoice,
                    'tanggal_invoice' => $request->tanggal_invoice,
                    'id_jamaah' => $request->id_jamaah,
                    'nik' => $request->nik,
                    'nama' => $request->nama,
                    'nominal_tagihan' => $request->nominal_tagihan,
                    'informasi' => $request->informasi
                );

                try {
                    $ins = Tagihan_pembayaran::create($values);
                    return response()->json([
                        'message' => 'success',
                        'data' => $respondata
                    ], 200);
                } catch (\Illuminate\Database\QueryException $e) {
                    $errorCode = $e->errorInfo[1];
                    if ($errorCode == '1062') {
                        return response()->json([
                            'message' => 'Duplicate Entry id Invoice'
                        ], 200);
                    } else {
                        return response()->json([
                            'message' => 'Error'
                        ], 200);
                    }
                }
            } else {
                return response()->json([
                    'message' => 'Duplicate Entry id Jamaah'
                ], 200);

            }
        } else {
            return response()->json([
                'message' => 'Method not allowed'
            ], 405);
        }
    }

    public function update_va(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'id_invoice' => 'required',
                'tanggal_invoice' => 'required',
                'id_jamaah' => 'required|min:6',
                'nik' => 'required',
                'nama' => 'required',
                'nominal_tagihan' => 'numeric',
                'informasi' => 'required'
            ]);

            //if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            // print_r($request->post());
            $values = array(
                'tanggal_invoice' => $request->tanggal_invoice,
                'nomor_siswa' => $request->id_jamaah,
                'nik' => $request->nik,
                'nama' => $request->nama,
                'nominal_tagihan' => $request->nominal_tagihan,
                'informasi' => $request->informasi
            );


            $respondata = array(
                'tanggal_invoice' => $request->tanggal_invoice,
                'id_jamaah' => $request->id_jamaah,
                'nik' => $request->nik,
                'nama' => $request->nama,
                'nominal_tagihan' => $request->nominal_tagihan,
                'informasi' => $request->informasi
            );


            try {
                $upd = Tagihan_pembayaran::where('id_invoice', $request->id_invoice)->update($values);
                if ($upd != 0) {
                    return response()->json([
                        'message' => 'success',
                        'data' => $respondata
                    ], 200);
                } else {
                    return response()->json([
                        'message' => 'id_invoice tidak ditemukan',
                        'data' => $request->id_invoice
                    ], 200);
                }
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json([
                    'message' => 'Error'
                ], 200);
            }


        } else {
            return response()->json([
                'message' => 'Method not allowed'
            ], 405);
        }
    }

    public function delete_va(Request $request)
    {
        if ($request->isMethod('post')) {
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
                if ($del != 0) {
                    return response()->json([
                        'message' => 'success',
                        'data' => $del
                    ], 200);
                } else {
                    return response()->json([
                        'message' => 'id Invoice tidak ditemukan',
                        'data' => $del
                    ], 200);
                }
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json([
                    'message' => 'Error'
                ], 200);
            }
        } else {
            return response()->json([
                'message' => 'Method not allowed'
            ], 405);
        }
    }
}
