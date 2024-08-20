<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return response()->json($tickets);
    }

    public function show($id)
    {
        $ticket = Ticket::find($id);
        if ($ticket) {
            return response()->json($ticket);
        } else {
            return response()->json(['message' => 'Ticket not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'showtime_id' => 'required|exists:showtimes,id',
            'movie_id' => 'required|exists:movies,id',
            'purchase_time' => 'required|date_format:Y-m-d H:i:s',
            'total_amount' => 'required|numeric',
        ]);

        $ticket = Ticket::create($request->all());
        return response()->json($ticket, 201);
    }

    public function update(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        if ($ticket) {
            $request->validate([
                'customer_id' => 'sometimes|required|exists:customers,id',
                'showtime_id' => 'sometimes|required|exists:showtimes,id',
                'movie_id' => 'sometimes|required|exists:movies,id',
                'purchase_time' => 'sometimes|required|date_format:Y-m-d H:i:s',
                'total_amount' => 'sometimes|required|numeric',
            ]);

            $ticket->update($request->all());
            return response()->json($ticket);
        } else {
            return response()->json(['message' => 'Ticket not found'], 404);
        }
    }

    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        if ($ticket) {
            $ticket->delete();
            return response()->json(['message' => 'Ticket deleted successfully']);
        } else {
            return response()->json(['message' => 'Ticket not found'], 404);
        }
    }
}
