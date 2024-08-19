<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatsTable extends Migration
{
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id(); // id SERIAL PRIMARY KEY
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade'); // room_id INTEGER REFERENCES Rooms(id) ON DELETE CASCADE
            $table->string('seat_number', 10); // seat_number VARCHAR(10) NOT NULL
            $table->boolean('is_available')->default(true); // is_available BOOLEAN DEFAULT TRUE
            $table->decimal('price', 10, 2); // price DECIMAL(10, 2) NOT NULL
            $table->timestamps(); // timestamps (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('seats');
    }
}
