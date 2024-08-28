<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table    = 'servicios';

    public $timestamps = false;

    protected $fillable = [
        'equipo',
        'fecha_ingreso',
        'personal_entrega',
        'personal_div_servicio',
        'accesorios',
        'motivo_ingreso',
        'detalle_reparacion',
        'fecha_devolucion',
        'personal_retira',
        'personal_div_entrega',
        'observacion_retira',
        'estado_servicio',
        'marca_editar'
    ];

    public function scopeBuscarid($query, $id)
    {
        if (trim($id) != '') {
            $query = $query->where('id', $id);
        }
    }

    public function scopeBuscarequipo($query, $equipo)
    {
        if (trim($equipo) != '') {
            $query = $query->where('id', $equipo);
        }
    }

    public function scopeBuscarfechaingreso($query, $fecha_ingreso)
    {
        if (trim($fecha_ingreso) != '') {
            $query = $query->where('id', $fecha_ingreso);
        }
    }

    public function aequipo()
    {
        return $this->belongsTo('App\Equipo', 'equipo', 'id');
    }
}
