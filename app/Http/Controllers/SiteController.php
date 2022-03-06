<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $properties = Property::with('images')->where('is_sold', 0)->orderBy('count_view')->get();
        return view('home', compact('properties'));
    }

    public function property($id)
    {
        $property = Property::with('images')->findOrFail($id);
        return view('property', compact('property'));
    }
}
