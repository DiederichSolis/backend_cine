<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index()
    {
        $seats = Seat::all();
        return response()->json($seats);
    }

    public function show($id)
    {
        $seat = Seat::find($id);
        if ($seat) {
            return response()->json($seat);
        } else {
            return response()->json(['message' => 'Seat not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'seat_number' => 'required|string|max:10',
            'is_available' => 'nullable|boolean',
            'price' => 'required|numeric',
        ]);

        $seat = Seat::create($request->all());
        return response()->json($seat, 201);
    }

    public function update(Request $request, $id)
    {
        $seat = Seat::find($id);
        if ($seat) {
            $request->validate([
                'room_id' => 'sometimes|required|exists:rooms,id',
                'seat_number' => 'sometimes|required|string|max:10',
                'is_available' => 'nullable|boolean',
                'price' => 'sometimes|required|numeric',
            ]);

            $seat->update($request->all());
            return response()->json($seat);
        } else {
            return response()->json(['message' => 'Seat not found'], 404);
        }
    }

    public function destroy($id)
    {
        $seat = Seat::find($id);
        if ($seat) {
            $seat->delete();
            return response()->json(['message' => 'Seat deleted successfully']);
        } else {
            return response()->json(['message' => 'Seat not found'], 404);
        }
    }
}
