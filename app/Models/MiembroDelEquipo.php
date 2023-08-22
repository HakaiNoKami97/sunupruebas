<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class MiembroDelEquipo extends Model
{
    protected $fillable = ['id_proyecto', 'nombre', 'rol', 'contacto'];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }
}

?>