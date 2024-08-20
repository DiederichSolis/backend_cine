<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return response()->json($movies);
    }

    public function show($id)
    {
        $movie = Movie::find($id);
        if ($movie) {
            return response()->json($movie);
        } else {
            return response()->json(['message' => 'Movie not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'genre' => 'nullable|string|max:50',
            'duration' => 'required|integer',
            'rating' => 'nullable|string|max:10',
            'release_date' => 'nullable|date',
            'image_url' => 'nullable|string|max:255',
        ]);

        $movie = Movie::create($request->all());
        return response()->json($movie, 201);
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        if ($movie) {
            $request->validate([
                'title' => 'sometimes|required|string|max:255',
                'description' => 'nullable|string',
                'genre' => 'nullable|string|max:50',
                'duration' => 'sometimes|required|integer',
                'rating' => 'nullable|string|max:10',
                'release_date' => 'nullable|date',
                'image_url' => 'nullable|string|max:255',
            ]);

            $movie->update($request->all());
            return response()->json($movie);
        } else {
            return response()->json(['message' => 'Movie not found'], 404);
        }
    }

    public function destroy($id)
    {
        $movie = Movie::find($id);
        if ($movie) {
            $movie->delete();
            return response()->json(['message' => 'Movie deleted successfully']);
        } else {
            return response()->json(['message' => 'Movie not found'], 404);
        }
    }
}
