<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;


class HotelController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:hotels,name',
        'address' => 'required',
        'city' => 'required',
        'tax_id' => 'required',
        'max_rooms' => 'required|integer',
    ]);

    $hotel = Hotel::create($request->all());

    return response()->json($hotel, 201);
}

    public function index()
    {
        
        $hotels = Hotel::all();
        return response()->json($hotels);
    }

    public function show($id)
    {
        $hotel = Hotel::find($id);
        if (!$hotel) {
            return response()->json(['message' => 'Hotel not found'], 404);
        }
        return response()->json($hotel);
    }

    public function update(Request $request, $hotel)
{

    $hotel = Hotel::find($hotel);
    if (!$hotel) {
        return response()->json(['message' => 'Hotel not found'], 404);
    }

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',

    ]);

    $hotel->update($validated);

    return response()->json($hotel);
}

    public function destroy($id)
    {
        $hotel = Hotel::find($id);

        if (!$hotel) {
            return response()->json(['message' => 'Hotel not found'], 404);
        }

        $hotel->delete();
        return response()->json(['message' => 'Hotel deleted successfully']);
    }
}
