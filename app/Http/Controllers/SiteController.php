<?php

namespace App\Http\Controllers;

use App\Mail\NotaMail;
use App\Models\Banner;
use App\Models\Pesanan;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    private function makeLocation($tipe)
    {
        $cek = Property::with('location')->where('is_sold', 0)->where('tipe', $tipe)->orderBy('count_view', 'desc')->get();
        $data = [];
        foreach ($cek as $lokasi) {
            if (count($data) > 6) break;
            if (!in_array($lokasi->location->kecamatan, $data)) {
                array_push($data, $lokasi->location->kecamatan);
            }
        }
        return $data;
    }

    public function index()
    {
        $properties = Property::with('images')->where('is_sold', 0)->orderBy('count_view', 'desc')->limit(5)->get();
        $lokasiRumah = $this->makeLocation('Rumah');
        $lokasiTanah = $this->makeLocation('Tanah');
        $lokasiKomersil = $this->makeLocation('Komersial');
        $banners = Banner::all();
        return view('home', compact('properties', 'banners', 'lokasiRumah', 'lokasiTanah', 'lokasiKomersil'));
    }

    public function allProperty(Request $request)
    {
        if (isset($request->search)) {
            if (app()->getLocale() == 'id')
                $properties = Property::with('images')->where('is_sold', 0)->where('nama', 'like', '%' . $request->search . '%')->orderBy('count_view', 'desc')->paginate(9);
            else
                $properties = Property::with('images')->where('is_sold', 0)->where('title_en', 'like', '%' . $request->search . '%')->orderBy('count_view', 'desc')->paginate(9);
        } else $properties = Property::with('images')->where('is_sold', 0)->orderBy('count_view', 'desc')->paginate(9);
        $title = __('site.all_property');
        return view('site.properties', compact('properties', 'title'));
    }

    public function property($id)
    {
        $pesan = 'Saya Ingin Memesan';
        $pesan = urlencode($pesan);
        $property = Property::with(['images', 'location', 'certificates'])->findOrFail($id);
        return view('property', compact('property', 'pesan'));
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

    public function properties(Request $request, $prop, $tipe, $subTipe)
    {
        if ($tipe == 'jenis') {
            if ($prop == 'Tanah') {
                $title = __('site.tanah');
                if (isset($request->search)) {
                    if (app()->getLocale() == 'id')
                        $properties = Property::with('images')->where('is_sold', 0)->where('tipe', 'Tanah')->where('nama', 'like', '%' . $request->search . '%')->orderBy('count_view', 'desc')->paginate(9);
                    else
                        $properties = Property::with('images')->where('is_sold', 0)->where('tipe', 'Tanah')->where('title_en', 'like', '%' . $request->search . '%')->orderBy('count_view', 'desc')->paginate(9);
                } else $properties = Property::with('images')->where('is_sold', 0)->where('tipe', 'Tanah')->orderBy('count_view', 'desc')->paginate(9);
            } else {
                $sub_tipe = str_replace('-', ' ', $subTipe);
                $title = __('site.' . strtolower($subTipe));
                if (isset($request->search)) {
                    $properties = Property::with('images')->where('is_sold', 0)->where('sub_tipe', $sub_tipe)->where('nama', 'like', '%' . $request->search . '%')->orderBy('count_view', 'desc')->paginate(9);
                } else $properties = Property::with('images')->where('is_sold', 0)->where('sub_tipe', $sub_tipe)->orderBy('count_view', 'desc')->paginate(9);
            }
        } else if ($tipe == 'lokasi') {
            $lokasi = str_replace('-', ' ', $subTipe);
            if (app()->getLocale() == 'id') $kat = 'di';
            else $kat = 'in';
            $title = __('site.' . strtolower($prop)) . ' ' . $kat . ' ' . $lokasi;
            if (isset($request->search)) {
                if (app()->getLocale() == 'id')
                    $properties = Property::with(['images', 'location' => function ($q) use ($lokasi) {
                        $q->where('kecamatan', $lokasi);
                    }])->where('is_sold', 0)->where('tipe', $prop)->where('nama', 'like', '%' . $request->search . '%')->orderBy('count_view', 'desc')->paginate(9);
                else
                    $properties = Property::with(['images', 'location' => function ($q) use ($lokasi) {
                        $q->where('kecamatan', $lokasi);
                    }])->where('is_sold', 0)->where('tipe', $prop)->where('title_en', 'like', '%' . $request->search . '%')->orderBy('count_view', 'desc')->paginate(9);
            } else $properties = Property::with(['images', 'location' => function ($q) use ($lokasi) {
                $q->where('kecamatan', $lokasi);
            }])->where('is_sold', 0)->where('tipe', $prop)->orderBy('count_view', 'desc')->paginate(9);
        }
        return view('site.properties', compact('properties', 'title'));
    }

    public function popular(Request $request, $tipe)
    {
        $title = 'Popular ' . $tipe;
        if (isset($request->search)) {
            if (app()->getLocale() == 'id')
                $properties = Property::with('images')->where('tipe', $tipe)->where('is_sold', 0)->where('nama', 'like', '%' . $request->search . '%')->orderBy('count_view', 'desc')->paginate(9);
            else
                $properties = Property::with('images')->where('tipe', $tipe)->where('is_sold', 0)->where('title_en', 'like', '%' . $request->search . '%')->orderBy('count_view', 'desc')->paginate(9);
        } else $properties = Property::with('images')->where('tipe', $tipe)->where('is_sold', 0)->orderBy('count_view', 'desc')->paginate(9);
        return view('site.properties', compact('properties', 'title'));
    }

    public function checkProperty($id)
    {
        try {
            $property = Property::find($id);
            if ($property->is_sold == 1 || $property->is_book == 1) {
                return response()->json([
                    'status' => 'booked',
                    'msg' => __('site.pesanan.booked')
                ]);
            }
            return response()->json([
                'status' => 'success',
                'msg' => 'Property is available'
            ]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function bookProperty(Request $request, $id)
    {
        try {
            $property = Property::findOrFail($id);
            $jumlah = 1;
            // if($property->tipe == 'Tanah') {
            //     $jumlah = $request->jumlah;
            // }
            $bukti = $request->bukti;
            $dataPesanan = Pesanan::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'no_hp' => $request->telp,
                'harga' => $property->harga,
                'jumlah' => $jumlah,
                'property_id' => $property->id,
                'gender' => $request->jenis_kelamin,
                'bukti_bayar' => $bukti->hashName()
            ]);
            $bukti->storeAs('public/pesanan/bukti_bayar', $bukti->hashName());

            $property->is_book = 1;
            $property->save();

            Mail::to($request->email)->send(new NotaMail($dataPesanan));

            return response()->json([
                'status' => 'success',
                'msg' => __('site.pesanan.berhasil')
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

    public function language($lang)
    {
        $arrLang = ['id', 'en'];
        if (in_array($lang, $arrLang)) {
            session()->put('locale', $lang);
        } else {
            abort(404);
        }
        return redirect()->back();
    }
}
