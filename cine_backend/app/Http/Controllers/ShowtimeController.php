<?php

namespace App\Http\Controllers;

use App\Models\Showtime;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{
    public function index()
    {
        $showtimes = Showtime::all();
        return response()->json($showtimes);
    }

    public function show($id)
    {
        $showtime = Showtime::find($id);
        if ($showtime) {
            return response()->json($showtime);
        } else {
            return response()->json(['message' => 'Showtime not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'room_id' => 'required|exists:rooms,id',
            'showtime' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $showtime = Showtime::create($request->all());
        return response()->json($showtime, 201);
    }

    public function update(Request $request, $id)
    {
        $showtime = Showtime::find($id);
        if ($showtime) {
            $request->validate([
                'movie_id' => 'sometimes|required|exists:movies,id',
                'room_id' => 'sometimes|required|exists:rooms,id',
                'showtime' => 'sometimes|required|date_format:Y-m-d H:i:s',
            ]);

            $showtime->update($request->all());
            return response()->json($showtime);
        } else {
            return response()->json(['message' => 'Showtime not found'], 404);
        }
    }

    public function destroy($id)
    {
        $showtime = Showtime::find($id);
        if ($showtime) {
            $showtime->delete();
            return response()->json(['message' => 'Showtime deleted successfully']);
        } else {
            return response()->json(['message' => 'Showtime not found'], 404);
        }
    }
}
