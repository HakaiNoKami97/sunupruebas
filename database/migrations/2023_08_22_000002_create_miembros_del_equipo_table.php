<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiembrosDelEquipoTable extends Migration
{
    public function up()
    {
        Schema::create('miembros_del_equipo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_proyecto');
            $table->string('nombre');
            $table->string('rol');
            $table->string('contacto');
            $table->timestamps();

            $table->foreign('id_proyecto')->references('id')->on('proyectos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('miembros_del_equipo');
    }
}
?>