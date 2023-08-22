<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'estado'];

    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'id_proyecto');
    }

    public function miembrosDelEquipo()
    {
        return $this->hasMany(MiembroDelEquipo::class, 'id_proyecto');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_proyecto');
    }
}
?>