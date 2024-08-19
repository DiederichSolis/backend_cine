<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id(); // id SERIAL PRIMARY KEY
            $table->string('name', 100); // name VARCHAR(100) NOT NULL
            $table->integer('capacity'); // capacity INTEGER NOT NULL
            $table->timestamps(); // timestamps (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
