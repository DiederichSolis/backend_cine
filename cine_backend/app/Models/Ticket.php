<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'showtime_id',
        'movie_id',
        'purchase_time',
        'total_amount',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function showtime()
    {
        return $this->belongsTo(Showtime::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function ticketSeats()
    {
        return $this->hasMany(TicketSeat::class);
    }
}
