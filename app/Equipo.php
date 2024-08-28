<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table    = 'equipos';

    public $timestamps = false;

    protected $fillable = [
        'serie_equipo_anterior',
        'fecha_alta',
        'tipo',
        'marca',
        'unidad_destino',
        'subunidad_destino',
        'telefono',
        'ip',
        'personal_dip',
        'observaciones',
        'estado_equipo'
    ];

    public function scopeBuscarid($query, $id)
    {
        if (trim($id) != '') {
            $query = $query->where('id', $id);
        }
    }

    public function scopeBuscarfecha($query, $fecha_alta)
    {
        if (trim($fecha_alta) != '') {
            $query = $query->where('fecha_alta', $fecha_alta);
        }
    }

    public function scopeBuscartipo($query, $tipo)
    {
        if (trim($tipo) != '') {
            $query = $query->where('tipo', $tipo);
        }
    }

    public function scopeBuscarmarca($query, $marca)
    {
        if (trim($marca) != '') {
            $query = $query->where('marca', $marca);
        }
    }

    public function aservicio()
    {
        return $this->hasMany('App\Servicio', 'equipo', 'id');
    }
}
