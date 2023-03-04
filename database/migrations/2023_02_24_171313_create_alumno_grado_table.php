<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoGradoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_grado', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumno_id')->constrained();
            $table->foreignId('seccion_id')->constrained();
            $table->foreignId('grado_id')->constrained();
            $table->date('register_date');
            $table->boolean('status')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_grado');
    }
}
