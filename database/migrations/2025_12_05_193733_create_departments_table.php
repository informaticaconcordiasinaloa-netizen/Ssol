<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            
            // 1 = activo, 0 = inactivo
            $table->boolean('activo')->default(1);

            // 1 = editable, 0 = no editable
            $table->boolean('editable')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('departments');
    }
};
