<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index()
    {
        return Seat::all();
    }

    public function show($id)
    {
        return Seat::findOrFail($id);
    }

    public function store(Request $request)
    {
        $seat = Seat::create($request->all());
        return response()->json($seat, 201);
    }

    public function update(Request $request, $id)
    {
        $seat = Seat::findOrFail($id);
        $seat->update($request->all());
        return response()->json($seat, 200);
    }

    public function destroy($id)
    {
        $seat = Seat::findOrFail($id);
        $seat->delete();
        return response()->json(null, 204);
    }
}
