<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function province()
    {
        $response = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi')->object()->provinsi;
        $data = [];
        foreach ($response as $res) {
            array_push($data, [
                'id' => $res->id,
                'text' => $res->nama
            ]);
        }
        return $data;
    }

    public function city(Request $request)
    {
        $id_province = explode('|', $request->id_province)[0];
        $response = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' . $id_province,)->object()->kota_kabupaten;
        $data = [];
        foreach ($response as $res) {
            array_push($data, [
                'id' => $res->id . "|" . $res->nama,
                'text' => $res->nama
            ]);
        }
        return $data;
    }

    public function district(Request $request)
    {
        $id_city = explode('|', $request->id_city)[0];
        $response = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=' . $id_city)->object()->kecamatan;
        $data = [];
        foreach ($response as $res) {
            array_push($data, [
                'id' => $res->id . "|" . $res->nama,
                'text' => $res->nama
            ]);
        }
        return $data;
    }

    public function subdistrict(Request $request)
    {
        $id_district = explode('|', $request->id_district)[0];
        $response = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=' . $id_district)->object()->kelurahan;
        $data = [];
        foreach ($response as $res) {
            array_push($data, [
                'id' => $res->id . "|" . $res->nama,
                'text' => $res->nama
            ]);
        }
        return $data;
    }
}
