<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'seat_number',
        'is_available',
        'price',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function ticketSeats()
    {
        return $this->hasMany(TicketSeat::class);
    }
}
