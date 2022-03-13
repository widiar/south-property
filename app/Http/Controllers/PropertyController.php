<?php

namespace App\Http\Controllers;

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
        $kabupaten = Http::get(route('api.city'), [
            'id_province' => 51
        ])->object();
        return view('admin.property.create', compact('kabupaten'));
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
                'deskripsi' => $request->deskripsi,
                'harga' => str_replace(',', '', $request->harga),
                'luas' => $request->luas,
                'tipe' => $request->tipe,
                'fasilitas' => $request->fasilitas ? json_encode($request->fasilitas) : 'tanah',
                'harga_satuan' => $request->harga_satuan ? str_replace(',', '', $request->harga_satuan) : 0,
                'sub_tipe' => $request->sub_tipe,
                'location_id' => $location->id,
                'panjang' => $request->panjang,
                'lebar' => $request->lebar,
            ]);

            if(isset($request->file_sertif)){
                foreach($request->file_sertif as $key => $value){
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
        $kabupaten = Http::get(route('api.city'), [
            'id_province' => 51
        ])->object();
        // dd($data->location->area);
        return view('admin.property.edit', compact('data', 'kabupaten'));
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
            $data->deskripsi = $request->deskripsi;
            $data->harga = str_replace(',', '', $request->harga);
            $data->luas = $request->luas;
            $data->tipe = $request->tipe;
            $data->fasilitas = $request->fasilitas;
            $data->harga_satuan = $request->harga_satuan ? str_replace(',', '', $request->harga_satuan) : 0;
            $data->sub_tipe = $request->sub_tipe;
            $data->panjang = $request->panjang;
            $data->lebar = $request->lebar;

            // save foto
            if(isset($request->fotofile)){
                foreach ($request->fotofile as $file) {
                    $data->images()->create([
                        'name' => $file->hashName()
                    ]);
                    $file->storeAs('public/properties/image', $file->hashName());
                }
            }
            $data->save();
            $request->session()->flash('success', 'Berhasil update data');
            return response()->json('Sukses');
        } catch(\Throwable $th) {
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
}
