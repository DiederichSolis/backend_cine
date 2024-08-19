<?php

namespace App\Http\Controllers;

use App\Models\Showtime;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{
    public function index()
    {
        return Showtime::all();
    }

    public function show($id)
    {
        return Showtime::findOrFail($id);
    }

    public function store(Request $request)
    {
        $showtime = Showtime::create($request->all());
        return response()->json($showtime, 201);
    }

    public function update(Request $request, $id)
    {
        $showtime = Showtime::findOrFail($id);
        $showtime->update($request->all());
        return response()->json($showtime, 200);
    }

    public function destroy($id)
    {
        $showtime = Showtime::findOrFail($id);
        $showtime->delete();
        return response()->json(null, 204);
    }
}
