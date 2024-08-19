<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id(); // id SERIAL PRIMARY KEY
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade'); // customer_id INTEGER REFERENCES Customers(id) ON DELETE CASCADE
            $table->foreignId('showtime_id')->constrained('showtimes')->onDelete('cascade'); // showtime_id INTEGER REFERENCES Showtimes(id) ON DELETE CASCADE
            $table->foreignId('movie_id')->constrained('movies')->onDelete('cascade'); // movie_id INTEGER REFERENCES Movies(id) ON DELETE CASCADE
            $table->timestamp('purchase_time')->default(DB::raw('CURRENT_TIMESTAMP')); // purchase_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
            $table->decimal('total_amount', 10, 2); // total_amount DECIMAL(10, 2) NOT NULL
            $table->timestamps(); // timestamps (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
