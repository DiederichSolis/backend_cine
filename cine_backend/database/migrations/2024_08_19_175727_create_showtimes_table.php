<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowtimesTable extends Migration
{
    public function up()
    {
        Schema::create('showtimes', function (Blueprint $table) {
            $table->id(); // id SERIAL PRIMARY KEY
            $table->foreignId('movie_id')->constrained('movies')->onDelete('cascade'); // movie_id INTEGER REFERENCES Movies(id) ON DELETE CASCADE
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade'); // room_id INTEGER REFERENCES Rooms(id) ON DELETE CASCADE
            $table->timestamp('showtime'); // showtime TIMESTAMP NOT NULL
            $table->timestamps(); // timestamps (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('showtimes');
    }
}
