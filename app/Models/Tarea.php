<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = ['id_proyecto', 'nombre', 'descripcion', 'estado', 'fecha_limite', 'asignado_a'];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_tarea');
    }
}

?>