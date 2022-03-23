<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Property;
use App\Models\PropertyImages;
use App\Models\PropertyLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Property::with('location')->get();
        return view('admin.property.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Http::timeout(20)->connectTimeout(20)->get('https://dev.farizdotid.com/api/daerahindonesia/kota', [
            'id_provinsi' => 51
        ])->object()->kota_kabupaten;
        $kabupaten = [];
        foreach ($response as $res) {
            array_push($kabupaten, [
                'id' => $res->id . "|" . $res->nama,
                'text' => $res->nama
            ]);
        }
        $kabupaten = json_decode(json_encode($kabupaten));
        $facilities = Facility::all();
        return view('admin.property.create', compact('kabupaten', 'facilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // return response()->json($request->all());
            // $lokasi = NULL;
            $provinsi = explode('|', $request->provinsi);
            $kabupaten = explode('|', $request->kabupaten);
            $kecamatan = explode('|', $request->kecamatan);
            $kelurahan = explode('|', $request->kelurahan);
            $location = PropertyLocation::create([
                'id_provinsi' => $provinsi[0],
                'provinsi' => $provinsi[1],
                'id_kabupaten' => $kabupaten[0],
                'kabupaten' => $kabupaten[1],
                'id_kecamatan' => $kecamatan[0],
                'kecamatan' => $kecamatan[1],
                'id_kelurahan' => $kelurahan[0],
                'kelurahan' => $kelurahan[1],
                'area' => $request->area,
                'latlng' => $request->latlng,
            ]);
            $data = Property::create([
                'nama' => $request->nama,
                'deskripsi' => json_encode([
                    'en' => $request->deskripsi_en,
                    'id' => $request->deskripsi_id
                ]),
                'harga' => str_replace(',', '', $request->harga),
                'luas' => $request->luas,
                'tipe' => $request->tipe,
                'fasilitas' => $request->fasilitas ? json_encode($request->fasilitas) : 'tanah',
                'harga_satuan' => $request->harga_satuan ? str_replace(',', '', $request->harga_satuan) : 0,
                'sub_tipe' => $request->sub_tipe,
                'location_id' => $location->id,
                'luas_bangunan' => $request->luasBangunan,
                'lebar' => $request->lebar,
                'lantai' => $request->lantai,
                'kamar_mandi' => $request->kamar_mandi,
                'kamar_tidur' => $request->kamar_tidur,
                'kamar_pegawai' => $request->kamar_pegawai,
                'kamar_mandi_pegawai' => $request->kamar_mandi_pegawai,
            ]);

            if (isset($request->file_sertif)) {
                foreach ($request->file_sertif as $key => $value) {
                    $data->certificates()->create([
                        'name' => $request->sertifikat[$key],
                        'file' => $value->hashName(),
                    ]);
                    $value->storeAs('public/properties/certificates', $value->hashName());
                }
            }

            // save foto
            foreach ($request->fotofile as $file) {
                $data->images()->create([
                    'name' => $file->hashName()
                ]);
                $file->storeAs('public/properties/image', $file->hashName());
            }
            $request->session()->flash('success', 'Berhasil menambah data');
            return response()->json('Sukses');
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Property::with('images')->findOrFail($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Property::with('location')->findOrFail($id);
        $response = Http::timeout(20)->connectTimeout(20)->get('https://dev.farizdotid.com/api/daerahindonesia/kota', [
            'id_provinsi' => 51
        ])->object()->kota_kabupaten;
        $kabupaten = [];
        foreach ($response as $res) {
            array_push($kabupaten, [
                'id' => $res->id . "|" . $res->nama,
                'text' => $res->nama
            ]);
        }
        $kabupaten = json_decode(json_encode($kabupaten));
        $facilities = Facility::all();
        // dd($data->location->area);
        return view('admin.property.edit', compact('data', 'kabupaten', 'facilities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            // return response()->json($request->all());

            $provinsi = explode('|', $request->provinsi);
            $kabupaten = explode('|', $request->kabupaten);
            $kecamatan = explode('|', $request->kecamatan);
            $kelurahan = explode('|', $request->kelurahan);

            $data = Property::findOrFail($id);
            $data->location->id_provinsi = $provinsi[0];
            $data->location->provinsi = $provinsi[1];
            $data->location->id_kabupaten = $kabupaten[0];
            $data->location->kabupaten = $kabupaten[1];
            $data->location->id_kecamatan = $kecamatan[0];
            $data->location->kecamatan = $kecamatan[1];
            $data->location->id_kelurahan = $kelurahan[0];
            $data->location->kelurahan = $kelurahan[1];
            $data->location->area = $request->area;
            $data->location->latlng = $request->latlng;
            $data->location->save();

            $data->nama = $request->nama;
            $data->deskripsi = json_encode([
                'en' => $request->deskripsi_en,
                'id' => $request->deskripsi_id
            ]);
            $data->harga = str_replace(',', '', $request->harga);
            $data->luas = $request->luas;
            $data->tipe = $request->tipe;
            $data->fasilitas = $request->fasilitas ? json_encode($request->fasilitas) : 'tanah';
            $data->harga_satuan = $request->harga_satuan ? str_replace(',', '', $request->harga_satuan) : 0;
            $data->sub_tipe = $request->tipe == 'Tanah' ? 'Tanah' : $request->sub_tipe;
            $data->luas_bangunan = $request->luasBangunan;
            $data->lebar = $request->lebar;
            $data->lantai = $request->lantai;
            $data->kamar_mandi = $request->kamar_mandi;
            $data->kamar_tidur = $request->kamar_tidur;
            $data->kamar_pegawai = $request->kamar_pegawai;
            $data->kamar_mandi_pegawai = $request->kamar_mandi_pegawai;

            // save foto
            if (isset($request->fotofile)) {
                foreach ($request->fotofile as $file) {
                    $data->images()->create([
                        'name' => $file->hashName()
                    ]);
                    $file->storeAs('public/properties/image', $file->hashName());
                }
            }

            if (isset($request->hapus_sertif)) {
                foreach ($request->hapus_sertif as $hapus) {
                    $data->certificates()->find($hapus)->delete();
                }
            }

            if (isset($request->sertifikat)) {
                foreach ($request->sertifikat as $key => $value) {
                    $cekUpdate = $data->certificates()->where('id', $key)->first();
                    if ($cekUpdate) {
                        $cekUpdate->name = $value;
                        if (isset($request->file_sertif[$key])) {
                            $cekUpdate->file = $request->file_sertif[$key]->hashName();
                            $request->file_sertif[$key]->storeAs('public/properties/certificates', $request->file_sertif[$key]->hashName());
                        }
                        $cekUpdate->save();
                    } else {
                        $data->certificates()->create([
                            'name' => $value,
                            'file' => $request->file_sertif[$key]->hashName(),
                        ]);
                        $request->file_sertif[$key]->storeAs('public/properties/certificates', $request->file_sertif[$key]->hashName());
                    }
                }
            }


            $data->save();
            $request->session()->flash('success', 'Berhasil update data');
            return response()->json('Sukses');
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Property::find($id)->delete();
        return response()->json('Sukses');
    }

    public function deleteImage(Request $request)
    {
        $id = $request->id;
        $data = PropertyImages::find($id);
        Storage::disk('public')->delete('properties/image/' . $data->name);
        $data->delete();
        return response()->json('deleted');
    }

    public function sold(Property $property)
    {
        $property->is_sold = 1;
        $property->save();
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function back(Property $property)
    {
        $property->is_sold = 0;
        $property->save();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
