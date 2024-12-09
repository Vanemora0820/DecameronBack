<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Accommodation;

class AccommodationController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'room_type_id' => 'required|exists:room_types,id',
        'accommodation' => 'required|in:sencilla,doble,triple,cuadruple',
    ]);

    // Validacion Habitacion y acomodacion 
    $roomType = RoomType::find($request->room_type_id);
    if ($roomType->type === 'ESTANDAR' && !in_array($request->accommodation, ['sencilla', 'doble'])) {
        return response()->json(['error' => 'Acomodación no válida para tipo de habitación ESTANDAR'], 400);
    }
    
    if ($roomType->type === 'JUNIOR' && !in_array($request->accommodation, ['triple', 'cuadruple'])) {
        return response()->json(['error' => 'Acomodación no válida para tipo de habitación JUNIOR'], 400);
    }

    if ($roomType->type === 'SUITE' && !in_array($request->accommodation, ['sencilla', 'doble', 'triple'])) {
        return response()->json(['error' => 'Acomodación no válida para tipo de habitación SUITE'], 400);
    }

    $accommodation = Accommodation::create($request->all());

    return response()->json($accommodation, 201);
}

public function index()
    {
        return response()->json(Accommodation::all());
    }

public function show($id)
    {
        $accommodation = Accommodation::find($id);
        if (!$accommodation) {
            return response()->json(['message' => 'Accommodation not found'], 404);
        }
        return response()->json($accommodation);
    }

    public function update(Request $request, $id)
    {
        $accommodation = Accommodation::find($id);
        if (!$accommodation) {
            return response()->json(['message' => 'Accommodation not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $accommodation->update($validated);
        return response()->json($accommodation);
    }
    public function destroy($id)
    {
        $accommodation = Accommodation::find($id);
        if (!$accommodation) {
            return response()->json(['message' => 'Accommodation not found'], 404);
        }

        $accommodation->delete();
        return response()->json(['message' => 'Accommodation deleted successfully']);
    }


}
