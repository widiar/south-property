<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        $cre = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($cre)) {
            return to_route('admin.index');
        } else {
            return to_route('login')->with('status', 'Email atau Password anda salah')->withInput();
        }
    }

    public function pesanan()
    {
        $data = Pesanan::with('property')->orderBy('created_at', 'asc')->get();
        $pesan = 'Hallo apa benar dengan #nama .
Kami dengan south property telah menerima pemesanan Anda.
Terimakasih';
        $pesan = urlencode($pesan);
        return view('admin.pesanan.index', compact('data', 'pesan'));
    }

    public function approvePesanan($id)
    {
        try {
            $pesanan = Pesanan::with('property')->findOrFail($id);
            if($pesanan->property->tipe == 'Tanah'){
                $terjual = $pesanan->property->terjual + $pesanan->jumlah * 100;
                $pesanan->property->terjual = $terjual;
                if($terjual >= $pesanan->property->luas){
                    $pesanan->property->is_sold = 1;
                }
            } else {
                $pesanan->property->is_sold = 1;
            }
            $pesanan->property->save();
            $pesanan->status = 1;
            $pesanan->save();
            return response()->json('Success');
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function deletePesanan($id)
    {
        try {
            return response()->json('Sukses');
            $pesanan = Pesanan::findOrFail($id);
            $pesanan->delete();
            return response()->json('Sukses');
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login');
    }
}
