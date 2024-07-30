<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Alert;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        //echo url('');
        return view('login');
    }

    public function validLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
        ];

        $message = [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }


        $data_login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data_login)) {
            // Auth::user();
            $request->session()->regenerate();
            return redirect()->intended('/home');
        } else {
            Alert::error('Gagal', 'Username atau Password Salah');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    // User
    public function user()
    {
        $data = User::all();
        return view('user', compact('data'));
    }

    public function addUser(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => ['required', 'email:rfc,dns'],
            'password' => 'required|min:8',
        ];

        $message = [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',

        ];

        $id = $request->id;

        if ($id == null) {
            $rules['email'][] = 'unique:users,email';
            $message['email.unique'] = 'Email sudah digunakan';
        }

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }


        $data = [
            'password' => Hash::make($request->password),
        ];


        if ($id == null) {
            $data['name'] = $request->name;
            $data['email'] = $request->email;

            try {
                User::create($data);
                Alert::success('Berhasil', 'Data Berhasil Ditambah');
            } catch (\Throwable $th) {
                Alert::error('Gagal', 'Data Gagal Ditambahkan');
            }
        } else {
            try {
                $id_user = User::find($id);
                $id_user->update($data);
                Alert::success('Berhasil', 'Password Berhasil Diganti');
            } catch (\Throwable $th) {
                Alert::error('Gagal', 'Password Gagal Diganti');
            }
        }

        return redirect()->back();
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        try {
            $data = User::find($id);
            $data->delete();
            Alert::success('Berhasil', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Data Gagal Dihapus');
        }
        return redirect()->back();
    }
}
