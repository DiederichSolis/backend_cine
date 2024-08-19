<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketSeatsTable extends Migration
{
    public function up()
    {
        Schema::create('ticket_seats', function (Blueprint $table) {
            $table->id(); // id SERIAL PRIMARY KEY
            $table->foreignId('ticket_id')->constrained('tickets')->onDelete('cascade'); // ticket_id INTEGER REFERENCES Tickets(id) ON DELETE CASCADE
            $table->foreignId('seat_id')->constrained('seats')->onDelete('cascade'); // seat_id INTEGER REFERENCES Seats(id) ON DELETE CASCADE
            $table->boolean('is_selected')->default(false); // is_selected BOOLEAN DEFAULT FALSE
            $table->timestamps(); // timestamps (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('ticket_seats');
    }
}

