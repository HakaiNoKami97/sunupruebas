<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tarea')->nullable();
            $table->unsignedBigInteger('id_proyecto')->nullable();
            $table->text('texto');
            $table->timestamp('fecha');
            $table->string('autor');
            $table->timestamps();

            $table->foreign('id_tarea')->references('id')->on('tareas');
            $table->foreign('id_proyecto')->references('id')->on('proyectos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
?>