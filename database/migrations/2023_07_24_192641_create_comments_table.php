<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->text('contenido');
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('comentarios'); // Drop the 'comentarios' table
    }
}

