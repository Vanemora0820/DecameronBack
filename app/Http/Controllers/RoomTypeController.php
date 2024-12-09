<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomType;

class RoomTypeController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'type' => 'required|unique:room_types,type',
    ]);

    $roomType = RoomType::create($request->all());

    return response()->json($roomType, 201);
}

public function index()
{
    return response()->json(RoomType::all());
}


public function show($id)
{
    $roomType = RoomType::find($id);
    if (!$roomType) {
        return response()->json(['message' => 'RoomType not found'], 404);
    }
    return response()->json($roomType);
}

public function update(Request $request, $id)
{
    $roomType = RoomType::find($id);
    if (!$roomType) {
        return response()->json(['message' => 'RoomType not found'], 404);
    }

    $validated = $request->validate([
        'type' => 'required|string|max:255',
    ]);

    $roomType->update([
        'type' => $validated['type'],  
    ]);

    return response()->json($roomType);
}

    public function destroy($id)
    {
        $roomType = RoomType::find($id);
        if (!$roomType) {
            return response()->json(['message' => 'RoomType not found'], 404);
        }

        $roomType->delete();
        return response()->json(['message' => 'RoomType deleted successfully']);
    }


}
