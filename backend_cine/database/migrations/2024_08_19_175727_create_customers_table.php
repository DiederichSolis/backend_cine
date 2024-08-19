<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // id SERIAL PRIMARY KEY
            $table->string('name'); // name VARCHAR(255) NOT NULL
            $table->string('email')->unique(); // email VARCHAR(255) UNIQUE NOT NULL
            $table->string('phone', 20)->nullable(); // phone VARCHAR(20)
            $table->timestamps(); // timestamps (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
