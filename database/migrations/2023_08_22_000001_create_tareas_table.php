<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_proyecto');
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('estado');
            $table->timestamp('fecha_limite')->nullable();
            $table->string('asignado_a');
            $table->timestamps();

            $table->foreign('id_proyecto')->references('id')->on('proyectos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tareas');
    }
}
?>