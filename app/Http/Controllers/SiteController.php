<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Property;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $properties = Property::with('images')->where('is_sold', 0)->orderBy('count_view', 'desc')->limit(5)->get();
        $banners = Banner::all();
        return view('home', compact('properties', 'banners'));
    }

    public function property($id)
    {
        $property = Property::with('images')->findOrFail($id);
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
            return response()->json(['error' => $th->getMessage()], 500);
        }

    }
}
