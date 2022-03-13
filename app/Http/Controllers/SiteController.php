<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Pesanan;
use App\Models\Property;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $properties = Property::with('images')->where('is_sold', 0)->orderBy('count_view', 'desc')->limit(5)->get();
        $lokasiRumah = Property::with('location')->where('is_sold', 0)->where('tipe', 'Rumah')->orderBy('count_view', 'desc')->limit(6)->get();
        $lokasiTanah = Property::with('location')->where('is_sold', 0)->where('tipe', 'Tanah')->orderBy('count_view', 'desc')->limit(6)->get();
        $lokasiKomersil = Property::with('location')->where('is_sold', 0)->where('tipe', 'Komersil')->orderBy('count_view', 'desc')->limit(6)->get();
        $banners = Banner::all();
        return view('home', compact('properties', 'banners', 'lokasiRumah', 'lokasiTanah', 'lokasiKomersil'));
    }

    public function allProperty()
    {
        $properties = Property::with('images')->where('is_sold', 0)->orderBy('count_view', 'desc')->paginate(9);
        $title = 'Our Amazing Properties';
        return view('site.properties', compact('properties', 'title'));
    }

    public function property($id)
    {
        $property = Property::with(['images', 'location', 'certificates'])->findOrFail($id);
        return view('property', compact('property'));
    }

    public function propertyView($id)
    {
        try {
            $property = Property::findOrFail($id);
            $property->count_view++;
            $property->save();
            return response()->json('viewed');
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function properties($prop, $tipe, $subTipe)
    {
        if($tipe == 'jenis') {
            if($prop == 'Tanah') {
                $title = 'Tanah';
                $properties = Property::with('images')->where('is_sold', 0)->where('tipe', 'Tanah')->orderBy('count_view', 'desc')->paginate(9);
            } else {
                $sub_tipe = str_replace('-', ' ', $subTipe);
                $title = $sub_tipe;
                $properties = Property::with('images')->where('is_sold', 0)->where('sub_tipe', $sub_tipe)->orderBy('count_view', 'desc')->paginate(9);
            }
        } else if($tipe == 'lokasi'){
            $lokasi = str_replace('-', ' ', $subTipe);
            $title = $prop . ' ' . $lokasi;
            $properties = Property::with(['images', 'location' => function($q) use($lokasi) {
                $q->where('kecamatan', $lokasi);
            }])->where('is_sold', 0)->where('tipe', $prop)->orderBy('count_view', 'desc')->paginate(9);
        }
        return view('site.properties', compact('properties', 'title'));
    }

    public function popular($tipe)
    {
        $title = 'Popular ' . $tipe;
        $properties = Property::with('images')->where('tipe', $tipe)->where('is_sold', 0)->orderBy('count_view', 'desc')->paginate(9);
        return view('site.properties', compact('properties', 'title'));
    }

    public function bookProperty(Request $request, $id)
    {
        try {
            $property = Property::findOrFail($id);
            $jumlah = 1;
            if($property->tipe == 'Tanah') {
                $jumlah = $request->jumlah;
            }
            Pesanan::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'no_hp' => $request->telp,
                'harga' => $property->harga,
                'jumlah' => $jumlah,
                'property_id' => $property->id,
            ]);
            return response()->json([
                'status' => 'success',
                'msg' => 'Pemesanan berhasil, Anda akan dihubungi oleh admin kami dalam waktu 2x24 jam'
            ]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function about()
    {
        return view('site.about');
    }

    public function contact()
    {
        return view('site.contact');
    }
}
