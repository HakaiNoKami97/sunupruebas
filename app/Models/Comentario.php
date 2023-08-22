<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = ['id_tarea', 'id_proyecto', 'texto', 'fecha', 'autor'];

    public function tarea()
    {
        return $this->belongsTo(Tarea::class, 'id_tarea');
    }

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }
}
?>