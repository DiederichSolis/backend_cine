<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return response()->json($rooms);
    }

    public function show($id)
    {
        $room = Room::find($id);
        if ($room) {
            return response()->json($room);
        } else {
            return response()->json(['message' => 'Room not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'capacity' => 'required|integer',
        ]);

        $room = Room::create($request->all());
        return response()->json($room, 201);
    }
    public function update(Request $request, $id)
    {
        \Log::info("Update request received for room ID: $id");
    
        // Verifica los datos recibidos
        \Log::info("Request data:", $request->all());
    
        $room = Room::find($id);
    
        if ($room) {
            $validatedData = $request->validate([
                'name' => 'sometimes|required|string|max:100',
                'capacity' => 'sometimes|required|integer',
            ]);
    
            $room->update($validatedData);
    
            return response()->json($room);
        } else {
            \Log::info("Room not found for ID: $id");
            return response()->json(['message' => 'Room not found'], 404);
        }
    }
    
    

    public function destroy($id)
    {
        $room = Room::find($id);
        if ($room) {
            $room->delete();
            return response()->json(['message' => 'Room deleted successfully']);
        } else {
            return response()->json(['message' => 'Room not found'], 404);
        }
    }
}
