<?php

namespace App\Http\Controllers;

use App\Models\TicketSeat;
use Illuminate\Http\Request;

class TicketSeatController extends Controller
{
    public function index()
    {
        $ticketSeats = TicketSeat::all();
        return response()->json($ticketSeats);
    }

    public function show($id)
    {
        $ticketSeat = TicketSeat::find($id);
        if ($ticketSeat) {
            return response()->json($ticketSeat);
        } else {
            return response()->json(['message' => 'TicketSeat not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'seat_id' => 'required|exists:seats,id',
            'is_selected' => 'nullable|boolean',
        ]);

        $ticketSeat = TicketSeat::create($request->all());
        return response()->json($ticketSeat, 201);
    }

    public function update(Request $request, $id)
    {
        $ticketSeat = TicketSeat::find($id);
        if ($ticketSeat) {
            $request->validate([
                'ticket_id' => 'sometimes|required|exists:tickets,id',
                'seat_id' => 'sometimes|required|exists:seats,id',
                'is_selected' => 'nullable|boolean',
            ]);

            $ticketSeat->update($request->all());
            return response()->json($ticketSeat);
        } else {
            return response()->json(['message' => 'TicketSeat not found'], 404);
        }
    }

    public function destroy($id)
    {
        $ticketSeat = TicketSeat::find($id);
        if ($ticketSeat) {
            $ticketSeat->delete();
            return response()->json(['message' => 'TicketSeat deleted successfully']);
        } else {
            return response()->json(['message' => 'TicketSeat not found'], 404);
        }
    }
}
