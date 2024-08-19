<?php

namespace App\Http\Controllers;

use App\Models\TicketSeat;
use Illuminate\Http\Request;

class TicketSeatController extends Controller
{
    public function index()
    {
        return TicketSeat::all();
    }

    public function show($id)
    {
        return TicketSeat::findOrFail($id);
    }

    public function store(Request $request)
    {
        $ticketSeat = TicketSeat::create($request->all());
        return response()->json($ticketSeat, 201);
    }

    public function update(Request $request, $id)
    {
        $ticketSeat = TicketSeat::findOrFail($id);
        $ticketSeat->update($request->all());
        return response()->json($ticketSeat, 200);
    }

    public function destroy($id)
    {
        $ticketSeat = TicketSeat::findOrFail($id);
        $ticketSeat->delete();
        return response()->json(null, 204);
    }
}
