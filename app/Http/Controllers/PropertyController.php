<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyImages;
use Illuminate\Http\Request;
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
        $data = Property::all();
        return view('admin.property.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.property.create');
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
            $lokasi = $request->lokasi . "|" . $request->latitude . "," . $request->longitude;
            $data = Property::create([
                'nama' => $request->nama,
                'lokasi' => $lokasi,
                'deskripsi' => $request->deskripsi,
                'harga' => str_replace(',', '', $request->harga),
                'luas' => $request->luas,
                'tipe' => $request->tipe,
                'fasilitas' => $request->fasilitas,
            ]);

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
        $data = Property::findOrFail($id);
        $lokasi = explode('|', $data->lokasi);
        $latlong = explode(',', $lokasi[1]);
        $lokasi = $lokasi[0];
        $lat = trim($latlong[0]);
        $long = trim($latlong[1]);
        return view('admin.property.edit', compact('data', 'lokasi', 'lat', 'long'));
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
            $lokasi = $request->lokasi . "|" . $request->latitude . "," . $request->longitude;
            $data = Property::findOrFail($id);
            $data->nama = $request->nama;
            $data->lokasi = $lokasi;
            $data->deskripsi = $request->deskripsi;
            $data->harga = str_replace(',', '', $request->harga);
            $data->luas = $request->luas;
            $data->tipe = $request->tipe;
            $data->fasilitas = $request->fasilitas;

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
