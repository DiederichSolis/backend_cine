<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id(); // id SERIAL PRIMARY KEY
            $table->string('title'); // title VARCHAR(255) NOT NULL
            $table->text('description')->nullable(); // description TEXT
            $table->string('genre', 50)->nullable(); // genre VARCHAR(50)
            $table->integer('duration'); // duration INTEGER NOT NULL
            $table->string('rating', 10)->nullable(); // rating VARCHAR(10)
            $table->date('release_date')->nullable(); // release_date DATE
            $table->string('image_url')->nullable(); // image_url VARCHAR(255)
            $table->timestamps(); // timestamps (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
